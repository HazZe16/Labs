<!DOCTYPE HTML>
<?php
session_start(); // Starting Session
require 'sql_helper.php';
if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
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
							<li><a href="Views.php">Home</a></li>
							<li><a href="search.php">Search</a></li>
							<li><a href="profile.php">Profile Page</a></li>
							<li><a href="logout.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header><h1>Search Directory</h1>
						<?php echo $_GET[message];?>
							<form action="detailedsearchresults.php" method="post" class="form-wrapper cf">
							<input id="firstname" type="text" name="firstname" Placeholder="First Name">
							<input name="submit" type='submit' value='SEARCH'>
							</form>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One /Basic Employee Options/-->
				<section id="one" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Employee</h2>
							<p>Options</p>
						</header>
						<div class="box alt">
							<div class="row uniform">
							<a href="Applicationaccess.php">	<section class="4u 6u(medium) 12u$(xsmall)">
									<img src="https://services.ushmm.org/services/Index_Files/help-desk-icon-png-5.png" height="150" width="150"></span><br></br>
									<h3>Request Access</h3>
								
								</a></section>
							<a href="search.php">	<section class="4u 6u(medium) 12u$(xsmall)">
									<img src="https://cdn0.iconfinder.com/data/icons/user-icon-profile-businessman-finance-vector-illus/100/06-1User-512.png" height="150" width="150"></span><br></br>
									<h3>Search & Edit Employee</h3>
								</a></section>
								<a href="profile.php">	<section class="4u 6u(medium) 12u$(xsmall)">
									<img src="https://cdn4.iconfinder.com/data/icons/clipboard-9/100/Resume-512.png" height="150" width="150"></span><br></br>
									<h3>View Profile</h3>
								</a></section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions">
								<li><a href="#" class="button">Back to Top</a></li>
							</ul>
						</footer>
					</div>
				</section>

			

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