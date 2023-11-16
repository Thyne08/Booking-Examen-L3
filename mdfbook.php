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
$id=$_POST['id'];
$idl=$_GET['idl'];
$bn=$_POST['name'];
$au=$_POST['auth'];
$kte=$_POST['qte'];
$genre=$_POST['genre'];
$kte=$_POST['qte'];
$desc=$_POST['desc'];
$photo=$_FILES["photo"]["name"];
$tmp_fn=$_FILES["photo"]["tmp_name"];
move_uploaded_file($tmp_fn,"./pic/$photo");
if($bn!=NULL && $au!=NULL)
{
	$r="UPDATE `books` SET `id`=$idl,`name`='$bn',`author`='$au',`genre`='genre',`qte`=$kte,`image`='$photo',Description='$desc'  WHERE id=$idl";
	
	$sql=mysqli_query($set,$r);
	$y=mysqli_fetch_assoc($sql);
	if($sql)
	{
		$msg="modifié avec succès";
	}
	else
	{
		$msg="Impossible de modifier";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="chortcut icon" href="images/logo.png" type="images/png">

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

<span class="SubHead">MODIFIER DES LIVRES</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
  /></td></tr> 
<tr><td class="labels">Nom de livre : </td><td><input type="text" name="name" placeholder="Entrer le nom de livre" size="25" class="fields" required="required" value='<?php echo($y['name'])?>'  /></td></tr>
<tr><td class="labels">Auteur : </td><td><input type="text" name="auth" placeholder="Auteur" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels"> Quantité: </td><td><input type="text" name="qte" placeholder="Quantité" size="25" class="fields" required="required"  /></td></tr>
<tr>
<td class="labels"> Genre</td>
<td>
<select name='genre'>
		
		<option value='SCIENCE' >SCIENCE</option>
		<option value='INFORMATIQUE' >INFORMATIQUE</option>
		<option value='ECONOMIE'  >ECONOMIE</option>
		<option value='Management'  >Management</option>
		<option value='Professional'  >Professional</option>
		<option value='Examen'  >Examen</option>
		<option value='Academic '  >Academic </option>
		</select>    </td>
	</tr>



<tr><td class="labels"> Image: </td><td><input type="file" name="photo" placeholder="enter une photo:" size="25" class="fields" required="required"  /></td></tr>
 <tr class="SubHead" style="text-decoration:underline;"> <th class="labels" rowspan=2
 
 span=2 rowspan=5>description </th> 
 <td colspan=4> <textarea name='desc'  rows=10 cols=90> description ou bien résume...</textarea> </td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Modifier" class="fields" /></td></tr>


</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>