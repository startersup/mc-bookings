<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  date_default_timezone_set('Europe/London');

  
    $from=$_POST["from"];
    $to=$_POST["to"];
    $for=$_POST["for"];
    $driverId=$_POST["id"];
// $from="2020-1-1";
// $to="2020-1-31";
// $status="('temp','booked','booked-confirmed')";
   
   if(($for == "driver") && ($driverId == "e"))
  {
    $sql = "Select id as drvid,name as dname, mobile as dnum1,mobile2 as dnum2, address as daddress FROM driver where id IN(select distinct drvid from register where status = 'completed' AND (dt>= '".$from."' AND dt<= '".$to."') )";
 
  }else  if(($for == "driver") && ($driverId !== "e"))
  {
   $sql=" SELECT register.refid,register.src,register.des,register.dt,register.time,register.fare,register.dfare,cast((register.fare - register.dfare) as decimal(10, 2)) AS commision,register.drvid,driver.name as dname FROM register INNER JOIN driver ON register.drvid=driver.id where register.status = 'completed' AND (register.dt>= '".$from."' AND register.dt<= '".$to."') and (driver.id ='".$driverId."')";
 $invid_sql="select count(*) as num FROM `invoice` WHERE `tiktok` like '%".date("Y")."%' and `drvid` = '".$driverId."' ";
 $temp_result=mysqli_query($conn,$invid_sql);
 $row1= mysqli_fetch_array($temp_result,MYSQLI_ASSOC);
 $invno= preg_replace("/[a-zA-Z]/", "", $temp)."/". (date("Y")-2000)."/".$row1["num"];
 $temp["no"] =$invno;
   $insert_sql= "INSERT INTO `invoice` (`drvid`, `start`, `end`, `status`,`id`) VALUES ('$driverId', '$from','$to' , 'created','$invno')";
   mysqli_query($conn,$insert_sql);
}
  else if($for == "ALL")
  {
    $sql=" SELECT register.refid,register.src,register.des,register.fare,register.dfare,cast((register.fare - register.dfare) as decimal(10, 2)) AS commision,register.drvid,driver.name as dname FROM register INNER JOIN driver ON register.drvid=driver.id where register.status = 'completed' AND (register.dt>= '".$from."' AND register.dt<= '".$to."')";
  }
   //echo($sql."<br>") ;
   $result=  mysqli_query($conn,$sql);
    
    
    while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
       
       $temp[]=$row;
  }
  if($temp==null)
{
   $temp=array();
}

  echo  json_encode($temp);

  ?>
