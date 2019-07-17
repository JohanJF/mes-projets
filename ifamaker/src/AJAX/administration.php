<?php 

	try {

		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('
            				SELECT *
            				FROM board_user
            				INNER JOIN user ON id_user_foreign = user_id
            				WHERE id_board_foreign = :board 
            			');
            $result->execute(
                                 array(
                                    'board' => $_POST['id_tableau']
                                )
                            );

            $result->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($result as $result) 
            {
            	echo $result['firstname'] . "-";
            }

		
	} catch (Exception $e) {
		echo "Une erreur s'est produite<br>" . $e->getMessage();
	}

 ?>