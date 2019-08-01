<?php 
	include 'connexion.php';

function updateDataDrag($current_position,$desired_position,$id_sticker,$id_liste,$idListeStart=0,$connexion)
{
			// Determine if the user is moving the item up or down in the listing

		$move= $id_liste != $idListeStart ? 'slide' : '';
		$move.= $desired_position > $current_position ? 'down' : 'up';
		

		if ($move == 'down') 
		{
			
				//on réduit de 1 toutes les position qui sont entre la position courante et la position désiré
			$query= $connexion->prepare("
				UPDATE task 
				SET position = position-1 
				WHERE position > :current_position AND position <= :desired_position AND id_list_foreign = :id_liste
			");

			$query->execute(
				array(
					'current_position'=>$current_position,
					'desired_position'=>$desired_position,
					'id_liste'=>$id_liste
			));

				//on affecte la sticker_position désiré au sticker
			$query= $connexion->prepare("
				UPDATE task SET position = :desired_position WHERE id_task = :id_sticker
			");

			$query->execute(
				array(
					'desired_position'=>$desired_position,
					'id_sticker'=>$id_sticker
				));

		}
		elseif ($move == 'up') {
			

				//on réduit de 1 toutes les position qui sont entre la position courante et la position désiré
			$query= $connexion->prepare("
				UPDATE task 
				SET position = position+1 
				WHERE position < :current_position AND position >= :desired_position AND id_list_foreign = :id_liste"
			);

			$query->execute(
				array(
					'current_position'=>$current_position,
					'desired_position'=>$desired_position,
					'id_liste'=>$id_liste
			));

				//on affecte la sticker_position désiré au sticker
			$query= $connexion->prepare("
				UPDATE task 
				SET position = :desired_position 
				WHERE id_task = :id_task
			");

			$query->execute(
				array(
				'desired_position'=>$desired_position,
				'id_task'=>$id_sticker
			));
		}
		elseif ($move== 'slidedown' || $move== 'slideup') {
			
				//on change la liste du sticker si celui-ci est passé d'une liste à l'autre
			$query= $connexion->prepare("UPDATE task SET id_list_foreign = :id_liste WHERE id_task = :id_task");
			$query->execute(array('id_liste'=>$id_liste,'id_task'=>$id_sticker));

				//on réduit de 1 la position de tout les sticker strictement supérieurs à la position courante de la liste de départ
			$query= $connexion->prepare("UPDATE task SET position = (position -1) WHERE position > :current_position
				AND id_list_foreign = :id_liste");
			$query->execute(array('current_position'=>$current_position,'id_liste'=>$idListeStart));

				//on incrémente de 1 toutes les positions de la liste d'arrivé comprisent entre la position courante et la position désiré
			$query= $connexion->prepare("UPDATE task SET position = (position +1) WHERE position >= :desired_position
				AND id_list_foreign = :id_liste");
			$query->execute(array('desired_position'=>$desired_position,'id_liste'=>$id_liste));

				//on affecte au sticker la position désiré
			$query= $connexion->prepare("UPDATE task SET position = :desired_position WHERE id_task = :id_task");
			$query->execute(array('desired_position'=>$desired_position,'id_task'=>$id_sticker));
		}

		echo $move;
	}

try
{ 

    updateDataDrag($_GET['current_position'],$_GET['desired_position'],$_GET['id'],$_GET['id_liste_final'],$_GET['id_liste_depart'],connexion());
    
} catch (Exception $e) {
   echo $e->getMessage();
}



 ?>
