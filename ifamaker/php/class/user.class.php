<?php 

	class user
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