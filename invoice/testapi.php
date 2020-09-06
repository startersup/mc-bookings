<?php


foreach ($_POST["data"] as $param_name => $param_val) {

    $sqlCols .= "paramName" . $param_name . "= ".$param_val."  <>";
}

$data["data"]=$sqlCols;
echo json_encode($data);
?>