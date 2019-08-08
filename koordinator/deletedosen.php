<html>
<body>
<?php
// $query=mysql_connect("localhost","fenny","cYWmFpr7rESR");
// mysql_select_db("fenny",$query);
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['dosen_pembimbing']))
{
$dosenpembimbing=$_GET['dosen_pembimbing'];
$query1=mysql_query("delete from dosen where dosen_pembimbing = '$dosenpembimbing'");
if($query1)
{
header('location:managedosen.php');
}
}
header('location:managedosen.php');
?>
</body>
</html>