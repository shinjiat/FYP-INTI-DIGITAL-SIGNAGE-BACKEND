<?php
session_start();

$currentmapid = strval($_GET['q']);

$_SESSION['mapid'] = $currentmapid;

echo '<script>alert("woi");</script>';

$getmapid = $_SESSION['mapid'];

//header("Refresh:0");

//header("location:index.php");
?>
