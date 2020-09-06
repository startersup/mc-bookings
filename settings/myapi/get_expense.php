<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

    
    $num_rows=$_POST["numrows"];
    
    $offset=$_POST["offset"];
   

    $sql="SELECT dt,spendby,updatedby,comments,refbill,amount,type,amount_in_hand from expense order by dt DESC LIMIT $offset,$num_rows";
  
  $result=  mysqli_query($conn,$sql);

  while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
     
     $temp[]=$row;
}
  echo  json_encode($temp);


 
