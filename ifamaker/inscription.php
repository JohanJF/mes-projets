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

	<main class="container-fluid">
		<!-- MAIN -->
		<div class="row">
			<article id="content" class="col-9 bg-light">
				<div class=”row”>
					
			</article>
			<aside id="aside" class="col-3 bg-IFA fixed">

				<!--CONTENU ARTICLE-->

				<!-- FORMULAIRE -->
				<div class="container">
					<div class="row">
						<div class="col text-center">
							<h3 class="text-center text-white">Inscription</h3>
						</div>
					</div>

					<form class="row" action="connexion.php" method="POST">
						<div class="container">
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Nom</label>
									<input class="form-control" placeholder="Nom" type="text" name="nom_inscription" value="<?php echo $name; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Prénom</label>
									<input class="form-control" placeholder="Prénom" type="text" name="prenom_inscription" value="<?php echo $firstname; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Adresse</label>
									<input class="form-control" placeholder="Adresse" type="text" name="adresse_inscription" value="<?php echo $address; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Adresse email</label>
									<input class="form-control" placeholder="e-mail" type="email" name="email_inscription" value="<?php echo $mail; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Mot de passe</label>
									<input class="form-control" placeholder="Mot de passe" type="password" name="mdp_inscription" value="" required>
								</div>
							</div>
							<div class="col text-center form-group">
								<input class="btn btn-grey" type="submit" name="submit_inscription" value="S'inscrire">
							</div>
						</div>			
					</form>			
					

						
				<!-- FIN -->

					<div class="row">
						<div class="col text-center">
							<a href="connexion.php" class="text-IFA"><p><u>Je possède un compte</u><b> Se connecter</b></p></a>
						</div>	
					</div>
				</div>

				<!--CONTENU ARTICLE-->

			</aside>
		</div>
		<!-- MAIN -->
	</main>
	<?php include 'footer.php' ?>