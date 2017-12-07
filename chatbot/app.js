var app = require('express')();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
var compare = require('string-similarity');

server.listen(8080);

app.get('/chatbot',function(req,res){
  fs.readFile('./chatbot.html', 'utf-8', function(error, content) {
    res.writeHead(200, {"Content-Type": "text/html"});
    res.end(content);
  });
});

var dataset = ["bonjour", "salut", "coucou"];
console.log(compare.findBestMatch("cocu", dataset).bestMatch.target);

websocket.on('connection', function (socket) {
  console.log('Un client est connecté');
  socket.emit('bonjour', 'Vous êtes conecté');

  socket.on("message", function (message) {
    console.log('message reçu : ' + message);
    socket.emit('reponse', message);
  });


});
