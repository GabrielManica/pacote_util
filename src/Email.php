<?php

namespace GX4\Email;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public static function enviaEmail($host,$username,$password,$SMTP,$port,$nomeEmail,$nome,$emails,$emailsCCO,$emailsCC,$anexos,$titulo,$corpo,$delete = true){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   // Enable verbose debug output
            $mail->isSMTP();                            // Send using SMTP
            $mail->Host       = $host;                  // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                   // Enable SMTP authentication
            $mail->Username   = $username;              // SMTP username
            $mail->Password   = $password;              // SMTP password
            $mail->SMTPSecure = $SMTP;                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $port;
            $mail->CharSet    = 'UTF-8';                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($nomeEmail, $nome);

            foreach($emails as $email)
            {
                if ($email <> '')
                {
                    $mail->AddAddress($email);
                }
            }

            foreach($emailsCC as $email)
            {
                if ($email <> '')
                {
                    $mail->addCC($email);
                }
            }

            foreach($emailsCCO as $email)
            {
                if ($email <> '')
                {
                    $mail->addCC($email);
                }
            }

            // Attachments
            foreach($anexos as $anexo)
            {
                if ($anexo <> '')
                {
                    $mail->addAttachment($anexo);
                }
            }

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $titulo;
            $mail->Body    = $corpo;

            $mail->send();

            if ($delete)
            {
                foreach($anexos as $anexo)
                {
                    if ($anexo <> '')
                    {
                        unlink($anexo);
                    }
                }
            }
        } catch (Exception $e) {
            throw new Exception('<b>Erro ao enviar o e-mail: </b> ' . $e->getMessage() );
        }
    }
}
