<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 

  $sql="SELECT  `apiKey`, `apiUserId` FROM `thirdPartyApis` WHERE `name` ='twilio'";
  $result=  mysqli_query($conn,$sql);

  $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

  $acc_sid=$row["apiUserId"];
  $acc_auth_token=$row["apiKey"];
  
$to=$_POST['to'];
$message=$_POST['msg'];
$refid=$_POST['bookid'];
$smsType=$_POST['smsType'];
$fields="From=Taxi-Info&To=".$to."&Body=".$message;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.twilio.com/2010-04-01/Accounts/".$acc_sid."/Messages.json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);

$headers = array(
    'Content-Type:application/x-www-form-urlencoded',
    'Authorization: Basic '. base64_encode($acc_sid.":".$acc_auth_token)
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);


// further processing ....
/* if ($server_output == "OK") { 
    
    echo("Success <br>");
    echo ($server_output);
    echo("<br>");
    echo("Success encode <br>");
    echo json_encode($server_output);
 } else { 
     
    echo("Fail <br>");
    echo ($server_output);
    echo("<br>");
    echo("Fail encode <br>");
    echo json_encode($server_output);
  } */
  $msgId=$server_output["sid"];
  $msgStatus=$server_output["status"];
    $sql="INSERT INTO `messageStatus` (`bookId`, `msgId`, `statusJson`, `smsType`, `sendNum`, `status`) VALUES ( '$refid', '$msgId', '$server_output','$smsType', '$to', '$msgStatus')";
   // $server_output["sql"]=$sql;
    echo ($server_output);
    $result_sts= mysqli_query($conn,$sql);
?>