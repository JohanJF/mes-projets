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
	<script type="text/javascript" src="./src/js/main.js"></script>
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
					<img src="./src/img/logo.png" />
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
	<?= $content ?>
	<footer id="footer" class="page-footer fixed-bottom bg-IFA text-white border-top border-IFA">
		<!-- FOOTER -->
		  <!-- Copyright -->
		  <div class="footer-copyright text-center py-3 text-grey">
			©<b>Ifamaker 2019</b>, Tous droits réservés.
		  </div>
		  <!-- Copyright -->
		<!-- FOOTER -->
	</footer>

	<script type="text/javascript" src="./src/js/drag_drop.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>