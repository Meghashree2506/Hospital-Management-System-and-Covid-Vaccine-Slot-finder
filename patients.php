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
<!DOCTYPE html>
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
    .card {
      box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.4);
      transition: 0.3s;
      /* width: 40%; */
    }

  .card:hover {
      box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.4);
   }
    </style>
</head>
<body>
<?php
include('connection.php');
include('navbar.php');
include('footer.php');
?>
<div class="col-md-3" style="height: 80px;">
    </div>
<div class="container-fluid">
    <div class="row">


    <div class="col-md-3"></div>
    <div class="col-md-5">
    <div class="card">
    <div class="card-body" style="background-color: #17A589;color:#ffffff"><h3>Add new patient</h3></div>
    <div class="card-body">
    <form class="form-group" action="backend_actions.php" method="post">
    First Name: <input type="text" name="pfname" class="form-control" required><br>
    Last Name: <input type="text" name="plname" class="form-control" required><br>
    Email: <input type="email" name="pemail" class="form-control" required><br>
    Contact: <input type="text" name="pcontact" class="form-control" required><br>
    Blood Group: <input type="text" name="pBloodGroup"class="form-control" required><br>
    Age: <input type="number" name="pAge"class="form-control" value="1" min=1 max=120 required ><br>
    Gender: <br><select name="pGender" id=""><option value="Female">Female</option><option value="Male">Male</option><option value="Other">Other</option></select><br><br>
    Pincode: <input type="text" name="pincode"class="form-control" required><br>
    Admit to:
    <select name="admitted_to" id="" class="form-control">
    <?php
    include('backend_actions.php');
    display_details();
    ?>
    
    </select><br><br>
    <input type="submit" class="btn btn" style="background-color: #48C9B0;" name="patientDetails_submit" value="Submit"> 
  
    </form>
    </div>
    </div>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
</body>
</html>
<?php } ?>