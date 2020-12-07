<?php

Class Ride{

	public $pickup;
	public $drop;
	public $origdistance;
	public $fare;
	public $cabtype;
	public $luggage;
	public $userr;
	public $value;
	public $tdate;
    // public $conn;
 
    function ridee($pickup,$drop,$origdistance,$luggage,$fare,$conn)
    {
    	//$tdate=date('Y/m/d');

		$value= '1';
		// $id= $_SESSION['RIDE']['USERNAME'];

		$pickup=$_SESSION['RIDE']['PICKUP'];
		$drop=$_SESSION['RIDE']['DROP'];
		$origdistance=$_SESSION['RIDE']['ORIGDISTANCE'];
		$fare=$_SESSION['RIDE']['FARE'];
		$cabtype=$_SESSION['RIDE']['CABTYPE'];
		$luggage=$_SESSION['RIDE']['LUGGAGE'];
		$custid=$_SESSION['USERID'];
		//$customerid=$_SESSION['RIDE']['CUSTOMERID'];

		$sql = "INSERT INTO `tbl_ride` ( `ride_date`, `from`, `to`, `total_distance`, `luggage`, `total_fare`, `status` ,`cabtype`,`customer_user_id`) VALUES (current_timestamp(), '$pickup', '$drop', '$origdistance', '$luggage', '$fare', '1','$cabtype','$custid')";
		 
		  $result = $conn-> query($sql);
		  return $sql;

 
    }
    function pending($conn){
			$row = array();
			$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status` = '1'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		function approved($conn){
    	$row = array();
    	$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status` = '2'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}

		function cancelled($conn){
    	$row = array();
    	$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status` = '0'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}

		function allrides($conn){
    	$row = array();
    	$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$custid'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}		
		 
		
		function countpending($conn){
			$custid=$_SESSION['USERID'];
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status`='1' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		
		function countapproved($conn){
			$custid=$_SESSION['USERID'];
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status`='2' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}

		function countcancelled($conn){
			$custid=$_SESSION['USERID'];
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status`='0' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}

		function countallrides($conn){
			$custid=$_SESSION['USERID'];
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `customer_user_id` = '$custid'";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		function totalspend($conn){
			$custid=$_SESSION['USERID'];
			$sql="SELECT SUM(total_fare) FROM `tbl_ride` WHERE `customer_user_id` = '$custid' AND `status`='2'";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}

		function adpendingreq($conn){
			$row = array();
			//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE  `status` = '1'";
    	$result = $conn-> query($sql);

    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    		//$_SESSION['uid'] = $data['customer_user_id'];
    	}

    	return $row;
		}
		function adpendingappr($id, $conn){
			//$custid=$_SESSION['uid'];
			//echo $custid;
			$sql="UPDATE `tbl_ride` SET `status`='2' WHERE `ride_id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "success";
			}
			// while ($data = mysqli_fetch_assoc($result)) {
   //  		$row[] = $data;
   //  	}
    	return $msg;

		}
		function adpendingcanc($id, $conn){
			//$custid=$_SESSION['uid'];
			//echo $custid;
			$sql="UPDATE `tbl_ride` SET `status`='0' WHERE `ride_id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "failed";
			}
			// while ($data = mysqli_fetch_assoc($result)) {
   //  		$row[] = $data;
   //  	}
    	return $msg;

		}
		function adcompride($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '2'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		function adcancride($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '0'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		function adallride($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '2' OR `status` = '1' OR `status` = '0' ";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		// registered user pending
		function adpendusereq($conn){
			$row = array();
			//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE  `isblock` = '0'";
    	$result = $conn-> query($sql);

    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    		//$_SESSION['uid'] = $data['customer_user_id'];
    	}

    	return $row;
		}
		//registered user unblock/block pending by admin
		function adpenduserunblock($id, $conn){
			//$custid=$_SESSION['uid'];
			//echo $custid;
			$sql="UPDATE `user` SET `isblock`='1' WHERE `id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "success";
			}
			// while ($data = mysqli_fetch_assoc($result)) {
   //  		$row[] = $data;
   //  	}
    	return $msg;

		}
		function adpenduserblock($id, $conn){
			//$custid=$_SESSION['uid'];
			//echo $custid;
			$sql="UPDATE `user` SET `isblock`='0' WHERE `id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "success";
			}
			// while ($data = mysqli_fetch_assoc($result)) {
   //  		$row[] = $data;
   //  	}
    	return $msg;

		}
		//registered user unblock  by admin
		function adappruser($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock` = '1'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		//registered user block  by admin

		function adblockuser($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE `isblock` = '0'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		//all registered user
		function adalluser($conn){
    	$row = array();
    	//$custid=$_SESSION['USERID'];
    	$sql = "SELECT * FROM `user` WHERE `isadmin`='0'";
    	$result = $conn-> query($sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;
		}
		//count pending ride in admin_pannel
		function countadpendride($conn){
			
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `status`='1' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count cancelled ride in admin_pannel
		function countadcancride($conn){
			
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `status`='0' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count approved ride in admin_pannel
		function countadapprride($conn){
			
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride` WHERE `status`='2' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count pending user account in admin_pannel
		function countadpenduser($conn){
			
			$sql="SELECT COUNT(id) FROM `user` WHERE `isblock`='0' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count approved user account in admin_pannel
		function countadappruser($conn){
			
			$sql="SELECT COUNT(id) FROM `user` WHERE `isblock`='1' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count block user account in admin_pannel
		function countadblockuser($conn){
			
			$sql="SELECT COUNT(id) FROM `user` WHERE `isblock`='0' ";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count total user account in admin_pannel
		function countadttaluser($conn){
			
			$sql="SELECT COUNT(id) FROM `user`";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//count total rides in admin_pannel
		function countadttalride($conn){
			
			$sql="SELECT COUNT(ride_id) FROM `tbl_ride`";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}
		//total earning of admin
		function totalearned($conn){
			//$custid=$_SESSION['USERID'];
			$sql="SELECT SUM(total_fare) FROM `tbl_ride` WHERE `status`='2'";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		$row[] = $data;
    	}
    	return $row;

		}

		//2dec admin sorting allride page by fare and date programming
		

		function adallridesort($id,$conn){
			//sort by date
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `ride_date` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance
            if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by date ascend
			if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `ride_date`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend
            if($id==5){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `total_fare` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance  ascend
            if($id==6){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` ORDER BY `total_distance` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//2dec sorting allride page by fare and date programming
		
		//3dec admin sorting alluser page by name and dateofsignup programming
		

		function adallusersort($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' ORDER BY `dateofsignup` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' ORDER BY `name` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofsignup ascend
			if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' ORDER BY `dateofsignup`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name  ascend
            if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' ORDER BY `name` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//3dec admin sorting alluser page by name and dateofsignup programming

		//3dec user sorting allrides page by fare and date programming
		

		function usridesort($id,$idb,$conn){
			//sort by dateofbooking
			if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `ride_date` DESC ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by distance
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofbooking ascend
			if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `ride_date`  ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `total_fare` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by distance ascend
            if($idb==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' ORDER BY `total_distance` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//3dec admin sorting alluser page by name and dateofsignup programming

		//4dec user allride page filter

		function usercabfilter($id,$idb,$conn){
	
            //filter by cedmicro cab
            if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND  `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //clear filter
             if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$id'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4dec user allride page filter

		//3dec  admin allrides filter by week,month and cab type programming
		

		function adallridefilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `tbl_ride` WHERE `ride_date` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `ride_date`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmicro cab
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($id==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($id==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($id==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //clear filter
            if($id==7){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '2' OR `status` = '1' OR `status` = '0' ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//3dec admin sorting alluser page by name and dateofsignup programming

		//3dec admin  invoice code
		function adinvoice($id,$conn){
			$row= array();
			$sql ="SELECT * FROM `tbl_ride` WHERE `ride_id`='$id'";
			$result = $conn-> query($sql);
			//return $sql;
			while ($data=mysqli_fetch_assoc($result)) {
				$row[]= $data;
			}
			return $row;
		}
		//3dec admin  invoice code
		//4de allpending ride sorting
		function adpendridesort($id,$conn){
			//sort by date
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `ride_date` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance  
            if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by date ascend
			if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `ride_date` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend 
            if($id==5){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `total_fare` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance ascend  
            if($id==6){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' ORDER BY `total_distance` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4de allpending ride sorting
		//4de allpending ride filter
		function adpendridefilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `tbl_ride` WHERE `status`='1' AND `ride_date` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='1' AND `ride_date`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmicro cab
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='1' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($id==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='1' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($id==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='1' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($id==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='1' AND `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter lear
            if($id==7){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status` = '1'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//4de allpending ride filter

		//4de allcancelled ride sorting
		function adcancridesort($id,$conn){
			//sort by date
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `ride_date` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance
            if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by date ascend
			if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `ride_date`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend
            if($id==5){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_fare`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance ascend
            if($id==6){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' ORDER BY `total_distance` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4de allcancelled ride sorting

		//4de allcancelled ride filter
		function adcancridefilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `tbl_ride` WHERE `status`='0' AND `ride_date` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='0' AND `ride_date`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmicro cab
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='0' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($id==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='0' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($id==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='0' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($id==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='0' AND `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter Clear
            if($id==7){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//4de allcancelled ride filter
		
		//4de allcompleted ride sorting
		function adcompridesort($id,$conn){
			//sort by date
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `ride_date` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance 
            if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by date ascend
			if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `ride_date`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend
            if($id==5){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `total_fare`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance 
            if($id==6){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' ORDER BY `total_distance`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4de allcancelled ride sorting

		//4de allcompleted ride filter
		function adcompridefilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `tbl_ride` WHERE `status`='2' AND `ride_date` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='2' AND `ride_date`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmicro cab
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='2' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($id==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='2' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($id==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='2' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($id==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE  `status`='2' AND `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //clear filter 
            if($id==7){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `status` = '2'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//4de allcompleted ride filter

		//4dec  admin alluser filter by week,month ,block,unblock programming
		

		function adalluserfilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `dateofsignup` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `dateofsignup`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by blocked
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND  `isblock`='0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by unblocked
            if($id==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND  `isblock`='1'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter clear
            if($id==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            
    	return $row;
		}
		//admin appr user sort 
		function adapprusersort($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1'  ORDER BY `dateofsignup` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' ORDER BY `name` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofsignup ascend
			if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1'  ORDER BY `dateofsignup` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name  ascend
            if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' ORDER BY `name` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//admin appr user sort

		//admin appr user filter by week and month
		function adappruserfilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' AND `dateofsignup` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' AND `dateofsignup`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock` = '1'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            
            
    	return $row;
		}

		//user pending page sort
		function uspendridesort($id,$idb,$conn){
			//sort by dateofsignup
			$row= array();
			if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `ride_date` DESC ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by distance
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by date ascending
            if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `ride_date` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by distance ascending
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `total_fare`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
             //sort by distance ascend..
            if($idb==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' ORDER BY `total_distance` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//user pending page sort

		//4dec user pendride page filter

		function uspendcabfilter($id,$idb,$conn){
	
            //filter by cedmicro cab
            if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1' AND  `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //clear filter 
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$id' AND `status` = '1'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4dec user pendride page filter

		//user approved page sort
		function usapprridesort($id,$idb,$conn){
			//sort by dateofsignup
			if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `ride_date` DESC ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofbooking ascend
			if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `ride_date` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare ascend
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `total_fare` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by distance
            if($idb==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' ORDER BY `total_distance`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//user approved page sort

		//4dec user pendride page filter

		function usapprcabfilter($id,$idb,$conn){
	
            //filter by cedmicro cab
            if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2' AND  `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //Clear filter
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$id' AND `status` = '2'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4dec user approved ride page filter

		//user cancelled ride page sort
		function uscancridesort($id,$idb,$conn){
			//sort by dateofsignup
			if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `ride_date` DESC ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `total_fare` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `total_distance` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofbooking
			if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM `tbl_ride` WHERE `customer_user_id`=5 ORDER BY `ride_date` DESC
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `ride_date`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `total_fare`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by fare
            if($idb==6){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' ORDER BY `total_distance`";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//user approved page sort

		//4dec user cancelledride page filter

		function uscanccabfilter($id,$idb,$conn){
	
            //filter by cedmicro cab
            if($idb==1){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' AND `cabtype`='CedMicro'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedmini cab
            if($idb==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' AND `cabtype`='CedMini'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedroyal cab
            if($idb==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' AND `cabtype`='CedRoyal'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by cedsuv cab
            if($idb==4){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='0' AND  `cabtype`='CedSuv'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //clear filter
            if($idb==5){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '$id' AND `status` = '0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}

		//4dec user cancelled ride page filter
		//user  invoice code
		function usinvoice($id,$idb,$conn){
			$row= array();
			$sql ="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `ride_id`='$idb'";
			$result = $conn-> query($sql);
			//return $sql;
			while ($data=mysqli_fetch_assoc($result)) {
				$row[]= $data;
			}
			return $row;
		}
		//user  invoice code
		//admin pend user sort 
		function adpendusersort($id,$conn){
			//sort by dateofsignup 
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0' ORDER BY `dateofsignup` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0' ORDER BY `name` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofsignup ascend
			if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0'   ORDER BY `dateofsignup` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name  ascend
            if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0'  ORDER BY `name` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//admin pend user sort

		//admin pend user filter by week and month
		function adpenduserfilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0' AND `dateofsignup` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='1' OR  `isblock`='0' AND `dateofsignup`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock` = '1' OR  `isblock`='0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            
            
    	return $row;
		}
		//
		//admin canc user sort 
		function adcancusersort($id,$conn){
			//sort by dateofsignup 
			if($id==1){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0' ORDER BY `dateofsignup` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name 
            if($id==2){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0' ORDER BY `name` DESC";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by dateofsignup ascend
			if($id==3){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0'   ORDER BY `dateofsignup` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //sort by name  ascend
            if($id==4){
		    	$row = array();
		    	//$custid=$_SESSION['USERID'];
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0'  ORDER BY `name` ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
    	return $row;
		}
		//admin  canc user sort

		//admin canc user filter by week and month
		function adcancuserfilter($id,$conn){
			//sort by dateofsignup
			if($id==1){
		    	$row = array();
			    $sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND   `isblock`='0' AND `dateofsignup` BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() ";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            //filter by month
            if($id==2){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0' AND `dateofsignup`> (NOW() - INTERVAL 1 MONTH)";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            if($id==3){
		    	$row = array();
		    	//$id=$_SESSION['USERID'];
		    	//SELECT * FROM tbl_ride WHERE ride_date > (NOW() - INTERVAL 1 MONTH)
					$sql = "SELECT * FROM `user` WHERE `isadmin`='0' AND `isblock`='0'";
					//return $sql;
		    	$result = $conn-> query($sql);
		    	while ($data = mysqli_fetch_assoc($result)) {
		    		$row[] = $data;
		    	}
            }
            
            
    	return $row;
		}







}
?>