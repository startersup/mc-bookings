
<?php

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");

date_default_timezone_set('Europe/London');

$response["status"] = false;

$tableName = "oregister";
$uniqueKey = "refid";
$unique_prefix = "TAX";
$sql = "INSERT INTO `" . $tableName . "` ";
$sqlCols = "( `agency` ";
$sqlVals = "( '' ";
foreach ($_POST["data"] as $param_name => $param_val) {

    $sqlCols .= ", `" . $param_name . "` ";
    $sqlVals .= ", '" . addslashes($param_val) . "' ";
}
// $sqlCols = str_replace("`toberepcust` ,", "", $sqlCols);
// $sqlVals = str_replace("`toberepcust` ,", "", $sqlVals);
$sql .= $sqlCols . ") VALUES " . $sqlVals . ")";
$response["sql1"] = $sql;
$result =  mysqli_query($conn, $sql);
if ($result) {
    $last_id = $conn->insert_id;


    $sql2 = "UPDATE `" . $tableName . "` SET `" . $uniqueKey . "` = '" . $unique_prefix . $last_id . "' where `sno` = " . $last_id;
    $result =  mysqli_query($conn, $sql2);

    $response["status"] = true;
    $response["msg"] = "Successfully Inserted.. Newly Inserted id is : " . $unique_prefix . $last_id;
    echo json_encode($response);
    exit(0);
} else {

    $response["msg"] = "Insertion failed";
    echo json_encode($response);
    exit(0);
}

?>