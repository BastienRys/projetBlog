<?php

	// On démarre la session
	session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');
  require_once('include/connexion.inc.php');
  require_once('libs/Smarty.class.php');

  // Test pour savoir si le formulaire a déjà été envoyé ?
  if (isset($_POST['submit'])) {

	// On prépare la requete de sélection
	$sql_select = "SELECT * FROM utilisateurs WHERE email = :email AND mdp = :mdp;";

	// On prépare les valeurs à insérer et on exécute la requête
	$sth = $bdd->prepare($sql_select);
	$sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$sth->bindValue(':mdp', cryptPassword($_POST['mdp']), PDO::PARAM_STR);

	$sth->execute();
	
	// On vérifie qu'il n'y a qu'une seule correspondance suite à la requête
	if ($sth->rowCount() < 1) {

	  // On créé les variables de session pour indiquer de l'échec de la connexion
	  $_SESSION['notifications']['message'] = '<b>Attention</b> problème lors de la tentative de connexion (identifiant ou mdp).';
	  $_SESSION['notifications']['alert'] = 'danger';
	  $url_redirect = 'connexion.php';

	} else {

		// Création du sid à donner au cookie et insérer dans la table
		$sid = sid($_POST['email']);

		// Insertion du sid dans la base de données
		// On prépare la requête d'insertion
		$sql_update = "UPDATE utilisateurs SET sid = :sid WHERE email = :email;";

		// On prépare les valeurs à insérer et on exécute la requête
		$sth = $bdd->prepare($sql_update);
		$sth->bindValue(':sid', $sid, PDO::PARAM_STR);
		$sth->bindValue(':email', $_POST['email']);

		$sth->execute();

		// Création du cookie
		setcookie('sid', $sid, time() + 86400);

	  // On créé les variables de session pour indiquer de la réussite de la connexion
	  $_SESSION['notifications']['message'] = '<b>Vous êtes connecté(e).</b>';
	  $_SESSION['notifications']['alert'] = 'success';
	  $url_redirect = 'index.php';
	}

	// Redirection vers la page d'accueil
	header("Location: $url_redirect");
	exit();

	// Si le formulaire n'a pas été envoyé alors on l'affiche
  } else {

  	// ** TRAITEMENT ** //
  	// Déclaration et conf de smarty
  	$smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    // On donne les variables à smarty
    if(isset($_SESSION['notifications'])) {

    	$smarty->assign('session_var', $_SESSION);

    	// On détruit la variable de session
			unset($_SESSION['notifications']);
    }

    // ** AFFICHAGE ** //
    // Insertion header et menu HTML
    include_once('include/header.inc.php');
    include_once('include/nav.inc.php');

    // Affichage de la vue connexion via smarty
    $smarty->display('connexion.tpl');

  }
  // Insertion footer HTML
  // include_once('include/footer.inc.php');
?>