
function loadPassenger() {
  var tempData = {};
  var url = myUrl + "myapi/passengerList.php";
  get_url_response(myGetUrl,    tempData, "setPassenger");
}

function setPassenger(data) {
    var myTable = $("#mc-datatables").DataTable();
    myTable.destroy();
    var result = JSON.parse(data);
    $("#mc-datatables").DataTable({
      data: result,
      lengthChange: false,
      searching: false,
      dom: "Bfrtip",
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
      columns: [
        { data: null },
        { data: "name" },
        { data: "mail" },
        { data: "num1" },
        { data: "num2" },
        { data: null},
        { data:null },
        { data: null },
        { data: null }
      ]
    });
    
  }