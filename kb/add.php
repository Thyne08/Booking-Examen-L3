<?php
include("../setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$sid=$b['sid'];

$ID=$_GET['ID'];

$query = "SELECT * FROM books WHERE id=$ID";
echo $query;
$result = mysqli_query($set,$query)or die(mysqli_error($set));
$row = mysqli_fetch_assoc($result);
$rendu=$_POST['ds'];  
echo $rendu;     
$i=$row["id"];
echo $i;
$n=$row["name"];
echo $n;
$a=$row["author"];
echo $a;



$s="INSERT INTO `issue`(`sid`, `name`,isbn, `author`, `rendu`,utilisateur) VALUES ('$name','$n',$i,'$a','$rendu','$sid')";
echo $s;
mysqli_query($set,$s);
header("location:Product.php");
?>