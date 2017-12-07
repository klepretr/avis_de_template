var app = require('express')();
var server = require('http').Server(app);
var websocket = require('socket.io')(server);
var fs = require('fs');
var http = require('http');

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

  socket.on('ville', function(ville) {
    console.log(ville);
    var options = {
      hostname: 'api.openweathermap.org'
      ,path: ('/data/2.5/forecast?q=' + ville + '&appid=265c305f780d3efb25d5757f73ea550d')
      ,method: 'GET'
      ,headers: { 'Content-Type': 'application/json' }
    };
    
    var req = http.get(options, function(res) {
      res.setEncoding('utf8');
      res.on('data', function (data) {
           console.log(data); 
           var meteo = JSON.parse(data);
           
      });
    }); 
  });

  
});

