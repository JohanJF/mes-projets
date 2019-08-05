<?php $title = 'Ifamaker - Connexion'; ?>

<?php ob_start(); ?>


<main class="container-fluid">
	<!-- MAIN -->
	<div class="row login">
		<article id="content" class="hidden-sm d-sm-none hidden-md d-md-none col-lg-9 bg-grey d-lg-flex align-items-center">
			<div class="container welcome">
				<div class="row my-3">
					<section class="col-6">
						<div class="bg-section jumbotron shadow">
							<h3>Organisez vous de mieux en mieux avec Ifa-Maker</h3>
							<p>
								Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum;
							</p>
						</div>
					</section>
					<section class="col-6 text-center">
						<img class="shadow p-1 bg-white rounded" src="./src/img/work.jpg">
					</section>
				</div>
				<hr>
				<div class="row my-3">
					<section class="col-6 text-center">
						<img class="shadow p-1 bg-white rounded" src="./src/img/co_work.jpg">
					</section>
					<section class="col-6">
						<div class="bg-section jumbotron shadow">
							<h3>Que vous soyez seul ou à plusieur !</h3>
							<p>
								Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum;
							</p>
						</div>
					</section>
				</div>
			</div>
			
		</article>
		<aside id="aside" class="hidden-sm d-sm-none hidden-md d-md-none col-lg-3 bg-IFA fixed d-lg-flex align-items-center">

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
				<?=$confirm_mail?>	
			<!-- FIN -->

				<div class="row">
					<div class="col text-center">
						<?= $connexion ?>
					</div>	
				</div>

				<div class="row">
					<div class="col text-center">
						<a href="?rqt=register" class="text-IFA"><p><u>Pas de compte?</u><b> Créer un compte</b></p></a>
					</div>	
				</div>
			</div>

			<!--CONTENU ARTICLE-->

		</aside>
		<?php /* ?>
		<div class="col-sm-12 hidden-lg d-lg-none bg-IFA d-sm-flex align-items-center">

			<!--CONTENU ARTICLE-->

			<!-- FORMULAIRE -->
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h3 class="text-center text-white display-1">Connexion</h3>
					</div>
				</div>

				<form class="row" action="#" method="POST">
					<div class="container text-white">
						<div class="row">
							<div class="col text-center form-group">
								<label class="h3">Adresse email</label>
								<input class="form-control py-4 input-lg" placeholder="e-mail" type="text" name="email_connexion" value="" required>
							</div>
						</div>
						<div class="row">
							<div class="col text-center form-group">
								<label class="h3">Mot de passe</label>
								<input class="form-control py-4 input-lg" placeholder="Mot de passe" type="password" name="mdp_connexion" value="" required>
							</div>
						</div>
						<div class="col text-center form-group">
							<input class="btn btn-lg btn-grey" type="submit" name="submit_connexion" value="Se connecter">
						</div>
					</div>			
				</form>
				<?= $insert_user ?>	
				<?=$confirm_mail?>	
			<!-- FIN -->

				<div class="row">
					<div class="col text-center">
						<?= $connexion ?>
					</div>	
				</div>

				<div class="row my-2">
					<div class="col text-center">
						<a href="?rqt=register" class="text-IFA h1"><p><u>Pas de compte?</u><b> Créer un compte</b></p></a>
					</div>	
				</div>
			</div>

			<!--CONTENU ARTICLE-->

		</div>
		<?php */ ?>
	</div>
	<!-- MAIN -->
</main>

<?php
	$content = ob_get_clean(); 
	require('viewTemplate.php'); 
?>