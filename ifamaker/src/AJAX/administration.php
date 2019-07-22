<?php 

	try {

        $new = [];

		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('
            				SELECT *
            				FROM board_user
            				INNER JOIN user ON id_user_foreign = user_id
            				WHERE id_board_foreign = :board AND administrateur IS NULL 
            			');
            $result->execute(
                                 array(
                                    'board' => $_POST['id_tableau']
                                )
                            );

            $result->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($result as $result) 
            {
            	$new['firstname'][$result['firstname']] = $result['user_id'] ;
            }

            ////////////////////////////////////////////////////////

            $result2 = $conn->prepare('
                            SELECT *
                            FROM board_user
                            INNER JOIN user ON id_user_foreign = user_id
                            WHERE id_board_foreign = :board AND administrateur = "admin"
                        ');
            $result2->execute(
                                 array(
                                    'board' => $_POST['id_tableau']
                                )
                            );

            $result2->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($result2 as $result) 
            {
                $new['admin'] = $result['firstname'];
            }


            echo json_encode($new);

		
	} catch (Exception $e) {
		echo "Une erreur s'est produite<br>" . $e->getMessage();
	}

 ?>