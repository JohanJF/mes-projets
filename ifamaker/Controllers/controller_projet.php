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
				$this->model_projet = new model_projet();
				$mes_listes = $this->model_projet->mes_listes();
				
				$board = $this->model_projet->board_title();

				$type = $this->model_projet->verif_type();
				require_once './Views/viewProjet.php';
			}
			
		}
	}


 ?>