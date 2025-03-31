<?php
/**
 * Project    : Logicmind
 *
 * @package   : admin
 * @author    : Ananthakumar V
 * @since     : 16/02/2017
 * @see       : permission_assignment.admin.tpl
 *
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$userlist = getUserList(null, null, null, null, null, null, null, 'enable');
$upuserid=(isset($_REQUEST['upuserid']))? $_REQUEST['upuserid']:null;
if(!empty($upuserid)){
    $upuser_obj = new DB_Public_users();
    if($upuser_obj->get("user_id",$upuserid) && $upuser_obj->account_status=="enable"){
        if($upuser_obj->user_name=="admin"){
            $error_handler->raiseError("CAN NOT UPDATE ADMIN ACCOUNT");
        }
        $upfullname = getFullName($upuserid);
        $upuserdept = getDeptName($upuserid);
        $upusername = getUserName($upuserid);
        /** Audit Trail*/
        $usr_id = $_SESSION['user_id'];
        $time =  date('Y-m-d G:i:s');
        $dept_id = getDeptId($usr_id);
        
        /**get Workflow Permission */
        $workflow_user_per_list = getUserWorkflowPermission($upuserid);
        
        /**get SOP PDf Permission */
        $pdf_operation_list = getSopPdfOperationList();
        $sop_pdf_print_copy_objectlist= array();
        $sop_pdf_print_copy_objectlist = getUserSopPdfPermission($upuserid);
        
        /**Add workflow permission */
        if (isset($_POST['save_workflow_per'])) {
            $duser_per_obj = new DB_Public_users_permission();
            $duser_per_obj->user_id = $upuserid;
            $duser_per_obj->find();
            $duser_per_obj->delete();
            
            $new_val = "All Workflow Permission Removed Successfully for ". getFullName($upuserid);
            $old_val = null;
            $sequence_object = new Sequence;
            $audit_id="audit.perm:".$sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'delete',$new_val,$old_val,"Successfully removed");

            foreach ($_POST['add_workflow_access_per'] as $oid) {
                $auser_per_obj = new DB_Public_users_permission();
                $auser_per_obj->user_id = $upuserid;
                $auser_per_obj->access_per_id = $oid;
                $auser_per_obj->is_enabled = 'yes';
                $auser_per_obj->insert();
                
                $new_val = getAccessPermissionName($oid)." Permission enabled for ". getFullName($upuserid);
                $old_val = null;

                $sequence_object = new Sequence;
                $audit_id="audit.perm:".$sequence_object->get_next_sequence();
                AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'enable',$new_val,$old_val,"Successfully enabled");
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
        /**Add Pdf permission */
        if (isset($_POST['save_pdf_per'])) {
            $dpdf_per_obj = new DB_Public_pdf_permission();
            $dpdf_per_obj->user_id = $upuserid;
            $dpdf_per_obj->find();
            $dpdf_per_obj->delete();

            $new_val = "All PDF Permissions Removed Successfully for ". getFullName($upuserid);
            $old_val = null;
            $sequence_object = new Sequence;
            $audit_id="audit.perm:".$sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'delete',$new_val,$old_val,"Successfully removed");

            foreach ($_POST['add_pdf_access_per'] as $oid) {
                $arr = explode("-",$oid);
                $apdf_per_obj = new DB_Public_pdf_permission();
                $apdf_per_obj->user_id = $upuserid;
                $apdf_per_obj->object = $arr[0];
                $apdf_per_obj->operation = $arr[1];
                $apdf_per_obj->insert();

                $new_val = getPdfObjectName($arr[0])." ".getPdfOperationName($arr[1])." Permission assigned for ". getFullName($upuserid);
                $old_val = null;

                $sequence_object = new Sequence;
                $audit_id="audit.perm:".$sequence_object->get_next_sequence();
                AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'enable',$new_val,$old_val,"Successfully enabled");
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
        if(!empty($upuserid)){
            $smarty->assign('upuserid',$upuserid);
        }
        if(!empty($upusername)){
            $smarty->assign('upusername',$upusername);
        }
        if(!empty($upfullname)){
            $smarty->assign('upfullname',$upfullname);
        }
        if(!empty($upuserdept)){
            $smarty->assign('upuserdept',$upuserdept);
        }
        if(!empty($workflow_user_per_list)){
            $smarty->assign('workflow_user_per_list',$workflow_user_per_list);    
        }
        if(!empty($pdf_operation_list)){
            $smarty->assign('pdf_operation_list',$pdf_operation_list);    
        }
        if(!empty($sop_pdf_print_copy_objectlist)){
            $smarty->assign('sop_pdf_print_copy_objectlist',$sop_pdf_print_copy_objectlist);
        }
    }else{
        $error_handler->raiseError("INVALID REQUEST");
    }
}
if(!empty($userlist)){
    $smarty->assign('userlist',$userlist);
}
$smarty->assign('main',_TEMPLATE_PATH_."permission_assign.admin.tpl");
?>
