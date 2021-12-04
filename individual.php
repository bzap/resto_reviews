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
    // store the name of location from the submit form 
    $loc = $_REQUEST['loc'];
    // prepare the queries to get information specific to the location 
    $sql = "SELECT location, description, loc_lat, loc_long FROM submission WHERE location = '$loc'";
    $sql_2 = "SELECT remail, rating, review FROM reviews WHERE rlocation = '$loc'";
    // prepare the query to get values needed for an average value of reviews
    $sql_rating = "SELECT SUM(rating) as sum_rating, COUNT(rating) as sum_rows FROM reviews WHERE rlocation = '$loc'";
    // store the results of each query 
    $result = mysqli_query($conn, $sql); 
    $result_2 = mysqli_query($conn, $sql_2);
    $result_rating = mysqli_query($conn, $sql_rating);
    // fetch and store this query as an array
    $result_array_rating = mysqli_fetch_array($result_rating);
    $result_avg;
    // if reviews exist, take the average (values / number of reviews)
    if ($result_array_rating['sum_rows'] > 0) { 
      $result_avg = round($result_array_rating['sum_rating'] / $result_array_rating['sum_rows'], 2);
    }
    else{ 
      $result_avg = "NA";
    }
    // fetch and store this query as an array
    $result_array_description = mysqli_fetch_array($result);
    // close the connection 
    $conn->close(); 
?> 