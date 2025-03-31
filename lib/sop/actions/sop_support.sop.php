<?php
/**
 * Project:     Logicmind
 * File:       sop_ticket.sop.php
 *
 * @author Ananthakuamr V
 * @since 17/09/2018
 * @package admin
 * @version 1.0
 * @see sop_ticket.sop.tpl
 */
$usr_id = $_SESSION['user_id'];
$createtime=date('Y-m-d G:i:s');

include_module("sop");
$sop_process=new Sop_Processor();
$sop_worklist_pending = $sop_process->get_self_support_sop_pendinglist($usr_id);

if(!empty($sop_worklist_pending)) {
    $usr_email_id = getEmailbyUserId($usr_id);
    $smarty->assign('sop_worklist_pending',$sop_worklist_pending);
    $smarty->assign('usr_email_id',$usr_email_id);
}
$smarty->assign('main',_TEMPLATE_PATH_."sop_support.sop.tpl");
?>
