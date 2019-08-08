<?php
	$servername = "localhost";
	$username = "root"; //fenny
	$password = ""; //password dari pakwilly cYWmFpr7rESR
	$dbname = "kpukdw";//u604461971_kpti"; //fenny

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>