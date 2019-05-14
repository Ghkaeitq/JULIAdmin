<?php include("checksession.php");?>
<?php try{$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');}
catch (Exception $e){die('Erreur : ' . $e->getMessage());}?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JULIAdmin - Logiciels</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="main">
				<div class="inner">
					<?php include("header.php");?>
						<section id="banner">
							<div class="content">
								<header>
									<p>Liste des logiciels présents dans la base</p>
								</header>
								<?php 			
									$reponse = $bdd->query('SELECT * FROM logiciels ORDER BY nom');
									?><table style="width:100%"><tr><th>ID</th><th>Nom</th><th>Version</th></tr><?php
									while ($donnees = $reponse->fetch()){
										?>
										<tr><td><?php echo $donnees['id']; ?></td><td><?php echo $donnees['nom']; ?></td><td><?php echo $donnees['version']; ?></td></tr>
										<?php
									}
									$reponse->closeCursor(); // Termine le traitement de la requête
								?>
								
								<form action="logiciel_add.php" method="post">
									<tr>
										<td><input type="submit" value="Ajouter" /></td>
										<td><input type="text" name="nomlogiciel" /></td>
										<td><input type="text" name="verlogiciel" /></td>
									</tr>
								</form>
								</table>
								<p> Supprimer un logiciel <br />
								Veuillez taper l'ID du logiciel à supprimer : </p>
								<form action="logiciel_del.php" method="post">
									<p>
										<input type="text" name="idlogiciel" />
										<input type="submit" value="Supprimer" />
									</p>
								</form>
							</div>
						</section>			
				</div>
			</div>
			<?php include("menus.php"); ?>
		</div>
	</body>
</html>
