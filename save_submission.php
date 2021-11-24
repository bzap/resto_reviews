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
    // need to store the geolocation decimals for more precision 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $name = $_POST['name'];
        $loc = $_POST['custom-file-loc'];
        $food = $_POST['custom-file-food'];
        $descr = $_POST['anothertry'];
        $llat = $_REQUEST['sub-lat'];
        $llong = $_REQUEST['sub-long'];     
        $sql = "INSERT INTO submission VALUES ('$name', '$loc', '$food', '$descr', '$llat', '$llong')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    header("Location: index.html");
    $conn->close(); 
?> 