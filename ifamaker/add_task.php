<?php

    /**
     * injecte le titre et l'id étrangère de la tache dans la BDD
     */
     
     try 
    {

         if( isset($_POST['success']))
         {  
            $title = $_POST['success'];
            $description = "Test";
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->prepare('INSERT INTO task(title,description,id_list_foreign) VALUES (:title,:description,:id)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'description' => $description,
                                    'id' => 1
                                )
                            );
            echo json_encode($data);
            
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