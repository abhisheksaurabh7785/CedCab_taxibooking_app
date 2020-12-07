<?php
    session_start();
    require 'config.php';
    require 'location.php';
    require 'ride.php';
    $location = new Location();
    $dbconnection = new dbconnection(); 
     $dbconnection->conn;
    $location = new Location();
    $data = $location -> allocation($dbconnection-> conn);
    // print_r($data);
    


    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $cab = $_POST['cab'];
    $luggage = isset($_POST['luggage']) ? $_POST['luggage'] : 0;
     
     foreach($data as $product){

        if ($product['area_name'] == $pickup) {
            $pickupKM =  $product['distance'];
        }
        if ($product['area_name'] == $drop) {
            $dropKM =  $product['distance'];
        }
    }

    $distance = abs($pickupKM-$dropKM);
    //storing value in session

    // $_SESSION['distance']=$distance;
    // $_SESSION['luggage']=$luggage;
    // $_SESSION['cab']=$cab;
    // $_SESSION['drop']=$drop;
    // $_SESSION['pickup']=$pickup;
    //
    $origdistance = $distance;
    //27/NOV/2020
    $_SESSION['RIDE']['ORIGDISTANCE']=$origdistance;
    //27/NOV
    // echo $distance;
    $fare = 0;
    if ($cab == 'CedMicro') {
        $fare = 50;
        if ($distance <= 10) {
            $fare += $distance * 13.50;
        } else if (($distance > 10) && ($distance <= 60)) {
            $fare += 10 * 13.50;
            $fare += ($distance - 10) * 12.00;
        } else if (($distance > 60) && ($distance <= 160)) {
            $fare += 10 * 13.50;
            $fare += 50 * 12.00;
            $fare += ($distance - 60) * 10.20;
        } else {
            $fare += 10 * 13.50;
            $fare += 50 * 12.00;
            $fare += 100 * 10.20;
            $fare += ($distance - 160) * 8.50;
        }
    } else if ($cab == "CedMini") {
        $fare = 150;
        if ($distance <= 10) {
            $fare += $distance * 14.50;
        } else if (($distance > 10) && ($distance <=60)) {
            $fare += 10 * 14.50;
            $fare += ($distance - 10) * 13.00;
        } else if (($distance > 60) && ($distance <= 160)) {
            $fare += 10 * 14.50;
            $fare += 50 * 13.00;
            $fare += ($distance - 60) * 11.20;
        } else {
            $fare += 10 * 14.50;
            $fare += 50 * 13.00;
            $fare += 100 * 14.50;
            $fare += ($distance - 160) * 13.00;
        }

        if ($luggage) {
            if ($luggage <= 10) {
                $fare += 50;
            } else if (($luggage > 10) && ($luggage <= 20)) {
                $fare += 100;
            } else {
                $fare += 200;
            }
        }
    } else if ($cab == "CedRoyal") {
        $fare = 200;
        if ($distance <= 10) {
            $fare += $distance * 15.50;
        } else if (($distance > 10) && ($distance <=60)) {
            $fare += 10 * 15.50;
            $fare += ($distance - 10) * 14.00;
        } else if (($distance > 60) && ($distance <= 160)) {
            $fare += 10 * 15.50;
            $fare += 50 * 14.00;
            $fare += ($distance - 60) * 12.20;
        } else {
            $fare += 10 * 15.50;
            $fare += 50 * 14.00;
            $fare += 100 * 12.20;
            $fare += ($distance - 160) * 10.50;
        }

        if ($luggage) {
            if ($luggage <= 10) {
                $fare += 50;
            } else if (($luggage > 10) && ($luggage <= 20)) {
                $fare += 100;
            } else {
                $fare += 200;
            }
        }
    }else if ($cab == "CedSuv") {
        $fare = 250;
        if ($distance <= 10) {
            $fare += $distance * 16.50;
        } else if (($distance > 10) && ($distance <=60)) {
            $fare += 10 * 16.50;
            $fare += ($distance - 10) * 15.00;
        } else if (($distance > 60) && ($distance <= 160)) {
            $fare += 10 * 16.50;
            $fare += 50 * 15.00;
            $fare += ($distance - 60) * 13.20;
        } else {
            $fare += 10 * 16.50;
            $fare += 50 * 15.00;
            $fare += 100 * 13.20;
            $fare += ($distance - 160) * 11.50;
        }

        if ($luggage) {
            if ($luggage <= 10) {
                $fare += 50*2;
            } else if (($luggage > 10) && ($luggage <= 20)) {
                $fare += 100*2;
            } else {
                $fare += 200*2;
            }
        }
    }
    //storing fare value in session
    $_SESSION['fare']=$fare;
    //
   //27NOV
    $_SESSION['RIDE']['PICKUP']=$pickup;
    $_SESSION['RIDE']['DROP']=$drop;
    $_SESSION['RIDE']['CABTYPE']=$cab;
    $_SESSION['RIDE']['LUGGAGE']=$luggage;
    //$_SESSION['RIDE']['CUSTOMERID']= $userid;
    // if(!isset($_SESSION['USERNAME'])){
    //     $_SESSION['RIDEP']=$pickup;
    //     $_SESSION['RIDED']=$drop;
    //     $_SESSION['RIDEC']=$cab;
    //     $_SESSION['RIDEL']['RIDELL']=$luggage;
    //     }

   $_SESSION['RIDE']['FARE']=$fare;
 //27NOV
    echo '<h4 class="p-2 font-weight-bold text-danger"> Total Fare : Rs. '.$_SESSION['RIDE']['FARE'].'</h4>';
    echo '<h4 class="p-2 font-weight-bold text-danger"> Total Distance : '.$origdistance.' KM</h4>';

?>
 
