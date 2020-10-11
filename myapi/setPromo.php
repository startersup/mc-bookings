<?php

session_start();

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");


$sql = "INSERT INTO `" . "mypromos" . "` ";
$sqlCols = "( `toberepcust` ";
$sqlVals = "( `toberepcust` ";
foreach ($_POST["data"] as $param_name => $param_val) {
     $sqlCols .= ", `" . $param_name . "` ";
        $sqlVals .= ", '" . $param_val . "' ";
    
}
$sqlCols = str_replace("`toberepcust` ,", "", $sqlCols);
$sqlVals = str_replace("`toberepcust` ,", "", $sqlVals);
$sql .= $sqlCols . ") VALUES " . $sqlVals . ")";
$result =  mysqli_query($conn, $sql);

if($result)
{
    $row["status"]="Success";
    $row["msg"]="Inserted Successfully";
}
else{
    $row["status"]="Failed";
    $row["msg"]="Failed to Insert";
}
echo json_encode($row);
mysqli_close($conn);
