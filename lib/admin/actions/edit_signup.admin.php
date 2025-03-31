<?php

/**
 * Project:     Logicmind
 * File:        signup.admin.php
 *
 * @author Ananthakumar.v 
 * @since 10/02/2016
 * @package sop
 * @version 1.0
 * @see signup.admin.php
 */
/**
 * Getting organization list and assign to smarty
 * @see lib/admin/classes/Organization.class.php for class Organization
 */
$user_org = new Organization();
$organizationlist = $user_org->organizationlist();

/**
 * Getting designation list and assign to smarty
 * @see lib/admin/classes/Designation.class.php for class Designation
 */
$user_desg = new Designation();
$designationlist = $user_desg->designationlist();

/**
 * Getting department list and assign to smarty
 * @see lib/admin/classes/Department.class.php for class Department
 */
$signup_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$signup_obj = new DB_Public_user_signup();
include_module("sop");
$sop_process = new Sop_Processor();
$date_time = date('Y-m-d G:i:s');
$usr_id = trim($_SESSION['user_id']);
$creator = $sop_process->get_creater_id($signup_object_id);
if ($signup_obj->get("object_id", $signup_object_id)) {
    if ($signup_obj->status == "Request Created" && $creator == $usr_id || $signup_obj->status == "Review Need Correction" && $creator == $usr_id) {
        if ($sop_process->check_user_in_workflow($signup_object_id, $usr_id, "Created", 'create') && $sop_process->check_user_in_worklist($signup_object_id, $usr_id)) {
            $edit_button = true;
        }
    }
    if ($signup_obj->status == "Reviewal Pending" || $signup_obj->status == "Approve Need Correction") {
        if (($sop_process->check_user_in_workflow($signup_object_id, $usr_id, "Waiting", 'review') || $sop_process->check_user_in_workflow($signup_object_id, $usr_id, "Reviewed", 'review')) && $sop_process->check_user_in_worklist($signup_object_id, $usr_id)) {
            $edit_button = true;
        }
    }
    if ($signup_obj->status == "Approval Pending") {
        if ($sop_process->check_user_in_workflow($signup_object_id, $usr_id, "Waiting", 'approve') && $sop_process->check_user_in_worklist($signup_object_id, $usr_id)) {
            $edit_button = true;
        }
    }

    if ($edit_button) {
        $user_dept = new Department();
        $departmentlist = $user_dept->departmentlist();
        $plant_list = getPlantList(null, $signup_obj->org_id);
        $workflow_access_per_list = getSignupUserWorkflowPermission($signup_obj->user_id);

        if (isset($_POST['updateuser'])) {
            $update_signup_obj = new DB_Public_user_signup();
            $update_signup_obj->whereAdd("object_id = '$signup_object_id'");
            $update_signup_obj->org_id = trim($_POST['organization']);
            $update_signup_obj->plant_id = trim($_POST['plant_name']);
            $update_signup_obj->department_id = trim($_POST['department']);
            $update_signup_obj->full_name = trim($_POST['full_name']);
            $update_signup_obj->emp_id = trim($_POST['emp_id']);
            $update_signup_obj->designation_id = trim($_POST['designation']);
            $update_signup_obj->email = trim($_POST['email']);
            $update_signup_obj->modifier = $usr_id;
            $update_signup_obj->modified_time = $time;
            $update_signup_obj->update();

            $duser_signup_per_obj = new DB_Public_user_signup_workflow_permission();
            $duser_signup_per_obj->user_id = $signup_obj->user_id;
            $duser_signup_per_obj->find();
            $duser_signup_per_obj->delete();

            $suworkflow_per_array = $_POST['suworkflow_per'];
            foreach ($suworkflow_per_array as $val) {
                $asignup_workflow_per_obj = new DB_Public_user_signup_workflow_permission();
                $asignup_workflow_per_obj->user_id = $signup_obj->user_id;
                $asignup_workflow_per_obj->access_per_id = $val;
                $asignup_workflow_per_obj->created_by = $usr_id;
                $asignup_workflow_per_obj->created_time = $time;
                $asignup_workflow_per_obj->insert();
            }

            //Audit Trial
            $audit_remarks = "Request No : " . $signup_obj->request_no . " Updated" . "\nEmployee Id : " . $signup_obj->emp_id;
            add_signup_audit_trial($signup_object_id, 'signup_request_update', $audit_remarks, null, 'Updated');
            header("Location:$_SERVER[REQUEST_URI]");
        }

        $smarty->assign("regobj", $signup_obj);
        $smarty->assign('organizationlist', $organizationlist);
        $smarty->assign('designationlist', $designationlist);
        $smarty->assign('departmentlist', $departmentlist);
        $smarty->assign('departmentlist', getPlantDeptList($signup_obj->plant_id));
        $smarty->assign('org_id', $signup_obj->org_id);
        $smarty->assign('plant_id', $signup_obj->plant_id);
        $smarty->assign('plant_list', $plant_list);
        $smarty->assign('dep_id', $signup_obj->department_id);
        $smarty->assign('des_id', $signup_obj->designation_id);
        $smarty->assign('signup_object_id', $signup_object_id);
        $smarty->assign('workflow_access_per_list', $workflow_access_per_list);
        $smarty->assign('main', _TEMPLATE_PATH_ . "edit_signup.admin.tpl");
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
