<?php

/**
 * Audit Trial Processor Functions
 * @author Ananthakumar V
 * @since 16/05/2018
 * @version 1.0
 */
// Audit Trail
function AddAuditTrial($db_table, $audit_id, $usr_id, $usr_dept, $action, $new_val, $old_val, $status) {
    if (empty($old_val)) {
        $old_val = "N/A";
    } else {
        $old_val = $old_val;
    }
    $audit_obj = $db_table;
    $audit_obj->object_id = $audit_id;
    $audit_obj->user_id = $usr_id;
    $audit_obj->created_date = date('Y-m-d G:i:s');
    ;
    $audit_obj->action = $action;
    $audit_obj->ip_address = getIp();
    $audit_obj->post_data = $new_val;
    $audit_obj->old_value = $old_val;
    $audit_obj->status = $status;
    $audit_obj->year = date('y');
    $audit_obj->month = date('m');
    $audit_obj->department = $usr_dept;
    if ($audit_obj->insert()) {
        return true;
    }
}

function add_signup_audit_trial($object_id, $action, $remarks, $old_val, $status) {
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);
    $time = date('Y-m-d G:i:s');
    $createyear = date('y');
    $month = date('m');

    if (empty($old_val)) {
        $old_val = "N/A";
    } else {
        $old_val = $old_val;
    }

    $sequence_object = new Sequence;
    $audit_id = "audit.signup:" . $sequence_object->get_next_sequence();
    $audit_obj = new DB_Public_lm_audit_signup();
    $audit_obj->object_id = $audit_id;
    $audit_obj->user_id = $usr_id;
    $audit_obj->created_date = $time;
    $audit_obj->action = $action;
    $audit_obj->ip_address = getIp();
    //$audit_obj->url = $_SERVER['REQUEST_URI'];
    $audit_obj->post_data = $remarks;
    $audit_obj->old_value = $old_val;
    $audit_obj->status = $status;
    $audit_obj->year = $createyear;
    $audit_obj->month = $month;
    $audit_obj->department = $dept_id;
    $audit_obj->request_id = $object_id;
    $audit_obj->insert();
    return TRUE;
}

function add_user_exit_audit_trial($object_id, $action, $remarks, $old_val, $status) {
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);
    $time = date('Y-m-d G:i:s');
    $createyear = date('y');
    $month = date('m');

    if (empty($old_val)) {
        $old_val = "N/A";
    } else {
        $old_val = $old_val;
    }

    $sequence_object = new Sequence;
    $audit_id = "audit.user_exit:" . $sequence_object->get_next_sequence();
    $audit_obj = new DB_Public_lm_audit_user_exit();
    $audit_obj->object_id = $audit_id;
    $audit_obj->user_id = $usr_id;
    $audit_obj->created_date = $time;
    $audit_obj->action = $action;
    $audit_obj->ip_address = getIp();
    //$audit_obj->url = $_SERVER['REQUEST_URI'];
    $audit_obj->post_data = $remarks;
    $audit_obj->old_value = $old_val;
    $audit_obj->status = $status;
    $audit_obj->year = $createyear;
    $audit_obj->month = $month;
    $audit_obj->department = $dept_id;
    $audit_obj->request_id = $object_id;
    $audit_obj->insert();
    return TRUE;
}

function add_sop_audit_trial($sop_object_id, $sop_type, $action, $remarks, $status) {
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);
    $time = date('Y-m-d G:i:s');
    $createyear = date('y');
    $month = date('m');

    $sequence_object = new Sequence;
    $audit_id = "audit.sop:" . $sequence_object->get_next_sequence();
    $audit_obj = new DB_Public_lm_audit_sop_workflow();
    $audit_obj->object_id = $audit_id;
    $audit_obj->user_id = $usr_id;
    $audit_obj->created_date = $time;
    $audit_obj->action = $action;
    $audit_obj->ip_address = getIp();
    //$audit_obj->url = $_SERVER['REQUEST_URI'];
    $audit_obj->post_data = $remarks;
    $audit_obj->status = $status;
    $audit_obj->year = $createyear;
    $audit_obj->month = $month;
    $audit_obj->department = $dept_id;
    $audit_obj->sop_object_id = $sop_object_id;
    $audit_obj->sop_type = $sop_type;
    $audit_obj->old_value = "N/A";
    $audit_obj->insert();
    return TRUE;
}

function addAuditTrailLog($reference_object_id, $reference_object_id1, $at_data, $action, $status) {
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);
    $usr_plant = getUserPlantId($usr_id);
    $date_time = date('Y-m-d G:i:s');
    $createyear = date('y');
    $month = date('m');

    $sequence_object = new Sequence;
    $id = "lm_audit_trail_log:" . $sequence_object->get_next_sequence();

    $old_value = '';
    $new_value = '';
    $post_data = '';
    foreach ($at_data as $key => $val) {
        $key1 = ($key) ? "<span class='audit_trail_stl'>$key</span> : " : null;
        $old_value .= "<span class=''>{$key1}{$val[0]}</span>\n";
        $new_value .= "<span class=''>{$key1}{$val[1]}</span>\n";
        $post_data .= "<span class=''>{$key1}{$val[2]}</span>\n";
    }
    $obj = new DB_Public_lm_audit_trail_log();
    $obj->object_id = $id;
    $obj->ref_object_id = $reference_object_id;
    $obj->ref_object_id1 = $reference_object_id1;
    $obj->created_date = $date_time;
    $obj->year = $createyear;
    $obj->month = $month;
    $obj->user_id = $usr_id;
    $obj->plant = $usr_plant;
    $obj->dept = $dept_id;
    $obj->action = $action;
    $obj->old_value = $old_value;
    $obj->new_value = $new_value;
    $obj->post_data = $post_data;
    $obj->ip_address = getIp();
    $obj->url = $_SERVER[REQUEST_URI];
    $obj->status = $status;
    $obj->insert();
    return TRUE;
}

?>
