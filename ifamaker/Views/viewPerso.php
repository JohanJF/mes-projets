<?php $title = 'Ifamaker - Tableau de bord'; ?>

<?php ob_start();?>
<div class="container welcome">

				<!--CONTENU ARTICLE-->

	<div class="row jumbotron bg-section border border-dark" style="max-height: 75vh;">
		<div class="col">
			<nav class="container">
				<h3 class="text-center"><b>Tableaux</b></h3>
					<div class="nav nav-tabs row" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active col text-center nav-title" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Personnel</b></a>
						<a class="nav-item nav-link col text-center nav-title" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b>Collaboratif</b></a>
				  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active mx-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<!-- PERSONNEL -->

					<div class="bg-white border border-dark rounded my-2 container px-5">
						<div class="row">
							<article class="col-12 text-center">
								<h5>Créer un tableau personnel</h5>
							</article>
							<article class="col-12">
								<label>Créez un tableau où vous serez le seul à consulter et modifier</label>
							</article>
							<form class="col-12 text-center" action="?rqt=perso&user=<?=$_SESSION['user_id']?>" method="POST">
								 <div class="input-group mb-3">
								  <input type="text" class="form-control" placeholder="Nom tableau" name="tableau_perso">
								  <div class="input-group-append">
								    <input type="submit" class=" btn" value="valider" name="submit_tab_perso" />
								  </div>
								</div>
							</form>
						</div>
					</div>

					<div class="container">
						<div class="row justify-content-between" style="max-height: 40vh; overflow-y: auto; text-overflow: nowrap;">
							<?php 
								foreach($mes_tableaux_perso as $mes_tableaux_perso):
							?>
									<div class="card col-3 mx-2 mt-2 float-left" style="width: 10rem;">
										<small class="pt-2 d-flex justify-content-end">
											<input class="text-right" type="image" src="./src/img/modifier_small.png">
										</small>
									  <div class="card-body">
									    <h5 class="card-title" id="tableau-<?= $mes_tableaux_perso['id_board'] ?>"><?= $mes_tableaux_perso['title'] ?></h5>
									    <div class="container">
									    	<div class="row">
									    		<a href="?rqt=projet&id=<?= $mes_tableaux_perso['id_board'] ?>" class="col btn btn-sm btn-outline-success">Consulter</a>
									    		<button id="<?= $mes_tableaux_perso['id_board'] ?>" class="col btn btn-sm btn-outline-danger btn_board">Supprimer</button>
									    	</div>
									    </div>
									  </div>
									</div>
							<?php
								endforeach;
							 ?>
						</div>							
					</div>
						
						
					

					<!-- PERSONNEL -->
				</div>
				<div class="tab-pane fade mx-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<!-- COLLABORATIF -->

					<div class="bg-white border border-dark rounded my-2 container px-5">
						<div class="row">
							<article class="col-12 text-center">
								<h5>Créer un tableau collaboratif</h5>
							</article>
							<article class="col-12">
								<label>Créez un tableau où vous et votre team pourrait consulter et modifier</label>
							</article>
							<form class="col-12 text-center" action="?rqt=perso&user=<?=$_SESSION['user_id']?>" method="POST">
								 <div class="input-group mb-3">
								  <input type="text" class="form-control" placeholder="Nom tableau" name="tableau_collab">
								  <div class="input-group-append">
								    <input type="submit" class=" btn" value="valider" name="submit_tab_collab" />
								  </div>
								</div>
							</form>
						</div>
					</div>

					<div class="container">
						<div class="row justify-content-between" style="max-height: 40vh; overflow-y: auto; text-overflow: nowrap;">
							<?php 
								foreach($mes_tableaux_collab as $mes_tableaux_collab):
							?>
									<div class="card col-3 mx-2 mt-2 float-left" style="width: 10rem;">
										<small class="pt-2 d-flex justify-content-end">
											<input class="modifier_tab text-right" type="image" src="./src/img/modifier_small.png">
										</small>
									  <div class="card-body">
									    <h5 class="card-title" id="tableau-<?= $mes_tableaux_collab['id_board'] ?>">
									    	<?= $mes_tableaux_collab['title'] ?>
									    </h5>
									    <div class="container">
									    	<div class="row">
									    		<a href="?rqt=projet&id=<?= $mes_tableaux_collab['id_board'] ?>" class="btn btn-outline-success">Consulter</a>
									    		<button id="<?= $mes_tableaux_collab['id_board'] ?>" class="col btn btn-sm btn-outline-danger btn_board">Supprimer</button>
									  		</div>
									  	</div>
									  </div>
									</div>
							<?php
								endforeach;
							 ?>
							 <p>Hello world</p>
						</div>							
					</div>

					<!-- COLLABORATIF -->
				</div>
			</div>
		</div>
	</div>
				<!--CONTENU ARTICLE-->

</div>

<!-- EMPLACEMENT FENETRES MODALES -->

			<span id="fenetre_modal_viewPerso">
					<div class="modal fade" id="modal_viewPerso" tabindex="-1" role="dialog" aria-labelledby="viewPersoTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content bg-grey">
					      <div class="modal-header">
					        <h5 class="modal-title modal_titre_viewPerso" id="exampleModalLongTitle"></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        </button>
					      </div>
					      <div class="modal-body">
					        <table class="table">
							  <tbody id="modal_body_viewPerso">	
							  </tbody>
							</table>
					      </div>
					      <div class="modal-footer">
							<button class="btn btn-sauvegarder" type="button" data-dismiss="modal">Fermer</button>
					      </div>
					    </div>
					  </div>
					</div>
			</span>	

			<!-- EMPLACEMENT FENETRES MODALES -->
<?php
	$content = ob_get_clean(); 
	require('viewTemplateConnected.php'); 
?>