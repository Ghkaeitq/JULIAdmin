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


if (($_POST['nomlogiciel']!="") && ($_POST['verlogiciel']!="") ){
	$req = $bdd->prepare('INSERT INTO `logiciels`(`nom`, `version`) VALUES(?, ?)');
	$req->execute(array($_POST['nomlogiciel'], $_POST['verlogiciel']));
}


// Redirection vers la liste des logiciels
header('Location: logiciel.php');
?>