<?php 
	$server="localhost";
	$username="root";
	$password="";
	$db_name="lms";
	
	$conn=mysqli_connect($server,$username,$password,$db_name);

	if (!$conn) {

		die("Connection Failed");
	}
?>