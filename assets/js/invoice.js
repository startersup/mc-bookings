var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var myInvoice='';
var lastFrom='';
var lastTo='';
function get_response(myGetUrl, mydata) {
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
          if(myInvoice == 'driver')
          {
            setList(data);
          }else{

          }
        
       
      },
      error: function(xhr) {
        
      }
    });
  }


function setList(myData)
{
    var myObj = JSON.parse(myData);
    var temp ='';
    for(var i=0;i<myObj.length;i++)
    {
        if(!(myObj[i].drvid === ''))
        {
        temp=temp+'<tr onclick="GetDriverInvoice(this);" id="'+myObj[i].drvid+'" >';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'</tr>';
        }
    }

    document.getElementById("driver-inv-table").innerHTML=temp;
    
        
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
function GetDriverInvoice(element)
{
   var mydata={};
    mydata["from"] =lastFrom;
    mydata["to"] =    lastTo;
    mydata["ïd"]=element.id;
    var myGetUrl = myUrl + "myapi/DriverInvoice.php";
  
    get_response(myGetUrl, mydata);
}
function getInvoice()
{
    var mydata={};
    if(document.getElementById('all').checked === true)
    {
        myInvoice=document.getElementById('all').value;
    }else if(document.getElementById('driver').checked === true)
    {
        myInvoice=document.getElementById('driver').value;
    }
    mydata["for"]=myInvoice;
    var temp1 = document.getElementById("fromto").innerHTML;

    var d = temp1.split(" - ");
  
    mydata["from"] = date_format_db(d[0]);
    mydata["to"] = date_format_db(d[1]);
  lastFrom=mydata["from"];
  lastTo=mydata["to"];
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
