<?php

include('../common/index.php');

$tableName = "routes";
$uniqueKey = "routeId";
$apifor="routes";
$checkParams = $checkParams . "," . $uniqueKey;
$uniqueValue = $_POST[$uniqueKey];
$whereClause = " WHERE " . $_POST["whereClause"];
$colsForTableView = " `id`, `routeId`,`routeName`, `fromDate`, `toDate`, `run1Flag`, `run2Flag`,`councilFare`, `yourFare`, `driverFare`, `escortFare` ";
$colsAllView = " `id`, `routeId`, `routeName`, `fromDate`, `toDate`, `run1Flag`, `run2Flag`, `run1Start`, `run1End`, `run2Start`, `run2End`, `schoolId`, `studentId`, `driverId`, `escortId`, `sunday`, `monday`, `tuesday`, `wednesday`, `thusday`, `friday`, `saturday`, `sundayFlag`, `mondayFlag`, `tuesdayFlag`, `wednesdayFlag`, `thursdayFlag`, `fridayFlag`, `saturdayFlag`, `councilFare`, `yourFare`, `driverFare`, `escortFare`, `ro`, `specialInfo`, `training`, `wscc`, `notes`, `tiktok` ";

/* Insert the records  */
if ($operationRequest == 'create') {
    $sql = "INSERT INTO `" . $tableName . "` ";
    $sqlCols = "( `toberepcust` ";
    $sqlVals = "( `toberepcust` ";
    foreach ($_POST as $param_name => $param_val) {
        // echo "Param: $param_name; Value: $param_val<br />\n";
        if (!(strpos($checkParams, $param_name))) {
            $sqlCols .= ", `" . $param_name . "` ";
            $sqlVals .= ", '" . $param_val . "' ";
        }
    }
    $sqlCols = str_replace("`toberepcust` ,", "", $sqlCols);
    $sqlVals = str_replace("`toberepcust` ,", "", $sqlVals);
    $sql .= $sqlCols . ") VALUES " . $sqlVals . ")";
    $result =  mysqli_query($conn, $sql);
    if ($result) {
        $last_id = $conn->insert_id;

        include('../common/setUniqueId.php');

        $sql2 = "UPDATE `" . $tableName . "` SET `" . $uniqueKey . "` = '" . $unique_prefix . $last_id . "' where `id` = " . $last_id;
        $result =  mysqli_query($conn, $sql2);

        $response["status"]=true;
        $response["msg"]="Successfully Inserted.. Newly Inserted id is : ". $unique_prefix . $last_id;
        echo json_encode($response);
        exit(0);

    } else {

        $response["msg"]="Insertion failed";
        echo json_encode($response);
        exit(0);
    }
}
/* Get the records to view for the tables */
if ($operationRequest == 'table') {
    $sql = " SELECT " . $colsForTableView . " FROM `" . $tableName . "` " . $whereClause;
    $result =  mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $temp[] = $row;
    }
    if ($temp == null) {
        $temp = array();
    }

    $response["data"] = $temp;
    echo json_encode($response);
    exit(0);
}

/* Get the info for the particular route */
if ($operationRequest == 'info') {

    $sql = "SELECT " . $colsAllView . " FROM `" . $tableName . "` WHERE `" . $uniqueKey . "` ='" . $uniqueValue . "' ";
}

/*  Update for the particular route */
if ($operationRequest == 'update') {
    $sql = "UPDATE `" . $tableName . "` SET ";
    $updateData = "( `toberepcust` ";
    foreach ($_POST as $param_name => $param_val) {
        // echo "Param: $param_name; Value: $param_val<br />\n";
        if (!(strpos($checkParams, $param_name))) {
            $updateData .= ", `" . $param_name . "` = '" . $param_val . "' ";
        }
    }
    $updateData = str_replace("`toberepcust` ,", "", $updateData);
    $sql .= $updateData . " WHERE `" . $uniqueKey . "` ='" . $uniqueValue . "' ";
    $result =  mysqli_query($conn, $sql2);
    if ($result) {
          
        $response["status"]=true;
        $response["msg"]="Successfully Updated..".;
        echo json_encode($response);
        exit(0);

    } else {

        $response["msg"]="Updation failed";
        echo json_encode($response);
        exit(0);
    }
}

/* Bulk Update for the  routes */
if ($operationRequest == 'bulk_update') {
    $sql = "UPDATE `" . $tableName . "` SET ";
    $updateData = "( `toberepcust` ";
    foreach ($_POST as $param_name => $param_val) {
        // echo "Param: $param_name; Value: $param_val<br />\n";
        if (!(strpos($checkParams, $param_name))) {
            $updateData .= ", `" . $param_name . "` = '" . $param_val . "' ";
        }
    }
    $updateData = str_replace("`toberepcust` ,", "", $updateData);
    $sql .= $updateData . $whereClause;
    $result =  mysqli_query($conn, $sql2);
    if ($result) {
          
        $response["status"]=true;
        $response["msg"]="Successfully Updated..".;
        echo json_encode($response);
        exit(0);

    } else {

        $response["msg"]="Updation failed";
        echo json_encode($response);
        exit(0);
    }
}



?>