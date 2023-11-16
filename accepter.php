<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$var=$_GET['var'];
$n="SELECT * FROM issue WHERE id=$var";
echo $n;
$a=mysqli_query($set,$n);
$b=mysqli_fetch_array($a);
$u=$b['utilisateur'];
$sid=$b['sid'];
$isbn=$b['isbn'];
$name=$b['name'];
$author=$b['author'];
$date=$b['date'];
$rendu=$b['rendu'];


$d="INSERT INTO `accepter`(`utilisateur`, `sid`, `isbn`, `name`, `author`, `date`, `rendu`) VALUES ('$u','$sid',$isbn,'$name','$author','$date','$rendu')";
$i=mysqli_query($set,$d);
echo $d;

$sql="DELETE FROM `issue` WHERE `id`=$var";
echo $sql;
$p=mysqli_query($set,$sql);
header("location:demandes.php");

?>