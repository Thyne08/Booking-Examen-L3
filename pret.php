<?php
include("setting.php");
session_start();
if (!isset($_SESSION['sid'])) {
}
$sid = $_SESSION['sid'];
$a = mysqli_query($set, "SELECT * FROM issue WHERE sid='$sid'");
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
	<title>Booking</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta charset='utf-8'>
</head>

<body>
	<div id="banner1">
		<a href="http://localhost/bibliotheque/adminhome.php"><img src="images/LogoBooking1.png" alt="logo Booking" style="height:100%"></a>
	</div><br />

	<div align="center">
		<div id="wrapper3">
			<br />
			<br />

			<span class="SubHead1">Gestion des prêts </span>
			<br />
			<br />

			<table border="0" class="table" cellpadding="10" cellspacing="10">
				<tr>
					<td colspan="2" align="center" class="msg"><?php echo $msg; ?></td>
				</tr>
				<tr>
					<td class='labels'>Etudiant</td>
					<td class='labels'>Date d'emprunt</td>
					<td class='labels'>Date de retour</td>
					<td class='labels'>Livre</td>
					<td class='labels'>Rendu</td>
					<td class='labels'>Suspendre</td>
					<td class='labels'>Contacter</td>
				<tr>

					<?php
					$x = mysqli_query($set, "SELECT * FROM accepter");


					while ($y = mysqli_fetch_assoc($x)) {
					?>
						<div>
				<tr style="color:#fff">
					<td class='infoEmprunt'> <?php echo $y['sid']; ?> </td>
					<td class='infoEmprunt'> <?php echo $y['date']; ?> </td>
					<td class='infoEmprunt'> <?php echo $y['rendu']; ?> </td>
					<td class='infoEmprunt'><?php echo $y['name'] . " " . $y['author']; ?></td>
					</td>
					</td>
					<td class='linkEmprunt'><a class='linkEmprunt' style="color:#fff;text-decoration:none;" href="rendu.php?var=<?php echo ($y['date']) ?>"><b>RENDU</b></a></td>
					<td><a class='linkEmprunt' style="color:#fff; text-decoration:none;" href="susp.php?var=<?php echo ($y['utilisateur']) ?>"><b>SUSPENDRE</b></a> </td>
					<td><a class='labels' style="color:#fff; text-decoration:none;" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm">CONTACTER</a></td>
				</tr>
			<?php
					}
			?>
		</div>
		</table>

		<br />
		<br />
		<a href="adminhome.php" class="link">Retour</a>
		<br />
		<br />

	</div>
	</div>
</body>

</html>