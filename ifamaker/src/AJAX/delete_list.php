<?php
    include 'connexion.php';

    /**
     * supprimer une liste présente dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_list']))
         {
            $id_list = $_POST['id_list'];
            $result = connexion()->prepare('DELETE FROM list WHERE id_list = :id_list');
            $result->execute(
                                 array(
                                    'id_list' => $id_list
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