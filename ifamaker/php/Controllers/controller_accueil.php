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
			else
				$this->welcome();
		}

		public function welcome() 
		{	
			$insert_user = '';
			require_once './Views/viewHome.php';
		}

		public function register() 
		{	
			$this->model_user = new model_user();
			$insert_user = $this->model_user->insert_user();

			require_once './Views/viewHome.php';
		}
	}


 ?>