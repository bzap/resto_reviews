
<?php
    // start the session
    session_start(); 
    // check if the session exists, and whether someone is logged in 
    if (!isset($_SESSION) || !isset($_SESSION['valid'])){
        $_SESSION['valid'] = false;
    } 
    // check for values specfic to the post method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        // check if email exists
        if (isset($_POST['email'])){
            // checkc if email was entered
            if (!empty($_POST['email'])){
                // check if password exists
                if (isset($_POST['password'])){
                    // check if password was entered
                    if (!empty($_POST['password'])){
                        // connect to the db 
                        $server = "localhost";
                        $username = "root";
                        $password = "";
                        $db_name = "resto";
                        $conn = mysqli_connect($server, $username, $password, $db_name);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        // get inputs from each of the forms
                        $user = $_POST['email'];
                        $pword = $_POST['password'];
                        // prepare the query to receive username and password, using ? parameters to work against sql injection 
                        $result = $conn->prepare("SELECT email, password FROM registration WHERE email = ? AND password = ?");
                        // bind the paramters, using 'ss' because both values are strings
                        $result->bind_param("ss", $user, $pword);
                        // run the query
                        $result->execute();
                        // receive the result and bind them to two vars  
                        $result->bind_result($n1, $n2);
                        $result->fetch();
                        // check if both username and password are not null, to make sure it's the right account
                        $check_valid = ($n1 != null && $n2 != null); 
                        // if it's valid, then the session belongs to the user logged in 
                        if ($check_valid){ 
                            $_SESSION['user'] = $user;
                            $_SESSION['valid'] = true;
                            // close the connection
                            $conn->close(); 
                            // return to the homepage
                            header("Location: index.php");
                        }
                        else{ 
                            // close the connection 
                            $result->close(); 
                            // return to the login screen to try again
                            header("Location: login.php");
                        }
                    }
                }
            }
        }
    }
?> 
