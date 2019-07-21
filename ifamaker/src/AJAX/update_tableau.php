<?php

    /**
     * Modifie une tâche précise dans la BDD en fonction de son ID
     */
     
     try 
    {
         if( isset($_POST['id_table']))
         {
            $id_table = $_POST['id_table'];
            $title = $_POST['table_title'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('UPDATE board SET title = :title  WHERE id_board = :id_table');
            $result->execute(
                    array(
                        'title' => $title,
                        'id_table' => $id_table 
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