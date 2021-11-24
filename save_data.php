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

    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $email = $_POST['email-pt1'];
        $pword = $_POST['password'];
        $dob = $_REQUEST['date'];
        $street = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $province = $_REQUEST['input-state'];
        $pcode = $_REQUEST['postal-code'];
        
        $sql = "INSERT INTO registration VALUES ('$email', '$pword', '$dob', '$street', '$city', '$province', '$pcode')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
    $conn->close(); 
?> 