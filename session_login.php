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


if (($_POST['nomcompte']!="") && ($_POST['password']!="") ){
	//SELECT * FROM `admin` WHERE nom = 'John';
	$req = $bdd->prepare('SELECT * FROM `admin` where nom=? and password =?');
	$req->execute(array($_POST['nomcompte'],$_POST['password']));
	if ($req->fetch()){
		echo('u win the game !');
		session_start();
		$_SESSION['idadmin'] = $_POST['nomcompte'];
	}
}


// Redirection vers la liste des logiciels
header('Location: login.php');
?>