<?php

class Model {

	private static $bdd;

	// Instantancier la connexion à la BDD uniquement au besoin

	private function getBDD() {

		if(self::$bdd == null)
			self::$bdd = new PDO('mysql:host=localhost;dbname=ifamaker;charset=utf8','root','');
		
		return self::$bdd;
	}

	
}

