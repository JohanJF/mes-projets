<?php ob_start(); ?>
<?php 

	/* permet à l'utilisateur de ne pas retaper infos saisies */

	$mail_login = '';

	if (isset($_POST['submit_connexion'])) 
	{
	 	$mail_login = $_POST['email_connexion'];
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body id="body-not-connected" class="bg-grey">
	<?= $content ?>
</body>
</html>