<?php

function add_worklist($work_user_id, $object_id) {
    $work_assigned_date = date('Y-m-d G:i:s');
    $worklist = new DB_Public_lm_worklist();
    $worklist->whereAdd("work_user_id='$work_user_id'");
    $worklist->whereAdd("object_id='$object_id'");
    if (!$worklist->find()) {
        $worklist->work_user_id = $work_user_id;
        $worklist->object_id = $object_id;
        $worklist->work_assigned_date = $work_assigned_date;
        $worklist->insert();
    }
}

function save_workflow($object_id, $user_id, $status, $action) {
    $actiontime = date('Y-m-d G:i:s');
    $action_id = get_workflow_action_id($action);

    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_user='$user_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    if (!$workflow_obj->find()) {
        $sequence_object = new Sequence;
        $workflow_obj_id = "workflow_id:" . $sequence_object->get_next_sequence();

        $workflow_obj->object_id = $object_id;
        $workflow_obj->lm_workflow_date = $actiontime;
        $workflow_obj->lm_workflow_user = $user_id;
        $workflow_obj->desig_id = getDesignationIdByUserId($user_id);
        $workflow_obj->lm_workflow_status = $status;
        $workflow_obj->lm_workflow_actions = $action_id;
        $workflow_obj->workflow_object_id = $workflow_obj_id;
        $workflow_obj->assigned_date = $actiontime;
        $workflow_obj->assigned_by = trim($_SESSION['user_id']);
        $workflow_obj->insert();
    } else {
        update_workflow($object_id, $user_id, $status, $action);
    }
}

function update_workflow($object_id, $user_id, $status, $action) {
    $actiontime = date('Y-m-d G:i:s');
    $action_id = get_workflow_action_id($action);

    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_user='$user_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    $workflow_obj->desig_id = getDesignationIdByUserId($user_id);
    $workflow_obj->lm_workflow_status = $status;
    $workflow_obj->lm_workflow_date = $actiontime;
    $workflow_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);        
}

function get_workflow_action_id($action_name) {
    $actions_obj = new DB_Public_lm_workflow_actions();
    $actions_obj->get("lm_workflow_action_name", $action_name);
    return $actions_obj->lm_workflow_action_id;
}

function check_user_in_worklist($object_id, $user) {
    $worklist_obj = new DB_Public_lm_worklist();
    $worklist_obj->whereAdd("object_id='$object_id'");
    $worklist_obj->whereAdd("work_user_id='$user'");
    if ($worklist_obj->find())
        return true;
    else
        return false;
}

function get_workflow_action_name($action_id) {
    $actions_obj = new DB_Public_lm_workflow_actions();
    $actions_obj->get("lm_workflow_action_id", $action_id);
    return $actions_obj->lm_workflow_action_name;
}

function get_all_workflow_actions($object_id, $action = null, $status = null) {
    $action_id = get_workflow_action_id($action);
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    ($action) ? $workflow_obj->whereAdd("lm_workflow_actions='$action_id'") : false;
    ($status) ? $workflow_obj->whereAdd("lm_workflow_status='$status'") : false;
    $workflow_obj->orderBy('lm_workflow_date');
    if ($workflow_obj->find()) {
        while ($workflow_obj->fetch()) {
            $user_name = getFullName($workflow_obj->lm_workflow_user);
            $department = getDeptName($workflow_obj->lm_workflow_user);
            $plant = getUserPlantShortName($workflow_obj->lm_workflow_user);
            $action = get_workflow_action_name($workflow_obj->lm_workflow_actions);
            $workflow_status[] = array(
                'user_name' => $user_name,
                'department' => $department,
                "desi" => getDesignation($workflow_obj->desig_id),
                'date' => display_datetime_format($workflow_obj->lm_workflow_date),
                'plant' => $plant,
                'action' => $action,
                'status' => $workflow_obj->lm_workflow_status,
            );
        }
        return ($workflow_status);
    }
    return null;
}

function check_user_in_workflow($object_id, $user, $status, $action) {
    $action_id = get_workflow_action_id($action);
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_user='$user'");
    if (!$status == "") {
        $workflow_obj->whereAdd("lm_workflow_status='$status'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        if ($workflow_obj->find()) {
            return true;
        }
    }
    return false;
}

function is_user_in_workflow_action($object_id, $user, $action) {
    $action_id = get_workflow_action_id($action);
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_user='$user'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    if ($workflow_obj->find()) {
        return true;
    }
    return false;
}

function delete_worklist($work_user_id, $object_id) {
    $worklist = new DB_Public_lm_worklist();
    $worklist->whereAdd("work_user_id='$work_user_id'");
    $worklist->whereAdd("object_id='$object_id'");
    $worklist->delete(DB_DATAOBJECT_WHEREADD_ONLY);
}

function delete_all_worklist($object_id) {
    $worklist = new DB_Public_lm_worklist();
    $worklist->whereAdd("object_id='$object_id'");
    $worklist->delete(DB_DATAOBJECT_WHEREADD_ONLY);
}

function delete_workflow_action($object_id, $status, $action) {
    $action_id = get_workflow_action_id($action);
    $workflow = new DB_Public_lm_workflow();
    $workflow->whereAdd("object_id='$object_id'");
    $workflow->whereAdd("lm_workflow_status='$status'");
    $workflow->whereAdd("lm_workflow_actions='$action_id'");
    $workflow->delete(DB_DATAOBJECT_WHEREADD_ONLY);
}

function is_action_finished($object_id, $action, $status) {
    $workflow_obj = new DB_Public_lm_workflow();
    $action_id = get_workflow_action_id($action);
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    if ($workflow_obj->find()) {
        while ($workflow_obj->fetch()) {
            if ($workflow_obj->lm_workflow_status != $status)
                return false;                
        }
        return true;
    }
    return false;
}

function get_all_workflow_users_list($object_id) {
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->find();
    while ($workflow_obj->fetch()) {
        $users_list[] = $workflow_obj->lm_workflow_user;
    }
    return ($users_list);
}

function get_workflow_action_user($object_id, $action) {
    $action_id = get_workflow_action_id($action);

    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    if ($workflow_obj->find()) {
        while ($workflow_obj->fetch()) {
            $workflow_user = $workflow_obj->lm_workflow_user;
        }
        return ($workflow_user);
    }
    return null;
}

function get_workflow_userlist_by_objectid_action_status($object_id, $action, $status) {
    $action_id = get_workflow_action_id($action);
    $users_list = array();
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    $workflow_obj->whereAdd("lm_workflow_status='$status'");
    $workflow_obj->find();
    while ($workflow_obj->fetch()) {
        $users_list[] = array(
            'user_id' => $workflow_obj->lm_workflow_user,
            'user_name' => getFullName($workflow_obj->lm_workflow_user),
            'plant' => getUserPlantShortName($workflow_obj->lm_workflow_user),
            'dept' => getDeptName($workflow_obj->lm_workflow_user),
        );
    }
    return ($users_list);
}

function get_workflow_userlist_by_objectid_action($object_id, $action) {
    $action_id = get_workflow_action_id($action);
    $users_list = array();
    $workflow_obj = new DB_Public_lm_workflow();
    $workflow_obj->whereAdd("object_id='$object_id'");
    $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
    $workflow_obj->find();
    while ($workflow_obj->fetch()) {
        $users_list[] = array(
            'user_id' => $workflow_obj->lm_workflow_user,
            'user_name' => getFullName($workflow_obj->lm_workflow_user),
            'plant' => getUserPlantShortName($workflow_obj->lm_workflow_user),
            'dept' => getDeptName($workflow_obj->lm_workflow_user),
            'esign_type' => get_lm_json_value_by_key("definitions->e_sign->full_form->$action")
        );
    }
    return ($users_list);
}

function delete_user_workflow_action($object_id, $usr_id, $status, $action) {
    $action_id = get_workflow_action_id($action);
    $workflow = new DB_Public_lm_workflow();
    $workflow->whereAdd("object_id='$object_id'");
    $workflow->whereAdd("lm_workflow_user='$usr_id'");
    $workflow->whereAdd("lm_workflow_status='$status'");
    $workflow->whereAdd("lm_workflow_actions='$action_id'");
    $workflow->delete(DB_DATAOBJECT_WHEREADD_ONLY);
}

function send_workflow_mail($workflow_userslist, $subject, $actionDescription, $detailsHeading, $details, $buttonLink, $attachemnts = []) {
    if ($workflow_userslist) {
        $mail = new changeMailer;
        $bodyDetails = [
            "actionDescription" => $actionDescription,
            "detailsHeading" => $detailsHeading,
            "details" => $details,
            "buttonLink" => $buttonLink
        ];
        if (is_array($workflow_userslist)) {
            foreach ($workflow_userslist as $wf_user_id) {
                if ($_SESSION['user_id'] != $wf_user_id) {
                    $email = getEmailbyUserId($wf_user_id);
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, $attachemnts);
                }
            }
        } else {
            $email = getEmailbyUserId($workflow_userslist);
            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, $attachemnts);
        }
    }
}

function send_external_mail($userslist, $subject, $actionDescription, $detailsHeading, $details, $buttonLink, $attachemnts = []) {
    if ($userslist) {
        $mail = new changeMailer;
        $bodyDetails = [
            "actionDescription" => $actionDescription,
            "detailsHeading" => $detailsHeading,
            "details" => $details,
            "buttonLink" => $buttonLink
        ];
        if (is_array($userslist)) {
            foreach ($userslist as $wf_user_id) {
                if ($_SESSION['user_id'] != $wf_user_id) {
                    $mail->sendNotification(array($userslist), [], [], $subject, $bodyDetails, $attachemnts);
                }
            }
        } else {
            $mail->sendNotification(array($userslist), [], [], $subject, $bodyDetails, $attachemnts);
        }
    }
}

function addWorkflowRemarks($ref_object_id, $remarks, $usr_id, $data_time) {
    $object_id = get_object_id("definitions->object_id->workflow->workflow_remarks->object_id");

    $obj = new DB_Public_lm_workflow_remarks();
    $obj->object_id = $object_id;
    $obj->ref_object_id = $ref_object_id;
    $obj->remarks = $remarks;
    $obj->created_by = $usr_id;
    $obj->created_time = $data_time;
    $obj->insert();
    return true;
}

function getWorkflowRemarks($object_id, $ref_object_id, $remarks_user, $time = null) {
    $obj = new DB_Public_lm_workflow_remarks();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($ref_object_id) {
        $obj->whereAdd("ref_object_id='$ref_object_id'");
    }
    if ($remarks_user) {
        $obj->whereAdd("created_by='$remarks_user'");
    }
    if ($time) {
        $obj->whereAdd("created_time='$time'");
    }
    $obj->orderBy('created_time');
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            $remarks_list[] = array(
                'object_id' => $obj->object_id,
                'ref_object_id' => $obj->ref_object_id,
                'remarks' => $obj->remarks,
                'department' => getDeptName($obj->created_by),
                "plant" => getPlantShortName(getUserPlantId($obj->created_by)),
                'creared_by_id' => $obj->created_by,
                'created_by' => getFullName($obj->created_by),
                'created_time' => $obj->created_time,
                'count' => $count
            );
            $count++;
        }
        return $remarks_list;
    }
    return null;
}

function getWorklistPendingDetails($object_id) {
    $sysdate = date('Y-m-d H:i:s');
    $worklist_obj = new DB_Public_lm_worklist();
    $worklist_obj->whereAdd("object_id='$object_id'");
    if ($worklist_obj->find()) {
        while ($worklist_obj->fetch()) {
            $pending_days = dateDiffInDays($worklist_obj->work_assigned_date, $sysdate);
            $worklist_array[] = array(
                "user_id" => $worklist_obj->work_user_id,
                'user_name' => getFullName($worklist_obj->work_user_id),
                'dept' => getDeptName($worklist_obj->work_user_id),
                'plant' => getUserPlantName($worklist_obj->work_user_id),
                'pending_from' => $worklist_obj->work_assigned_date,
                'pending_days' => $pending_days
            );
        }
        return $worklist_array;
    }
    return null;
}

function get_workflow_date($object_id, $action, $status, $user_id = null) {
    $action_id = get_workflow_action_id($action);

    $obj = new DB_Public_lm_workflow();
    $obj->whereAdd("object_id='$object_id'");
    $obj->whereAdd("lm_workflow_actions='$action_id'");
    $obj->whereAdd("lm_workflow_status='$status'");
    if ($user_id) {
        $obj->whereAdd("lm_workflow_user='$user_id'");
    }
    if ($obj->find()) {
        while ($obj->fetch()) {
            return $obj->lm_workflow_date;
        }
    }
    return null;
}

/* * *Interim Extesnion start* */

function add_extension_details($ref_object_id, $ref_object_id1, $exisiting_date, $proposed_date, $extension_for, $reason, $action_status, $requested_to, $wf_status, $created_by, $created_time) {
    $id = get_object_id("definitions->object_id->common->extension_request");
    $obj = new DB_Public_lm_extension_details();
    $obj->object_id = $id;
    $obj->ref_object_id = $ref_object_id;
    $obj->ref_object_id1 = $ref_object_id1;
    $obj->existing_target_date = $exisiting_date;
    $obj->proposed_target_date = $proposed_date;
    $obj->extension_for = $extension_for;
    $obj->reason = $reason;
    $obj->created_by = $created_by;
    $obj->created_time = $created_time;
    $obj->action_status = $action_status;
    $obj->status = "Pending";
    $obj->approval_status = "Pending";
    $obj->requested_to = $requested_to;
    $obj->wf_status = $wf_status;
    if ($obj->insert()) {
        $at_data[''] = array("Exisitng Target Date : $exisiting_date", "Proposed Target Date : $proposed_date", $exisiting_date . "\n {$ref_object_id} - $ref_object_id1");
        $at_data['Extension For'] = array("NA", $extension_for, $extension_for);
        $at_data['Reason'] = array("NA", $reason, $reason);
        $at_data['Status'] = array("NA", $wf_status, $wf_status);
        $at_data['Requested By'] = array("NA", getFullName($created_by), $created_by . " - " . getFullName($created_by));
        $at_data['Requested To'] = array("NA", getFullName($requested_to), $requested_to . " - " . getFullName($requested_to));
        addAuditTrailLog($ref_object_id, $id, $at_data, $_POST['audit_trail_action'], "Extension Requested");
        return true;
    }
    return false;
}

function get_extension_details($object_id = null, $ref_object_id = null, $extension_for = null, $status = null) {
    $obj = new DB_Public_lm_extension_details();
    ($object_id) ? $obj->whereAdd("object_id='$object_id'") : null;
    ($ref_object_id) ? $obj->whereAdd("ref_object_id='$ref_object_id'") : null;
    ($extension_for) ? $obj->whereAdd("extension_for='$extension_for'") : null;
    ($status) ? $obj->whereAdd("status='$status'") : null;
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            $approved_date = ($obj->approved_date) ? display_datetime_format($obj->approved_date) : null;
            $extension_list[] = array(
                'object_id' => $obj->object_id,
                'ref_object_id' => $obj->ref_object_id,
                'ref_object_id1' => $obj->ref_object_id1,
                'existing_target_date_m' => display_date_format($obj->existing_target_date),
                'existing_target_date' => $obj->existing_target_date,
                'proposed_target_date_m' => display_date_format($obj->proposed_target_date),
                'proposed_target_date' => $obj->proposed_target_date,
                'extension_for' => $obj->extension_for,
                'reason' => $obj->reason,
                'created_by_id' => $obj->created_by,
                'created_by_name' => getFullName($obj->created_by),
                'created_time' => display_datetime_format($obj->created_time),
                'action_status' => $obj->action_status,
                'approved_by_id' => $obj->approved_by,
                'approved_by' => getFullName($obj->approved_by),
                'approved_date' => $approved_date,
                'status' => $obj->status,
                'approval_status' => $obj->approval_status,
                'wf_status' => $obj->wf_status,
                'count' => $count
            );
            $count++;
        }
        return $extension_list;
    }
    return null;
}

function is_extension_elegible_to_raise($ref_object_id, $extension_for) {
    if (count(get_extension_details(null, $ref_object_id, $extension_for, "Pending"))) {
        return false;
    }
    return true;
}

function get_extension_details_by_request_field($ref_object_id, $extension_for, $status, $request_filed) {
    $requested_value = get_extension_details(null, $ref_object_id, $extension_for, $status)[0][$request_filed];
    if ($requested_value) {
        return $requested_value;
    }
    return false;
}

function accept_reject_extension_details($object_id, $ref_object_id, $accept_reject, $approver_comments, $action_status, $usr_id, $date_time, $audit_trail_action) {
    //Object to get old vlaues
    $at_old = new DB_Public_lm_extension_details();
    $at_old->get("object_id", $object_id);

    //Object to update new values
    $u_obj = new DB_Public_lm_extension_details();
    $u_obj->whereAdd("object_id='$object_id'");
    $u_obj->whereAdd("ref_object_id='$ref_object_id'");
    $u_obj->approval_status = $accept_reject;
    $u_obj->approver_comments = $approver_comments;
    $u_obj->status = "Completed";
    $u_obj->action_status = $action_status;
    $u_obj->approved_by = $usr_id;
    $u_obj->approved_date = $date_time;
    if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        $approved_by = getFullName($usr_id);
        $at_data[''] = array("Existing Target  Date : $at_old->existing_target_date\nExtension For : $at_old->extension_for", "Proposed Target Date : $at_old->proposed_target_date\nExtension For : $at_old->extension_for\nApproval Status : $accept_reject\nApproved/Rejected By : $approved_by", $usr_id . " - " . $approved_by);
        addAuditTrailLog($ref_object_id, $object_id, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }
    return false;
}

/* * *Interim Extension Stop* */

//Worklist 
function getWorkflowList($usr_id = null) {
    $user_worklist = new DB_Public_lm_worklist();
    ($usr_id) ? $user_worklist->whereAdd("work_user_id='$usr_id'") : false;
    $user_worklist->orderBy('work_assigned_date');
    $user_worklist->find();
    $user_worklist_array = array();
    while ($user_worklist->fetch()) {
        $full_name = getFullName($user_worklist->work_user_id);
        if (preg_match("/admin.signup:/", $user_worklist->object_id)) {
            $user_signup = new DB_Public_user_signup();
            $user_signup->get("object_id", $user_worklist->object_id);
            //$url = "?module=admin&action=view_signup&object_id=" . $user_worklist->object_id;
            //$url = "<a href=index.php?module=admin&action=view_signup&object_id={$user_worklist->object_id} target=_blank>$user_signup->request_no</a>";

            $url = "index.php?module=admin&action=view_signup&object_id={$user_worklist->object_id}";
            $link = "<a href={$url} target=_blank>{$user_signup->request_no}</a>";
            $progress_bar_status = get_signup_progress_bar_status($user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => "User Signup", 'no' => $user_signup->request_no, 'desc' => "User Sign Up Request", 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $user_signup->status, 'url' => $url, 'link' => $link, 'progress_bar_status' => $progress_bar_status);
        }
        if (preg_match("/admin.user_exit:/", $user_worklist->object_id)) {
            $user_exit = new DB_Public_user_exit();
            $user_exit->get("object_id", $user_worklist->object_id);
            // $url = "?module=admin&action=view_user_exit&object_id=" . $user_worklist->object_id;
            //$url = "<a href=index.php?module=admin&action=view_user_exit&object_id={$user_worklist->object_id} target=_blank>$user_exit->request_no</a>";
            $url = "index.php?module=admin&action=view_user_exit&object_id={$user_worklist->object_id}";
            $link = "<a href={$url} target=_blank>{$user_exit->request_no}</a>";
            $progress_bar_status = get_user_exit_progress_bar_status($user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => "User Exit", 'no' => $user_exit->request_no, 'desc' => "User Exit Request", 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $user_exit->status, 'url' => $url, 'link' => $link, 'progress_bar_status' => $progress_bar_status);
        }
        if (preg_match("/sop.details:/", $user_worklist->object_id)) {
            $sop_master = new DB_Public_lm_sop_master();
            $sop_master->get("sop_object_id", $user_worklist->object_id);
            //$url = "?module=sop&action=view_sop&view_sop=" . $user_worklist->object_id;
            $progress_bar_status = get_sop_progress_bar_status($user_worklist->object_id);
            if (!empty($sop_master->sop_no)) {
                $sop_no = $sop_master->sop_no;
            } else {
                $sop_no = $sop_master->sop_draft_no;
            }
            $url = "index.php?module=sop&action=view_sop&object_id={$user_worklist->object_id}";
            $link = "<a href={$url} target=_blank>{$sop_no} - [$sop_master->sop_name]</a>";
            //$url = "<a href=index.php?module=sop&action=view_sop&object_id={$user_worklist->object_id} target=_blank>{$sop_no} - [$sop_master->sop_name]</a>";
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($sop_master->lm_doc_id), 'no' => $sop_no, 'desc' => $sop_master->sop_name, 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $sop_master->status, 'url' => $url, 'link' => $link, 'progress_bar_status' => $progress_bar_status);
        }

        /**    CC User Pending List Start  * */
        $ccm_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->ccm->object_id");
        if (preg_match("/{$ccm_workflow_id}/", $user_worklist->object_id)) {
            $dms_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($dms_details['lm_doc_id']), 'no' => $dms_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $dms_details['status'] . " - [" . $dms_details['wf_status'] . "]", 'url' => $dms_details['doc_url'], 'link' => $dms_details['doc_link'], 'progress_bar_status' => get_ccm_progress_bar_status($dms_details['wf_status']));
        }
        /**    DMS User Pending List Start  * */
        $dms_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->dms->object_id");
        if (preg_match("/{$dms_workflow_id}/", $user_worklist->object_id)) {
            $dms_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($dms_details['lm_doc_id']), 'no' => $dms_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $dms_details['status'] . " - [" . $dms_details['wf_status'] . "]", 'url' => $dms_details['doc_url'], 'link' => $dms_details['doc_link'], 'progress_bar_status' => get_dms_progress_bar_status($dms_details['wf_status']));
        }
        /**    CAPA User Pending List Start  * */
        $capa_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->capa->object_id");
        if (preg_match("/{$capa_workflow_id}/", $user_worklist->object_id)) {
            $dms_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($dms_details['lm_doc_id']), 'no' => $dms_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $dms_details['status'] . " - [" . $dms_details['wf_status'] . "]", 'url' => $dms_details['doc_url'], 'link' => $dms_details['doc_link'], 'progress_bar_status' => get_capa_progress_bar_status($dms_details['wf_status']));
        }
        /**    VMS User Pending List Start  * */
        $vms_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->vms->object_id");
        if (preg_match("/{$vms_workflow_id}/", $user_worklist->object_id)) {
            $vms_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($vms_details['lm_doc_id']), 'no' => $vms_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $vms_details['status'] . " - [" . $vms_details['wf_status'] . "]", 'url' => $vms_details['doc_url'], 'link' => $vms_details['doc_link'], 'progress_bar_status' => get_vms_progress_bar_status($vms_details['wf_status']));
        }
        /**    AMS User Pending List Start  * */
        $ams_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->ams->object_id");
        if (preg_match("/{$ams_workflow_id}/", $user_worklist->object_id)) {
            $ams_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($ams_details['lm_doc_id']), 'no' => $ams_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $ams_details['status'] . " - [" . $ams_details['wf_status'] . "]", 'url' => $ams_details['doc_url'], 'link' => $ams_details['doc_link'], 'progress_bar_status' => get_ams_progress_bar_status($ams_details['wf_status']));
        }
        /**    OOS User Pending List Start  * */
        $oos_workflow_id = get_lm_json_value_by_key("definitions->object_id->workflow->oos->object_id");
        if (preg_match("/{$oos_workflow_id}/", $user_worklist->object_id)) {
            $oos_details = get_qms_doc_no(null, $user_worklist->object_id);
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => getLmDocShortName($oos_details['lm_doc_id']), 'no' => $oos_details['doc_no'], 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $oos_details['status'] . " - [" . $oos_details['wf_status'] . "]", 'url' => $oos_details['doc_url'], 'link' => $oos_details['doc_link'], 'progress_bar_status' => getOOSProgressBarStatus($oos_details['wf_status']));
        }
        /** Integration User Pending List Start  * */
        $integration_workflow = get_lm_json_value_by_key("definitions->object_id->integration->object_id");
        if (preg_match("/{$integration_workflow}/", $user_worklist->object_id)) {
            $int_master = new DB_Public_lm_doc_integration_details();
            $int_master->get("object_id", $user_worklist->object_id);
            $url = "?module=integration&action=view_integration&object_id=" . $user_worklist->object_id;
            if (!empty($int_master->tracking_no)) {
                $tracking_no = $int_master->tracking_no;
            }
            $user_worklist_array[] = array('user_name' => $full_name, 'type' => "Integration", 'no' => $tracking_no, 'desc' => $int_master->tracking_no, 'assigned_date' => display_datetime_format($user_worklist->work_assigned_date), 'status' => $int_master->status, 'url' => $url, 'progress_bar_status' => "NA");
        }
    }
    return $user_worklist_array;
}

// ********** Progress bar start ********** //
function get_signup_progress_bar_status($signup_object_id) {
    $user_signup_obj = new DB_Public_user_signup();
    $user_signup_obj->get('object_id', $signup_object_id);
    if ($user_signup_obj->status == "Request Created" || $user_signup_obj->status == "Reviewal Pending" || $user_signup_obj->status == "Review Need Correction") {
        $progress_status = "20%";
    } else if ($user_signup_obj->status == "Waiting for Sending Approval" || $user_signup_obj->status == "Approval Pending" || $user_signup_obj->status == "Approve Need Correction") {
        $progress_status = "40%";
    } else if ($user_signup_obj->status == "Approved") {
        $progress_status = "60%";
    } else if ($user_signup_obj->status == "Waiting for Activate") {
        $progress_status = "80%";
    } else if ($user_signup_obj->status == "Completed") {
        $progress_status = "100%";
    } else {
        $progress_status = "NA";
    }
    return $progress_status;
}

function get_user_exit_progress_bar_status($exit_object_id) {
    $user_exit_obj = new DB_Public_user_exit();
    $user_exit_obj->get('object_id', $exit_object_id);
    if ($user_exit_obj->status == "Request Created" || $user_exit_obj->status == "Reviewal Pending" || $user_exit_obj->status == "Review Need Correction") {
        $progress_status = "20%";
    } else if ($user_exit_obj->status == "Waiting for Sending Approval" || $user_exit_obj->status == "Approval Pending" || $user_exit_obj->status == "Approve Need Correction") {
        $progress_status = "40%";
    } else if ($user_exit_obj->status == "Approved") {
        $progress_status = "60%";
    } else if ($user_exit_obj->status == "Waiting for DeActivate") {
        $progress_status = "80%";
    } else if ($user_exit_obj->status == "Completed") {
        $progress_status = "100%";
    } else {
        $progress_status = "NA";
    }
    return $progress_status;
}

function get_sop_progress_bar_status($sop_object_id) {
    include_once('lib/sop/functions/Sop_Processor.func.php');
    $sop_process = new Sop_Processor();
    $published_status = $sop_process->get_published_status($sop_object_id);

    $sop_obj = new DB_Public_lm_sop_master();
    $sop_obj->get('sop_object_id', $sop_object_id);
    if ($sop_obj->status == "Draft Created" || $sop_obj->status == "Pre Reviewal Pending" || $sop_obj->status == "Pre Review Need Correction" || $sop_obj->status == "Reviewal Pending" || $sop_obj->status == "Review Need Correction" || $sop_obj->status == "Waiting for Sending Reviewal") {
        $progress_status = "10%";
    } else if ($sop_obj->status == "Waiting for Sending Approval" || $sop_obj->status == "Approval Pending" || $sop_obj->status == "Approve Need Correction") {
        $progress_status = "20%";
    } else if ($sop_obj->status == "Waiting for Sending Authorization" || $sop_obj->status == "Authorization Pending" || $sop_obj->status == "Authorization Need Correction") {
        $progress_status = "30%";
    } else if ($sop_obj->status == "Trainer To Be Assigned") {
        $progress_status = "40%";
    } else if ($sop_obj->status == "Training To Be Scheduled" || $sop_obj->status == "Training Pending") {
        $progress_status = "50%";
    } else if ($sop_obj->status == "Waiting for Question Preparation" || $sop_obj->status == "Waiting for Online Exam") {
        $progress_status = "60%";
    } else if ($sop_obj->status == "Waiting for Setting Effective Date") {
        $progress_status = "70%";
    } else if ($sop_obj->status == "Distribution Copy Pending") {
        $progress_status = "80%";
    } else if ($sop_obj->status == "Waiting for Acknowledgement") {
        $progress_status = "90%";
    } else if ($sop_obj->status == "Completed") {
        $progress_status = "100%";
    } else {
        $progress_status = "NA";
    }
    return $progress_status;
}

function get_dms_progress_bar_status($wf_status = null) {
    $st_arr = array(
        "Created" => "10%",
        "Pre Review Pending" => "15%",
        "Pending for Sending Department Head Approval" => "15%",
        "Department Head Approval Needs Correction" => "25%",
        "Department Head Approval Pending" => "25%",
        "Pending for Sending QA Review" => "25%",
        "Pending for QA Review" => "30%",
        "QA Review Needs Correction" => "30%",
        "Pending for Sending CFT Assessment" => "30%",
        "Pending for CFT Assessment" => "40%",
        "Pending Decision on Investigation" => "40%",
        "Pending for Assigning Investigator" => "45%",
        "Pending for Investigation" => "45%",
        "Investigation Review Needs Correction " => "45%",
        "Pending Extension of Investigation Target Date" => "45%",
        "Pending for Investigation Review" => "45%",
        "Pending for Investigation Verification" => "45%",
        "Pending for QA Approval" => "60%",
        "QA Approval Needs Correction" => "60%",
        "Pending for Pre Approval" => "60%",
        "Pending for Meeting Schedule" => "70%",
        "Pending for Meeting" => "70%",
        "Pending Extension of Meeting Target Date" => "70%",
        "Pending for Trainer Assignment" => "80%",
        "Pending for Training and Online Exam" => "80%",
        "Pending Extension of Training Target Date" => "80%",
        "Pending Extension of Exam Target Date" => "80%",
        "Pending for Task Creation" => "90%",
        "Pending Task Completion" => "90%",
        "Pending Extension of Task Target Date" => "90%",
        "Pending Close Out" => "95%",
        "Pending Extension of Close Out Target Date" => "95%",
        "Completed" => "100%",
        "Cancelled" => "100%",
        "Rejected" => "100%"
    );
    return ($wf_status) ? $st_arr[$wf_status] : $st_arr;
}

function get_ccm_progress_bar_status($wf_status = null) {
    $st_arr = array(
        "Created" => "5%",
        "Pre Review Pending" => "5%",
        "Pending for Sending Department Head Approval" => "10%",
        "Department Head Approval Pending" => "15%",
        "Department Head Approval Needs Correction" => "15%",
        "Pending for Sending QA Review" => "17%",
        "QA Review Needs Correction" => "17%",
        "Pending for QA Review" => "17%",
        "Pending for Sending CFT Assessment" => "20%",
        "Pending for CFT Assessment" => "22%",
        "Pending Decision on Investigation" => "25%",
        "Pending for Assigning Investigator" => "30%",
        "Pending for Investigation" => "33%",
        "Pending Extension of Investigation Target Date" => "33%",
        "Pending for Investigation Review" => "35%",
        "Investigation Review Needs Correction " => "40%",
        "Pending for Investigation Verification" => "45%",
        "Pending for QA Approval" => "50%",
        "QA Approval Needs Correction" => "50%",
        "Pending for Pre Approval" => "52%",
        "Pending for Meeting Schedule" => "55%",
        "Pending for Meeting" => "60%",
        "Pending Extension of Meeting Target Date" => "60%",
        "Pending for Trainer Assignment" => "65%",
        "Pending for Training and Online Exam" => "70%",
        "Pending Extension of Training Target Date" => "70%",
        "Pending for Task Creation" => "75%",
        "Pending Task Completion" => "80%",
        "Pending Extension of Task Target Date" => "80%",
        "Pending Close Out" => "90%",
        "Pending Extension of Monitoring Target Date" => "95%",
        "Pending Assignment for Effectiveness Monitoring" => "95%",
        "Pending Effectiveness Monitoring" => "95%",
        "Rejected" => "100%",
        "Cancelled" => "100%",
        "CC Closed" => "100%",
        "Completed" => "100%",
    );
    return ($wf_status) ? $st_arr[$wf_status] : $st_arr;
}

function get_capa_progress_bar_status($wf_status = null) {
    $st_arr = array(
        "Created" => "5%",
        "Pending for Meeting Schedule" => "10%",
        "Pending for Meeting" => "20%",
        "Pending for Sending Department Head Approval" => "20%",
        "Department Head Approval Pending" => "30%",
        "Department Head Approval Needs Correction" => "30%",
        "Pending for Sending QA Review" => "35%",
        "QA Review Needs Correction" => "35%",
        "Pending for QA Review" => "40%",
        "Pending for Sending QA Approval" => "45%",
        "Pending for QA Approval" => "50%",
        "QA Approval Needs Correction" => "50%",
        "Pending for Pre Approval" => "55%",
        "Pending Task Completion" => "60%",
        "Pending Extension of Task Target Date" => "60%",
        "Pending Close Out" => "90%",
        "CAPA under monitor" => "95%",
        "Pending Extension of Monitoring Target Date" => "95%",
        "Pending Assignment for Effectiveness Monitoring" => "95%",
        "Pending Effectiveness Monitoring" => "95%",
        "Rejected" => "100%",
        "Cancelled" => "100%",
        "CAPA Closed" => "100%",
        "Completed" => "100%",
    );
    return ($wf_status) ? $st_arr[$wf_status] : $st_arr;
}

function get_vms_progress_bar_status($wf_status = null) {
    $st_arr = array(
        "Created" => "10%",
        "Pending for QA Approval" => "20%",
        "QA Approval Needs Correction" => "20%",
        "Pending Auditors Assignment" => "25%",
        "Pending Audit" => "30%",
        "Pending for Audit Findings Review1" => "40%",
        "Audit Findings Review1 Needs Correction" => "40%",
        "Pending Sending Audit Report" => "50%",
        "Pending for Audit Findings Completion" => "60%",
        "Pending for Audit Findings Review2" => "65%",
        "Audit Findings Review2 Needs Correction" => "65%",
        "Pending Sending for Intimation and Acknowledgement" => "90%",
        "Pending For Acknowledgement" => "95%",
        "Completed" => "100%",
        "Cancelled" => "100%",
    );
    return ($wf_status) ? $st_arr[$wf_status] : $st_arr;
}

function getOOSProgressBarStatus($status = null) {
    $statusArray = [
        "Created" => "10%",
        "Preliminary Investigation to be Started" => "15%",
        "Preliminary Investigation is in Progress" =>"15%",
        "Waiting for Preliminary Investigation Conclusion" => "15%",
        "Waiting for Assigning QC Review" => "20%",
        "QC Review Is Pending" => "20%",
        "QC Review Need Correction" => "20%",
        "Waiting for Assigning QA Review" => "25%",
        "QA Review Is Pending" => "27%",
        "QA Review Need Correction" => "27%",        
        "Waiting for Assigning QC Approve" => "27%",
        "QC Approve Is Pending" => "27%",
        "QC Approve Need Correction" => "27%",
        "Waiting for Assigning QA Approve" => "30%",
        "QA Approve Is Pending" => "35%",
        "QA Approve Need Correction" => "35%",
        "Phase-1 Investigation to be Started" => "40%",
        "Phase-1 Investigation is in Progress" => "40%",
        "Waiting for Phase-1 Updation" => "41%",
        "Phase-1 Manufacturing Investigation to be Started" => "42%",
        "Phase-1 Manufacturing Investigation is in Progress" => "43%",
        "Waiting for Phase-1 Conclusion" => "44%",
        "Waiting for Phase-1 QC Verification" => "45%",
        "Waiting for Phase-1 QA Verification" => "46%",
        "Phase-2(Re-testing) Investigation to be Started" => "50%",
        "Phase-2(Re-testing) Investigation is in Progress" => "55%",
        "Waiting for Phase-2(Re-testing) Updation" => "60%",
        "Waiting for Phase-2(Re-testing) Conclusion" => "63%",
        "Waiting for Phase-2(Re-testing) QC Verification" => "65%",
        "Waiting for Phase-2(Re-testing) QA Verification" => "70%",
        "Phase-2(Re-sampling) Investigation to be Started" => "75%",
        "Phase-2(Re-sampling) Investigation is in Progress" => "77%",
        "Waiting for Phase-2(Re-sampling) Updation" => "80%",
        "Waiting for Phase-2(Re-sampling) Conclusion" => "83%",
        "Waiting for Phase-2(Re-sampling) QC Verification" => "85%",
        "Waiting for Phase-2(Re-sampling) QA Verification" => "87%",
        "Phase-3 Investigation to be Started" => "88%",
        "Waiting for Sending to get CFT Comments" => "88%",
        "CFT Reviewal Pending" => "90%",
        "Waiting for Close-out" => "95%",
        "Completed" => "100%",
        "Cancelled" => "100%",
    ];
    return ($status) ? $statusArray[$status] : $statusArray;
}

// ********** Progress bar End ********** //
// ********** Pending Analyzer Start ********** //

function getCurrentWorklistDetails() {
    $obj = new DB_DataObject();
    $query = "select a.work_user_id,b.full_name,count(a.work_user_id) as pcount from worklist_view a,users b where b.user_id::text=a.work_user_id group by a.work_user_id, b.full_name order by pcount desc";
    $obj->query($query);
    while ($obj->fetch()) {
        if (is_account_active($obj->work_user_id)) {
            $is_active = 'Yes';
        } else {
            $is_active = 'No';
        }
        $pending_details[] = array(
            'full_name' => $obj->full_name,
            'user_id' => $obj->work_user_id,
            'is_active' => $is_active,
            'emp_id' => getEmpId($obj->work_user_id),
            'dept_id' => getDeptId($obj->work_user_id),
            'dept' => getDeptName($obj->work_user_id),
            'plant_id' => getPlantOrgId($obj->work_user_id),
            'plant' => getUserPlantName($obj->work_user_id),
            'pcount' => $obj->pcount
        );
    }
    return $pending_details;
}

function getWorklistViewDetails($user_id, $from_days, $to_days) {
    $obj = new DB_DataObject();
    $query = "select count(work_assigned_date) from worklist_view where work_user_id='{$user_id}' and pending_in_days_days >='{$from_days}' and pending_in_days_days <='$to_days'";
    $obj->query($query);
    while ($obj->fetch()) {
        return $obj->count;
    }
}

// ********** Pending Analyzer Start ********** //
