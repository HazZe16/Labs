<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("Location: index.php?message=You%20need%20to%20login%20first.");
    }
    if ($_SESSION['user_admin'] != 1) 
      {
        header("location: Views.php"); // redirecting to admin landing page
      } 
       $selected = $_SESSION['edit'];
						
		echo $selected;
            require("sql_helper.php");
            $columnD = array("Did", "Eid");
            $columnR = array("Rid", "Eid");
            $columnB = array("Lid", "Eid");
            $columnM = array("Mid", "Eid");
            
            $valueD = array("'".$_POST['department']."'","'".$selected."'");
            $valueR = array("'".$_POST['role']."'","'".$selected."'");
            $valueB = array("'".$_POST['location']."'","'".$selected."'");
            $valueM = array("'".$_POST['manager']."'","'".$selected."'");
            insertInto($EmpD, $columnD, $valueD);
            insertInto($EmpR, $columnR, $valueR);
            insertInto($EmpL, $columnB, $valueB);
            insertInto($EmpM, $columnM, $valueM);
            header("location: Views.php");
?>