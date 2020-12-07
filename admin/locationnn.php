<?php
session_start();
require '../config.php';
require '../location.php';


if(isset($_POST['submit'])){
	//echo "aa";
	$location=$_POST['location'];
	$distance=$_POST['distance'];

//echo $location;
	
	$dbconnection = new dbconnection();
$dbconnection->conn;
$loc1 = new Location();
	$sql = $loc1-> adlocation($location,$distance,$dbconnection-> conn);
  if($sql){
    echo "<script>alert('successfully added location');</script>";
  }

	//echo $sql;
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
			  padding: 41px;
			}
	</style>
	<title>Document</title>
</head>
<body  >
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
    <div class="row">
    <div class="col-4"></div>
    <div class="col-4 mt-5">
    <form action="locationnn.php" method="POST">
  <div class="form-group">
    <label for="name">Add Location</label>
    <input type="text" class="form-control bg-light" id="exampleInputEmail1" aria-describedby="emailHelp" name="location" placeholder="enter location">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Distance</label>
    <input type="number" name="distance" class="form-control bg-light" id="exampleInputPassword1" placeholder="Enter distance">
  </div>
  <!-- div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href="adminpanel.php" class="text-white btn btn-primary  ">back to previous page</a>
</form>
  </div>
   <div class="col-4"></div>
   </div>
        	<!-- //sidenav -->
	<!-- <a href="adminpanel.php">return</a>
	<a href="logout.php">logout</a> -->
	<!-- <div class="col-md-9  mt-2 pr-5"> -->
	<!-- <form action="locationnn.php" method="POST">
		<p><label for="name">Add Location<input type="text" name="location" required></label></p>
		
		<p><label for="distance">Distance<input type="text" name="distance" required></label></p>
		<input type="submit" name="submit" value="submit">
		
	</form> -->
	
</body>
<?php include 'footer2.php'; ?>;
<!-- Footer -->
   <!-- <h1 class="text-center "><a href="adminpanel.php" class="text-white btn btn-primary m-2 ">back to previous page</a></h1> -->
    <!-- //Footer -->
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- My Script -->
    <script src="../js.js"></script>	
</body>
</html>