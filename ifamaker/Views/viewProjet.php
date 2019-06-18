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
	<meta charset="utf-8">
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
				<div class="col-9 px-3 text-center">
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
	<main class="container" id="zone">
		<div class="row" id="ma_base">
			<article class="col my-3">
				<section class="card bg-grey-darkskin border border-IFA" style="width: 16rem;">
				  <div class="card-body">
			    	<h5 class="card-title text-white">Ma table</h5>
			    	<div class="card-text my-2">
				    	<ul class="list-group">
				    	  <a class="tache" href="#maTache1" data-toggle="modal" >
							  <li class="list-group-item tache_detail border border-dark">
							  	<h6>Tâche 1</h6>						  	
							  	<small>Faire les courses</small>
							  </li>
						  </a>
					  	<!--MODAL DEBUT -->
<!--							<div class="modal fade" id="maTache1" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title">Tâche 1</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <div class="form-group">
							        	<div class="container">
							        		<div class="row">
							        			<div class="col">
							        				<small class="col">Faire les courses</small>
							        				<button class="btn btn-info btn-sm">modifier</button>
							        				<button class="btn btn-danger btn-sm">supprimer</button>
							        			</div>								        				
							        		</div>
							        	</div>
									  <label for="comment">A faire:</label>
									  <textarea class="form-control" rows="5" id="comment"></textarea>
									</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
							        <button type="button" class="btn btn-primary">Sauvegarder</button>
							      </div>
							    </div>
							  </div>
							</div>
-->							<!--FIN-->
<!--						  <li class="list-group-item">
						  	<h6>Tache 2</h6>
						  	<small>mon texte 2</small>
						  </li>
						  <li class="list-group-item">
						  	<h6>Tache 3</h6>
						  	<small>mon texte 3</small>
						  </li>
						 <li class="list-group-item">
						  	<div class="input-group input-group-sm">
							  <input type="text" class="form-control" placeholder="Tache" aria-label="Recipient's username" aria-describedby="basic-addon2" />
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="button">Créer</button>
							  </div>
							</div>
						  </li>
-->						</ul>	
				    </div>
				    <button href="#" class="btn btn-modifier card-link">Modifier</button>
				    <button href="#" class="btn btn-supprimer card-link">Supprimer</button>
				  </div>
				</section>
			</article>

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
		</div>
		<span id="fenetre_modal"></span>	
	</main>
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="./src/js/main.js"></script>
	<script type="text/javascript" src="./src/js/drag_drop.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>