<?php $title = 'Ifamaker'; ?>

<?php 

	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	if (isset($_POST['deconnexion'])) 
	{	
		session_destroy(); // ferme la session
		header('Location: #');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="./src/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./src/css/style.css">
	<script type="text/javascript" src="./src/js/jquery-3.4.1.js"></script>
</head>
<body id="body-connected" class="bg-grey">
	<header id="header" class="container-fluid fixed-top bg-IFA text-white border-bottom border-IFA">
		<!-- HEADER -->
		
		<div id="accordion">
	      <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <section id="accordeon" class="col collapse" aria-labelledby="titre1" data-parent="#accordion">
	            <div class="container-fluid">
	              <div class="row px-5">
	                <a href="?rqt=perso&user=<?=$_SESSION['user_id']?>" class="col-6 border-left py-5 header_nav">
	                  <h1 class="text-light">Tableaux - collaboratif</h1>
	                </a>
	                <a href="?rqt=account&user=<?=$_SESSION['user_id']?>" class="col-6 border-left py-5 header_nav">
		                  <h1 class="text-light">Mon compte</h1>
	            	</a>
	              </div>
	            </div>
	          </section>
	        </div>

	      <!-- TITRE & DESCRIPTION -->

	        <section class="container-fluid">
	        	<article class="col-1">
		            <a href="#accordeon" data-toggle="collapse" data-target="#accordeon" aria-expanded="true">
		              <img src="./src/img/menu.png"/>
		            </a>
		         </article>
		         <article class="col-1">
		            <img src="./src/img/collaborateur.png" class="pop1" data-container="body" data-toggle="popover" title="Ajoutez un collaborateur" data-placement="bottom" data-content="" />
		         </article>
		         <article class="col-1">
		            <img src="./src/img/notification.png" class="pop2" data-container="body" data-toggle="popover" title="Notifications" data-placement="bottom" data-content="" />
		         </article>
				<div class="col-7 px-3 d-flex justify-content-center">
					<a href="?rqt=projet&user=<?= $_SESSION['user_id']; ?>"><img src="./src/img/logo.png" /></a>
				</div>

				<div class="col-2 text-right container">
					<div class="row">
						<div class="col">
							<span class="border rounded-circle px-2 py-3">Photo</span>
						</div>
					<form action="#" method="POST" class="col">
						<input class="btn btn-outline-danger btn-sm" type="submit" name="deconnexion" value="Déconnexion" />
					</form>
					</div>
				</div>

	        </section>
	      </nav>
	    </div>

		<!-- HEADER -->
	</header>

<!-- MAIN -->

	<div id="test"></div>
	<main class="container-fluid" id="zone">
		<div class="row" id="ma_base">

			<!-- ARTICLE PRESENTE DANS BDD -->
			<?php 
				foreach($mes_listes as $key => $value):
			?>
				<article class="col my-3 ma_listeid" draggable="true" id="<?=$value[0]?>">
					<section class="card bg-grey-darkskin border border-IFA" style="width: 16rem;">
						<div class="card-body">
								<h5 class="card-title text-white">
									<span class="titre_liste_ref" id="titre-<?=$value[0]?>"><?= $value[1] ?></span>
								</h5>
								<div class="card-text my-2">
									<ul class="list-group" id="ma_liste-<?=$value[0]?>">
										<div class="" id="li-<?=$value[0]?>">
											<?php if (isset($value[3])): ?>
											<?php
												 
												foreach($value[3] as $mes_taches):
											 ?>
												<a class="tache" data-toggle="modal" id="#ma_tache-<?= $mes_taches['id_task'] ?>">
													<li class="list-group-item tache_detail border border-dark my-1">
														<h6><?=$mes_taches['title']?></h6>
													</li>
												</a>
											<?php
												endforeach;
											 ?>
											<?php endif ?>
											<div class="input-group input-group-sm">
												<input id="titre_tache-<?=$value[0]?>" type="text" class="form-control" placeholder="Ajouter tâche">
												<div class="input-group-append">
													<button type="button" class="btn btn-outline-grey button_creer_tache">Créer</button>
												</div>
											</div>
										</div>
									</ul>
								</div>
								<button class="btn btn-modifier card-link" href="#">Modifier</button>
								<button class="btn btn-supprimer card-link" href="#">Supprimer</button>
						</div>
					</section>
				</article>
			<?php
				endforeach;
			?>
			<!-- ARTICLE PRESENTE DANS BDD -->

			<!-- ARTICLE CREATION -->
			<article class="col my-3" id="nouvelle_table">
				<section class="card rounded-top" style="width: 16rem;">
				  <div class="card-body bg-grey-darkskin border border-IFA rounded-top">
			    	<h5 class="card-title text-white">Ajouter une table</h5>
			    	<div class="card-text my-2">
			    	 	<form class="input-group input-group-sm">
		    	 			 <input type="text" class="form-control" placeholder="Titre" id="titre_table" onkeypress="if (event.keyCode == 13) creer_table()" />
							  <div class="input-group-append">
							    <button type="button" class="btn btn-outline-grey" id="add_list">Créer</button>
							  </div>
						</form>
				    </div>
				  </div>
				</section>
			</article>
			<!-- ARTICLE CREATION -->

			<!-- EMPLACEMENT FENETRES MODALES -->

			<span id="fenetre_modal">
					<div id="ma_tache" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ma_tacheLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content bg-grey">
								<div class="modal-header container">
									<h3 class="modal-title text-dark titre_tache_modal"></h3>
									<small class="badge badge-pill badge-info titre_liste_modal"> </small>
									<small>
										<input class="modifier_tache" type="image" src="./src/img/modifier_small.png">
										<input class="close delete_task" type="image" src="./src/img/supprimer_small.png" data-dismiss="modal" aria-label="close">
									</small>
									<button class="close" type="button" data-dismiss="modal" aria-label="close">
										<span aria-hidden="true">
											
										</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="container">
											<label class="text-left text-grey" for="comment">Ajouter détails</label>
											<textarea class="form-control border border-dark" rows="5" id="comment"></textarea>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-grey" type="button" data-dismiss="modal">Annuler</button>
									<button class="btn btn-sauvegarder" type="button">Sauvegarder</button>
								</div>
							</div>
						</div>
					</div>
			</span>	

			<!-- EMPLACEMENT FENETRES MODALES -->

		</div>
	</main>
	
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="./src/js/main.js"></script>
	<script type="text/javascript" src="./src/js/drag_drop.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>