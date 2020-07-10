<?php

if($boolSession)
{
    if($_SESSION["rights"][$variable] == "write"){
        $boolSession=TRUE;
    }else if($_SESSION["rights"][$variable] == "no"){
        $boolSession=FALSE;
        $msg="Dont Have Enough Rights";
    }
}

?>