<?php

session_start();


session_start();

foreach ($_SESSION as $param_name => $param_val) {
  echo $param_name." => ".$param_val."<br>";
}
?>