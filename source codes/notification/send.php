<?php 
require "dbconfig.php";


  //if submit button is clicked
 if(isset($_POST['Submit']))
 {
  $message = $_POST['Message'];
  $link = $_POST['Link'];
 }

 //displaying what message/link are sending to the clients
 echo 'Message : ' . $message;

if($link != NULL)
{
 echo '<br><br>Link : ' . $link;
}

 //display what faculty has been checked from the html    
    if(isset($_POST['faculty']))
    {
      echo '<br><u>Selected Faculty</u>';
      if (is_array($_POST['faculty'])) 
        {
        foreach($_POST['faculty'] as $valueFaculty)
          {
            echo '<br>';
            echo $valueFaculty;
          }
        } 
      else 
      {
        $valueFaculty = $_POST['faculty'];
        echo $valueFaculty;
      }
    }

    //display what major has been checked from the html
    echo '<br><br><u>Selected Major</u>';
    if(isset($_POST['major']))
    {
      if (is_array($_POST['major'])) 
        {
        foreach($_POST['major'] as $valueMajor)
          {
            echo '<br>';
            echo str_replace(array('%', '"'),'',$valueMajor); //remove % that is used 
          }
        } 
      else 
      {
        $valueMajor = $_POST['major'];
        echo $valueMajor;
      }
    }

    else
    {
     echo '<br><b>No major checked.</b>';
    }

//concatenating arrays
$facultyArray = isset($_POST['faculty']) ? $_POST['faculty'] : array();
$facultyArrayCSV = implode(',',$facultyArray);

if($facultyArrayCSV != NULL)
{
      $sql = "SELECT token FROM tokenDB WHERE faculty IN ('". mysqli_real_escape_string($con, $facultyArrayCSV) . "')";
      $result = mysqli_query($con,$sql);

      //instantiating token array
      $tokens = array();


      echo '<br/>';

      $num_rows = $result->num_rows;
      if($num_rows > 0)
      {
          echo '<br/><b><u>Selected tokens with Faculty</u></b><br>';//display this header if record is not null

          while($row = mysqli_fetch_assoc($result))
          {
              echo $row["token"];
              echo '<br>';
              $tokens[] = $row["token"];
          }
      }
}

$majorArray = isset($_POST['major']) ? $_POST['major'] : array();
$majorArrayCSV = implode(' OR ',$majorArray); //replacing OR to be able to send to multiple majors

  //only run this select statement if major is checked, else null value will show result
if($majorArrayCSV != NULL)
{
        echo '<br>';
        $sql = 'SELECT token FROM tokenDB WHERE major Like' . $majorArrayCSV;

        $result = mysqli_query($con,$sql);

        $num_rows = $result->num_rows;
        if($num_rows > 0)
        {
            echo '<br/><b><u>Selected tokens with Majors</u></b><br>';//display this header if record is not null

            while($row = mysqli_fetch_assoc($result))
            {
                echo $row["token"];
                echo '<br>';
                $tokens[] = $row["token"];
            }
        }
}





$message_status = sendFCMMessage($message, $link, $tokens);
echo '<br/><br/>';
echo '<br/><b><u>Message status</u></b><br>';
echo $message_status;

function sendFCMMessage($message, $link, $target){

   //FCM API end-point
   $url = 'https://fcm.googleapis.com/fcm/send';

        $msg = array
        (
            'click_action'=> $link,
            'message'     => $message   
        );

       $fields = array(
        'registration_ids' => $target,
        'priority' => 'high',
        'data' => $msg,
    'click_action'=> $link
        );


   //header with content_type api key
   $headers = array(
  'Content-Type:application/json',
        'Authorization:key=AAAAfn1FLYc:APA91bH6bmmlsx9p1VQyP73dvoAsUAcUmVjb2fYZ4n6pVVEr3qVlhDkRvV61FNtDe8IPtQgNSrfM4U2RvzHCAFGdc-F6DDmKtMXsqg4Jy2vKLchvuy7h87EWmPzWlt7Cs2axdA1e5gQf'
   );
   
   //CURL request to route notification to FCM connection server (provided by Google)     
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
   $result = curl_exec($ch);
   if ($result === FALSE) {
  die('Oops! FCM Send Error: ' . curl_error($ch));
   }
   curl_close($ch);
   return $result;
}
?>