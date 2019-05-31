<?php
	// Cette page est le routeur : contrôleur frontal
	
	ini_set('display_errors', '1');
	require_once './Controllers/routeur.php';

	$routeur = new Routeur();
	$routeur->handle_req();

	
