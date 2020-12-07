<?php
//session_start();
require '../config.php';
require '../User.php';
$dbconnection = new dbconnection();
$dbconnection->conn;
$user1 = new User();

	$data = $user1 -> uprofile($dbconnection-> conn);
	//echo $_SESSION['USERID'];



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
	<style>
		body{
            background-color: whitesmoke;

        }
	    .sidebar {
	      height: 100%;
	      width: 200px;
	      position: fixed;
	      z-index: 1;
	      /*top: 0;*/
	      left: 0;
	      background-color: #111;
	      overflow-x: hidden;
	      padding-top: 16px;
	    }

	    .sidebar a {
	      padding: 6px 8px 6px 16px;
	      text-decoration: none;
	      font-size: 20px;
	      color: #818181;
	      display: block;
	    }

	    .sidebar a:hover {
	      color: #f1f1f1;
	    }

	    .main {
	      margin-left: 230px;
	      margin-top: 17px; /* Same as the width of the sidenav */
	      padding: 0px 10px;

	    }

	    @media screen and (max-height: 450px) {
	      .sidebar {padding-top: 15px;}
	      .sidebar a {font-size: 18px;}
	    }
	    nav{
	    /*	position: absolute;*/
			margin-left:200px;

	    }
			#secmain{
				/*margin-top: -680px;*/
				height: 100%;
			}
			table, th, td {
			  border: 1px solid #0cce5a;
			  border-collapse: collapse;
			}
			th, td {
			  padding: 15px;
			}
    </style>
	<title>Document</title>
</head>
<body>

	<div class="sidebar">
	    <a href="dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a>
	    <a href="../index.php"><i class="fas fa-biking"></i> Book New Ride</a>
	    <a href="profile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
	    <div class="dropdown">
	        <a href="#clients" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-car-side"></i> Rides Info</a>
	         <!--  <span class="caret"></span> -->
	        <ul class="dropdown-menu bg-success">
		        <li><a href="pendingrides.php" class="bg-dark m-1">Pending Rides</a></li>
		        <li><a href="approved.php" class="bg-dark m-1">Approved Rides</a></li>
						<li><a href="cancelled.php" class="bg-dark m-1">Cancelled Rides</a></li>
		        <li><a href="allrides.php" class="bg-dark m-1">All Rides</a></li>
	        </ul> 
	    </div>
	</div>

	<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
      <i class="fas fa-car navcol text-right"></i>
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
	              <a class="nav-link text-white" href="dashboard.php">DASHBOARD</a>
	          </li>
	          <li class="nav-item">
	              <a class="nav-link text-right text-dark btn  olacolor" href="../logout.php">SIGN OUT</a>
	          </li>
          <!-- <a type="button" class="btn btn-lg ml-2 olacolor" href="signup.php">Sign up</a> -->
        </ul>
      </div>
    </div>
  </nav>
  <!--//navbar -->
	<div class="main">
		<section id="secmain">
		<div class="wrapper">
		        <h3>PROFILE</h3>
		    <table>
		            <thead>
		                <tr>
		                    <th>Name</th>
		                    <th>EMAIL</th>
		                    <th>MOBILE</th>
		                    <th>Date of SIGNUP</th>
												<th>Edit Profile</th>
                        <th>Change Password</th>
		                </tr>
		            </thead>
		            <tbody>
		            <?php
		           // $sr = 1;
		            //$data = $Ride->fetchPendingRideUser($Dbconn->conn);
		            foreach ($data as $row) {
		                ?>
		                    <tr>
		                        
		                        <td><?php echo $row['name']; ?></td>
		                        <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
		                        <td><?php echo $row['dateofsignup']; ?></td>
														<td><a href ="editprofile.php?nm=<?php echo $row['name']?>&mb=<?php echo $row['mobile']?>">Click here</a></td>
                            <td><a href ="password.php">Click here</a></td>
		                        
		                        
		                        
		                        
		                    </tr>

                <?php } ?>

		            </tbody>
		        </table>
		    </div>
	    </section>
	</div>
	
	<!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- My Script -->
        <script src="js.js"></script>  

	
</body>
</html>