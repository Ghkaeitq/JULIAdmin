<?php include("checksession.php");?>
		<?php
			if(isset($_FILES['datacsv'])){
				//Telechargement du fichier 
				$errors= array();
				$file_name = $_FILES['datacsv']['name'];
				$file_tmp =$_FILES['datacsv']['tmp_name'];
				$file_size =$_FILES['datacsv']['size'];
				$file_type=$_FILES['datacsv']['type'];			
				if($file_size > 209715200){
					$errors[]='Fichier trop volumineux pour être honnête';
				}
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,'import.csv');
					echo "Success";
				}else{
					print_r($errors);
				}

				// Connexion BDD
				try{$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');}
				catch(Exception $e)
				{die('Erreur : '.$e->getMessage());}
				
				//Ouverture du fichier et Maj BDD
				$handle = fopen('import.csv', 'r+');
				if ($handle) {
					if (($line = fgetcsv($handle,10000,";")) !== false){} // Suppression de la première ligne du csv 
					while (($line = fgetcsv($handle,10000,";")) !== false) {
							$reqlog = $bdd->prepare('INSERT IGNORE INTO `logiciels`(`nom`, `version`) VALUES(?, ?)');
							$reqlog->execute(array($line[0], $line[1]));
							$reqidlog = $bdd->prepare('SELECT id FROM logiciels WHERE nom=? AND version=?');
							$reqidlog->execute(array($line[0], $line[1]));
							while ($idlog = $reqidlog->fetch()){
								$reqls = $bdd->prepare('INSERT INTO `linklogicielsalle`(`idsalle`, `idlogiciel`) VALUES (?,?)');
								$reqls->execute(array($_POST['idsalle'], $idlog[0]));
							}
					}
					fclose($handle);
				} else {
					echo("Erreur à l'ouverture du fichier");
				} 
			}
		?>
		<?php include("cleandb.php");?> <!-- Supprime les entrées de merde de PDQ !-->
<?php header('Location: salledetails.php?idsalle='.$_POST['idsalle']);?>