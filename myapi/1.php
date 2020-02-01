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
   
  
  $date= date("Y-m-d");
    $today=$date;
    
    $date= date("Y-m-d", strtotime(' -1 day'));
 $yest=$date;
 
  $date= date("Y-m-d", strtotime(' +1 day'));
             $tmrw=$date;
             
              $date= date("Y-m");
    $check4=$date;
    
  $result=  mysqli_query($conn,"SELECT * from register WHERE 1 order by dt ");
  
  
  
  $i=0;
  $icomplete=0;
  $itoday=0;
  $iyest=0;
  $itmrw=0;
  $icancel=0;
  $ifuture=0;
  
  while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
     
      $row_total[$row["refid"]]=$row;
       $i=$i+1;
      
      if($row["dt"] == $today)
      {
          $row_today[$itoday]=$row["refid"];
          $itoday=$itoday+1;
      }
      
      if($row["dt"] == $yest)
      {
          $row_yest[$iyest]=$row["refid"];
          $iyest=$iyest+1; 
          
      }
      
      if($row["dt"] == $tmrw)
      {
          $row_tmrw[$itmrw]=$row["refid"];
          $itmrw=$itmrw+1;
      }
      
      if($row["status"] == "cancelled")
      {
          $row_cancel[$icancel]=$row["refid"];
          $icancel=$icancel+1;
      }
      
            if($row["status"] == "completed")
      {
          $row_complete[$icomplete]=$row["refid"];
          $icomplete=$icomplete+1;
      }
      
             if( ($row["status"] !== "completed") && ($row["status"] !== "cancelled") && ($row["dt"] > $tmrw) )
      {
          $row_future[$ifuture]=$row["refid"];
          $ifuture=$ifuture+1;
      }
      
     
    // array_push( $row_res,$row1 );

}


  
  $row1["totalcount"]=$i;
  $row1["completecount"]=$icomplete;
  $row1["tmrwcount"]=$itmrw;
  $row1["todaycount"]=$itoday;
  $row1["yestcount"]=$iyest;
  $row1["cancelcount"]=$icancel;
  $row1["futurecount"]=$ifuture;
  
 $row1["todaylist"] =$row_today;
 $row1["futurelist"] =$row_future;
 $row1["yestlist"] =$row_yest; 
 $row1["tmrwlist"] =$row_tmrw;
 $row1["cancellist"] =$row_cancel;
 $row1["completelist"] =$row_complete;
 $row1["totallist"]=$row_total;
  
// echo("<br><br>");
  echo  json_encode($row1);

}

mysqli_close($con);

?>

 
