<?php
/**
 * Project:     Logicmind
 * File:       list_user.admin.php
 *
 * @author Ananthakumar V
 * @since 15/02/2017
 * @package admin
 * @version 1.0
 * @see list_user.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$active_userlist = getUserList(null, null, null, null, null, null, null, "enable", null);
$active_user_count = count($active_userlist);
$inactive_userlist = getUserList(null, null, null, null, null, null, null, "disable", null);
$inactive_user_count = count($inactive_userlist);
$access_per_obj = new AccessPermissionObjects();
$workflow_access_per_list = $access_per_obj->access_permission_detail_list();

if (isset($_POST['adduser'])){
    $sequence = new Sequence();
    $userid = "user:".$sequence->get_next_sequence();
    
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);
    $time =  date('Y-m-d G:i:s');
    
    $user_name = strtolower($_POST['user_name']);
    $user_name = str_replace(' ', '', $user_name);
    $password  = $_POST['password'];
    $email = trim($_POST['email']);
    
    //$email = trim($_POST['email']);
    //$user_name = strtolower($_POST['user_name']);
    $password = $_POST['password'];
    $mail = new changeMailer();
    $subject = "CONFIDENTIAL: Your Account has been created";
    $actionDescription = "Your Account has been created successfully";
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
                "Security Tips" => $securityTips
                ];
    $buttonLink = _URL_;
    $bodyDetails = [ 
                    "actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                    ];
    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
        
    $user_obj = new DB_Public_users();
    $user_obj->user_id = $userid;
    $user_obj->user_name = $user_name;
    $user_obj->full_name = trim($_POST['full_name']);
    $user_obj->designation_id = trim($_POST['designation']);
    $user_obj->org_id = trim($_POST['organization']);
    $user_obj->plant_id = trim($_POST['plant_name']);
    $user_obj->email = trim($_POST['email']);
    $user_obj->creator = $usr_id;
    $user_obj->create_time = $time;
    $user_obj->modifier = $usr_id;
    $user_obj->modify_time = $time;
    $user_obj->department_id = trim($_POST['department']);
    $user_obj->emp_id = trim($_POST['emp_id']);
    $user_obj->password = md5($password);
    $user_obj->account_status = 'enable';
    $user_obj->password_expired_on = calculate_next_user_password_expiry_date();
    $user_obj->insert();
    
    $sworkflow_per_array = $_POST['sworkflow_per'];
    foreach($sworkflow_per_array as $val) {
        $auser_per_obj = new DB_Public_users_permission();
        $auser_per_obj->user_id = $userid;
        $auser_per_obj->access_per_id = $val;
        $auser_per_obj->is_enabled = 'yes';
        $auser_per_obj->insert();
        
        $new_val = getAccessPermissionName($val)." Permission enabled for ". getFullName($userid);
        $old_val = null;

        $sequence_object = new Sequence;
        $audit_id="audit.perm:".$sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'enable',$new_val,$old_val,"Successfully enabled");
    }
    // Audit Trail
    $new_val = "User Name : ".$user_name."\nFull Name : ".trim($_POST['full_name'])."\nDesignation : ". getDesignation(trim($_POST['designation']))."\nOrganization : ". getOrganization(trim($_POST['organization']))."\nEmail : ".trim($_POST['email'])."\nDepartment : ". getDepartment(trim($_POST['department']))."\nEmp Id : ".trim($_POST['emp_id']);
    $old_val = null;
    $sequence_object = new Sequence;
    $audit_id="audit.user:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_user(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
$user_org = new Organization();
$organizationlist = $user_org->organizationlist();

$user_desg = new Designation();
$designationlist= $user_desg->designationlist();

$smarty->assign('active_userlist',$active_userlist);
$smarty->assign('inactive_userlist',$inactive_userlist);
$smarty->assign('active_user_count',$active_user_count);
$smarty->assign('inactive_user_count',$inactive_user_count);
$smarty->assign('organizationlist',$organizationlist);
$smarty->assign('designationlist',$designationlist);
$smarty->assign('workflow_access_per_list',$workflow_access_per_list);
$smarty->assign('main',_TEMPLATE_PATH_."list_user.admin.tpl");
?>
