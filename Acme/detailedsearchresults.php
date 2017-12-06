<!DOCTYPE HTML>
<?php
session_start();
require 'sql_helper.php';

if (isset($_POST['submit']))
{
  $firstname=$_POST['firstname'];
  $lastname= $_POST['lastname'];
  $department= $_POST['department'];
  $location= $_POST['location'];
  $rol= $_POST['role'];
  $man= $_POST['manager'];
  
  
  
  //Full Search
  if ($firstname != "" and $lastname != "" and $department != NULL and $location != NULL and $rol != NULL and $man != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $EmpM.Mid = '$man' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } 
 //Quintuple search
   elseif ($firstname != "" and $lastname != "" and $department != NULL and $location != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $department != NULL and $location != NULL and $man != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $EmpM.Mid = '$man' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $department != NULL and $man != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $man != NULL and $location != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $man != NULL and $department != NULL and $location != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($man != NULL and $lastname != "" and $department != NULL and $location != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%'";
    		 $result = mysqli_query($conn,$sql);
 }
 //Quad Search
   elseif ($firstname != "" and $lastname != "" and $department != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $department != NULL and $man != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $man != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $man != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $role.Rid = '$rol' AND $EmpM.Mid = '$man' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL and $man != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $rol != NULL and $man != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $rol.Rid = '$role' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL and $man != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $role.Rid = '$rol' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL and $man != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $rol != NULL and $man != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $EmpM.Mid = '$man' AND $rol.Rid = '$role' AND $employee.lastname LIKE '$lastname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL and $man != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $role.Rid = '$rol' AND $EmpM.Mid = '$man' AND $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $department != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $rol.Rid = '$role' AND $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $location != NULL and $rol != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $rol.Rid = '$role' AND $loc.Lid = '$location' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $rol != NULL and $department != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $rol != NULL and $department != NULL and $location != NULL) {
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%'";
    		 $result = mysqli_query($conn,$sql);
 }
 //Triple search
   elseif ($firstname != "" and $lastname != "" and $department != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.firstname LIKE '$firstname%' AND $dep.Did = '$department' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $location != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.firstname LIKE '$firstname%' AND $loc.Lid = '$location' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $rol != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.firstname LIKE '$firstname%' AND $role.Rid = '$rol' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.lastname LIKE '$lastname%' AND $dep.Did = '$department' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $location != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.lastname LIKE '$lastname%' AND $loc.Lid = '$location' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $rol != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.lastname LIKE '$lastname%' AND $role.Rid = '$rol' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($location != NULL and $department != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $loc.Lid = '$location' AND $dep.Did = '$department' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($rol != NULL and $location != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $role.Rid = '$rol' AND $loc.Lid = '$location' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($rol != NULL and $department != NULL and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
						   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $dep.Did = '$department' AND $loc.Lid = '$location' AND $EmpM.Mid = '$man'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL and $location != NULL) { 
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $dep.Did = '$department' AND $loc.Lid = '$location' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL and $rol != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $dep.Did = '$department' AND $role.Rid = '$rol' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $rol != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "" and $location != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $loc.Lid = '$location' AND $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $rol != NULL and $location != NULL) { 
	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $role.Rid = '$rol' AND $loc.Lid = '$location' AND $employee.firstname LIKE '$firstname%'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL and $location != NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $loc.Lid = '$location'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $rol != NULL and $location != NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $role.Rid = '$rol' AND $employee.lastname LIKE '$lastname%' AND $loc.Lid = '$location'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL and $rol != NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $dep.Did = '$department' AND $employee.lastname LIKE '$lastname%' AND $rol.Rid = '$rol'";
    		 $result = mysqli_query($conn,$sql);
 } elseif ($rol != NULL and $department != NULL and $location != NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE $dep.Did = '$department' AND $role.Rid = '$rol' AND $loc.Lid = '$location'";
    		 $result = mysqli_query($conn,$sql);
 }
 //Double Search
   elseif ($firstname != "" and $location !=  NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $loc.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $employee.firstname LIKE '$firstname%' AND $loc.Lid = '$location'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $location !=  NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $loc.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $employee.lastname LIKE '$lastname%' AND $loc.Lid = '$location'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($department != NULL and $location !=  NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $loc.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $dep.Did = '$department' AND $loc.Lid = '$location'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $department != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $employee.firstname LIKE '$firstname%' AND $dep.Did = '$department'";
    $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.firstname LIKE '$firstname%' AND $EmpM.Mid = '$man'";
    $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $man != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $employee.lastname LIKE '$lastname%' AND $EmpM.Mid = '$man'";
    $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $department != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $employee.lastname LIKE '$lastname%' AND $dep.Did = '$department'";
    $result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $lastname != "") {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $employee.lastname LIKE '$lastname%' AND $employee.firstname LIKE '$firstname%'" ;
    		$result = mysqli_query($conn,$sql);
 } elseif ($firstname != "" and $rol != NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $role.Rid = '$rol' AND $employee.firstname LIKE '$firstname%'" ;
    		$result = mysqli_query($conn,$sql);
 } elseif ($lastname != "" and $rol != "") {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $employee.lastname LIKE '$lastname%' AND $role.Rid = '$rol'" ;
    		$result = mysqli_query($conn,$sql);
 } elseif ($department != NULL and $rol !=  NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    				   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    				   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE  $dep.Did = '$department' AND $role.Rid = '$rol'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($department != NULL and $man !=  NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    				   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    				   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    				   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    				   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE  $dep.Did = '$department' AND $EmpM.Mid = '$man'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($location != NULL and $man !=  NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    				   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    				   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    				   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    				   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $loc.Lid = '$location' AND $EmpM.Mid = '$man'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($man != NULL and $rol !=  NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    				   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    				   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE  $EmpM.Mid = '$man' AND $role.Rid = '$rol'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($rol != NULL and $location !=  NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    				   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    				   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $role.Rid = '$rol' AND $loc.Lid = '$location'";
    		$result = mysqli_query($conn,$sql);
 } 
 // Single Search
   elseif ($firstname!= ""){
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $employee.firstname LIKE '%$firstname%'";
    $result = mysqli_query($conn,$sql);
 } elseif ($lastname != "") {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $employee.lastname LIKE '%$lastname%'";
    $result = mysqli_query($conn,$sql);
 } elseif ($department != NULL) {
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name, $dep.Name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpD ON $EmpD.Eid = $employee.Eid 
    					   INNER JOIN $dep ON $EmpD.Did = $dep.Did
    		WHERE $dep.Did = '$department'";
    $result = mysqli_query($conn,$sql);
 } elseif ($location != NULL) {
  	 $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $loc.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpL ON $EmpL.Eid = $employee.Eid
    					   INNER JOIN Branch ON $EmpL.Lid = $loc.Lid
    		WHERE  $loc.Lid = '$location'";
    		$result = mysqli_query($conn,$sql);
 } elseif ($rol != NULL){
    $sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $EmpR INNER JOIN $employee ON $EmpR.Eid = $employee.Eid 
    				   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    		WHERE $role.Rid = '$rol'";
    $result = mysqli_query($conn,$sql);
 } elseif ($man != NULL) {
 	$sql = "SELECT $employee.Eid, $employee.Picture, $employee.firstname, $employee.lastname, $role.name
    		FROM $employee INNER JOIN $EmpR ON $EmpR.Eid = $employee.Eid 
    					   INNER JOIN $role ON $EmpR.Rid = $role.Rid
    					   INNER JOIN $EmpM ON $EmpM.Eid = $employee.Eid 
    					   INNER JOIN $manager ON $manager.Mid = $EmpM.Mid
    		WHERE $EmpM.Mid = '$man'";
    $result = mysqli_query($conn,$sql);
 } else {
 echo "invalid search result, please try again";
 header("location: search.php?message=Invalid%20search%20please%20give%20more%20details.");
}
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
							<li><a href="HRview.php">Options</a></li>
							<li><a href="login.php" class="button special">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header><h1>Search Directory</h1>
						
						</header>
						<?php
                                $i=1;
                                while($row=mysqli_fetch_array($result)) 
                                {
						?>
						<li><img src="<?php echo 'ProfilePics/'.$row['Picture']; ?>" style="width:200px">
						<p><?php echo $row['firstname']. " ". $row['lastname']. " ". $row['name'];?></p></li>
						<?php
						$id = $row['Eid'];
                	    echo "<td><form action='results.php' method='post'><button type='submit' name='expandid' value='$id'>Expand</button></form>";
								$i++;								
                                }
						?>
																		
					<a href="search.php">Search Again</a>
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