<?php

$rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
include($rootfolder."/connection/connect.php"); 

  date_default_timezone_set('Europe/London');

$refid= $_POST["refid"];
$sql= "select * from oregister where `refid` = '".$refid."'";

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
