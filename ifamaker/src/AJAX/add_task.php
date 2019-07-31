<?php

    /**
     * injecte le titre et l'id étrangère de la tache dans la BDD
     */
     
    function position($conn,$id)
    {
        $position = $conn->prepare('
                SELECT COUNT(*) 
                FROM task 
                WHERE id_list_foreign = :id
            ');
        $position->execute(
             array(
                'id' => $id
            )
        );

        $position->setFetchMode(PDO::FETCH_ASSOC);
       
       foreach ($position as $row) 
       {
            return $row['COUNT(*)'];
       }
        
    }

     try 
    {
         if( isset($_POST['task']))
         {  
            $title = $_POST['task'];
            $id_list = $_POST['id_list'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('INSERT INTO task(title,id_list_foreign,position) VALUES (:title,:id,:position)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'id' => $id_list,
                                    'position' => position($conn,$id_list)+1
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