<?php
    session_start();
    //print_r($parts);
    $loc = $_POST['loc_in'];
    echo $loc;
    //$loc = $_REQUEST['loc'];
    //echo $result_array_description['location'];
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
        $email = $_SESSION['user'];
        $loc_sql = "(SELECT location FROM submission WHERE location = '$loc')";
        $sql = "INSERT INTO reviews VALUES ((SELECT email FROM registration WHERE email ='$email'), $loc_sql, '$rating', '$review')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    $head = 'individual_sample.php?' . 'loc=' . $loc;
    header("Location: $head");
    $conn->close(); 

?> 