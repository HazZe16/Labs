<!DOCTYPE HTML>
<?php
    session_start();
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
            	$id = $Suser['Eid'];
            	//for location data
            	
        		?>
					<div class="content" >
					<a>
						<img src="<?php echo 'ProfilePics/'.$Suser['Picture']; ?>" align="left" style="width:500px" style="width:500px"/></a>
						<header>
				<h2><?php echo $Suser['firstname'].' '. $Suser['lastname'];?></h2>
				</header>
				
				
				<p><label><?php echo $Suser['Email'];?></label></p>
				<?php 
				if(isset($_SESSION['login_user'])){ ?>
				<p><label><?php echo $Suser['DateofBirth'];?></label></p>
				<p><label><?php echo $S2user['Rname'];?></label></p>
				<p><label><?php echo $S2user['Lname'];?></p>
				<p><label><?php echo $S2user['Dname'];?></label></p>
				<p><label><?php echo $Suser['Phone'];?></label></p>
				<?php }
				if ($_SESSION['user_admin'] == 1) 
    				{
        			echo "<td><form action='deleteEmployee.php' method='post' class='form-wrapper cf'><button type='submit' name='deleteid' value='$selected'>Delete</button></form>";
        			echo "<td><form action='editEmployee.php' method='post' class='form-wrapper cf'><button type='submit' name='editid' value='$selected'>Edit</button></form>";
    				} 
    			if ($_SESSION['user_manager'] == 1) 
    				{
        			echo "<td><form action='ManageEmployee.php' method='post'><button type='submit' name='manageid' value='$selected'>Add under your management</button></form>";
    				} 
				?>
				
				
			
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