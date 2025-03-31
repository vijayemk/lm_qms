<?php

/**
 * Project: Logicmind
 * File:view_dms.dms.php
 *
 * @author Puneet
 * @since 08/07/2024
 * @package integration
 * @version 1.0
 * @see view_integration.integration.tpl
 * */
error_reporting(E_ALL & ~E_NOTICE);
$int_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;

$integration_details_array = array_shift(get_integration_details($int_object_id));
if ($integration_details_array) {
    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $usr_dept_id = getDeptId($usr_id);
    $date_time = date('Y-m-d G:i:s');
    $int_master_obj = (object) $integration_details_array;

    /** Department Restriction */
    if (!isDeptAccessRightsExist($int_master_obj->source_doc_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }
    // Assign to - trigger dest doc
    if ($int_master_obj->status == 'Open' && $int_master_obj->wf_status == "e-trigger Pending Assignment" && check_user_in_worklist($int_object_id, $usr_id)) {
        $smarty->assign('show_assign_btn', true);
        $smarty->assign("ar_plant_list", getAccessRightsPlantList($int_master_obj->source_doc_id));

        if (isset($_POST['assign_integration'])) {
            $assigned_to = (isset($_REQUEST['assigned_to'])) ? $_REQUEST['assigned_to'] : null;
            $wf_remarks = (isset($_REQUEST['wf_remarks'])) ? $_REQUEST['wf_remarks'] : null;

            if (trigger_integration($int_master_obj->object_id, $assigned_to)) {
                delete_worklist($usr_id, $int_object_id);
                addWorkflowRemarks($int_master_obj->source_doc_id, $wf_remarks, $usr_id, $date_time);
                $mail_link_btn = _URL_ . get_lm_json_value_by_key('definitions->url->integration->view') . $int_master_obj->object_id;

                //**** Send Mail**//
                $subject = "$int_master_obj->source_doc_name | $int_master_obj->source_doc_no | $int_master_obj->dest_doc_name Triggered  | [Action Required]";
                $actionDescription = "The $int_master_obj->dest_doc_name has been triggered";
                $mail_details = [
                    "Source Doc No." => $int_master_obj->source_doc_no,
                    "Destination Doc No." => $int_master_obj->dest_doc_no,
                    "Reason" => $int_master_obj->reason,
                    "Remarks" => $wf_remarks,
                    "Tracking No" => get_integration_tracking_no($int_master_obj->object_id, 'tracking_link'),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail($assigned_to, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }

    $smarty->assign('int_master_obj', $int_master_obj);
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_integration.integration.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
