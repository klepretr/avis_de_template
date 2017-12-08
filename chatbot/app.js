var express = require('express');
var app = express();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
var compare = require('string-similarity');
var csv_parse = require('csv-to-array');
var http = require('http');

var volonte = "";
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

var colonnes = ["question"];
var meteo_questions = [];
csv_parse({
  file : "datasets/meteo_questions.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    meteo_questions.push(array[i].question);
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
  console.log('Un client est connecté');

  socket.on('selection', function(decision){
    if(meteo_questions.includes(decision)){
      volonte = "meteo";
      socket.emit('ville_request',"Entrez la ville dont vous voulez connaître la météo")
    }
  });

  socket.on('meteo_ville', function(ville) {
    var options = {
      hostname: 'api.openweathermap.org'
      ,path: ('/data/2.5/forecast?q=' + ville + '&appid=265c305f780d3efb25d5757f73ea550d&units=metric&lang=fr')
      ,method: 'GET'
      ,headers: { 'Content-Type': 'application/json' }
    };

    var req = http.get(options, function(res) {
      res.setEncoding('utf8');
      var buffers = [];
      res.on('data', function(chunk) {
        buffers.push(new Buffer(chunk));
      })
      .on('end', function() {
        var meteo = JSON.parse(Buffer.concat(buffers).toString());
        console.log(meteo.city.name);
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
          //console.log(unJour.length);
          console.log(unJour);
          //console.log(meteo.list[0].main.temp);
         // console.log(meteo.list[0].weather[0].description);
         // console.log(meteo.list[0].dt_txt);
      });
    });
    socket.emit('response', )
  });


  socket.on("attempt", function (message) {
    console.log('message reçu : ' + message);
    var max = 0.0;
    var tosend = "";
    if(volonte == ""){
      var a = compare.findBestMatch(message, meteo_questions).bestMatch;
      if(a.rating > max){
        max = a.rating;
        tosend = a.target;
        socket.emit('suggest', a.target);
      }
    } else if(volonte == "meteo"){
      socket.emit('suggest', compare.findBestMatch(message, villes).bestMatch.target);
    }
  });
});
