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
    <title>Vaccine slots</title>
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
<?php


include('connection.php');
include('navbar.php');
include('footer.php');
if(isset($_POST['find_vaccines']))
{
	$pincode=$_POST['vpincode'];
	$sql = "select * from patients where pincode='$pincode'";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<div style='height: 65px'></div>";
    echo"<div class='container'>
    <div class='page-header' style='color:#0E6655'>
      <h1>PINCODE: </h1>";
      echo"$pincode";
      echo"     
    </div>      
    </div>";
    while($row = $result->fetch_assoc()) {    

       
        $pin=$row["pincode"];
        $url="https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode=".$pin."&date=".date("d-m-Y");
        // echo $url;
        $response = file_get_contents($url);
        $res = json_decode($response,true);
        $info=$res['centers'];
        $extract = array("name", "address", "fee_type");
        $extract1=array("date","available_capacity","min_age_limit","vaccine");


        // echo $info;
        if(empty($info))
        {
            echo"<div class='card'><h5 class='card-header'>Vaccine Slots</h5>
            <div class='card-body'>
                <h5 class='card-title'>No slots :(</h5>
                <p class='card-text'>No vaccine slots in your area!</p>
            </div>             
            </div>";
        }
      
        // echo"<div class='col-md-4'></div><div class='card' style='margin-left:30%; width: 700px;'>";
        foreach($info as $infos){
            echo"
            <br>
          <div class='container-fluid'>
              <div class='row'>
              <div class='col-md-3'></div>
              <div class='col-md-6'>
              <div class='card'>
              <div class='card-body' style='background-color: #ABEBC6;color:black '>";
       
            foreach($infos as $key => $val){
                echo"<h3>";
                if(in_array($key, $extract))
                {    
                    echo"$key: $val";
                }
                echo"</h3>";
                
                if($key=="sessions")
                {
                    echo"</br>";
                    foreach($infos['sessions'] as $key1)
                    {
                        if($key1['available_capacity']>0)
                        {
                            echo "<p class='card-text'>";
                            echo "Date: ".$key1['date']."<br>";
                            echo "Capacity: ".$key1['available_capacity']."<br>";
                            echo "Age Limit: ".$key1['min_age_limit']."<br>";
                            echo "Vaccine: ".$key1['vaccine']."<br>";
                            echo "Slots available: <br>";
                            foreach($key1['slots'] as $slots)
                            {
                                echo $slots."<br>";
                            }
                            echo"</p>";

                        }
                        else{
                            echo "<p class='card-text'>";
                            echo "No slots available!<br>";
                            echo "</p>";
                        }

                
                    }
                    echo"</div></div></div></div></div>";
                }
               
            }
            echo "<br>";
        }
    }
} else {

    echo "0 results";
}

}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
<?php } ?>