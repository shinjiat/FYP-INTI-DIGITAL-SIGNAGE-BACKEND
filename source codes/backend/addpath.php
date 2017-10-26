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

$sql = "INSERT INTO path (mapid, coords,name)
VALUES ('".$_POST['mapID']."', '".$_POST['coordinate']."','".$_POST['name']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record successfully";
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location:index.php");

?>
