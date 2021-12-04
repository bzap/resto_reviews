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
    // check for values specfic to the post method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        // get inputs from each of the forms
        $email = $_POST['email-pt1'];
        $pword = $_POST['password'];
        $dob = $_REQUEST['date'];
        $street = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $province = $_REQUEST['input-state'];
        $pcode = $_REQUEST['postal-code'];
        // prepare the sql query to insert values
        $sql = "INSERT INTO registration VALUES ('$email', '$pword', '$dob', '$street', '$city', '$province', '$pcode')";
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