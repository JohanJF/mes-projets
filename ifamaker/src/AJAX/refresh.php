<?php 
  include 'connexion.php';

/**
 * Selectionne le nb de listes et de taches présentes dans la BDD et compare au nb de listes et taches présentes dans ViewProjet
 */

  try {

        $result = connexion()->prepare('SELECT COUNT(title) FROM list WHERE id_board_foreign = '. $_POST['id_board']);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);
       
       foreach ($result as $row) 
       {
       		$liste = $row['COUNT(title)'];
       }

       //-------------------------------------------------------------------

        $result2 = connexion()->prepare('SELECT COUNT(task.title) 
        						   FROM task
        						   INNER JOIN list ON id_list_foreign = id_list
        						   WHERE id_board_foreign = '.$_POST['id_board']
        						 );
        $result2->execute();

        $result2->setFetchMode(PDO::FETCH_ASSOC);
       
       foreach ($result2 as $row) 
       {
       		$task = $row['COUNT(task.title)'];
       }

       if ($liste != $_POST['nb_list'] || $task != $_POST['nb_task']) 
       {
       		echo 'success';
       }
       
     } catch (PDOException $e) 
      {
          echo "Une erreur s'est produite";
      }
    
 ?>