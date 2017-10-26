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

$sql = "INSERT INTO area (mapid, name, coords)
VALUES ('".$_POST['mapID']."','".$_POST['areaName']."','".$_POST['coordinate']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record successfully";
    header("location:index.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
