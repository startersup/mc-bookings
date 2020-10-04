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
    $sql = "Select id as drvid,name as dname, mobile as dnum1,mobile2 as dnum2, address FROM driver where id IN(select distinct drvid from oregister where status = 'completed' AND (dt>= '".$from."' AND dt<= '".$to."') )";
 
  }else  if(($for == "driver") && ($driverId !== "e"))
  {
   $sql=" SELECT oregister.refid,oregister.src,oregister.des,oregister.dt,oregister.time,oregister.fare,oregister.dfare,cast((oregister.fare - oregister.dfare) as decimal(10, 2)) AS commision,oregister.drvid,driver.name as dname,driver.address,driver.e_mail,driver.mobile,driver.mobile2 FROM oregister INNER JOIN driver ON oregister.drvid=driver.id where oregister.status = 'completed' AND (oregister.dt>= '".$from."' AND oregister.dt<= '".$to."') and (driver.id ='".$driverId."')";
 $invid_sql="select count(*) as num FROM `invoice` WHERE `tiktok` like '%".date("Y")."%' and `drvid` = '".$driverId."' ";
 $temp_result=mysqli_query($conn,$invid_sql);
 $row1= mysqli_fetch_array($temp_result,MYSQLI_ASSOC);
 $invno= "INV".preg_replace("/[a-zA-Z]/", "", $driverId)."/". (date("Y")-2000)."/".$row1["num"];
 $temp["no"] =$invno;
  
}else if(($for == "provider") && ($driverId == "e"))
{
  $sql = "Select id as drvid,name as dname, mobile as dnum1,mobile2 as dnum2, address FROM provider where id IN(select distinct drvid from oregister where status = 'completed' AND (dt>= '".$from."' AND dt<= '".$to."') )";

}else  if(($for == "provider") && ($driverId !== "e"))
{
 $sql=" SELECT oregister.refid,oregister.src,oregister.des,oregister.dt,oregister.time,oregister.fare,oregister.dfare,cast((oregister.fare - oregister.dfare) as decimal(10, 2)) AS commision,oregister.drvid,driver.name as dname,driver.address,driver.e_mail,driver.mobile,driver.mobile2 FROM oregister INNER JOIN provider as driver ON oregister.drvid=driver.id where oregister.status = 'completed' AND (oregister.dt>= '".$from."' AND oregister.dt<= '".$to."') and (driver.id ='".$driverId."')";
$invid_sql="select count(*) as num FROM `invoice` WHERE `tiktok` like '%".date("Y")."%' and `drvid` = '".$driverId."' ";
$temp_result=mysqli_query($conn,$invid_sql);
$row1= mysqli_fetch_array($temp_result,MYSQLI_ASSOC);
$invno= "INV".preg_replace("/[a-zA-Z]/", "", $driverId)."/". (date("Y")-2000)."/".$row1["num"];
$temp["no"] =$invno;

}


  else if($for == "all")
  {
    $sql=" SELECT oregister.dt,oregister.time,oregister.refid,oregister.src,oregister.des,oregister.fare,oregister.dfare,cast((oregister.fare - oregister.dfare) as decimal(10, 2)) AS commision,oregister.drvid,driver.name as dname ,provider.name as pname FROM oregister left JOIN driver ON oregister.drvid=driver.id left JOIN provider ON oregister.drvid=provider.id where oregister.status = 'completed' AND (oregister.dt>= '".$from."' AND oregister.dt<= '".$to."')";
  }
   //echo($sql."<br>") ;
   $result=  mysqli_query($conn,$sql);
    
    
    while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
       
       $temp1[]=$row;
  }
  if($temp1==null)
{
   $temp1=array();
}
$temp["list"]=$temp1;
  echo  json_encode($temp);

  ?>
