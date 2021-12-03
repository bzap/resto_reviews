
<?php
    session_start(); 
    echo '<script>console.log("test1")</script>';


    if (!isset($_SESSION) || !isset($_SESSION['valid'])){
        $_SESSION['valid'] = false;
    } 


    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if (isset($_POST['email'])){
            if (!empty($_POST['email'])){
                if (isset($_POST['password'])){
                    if (!empty($_POST['password'])){

                        $server = "localhost";
                        $username = "root";
                        $password = "";
                        $db_name = "resto";
                        $conn = mysqli_connect($server, $username, $password, $db_name);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $user = $_POST['email'];
                        $pword = $_POST['password'];
                        $result = $conn->prepare("SELECT email, password FROM registration WHERE email = ? AND password = ?");
                        $result->bind_param("ss", $user, $pword);
                        $result->execute(); 
                        $result->bind_result($n1, $n2);
                        $result->fetch();
                        $check_valid = ($n1 != null && $n2 != null); 

                        if ($check_valid){ 
                            $_SESSION['user'] = $user;
                            $_SESSION['valid'] = true;
                            $conn->close(); 
                            header("Location: index.php");
                        }
                        else{ 
                            $result->close(); 
                            header("Location: login.php");
                        }

                    }
                }
            }
        }
    }
    //header("Location: login.php");
    
?> 


?> 