<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>  

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script type="text/javascript" src="./assets/js/custom-calender.js"></script>



<!-- <script src="./assets/js/common.js"></script>
<script src="./assets/js/server.js"></script>
<script src="../assets/js/router.js"></script>
  <script src="./assets/js/sparkline-chart.js"></script>
  <script src="./assets/js/dashboard.js"></script>
  <script src="../assets/js/datatable.js"></script> -->

  <script src="./assets/js/sparkline-chart.js"></script>   
  <script>
  var version=  Math.floor(Math.random() * 100);
  document.write('<script src="./assets/js/common.js?dev=' +version + '"\><\/script>');
  document.write('<script src="./assets/js/server.js?dev=' +version + '"\><\/script>');
  document.write('<script src="./assets/js/router.js?dev=' +version + '"\><\/script>');
  document.write('<script src="./assets/js/dashboard.js?dev=' +version + '"\><\/script>');
  document.write('<script src="./assets/js/datatable.js?dev=' +version + '"\><\/script>'); 
 
  </script>