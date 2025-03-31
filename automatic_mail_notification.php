#!/usr/bin/php
<?php
$dir = "/logicmind/www/html/lm_prod";
if(!defined("_DB_INI_"))
    define("_DB_INI_", "$dir/db/db_lm_dataobject.ini");
 
 if(!defined("_DB_CLASSES_"))
    define("_DB_CLASSES_", "$dir/includes/db_classes/");
 
//echo "Found the LM SOP Worklist Items from the DB...\n" . print_r($options,true) ."\n";
define("_URL_", "http://logicmind/lm_prod/");

if(!defined("_LM_MAIL_SENDING_METHOD_"))
    define("_LM_MAIL_SENDING_METHOD_","mail");
     //define("_LM_MAIL_SENDING_METHOD_","smtp"); 

function eregi($needle, $haystack, &$matches = null) {
    $needle = "/$needle/";
    return preg_match_all($needle, $haystack, $matches);
}

// The character that separates the paths in the PHP include path variable
$separator='';
$current_path=ini_get('include_path');
if(strstr($current_path, ';')) {
    $separator=';';	   //for windows
} else {
    $separator=':';   //for linux
}

// Add the new paths (LM directory and the PEAR directory) required for this script
// to the PHP include path
ini_set('include_path', "$dir".$separator."$dir/pear".$separator.$current_path);
 
// Make connection to the the LM backend database.
require_once("$dir/" . "db/lm-db.php");

if ($db_dir = opendir(_DB_CLASSES_)) {
    while (($item = readdir($db_dir)) !== FALSE) {
        if ($item == "." or $item == ".." or $item == "CVS") {
            continue;
        }
        if (is_file(_DB_CLASSES_.$item) ) {
            include_once(_DB_CLASSES_.$item);
            //echo "Loading the class: " . _DB_CLASSES_.$item . "\n";
        }
    }
}
        
foreach ($dataobject_setting as $class => $values) { 
    $options = &PEAR::getStaticProperty($class,'options');
    $options = $values;
}
  
// Include the class that contains the Email Sending functionality
require_once("$dir/includes/functions/change_mail.func.php");
require_once("$dir/includes/functions/check_access.func.php");

// Create the mailer object for sending the outgoing notification emails
$mail = new changeMailer();

$mail_count = array();

$worklist = new DB_Public_reminder_mail_config();
$worklist->get("reminder_mail_for",'pendinglist');
$remainder_mail_pendinglist = $worklist->reminder_mail_for;
  
// Get all the pending worklists (for all the users) from the backend DB
$worklist = new DB_Public_lm_worklist();
$list = $worklist->find();
if (!($list)==""){
    // As there are some pending worklist, iteratively fetch one worklist and 
    // send the notification email if required.
    while($worklist->fetch()){
        // Get the details about the pending worklist for preparing for sending the notification email
        $change_date=$worklist->work_assigned_date;
        $change_user=$worklist->work_user_id;
        $user_obj = new DB_Public_users();
        $user_obj->get('user_id',$change_user);
        $user_name = $user_obj->user_name;
        $full_name = $user_obj->full_name;
        $email = $user_obj->email;
        
        list($year,$month,$day, $h,$i,$s) = sscanf($change_date, '%4s-%2s-%2s %2s:%2s:%2s');
        
        // Compute the date for triggering the notification email. The date is 15 days after the
        // last changed date of the pending worklist
        $highlight= date('Y-m-d H:i:s', mktime($h,$i,$s,$month,$day+$remainder_mail_pendinglist,$year));
        // Get the current (realtime) date from this computer system
        $sysdate=date('Y-m-d H:i:s');
        
        // Check if the notification email has to be triggered, 
        // i.e, if today date is 15 days past the last changed date of the pending worklist
        if($highlight < $sysdate){
            // Check if the pending worklist is a SOP pending.
            // The SOP is recognised by the presence of "sop.details:" substring in the object id of the worklist

            if (preg_match("/sop.details:/",$worklist->object_id)) {
                // Initialize the success and failed mail count for the SOP  worklist
                if (!(isset($mail_count["SOP Success"]) || array_key_exists('SOP Success', $mail_count)))
                    $mail_count["SOP Success"] = 0;
                
                if (!(isset($mail_count["SOP Failed"]) || array_key_exists('SOP Failed', $mail_count)))
                    $mail_count["SOP Failed"] = 0; 
                    
                    $sop_master = new DB_Public_lm_sop_master();
                    $sop_master->get("sop_object_id",$worklist->object_id);
                    if(!empty($sop_master->sop_no)){
                        $sop_no = $sop_master->sop_no;
                    }else{
                        $sop_no = $sop_master->sop_draft_no;
                    }
                    $subject = "SOP - $sop_no is Pending Since $change_date";
                    $actionDescription = "The $sop_no is pending since from <strong>$change_date</strong>. You are requested to expedite the same urgently.";
                    $detailsHeading = "Pending SOP Details";
                    $details =  ["SOP Number" => $sop_no,
                                "SOP Name" => $sop_master->sop_name,
                                "SOP Revision" => $sop_master->revision,
                                "SOP Pending Since" => $change_date,
                                "SOP Status" =>$sop_master->status,
                                "SOP Pending User" =>$full_name,
                               ];
                    //$buttonLink = _URL_."index.php?module=sop&action=view_sop&object_id=$worklist->object_id";
                    $buttonLink = "";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                    ]; 
                    $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    if ($result)
                        $mail_count["SOP Failed"]++;
                    else
                        $mail_count["SOP Success"]++;
            }
            if (preg_match("/admin.signup:/",$worklist->object_id)) {
                // Initialize the success and failed mail count for the Signup  worklist
                if (!(isset($mail_count["User Signup Success"]) || array_key_exists('User Signup Success', $mail_count)))
                    $mail_count["User Signup Success"] = 0;
                
                if (!(isset($mail_count["User Signup Failed"]) || array_key_exists('User Signup Failed', $mail_count)))
                    $mail_count["User Signup Failed"] = 0;
                
                    $user_signup = new DB_Public_user_signup();
                    $user_signup->get("object_id",$worklist->object_id); 
                    $subject = "User Signup - {$user_signup->request_no} is Pending Since $change_date";
                    $actionDescription = "The {$user_signup->request_no} is pending since from <strong>$change_date</strong>. You are requested to expedite the same urgently.";
                    $detailsHeading = "Pending User Signup Details";
                    $details =  ["User Signup Request Number" => $user_signup->request_no,
                                "User Signup Pending Since" => $change_date,
                                "User Signup Status" =>$user_signup->status,
                                "User Signup Pending User" =>$full_name,
                               ];
                    // $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$worklist->object_id";
                    $buttonLink = "";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                    ]; 
                    $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    if ($result)
                        $mail_count["User Signup Failed"]++;
                    else
                        $mail_count["User Signup Success"]++;
            }
            if (preg_match("/admin.user_exit:/",$worklist->object_id)) {
                // Initialize the success and failed mail count for the User Exit  worklist
                if (!(isset($mail_count["User Exit Success"]) || array_key_exists('User Exit Success', $mail_count)))
                    $mail_count["User Exit Success"] = 0;
                
                if (!(isset($mail_count["User Exit Failed"]) || array_key_exists('User Exit Failed', $mail_count)))
                    $mail_count["User Exit Failed"] = 0;
                
                    $user_exit = new DB_Public_user_exit();
                    $user_exit->get("object_id",$user_worklist->object_id);
                    $subject = "User Exit - {$user_exit->request_no} is Pending Since $change_date";
                    $actionDescription = "The {$user_exit->request_no} is pending since from <strong>$change_date</strong>. You are requested to expedite the same urgently.";
                    $detailsHeading = "Pending User Exit Details";
                    $details =  ["User Exit Request Number" => $user_exit->request_no,
                                "User Exit Pending Since" => $change_date,
                                "User Exit Status" =>$user_exit->status,
                                "User Exit Pending User" =>$full_name,
                               ];
                    // $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$worklist->object_id";
                    $buttonLink = "";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                    ]; 
                    $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    if ($result)
                        $mail_count["User Exit Failed"]++;
                    else
                        $mail_count["User Exit Success"]++;
            }
        }
    }             
}

// Expiry Notification for SOP.Send alert mail to approver and authorizer regarding that expiry notification of the SOP mail
// 1.First check the SOP is revised or Not.If revised don't trigger mail otherwise trigger the mail untill they will revised.(30 Days is the time frequency to trigger the mail)
$sop_expiry_obj = new DB_Public_lm_sop_master();
$sop_expiry_obj->whereAdd("is_latest_revision='true'");
$sop_expiry_obj->whereAdd("is_revised='no'");
$sop_expiry_list = $sop_expiry_obj->find();
if (!($sop_expiry_list)=="") {
    $sop_reminder_mail_obj = new DB_Public_reminder_mail_config();
    $sop_reminder_mail_obj->get('reminder_mail_for','sop_expiry');
    $sop_remainder_mail_days =  $sop_reminder_mail_obj->no_of_days;
    while($sop_expiry_obj->fetch()) {
        $sysdate_sop_expiry = date('Y-m-d');
        $sop_expired_on = $sop_expiry_obj->expiry_date;
        if($sop_expired_on!=null && $sop_expired_on!="") {
            $highlight_date = date("Y-m-d", strtotime("$sop_expired_on 0 years 0 months -$sop_remainder_mail_days days"));
            if($highlight_date<$sysdate_sop_expiry) {
                $user_obj = new DB_Public_users();
                $user_obj->whereAdd("account_status='enable'");
                $user_obj->whereAdd("department_id='$sop_expiry_obj->sop_department'");
                if($user_obj->find()){
                    while($user_obj->fetch()){
                        $email = $user_obj->email;
                        if (!(isset($mail_count["Expiry SOP Success"]) || array_key_exists('Expiry SOP Success', $mail_count)))
                            $mail_count["Expiry SOP Success"] = 0;

                        if (!(isset($mail_count["Expiry SOP Failed"]) || array_key_exists('Expiry SOP Failed', $mail_count)))
                            $mail_count["Expiry SOP Failed"] = 0; 

                        if(!empty($sop_expiry_obj->sop_no)){
                            $sop_no = $sop_expiry_obj->sop_no;
                        }else{
                            $sop_no = $sop_expiry_obj->sop_draft_no;
                        }
                        $subject = "SOP - $sop_no Expiry Alert";
                        $actionDescription = "The below $sop_no will get Expired on <strong>$sop_expiry_obj->expiry_date</strong>. You are requested to Revise the SOP on or before $sop_expiry_obj->expiry_date.";
                        $detailsHeading = "SOP Details";
                        $details =  ["SOP Number" => $sop_no,
                                    "SOP Name" => $sop_expiry_obj->sop_name,
                                    "SOP Revision" => $sop_expiry_obj->revision,
                                    "SOP Expiry Date" => $sop_expiry_obj->expiry_date,
                                   ];
                        //$buttonLink = _URL_."index.php?module=sop&action=view_sop&object_id=$sop_expiry_obj->sop_object_id";
                        $buttonLink = "";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                                        "detailsHeading" => $detailsHeading,
                                        "details" => $details,
                                        "buttonLink" => $buttonLink
                                        ]; 
                            $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        if ($result)
                            $mail_count["Expiry SOP Failed"]++;
                        else
                            $mail_count["Expiry SOP Success"]++;
                    }
                }
            }
        }
    }
}
/**Reminder mail for online exam*/
$sop_oe_obj = new DB_Public_lm_sop_online_exam_user_details();
$sop_oe_obj->whereAdd("attempt_status='Not Completed'");
$sop_oe_list = $sop_oe_obj->find();
if (!($sop_oe_list)=="") {
    $sop_reminder_mail_obj = new DB_Public_reminder_mail_config();
    $sop_reminder_mail_obj->get('reminder_mail_for','sop_online_exam');
    $sop_remainder_mail_days =  $sop_reminder_mail_obj->no_of_days;
    while($sop_oe_obj->fetch()) {
        $sysdate_sop_oe = date('Y-m-d');
        $sop_oe_target_date = $sop_oe_obj->target_date;
        if($sop_oe_target_date!=null && $sop_oe_target_date!="") {
            $highlight_date = date("Y-m-d", strtotime("$sop_oe_target_date 0 years 0 months -$sop_remainder_mail_days days"));
            if($highlight_date<$sysdate_sop_oe) {
                $user_obj = new DB_Public_users();
                $user_obj->whereAdd("account_status='enable'");
                $user_obj->whereAdd("user_id='$sop_oe_obj->assigned_to'");
                if($user_obj->find()){
                    while($user_obj->fetch()){
                        $email = $user_obj->email;
                        if (!(isset($mail_count["SOP Online Exam Success"]) || array_key_exists('SOP Online Exam Success', $mail_count)))
                            $mail_count["SOP Online Exam Success"] = 0;

                        if (!(isset($mail_count["SOP Online Exam Failed"]) || array_key_exists('SOP Online Exam Failed', $mail_count)))
                            $mail_count["SOP Online Exam Failed"] = 0;
                        
                        $sop_master = new DB_Public_lm_sop_master();
                        $sop_master->get("sop_object_id",$sop_oe_obj->sop_object_id);
                        if(!empty($sop_master->sop_no)){
                            $sop_no = $sop_master->sop_no;
                        }else{
                            $sop_no = $sop_master->sop_draft_no;
                        }
                        $subject = "SOP - $sop_no Online Exam Reminder Alert";
                        $actionDescription = "The Online Exam of below $sop_no is not Completed. You are requested to attend the Exam on or before $sop_oe_obj->target_date.";
                        $detailsHeading = "SOP Details";
                        $details =  ["SOP Number" => $sop_no,
                                    "SOP Name" => $sop_master->sop_name,
                                    "SOP Revision" => $sop_master->revision,
                                    "Target Date" => $sop_oe_obj->target_date
                                   ];
                        //$buttonLink = _URL_."index.php?module=sop&action=view_sop&object_id=$sop_expiry_obj->sop_object_id";
                        $buttonLink = "";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                                        "detailsHeading" => $detailsHeading,
                                        "details" => $details,
                                        "buttonLink" => $buttonLink
                                        ]; 
                            $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        if ($result)
                            $mail_count["SOP Online Exam Failed"]++;
                        else
                            $mail_count["SOP Online Exam Success"]++;
                    }
                }
            }
        }
    }
}

// Expiry Notification for UserPassword Expiry.Send alert mail to user regarding that expiry notification of the Password
$user_pass_expiry_obj = new DB_Public_users();
$user_pass_expiry_obj->whereAdd("account_status='enable'");
$user_pass_expiry_list = $user_pass_expiry_obj->find();
if (!($user_pass_expiry_list)=="") {
    $pass_reminder_mail_obj = new DB_Public_reminder_mail_config();
    $pass_reminder_mail_obj->get('reminder_mail_for','pass_expiry');
    $password_remainder_mail_days =  $pass_reminder_mail_obj->no_of_days;
    while($user_pass_expiry_obj->fetch()) {
        $sysdate_pass_expiry = date('Y-m-d');
        $password_expired_on = $user_pass_expiry_obj->password_expired_on;
        if($password_expired_on!=null && $password_expired_on!="" && $password_expired_on!='0') {
            $highlight_date = date("Y-m-d", strtotime("$password_expired_on 0 years 0 months -$password_remainder_mail_days days"));
            if($highlight_date<$sysdate_pass_expiry) {
                $email = $user_pass_expiry_obj->email;
                 if (!(isset($mail_count["Expiry Password Success"]) || array_key_exists('Expiry Password Success', $mail_count)))
                    $mail_count["Expiry Password Success"] = 0;

                if (!(isset($mail_count["Expiry Password Failed"]) || array_key_exists('Expiry Password Failed', $mail_count)))
                    $mail_count["Expiry Password Failed"] = 0;
                
                $subject = "Password - Expiry Alert";
                $actionDescription = "Your account password will get Expired on <strong>$password_expired_on</strong>. You are requested to Change password on or before $password_expired_on.";
                $detailsHeading = "Details";
                $details =  [
                            "Password Expiry Date" => $password_expired_on,
                           ];
                $buttonLink = "";
                $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                                ]; 
                $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                if ($result)
                    $mail_count["Expiry Password Failed"]++;
                else
                    $mail_count["Expiry Password Success"]++;
            }
        }
    }
}


// Send the Mail Notification Summary Report to LM Admin for today
// Get the Today's date
$today_date = date('d/m/Y');
// Set the Subject and other contents to be included in the outgoing email
$subject = "LM Automatic Mail Notification - Summary Report - [$today_date]";
$actionDescription = "The Following is the Summary Report of Automatic Emails sent for Pending Worklist";
$detailsHeading = "Automatic Mail Summary Report";

// Initialize the array before filling the mail sending statistics
$details = array();

$worklist_total_success = 0;
$worklist_total_failed = 0;

$details["Worklist Details"] = "";

foreach($mail_count as $key => $value) {
    $details[$key] = $value;
    if (preg_match("/Success/",$key))
       $worklist_total_success += $value;
    
    if (preg_match("/Failed/",$key))
        $worklist_total_failed += $value;
}

// $details[""] = "";
$details["Total Mail Count"] = $worklist_total_success + $worklist_total_failed;
$details["Total Success Mail Count"] = $worklist_total_success;
$details["Total Failed Mail Count"] = $worklist_total_failed;

$buttonLink = _URL_;
$bodyDetails = ["actionDescription" => $actionDescription,
                "detailsHeading" => $detailsHeading,
                "details" => $details,
                "buttonLink" => $buttonLink
                ];
//Send Summary Report To Admin Role User
$user = new DB_Public_users();
$user->orderBy('full_name');
$user->whereAdd("account_status='enable'");
$user->find();
while($user->fetch()){
    if(check_access($user->user_name,'admin_module', 'yes')) {
        $email = $user->email;
        $result = $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
    }
}
?>
