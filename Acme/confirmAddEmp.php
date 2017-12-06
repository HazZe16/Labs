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
<!DOCTYPE html>
<html>
    <head>
        <title>
            New User Creation Confimation
        </title>
    </head>
    <body>
        <?php
        
        $target = 'ProfilePics/';
        $target_file = $target . basename($_FILES["image"]["name"]);

		$image_text = mysqli_real_escape_string($conn, $_POST['image']);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image ";
		}
		echo $msg;
        echo $image;
        echo $image_text;
            $columns = array("firstname", "lastname", "DateofBirth", "Phone", "Email", "Username", "Password", "admin", "Manager", "Picture");
            $values = array("'".$_POST['firstname']."'", "'".$_POST['lastname']."'", "'".$_POST['DateofBirth']."'", "'".$_POST['phone']."'",
                        "'".$_POST['Email']."'", "'".$_POST['Username']."'", "PASSWORD('".$_POST['password']."')", "'".$_POST['admin']."'", "'".$_POST['manager']."'", "'".$_POST['image']."'");
            insertInto($employee, $columns, $values);
            header("location: Views.php");
        ?>
    </body>
</html>