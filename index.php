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
<?php include('alert_modal.php'); ?>
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

</html>