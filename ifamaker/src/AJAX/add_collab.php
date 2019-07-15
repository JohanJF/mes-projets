<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once '../PHPMailer/src/Exception.php';
	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';

	function verification($conn)
	{
		/* envoi un mail d'invitation dans un tableau collaboratif */

		$mail_exist = $conn->prepare('
				SELECT * 
				FROM board_user
				INNER JOIN user ON id_user_foreign = user_id
				WHERE mail = "'. $_POST['mail_collab'] .'" AND id_board_foreign = '. $_POST['id_board']
			);

		$mail_exist->execute();
		$mail_exist->setFetchMode(PDO::FETCH_ASSOC);

		/* si mail entrée existe déja dans la BDD */
		foreach ($mail_exist as $row) 
		{
			if ($row['mail'] == $_POST['mail_collab'] && $row['id_board_foreign'] == $_POST['id_board'] ) 
			{
				return 'Error';
			}
		}
		
		$type = $conn->prepare('
				SELECT *
				FROM user'
			);

		$type->execute();
		$type->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($type as $row) 
		{
			/* ajoute 1 notification si utilisateur déja inscrit */			
			if ($_POST['mail_collab'] == $row['mail']) 
			{
	            $result = $conn->prepare('INSERT INTO board_user(id_user_foreign,id_board_foreign,activation,token,consult) 
	            						  VALUES (:user,:board,:activation,:token,:consult)'
	            						);
	            $result->execute(
	                                 array(
	                                 	'user' => $row['user_id'],
	                                 	'board' => $_POST['id_board'],
	                                    'activation' => 0,
	                                    'token' => sha1($_POST['id_board']),
	                                    'consult' => 'not consulted'
	                                )
	                            );
			}
		}

		return 'Success';
	}

	function envoi_mail($conn)
	{
		/*$mail = new PHPMailer();

		//Config
		$mail->isSMTP();
		$mail->Host = 'SSL0.OVH.NET';
		$mail->SMTPAuth = true;
		$mail->Username = 'jeanfrancois.johan@stagiairesifa.fr';
		$mail->Password = '19751224*';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		//Info du mail
		$mail->setFrom('jeanfrancois.johan@stagiairesifa.fr','IfaMaker');
		$mail->addAddress($_POST['mail_collab']);

		$mail->isHTML(true);
		$mail->Subject = "Vous avez été invité dans un tableau collaboratif";
		$mail->Body = 'Vous avez été invité à rejoindre le tableau collaboratif "'. $_POST['title_board'] . '" <br><br> Pour s\'inscrire et rejoindre ce tableau, cliquez <a href="http://localhost/mes-projets/ifamaker/index.php?rqt=register&tableau='.$_POST['id_board'].'">ici</a> <br><br>Si vous possédez déjà un compte, connectez-vous <a href="http://localhost/mes-projets/ifamaker/index.php">ici</a> et consultez vos notifications';

		$mail->send();*/

		$mail = new PHPMailer();

		//Config
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'johanjeanfrancois@gmail.com';
		$mail->Password = 'Madinina972';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		//Info du mail
		$mail->setFrom('johanjeanfrancois@gmail.com','IfaMaker');
		$mail->addAddress($_POST['mail_collab']);

		$mail->isHTML(true);
		$mail->Subject = "Vous avez été invité dans un tableau collaboratif";
		$mail->Body = 'Vous avez été invité à rejoindre le tableau collaboratif "'. $_POST['title_board'] . '" <br><br> Pour s\'inscrire et rejoindre ce tableau, cliquez <a href="http://localhost/mes-projets/ifamaker/index.php?rqt=register&tableau='.$_POST['id_board'].'">ici</a> <br><br>Si vous possédez déjà un compte, connectez-vous <a href="http://localhost/mes-projets/ifamaker/index.php">ici</a> et consultez vos notifications';

		$mail->send();
	}

	/////////////////////////////////////////////////////////////////////

	if (filter_var($_POST['mail_collab'], FILTER_VALIDATE_EMAIL)) 
	{
	 	
		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (verification($conn) == 'Success')
		{
			envoi_mail($conn); 
			echo 'Success';
		}	
		else
			echo 'Error';
		
	}
	else
	{
		echo 'Error';
	}


 ?>