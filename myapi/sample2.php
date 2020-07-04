<?php

session_start();

$res["name"]=$_SESSION["userName"];
$res["url"]=$_SERVER['HTTP_REFERER'];

$prev_url=$_SERVER['HTTP_REFERER'];
$host=$_SERVER['HTTP_HOST'];

if (strpos($prev_url, $host))
$res["rr"]= 'true';
else
$res["rr"]= 'false';


    echo json_encode($_SESSION);
?>