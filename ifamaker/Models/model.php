<?php

class Model {

	private static $bdd;

	// Instantancier la connexion à la BDD uniquement au besoin

	private function getBDD() {

		if(self::$bdd == null)
			self::$bdd = new PDO('mysql:host=localhost;dbname=ifamaker;charset=utf8','root','');
		
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

	protected function insert_req($query) 
	{
		
		$name = $_POST['nom_inscription'];
		$firstname = $_POST['prenom_inscription'];
		$address = $_POST['adresse_inscription'];
		$mail = $_POST['email_inscription'];
		$password = $_POST['mdp_inscription'];

		$res = $this->getBDD()->prepare($query);
		$res->execute(
			array(
					'name' => $name,
					'firstname' => $firstname,
					'address' => $address,
					'mail' => $mail,
					'password' => $password
				)
		);

		return $res;
	}

	
}

