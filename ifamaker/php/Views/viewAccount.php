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
		<div class="container col-10 border border-IFA  my-3">
			<table class="table" style="height: auto">
			  <tbody>
			  	<div class="container">
			  		<div class="row">
			  			<div class="col my-2 text-right">
			  				<input type="image" src="../img/modifier.png" onclick="modifier_info()">
			  			</div>	
			  		</div>
			  	</div>
			    <tr>
			      <th scope="row">Nom</th>
			      	<td id="user_1"><?= $information['name'] ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Prénom</th>
			      <td id="user_2"></td>
			    </tr>
			    <tr>
			      <th scope="row">Adresse</th>
			      <td id="user_3"></td>
			    </tr>
			    <tr>
			      <th scope="row">E-mail</th>
			      <td id="user_4"></td>
			    </tr>
			    <tr>
			      <th scope="row">Mot de passe</th>
			      <td id="user_5"></td>
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

				<!--CONTENU ARTICLE-->

</div>

<?php
	$content = ob_get_clean(); 
	require('viewTemplateConnected.php'); 
?>