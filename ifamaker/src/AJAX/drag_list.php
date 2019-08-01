<?php 
	include 'connexion.php';

function updateDataDrag($current_position,$desired_position,$id_liste,$id_board,$connexion)
{
		// Determine if the user is moving the item up or down in the listing
		$move= $desired_position > $current_position ? 'listedown' : 'listeup';

		if ($move== 'listedown') 
		{

				//on peut maintenant affecter l'ancienne position de notre liste à celle que l'on a mis à 0
			$query= $connexion->prepare("
				UPDATE list 
				SET position = position-1 
				WHERE position > :current_position AND position <= :desired_position AND id_board_foreign = :id_board
				");
			$query->execute(
				array(
					'current_position'=>$current_position,
					'desired_position'=>$desired_position,
					'id_board'=>$id_board
			));

			//on assigne la position désiré à la liste que l'on déplace
			$query= $connexion->prepare("UPDATE list SET position = :desired_position WHERE id_list = :id AND id_board_foreign = :id_board");
			$query->execute(array('desired_position'=>$desired_position,'id'=>$id_liste,'id_board'=>$id_board));
		}
		elseif ($move== 'listeup')
		{
			//on peut maintenant affecter l'ancienne position de notre liste à celle que l'on a mis à 0
			$query= $connexion->prepare("
				UPDATE list 
				SET position = position+1 
				WHERE position < :current_position AND position >= :desired_position AND id_board_foreign = :id_board
				");
			$query->execute(
				array(
					'current_position'=>$current_position,
					'desired_position'=>$desired_position,
					'id_board'=>$id_board
			));

			//on assigne la position désiré à la liste que l'on déplace
			$query= $connexion->prepare("UPDATE list SET position = :desired_position WHERE id_list = :id AND id_board_foreign = :id_board");
			$query->execute(array('desired_position'=>$desired_position,'id'=>$id_liste,'id_board'=>$id_board));
		}
		echo $move;
	}

try
{ 

    updateDataDrag($_GET['current_position'],$_GET['desired_position'],$_GET['id'],$_GET['id_board'],connexion());
    
} catch (Exception $e) {
   echo $e->getMessage();
}



 ?>
