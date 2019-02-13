<?php

	$is_connect = FALSE;

	// S'il existe un cookie 'sid' et qu'il n'est pas vide
	if(isset($_COOKIE['sid']) AND !empty($_COOKIE['sid'])) {

		// On prépare la requete de sélection
		$sql_select = "SELECT * FROM utilisateurs WHERE sid = :sid;";

		// On prépare les valeurs et on exécute la requête
		$sth = $bdd->prepare($sql_select);
		$sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR);

		$sth->execute();

		// On vérifie qu'il n'y a une correspondance suite à la requête
		if ($sth->rowCount() > 0) {

			// On met dans la variable toutes les données récupérées
            $tab_result_connexion = $sth->fetch(PDO::FETCH_ASSOC);

            // On met les données utilisateurs dans des variables
			$is_connect = TRUE;
			$nom_connect = $tab_result_connexion['nom'];
			$prenom_connect = $tab_result_connexion['prenom'];
		}
	}

?>