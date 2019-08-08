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
$query1=mysql_query("delete from joblist where id_job = '$id'");
if($query1)
{
header('location:deletejoblist.php');
}
}
header('location:deletejoblist.php');
?>
</body>
</html>