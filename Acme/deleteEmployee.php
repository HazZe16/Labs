<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
    }
    if ($_SESSION['user_admin'] != 1) 
      {
        header("location: Views.php"); // redirecting to admin landing page
      } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Delete User
        </title>
    </head>
    <body>
        <?php
            require("sql_helper.php");
            deleteRecord($employee, $_POST['deleteid']);
        ?>
        <h3>The user record has been deleted.</h3><br /><br />
        <form action="search.php">
            <button type="submit">Return</button>
        </form>
    </body>
</html>