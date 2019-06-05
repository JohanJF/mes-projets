<?php 

	require_once './Models/Model.php';
	require_once './Models/model_projet.php';

	class controller_projet
	{
		public $model_projet;

		public function __construct()
		{
			if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
				$this->mon_projet();
			}
		}

		public function mon_projet() 
		{
			
			/* Redirection si user non connecté */
			if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
			{
				header('Location: http://localhost/mes-projets/ifamaker/index.php');
			} 
			else{
				require_once './Views/viewProjet.php';
			}
			
		}
	}


 ?>