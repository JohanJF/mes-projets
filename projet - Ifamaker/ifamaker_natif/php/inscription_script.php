<?php 
	
	require_once 'bdd/connection-BDD.php';
	require_once 'class/user.class.php';

	if (isset($_POST['submit_inscription']))
	{
		try
		{

			/* Inscription d'un utilisateur dans la BDD */

			if (filter_var($_POST['email_inscription'], FILTER_VALIDATE_EMAIL)) 
			{
				// verifie si syntaxe correspond à un email

				$name = $_POST['nom_inscription'];
				$firstname = $_POST['prenom_inscription'];
				$address = $_POST['adresse_inscription'];
				$mail = $_POST['email_inscription'];
				$password = $_POST['mdp_inscription'];

				$result = $connexion->prepare('
					INSERT INTO user(name,firstname,address,mail,password) 
					VALUES (:name, :firstname, :address, :mail, :password)');

				$result->execute(array(
					'name' => $name,
					'firstname' => $firstname,
					'address' => $address,
					'mail' => $mail,
					'password' => $password
				));

				/* message info utilisateur */

				echo "<p class='col badge badge-success'>Vous êtes inscrits</p>";
			}
			else
			{
				echo "<p class='col badge badge-danger'>Veuillez entrez un email valide</p>";
			}
		}
		catch(PDOException $e)
		{
			echo "Une erreur est survenue<br />" . $e->getMessage();
		}
	}

 ?>