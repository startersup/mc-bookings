var GLStatusBooking = {
    "booked": {
      "class": "green-status",
      "showstatus": "Booked",
      "dropdown_val": "Book Now",
      
    },
    "booked-confirmed": {
      "class": "green-status",
      "showstatus": "Confirmed",
      "dropdown_val": "Confirm Now",
      "api":"change_status"
    },
    "comitted": {
      "class": "green-status",
      "showstatus": "Allocated",
    },
    "cancelled": {
      "class": "green-status",
      "showstatus": "Cancelled",
      "dropdown_val": "Cancel Now",
      "api":"cancel_booking"
    },
    "completed": {
      "class": "green-status",
      "showstatus": "Completed",
      "dropdown_val": "Complete Now",
      "api":"complete_booking"
    },
    "all": {
      "class": "green-status",
      "showstatus": "All"
    }
  };
  
  // var GLBookingData={};
  // var GLDriverData={};
  var myProtocolOts = window.location.protocol;
  var mySiteOts = window.location.host;
  var myUrlOts = myProtocolOts + "//" + mySiteOts + "/";
  var modalPingOts = "";
  var driverListOts = {};
  var bookingPageOts = '';
  var confirmFunctionOts = '';
  var mc_datatables_rowOts = {};
  var mc_datatables_rowOts_num = -1;
  var bookingpassOts = '';
  var currentModalStatusOts=''
  


 
  function OtsBookingsLoad() {
    LoadJsOts();
    if (bookingPageOts == '') {
      OTSsetParam("today");
      bookingPageOts = 'today';
    } else {
      clearClassOts();
      var temp='#'+bookingPageOts;
        $(temp).addClass("active");
        OTSsetParam(bookingPageOts);
  
    }
    var mydata = {};
    var myGetUrl = myUrlOts + "myapi/alldriver.php";
  
    get_url_response(myGetUrl, mydata, 'setAllDriverOts');
  }
  
  function LoadJsOts()
  {
    $('.datepickerfuture').click();

  }

  $(document).on('change','#dt_temp',function () {
    var temp= $('#dt_temp').val();
    var data=temp.split('/');
    var dateVal=data[2]+'-'+data[0]+'-'+data[1];
    $('#dt').val(dateVal);
  });
  
  $(document).on('change','#dpercen',function () {
  
    setFare();
  });

  $(document).on('change','#ofare',function () {
  
    setFare();
  });
  function setFare()
  {
    var ofare=0;
    var percen=0;
    if($('#fare').val()=='')
    {
      $('#fare').val(ofare);
    }
    if($('#dpercen').val()=='')
    {
      $('#dpercen').val(dpercen);
    }
    percen =parseInt($('#dpercen').val()).toFixed(2);
    ofare = parseFloat($('#fare').val()).toFixed(2);

    var fare = parseFloat( (ofare/100) * percen ).toFixed(2);
    fare = parseFloat( ofare -fare).toFixed(2);
    $('#dfare').val(fare);
  }

  $(document).on('click','.clickButton',function () {
  var api="";
  var allData ={};
  if($(this).attr("name") == "new")
  {
        api="func_insert.php"
  }else if($(this).attr("name") == "edit")
  {
        api="func_update.php"
        allData["refid"]=$('#refid_temp').val();
  }
  dataHandle(api,allData);
});

$(document).on('click','#addOTSBook',function () {
    clearModalOts();
    $('.clickButton').show();
    $('.clickButton').each(function(){
        if($(this).attr("name") == "edit")
        {
            $(this).hide();
        }
    });
    $('#myModalBookId').html('');
    $('#status_temp').val('booked-confirmed');
    $('#mins').val('00');

    $('#ots-open-modal').click();
});

$(document).on('click','.timeset',function () {

  var temp=$('#hrs').val()+':'+$('#mins').val();
  $('#time').val(temp);

});

function dataSet(allData)
{
    var myData=JSON.parse(allData);
    $('#dataForm input, #dataForm select, #dataForm textarea').each(function(){
        if($(this).hasClass('form-feild'))
        {
        key=$(this).attr("name");
        $(this).val(myData[0][key]);
        }
    });
    $('#refid_temp').val((myData[0]["refid"]));
    $('#myModalBookId').html('Booking Info ('+(myData[0]["refid"])+')');
    var temp= $('#dt').val();
    var data=temp.split('-'); 
    var dateVal=data[1]+'/'+data[2]+'/'+data[0];
    $('#dt_temp').val(dateVal);

    var temp=$('#time').val().split(':');
    $('#hrs').val(temp[0]);
    $('#mins').val(temp[1]);

    $('.clickButton').show();
    $('.clickButton').each(function(){
        if($(this).attr("name") == "new")
        {
            $(this).hide();
        }
    });

    
}

function dataHandle(api,allData)
{
    var myData={};
    var key='';
    var val='';
    $('#dataForm input, #dataForm select, #dataForm textarea').each(function(){
        if($(this).hasClass('form-feild'))
        {
        key=$(this).attr("name");
        val=$(this).val();
        myData[key]=val;
        }
    });
    allData["data"]=myData;
    var myGetUrl = "";
      myGetUrl = myUrlOts + "myapi/ots/"+api;

    get_url_response(myGetUrl, allData, 'showStatusMessageOts')
}


  function OTSsetParam(myparam) {
    var mydata = {};
    var myGetUrl = "";
    if (myparam === "today") {
      myGetUrl = myUrlOts + "myapi/ots/func_today.php";
    } else if (myparam === "yesterday") {
      myGetUrl = myUrlOts + "myapi/ots/func_yest.php";
    } else if (myparam === "tommorrow") {
      myGetUrl = myUrlOts + "myapi/ots/func_tmrw.php";
    } else if (myparam === "custom") {
      myGetUrl = myUrlOts + "myapi/ots/func_custom.php";
    } else if (myparam === "future") {
      myGetUrl = myUrlOts + "myapi/ots/func_future.php";
    }
    get_booking_response_Ots(myGetUrl, mydata);
  }
  function get_booking_response_Ots(myGetUrl, mydata) {
  
    $('#spinnermodal').show();
   
       setTimeout(function(){
     
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
         
      success: function (data) {
        setRowOts(data);
       
      },
      error: function (xhr) {
        // document.getElementById("spinnermodal").style.display = "none";
        //  Server_Response_Fail(xhr.responseText);
      }
    });
  
  }, 400);
  
  }
  function get_url_response(myGetUrl, mydata, myfunc) {
  
   
          $.ajax({
            type: "POST",
            url: myGetUrl,
            data: mydata,
            async: false,
            success: function (data) {
              window[myfunc](data);
            },
            error: function (xhr) { }
          });
      
  }
  
  function setAllDriverOts(data) {
  
    driverListOts = JSON.parse(data);
    var loop= driverListOts.length;
    var temp='<option value="">--SELECT--</option>' ;
    for(var i=0;i<loop;i++)
    {
        temp += '<option value="'+driverListOts[i].id+'">'+driverListOts[i].id+' - '+driverListOts[i].name+'</option>'
    }
  $('#drvid').html(temp);
  }
  
  function updateRowOts()
  {
    var myTable = $("#mc-datatables").DataTable();
    mc_datatables_rowOts.status = setStatusOtsView(mc_datatables_rowOts.status);
    myTable.row( mc_datatables_rowOts_num ).data( mc_datatables_rowOts ).draw();
    mc_datatables_rowOts_num=-1;
    mc_datatables_rowOts={};
  }
  function setRowOts(data) {
    var myTable = $("#mc-datatables").DataTable();
    myTable.destroy();
    var result = JSON.parse(data);
    if (result.length === 0) {
      $("#display_data").css('display', 'none');
      $("#empty_state").css('display', 'block');
    } else {
  
      $("#display_data").css('display', 'block');
      $("#empty_state").css('display', 'none');
  
      $("#mc-datatables").DataTable({
        data: result,
        lengthChange: false,
        searching: false,
        dom: "Bfrtip",
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        columns: [
          { data: "refid" },
          { data: "booked_site" },
          { data: "src" },
          { data: "des" },
          { data: "dt" },
          { data: "name" },
          { data: "fare" },
          { data: "status" },
          { data: null, defaultContent: '<div class="mc-edit-ots"></div>' }
        ]
      });
      setStatusOts();
  
    }
  
    $('#spinnermodal').hide();
  }
  function setStatusOts() {
    var table = $("#mc-datatables").DataTable();
    table.rows().every(function (rowIdx, tableLoop, rowLoop) {
      var data = this.data();
      data.status = setStatusOtsView(data.status);
      this.data(data);
    });
  
  }
  
  function setStatusOtsView(statusVal)
  {
    var myDiv = '<div class="myClass">myStatus</div>';
    if (statusVal== "completed") {
      myDiv = myDiv.replace("myStatus", "Completed");
      myDiv = myDiv.replace("myClass", "mc-cl-Completed");
    } else if (statusVal== "booked") {
      myDiv = myDiv.replace("myStatus", "Booked");
      myDiv = myDiv.replace("myClass", "mc-cl-Booked");
    } else if (statusVal== "booked-confirmed") {
      myDiv = myDiv.replace("myStatus", "Confirmed");
      myDiv = myDiv.replace("myClass", "mc-cl-Confirmed");
    } else if (statusVal== "cancelled") {
      myDiv = myDiv.replace("myStatus", "Cancelled");
      myDiv = myDiv.replace("myClass", "mc-cl-Cancelled");
    } else if (statusVal== "comitted") {
      myDiv = myDiv.replace("myStatus", "Comitted");
      myDiv = myDiv.replace("myClass", "mc-cl-Comitted");
    }else{
      myDiv=statusVal;
    }
    return myDiv;
  }
  

  function clearClassOts() {
    $("#yesterday").removeClass("active");
    $("#today").removeClass("active");
    $("#tommorrow").removeClass("active");
    $("#future").removeClass("active");
  }
  
  

    
     $(document).on('click','.bookingOTS',function () {
  
  
        clearClassOts();
        $(this).addClass("active");
        bookingPageOts = $(this).attr("id");
        OTSsetParam(bookingPageOts);
     
     
  
    });
 
  
    $(document).on('click','.mc-edit-ots',function () {
      var table = $("#mc-datatables").DataTable();
      mc_datatables_rowOts = table.row($(this).parents("tr")).data();
      mc_datatables_rowOts_num = $(this).closest('tr').index();
  
  
      $('#ots-open-modal').click();
        
        var myData={};
        myData["refid"]=mc_datatables_rowOts.refid;
        var myGetUrl = "";
          myGetUrl = myUrlOts + "myapi/ots/func_get_data.php";
        
      get_url_response(myGetUrl,myData,'dataSet')
    });
  
  
  


  
  function clickModalOts(data) {
    clearModalOts();
  }
  
  $(document).on('click','#filter_load_ots',function () {
    searchByFilterOts();
  });

  /*
  $(document).ready(function () { 
  
    $("#BookingUpdate").click(function () {
   
    });
  
    $("#filter_load").click(function () {
      
    });
  });
  */

  function searchByFilterOts() {
    var mydata = {};
    if (document.getElementById("filter_all_OTS").checked) {
      mydata["status"] = document.getElementById("filter_all_OTS").value;
    } else {
      var temp = "('temp'";
      for (var i = 1; i <= 5; i++) {
        if (document.getElementById(i).checked) {
          temp = temp + ",'" + document.getElementById(i).value + "'";
        }
      }
  
      mydata["status"] = temp + ")";
    }
  
    var temp1 = document.getElementById("fromto").innerHTML;
  
    var d = temp1.split(" - ");
  
    mydata["from"] = date_format_db(d[0]);
    mydata["to"] = date_format_db(d[1]);
  
    var myGetUrl = myUrlOts + "myapi/ots/custom.php";
  
    get_booking_response_Ots(myGetUrl, mydata);
  }

  $(document).on('click','#filter_all_OTS',function () {
    filterCheckBoxOts(this);
  } );

  function filterCheckBoxOts(ele) {
    if (ele.checked) {
      for (var i = 1; i <= 5; i++) {
        document.getElementById(i).disabled = true;
        document.getElementById(i).checked = false;
      }
    } else {
      for (var i = 1; i <= 5; i++) {
        document.getElementById(i).disabled = false;
      }
    }
  }
  function clearModalOts() {
    $('#dataForm input, #dataForm select, #dataForm textarea').each(function(){
        if($(this).hasClass('form-feild'))
        {
        val=$(this).val('');
        }
    });
  }
  function getModalDataOts(myload, book_id) {
    $('#spinnermodal').show();
      setTimeout(function () {
  
    var mydata = {};
    var myGetUrl = "";
    mydata["book_id"] = book_id;
    if (myload === "basic_info") {
      modalPingOts = "basic_info";
      myGetUrl = myUrlOts + "myapi/basic_info.php";
    }
    get_url_response(myGetUrl, mydata, "setModalData");
  
  }, 300);
  
  }
  var objModaldata = {};
 

  function date_format_db_Ots(x) {
    var d = new Date(x),
      /* month = "" + (d.getMonth() + 1),
       day = "" + d.getDate(),
   */
      month = ("0" + (d.getMonth() + 1)).slice(-2);
    day = ("0" + d.getDate()).slice(-2);
  
    year = d.getFullYear();
  
    return year + "-" + month + "-" + day;
  }
  
  function todayDate() {
    var today = new Date();
    return date_format_db(today);
  
  }
  

  function getWeekDatesOts() {
    var current = new Date();     // get current date
    var week_date = [];
    for (var i = 0; i < 7; i++) {
      var weekstart = current.getDate() - current.getDay() + i;
      var x = new Date(current.setDate(weekstart));
      week_date[(i + 1)] = date_format_db(x);
      if (i == 0) {
        week_date[i] = previous_date(x);
      }
  
      //  week_date[i] = date_format_db(x);
  
    }
    return week_date;
  }
  
  function showStatusMessageOts(obj)
  {
    
    $("#myAlert_class").removeClass('color-green');
    $("#myAlert_class").removeClass('color-red');
    myObj= JSON.parse(obj);
if(myObj.status)
{
  $("#myAlert_class").addClass('color-green');
  $("#myAlert_status").html('Success');
     
}else{
  $("#myAlert_class").addClass('color-red');
  $("#myAlert_status").html('Fail');
   
}
    $("#myAlert_msg").html(myObj["msg"]);
  
    $("#myAlert").fadeIn();
    $('#ots-open-modal').click();
    return myret;
  }
  
  function showStatusMessageOtsClose()
  {
    $("#myAlert").fadeOut();
  }
  