<?php

    /**
     * modifie le détails de la tache
     */
     
     try 
    {
         if( isset($_POST['id_task']))
         {  
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            $result = $conn->prepare('
	            		UPDATE task
	            		SET details = :details
	            		WHERE id_task = :id
	            	');
	            $result->execute(
	                                 array(
	                                    'details' => $_POST['details'],
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