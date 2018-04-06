<?php

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$hosts = [
    'elasticsearch:9200'
];

$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object

$apiPrefix = "https://api.vindecoder.eu/2.0";
$apikey = "7faaef90b983";   // Your API key
$secretkey = "a3396cb5ac";  // Your secret key
// $vin = ($_SERVER['VIN']) ? $_SERVER['VIN'] : "WAUZZZ4L0BD004645"; // Requested VIN
echo "result for VIN: ".$vin;

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
 
// create SQL based on HTTP method
switch ($method) {
  case 'GET':
    echo $method."<br><br>";
    $vin = $_GET["VIN"];
    break;
  case 'PUT':
    echo $method."<br><br>";
    break;
  case 'POST':
    echo $method."<br><br>";
    echo print_r($input, true);
    break;
  case 'DELETE':
    echo $method."<br><br>";
    break;
  default:
    echo "wrong command...";
    break;
}
 
if($_SERVER['GET']==1) {

  $id = $vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);

} else {

  $id = "info-".$vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);

}

$result = json_decode($data, true);

echo "";
echo print_r($result["decode"]);
//echo print_r($result,true);
echo "";


$params = [
    'index' => 'vin2cert',
    'type' => 'my_type',
    'id' => $vin,
    'body' => ['response' => "'".$data."'"]
];

$response = $client->index($params);
print_r($response);

?>
