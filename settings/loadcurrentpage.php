
<?php
  $action="";
  if ($_POST["x"] =="")
  {

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
    
    $url=$_SERVER['HTTP_HOST'];
    $temp = $_SERVER['PHP_SELF'];
    $temp=str_replace("/","",$temp);
    $temp=str_replace("index.php","/",$temp);
    echo('<form style="display:none" id="myform" method="post" action="'.$link.'://'.$url.'" ><input type="text" name="q" value="'.$temp.'"> </form>');
    $action="true";

  }
   ?>

<script>  document.getElementById("myform").submit(); </script>