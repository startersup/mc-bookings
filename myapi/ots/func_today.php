<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

    date_default_timezone_set('Europe/London');
   
  
  $date= date("Y-m-d");
    $check=$date;

   
    $sql="SELECT refid,src,des,CONCAT (dt,' & ',time) as dt,time,name,fare,dfare,status,bookid as booked_site from oregister WHERE dt= '".$check."'  and status != 'cancelled'  ";
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

 
