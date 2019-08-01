<?php 

function updateDataDrag($current_position,$desired_position,$id_liste,$id_sticker,$idListeStart=0,$connexion,$id_board)
{
			// Determine if the user is moving the item up or down in the listing

		$move= $id_liste != $idListeStart ? 'slide' : '';
		if (!isset($idListeStart)) { $move='liste';}
		$move.= $desired_position > $current_position ? 'down' : 'up';
		

		if ($move == 'down') {
			
				//on réduit de 1 toutes les position qui sont entre la position courante et la position désiré
			$query= $connexion->prepare("UPDATE task SET position = :current_position WHERE position = :desired_position 
				
				AND id_list_foreign = :id_liste");
			$query->execute(array('current_position'=>$current_position,'desired_position'=>$desired_position,'id_liste'=>$id_liste));

				//on affecte la sticker_position désiré au sticker
			$query= $connexion->prepare("UPDATE task SET position = :desired_position WHERE id_sticker = :id_sticker");
			$query->execute(array('desired_position'=>$desired_position,'id_sticker'=>$id_sticker));

		}
		elseif ($move == 'up') {
			

				//on réduit de 1 toutes les position qui sont entre la position courante et la position désiré
			$query= $connexion->prepare("UPDATE task SET position = :current_position WHERE position = :desired_position 
				AND id_list_foreign = :id_liste");
			$query->execute(array('current_position'=>$current_position,'desired_position'=>$desired_position,'id_liste'=>$id_liste));

				//on affecte la sticker_position désiré au sticker
			$query= $connexion->prepare("UPDATE task SET position = :desired_position WHERE id_task = :id_task");
			$query->execute(array('desired_position'=>$desired_position,'id_task'=>$id_sticker));
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

		elseif ($move== 'listedown' || $move== 'listeup') {
				//on met à 0 la postion la liste qui comporte la position désiré et qui se trouve dans le tableau courant afin de la récupére plus loin par ce chiffre
			$query= $connexion->prepare("UPDATE list SET position = 0 WHERE position = :desired_position AND id_board_foreign = :id_board");
			$query->execute(array('desired_position'=>$desired_position,'id_board'=>$id_board));

				//on assigne la position désiré à la liste que l'on déplace
			$query= $connexion->prepare("UPDATE list SET position = :desired_position WHERE id_list = :id AND id_board_foreign = :id_board");
			$query->execute(array('desired_position'=>$desired_position,'id'=>$id_liste,'id_board'=>$id_board));

				//on peut maintenant affecter l'ancienne position de notre liste à celle que l'on a mis à 0
			$query= $connexion->prepare("UPDATE list SET position = :current_position WHERE position = 0 AND id_board_foreign = :id_board");
			$query->execute(array('current_position'=>$current_position,'id_board'=>$id_board));
		}
		echo $move;
	}

try
{ 
	$connexion = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    updateDataDrag($_GET['current_position'],$_GET['desired_position'],$_GET['id'],null,null,$connexion,$_GET['id_board']);
    
} catch (Exception $e) {
   echo $e->getMessage();
}



 ?>
