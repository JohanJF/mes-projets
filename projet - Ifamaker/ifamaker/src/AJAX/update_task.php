<?php
    include 'connexion.php';

    /**
     * Modifie une tâche précise dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_task']))
         {
            $id_task = $_POST['id_task'];
            $title = htmlspecialchars($_POST['task_title']);
            $result = connexion()->prepare('UPDATE task SET title = :title  WHERE id_task = :id_task');
            $result->execute(
                    array(
                        'title' => $title,
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