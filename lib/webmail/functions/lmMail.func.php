<?php

/*
 *  These source file is written for sending SMTP emails using Pear Packages
 *  Date: 8Nov2016
 *  Reference URLs:
 *      Source-1: https://www.lifewire.com/send-email-from-php-script-using-smtp-authentication-and-ssl-1171197
 *      Source-2: https://support.rackspace.com/how-to/test-and-send-mail-using-php/
 */

require_once "Mail.php";
require_once "Mail/mime.php";

class smtpHtmlMail {

    // The FROM address will contain the LM Admin email id
    private $from;
    // The URL path to the SMTP host used for sending the outgoing emails
    private $host;
    // The destination port (on the remote server) to which the emails will be sent
    private $port;
    // The username of the sending user used for SMTP authentication
    private $username;
    // The password of the sending user used for SMTP authentication
    private $password;
    // The character for terminating the SMTP mail newline
    private $crlf;

    // The constructor functions initializes the SMTP Mail server name, SMTP port,
    // the SMTP username and password and the senders address of the outgoing email.
    // NOTE: Presently, Google Apps (Gmail) is being used for sending outgoing SMTP emails.
    //       In future, if another SMTP server is used, you may have to change the 
    //       host, port, username and password values.
    function __construct() {
        $this->from = "Support Admin<support@gerizimtech1.com>";
        //$this->host = "smtp.gmail.com";
        $this->host = "smtp.gmail.com";
        //$this->port = "465";
        $this->port = "587";
        //$this->port = "25";
        $this->username = "support@gerizimtech1.com";
        $this->password = "Delhi@123";
//	    $this->crlf = "\n";
    }

    // The following function sends the mails to the all the emails in the TO and CC list
    // Arguments:
    //      $to: array of emails (in the string form) that will appear in the TO header of the email.
    //      $cc: array of emails (in the string form) that will appear in the CC header of the email.
    //      $bcc: array of emails (in the string form) that will appear in the BCC header of the email.
    //      $subject:     The subject line of the outgoing email
    //      $mailBody:    HTML Email body of the outgoing email (in the string form)
    //      $attachments: array of filenames (with full directory path) that need to be attached
    //                    with the outgoing email.
    function sendMail($to, $cc, $bcc, $subject, $mailBody, $mailBodytype = "html", $attachments = []) {
        // Create a new Mail_Mime for the SMTP outgoing email body
        $mime = new Mail_mime($this->crlf);

        // Set the mail text body depending on mailBodyType
        // Presently, it is assumed that the mail body is in the plain text or  with HTML tags (HTML Email)
        if ($mailBodytype == "text")
            $mime->setTXTBody($mailBody);
        else if ($mailBodytype == "html")
        // As we wanted to used the HTML emails, sent the
            $mime->setHTMLBody($mailBody);

        // Add the all the files specified in the attachments with the outgoing mail
        foreach ($attachments as $file) {
            $mime->addAttachment($file);
        }

        // As the TO, CC and BCC email addresses are in the array form, convert them to 
        // string form separated by commas.
        $toStr = implode(",", $to);
        $ccStr = implode(",", $cc);
        $bccStr = implode(",", $bcc);

        // Create the SMTP Mailer object from the Pear Mail Factory
        if (_LM_MAIL_SENDING_METHOD_ == "smtp") {
            // $mailer = Mail::factory("smtp", array ('host' => $this->host,'port' => $this->port,'auth' => true,'username' => $this->username,'password' => $this->password));
            $mailer = Mail::factory(_LM_MAIL_SENDING_METHOD_, array('host' => $this->host,
                        'port' => $this->port,
                        'auth' => true,
                        'username' => $this->username,
                        'password' => $this->password));
        } else {
            //  $mailer = Mail::factory("mail");
            $mailer = Mail::factory(_LM_MAIL_SENDING_METHOD_);
        }

        // As the outgoing mail has to be sent to the TO and CC addresses, 
        // create the receipients list (in the string form) by concatenating
        // the TO, CC and BCC addresses.
        $recepients = $toStr;
        if ($ccStr != '')
            $recepients .= "," . $ccStr;

        if ($bccStr != '')
            $recepients .= "," . $bccStr;

        // Set the Email headers: from, to, cc and subject in the outgoing mail
        // Do not set the bcc header as we do not want the BCC header to be seen in the outgoing email
        $headers = array('From' => $this->from, 'To' => $toStr, 'Cc' => $ccStr,
            'Subject' => $subject);
        $headers = $mime->headers($headers);

        // Get the email body with attachments (encoded with base64 encoding) for sending the mail out
        $body = $mime->get();

        // Send the email to all the receipients, with headers. Note that BCC will not showup in the headers,
        // but the mail will be sent to the BCC addresses as well.
        $mail = $mailer->send($recepients, $headers, $body);

        // Let the caller do the error checking
        return $mail;
    }
}

?>
