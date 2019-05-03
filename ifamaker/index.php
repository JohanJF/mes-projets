	<?php include 'header.php'; ?>
	<!-- MAIN -->

	<main class="container">
		<div class="row" id="ma_base">
			<article class="col">
				<section class="card" style="width: 16rem;">
				  <div class="card-body">
			    	<h5 class="card-title">Ma table</h5>
			    	<div class="card-text my-2">
				    	<ul class="list-group">
						<li class="list-group-item">
						  	<a href="#maTache1" data-toggle="modal" >
						  		<h6>Tâche 1</h6>
						  	</a>
						  	<small>Faire les courses</small>
								  	<!--MODAL DEBUT -->
								<div class="modal fade" id="maTache1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Tâche 1</h5>
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
								<!--FIN-->
						  </li>
						  <li class="list-group-item">
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
						</ul>	
				    </div>
				    <button href="#" class="btn btn-primary card-link">Modifier</button>
				    <button href="#" class="btn btn-danger card-link">Supprimer</button>
				  </div>
				</section>
			</article>

			<article class="col my-3" id="nouvelle_table">
				<section class="card" style="width: 16rem;">
				  <div class="card-body">
			    	<h5 class="card-title">Ma nouvelle table</h5>
			    	<div class="card-text my-2">
			    	 	<div class="input-group input-group-sm">
		    	 			 <input type="text" class="form-control" placeholder="Titre" id="titre_table" onkeypress="if (event.keyCode == 13) creer_table()" />
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="button"  onclick="creer_table()">Créer</button>
							  </div>
						</div>
				    </div>
				  </div>
				</section>
			</article>
		</div>	
	</main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>