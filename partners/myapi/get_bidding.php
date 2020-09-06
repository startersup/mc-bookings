<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $book_id=$_POST["book_id"];

   
  
    
    $sql="SELECT process.jobid, process.drvid, process.bid,process.fare,driver.name FROM process INNER JOIN driver ON process.drvid=driver.id WHERE process.jobid ='".$bookid."'";
    $result=  mysqli_query($conn,$sql);

 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

     
     $temp[]=$row;

  echo  json_encode($temp);

  ?>