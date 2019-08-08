<?php
	session_start();
	include('koneksi.php');
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['id'] = $_POST['id'];

	die();
?>