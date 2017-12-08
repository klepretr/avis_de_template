var express = require('express');
var app = express();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
var compare = require('string-similarity');
var csv_parse = require('csv-to-array');
var http = require('http');

var dataset = [];
var colonnes = ["cp", "ville"];
var villes = [];
csv_parse({
  file : "datasets/villes_francaises.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    villes.push(array[i].ville);
  }
});

var colonnes = ["bonjour"];
var dire_bonjour = [];
csv_parse({
  file : "datasets/bonjour.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    dataset.push(array[i].bonjour);
    dire_bonjour.push(array[i].bonjour);
  }
});

var colonnes = ["secours"];
var secours = [];
csv_parse({
  file : "datasets/premiers_secours.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    dataset.push(array[i].secours);
    secours.push(array[i].secours);
  }
});

var colonnes = ["alcoolemie"];
var alcool = [];
csv_parse({
  file : "datasets/alcoolemie.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    dataset.push(array[i].alcoolemie);
    alcool.push(array[i].alcoolemie);
  }
});

var colonnes = ["question"];
var meteo_questions = [];
csv_parse({
  file : "datasets/meteo_questions.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    meteo_questions.push(array[i].question);
    dataset.push(array[i].question);
  }
});

server.listen(8080);

app.get('/chatbot',function(req,res){
  fs.readFile('./chatbot.html', 'utf-8', function(error, content) {
    res.writeHead(200, {"Content-Type": "text/html"});
    res.end(content);
  });
});
app.use('/chatbot', express.static('static'));

websocket.on('connection', function (socket) {

  var volonte = "";
  console.log('Un client est connecté');

  socket.on('selection', function(decision){
    if(meteo_questions.includes(decision)){
      volonte = "meteo";
      socket.emit('ville_request',"Entrez la ville dont vous voulez connaître la météo");
    }
    else if(alcool.includes(decision)){
      volonte = "";
      socket.emit('reponse',"Arrêtez de boire");
    }
    else if(secours.includes(decision)){
      volonte = "";
      socket.emit('reponse',"Appelez le 15");
    }
    else if(dire_bonjour.includes(decision)){
      volonte = "";
      socket.emit('reponse', dire_bonjour[Math.floor(Math.random()*dire_bonjour.length)]);
    }
  });

  socket.on('meteo_ville', function(ville) {
    var options = {
      hostname: 'api.openweathermap.org'
      ,path: ('/data/2.5/forecast?q=' + ville + '&appid=265c305f780d3efb25d5757f73ea550d&units=metric&lang=fr')
      ,method: 'GET'
      ,headers: { 'Content-Type': 'application/json' }
    };
try{
    var req = http.get(options, function(res) {
      res.setEncoding('utf8');
      var buffers = [];
      res.on('data', function(chunk) {
        buffers.push(new Buffer(chunk));
      })
      .on('end', function() {
        var meteo = JSON.parse(Buffer.concat(buffers).toString());
        var unJour = []
        var jours = []
        for ( var k = 0; k < 4; k++) {
          for( var compteur = 0; compteur < 8; compteur++) {
            unJour.push([meteo.list[compteur+(k*8)].main.temp,
              meteo.list[compteur+(k*8)].weather[0].description,
              meteo.list[compteur+(k*8)].dt_txt]);
          }
          jours.push(unJour);
        }
        console.log(unJour);
        volonte="";
        socket.emit("reponse", unJour[1][0]+"°C et "+unJour[1][1]+" prévu pour le "+unJour[1][2]); //meteo à midi des 4 jours à venir
        socket.emit("reponse", unJour[9][0]+"°C et "+unJour[9][1]+" prévu pour le "+unJour[9][2]);
        socket.emit("reponse", unJour[17][0]+"°C et "+unJour[17][1]+" prévu pour le "+unJour[17][2]);
        socket.emit("reponse", unJour[25][0]+"°C et "+unJour[25][1]+" prévu pour le "+unJour[25][2]);
      });
    });
  }catch(e){
    volonte = "";
    socket.emit('erreur', "Oops... Il y a eu une erreur... ");
  }
  });


  socket.on("attempt", function (message) {
    console.log('message reçu : ' + message);
    var max = 0.0;
    var tosend = "";
    if(volonte == ""){
      socket.emit('suggest', compare.findBestMatch(message, dataset).bestMatch.target);
    } else if(volonte == "meteo"){
      socket.emit('suggest', compare.findBestMatch(message, villes).bestMatch.target);
    }
  });
});
