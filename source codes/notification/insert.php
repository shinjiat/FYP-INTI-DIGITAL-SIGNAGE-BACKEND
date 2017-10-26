<?php 
header('Content-Type: application/json');
require "dbconfig.php";


  
      if(isset($_POST['token']) && isset($_POST['UUID']))
      {
             $token = $_POST['token'];
             $UUID = $_POST['UUID'];

             $sql = "SELECT * FROM tokenDB WHERE UUID ='$UUID'";
             $result = mysqli_query($con, $sql);

             //setting variable with number of result return from the sql query
             $num_rows = $result->num_rows;
             echo 'number of matched UUID : ' . $num_rows;
              //if result found, update row
        if( $num_rows > 0) {
          echo 'UUID found, run update query';
          $sql = "UPDATE tokenDB SET token = '$token'
            WHERE UUID = '$UUID'";

           $result = mysqli_query($con, $sql);
        }

        //else if no result found, insert new token into database
        else
        {
          echo 'inside else, no UUID matched, run insert query';
          $sql = "INSERT INTO tokenDB(token, UUID) VALUES ('$token', '$UUID')";

          $result = mysqli_query($con, $sql);
        }

} 

?>