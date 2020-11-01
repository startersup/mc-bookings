<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  include($rootfolder."/myapi/sessionCheck.php"); 
  include($rootfolder."/myapi/booking_cols.php"); 
    date_default_timezone_set('Europe/London');
   
  
  $date= date("Y-m-d");
    $check=$date;

   
    $sql="SELECT ".$view_cols." from register WHERE dt= '".$check."'  and status != 'cancelled'  ".$_SESSION["registerClause"];
  $result=  mysqli_query($conn,$sql);
  
  
//   if(mysqli_num_rows ( $result ) !== 0)
//   {
      
 
// }
// else
// {
    
//     $temp="";
//     echo  json_encode($temp);
// }

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

 
