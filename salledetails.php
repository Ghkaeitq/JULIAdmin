<?php include("checksession.php");?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JULIAdmin - Detail d'une salle</title>
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
							<?php if (isset($_GET['idsalle']) && ($_GET['idsalle'])!=""){
									try
									{$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');}
									catch(Exception $e)
									{die('Erreur : '.$e->getMessage());}
									$info = $bdd->prepare('
											SELECT * FROM salle  
											WHERE id = ?');
									$info->execute(array($_GET['idsalle']));
									$infosalle = $info->fetch();								
									?>
								<header>
									<h1><?php echo ($infosalle['nom']);?></h1>									
								</header>
								<H2>Informations de <?php echo ($infosalle['nom']);?></H2>
								<form method="post" action="salle_update.php">
									<input type="hidden" name="id" value="<?php echo($infosalle['id']);?>"/>
									<table style="width:100%">
									<tr><td>Nom de la salle </td><td><input type="text" name="nomsalle" value="<?php echo ($infosalle['nom']);?>"/></td></tr>
									<tr><td>Nombre de postes </td><td><input type="text" name="nbpostes" value="<?php echo ($infosalle['nbpostes']);?>"/></td></tr>
									<tr><td>Bâtiment </td><td>
										<select name="batiment">
											<?php 
												$reqbat = $bdd->query('SELECT * FROM batiment');
												while ($listbat = $reqbat->fetch()){
												?>
												<option value="<?php echo $listbat['id']; ?>" 
													<?php if($listbat['id']==$infosalle['idbatiment']){echo ('selected="selected"');}?> 
												><?php echo $listbat['nom']; ?></option>
												<?php
												}
												$reqbat->closeCursor(); // Termine le traitement de la requête
											?>
										</select>
									</td></tr>
									<tr><td>Commentaires </td><td><input type="text" name="commentaire" value="<?php echo ($infosalle['commentaire']);?>"/></td></tr>									
									</table>
									
									<input type="submit" value="Mettre à jour les informations de <?php echo ($infosalle['nom']);?>" />
								</form>
								<BR><BR><BR>
								<h2> Liste des logiciels </h2>
										<?php							
																												
										$req = $bdd->prepare('
											SELECT l.id as idlogiciel, l.nom, l.version FROM linklogicielsalle ls 
											INNER JOIN logiciels l ON ls.idlogiciel=l.id
											WHERE idsalle = ?');
										$req->execute(array($_GET['idsalle']));
										
											?><table style="width:100%"><tr><th>Nom</th><th>Version</th></tr><?php
											while ($donnees = $req->fetch()){
												?><tr><td><?php echo $donnees['nom']; ?></td><td><?php echo $donnees['version']; ?></td></tr><?php
											}
											$req->closeCursor(); // Termine le traitement de la requête
											$info->closeCursor();
										?>
										</table>
									<HR>	
									<p> Ajoutez un logiciel dans la salle : 
										<form method="post" action="logicielsalle_add.php">
										<input type="hidden" name="idsalle" value="<?php echo($infosalle['id']);?>"/>
										<select name="idlogiciel">
											<?php 
												$reqsoftw = $bdd->query('SELECT * FROM logiciels');
												while ($listsoftw = $reqsoftw->fetch()){
												?>
												<option value="<?php echo $listsoftw['id']; ?>"><?php echo ($listsoftw['nom'].' (version '. $listsoftw['version'].')'); ?></option>
												<?php
												}
												$reqbat->closeCursor(); // Termine le traitement de la requête
											?>
											
										</select>
										<input type="submit" value="Ajouter le logiciel dans la salle" />
										</form>
									</p>
									<HR>
									<p> Ou utilisez une liste de logiciels au format CSV (Extraction PDQ)
										<form action="ls_import.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="idsalle" value="<?php echo($infosalle['id']);?>"/>
											<input type="file" name="datacsv" accept=".csv" />
											<input type="submit" value="Envoyer le fichier">
										</form>
									</p>
									<?php									
							}?>
							</div>
						</section>			
				</div>
			</div>
			<?php include("menus.php"); ?>
		</div>
	</body>
</html>