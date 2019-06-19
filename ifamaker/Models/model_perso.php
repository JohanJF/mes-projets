<?php 


class model_perso extends Model
{
	
	public function insert_tableau_perso()
	{
		if (isset($_POST['submit_tab_perso'])) 
		{
			/* insert dans la table board BDD */
			$title = $_POST['tableau_perso'];
			$connexion = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$res = $connexion->prepare("INSERT INTO board(title) VALUES (:title)");
			$res->execute(
				array(
						'title' => $title
					)
			);

			/* insert dans la table board_user BDD */
			$res = $this->select_req('SELECT * FROM board');
			while ($row = $res->fetch()) 
			{
			    $id_board = $row['id_board'];
			}

			$res = $connexion->prepare("INSERT INTO board_user(id_user_foreign,id_board_foreign) VALUES (:id_user,:id_board)");
			$res->execute(
				array(
						'id_user' => $_GET['user'],
						'id_board'=> $id_board
					)
			);
		}
	}

	public function mes_tableaux_perso()
	{
		/* affiche les tableaux créés par l'utilisateur */
		$mes_tableaux = $this->select_req('
				SELECT * 
				FROM board
				INNER JOIN board_user ON id_board = id_board_foreign
				WHERE id_user_foreign = ' . $_GET['user']
			);

		return $mes_tableaux;
	}
}

 ?>