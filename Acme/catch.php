<?php
session_start(); // Starting Session
require 'sql_helper.php';

if (isset($_POST['submit']))
{
    
  if (empty($_POST['firstname']) || empty($_POST['lastname'])) 
  {
    echo "Username or Password is empty, please provide input for both fields.";
  } 
  else 
  {
     
    // Define $username and $password
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];

    // SQL query to fetch information of registered users and finds user match.
    $sql = "SELECT * FROM $employee WHERE firstname='$firstname' AND lastname='$lastname'";
    echo "Running SQL $sql\n<br>";
    $result = mysqli_query($conn,$sql);
    echo mysqli_num_rows($result). " is the number of rows";
    
    if (mysqli_num_rows($result) == 1) 
    {
      $_SESSION['login_user']=$username;
      $search = mysqli_fetch_assoc($result);
      $_SESSION['user_ID'] = $search['EID'];
      $_SESSION['user_firstname'] = $search['FirstName'];
      $_SESSION['user_lastname'] = $search['LastName'];
    } 
    
    header("location: searchresults.php");
    
    //mysqli_close($conn); // Closing Connection

  }
}
?>