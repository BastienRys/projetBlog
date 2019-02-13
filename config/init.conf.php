<?php

	//Affichage des erreurs et avertissements PHP
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	function print_r2($param) {

		echo '<pre>';
		print_r($param);
		echo '</pre>';
	}

	// Constante nombre d'article par page max
	define('_nb_art_par_page', 3);

?>