<?php
    include 'connexion.php';
    /**
     * Supprime un utilisateur
     */
     
     try 
    {
        $user_id = $_POST['user_id'];

        $result = connexion()->prepare('DELETE FROM user WHERE user_id = :user_id');
        $result->execute(
                             array(
                                'user_id' => $user_id
                            )
                        );

        echo "Success";
    
    } catch (PDOException $e) 
        {
            echo "Une erreur s'est produite";
        }

?>