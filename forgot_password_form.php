<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './phpmailer/vendor/autoload.php';

$phpmailer = new PHPMailer(true);

try {
	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = 'e32fa4ac2176eb';
	$phpmailer->Password = '8eb7ae1ced0135';

	//Recipients
	$phpmailer->setFrom('erjoseph25@gmail.com', 'Mailer');
	$phpmailer->addAddress('erjoseph25@gmail.com', 'Joe User');     //Add a recipient
	# phpmailer->addAddress('ellen@example.com');               //Name is optional
	$phpmailer->addReplyTo('erjoseph25@gmail.com', 'Information');
	#$phpmailer->addCC('cc@example.com');
	#$phpmailer->addBCC('bcc@example.com');


	$phpmailer->isHTML(true);                                  //Set email format to HTML
	$phpmailer->Subject = 'Here is the subject';
	$phpmailer->Body    = 'This is the HTML message body <b>in bold!</b>';
	$phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$phpmailer->send();

	echo "Message has been sent";

} catch(Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>	
				
		
					