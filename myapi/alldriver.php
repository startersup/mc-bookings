<?php



 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

    $sql="SELECT id,name from driver where 1";
  
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


 
