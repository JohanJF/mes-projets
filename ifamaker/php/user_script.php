<?php 

	require_once 'bdd/connection-BDD.php';
	require_once 'class/user.class.php';

	$pdo = $connexion->prepare('SELECT * FROM user');
	$pdo->execute();
	$pdo->setFetchMode(PDO::FETCH_ASSOC);

	foreach ($pdo as $value) 
	{
		$user = user::load_by_prenom($connexion,$_SESSION['user_id']);
	}

?>
	<table class="table">
	  <tbody>
	    <tr>
	      <th scope="row">Nom</th>
	      <td>
<?php 
			echo $user->get_name();
 ?>	      	
	      </td>
	      <td>
	      	<form action="#" method="POST">
	      		<input type="image" src="img/modifier.png" name="">
	      </td>
	    </tr>
	    <tr>
	      <th scope="row">Prénom</th>
	      <td>
<?php 
			echo $user->get_firstname();
 ?>		      	
	      </td>
	      <td>
	      		<input type="image" src="img/modifier.png" name="">
	      </td>
	    </tr>
	    <tr>
	      <th scope="row">Adresse</th>
	      <td>
<?php 
			echo $user->get_address();
 ?>	
	      </td>
	      <td>
	      		<input type="image" src="img/modifier.png" name="">
	      </td>
	    </tr>
	    <tr>
	      <th scope="row">E-mail</th>
	      <td>
<?php 
			echo $user->get_mail();
 ?>	
	      </td>
	      <td>
	      		<input type="image" src="img/modifier.png" name="">
	      </td>
	    </tr>
	    <tr>
	      <th scope="row">Mot de passe</th>
	      <td>
<?php 
			echo $user->get_password();
 ?>	
	      </td>
	      <td>
	      		<input type="image" src="img/modifier.png" name="">
	      	</form>
	      </td>
	    </tr>
	  </tbody>
	</table>
	<div class="row">
		<form action="#" method="POST" class="col text-center">
			<input class="btn btn-outline-danger my-1" type="submit" name="deconnexion" value="Se déconnecter">
		</form>
	</div>
<?php

 ?>