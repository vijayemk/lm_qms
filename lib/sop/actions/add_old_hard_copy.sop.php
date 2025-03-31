<?php

/**
 * Project:     Logicmind
 * File:        upload_old_sop.sop.php
 *
 * @author Ananthakumar.v
 * @since 18/01/2019
 * @package sop
 * @version 1.0
 * @see upload_old_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}

$date_time = date('Y-m-d G:i:s');
$usr_id = trim($_SESSION['user_id']);

$obj = new DB_Public_lm_hard_copy_details();
$obj->orderBy('doc_no');
$obj->find();
$count = 1;
while ($obj->fetch()) {
    $hc_list[] = array('object_id' => $obj->object_id, 'type' => getLmDocShortName($obj->type), 'doc_no' => $obj->doc_no, 'name' => $obj->name,
        'remarks' => $obj->remarks,'created_by'=> getFullName($obj->created_by),'created_time'=>$obj->created_time,'count'=>$count);
    $count++;
}

if (isset($_POST['add_doc'])) {
    $adoc_type = (isset($_POST['adoc_type'])) ? $_POST['adoc_type'] : null;
    $adoc_no = (isset($_POST['adoc_no'])) ? $_POST['adoc_no'] : null;
    $adoc_name = (isset($_POST['adoc_name'])) ? $_POST['adoc_name'] : null;
    $adoc_remarks = (isset($_POST['adoc_remarks'])) ? $_POST['adoc_remarks'] : null;

    $sequence_object = new Sequence;
    $doc_id = "sop_hard_copy_details:" . $sequence_object->get_next_sequence();

    $hard_copy_details_obj = new DB_Public_lm_hard_copy_details();
    $hard_copy_details_obj->object_id = $doc_id;
    $hard_copy_details_obj->type = $adoc_type;
    $hard_copy_details_obj->doc_no = $adoc_no;
    $hard_copy_details_obj->name = $adoc_name;
    $hard_copy_details_obj->remarks = $adoc_remarks;
    $hard_copy_details_obj->created_by = $usr_id;
    $hard_copy_details_obj->created_time = $date_time;
    $hard_copy_details_obj->modified_by = $usr_id;
    $hard_copy_details_obj->modified_time = $date_time;
    $hard_copy_details_obj->insert();
    header("Location:?module=sop&action=view_old_hard_copy&object_id=$doc_id");
}
$smarty->assign("doc_list", getLmDocList());
$smarty->assign("hc_list", $hc_list);
$smarty->assign('main', _TEMPLATE_PATH_ . "add_old_hard_copy.sop.tpl");
?>
