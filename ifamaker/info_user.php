<?php 
	include 'header.php';

	if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
	{
		header('Location: http://localhost/mes-projets/ifamaker/connexion.php');
	}

?>

<div class="container">
		<div class="row">
			<article class="container col-10 border border-info  my-5"  style="height: auto">

				<!--CONTENU ARTICLE-->

					<!-- SCRIPT -->

					<?php include 'php/user_script.php'; ?>

					<!-- SCRIPT -->

				<!--CONTENU ARTICLE-->

			</article>
		</div>
	</div>

</body>
</html>