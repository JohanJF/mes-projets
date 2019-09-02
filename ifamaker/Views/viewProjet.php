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

				 <div class="col-8 px-3 d-flex justify-content-center">
					<a href="?rqt=projet&user=<?= $_SESSION['user_id']; ?>"><img src="./src/img/logo.png" /></a>
				 </div>      		

				<div class="col-3 text-right container">
					<div class="row">
						<div class="col">
							<!--<span class="border rounded-circle px-2 py-3">Photo</span>-->
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

	<nav class="container-fluid bg-secondary">
		<div class="row py-2">
			<div class="col-2 text-left">
				<span class="badge badge-light"><?=$board['title']?></span>
			</div>

		<?php if ( $type == 'collaboratif') :?>
			<div class="col-8 text-center">
				<span class="text-white">Collaborateurs :</span>
				<?php foreach ($collaborateurs as $collaborateurs): ?>
					<span class="badge badge-warning"><?=$collaborateurs['firstname']?></span>
				<?php endforeach; ?>
			</div>
		<?php endif;?>

			<!--Ajoute 2 bouton (ajouter membre, notification) dans le header si on sélectionne un tableau collaboratif-->
	        <?php if ( $type == 'collaboratif') :?>
		        <div class="col-2 text-center container">
					<div class="row">
						<article class="col">
				            <img src="./src/img/collabo.png" class="pop1" data-container="body" data-toggle="popover" title="Ajoutez un collaborateur" data-placement="bottom" data-content="" />
				        </article
				        >
				        <article class="col">
				            <img src="./src/img/notif.png" class="pop2" data-container="body" data-html="true" data-toggle="popover" title="Notifications" data-placement="bottom" data-popover-content="#notification" />
				            <sup>
				            	<span class="badge badge-pill badge-danger alerte"><?= $_SESSION['nb_notif'] ?></span>
				            </sup>
				        </article>
				        <div id="notification" style="display:none">
					        <table class="table table-striped">
					        	<tbody>
					        		<?php foreach ($ma_notif as $ma_notif) : ?>
							        		<tr class="notif">
							        			<td>
							        				<a href="http://localhost/mes-projets/ifamaker/index.php?rqt=projet&id=<?= $ma_notif['id_board'] ?>&token=<?=$ma_notif['token']?>" style="text-decoration: none; color: black;">
							        					Vous avez été invité à rejoindre le tableau collaboratif "<?= $ma_notif['title'] ?>"
							        				</a>
							        			</td>    
							        		</tr>
					        		<?php endforeach; ?>
					        	</tbody>
					        </table>
				        </div>
		     <?php else : ?>
		     	<article class="col text-right">
		            <img src="./src/img/notif.png" class="pop2" data-container="body" data-html="true" data-toggle="popover" title="Notifications" data-placement="bottom" data-popover-content="#notification" />
		            <sup>
		            	<span class="badge badge-pill badge-danger alerte"><?= $_SESSION['nb_notif'] ?></span>
		            </sup>
		        </article>
		        <div id="notification" style="display:none">
			        <table class="table table-striped">
			        	<tbody>
			        		<?php foreach ($ma_notif as $ma_notif) : ?>
					        		<tr class="notif">
					        			<td>
					        				<a href="http://localhost/mes-projets/ifamaker/index.php?rqt=projet&id=<?= $ma_notif['id_board'] ?>&token=<?=$ma_notif['token']?>" style="text-decoration: none; color: black;">
					        					Vous avez été invité à rejoindre le tableau collaboratif "<?= $ma_notif['title'] ?>"
					        				</a>
					        			</td>    
					        		</tr>
			        		<?php endforeach; ?>
			        	</tbody>
			        </table>
		        </div>  
		     <?php endif; ?>
		     	</div>
		 	</div>

		</div>
	</nav>

<!-- MAIN -->

	<main class="container-fluid" id="zone">
		<div class="row" id="ma_base">
			<ul class="col my-3 d-flex flex-wrap align-items-start ma_zone">

			<!-- ARTICLE PRESENTE DANS BDD -->
			<?php 
				foreach($mes_listes as $key => $value):
			?>
				<!--<article class="col my-3 ma_listeid" id="<?=$value[0]?>">-->
					<li class="card m-2 card-liste bg-grey-darkskin border border-IFA ma_listeid" id="<?=$value[0]?>" style="width: 16rem;">
						<div class="card-body">
								<h5 class="card-title text-white">
									<span class="titre_liste_ref" id="titre-<?=$value[0]?>"><?= $value[1] ?></span>
								</h5>
								<div class="card-text my-2">
									<ul class="list-group" id="ma_liste-<?=$value[0]?>">
										<div class="groupe_tache" id="li-<?=$value[0]?>">
											<span class="p-1"></span>
											<?php if (isset($value[3])): ?>
											<?php
												foreach($value[3] as $mes_taches):
											 ?>
													<li class="list-group-item tache_detail border border-dark my-1 tache" id="#ma_tache-<?= $mes_taches['id_task'] ?>">
														<h6><?=$mes_taches['title']?></h6>
														<small class="text-grey"><?=$mes_taches['details']?></small>
													</li>
											<?php
												endforeach;
											 ?>
											<?php endif ?>
										</div>	
										<li class="input-group input-group-sm">
											<input id="titre_tache-<?=$value[0]?>" type="text" class="form-control" placeholder="Ajouter tâche">
											<div class="input-group-append">
												<button type="button" class="btn btn-outline-grey button_creer_tache">Créer</button>
											</div>
										</li>
									</ul>
								</div>
								<button class="btn btn-modifier card-link" href="#">Modifier</button>
								<button class="btn btn-supprimer card-link" href="#">Supprimer</button>
						</div>
					</li>
				
			<?php
				endforeach;
			?>
			<!-- ARTICLE PRESENTE DANS BDD -->

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
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        </button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="container">
											<p id="mon_detail"></p>
											<label class="text-left text-grey" for="comment">Ajouter détails</label>
											<textarea class="form-control border border-dark" rows="5" id="comment"></textarea>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-grey" type="button" data-dismiss="modal">Annuler</button>
									<button class="btn btn-sauvegarder" id="add_details" type="button">Sauvegarder</button>
								</div>
							</div>
						</div>
					</div>
			</span>	

			<!-- EMPLACEMENT FENETRES MODALES -->

			<!-- ARTICLE CREATION -->
				<li class="card rounded-top" style="width: 16rem;" >
				  <div class="card-body bg-grey-darkskin border border-IFA rounded-top">
			    	<h5 class="card-title text-white">Ajouter une table</h5>
			    	<div class="card-text my-2">
			    	 	<form class="input-group input-group-sm">
		    	 			 <input type="text" class="form-control" placeholder="Titre" id="titre_table" />
							  <div class="input-group-append">
							    <button type="button" class="btn btn-outline-grey" id="add_list">Créer</button>
							  </div>
						</form>
				    </div>
				  </div>
				</li>
			<!-- ARTICLE CREATION -->
			</ul>
		</div>
	</main>

	<script type="text/javascript">
		var user_actif = "<?php echo $_SESSION['user_id']; ?>";
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script
  		src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  		integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  		crossorigin="anonymous">
  	</script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./src/js/main.js"></script>
	<script type="text/javascript" src="./src/js/drag_drop.js"></script>
	<?php if ( $type == 'collaboratif') :?>
		<script type="text/javascript" src="./src/js/synchronisation.js"></script>
	 <?php endif; ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>