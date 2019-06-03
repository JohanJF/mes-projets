<?php 

	require_once './Models/Model.php';
	require_once './Models/model_user.php';

	class controller_accueil
	{
		public $model_user;

		public function __construct()
		{
						echo $_SESSION['auth'];
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
			$insert_user = '';
			$information = '';
			require_once './Views/viewHome.php';
		}

		public function register() 
		{	
			$information = '';
			$this->model_user = new model_user();
			$insert_user = $this->model_user->insert_user();

			require_once './Views/viewHome.php';
		}

		public function login()
		{
			$insert_user = '';
			$this->model_user = new model_user();
			$information = $this->model_user->connexion_user();

			require_once './Views/viewHome.php';
		}
	}


 ?>