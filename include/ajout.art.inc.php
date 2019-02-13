<?php

	// Si 'publie' a été envoyé on récupère sa valeur sinon on le met à 0
  $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;

	// On récupère la date actuelle dans le format de la base de donnée
	$date = date("Y-m-d");

	// On prépare la requete d'insertion
	$sql_insert = "INSERT INTO articles (titre, texte, date, publie) VALUES (:titre, :texte, :date, :publie);";

	// On prépare les valeurs à insérer et on exécute la requête
	$sth = $bdd->prepare($sql_insert);
	$sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
	$sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
	$sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);
	$sth->bindValue(':date', $date, PDO::PARAM_STR);

	$errorPdo = $sth->execute();
	    
	if ($errorPdo == TRUE) {

	  // On créé les variables de session pour indiquer de la réussite de la création d'article
		$_SESSION['notifications']['message'] = '<b>Félicitations</b> votre article a été inséré dans la base de données.';
		$_SESSION['notifications']['result'] = TRUE;
		$_SESSION['notifications']['alert'] = 'success';
	   	
	} else {

	  // On créé les variables de session pour indiquer de l'échec de la création d'article
		$_SESSION['notifications']['message'] = '<b>Attention</b> un problème est survenu lors de la création de l\'article.';
		$_SESSION['notifications']['result'] = TRUE;
		$_SESSION['notifications']['alert'] = 'danger';
	}

	// On récupère la valeur du dernier id inséré
	$id_article = $bdd->lastInsertId();

	// On traîte l'image
	// Si le code d'erreur de l'image est 0 (aucune erreur)
	if ($_FILES['image']['error'] == 0) {

	  // On récupère l'extension du fichier envoyé et on la met en lowercase
	 	$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	  $extension = strtolower($extension);

	  // On déplace l'image dans le répertoire /img et on lui donne un nom unique grâce à l'ID de la table 'articles'
	  $result_img = move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $id_article . '.' . $extension);
	}

?>