<?php

    /**
     * Modifie une tâche précise dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_board']))
         {

            $id_collab = $_POST['id_collab'];
            $id_board = $_POST['id_board'];
            
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('DELETE FROM board_user 
                                            WHERE id_user_foreign = :id_user AND id_board_foreign = :id_board');
            $result->execute(
                                 array(
                                    'id_user' => $id_collab,
                                    'id_board' => $id_board
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