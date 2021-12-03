<?php
    echo '<script>console.log("test1")</script>';
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "resto";
    $conn = mysqli_connect($server, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    /// will need to figure out the user when theyre logged in for cookies 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $name = 'temp';
        $rating = $_REQUEST['rating'];
        $review = $_REQUEST['anothertry'];     
        $sql = "INSERT INTO reviews VALUES ('$remail', '$loc', '$rating', '$anothertry')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    header("Location: individual_sample.php");
    $conn->close(); 
?> 