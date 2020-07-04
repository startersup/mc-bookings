
    <?php

if($boolSession)
{
    $variable = str_replace($host, "", $prev_url);
    $boolSession=FALSE;

    if($_SESSION["rights"][$variable] == "read"){
        $boolSession=TRUE;
    }else if($_SESSION["rights"][$variable] == "no"){
        $boolSession=FALSE;
        $msg="Dont Have Enough Rights";
    }
}

?>