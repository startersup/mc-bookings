<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $book_id=$_POST["book_id"];

   
  
    
    $sql="SELECT `refid`,`name`,`mail`,`num1`,`num2`,`location`,`info`,`pay`,`address1`,`address2`,`dt`,`time`,`passenger`,`luggage`,`type`,`fare`,`dfare`,`drvid` FROM `register` WHERE refid ='".$book_id."' ";
    $result=  mysqli_query($conn,$sql);

 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

     
     $temp[]=$row;

  echo  json_encode($temp);

  ?>