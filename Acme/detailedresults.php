<!DOCTYPE HTML>
<?php
session_start();
require 'sql_helper.php';

if (isset($_POST['submit']))
{
     <?php echo 'ProfilePics/'.$row['Picture'].'.jpg'; ?>
    // Define $username and $password
    $firstname=$_POST['firstname'];

    // SQL query to fetch information of registered users and finds user match.
    $sql = "SELECT $employee.firstname, $employee.lastname, $role.name 
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $employee.firstname LIKE '%$firstname%'";
    $result = mysqli_query($conn,$sql);
    //mysqli_num_rows($result);
    //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
} else {
 echo "invalid search result, please try again";
 header("location: search.php");
}
?>
<html>
	<head>
		<title>ACME CORPORATE DIRECTORY</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css" />
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">ACME</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="search.php">Directory</a></li>
							<li><a href="#one">Departments</a></li>
							<li><a href="#four">Tools</a></li>
							<li><a href="login.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header><h1>Search Directory</h1>
										
						<form><input type="text" name="First name" Placeholder="First Name"></form>
						</header>
						<?php
                                $i=1;
                                while($row=mysqli_fetch_array($result)) 
                                {
						?>
						<li><img src="img/avatar.png" alt="Avatar" style="width:200px"><p><?php echo $row['firstname']. " ". $row['lastname']. " ". $row['name'];?></p></li>
						<?php
								$i++;								
                                }
						?>
																		
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>