<?php
    include 'connexion.php';

    /**
     * Modifie une liste précise en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_list']))
         {
            $id_list = $_POST['id_list'];
            $title = $_POST['titre_liste'];
            $result = connexion()->prepare('UPDATE list SET title = :title  WHERE id_list = :id_list');
            $result->execute(
                    array(
                        'title' => $title,
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