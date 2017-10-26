<?php
session_start();
require_once('dbconfig.php');

echo "woi";

if (isset($_POST['submit'])){
	//setting variables from dialog form
	  $block = $_POST['block'];
	  $level = $_POST['level'];
	  $name = $_POST['name'];
	  //$myimage = $_POST['myimage'];


//upload to FTP
$ftp_server = "ftp.cloudangel.16mb.com";
$ftp_user_name = "u559668083";
$ftp_user_pass = "Onlyhostinger";
$file_name = $_FILES["file"]["name"];
$destination_file = "/public_html/map/" . $file_name;
$source_file = $_FILES['file']['tmp_name'];


// set up basic connection
$conn_id = ftp_connect($ftp_server);
ftp_pasv($conn_id, true);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);


echo '<u>Status for uploading image to FTP </u><br>';
// check connection
if ((!$conn_id) || (!$login_result)) {
    echo "FTP connection has failed!";
    exit;
} else {
    echo "Connected to $ftp_server";
}

echo '<br>';
// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);


// check upload status
if (!$upload) {
echo "FTP upload has failed!";
} else {
echo "Uploaded [$file_name] to [$ftp_server] under directory of [/public_html/map/]";
}

// close the FTP stream
ftp_close($conn_id);


echo '<br><br><br>';
echo '<u>Database update (path)</u><br>';
$destination_file = "/map/" . $file_name;
//if record exists, update map content

//$sql = "UPDATE map SET image = ('".$destination_file."') WHERE block = ('".$block."') AND level = ('".$level."') AND name = ('".$name."')";
$sql = "INSERT INTO map(block,level,name,image) VALUES ('$block','$level','$name','$destination_file')";
$result = mysqli_query($dbconfig, $sql);

 		if(!$result)
		{
		    echo 'Could not insert the map(path), error : ' . mysql_error();
		}

		else
		{
			echo 'Map(path) has been inserted to the database.';
		}

}

else{
	echo 'Submit is not set !';
	header('location:index.php');
	  
}

?>
