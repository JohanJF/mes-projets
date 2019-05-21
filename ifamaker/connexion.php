<?php 
	include 'header.php';

	/* permet à l'utilisateur de ne pas retaper infos saisies */

	$mail_login = '';

	if (isset($_POST['submit_connexion'])) 
	{
	 	$mail_login = $_POST['email_connexion'];
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
							<h3 class="text-center text-white">Connexion</h3>
						</div>
					</div>

					<form class="row" action="connexion.php" method="POST">
						<div class="container">
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Adresse email</label>
									<input class="form-control" placeholder="e-mail" type="text" name="email_connexion" value="<?php echo $mail_login; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col text-center form-group">
									<label class="text-white">Mot de passe</label>
									<input class="form-control" placeholder="Mot de passe" type="password" name="mdp_connexion" value="" required>
								</div>
							</div>
							<div class="col text-center form-group">
								<input class="btn btn-grey" type="submit" name="submit_connexion" value="Se connecter">
							</div>
						</div>			
					</form>			

						
				<!-- FIN -->

					<div class="row">
						<?php include 'php/inscription_script.php'; ?>
					</div>

					<div class="row">
						<div class="col text-center">
							<a href="inscription.php" class="text-IFA"><p><u>Pas de compte?</u><b> Créer un compte</b></p></a>
						</div>	
					</div>
				</div>

				<!--CONTENU ARTICLE-->

			</aside>
		</div>
		<!-- MAIN -->
	</main>
	<?php include 'footer.php' ?>