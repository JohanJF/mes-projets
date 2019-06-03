<?php $title = 'Ifamaker - Connexion'; ?>

<?php ob_start(); ?>


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

				<form class="row" action="#" method="POST">
					<div class="container">
						<div class="row">
							<div class="col text-center form-group">
								<label class="text-white">Adresse email</label>
								<input class="form-control" placeholder="e-mail" type="text" name="email_connexion" value="" required>
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
				<?= $insert_user ?>
				<?= $information ?>
					
			<!-- FIN -->

				<div class="row">
				</div>

				<div class="row">
					<div class="col text-center">
						<a href="?rqt=register" class="text-IFA"><p><u>Pas de compte?</u><b> Créer un compte</b></p></a>
					</div>	
				</div>
			</div>

			<!--CONTENU ARTICLE-->

		</aside>
	</div>
	<!-- MAIN -->
</main>

<?php
	$content = ob_get_clean(); 
	require('viewTemplate.php'); 
?>