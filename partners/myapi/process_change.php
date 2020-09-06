<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
    
    if(!$conn)
    {
    
     $row["response"]="Failed";
    $row["msg"]="DB Connection Failed";
    echo json_encode($row);
    
    }
else
{

    // $src = $_POST['src'];
    // $des = $_POST['des']; 
    //  $date= $_POST['date']; 
    //  $np = $_POST['passenger']; 
    //     $nl=$_POST['luggage']; 
    //      $info=$_POST['info']; 
    //     $type=$_POST['type'];
    //      $time=$_POST['time'];
    //      $fare=$_POST['fare'];
    //       $ref=$_POST['ref'];
    //         $name=$_POST['name'];
    //           $num1=$_POST['num1'];
    //             $num2=$_POST['num2'];
    //               $pay=$_POST['option'];
                  
    //               $flight=$_POST['flight'];
                  
    //              $sendm=$_POST['mailsent'];
                  
    //               $mail=$_POST['email'];
   
// $_POST['src'];
// $_POST['des']; 
// $row['src']=      $_POST['date']; 
// $row['des']=      $_POST['passenger']; 
// $row['date']=     $_POST['luggage']; 
// $row['passenger']=$_POST['info']; 
// $row['luggage']=$_POST['type'];
// $row['info']=     $_POST['time'];
// $row['type']=     $_POST['fare'];
// $row['time']=     $_POST['ref'];
// $row['fare']=$_POST['name'];
// $row['ref']=      $_POST['num1'];
// $row['name']=     $_POST['num2'];
// $row['num1']=     $_POST['option'];
// $row['num2']=     
// $row['option']=$_POST['flight'];
// $row['flight']=   
// $row['mailsent']= $_POST['mailsent'];
            
// $row['email']=    $_POST['email'];

$address1 = $_POST['address1'];
$address2 = $_POST['address2']; 
$date= $_POST['date']; 
$np = $_POST['passenger']; 
$nl=$_POST['luggage']; 
$info=$_POST['info']; 
$type=$_POST['type'];
$time=$_POST['time'];
$fare=$_POST['fare'];
$ref=$_POST['ref'];
$name=$_POST['name'];
$num1=$_POST['num1'];
$num2=$_POST['num2'];
$pay=$_POST['option'];

$flight=$_POST['flight'];

$sendm=$_POST['mailsent'];

$mail=$_POST['email'];


$sql="UPDATE `register` SET `name`='$name',`num1`='$num1',`num2`='$num2',`pay`='$pay',`address1`='$address1',`address2`='$address2',`dt`='$date',`time`='$time',`location`='$flight',`info`='$info',`fare`='$fare',`type`='$type',`passenger`='$np',`luggage`='$nl',`mail`='$mail' WHERE refid='$ref'";

$result= mysqli_query($conn,$sql);

if($result)
{
    $row["response"]="success";
    $row["msg"]="Data updated succesfully ";
    echo json_encode($row);
}
else
{
    $row["response"]="Failed";
    $row["msg"]="Data not Updated ";
    echo json_encode($row);
}

// $row["result"]=$sql;
//  echo json_encode($row);
 
}

  
    ?>