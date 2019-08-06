<?php $title = 'Ifamaker - Mon compte'; ?>

<?php ob_start();?>
<div class="container">

				<!--CONTENU ARTICLE-->

	<div class="row my-4">
		<div class="col py-5 text-center ">
			<span class="border border-IFA rounded-circle bg-white px-5 py-5">Photo</span>
		</div>
	</div>
	<div class="row">
		<div class="container col-10 border border-IFA  my-3" style="max-height: 50vh; overflow-y: auto; text-overflow: nowrap;">
			<div class="container">
		  		<div class="row">
		  			<div class="col my-2 text-right">
		  				<input type="image" src="./src/img/modifier.png" onclick="modifier_info()">
		  			</div>	
		  		</div>
		  	</div>
			<form action="#" method="POST">
				<table class="table" style="height: auto">
				  <tbody>
			  		<tr>
				      <th scope="row">Nom</th>
				      	<td id="user_1"><?= $information['name'] ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Prénom</th>
				      <td id="user_2"><?= $information['firstname'] ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Adresse</th>
				      <td id="user_3"><?= $information['address'] ?></td>
				    </tr>
				    <tr>
				      <th scope="row">E-mail</th>
				      <td id="user_4"><?= $information['mail'] ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Mot de passe</th>
				      <td id="user_5">***********</td>
				    </tr>
				  </tbody>
				</table>
				<div class="d-flex justify-content-center form_info mb-1">
					<input class="btn btn-success text-center" style="display: none" type="submit" name="modif_info_user" />
				</div>
			</form>
			<div class="row">
				<form action="?rqt=accueil" method="POST" class="col text-center">
					<input class="btn btn-danger my-1" id="delete_my_account" type="submit" name="my_account" value="Supprimer ce compte" data-user="<?= $information['user_id'] ?>" />
				</form>
			</div>
		</div>
	</div>

				<!--CONTENU ARTICLE-->

</div>

<?php
	$content = ob_get_clean(); 
	require('viewTemplateConnected.php'); 
?>