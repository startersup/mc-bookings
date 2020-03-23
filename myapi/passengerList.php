
<?php

session_start();

$rootfolder= $_SERVER['DOCUMENT_ROOT']; 

include($rootfolder."/connection/connect.php"); 

if(!$conn)
{

echo ("Connecdtion Failed");

}
else
{
date_default_timezone_set('Europe/London');

$sql="SELECT name,mail,num1,num2, ROUND(SUM(fare), 2) as tfare,count(*) as tcount from `register` WHERE status = 'completed' group by num1 ";
$result= mysqli_query($conn,$sql);
while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
{
   
   $temp[]=$row;
}

if($temp==null)
{
 $temp=array();
}
echo  json_encode($temp);

mysqli_close($conn);

}
?>


