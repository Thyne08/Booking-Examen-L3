<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="Le livre existe déjà";
	}
}
?>
<!DOCTYPE html>
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

<span class="SubHead">Livres emprunté par les étudiant</span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Nom du livre</th><th>Auteur</th><th>Emprunté par<br>ID Etudiant</th><th>Date</th><th>Rendu </th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['nom'];?></td><td><?php echo $y['auteur'];?></td><td><?php echo $y['id_etudiant'];?></td>
<td><?php echo $y['date'];?></td><td><a href="return.php?r=<?php echo $y['id'];?>" class="link">Rendu</a></td>
</tr>
<?php
}
?>
</table><br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>