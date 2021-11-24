<?php
    // check if search was done by geolocation or by search form and then retrieve the right data based on that 
    // and populate the table with it 
    // need to link the review data here and retrieve it as well 
    $loc = $_GET['loc'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    // and add the constraints to this query later 
    $sql = "SELECT location, description, loc_lat, loc_long FROM submission";
    $sql_2 = "SELECT remail, rating, review FROM reviews";
    $result = mysqli_query($conn, $sql); 
    $result_2 = mysqli_query($conn, $sql_2);

    //while ($row = $result_2->fetch_assoc()) {
    //    printf("%s (%s)\n", $row["remail"], $row["review"]);
    //}


    //header("Location: individual_sample.php");
    $conn->close(); 
?> 