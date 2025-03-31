<?php

/*
 * Project:     Logicmind
 * File:        compare_workflow_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 16/10/2019
 * @package sop
 * @version 1.0
 * @see compare_workflow_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
$sop_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $usr_id = $_SESSION['user_id'];
    $usr_dept_id = getDeptId($usr_id);
    /** Department Restriction */
    if (!check_doc_dept_access($sop_object_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    $date_time = date('Y-m-d G:i:s');
    $object_id1 = (isset($_REQUEST['object_id1'])) ? $_REQUEST['object_id1'] : null;
    $object_id2 = (isset($_REQUEST['object_id2'])) ? $_REQUEST['object_id2'] : null;
    $sop_process = new Sop_Processor();

    $ssop_comp_obj1 = new DB_Public_lm_sop_comparison();
    $ssop_comp_obj1->get("object_id", $object_id1);
    $old_doc_html = $ssop_comp_obj1->content;

    $ssop_comp_obj2 = new DB_Public_lm_sop_comparison();
    $ssop_comp_obj2->get("object_id", $object_id2);
    $new_doc_html = $ssop_comp_obj2->content;

    if (!empty($object_id1)) {
        $smarty->assign("object_id1", $object_id1);
    }
    if (!empty($object_id2)) {
        $smarty->assign("object_id2", $object_id2);
    }
    if (!empty($old_doc_html)) {
        $smarty->assign("old_doc_html", $old_doc_html);
    }
    if (!empty($new_doc_html)) {
        $smarty->assign("new_doc_html", $new_doc_html);
    }
    $smarty->assign("comp_list_latest", $sop_process->get_sop_workflow_comparison($sop_object_id, 'yes'));
    $smarty->assign("comp_list_all", $sop_process->get_sop_workflow_comparison($sop_object_id), null);
    $smarty->assign('main', _TEMPLATE_PATH_ . "compare_workflow_sop.sop.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
