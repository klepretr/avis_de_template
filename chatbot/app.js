var express = require('express');
var app = express();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
var http = require('http');
var compare = require('string-similarity');
var csv_parse = require('csv-to-array');

var colonnes = ["cp", "ville"];
var villes = [];
csv_parse({
  file : "villes_francaises.csv",
  columns : colonnes
}, function(err, array){
  for(var i = 0 ; i < array.length; i++){
    villes.push(array[i].ville);
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

var dataset = ["bonjour", "salut", "coucou"];

websocket.on('connection', function (socket) {
  console.log('Un client est connecté');
  socket.emit('message', 'Vous êtes conecté');

  socket.on('ville', function(ville) {
    //console.log(ville);
    var options = {
      hostname: 'api.openweathermap.org'
      ,path: ('/data/2.5/forecast?q=' + ville + '&appid=265c305f780d3efb25d5757f73ea550d&units=metric&lang=fr')
      ,method: 'GET'
      ,headers: { 'Content-Type': 'application/json' }
    };
    
    var req = http.get(options, function(res) {
      res.setEncoding('utf8');
      var buffers = [];
      res
        .on('data', function(chunk) {
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
          console.log(unJour.length);
          console.log(unJour);
          //console.log(meteo.list[0].main.temp);
         // console.log(meteo.list[0].weather[0].description);
         // console.log(meteo.list[0].dt_txt);
      }); 
    });
  });
  

  

  socket.on("attempt", function (message) {
    console.log('message reçu : ' + message);
    socket.emit('suggest', compare.findBestMatch(message, villes).bestMatch.target);
  });
});

