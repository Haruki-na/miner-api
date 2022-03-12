<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "mobile_mining";

    // Create Connection
    $con = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_query($con,"set char set utf8");

    // Check Connection
    if (!$con) {
        die("Connection failed" . mysqli_connect_error());
    }
?>