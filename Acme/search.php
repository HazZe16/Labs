<!DOCTYPE HTML>
<?php
session_start(); // Starting Session
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
							<li><a href="#one">Departments</a></li>
							<li><a href="#four">Edit Profile</a></li>
							<li><a href="logout.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header><h1>Search Directory</h1>
						<?php echo $_GET[message];?>
							<form action="detailedsearchresults.php" method="post">
							<input id="firstname" type="text" name="firstname" Placeholder="First Name"><br>
							<input id="lastname" type="text" name="lastname" Placeholder="Last Name"><br>
							
							<?php echo "Department: <select name=department>";
								    echo "<option name= None value=". NULL." >None</option>\n";
								  $sqlD = "SELECT * FROM Department";
    							  $resultD = mysqli_query($conn,$sqlD);
								  $i=1;
                                while($rowD=mysqli_fetch_array($resultD)) {
                                	echo "<option value=". $rowD['Did'].">".$rowD['Name']."</option>\n";
                                }
                                echo "</select>\n<br>";
                             ?>
                             
                             <?php echo "Location: <select name=location>";
                            		echo "<option name= None value=". NULL." >None</option>\n";
								  $sqlB = "SELECT * FROM Branch";
    							  $resultB = mysqli_query($conn,$sqlB);
								  $i=1;
                                while($rowB=mysqli_fetch_array($resultB)) {
                                	echo "<option value=". $rowB['Lid'].">".$rowB['Name']."</option>\n";
                                }
                                echo "</select>\n<br>";
                             ?>
                             
                             <?php echo "Role: <select name=role>";
                            		echo "<option name= None value=". NULL.">None</option>\n";
								  $sqlR = "SELECT * FROM Role";
    							  $resultR = mysqli_query($conn,$sqlR);
								  $i=1;
                                while($rowR=mysqli_fetch_array($resultR)) {
                                	echo "<option value=". $rowR['Rid'].">".$rowR['Name']."</option>\n";
                                }
                                echo "</select>\n<br>";
                             ?>
                             
                             <?php echo "Manager: <select name=manager>";
                            		echo "<option name= None value=".NULL." >None</option>\n";
								  $sqlM = "SELECT *
								  FROM $manager inner join $employee on $employee.eid = $manager.eid";
    							  $resultM = mysqli_query($conn,$sqlM);
								  $i=1;
                                while($rowM=mysqli_fetch_array($resultM)) {
                                	echo "<option value=". $rowM['Mid'].">".$rowM['Mid']."</option>\n";
                                }
                                echo "</select>\n<br>";
                             ?>
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
				</section

			

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