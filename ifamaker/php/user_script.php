<?php 
	
	require_once 'bdd/connection-BDD.php';
	require_once 'class/user.class.php';

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

	try{

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


		//-----------

		$pdo = $connexion->prepare('SELECT * FROM user');
		$pdo->execute();
		$pdo->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($pdo as $value) 
		{
			$user = user::load_by_id($connexion,$_SESSION['user_id']); // récupère infos en fonction de l'id
		}

	} catch(PDOException $e){
		$e->getMessage();
	}		
		

?>
	<div class="row my-4">
		<div class="col py-5 text-center ">
			<span class="border border-IFA rounded-circle bg-white px-5 py-5">Photo</span>
		</div>
	</div>
	<div class="row">
		<div class="container col-10 border border-IFA  my-3">
		<table class="table" style="height: auto">
		  <tbody>
		    <tr>
		      <th scope="row">Nom</th>
		      	<td id="user_1"><?php echo $user->get_name();?></td>
		      <td>
		      	<input type="image" src="img/modifier.png" onclick="modifier_info('user_1')">
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">Prénom</th>
		      <td id="user_2"><?php echo $user->get_firstname();?></td>
		      <td>
		      	<input type="image" src="img/modifier.png" onclick="modifier_info('user_2')">
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">Adresse</th>
		      <td id="user_3"><?php echo $user->get_address();?></td>
		      <td>
		      	<input type="image" src="img/modifier.png" onclick="modifier_info('user_3')">
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">E-mail</th>
		      <td id="user_4"><?php echo $user->get_mail();?>	</td>
		      <td>
		      	<input type="image" src="img/modifier.png" onclick="modifier_info('user_4')">
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">Mot de passe</th>
		      <td id="user_5"><?php echo $user->get_password();?></td>
		      <td>
		      	<input type="image" src="img/modifier.png" onclick="modifier_info('user_5')">
		      </td>
		    </tr>
		  </tbody>
		</table>
		<div class="row">
			<form action="connexion.php" method="POST" class="col text-center">
				<input class="btn btn-danger my-1" type="submit" name="supprimer_compte" value="Supprimer ce compte">
			</form>
		</div>
	</div>
	</div>
	
	
	