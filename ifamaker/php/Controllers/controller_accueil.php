<?php 

	require_once './Models/Model.php';
	require_once './Models/model_user.php';

	class controller_accueil
	{
		public $modelAccueil;

		public function __construct()
		{
			$this->welcome();
		}

		public function welcome() 
		{	
			require_once './Views/viewHome.php';
		}
	}


 ?>