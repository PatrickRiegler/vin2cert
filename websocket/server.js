var Server = require('ws').Server;
var port = process.env.PORT || 1337;
var ws = new Server({port: port});
var clients = [];

ws.on('request', function(w){

  // add client to array
  var connection = w.accept('any-protocol', request.origin);
  clients.push(connection);

  connection.on('message', function(msg){
    // console.log('message from client');
    console.log(msg);
    // w.send('message to client '+msg);
    clients.forEach(function(client) {
      client.send(msg);
    });
  });

  
  w.on('close', function() {
    // console.log('closing connection');
  });

});
