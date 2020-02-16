<?php

$rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
include($rootfolder."/connection/connect.php"); 
date_default_timezone_set('Europe/London');


  $from=$_POST["from"];
  $to=$_POST["to"];
  $for=$_POST["for"];
  $driverId=$_POST["id"];
  $invno=$_POST["invno"];

$invno= "INSERT INTO `invoice` (`drvid`, `start`, `end`, `status`,`id`) VALUES ('$driverId', '$from','$to' , 'sent','$invno')";
mysqli_query($conn,$insert_sql);

$subject = "Your Invoice (".$invno.")";

// Always set content-type when sending HTML email
$headers = "";
$headers .= "From: Minicabee <bookings@minicabee.co.uk> \r\n";
$headers .= "Reply-To: Minicabee   <bookings@minicabee.co.uk> \r\n"."X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";

$message="Your Invoice for the period : ".$from." to ".$to." is attached with below link. <br>";
$message=$message."https://minicabee.co.uk/myInvoice/?id".$invno;

$smail=mail("deepakdazzler6@gmail.com",$subject,$message,$headers);

?>