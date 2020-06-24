<?php

$conn=mysqli_connect('sql131.main-hosting.eu','u678426119_mini','myproject','u678426119_mini');
$coon_val="";
if($conn)
{
    $conn_val="true";
}else{
    $conn_val="false";
}
echo "<script>console.log('.$conn_val.'); </script>";

?>