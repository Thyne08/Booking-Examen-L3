<?php
include("setting.php");
session_start();
if (!isset($_SESSION['sid'])) {
}
$sid = $_SESSION['sid'];
$a = mysqli_query($set, "SELECT * FROM students WHERE sid='$sid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
$date = date('d/m/Y');
$bn = $_POST['name'];
if ($bn != NULL) {
	$p = mysqli_query($set, "SELECT * FROM books WHERE id='$bn'");
	$q = mysqli_fetch_array($p);
	$bk = $q['name'];
	$ba = $q['author'];
	$sql = mysqli_query($set, "INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
	if ($sql) {
		$msg = "Ajouté avec succès";
	} else {
		$msg = "erreur, veuillez réessayer plus tard";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Application de Gestion de Bibliothèque</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="banner1">
		<img src="images/LogoBooking1.png" alt="logo Booking" style="height:100%">
	</div><br />

	<div align="center">
		<div id="wrapper1">
			<br />
			<br />

			<span class="SubHead">Selectionnez un livre</span>
			<br />
			<br />
			<form method="post" action="">
				<table border="0" class="table" cellpadding="5" cellspacing="10">
					<tr>
						<td colspan="2" align="center" class="msg"><?php echo $msg; ?></td>
					</tr>
					<tr class="SubHead1" style="text-decoration:underline;">
						<td class='SubHead1'>Nom</td>
						<td class='SubHead1'>Auteur</td>
						<td class='SubHead1'>ID</td>
					</tr>
		</div>
		<?php
		$x = mysqli_query($set, "SELECT * FROM books");
		$yo = mysqli_fetch_assoc($x);
		while ($y = mysqli_fetch_array($x)) {
		?>
			<tr class="SubHead1">
				<td class='labels'><?php echo $y['name']; ?></td>
				<td class='labels'><?php echo $y['author']; ?></td>
				<td class='labels'><?php echo $y['id']; ?> </td>
				<th><a  href="mdfbook.php?idl=<?php echo ($y['id']) ?>" class="modifierLivre" />Modifier</a></th>
				</th>
			</tr>

		<?php
		}
		?>


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