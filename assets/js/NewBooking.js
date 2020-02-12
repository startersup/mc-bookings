var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var mydataInv={};
function get_response(myGetUrl, mydata) {
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
         
       setEstimate(data);
      },
      error: function(xhr) {
        
      }
    });
  }
function setEstimate(obj)
{

    var myObj = JSON.parse(obj);
    document.getElementById('route_miles').innerHTML=myObj["totaldistance"];
    document.getElementById('route_time').innerHTML=myObj["totaltime"];
    var temp=document.getElementById('cabType').value;
    document.getElementById('route_fare').innerHTML=myObj[temp]["ofare"][0];

}
  function GetFare()
  {

    var mydata={};
    if(document.getElementById('destination-input').value === '' || document.getElementById('origin-input').value === '')
    {
        myAlert('Please Fill the PickUp and Drop Points');
    }else{
        mydata["src"]=document.getElementById('origin-input').value;
        mydata["des"]=document.getElementById('destination-input').value;
    }
    var myGetUrl = myUrl + "myapi/get_fare.php";
  
    get_response(myGetUrl, mydata);

  }

  function myAlert(msg)
  {
    alert(msg);
  }