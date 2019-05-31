<?php 

class Routeur {
	private $controller;

	public function handle_req(){

		try {
				require_once 'controller_accueil.php';
				$this->controller = new controller_accueil(null);
				
		} catch (Exception $e) {
			$msg = $e->getMessage();
			require_once './Views/viewError.php';
		}
	}

}

 ?>