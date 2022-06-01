<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer(true);  // Cree un nouvel objet PHPMailer

	$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'ssl0.ovh.net';
	$mail->Port = 465;
	$mail->Username = 'service@noledge.app';
	$mail->Password = 'H6CYlQ6YktkTJeLualcAOR1u1hFR';

	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);

	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);

	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}

?>