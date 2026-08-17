<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_Library
{
    public function __construct()
    {
        require_once FCPATH . 'vendor/autoload.php';

        log_message('debug', 'PHPMailer Library loaded.');
    }

    public function send($to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aswinethicfin@gmail.com';
        $mail->Password   = 'ybbx xoxj dful biyj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // DEBUG
        $mail->SMTPDebug = 0;

        $mail->setFrom(
            'no-reply@ethicfin.net',
            'ethicfin'
        );

        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        log_message(
            'error',
            'PHPMailer: Trying to send email to: ' . $to
        );

        $mail->send();

        log_message(
            'error',
            'PHPMailer: Email sent successfully to: ' . $to
        );

        return true;

    } catch (Exception $e) {

        log_message(
            'error',
            'PHPMailer ERROR: ' . $mail->ErrorInfo
        );

        log_message(
            'error',
            'PHPMailer EXCEPTION: ' . $e->getMessage()
        );

        return false;
    }
}
 
}