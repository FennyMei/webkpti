<html>
<body>

<?php

$white="WHITELIST";
$black="BLACKLIST";
$pending="PENDING";
// $query=mysql_connect("localhost","fenny","cYWmFpr7rESR");
// mysql_select_db("fenny",$query);
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query2=mysql_query("select list from perusahaan where id_perusahaan = '$id'");
$query4=mysql_fetch_array($query2);
if($query4['list']=="BLACKLIST")
{
$query3=mysql_query("update perusahaan set list='$pending' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
if($query4['list']=="WHITELIST")
{
$query3=mysql_query("update perusahaan set list='$black' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
if($query4['list']=="PENDING")
{
$query3=mysql_query("update perusahaan set list='$white' where id_perusahaan='$id'");
header('location:perusahaan.php');
}
}
?>
</body>
</html>