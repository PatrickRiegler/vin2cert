var Server = require('ws').Server;
var port = process.env.PORT || 1337;
var ws = new Server({port: port});

ws.on('connection', function(w){
  
  w.on('message', function(msg){
    console.log('message from client');
    console.log(msg);
  });

  w.send('message to client');
  
  w.on('close', function() {
    console.log('closing connection');
  });

});
