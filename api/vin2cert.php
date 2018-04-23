<?php

require('./lib.php');


// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
 
// create SQL based on HTTP method
switch ($method) {
  case 'GET':
    // echo $method."<br><br>";
    $vin = $_GET["VIN"];
    $md5 = $_GET["ID"];
    if($vin=="") die("no VIN number specified...");
    break;
  case 'PUT':
    notImplemented($method);
    break;
  case 'POST':
    notImplemented($method);
    break;
  case 'DELETE':
    notImplemented($method);
    break;
  default:
    notImplemented($method);
    break;
}



// first, get the fields that may be returned by the service
  $id = "info-".$vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);

$result = json_decode($data, true);
handleResult($md5,$vin,"vindecode","getFields","success",$result);

// echo "";
// echo print_r($result["decode"]);
// echo "";

  $id = $vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);

$result = json_decode($data, true);
handleResult($md5,$vin,"vindecode","getResult","success",$result);

// echo "";
// echo print_r($result["decode"]);
// echo "";

echo $data;

// postResultToElastic($data);

?>
