<?php
error_reporting(1);
require_once("../dbconfig.php");
if(isset($_POST['username']) && isset($_POST['password']))
     {
	$username = $_POST['username'];
        $password = $_POST['password'];

          $sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";
          $query = mysqli_query($dbconfig ,$sql);

          if(mysqli_num_rows($query)>0)
          {
            $response = "1";
            
          }
          else{
            $response = "0";
          }

      echo $response;
  	}
?>