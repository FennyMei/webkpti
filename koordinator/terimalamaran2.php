<html>
<body>

<?php
$accept="ACCEPT";
$decline="DECLINE";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);

if ($_POST['submit'] == 'Diterima') {
    //action for update here
    if(isset($_GET['id']))
	{
		$id=$_GET['id'];

		$query3=mysql_query("update lamaran set status_registrasi='$accept' where id_lamaran='$id'");

		$dosen = $_POST['dosen'];

		$query5=mysql_query("select nim from lamaran where id_lamaran = '$id'");
		$data = mysql_fetch_array($query5);
		$nim = $data['nim'];

		$query6=mysql_query("select * from mahasiswa where dosen_pembimbing <> '$dosen' and nim='$nim'");
		$datadosen = mysql_num_rows($query6);

		if($datadosen==1){
			$query4=mysql_query("update mahasiswa set dosen_pembimbing='$dosen' where nim='$nim'");
		}
		else{
			$query4 = mysql_query("insert into mahasiswa (nim, dosen_pembimbing) values ('$nim', '$dosen')");
		}
		header('location:registrasi.php');

		}
} else if ($_POST['submit'] == 'Ditolak') {
    //action for delete
    if(isset($_GET['id']))
	{
	$id=$_GET['id'];

	$query3=mysql_query("update lamaran set status_registrasi='$decline' where id_lamaran='$id'");
	header('location:registrasi.php');

	}
}

else if ($_POST['submit'] == 'Hapus'){
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$query2=mysql_query("select * from lamaran, mahasiswa where mahasiswa.nim=lamaran.nim and id_lamaran = '$id'");
	$data = mysql_num_rows($query2);

		if($data==1){
			$data2 = mysql_fetch_array($query2);
			$nim=$data2['nim'];

			$query3=mysql_query("DELETE FROM mahasiswa WHERE nim='$nim'");

			$query4=mysql_query("DELETE FROM lamaran WHERE id_lamaran='$id'");
			header('location:registrasi.php');
		}
		else{
			$query3=mysql_query("DELETE FROM lamaran WHERE id_lamaran='$id'");
			header('location:registrasi.php');
		}
	
	}
}

?>
</body>
</html>