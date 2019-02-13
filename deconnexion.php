<?php

	// On démarre la session
	session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');
  require_once('include/connexion.inc.php');
  
  // Modification du cookie à date antérieure pour déconnexion
  setcookie('sid', '', -1);

  // Redirection vers l'accueil
  header("Location: index.php");
?>