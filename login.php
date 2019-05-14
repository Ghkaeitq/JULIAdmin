<?php
session_start(); 
?>
 
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=juliadb;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Juliadmin - Login</title>
    </head>
    <body>
		
		<h1>Authentification</h1>
		<?php 
		if (isset($_SESSION['idadmin'])){
			echo 'Salut les Wallaces ! La session est en cours !<BR>';
			echo 'Cliquez <a href="index.php">ici</a> pour accéder à Juliadmin<BR>';
			echo 'Cliquez <a href="session_logout.php">la</a> pour vous déconnecter';
		}
		else{	
			// Procédure d'authentification
			echo '<p> Veuillez vous authentifier pour accéder à l administration de Julia </p>';
			?>
			<form action="session_login.php" method="post">
			<p>
				Compte administrateur <input type="text" name="nomcompte" /><BR>
				Password <input type="text" name="password" /><BR>
				<input type="submit" value="Valider" />
			</p><?php
			
			
		}
		?>



    </body>
</html>