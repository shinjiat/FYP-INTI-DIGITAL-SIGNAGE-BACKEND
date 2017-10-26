<?php 
header('Content-Type: application/json');
require "dbconfig.php";
	
	$block = $_GET['block'];
	
	if($block == "secretkey"){
		$info = array();
		
		$query =  mysqli_query($con,"select * from beacons");
		
		while($row = mysqli_fetch_array($query)){
			array_push($info,array(
                                "block"=>$row['position'],
				"mm" => $row['mm'],
				"floor" => $row['floor'],
				"data" => $row['data'],
                                "identifier" => $row['identifier']
			));
		}
		echo json_encode(array("inti"=> $info));
	}

	else
	{
		echo 'Access denied; wrong key.';
	}

?>	