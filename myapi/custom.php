<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $from=$_POST["from"];
    $to=$_POST["to"];
    $status=$_POST["status"];

   
  $sql = "SELECT refid,src,des,dt,time,type,fare,dfare,status,booked_site from register WHERE dt>= '".$from."' AND dt<= '".$to."'";

  if($status !== "ALL")
  {
    $sql = $sql +" AND status IN " $status;
  }
    
  //  $sql="SELECT refid,src,des,dt,time,type,fare,dfare,status,booked_site from register WHERE dt= '".$check."' and status != 'cancelled' ";
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