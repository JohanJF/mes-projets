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
			$mail->Body = 'Vous avez été invité à rejoindre le tableau collaboratif "'. $_POST['title_board'] . '" <br> Pour rejoindre cliquez <a href="http://localhost/mes-projets/ifamaker/index.php?rqt=register&tableau='.$_POST['id_board'].'">ici</a>';

			$mail->send();
	}

	if (filter_var($_POST['mail_collab'], FILTER_VALIDATE_EMAIL)) 
	{
	    
		envoi_mail();

		echo "Success";
		
	}
	else
	{
		echo 'Error';
	}


 ?>