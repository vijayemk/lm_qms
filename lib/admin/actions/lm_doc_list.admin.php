<?php
/**
 * Project:     Logicmind
 * File:        department.admin.php
 *
 * @author Ananthakumar V
 * @since 20/02/2017
 * @package admin
 * @version 1.0
 * @see department.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
if (isset($_POST['add'])) {
    $adoc_name = $_REQUEST['adoc_name'] ?: NULL;
    $adoc_short_name = $_REQUEST['adoc_short_name'] ?: NULL;
    $adoc_code = $_REQUEST['adoc_code'] ?: NULL;
    $adoc_order = $_REQUEST['adoc_order'] ?: NULL;
    
    $sequence_object = new Sequence;
    $id = "admin.lm_doc:".$sequence_object->get_next_sequence();
    
    //Add
    $alm_doc_obj = new LmDocList();
    $alm_doc_obj->object_id = $id;
    $alm_doc_obj->u_key = md5($id);
    $alm_doc_obj->doc_name = $adoc_name;
    $alm_doc_obj->short_name = $adoc_short_name;
    $alm_doc_obj->doc_code = $adoc_code;
    $alm_doc_obj->is_enabled = "yes";
    $alm_doc_obj->order1 = $adoc_order;
    $alm_doc_obj->insert();
    header("Location:$_SERVER[REQUEST_URI]");
}
$lm_doc_obj = new LmDocList();
$lm_doc_list = $lm_doc_obj->get_lm_doc_detaillist();
$smarty->assign('lm_doc_list',$lm_doc_list);
$smarty->assign('main',_TEMPLATE_PATH_."lm_doc_list.admin.tpl");
?>
