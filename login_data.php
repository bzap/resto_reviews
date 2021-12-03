
<?php
    session_start(); 
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

    if (!isset($_SESSION) || !isset($_SESSION['valid'])){
        $_SESSION['valid'] = false;
    } 


    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if (isset($_POST['email'])){
            if (!empty($_POST['email'])){
                if (isset($_POST['password'])){
                    if (!empty($_POST['password'])){
                        if ($_POST['email'] == 'mcmaster' && $_POST['password'] == '1234'){ 
                            $_SESSION['user'] = 'mcmaster';
                            $_SESSION['valid'] = true;
                            header("Location: index.php");
                        }
                        else{ 
                            header("Location: login.php");
                        }

                    }
                }
            }
        }
    }
    //header("Location: login.php");
    $conn->close(); 
?> 


?> 