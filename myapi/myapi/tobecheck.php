<?php

$_SESSION["lastseen"]=0;

 date_default_timezone_set('Europe/London');
   
  
  $datetocheck=strtotime(date("Y-m-d H:i:s"));
  
  
  $date1=strtotime($_SESSION["lastseen"]);
  
  $diff = abs($datetocheck - $date1);  
 

if($diff > 1800 && ( $_SESSION["access"] == "give"  || $_SESSION["access"] == "give"))
{
  
}else
{
      echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid id/password');
    window.location.href='https://minicabee.co.uk//myadmin/';
    </SCRIPT>");
    
}

?>