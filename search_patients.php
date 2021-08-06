<?php
// include('navbar.php');
if (!isset($_SESSION)) {
    session_start();
}
include "connection.php";
include "backend_actions.php";
include("navbar.php");

if (!isset($_SESSION['username'])) {
    header("location: index.php");
} else {
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
            .list-group-item {
                color: black;
            }

            .card {
                box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.4);
                transition: 0.3s;
                /* width: 40%; */
                /* background-color:#ABEBC6; */
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

        
        <div class="col-md-4" style="height: 100px;">
        </div>
        <div class="container-fluid ">
            <div class="row">
               

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card" style="background-color: #d9ecd0;">
                        <div class="card-body" style="background-color: #17A589;color:#ffffff">
                            <h3>Search Patients</h3><br>
                           
                        <form action="" class="search_form">
                            <input type="text" name="search_query" placeholder="Enter the patient name" autocomplete="off" required>
                            <button class="btn-small" type="submit" name="search_pat">Search</button>
                        </form>
                        
                  
                        </div>
                        
                    <?php searchPatients(); ?>
                    </div>
                </div>
            
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
    </body>

    </html>
    </body>

<?php } ?>
<!-- <h3>Update Data</h3>

<form method="POST">
  <input type="text" name="fullname"  placeholder="Enter Full Name" Required>
  <input type="text" name="age" value="<?php echo $data['age'] ?>" placeholder="Enter Age" Required>
  <input type="submit" name="update" value="Update">
</form> -->