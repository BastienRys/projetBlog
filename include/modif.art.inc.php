<?php

	// Si 'publie' a été envoyé on récupère sa valeur sinon on le met à 0
  $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;

  // On prépare la requête de modification
  $sql_update = "UPDATE articles SET titre = :titre, texte = :texte, publie = :publie WHERE id = :id;";

  // On prépare les valeurs à insérer et on exécute la requête
	$sth = $bdd->prepare($sql_update);
	$sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
	$sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
	$sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);
	$sth->bindValue(':id', $_POST['id'] , PDO::PARAM_INT);

	$errorPdo = $sth->execute();
	    
	if ($errorPdo == TRUE) {

		// On créé les variables de session pour indiquer de la réussite de la modification d'article
		$_SESSION['notifications']['message'] = '<b>Félicitations</b> votre article a été modifié avec succès.';
		$_SESSION['notifications']['result'] = TRUE;
		$_SESSION['notifications']['alert'] = 'success';
		   	
	} else {

	  // On créé les variables de session pour indiquer de l'échec de la modification d'article
		$_SESSION['notifications']['message'] = '<b>Attention</b> un problème est survenu lors de la modification de l\'article.';
		$_SESSION['notifications']['result'] = TRUE;
		$_SESSION['notifications']['alert'] = 'danger';
	}

?>