<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  $name=$_POST['name'];
  $mail=$_POST['mail'];
  $mobile1=$_POST['mobile1'];
  $mobile2=$_POST['mobile2'];
  $location=$_POST['location'];
  $info=$_POST['info'];
  $pay=$_POST['pay'];
  $origin_input=$_POST['origin-input'];
  $destination_input=$_POST['destination-input'];
  $address1=$_POST['address1'];
  $address2=$_POST['address2'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $np=$_POST['np'];
  $nl=$_POST['nl'];
  $cabType=$_POST['cabType'];
  $np2=$_POST['np2'];
  $time=$_POST['time'];
  $fare=$_POST['fare'];
  $status=$status;
  $via=$_POST['via'];
  $dfare=$dfare;
  $meet=$_POST['meet'];
  $child=$_POST['child'];
  $distance=$_POST['distance'];
  $booked_site=$_POST['booked_site'];
  $drvid=$_POST['drvid'];
 if($_POST["drvid"]=="")
 {
	 $dfare=$_POST["fare"]/100;    
 $dfare=$dfare*75;
 $dfare=number_format($dfare,2); 
 }else
 {
	 $dfare = $_POST["dfare"];
 }

      $code=0;
   while($code==0)
{
    $check=0;
$ran=mt_rand(1000,99999);
$ret="RET".$ran;
$ran="MCE".$ran;

$result=mysqli_query($conn,"SELECT * from register WHERE 1");
 while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
 {
    if($ran==$row["refid"])
    {
        $check=1;
      
    }
}

if($check==0)
{
    $code=1;
}
// ;
// echo($row);


}
if($meet == "")
{
    $meet="0";
}
if($child =="")
{
    $child="0";
}

$ref=$ran;
    
$sql="INSERT INTO `register` (`refid`, `name`, `mail`, `num1`, `num2`, `location`, `info`, `pay`, `src`, `des`,`address1`,`address2`, `dt`, `time`, `passenger`, `luggage`, `type`, `infants`, `jtime`, `fare`, `status`, `via`, `dfare`, `mg`, `ceat`, `miles`,`booked_site`,`drvid`) 
VALUES ('$ref', '$name', '$mail', '$mobile1', '$mobile2', '$location', '$info', '$pay', '$origin_input', '$destination_input','$address1','$address2', '$date', '$time', '$np', '$nl', '$cabType', '$np2', '$time', $fare, '$status', '$via', $dfare, $meet, $child, '$distance','$booked_site','$drvid')";

 $user= mysqli_query($conn,$sql) ;
 
 if($user)
 {
	 $temp["status"]="success";
	 $temp["message"]="Your Booking Id is "+$ref;
 }
else{
		 $temp["status"]="fail";
	 $temp["message"]="Try Again";
}

echo json_encode($temp);
 ?>
