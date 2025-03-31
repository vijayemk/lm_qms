<?php

/**
 * Project:     Logicmind
 * File:  update_user.admin.php
 *
 * @author Ananthakumar V
 * @since 02/03/2017
 * @package admin
 * @version 1.0
 * @see update_user.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$id = $_REQUEST['update_user_id'];

$user_remarks = new DB_Public_users_remarks();
$user_remarks->whereAdd("user_id='$id'");
$user_remarks->find();
while ($user_remarks->fetch()) {
    $user_name = getFullName($user_remarks->remarks_user);
    $department = getDeptName($user_remarks->remarks_user);
    $user_update_histoy_remarks_array[] = ['updated_by' => $user_name, 'department_name' => $department, 'remarks' => trim($user_remarks->remarks), 'date_time' => get_modified_date_time_format($user_remarks->remarks_date)];
}
if (!empty($user_update_histoy_remarks_array)) {
    $smarty->assign("user_update_histoy_remarks_array", $user_update_histoy_remarks_array);
}

$check_user_obj = new DB_Public_users();
if ($check_user_obj->get("user_id", $id)) {
    if ($check_user_obj->user_name == "admin") {
        $error_handler->raiseError("CAN NOT UPDATE ADMIN ACCOUNT");
    }
    if (isset($_POST['updateuser'])) {
        $atuser_old = new Users();
        $atuser_old->get("user_id", $id);
        $at_old_user_full_name = getFullName($atuser_old->user_id);
        $usr_id = trim($_SESSION['user_id']);
        $time = date('Y-m-d G:i:s');
        $update_reason = $_REQUEST['update_reason'] ?: NULL;
        if ($_POST['account_status'] == "enable") {
            $password = generateStrongPassword(8);
            $update_users = new Users;
            $update_users->whereAdd("user_id='$id'");
            $update_users->org_id = trim($_POST['organization']);
            $update_users->plant_id = trim($_POST['plant_name']);
            $update_users->department_id = trim($_POST['department']);
            $update_users->full_name = trim($_POST['full_name']);
            $update_users->designation_id = trim($_POST['designation']);
            $update_users->emp_id = trim($_POST['emp_id']);
            $update_users->email = trim($_POST['email']);
            $update_users->modifier = $usr_id;
            $update_users->modify_time = $time;
            $update_users->account_status = trim($_POST['account_status']);
            $update_users->password = md5($password);
            $update_users->password_expired_on = calculate_next_user_password_expiry_date();
            $update_users->update(DB_DATAOBJECT_WHEREADD_ONLY);

            $remarks_obj = new DB_Public_users_remarks();
            $remarks_obj->user_id = $id;
            $remarks_obj->remarks_date = $time;
            $remarks_obj->remarks_user = $usr_id;
            $remarks_obj->remarks = $update_reason;
            $remarks_obj->insert();

            // Audit Trail
            $dept_id = getDeptId($usr_id);
            $new_val = "Full Name : " . trim($_POST['full_name']) . "\nEmployee Id : " . trim($_POST['emp_id']) . "\nEmail : " . trim($_POST['email']) . "\nDesignation : " . getDesignation(trim($_POST['designation'])) . "\nOrganization : " . getOrganization(trim($_POST['organization'])) . "\nPlant Name : " . getPlantName(trim($_POST['plant_name'])) . "\nDepartment : " . getDepartment(trim($_POST['department'])) . "\nAccount Status : " . trim($_POST['account_status']) . "\nReason for Update : " . $update_reason;
            $old_val = "Full Name : " . $at_old_user_full_name . "\nEmployee Id : " . $atuser_old->emp_id . "\nEmail : " . $atuser_old->email . "\nDesignation : " . getDesignation($atuser_old->designation_id) . "\nOrganization : " . getOrganization($atuser_old->org_id) . "\nPlant Name : " . getPlantName($atuser_old->plant_id) . "\nDepartment : " . getDepartment($atuser_old->department_id) . "\nAccount Status : " . $atuser_old->account_status;
            $sequence_object = new Sequence;
            $audit_id = "audit.user:" . $sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_user(), $audit_id, $usr_id, $dept_id, 'Update', $new_val, $old_val, "Successfully Updated");

            $user_obj = new Users;
            $user_obj->get("user_id", $id);
            $email = $user_obj->email;
            $user_name = $user_obj->user_name;
            $user_org = getOrganization($user_obj->org_id);
            $dept = getDepartment($user_obj->department_id);
            $designation = getDesignation($user_obj->designation_id);
            $ip_address = getenv("REMOTE_ADDR");

            $mail = new changeMailer();
            $subject = "CONFIDENTIAL: Your Account has been Updated";
            $actionDescription = "Your Account has been updated successfully";
            $detailsHeading = "Account Details";
            $securityTips = <<<ENDOFSTRING
                            <ol style="padding: 0;">
                                <li>The above information is confidential and hence keep it as secret.</li>
                                <li>Note: If you don't know what this is about, then someone else has tried to change your account. Please contact directly to Admin to report this incident.</li>
                            </ol>
ENDOFSTRING;
            $details = ["Modified By" => $_SESSION[full_name],
                "IP Address" => $ip_address,
                "Username" => $user_name,
                "Password" => $password,
                "Organization" => $user_org,
                "Department" => $dept,
                "Designation" => $designation,
                "Reason for Update" => $update_reason,
                "Security Tips" => $securityTips,
            ];
            $buttonLink = _URL_;
            $bodyDetails = [
                "actionDescription" => $actionDescription,
                "detailsHeading" => $detailsHeading,
                "details" => $details,
                "buttonLink" => $buttonLink
            ];
            $mail->sendloginNotification(array($email), $subject, $bodyDetails, []);
        }
        if ($_POST['account_status'] == "disable") {
            $rand = rand();
            $pass = md5($rand);

            $id = $_REQUEST['update_user_id'];
            $update_users = new Users;
            $update_users->whereAdd("user_id='$id'");
            $update_users->modifier = $usr_id;
            $update_users->modify_time = $time;
            $update_users->account_status = trim($_POST['account_status']);
            $update_users->password = $pass;
            $update_users->update(DB_DATAOBJECT_WHEREADD_ONLY);

            $remarks_obj = new DB_Public_users_remarks();
            $remarks_obj->user_id = $id;
            $remarks_obj->remarks_date = $time;
            $remarks_obj->remarks_user = $usr_id;
            $remarks_obj->remarks = $update_reason;
            $remarks_obj->insert();

            // Audit Trail
            $dept_id = getDeptId($usr_id);
            $new_val = "Full Name : " . trim($_POST['full_name']) . "\nDesignation : " . getDesignation(trim($_POST['designation'])) . "\nOrganization : " . getOrganization(trim($_POST['organization'])) . "\nPlant Name : " . getPlantName(trim($_POST['plant_name'])) . "\nDepartment : " . getDepartment(trim($_POST['department'])) . "\nAccount Status : " . trim($_POST['account_status']) . "\nReason for Update : " . $update_reason;
            $old_val = "Full Name : " . $at_old_user_full_name . "\nDesignation : " . getDesignation($atuser_old->designation_id) . "\nOrganization : " . getOrganization($atuser_old->org_id) . "\nPlant Name : " . getPlantName($atuser_old->plant_id) . "\nDepartment : " . getDepartment($atuser_old->department_id) . "\nAccount Status : " . $atuser_old->account_status;
            $sequence_object = new Sequence;
            $audit_id = "audit.user:" . $sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_user(), $audit_id, $usr_id, $dept_id, 'Disable', $new_val, $old_val, "Successfully Disabled");
        }
        header("Location:index.php?module=admin&action=list_user");
    }

    $user_org = new Organization();
    $organizationlist = $user_org->organizationlist();

    $plant_list = getPlantList(null, $signup_obj->org_id);

    $user_desg = new Designation();
    $designationlist = $user_desg->designationlist();

    $view_users = new Users;
    $view_users->get("user_id", $_REQUEST['update_user_id']);

    $smarty->assign("regobj", $view_users);
    $smarty->assign('departmentlist', getPlantDeptList($check_user_obj->plant_id));
    $smarty->assign('designationlist', $designationlist);
    $smarty->assign('organizationlist', $organizationlist);
    $smarty->assign('plant_list', $plant_list);
    $smarty->assign('main', _TEMPLATE_PATH_ . "update_user.admin.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
