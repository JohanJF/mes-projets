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
				/* Affichage taableaux */
				$this->model_perso = new model_perso();
				$tableau = $this->model_perso->insert_tableau_perso();
				$mes_tableau = $this->model_perso->mes_tableaux_perso();
				require_once './Views/viewPerso.php';
			}
		}
	}

 ?>