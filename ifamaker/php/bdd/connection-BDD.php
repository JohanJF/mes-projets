<?php 

	try {

		$connexion = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	} catch (Exception $e) {
		
	}

 ?>