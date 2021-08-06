<?php
// include('navbar.php');
if(!isset($_SESSION))
{
    session_start();
}
include "connection.php";
include "backend_actions.php";
 // Using database connection file here

$pid = $_GET['eid']; // get id through query string
$did = $_GET['did'];
 // get id through query string
// echo 'id is '.$id;
$qry = mysqli_query($con,"select * from patients where pid='$pid'"); // select query
$qry1 = mysqli_query($con,"select * from doctors where did='$did'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
$assigned_doc=mysqli_fetch_array($qry1); 
include("navbar.php");

function assign_doctors()
{
    global $con;
    $spl=$_GET['spl'];
    echo'$spl';
	$result=mysqli_query($con,"select * from doctors where speciality='$spl'");
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['did'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}

}

if(isset($_POST['update_assign'])) // when click on Update button
{
    $did=$_POST['did'];
	

    $edit = mysqli_query($con,"update doctor_patient set did='$did' where pid='$pid'");
	
    if($edit)
    {
 // Close connection
        echo"<script>alert('Assignment updated successfully!!','_self');</script>";
        echo"<script>window.open('rud_assignment.php','_self');</script>";
        exit;
    }
    else
    {
        // echo 'Error updating!!';
        echo'<script>alert("error","_self");</script>';
        echo"<script>location.reload();</script>";

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
   body{

background-size: cover;
background-image: url('images/greenbg.png') ;
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
    <div class="card-body" style="background-color: #17A589;color:#ffffff"><h3>Update doctor assignment </h3></div>
    <div class="card-body">
    <form class="form-group"  method="post">
    Patient ID: <?php echo $data['pid'] ?><br>
    First Name: <?php echo $data['pfname'] ?><br>
    Last Name: <?php echo $data['plname'] ?><br>
    Email: <?php echo $data['pemail'] ?><br>
    Contact: <?php echo $data['pcontact'] ?><br>
    Assigned Doctor: <?php echo $assigned_doc['dfname'].' '.$assigned_doc['dlname'] ?><br>
    Assign doctor:
    <select name="did" id="" class="form-control value="">
    <?php
    // include('backend_actions.php');
    assign_doctors();
    ?>
    
    </select><br><br>
    <input type="submit" class="btn btn" style="background-color: #48C9B0;" name="update_assign" value="Assign"> 
  
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