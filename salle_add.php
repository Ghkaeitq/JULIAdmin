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


if (($_POST['nomsalle']!="") && ($_POST['nbpostes']!="") && ($_POST['batiment']!="") && ($_POST['commentaire']!="") ){
	$req = $bdd->prepare('INSERT INTO `salle`(`nom`, `nbpostes`,`idbatiment`, `commentaire`) VALUES(?, ?, ?, ?)');
	$req->execute(array($_POST['nomsalle'], $_POST['nbpostes'], $_POST['batiment'], $_POST['commentaire']));
}


// Redirection vers la liste des logiciels
header('Location: salle.php');
?>