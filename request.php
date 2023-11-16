<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$ba=$_POST['author'];
if($bn!=NULL && $ba!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
	if($sql)
	{
		$msg="Demandé avec succès";
	}
	else
	{
		$msg="Le livre existe déjà";
	}
}
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Application de Gestion de Bibliothèque</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">ECOLE SUPERIEUR DE TECHNOLOGIE</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Demander des livres</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">livre : </td><td><input type="text" size="25" class="fields" required="required" name="name" placeholder="Entrer le nom de livre" /></td></tr>
<tr><td class="labels">Auteur : </td><td><input type="text" size="25" class="fields" required="required" name="author" placeholder="Enter le nom de l'auteur" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Demander" /></td></tr>
</table>
</form>

<br />
<br />
<a href="kb/empr.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>