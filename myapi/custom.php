<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  include($rootfolder."/myapi/sessionCheck.php"); 

  include($rootfolder."/myapi/booking_cols.php"); 
  
    $from=$_POST["from"];
    $to=$_POST["to"];
    $status=$_POST["status"];
// $from="2020-1-1";
// $to="2020-1-31";
// $status="('temp','booked','booked-confirmed')";
   
  $sql = "SELECT ".$view_cols." from register WHERE dt>= '".$from."' AND dt<= '".$to."'".$_SESSION["registerClause"];

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
//$resp["sql"]=$sql;
  echo  json_encode($temp);

  ?>