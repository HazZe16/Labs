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
							<li><a href="#one">Departments</a></li>
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
							<form action="searchresults.php" method="post">
							<input id="firstname" type="text" name="firstname" Placeholder="First Name">
							<input name="submit" type='submit' value='SEARCH'>
							</form>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/main website.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u$(medium)">
									<header>
										<h2>Departments</h2>
										<ul><a href="#" class="button1">Finance</a></ul>
										<ul><a href="#" class="button2">Human Resources</a></ul>
										<ul><a href="#" class="button3">Marketing</a></ul>
										<ul><a href="#" class="button4">Faculty</a></ul>
									</header>
								</div>
								<div class="4u 12u$(medium)">
									
								</div>
								
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			
				
			

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>**************************</h2>
							<p>**************************</p>
						</header>
						<div class="box alt">
							<div class="row uniform">
							<a href="Addemployee.php">	<section class="4u 6u(medium) 12u$(xsmall)">
									<span class="icon alt major fa-area-chart"></span>
									<h3>Add New Employee</h3>
									<p>**************************.</p>
								</section>
								<section class="4u 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-comment"></span>
									<h3>Remove Current Employee</h3>
									<p>**************************.</p>
								</section>
								<section class="4u$ 6u(medium) 12u$(xsmall)">
									<span class="icon alt major fa-flask"></span>
									<h3>Edit Current Information</h3>
									<p>**************************.</p>
								</section>
								<section class="4u 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-paper-plane"></span>
									<h3>Email authentication Requests</h3>
									<p>**************************.</p>
								</section>
								<section class="4u 6u(medium) 12u$(xsmall)">
									<span class="icon alt major fa-file"></span>
									<h3>Department Access</h3>
									<p>**************************.</p>
								</section>
								<section class="4u$ 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-lock"></span>
									<h3>Security</h3>
									<p>**************************.</p>
								</section>
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