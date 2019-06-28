<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once '../PHPMailer/src/Exception.php';
	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';

	function envoi_mail()
	{
			$mail = new PHPMailer();

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
			$mail->Body = "Vous avez été invité à rejoindre le tableau collaboratif ";

			$mail->send();
	}

	if (filter_var($_POST['mail_collab'], FILTER_VALIDATE_EMAIL)) 
	{
	    /*$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $result = $conn->prepare('
	    						  SELECT *
	    						  FROM '
	    						);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($result as $row) 
		{
		}
		*/
		envoi_mail();

		echo "Success";
		
	}
	else
	{
		echo 'Error';
	}


 ?>