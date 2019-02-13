<?php

	// On démarre la session
	session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');
  require_once('include/connexion.inc.php');
  require_once('libs/Smarty.class.php');

  // Test pour vérifier que des données ont été envoyées par le formulaire de recherche
  // Si aucune donnée n'a été envoyée
  if(!isset($_GET['search'])) {

    // ça c'est un peu moche désolé
  	echo '<div class="container">
      			<div class="row">
        			<div class="col-lg-12 text-center">
  							<h2 class="mt-5">Une erreur s\'est produite lors de la recherche. Veuillez réessayer.</h2>
  						</div>
  					</div>
  				</div>';

  	// Si des données ont été envoyées
  } else {

  	$recherche = $_GET['search'];

  	// Si pas de connexion en cours on sélectionne que les articles publiés
    if($is_connect == FALSE) {

	    // On prépare la requete de selection
	    $sql_select_search = "SELECT id, titre, texte, publie, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE publie = :publie AND (titre LIKE :recherche OR texte LIKE :recherche)";

	    // On prépare les valeurs et on execute la requete
	    $sth = $bdd->prepare($sql_select_search);
	    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
	    $sth->bindValue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
	    $sth->execute();

	    // On met dans la variable toutes les données de la table (chaque ligne)
	    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

	    // On récupère le nombre d'articles trouvés
	    $nb_articles_search = count($tab_articles);

    // Sinon on sélectionne tous les articles sans exception
    } else {

	    // On prépare la requete de selection
	    $sql_select_search = "SELECT id, titre, texte, publie, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE (titre LIKE :recherche OR texte LIKE :recherche)";

	    // On prépare les valeurs et on execute la requete
	    $sth = $bdd->prepare($sql_select_search);
	    $sth->bindValue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
	    $sth->execute();

	    // On met dans la variable toutes les données de la table (chaque ligne)
	    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

	    // On récupère le nombre d'articles trouvés
	    $nb_articles_search = count($tab_articles);
	  }

    // ** TRAITEMENT ** //
    // Déclaration et conf de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    // On donne les variables à smarty
    $smarty->assign('nb_articles_search', $nb_articles_search);
    $smarty->assign('tab_articles', $tab_articles);
    $smarty->assign('is_connect', $is_connect);

    // ** AFFICHAGE ** //
    // Insertion header et menu HTML
    include_once('include/header.inc.php');
    include_once('include/nav.inc.php');

    // Affichage de la vue connexion via smarty
    $smarty->display('recherche.tpl');
	}
?>