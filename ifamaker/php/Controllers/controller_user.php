<?php 

	require_once './Models/model.php';
	require_once './Models/model_user.php';

	/**
	 * 
	 */
	class controller_user 
	{

	}

	// Mon code Natif
	
	if (isset($_POST['submit_connexion'])) 
	{
		try{
				/* vérifie l'identité de l'utilisateur */

				$mail = $_POST['email_connexion'];
				$password = $_POST['mdp_connexion'];
				$login_success = false;

				$result = $connexion->query("SELECT user_id,mail, password FROM user");

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
					echo "<p class='badge badge-success'>connexion réussi</p>";
					header('Refresh: 1; URL=http://localhost/mes-projets/ifamaker/info_user.php');
				}
				else
				{
					echo "<p class='badge badge-danger'>connexion échoué</p>";
					
				}
		}
		catch (PDOException $e)
		{
			echo 'Une erreur est survenue<br />' . $e->getMessage();
		}
	}

 ?>