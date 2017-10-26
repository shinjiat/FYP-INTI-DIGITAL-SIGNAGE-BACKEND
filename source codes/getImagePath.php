<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbconfig.php');

		$mapID = $_POST['mapID'];
		
		$stmt = $dbconfig->prepare("SELECT * from map where id=?");
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