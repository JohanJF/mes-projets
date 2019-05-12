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
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<title>IfaMaker</title>
	<script type="text/javascript" src="js/main.js"></script>
	<style type="text/css">

		.tache_detail:hover { 
			background-color: grey; 
			color : white;
		}

		a.tache { 
			text-decoration: none;
		 	color: black;
		 }
		 
	</style>
</head>
<body>

	<!--HEADER-->

	<header class="container-fluid">
		<div class="row my-2 border border-info rounded bg-light">
			<div class="col">
				<h1 class="text-center">IfaMaker</h1>
				<?php include 'php/connexion_script.php'; ?>
			</div>
		</div>
	</header>