<?php include("checksession.php");?>
<?php try{$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');}
				catch(Exception $e)
				{die('Erreur : '.$e->getMessage());}
?>
<?php	
	/* Ajoutez des entrées au tableau $softavirer pour qu'ils soient supprimés de la base */
	$softavirer = array("???????? ???????? ???????????? Microsoft Office 2013 ? ???????",
				"Test2",
				"Test1");
	foreach ($softavirer as $nomdusoft){
			$idlogavirer = $bdd->prepare('SELECT id FROM `logiciels` WHERE nom = ?');
			$idlogavirer->execute(array($nomdusoft));
			while ($idlog = $idlogavirer->fetch()){
								echo("<BR>idlog[0]" . $idlog[0]);
								$reqls = $bdd->prepare('DELETE FROM `linklogicielsalle` WHERE idlogiciel = ?');
								$reqls->execute(array($idlog[0]));
								$reql = $bdd->prepare('DELETE FROM `logiciels` WHERE id = ?');
								$reql->execute(array($idlog[0]));
			}
	}
	
	/* Cette partie vire les logiciels dont le nom est approximativement dans la base. Le '%' est un caractère Joker. Attention ! Risque de wipe de la base */
	$softavirer2 = array("lioration du produit HP",
				"Il était un putain de gros navire",
				"Bomgar Jump Client",
				"C'est à babord qu'on gueule le plus fort");
	foreach ($softavirer2 as $nomdusoft){
			$idlogavirer = $bdd->prepare('SELECT id FROM `logiciels` WHERE nom LIKE ?');
			$idlogavirer->execute(array("%".$nomdusoft."%"));
			while ($idlog = $idlogavirer->fetch()){
								echo("<BR>idlog[0]" . $idlog[0]);
								$reqls = $bdd->prepare('DELETE FROM `linklogicielsalle` WHERE idlogiciel = ?');
								$reqls->execute(array($idlog[0]));
								$reql = $bdd->prepare('DELETE FROM `logiciels` WHERE id = ?');
								$reql->execute(array($idlog[0]));
			}
	}
?>
