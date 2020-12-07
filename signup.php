<?php
// session_start();
 require_once('User.php');
 include ('config.php');
 if(isset($_POST['submit'])){
  $username =$_POST['user_name'];
  $password = $_POST['password'];
  $repassword =$_POST['repassword'];
  //$dateofsignup=$_POST['dateofsignup'];
  $name=$_POST['name'];
  // $_SESSION['NAME']=$name;
  // echo $_SESSION['NAME'];

  $mobile=$_POST['mobile'];
  $User = new User();
  $Dbcon=new dbconnection();
  $sql=$User-> register($username, $password, $repassword, $name, $mobile,$Dbcon-> conn);
  if($sql){
    echo '<script>'; 
    echo 'alert("Successfully Registered");'; 
    echo 'window.location.href = "login.php";';
    echo '</script>';
    //echo "<script>alert('successfully registered')";
    //header('Location: login.php');
    //echo "</script>";
    //header('Location: login.php');
  }else{
    echo "<script>alert('not registered')</script>";

  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
  
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="style.css">
     

     <!-- style css -->

	<!--Custom styles-->
	<style>


        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
        }

        .container{
        height: 80%;
        align-content: center;
        }

        .card{
        height: 460px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
        }

        .social_icon span:hover{
        color: white;
        cursor: pointer;
        }

        .card-header h3{
        color: white;
        }

        .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
        }

        .input-group-prepend span{
        width: 50px;
        background-color: #FFC312;
        color: black;
        border:0 !important;
        }

        input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

        }

        .remember{
        color: white;
        }

        .remember input
        {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
        }

        .login_btn{
        color: black;
        background-color: #FFC312;
        width: 100px;
        }

        .login_btn:hover{
        color: black;
        background-color: white;
        }

        .links{
        color: white;
        }

        .links a{
        margin-left: 4px;
        }   
    </style>
</head>
<body>
    <!-- navbar -->
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
                            <a class="nav-link text-white" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <?php 
                            if (isset($_SESSION['USERNAME'])) {
                                echo "<a class='nav-link text-white' href='userpanel/dashboard.php'>DASHBOARD</a>";
                            }else{
                                echo '<a class="nav-link text-white" href="#">FEATURES</a>';
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">REVIEWS</a>
                        </li>
                        
                        <!-- <a type="button" class="btn btn-lg ml-2 olacolor" href="signup.php">Sign up</a> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- //Navbar -->
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                    <!-- <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div> -->
                </div>
                <div class="card-body">
                    <form action="" method="POST" name="signup">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="user_name" class="form-control" placeholder="Email" required>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="repassword" placeholder="Re-password" required="">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="SignUp" name="submit" class="btn float-right login_btn" onclick="return validate();">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Already have an account?<a href="login.php">Log In</a>
                    </div>
                    <!-- <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

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
        <script >
          
            function validate() 
    {
        if(document.signup.name.value == "")
        {
            alert("Name Must Be Required");
            return false;
        }
        //validation for alphabet
        elseif(document.signup.name.value == "^[a-zA-Z]*$")
        {
            alert("Must be Alphabet");
            return false;
        }
    //     else if(document.signup.user_name.value == "")
    //     {
    //         alert("Email Must Be Required");
    //         return false;
    //     }
    //     //validation for email alphanumeric
    //     elseif(document.signup.user_name.value == "/^[0-9a-zA-Z]+$/")
    //     {
    //         alert("Special Character are not allowed");
    //         return false;
    //     }
    //     else if(document.signup.mobile.value == "")
    //     {
    //         alert("Mobile Number Must Be Required");
    //         return false;
    //     }
    //     //validation for mobile
    //     elseif(document.signup.mobile.value == "/^[0-9]+$/")
    //     {
    //         alert("Must be Number allowed");
    //         return false;
    //     }
    //     //validation for mobile number
    //     elseif(document.signup.mobile.value <= 9)
    //     {
    //         alert("Must be Ten Character");
    //         return false;
    //     }
    //      else if(document.signup.password.value.length <= 7)
    //      {
    //         alert("Password Must Be Eight Character");
    //         return false;
    //      }
    //      else if(document.signup.Re-password.value.length <= 7)
    //      {
    //         alert("Password Must Be Eight Character");
    //         return false;
    //      }
        
    //     else
    //     {
    //         return true;
    //     }
    }
        </script>
            
       
</body>

</html>