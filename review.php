<?php
    $loc = $_GET['loc'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $review = $_POST['anothertry'];
        $rating = $_POST['rating'];
        $email = $_POST['password'];
        $sql = "INSERT INTO reviews VALUES ('John', '$loc', '$rating', '$review')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    //header("Location: individual_sample.php");
    $conn->close(); 

?> 