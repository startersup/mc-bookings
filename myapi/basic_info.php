<?php

session_start();

$rootfolder = $_SERVER['DOCUMENT_ROOT'];

include($rootfolder . "/connection/connect.php");
include($rootfolder."/myapi/sessionCheck.php"); 


$book_id = $_POST["book_id"];
$sql = "SELECT register.refid,register.mg,register.ceat,register.infants,register.booked_site,register.status,register.src,register.des,register.name,register.mail,register.num1,register.num2,register.location,register.info,register.pay,register.address1,register.address2,register.dt,register.time,register.passenger,register.luggage,register.type,register.fare,register.dfare,register.drvid,driver.name as dname,driver.mobile as dnum1,driver.mobile2 as dnum2,date_format(register.tiktok,'%Y-%m-%d %H:%i:%S') as booked_time,register.jtime,register.miles FROM register LEFT JOIN driver as driver ON register.drvid=driver.id WHERE register.refid ='" . $book_id . "' ".$_SESSION["registerClause"];
$result =  mysqli_query($conn, $sql);
$temp["sql"] = $sql;
$sql2 = "SELECT process.jobid, process.drvid, process.bid,process.fare,driver.name FROM process INNER JOIN driver ON process.drvid=driver.id WHERE process.jobid ='" . $book_id . "'";
$result2 =  mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$temp["base"] = $row;

$i = 0;

while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

  $temp2[$i] = $row2;
  $i++;
}

if ($temp2 == null) {
  $temp2 = array();
}
$temp["bid"] = $temp2;
echo  json_encode($temp);
