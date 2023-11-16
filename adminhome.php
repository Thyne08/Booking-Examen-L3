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
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner1">
		<img src="images/LogoBooking1.png" alt="logo Booking" style="height:100%" >
	</div>
	<br />

<div align="center">
<div id="wrapper" >
<br />
<br />

<span class="SubHead">Bienvenue <?php echo $name;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="20" width=500px>
 <tr><th colspan=6 ><h3 class='SubHead'><u>Gestion des livres:</u></h3></th></tr>
 <tr><td><a href="addBooks.php" class="Command">Ajouter des livres</a></td>
<td><a href="bookRequests.php" class="Command">Livres souhaités</a></td></tr>

<tr><td><a href="slcbook.php" class="Command">Modification des livres</a></td>
<td><a href="supprimer.php" class="Command">Supprimer des livres</a></td></tr>
</table>

<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="20" width=500px >
 <tr><th colspan=6><h3 class='SubHead'><u>Gestion des demandes:</u></h3></th></tr>

<td><a href="demandes.php" class="Command">Demandes d'emprunts</a></td>
<td><a href="pret.php" class="Command">Gestion des prêts</a></td></tr>


</table>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="20" width=500px >
<tr><th colspan=6><h3 class='SubHead'><u>Profil:</u></h3></th></tr>
<tr><td><a href="logout.php" class="Command">Se déconecter</a></td>

<td><a href="changePasswordAdmin.php" class="Command">Modifier mot de passe</a></td></tr>
</table>
<br />
<br />

</div>
</div>
</body>
</html>