<?php


$rootfolder = $_SERVER['DOCUMENT_ROOT'];


$pageName = $_POST["fileName"];
$target_file = $rootfolder . "/seo/".$pageName.".php";

$maxSize = 300000;
$fileToUpload = "fileToUpload";

include($rootfolder.'/apis/v1/operation/fileUpload.php');


echo json_encode($response);
    ?>