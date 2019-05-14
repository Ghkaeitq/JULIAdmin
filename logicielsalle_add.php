<?php include("checksession.php");?>
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if (($_POST['idlogiciel']!="") && ($_POST['idsalle']!="") ){
	$req = $bdd->prepare('INSERT INTO `linklogicielsalle`(`idsalle`, `idlogiciel`)  VALUES(?, ?)');
	$req->execute(array($_POST['idsalle'], $_POST['idlogiciel']));
}


// Redirection vers la liste des logiciels
header('Location: salledetails.php?idsalle='.$_POST['idsalle']);
?>