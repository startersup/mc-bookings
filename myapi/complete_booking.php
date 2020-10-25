<?php



 $rootfolder= $_SERVER['DOCUMENT_ROOT']; 

 include($rootfolder."/myapi/sessionCheck.php");
 include($rootfolder."/myapi/rightsCheckWrite.php");

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
    
    $st="completed";
      $result= mysqli_query($conn,"UPDATE `register` SET `status`='$st' WHERE refid='$ref'");
    
   
if($result)
{
   
   $row["response"]="Success";
    $row["msg"]=$ref." ..!!  Completed Sucessfully";
    $row["id"]=$ref;
    $row["opr"]=$st;
    $row["code"]="status";
    
    echo json_encode($row);
}
 
 
    





}
?>