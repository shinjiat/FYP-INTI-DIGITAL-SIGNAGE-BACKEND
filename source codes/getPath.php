<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbconfig.php');

		$mapName = $_POST['mapName'];
		
		$stmt = $dbconfig->prepare("SELECT id,coords,name from path where mapid=?");
		$stmt->bind_param('s', $mapName);
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