<?php
/**
 * Project:     Logicmind
 * File:        compare_doc.sop.php
 *
 * @author Ananthakumar.v 
 * @since 03/09/2019
 * @package sop
 * @version 1.0
 * @see compare_doc.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );
$date_time = date('Y-m-d G:i:s');
$usr_id = trim($_SESSION['user_id']);

$object_id1 = (isset($_REQUEST['object_id1']))? $_REQUEST['object_id1']:null;
$object_id2 = (isset($_REQUEST['object_id2']))? $_REQUEST['object_id2']:null;
$sop_process = new Sop_Processor();

$rs_obj = new DB_Public_lm_spec_rs_master();
$count = 1;
if($rs_obj->find()) {
    while ($rs_obj->fetch()){
        $rs_details_obj = new DB_Public_lm_spec_rs_details();
        $rs_details_obj->get("spec_rs_object_id",$rs_obj->object_id);

        $rs_list[]=array(
            'object_id'=>$rs_obj->object_id,'spec_object_id'=>$rs_obj->spec_object_id,'rs_dept'=> getDepartment($rs_obj->rs_department),
            'revision'=>$rs_obj->revision,'supersedes'=>$rs_obj->supersedes,'created_year'=>$rs_obj->created_year,'created_month'=>$rs_obj->created_month,
            'status'=>$rs_obj->status,'is_latest_revision'=>$rs_obj->is_latest_revision,'rs_no'=>$sop_process->get_spec_rs_no($rs_obj->object_id),
            'spec_sub_type_id'=>$rs_obj->spec_sub_type,'spec_sub_type'=>get_spec_sub_type($rs_obj->spec_sub_type),'created_by'=>$rs_obj->created_by,'modified_by_id'=>$rs_obj->modified_by,
            'modified_by'=>$rs_obj->modified_by,'created_time'=>$rs_obj->created_time,'modified_time'=>$rs_obj->modified_time,'count'=>$count);
        $count++;
    }
}

if (preg_match("/spec_rs:/",$object_id1)){
    $rs_details_obj1 = new DB_Public_lm_spec_rs_details();
    $rs_details_obj1->get("spec_rs_object_id",$object_id1);
    $old_doc_html = $rs_details_obj1->rs_content;

    $rs_details_obj2 = new DB_Public_lm_spec_rs_details();
    $rs_details_obj2->get("spec_rs_object_id",$object_id2);
    $new_doc_html = $rs_details_obj2->rs_content;
}

if(!empty($object_id1)){
    $smarty->assign("object_id1",$object_id1);
}
if(!empty($object_id2)){
    $smarty->assign("object_id2",$object_id2);
}
if(!empty($old_doc_html)){
    $smarty->assign("old_doc_html",$old_doc_html);
}
if(!empty($new_doc_html)){
    $smarty->assign("new_doc_html",$new_doc_html);
}if(!empty($rs_list)){
    $smarty->assign("rs_list",$rs_list);
}
$smarty->assign('main',_TEMPLATE_PATH_."compare_doc.sop.tpl");   
?>
