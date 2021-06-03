<?php
    include 'connexion.php';
    /**
     * modifie le détails de la tache
     */
     
     try 
    {
         if( isset($_POST['id_task']))
         {  
	            $result = connexion()->prepare('
	            		UPDATE task
	            		SET details = :details
	            		WHERE id_task = :id
	            	');
	            $result->execute(
	                                 array(
	                                    'details' => htmlspecialchars($_POST['details']),
	                                    'id' => $_POST['id_task']
	                                )
	                            );

            echo "Success";
            
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