<!DOCTYPE HTML>
<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("Location: login.php?message=You%20need%20to%20login%20first.");
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
							<li><a href="Views.php">Directory</a></li>
							<li><a href="#one">Departments</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="logout.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
				<?php
            	require("sql_helper.php");
            	
            	$selected = $_POST['expandid'];
            	
            	//for the employee data
            	$sql = "SELECT * FROM $employee WHERE Eid ='$selected'";
            	$result = mysqli_query($conn,$sql);
            	$Suser = mysqli_fetch_assoc($result);
            	
            	//for department data
            	$sql2 = "SELECT $employee.Eid, 
            					$dep.name AS Dname,
            					$role.name AS Rname,
            					$loc.name AS Lname
    			FROM  $employee INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    							INNER JOIN $dep ON $EmpD.Did = $dep.Did
    							INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    							INNER JOIN $role ON $EmpR.Rid = $role.Rid
    							INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    							INNER JOIN Branch ON $EmpL.Lid = Branch.Lid
    			WHERE $employee.Eid = '$selected'";
    			$result2 = mysqli_query($conn, $sql2);
            	$S2user = mysqli_fetch_assoc($result2);
            	
            	//for location data
            	
        		?>
					<div class="content" >
					<a>
						<img src="<?php echo 'ProfilePics/'.$Suser['Picture'].'.jpg'; ?>" align="left" style="width:500px" style="width:500px"/></a>
						<header>
				<h2><?php echo $Suser['firstname'].' '. $Suser['lastname'];?></h2>
				</header>
				
				
				<p><label><?php echo $Suser['Email'];?></label></p>
				<p><label><?php echo $Suser['DateofBirth'];?></label></p>
				<p><label><?php echo $S2user['Rname'];?></label></p>
				<p><label><?php echo $S2user['Lname'];?></p>
				<p><label><?php echo $S2user['Dname'];?></label></p>
				<p><label><?php echo $Suser['Phone'];?></label></p>
				
				
				
			
				<div  align="center"> <a href="Views.php" class="button">Go Home </a> <a href="search.php" class="button">New Search </a> </p>
						
						
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