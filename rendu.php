<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$var=$_GET['var'];
$n="SELECT * FROM `accepter`  WHERE date='$var'";
echo $n;
$a=mysqli_query($set,$n);
$b=mysqli_fetch_array($a);
$u=$b['rendu'];
$yo="DELETE FROM `accepter` WHERE `date`='$var' and rendu='$u'";

echo $yo;
$iu=mysqli_query($set,$yo);

header("location:pret.php");

?>