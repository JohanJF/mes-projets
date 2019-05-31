<?php

class Model {

	private static $bdd;

	// Instantancier la connexion à la BDD uniquement au besoin

	private function getBDD() {

		if(self::$bdd == null)
			self::$bdd = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8','root','');
		
		return self::$bdd;
	}

	

	protected function select_req($query,$data=null) {
		if ($data == null)
			$res = $this->getBDD()->query($query);
		else {
			$res = $this->getBDD()->prepare($query);
			$res->execute($data);
		}

		return $res;
	}
}














