<?php 
error_reporting(1);
require_once("../dbconfig.php");

      if(isset($_POST['UUID']) && isset($_POST['token']))
      {
             $UUID = $_POST['UUID'];
             $token = $_POST['token'];

             $sql = "SELECT * FROM guest WHERE UUID ='$UUID'";
             $result = mysqli_query($dbconfig, $sql);

             $num_rows = $result->num_rows;//number of result found

        //if the passed UUID exist in the database, update it
        if( $num_rows > 0) {
          $sql = "UPDATE guest SET token = '$token'
            WHERE UUID = '$UUID'";

           $result = mysqli_query($dbconfig, $sql);
           if(!$result)
           {
            $response = "0";
           }

           else
           {
            $response = "1";
           }
        }

        //else if no matches found, insert new token into database
        //
        else
        {
          $sql = "INSERT INTO guest(token, UUID) VALUES ('$token', '$UUID')";

          $result = mysqli_query($dbconfig, $sql);
           if(!$result)
           {
            $response = "0";
           }

           else
           {
            $response = "1";
           }
        }

        echo $response;

} 

?>