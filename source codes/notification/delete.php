<?php 
header('Content-Type: application/json');
require "dbconfig.php";
	
	$code= $_GET['code'];
	
	if($code== "secretkey")
	{
			if(isset($_POST['token']))
			{
			       $token = $_POST['token'];

			       $query = "DELETE FROM tokenDB WHERE token='". $token ."'";

			     $result = mysqli_query($con, $query);

			    if($result > 0)
			    {
			        echo "Deleted data successfully.";   
			    }
			    else{
			        echo "Failed to delete data.";   
			    }
			}
	}



	else
	{
		echo 'Access denied; wrong key.';
	}

?>	