<?php 


class model_projet extends Model
{
	
	public function mes_listes()
	{
		$mes_listes = $this->select_req('
				SELECT * 
				FROM list WHERE id_board_foreign = ' . $_GET['id']);

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
				FROM task WHERE id_list_foreign ='.$liste[0]);
			$mes_taches->setFetchMode(PDO::FETCH_ASSOC);

			foreach ($mes_taches as $row2) 
			{
				$liste[3][] = $row2;
			}
			
			$tab[] = $liste;
		}

		
		return $tab;
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

}

 ?>