<?php 


class model_perso extends Model
{
	
	public function insert_tableau_perso()
	{
		if (isset($_POST['submit_tab_perso'])) 
		{
			$title = $_POST['tableau_perso'];
			$connexion = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$res = $connexion->prepare("INSERT INTO board(title) VALUES (:title)");
			$res->execute(
				array(
						'title' => $title
					)
			);
		}
	}

	public function mes_tableaux_perso()
	{
		$mes_tableaux = $this->select_req('
				SELECT * 
				FROM board');

		return $mes_tableaux;


	}
}

 ?>