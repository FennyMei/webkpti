<?php
session_start();
require_once("../koneksi.php");


if(isset($_POST["submit"])) {
	$dosenpembimbing=$_POST['dosen_pembimbing'];
	$nama=$_POST['nama'];
	$status=$_POST['status'];
	$sql = "INSERT INTO dosen(dosen_pembimbing, nama, status)
	VALUES('".$dosenpembimbing."','".$nama."','".$status."')";
	$conn->query($sql);
	header("location: managedosen.php");
}

?>