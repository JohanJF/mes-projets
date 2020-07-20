<?php ob_start(); ?>
<?php $title = 'Ifamaker - Error'; ?>

<div class="alert alert-danger" role="alert">
	 <h1><u>Votre requête est indisponible !</u></h1>
	 <p><?= $msg ?></p>
</div>

<?php 
	$content = ob_get_clean();
	require_once './Views/viewTemplate.php';
 ?>