<?php
session_start();
require '../config.php';
require '../ride.php';
$dbconnection = new dbconnection();
$dbconnection->conn;
$ride10 = new Ride();

	$data1 = $ride10 -> adblockuser($dbconnection-> conn);
	//echo $_SESSION['uid'];

    //sorting

     $user1=new Ride();
if(isset($_POST['submit'])){
    $id =  $_POST['id'];
    //echo "hello";
            
    $data1=$user1 -> adcancusersort($id,$dbconnection-> conn);
             //echo $data1;
            
}
//filter
$user2=new Ride();
if(isset($_POST['subm'])){
    $id =  $_POST['filter'];
    //echo $id;
    //echo "hello";
            
    $data1=$user2 -> adcancuserfilter($id,$dbconnection-> conn);
             //echo $data1;
            
}




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
		table, th, td {
			  border: 1px solid #0cce5a;
			  background-color: white;
			  border-collapse: collapse;
			}
			th, td {
			  padding: 35px;
			}
            /*.backbt{
                margin-left: 45rem !important;
            }*/
	</style>
	<title>Document</title>
</head>
<body class="bg-dark">
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
                    <!-- <a type="button" class="btn btn-lg ml-2 olacolor" href="signup.php">Sign up</a> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- filter -->
    
    <!-- //Navbar -->
    <!-- main content -->
    <section class="bg-dark">
        <div class="row" >
            <!-- sidenav -->
        	<div class="col-md-3  mt-2">
                <div class="row " >
                    <div class="col-12" >
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action text-body bg-success" id="list-home-list" href="adminpanel.php" role="tab" aria-controls="home">Home</a>
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
	<!-- <a href="adminpanel.php">return</a>
	<a href="logout.php">logout</a> -->
	<div class="col-md-9  mt-2 pr-5">
	<div class="wrapper">
        <h3 class="text-white">Blocked Users</h3>
         <!-- soting+filter-->

        <div class="row m-2">
            <div class="col-md-6">
                <a href="adminpanel.php" class="btn btn-info backbt">Back</a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3"></div>
                    <!-- 3dec sorting by date and fare prog -->
                    <div class="col-md-3">
                        <form action="admincancuser.php" method="post">
                            <select name="id" id="srtt" >
                                <option value="">Sort By</option>
                                <option value="1">Date</option>
                                <option value="2">Name</option>
                                <option value="3">Date ASC</option>
                                <option value="4">Name ASC</option>
                                <!-- <option value="3">fare</option> -->
                            </select> 
                            <input type="submit" value="submit" name="submit" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                    <!-- 3dec sorting by date and fare prog -->

                    <!-- 3dec filter by date and fare prog -->
                    <div class="col-md-3">
                        <form action="admincancuser.php" method="post">
                            <select name="filter" id="filt" >
                                <option value="">Filter By</option>
                                <option value="1">Week</option>
                                <option value="2">Month</option>
                                <option value="3">Clear Filter</option>
                                
                                
                            </select> 
                            <input type="submit" value="submit" name="subm" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>
                    <!-- 3dec filter by date and fare prog -->
            </div>
        </div>
		<table>
		            <thead>
		                <tr>
		                    <!-- <th>Sr.No.</th> -->
		                    <th>Id</th>
		                    <th>Username</th>
		                    <th>Name</th>
		                    <th>Dateofsignup</th>
		                    <th>Mobile</th>
		                    <!-- <th>Luggage Weight</th> -->
		                    <!-- <th>Total Fare</th> -->
		                    <th>Isblock</th>
		                    <!-- <th>cabtype</th> -->
		                    <!-- <th>Action</th> -->
		                </tr>
		            </thead>
		            <tbody>
		            <?php
		            $sr = 1;
		            //$data = $Ride->fetchPendingRideUser($Dbconn->conn);
		            foreach ($data1 as $row) {
		                ?>
		                    <tr>
		                        <!-- <td><?php //echo $sr++; ?></td> -->
		                        <td><?php echo $row['id']; ?></td>
		                        
		                        <td><?php echo $row['user_name']; ?></td>
		                        <td><?php echo $row['name']; ?></td>
		                        <td><?php echo $row['dateofsignup']; ?></td>
		                        <td><?php echo $row['mobile']; ?></td>
		                        
		                        
		                        <td>
		                        <?php
		                        if ($row['isblock'] == 0) {
		                            ?>
		                           Blocked
		                        <?php
		                        }
		                        ?>
		                        </td>
		                      
		                        
		                    </tr>

		                <?php
		            }
		            ?>

		            </tbody>
		        </table>
	</div>
</body>
<!-- Footer -->
   <!-- <h1 class="text-center "><a href="adminpanel.php" class="text-white btn btn-primary m-2 ">back to previous page</a></h1> -->
   <?php include 'footer2.php'; ?>;
    <!-- //Footer -->
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- My Script -->
    <script src="../js.js"></script>	
</body>
</html>