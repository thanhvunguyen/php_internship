<?php
    $servername = "localhost";
    $username = "root";
    $password = "Thanh123@";
    $dbname = "testdb";

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }