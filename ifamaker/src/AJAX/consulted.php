<?php 
    include 'connexion.php';

	try 
    {
         
            $result = connexion()->prepare('UPDATE board_user 
            						  SET consult = :consult 
            						  WHERE id_user_foreign = :user
            						');
            $result->execute(
                    array(
                        'consult' => 'consulted',
                        'user' => $_POST['user_actif']
                    )
            );
    
    } catch (PDOException $e) 
        {
            echo "Une erreur s'est produite";
        }

 ?>