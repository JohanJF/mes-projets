<?php $title = 'Ifamaker - Tableau de bord'; ?>

<?php ob_start();?>
<div class="container welcome">

				<!--CONTENU ARTICLE-->

	<div class="row jumbotron bg-section h-75 border border-dark">
		<div class="col">
			<nav class="container">
					<div class="nav nav-tabs row" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active col text-center nav-title" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Tableaux</b></a>
						<a class="nav-item nav-link col text-center nav-title" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b>Collaboratif</b></a>
				  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active mx-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<!-- PERSONNEL -->

					<div class="bg-IFA border border-IFA rounded my-2 container px-5">
						<div class="row">
							<article class="col-12 text-center">
								<label class="text-white text-center">Créer un tableau personnel</label>
							</article>
							<form class="col-12 text-center" action="?rqt=perso&user=<?=$_SESSION['user_id']?>" method="POST">
								 <div class="input-group mb-3">
								  <input type="text" class="form-control" placeholder="Nom tableau">
								  <div class="input-group-append">
								    <input type="submit" class=" btn" id="" />
								  </div>
								</div>
							</form>
						</div>
					</div>

					<!-- PERSONNEL -->
				</div>
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<!-- COLLABORATIF -->

					<div class="bg-IFA border border-IFA rounded my-2 container px-5">
						<div class="row">
							<article class="col-12 text-center">
								<label class="text-white text-center">Créer un tableau collaboratif</label>
							</article>
							<form class="col-12 text-center" action="?rqt=perso&user=<?=$_SESSION['user_id']?>" method="POST">
								 <div class="input-group mb-3">
								  <input type="text" class="form-control" placeholder="Nom tableau">
								  <div class="input-group-append">
								    <input type="submit" class=" btn" id="" />
								  </div>
								</div>
							</form>
						</div>
					</div>

					<!-- COLLABORATIF -->
				</div>
			</div>
		</div>
	</div>
				<!--CONTENU ARTICLE-->

</div>
<?php
	$content = ob_get_clean(); 
	require('viewTemplateConnected.php'); 
?>