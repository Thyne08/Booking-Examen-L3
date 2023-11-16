<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$var=$_GET['var'];
$n="SELECT * FROM students WHERE sid='$var'";
echo $n;
$a=mysqli_query($set,$n);
$b=mysqli_fetch_array($a);
$u=$b['sid'];
$sid=$b['name'];
$isbn=$b['branch'];
$name=$b['sem'];
$author=$b['password'];
$date=$b['email'];




$d="INSERT INTO `suspendu`(`sid`, `name`, `brance`, `sem`, `password`, `email`) VALUES ('$u','$sid','$isbn','$name','$bo','$date')";

$i=mysqli_query($set,$d);
echo $d;

$sql="DELETE FROM `students` WHERE `sid`='$var'";
echo $sql;
$p=mysqli_query($set,$sql);
$yo="DELETE FROM `accepter` WHERE `utilisateur`='$var'";
echo $yo;
$iu=mysqli_query($set,$yo);

header("location:pret.php");

?>