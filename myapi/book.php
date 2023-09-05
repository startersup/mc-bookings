<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 
  $name=$_POST['name'];
  $mail=$_POST['mail'];
  $mobile1=$_POST['mobile1'];
  $mobile2=$_POST['mobile2'];
  $location=$_POST['location'];
  $info=$_POST['info'];
  $pay=$_POST['pay'];
  $origin_input=$_POST['origin-input'];
  $destination_input=$_POST['destination-input'];
  $address1=$_POST['address1'];
  $address2=$_POST['address2'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $np=$_POST['np'];
  $nl=$_POST['nl'];
  $cabType=$_POST['cabType'];
  $np2=$_POST['np2'];
  $time=$_POST['time'];
  $fare=$_POST['fare'];
  $status=$_POST['status'];
  $via=$_POST['via'];
  $dfare=$dfare;
  $meet=$_POST['meet'];
  $child=$_POST['child'];
  $distance=$_POST['distance'];
  $booked_site=$_POST['booked_site'];
  $drvid=$_POST['drvid'];
  $prefix=$_POST["prefix"];
  $userMaster=$_POST['userMaster'];

  $transferAgent=$_POST['transferAgent'];

  if($transferAgent == "")
  {
    $transferAgent=$userMaster;
  }
 if($_POST["drvid"]=="")
 {
	 $dfare=$_POST["fare"]/100;    
 $dfare=$dfare*75;
 $dfare=number_format($dfare,2); 
 }else
 {
	 $dfare = $_POST["dfare"];
 }

      $code=0;
   while($code==0)
{
    $check=0;
$ran=mt_rand(1000,99999);
$ret="RET".$ran;
$ran=$prefix.$ran;

$result=mysqli_query($conn,"SELECT refid from register WHERE 1");
 while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
 {
    if($ran==$row["refid"])
    {
        $check=1;
      
    }
}

if($check==0)
{
    $code=1;
}
// ;
// echo($row);


}
if($meet == "")
{
    $meet="0";
}
if($child =="")
{
    $child="0";
}

$ref=$ran;

if($fare == "")
{
    $fare ="0";
}
    
$sql="INSERT INTO `register` (`refid`, `name`, `mail`, `num1`, `num2`, `location`, `info`, `pay`, `src`, `des`,`address1`,`address2`, `dt`, `time`, `passenger`, `luggage`, `type`, `infants`, `jtime`, `fare`, `status`, `via`, `dfare`, `mg`, `ceat`, `miles`,`booked_site`,`drvid`,`agent_name`,`booking_agent`) 
VALUES ('$ref', '$name', '$mail', '$mobile1', '$mobile2', '$location', '$info', '$pay', '$origin_input', '$destination_input','$address1','$address2', '$date', '$time', '$np', '$nl', '$cabType', '$np2', '$time', $fare, '$status', '$via', $dfare, $meet, $child, '$distance','$booked_site','$drvid','$transferAgent','$userMaster')";

 $user= mysqli_query($conn,$sql) ;
 
 if($user)
 {
	 $temp["status"]="success";
     $temp["message"]="Your Booking Id is ".$ref;
     
     $message='<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0;">
         <meta name="format-detection" content="telephone=no"/>
         <style>
             @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 400;
       src: local( '."'".'Lato Regular'."'".'), local('."'".'Lato-Regular'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6uyw4BMUTPHjxAwXjeu.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
     }
     /* latin */
     @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 400;
       src: local( '."'".'Lato Regular'."'".'), local('."'".'Lato-Regular'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6uyw4BMUTPHjx4wXg.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
     }
     /* latin-ext */
     @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 700;
       src: local( '."'".'Lato-Bold'."'".'), local('."'".'Lato-Bold'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh6UVSwaPGR_p.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
     }
     /* latin */
     @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 700;
       src: local( '."'".'Lato-Bold'."'".'), local('."'".'Lato-Bold'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh6UVSwiPGQ.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
     }
     /* latin-ext */
     @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 900;
       src: local( '."'".'Lato-Black'."'".'), local('."'".'Lato-Black'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh50XSwaPGR_p.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
     }
     /* latin */
     @font-face {
       font-family: '."'".'Lato'."'".';
       font-style: normal;
       font-weight: 900;
       src: local( '."'".'Lato-Black'."'".'), local('."'".'Lato-Black'."'".'), url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh50XSwiPGQ.woff2) format('."'".'woff2'."'".');
       unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
     }
 
     /* Reset styles */ 
     body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
     body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
     table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
     img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
     #outlook a { padding: 0; }
     .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
     .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
 
     /* Rounded corners for advanced mail clients only */ 
     @media all and (min-width: 560px) {
         .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
     }
 
     /* Set color for auto links (addresses, dates, etc.) */ 
     a, a:hover {
         color: #127DB3;
     }
     .footer a, .footer a:hover {
         color: #999999;
     }
 
         </style>
 
         <!-- MESSAGE SUBJECT -->
         <title>XendFleet Taxi quote Comparison</title>
 
     </head>
 
     <!-- BODY -->
      <body link="#CDDC39" vlink="#CDDC39" alink="#CDDC39" style="background-color:#F0F0F0;">
     <br><br>
     <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">            
             <tr>
                 <td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;">
                     <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                         <tr>
                             <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #000000;background-color: #ffffff;font-weight:bold;font-family: '."'".'Lato'."'".', sans-serif;">
                                 <center><a target="_blank" style="text-decoration: none;"
                     href="https://minicabee.co.uk/"><img border="0" vspace="0" hspace="0"
                     src="https://minicabee.co.uk/assets/images/logo.png"
                     width="200" height="80"
                     alt="Logo" title="Logo" style="
                     color: #000000;
                     font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a> </center>
                             </td>
                         </tr>
                           <tr>
             <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                 padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
                 href=""><img border="0" vspace="0" hspace="0"
                 src="https://startersup.github.io/minicabee/assets/images/booktaxi.png"
                 alt="Please enable images to view this content" title="XendFleet Banner"
                 width="400" style="
                 width: 100%;
                 max-width: 450px;
                 color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
         </tr>
                         <tr>
                             <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #555559;font-family:'."'".'Lato'."'".', sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
                                 <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                     <div class="mktEditable" id="main_text">
                                             <p style="font-family: '."'".'Lato'."'".', sans-serif;line-height: 30px;font-size:18px;">Hello <b>'.$name.'</b>, We have received your booking now, kindly check the below provided information and reconfirm us by tapping the button below.</p>
                                         </div>
 
 
                         <center><b style="font-family: '."'".'Lato'."'".', sans-serif;line-height: 30px;font-size:22px;padding:20px 10px;">Booking Information ('.$ref.')</b></center><br>
                                                          <table style="font-family: '."'".'Lato'."'".', sans-serif;
         border-collapse: collapse;
         width: 100%;color:#555559;font-size:14px;">
 
       <tr>
         <th style=" text-align:right;padding:20px 10px;"><b>Passenger Name</b></th>
         <th  style="text-align: left;padding:20px 10px;">:'.$name.'</th>
       </tr>
        <tr>
         <th style=" text-align:right;padding:10px;"><b>Contact Number</b></th>
         <th  style="text-align: left;padding:10px;">:'.$mobile1.'</th>
       </tr>
         <tr>
         <th style=" text-align:right;padding:10px;"><b>Alternate Number</b></th>
         <th  style="text-align: left;padding:10px;">: '.$mobile2.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Email Id</b></th>
         <th  style="text-align: left;padding:10px;">: '.$mail.'</th>
       </tr>
              <tr style="border-bottom:2px solid #65707f;">
         <th style=" text-align:right;padding:10px;"><b>Reference Id</b></th>
         <th  style="text-align: left;padding:10px;">: '.$ref.'</th>
            </tr>
 
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Pickup From</b></th>
         <th  style="text-align: left;padding:10px;">: '.$origin_input.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Dropoff To</b></th>
         <th  style="text-align: left;padding:10px;">: '.$destination_input.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Via Point</b></th>
         <th  style="text-align: left;padding:10px;">:'.$via.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Full pickup Address</b></th>
         <th  style="text-align: left;padding:10px;">: '.$address1.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Full Dropoff Address</b></th>
         <th  style="text-align: left;padding:10px;">: '.$address2.'</th>
       </tr>
              <tr>
         <th style=" text-align:right;padding:10px;"><b>Pickup Date And Time</b></th>
         <th  style="text-align: left;padding:10px;">: '.$date.$time.'</th>
            </tr>
 
                   <tr>
         <th style=" text-align:right;padding:10px;"><b>Passengers</b></th>
         <th  style="text-align: left;padding:10px;">: '.$np.'</th>
       </tr>
                  <tr>
         <th style=" text-align:right;padding:10px;"><b>Luggages</b></th>
         <th  style="text-align: left;padding:10px;">: '.$nl.'</th>
       </tr>
                  <tr style="border-bottom:2px solid #65707f;">
         <th style=" text-align:right;padding:10px;"><b>Cab Type</b></th>
         <th  style="text-align: left;padding:10px;">: '.$type.'</th>
       </tr>
                  <tr>
         <th style=" text-align:right;padding:10px;"><b>Total Fare</b></th>
         <th  style="text-align: left;padding:10px;">:£'.$fare.'</th>
       </tr>
                  <tr style="border-bottom:2px solid #65707f;">
         <th style=" text-align:right;padding:10px;"><b>payment Mode</b></th>
         <th  style="text-align: left;padding:10px;">: '.$pay.'</th>
       </tr>
 
 
             </table>
 
                             <tr>
                                         <td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
                                          &nbsp;<br>
                                         </td>
                                     </tr>
                                                            
                         <tr>
                             <td valign="top" align="center" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                 <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                     <tr>
                                         <td align="center" valign="middle" class="social" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size:px;line-height: 26px;text-align: center;">
                                             <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                                 <tr>
                                         <td style="border-collapse: collapse;border: 0;margin: 0;padding:10px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 26px;"><a>Call us at :020 37452804</a></td>
                                         <td style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 26px;"><a href="https://minicabee.co.uk/">Visit : https://minicabee.co.uk/</a></td>
                                                 </tr>
                                             </table>
                                         </td>
                                     </tr>
                                 </table>
                             </td></table>	
                         </tr>
                         <tr bgcolor="#fff" style="border-top: 4px solid #CDDC39;">
                             <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
                                 <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
 
                                 </table>
                             </td>
                         </tr>
                     </table>
                 </td>
             </tr>
         </table>
       </body>
     </html>
 
 ';

 $subject = "Booking Information for Return : Reference Id (".$ref.")";

// Always set content-type when sending HTML email
$headers = "";
$headers .= "From: Britannia  <bookings@minicabee.co.uk> \r\n";
$headers .= "Reply-To: XendFleet  <bookings@minicabee.co.uk> \r\n"."X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";



$smail=mail("minicabee@gmail.com",$subject,$message,$headers);
$smail=mail($mail,$subject,$message,$headers);
 }
else{
		 $temp["status"]="fail";
	 $temp["message"]="Try Again";
}
$temp["bookid"]=$ref;
echo json_encode($temp);
 ?>
