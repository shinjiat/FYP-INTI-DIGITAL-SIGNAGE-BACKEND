<?php
    session_start();
    include ("dbconfig.php");

    $msg = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname = $_POST["uname"];
        $upass = $_POST["upass"];
        $stripname = stripslashes($uname);
        $strippass  = stripslashes($upass);

        $uname = mysqli_real_escape_string($dbconfig, $stripname);
        $upass = mysqli_real_escape_string($dbconfig, $strippass);


        $sql="SELECT * FROM admin WHERE uname='$stripname' AND upass='$strippass'";
        $result=mysqli_query($dbconfig,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        if(mysqli_num_rows($result) == 1)
        {
            header('location:index.php');
        }
        else
        {
            Echo 'Login Failed..';
        }
    }
?>
