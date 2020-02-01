<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $num_rows=$_POST["numrows"];
    
    $offset=$_POST["offset"];
   
   
    $sql="SELECT id,name,mobile,mobile2,e_mail,status from driver LIMIT $offset,$num_rows ";
  
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


 
