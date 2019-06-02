<?php 

	require_once './Models/Model.php';
	require_once './Models/model_register.php';

	class controller_register
	{
		public $modelAccueil;

		public function __construct()
		{
			$this->register();
		}

		public function register() 
		{	
			require_once './Views/viewRegister.php';
		}
	}


 ?>