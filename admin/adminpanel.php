<?php
//5dec work changed
session_start();
if (isset($_SESSION['name'])) {
    if ($_SESSION['admin']==0) {
        echo "<script> window.location='../userpanel/dashboard.php'; </script>";

    }
}
//5dec work changed

require '../config.php';
require '../ride.php';
$dbconnection = new dbconnection();
$dbconnection->conn;
$ride12 = new Ride();
$data1 =$ride12-> countadpendride($dbconnection-> conn);
$ride13 = new Ride();
$data2 =$ride13-> countadcancride($dbconnection-> conn);
$ride13 = new Ride();
$data3 =$ride13-> countadapprride($dbconnection-> conn);
$ride14 = new Ride();
$data4 =$ride14-> countadpenduser($dbconnection-> conn);
$ride15 = new Ride();
$data5 =$ride15-> countadappruser($dbconnection-> conn);
$ride16 = new Ride();
$data6 =$ride16-> countadttaluser($dbconnection-> conn);
$ride17 = new Ride();
$data7 =$ride17-> countadblockuser($dbconnection-> conn);
$ride18 = new Ride();
$data8 =$ride18-> countadttalride($dbconnection-> conn);
$ride19 = new Ride();
$data9 =$ride19-> totalearned($dbconnection-> conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style >
        html,body{
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        }
    </style>
	<title>Document</title>
</head>
<body class="">
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <i class="fas fa-car navcol"></i>
            <a class="navbar-brand navtit text-white" href="#">CED<span class="navtit">CAB</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <p class="text-center text-light  mt-3">welcome to dashboard</p> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto lg">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="adminpanel.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                       <a type="button" class="btn btn-lg ml-2 olacolor" href="../logout.php">Sign out</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="#"></a>
                    </li> -->
                    <!-- <a type="button" class="btn btn-lg ml-2 olacolor" href="signup.php">Sign up</a> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- //Navbar -->
    <div class="text-center  p-2" ><h4 class="text-white">Hi,Admin</h4></div>
    <!-- main content -->
    <section class="">
        <div class="row" >
            <!-- sidenav -->
        	<div class="col-md-3 mt-2  ">
                <div class="row text-center" >
                    <div class="col-12" >
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-home-list"  href="adminpanel.php" role="tab" aria-controls="home">Home</a>
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Users</a>
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Rides</a>
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Location</a>
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-settings-list" data-toggle="list" href="#list-account" role="tab" aria-controls="settings">Account </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                          	    <ul class="list-group" style="">
                    				<li class="list-group-item bg-dark text-white"><a href="adminpenduser.php">Pending Users</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="adminappruser.php">Approved Users</a></li>
                                    <li class="list-group-item bg-dark text-white"><a href="admincancuser.php">Blocked Users</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="adminalluser.php">All Users</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            	<ul class="list-group" style="">
                            		<li class="list-group-item bg-dark text-white"><a href="adminallride.php">All Rides</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="adminpendride.php">Requested Rides</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="admincompride.php">Completed Rides</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="admincancride.php">Cancelled Rides</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                            	<ul class="list-group" style="">
                            		<li class="list-group-item bg-dark text-white"><a href="locationnn.php">Add New Location</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="viewlocation.php">View Location</li>
                                        <li class="list-group-item bg-dark text-white"><a href="editlocation.php">Edit Location</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="list-account" role="tabpanel" aria-labelledby="list-account-list">
                            	<ul class="list-group" style="">
                            		<li class="list-group-item bg-dark text-white"><a href="adminprofile.php">View Profile</a></li>
                    				<li class="list-group-item bg-dark text-white"><a href="password.php">Change Password</a></li>
                    				<!-- <li class="list-group-item bg-dark text-white">Completed Rides</li> -->
                    				
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<!-- //sidenav -->
        	<!-- tiles -->
    		<div class="col-md-9 mt-2 text-center">
    			<div class="row ">
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-danger">
							    <h5 class="card-title">Requested Rides</h5>
							    <p class="card-text">
                                        <?php foreach($data1 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="adminpendride.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-warning">
							    <h5 class="card-title">Cancelled Rides</h5>
							    <p class="card-text">
                                        <?php foreach($data2 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="admincancride.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4 ">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-success">
							    <h5 class="card-title">Completed Rides</h5>
							    <p class="card-text">
                                        <?php foreach($data3 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="admincompride.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-danger">
							    <h5 class="card-title">Pending Account</h5>
							    <p class="card-text">
                                        <?php foreach($data4 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="adminpenduser.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-warning">
							    <h5 class="card-title">Approved Account</h5>
							    <p class="card-text">
                                        <?php foreach($data5 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="adminappruser.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-success">
							    <h5 class="card-title">Blocked Account</h5>
							    <p class="card-text">
                                        <?php foreach($data7 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="admincancuser.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-danger">
							    <h5 class="card-title">Total Rides</h5>
							    <p class="card-text">
                                        <?php foreach($data8 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="adminallride.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-warning">
							    <h5 class="card-title">Total Earnings</h5>
							    <p class="card-text">
                                        <?php foreach($data9 as $row){
                                                foreach($row as $value){
                                                 echo 'Rs. '. $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="#" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    				<div class="col-md-4">
    					<div class="card" style="width: 18rem;">
							<div class="card-body bg-success">
							    <h5 class="card-title">Total Users</h5>
							    <p class="card-text">
                                        <?php foreach($data6 as $row){
                                                foreach($row as $value){
                                                 echo $value;
                                                }
                                            }
                                        ?>                     
                                </p>
							    <a href="adminalluser.php" class="btn btn-primary">Check Here</a>
							</div>
                        </div>
    				</div>
    			</div>
    		</div>
            <!-- //tiles -->
        </div>
    </section>
    <!-- //main-content -->
    <!-- Footer -->
   <?php include '../footer.php'; ?>
    <!-- //Footer -->
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- My Script -->
    <script src="../js.js"></script>	
</body>
</html>