<?php

session_start();

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");

if (!$conn) {

  $row["response"] = "Failed";
  $row["msg"] = "DB Connection Failed";
  
} else {
  $ref = $_POST['id'];
  $agent = $_POST['agent'];

  $update_qry="UPDATE `register` SET `agent_name`='$agent' WHERE refid='$ref'";
  $result = mysqli_query($conn, $update_qry);

if($result)
{
    $row["response"] = "success";
    $row["msg"] = "Agent Transfered successfully";


  } else {
    $row["response"] = "Failed";
    $row["msg"] = "Error in agent Allocation";


  }
}

echo json_encode($row);

?>