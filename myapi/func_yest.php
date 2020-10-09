
<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
    

    date_default_timezone_set('Europe/London');
   
  
  $date= date("Y-m-d", strtotime(' -1 day'));
    $check=$date;

   
    $sql="SELECT refid,src,des,CONCAT (dt,' & ',time) as dt,time,type,fare,dfare,status,booked_site ,date_format(tiktok,'%d-%m-%Y %H:%i:%S') as booked_time from register WHERE dt= '".$check."'  and status != 'cancelled' ";
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

 
