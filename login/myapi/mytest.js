var var_1=1;

function exec()
{
    
    alert("haiii");
    document.getElementbyId("test").value=var_1;
    
}

function urgent()
{
    
var report_green[0]='<li><div class="node green"></div><p>Booked</p></li>';
report_green[1]='<li><div class="node green"></div><p>Booking Confirmed</p></li>';
report_green[2]='<li><div class="node green"></div><p>Driver Allocated</p></li>';
report_green[3]='<li><div class="node green"></div><p>Booking Completed</p></li>';



var report_grey[0]='<li><div class="node grey"></div><p>Booked</p></li>';
report_grey[1]='<li><div class="node grey"></div><p>Booking Confirmed</p></li>';
report_grey[2]='<li><div class="node grey"></div><p>Driver Allocated</p></li>';
report_grey[3]='<li><div class="node grey"></div><p>Booking Completed</p></li>';


report_node_green='<li><div class="divider green"></div></li>';
report_node_grey='<li><div class="divider grey"></div></li>';


      
      
      
   $row1["response"]=$report_green[0];
   
  
   
  if($row["status"]=="booked-confirmed")
  {
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[1];
      
      $row1["response"]=$row1["response"]+$report_node_grey+$report_grey[2];
      $row1["response"]=$row1["response"]+$report_node_grey+$report_grey[3];
      
  }else if($row["status"]=="comitted")
  {
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[1];
      
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[2];
      
      $row1["response"]=$row1["response"]+$report_node_grey+$report_grey[3];
      
  }else if($row["status"]=="completed")
  {
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[1];
      
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[2];
      
      $row1["response"]=$row1["response"]+$report_node_green+$report_green[3];
      
  }
    
    
}