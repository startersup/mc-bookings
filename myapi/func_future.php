
<?php


 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 echo($rootfolder);
  include($rootfolder."/connection/connect.php"); 

    date_default_timezone_set('Europe/London');
   
  
   $date= date("Y-m-d");

    
    $sql="SELECT refid,src,des,dt,time,type,fare,dfare,status,booked_site from register WHERE dt> '".$check."' and status != 'cancelled' ";
  $result=  mysqli_query($conn,$sql);
  
  echo("<br>".$sql);
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

 
