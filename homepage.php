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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('navbar.php');?>

    <div class="col-md-3" style="height: 40px;">
    </div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-5">
    <div class="card">
      <div class="card-body" style="background-color: #17A589;color:#ffffff"><center><h3>Find Vaccine Slots</h3></center><center>Get vaccinated by us or any other hospital</center></div>
    <img src="images/vaccine1.jpg" class="card-img-top">
    <div class="card-body">
    <form class="form-group" action="vaccine_slots.php" method="post">
    
    Select Pincode:
    </br><br>
    <select name="vpincode" id="" class="form-control">
    <?php
    include('backend_actions.php');
    display_pincodes();
    ?>
    
    </select><br><br> 
    <input type="submit" class="btn btn" style="background-color: #48C9B0;" name="find_vaccines" value="Submit"> 
  
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>