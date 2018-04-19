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

  connection.send(json);

  callApi(vin);

  // clear everything

  // start to build the 
}

function callApi(vin) {
    var url = APIURL+'?VIN='+vin;
    // console.log(url);
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        var response = JSON.parse(this.responseText);
        console.log(response);
      }
    };
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();

}

