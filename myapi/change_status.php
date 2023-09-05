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
      
      $cc=" ";
    
    $st="booked-confirmed";
    
   
    $result= mysqli_query($conn,"UPDATE `register` SET `status`='$st' WHERE refid='$ref'");
 

if($result)
{
        
         $subject = "New Job Alert : Reference Id (".$ref.")";

// Always set content-type when sending HTML email
$headers = "";
$headers .= "From: XendFleet <info@minicabee.co.uk> \r\n";
$headers .= "Reply-To: XendFleet <info@minicabee.co.uk>  \r\n"."X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";

$res= mysqli_query($conn,"SELECT * from `register` WHERE refid='$ref'");


  $rowpass= mysqli_fetch_array($res,MYSQLI_ASSOC);


$message = ' <html xmlns="http://www.w3.org/1999/xhtml">
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
<!-- Set message background color (twice) and text color (twice) -->
<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #f0f0f0 !important;
	color: #000000;"
	bgcolor="#f0f0f0"
	text="#000000">

<!-- SECTION / BACKGROUND -->
<!-- Set message background color one again -->
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
	bgcolor="#f0f0f0">

<!-- WRAPPER -->
<!-- Set wrapper width (twice) -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">



<!-- End of WRAPPER -->
</table>
<br><br><br>
<!-- WRAPPER / CONTEINER -->
<!-- Set conteiner background color -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
	bgcolor="#FFFFFF"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="container">
    	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			">
			<a target="_blank" style="text-decoration: none;"
				href="https://minicabee.co.uk/"><img border="0" vspace="0" hspace="0"
				src="https://minicabee.co.uk/assets/images/logo.png"
				width="200" height="80"
				alt="Logo" title="Logo" style="
				color: #000000;
				font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: 900; line-height:40px;
			padding-top: 25px;
             letter-spacing:0.9px;                                  
			color: #000000;
			font-family: '."'".'Lato'."'".', sans-serif;" class="header">
				Hey there is a new Job at bin!
		</td>
	</tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #000000;
			font-family: '."'".'Lato'."'".', sans-serif;" class="subheader">
				do you like to bid or grab? 
		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
			padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
			href=""><img border="0" vspace="0" hspace="0"
			src="https://startersup.github.io/minicabee/assets/images/promotion.png"
			alt="Please enable images to view this content" title="Hero Image"
			width="560" style="
			width: 100%;
			max-width: 560px;
			color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
	</tr>

				<tr>
						<td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #555559;font-family: '."'".'Lato'."'".', sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
							<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<div class="mktEditable" id="main_text">
									</div>
								
					<center><b style="font-family: '."'".'Lato'."'".', sans-serif;font-weight:800;color:#000000;line-height: 30px;font-size:22px;padding:20px 10px;">Job Details</b></center>
                            						 <table style="font-family: '."'".'Lato'."'".', sans-serif;
    border-collapse: collapse;
    width: 100%;color:#555559;font-size:14px;">
      <tr>
    <th style=" text-align:right;padding:10px;"><b>Pickup From</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["src"].'</th>
  </tr>
  <tr>
    <th style=" text-align:right;padding:10px;"><b>Drop off</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["des"].'</th>
  </tr>
   <tr>
    <th style=" text-align:right;padding:10px;"><b>Full Pickup Address</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["address1"].'</th>
  </tr>
  <tr>
    <th style=" text-align:right;padding:10px;"><b>Full Dropoff Address</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["address2"].'</th>
  </tr>
   <tr>
    <th style=" text-align:right;padding:10px;"><b>Via Point</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["via"].'</th>
  </tr>
    <tr>
    <th style=" text-align:right;padding:10px;"><b>Pickup Date And Time</b></th>
    <th  style="text-align: left;padding:10px;">: '.$rowpass["dt"].$cc.$rowpass["time"].'</th>
  </tr>
             <tr>
    <th style=" text-align:right;padding:10px;"><b>Cab Type</b></th>
    <th  style="text-align: left;padding:10px;">:  '.$rowpass["type"].'</th>
  </tr>
                                                        
        </table>
                           				
						<tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;
			padding-bottom: 5px;" class="button"><a
			href="" target="_blank"  style="text-decoration:none !important;">
				<table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
					bgcolor="#2bc15b"><a target="_blank" href="https://drive4me.co.uk/admin/index.html" style="text-decoration:none !important;
					color: #FFFFFF;font-family: '."'".'Lato'."'".', sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
					href="">
					View Details
					</a>
			</td></tr></table></a>
		</td>
	</tr>

	<!-- LINE -->
	<!-- Set line color -->
	<tr>	
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="line"><hr
			color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
		</td>
	</tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 20px;
			padding-bottom: 25px;
			color: #000000;
			font-family: sans-serif;" class="paragraph">
				Have a&nbsp;question? <a href="mailto:minicabee@gmail.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">drivers@minicabee.co.uk</a>
		</td>
	</tr>

<!-- End of WRAPPER -->
</table>

<!-- WRAPPER -->
<!-- Set wrapper width (twice) -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="social-icons"><table
			width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
			<tr>

				<!-- ICON 1 -->
				<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
					href=" https://www.facebook.com/MiniCabee-540741142988885/?ref=nf&hc_ref=ARQmkc6epUcUK6PlhzU7P5_1C0RPvY93y_x00HcnVKJ_7K94I_dPdR4LfYm9Tw7ue9c   "
				style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
					alt="F" title="Facebook"
					width="44" height="44"
					src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>

				<!-- ICON 2 -->
				<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
					href=" https://twitter.com/minicabee?lang=en"
				style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
					alt="T" title="Twitter"
					width="44" height="44"
					src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>				

				<!-- ICON 3 -->

				<!-- ICON 4 -->
				<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
					href=" http://minicabee.blogspot.com/"
				style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
					alt="I" title="Instagram"
					width="44" height="44"
					src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>

			</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
			padding-top: 20px;
			padding-bottom: 20px;
			color: #999999;
			font-family: sans-serif;" class="footer">

				This email was sent as you have Driver account with Minicabee.


		</td>
	</tr>

<!-- End of WRAPPER -->
</table>

<!-- End of SECTION / BACKGROUND -->
</td></tr></table>

</body>
</html>


';







$check="minicabee@gmail.com";

$mail=mail($check,$subject,$message,$headers);

$ress= mysqli_query($conn,"SELECT * from `driver` WHERE 1");

$ress2= mysqli_query($conn,"SELECT * from `provider` WHERE 1");
 
//  while($row= mysqli_fetch_array($ress,MYSQLI_ASSOC))
//  {


// $mail=mail($row["e-mail"],$subject,$message,$headers);


 
//  }    
     
// while($row= mysqli_fetch_array($ress2,MYSQLI_ASSOC))
// {


//  $mail=mail($row["e-mail"],$subject,$message,$headers);


 
// }    
      
    $row["response"]="Success";
    $row["msg"]="Booking confirmed Successfully";
    $row["opr"]=$st;
    $row["code"]="status";
    $row["id"]=$ref;
    echo json_encode($row);


    }

else
{
    
   $row["response"]="Failed";
    $row["msg"]="Booking is not confirmed";
    
    
    echo json_encode($row);
}



}
?>