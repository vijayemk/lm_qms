<?php
/**
 * Project:     Logicmind
 * File:       list_designation.admin.php
 *
 * @author Ananthakumar V
 * @since 22/02/2017
 * @package admin
 * @version 1.0
 * @see list_designation.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$time =  date('Y-m-d G:i:s');

if (isset($_POST['add'])){
    $designation = $_REQUEST['designation'] ?: NULL;
    $full_name = $_REQUEST['full_name'] ?: NULL;
    
    $sequence_object = new Sequence;
    $id="admin.designation:".$sequence_object->get_next_sequence();

    $designation_obj = new Designation();
    $designation_obj->designation_id 	= $id;
    $designation_obj->designation_name 	= $designation;
    $designation_obj->created_by = $usr_id;
    $designation_obj->created_time = $time;
    $designation_obj->full_name	= $full_name;
    $designation_obj->insert();
    
    // Audit Trail
    $new_val = "Designation : $designation\nFull Name : $full_name";
    $old_val = null;

    $sequence_object = new Sequence;
    $audit_id="audit.desi:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_designation(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
if (isset($_POST['update'])) {
    $udesi_id = $_REQUEST['udesi_id'] ?: NULL;
    $udesignation = $_REQUEST['udesignation'] ?: NULL;
    $ufull_name = $_REQUEST['ufull_name'] ?: NULL;
    
    // Getting old val for audit trail
    $atdesi_old = new Designation();
    $atdesi_old->get("designation_id",$udesi_id);
    
    // Update new value
    $udesi = new Designation();
    $udesi->whereAdd("designation_id='$udesi_id'");
    $udesi->designation_name = $udesignation;
    $udesi->full_name = $ufull_name;
    $udesi->update(DB_DATAOBJECT_WHEREADD_ONLY);
    
    // Audit Trail
    $new_val = "Designation : $udesignation\Full Name : $ufull_name";
    $old_val = "Designation : $atdesi_old->designation_name\Full Name : $atdesi_old->full_name";
    $sequence_object = new Sequence;
    $audit_id="audit.desi:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_designation(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
$designation_obj = new Designation();
$designationlist= $designation_obj->designationlist();
$smarty->assign('designationlist',$designationlist);
$smarty->assign('main',_TEMPLATE_PATH_."list_designation.admin.tpl");
?>
