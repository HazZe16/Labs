<?php
session_start(); // Starting Session
require 'sql_helper.php';


// Used for the employees to take them to their specified options page
if(!isset($_SESSION['login_user'])){
        header("Location: login.php?message=You%20need%20to%20login%20first.");
    }
    
    
      if ($_SESSION['user_admin'] == 1) 
      {
        header("location: HRview.php"); // redirecting to admin landing page
      } 
      elseif ($_SESSION['user_manager'] == 1) 
      {
        header("location: Managerview.php"); // redirecting to manager landing page
      }
      else 
      {
        header("location: Employeeview.php"); //redirect to employee page
      }

?>
      