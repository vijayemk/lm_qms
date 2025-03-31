<?php

/**
 * Project:     Logicmind
 * File:        sop_monitoring_limit.admin.php
 *
 * @author Ananthakumar V
 * @since 28/10/2021
 * @package admin
 * @version 1.0
 * @see sop_monitoring_limit.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$sop_monitoring_limit = getSopMonitoringLimit();

$sop_monitoring_limit_remarks_obj = new DB_Public_lm_sop_monitoring_limit_remarks();
$sop_monitoring_limit_remarks_obj->orderBy('effective_from');
$sop_monitoring_limit_remarks_obj->find();
while ($sop_monitoring_limit_remarks_obj->fetch()) {
    $sop_monitoring_limit_remarks[] = ["changed_from" => $sop_monitoring_limit_remarks_obj->changed_from, "changed_to" => $sop_monitoring_limit_remarks_obj->changed_to, "effective_from" => $sop_monitoring_limit_remarks_obj->effective_from, "reason" => $sop_monitoring_limit_remarks_obj->reason_for_change, "updated_by" => getFullName($sop_monitoring_limit_remarks_obj->updated_by), "date" => $sop_monitoring_limit_remarks_obj->updated_time];
}

if (isset($_POST['update'])) {
    $usr_id = $_SESSION['user_id'];
    $time = date('Y-m-d G:i:s');

    /** Delete */
    $delete_moni_limit_obj = new DB_Public_lm_sop_monitoring_limit();
    $delete_moni_limit_obj->find();
    if ($delete_moni_limit_obj->fetch()) {
        $delete_moni_limit_obj->delete();
    }

    /** Add */
    $amonitoring_obj = new DB_Public_lm_sop_monitoring_limit();
    $amonitoring_obj->max_limit = trim($_POST['umonitoring_limit']);
    $amonitoring_obj->insert();

    /** Update Remarks */
    $amonitoring_limit_remarks_obj = new DB_Public_lm_sop_monitoring_limit_remarks();
    $amonitoring_limit_remarks_obj->reason_for_change = trim($_POST['reason_for_change']);
    $amonitoring_limit_remarks_obj->effective_from = $time;
    $amonitoring_limit_remarks_obj->updated_by = $usr_id;
    $amonitoring_limit_remarks_obj->updated_time = $time;
    $amonitoring_limit_remarks_obj->changed_from = $sop_monitoring_limit;
    $amonitoring_limit_remarks_obj->changed_to = trim($_POST['umonitoring_limit']);
    $amonitoring_limit_remarks_obj->insert();

    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Limit Changed To " . trim($_POST['umonitoring_limit']) . "\nReason for Change : " . trim($_POST['reason_for_change']);
    $old_val = $sop_monitoring_limit;

    $sequence_object = new Sequence;
    $audit_id = "audit.sop_monitoring_limit:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_monitoring_limit(), $audit_id, $usr_id, $dept_id, 'update', $new_val, $old_val, "Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}


if (!empty($sop_monitoring_limit)) {
    $smarty->assign("sop_monitoring_limit", $sop_monitoring_limit);
}
if (!empty($sop_monitoring_limit_remarks)) {
    $smarty->assign("sop_monitoring_limit_remarks", $sop_monitoring_limit_remarks);
}
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_monitoring_limit.admin.tpl");
?>
