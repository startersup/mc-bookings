<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.twilio.com/2010-04-01/Accounts/AC093fdc747b395f0d5d0b7dce029ea20e/Messages.json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "From=Taxi-Info&To=+447818065914&Body=Test");

$headers = array(
    'Content-Type:application/x-www-form-urlencoded',
    'Authorization: Basic '. base64_encode("AC093fdc747b395f0d5d0b7dce029ea20e:9be91bc229a0946bc6ac6369bbe708c0")
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
if ($server_output == "OK") { 
    
    echo("Success <br>");
    echo ($server_output);
    echo("<br>");
    echo("Success encode <br>");
    echo json_encode($server_output);
 } else { 
     
    echo("Fail <br>");
    echo ($server_output);
    echo("<br>");
    echo("Fail encode <br>");
    echo json_encode($server_output);
  }

?>