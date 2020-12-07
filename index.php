<?php
session_start();
//require 'user.php';
require_once('ride.php');
require ('config.php');
require ('location.php');

$loc = new Location();
//require_once('user.php');
$dbconnection = new dbconnection();

$dbconnection->conn;
//27/NOV/2020
if(isset($_SESSION['RIDE'])){
  $pickup=$_SESSION['RIDE']['PICKUP'];
  $drop=$_SESSION['RIDE']['DROP'];
  // $_SESSION['RIDE']['IDD']=$_SESSION['IDD'];
 
  $origdistance=$_SESSION['RIDE']['ORIGDISTANCE'];
  //$originaldis="140";
  $fare=$_SESSION['RIDE']['FARE'];
  $cabtype=$_SESSION['RIDE']['CABTYPE'];
  $luggage=$_SESSION['RIDE']['LUGGAGE'];
  //$customerid=$_SESSION['RIDE']['CUSTOMERID'];
  // $userr=$_SESSION['RIDE']['USERNAME'];
}

$ride1 = new Ride(); 
if(isset($_GET['id']))
{
             
  $sql = $ride1 -> ridee($pickup,$drop,$origdistance,$luggage,$fare,$dbconnection-> conn);
  header('Location:userpanel/dashboard.php');

    //$pickup,$drop,$originaldis,$luggage,$fare,
//echo $sql;
//echo $_SESSION['USERID'];
  }
//27
//$ride = new ride();
//----logic for getting pickup and login-----//

$location = $loc->fetchLocation($dbconnection->conn);
//echo $_SESSION['RIDED'];
//$doc=$_SESSION['RIDED'];
//echo $doc;
// print_r($location);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>CEDCAB TAXI APP</title>
    </head>
    <body>
        <!-- <?php
        //echo $_SESSION['distance'];
        //echo $_SESSION['luggage'];
        //echo $_SESSION['cab'];
        //echo $_SESSION['drop'];
        //echo $_SESSION['pickup'];
        //echo "<br>";
        //echo  $_SESSION['fare'];
        ?> -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <i class="fas fa-car navcol"></i>
                <a class="navbar-brand navtit text-white" href="#">CED<span class="navtit">CAB</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto lg">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">REVIEWS</a>
                        </li>
                        <li class="nav-item">
                            <?php 
                            if (isset($_SESSION['name'])) {
                                if($_SESSION['admin']==1){
                                    echo "<a class='nav-link text-white' href='admin/adminpanel.php'>DASHBOARD</a>";
                                    

                                }else{
                                echo "<a class='nav-link text-white' href='userpanel/dashboard.php'>DASHBOARD</a>";
                                }
                            }else{
                                echo '<a class="nav-link text-white" href="#">FEATURES</a>';
                            }
                            ?>
                        </li>
                        <?php 
                        if(isset($_SESSION['name'])) {
                            echo '<a type="button" class="btn btn-lg ml-2 olacolor" href="logout.php">Sign out</a>';
                        }else{
                            //echo "aur sb bdiya hai";
                            echo '<a type="button" class="btn btn-lg ml-2 olacolor" href="login.php">Login</a>';
                        }

                        ?>
                        <!-- <a type="button" class="btn btn-lg ml-2 olacolor" href="signup.php">Sign up</a> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- //Navbar -->
        <!-- Main Content -->
        <section id="main">
            <div class="top_heading hide-xs">
                <div class="text-overlay-top"></div>
                <h1 class="top_title text-white text-center font-weight-bold mt-1 olaa">
                Book a City Taxi to your destination in town
                </h1>
                <p class="top_subtitle text-light text-center font-weight-bold olaa">Choose from a range of categories and prices</p>
            </div>
            <!--text div text-->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4  col-sm-12">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold"><span class="city">City taxi</span></h5>
                                <div class="line"></div>
                                <?php 
                                  if(isset($_SESSION['name'])){
                                    echo '<h6 class="card-subtitle mb-2 text-center font-weight-bold ">Welcome, '.$_SESSION['name'].' you are logged in! </h6>';
                                  }else{
                                    echo '<h6 class="card-subtitle mb-2 text-center font-weight-bold ">Your everyday travel partner</h6>';
                                  }
                                ?>



                                <!-- <h6 class="card-subtitle mb-2 text-center font-weight-bold ">Your everyday travel partner</h6> -->
                                <p class="card-text ">
                                    <!-- <label for="pickup">PICKUP</label> -->
                                    <!-- <input type="text" id="pickup" name="pickup" placeholder="Current location"> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <label class="input-group-text" for="inputGroupSelect01">PICKUP</label>
                                        </div>
                                        <select class="custom-select a" id="pickup" name="pickup">
                                            <option value="" >Current location</option>
                                            <?php
                                            if(($_SESSION['RIDEP'])!=""){
                                                ?>
                                                <option value="<?php 
                                                echo $_SESSION['RIDEP'];
                                                ?>"><?php echo $_SESSION['RIDEP']; ?></option>
                                                <?php
                                            }else{
                                                foreach ($location as $value) {
                                                    ?>
                                                        <option value="<?php echo 
                                                        $value['area_name']; ?>" id="bbd"><?php echo 
                                                        $value['area_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <!-- <option value="Charbagh" id="charbagh">Charbagh</option>
                                            <option value="Indira Nagar" id="indiranagar">Indira Nagar</option>
                                            <option value="BBD" id="bbd">BBD</option>
                                            <option value="Barabanki" id="barabanki">Barabanki</option>
                                            <option value="Faizabad" id="faizabad"> Faizabad</option>
                                            <option value="Basti" id="basti">Basti</option>
                                            <option value="Gorakhpur" id="Gorakhpur">Gorakhpur</option> -->
                                        </select>
                                    </div>
                                </p>
                                <p class="card-text">
                                    <div id="validpick" class="text-danger text-center"></div>
                                </p>
                                <p class="card-text">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">DROP</label>
                                        </div>
                                        <select class="custom-select a" id="drop" name="drop">
                                            <option value="">Enter drop for ride estimate</option>
                                            <?php
                                            if(($_SESSION['RIDED'])!=""){
                                                $doc=$_SESSION['RIDED'];
                                                ?>
                                                <option value="<?php 
                                                echo $doc;
                                                ?>"><?php echo $doc; ?></option>
                                                <?php
                                                
                                            }else{
                                                foreach ($location as $value) {
                                                    ?>
                                                        <option value="<?php echo 
                                                        $value['area_name']; ?>" id="bbd"><?php echo 
                                                        $value['area_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <!-- <option value="Charbagh">Charbagh</option>
                                            <option value="Indira Nagar">Indira Nagar</option>
                                            <option value="BBD">BBD</option>
                                            <option value="Barabanki">Barabanki</option>
                                            <option value="Faizabad"> Faizabad</option>
                                            <option value="Basti">Basti</option>
                                            <option value="Gorakhpur">Gorakhpur</option> -->
                                        </select>
                                    </div>
                                </p>
                                <p class="card-text">
                                    <div id="validdrop" class="text-danger text-center"></div>
                                </p>
                                <p class="card-text">
                                    <div id="validsame" class="text-danger text-center"></div>
                                </p>
                                <p class="card-text">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">CAB TYPE</label>
                                        </div>
                                        <select class="custom-select a" id="cab" name="cabtype">
                                            <option value="">Drop down to select CAB Type</option>
                                            <?php if($_SESSION['RIDEC']!=''){?>
                                            <option value="<?php
                                                echo $_SESSION['RIDEC'];?>"><?php
                                                echo $_SESSION['RIDEC'];?></option>
                                                <?php
                                            }else{?>
                                            <option value="CedMicro">CedMicro</option>
                                            <option value="CedMini">CedMini</option>
                                            <option value="CedRoyal">CedRoyal</option>
                                            <option value="CedSuv">CedSUV</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </p>
                                <p class="card-text">
                                    <div id="validcab" class="text-danger text-center"></div>
                                </p>
                                <p class="card-text">
                                    <div class="input-group mb-3 luggage">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="luggagebox" name="luggage">LUGGAGE</span>
                                        </div>
                                        <input type="text" class="form-control" id="luggagewt" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </p>
                                <p class="card-text">
                                    <div id="validnum" class="text-danger text-center"></div>
                                </p>
                                <a href="#" class="card-link btn olacolor" id="calculate">Calculate Fare</a>

                                <div id="result" class="text-center mt-2 bg-warning rounded"></div>
                          
                                <?php
                                 if(isset($_SESSION['name'])){
                                    echo '<a href="index.php?id=bookid"  class="card-link btn olacolor" id="book">Book Now</a>';
                                 }else {
                                    echo '<a href="login.php"  class="card-link btn olacolor" id="book">Book Now</a>';
                                 }
                                ?>
                             
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- //Main Content -->
        <!-- Footer -->
        <footer class="p-3 bg-dark container-fluid">
            <div class="row text-center ">
                <div class="col-md-4 ">
                    <i class="fab fa-facebook text-white"></i>
                    <i class="fab fa-twitter-square text-white"></i>
                    <i class="fab fa-instagram-square text-white"></i>
                </div>
                <div class="col-md-4 mt-0">
                    <span class="">&copy;2020 ola</span>
                </div>
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none  m-1 text-white">FEATURES</a>
                    <a href="#" class="text-decoration-none   m-1 text-white">REVIEWS</a>
                    <a href="signup.php" class="text-decoration-none   m-1 text-white">SIGN UP</a>
                </div>
            </div>
        </footer>
        <!-- //Footer -->
        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- My Script -->
        <script src="js.js"></script>
    </body>
</html>