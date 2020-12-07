<?php
session_start();



// require 

class User{
	// public $id;
	// public $user_name;
	// public $password;
	// public $isblock;
	// public $dateofsignup;
	// public  $name;
	// public $mobile;
 //    public $user;
 //    public $isadmin;
 //    public $conn;

    function login($username, $password,$conn){
			if(strlen($password) > 7){
		$sql= "select * FROM `user` where `user_name`='$username' AND `password`= md5('$password')";
		// echo $sql;
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$data = mysqli_fetch_assoc($result);
			// $_SESSION['name'] = $data['name'];
			$_SESSION['USERNAME'] = $username;
			$_SESSION['admin']= $data['isadmin'];
			$_SESSION['block']= $data['isblock'];
			$_SESSION['USERID'] = $data['id'];
			 $_SESSION['NAME'] = $data['name'];
			if($_SESSION['admin']==1){
				$_SESSION['name'] = $data['name'];

				header('Location: admin/adminpanel.php');
			}elseif($_SESSION['block']==0){
				session_destroy();

				echo "<script>alert('account blocked!')</script>";

			}
			else{
				$_SESSION['name'] = $data['name'];
				if(isset($_SESSION['RIDE'])){
					//require ('config.php');
				
                    header('Location:data.php');

				}else{
					$_SESSION['name'] = $data['name'];
			    header('Location:userpanel/dashboard.php');
			    }
		    }
		// 	$rtn="login success";
		}elseif($username == '' || $password == ''){
			echo "<script>alert('Username or password column is empty!')</script>";
		}
		else
		{
			echo "<script>alert('Username or Password not matched!')</script>";
		}
		// return $rtn;

    }else{
			echo '<script>alert("password should be eight character or more")</script>';
		}}
    function register( $username, $password, $repassword,  $name, $mobile,$conn ){
    	$sq= "SELECT * FROM user WHERE `user_name`='$username'";
    	$res = $conn->query($sq);
    	//print_r($res) ;
		if($password==$repassword && $username!='' && $password!=''&&$repassword!='' &&$mobile!=''&&$name!='')

	    {
				// mobile validation
				if( preg_match("/^[1-9][0-9]{9}$/", $mobile) ){
					if(strlen($password) > 7){
						if($res->num_rows > 0){
							echo '<script>alert("username already exists!")</script>';
						}else{
				

						$sql = "INSERT INTO user (`user_name`, `name`, `dateofsignup`,
									`mobile`, `password`,`isblock`) VALUES ('{$username}', '{$name}', current_timestamp(), '{$mobile}', MD5('$password'),'0')";
									$result = $conn->query($sql); 
									return $result;
								}
										

									
					}else{
						echo '<script>alert("password should be eight character or more")</script>';
					}				

				}else{
					echo '<script>alert("Must be 10 digits")</script>';
					
				}
	    }else{
	    	echo '<script>alert("empty column")</script>'; 
	    }
		}
		//profile view for users
		function uprofile($conn){
    	$row = array();
    	$userid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE `id` = '$userid'" ;
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		//edit profile for users

		function updprofile($id,$name,$mob,$conn){
			//$id=$_SESSION['USERID'];
    	$sql="UPDATE `user` SET `name`='$name',`mobile`='$mob' WHERE `id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "success";
			}else{
				$msg="failure";
			}
			
    	    return $msg;
		}

		
		//profile view for admin 
		function aprofile($conn){
    	$row = array();
    	$userid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE `id` = '$userid'" ;
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}


}

?>