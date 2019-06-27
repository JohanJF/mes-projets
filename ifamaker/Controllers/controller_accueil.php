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
			else if (isset($_GET['login']))
			{
				$this->confirm();
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
					header('Location: http://localhost/mes-projets/ifamaker/index.php?rqt=perso&user='.$_SESSION['user_id']);
				}
				else
				{
					$insert_user = '';
					$connexion = '';
					$confirm_mail ='';
					require_once './Views/viewHome.php';
				}
			}
		}

		public function register() 
		{	
			$connexion = '';
			$confirm_mail ='';
			$this->model_user = new model_user();
			$insert_user = $this->model_user->insert_user();

			$this->model_user = new model_user();
			$this->model_user->mail();

			require_once './Views/viewHome.php';
		}

		public function confirm() 
		{	
			if ($this->verif_register() == $_GET['login'])	
			{
				$connexion = '';
				$insert_user = '';
				$this->model_user = new model_user();
				$confirm_mail = $this->model_user->confirm_mail();	
				if (isset($_POST['submit_connexion'])) 
				{
					$this->login();
					header('Refresh: 1; URL=http://localhost/mes-projets/ifamaker/index.php?rqt=perso&user='.$_SESSION['user_id']);
				}	

				require_once './Views/viewHome.php';
			}
			else
			{
				throw new Exception("Erreur");
			}
				
		}

		public function login()
		{
			$insert_user = '';
			$confirm_mail ='';
			$this->model_user = new model_user();
			$connexion = $this->model_user->connexion_user($_POST['email_connexion'],$_POST['mdp_connexion'],false);

			require_once './Views/viewHome.php';
		}

		public function verif_register()
		{
			$this->model_user = new model_user();
			return $this->model_user->verif_token();
		}
			
	}


 ?>