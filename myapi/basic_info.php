<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


  
    $book_id=$_POST["book_id"];

   $book_id="MCE44057";
  
    
    $sql ="SELECT register.refid,register.booked_site,register.status,register.src,register.des,register.name,register.mail,register.num1,register.num2,register.location,register.info,register.pay,register.address1,register.address2,register.dt,register.time,register.passenger,register.luggage,register.type,register.fare,register.dfare,register.drvid,driver.name as dname,driver.mobile as dnum1,driver.mobile2 as dnum2 FROM register INNER JOIN driver ON register.drvid=driver.id WHERE register.refid ='".$book_id."' ";

    $result=  mysqli_query($conn,$sql);

    
    $sql2="SELECT process.jobid, process.drvid, process.bid,process.fare,driver.name FROM process INNER JOIN driver ON process.drvid=driver.id WHERE process.jobid ='".$book_id."'";
    $result2=  mysqli_query($conn,$sql2);
 // echo($sql2."<br>");

 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

     
     $temp[]=$row;

     $i=0;
     while( $row2= mysqli_fetch_array($result2,MYSQLI_ASSOC))
     {
   
        $temp[]=$row2;
        $i++;
   }

  echo  json_encode($temp);

  ?>