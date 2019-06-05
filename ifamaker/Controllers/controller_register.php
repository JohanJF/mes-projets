<?php 

	require_once './Models/Model.php';
	require_once './Models/model_register.php';

	class controller_register
	{
		public $model_register;

		public function __construct()
		{
			$this->register();
		}

		public function register() 
		{	
			if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
				/* Redirection si user non connecté */
				if(isset($_SESSION['auth']) && $_SESSION['auth'] === true)
				{
					header('Location: http://localhost/mes-projets/ifamaker/index.php?rqt=projet');
				}
				else
				{
					require_once './Views/viewRegister.php';
				}
			}
		}
	}


 ?>