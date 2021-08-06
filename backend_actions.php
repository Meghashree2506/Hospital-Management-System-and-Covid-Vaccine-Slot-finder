  
<?php

include('connection.php');

if(isset($_POST['login_submit'])){
	session_start();
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
if (isset($_POST['logout'])) {

	if(!isset($_SESSION))
	{
		session_start();
	}
	session_destroy();
	echo"<script>window.open('logout.php','_self')</script>";
	// header("Location:logout.php",true,301);
	exit();
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
		// echo"<script>if(alert('mail id already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(mysqli_num_rows($result1)>0)
	{
		echo"<script>alert('contact already exists!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
		// echo"<script>if(alert('Contact already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(!validate_mobile($pcontact))
	{
		echo"<script>alert('Invalid mobile number!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
		// echo"<script>if(alert('Invalid mobile number!!','_self')){window.location.reload();}</script>";
	}
	else if (!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
		echo"<script>alert('Invalid mail id!!','_self');</script>";
		echo"<script>window.open('patients.php','_self');</script>";
		// echo"<script>if(alert('Invalid mail id!!','_self')){window.location.reload();}</script>";
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
if(isset($_POST['doctorDetails_submit']))
{
	$dfname=$_POST['dfname'];
	$dlname=$_POST['dlname'];
	$demail=$_POST['demail'];
	$dcontact=$_POST['dcontact'];
	$dAge=$_POST['dAge'];
	$dGender=$_POST['dGender'];
	$dpincode=$_POST['dpincode'];
	$speciality=$_POST['speciality'];
	

	$query="select * from doctors where demail='$demail'";
	$result=mysqli_query($con,$query);
	$query1="select * from doctors where dcontact='$dcontact'";
	$result1=mysqli_query($con,$query1);
	
	if(mysqli_num_rows($result)>0)
	{
		echo"<script>alert('mail id already exists!!','_self');</script>";
		echo"<script>window.open('doctors.php','_self');</script>";
		// echo"<script>if(alert('mail id already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(mysqli_num_rows($result1)>0)
	{
		echo"<script>alert('contact already exists!!','_self');</script>";
		echo"<script>window.open('doctors.php','_self');</script>";
		// echo"<script>if(alert('Contact already exists!!','_self')){window.location.reload();}</script>";
	}
	else if(!validate_mobile($dcontact))
	{
		// echo"<script>window.location.reload();</script>";
		echo"<script>alert('Invalid mobile number!!','_self');</script>";
		echo"<script>window.open('doctors.php','_self');</script>";
		// echo"<script>if(alert('Invalid mobile number!!','_self')){window.location.reload();}</script>";
	}
	else if (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
		echo"<script>alert('Invalid mail id!!','_self');</script>";
		echo"<script>window.open('doctors.php','_self');</script>";
		// echo"<script>if(alert('Invalid mail id!!','_self')){window.location.reload();}</script>";
	}
	else{
	
	$sql = "INSERT INTO doctors (dfname,dlname, demail,dcontact,dpincode,dAge,dGender,speciality)VALUES ('$dfname','$dlname','$demail','$dcontact','$dpincode',$dAge,'$dGender','$speciality')";

	if ($con->query($sql) === TRUE) {
		echo"<script>alert('New doctor record added successfully!','_self');</script>";
		echo"<script>window.open('doctors.php','_self');</script>";
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
		echo'<td><a href="editPatients.php?eid='.$row1['pid'].'" style="color:#0E6655">Edit</a></td>';
    	echo'<td><a href="deletePatients.php?id='.$row1['pid'].'"style="color:#0E6655">Delete</a></td>';
		echo'</tr>';
	}
}
function display_doctors()
{
	global $con;
	$query2="select * from doctors";
	$results = mysqli_query($con,$query2);
	while ($row1 = mysqli_fetch_array($results)) {
		echo'<tr>';
		echo '<td>'.$row1["did"].'</td>';
		echo '<td>'.$row1["dfname"].'</td>';
		echo '<td>'.$row1["dlname"].'</td>';
		echo '<td>'.$row1["demail"].'</td>';
		echo '<td>'.$row1["dcontact"].'</td>';
		echo '<td>'.$row1["dpincode"].'</td>';
		echo '<td>'.$row1["dAge"].'</td>';
		echo '<td>'.$row1["dGender"].'</td>';
		echo '<td>'.$row1["speciality"].'</td>';
		echo'<td><a href="editDoctors.php?eid='.$row1['did'].'" style="color:#0E6655">Edit</a></td>';
    	echo'<td><a href="deleteDoctors.php?id='.$row1['did'].'"style="color:#0E6655">Delete</a></td>';
		echo'</tr>';
	}
}

function display_patients_assignment()
{
	global $con;
	$query2="select * from patients where pid not in (select pid from doctor_patient)";
	$results = mysqli_query($con,$query2);
	while ($row1 = mysqli_fetch_array($results)) {
		echo'<tr>';
		echo '<td>'.$row1["pid"].'</td>';
		echo '<td>'.$row1["pfname"].'</td>';
		echo '<td>'.$row1["plname"].'</td>';
		echo '<td>'.$row1["admitted_to"].'</td>';
		echo'<td><a href="assignDoctors.php?eid='.$row1['pid'].'&ad='.$row1['admitted_to'].'" style="color:#0E6655">Assign doctor</a></td>';
    
		echo'</tr>';
	}
}
function display_AssignedPatients()
{
	
	global $con;
	$query2="select pid,pfname,plname,did,dfname,dlname,admitted_to from doctor_patient natural join patients natural join doctors";
	$results = mysqli_query($con,$query2);
	while ($row1 = mysqli_fetch_array($results)) {
		echo'<tr>';
		echo '<td>'.$row1["pid"].'</td>';
		echo '<td>'.$row1["pfname"].' '.$row1["plname"].'</td>';
		echo '<td>'.$row1["did"].'</td>';
		echo '<td>'.$row1["dfname"].' '.$row1["dlname"].'</td>';
		echo'<td><a href="assignDoctors_edit.php?eid='.$row1['pid'].'&did='.$row1['did'].'&spl='.$row1['admitted_to'].'" style="color:#0E6655">Edit</a></td>';
		echo'<td><a href="assignDoctors_delete.php?eid='.$row1['pid'].'&did='.$row1['did'].'&spl='.$row1['admitted_to'].'" style="color:#0E6655">Delete</a></td>';
    
		echo'</tr>';
	}
}

function searchPatients()
{
	global $con;
	if(isset($_GET['search_pat'])){
		$search_query=htmlentities($_GET['search_query']);
		$get_user="SELECT * FROM patients WHERE pfname like '%$search_query%'";
	}else{
		$get_user="SELECT  * FROM patients order by pid DESC LIMIT 5";
	}

	$run_user=mysqli_query($con,$get_user);
	
	echo"<div style='height:50px'></div>";
	
	while($row_user=mysqli_fetch_array($run_user)){
		$patient_fname=$row_user['pfname'];
		$patient_lname=$row_user['plname'];
		$pcontact=$row_user['pcontact'];
		$pemail=$row_user['pemail'];
		$page=$row_user['pAge1'];
		$bg=$row_user['pBloodGroup'];
	

		//now dislaying all at once
		
		echo "
		
		<div class='center row'>
		<div class='col-md-4'></div>
		<div class='card col-md-4'><img src='images/patient_avatar.png' style='height: 150px;width: 150px;'>
		<h1>Name: $patient_fname $patient_lname</h1>
		<p class='title'>Contact: $pcontact</p>
		<p>Email: $pemail</p>
		<p>Age: $page</p>
		<p>Blood Group: $bg</p>
		
		</div></div><br><br>
		";
		
	}
}
function searchDoctors()
{
	global $con;
	if(isset($_GET['search_pat'])){
		$search_query=htmlentities($_GET['search_query']);
		$get_user="SELECT * FROM doctors WHERE dfname like '%$search_query%'";
		
	}else{
		$get_user="SELECT  * FROM doctors order by did DESC LIMIT 5";
	}

	$run_user=mysqli_query($con,$get_user);
	echo"<div style='height:50px'></div>";
	
	while($row_user=mysqli_fetch_array($run_user)){
		$patient_fname=$row_user['dfname'];
		$patient_lname=$row_user['dlname'];
		$pcontact=$row_user['dcontact'];
		$pemail=$row_user['demail'];
		$page=$row_user['dAge'];
	
	

		//now dislaying all at once
		
		echo "
		
		<div class='center row'>
		<div class='col-md-4'></div>
		<div class='card col-md-4'><img src='images/doc_avatar.jpg' style='height: 150px;width: 150px;'>
		<h1>Name: $patient_fname $patient_lname</h1>
		<p class='title'>Contact: $pcontact</p>
		<p>Email: $pemail</p>
		<p>Age: $page</p>
		</div></div><br><br>
		";
		
	}
}








?>