<?php


$q=$_POST["q"];
if($q == "")
{
  $q="admin/";
}
?>

<!DOCTYPE html>
<html lang="en" id="html">

<?php include('common_header.php'); ?>

<body onload="defaultLoader('<?php echo($q); ?>');">


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

</body>


</html>