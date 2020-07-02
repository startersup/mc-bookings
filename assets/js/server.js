var text =
  "{" +
  ' "booked" : { "class":"green-status" , "showstatus":"Booked" },' +
  ' "booked-confirmed" : { "class":"green-status" , "showstatus":"Confirmed" },' +
  ' "comitted" : { "class":"green-status" , "showstatus":"Allocated" },' +
  ' "cancelled" : { "class":"green-status" , "showstatus":"Cancelled" },' +
  ' "completed" : { "class":"green-status" , "showstatus":"Completed" }' +
  "}";
var text_filter_name = "ALL Booked Confirmed Allocated Completed Cancelled";
var text_filter_value =
  "ALL booked booked-confirmed comitted completed cancelled";
var obj_status = JSON.parse(text);
var loadBooking = "Today";
var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var modalPing = "";
var driverList = {};
function startLoader() {
  //document.getElementById("spinnermodal").style.display = "block";

  $("#spinnermodal").fadeIn(200);
}
function stopLoader() {
  //document.getElementById("spinnermodal").style.display = "none";

  $("#spinnermodal").fadeOut(200);
}
function pageLoad() {
  SetParam("today");
  var mydata = {};
  var myGetUrl = myUrl + "myapi/alldriver.php";

  get_url_response(myGetUrl, mydata, 'setAllDriver');
}
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
  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
    success: function (data) {
      setRow(data);
      // document.getElementById("spinnermodal").style.display = "none";
      //window[functionName](data);
    },
    error: function (xhr) {
      // document.getElementById("spinnermodal").style.display = "none";
      //  Server_Response_Fail(xhr.responseText);
    }
  });
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
function setRow(data) {
  var myTable = $("#mc-datatables").DataTable();
  myTable.destroy();
  var result = JSON.parse(data);
  if (result.length === 0) {
    $("#display_data").css('display', 'none');
    $("#empty_state").css('display', 'block');
    stopLoader();
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
}
function setStatus() {
  var table = $("#mc-datatables").DataTable();
  table.rows().every(function (rowIdx, tableLoop, rowLoop) {
    var data = this.data();
    var myClass = "";
    var myDiv = '<div class="myClass">myStatus</div>';
    if (data.status == "completed") {
      myDiv = myDiv.replace("myStatus", "Completed");
      myDiv = myDiv.replace("myClass", "mc-cl-Completed");
    } else if (data.status == "booked") {
      myDiv = myDiv.replace("myStatus", "Booked");
      myDiv = myDiv.replace("myClass", "mc-cl-Booked");
    } else if (data.status == "booked-confirmed") {
      myDiv = myDiv.replace("myStatus", "Confirmed");
      myDiv = myDiv.replace("myClass", "mc-cl-Confirmed");
    } else if (data.status == "cancelled") {
      myDiv = myDiv.replace("myStatus", "Cancelled");
      myDiv = myDiv.replace("myClass", "mc-cl-Cancelled");
    } else if (data.status == "comitted") {
      myDiv = myDiv.replace("myStatus", "Comitted");
      myDiv = myDiv.replace("myClass", "mc-cl-Comitted");
    }
    data.status = myDiv;
    this.data(data);
  });
  stopLoader();
}

/*
function setRow(data)
{

    var obj = JSON.parse(data);
    var myTable = $('#mc-datatables').DataTable();
    var loop = obj.length;
    var editRec='<div class="mc-edit"></div>';
    var statusRec ='';
    myTable.clear().draw();
    for(var i=0;i<loop;i++)
    {
        statusRec= GetRecordStatus(obj[i]["status"]);
        myTable.row.add( [
            obj[i]["refid"],
            obj[i]["booked_site"],
            obj[i]["src"],
            obj[i]["des"],
            obj[i]["dt"]+' '+obj[i]["time"],
            obj[i]["type"],
            obj[i]["fare"],
            statusRec,           
            editRec
        ] ).draw( false );
    }
    document.getElementById("spinnermodal").style.display = "none";

} */
function GetRecordStatus(status) {
  return (
    '<div class="' +
    obj_status[status]["class"] +
    '">' +
    obj_status[status]["showstatus"] +
    "</div>"
  );
}

function clearClass() {
  $("#yesterday").removeClass("active");
  $("#today").removeClass("active");
  $("#tommorrow").removeClass("active");
  $("#future").removeClass("active");
}
$(document).ready(function () {
  $(".booking").click(function () {
    clearClass();
    $(this).addClass("active");
    startLoader();
    var id = $(this).attr("id");

    SetParam(id);
  });
  $('.li_sidebar').click(function(){
       pagerouter($(this).attr('href'));
      return false;
     });

  $("#filter_all").click(function () {
    filterCheckBox(this);
  });

  $("#mc-datatables tbody").on("click", ".mc-edit", function () {
    var table = $("#mc-datatables").DataTable();
    var data = table.row($(this).parents("tr")).data();
    // $('#mc-open-modal').trigger('click');
    document.getElementById("mc-open-modal").click();
    clickModal(data.refid);
  });
  function clickModal(data) {
    clearModal();
    getModalData("basic_info", data);
  }
  $(".modalToggle").click(function () {
    var id = $(this).attr("id");
    if (id === "bidding") {
      getModalData(id, document.getElementById("myModalBookId_temp").innerHTML);
    }
  });

  $("#BookingUpdate").click(function () {
    var myData = {};
    $("#passenger :input").each(function (e) {

      var key = this.name;
      var val = this.value;
      myData[key] = val;
    });
    myData["refid"] = document.getElementById("myModalBookId_temp").innerHTML;
    var myGetUrl = myUrl + "myapi/UpdateBooking.php";

    get_url_response(myGetUrl, myData, "UpdationAlert");
  });

  $("#filter_load").click(function () {
    searchByFilter();
  });
});

function UpdationAlert(myData) {
  console.log(myData);
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
  document.getElementById("modal_booking_site").value = "";
  document.getElementById("modal_booking_status").value = "";
  document.getElementById("modal_booking_pickup").value = "";
  document.getElementById("modal_booking_dropoff").value = "";
  document.getElementById("modal_booking_date").value = "";
  document.getElementById("modal_booking_time").value = "";
  document.getElementById("modal_booking_cab_type").value = "";
  document.getElementById("myModalBookId").innerHTML = "";
  document.getElementById("myModalBookId").name = "";

  document.getElementById("modal_booking_name").value = "";
  document.getElementById("modal_booking_mail").value = "";
  document.getElementById("modal_booking_num1").value = "";
  document.getElementById("modal_booking_num2").value = "";
  document.getElementById("modal_booking_address1").value = "";
  document.getElementById("modal_booking_address2").value = "";
  document.getElementById("modal_booking_dt").value = "";
  document.getElementById("modal_booking_tm").value = "";
  document.getElementById("modal_booking_np").value = "";
  document.getElementById("modal_booking_nl").value = "";
  document.getElementById("modal_booking_location").value = "";
  document.getElementById("modal_booking_info").value = "";
  document.getElementById("modal_booking_type").value = "";
  document.getElementById("modal_booking_fare").value = "";
}
function getModalData(myload, book_id) {
  var mydata = {};
  var myGetUrl = "";
  mydata["book_id"] = book_id;
  if (myload === "basic_info") {
    modalPing = "basic_info";
    myGetUrl = myUrl + "myapi/basic_info.php";
  }
  get_url_response(myGetUrl, mydata, "setModalData");
}
var objModaldata = {};
function setModalData(myData) {
  var myObj = JSON.parse(myData);
  if (modalPing === "basic_info") {
    document.getElementById("modal_booking_site").value =
      myObj["base"]["booked_site"];
    document.getElementById("modal_booking_status").value = myObj["base"]["status"];
    document.getElementById("modal_booking_pickup").value = myObj["base"]["src"];
    document.getElementById("modal_booking_dropoff").value = myObj["base"]["des"];
    document.getElementById("modal_booking_date").value = myObj["base"]["dt"];
    document.getElementById("modal_booking_time").value = myObj["base"]["time"];
    document.getElementById("modal_booking_cab_type").value = myObj["base"]["type"];
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
    document.getElementById("modal_booking_tm").value = myObj["base"]["time"];
    document.getElementById("modal_booking_np").value = myObj["base"]["passenger"];
    document.getElementById("modal_booking_nl").value = myObj["base"]["luggage"];
    document.getElementById("modal_booking_location").value =
      myObj["base"]["location"];
    document.getElementById("modal_booking_info").value = myObj["base"]["info"];
    document.getElementById("modal_booking_type").value = myObj["base"]["type"];
    document.getElementById("modal_booking_fare").value = myObj["base"]["fare"];
    document.getElementById("modal_booking_Child_ceat").value = myObj["base"]["ceat"];
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
      document.getElementById("modal_booking_num1").value +
      "/" +
      document.getElementById("modal_booking_num2").value +
      "\n";
    message1_data =
      message1_data +
      "Cab type : " +
      document.getElementById("modal_booking_cab_type").value +
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
    message2_data = message2_data + "Driver name :" + myObj["base"].dname;
    message2_data =
      message2_data +
      "Driver Number :" +
      myObj["base"].dnum1 +
      " / " +
      myObj["base"].dnum2;

    var number2_data = myObj["base"].num1;

    document.getElementById("id_message1").value = message1_data;
    document.getElementById("id_message2").value = message2_data;

    document.getElementById("id_number1").value = number1_data;
    document.getElementById("id_number2").value = number2_data;

    //End of message part
    if (myObj.length > 0 && myObj["base"].status != "comitted") {
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

    temp = '';
    for (var x = 0; driverList.length; x++) {
      temp = temp + '<option val="' + driverList[x]["id"] + '" >' + driverList[x]["name"] + ' - ' + driverList[x]["id"] + '</option>'
    }
    document.getElementById("drvid").innerHTML = temp;

  }
}

function setBid(myObj) {
  var temp = "";
  for (var i = 1; i < myObj.length; i++) {
    temp = temp + "<tr>";
    temp = temp + "<td>" + myObj[i].drvid + "</td>";
    temp = temp + "<td>" + myObj[i].name + "</td>";
    temp = temp + "<td>" + myObj[i].bid + "</td>";
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

function todayDate()
{
  var today = new Date();
  return date_format_db(today);
}

function getWeekDates() {
  var current = new Date();     // get current date
  var week_date = [];
  for (var i = 0; i < 7; i++) {
    var weekstart = current.getDate() - current.getDay() + i;
    var x = new Date(current.setDate(weekstart));
    week_date[i] = date_format_db(x);

  }
  return week_date;
}