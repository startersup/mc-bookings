<?php

$rootfolder= $_SERVER['DOCUMENT_ROOT']; 
include($rootfolder."/connection/connect.php");
include($rootfolder."/myapi/sessionCheck.php"); 
date_default_timezone_set('Europe/London');  
$date= date("Y-m-d");
$time_from = date("H").":00";
$time_to = (date("H")+1).":00";
$temp_dashboard["interval"] = $time_from ." to ".$time_to;
$week_days="('".date("Y-m-d", strtotime("last week saturday"))."','".date("Y-m-d", strtotime("last week sunday"))."','".date("Y-m-d", strtotime("this week monday"))."','".date("Y-m-d", strtotime("this week tuesday"))."','".date("Y-m-d", strtotime("this week wednesday"))."','".date("Y-m-d", strtotime("this week thursday"))."','".date("Y-m-d", strtotime("this week friday"))."','".date("Y-m-d", strtotime("this week saturday"))."')";

/*
$date_array[0]=date("Y-m-d", strtotime("last week sunday"))   ;
$date_array[1]=date("Y-m-d", strtotime("this week monday"))   ;
$date_array[2]=date("Y-m-d", strtotime("this week tuesday"))  ;
$date_array[3]=date("Y-m-d", strtotime("this week wednesday"));
$date_array[4]=date("Y-m-d", strtotime("this week thursday")) ;
$date_array[5]=date("Y-m-d", strtotime("this week friday"))   ;
$date_array[6]=date("Y-m-d", strtotime("this week saturday")) ;
$count =count($date_array);  */

$sql="SELECT ROUND(sum(fare),2) as value,DT as date FROM `register` WHERE dt in ".$week_days." GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2= array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row;
}
 $temp_dashboard["totalFare"]=$row2;

$sql="SELECT count(*) as value,DT as date FROM `register` WHERE dt in ".$week_days." and status = 'booked' GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2= array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row;
} 
$temp_dashboard["totalBooked"]=$row2;


$sql="SELECT count(*) as value,DT as date FROM `register` WHERE dt in ".$week_days." and status = 'booked-confirmed' GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row;
}
$temp_dashboard["unalloc"]=$row2;

$sql="SELECT count(*) as value,DT as date FROM `register` WHERE dt in ".$week_days." and  GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row;
}
$temp_dashboard["allBooking"]=$row2;

$sql="SELECT count(*) as value,DT as date FROM `register` WHERE dt in ".$week_days." and status ='completed' GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row; 
}
$temp_dashboard["completed"]=$row2;

$sql="SELECT count(*) as value,DT as date FROM `register` WHERE dt in ".$week_days." and status ='cancelled' GROUP BY dt;";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row;
}
$temp_dashboard["cancelled"]=$row2;

$sql="SELECT id,name,concat(mobile,' / ',mobile2 ) as contact,car_type FROM `driver` WHERE `today_status` =1";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $row2[]=$row;
}

$temp_dashboard["driverStatus"]=$row2;

$sql="SELECT id,name,concat(mobile,' / ',mobile2 ) as contact FROM `provider` ";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $row2[]=$row;
}

$temp_dashboard["providerStatus"]=$row2;


$sql="SELECT A.refid, concat(A.num1,' / ',A.num2) as contact,B.name FROM register as A inner join driver as B on A.drvid = B.id WHERE A.time  <= $time_from and A.time > $time_to and A.dt ='$date' and A.status ='comitted' ";
$result=  mysqli_query($conn,$sql);
$row2=array();
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
    $row2[]=$row; 
}
$temp_dashboard["ongoingJob"]=$row2;

if($temp_dashboard==null)
{
   $temp_dashboard=array();
}
 echo  json_encode($temp_dashboard);


  ?>
