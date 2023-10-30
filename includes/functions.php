<?php
function sendMail($to,$from,$subject, $body, $bodyText=""){

    $mail = new PHPMailer();

    // Settings
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    $mail->Host       = $config['smtp_host'];    // SMTP server example
    $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = $config['smtp_auth'];                  // enable SMTP authentication
    $mail->Port       = $config['smtp_port'];                    // set the SMTP port for the GMAIL server
    $mail->Username   = $config['smtp_user'];            // SMTP account username example
    $mail->Password   = $config['smtp_pass'];            // SMTP account password example
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    //Recipients
    $mail->setFrom($from, $config['site_name']);
    $mail->addAddress($to);               //Name is optional
    $mail->addReplyTo($from);

    // Content
    $mail->isHTML(true);                       // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $bodyText;

    if($mail->send()){
        return true;
    }else{
        return $config['smtp_host'];
    }

}