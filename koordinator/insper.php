<?php
// $connection = mysqli_connect('localhost', 'fenny', 'cYWmFpr7rESR','fenny'); //The Blank string is the password
$connection = mysqli_connect('localhost', 'root', '','kpukdw');
$nama_perusahaan = $_POST['nama_perusahaan'];
$cp_perusahaan = $_POST['cp_perusahaan']; 
$telpon_perusahaan = $_POST['telpon_perusahaan'];
$alamat_perusahaan = $_POST['alamat_perusahaan'];
$provinsi_perusahaan = $_POST['provinsi_perusahaan'];
$status = $_POST['status'];
$aktif = "A";
$white = "Whitelist";
// attempt insert query execution
$sql = "INSERT INTO perusahaan (nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif, list, provinsi) VALUES ('$nama_perusahaan', '$cp_perusahaan', '$telpon_perusahaan', '$alamat_perusahaan', '$status', '$aktif','$white','$provinsi_perusahaan')";
if(mysqli_query($connection, $sql)){
    $message = "sudah di masukin";
	echo "<script type='text/javascript'>alert('$message');</script>";
} else{
    $message = "ERROR";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
 
// close connection
mysqli_close();
header('Location: perusahaan.php'); 


?>