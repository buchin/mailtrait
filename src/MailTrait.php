<?php
namespace Buchin\MailTrait;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

trait MailTrait
{
    public function sendmail($from, $to, $subject, $content)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        $mail->isSendmail();

        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->addReplyTo($from);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = $content;

        try {
            $mail->send();
        } catch (\Exception $e) {
            echo "\n" . $e->getMessage() . "\n";
        }
    }
}
