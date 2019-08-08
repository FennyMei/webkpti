<html>
<body>
<?php
// $query=mysql_connect("localhost","fenny","cYWmFpr7rESR");
// mysql_select_db("fenny",$query);
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from perusahaan where id_perusahaan = '$id'");
$query2=mysql_query("delete from joblist where id_perusahaan = '$id'");
if($query1 && $query2)
{
header('location:perusahaan.php');
}
}
?>
</body>
</html>