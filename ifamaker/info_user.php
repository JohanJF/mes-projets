<?php 
	include 'header.php';

	if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
	{
		header('Location: http://localhost/mes-projets/ifamaker/connexion.php');
	}

?>

<div class="container">

				<!--CONTENU ARTICLE-->

					<!-- SCRIPT -->

					<?php include 'php/user_script.php'; ?>

					<!-- SCRIPT -->

				<!--CONTENU ARTICLE-->

	</div>

<?php include 'footer.php' ?>