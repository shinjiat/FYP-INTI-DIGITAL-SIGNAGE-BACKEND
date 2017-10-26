<!DOCTYPE html>
<html>
<head></head>
<body>



<?php
$host = 'mysql.hostinger.my';
$username = 'u559668083_inti';
$password = 'Onlyhostinger';
$dbname = 'u559668083_inti';
$port = 3306;

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get coordinate from home
//$coordinate = $_GET['coords'];

if(isset($_POST['submit_workshop'])) {
    $path_id = (int) $_POST['path_id'];
    $name = $_POST['name'];
    $coordinate = $_POST['coordinate'];
    $area_id = (int) ($_POST['area_id']);
    $info = $_POST['info'];
    $link = $_POST['link'];

    $sql = "INSERT INTO node_test (pathid, name,coords,link,areaid)
            VALUES ($path_id,'$name','$coordinate','".$link."',$area_id)";

    if ($conn->query($sql) === TRUE) {
        echo "New record successfully";
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();

//header("location:index.php");

?>

</body>
</html>
