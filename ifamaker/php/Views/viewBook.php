<?php ob_start(); ?>
<h1><u>Contenu du bouquin</u></h1>

<h3><?= $book['title'] ?></h3>
<span><?= $book['date'] ?></span>

<p><?= $book['resume'] ?></p>

<span>Auteur : <?= $author['name'] ?></span>

<?php 
	$content = ob_get_clean();
	require_once './Views/viewTemplate.php';
 ?>