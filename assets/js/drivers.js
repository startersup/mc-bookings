
function loadDriver() {
    var tempData = {};
    var url = myUrl + "myapi/driver.php";
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
          { data: ""},
          { data:"status" },
          { data: null ,defaultContent: '<button class="mc-add-btn" >Delete</button>'}
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
          $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
          return nRow;
      }
      });
      setDriverStatus()
    }

    function setDriverStatus() {
        var table = $("#mc-datatables").DataTable();
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
          var data = this.data();
          var myClass = "";
          var myDiv = '<div class="myClass">myStatus</div>';
          if (data.status == "0") {
            myDiv = myDiv.replace("myStatus", "Not Active");
            myDiv = myDiv.replace("myClass", "mc-Drv-Active");
          } else if (data.status == "1") {
            myDiv = myDiv.replace("myStatus", "Active");
            myDiv = myDiv.replace("myClass", "mc-Drv-Active");
          } 
          data.status = myDiv;
          this.data(data);
        });
     //   stopLoader();
      }