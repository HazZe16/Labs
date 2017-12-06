<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
    }
    if ($_SESSION['user_admin'] != 1) 
      {
        header("location: Views.php"); // redirecting to admin landing page
      } 
      
            require("sql_helper.php");
            deleteRecord($employee, $_POST['deleteid']);
            header("location: Views.php");
?>