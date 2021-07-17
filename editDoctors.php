<?php
// include('navbar.php');
if(!isset($_SESSION))
{
    session_start();
}
include "connection.php";
include "backend_actions.php";
 // Using database connection file here

$id = $_GET['eid']; // get id through query string
// echo 'id is '.$id;
$qry = mysqli_query($con,"select * from doctors where did='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
include("navbar.php");

if(isset($_POST['update_doctors'])) // when click on Update button
{
    $dfname=$_POST['dfname'];
	$dlname=$_POST['dlname'];
	$demail=$_POST['demail'];
	$dcontact=$_POST['dcontact'];
	$dAge=$_POST['dAge'];
	$dGender=$_POST['dGender'];
	$dpincode=$_POST['dpincode'];
	$speciality=$_POST['speciality'];
    $cur_email=$data['demail'];
    $cur_contact=$data['dcontact'];

    $query="select * from doctors where demail='$demail' and demail <> '$cur_email'";
	$result=mysqli_query($con,$query);
	$query1="select * from doctors where dcontact='$dcontact' and dcontact <> '$cur_contact'";
	$result1=mysqli_query($con,$query1);


	
	if(mysqli_num_rows($result)>0)
	{
		// echo"<script>alert('mail id already exists!!','_self');</script>";
		// echo"<script>window.open('rud_patient.php','_self');</script>";
        echo"<script>if(alert('mail id already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(mysqli_num_rows($result1)>0)
	{
		// echo"<script>alert('contact already exists!!','_self');</script>";
		// echo"<script>window.open('rud_patient.php','_self');</script>";
        echo"<script>if(alert('Contact already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(!validate_mobile($dcontact))
	{
		// echo"<script>alert('Invalid mobile number!!','_self');</script>";
		// echo"<script>window.open('rud_patient.php','_self');</script>";
        echo"<script>if(alert('Invalid mobile number!!','_self')){window.location.reload();}</script>";

	}
    else if (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
		// echo"<script>alert('Invalid mail id!!','_self');</script>";
		// echo"<script>window.open('rud_patient.php','_self');</script>";
        echo"<script>if(alert('Invalid mail id!!','_self')){window.location.reload();}</script>";

	}
    
    else{

    $edit = mysqli_query($con,"update doctors set dfname='$dfname',dlname='$dlname', demail='$demail', dcontact='$dcontact',dAge=$dAge, dGender='dGender',dpincode='$dpincode',speciality='$speciality' where did='$id'");
	
    if($edit)
    {
 // Close connection
        echo"<script>alert('doctor details updated successfully!!','_self');</script>";
        echo"<script>window.open('rud_doctors.php','_self');</script>";
        exit;
    }
    else
    {
        // echo 'Error updating!!';
        echo'<script>alert("error","_self");</script>';
        echo"<script>location.reload();</script>";

    }    	
}
}
if(!isset($_SESSION['username']))
{
    header("location: index.php");
    
}else{
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
    First Name: <input type="text" name="dfname" class="form-control" value="<?php echo $data['dfname'] ?>"required><br>
    Last Name: <input type="text" name="dlname" class="form-control" value="<?php echo $data['dlname'] ?>" required><br>
    Email: <input type="email" name="demail" class="form-control" value="<?php echo $data['demail'] ?>" required><br>
    Contact: <input type="text" name="dcontact" class="form-control" value="<?php echo $data['dcontact'] ?>" required><br>
    

    Age: <input type="number" name="dAge"class="form-control" value="<?php echo $data['dAge'] ?>" min=1 max=120 required ><br>
    Gender: <br><select name="dGender" id=""><option value="<?php echo $data['dGender'] ?>">Female</option><option value="Male">Male</option><option value="Other">Other</option></select><br><br>
    Pincode: <input type="text" name="dpincode"class="form-control" value="<?php echo $data['dpincode'] ?>" required><br>
    Admit to:
    <select name="speciality" id="" class="form-control value="<?php echo $data['speciality'] ?>">
    <?php
    // include('backend_actions.php');
    display_details();
    ?>
    
    </select><br><br>
    <input type="submit" class="btn btn" style="background-color: #48C9B0;" name="update_doctors" value="Update"> 
  
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

<?php } ?>
<!-- <h3>Update Data</h3>

<form method="POST">
  <input type="text" name="fullname"  placeholder="Enter Full Name" Required>
  <input type="text" name="age" value="<?php echo $data['age'] ?>" placeholder="Enter Age" Required>
  <input type="submit" name="update" value="Update">
</form> -->