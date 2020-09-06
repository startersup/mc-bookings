

<?php

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");

date_default_timezone_set('Europe/London');


$response["status"] = false;
$tableName="oregister";
$sql = "UPDATE `" . $tableName . "`  SET  ";
$sqlCols = " `toberepcust` ";
$where = "where `refid` = '".$_POST["refid"]."'";
foreach ($_POST["data"] as $param_name => $param_val) {
    
        $sqlCols .= ", `" . $param_name . "` = " ."'" . addslashes($param_val) . "' ";
        
    
}
$sqlCols = str_replace("`toberepcust` ,", "", $sqlCols);
$sql .= $sqlCols;
$sql .= $where;
$result =  mysqli_query($conn, $sql);
$response["sql"]=$sql;
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
