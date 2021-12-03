<?php

    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['valid']);
    session_destroy();
    header("Location: index.php");
?>