
<?php

session_start();

 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 
 
  include($rootfolder."/connection/connect.php"); 


   
    $sql="SELECT id,concat(name,' (',password,')') as tempname,mobile,mobile2,e_mail,status from driver union select id,concat(name,' (',password,')') as tempname,mobile,mobile2,e_mail,status from provider ";
  
  $result=  mysqli_query($conn,$sql);

  while( $row= mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
     
     $temp[]=$row;
}
if($temp==null)
{
   $temp=array();
}
  echo  json_encode($temp);

  mysqli_close($conn);

  ?>

 