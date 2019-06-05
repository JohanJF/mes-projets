<?php 

	require_once './Models/Model.php';
	require_once './Models/model_perso.php';

	class controller_perso 
	{
		public $model_perso;


		public function __construct()
		{
			$this->perso();	
		} 
			

		public function perso() 
		{	
			require_once './Views/viewPerso.php';
		}
	}

 ?>