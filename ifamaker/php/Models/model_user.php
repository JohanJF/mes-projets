<?php 

	class model_user extends Model
	{
		private $user_id;
		private $name;
		private $firstname;
		private $address;
		private $mail;
		private $password;

		public function get_userID()
		{
			return $this->user_id;
		}

		//---------------------

		public function get_name()
		{
			return $this->name;
		}

		//---------------------

		public function get_firstname()
		{
			return $this->firstname;
		}

		//---------------------

		public function get_address()
		{
			return $this->address;
		}

		//---------------------

		public function get_mail()
		{
			return $this->mail;
		}

		//---------------------

		public function get_password()
		{
			return $this->password;
		}

		function insert_user()
		{

			/* Inscription d'un utilisateur dans la BDD */

			if (filter_var($_POST['email_inscription'], FILTER_VALIDATE_EMAIL)) 
			{
				// verifie si syntaxe correspond à un email

				$result = $this->insert_req('
					INSERT INTO user(name,firstname,address,mail,password) 
					VALUES (:name, :firstname, :address, :mail, :password)
					');

				/* message info utilisateur */

				return "<p class='col badge badge-success'>Vous êtes inscrits</p>";
			}
			else
			{
				return "<p class='col badge badge-danger'>Veuillez entrez un email valide</p>";
			}

		}

		//---------------------

		public function __toString()
		{
			
		}

		public static function load_by_id($pdo,$id) 
		{
    		$rqt = $pdo->prepare('SELECT * FROM user WHERE user_id=?');
    		$rqt->execute([$id]);
    		return $rqt->fetchObject(__CLASS__);
		}
	}




 ?>