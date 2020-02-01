<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $book_id=$_POST["book_id"];

   
  
    
    $sql="SELECT booked_site,status,src,des,dt,time,type from register WHERE refid> '".$book_id."' ";
    $result=  mysqli_query($conn,$sql);

 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

     
     $temp[]=$row;

  echo  json_encode($temp);


 
