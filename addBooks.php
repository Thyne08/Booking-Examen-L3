<?php
include("setting.php");
session_start();
if (!isset($_SESSION['aid'])) {
	header("location:index.php");
}
$aid = $_SESSION['aid'];
$a = mysqli_query($set, "SELECT * FROM admin WHERE aid='$aid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
$id = $_POST['id'];
$bn = $_POST['name'];
$au = $_POST['auth'];
$kte = $_POST['qte'];
$genre = $_POST['genre'];
$kte = $_POST['qte'];
$desc = $_POST['desc'];
$photo = $_FILES["photo"]["name"];
$tmp_fn = $_FILES["photo"]["tmp_name"];
move_uploaded_file($tmp_fn, "./pic/$photo");
if ($bn != NULL && $au != NULL) {
	$a = "INSERT INTO `books`(id,`name`, `author`, `genre`, `qte`, `image`,`Description`) VALUES ($id,'$bn','$au','$genre',$kte,'$photo','$desc')";

	$sql = mysqli_query($set, $a);

	if ($sql) {
		$msg = "Ajouté avec succès";
	} else {
		$msg = "Le livre existe déjà" . mysqli_error($set);;
	}
}
echo ($sql);
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Booking</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="chortcut icon" href="images/logo.png" type="images/png">

</head>

<body>
	<div id="banner1">
		<a href="http://localhost/bibliotheque/adminhome.php"><img src="images/LogoBooking1.png" alt="logo Booking" style="height:100%"></a>
	</div><br />

	<div align="center">
		<div id="wrapper">
			<br />
			<br />
			<span class="SubHead">AJOUTER DES LIVRES</span>
			<br />
			<br />
			<form method="post" action="" enctype="multipart/form-data">
				<table border="0" class="table" cellpadding="10" cellspacing="10">
					<tr>
						<td class="msg" align="center" colspan="2"><?php echo $msg; ?></td>
					</tr>
					<tr>
						<td class="labels">ID : </td>
						<td><input type="number" name="id"   size="25" class="fields" required="required" /></td>
					</tr>
					<tr>
						<td class="labels">Titre du livre : </td>
						<td><input type="text" name="name"  size="25" class="fields" required="required" /></td>
					</tr>
					<tr>
						<td class="labels">Auteur : </td>
						<td><input type="text" name="auth"  size="25" class="fields" required="required" /></td>
					</tr>
					<tr>
						<td class="labels"> Quantité: </td>
						<td><input type="number" name="qte"  size="25" class="fields" required="required" /></td>
					</tr>
					<tr>
						<td class="labels"> Genre</td>
						<td>
							<select name='genre'>
								<option value='ROMAN'>ROMAN</option>
								<option value='BD'>BD</option>
								<option value='COMICS'>COMICS</option>
								<option value='MANGAS'>MANGAS</option>
								<option value='SCIENCES HUMAINES'>SCIENCES HUMAINES</option>
								<option value='LIVRE SCOLAIRE'>LIVRE SCOLAIRE</option>
								<option value='LIVRE UNIVERSITAIRE'>LIVRE UNIVERSITAIRE </option>
								<option value='BIEN-ETRE'>BIEN-ETRE</option>
								<option value='PRATIQUE'>PRATIQUE</option>
								<option value='VOYAGE'>VOYAGE</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="labels"> Image: </td>
						<td><input type="file" name="photo" une photo:" size="25" class="fields" required="required" /></td>
					</tr>
					<tr>
						<td class="labels">Description: </td>
						<td colspan=4> <textarea name='desc' rows=8 cols=36 ption"></textarea> </td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Ajouter livre" class="fieldsBtn" /></td>
					</tr>
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