<?php
session_start();
require ('config.php');
require_once('ride.php');
$dbconnection = new dbconnection();
$dbconnection->conn;
	$ride1= new Ride();
 $pickup=$_SESSION['RIDE']['PICKUP'];
  $drop=$_SESSION['RIDE']['DROP'];
  // $_SESSION['RIDE']['IDD']=$_SESSION['IDD'];
 
  $origdistance=$_SESSION['RIDE']['ORIGDISTANCE'];
  //$originaldis="140";
  $fare=$_SESSION['RIDE']['FARE'];
  $cabtype=$_SESSION['RIDE']['CABTYPE'];
  $luggage=$_SESSION['RIDE']['LUGGAGE'];
  $ride1= new Ride();
  $sql = $ride1 -> ridee($pickup,$drop,$origdistance,$luggage,$fare,$dbconnection-> conn);
  if($sql){
  	header('LOCATION: userpanel/pendingrides.php');
  }

?>