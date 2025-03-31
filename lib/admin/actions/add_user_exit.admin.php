<?php
/**
 * Project    : Logicmind
 *
 * @package   : admin
 * @author    : Ananthakumar V
 * @since     : 05/03/2017
 * @see       : user_exit.admin.tpl
 *
 */
error_reporting(E_ALL & ~E_NOTICE );
include_module("sop");
$sop_process=new Sop_Processor();
$usr_id = $_SESSION['user_id'];
$time =  date('Y-m-d G:i:s');

$user_obj = new DB_Public_users();
if($user_obj->get("user_id",$usr_id)){
    if($user_obj->user_name!="admin"){
        $user_department =getDeptName($usr_id);
        $user_designation=getDesignation($user_obj->designation_id);
        $user_organization=getOrganization($user_obj->org_id);
        $user_plant=getPlantName($user_obj->plant_id);

        $smarty->assign('department',$user_department);
        $smarty->assign('designation',$user_designation);
        $smarty->assign('organization',$user_organization);
        $smarty->assign('user_plant',$user_plant);
        $smarty->assign('user_id',$usr_id);
        $smarty->assign('user_name',$user_obj->user_name);
        $smarty->assign('full_name',$user_obj->full_name);
        $smarty->assign('emp_id',$user_obj->emp_id);
        $smarty->assign('email',$user_obj->email);
    }else{
        $error_handler->raiseError("CAN NOT DISABLE ADMIN ACCOUNT");
    }
}else{
    $error_handler->raiseError("INVALID REQUEST");
}

$check_user_exist_obj = new DB_Public_user_exit();
if(!$check_user_exist_obj->get("user_id",$usr_id)) {
    if (isset($_POST['exit_request'])){
        $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-1');
        $sequence_object = new Sequence;
        $id="admin.user_exit:".$sequence_object->get_next_sequence();

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

        $user_obj = new DB_Public_users();
        if($user_obj->get("user_id",$usr_id)){
            $user_exit_obj = new DB_Public_user_exit();
            $user_exit_obj->object_id = $id;
            $user_exit_obj->user_id = $usr_id;
            $user_exit_obj->org_id = $user_obj->org_id;
            $user_exit_obj->department_id = $user_obj->department_id;
            $user_exit_obj->full_name = $user_obj->full_name;
            $user_exit_obj->emp_id = $user_obj->emp_id;
            $user_exit_obj->designation_id = $user_obj->designation_id;
            $user_exit_obj->email = $user_obj->email;
            $user_exit_obj->creator = $usr_id;
            $user_exit_obj->created_time = $time;
            $user_exit_obj->modifier = $usr_id;
            $user_exit_obj->modified_time = $time;
            $user_exit_obj->is_deactivated = "no";
            $user_exit_obj->status = "Request Created";
            $user_exit_obj->request_no = $request_id_number;
            $user_exit_obj->reason = trim($_POST['reason']);
            $user_exit_obj->plant_id = $user_obj->plant_id;
            $user_exit_obj->lm_doc_id = $lm_doc_id;
            $user_exit_obj->insert();

            //Audit Trial
            $audit_remarks = "Request No : ".$request_id_number." Created for Account Deactivation";
            add_user_exit_audit_trial($id,'user_exit',$audit_remarks,null,'Created');

            $sequence->update_number_sequence($task_id,$sub_id);
            $sop_process->add_worklist($usr_id,$id);
            $sop_process->save_workflow($id,$usr_id,'Created','create');
            header("Location:?module=admin&action=view_user_exit&object_id=$id");
        }else{
            $error_handler->raiseError("INVALID REQUEST");
        }
    }
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
$smarty->assign('main',_TEMPLATE_PATH_."add_user_exit.admin.tpl");
?>
