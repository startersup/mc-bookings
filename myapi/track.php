
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
    
   
   
    $id=$_REQUEST['id'];
  
  $date= date("Y-m-d");
    $today=$date;


    $sql="SELECT * from register WHERE refid ='".$id."'  ";


  $result=  mysqli_query($conn,$sql);
  
$row1["status"]="null";
 
  
  while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
     
        $row1=$row;
    }


  
 
  
// echo("<br><br>");
  echo  json_encode($row1);

}

mysqli_close($conn);

?>

 
