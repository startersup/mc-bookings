<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  date_default_timezone_set('Europe/London');
  include($rootfolder."/myapi/sessionCheck.php"); 
  
    $from=$_POST["from"];
    $to=$_POST["to"];
    $for=$_POST["for"];
    $driverId=$_POST["id"];
// $from="2020-1-1";
// $to="2020-1-31";
// $status="('temp','booked','booked-confirmed')";
   
   if(($for == "driver") && ($driverId == "e"))
  {
    $sql = "Select id as drvid,name as dname, mobile as dnum1,mobile2 as dnum2, address FROM driver where id IN(select distinct drvid from register where status = 'completed' AND (dt>= '".$from."' AND dt<= '".$to."') ".$_SESSION["registerClause"]." )";
 
  }else  if(($for == "driver") && ($driverId !== "e"))
  {
   $sql=" SELECT register.refid,register.src,register.des,register.dt,register.time,register.fare,register.dfare,cast((register.fare - register.dfare) as decimal(10, 2)) AS commision,register.drvid,driver.name as dname,driver.address,driver.e_mail,driver.mobile,driver.mobile2 FROM register INNER JOIN driver ON register.drvid=driver.id where register.status = 'completed' AND (register.dt>= '".$from."' AND register.dt<= '".$to."') and (driver.id ='".$driverId."')".$_SESSION["registerClause"];
 $invid_sql="select count(*) as num FROM `invoice` WHERE `tiktok` like '%".date("Y")."%' and `drvid` = '".$driverId."' ";
 $temp_result=mysqli_query($conn,$invid_sql);
 $row1= mysqli_fetch_array($temp_result,MYSQLI_ASSOC);
 $invno= "INV".preg_replace("/[a-zA-Z]/", "", $driverId)."/". (date("Y")-2000)."/".$row1["num"];
 $temp["no"] =$invno;
  
}else if(($for == "provider") && ($driverId == "e"))
{
  $sql = "Select id as drvid,name as dname, mobile as dnum1,mobile2 as dnum2, address FROM provider where id IN(select distinct drvid from register where status = 'completed' AND (dt>= '".$from."' AND dt<= '".$to."') ".$_SESSION["registerClause"].")";

}else  if(($for == "provider") && ($driverId !== "e"))
{
 $sql=" SELECT register.refid,register.src,register.des,register.dt,register.time,register.fare,register.dfare,cast((register.fare - register.dfare) as decimal(10, 2)) AS commision,register.drvid,driver.name as dname,driver.address,driver.e_mail,driver.mobile,driver.mobile2 FROM register INNER JOIN provider as driver ON register.drvid=driver.id where register.status = 'completed' AND (register.dt>= '".$from."' AND register.dt<= '".$to."') and (driver.id ='".$driverId."')".$_SESSION["registerClause"];
$invid_sql="select count(*) as num FROM `invoice` WHERE `tiktok` like '%".date("Y")."%' and `drvid` = '".$driverId."' ";
$temp_result=mysqli_query($conn,$invid_sql);
$row1= mysqli_fetch_array($temp_result,MYSQLI_ASSOC);
$invno= "INV".preg_replace("/[a-zA-Z]/", "", $driverId)."/". (date("Y")-2000)."/".$row1["num"];
$temp["no"] =$invno;

}


  else if($for == "all")
  {
    $sql=" SELECT register.dt,register.time,register.refid,register.src,register.des,register.fare,register.dfare,cast((register.fare - register.dfare) as decimal(10, 2)) AS commision,register.drvid,ifnull (driver.name,'') as dname ,ifnull (provider.name,'') as pname FROM register left JOIN driver ON register.drvid=driver.id left JOIN provider ON register.drvid=provider.id where register.status = 'completed' AND (register.dt>= '".$from."' AND register.dt<= '".$to."')";
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
