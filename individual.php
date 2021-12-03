<?php
    // check if search was done by geolocation or by search form and then retrieve the right data based on that 
    // and populate the table with it 
    // need to link the review data here and retrieve it as well 
    $loc = $_REQUEST['loc'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    $sql = "SELECT location, description, loc_lat, loc_long FROM submission WHERE location = '$loc'";
    $sql_2 = "SELECT remail, rating, review FROM reviews WHERE rlocation = '$loc'";
    $sql_rating = "SELECT SUM(rating) as sum_rating, COUNT(rating) as sum_rows FROM reviews WHERE rlocation = '$loc'";
    $result = mysqli_query($conn, $sql); 
    $result_2 = mysqli_query($conn, $sql_2);
    $result_rating = mysqli_query($conn, $sql_rating);

    $result_array_rating = mysqli_fetch_array($result_rating);
    $result_avg;

    if ($result_array_rating['sum_rows'] > 0) { 
      $result_avg = round($result_array_rating['sum_rating'] / $result_array_rating['sum_rows'], 2);
    }
    else{ 
      $result_avg = "NA";
    }


    $result_array_description = mysqli_fetch_array($result);
    $conn->close(); 
?> 