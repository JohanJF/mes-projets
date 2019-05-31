<?php 

	require_once './Models/Model.php';
	require_once './Models/model_accueil.php';

	class controller_accueil
	{
		public $modelAccueil;

		public function __construct($url)
		{
			if (isset($url) && (count($url)) >1 ) 
				throw new Exception("Pas le bon nombre de paramètre");
			else
				$this->books();
		}

		public function books() 
		{
			$this->modelAccueil = new model_accueil();
			$books = $this->modelAccueil->getBooks();
			
			require_once './Views/viewHome.php';
		}
	}


 ?>