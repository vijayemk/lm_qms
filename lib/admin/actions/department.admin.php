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
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$time =  date('Y-m-d G:i:s');

if (isset($_POST['add'])) {
    $dept = $_REQUEST['dep'] ?: NULL;
    $code = $_REQUEST['code'] ?: NULL;
    $full_name = $_REQUEST['full_name'] ?: NULL;
    
    $sequence_object = new Sequence;
    $id = "admin.department:".$sequence_object->get_next_sequence();
    
    //Add
    $dep = new DB_Public_department();
    $dep->department_id = $id;
    $dep->department = $dept;
    $dep->department_code = $code;
    $dep->creator = $usr_id;
    $dep->created_time = $time;
    $dep->full_name = $full_name;
    $dep->insert();
    
    // Audit Trail
//    $new_val = "Department Code : $code\nShort Name : $dept\nFull name : $full_name"; 
//    $old_val = null;
//
//    $sequence_object = new Sequence;
//    $audit_id="audit.dept:".$sequence_object->get_next_sequence();
//    AddAuditTrial(new DB_Public_lm_audit_department(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
if (isset($_POST['update'])) {
    $udept_id = $_REQUEST['udept_id'] ?: NULL;
    $ucode = $_REQUEST['ucode'] ?: NULL;
    $udept = $_REQUEST['udep'] ?: NULL;
    $ufull_name = $_REQUEST['ufull_name'] ?: NULL;
    
    // Getting old val for audit trail
//    $atdept_old = new Department();
//    $atdept_old->get("department_id",$udept_id);
    
    // Update new value
    $udep=new DB_Public_department();
    $udep->whereAdd("department_id='$udept_id'");
    $udep->department=$udept;
    $udep->department_code = $ucode;
    $udep->full_name = $ufull_name;
    $udep->update(DB_DATAOBJECT_WHEREADD_ONLY);
    
    // Audit Trail
//    $new_val = "Department Code : $ucode\nShort Name : $udept\nFull name : $ufull_name";
//    $old_val = "Department Code : $atdept_old->department_code\nShort Name : $atdept_old->department\nFull name : $atdept_old->full_name";
//    
//    $sequence_object = new Sequence;
//    $audit_id="audit.dept:".$sequence_object->get_next_sequence();
//    AddAuditTrial(new DB_Public_lm_audit_department(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$department = new Department;
$departmentlist = $department->departmentlist();

$smarty->assign('departmentlist',$departmentlist);
$smarty->assign('main',_TEMPLATE_PATH_."department.admin.tpl");
?>
