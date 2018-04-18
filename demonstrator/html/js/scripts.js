// Empty JS for your own code to be here

var connection = new WebSocket('ws://'+WSURL+':'+WSPORT);

connection.onopen = function () {
  
};

// Log errors
connection.onerror = function (error) {
  console.error('WebSocket Error ' + error);
};

// Log messages from the server
connection.onmessage = function (e) {
    console.log('message from server', e.data);
};


function startVIN(vin) {
  $('#vin').val(vin);

  var hash = md5(vin+Date.now());

  var vehObj = {};
  vehObj["id"] = hash;
  vehObj["vin"] = vin;

  var json = JSON.stringify(vehObj);

  callApi(vin);

  connection.send(json);

  // clear everything

  // start to build the 
}

function callApi(vin) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", APIURL+'?VIN='+vin, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();
    var response = JSON.parse(xhttp.responseText);
    console.log(response);

}

