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

  	// En fonction de la valeur du bouton submit
  	// S'il s'agit d'une modification d'article
  	// ******************* MODIF ******************* //
  	if($_POST['submit'] == 2) {

  		require_once('include/modif.art.inc.php');

  		// S'il s'agit d'un ajout d'article
  		// ******************* AJOUT ******************* //
  	} else if($_POST['submit'] == 1) {

  		require_once('include/ajout.art.inc.php');
  	}

   	// Redirection vers la page d'accueil
   	header("Location: index.php");
   	exit();

    // Si le formulaire n'a pas été envoyé alors on l'affiche
  } else {

  	// S'il s'agit d'une modification d'article
	  // On récupère les données de l'article dans la base
	  // ******************* DONNEES SI MODIF ******************* //
	  if ($_GET['modif'] == 1) {

	  	// On prépare la requête de sélection
	  	$sql_select_modif = "SELECT titre, texte, publie FROM articles WHERE id = :id;";

	  	// On prépare les valeurs et on execute la requete
	    $sth = $bdd->prepare($sql_select_modif);
	    $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	    $sth->execute();

	  	// On met dans la variable toutes les données récupérées
	  	$tab_article_modif = $sth->fetch(PDO::FETCH_ASSOC);
	  }

		// ** TRAITEMENT ** //
  	// Déclaration et conf de smarty
  	$smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    // On donne les variables à smarty
    if(isset($_GET['id'])) $smarty->assign('id', $_GET['id']);
		if(isset($_GET['modif'])) $smarty->assign('modif', $_GET['modif']);
		if(isset($tab_article_modif['titre'])) $smarty->assign('titre', $tab_article_modif['titre']);
		if(isset($tab_article_modif['texte'])) $smarty->assign('texte', $tab_article_modif['texte']);
		if(isset($tab_article_modif['publie'])) $smarty->assign('publie', $tab_article_modif['publie']);

    // ** AFFICHAGE ** //
    // Insertion header et menu HTML
    include_once('include/header.inc.php');
    include_once('include/nav.inc.php');

    // Affichage de la vue connexion via smarty
    $smarty->display('article.tpl');

  }
  // Insertion footer HTML
  // include_once('include/footer.inc.php');
?>