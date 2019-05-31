<?php 

	require_once './Models/Model.php';
	require_once './Models/model_book.php';

	class controller_book
	{
		public $modelAccueil;

		public function __construct($url)
		{
			if (isset($url) && (isset($_GET['id'])) ) 
				$this->books($_GET['id']);
			else
				throw new Exception("Pas le bon nombre de paramètre");
		}

		public function books($bookID) 
		{
			$model_book = new model_book();
			$book = $model_book->getBook($bookID);
			$author = $model_book->getAuthor($bookID);
			
			require_once './Views/viewBook.php';
		}
	}


 ?>