<?php
session_start();
$_SESSION['mapid'] = "";
session_destroy();
session_regenerate_id(true); 
//header("location:index.php");
?>
