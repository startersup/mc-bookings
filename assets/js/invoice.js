var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";

function get_response(myGetUrl, mydata) {
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
        setRow(data);
        // document.getElementById("spinnermodal").style.display = "none";
        //window[functionName](data);
      },
      error: function(xhr) {
        // document.getElementById("spinnermodal").style.display = "none";
        //  Server_Response_Fail(xhr.responseText);
      }
    });
  }

  $(document).ready(function() {

  $("#get_details").click(function() {
    getInvoice();
  });

  $('#all').change(function() {
    if(this.checked) {
        document.getElementById('driver').checked = false;
    }
        
});

$('#driver').change(function() {
    if(this.checked) {
        document.getElementById('all').checked = false;
    }
        
});


});

function getInvoice()
{
    var mydata={};

    var temp1 = document.getElementById("fromto").innerHTML;

    var d = temp1.split(" - ");
  
    mydata["from"] = date_format_db(d[0]);
    mydata["to"] = date_format_db(d[1]);
  
    var myGetUrl = myUrl + "myapi/DriverInvoice.php";
  
    get_response(myGetUrl, mydata);
}

function date_format_db(x) {
    var d = new Date(x),
      month = "" + (d.getMonth() + 1),
      day = "" + d.getDate(),
      year = d.getFullYear();
  
    return year + "-" + month + "-" + day;
  }