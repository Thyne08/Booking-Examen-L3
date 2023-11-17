<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
// $sem=$_POST['sem'];
// $branch=$_POST['branch'];
$sid=$_POST['sid'];
$pas=md5($_POST['pass']);
if($name==NULL || $email==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO students(sid,name,password,email) VALUES('$sid','$name','$pas','$email')");
	if($sql)
	{
		$msg="Inscris avec succès";
	}
	else
	{
		$msg="L'utilisateur est déjà inscris";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
		<img src="images/LogoBooking1.png" alt="logo Booking">
	</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead" >Etudiant</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Nom : </td><td><input type="text" name="name" class="fields"  required="required" size="25" /></td></tr>
<tr><td class="labels">Adresse email : </td><td><input type="email" name="email" class="fields" required="required" size="25" /></td></tr>
<tr><td class="labels">Pseudo: </td><td><input type="text" name="sid" class="fields" required="required" size="25" /></td></tr>
<tr><td class="labels">Mot de passe: </td><td><input type="password" name="pass" class="fields"  required="required" size="25" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Inscription" class="fieldsBtn" /></td></tr>
</table>
</form><br />
<br />
<a href="index.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>