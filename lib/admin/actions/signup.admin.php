<?php
/**
 * Project:     Logicmind
 * File:        signup.admin.php
 *
 * @author Ananthakumar.v 
 * @since 10/02/2016
 * @package sop
 * @version 1.0
 * @see signup.admin.php
 */

/** 
* Getting organization list and assign to smarty
* @see lib/admin/classes/Organization.class.php for class Organization
*/
$user_org = new Organization();
$organizationlist = $user_org->organizationlist();

/** 
* Getting designation list and assign to smarty
* @see lib/admin/classes/Designation.class.php for class Designation
*/
$user_desg = new Designation();
$designationlist= $user_desg->designationlist();

/** 
 * Getting department list and assign to smarty
 * @see lib/admin/classes/Department.class.php for class Department
 */

$access_per_obj = new AccessPermissionObjects();
$workflow_access_per_list = $access_per_obj->access_permission_detail_list();

include_module("sop");
$sop_process=new Sop_Processor();

$usr_id = $_SESSION['user_id'];
$time =  date('Y-m-d G:i:s');
$usr_plant_id = getUserPlantId($usr_id);
$plant_dept_list = getPlantDeptList($usr_plant_id);

if (isset($_POST['adduser'])){
    $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-1');
    $sequence = new Sequence();
    $userid = "user:".$sequence->get_next_sequence();
    
    $sequence_object = new Sequence;
    $id="admin.signup:".$sequence_object->get_next_sequence();
     
    $business_object="admin";
    $sub_business_object="REQUEST_ID";
    
    $buss_object=new DB_Public_business_object();
    $buss_object->get("object_name",$business_object);
    $task_id=$buss_object->object_id;

    $sub=new DB_Public_sub_business_object();
    $sub->get('sub_object_name',$sub_business_object);
    $sub_id = $sub->sub_object_id;

    $sequence = new Sequence;
    $request_id_number=$sequence->request_id_number_sequence($task_id,$sub_id);
        
    $signup_obj = new DB_Public_user_signup();
    $signup_obj->object_id = $id;
    $signup_obj->user_id = $userid;
    $signup_obj->org_id = trim($_POST['organization']);
    $signup_obj->plant_id = $usr_plant_id;
    $signup_obj->department_id = trim($_POST['department']);
    $signup_obj->full_name = trim($_POST['full_name']);
    $signup_obj->emp_id = trim($_POST['emp_id']);
    $signup_obj->designation_id = trim($_POST['designation']);
    $signup_obj->email = trim($_POST['email']);
    $signup_obj->creator = $usr_id;
    $signup_obj->created_time = $time;
    $signup_obj->modifier = $usr_id;
    $signup_obj->modified_time = $time;
    $signup_obj->is_activated = "no";
    $signup_obj->status = "Request Created";
    $signup_obj->request_no = $request_id_number;
    $signup_obj->lm_doc_id = $lm_doc_id;
    $signup_obj->insert();
    
    $sworkflow_per_array = $_POST['sworkflow_per'];
    foreach($sworkflow_per_array as $val) {
        $asignup_workflow_per_obj = new DB_Public_user_signup_workflow_permission();
        $asignup_workflow_per_obj->user_id = $userid;
        $asignup_workflow_per_obj->access_per_id = $val;
        $asignup_workflow_per_obj->created_by = $usr_id;
        $asignup_workflow_per_obj->created_time = $time;
        $asignup_workflow_per_obj->insert();
    }
    
    //Audit Trial
    $audit_remarks = "Request No : ".$request_id_number." Created"."\nEmployee Id : ".trim($_POST['emp_id']);
    add_signup_audit_trial($id,'signup_request',$audit_remarks,null,'Created');
    
    $sequence->update_number_sequence($task_id,$sub_id);
    /** Add Pending */
    $sop_process->add_worklist($usr_id,$id);
    /**Insert workflow  **/
    $sop_process->save_workflow($id,$usr_id,'Created','create'); 
    header("Location:?module=admin&action=view_signup&object_id=$id");
}
$list=$sop_process->count_worklist($usr_id);
if(!empty($list)){
    $smarty->assign('list',$list);
}

$smarty->assign('organizationlist',$organizationlist);
$smarty->assign('designationlist',$designationlist);
$smarty->assign('workflow_access_per_list',$workflow_access_per_list);
$smarty->assign('plant_dept_list',$plant_dept_list);
$smarty->assign('plant_name', getPlantName($usr_plant_id));
$smarty->assign('main',_TEMPLATE_PATH_."signup.admin.tpl");
?>
