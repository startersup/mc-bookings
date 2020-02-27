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
           if(mydataInv["for"] == 'driver' && mydataInv["id"] == 'e')
          {
            setList(data);
          }else if(mydataInv["for"] == 'driver' && mydataInv["id"] != 'e'){
		setInvoiceTable(data);
          }else if(mydataInv["for"] == 'all')
          {
            setAllTable(data);
          }
        
       
      },
      error: function(xhr) {
        
      }
    });
  }


function setList(myData)
{
  var myTemp= JSON.parse(myData);
  var myObj=myTemp["list"];
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
    stopLoader();
        
}
Date.prototype.toShortFormat = function() {

  var month_names =["January","february","March",
                    "April","May","June",
                    "July","August","September",
                    "October","November","December"];
  
  var day = this.getDate();
  var month_index = this.getMonth();
  var year = this.getFullYear();
  
  return "" + day + "-" + month_names[month_index] + "-" + year;
}

function startLoader() {
  //document.getElementById("spinnermodal").style.display = "block";

    $("#spinnermodal").fadeIn();
}
function stopLoader() {
  //document.getElementById("spinnermodal").style.display = "none";

    $("#spinnermodal").fadeOut();
}

function setInvoiceTable(myData)
{
    var myTemp= JSON.parse(myData);
    var myObj=myTemp["list"];
    var temp ='';
    var total_fare=0;
    var total_dfare=0;
    document.getElementById("InvoiceTable").innerHTML='';
    document.getElementById("tableHeader").innerHTML='<th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Booking Id</th> <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Pickup From</th> <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Dropoff To</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Date & Time</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Total Fare</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Driver Fare</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Commission</th>';
    for(var i=0;i<myObj.length;i++)
    {
        temp=temp+'<tr>';
        temp=temp+'<td >'+myObj[i].refid+'</td>';
        temp=temp+'<td >'+myObj[i].src+'</td>';
        temp=temp+'<td >'+myObj[i].des+'</td>';
        temp=temp+'<td >'+myObj[i].dt+' '+myObj[i].time+'</td>';
        temp=temp+'<td >'+myObj[i].fare+'</td>';
        temp=temp+'<td >'+myObj[i].dfare+'</td>';
        temp=temp+'<td >'+myObj[i].commision+'</td>';
        temp=temp+'</tr>';
        total_fare= total_fare + parseFloat(myObj[i].fare);
        total_dfare =total_dfare + parseFloat(myObj[i].dfare);
        
    }

    document.getElementById("InvoiceTable").innerHTML= document.getElementById("InvoiceTable").innerHTML+temp;
    document.getElementById("DrvTotalJobs").innerHTML=myObj.length;
    document.getElementById("DrvTotalValue").innerHTML='£'+total_fare;
    document.getElementById("DrvTotalFare").innerHTML='£'+total_dfare;
    document.getElementById("DrvTotalPay").innerHTML='£'+(total_fare-total_dfare);

    document.getElementById("BasicDriverInfo").innerHTML=myObj[0].dname+'<br>'+myObj[0].drvid;
    setDate(myTemp.no);
    stopLoader();
        
}

function setAllTable(myData)
{
  var myTemp= JSON.parse(myData);
  var myObj=myTemp["list"];
  var temp ='';
  var total_fare=0;
  var total_dfare=0;
  document.getElementById("InvoiceTable").innerHTML='';
  document.getElementById("tableHeader").innerHTML='<th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Booking Id</th> <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Pickup From</th> <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Dropoff To</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Date & Time</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Total Fare</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Driver Name</th><th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Driver Fare</th> <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:\'Nunito\', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Commission</th>';
    
  for(var i=0;i<myObj.length;i++)
  {
      temp=temp+'<tr>';
      temp=temp+'<td >'+myObj[i].refid+'</td>';
      temp=temp+'<td >'+myObj[i].src+'</td>';
      temp=temp+'<td >'+myObj[i].des+'</td>';
      temp=temp+'<td >'+myObj[i].dt+' '+myObj[i].time+'</td>';
      temp=temp+'<td >'+myObj[i].fare+'</td>';
      temp=temp+'<td >'+myObj[i].dname+'</td>';
      temp=temp+'<td >'+myObj[i].dfare+'</td>';
      temp=temp+'<td >'+myObj[i].commision+'</td>';
      temp=temp+'</tr>';
      total_fare= total_fare + parseFloat(myObj[i].fare);
      total_dfare =total_dfare + parseFloat(myObj[i].dfare);
      
  }

  document.getElementById("InvoiceTable").innerHTML= document.getElementById("InvoiceTable").innerHTML+temp;
  document.getElementById("DrvTotalJobs").innerHTML=myObj.length;
  document.getElementById("DrvTotalValue").innerHTML='£'+total_fare;
  document.getElementById("DrvTotalFare").innerHTML='£'+total_dfare;
  document.getElementById("DrvTotalPay").innerHTML='£'+parseFloat(total_fare-total_dfare);

  document.getElementById("BasicDriverInfo").innerHTML='';
  setDate(myTemp.no);
  stopLoader();
      
}
function SendEmail()
{
  mydataInv["mdata"]=document.getElementById("DivIdToPrint").innerHTML;
  var myGetUrl = myUrl + "myapi/EmailInvoice.php";  
  get_response(myGetUrl, mydataInv);

}
function setDate(InvNo)
{
  // Now any Date object can be declared 
var today = new Date();
 var today_date= today.toShortFormat();
var date = new Date();
today.setDate(today.getDate() + 7);
document.getElementById("InvoiceDetails").innerHTML ='Invoice #: '+InvNo+'<br> Created:'+today_date+'<br> '+today.toShortFormat();
 mydataInv["invno"]=InvNo;
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
  startLoader();
     mydataInv["id"]=element.id;
     mydataInv["mdata"]='e';
  mydataInv["invno"]='e';
    var myGetUrl = myUrl + "myapi/DriverInvoice.php";
  
    get_response(myGetUrl, mydataInv);
}
function getInvoice()
{
  startLoader();
    if(document.getElementById('all').checked === true)
    {
        myInvoice=document.getElementById('all').value;
    }else if(document.getElementById('driver').checked === true)
    {
        myInvoice=document.getElementById('driver').value;
    }else {
      stopLoader();
      myAlert('Please Select an category');
      return '';
    }
    mydataInv["for"]=myInvoice;
    var temp1 = document.getElementById("fromto").innerHTML;

    var d = temp1.split(" - ");
  
    mydataInv["from"] = date_format_db(d[0]);
    mydataInv["to"] = date_format_db(d[1]);
  mydataInv["id"]='e';
  mydataInv["mdata"]='e';
  mydataInv["invno"]='e';
    var myGetUrl = myUrl + "myapi/DriverInvoice.php";
  
    get_response(myGetUrl, mydataInv);
}

function date_format_db(x) {
    var d = new Date(x),
      month = "" + (d.getMonth() + 1),
      day = "" + d.getDate(),
      year = d.getFullYear();
  
    return year + "-" + month + "-" + day;
  }

  function myAlert(msg)
  {
    alert(msg);
  }