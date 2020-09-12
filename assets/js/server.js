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
var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var modalPing = "";
var driverList = {};
var bookingPage = '';
var confirmFunction = '';
var mc_datatables_row = {};
var mc_datatables_row_num = -1;
var bookingpass = '';
var currentModalStatus=''


function temLoad() {

  var mydata = {};
  var myGetUrl = myUrl + "myapi/sample2.php";

  get_url_response(myGetUrl, mydata, 'tempLoad2');


}
function tempLoad2(data) {
  console.log(data);
}
function bookingsLoad() {
  if (bookingPage == '') {
    SetParam("today");
    bookingPage = 'today';
  } else {
    clearClass();
    var temp='#'+bookingPage;
      $(temp).addClass("active");
    SetParam(bookingPage);

  }
  var mydata = {};
  var myGetUrl = myUrl + "myapi/alldriver.php";

  get_url_response(myGetUrl, mydata, 'setAllDriver');
}



$(document).on('click', '.confirm_btn ', function () {
  if ($(this).attr("id") == 'yes') {
    window[confirmFunction];
  } else if ($(this).attr("id") == 'no') {
    confirmFunction = '';
  }
  confirmFunction = '';
  document.getElementById("action_popup_btn_close").click()
});


function SetParam(myparam) {
  var mydata = {};
  var myGetUrl = "";
  if (myparam === "today") {
    myGetUrl = myUrl + "myapi/func_today.php";
  } else if (myparam === "yesterday") {
    myGetUrl = myUrl + "myapi/func_yest.php";
  } else if (myparam === "tommorrow") {
    myGetUrl = myUrl + "myapi/func_tmrw.php";
  } else if (myparam === "custom") {
    myGetUrl = myUrl + "myapi/func_custom.php";
  } else if (myparam === "future") {
    myGetUrl = myUrl + "myapi/func_future.php";
  }
  get_booking_response(myGetUrl, mydata);
}
function get_booking_response(myGetUrl, mydata) {

  $('#spinnermodal').show();
 
     setTimeout(function(){
   
  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
       
    success: function (data) {
      setRow(data);
     
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

function setAllDriver(data) {

  driverList = JSON.parse(data);

}

function updateRow()
{
  var myTable = $("#mc-datatables").DataTable();
  mc_datatables_row.status = setStatusView(mc_datatables_row.status);
  myTable.row( mc_datatables_row_num ).data( mc_datatables_row ).draw();
  mc_datatables_row_num=-1;
  mc_datatables_row={};
}
function setRow(data) {
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
        { data: "type" },
        { data: "fare" },
        { data: "status" },
        { data: null, defaultContent: '<div class="mc-edit"></div>' }
      ]
    });
    setStatus();

  }

  $('#spinnermodal').hide();
}
function setStatus() {
  var table = $("#mc-datatables").DataTable();
  table.rows().every(function (rowIdx, tableLoop, rowLoop) {
    var data = this.data();
    data.status = setStatusView(data.status);
    this.data(data);
  });

}

function setStatusView(statusVal)
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

function GetRecordStatus(status) {
  return (
    '<div class="' +
    GLStatusBooking[status]["class"] +
    '">' +
    GLStatusBooking[status]["showstatus"] +
    "</div>"
  );
}

function clearClass() {
  $("#yesterday").removeClass("active");
  $("#today").removeClass("active");
  $("#tommorrow").removeClass("active");
  $("#future").removeClass("active");
}


  $(document).on('click','.li_sidebar',function () {

       
   
    pagerouter($(this).attr('href'));
    return false;


  } );
  
  
   $(document).on('click','.booking',function () {


      clearClass();
      $(this).addClass("active");
      bookingPage = $(this).attr("id");
      SetParam(bookingPage);
   
   

  });

  $(document).on('click','#filter_all',function () {
    filterCheckBox(this);
  } );

  $(document).on('click','.mc-edit',function () {
    var table = $("#mc-datatables").DataTable();
    mc_datatables_row = table.row($(this).parents("tr")).data();
    mc_datatables_row_num = $(this).closest('tr').index();
    // $('#mc-open-modal').trigger('click');

    $("ul.mc-info-tabs li").each(function () { 
      $(this).removeClass('active');    
    });
    $('#basic_info').addClass('active');      


    document.getElementById("mc-open-modal").click();
    clickModal(mc_datatables_row.refid);
  });

  $(document).on('click','.modalToggle',function () {
    var id = $(this).attr("id");
    if (id === "bidding") {
      getModalData(id, document.getElementById("myModalBookId_temp").innerHTML);
    }
  });

  $(document).on('click','#modal_update',function () {
    //confirmNow('update');
    ActionDecision('update','updateBookingDetails');
  });

  function ActionDecision(type,callBack)
  {
    var message = confirmMessage(type);
    var temp= callBack+'();';
    $('.action_confirm_btn_yes').attr('onClick', temp);
    $('#confirm_id_msg').html(message);
    $('#action_popup_btn').click();
  }

  $(document).on('click','.action_confirm_btn_yes',function () {
    $('#action_popup_btn').click();
  });
  $(document).on('click','.action_confirm_btn_no',function () {
    $('#action_popup_btn').click();
  });

 
function confirmMessage(type) {
  var msg = '';
  if (type == 'update') {
    msg = 'Wish to Update and Continue'
  }else  if (type == 'allocate') {
    msg = 'Wish to Allocate and Continue'
  }

  return msg;
}

$(document).on('click','#filter_load',function () {
    searchByFilter();
  });


$(document).on('click', '.modalToggle ', function () {
  if(($(this).attr('id') == 'basic_info') || ($(this).attr('id') == 'passenger_info'))
  {
    $('#modal_update').prop('disabled', false);
  }else{
    $('#modal_update').prop('disabled', true);
  }
});
 

function updateBookingDetails() {

  var myData = {};
// ||  
  $("ul.mc-info-tabs li").each(function () {
    if ($(this).hasClass('active')  ) {

      var temp = "#table_" + ($(this).attr('id')) + " :input"
      $(temp).each(function (e) {
        var key = this.id.replace("modal_booking_", "");;
        var val = this.value;
        myData[key] = val;
      });
    }
  });
  var temp = 'refid';
  myData[temp] = document.getElementById("myModalBookId_temp").innerHTML;
  var myGetUrl = myUrl + "myapi/UpdateBooking.php";
  document.getElementById("mc-open-modal").click();
  get_url_response(myGetUrl, myData, "UpdationAlert");
}
function clickModal(data) {
  clearModal();
  getModalData("basic_info", data);
}

/*
$(document).ready(function () { 

  $("#BookingUpdate").click(function () {
 
  });

  $("#filter_load").click(function () {
    
  });
});
*/
function UpdationAlert(myData) {
 if( showStatusMessage(myData))
 {
  mc_datatables_row.des= 	$("#modal_booking_des").val() ;
  mc_datatables_row.src= 	$("#modal_booking_src").val() ;
  // mc_datatables_row.dt= 	$("#modal_booking_dt").val() ;
  mc_datatables_row.fare= $("#modal_booking_fare").val() ;
  mc_datatables_row.time= $("#modal_booking_time").val() ;
  mc_datatables_row.type= $("#modal_booking_type").val() ;
 }
 updateRow();
 
 
}
function searchByFilter() {
  var mydata = {};
  if (document.getElementById("filter_all").checked) {
    mydata["status"] = document.getElementById("filter_all").value;
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

  var myGetUrl = myUrl + "myapi/custom.php";

  get_booking_response(myGetUrl, mydata);
}
function filterCheckBox(ele) {
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
function clearModal() {
  $("#modal_booking_booked_site").val('') ;
  $("#status_dropdown").val('') ;
  $("#modal_booking_src").val('') ;
  $("#modal_booking_des").val('') ;
  $("#modal_booking_dt").val('') ;
  $("#modal_booking_time").val('') ;
  $("#modal_booking_type").val('') ;
  $("#myModalBookId").innerHTML ;
  $("#myModalBookId").name ;
  
  $("#modal_booking_name").val('') ;
  $("#modal_booking_mail").val('') ;
  $("#modal_booking_num1").val('') ;
  $("#modal_booking_num2").val('') ;
  $("#modal_booking_address1").val('') ;
  $("#modal_booking_address2").val('') ;
  $("#modal_booking_dt").val('') ;
  $("#modal_booking_time").val('') ;
  $("#modal_booking_passenger").val('') ;
  $("#modal_booking_luggage").val('') ;
  $("#modal_booking_location").val('') ;
  $("#modal_booking_info").val('') ;
  $("#modal_booking_type").val('') ;
  $("#modal_booking_fare").val('') ;

  $("#drvid").val('') ;
  $("#amt").val('') ;

  $('.dropdown-set').remove();  
  $('.drvid_class_div').remove();
}
function getModalData(myload, book_id) {
  $('#spinnermodal').show();
    setTimeout(function () {

  var mydata = {};
  var myGetUrl = "";
  mydata["book_id"] = book_id;
  if (myload === "basic_info") {
    modalPing = "basic_info";
    myGetUrl = myUrl + "myapi/basic_info.php";
  }
  get_url_response(myGetUrl, mydata, "setModalData");

}, 300);

}
var objModaldata = {};
function setModalData(myData) {
  var myObj = JSON.parse(myData);
  if (modalPing === "basic_info") {
    document.getElementById("modal_booking_booked_site").value =
      myObj["base"]["booked_site"];

    var x = myObj["base"]["status"];
    document.getElementById("status_dropdown").value = GLStatusBooking[x].showstatus;;
    document.getElementById("modal_booking_src").value = myObj["base"]["src"];
    document.getElementById("modal_booking_des").value = myObj["base"]["des"];
    document.getElementById("modal_booking_dt").value = myObj["base"]["dt"];
    document.getElementById("modal_booking_time").value = myObj["base"]["time"];
    document.getElementById("modal_booking_type").value = myObj["base"]["type"];
    document.getElementById("myModalBookId").innerHTML =
      "Booking Information - ( " + myObj["base"]["refid"] + " )";
    document.getElementById("myModalBookId_temp").innerHTML = myObj["base"]["refid"];

    document.getElementById("modal_booking_name").value = myObj["base"]["name"];
    document.getElementById("modal_booking_mail").value = myObj["base"]["mail"];
    document.getElementById("modal_booking_num1").value = myObj["base"]["num1"];
    document.getElementById("modal_booking_num2").value = myObj["base"]["num2"];
    document.getElementById("modal_booking_address1").value =
      myObj["base"]["address1"];
    document.getElementById("modal_booking_address2").value =
      myObj["base"]["address2"];
    document.getElementById("modal_booking_dt").value = myObj["base"]["dt"];
    document.getElementById("modal_booking_time").value = myObj["base"]["time"];
    document.getElementById("modal_booking_passenger").value = myObj["base"]["passenger"];
    document.getElementById("modal_booking_luggage").value = myObj["base"]["luggage"];
    document.getElementById("modal_booking_location").value =
      myObj["base"]["location"];
    document.getElementById("modal_booking_info").value = myObj["base"]["info"];
    document.getElementById("modal_booking_type").value = myObj["base"]["type"];
    document.getElementById("modal_booking_fare").value = myObj["base"]["fare"];
    document.getElementById("modal_booking_ceat").value = myObj["base"]["ceat"];
    document.getElementById("modal_booking_mg").value = myObj["base"]["mg"];
    document.getElementById("modal_booking_infants").value = myObj["base"]["infants"];


    //setting up message

    var message1_data = "Reference Id : " + myObj["base"].refid + "\n";
    message1_data =
      message1_data +
      "Pick Up : " +
      document.getElementById("modal_booking_address1").value +
      "\n";
    message1_data =
      message1_data +
      "Drop Off : " +
      document.getElementById("modal_booking_address2").value +
      "\n";
    message1_data =
      message1_data +
      "Name : " +
      document.getElementById("modal_booking_name").value +
      "\n";
    message1_data =
      message1_data +
      "Mobile Number : " +
      document.getElementById("modal_booking_num1").value+"\n";
    message1_data =
      message1_data +
      "Cab type : " +
      document.getElementById("modal_booking_type").value +
      "\n";
    message1_data =
      message1_data +
      "Collect fare : " +
      document.getElementById("modal_booking_fare").value +
      "\n";
    message1_data =
      message1_data +
      "Your fare : " +
      document.getElementById("modal_booking_dfare").value +
      "\n";

    var number1_data = myObj["base"].dnum1;

    var message2_data = "Reference Id : " + myObj["base"].refid + "\n";
    message2_data = message2_data + "Driver name :" + myObj["base"].dname+"\n";
    message2_data = message2_data +  "Driver Number :0" + myObj["base"].dnum1 ;

    var number2_data = myObj["base"].num1;

    document.getElementById("id_message1").value = message1_data;
    document.getElementById("id_message2").value = message2_data;

    document.getElementById("id_number1").value = number1_data;
    document.getElementById("id_number2").value = number2_data;

    //End of message part
    if (myObj["base"].status != "comitted" && myObj["base"].status != 'completed') {
      setBid(myObj["bid"]);
    } else {
      var temp = "";
      temp = temp + "<tr>";
      temp = temp + "<td>" + myObj["base"].drvid + "</td>";
      temp = temp + "<td>" + myObj["base"].dname + "</td>";
      temp = temp + "<td>" + myObj["base"].dfare + "</td>";
      temp = temp + "<td>Allocated</td>";
      temp = temp + "</tr>";

      document.getElementById("Allocate_Table").innerHTML = temp;
    }

  }

  $('#spinnermodal').hide();
}
$(document).on('keyup', '#drvid', function () {

  var str = $('#drvid').val().toLowerCase();
  var temp = '<div class="drvid_class_div">';
  for (var i = 0; i < driverList.length; i++) {
    if ((driverList[i].name.toLowerCase()).includes(str)) {
      temp = temp + '<p class="drvid_class_p">' + driverList[i].id + ' - ' + driverList[i].name + '</p>'
    }
  }
  temp = temp + '</div>';
  $('.drvid_class_div').remove();
  $('#drvid').parent().parent().parent().append(temp);
});

$(document).on('click', '.drvid_class_p', function () {
  $('#drvid').val($(this).html());
  $('.drvid_class_div').remove();

});

$(document).on('click', '#status_dropdown', function () {

  var str = $('#status_dropdown').val();
  var p = '';
  var exec = false;
  var attr = [];
  if (str == 'Booked') {
    attr[0] = "booked-confirmed";
    attr[1] = 'cancelled';
    exec = true;
  } else if (str == 'Allocated') {
    attr[0] = "completed";
    attr[1] = 'cancelled';
    exec = true;
  }else if (str == 'Confirmed') {
    attr[0] = "cancelled";
    exec = true;
  }
  if (exec) {
    var temp = '<div  class="dropdown-set show">';
    for (var i = 0; i < attr.length; i++) {
      var ptemp = attr[i];
      p = p + '<p class="status_class_p" name="'+ptemp+'" id="' + GLStatusBooking[ptemp].showstatus + '" >' + GLStatusBooking[ptemp].dropdown_val + '</p>'

    }
    temp = temp + p;
    temp = temp + '<div class="mc-flex">';
    temp = temp + '<button class="button-style change_Status" >Change</button>';
    temp = temp + '<button class="button-cancel-style change_Status" >Cancel</button>';
    temp = temp + '</div>';
    temp = temp + '</div>';
    $('.dropdown-set').remove();
    $('#status_dropdown').parent().append(temp);
  }
});

$(document).on('click', '.status_class_p', function () {

  $("div.dropdown-set p").each(function () {
    $(this).removeClass('class-sky-blue');

  });
  $(this).addClass('class-sky-blue');

  // $('#status_dropdown').val();
  // $('.dropdown-set').remove();

});

$(document).on('click', '#send_sms', function () {
  var myData={};
  myData["bookid"]=document.getElementById("myModalBookId_temp").innerHTML;
  $('#message_status_id').val('');
  myData["to"]=document.getElementById("id_number2").value;
  myData["msg"]=document.getElementById("id_message2").value;
  myData["smsType"]="Passenger";
 

  var myGetUrl = myUrl + "myapi/message.php";
  get_url_response(myGetUrl, myData, "passengerMessageStatus");


});

function passengerMessageStatus(data)
{
 var msgData= messageStatus(data);
 $('#message_status_id').val(msgData);
  var myData={};
  myData["bookid"]=document.getElementById("myModalBookId_temp").innerHTML;

  
  myData["to"]='+44'+document.getElementById("id_number1").value;
  myData["msg"]=document.getElementById("id_message1").value;
  myData["smsType"]="Driver";
  var myGetUrl = myUrl + "myapi/message.php";
  get_url_response(myGetUrl, myData, "driverMessageStatus");
}
function driverMessageStatus(data)
{
  
  var msgData= messageStatus(data);
  msgData = msgData+ $('#message_status_id').val()
 // $('#message_status_id').val(msgData);
  alertData='{"response":"success","status":"success","msg":"'+msgData+'"}';
  showStatusMessage(alertData);

}
function messageStatus(data)
{
  var dataObj = JSON.parse(data);
  if(dataObj.status == "accepted" || dataObj.status == "queued" || dataObj.status == "sending" || dataObj.status == "sent" 
  || dataObj.status == "delivered" )
  {
    return 'Message Sent Successfully' ;
  }
  
  if(dataObj.status == "failed")
  {
    return 'Unable to send message ' ;
  }




}
$(document).mouseup(function(e){
  var container = $(".dropdown-set");

  // If the target of the click isn't the container
  if(!container.is(e.target) && container.has(e.target).length === 0){
      container.remove();
  }

  container = $(".drvid_class_div");

  // If the target of the click isn't the container
  if(!container.is(e.target) && container.has(e.target).length === 0){
      container.remove();
  }
});

$(document).on('click', '.change_Status', function () {

  if ($(this).html() == 'Change') {
    
    $("div.dropdown-set p").each(function () {
      if ($(this).hasClass('class-sky-blue')) {
        var myData={}
        var temp = $(this).attr("id");
        $('#status_dropdown').val(temp);
        temp = $(this).attr("name");
        currentModalStatus=temp;
        myData["id"]=document.getElementById("myModalBookId_temp").innerHTML;
        var myGetUrl = myUrl + "myapi/"+GLStatusBooking[temp].api+".php";
        $('.dropdown-set').remove();
        document.getElementById("mc-open-modal").click();
        get_url_response(myGetUrl, myData, "changeStatus");
      }
    });
  } else{
    $('.dropdown-set').remove();
  }
 

});

function changeStatus(data){
  if( showStatusMessage(data))
 {
  mc_datatables_row.status= 	currentModalStatus ;
 }
 currentModalStatus='';
 updateRow();
 
}

function manual_alloc_response(data)
{
   showStatusMessage(data);
   document.getElementById("mc-open-modal").click();
}
function manual_alloc() {
  var myData={}
  myData["id"]=document.getElementById("myModalBookId_temp").innerHTML;
  myData["did"]=$('#drvid').val().substring(0, ($('#drvid').val().indexOf("- ")-1));
  myData["new"]=  $('#amt').val();

  if(myData["new"]=='' || myData["new"]=='0')
  {
    alertData='{"response":"fail","msg":"Please enter fare for driver!!!"}';
    showStatusMessage(alertData);
    return;
  }
        var myGetUrl = myUrl + "myapi/driver_accept.php";
        get_url_response(myGetUrl, myData, "manual_alloc_response");
}
$(document).on('click', '#manual_alloc', function () {

 // ActionDecision('allocate','manual_alloc');

  manual_alloc();


});


function setBid(myObj_bid) {
  var temp = "";
  for (var i = 0; i < myObj_bid.length; i++) {
    temp = temp + "<tr>";
    temp = temp + "<td>" + myObj_bid[i].drvid + "</td>";
    temp = temp + "<td>" + myObj_bid[i].name + "</td>";
    temp = temp + "<td>" + myObj_bid[i].bid + "</td>";
    temp = temp + '<td><a class="myAllocate">Allocate</a></td>';
    temp = temp + "</tr>";
  }

  document.getElementById("Allocate_Table").innerHTML = temp;
}
function date_format_db(x) {
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

function previous_date(today) {
  today.setDate(today.getDate() - 1);
  return date_format_db(today);
}
function getWeekDates() {
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

function showStatusMessage(obj)
{
  myObj= JSON.parse(obj);
  var myret=false;
	// alert(myObj["status"]+" "+myObj["message"]);
  
  $("#myAlert_status").html(myObj["status"]);
  $("#myAlert_msg").html(myObj["msg"]);
  $("#myAlert_class").removeClass('color-green');
  $("#myAlert_class").removeClass('color-red');
  if( (myObj["response"].toLowerCase()) === 'success'  )
  {
    $("#myAlert_class").addClass('color-green');
    myret=true;
  }
  else{
    $("#myAlert_class").addClass('color-red');
  }
  $("#myAlert").fadeIn();

  return myret;
}

function showStatusMessageClose()
{
  $("#myAlert").fadeOut();
}
