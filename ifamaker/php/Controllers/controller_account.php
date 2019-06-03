<?php 

	require_once './Models/Model.php';
	require_once './Models/model_account.php';

	class controller_account
	{
		public $model_account;

		public function __construct()
		{
			$this->mon_compte();
		}

		public function mon_compte() 
		{
			if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false)
			{
				header('Location: http://localhost/mes-projets/ifamaker/php/index.php');
			} 
			else
				require_once './Views/viewAccount.php';
		}
	}


 ?>