<?php


$rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
include($rootfolder."/connection/connect.php");

$from = $_REQUEST["from"];
$to=$_REQUEST["to"];



if($from == "")
{
    $from = "2017-01-01";
    
}
if($to == "")
{
    $to="2222-01-01";
    
}
$query = "SELECT count(*) AS Total FROM `register` WHERE dt >= '".$from."' and dt <= '".$to."'";
$result= mysqli_query($conn,$query);
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$response["Total"]=$row["Total"];


$query = "SELECT  count(*) AS complete_Total FROM `register` WHERE `status` = \"completed\" and  dt >= '".$from."' and dt <= '".$to."'";
 $result= mysqli_query($conn,$query);
 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$response["complete_Total"]=$row["complete_Total"];
 
$query = "SELECT  count(*) AS cancel_Total FROM `register` WHERE `status` = \"cancelled\" and dt >= '".$from."' and dt <= '".$to."'";
 $result= mysqli_query($conn,$query);
 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$response["cancel_Total"]=$row["cancel_Total"];

$query = "SELECT  sum(fare) AS Total_fare FROM `register` WHERE `status` = \"completed\" and dt >= '".$from."' and dt <= '".$to."'";
 $result= mysqli_query($conn,$query);
 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$response["Total_fare"]=$row["Total_fare"];

 
$query = "SELECT  sum(dfare) AS Total_dfare FROM `register` WHERE `status` = \"completed\" and dt >= '".$from."' and dt <= '".$to."'";
 $result= mysqli_query($conn,$query);
 $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$response["Total_dfare"]=$row["Total_dfare"];


$response["Total_Profit"]=$response["Total_fare"]-$response["Total_dfare"];

 $response["Total_fare"]=number_format($response["Total_fare"],2);
 $response["Total_dfare"]=number_format($response["Total_dfare"],2);
  $response["Total_Profit"]=number_format($response["Total_Profit"],2);

echo json_encode($response);

?>