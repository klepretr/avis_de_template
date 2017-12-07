var app = require('express')();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');

server.listen(8080);

app.get('/chatbot',function(req,res){
  fs.readFile('./chatbot.html', 'utf-8', function(error, content) {
    res.writeHead(200, {"Content-Type": "text/html"});
    res.end(content);
  });
});

websocket.on('connection', function (socket) {
  console.log('Un client est connecté');
  socket.emit('message', 'Vous êtes conecté');
});
