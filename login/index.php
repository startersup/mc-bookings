<?php


$q=$_POST["q"];
if($q == "")
{
  $q="admin/";
}


$rootfolder= $_SERVER['DOCUMENT_ROOT']; 

include($rootfolder."/myapi/sessionCheck.php");

if(! $boolSession)
{

  echo ('<script> window.location.href ="' .$link."://". $host . '/login/"</script>');

 exit(0);
}

?>

<!DOCTYPE html>
<html lang="en" id="html">

<?php include('common_header.php'); ?>

<body >


  <!-- Pre Loader Strats  -->
  <?php include('preLoader.php'); ?>
  <!----- Pre Loader Ends ---->

  <!----navbar-starts----->
  <?php include('navbar.php'); ?>
  <!----navbar-ends----->

  <!----sidebar-starts----->
  <?php include('sidebar.php'); ?>
  <!----Sidebar-ends-----> 

  <!---mainbar-starts----->

<div id="pageLoader" > <!---------- Single Page div Starts ---->    
</div> <!---- Single page div ----------->

  <!---mainbar-Ends----->

  <!---modals-section------>

  <!--Notification Modal -->
  <?php include('notification.php'); ?>
  <!--Notification Modal -->

<!------ Secondary Script ----------->
<?php include('secondary_script.php'); ?>
<!-------- Secondary script ends ----->

<!------ Alert Modal ----------->
<?php include('alert_Modal.php'); ?>
<!-------- Alert Modal ends ----->

<!-------- Action Modal ends ----->
<?php include('action_modal.php'); ?>
<!-------- Action Modal ends ----->

  </body>
<script>
  $(document).ready(function () {

    defaultLoader('<?php echo($q); ?>');

});
  </script>

  
<script type="text/javascript">
    $(function () {

      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }

      $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
            'month')]
        }
      }, cb);

      cb(start, end);
    });
  </script>

  
<script>
    function printDiv() {

      var divToPrint = document.getElementById('DivIdToPrint');

      var newWin = window.open('', 'Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

      newWin.document.close();

      setTimeout(function () {
        newWin.close();
      }, 10);

    }
  </script>


  <script>
    $(document).ready(function () {
      $('img').tooltip()
    });
  </script>

</html>