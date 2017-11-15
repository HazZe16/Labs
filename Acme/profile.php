<!DOCTYPE HTML>
<?php
    session_start();
    
    if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
    }
require "sql_helper.php";
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
							<li><a href="index.php">Directory</a></li>
							<li><a href="#one">Departments</a></li>
							<li><a href="#four">Tools</a></li>
							<li><a href="logout.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
				
					<div class="content" >
					<a>
						<img src="<?php echo 'ProfilePics/'.$_SESSION['user_picture']?> align="left" style="width:500px" style="width:500px"/></a>
						<header>
				<h2><?php echo $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'] ?></h2>
				</header>
				
				
				<p><label><?php echo $_SESSION['user_email']?></label></p>
				<p><label><?php echo $_SESSION['user_DoB']?></label></p>
				<p><label>Location</label></p>
				<p><label>Deparetment</label></p>
				<p><label><?php echo $_SESSION['user_phone']?></label></p>
				
				
				
			
				<div  align="center"> <a href="" class="button">Go Home </a> <a href="" class="button">New Search </a> </p>
						
						
						
					</div>
					
				
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
