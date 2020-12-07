<?php
Class Location{
	    function adlocation($location,$distance,$conn){
			$sql="INSERT INTO `location`(`area_name`,`distance`) VALUES('$location','$distance')";
			$result=$conn-> query($sql);
            //print_r($result);

			return $result;
		}
		function viewlocation($conn){
			$row = array();
			$sql = "SELECT * FROM `location`";
			$result=$conn-> query($sql);
			while ($data = mysqli_fetch_assoc($result)) {
    		    $row[] = $data;
    	    }
    	    return $row;
    	}
    	function editloc($id,$location,$distance,$conn){
			$sql="UPDATE `location` SET `area_name`='$location',`distance`='$distance' WHERE `id`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "success";
			}
			
    	    return $msg;

		}
		function delloc($id, $conn){
			$sql="DELETE FROM `location`  WHERE `area_name`= '$id'";
			$result=$conn-> query($sql);
			if ($result) {
				$msg = "hows";
				
			}
			
    	    return $msg;

		}

		function fetchLocation($conn)
		{
			$row = array();
			$sql = "SELECT * FROM `location` ";
			$result = mysqli_query($conn, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				$row[] = $data; 
			}
			return $row;
		}
		//loc for calculation of php
		function allocation($conn){
			$row = array();
			$sql = "SELECT * FROM `location` WHERE `isavailable`='1'";
			//return $sql;
			$result = mysqli_query($conn, $sql);
			if($result->num_rows>0){
		        while($data= mysqli_fetch_assoc($result)){
		        
		            $row[]=$data;
                }
            }
			//return $row;
			return $row;
		}
		
}

?>