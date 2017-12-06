<!DOCTYPE HTML>
<?php
session_start();
    if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
    }
    else if(isset($_SESSION['admin'])){
        header("Location: profile.php");
    }
require 'sql_helper.php';
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
							<li><a href="Views.php">Options</a></li>
							<li><a href="profile.php">Edit Profile</a></li>
							<li><a href="logout.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header><h1>Add Employee</h1>
						<form action="confirmAddEmp.php" method="post">
						<p><label>Profile Picture <input type="file" accept="image/jpeg, image/jpg, image/png" name="image"></label></p>	
						<p><label>First name <input type="text" name="firstname"></label></p>
						<p><label>Last name <input type="text" name="lastname"></label></p>
						<p><label>Date of Birth <input type="text" name="DateofBirth" placeholder='MM/DD/YYYY'></label></p>
						<p><label>Phone <input type="text" name="phone" placeholder='###-###-####'></label></p>
						<p><label>Email <input type="text" name="Email"></label></p>
						<p><label>Username Placeholder <input type="text" name="Username"></label></p>
						<p><label>Password Placeholder <input type="text" name="password"></label></p>
						<p>Admin: <input type="radio" name="admin" id="a1" value=1>  <label for="a1"><span></span>Yes</label>
        						<input type="radio" name="admin" id="a2" value=0> <label for="a2"><span></span>No</label></p>
						<p>Manager: <input type="radio" name="manager" id="r1" value=1> <label for="r1"><span></span>Yes</label>
        						<input type="radio" name="manager" id="r2" value=0><label for="r2"><span></span>No</label></p>
        			<?php
        						foreach ($_POST as $key => $value)
        				{
           				 echo '<input type="hidden" name="', $key,'" value="', $value,'"> ';
       					 }
       					?>
					<button type='submit' method='post'>Add Employee</button>
					</form>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				
				
			

			<

			

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; ACME. All rights reserved.</li>
					</ul>
				</footer>

		</div>

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