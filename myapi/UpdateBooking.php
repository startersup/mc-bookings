
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
    
    $src = $_POST['start'];
    $des = $_POST['end']; 
    $via = $_POST['via'];
    $date= $_POST['dt'];
    $time= $_POST['pt'];
    $np = $_POST['np']; 
    $nl=$_POST['nl']; 
    $type=$_POST['type']; 
    $time=$_POST['time'];
    $agency= $_POST['agency'];
    $fare=$_POST['fare'];
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $num1=$_POST['number1'];
    $num2=$_POST['number2'];
    $pick=$_POST['pickup'];
    $info=$_POST['info'];
    $pm=$_POST['payment'];
    $via=$_POST['via'];
    $add1=$_POST['address1'];
    $add2=$_POST['address2'];
    $extra=$_POST['check'];
    $child=$_POST['child'];

       

$result= mysqli_query($conn,"UPDATE `register` SET `name`='$name',`num1`='$num1',`num2`='$num2',`pay`='$pm',
`src`='$src',`des`='$des',`dt`='$date',`time`='$time',`location`='$flight',`info`='$info',`fare`='$fare',`type`='$type',`passenger`='$np',`luggage`='$nl',`mail`='$mail' WHERE refid='$ref'");
if($result)
{
    $row["response"]="Success";
    $row["msg"]="Updated Successfully";
}
else{
    $row["response"]="Failed";
    $row["msg"]="Failed to Update";
}

}

echo json_encode($row);
mysqli_close($conn);

?>

 
