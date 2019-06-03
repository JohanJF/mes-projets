<?php 

	class model_user extends Model
	{

		public function insert_user()
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

		public function connexion_user()
		{ 

				/* vérifie l'identité de l'utilisateur */

				$mail = $_POST['email_connexion'];
				$password = $_POST['mdp_connexion'];
				$login_success = false;

				$result = $this->select_req("
					SELECT user_id,mail, password 
					FROM user
					");

				while ($row = $result->fetch()) 
				{
					if ($mail == $row['mail'] && $password == $row['password']) 
					{
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['auth'] = true;
						$login_success = true;
						break;
					}
				}

				/* message info utilisateur */

				if ($login_success == true) 
				{
					header('Refresh: 1; URL=http://localhost/mes-projets/ifamaker/php/index.php?rqt=account');
					return "<p class='badge badge-success'>connexion réussi</p>";
				}
				else
				{
					return "<p class='badge badge-danger'>connexion échoué</p>";
					
				}
		}

	}




 ?>