<?php
    // start the session 
    session_start();
    // get the data for what restaurant is being reviewed upon using the submit button 
    $loc = $_POST['loc_in'];
    // connect to the db 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    // check for values specfic to the post method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        // get inputs from each of the forms
        $review = $_POST['anothertry'];
        $rating = $_POST['rating'];
        $email = $_SESSION['user'];
        // prepare the sql queries to insert values
        // the first one is to respect the foreign key of location 
        $loc_sql = "(SELECT location FROM submission WHERE location = '$loc')";
        $sql = "INSERT INTO reviews VALUES ((SELECT email FROM registration WHERE email ='$email'), $loc_sql, '$rating', '$review')";
        // submit the query to the db 
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    // return to the same page, making sure to keep the loc variable in the url so everything loads from the db 
    $head = 'individual_sample.php?' . 'loc=' . $loc;
    header("Location: $head");
    // close the connection 
    $conn->close(); 

?> 