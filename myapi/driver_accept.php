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
        $did=$_POST['did'];
          $bid=$_POST['new'];
         
        
    
  



 $result2= mysqli_query($conn,"SELECT * from `register` WHERE refid='$ref'");

  $row= mysqli_fetch_array($result2,MYSQLI_ASSOC);
  
 
    
$st="comitted";
    
    

  $result= mysqli_query($conn,"UPDATE `register` SET `status`='$st',`drvid`='$did',`dfare`='$bid' WHERE refid='$ref'");
  
  
   $res= mysqli_query($conn,"SELECT * from `register` WHERE refid='$ref'");

    
    
   

    if($result)
    {
        
        
        $subjectp = "Driver Details for the Journey : Reference Id (".$ref.")";
        
        $subjectd = "Passenger Details for the Journey : Reference Id (".$ref.")";
        

// Always set content-type when sending HTML email
$headers = "";
$headers .= "From: Minicabee <noreply-bookings@minicabee.co.uk> \r\n";
$headers .= "Reply-To: Minicabee <noreply-bookings@minicabee.co.uk> \r\n"."X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";



  $rowpass= mysqli_fetch_array($res,MYSQLI_ASSOC);
  
  
  
  $lendid=strlen($did);
  

  
  $res2= mysqli_query($conn,"SELECT * from `driver` WHERE id='$did'");
  $rowd= mysqli_fetch_array($res2,MYSQLI_ASSOC);
  

$messagep = '
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<title>Minicabee Taxi quote Comparison</title>

</head>

<!-- BODY -->
 <body link="#CDDC39" vlink="#CDDC39" alink="#CDDC39" style="background-color:#F0F0F0;">
<br><br>
<table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;border-top: 4px solid #CDDC39;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">            
		<tr>
			<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;">
				<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
					<tr>
						<td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #000000;background-color: #ffffff;font-weight:bold;font-family:  '."'".'Lato'."'".', sans-serif;">
							<center><a target="_blank" style="text-decoration: none;"
				href="https://minicabee.co.uk/"><img border="0" vspace="0" hspace="0"
				src="https://minicabee.co.uk/assets/images/logo.png"
				width="150" height="80"
				alt="Logo" title="Logo" style="
				color: #000000;
				font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a> </center>
						</td>
					</tr>
                      <tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
			padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
			href=""><img border="0" vspace="0" hspace="0"
			src="https://startersup.github.io/minicabee/assets/images/driverdetails.jpg"
			alt="Please enable images to view this content" title="Minicabee Banner"
			width="400" style="
			width: 100%;
			max-width: 560px;
			color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
	</tr>
					<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #555559;font-family:  '."'".'Lato'."'".', sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<div class="mktEditable" id="main_text">
										<p style="font-family:  '."'".'Lato'."'".', sans-serif;line-height: 30px;font-size:18px;">Dear Passenger , here is your driver details for your journey, kindly connect with him before the journey.</p>
									</div>
								
					<center><b style="font-family:  '."'".'Lato'."'".', sans-serif;line-height: 30px;font-size:22px;padding:20px 10px;">Driver Details</b></center>
                            						 <table style="font-family:  '."'".'Lato'."'".', sans-serif;
    border-collapse: collapse;
    width: 100%;color:#555559;font-size:14px;">
      <tr>
    <th style=" text-align:right;padding:10px;"><b>Provider Name</b></th>
    <th  style="text-align: left;padding:10px;">: MCE Provider #32</th>
  </tr>
  <tr>
    <th style=" text-align:right;padding:10px;"><b>Driver Name</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowd["name"].'</th>
  </tr>
   <tr>
    <th style=" text-align:right;padding:10px;"><b>Contact Number</b></th>
    <th  style="text-align: left;padding:10px;">:  '.$rowd["mobile"].'</th>
  </tr>
    <tr>
    <th style=" text-align:right;padding:10px;"><b>Alternate Number</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowd["mobile2"].'</th>
  </tr>
             <tr>
    <th style=" text-align:right;padding:10px;"><b>Cab Type</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowd["car_type"].'</th>
  </tr>
                                                           <tr>
    <th style=" text-align:right;padding:10px;"><b>Cab Plate Number</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowd["car_num"].'</th>
  </tr>
        </table>
                           				
						<tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								</tr>
								<tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									<div class="mktEditable" id="download_button" style="text-align: center;">
										<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="tel:"'.$rowd["mobile"].'"">Contact Driver</a>										
									</div>
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


$mail=$rowpass["mail"];



// $ll=mail($mail,$subjectp,$messagep,$headers);


$messaged=' 

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<br><br><br>

<div class="card">
  <img src="http://drive4me.co.uk/images/banner-1.jpg" alt="Avatar" style="width:100%">
  <div class="container" style=" padding: 2px 16px;">
   <center><h1 style="font-family:Palatino Linotype, Book Antiqua, Palatino, serif;"><b>DRIVE 4 ME</b></h1></center>
      <br><P style="font-family:Tahoma, Geneva, sans-serif">Dear Driver, The Job you have been awaiting for has been confirmed and here is the job details, kindly make a call to the passenger before the journey. </P>
      <div class="card" style=" width:100%;  border-radius: 5px 5px 5px 5px;">
 <center style="background-color:#3ea6d2;color:white;"><h1 >Job Details</h1></center></div>
    
    <div class="pricing-table-content">
   <table style="    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;">
    


         <tr>
    <th style=" text-align:right;padding: 8px;">Passenger Name</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["name"].'</th>
  </tr>
       
         <tr>
    <th style=" text-align:right;padding: 8px;">Contact Number</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["num1"].' /  '.$rowpass["num2"].'</th>
  </tr>
        <tr>
    <th style=" text-align:right;padding: 8px;">Pickup From</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["src"].'</th>
  </tr>
         <tr>
    <th style=" text-align:right;padding: 8px;">Dropoff To</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["des"].'</th>
  </tr>
         <tr>
    <th style=" text-align:right;padding: 8px;">Via Point</th>
    <th  style="text-align: left;padding: 8px;">:'.$rowpass["via"].'</th>
  </tr>
         <tr>
    <th style=" text-align:right;padding: 8px;">Full pickup Address</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["address1"].'</th>
  </tr>
         <tr>
    <th style=" text-align:right;padding: 8px;">Full Dropoff Address</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["address2"].'</th>
  </tr>
         <tr>
    <th style=" text-align:right;padding: 8px;">Pickup Time And Time</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["dt"]." ".$rowpass["time"].'</th>
       </tr>
        
              <tr>
    <th style=" text-align:right;padding: 8px;">Passengers</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["passenger"].'</th>
  </tr>
             <tr>
    <th style=" text-align:right;padding: 8px;">Luggages</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["luggage"].'</th>
  </tr>
  
  
             <tr>
    <th style=" text-align:right;padding: 8px;">Luggages</th>
    <th  style="text-align: left;padding: 8px;">: '.$rowpass["dfare"].'</th>
  </tr>
           
        
        </table>

    <div class="footer" style="	padding: 16px 0;background-color: #f5f7f8;">
        
    </div>


  </div>
  </div>
</div>

</body>
</html> 

';




$mail=$rowd["e-mail"];


// $alert=mail($mail,$subjectd,$messaged,$headers);



  $row["response"]="Success";
    $row["msg"]="Data Updated Succeddfully";
    $row["id"]=$ref;
    $row["opr"]=$did;
    $row["code"]="drvid";
    $row["opr2"]=$new;
    $row["code2"]="dfare";
    echo json_encode($row);   
        
        
        
   
    }

else
{
    $row["response"]="Failed";
    $row["msg"]="Data Doesn't Updated";
    
    
    echo json_encode($row);
}

 
    
    



}
?>