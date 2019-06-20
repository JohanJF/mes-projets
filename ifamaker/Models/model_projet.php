<?php 


class model_projet extends Model
{
	
	public function mes_listes()
	{
		$mes_listes = $this->select_req('
				SELECT * 
				FROM list WHERE id_board_foreign = ' . $_GET['id']);

		return $mes_listes;
	}

	public function mes_taches()
	{
		$mes_taches = $this->select_req('
				SELECT * 
				FROM task WHERE id_list_foreign = 1');

		return $mes_taches;
	}
}

 ?>