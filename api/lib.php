<?php

$path = "/var/www/html";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require('vendor/autoload.php');

use Elasticsearch\ClientBuilder;
use WebSocket\Client;

$client = new Client("ws://websocket:1337/");
// $client->send("Hello ws!");
// echo $client->receive(); // Will output 'Hello WebSocket.org!'


?>
