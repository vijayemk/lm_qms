<?php
/**
 * Project:    Logicmind
 * File:       update_org.admin.php
 *
 * @author Ananthakumar V
 * @since 16/02/2017
 * @package admin
 * @version 1.0
 * @see update_org.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$org_id = $_REQUEST['object_id'];
$view_org = new Organization();    
if($view_org->get("org_id",$org_id)){
    if (isset($_POST['update'])){
        $usr_id = $_SESSION['user_id'];
        $time =  date('Y-m-d G:i:s');
        $dept_id = getDeptId($usr_id);

        // Getting old val for audit trail
        $at_org_old = new Organization();
        $at_org_old->get("org_id",$org_id);

        $org = new Organization();
        $org->whereAdd("org_id = '$org_id'");
        $org->short_name = trim($_POST['short_name']);
        $org->org_name = trim($_POST['organization']);
        $org->address = trim($_POST['address']);
        $org->city = trim($_POST['city']);
        $org->state	= trim($_POST['state']);
        $org->country = trim($_POST['country']);
        $org->pincode = trim($_POST['pincode']);
        $org->contact_number = trim($_POST['contact_number']);
        $org->email	= trim($_POST['email']);
        $org->website = trim($_POST['website']);
        $org->modified_by = $usr_id;
        $org->modified_time = $time;
        $org->update();

        // Audit Trail
        $new_val ="Short Name : ".trim($_POST['short_name'])."\nOrganization : ".trim($_POST['organization'])."\nAddress : ".trim($_POST['address'])."\nCity : ".trim($_POST['city'])."\nState : ".trim($_POST['state'])."\nCountry : ".trim($_POST['country'])."\nPinCode : ".trim($_POST['pincode'])."\nContact Number : ".trim($_POST['contact_number'])."\nEmail : ".trim($_POST['email'])."\nWebsite : ".trim($_POST['website']);
        $old_val = "Short Name : ".$at_org_old->short_name."\nOrganization : ".$at_org_old->org_name."\nAddress : ".$at_org_old->address."\nCity : ".$at_org_old->city."\nState : ".$at_org_old->state."\nCountry : ".$at_org_old->country."\nPinCode : ".$at_org_old->pincode."\nContact Number : ".$at_org_old->contact_number."\nEmail : ".$at_org_old->email."\nWebsite : ".$at_org_old->website;
        $sequence_object = new Sequence;
        $audit_id="audit.org:".$sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_organization(),$audit_id,$usr_id,$dept_id,'Update',$new_val,$old_val,"Successfully Updated");
        header("Location:?module=admin&action=list_organization");
    }
    $smarty->assign("regobj",$view_org);
    $smarty->assign('main',_TEMPLATE_PATH_."update_org.admin.tpl");
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
