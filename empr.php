<?php
include("setting.php");
session_start();

$s=$_GET['isbn'];
$f="INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')";

$sql=mysqli_query($set,$f);
header("location:issueBook.php");

	
	?>