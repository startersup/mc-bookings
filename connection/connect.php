<?php

$conn=mysqli_connect('sql131.main-hosting.eu','u678426119_mini','Minicabee@123','u678426119_mini');
if(!$conn)
{
    echo("Conn Failed... <br> err".$conn);

}

echo "Failed to connect to MySQL: " . $conn -> connect_error;
  
if ($conn -> connect_errno) {
  
  }
?>