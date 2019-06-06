<?php 

	require_once './Models/Model.php';
	require_once './Models/model_user.php';

	class controller_accueil
	{
		public $model_user;

		public function __construct()
		{
			
			if (isset($_POST['submit_inscription']))
			{
				$this->register();
			}
			else if (isset($_POST['submit_connexion'])) 
			{
				$this->login();
			}
			else
				$this->welcome();
		} 
			

		public function welcome() 
		{	
			if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
				/* Redirection si user non connecté */
				if(isset($_SESSION['auth']) && $_SESSION['auth'] === true)
				{
					header('Location: http://localhost/mes-projets/ifamaker/index.php?rqt=perso');
				}
				else
				{
					$insert_user = '';
					$connexion = '';
					require_once './Views/viewHome.php';
				}
			}
		}

		public function register() 
		{	
			$connexion = '';
			$this->model_user = new model_user();
			$insert_user = $this->model_user->insert_user();

			require_once './Views/viewHome.php';
		}

		public function login()
		{
			$insert_user = '';
			$this->model_user = new model_user();
			$connexion = $this->model_user->connexion_user($_POST['email_connexion'],$_POST['mdp_connexion'],false);

			require_once './Views/viewHome.php';
		}
	}


 ?>