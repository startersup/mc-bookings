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
         
       console.log(data);
      },
      error: function(xhr) {
        
      }
    });
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