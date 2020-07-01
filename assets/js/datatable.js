function otherFunction() {
  document.getElementById("mc-dropdown").classList.toggle("show");
}
function statuschange() {
  document.getElementById("open-status").classList.toggle("show");
}


window.onclick = function(event) {
  if (!event.target.matches(".mc-others-icon")) {
    var dropdowns = document.getElementsByClassName("dropdown-set");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

$(document).ready(function() {
  $("#myInput").on("keyup", function() {
    var value = $(this)
      .val()
      .toLowerCase();
    $("#mc-datatables tr").filter(function() {
      $(this).toggle(
        $(this)
          .text()
          .toLowerCase()
          .indexOf(value) > -1
      );
    });
  });
});

$(document).ready(function() {
  $("#mc-datatables").DataTable({
    dom: "Bfrtip",
    colReorder: true,
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
    lengthChange: false,
    searching: false,
    fixedHeader: true,
    pageLength: 50,
    scrollY: "700px",
    scrollX: true,
    ordering: false,
    scrollCollapse: true,
    paging: true,
          "language": {
      "emptyTable": "Sorry No Bookings Available"
    },
    fixedColumns: {
      leftColumns: 1,
      rightColumns: 1
    }
  });
});

function alerttest()
{

    alert("jhcsd");

}
var count =0;
function addrow()
{
    count++;
    var t = $('#mc-datatables').DataTable();
    t.row.add( [
        'BRT'+count,
        '.Gatwick',
        'Heathrow Airport Terminal Number 2',
        '.West sussex crawley road, horsham Rh11 1nf',
        '.12/07/2019 12:45',
        'Saloon x 1',
        '234 GBP',
        '<div class="green-status">Booked</div>',
        'Edit'
    ] ).draw( false );
}

function addcustomrow()
{
    for(var i=0;i<80;i++)
    {
        addrow();
    }
}