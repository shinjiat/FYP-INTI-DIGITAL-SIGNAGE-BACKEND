<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbconfig.php');

		$mapName = $_POST['mapName'];
		
		$stmt = $dbconfig->prepare("SELECT DISTINCT node.* FROM node,area,path,map WHERE (node.areaid = area.id AND area.mapid = map.id AND map.id = ?) OR (node.pathid = path.id AND path.mapid = map.id AND map.id = ?);");
		$stmt->bind_param('ss', $mapName,$mapName);
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