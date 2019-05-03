<?php 
	include 'header.php';

	/* permet à l'utilisateur de ne pas retaper infos saisies */

	$name = '';
	$firstname = '';
	$address = '';
	$mail = '';

	if (isset($_POST['submit_inscription'])) 
	{
		$name = $_POST['nom_inscription'];
		$firstname = $_POST['prenom_inscription'];
		$address = $_POST['adresse_inscription'];
		$mail = $_POST['email_inscription'];
	}
?>

<div class="container">
		<div class="row">
			<article class="container col-10 border border-info bg-light my-5"  style="height: auto">

				<!--CONTENU ARTICLE-->
				
				<div class="row">

					<!-- FORMULAIRE -->

					<h3 class="col-12 text-center border">Inscription</h3>
					<form class="offset-5 mt-3" action="connexion.php" method="POST">
						<div class="form-group">
							<label>Nom</label>
							<input class="form-control" placeholder="Nom" type="text" name="nom_inscription" value="<?php echo $name; ?>" required>
						</div>
						<div class="form-group">
							<label>Prénom</label>
							<input class="form-control" placeholder="Prénom" type="text" name="prenom_inscription" value="<?php echo $firstname; ?>" required>
						</div>
						<div class="form-group">
							<label>Adresse</label>
							<input class="form-control" placeholder="Adresse" type="text" name="adresse_inscription" value="<?php echo $address; ?>" required>
						</div>
						<div class="form-group">
							<label>Adresse email</label>
							<input class="form-control" placeholder="e-mail" type="email" name="email_inscription" value="<?php echo $mail; ?>" required>
						</div>
						<div class="form-group">
							<label>Mot de passe</label>
							<input class="form-control" placeholder="Mot de passe" type="password" name="mdp_inscription" value="" required>
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit_inscription" value="S'inscrire">
						</div>
					</form>
					
					<!-- FIN -->

				</div>

				<!--CONTENU ARTICLE-->
				
			</article>
		</div>
	</div>

</body>
</html>