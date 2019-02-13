<?php

  // On démarre la session
  session_start();

  // Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');
  require_once('include/connexion.inc.php');
  require_once('libs/Smarty.class.php');

  // Test pour savoir si le formulaire de commentaire a été envoyé
  if(isset($_POST['submit'])) {

    // On prépare la requête d'insertion du commentaire
    $sql_insert = "INSERT INTO commentaires (pseudo, email, texte, id_article) VALUES (:pseudo, :email, :texte, :id_article);";

    // On prépare les valeurs à insérer et on exécute la requête
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['mail'], PDO::PARAM_STR);
    $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
    $sth->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);

    $errorPdo = $sth->execute();
      
    if ($errorPdo == TRUE) {

      // On créé les variables de session pour indiquer de la réussite de la suppression d'article
      $_SESSION['notifications']['message'] = '<b>Félicitations</b> commentaire ajouté avec succès.';
      $_SESSION['notifications']['result'] = TRUE;
      $_SESSION['notifications']['alert'] = 'success';
      
    } else {

      // On créé les variables de session pour indiquer de l'échec de la suppression d'article
      $_SESSION['notifications']['message'] = '<b>Attention</b> un problème est survenu lors de l\'ajout du commentaire';
      $_SESSION['notifications']['result'] = TRUE;
      $_SESSION['notifications']['alert'] = 'danger';
    
    }

    // Redirection vers la page d'accueil
    header("Location: voir.php?id=". $_GET['id']. "");
    exit();
  }

  // Si aucune donnée n'a été envoyée via l'URL
  if(!isset($_GET['id'])) {

    echo '';

    // Si des données ont été envoyées via l'URL
  } else {

    // On prépare la requete de selection
    $sql_select_view = "SELECT a.id, a.titre, a.texte AS texte_article, DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, c.pseudo, c.email, c.texte AS texte_comm FROM articles AS a INNER JOIN commentaires AS c ON a.id = c.id_article WHERE a.id = :id;";

    // On prépare les valeurs et on execute la requete
    $sth = $bdd->prepare($sql_select_view);
    $sth->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
    $sth->execute();

    // On met dans la variable toutes les données de la table (chaque ligne)
    $article = $sth->fetchAll(PDO::FETCH_ASSOC);

  }

  // ** TRAITEMENT ** //
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  // On donne les variables à smarty
  $smarty->assign('session_var', $_SESSION);
  $smarty->assign('id_article', $_GET['id']);
  $smarty->assign('tab_article', $article);

  // ** AFFICHAGE ** //
  // Insertion header et menu HTML
  include_once('include/header.inc.php');
  include_once('include/nav.inc.php');

  // Affichage de la vue 'voir' via smarty
  $smarty->display('voir.tpl');

  // On unset les variables de notification
  unset($_SESSION['notifications']);

  // Insertion footer HTML
  include_once('include/footer.inc.php');

?>