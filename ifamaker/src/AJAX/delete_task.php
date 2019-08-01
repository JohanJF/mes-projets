<?php
    include 'connexion.php';

    /**
     * supprime une tache précise dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_task']))
         {
            $id_task = $_POST['id_task'];
            $result = connexion()->prepare('DELETE FROM task WHERE id_task = :id_task');
            $result->execute(
                                 array(
                                    'id_task' => $id_task
                                )
                            );
            echo 'Success';
            
        }
        else
        {
            echo 'Failed';
        }
    
    } catch (PDOException $e) 
        {
            echo "Une erreur s'est produite";
        }

?>