<?php
	if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once('dbconfig.php');

		$mapID = $_GET['mapID'];
		
		$stmt = $dbconfig->prepare("SELECT * from area");
		$stmt->bind_param('s', $mapID);
		$stmt->execute();

		$result = get_result( $stmt );
		$json = array();
		 
		while($row = array_shift($result)){
			$json['data'][]=$row;
		}

		$stmt->close();
		$dbconfig->close();

		echo json_encode($json); 
	}
	else {
		echo "Please Try Again!";
	}
?>