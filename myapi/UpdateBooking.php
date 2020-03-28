
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
    
    $src = $_POST['src'];
    $des = $_POST['des']; 
    $via = $_POST['via'];
    $date= $_POST['dt'];
    $jtime= $_POST['jtime'];
    $np = $_POST['np']; 
    $nl=$_POST['nl']; 
    $type=$_POST['type']; 
    $time=$_POST['time'];
    $fare=$_POST['fare'];
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $info=$_POST['info'];
    $pm=$_POST['payment'];
    $add1=$_POST['address1'];
    $add2=$_POST['address2'];
    $location=$_POST['location'];
    $ceat=$_POST['ceat'];
    $mg=$_POST["mg"];
    $ref=$_POST['refid'];

       $sql="UPDATE `register` SET `name` ='$name' , `mail` ='$mail', `num1` = '$num1', `num2` = '$num2', `location`='$location', `info` ='$info', `pay`='$pay', `src`='$src', `des`='$des', `address1`='$address1', `address2` ='address2', `dt` ='$dt', `time` ='$time', `passenger`='$np', `infants`='$infants', `luggage`='$nl', `type`='$type',`fare`='$fare', `via`='$via', `dfare`='$dfare', `drvid` =='$drvid', `mg` ='$mg', `ceat`='$ceat' WHERE refid='$ref'";       
echo($sql);
// $result= mysqli_query($conn,$sql);
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

 
