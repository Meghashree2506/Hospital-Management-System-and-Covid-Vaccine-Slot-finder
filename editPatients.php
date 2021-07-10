<?php
// include('navbar.php');

include "connection.php"; // Using database connection file here

$id = $_GET['eid']; // get id through query string
echo 'id is '.$id;
$qry = mysqli_query($con,"select * from patients where pid='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
include("navbar.php");

if(isset($_POST['update'])) // when click on Update button
{
    $pfname=$_POST['pfname'];
	$plname=$_POST['plname'];
	$pemail=$_POST['pemail'];
	$pcontact=$_POST['pcontact'];
	$pbloodGroup=$_POST['pBloodGroup'];
	$pAge=$_POST['pAge'];
	$pGender=$_POST['pGender'];
	$pincode=$_POST['pincode'];
	$admitted_to=$_POST['admitted_to'];
	
    $edit = mysqli_query($con,"update patients set pfname='$pfname',plname='$plname', pemail='$pemail', pcontact='$pcontact',pBloodGroup='$pbloodGroup',pAge1=$pAge, pGender='$pGender',pincode='$pincode',admitted_to='$admitted_to' where pid='$id'");
	
    if($edit)
    {
 // Close connection
        echo'<script>alert("here")</script>';
        header("location:rud_patient.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo 'Error updating!!';
        echo'<script>alert("error")</script>';
    }    	
}
?>

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
    </style>
</head>
<body>
<div class="col-md-3" style="height: 80px;">
    </div>
<div class="container-fluid">
    <div class="row">


    <div class="col-md-3"></div>
    <div class="col-md-5">
    <div class="card">
    <div class="card-body" style="background-color: #17A589;color:#ffffff"><h3>Edit Patient Details </h3></div>
    <div class="card-body">
    <form class="form-group"  method="post">
    First Name: <input type="text" name="pfname" class="form-control" value="<?php echo $data['pfname'] ?>"required><br>
    Last Name: <input type="text" name="plname" class="form-control" value="<?php echo $data['plname'] ?>" required><br>
    Email: <input type="email" name="pemail" class="form-control" value="<?php echo $data['pemail'] ?>" required><br>
    Contact: <input type="text" name="pcontact" class="form-control" value="<?php echo $data['pcontact'] ?>" required><br>
    Blood Group: <input type="text" name="pBloodGroup"class="form-control" value="<?php echo $data['pBloodGroup'] ?>" required><br>

    Age: <input type="number" name="pAge"class="form-control" value="<?php echo $data['pAge1'] ?>" min=1 max=120 required ><br>
    Gender: <br><select name="pGender" id=""><option value="<?php echo $data['pGender'] ?>">Female</option><option value="Male">Male</option><option value="Other">Other</option></select><br><br>
    Pincode: <input type="text" name="pincode"class="form-control" value="<?php echo $data['pincode'] ?>" required><br>
    Admit to:
    <select name="admitted_to" id="" class="form-control value="<?php echo $data['admitted_to'] ?>">
    <?php
    include('backend_actions.php');
    display_details();
    ?>
    
    </select><br><br>
    <input type="submit" class="btn btn" style="background-color: #48C9B0;" name="update" value="Update"> 
  
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

<!-- <h3>Update Data</h3>

<form method="POST">
  <input type="text" name="fullname"  placeholder="Enter Full Name" Required>
  <input type="text" name="age" value="<?php echo $data['age'] ?>" placeholder="Enter Age" Required>
  <input type="submit" name="update" value="Update">
</form> -->