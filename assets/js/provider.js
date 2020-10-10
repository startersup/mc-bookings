
function loadProvider() {
    var tempData = {};
    var url = myUrl + "myapi/ProviderList.php";
    get_url_response(url,    tempData, "setProvider");
  }
  
  function setProvider(data) {
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

          { data: "id" },
          { data: "tempname" },
          { data: "e_mail" },
          { data: "mobile" },
          { data: "noFleets" },
         { data: "address"},
          { data:"status" },
          { data: null ,defaultContent: '<div class="mc-edit"></div>'}
        ]
      });
      setProviderStatus();
    }

    function setProviderStatus() {
        var table = $("#mc-datatables").DataTable();
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
          var data = this.data();
          var myClass = "";
          var myDiv = '<div class="myClass">myStatus</div>';
          if (data.status == "0") {
            myDiv = myDiv.replace("myStatus", "Inactive");
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