<?php

include ("connection.php"); 
$id = $_GET['id']; 

$del = mysqli_query($con,"delete from doctors where did = '$id'"); 

if($del)
{

    header("location:rud_doctors.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>