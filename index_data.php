<?php
    // check if search was done by geolocation or by search form and then retrieve the right data based on that 
    // and populate the table with it 
    // need to link the review data here and retrieve it as well 

    echo '<script>console.log("test1")</script>';
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    // and add the constraints to this query later 
    $sql = "SELECT location, description FROM submission";
    
    $result = mysqli_query($conn, $sql); 


    $conn->close(); 
?> 