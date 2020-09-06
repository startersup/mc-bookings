<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
    

    date_default_timezone_set('Europe/London');
   
    $stringsearch=$_POST['str'];
   
  
  $date= date("Y-m-d");
    $today=$date;



    $sql="SELECT * from register WHERE num1 like '%".$stringsearch."%' OR num2 like '%".$stringsearch."%'  OR mail like '%".$stringsearch."%'  OR refid like '%".$stringsearch."%' order by dt desc ";

    
  $result=  mysqli_query($conn,$sql);


  while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
     
     $temp[]=$row;
}

if($temp==null)
{
   $temp=array();
}
  echo  json_encode($temp);

?>
