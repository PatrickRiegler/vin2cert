<?php

require('vendor/autoload.php');

use WebSocket\Client;
use Elasticsearch\ClientBuilder;

$hosts = [
    'elasticsearch:9200'
];

$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object

function postResultToElastic($data) {

  global $client;
  $params = [
      'index' => 'vin2cert',
      'type' => 'my_type',
      'id' => $vin,
      //'timestamp' => strtotime("-3h"),
      'body' => ['timestamp' => "'".strtotime("now")."'", 'response' => "'".$data."'"]
  ];

  $response = $client->index($params);
  //print_r($response);

}
 
$apiPrefix = "https://api.vindecoder.eu/2.0";
$apikey = "7faaef90b983";   // Your API key
$secretkey = "a3396cb5ac";  // Your secret key
// $vin = ($_SERVER['VIN']) ? $_SERVER['VIN'] : "WAUZZZ4L0BD004645"; // Requested VIN
// echo "result for VIN: ".$vin;

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
 
// create SQL based on HTTP method
switch ($method) {
  case 'GET':
    // echo $method."<br><br>";
    $vin = $_GET["VIN"];
    if($vin=="") die("no VIN number specified...");
    break;
  case 'PUT':
    // echo $method."<br><br>";
    break;
  case 'POST':
    // echo $method."<br><br>";
    // echo print_r($input, true);
    $vin = $_GET["VIN"];
    break;
  case 'DELETE':
    // echo $method."<br><br>";
    break;
  default:
    echo "wrong command...";
    break;
}



// first, get the fields that may be returned by the service
  $id = "info-".$vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);

$result = json_decode($data, true);

// echo "";
// echo print_r($result["decode"]);
// echo "";

// postResultToElastic($data);


  $id = $vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);

$result = json_decode($data, true);

// echo "";
// echo print_r($result["decode"]);
// echo "";

echo $data;

#postResultToElastic($data);

?>
