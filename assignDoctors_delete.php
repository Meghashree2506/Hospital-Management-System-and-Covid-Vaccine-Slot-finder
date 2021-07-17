<?php

include ("connection.php"); 
$pid = $_GET['eid']; 
$did = $_GET['did']; 

$del = mysqli_query($con,"delete from doctor_patient where pid = '$pid' and did='$did'"); 

if($del)
{

    header("location:rud_assignment.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>