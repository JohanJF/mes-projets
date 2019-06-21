<?php

    /**
     * injecte le titre et l'id étrangère de la tache dans la BDD
     */
     
     try 
    {
         if( isset($_POST['task']))
         {  
            $title = $_POST['task'];
            $id_list = $_POST['id_list'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('INSERT INTO task(title,description,id_list_foreign) VALUES (:title,:description,:id)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'description' => 'test',
                                    'id' => $id_list
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