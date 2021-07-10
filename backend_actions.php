  
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
	$pbloodGroup=$_POST['pBloodGroup'];
	$pAge=$_POST['pAge'];
	$pGender=$_POST['pGender'];
	$pincode=$_POST['pincode'];
	$admitted_to=$_POST['admitted_to'];
	

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
	
	$sql = "INSERT INTO patients (pfname,plname, pemail,pcontact,pincode,pBloodGroup,pAge1,pGender,admitted_to)VALUES ('$pfname','$plname','$pemail','$pcontact','$pincode','$pbloodGroup',$pAge,'$pGender','$admitted_to')";

	if ($con->query($sql) === TRUE) {
		echo"<script>alert('New patient record added successfully!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
	} else {
	echo "Error: " . $sql . "<br>" . $con->error;
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
function display_patients()
{
	global $con;
	$query2="select * from patients";
	$results = mysqli_query($con,$query2);
	while ($row1 = mysqli_fetch_array($results)) {
		echo'<tr>';
		echo '<td>'.$row1["pid"].'</td>';
		echo '<td>'.$row1["pfname"].'</td>';
		echo '<td>'.$row1["plname"].'</td>';
		echo '<td>'.$row1["pemail"].'</td>';
		echo '<td>'.$row1["pcontact"].'</td>';
		echo '<td>'.$row1["pincode"].'</td>';
		echo '<td>'.$row1["pBloodGroup"].'</td>';
		echo '<td>'.$row1["pAge1"].'</td>';
		echo '<td>'.$row1["pGender"].'</td>';
		echo '<td>'.$row1["admitted_to"].'</td>';
		echo'<td><a href="editPatients.php?eid='.$row1['pid'].'">Edit</a></td>';
    	echo'<td><a href="deletePatients.php?id='.$row1['pid'].'" >Delete</a></td>';
		echo'</tr>';
	}
}





?>