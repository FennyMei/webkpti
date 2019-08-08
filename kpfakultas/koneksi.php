<?php
	$servername = "localhost";
	$username = "fenny"; //fenny
	$password = "cYWmFpr7rESR"; //password dari pakwilly cYWmFpr7rESR
	$dbname = "fenny";//u604461971_kpti";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>