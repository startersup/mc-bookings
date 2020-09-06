
    <?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
    
    if(!$conn)
    {
    
        $row["response"]="Failed";
        $row["msg"]="DB Connection Failed";

          
    }
else
{
    date_default_timezone_set('Europe/London');

    $loop_array=[ 'name', 'mail', 'num1', 'num2', 'location', 'info', 'pay', 'src', 'des', 'address1', 'address2', 'dt', 'time', 'passenger', 'infants', 'luggage', 'type', 'agency', 'jtime', 'fare',  'via', 'dfare', 'drvid', 'mg', 'ceat', 'tiktok', 'miles', 'rdt', 'rtime', 'booked', 'confirmed', 'cancelled', 'status2', 'booked_date', 'booked_site', 'agent_name', 'agent_action', 'booking_agent' ];
    
    $count =count($loop_array);
    $set_value='';
    for($i=0;$i<$count;$i++)
    {
        $temp=$loop_array[$i];
        if(isset($_POST[$temp]))
        {
            $set_value .= "`".$temp."` = '" .$_POST[$temp]."',";
        }
       
    }

    if($set_value == '')
    {
        $row["response"]="Failed";
        $row["msg"]="No Data to Update";
    }
    else{
        $refid =$_POST["refid"];
        $set_value .= "`refid`= '".$refid."'";
        $sql_query= "UPDATE `register` SET ".$set_value."WHERE refid='$refid'";
       // $row["sql"]=$sql_query;
        $result= mysqli_query($conn,$sql_query);
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
/*
    $src = $_POST['src'];
    $des = $_POST['des']; 
   // $via = $_POST['via'];
    $date= $_POST['dt'];
    $time=$_POST['time'];
    $type=$_POST['type'];
    $miles=$_POST['miles'];
    $jtime= $_POST['jtime'];


    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $add1=$_POST['address1'];
    $add2=$_POST['address2'];
    $np = $_POST['passenger']; 
    $nl=$_POST['luggage']; 
    $nl=$_POST['infants'];
    $location=$_POST['location'];
    $info=$_POST['info'];
    $mg=$_POST["mg"];
    $ceat=$_POST['ceat'];
    $fare=$_POST['fare'];
    $dfare=$_POST['dfare'];

   // $pm=$_POST['pay'];
*/
echo json_encode($row);
mysqli_close($conn);
}
?>

 
