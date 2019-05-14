<?php include("checksession.php");?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JULIAdmin</title>
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
									<h1>Administration de JULIA</h1>
									<p>Explications rapides</p>
								</header>
								<p>JULIA est un site de référencements de logiciels installés dans les salles pédagogiques. Il est conçu pour être utilisé par les administratifs, les enseignants et les étudiants. 
								Il est alimenté par les équipes de Gestion de parc qui gèrent les ordinateurs des différentes salles </p>
								
								<p>En tant qu'administrateur, vous avez toute liberté de référencer de nouvelles salles, de nouveaux logiciels, et d'éditer l'existant. 
								Si un logiciel est introuvable dans l'interface de gestion de salle, n'hésitez pas à le rajouter dans la base.
								</p>
								
								<p>Notez que la liste de logiciels concerne tout l'UGA, et n'est pas limité à une composante. 
								De fait, si vous n'utilisez plus un logiciel, vérifier que personne d'autre ne l'utilise avant de vouloir le supprimer de la base.
								Les droits d'administrations ne sont actuellement pas limités à une composante.</p>
								
								<p> Pour toute demande de création de compte administrateur, question, suggestion ou en cas de problème, n'hésitez pas à contacter l'administrateur de JULIA.</p>
								<p> Bonne journée !</p>
							</div>
						</section>			
				</div>
			</div>
			<?php include("menus.php"); ?>
		</div>
	</body>
</html>
