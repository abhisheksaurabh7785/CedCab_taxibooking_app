<?php
session_start();
require '../config.php';
require '../ride.php';
$dbconnection = new dbconnection();
$dbconnection->conn;
$ride4 = new Ride();

	$data1 = $ride4 -> adcompride($dbconnection-> conn);
	//echo $_SESSION['uid'];
    //sort+filter
      $ride6=new Ride();
if(isset($_POST['submit'])){
    $id =  $_POST['id'];
//echo "hello";
            
             $data1=$ride6 -> adcompridesort($id,$dbconnection-> conn);
             //echo $data1;
            // //name sorting
            // $ride7=new Ride();
            // $data1=$ride7 -> adsortfare($dbconnection->conn);
            //echo $data2;
}
//print_r($data2);
//filter
$ride7=new Ride();
if(isset($_POST['subm'])){
//echo "<h1 style='color:red;'>". $_POST['filter']."</h1>";
$id=$_POST['filter'];
//echo "hello";
            
             $data1=$ride7 -> adcompridefilter($id,$dbconnection-> conn);
             //echo $data1;
            // //name sorting
            // $ride7=new Ride();
            // $data1=$ride7 -> adsortfare($dbconnection->conn);
            //echo $data2;
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
			  padding: 13px;
			}
            
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
    <!-- //Navbar -->
    <!-- main content -->
    <section class="bg-dark">
        <div class="row" >
            <!-- sidenav -->
        	<div class="col-md-3  mt-2">
                <div class="row " >
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
	<!-- <a href="adminpanel.php">return</a>
	<a href="logout.php">logout</a> -->
	<div class="col-md-9  mt-2 pr-5">
	<div class="wrapper">
        <h3 class="text-white">Completed Rides</h3>
         <!-- 3dec sorting by date and fare prog -->
        <div class="row m-2">
            <div class="col-md-6"><a href="adminpanel.php" class="btn btn-info backbt">Back</a></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3"></div>
                    <!-- 3dec sorting by date and fare prog -->
                    <div class="col-md-3">
                        <form action="admincompride.php" method="post">
                            <select name="id" id="cars" >
                                <option value="">Sort By</option>
                                <option value="1">Date</option>
                                <option value="2">Fare</option>
                                <option value="3">Dist. ASC</option>
                                <option value="4">Date ASC</option>
                                <option value="5">Fare ASC</option>
                                <option value="6">Dist. ASC</option>
                                <!-- <option value="3">fare</option> -->
                            </select> 
                            <input type="submit" value="submit" name="submit" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                    <!-- 3dec sorting by date and fare prog -->

                    <!-- 3dec filter by date and fare prog -->
                    <div class="col-md-3">
                        <form action="admincompride.php" method="post">
                            <select name="filter" id="filt" >
                                <option value="">Filter By</option>
                                <option value="1">Week</option>
                                <option value="2">Month</option>
                                <option value="3">Cedmicro</option>
                                <option value="4">Cedmini</option>
                                <option value="5">Cedroyal</option>
                                <option value="6">Cedsuv</option>
                                <option value="7">Clear Filter</option>
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
		                   <!--  <th>Sr.No.</th> -->
		                    <th>Ride id</th>
		                    <th>Ride Date</th>
		                    <th>PickUp Location</th>
		                    <th>Drop Location</th>
		                    <th>Total Distance</th>
		                    <th>Luggage Weight</th>
		                    <th>Total Fare</th>
		                    <th>Status</th>
		                    <th>cabtype</th>
		                    <th>Invoice</th>
		                </tr>
		            </thead>
		            <tbody>
		            <?php
		            $sr = 1;
		            //$data = $Ride->fetchPendingRideUser($Dbconn->conn);
		            foreach ($data1 as $row) {
		                ?>
		                    <tr>
		                        <!--  <td><?php //echo $sr++; ?></td> -->
		                        <td><?php echo $row['ride_id']; ?></td>
		                        
		                        <td><?php echo $row['ride_date']; ?></td>
		                        <td><?php echo $row['from']; ?></td>
		                        <td><?php echo $row['to']; ?></td>
		                        <td><?php echo $row['total_distance']." km"; ?></td>
		                        <td>
		                            <?php 
		                            if ($row['luggage']) {
		                                echo $row['luggage']." kg";
		                            } else {
		                                echo "NIL";
		                            }
		                            ?>
		                            </td>
		                        <td><?php echo "Rs.".$row['total_fare']; ?></td>
		                        <td>
		                        <?php
		                        if ($row['status'] == 2) {
		                            ?>
		                           approved
		                        <?php
		                        }
		                        ?>
		                        </td>
		                        <td>
		                        	<?php echo $row['cabtype']; ?>
		                        </td>
                                <td>
                                    <a href="invoice.php?id=<?php echo $row['ride_id']; ?>" class="btn btn-primary">Invoice</a>
                                    
                                    
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
 <!--   <h1 class="text-center "><a href="adminpanel.php" class="text-white btn btn-primary m-2 ">back to previous page</a></h1> -->
    <!-- //Footer -->
    <?php include 'footer2.php'; ?>;
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- My Script -->
    <script src="../js.js"></script>	
</body>
</html>