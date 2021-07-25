<?php
if(!isset($_SESSION))
{
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style>
    .list-group-item{
      color: black;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #17A589;">
  <a class="navbar-brand" href="#" style="color:#ffffff;">General Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php" style="color: #ffffff;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
          Patients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="rud_patient.php">Patient details</a>
          <a class="dropdown-item" href="patients.php">Add new patient</a>
          <a class="dropdown-item" href="rud_patient.php">Update patient details</a>
          <a class="dropdown-item" href="search_patients.php">Search Patients</a>
          <a class="dropdown-item" href="assign_doctors.php">Assign doctor</a>
          <a class="dropdown-item" href="rud_assignment.php">Assigned Patients</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="rud_patient.php">Discharge/Delete Patient Details</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff;">
          Doctors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="rud_doctors.php">Doctor details</a>
          <a class="dropdown-item" href="doctors.php">Add new doctor</a>
          <a class="dropdown-item" href="search_doctors.php">Search doctors</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="rud_doctors.php">Remove staff</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="backend_actions.php" method="post">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: #ffffff; background-color:#48C9B0;" name="logout">Signout</button>
    </form>
  </div>
</nav>


    
</body>
</html>


