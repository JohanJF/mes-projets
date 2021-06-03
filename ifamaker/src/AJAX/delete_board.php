<?php
    include 'connexion.php';
    /**
     * supprimer une liste présente dans la BDD en fonction de son ID
     */
     
   try 
   {
        
         if( isset($_POST['id_board']))
         {
            $id_board = $_POST['id_board']; //id du tableau
            $user_actif = $_POST['user_actif'];

            /* verifier le type du tableau */

            $tab_collab = connexion()->prepare('
                            SELECT *
                            FROM board
                            INNER JOIN board_user ON id_board_foreign = id_board
                            WHERE id_board = :board AND id_user_foreign = :user_actif
                        ');
            $tab_collab->execute(
                                 array(
                                    'board' => $id_board,
                                    'user_actif' => $user_actif
                                )
                            );

            $tab_collab->setFetchMode(PDO::FETCH_ASSOC);
            
            foreach ($tab_collab as $row) {
                
                if ( $row['type'] == 'collaboratif' && $row['administrateur'] != 'admin' ) { // supprimer l'utilistaur du groupe si tableau collaboratif

                    $result = connexion()->prepare('
            
                        DELETE FROM board_user
                        WHERE id_user_foreign = :user_actif AND id_board_foreign = :id_board
                    ');
                    $result->execute(
                                        array(
                                            'user_actif' => $user_actif,
                                            'id_board' => $id_board
                                        )
                                    );
                    echo 'Success';
                }
                else { // sinon supprimer le tableau
                    $result = connexion()->prepare('DELETE FROM board WHERE id_board = :id_board');
                    $result->execute(
                                        array(
                                            'id_board' => $id_board
                                        )
                                    );
                    echo 'Success';
                }
            }   
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