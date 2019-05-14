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

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('DELETE FROM `logiciels` WHERE id=?');
$req->execute(array($_POST['idlogiciel']));

// Redirection du visiteur vers la page du minichat
header('Location: logiciel.php');
?>