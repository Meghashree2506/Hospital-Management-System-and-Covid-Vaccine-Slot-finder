  
<?php

include('connection.php');

if(isset($_POST['login_submit'])){
	$username=$_POST['adName'];
	$password=$_POST['adPass'];
	$query="select * from admin_login where adName='$username' and adPass='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:homepage.php");
	}
	else
    {
   
        echo"<script>alert('Enter the right details','_self');</script>";
        echo"<script>window.open('index.php','_self');</script>";
    }
}
if(isset($_POST['patientDetails_submit']))
{
	$pfname=$_POST['pfname'];
	$plname=$_POST['plname'];
	$pemail=$_POST['pemail'];
	$pcontact=$_POST['pcontact'];
	$pincode=$_POST['pincode'];

	$query="select * from patients where pemail='$pemail'";
	$result=mysqli_query($con,$query);
	$query1="select * from patients where pcontact='$pcontact'";
	$result1=mysqli_query($con,$query1);
	
	if(mysqli_num_rows($result)>0)
	{
		echo"<script>alert('mail id already exists!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	}
	else if(mysqli_num_rows($result1)>0)
	{
		echo"<script>alert('contact already exists!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	}
	else if(!validate_mobile($pcontact))
	{
		echo"<script>alert('Invalid mobile number!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	}
	else if (!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
		echo"<script>alert('Invalid mail id!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	}
	else{
	
	$sql = "INSERT INTO patients (pfname,plname, pemail,pcontact,pincode)
	VALUES ('$pfname','$plname','$pemail','$pcontact','$pincode')";

	if ($con->query($sql) === TRUE) {
		echo"<script>alert('New patient record added successfully!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
		}

}
function display_details()
{
	global $con;
	$query="select * from rooms";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['room_name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}
function display_pincodes()
{
	global $con;
	$query="select pincode from patients";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['pincode'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

?>