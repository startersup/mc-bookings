


var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol + "//" + mySite + "/";
var mydataInv = {};
var myId = ["origin-input", "destination-input", "cabType", "booked_site", "fare", "name", "mail", "mobile1", "mobile2", "address1", "address2", "np", "np2", "nl", "location", "info", "drvid", "dfare", "date", "time"];
var myMandId = ["origin-input", "destination-input", "cabType", , "datetimepicker", "booked_site", "fare", "name", "mail", "mobile1", "address1", "address2", "np", "np2", "nl"];
var myClearId = ["route_fare", "route_time", "route_miles", "origin-input", "destination-input", "cabType", "booked_site", "fare", "name", "mail", "mobile1", "mobile2", "address1", "address2", "np", "np2", "nl", "location", "info", "drvid", "dfare", "datetimepicker"];
var myDataBook = {};
var myFareObj = {};


$(document).on('click', '.calculate-fare', function () {

  GetFare();

});

$(document).on('click', '.book-now', function () {
  bookNow();

});

$(document).on('click', '#manual_alloc', function () {

  // ActionDecision('allocate','manual_alloc');

  manual_alloc();


});
$(document).on('click', '.allocate-driver', function () {

  $(".allocate-driver-card").show()
  $(".allocate-driver").hide()
});

$(document).on('click', '.allocate-btn', function () {

  $("#allocated-table").show()
});


function DateSplitter() {
  var myval = document.getElementById('datetimepicker').value;

  if (myval !== '') {
    var dateVal = myval.split(' ')[0];
    document.getElementById('date').value = dateVal.split('/')[2] + "-" + dateVal.split('/')[0] + "-" + dateVal.split('/')[1];

  }


}

function manual_alloc() {
  var myData = {}
  myData["id"] = $('#bookid').html();
  myData["did"] = $('#drvid').val();
  myData["drvpercent"] = $('#drvpercent').val();
  var percent = parseInt(myData["drvpercent"]);
  var fare = parseFloat($('#fare').val());
  var dfare = parseFloat((fare / 100) * percent).toFixed(2);
  dfare = parseFloat((fare - dfare)).toFixed(2);
  $('#dfare').val(dfare);
  myData["new"] = dfare;
  if (myData["new"] == '' || myData["new"] == '0') {
    myAlert('Please enter fare for driver!!!');
    return;
  }
  var myGetUrl = myUrl + "myapi/driver_accept.php";
  get_url_response(myGetUrl, myData);
}
function get_url_response(myGetUrl, mydata) {

  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
    success: function (data) {
      Obj = JSON.parse(data);
      manual_alloc_response(Obj);

    },
    error: function (xhr) {

    }
  });
}

function manual_alloc_response(data) {

  myAlert(data.msg);
  var temp = '<tr><td>' + $('#bookid').html() + '</td><td>' + $("#drvid option:selected").html() + ' - ' + $('#drvid').val() + '</td><td>' + $('#drvpercent').val() + '</td><td>'+$('#dfare').val()+'</td><td>Allocated</td></tr>';
  $('#Allocate_Table').html(temp);

}
function get_response(myGetUrl, mydata) {

  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
    success: function (data) {
      myFareObj = JSON.parse(data);
      setEstimate();

    },
    error: function (xhr) {

    }
  });
}

function get_driver(myGetUrl, mydata) {

  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
    success: function (data) {

      setDriver(data);

    },
    error: function (xhr) {

    }
  });


}

function setDriver(data) {
  driverList = JSON.parse(data);
  var content = '';
  for (var i = 0; i < driverList.length; i++) {
    content = content + '<option value="' + driverList[i]['id'] + '"> ' + driverList[i]['name'] + '</option>';
  }
  document.getElementById('drvid').innerHTML = content;
  document.getElementById("spinnermodal").style.display = "none";
}
function get_Booking(myGetUrl, mydata) {

  $.ajax({
    type: "POST",
    url: myGetUrl,
    data: mydata,
    async: false,
    success: function (data) {
      showStatus(data)
    },
    error: function (xhr) {

    }
  });
}
function showStatus(data) {
  var Obj = JSON.parse(data);
  if (Obj.status == 'success') {
    $('#bookid').html(Obj.bookid);
    $('#bookedAlert').trigger("click");
    $(".footer").hide()
  } else {

  }
}
function setLoad() {

  $("#myAlert").fadeOut();
  document.getElementById("spinnermodal").style.display = "block";
  var myGetUrl = myUrl + "myapi/alldriver.php";
  var myData = {};
  get_driver(myGetUrl, myData)
}

function bookNow() {


  var mydata = {};
  var key = "";
  var val = "";
  DateSplitter();
  $('.form-feild').each(function () {
    key = $(this).attr("name");
    val = $(this).val();
    mydata[key] = val;
  })
  var myGetUrl = myUrl + "myapi/book.php";

  get_Booking(myGetUrl, mydata);

}
function checkSrc() {
  var alertmsg = '';
  if (document.getElementById('origin-input').value != myDataBook["src"]) {
    alertmsg = "PickUp"
  }
  if (document.getElementById('destination-input').value != myDataBook["des"]) {
    alertmsg = " DropOff"
  }
  if (alertmsg === '') {
    return Boolean(1);
  } else {
    alertmsg = alertmsg + ' Values are Changed, Click Yes to Proceed ';
    return confirm(alertmsg)
  }
}
function mandCheck() {
  var x = 1;
  for (var i = 0; i < myMandId.length; i++) {
    var myElement = document.getElementById(myMandId[i]);
    if (myElement.value === '') {
      myElement.classList.add("errStyle");
      x = 0;
      return Boolean(x);
    } else {
      myElement.classList.remove("errStyle");
    }

  }

  return Boolean(x);
}
function setEstimate() {

  var myObj = myFareObj;
  if (document.getElementById('origin-input').value != myDataBook["src"] || document.getElementById('destination-input').value != myDataBook["des"] || (myObj.length === 0)) {
    myAlert("Please Click the Calculate Fare")
  } else {
    document.getElementById('route_miles').innerHTML = myObj["totaldistance"];
    document.getElementById('route_time').innerHTML = myObj["totaltime"];
    var temp = document.getElementById('cabType').value;
    //  document.getElementById('route_fare').innerHTML=myObj[temp]["ofare"][0];
    document.getElementById('fare').value = myObj[temp]["ofare"][0];
  }
  if ($('#fare').val() != '') {
    $(".mc-booking-information").show()
    $(".d-second").css({ "display": "flex" });
    $(".d-first").hide()
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
function GetFare() {

  if (document.getElementById('destination-input').value === '' || document.getElementById('origin-input').value === '') {
    myAlert('Please Fill the PickUp and Drop Points');
  } else {
    document.getElementById("spinnermodal").style.display = "block";
    myDataBook["src"] = document.getElementById('origin-input').value;
    myDataBook["des"] = document.getElementById('destination-input').value;

    var myGetUrl = myUrl + "myapi/get_fare.php";

    get_response(myGetUrl, myDataBook);
  }


}

function myAlert(msg) {

  $("#myAlert_status").html("Alert");
  $("#myAlert_msg").html(msg);
  $("#myAlert_class").removeClass('color-green');
  $("#myAlert_class").removeClass('color-red');

  $("#myAlert_class").addClass('color-red');
  $("#myAlert").fadeIn();

  setTimeout(function(){ 
    $("#myAlert").fadeOut();
   }, 4000);

}


