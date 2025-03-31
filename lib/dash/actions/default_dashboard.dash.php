<?php

/**
 * Project    : Logicmind
 *
 * @package   : admin
 * @author    : Ananthakumar V
 * @since     : 19/04/2017
 * @see       : default_dashboard.dash.tpl
 *
 */
error_reporting(E_ALL & ~E_NOTICE);
$usr_id = $_SESSION['user_id'];
$usr_plant_id = getUserPlantId($usr_id);
include_module("sop");
$sop_process = new Sop_Processor();

$total_sop_count = $sop_process->total_sop_count_plant_wise($usr_plant_id);
$total_published_inactive_sop = $sop_process->get_sop_status_count_plantwise("Published and Inactive", $usr_plant_id);
$total_published_active_sop = $sop_process->get_sop_status_count_plantwise("Published and Active", $usr_plant_id);
$total_expired_sop = $sop_process->get_sop_status_count_plantwise("SOP Expired", $usr_plant_id);
$total_dropped_sop = $sop_process->get_sop_status_count_plantwise("Dropped", $usr_plant_id);
$total_cancelled_sop = $sop_process->get_sop_status_count_plantwise("Cancelled", $usr_plant_id);
$total_transferred_sop = $sop_process->get_sop_status_count_plantwise("Transferred", $usr_plant_id);
$total_draft_sop = $sop_process->get_sop_status_count_plantwise("Draft", $usr_plant_id);
$total_exp_cancel_dropped_transferred = $total_expired_sop + $total_dropped_sop + $total_cancelled_sop + $total_transferred_sop;

$total_pendinglist_count = $sop_process->get_pending_count("", "");
$total_sop_pendinglist_count = $sop_process->get_pending_count("sop.details:%", "");
$total_signup_pendinglist_count = $sop_process->get_pending_count("admin.signup:%", "");
$total_exit_pendinglist_count = $sop_process->get_pending_count("admin.user_exit:%", "");

//Recently joined users list
$recent_signup_details = $sop_process->recent_signup_workflow();

//Life Cycle Comments
$life_cycle_comments = $sop_process->get_life_cycle_comments();

//Exipry Notification
$expiry_notification = $sop_process->sop_expiry_notification();

//Exipry Notification Count
//$expiry_notification_count = count($sop_process->sop_expiry_notification());
//carry off SOP
$carry_off_sop = $sop_process->get_carry_off_sop();

//carry off SOP Count
//$carry_off_sop_count = count($sop_process->get_carry_off_sop());
//Recent Authorized SOP 
$recent_authorized_sop = $sop_process->get_recent_authorized_sop();

//Recent Authorized SOP Count
//$recent_authorized_sop_count = count($sop_process->get_recent_authorized_sop());
//Upcoming Training
//$sop_training_array = $sop_process->upcoming_training_details();

if (isset($total_sop_count)) {
    $smarty->assign('total_sop_count', $total_sop_count);
}
if (isset($total_published_inactive_sop)) {
    $smarty->assign('total_published_inactive_sop', $total_published_inactive_sop);
}
if (isset($total_published_active_sop)) {
    $smarty->assign('total_published_active_sop', $total_published_active_sop);
}
if (isset($total_exp_cancel_dropped_transferred)) {
    $smarty->assign('total_expired_sop', $total_exp_cancel_dropped_transferred);
}
if (isset($total_draft_sop)) {
    $smarty->assign('total_draft_sop', $total_draft_sop);
}
if (isset($total_pendinglist_count)) {
    $smarty->assign('total_pendinglist_count', $total_pendinglist_count);
}
if (isset($total_sop_pendinglist_count)) {
    $smarty->assign('total_sop_pendinglist_count', $total_sop_pendinglist_count);
}
if (isset($total_signup_pendinglist_count)) {
    $smarty->assign('total_signup_pendinglist_count', $total_signup_pendinglist_count);
}
if (isset($total_exit_pendinglist_count)) {
    $smarty->assign('total_exit_pendinglist_count', $total_exit_pendinglist_count);
}
if (isset($recent_signup_details)) {
    $smarty->assign('recent_signup_details', $recent_signup_details);
}
if (isset($life_cycle_comments)) {
    $smarty->assign('life_cycle_comments', $life_cycle_comments);
}
if (isset($expiry_notification)) {
    $smarty->assign('expiry_notification', $expiry_notification);
}
//if (isset($expiry_notification_count)) {
//$smarty->assign('expiry_notification_count', $expiry_notification_count);
//}
if (isset($carry_off_sop)) {
    $smarty->assign('carry_off_sop', $carry_off_sop);
}
//if (isset($carry_off_sop_count)) {
//$smarty->assign('carry_off_sop_count', $carry_off_sop_count);
//}
if (isset($recent_authorized_sop)) {
    $smarty->assign('recent_authorized_sop', $recent_authorized_sop);
}
//if (isset($recent_authorized_sop_count)) {
//$smarty->assign('recent_authorized_sop_count', $recent_authorized_sop_count);
//}
//if (!empty($sop_training_array)) {
//$smarty->assign("sop_training_array", $sop_training_array);
//}
$smarty->assign("usr_plant_id", $usr_plant_id);
$smarty->assign("usr_plant", getPlantName($usr_plant_id));
$smarty->assign('main', _TEMPLATE_PATH_ . "default_dashboard.dash.tpl");
?>
