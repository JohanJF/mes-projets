<?php
    include 'connexion.php';
    /**
     * supprimer une liste présente dans la BDD en fonction de son ID
     */
     
   try 
   {
        
         if( isset($_POST['id_board']))
         {
            $id_board = $_POST['id_board'];
            $result = connexion()->prepare('DELETE FROM board WHERE id_board = :id_board');
            $result->execute(
                                 array(
                                    'id_board' => $id_board
                                )
                            );
            echo 'Success';
            
        }
        else
        {
            echo 'Failed';
        }
    
   } catch (Exception $e)
        {
            echo "Une erreur s'est produite";
        }

?>