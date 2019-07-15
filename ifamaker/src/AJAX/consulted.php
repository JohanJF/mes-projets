<?php 

	try 
    {
         
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('UPDATE board_user 
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