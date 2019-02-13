<?php

	// On démarre la session
	session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/connexion.inc.php');
  require_once('libs/Smarty.class.php');

  // Test pour savoir si le formulaire a déjà été envoyé
  // ******************* TEST FORMULAIRE ******************* //
  if (isset($_POST['submit'])) {

  	// On prépare la requête de suppression
  	$sql_delete_article = "DELETE FROM articles WHERE id = :id LIMIT 1;";

  	// On prépare les valeurs dans la requête et on l'éxécute
	  $sth = $bdd->prepare($sql_delete_article);
	  $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

  	$errorPdoArt = $sth->execute();

    // On supprime également les commentaires associés
    $sql_delete_comm = "DELETE FROM commentaires WHERE id = :id;";

    // On prépare les valeurs dans la requête et on l'éxécute
    $sth = $bdd->prepare($sql_delete_comm);
    $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

    $errorPdoComm = $sth->execute();
	    
	  if ($errorPdoArt == TRUE && $errorPdoComm == TRUE) {

		  // On créé les variables de session pour indiquer de la réussite de la suppression d'article
			$_SESSION['notifications']['message'] = '<b>Félicitations</b> votre article a été supprimé avec succès.';
			$_SESSION['notifications']['result'] = TRUE;
			$_SESSION['notifications']['alert'] = 'success';
	   	
	  } else {

		  // On créé les variables de session pour indiquer de l'échec de la suppression d'article
			$_SESSION['notifications']['message'] = '<b>Attention</b> un problème est survenu lors de la suppression de l\'article.';
			$_SESSION['notifications']['result'] = TRUE;
			$_SESSION['notifications']['alert'] = 'danger';
	  
	  }

	  // Redirection vers la page d'accueil
   	header("Location: index.php");
   	exit();

   	// Si le formulaire n'a pas été envoyé alors on l'affiche
  } else {

  	// ** TRAITEMENT ** //
  	// Déclaration et conf de smarty
  	$smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    // On donne les variables à smarty
    $smarty->assign('id', $_GET['id']);
    $smarty->assign('is_connect', $is_connect);

    // ** AFFICHAGE ** //
    // Insertion header et menu HTML
    include_once('include/header.inc.php');
    include_once('include/nav.inc.php');

    // Affichage de la vue connexion via smarty
    $smarty->display('supprimer.tpl');

  }
  // Insertion footer HTML
  // include_once('include/footer.inc.php');
?>