<!DOCTYPE HTML>

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
							<li><a href="#two">Our Employess</a></li>
							<li><a href="#three">Contact</a></li>
							<li><a href="#five">Request a Log In</a></li>
							<li><a href="login.php" class="button special">Sign In</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>ACME WHERE EVERYONE HAS A PURPOSE!</h2>
							<p>Inspiring vision since 1908.</p>
						</header>
						<span class="image"><img src="https://media.giphy.com/media/rIz6sFp5v2GhW/giphy.gif" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One /description of Acme/-->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/main website.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u$(medium)">
									<header>
										<h2>OUR PURPOSE</h2>
										<p>VISIONS and GOALS</p>
									</header>
								</div>
								<div class="4u 12u$(medium)">
									<p>Build the best product, cause no unnecessary harm, use business to inspire and implement solutions to the environmental crisis..</p>
								</div>
								
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two /basic employee search for non-logged in users/-->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/middle website.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Meet Our Dedicated Employees</h2>
							<p>Welcome to the directory </p>
						</header>
						<p>
						Search through out our database to lists all of our loyal employees; that help the company thrive in high excellence.</p>
						<form action="detailedsearchresults.php" method="post" class="form-wrapper cf">
  						<input id="firstname" type="text" name="firstname" Placeholder="First Name" required>
						<input name="submit" type='submit' value='SEARCH'>
						</form>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/bottom website.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Contact users</h2>
							<p>Email our customer support</p>
						</header>
						<form action="mailto:support@acme.com" method="post" enctype="text/plain">
Name:<br>
<input type="text" name="name"><br>
E-mail:<br>
<input type="text" name="mail"><br>
Comment:<br>
<input type="text" name="comment" size="50"><br><br>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>.</p>
						<ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul>
					</div>
					<a href="#five" class="goto-next scrolly">Next</a>
				</section>

			<!-- Five-->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<header>
							<h2>Request Guest authentication</h2>
							<p>Request a Log in as an authenticated guest to look at directory</p>
						</header>
						<form method="post" action="#" class="container 50%">
							<div class="row uniform 50%">
								<div class="8u 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
								<div class="4u$ 12u$(xsmall)"><input type="submit" value="Request Log In" class="fit special" /></div>
							</div>
						</form>
					</div>
				</section>
				
				

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#twitter.com/acme" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
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