<?php

/**
 * Project:     Logicmind
 * File:       pending_worklist.admin.php
 *
 * @author Ananthakuamr V
 * @since 18/02/2017
 * @package admin
 * @version 1.0
 * @see pending_worklist.admin.tpl
 */
$total_pendinglist_array = getWorkflowList(null);
if ($total_pendinglist_array) {
    $smarty->assign('total_pendinglist_array', $total_pendinglist_array);
}
$smarty->assign('main', _TEMPLATE_PATH_ . "pending_worklist.admin.tpl");
?>
