
<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
    

    date_default_timezone_set('Europe/London');
   
  
  
    
   
   
    $sql="SELECT refid,src,des,CONCAT (dt,' & ',time) as dt,time,type,fare,dfare,status,booked_site from register WHERE status = 'cancelled'  ";
  
    
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

 
