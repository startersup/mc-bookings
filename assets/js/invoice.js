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
function setInvoiceTable(myData)
{
    var myObj = JSON.parse(myData);
    var temp ='';

    for(var i=0;i<myObj.length;i++)
    {
        temp=temp+'<tr>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'<td >'+myObj[i].drvid+' - '+myObj[i].dname+'</td>';
        temp=temp+'</tr>';
        
    }

    document.getElementById("InvoiceTable").innerHTML= document.getElementById("InvoiceTable").innerHTML+temp;
    
        
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
     mydataInv["id"]=element.id;
    var myGetUrl = myUrl + "myapi/DriverInvoice.php";
  
    get_response(myGetUrl, mydataInv);
}
function getInvoice()
{

    if(document.getElementById('all').checked === true)
    {
        myInvoice=document.getElementById('all').value;
    }else if(document.getElementById('driver').checked === true)
    {
        myInvoice=document.getElementById('driver').value;
    }
    mydataInv["for"]=myInvoice;
    var temp1 = document.getElementById("fromto").innerHTML;

    var d = temp1.split(" - ");
  
    mydataInv["from"] = date_format_db(d[0]);
    mydataInv["to"] = date_format_db(d[1]);
	mydataInv["id"]='e';
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
