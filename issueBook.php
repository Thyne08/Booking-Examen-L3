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
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="erreur, veuillez réessayer plus tard";
	}
}
?>
<!DOCTYPE html>
<html>
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
<table border="0" class="table" cellpadding="10" cellspacing="10">
<span class="SubHead">RECHERCHE: </span>
<input  class='fields'type="search" >

<button class='fields'>Rechercher</button>
	<br><br>
</table>
</div>
<div id="wrapper">
<span class="SubHead">Emprunter livre</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Livre : </td><td><select name="name" class="fields" required >
<option  value="" disabled="disabled" selected="selected"> - - Selectionnez un livre - - </option>
<?php
$x=mysqli_query($set,"SELECT * FROM books ");
while($y=mysqli_fetch_array($x))
{
	?>
<option value="<?php echo $y['id'];?>" style='color:black'><?php echo $y['name']." ".$y['author'];?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Emprunter" class="fields" /></td></tr>
</table>
</form>
<br />
<br />

<br />
<a href="home.php" class="link">Retour</a>
<br />
<br />

</div>





<div id="wrapper">


<span class="SubHead">Science</span>
<?php $s="SELECT * FROM `books` WHERE `genre`='SCIENCE'";
	$l=mysqli_query($set,$s); ?>
      

        <?php while($ro= mysqli_fetch_assoc($l)){?> 
     
	  <table border="0" class="table" cellpadding="10" cellspacing="10">
	<tr class="labels" style="text-decoration:underline;">
		<tr><td>
              <img height=100px src="./pic/<?php echo $ro['image']; ?>">
           </td> </tr>
		
           <tr><td ><div align=center
		><a class="Link" <?php echo $ro['author']; ?>"> auteur: <?php echo $ro['author']; ?></a>
		</div></td></tr>
		
		
		<td ><div align=center
		><a  href="empr.php?isbn=<?php echo $ro['id']; ?>" class="link">emprunter</a>
		</div></td></tr>
		
		
          </table><br><br>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
		}
	
		  ?>

<div id="wrapper">


<span class="SubHead">Economie</span>
<?php $s="SELECT * FROM `books` WHERE `genre`='ECONOMIE'";
	$l=mysqli_query($set,$s); ?>
      

        <?php while($ro= mysqli_fetch_assoc($l)){?> 
     
	  <table border="0" class="table" cellpadding="10" cellspacing="10">
	<tr class="labels" style="text-decoration:underline;">
		
           <tr><td ><div align=center
		><a  href="book.php?bookisbn=<?php echo $ro['author']; ?>"> auteur: <?php echo $ro['author']; ?></a>
		</div></td></tr>
		
		
		<td ><div align=center
		><a  href="empr.php?isbn=<?php echo $ro['id']; ?>" class="link">emprunter</a>
		</div></td></tr>
		
		
		<tr><td>
              <img height=100px src="./pic/<?php echo $ro['image']; ?>">
           </td> </tr>
          </table><br><br>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
		}
	
		  ?>

</div>
<div id="wrapper">


<span class="SubHead">Informatique</span>
<?php $s="SELECT * FROM `books` WHERE `genre`='INFORMATIQUE'";
	$l=mysqli_query($set,$s); ?>
      

        <?php while($ro= mysqli_fetch_assoc($l)){?> 
     
	  <table border="0" class="table" cellpadding="10" cellspacing="10">
	<tr class="labels" style="text-decoration:underline;">
		<tr><td>
              <img height=100px src="./pic/<?php echo $ro['image']; ?>">
           </td> </tr>
		
           <tr><td ><div align=center
		><a  href="book.php?bookisbn=<?php echo $ro['author']; ?>"> auteur: <?php echo $ro['author']; ?></a>
		</div></td></tr>
		
		<td ><div align=center
		><a  href="empr.php?isbn=<?php echo $ro['id']; ?>" class="link">emprunter</a>
		</div></td></tr>

          </table><br><br>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
		}
	
		  ?>
		  
		  
		  </div>
		  
		  <div id="wrapper">



		  </div>  <div id="wrapper">
	<span class="SubHead"> Autre</span>
<?php $s="SELECT * FROM `books` WHERE `genre`='AUTRE'";
	$l=mysqli_query($set,$s); ?>
      

        <?php while($ro= mysqli_fetch_assoc($l)){?> 
     
	  <table border="0" class="table" cellpadding="10" cellspacing="10">
	<tr class="labels" style="text-decoration:underline;">
		
           <tr><td ><div align=center
		><a  href="book.php?bookisbn=<?php echo $ro['author']; ?>"><?php echo $ro['author']; ?></a>
		</div></td></tr>
		<td ><div align=center
		><a  href="empr.php?isbn=<?php echo $ro['id']; ?>" class="link">emprinter</a>
		</div></td></tr>
		
		<tr><td>
              <img height=100px src="./pic/<?php echo $ro['image']; ?>">
           </td> </tr>
          </table><br><br>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
		}
	
		  ?>
		  </div>
</body>
</html>