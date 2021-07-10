<?php

include ("connection.php"); 
$id = $_GET['id']; 

$del = mysqli_query($con,"delete from patients where pid = '$id'"); 

if($del)
{

    header("location:rud_patient.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>