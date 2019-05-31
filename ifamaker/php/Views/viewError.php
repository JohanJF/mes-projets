<?php ob_start(); ?>
<h1><u>Oops ! Something went wrong.</u></h1>
<p><?= $msg ?></p>

<?php 
	$content = ob_get_clean();
	require_once './Views/viewTemplate.php';
 ?>