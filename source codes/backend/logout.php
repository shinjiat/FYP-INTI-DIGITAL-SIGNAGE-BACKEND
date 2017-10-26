<?php

	echo "Logged out scuccessfully";

 	session_start();
	session_destroy();
	session_regenerate_id(true);
  header("location:signin.php")
?>
