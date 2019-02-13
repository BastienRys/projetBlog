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

    // On vérifie la validité du mot de passe
    if ($_POST['mdp'] == $_POST['mdpverif']) {

      $mdp = $_POST['mdp'];

    } else {

      // On créé les variables de session pour indiquer de l'échec de la création de l'utilisateur
      $_SESSION['notifications']['message'] = '<b>Attention</b> vous avez fait une erreur dans le mot de passe.';
      $_SESSION['notifications']['alert'] = 'warning';

      // Redirection vers la page d'accueil
      header("Location: index.php");
      exit();
    }

  	// On prépare la requete d'insertion
  	$sql_insert = "INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp);";

  	// On prépare les valeurs à insérer et on exécute la requête
  	$sth = $bdd->prepare($sql_insert);
  	$sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($mdp), PDO::PARAM_STR);

    $errorPdo = $sth->execute();
    
    if ($errorPdo == TRUE) {

      // On créé les variables de session pour indiquer de la réussite de la création de l'utilisateur
      $_SESSION['notifications']['message'] = '<b>Félicitations</b> l\'utilisateur a été créé avec succès.';
      $_SESSION['notifications']['alert'] = 'success';

    } else {

      // On créé les variables de session pour indiquer de l'échec de la création de l'utilisateur
      $_SESSION['notifications']['message'] = '<b>Attention</b> un problème est survenu lors de la création de l\'utilisateur.';
      $_SESSION['notifications']['alert'] = 'danger';
    }

   	// Redirection vers la page d'accueil
   	header("Location: index.php");
   	exit();

    // Si le formulaire n'a pas été envoyé alors on l'affiche
  } else {

    // ** TRAITEMENT ** //
    // Déclaration et configuration de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    // On donne les variables à smarty

    // ** AFFICGHAGE ** //
    // Insertion header et menu HTML
    include_once('include/header.inc.php');
    include_once('include/nav.inc.php');

    // Affichage de la vue utilisateurs via smarty
    $smarty->display('utilisateurs.tpl');

  }
  // Insertion footer HTML
  // include_once('include/footer.inc.php');
?>