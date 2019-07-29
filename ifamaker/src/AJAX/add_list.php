<?php

    /**
     * injecte le titre et l'id étrangère de la liste dans la BDD
     */
    function position($conn,$id)
    {
        $position = $conn->prepare('
                SELECT COUNT(*) 
                FROM list 
                WHERE id_board_foreign = :id
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
         if( isset($_POST['success']))
         {
            $title = $_POST['success'];
            $id = $_POST['id'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('INSERT INTO list(title,id_board_foreign,position) VALUES (:title,:id,:position)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'id' => $id,
                                    'position' => position($conn,$id)+1
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