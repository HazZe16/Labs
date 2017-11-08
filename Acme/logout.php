<?php
    session_start();
    
    // End current session
    unset($_SESSION['login_user']);
    unset($_SESSION['user_record']);
    unset($_SESSION['admin']);
    unset($_SESSION['reservation']);
    
    // Redirect user back to home page
    header("Location: index.php");
    
    die;
?>