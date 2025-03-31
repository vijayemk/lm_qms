<?php
require("global_functions.php");
require_once("initialize.php");
require_once("includes/functions/change_mail.func.php");
/** *Parse the database ini file */
$dbconfig = parse_ini_file(_DB_INI_, true);

/** *Load Database Settings */
foreach ($dbconfig as $class => $values){
    $options=&PEAR::getStaticProperty($class,'options');
    $options=$values;
}

/** * function for Mail*/
// require_once("lib/webmail/functions/htmlMimeMail.func.php");
require_once("lib/webmail/functions/lmMail.func.php");

/** logic starts for forget password*/
if(isset($_POST['reset_password'])){
    /** getting data from the form*/
    $user_name =  $_POST['user_name'];
    $given_mothers_maiden_name  =  $_POST['mothers_maiden_name'];
    $given_birthdate =  $_POST['dob'];
    $given_place_of_birth =  strtolower ($_POST['place_of_birth']);

    /**checking username from auth table*/
    $users=new DB_Public_users();
    $row = $users->get('user_name',$user_name);
    $email=$users->email;
    $user_id=$users->user_id;
    if($row > 0 && $users->account_status=="enable" && $users->password_expired_on>date('Y-m-d')){
        /**checking details  from UserProfile table*/
        $user_profile = new DB_Public_user_profile();
        $user_profile->get('user_id',$user_id);
        $mothers_maiden_name=$user_profile->mothers_maiden_name;
        $birthdate=$user_profile->dob;
        $place_of_birth=$user_profile->place_of_birth;
        if(($mothers_maiden_name == $given_mothers_maiden_name) && ($birthdate == $given_birthdate)&& ($place_of_birth == $given_place_of_birth)){
            /** generate random password*/
            $random_id_length = 8; 
            $rnd_password = crypt(uniqid(rand(),1),"inel_pass");
            $rnd_password = strip_tags(stripslashes($rnd_password)); 
            $rnd_password = str_replace(".","",$rnd_password); 
            $rnd_password = strrev(str_replace("/","",$rnd_password)); 
            $rnd_password = substr($rnd_password,0,$random_id_length); 
            $md5_password= md5($rnd_password);

            /** update user password with new random generated password*/
            $change_pass=new DB_Public_users();
            $change_pass->whereAdd("user_id='$user_id'");
            $change_pass->password = $md5_password;
            $change_pass->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            $mail = new changeMailer();
            $subject = "CONFIDENTIAL: LogicMind Password Retrival";
            $actionDescription = "This is in response to your request for login details at LogicMind.";
            $securityTips = <<<ENDOFSTRING
                <ol style="padding: 0;">
                    <li>The above information is confidential and hence keep it as secret.</li>                    
                    <li>Do not discolse your LogicMind Account details (username and password) to others.</li>
                    <li>It is recommended that you change your password after every three months.</li>
                    <li>Note: If you don't know what this is about, then someone else has tried to retrive your LogicMind account. Please contact directly to LogicMind Admin to report this incident.</li>
                </ol>
ENDOFSTRING;
            $detailsHeading = "Login Details";                                                                                                                                                                                                                                                                                                                            
            $details =  ["User Name" => $user_name, 
                         "Password" => $rnd_password,
                         "Security Tips" => $securityTips
                        ];
            $buttonLink = _URL_ ."index.php";
            $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                           ];
            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Your password is posted to your email address.Please check your mail after some time.');";
            echo "window.location='index.php'";
            echo "</script>";             
        }else{
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('User Details does not Match');";
            echo "window.location='forget_password.html'";
            echo "</script>"; 
        }
    }else{
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Invalid account details');";
            echo "window.location='forget_password.html'";
            echo "</script>"; 
    }
}
?>

