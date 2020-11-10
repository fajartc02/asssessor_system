  <?php
  ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );   
  
  use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
		include('assets/phpmailer/Exception.php');
		include('assets/phpmailer/PHPMailer.php');
		include('assets/phpmailer/SMTP.php');
  
  $emailBody = "Cek";
  
  $mail = new PHPMailer;
	$mail->isHTML(true);
    $mail->isSMTP();
    $mail->Host = 'smartandonplant3.com';
    $mail->Username = 'info@smartandonplant3.com'; // Email Pengirim
    $mail->Password = '4d4pt1v3'; // Isikan dengan Password email pengirim
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
    $mail->setFrom('info@smartandonplant3.com', 'Mailer');
    $mail->addAddress('no.reply.the.mail.check@gmail.com', '');
    //$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
    // Load file content.php

    $mail->Subject = 'Email Reminder - 3 Pillars System';
    $mail->Body = $emailBody;
	 $send = $mail->send();
	 
	 
	 ?>