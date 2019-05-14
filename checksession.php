<?php
	session_start(); // On démarre la session AVANT toute chose
	if (!isset($_SESSION['idadmin'])){
		header('Location: login.php');
	}
?>