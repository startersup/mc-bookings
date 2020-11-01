<?php


$rootfolder = $_SERVER['DOCUMENT_ROOT'];


$pageName = $_POST["fileName"];
$response["file"]=$pageName;
$target_file = $rootfolder . "/seo/".$pageName.".php";
$response["Tarfile"]=$target_file;
$maxSize = 300000;
$fileToUpload = "fileToUpload";

include($rootfolder.'/myapi/fileUpload.php');


echo json_encode($response);
    ?>