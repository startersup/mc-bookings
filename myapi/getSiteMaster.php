<?php

session_start();

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");
include($rootfolder . "/myapi/sessionCheck.php");
date_default_timezone_set('Europe/London');

$sql = "SELECT `siteName`,`id`,`headerScript`,`footerScript` FROM `siteMaster` WHERE 1";
$result =  mysqli_query($conn, $sql);


//   if(mysqli_num_rows ( $result ) !== 0)
//   {


// }
// else
// {

//     $temp="";
//     echo  json_encode($temp);
// }

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $temp[] = $row;
}
if ($temp == null) {
    $temp = array();
}
echo  json_encode($temp);

?>

