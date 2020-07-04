<?php

session_start();

$_SESSION["userName"]="Deepak";

header("Location: ../index.php");


?>