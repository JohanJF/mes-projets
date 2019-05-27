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
	<title>IfaMaker</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/drag_drop.js"></script>
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
	                <article class="col-4 border-left py-5">
	                  <h1 class="text-light">Collaboratif</h1>
	                </article>
	                <article class="col-4 border-left py-5">
	                	<h1 class="text-light">Tableaux</h1>
	                </article>
	                <a href="info_user.php" class="col-4 border-left py-5 header_nav">
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
		              <img src="img/menu.png"/>
		            </a>
		         </article>
				<div class="col-9 px-3 text-center">
					<a href="page_table.php"><img src="img/logo.png" /></a>
					<?php include 'php/connexion_script.php'; ?>
				</div>
<?php 

				if (isset($_SESSION['auth']) && $_SESSION['auth'] == true)
				{
					/* Affiche accordeon header + bouton déconnexion si utilisateur connecté */
?>
				<div class="col-2 text-right container">
					<div class="row">
						<div class="col">
							<span class="border rounded-circle px-2 py-3">Photo</span>
						</div>
					<form action="connexion.php" method="POST" class="col">
						<input class="btn btn-outline-danger btn-sm" type="submit" name="deconnexion" value="Déconnexion" />
					</form>
					</div>
				</div>
<?php
				}
?>
	        </section>
	      </nav>
	    </div>

		<!-- HEADER -->
	</header>