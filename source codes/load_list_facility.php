<?php
	//if($_SERVER['REQUEST_METHOD']=='POST'){
        require_once('dbconfig.php');

        $sql_class = "SELECT c.id, c.mapid, c.name, c.coords, m.block, m.level, m.image FROM facility c JOIN map m 
        ON c.mapid = m.id
        ";

        $stmt = $dbconfig->prepare($sql_class);
        $stmt->execute();

        $result = get_result( $stmt );
        $json = array();

        while($row = array_shift($result)){
            $json['data'][]=$row;
        }




        $stmt->close();
        $dbconfig->close();
        echo json_encode($json); 
    //}
    //else {
    //    echo "Please Try Again!";
    //}

	/*$sql = "SELECT *
			FROM classroom";
	
	$res = mysqli_query($dbconfig,$sql);
 
	$result = array();
	 
	while($row = mysqli_fetch_array($res)){
        array_push($result,
        array('id'=>$row[0],
            'name'=>$row[1],
            'block'=>$row[2],
            'level'=>$row[3]));
	}
	 
	echo json_encode(array("data"=>$result));
	 
	mysqli_close($dbconfig);*/
?>