<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $from=$_POST["from"];
    $to=$_POST["to"];
    $status=$_POST["status"];
// $from="2020-1-1";
// $to="2020-1-31";
// $status="('temp','booked','booked-confirmed')";
   
  $sql = "SELECT refid,src,des,CONCAT (dt,' & ',time) as dt,time,type,fare,dfare,status,booked_site ,date_format(tiktok,'%d-%m-%Y %H:%i:%S') as booked_time from register WHERE dt>= '".$from."' AND dt<= '".$to."'";

  if(!($status == "ALL"))
  {
    $sql = $sql ." AND status IN ". $status;
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