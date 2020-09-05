

<?php

$tableName="oregister";
$sql = "UPDATE `" . $tableName . "`  SET  ";
$sqlCols = "( `toberepcust` ";

foreach ($_POST["data"] as $param_name => $param_val) {
    
        $sqlCols .= ", `" . $param_name . "` = " ."'" . addslashes($param_val) . "' ";
        
    
}
$sqlCols = str_replace("`toberepcust` ,", "", $sqlCols);
$sql .= $sqlCols . ") VALUES " . $sqlVals . ")";
$result =  mysqli_query($conn, $sql);
if ($result) {
  
    $response["status"]=true;
    $response["msg"]="Successfully Updated. ";
    echo json_encode($response);
    exit(0);

} else {

    $response["msg"]="Insertion failed";
    echo json_encode($response);
    exit(0);
}

?>
