<?php 

	require_once './Models/Model.php';
	require_once './Models/model_account.php';

	class controller_account
	{
		public $model_account;

		public function __construct()
		{
			if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
				$this->mon_compte();
			}
		}

		public function mon_compte() 
		{
			
			/* Redirection si user non connecté */
				$this->model_account = new model_account();
				$information = $this->model_account->user_info($_SESSION['user_id']);
				require_once './Views/viewAccount.php';
			
		}
	}


 ?>