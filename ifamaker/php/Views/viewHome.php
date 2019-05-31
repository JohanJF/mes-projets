<?php ob_start(); ?>
<h1>Bienvenue sur la librairie en ligne</h1>
<h2><u>Voici les livres disponibles :</u></h2>

<?php 
	foreach ($books as $book):
		?>
			<h3>
				<a href="?rqt=book&id=<?= $book['book_id'] ?>">
					<?= $book['title'] ?>		
				</a>
			</h3>
			<span><?= $book['date'] ?></span>
		<?php
	endforeach;
 
	$content = ob_get_clean();

	require_once './Views/viewTemplate.php';
 ?>











