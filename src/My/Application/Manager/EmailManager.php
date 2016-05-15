<?php
/**
 * File for email manager class
 */

namespace My\Application\Manager;

use Cayman\Manager\EmailManager\Email;

/**
 * Class for email manager
 *
 */
//class EmailManager extends \Cayman\Manager\EmailManager\PhpMail
class EmailManager extends \Cayman\Manager implements \Cayman\Manager\EmailManager
{
    
    /**
     * Send email
     * @param Email $email
     */
    function emailSend(Email $email)
    {
        $settings = $this->getSettings();
        
        /*
        $nl = "\r\n";
        
        $toList  = $this->prepareRecipients($email->to);
        $message = wordwrap($email->message, 70, $nl);
        
        $headers = [];
        
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        if ($email->from) {
            $headers[] = 'From: ' . $this->prepareRecipients([$email->from]);
        }
        if ($email->reply_to) {
            $headers[] = 'Reply-To: ' . $this->prepareRecipients([$email->reply_to]);
        }
        if ($email->cc) {
            $headers[] = 'Cc: ' . $this->prepareRecipients($email->cc);
        }
        if ($email->bcc) {
            $headers[] = 'Bcc: ' . $this->prepareRecipients($email->bcc);
        }
        $headers[] = 'X-Mailer: PHP/' . phpversion();
        $headerLines = implode($nl, $headers);
        
        $result = mail($toList, $email->subject, $message, $headerLines);
        */
        
        $mail = new \PHPMailer();

        //$mail->SMTPDebug = 3;                                     // Enable verbose debug output

        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = $settings->smtp->servers;// 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = $settings->smtp->auth ? true : false;   // Enable SMTP authentication
        $mail->Username   = $settings->smtp->username;              // SMTP username
        $mail->Password   = $settings->smtp->password;              // SMTP password
        $mail->SMTPSecure = $settings->smtp->tls ? true : false;    // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = $settings->smtp->port;                  // TCP port to connect to

        $mail->setFrom($settings->from_email, $settings->from_name);
        
        foreach($email->to as $to) {
            $mail->addAddress($to);
        }
        //$mail->addReplyTo('info@example.com', 'Information');
        foreach($email->cc as $cc) {
            $mail->addCC($cc);
        }
        foreach($email->bcc as $bcc) {
            $mail->addBCC($bcc);
        }

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $email->subject;
        $mail->Body    = $email->message;
        $mail->AltBody = strip_tags($email->message);

        $result = $mail->send();
        
        if (! $result) {
            error_log('Message could not be sent: ' . $mail->ErrorInfo);
        }
        
        return $result;
    }
}
