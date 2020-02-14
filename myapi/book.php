<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

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

$ref=$ran;
    
$sql="INSERT INTO `register` (`refid`, `name`, `mail`, `num1`, `num2`, `location`, `info`, `pay`, `src`, `des`,`address1`,`address2`, `dt`, `time`, `passenger`, `luggage`, `type`, `infants`, `jtime`, `fare`, `status`, `via`, `dfare`, `mg`, `ceat`, `miles`,`booked_site`,`drvid`) VALUES ($ref, $_POST['name'], $_POST['mail'], $_POST['mobile1'], $_POST['mobile2'], $_POST['location'], $_POST['info'], $_POST['pay'], $_POST['origin-input'], $_POST['destination-input'],$_POST['address1'],$_POST['address2'], $_POST['date'], $_POST['time'], $_POST['np'], $_POST['nl'], $_POST['cabType'], $_POST['np2'], $_POST['time'], $_POST['fare'], $status, $_POST['via'], $dfare, $_POST['meet'], $_POST['child'], $_POST['distance'],$_POST['booked_site'],$_POST['drvid'])";

 $user= mysqli_query(conn,$sql) ;
 
 if($user)
 {
	 $temp["status"]="success";
	 $temp["message"]="Your Booking Id is "+$ref;
 }
else{
		 $temp["status"]="fail";
	 $temp["message"]="Try Again";
}
 ?>
