<?php
    // connect to the db 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    // get the name of the restaurant and the description 
    $sql = "SELECT location, description FROM submission";
    // store the result of the query 
    $result = mysqli_query($conn, $sql); 
    // close the connection 
    $conn->close(); 
?> 