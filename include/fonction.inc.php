<?php

	// Fonction de cryptage du mot de passe
	function cryptPassword($mdp) {

		$mdp_crypt = sha1($mdp);
		return $mdp_crypt;
	}

	// Fonction pour générer le SID à mettre en base
	function sid($email) {

		$sid = md5($email . time());
		return $sid;
	}

	// Fonction pour retourner l'index du premier article à afficher sur la page
	function indexPagination($page_courante, $nb_articles_par_page) {

		$index = ($page_courante - 1) * $nb_articles_par_page;
		return $index;
	}

	// Fonction qui renvoie le nombre total d'article publie
	function nbTotalArticlePublie($bdd) {

		// On prépare la requete et on l'exécute
		$sql = "SELECT COUNT(*) AS nb_total_article_publie FROM articles WHERE publie = 1";

		$sth = $bdd->prepare($sql);
		$sth->execute();

		$tab_result = $sth->fetch(PDO::FETCH_ASSOC);

		return $tab_result['nb_total_article_publie'];
	}

	// Fonction qui renvoie le nombre total d'article
	function nbTotalArticle($bdd) {

		// On prépare la requête et on l'éxécute
		$sql = "SELECT COUNT(*) AS nb_total_article FROM articles;";

		$sth = $bdd->prepare($sql);
		$sth->execute();

		$tab_result = $sth->fetch(PDO::FETCH_ASSOC);

		return $tab_result['nb_total_article'];
	}

?>