<?php 

class Routeur {
	private $controller;

	public function handle_req(){

		try {

			if (isset($_GET['rqt'])) {
				// On récupère les paramètres de l'url
				$ctrler = strtolower($_GET['rqt']);
				$ctrl_class = 'controller_' . $ctrler;
				$ctrl_file = './Controllers/'. $ctrl_class . '.php';

				if (file_exists($ctrl_file)) 
				{
					require_once($ctrl_file);
					$this->controller = new $ctrl_class($_GET['rqt']);
				}else
					throw new Exception("Page introuvable");
					

			} else {
				require_once 'controller_accueil.php';
				$this->controller = new controller_accueil(null);
			}

			
		} catch (Exception $e) {
			$msg = $e->getMessage();
			require_once './Views/viewError.php';
		}
	}

}

 ?>

