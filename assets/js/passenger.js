
function loadPassenger() {
  var tempData = {};
  var url = myUrl + "myapi/passengerList.php";
  get_url_response(url,    tempData, "setPassenger");
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
        { data: "tcount"},
        { data:"tfare" },
        { data: null ,defaultContent: '<button>Delete</button>'}
      ],
      "fnRowCallback": function (nRow, aData, iDisplayIndex) {
        $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
        return nRow;
    }
    });
    
  }