<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $id=$_POST["id"];

   
    $sql="SELECT * from driver where id = '".$id."'";
  
  $result=  mysqli_query($conn,$sql);

 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

     
     $temp[]=$row;

  echo  json_encode($temp);


 
