<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$con=mysqli_connect("localhost","root","","hospitalmanagementsystem");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>