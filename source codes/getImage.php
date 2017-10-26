<?php
	if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once('dbconfig.php');

		$mapID = $_GET['mapID'];
		
		$stmt = $dbconfig->prepare("SELECT image from map where id=?");
		$stmt->bind_param('s', $mapID);
		$stmt->execute();

		$result = get_result( $stmt );
		$path= array();
		while($row = array_shift($result)){
			$path=$row;
		}
                $imagePath = "http://cloudangel.16mb.com" . $path['image'];
		$stmt->close();
		$dbconfig->close();

		/*echo json_encode($json);*/
        $im = imagecreatefromjpeg($imagePath);
        header('content-type: image/jpeg');
        imagejpeg($im);
//echo base64_encode($im);
        //mysqli_close($dbconfig);
	}
	else {
		echo "Please Try Again!";
	}
?>