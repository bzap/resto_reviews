<?php
    //connect to the db 
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
        $name = $_POST['name'];
        $loc = $_POST['custom-file-loc'];
        $food = $_POST['custom-file-food'];
        $descr = $_POST['anothertry'];
        $llat = $_REQUEST['sub-lat'];
        $llong = $_REQUEST['sub-long'];     
        // prepare the sql query to insert values 
        $sql = "INSERT INTO submission VALUES ('$name', '$loc', '$food', '$descr', '$llat', '$llong')";
        // submit the query to the db 
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
    }
    // change the location of the page to index.php (home)
    header("Location: index.php");
    // close the connection 
    $conn->close(); 
?> 