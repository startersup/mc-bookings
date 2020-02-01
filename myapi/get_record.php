
<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

    date_default_timezone_set('Europe/London');

   $ref=$_POST["id"];
   
    $sql="SELECT * from register WHERE refid = '".$ref."'";
  $result=  mysqli_query($conn,$sql);
  

  
  
 $temp[]= mysqli_fetch_array($result,MYSQLI_ASSOC);



  echo  json_encode($temp);

?>

 
