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



$step = "vindecode";
$stepDetail = "getFields";
$responseTime[$step][$stepDetail]["start"]=microtime(true);
// first, get the fields that may be returned by the service
  $id = "info-".$vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);

$result = json_decode($data, true);
$responseTime[$step][$stepDetail]["end"]=microtime(true);
$responseTime[$step][$stepDetail]["duration"]=$responseTime[$step][$stepDetail]["end"]-$responseTime[$step][$stepDetail]["start"];
/*
echo $responseTime[$step][$stepDetail]["start"]."<br>";
echo $responseTime[$step][$stepDetail]["end"]."<br>";
echo $responseTime[$step][$stepDetail]["duration"]."<br>";
*/
handleResult($md5,$vin,$step,$stepDetail,"success",$responseTime[$step][$stepDetail]["duration"],$result);

// echo "";
// echo print_r($result["decode"]);
// echo "";

$stepDetail = "getResult";
$responseTime[$step][$stepDetail]["start"]=microtime(true);
  $id = $vin;
  $controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);
  $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);

$result = json_decode($data, true);
$responseTime[$step][$stepDetail]["end"]=microtime(true);
$responseTime[$step][$stepDetail]["duration"]=$responseTime[$step][$stepDetail]["end"]-$responseTime[$step][$stepDetail]["start"];
handleResult($md5,$vin,$step,"getResult","success",$responseTime[$step][$stepDetail]["duration"],$result);

// echo "";
// echo print_r($result["decode"]);
// echo "";

echo $data;

// postResultToElastic($data);

?>
