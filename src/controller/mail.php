<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
function sendEmail($reciever, $body, $subject) {
    global $mail;
    try {
        //Server settings
        $mail->SMTPDebug = $_ENV['MAIL_SMTP_DEBUG'];                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = $_ENV['MAIL_HOST'];                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $_ENV['MAIL_USERNAME'];
        $mail->Password   = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM']);
        $mail->addAddress($reciever);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        return 'Le message a été envoyé';

    }catch (Exception $e) {
//        return "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        return "Le message n'a pas pu être envoyé. Veuillez réessayer";
    }
}

