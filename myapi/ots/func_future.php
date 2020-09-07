
<?php


 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 

  include($rootfolder."/connection/connect.php"); 

    date_default_timezone_set('Europe/London');
   
  
   $date= date("Y-m-d");

    
    $sql="SELECT refid,src,des,CONCAT (dt,' & ',time) as dt,time,name,fare,dfare,status,bookid as booked_site from oregister WHERE dt> '".$date."' and status != 'cancelled' ";
  
 // echo($sql);
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

 
