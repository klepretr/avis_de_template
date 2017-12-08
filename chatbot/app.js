var express = require('express');
var app = express();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
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

  socket.on("attempt", function (message) {
    console.log('message reçu : ' + message);
    socket.emit('suggest', compare.findBestMatch(message, villes).bestMatch.target);
  });
});
