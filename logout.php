<?php
    // start the session 
    session_start();
    // remove the username and log-in check from the session 
    unset($_SESSION['user']);
    unset($_SESSION['valid']);
    // end the session
    session_destroy();
    // return to the home page 
    header("Location: index.php");
?>