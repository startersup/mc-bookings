<?php

session_start();

$res["name"]=$_SESSION["userName"];
echo json_encode($res);


?>