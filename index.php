<?php

  // On démarre la session
  session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');
  require_once('include/connexion.inc.php');
  require_once('libs/Smarty.class.php');

  // Variable qui contient le numéro de la page courante
  $page_courante = !empty($_GET['page']) ? $_GET['page'] : 1;

  // Variable index pour afficher des articles en fonction de la page actuelle
  $index_depart_mysql = indexPagination($page_courante, _nb_art_par_page);

  // Variable contenant le nombre d'article publie
  // Si pas de connexion en cours on se limite aux articles publiés
  if($is_connect == FALSE) {

    $nb_total_article = nbTotalArticlePublie($bdd);

    // Sinon on compte tous les articles sans exception
  } else {

    $nb_total_article = nbTotalArticle($bdd);
  }

  // Variable contenant le nombre de page à générer en fonction du nombre d'article publie
  // Arrondi à l'entier supérieur
  $nb_pages = ceil($nb_total_article / _nb_art_par_page);

  // Numéro de page par défaut
  if(!isset($_GET['page'])) {

    $_GET['page'] = 1;
  }

  // Si pas de connexion en cours on sélectionne que les articles publiés
  if($is_connect == FALSE) {

    // On prépare la requete de selection
    $sql_select = "SELECT id, titre, texte, publie, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE publie = :publie LIMIT :index_depart, :nb_limit";

    // On prépare les valeurs et on execute la requete
    $sth = $bdd->prepare($sql_select);
    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
    $sth->bindValue(':index_depart', $index_depart_mysql , PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);
    $sth->execute();

    // On met dans la variable toutes les données de la table (chaque ligne)
    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    // Sinon on sélectionne tous les articles sans exception
  } else {

    // On prépare la requete de selection
    $sql_select = "SELECT id, titre, texte, publie, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles LIMIT :index_depart, :nb_limit";

    // On prépare les valeurs et on execute la requete
    $sth = $bdd->prepare($sql_select);
    $sth->bindValue(':index_depart', $index_depart_mysql , PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);
    $sth->execute();

    // On met dans la variable toutes les données de la table (chaque ligne)
    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);
  }

  // ** TRAITEMENT ** //
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  // On donne les variables à smarty
  $smarty->assign('get_var', $_GET);
  $smarty->assign('session_var', $_SESSION);
  $smarty->assign('is_connect', $is_connect);
  if(isset($prenom_connect)) $smarty->assign('prenom_connect', $prenom_connect);
  if(isset($nom_connect)) $smarty->assign('nom_connect', $nom_connect);
  $smarty->assign('tab_articles', $tab_articles);
  $smarty->assign('nb_pages', $nb_pages);
  $smarty->assign('page', $_GET['page']);

  // ** AFFICHAGE ** //
  // Insertion header et menu HTML
  include_once('include/header.inc.php');
  include_once('include/nav.inc.php');

  // Affichage de la vue connexion via smarty
  $smarty->display('index.tpl');

  // On unset les variables de notification
  unset($_SESSION['notifications']);

  // Insertion footer HTML
  include_once('include/footer.inc.php');
?>