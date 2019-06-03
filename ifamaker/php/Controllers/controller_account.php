<?php 

	require_once './Models/Model.php';
	require_once './Models/model_account.php';

	class controller_account
	{
		public $model_account;

		public function __construct()
		{
			$this->connexion();
		}

		public function connexion() 
		{	
			require_once './Views/viewAccount.php';
		}
	}


 ?>