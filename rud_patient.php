<?php
if(!isset($_SESSION))
{
session_start();
}
if(!isset($_SESSION['username']))
{
    header("location: index.php");
    
}else{
?>
!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style>
    .list-group-item{
      color: black;
    }
    .table {
      box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.4);
      transition: 0.3s;
      /* width: 40%; */
    }

  .table:hover {
      box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.4);
   }
   body{

background-size: cover;
background-image: url('images/greenbg.png');
}
    </style>
</head>
<body>
<?php
include('navbar.php');
include('connection.php');
?>
<div style="height: 50px;"></div>
<h2 style="text-align: center; text-shadow: 2px 1px 3px #000000;" >Patient Details</h2><br>
<table class="table table-hover table-dark table-bordered table-sm table-responsive" style="background-color: #ABEBC6 ;">
  <thead >
    <tr>
      <th scope="col">#id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Pincode</th> 
      <th scope="col">Blood Group</th> 
      <th scope="col">Age</th> 
      <th scope="col">Gender</th> 
      <th scope="col">Admitted to</th> 
      <th scope="col">Edit</th> 
      <th scope="col">Delete</th> 

    </tr>
  </thead>
  <tbody>
  <?php 

  include('connection.php');
  include('navbar.php');
  include('backend_actions.php');
  include('footer.php');
  display_patients();

  ?>

  </tbody>
  
</table>
   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
</body>
</html>
<?php } ?>