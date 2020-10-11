
<?php

session_start();

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");
$footerScript=addslashes($_POST["footerScripts"]);
$headerScript=addslashes($_POST["headerScript"]);
$siteId=$_POST["siteId"];
$sql_query = "UPDATE `siteMaster` SET `headerScript` = '".$headerScript."', `footerScript` = '".$footerScript."' WHERE `siteMaster`.`id` = ".$siteId;

$result= mysqli_query($conn,$sql_query);
if($result)
{
    $row["status"]="Success";
    $row["msg"]="Updated Successfully";
}
else{
    $row["status"]="Failed";
    $row["msg"]="Failed to Update";
}
echo json_encode($row);
mysqli_close($conn);
?>