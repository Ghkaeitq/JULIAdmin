<?php if(empty($_SESSION)) { session_start();}?>
	<header id="header">
		<a href="index.php" class="logo"><strong>JULIAdmin</strong> Administration de JULIA</a> 
		Connecté en tant que <?php echo($_SESSION['idadmin'])?>
		<BR>
	</header>