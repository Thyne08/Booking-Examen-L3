<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM issue WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
$var=$_GET['var'];
$sql="DELETE FROM `issue` WHERE `id`=$var";
echo $sql;
$p=mysqli_query($set,$sql);
header("location:demandes.php");

?>