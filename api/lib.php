<?php

// extend path for including composer frameworks
$path = "/var/www/html";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

// include composer frameworks
require('vendor/autoload.php');

// include and initialize PHPDebugBar: http://phpdebugbar.com/docs/
use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");

// include elasticsearch framework
use Elasticsearch\ClientBuilder;
use WebSocket\Client;

// define elasticsearch hosts
$hosts = [
    'elasticsearch:9200'
];

// build elasticsearch client
$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object

// build websocket client
$wsclient = new Client("ws://websocket:1337/");
// $wsclient->send("Hello ws!");
// echo $wsclient->receive(); // Will output 'Hello WebSocket.org!'

// define the connection settings for the vindecoder.eu service
$apiPrefix = "https://api.vindecoder.eu/2.0";
$apikey = "7faaef90b983";   // Your API key
$secretkey = "a3396cb5ac";  // Your secret key
// $vin = ($_SERVER['VIN']) ? $_SERVER['VIN'] : "WAUZZZ4L0BD004645"; // Requested VIN
// echo "result for VIN: ".$vin;


// function for method not implemented
function notImplemented($method) {
    echo "Method: ".$method." is not implemented<br><br>";
    exit(500);
}

function postResultToElastic($md5,$vin,$step,$stepDetail,$result,$detail) {
  global $client;
  $params = [
      'index' => 'vin2cert',
      'type' => 'my_type',
      //'id' => $md5,
      //'timestamp' => strtotime("-3h"),
      'body' => [
		'timestamp' => "'".strtotime("now")."'", 
		'id' => "'".$md5."'",
		'vin' => "'".$vin."'",
		'step' => "'".$step."'",
		'stepDetail' => "'".$stepDetail."'",
		'result' => "'".$result."'",
		'detail' => "'".json_encode($detail)."'"
		]
  ];
  $response = $client->index($params);
  //print_r($response);
}

function updateWebSocket($md5,$vin,$step,$stepDetail,$result,$detail) {
  global $wsclient;
  // echo "$md5,$status,$result,$detail";
  $arr = array(
	'id' => $md5, 
	'vin' => $vin, 
	'step' => $step, 
	'stepDetail' => $stepDetail, 
	'result' => $result, 
	'detail' => $detail
      );
  $wsclient->send(json_encode($arr));
}

function handleResult($md5,$vin,$step,$stepDetail,$result,$detail) {
  // echo $step." - ".$stepDetail;
  updateWebSocket($md5,$vin,$step,$stepDetail,$result,$detail);
  postResultToElastic($md5,$vin,$step,$stepDetail,$result,$detail);

}

?>
