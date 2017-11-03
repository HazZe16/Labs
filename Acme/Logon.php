<?php
session_start(); // Starting Session
require 'sql_helper.php';

if (isset($_POST['submit']))
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
    $sql = "SELECT * FROM $employee WHERE password='$password' AND username='$username'";
    echo "Running SQL $sql\n<br>";
    $result = mysqli_query($conn,$sql);
    echo mysqli_num_rows($result). " is the number of rows";
    
    if (mysqli_num_rows($result) == 1) 
    {
      $_SESSION['login_user']=$username;
      $aUser = mysqli_fetch_assoc($result);
      $_SESSION['user_ID'] = $aUser['EID'];
      $_SESSION['user_firstname'] = $aUser['FirstName'];
      $_SESSION['user_lastname'] = $aUser['LastName'];
      $_SESSION['user_branch'] = $aUser['Branch'];
      $_SESSION['user_DoB'] = $aUser['DateofBirth'];
      $_SESSION['user_department'] = $aUser['Department'];
      $_SESSION['user_emal'] = $aUser['Email'];
      $_SESSION['user_picture'] = $aUser['Picture'];
      $_SESSION['user_position'] = $aUser['position'];
      
      if ($aUser['position'] == 0) 
      {
        header("location: HRview.php"); // redirecting to admin landing page
      } 
      else 
      {
        header("location: Employeeview.php"); // redirecting to students landing page
      }  
    } 
    else 
    {
      echo "Username or Password is invalid.";
    }
    
    //mysqli_close($conn); // Closing Connection

  }
}
?>