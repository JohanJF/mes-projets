<?php 


class model_projet extends Model
{
	
	public function mes_listes()
	{
		$mes_listes = $this->select_req('
				SELECT * 
				FROM list
				INNER JOIN board_user ON list.id_board_foreign = board_user.id_board_foreign
				WHERE board_user.id_board_foreign = ' . $_GET['id'] . ' AND activation = 1 AND id_user_foreign = ' . $_SESSION['user_id'] . ' ORDER BY position ASC' 
		);

		$mes_listes->setFetchMode(PDO::FETCH_ASSOC);

		$tab = [];


		foreach ($mes_listes as $row) 
		{
			$liste = [];
			$liste[0]= $row['id_list'];
			$liste[1]= $row['title'];
			$liste[2]= $row['id_board_foreign'];

			$mes_taches = $this->select_req('
				SELECT * 
				FROM task WHERE id_list_foreign ='.$liste[0]. ' ORDER BY position ASC');
			$mes_taches->setFetchMode(PDO::FETCH_ASSOC);

			foreach ($mes_taches as $row2) 
			{
				$liste[3][] = $row2;
			}
			
			$tab[] = $liste;
		}

		
		return $tab;
	}

	public function board_title()
	{
		$board = $this->select_req('
				SELECT * 
				FROM board 
				INNER JOIN board_user ON id_board = board_user.id_board_foreign
				WHERE id_board = ' . $_GET['id'] . ' AND activation = 1 AND id_user_foreign = ' . $_SESSION['user_id'] 
		);

		return $board->fetch();
	}

	public function verif_type()
	{
		$type = $this->select_req('
				SELECT type
				FROM board
				WHERE id_board = ' . $_GET['id']
			);

		$type->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($type as $row) 
		{
			if ($row['type'] == 'collaboratif') 
			{
				return $row['type'];
			}
		}
	}

	public function collaborateurs()
	{
		$type = $this->select_req('
				SELECT *
				FROM user
				INNER JOIN board_user ON user_id = id_user_foreign
				WHERE id_board_foreign = ' . $_GET['id'] . ' AND activation = 1 '
			);

		$type->setFetchMode(PDO::FETCH_ASSOC);
		
		return $type;
	}

	public function nb_notif()
	{
		/* Récupère le nb de notifications */
		$activation = $this->select_req('
				SELECT COUNT(activation)
				FROM board_user
				WHERE id_user_foreign = ' . $_SESSION['user_id'] . ' AND activation = 0'
			);

		$activation->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($activation as $row) 
		{
			return $row['COUNT(activation)'];		
		}
	
	}

	public function invit_notif()
	{
		/* methode qui recupère le nom du tableau où l'user est invité */
		$activation = $this->select_req('
				SELECT *
				FROM board
				INNER JOIN board_user ON id_board = id_board_foreign 
				WHERE id_user_foreign = ' . $_SESSION['user_id'] . ' AND activation = 0 AND consult = "not consulted"'
			);

		$activation->setFetchMode(PDO::FETCH_ASSOC);

		return $activation;
	}

	public function join_tab()
	{
		/* methode qui permet d'accepter un tableau collaboratif via popover notifications */
		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $token_exist = $this->select_req('
				SELECT * 
				FROM board_user
				WHERE id_board_foreign = ' . $_GET['id'] . ' AND activation = 0 AND id_user_foreign = ' . $_SESSION['user_id'] 
		);

		$token_exist->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($token_exist as $row) 
		{
			if ($_GET['token'] == $row['token']) 
			{
				$join = $conn->prepare('
					UPDATE board_user 
					SET activation = 1 
					WHERE id_board_foreign = :board AND activation = 0 AND id_user_foreign = :user' 
				);

				$join->execute(
			                array(
			                    'board' => $_GET['id'],
			                    'user' => $_SESSION['user_id'] 
			                )
		        );
			}
		}
		
	}

}

?>