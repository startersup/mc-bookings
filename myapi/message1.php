<?php
$from='+447723012660';
$to = '+7818065914';
$msg='Test';
$url ="https://api.twilio.com/2010-04-01/Accounts/AC093fdc747b395f0d5d0b7dce029ea20e/Messages.json";
$data = array('From' => $from, 'To' => $to,'Body' => $msg);
echo json_encode($data);
echo("<br>");
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded , Authorization: Basic ". base64_encode("AC093fdc747b395f0d5d0b7dce029ea20e:6d4e9f5c8fc58e9eac02b65d4bdb06c9"),
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

echo("Var Dumb <br>");
var_dump($result);
echo("<br>");
echo("result <br>");
echo json_encode($result);


?>

