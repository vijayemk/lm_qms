<?php
/**
 * Project:     Logicmind
 * File:  reset_password.admin.php
 *
 * @author Ananthakumar V
 * @since 02/03/2017
 * @package admin
 * @version 1.0
 * @see reset_password.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$view_users =new Users;
$view_users->get("user_id",$_REQUEST['user_id']);
if($view_users->user_name=="admin") {
    $error_handler->raiseError("CAN NOT RESET ADMIN PASSWORD");
}

if($view_users->account_status=="enable"){
    if(isset($_POST['reset'])){
        if($view_users->user_name!="admin") {
            $usr_id = $_SESSION['user_id'];
            $id=$_REQUEST['user_id'];
            $time =  date('Y-m-d G:i:s');
            $password = $_POST['password'];
            $update_user_password = new Users;
            $update_user_password->whereAdd("user_id='$id'");
            $update_user_password->password = md5($password);
            $update_user_password->password_expired_on = calculate_next_user_password_expiry_date();
            $update_user_password->update(DB_DATAOBJECT_WHEREADD_ONLY);

            $user_obj = new Users;
            $user_obj->get("user_id",$id);
            $email = $user_obj->email;
            $user_name = $user_obj->user_name;
            
            // Audit Trail
            $dept_id = getDeptId($usr_id);
            $new_val = "User Name : ". getUserName($id)." Password Reset";
            $old_val = null;
            $sequence_object = new Sequence;
            $audit_id="audit.user:".$sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_user(),$audit_id,$usr_id,$dept_id,'Password Reset',$new_val,$old_val,"Successfully Updated");

            $mail = new changeMailer();
            $subject = "CONFIDENTIAL: Your Account Password Reset";
            $actionDescription = "Your Account Password has been Reset successfully";
            $detailsHeading = "Account Details";
            $securityTips = <<<ENDOFSTRING
                            <ol style="padding: 0;">
                                <li>Do not discolse your Account details (username and password) to others.</li>
                                <li>Change your password when you log-in to Account for the first time.</li>
                                <li>It is recommended that you change your password after every three months.</li>
                            </ol>
ENDOFSTRING;
            $details =  ["Sent By" => $_SESSION[full_name], 
                        "Username" => $user_name, 
                        "Password" => $password,
                        "Reason for Update" => "Password Reset",
                        "Security Tips" => $securityTips
                        ];
            $buttonLink = _URL_;
            $bodyDetails = [ 
                            "actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                            ];
            $mail->sendloginNotification(array($email), $subject, $bodyDetails, []);
            header("Location:index.php?module=admin&action=list_user");
        }else{
            $error_handler->raiseError("CAN NOT RESET ADMIN PASSWORD");
        }
    }
    $smarty->assign("regobj",$view_users);
    $smarty->assign('main',_TEMPLATE_PATH_."reset_password.admin.tpl");
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
