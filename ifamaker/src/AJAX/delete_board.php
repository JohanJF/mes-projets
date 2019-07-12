<?php

    /**
     * supprimer une liste présente dans la BDD en fonction de son ID
     */
     
   try 
   {
        
         if( isset($_POST['id_board']))
         {
            $id_board = $_POST['id_board'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('DELETE FROM board WHERE id_board = :id_board');
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