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
echo ($_POST['id']);
echo ('<BR/>');
echo ($_POST['nomsalle']);
echo ('<BR/>');
echo ($_POST['nbpostes']);
echo ('<BR/>');
echo ($_POST['commentaire']);
if (($_POST['id']!="") && ($_POST['nomsalle']!="") && ($_POST['nbpostes']!="") && ($_POST['batiment']!="")){
	$req = $bdd->prepare('UPDATE `salle` SET `nom`=?,`nbpostes`=?,`idbatiment`=?,`commentaire`=? WHERE id=?');
	$req->execute(array($_POST['nomsalle'], $_POST['nbpostes'], $_POST['batiment'], $_POST['commentaire'], $_POST['id']));
}

header('Location: salledetails.php?idsalle='.$_POST['id']);
?>