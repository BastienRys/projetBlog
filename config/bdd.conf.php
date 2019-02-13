<?php

	// Tentative de connexion à la base de données
	try {

		$bdd = new PDO('mysql:host=localhost;dbname=blogdb;charset=utf8', 'bastien', 'bigslice7');
		$bdd->exec("set names utf8");
		// Attention ne pas faire ça en prod
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {

		die('Erreur : ' . $e->getMesage());
	}

?>