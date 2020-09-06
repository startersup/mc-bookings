<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

     $row["response"]="Failed";
    $row["msg"]="Failed to Insert";
  
    $dt=$_POST["dt"];
    $spendby=$_POST["spendby"];
    $updatedby=$_POST["updatedby"];
    $comments=$_POST["comments"];
    $refbill=$_POST["refbill"];
    $amount=$_POST["amount"];
    $type=$_POST["type"];
    
   
    $sql="SELECT amount_in_hand from expense order by tiktok DESC LIMIT 0,1";
     $result=  mysqli_query($conn,$sql);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if($type == "debit")
    {
        $new=$row["amount_in_hand"]-$amount;
    }
    else
    {
        $new=$row["amount_in_hand"]+$amount;
    }
    
   $sql ="INSERT INTO `expense` (`dt`, `spendby`, `updatedby`, `comments`, `refbill`, `amount`, `type`, `amount_in_hand`) VALUES ('$dt', '$spendby', '$updatedby', '$comments', '$refbill', '$amount', '$type','$new')";
   

  $result=  mysqli_query($conn,$sql);
if($result)
{
     $row["response"]="Success";
    $row["msg"]="Inserted Success";
}

  echo  json_encode($row);


 
