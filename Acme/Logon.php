<?php
session_start(); // Starting Session
require 'sql_helper.php';


if (isset($_POST['submit'])) // 
{
    
  if (empty($_POST['username']) || empty($_POST['password'])) 
  {
    echo "Username or Password is empty, please provide input for both fields.";
  } 
  else 
  {
     
    // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];

    // SQL query to fetch information of registered users and finds user match.
    $sql = "SELECT * FROM $employee WHERE password=PASSWORD('$password') AND username='$username'";
    echo "Running SQL $sql\n<br>";
    $result = mysqli_query($conn,$sql);
    echo mysqli_num_rows($result). " is the number of rows";
    
    if (mysqli_num_rows($result) == 1) 
    {
      $_SESSION['login_user']=$username;
      $aUser = mysqli_fetch_assoc($result);
      $_SESSION['user_ID'] = $aUser['EID'];
      $_SESSION['user_firstname'] = $aUser['firstname'];
      $_SESSION['user_lastname'] = $aUser['lastname'];
      $_SESSION['user_branch'] = $aUser['Branch'];
      $_SESSION['user_DoB'] = $aUser['DateofBirth'];
      $_SESSION['user_department'] = $aUser['Department'];
      $_SESSION['user_email'] = $aUser['Email'];
      $_SESSION['user_phone'] = $aUser['Phone'];
      $_SESSION['user_picture'] = $aUser['Picture'];
      $_SESSION['user_admin'] = $aUser['admin'];
      $_SESSION['user_manager'] = $aUser['manager'];
        
      
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
    } 
    else 
    {
      header("location: login.php?message=Username%20or%20Password%20is%20invalid.");
    }
    
    //mysqli_close($conn); // Closing Connection

  }
}
?>
