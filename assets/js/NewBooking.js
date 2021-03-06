var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var mydataInv={};
var myId =["origin-input","destination-input","cabType","booked_site","fare","name","mail","mobile1","mobile2","address1","address2","np","np2","nl","location","info","drvid","dfare","date","time"];
var myMandId =["origin-input","destination-input","cabType",,"datetimepicker","booked_site","fare","name","mail","mobile1","address1","address2","np","np2","nl"];
var myClearId=["route_fare","route_time","route_miles","origin-input","destination-input","cabType","booked_site","fare","name","mail","mobile1","mobile2","address1","address2","np","np2","nl","location","info","drvid","dfare","datetimepicker"];
var myDataBook={};
var myFareObj={};

function DateSplitter()
{
    var myval = document.getElementById('datetimepicker').value; 
   
    if(myval !== '')
    {
      var myVals = myval.split(' ');
      document.getElementById('date').value = myVals[0].replace("/","-");
      document.getElementById('date').value = document.getElementById('date').value.replace("/","-");
      document.getElementById('time').value = myVals[1];
    }
 

}
function get_response(myGetUrl, mydata) {
 
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
         myFareObj= JSON.parse(data);
       setEstimate();
	   
      },
      error: function(xhr) {
        
      }
    });
  }

  function get_driver(myGetUrl, mydata) {
 
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
        
       setDriver(data);
	   
      },
      error: function(xhr) {
        
      }
    });


  }
  
  function setDriver(data)
  {
    driverList= JSON.parse(data);
    var content ='';
    for(var i=0;i<driverList.length;i++)
    {
      content = content + '<option value="'+driverList[i]['id']+'"> '+driverList[i]['name']+'</option>';
    }
    document.getElementById('drvid').innerHTML =content;
    document.getElementById("spinnermodal").style.display = "none";
  }
  function get_Booking(myGetUrl, mydata) {
 
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function(data) {
        showStatus(data)	   
      },
      error: function(xhr) {
        
      }
    });
  }

  function setLoad()
  {
    
    $("#myAlert").fadeOut();
    document.getElementById("spinnermodal").style.display = "block";
    var myGetUrl = myUrl + "myapi/alldriver.php";
    var myData ={};
    get_driver(myGetUrl,myData)
  }

  function bookNow()
  {

    if(checkSrc())
    {
        if(mandCheck())
		{
			var mydata ={};
        for(var i=0;i<myId.length;i++)
        {
			var temp= myId[i];
			mydata[temp]=document.getElementById(temp).value;
        }
    var myGetUrl = myUrl + "myapi/book.php";
    
  		get_Booking(myGetUrl, mydata);
		}
    }
  }
  function checkSrc()
  {
      var alertmsg='';
      if(document.getElementById('origin-input').value != myDataBook["src"])
      {
        alertmsg="PickUp"
      }
    if(document.getElementById('destination-input').value != myDataBook["des"] )
    {
        alertmsg=" DropOff"
    }
    if(alertmsg === '')
    {
        return Boolean(1);
    }else
    {
        alertmsg=alertmsg+' Values are Changed, Click Yes to Proceed ';
        return confirm(alertmsg)
    }
  }
  function mandCheck()
  {
    var x = 1;    
      for(var i=0;i<myMandId.length;i++)
      {
          var myElement=document.getElementById(myMandId[i]);
          if(myElement.value === '')
          {
            myElement.classList.add("errStyle");
            x=0;
            return Boolean(x); 
          }else
          {
            myElement.classList.remove("errStyle");            
          }
        
      }

      return Boolean(x); 
  }
function setEstimate()
{

    var myObj=myFareObj;
	 if(document.getElementById('origin-input').value != myDataBook["src"] || document.getElementById('destination-input').value != myDataBook["des"] || (myObj.length === 0))
      {
        myAlert("Please Click the Calculate Fare")
      }else
    {
    document.getElementById('route_miles').innerHTML=myObj["totaldistance"];
    document.getElementById('route_time').innerHTML=myObj["totaltime"];
    var temp=document.getElementById('cabType').value;
    document.getElementById('route_fare').innerHTML=myObj[temp]["ofare"][0];
	document.getElementById('fare').value=myObj[temp]["ofare"][0];
	}


    document.getElementById("spinnermodal").style.display = "none";
}

function MaskedDecimal(ele, wnum, dnum) {

    var regex = new RegExp("^\\d{0," + wnum + "}(\\.\\d{0," + dnum + "})?$");
    if (!regex.test(ele.value)) {
        ele.value = ele.value.substring(0, ele.value.length - 1);
    }

}

function MaskedNumber(ele, num) {

    var regex = new RegExp("^\\d{0," + num + "}?$");
    if (!regex.test(ele.value)) {
        ele.value = ele.value.substring(0, ele.value.length - 1);
    }

}
  function GetFare()
  {
   
    if(document.getElementById('destination-input').value === '' || document.getElementById('origin-input').value === '')
    {
        myAlert('Please Fill the PickUp and Drop Points');
    }else{
        document.getElementById("spinnermodal").style.display = "block";
        myDataBook["src"]=document.getElementById('origin-input').value;
        myDataBook["des"]=document.getElementById('destination-input').value;

        var myGetUrl = myUrl + "myapi/get_fare.php";
  
        get_response(myGetUrl, myDataBook);
    }


  }

  function myAlert(msg)
  {

  $("#myAlert_status").html("Alert");
  $("#myAlert_msg").html(msg);
  $("#myAlert_class").removeClass('color-green');
  $("#myAlert_class").removeClass('color-red');
 
    $("#myAlert_class").addClass('color-red');
    $("#myAlert").fadeIn();
  
  }

 