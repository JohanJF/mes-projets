<?php include 'header.php'; ?>

<div class="container">
		<div class="row">
			<article class="container col-10 border border-info bg-light my-5"  style="height: auto">

				<!--CONTENU ARTICLE-->

				<!-- FORMULAIRE -->
				<div class="row">			
					<h3 class="col-12 text-center border">Connexion</h3>
					<form class="offset-5 mt-3" action="index.php" method="POST">
						<div class="form-group">
							<label>Adresse email</label>
							<input class="form-control" placeholder="e-mail" type="text" name="email_connexion" value="" required>
						</div>
						<div class="form-group">
							<label>Mot de passe</label>
							<input class="form-control" placeholder="Mot de passe" type="password" name="mdp_connexion" value="" required>
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit_connexion" value="Se connecter">
						</div>
					</form>
				</div>
				<!-- FIN -->

				<div class="row">
					<p>Pas inscrit ? <a href="inscription.php" class="btn btn-sm btn-info">S'inscrire ici</a> </p>
				</div>

				<!--CONTENU ARTICLE-->

			</article>
		</div>
	</div>

</body>
</html>