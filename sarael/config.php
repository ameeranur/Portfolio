<?php
	
	$hostname = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$dbname   = "sarael";
	 
	
	$con = new mysqli($hostname, $username, $password, $dbname); 
	 

	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
?>