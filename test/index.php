<?php
 $temp = $_SERVER['PHP_SELF'];
 $temp=str_replace("/","",$temp);
 $temp=str_replace("index.php","/",$temp);
 echo($temp);
?>