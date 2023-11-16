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
$pass=$b['password'];
$old=md5($_POST['old']);
$p1=md5($_POST['p1']);
$p2=md5($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	
}
else
{
if($old!=$pass)
{
	$msg="Ancien mot de passe incorrect";
}
elseif($p1!=$p2)
	{
		$msg="Le nouveau mot de passe ne correspond pas";
	}
	else
	{
		mysqli_query($set,"UPDATE students SET password='$p2' WHERE sid='$sid'");
		$msg="Mot de passe changé avec succès";
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

<span class="SubHead">Changer le mot de passe</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="table" align="center">
<tr><td colspan="2" class="msg" align="center"><?php echo $msg;?></td></tr>
<tr><td class="labels">Ancien mot de passe :</td><td><input type="password" name="old" size="25" class="fields" placeholder="Entrer l'ancien mot de passe" required="required" /></td></tr>
<tr><td class="labels">Nouveau mot de passe :</td><td><input type="password" name="p1" size="25" class="fields" placeholder="Enter un nouveau mot de passe" required="required"  /></td></tr>
<tr><td class="labels">Re-entrer mot de passe :</td><td><input type="password" name="p2" size="25"  class="fields" placeholder="Re-entrer le nouveau mot de passe " required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Changer mot de passe" class="fields" /></td></tr>
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