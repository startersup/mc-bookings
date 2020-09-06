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


     
    
        $ref=$_POST['id'];
        
    
 
    $st="cancelled";
    

    $result= mysqli_query($conn,"UPDATE `register` SET `status`='$st' WHERE refid='$ref'");
   
    if($result)
    {
        
        
        
          
         $subject = "Cancellation: Reference Id (".$ref.")";

// Always set content-type when sending HTML email
$headers = "";
$headers .= "From: Britannia Cars <bookings@britannia-taxis.com> \r\n";
$headers .= "Reply-To: Britannia Cars <bookings@britannia-taxis.com> \r\n"."X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";




  $rowpass= mysqli_fetch_array($res,MYSQLI_ASSOC);


$message = '


   <!DOCTYPE html>
<html>

<body>

<br><br>
    
   <style>@font-face {
  font-family: '.'Monda'.';
  font-style: normal;
  font-weight: 400;
  src: local('.'Monda Regular'.'), local('.'Monda-Regular'.'), url(https://fonts.gstatic.com/s/monda/v7/t3vZkumW9T_w4ukdwBVHtA.woff2) format('.'woff2'.');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}

@font-face {
  font-family: '.'Monda'.';
  font-style: normal;
  font-weight: 400;
  src: local('.'Monda Regular'.'), local('.'Monda-Regular'.'), url(https://fonts.gstatic.com/s/monda/v7/9IGqbwlMn4Zg3as8alsdNA.woff2) format('.'woff2'.');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}</style>
    <hr>
<h1 style="font-family: '.'Monda'.', sans-serif;">Britannia Cars-Booking Cancelled</h1>
<p style="font-family: '.'Monda'.', sans-serif;"><b>Booking Reference('.$ref.')</b></p>
    <br>
    <div class="card" style="margin-left:10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;max-width:700px;width:100%;background-color: #f0f8ff;">
<div class="card" style="margin-left:10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;max-width:600px;width:100%;height:85px;background-color: #1a6efd;"><center><img src="http://britannia-taxis.com/images/logo.png" style="max-width:250px;width:100%"></center></div>
<div class="card" style="margin-left:10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;max-width:600px;width:100%;">
  <div class="container" style="padding: 2px 16px;background-color:white;">
    <h4 style="font-family: '.'Monda'.', sans-serif;"><b>Your Booking has been cancelled. We apologise for any inconvenience you have experienced during the use of Britannia Cars. If you wish to contact us please do so at 01293 660 660 </b></h4> 
      <h4 style="font-family: '.'Monda'.', sans-serif;"><b><span style="color:red;">Reason For cancellation</span></b><br>Booking '.$ref.' has been cancelled due to the : <span style="color:red;">unavailabilty of vehicle</span></h4>
      <h4 style="font-family: '.'Monda'.', sans-serif;">Hope this will not repeated again by our company we will provide you the best service as much as possible.</h4>
      </div>
    <div class="footer" style="background-color:#d0d0d0;font-family: '.'Monda'.', sans-serif;"><center><p><b>If you have paid through the bank transfer or paypal the refund process will be within 2 to 3 business days </b></p></center>
    <footer style="background-color:#000;color:white"><center><p>For any Queries visit :britannia-taxis.com</p><small>Terms & Conditions Privacy policy</small></center></footer></div>
  
</div>

        </div>
    
</body>
</html> 

        

';




$mail=mail($rowpass["mail"],$subject,$message,$headers);


 

      
        
        
        
        
        
        
        
        
       
    $row["response"]="Success";
    $row["msg"]="Job ".$ref. " cancelled successfully";
    $row["id"]=$ref;
    $row["opr"]=$st;
    $row["code"]="status";
    echo json_encode($row);
    
    
   }

else
{
    
   $row["response"]="Failed";
    $row["msg"]="Job ".$ref. " not cancelled";
    
    echo json_encode($row);
}


}
?>