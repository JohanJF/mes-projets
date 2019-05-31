<?php 

	require_once './Models/model.php';
	require_once './Models/model_accueil.php';
	require_once './Models/model_book.php';

	function controllerBooks() {
		$modelAccueil = new model_accueil();
		$books = $modelAccueil->getBooks();
		require_once './Views/viewHome.php';
	}

	function controllerBook() {
		$modelBook = new model_book();
		$book = $modelBook->getBook($_GET['id']);
		$author = $modelBook-> getAuthor($_GET['id']);
		
		require_once './Views/viewBook.php';
	}

?>