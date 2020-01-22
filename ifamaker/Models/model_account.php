<?php 

	class model_account extends Model
	{

		
		
		public function user_info()
		{
			//----- Paramètre différent en fonction de la requête

			if (isset($_POST['modif_info_user'])) 
			{
				$name = htmlspecialchars($_POST['modifier_info_user0']);
				$firstname = htmlspecialchars($_POST['modifier_info_user1']);
				$address = htmlspecialchars($_POST['modifier_info_user2']);
				$mail = htmlspecialchars($_POST['modifier_info_user3']);
				$password = htmlspecialchars(sha1($_POST['modifier_info_user4']));	
				
				$this->update($name,'name');
				$this->update($firstname,'firstname');
				$this->update($address,'address');
				$this->update($mail,'mail');
				if (!empty($_POST['modifier_info_user4'])) 
				{
					$this->update($password,'password');
				}
				
			}

			if (isset($_POST['supprimer_compte'])) 
			{
			 	$this->delete_account($connexion);
			} 


			//----------- Récupère les informations de l'utilisateur connecté

			$result = $this->select_req('
				SELECT * 
				FROM user
				WHERE user_id = ?

			', [$_SESSION['user_id']]);

			return $result->fetch();
		}

		/* Fonction permettant de modifier les données de l'user */

		function update($requete,$tuple)
		{

			$connexion = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$result = $connexion->prepare('UPDATE user SET '.$tuple.' = ? WHERE user_id = ?');
			$result->execute(array(
				$requete,
				$_SESSION['user_id']
			));

		}

		function delete_account($connexion,$requete)
		{
			$result = $connexion->prepare('DELETE FROM user WHERE user_id = ?');

			$result->execute(array(
				$_SESSION['user_id']
			));
		}

		public function nb_notif()
		{
			$activation = $this->select_req('
					SELECT COUNT(activation)
					FROM board_user
					WHERE id_user_foreign = ' . $_SESSION['user_id'] . ' AND activation = ' . 0
				);

			$activation->setFetchMode(PDO::FETCH_ASSOC);

			foreach ($activation as $row) 
			{
				return $row['COUNT(activation)'];		
			}
		
		}

		public function invit_notif()
		{
			/* Affiche le nom des tableaux auquel user à été invité dans les notifications */
			$activation = $this->select_req('
					SELECT *
					FROM board
					INNER JOIN board_user ON id_board = id_board_foreign 
					WHERE id_user_foreign = ' . $_SESSION['user_id'] . ' AND activation = 0'
				);

			return $activation;
		}

	}

 ?>