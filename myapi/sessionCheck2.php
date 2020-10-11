<?php

session_start();


$boolSession=FALSE;
$msg="UnKnown Error Occured";
$row["session"]="n";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 

$prev_url=$_SERVER['HTTP_REFERER'];
$host=$_SERVER['HTTP_HOST']; 
date_default_timezone_set('Europe/London');
// if (strpos($prev_url, $host)) {
    if($_SESSION["username"] != "")
    {

        if( (strtotime(date("Y-m-d H:i:s")) - $_SESSION["logintime"]) <$_SESSION["sessiontime"] )
        {
            $_SESSION["logintime"] = strtotime(date("Y-m-d H:i:s"));
            $row["session"]="y";
            $boolSession=TRUE;
        }else{
            $msg=" Your Session is being Idle for Long..";
        }

    }else{
        $msg ="Please Login to proceed..";
    }
//}

?>