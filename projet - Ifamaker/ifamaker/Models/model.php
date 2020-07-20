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
		
		$name = htmlspecialchars($_POST['nom_inscription']);
		$firstname = htmlspecialchars($_POST['prenom_inscription']);
		$address = htmlspecialchars($_POST['adresse_inscription']);
		$mail = htmlspecialchars($_POST['email_inscription']);
		$password = htmlspecialchars(sha1($_POST['mdp_inscription']));
		$confirm = 'inactif';
		$token = htmlspecialchars(sha1($mail));

		$res = $this->getBDD()->prepare($query);
		$res->execute(
			array(
					'name' => $name,
					'firstname' => $firstname,
					'address' => $address,
					'mail' => $mail,
					'password' => $password,
					'confirm' => $confirm,
					'token' => $token
				)
		);

		return $res;
	}
	
}

