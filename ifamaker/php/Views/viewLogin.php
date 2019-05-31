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

				<form class="row" action="connexion.php" method="POST">
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

					
			<!-- FIN -->

				<div class="row">
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
<footer id="footer" class="page-footer fixed-bottom bg-IFA text-white border-top border-IFA">
	<!-- FOOTER -->
	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3 text-grey">
		©<b>Ifamaker 2019</b>, Tous droits réservés.
	  </div>
	  <!-- Copyright -->
	<!-- FOOTER -->
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php $content = ob_get_clean(); ?>

<?php require('viewTemplate.php'); ?>