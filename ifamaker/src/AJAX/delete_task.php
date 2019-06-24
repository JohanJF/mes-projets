<?php

    /**
     * supprime une tache précise dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_task']))
         {
            $id_task = $_POST['id_task'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('DELETE FROM task WHERE id_task = :id_task');
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