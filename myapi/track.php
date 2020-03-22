
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
    
    $src = $_REQUEST['start'];
    $des = $_REQUEST['end']; 
    $via = $_REQUEST['via'];
    $pdate= $_REQUEST['dt'];
    $ptime= $_REQUEST['pt'];
    $np = $_REQUEST['np']; 
    $nl=$_REQUEST['nl']; 
    $type=$_REQUEST['type']; 
    $time=$_REQUEST['time'];
    $agency= $_REQUEST['agency'];
    $fare=$_REQUEST['fare'];
    $name=$_REQUEST['name'];
    $mail=$_REQUEST['mail'];
    $num1=$_REQUEST['number1'];
    $num2=$_REQUEST['number2'];
    $pick=$_REQUEST['pickup'];
    $info=$_REQUEST['info'];
    $pm=$_REQUEST['payment'];
    $via=$_REQUEST['via'];
    $add1=$_REQUEST['address1'];
    $add2=$_REQUEST['address2'];
    $extra=$_REQUEST['check'];
    $child=$_REQUEST['child'];

}

mysqli_close($conn);

?>

 
