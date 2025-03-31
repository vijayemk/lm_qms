<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$email = 'ananthbtechit@gmail.com';
$email = 'support@gerizimtech.com';
    
    $mail = new changeMailer();
    $subject = "LogicMind Mail Checking";
    $actionDescription = "LogicMind mail";
    $detailsHeading = "LogicMind mail";
    $securityTips = <<<ENDOFSTRING
                        
ENDOFSTRING;
    $details =  ["Sent By" => $_SESSION[full_name], 
                
                ];
    $buttonLink = _URL_;
    $bodyDetails = [ 
                    "actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                    ];
    $mail->sendloginNotification(array($email), $subject, $bodyDetails, []);
?>
