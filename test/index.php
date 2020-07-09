<?php

    
$loop_array=[ 'name', 'mail', 'num1', 'num2', 'location', 'info', 'pay', 'src', 'des', 'address1', 'address2', 'dt', 'time', 'passenger', 'infants', 'luggage', 'type', 'agency', 'jtime', 'fare', 'status', 'via', 'dfare', 'drvid', 'mg', 'ceat', 'tiktok', 'miles', 'rdt', 'rtime', 'booked', 'confirmed', 'cancelled', 'status2', 'booked_date', 'booked_site', 'agent_name', 'agent_action', 'booking_agent' ];
    
$count =count($loop_array);
$set_value='';
for($i=0;$i<$count;$i++)
{
    $temp=$loop_array[$i];
    
        $set_value .= "`".$temp."` = '" ."',";
    
   
}
echo $set_value;

?>