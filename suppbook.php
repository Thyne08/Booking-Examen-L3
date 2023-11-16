<?php
include("setting.php");
session_start();

$s=$_GET['var'];
$f="DELETE FROM `books` WHERE id=$s";
echo("$f");
$sql=mysqli_query($set,$f);
header("location:supprimer.php");

	
	?>