<?php 

	require_once './Models/Model.php';
	require_once './Models/model_perso.php';

	class controller_perso 
	{
		public $model_perso;


		public function __construct()
		{
			if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
				$this->perso();	
			}
		} 
			

		public function perso() 
		{	
			if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
			{
				header('Location: http://localhost/mes-projets/ifamaker/index.php');
			} 
			else
			{
				require_once './Views/viewPerso.php';
			}
		}
	}

 ?>