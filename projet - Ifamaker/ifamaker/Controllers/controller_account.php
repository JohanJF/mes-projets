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
			if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
			{
				header('Location: http://localhost/mes-projets/ifamaker/index.php');
			} 
			else
			{
				/* modification informations user */
				$this->model_account = new model_account();
				$information = $this->model_account->user_info($_SESSION['user_id']);

				$_SESSION['nb_notif'] = $this->model_account->nb_notif(); // récupération nb notifications
				$ma_notif = $this->model_account->invit_notif(); // contenu popover notifications
				require_once './Views/viewAccount.php';
			}
			
		}
	}


 ?>