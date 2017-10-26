<?php
$servername = "mysql.hostinger.my";
$username = "u559668083_inti";
$password = "Onlyhostinger";
$dbname = "u559668083_inti"; 
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname ,$port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "INSERT INTO area (coords, name,mapid)
VALUES ('".$_POST['coordsText']."','".$_POST['name']."','".$_POST['mapid']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    include 'index.php';
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>