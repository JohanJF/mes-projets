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
}

 ?>