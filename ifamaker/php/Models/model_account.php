<?php 

	class model_account extends Model
	{

		
		
		public function user_info($user_id)
		{
				

			//----- Paramètre différent en fonction de la requête

			if (isset($_POST['user_1'])) 
			{
				update($connexion,$_POST['modifier_info_user'],'user_1');
			}
			else if (isset($_POST['user_2'])) 
			{
				update($connexion,$_POST['modifier_info_user'],'user_2');
			}
			else if (isset($_POST['user_3'])) 
			{
				update($connexion,$_POST['modifier_info_user'],'user_3');
			}
			else if (isset($_POST['user_4'])) 
			{
				update($connexion,$_POST['modifier_info_user'],'user_4');
			}
			else if (isset($_POST['user_5'])) 
			{
				update($connexion,$_POST['modifier_info_user'],'user_5');
			}

			if (isset($_POST['supprimer_compte'])) 
			{
			 	delete_account($connexion);
			} 


			//----------- Récupère les informations de l'utilisateur connecté

			$result = $this->select_req('
				SELECT * 
				FROM user
				WHERE user_id = ?

			', [$user_id]);

			return $result->fetch();
		}

		/* Fonction permettant de modifier les données de l'user */

		function update($connexion,$requete,$click)
		{
			switch ($click) 
			{
				case 'user_1':
					$result = $connexion->prepare('UPDATE user SET name = ? WHERE user_id = ?');
					break;
				case 'user_2':
					$result = $connexion->prepare('UPDATE user SET firstname = ? WHERE user_id = ?');
					break;
				case 'user_3':
					$result = $connexion->prepare('UPDATE user SET address = ? WHERE user_id = ?');
					break;
				case 'user_4':
					$result = $connexion->prepare('UPDATE user SET mail = ? WHERE user_id = ?');
					break;
				case 'user_5':
					$result = $connexion->prepare('UPDATE user SET password = ? WHERE user_id = ?');
					break;
				
				default:
					# code...
					break;
			}


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
		
	}

 ?>