<?php

session_start();

$prev_url = $_SERVER['HTTP_REFERER'];
$host = $_SERVER['HTTP_HOST'];
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
date_default_timezone_set('Europe/London');
if (strpos($prev_url, $host)) {
    $rootfolder = $_SERVER['DOCUMENT_ROOT'];
    include($rootfolder . "/connection/connect.php");

    if (!$conn) {
        echo ("Connection Failed");
    } else {
        $user = $_POST["user"];
        $password = $_POST["password"];
        $query = "SELECT `name`,`mail`,`password`,`username`,`rights`,`booking_Rights` from user WHERE ( username = '" . $user . "'  or mail = '" . $user . "' or mobile1 = '" . $user . "' ) and status != 'dismissed' ";
        $result =  mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($row["password"] == $password) {
                $_SESSION["username"] = $user;
                $_SESSION["name"] = $row["name"];
                $_SESSION["mail"] = $row["mail"];
                $output = $row["rights"];

                $_SESSION["registerClause"] = "";

                if (!($row["booking_Rights"] == "" || strtoupper($row["booking_Rights"]) == "ALL")) {
                    $tags = explode(',', $row["booking_Rights"]);
                    $_SESSION["registerClause"] .= " AND (";
                    $loopcount = count($tags);
                    for ($i = 0; $i < $loopcount; $i++) {
                        $_SESSION["registerClause"].= " ( register.refid like '".$tags[$i]."%' ) ";

                        if($i == ($loopcount-1))
                        {
                            $_SESSION["registerClause"].= " ) ";
                        }else{
                            $_SESSION["registerClause"].= " OR ";
                        }
                    }
                }
                $rights = json_decode($output, true);

                $query_module = "SELECT `view` from modules ";
                $result_module =  mysqli_query($conn, $query_module);
                while ($row_module = mysqli_fetch_array($result_module, MYSQLI_ASSOC)) {
                    $temp = $row_module["view"];
                    $_SESSION["rights"][$temp] = $rights[$temp];
                }

                $_SESSION["sessiontime"] = 6000;
                $_SESSION["logintime"] = strtotime(date("Y-m-d H:i:s"));
                echo ('<script>window.location.href ="' . $link . "://" . $host . '"</script>');
            } else {
                echo ('<script>alert("User Name or Password is wrong"); window.location.href ="' . $_SERVER['HTTP_REFERER'] . '"</script>');
            }
        } else {
            echo ('<script>alert("User Not Found"); window.location.href ="' . $_SERVER['HTTP_REFERER'] . '"</script>');
        }
    } // connection 


} // checking url
else {
    echo ('<script>alert("UnAuthorized Access"); window.location.href ="' . $_SERVER['HTTP_REFERER'] . '"</script>');
}
