<?php

/**
 * Project:     Logicmind
 * File:        sop_extend_days.admin.php
 *
 * @author Ananthakumar V
 * @since 21/12/2019
 * @package admin
 * @version 1.0
 * @see sop_extend_days.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$sop_extend_days = get_sop_extend_days();
if (!empty($sop_extend_days)) {
    $smarty->assign("sop_extend_days", $sop_extend_days);
}
$remarks_obj = new DB_Public_lm_sop_extend_days_remarks();
$remarks_array = array();
$remarks_obj->orderBy('effective_from');
$remarks_obj->find();
while ($remarks_obj->fetch()) {
    $remarks_array[] = ["changed_from" => $remarks_obj->changed_from, "changed_to" => $remarks_obj->changed_to, "effective_from" => get_modified_date_time_format($remarks_obj->effective_from), "reason" => $remarks_obj->reason_for_change, "updated_by" => getFullName($remarks_obj->updated_by), "date" => get_modified_date_time_format($remarks_obj->updated_time)];
}

if (!empty($remarks_array)) {
    $smarty->assign("remarks_array", $remarks_array);
}
$usr_id = $_SESSION['user_id'];
$time = date('Y-m-d G:i:s');

if (isset($_POST['update_extend_days'])) {
    $delete_extend_obj = new DB_Public_lm_sop_extend_days();
    $delete_extend_obj->find();
    if ($delete_extend_obj->fetch()) {
        $delete_extend_obj->delete();
    }

    $aexted_obj = new DB_Public_lm_sop_extend_days();
    $aexted_obj->no_of_days = trim($_POST['new_extend_days']);
    $aexted_obj->insert();

    $extend_remarks_obj = new DB_Public_lm_sop_extend_days_remarks();
    $extend_remarks_obj->reason_for_change = trim($_POST['extend_days_reason_for_change']);
    $extend_remarks_obj->effective_from = $time;
    $extend_remarks_obj->updated_by = $usr_id;
    $extend_remarks_obj->updated_time = $time;
    $extend_remarks_obj->changed_from = $sop_extend_days;
    $extend_remarks_obj->changed_to = trim($_POST['new_extend_days']);
    $extend_remarks_obj->insert();

    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Extend Days Changed To " . trim($_POST['new_extend_days']) . " Days\nReason for Change : " . trim($_POST['extend_days_reason_for_change']);
    $old_val = $sop_extend_days;

    $sequence_object = new Sequence;
    $audit_id = "audit.sop_extend_days:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_extend_days(), $audit_id, $usr_id, $dept_id, 'update', $new_val, $old_val, "Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$days_range = range(1, 30);
$smarty->assign("days_range", $days_range);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_extend_days.admin.tpl");
?>
