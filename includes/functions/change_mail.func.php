<?php
/**
 * sendNotification function
 * @author Ananthakumar
 * @since 23/02/2017
 * @package change
*/
require_once("lib/webmail/functions/lmMail.func.php");        
/**
 * Arguments:
 * @param $to   : Array of email id's
 * @param $cc   : Array of email id's
 * @param $bcc  : Array of email id's  
 * @param $body : Email Body (Text or HTML, in the string form)
 * @param $link : Link of Logicmind module
 * @param $subject : Email Subject
 * @param $attachments : Array of files(with full path) to be attached
*/
class changeMailer {
    function sendNotification($to, $cc, $bcc, $subject, $bodyDetails, $attachments) {             
        $mail = new smtpHtmlMail();
        $detailsMarkup = "";
        foreach($bodyDetails["details"] as $key => $value) {
            $detailsMarkup .= "<tr><td>$key:</td><td>$value</td></tr>";
        }
        $org = new DB_Public_organization;
        $org->get("is_active",'yes');
        $org_name = $org->org_name;
        $org_web = $org->website;
        
        $lm_contact = new DB_Public_lm_contact();
        $lm_contact->find();
        $lm_contact->fetch();
        $lm_web = $lm_contact->website;
        $mailBodyType = "html";
        $mailBody = <<<ENDOFSTRING
<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8'>  
        <title>Logicmind Notification</title>
        <style>
            div {
                background-color: #E8E8E8; 
                font-family: Helvetica, Arial, 'sans-serif'; 
                padding-top: 1%;
            }
            
            table {
                background-color: white; 
                margin: 0 5%; 
                width: 90%;
            }
            
            .heading {
                font-size:20px; 
                padding: 1% 5%; 
                text-align: center;
            }
            
            .instruction, .signature td {
                padding: 2% 5%;
            }
            .instruction {
                color: magenta;
                font-weight: bold;
                font-size: 90%;
                text-align:center;
            }
            
            .heading, .actionHeading, .detailsHeading, .sender {
                font-weight: bold;
            }
            
            .actionHeading, .actionDescription {
                display: block;
                margin: 0 5%;
                padding: 1%;
            }
            
            .actionDescription {
                padding-left: 5%;
            }
            
            td table {
                border-collapse: collapse; 
                margin: 1% 5%; 
                width:90%;
            }
            
            td table td {
                padding: 2% 1% 0 1%; 
            }   
            
            .detailsHeading {
                border: none;
                padding:1%;
            }
            
            td tr td {
                border-bottom: 1px solid lightgray;
            }
            
            td table td {
                width: 25%;
            }
            
            td table td + td {
                width: 75%;
            }

            .buttonLink {
                width: 20%;
            }
            
            .buttonLink td {
                padding: 2% 0;
                text-align: center;
            }
            
            .buttonLink td + td{
                padding: 2% 0; 
                text-align: left;
            }
            
            a button {
                border-radius: 5px;
                color: blue; 
                font-weight: bold;
                padding: 4px 12px;
            }
            
            a button:hover {
                background-color: #03A9F4;
                color: white;
            }            
            
            .signature {
                background-color: white; 
                margin: .5% 5%; 
                width: 90%;
            }
             
            .sender, .company {
                padding-left: 2%;
            }
            .sender {
                float: right;
            }
            .company {
                font-size: 14px;
            }
            
            .trademark {
                background-color:#E8E8E8; 
                font-size: 70%; 
                margin: 0 5%; 
                padding: 1% 0; 
                text-align: center; 
                width: 90%;
            }
        </style>
    </head>
    <body>
        <div>
            <table>    
                <tr>
                    <td class="heading">
                        LogicMind Email Notification
                    </td>
                </tr>  
                
                <tr>
                    <td class="instruction">
                       This is an auto generated notification.  Please do not reply to this email.<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="actionHeading">For Your Attention:</span>
                        <span class="actionDescription">
                           {$bodyDetails["actionDescription"]}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td class="detailsHeading" colspan="2">{$bodyDetails["detailsHeading"]}</td>
                            </tr>
                            {$detailsMarkup}
                        </table>
                    </td>
                </tr>
                <tr class="buttonLink">
                    <td>Please click on this button: <a href="{$bodyDetails['buttonLink']}" target="_blank"><button>Take me to LogicMind</button></a></td>
                </tr> 
            </table>
            
            <table class="signature">
                <tr>
                    <td>
                        <!--Regards,<br>-->
                        <span class="company"><a href="$org_web" target="_blank"><button>{$org_name}</button></a></span>
                    </td>
                    <td>
                        <!--Regards,<br>-->
                        <span class="sender"><a href="$lm_web" target="_blank"><button>The LogicMind Solutions</button></a></span><br>
                    </td>
                </tr>
            </table >
        </div>
    </body>
</html>
ENDOFSTRING;
                    
        $result = $mail->sendMail($to, $cc, $bcc, $subject, $mailBody, $mailBodyType, $attachments);
        if (PEAR::isError($result)) {
                echo("<p>PEAR MAIL ERROR: " . $result->getMessage() . "</p>");
        } else {
                //echo("<p>WITH BCC -  PEAR MAIL: Message successfully sent to: " . $toStr . "<br>and CCed to: " . $ccStr . "</p>");
        }
    }
    // The function sends the notification when a new user account has been created
    function sendloginNotification($to, $subject, $bodyDetails, $attachments) {
        // function sendloginNotification($to, $bodyDetails, $subject, $link, $attachments) {
        // As this is a login notification, the email will be sent to the login user only.
        // Hence, there is no need to send this notification to any other users.
        // Hence, CC and BCC addresses are empty. 
        $this->sendNotification($to, [], [], $subject, $bodyDetails, $attachments);  
    }
}
?>
