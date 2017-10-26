<?php
    $servername = "mysql.hostinger.my";
    $database = "u559668083_inti";
    $username = "u559668083_inti";
    $password = "Onlyhostinger";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $guestiddetail = $_POST['guestids'];
    
    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query ="INSERT INTO trackingguest (guestid) VALUES ('$guestiddetail')";
    mysqli_query($conn, $query) or die (mysqli_error());

    mysqli_close($conn);
?>