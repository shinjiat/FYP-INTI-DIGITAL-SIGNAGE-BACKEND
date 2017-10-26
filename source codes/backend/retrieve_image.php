<?php
// Create connection
 require_once('dbconfig.php');
// Check connection
if ($dbconfig->connect_error) {
    die("Connection failed: " . $dbconfig->connect_error);
}

$sql_map = mysqli_query($dbconfig, "SELECT id,name,image from map where image NOT IN ('EMPTY','null','')");

?>