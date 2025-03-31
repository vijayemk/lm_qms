<?php

use function PHPSTORM_META\type;

include_once("sajax_0_12.php");

function get_dept_users($department_id)
{
    if (trim($department_id)) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        $user->whereAdd("department_id='$department_id'");
        $user->whereAdd("account_status='enable'");
        $user->find();
        while ($user->fetch()) {
            $userlist[] = array(
                'user_name' => $user->full_name,
                'user_id' => $user->user_id,
                'department_id' => $department_id,
                "drop_down_value" => $user->user_id,
                "drop_down_option" => $user->full_name
            );
        }
    }
    return $userlist;
}

function get_all_dept_users($department_id)
{
    if (trim($department_id)) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        $user->whereAdd("department_id='$department_id'");
        $user->find();
        while ($user->fetch()) {
            $userlist[] = array('user_name' => $user->full_name, 'user_id' => $user->user_id, 'department_id' => $department_id);
        }
    }
    return $userlist;
}

function get_plant_users($plant_id)
{
    if (trim($plant_id)) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        $user->whereAdd("plant_id='$plant_id'");
        $user->find();
        while ($user->fetch()) {
            $userlist[] = array('user_name' => $user->full_name, 'user_id' => $user->user_id, 'department_id' => $user->department_id, 'plant_id' => $plant_id);
        }
    }
    return $userlist;
}

function check_password($password)
{
    $usr_id = $_SESSION['user_id'];
    if (check_user_password($password)) {
        return "true";
    } else {
        return "false";
    }
}

function get_filtered_lm_doc_workflow_action_list($doc_id)
{
    $workflow_action_obj = new DB_Public_lm_workflow_actions();
    $workflow_action_obj->orderBy('lm_workflow_action_name');
    $workflow_action_obj->find();
    while ($workflow_action_obj->fetch()) {
        $doc_mgmt_action_obj = new DB_Public_lm_doc_management_actions();
        $doc_mgmt_action_obj->whereAdd("lm_doc_id='$doc_id'");
        $doc_mgmt_action_obj->whereAdd("workflow_action_id='$workflow_action_obj->lm_workflow_action_id'");
        if (!$doc_mgmt_action_obj->find()) {
            $doc_mgmt_action_obj->fetch();
            $action_list[] = array("action" => $workflow_action_obj->lm_workflow_action_name, 'action_id' => $workflow_action_obj->lm_workflow_action_id);
        }
    }
    asort($action_list);
    return $action_list;
}

function get_lm_doc_action_list($lm_doc_id)
{
    $action_list = getManagementActionByLmDocId($lm_doc_id);
    return $action_list;
}

function get_soplist_by_sop_type($sop_type)
{
    include_module("sop");
    $sop_process = new Sop_Processor();

    $sop_type_obj = new DB_Public_lm_sop_master();
    $sop_type_obj->orderBy('sop_name');
    $sop_type_obj->whereAdd("sop_type='$sop_type'");
    $sop_type_obj->find();
    while ($sop_type_obj->fetch()) {
        $soplist[] = array('sop_object_id' => $sop_type_obj->sop_object_id, "sop_name" => $sop_type_obj->sop_name, "sop_no" => $sop_process->get_sop_no($sop_type_obj->sop_object_id));
    }
    return $soplist;
}

function search_sop($sop_type, $sop_name, $sop_no, $revision, $year, $month, $is_latest_revision, $published_status, $sop_effective_date_from, $sop_effective_date_to, $sop_expiry_date_from, $sop_expiry_date_to, $department, $userid, $user_plant, $status)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $sop_list = $sop_process->sop_list($sop_type, $sop_name, $sop_no, $revision, $year, $month, $is_latest_revision, $published_status, $sop_effective_date_from, $sop_effective_date_to, $sop_expiry_date_from, $sop_expiry_date_to, $department, $userid, $user_plant, $status);
    return $sop_list;
}

function search_sop_by_content($keyword)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $sop_list = $sop_process->search_sop_by_content($keyword);
    return $sop_list;
}

function search_sop_monitoring_details($sop_object_id, $plant_id, $dept_id, $resp_per, $level, $is_active)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $sop_monitoring_details = $sop_process->get_sop_monitoring_details($sop_object_id, $plant_id, $dept_id, $resp_per, $level, $is_active);
    return $sop_monitoring_details;
}

function search_sop_monitoring_details_count($sop_object_id, $plant_id, $dept_id, $resp_per, $level, $is_active)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $sop_monitoring_details = $sop_process->get_sop_monitoring_details($sop_object_id, $plant_id, $dept_id, $resp_per, $level, $is_active);
    return count($sop_monitoring_details);
}

function search_view($module, $query_name, $arguments)
{
    global $db; //Database connected
    
    $arguments = explode(",", $arguments);
    $arguments = str_replace("comma", ",", $arguments);
    for ($i = 0; $i < count($arguments); $i++) {
        if (strlen($arguments[$i]) > 500) {
            return (2);
        }
    }
    
    // Get the query (includes/functions/resources.func.php)	
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    
    // return $query;
    if (!$result) {
        return (3);
    }
    $total_records = $result->numRows();
    if ($total_records == 0) {
        return (1);
    }
    while ($row = $result->fetchRow()) {
        //$result[]=array('result'=>$row);
        $temp[] = $row;
    }
    // Deletes the result set and frees the memory occupied by the result set. Does not delete the DB_result object itself.
    //$result->free();
    return ($temp);
}

function search_audit_trial_type1($audit_section, $year, $month, $department, $userid, $date_from, $date_to, $sop_no, $sop_type)
{
    if ($audit_section == "business_object") {
        $audit_obj = new DB_Public_lm_audit_business_object();
    }
    if ($audit_section == "sub_business_object") {
        $audit_obj = new DB_Public_lm_audit_sub_business_object();
    }
    if ($audit_section == "num_seq") {
        $audit_obj = new DB_Public_lm_audit_numbering_order();
    }
    if ($audit_section == "department") {
        $audit_obj = new DB_Public_lm_audit_department();
    }
    if ($audit_section == "designation") {
        $audit_obj = new DB_Public_lm_audit_designation();
    }
    if ($audit_section == "org") {
        $audit_obj = new DB_Public_lm_audit_organization();
    }
    if ($audit_section == "plant") {
        $audit_obj = new DB_Public_lm_audit_plant();
    }
    if ($audit_section == "permision") {
        $audit_obj = new DB_Public_lm_audit_permission();
    }
    if ($audit_section == "reminder_mail") {
        $audit_obj = new DB_Public_lm_audit_reminder_mail_config();
    }
    if ($audit_section == "sop_expiry_year") {
        $audit_obj = new DB_Public_lm_audit_sop_expiry_year();
    }
    if ($audit_section == "sop_extend_days") {
        $audit_obj = new DB_Public_lm_audit_sop_extend_days();
    }
    if ($audit_section == "sop_print_copy") {
        $audit_obj = new DB_Public_lm_audit_print_copy();
    }
    if ($audit_section == "sop_type") {
        $audit_obj = new DB_Public_lm_audit_sop_type();
    }
    if ($audit_section == "sop_reason") {
        $audit_obj = new DB_Public_lm_audit_sop_creation_reason();
    }
    if ($audit_section == "format_no") {
        $audit_obj = new DB_Public_lm_audit_formatno_list();
    }
    if ($audit_section == "exam_passmark") {
        $audit_obj = new DB_Public_lm_audit_sop_online_exam_pass_mark();
    }
    if ($audit_section == "exam_attempt") {
        $audit_obj = new DB_Public_lm_audit_sop_online_exam_attempt_limit();
    }
    if ($audit_section == "user") {
        $audit_obj = new DB_Public_lm_audit_user();
    }
    if ($audit_section == "sop_workflow") {
        $audit_obj = new DB_Public_lm_audit_sop_workflow();
    }
    if ($audit_section == "login_logout_info") {
        $audit_obj = new DB_Public_lm_audit_user_login_info();
    }
    if ($audit_section == "password_expiry") {
        $audit_obj = new DB_Public_lm_audit_password_expiry();
    }
    if ($audit_section == "signup_workflow") {
        $audit_obj = new DB_Public_lm_audit_signup();
    }
    if ($audit_section == "user_exit_workflow") {
        $audit_obj = new DB_Public_lm_audit_user_exit();
    }

    $audit_obj->orderBy('created_date');
    if ($year != "NA") {
        $audit_obj->whereAdd("year='$year'");
    }
    if ($month != "NA") {
        $audit_obj->whereAdd("month='$month'");
    }
    if ($department != "NA") {
        $audit_obj->whereAdd("department='$department'");
    }
    if ($userid != "NA") {
        $audit_obj->whereAdd("user_id='$userid'");
    }
    if ($date_from != "NA") {
        list($year, $month, $day, $h, $i, $s) = sscanf($date_from, '%2s/%2s/%4s %2s:%2s:%2s');
        $modified_date_from = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
    }
    if ($date_to != "NA") {
        list($year, $month, $day, $h, $i, $s) = sscanf($date_to, '%2s/%2s/%4s %2s:%2s:%2s');
        $modified_date_to = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
    }
    if (($date_from != "NA") && ($date_to != "NA")) {
        $audit_obj->whereAdd("created_date >='$modified_date_from'");
        $audit_obj->whereAdd("created_date <='$modified_date_to'");
    }
    if (($date_from == "NA") && ($date_to != "NA")) {
        $audit_obj->whereAdd("created_date <='$modified_date_to'");
    }
    if (($date_from != "NA") && ($date_to == "NA")) {
        $audit_obj->whereAdd("created_date >='$modified_date_from'");
    }
    if ($sop_type != "NA") {
        $audit_obj->whereAdd("sop_type='$sop_type'");
    }
    if ($sop_no != "NA") {
        $audit_obj->whereAdd("sop_object_id='$sop_no'");
    }
    if ($audit_obj->find()) {
        while ($audit_obj->fetch()) {
            $audit_list[] = array('object_id' => $audit_obj->object_id, 'user' => getFullName($audit_obj->user_id), 'date' => get_modified_date_time_format($audit_obj->created_date), 'action' => $audit_obj->action, 'post_data' => $audit_obj->post_data, 'old_value' => $audit_obj->old_value, "status" => $audit_obj->status, "ip_address" => $audit_obj->ip_address);
        }
    } else {
        $audit_list = 0;
    }
    return $audit_list;
}

function get_sop_formatlist($sop_object_id)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    return $sop_process->get_formatlist($sop_object_id);
}

function get_sop_annexurelist($sop_object_id)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    return $sop_process->get_annexurelist($sop_object_id);
}

function search($arguments, $query_arguments, $module, $query_name, $present_page_number, $javascript_name)
{
    global $db; //Database connected
    $arguments = explode(",", $arguments);
    $arguments = str_replace("comma", ",", $arguments);

    for ($i = 0; $i < count($arguments); $i++) {
        if (strlen($arguments[$i]) > 150) {
            return (2);
        }
    }
    $query_arguments = explode(",", $query_arguments);

    // Get the query (includes/functions/resources.func.php)
    $query = get_query($module, $query_name, $arguments);

    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);

    $result = $db->query($query);
    if (!$result) {
        return (3);
    }

    $total_records = $result->numRows();

    if ($total_records == 0) {
        return (1);
    }

    $URL = "";
    $record_per_page = 20;
    $scroll = 15;
    $page = new Page();

    if (!empty($present_page_number)) {
        $page->present_page = $present_page_number;
    } else {
        $page->present_page = 0;
    }

    $page->javascript_name = $javascript_name;
    $page->set_page_data($URL, $total_records, $record_per_page, $scroll, true, true, true);

    $page->get_limit_query($query);
    $result = $db->query($page->query);

    $page->navigation[] = array('start_no' => $page->start);
    while ($row = $result->fetchRow()) {
        for ($i = 0; $i < count($query_arguments); $i++) {
            $temp[$query_arguments[$i]] = $row[$i];
        }
        $page->navigation[] = $temp;
    }
    $page->get_page_nav();
    return ($page->navigation);
}

function search_record_per_page($arguments, $query_arguments, $module, $query_name, $present_page_number, $javascript_name, $record_per_page)
{
    global $db; //Database connected
    $arguments = explode(",", $arguments);
    $arguments = str_replace("comma", ",", $arguments);

    for ($i = 0; $i < count($arguments); $i++) {
        if (strlen($arguments[$i]) > 150) {
            return (2);
        }
    }
    $query_arguments = explode(",", $query_arguments);

    // Get the query (includes/functions/resources.func.php)
    $query = get_query($module, $query_name, $arguments);

    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);

    $result = $db->query($query);
    if (!$result) {
        return (3);
    }
    $total_records = $result->numRows();

    if ($total_records == 0) {
        return (1);
    }

    $URL = "";
    if ($record_per_page != "") {
        $record_per_page = $record_per_page;
    } else {
        $record_per_page = 20;
    }
    $scroll = 15;
    $page = new Page();

    if (!empty($present_page_number)) {
        $page->present_page = $present_page_number;
    } else {
        $page->present_page = 0;
    }

    $page->javascript_name = $javascript_name;
    $page->set_page_data($URL, $total_records, $record_per_page, $scroll, true, true, true);

    $page->get_limit_query($query);
    $result = $db->query($page->query);

    $page->navigation[] = array('start_no' => $page->start);
    while ($row = $result->fetchRow()) {
        for ($i = 0; $i < count($query_arguments); $i++) {
            $temp[$query_arguments[$i]] = $row[$i];
        }
        $page->navigation[] = $temp;
    }
    $page->get_page_nav();
    return ($page->navigation);
}

function username_exist($user_name)
{
    $users = new DB_Public_users();
    $users->query("SELECT * FROM {$users->__table} WHERE lower(user_name) = lower('$user_name')");
    while ($users->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function empid_exist($emp_id)
{
    $users = new DB_Public_users();
    $users->query("SELECT * FROM {$users->__table} WHERE lower(emp_id) = lower('$emp_id')");
    while ($users->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function signup_empid_exist($emp_id)
{
    $users = new DB_Public_user_signup();
    $users->query("SELECT * FROM {$users->__table} WHERE lower(emp_id) = lower('$emp_id')");
    while ($users->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function emailid_exist($email_id)
{
    $users = new DB_Public_users();
    $users->query("SELECT * FROM {$users->__table} WHERE lower(email) = lower('$email_id')");
    while ($users->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function signup_emailid_exist($email_id)
{
    $users = new DB_Public_user_signup();
    $users->query("SELECT * FROM {$users->__table} WHERE lower(email) = lower('$email_id')");
    while ($users->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function business_object_exist($objectname)
{
    $object = new DB_Public_business_object();
    $object->query("SELECT * FROM {$object->__table} WHERE lower(object_name) = lower('$objectname')");
    while ($object->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sub_business_object_exist($objectname, $business_object)
{
    $object = new DB_Public_sub_business_object();
    $object->query("SELECT * FROM {$object->__table} WHERE lower(sub_object_name) = lower('$objectname') and buss_object_id='$business_object'");
    while ($object->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function operationname_exist($operation)
{
    $operations = new DB_Public_operation();
    $operations->query("SELECT * FROM {$operations->__table} WHERE lower(operation_name) = lower('$operation')");
    while ($operations->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function access_per_object_exist($object_name)
{
    $access_per_obj = new DB_Public_access_permission_object_list();
    $access_per_obj->query("SELECT * FROM {$access_per_obj->__table} WHERE lower(name) = lower('$object_name')");
    while ($access_per_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function organization_exist($orgname)
{
    $organization = new DB_Public_organization();
    $organization->query("SELECT * FROM {$organization->__table} WHERE lower(org_name) = lower('$orgname')");
    while ($organization->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function organization_short_name_exist($short_name)
{
    $organization = new DB_Public_organization();
    $organization->query("SELECT * FROM {$organization->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($organization->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function plant_exist($plant_name)
{
    $plant_obj = new DB_Public_org_plants();
    $plant_obj->query("SELECT * FROM {$plant_obj->__table} WHERE lower(plant_name) = lower('$plant_name')");
    while ($plant_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function plant_short_name_exist($short_name)
{
    $plant_obj = new DB_Public_org_plants();
    $plant_obj->query("SELECT * FROM {$plant_obj->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($plant_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sop_creation_reason_exist($reason)
{
    $reason_obj = new DB_Public_lm_sop_creation_reason_list();
    $reason_obj->query("SELECT * FROM {$reason_obj->__table} WHERE lower(reason) = lower('$reason')");
    while ($reason_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function get_org_plant($org_id = null)
{
    if (trim($org_id)) {
        $org_plant = new DB_Public_org_plants();
        if (!empty($org_id)) {
            $org_plant->whereAdd("org_id='$org_id'");
        }
        $org_plant->orderBy('plant_name');
        $org_plant->find();
        while ($org_plant->fetch()) {
            $plantlist[] = array('plant_name' => $org_plant->plant_name, 'plant_id' => $org_plant->plant_id, 'org_id' => $org_plant->org_id, 'org' => getOrganization($org_plant->org_id), 'short_name' => $org_plant->short_name);
        }
    }
    return $plantlist;
}

function designation_exist($desname)
{
    $des = new DB_Public_designation();
    $des->query("SELECT * FROM {$des->__table} WHERE lower(designation_name) = lower('$desname')");
    while ($des->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function departmentcode_exist($plant, $code)
{
    $dep = new DB_Public_department;
    $dep->query("SELECT * FROM {$dep->__table} WHERE plant_id='$plant' and lower(department_code) = lower('$code')");
    while ($dep->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function department_exist($plant, $name)
{
    $dep = new DB_Public_department;
    $dep->query("SELECT * FROM {$dep->__table} WHERE plant_id='$plant' and lower(department) = lower('$name')");
    while ($dep->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function file_extension_exist($type)
{
    $file = new DB_Public_file_extension;
    $file->query("SELECT * FROM {$file->__table} WHERE lower(file_extension) = lower('$type')");
    while ($file->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sop_type_exists($type)
{
    $sop_type_obj = new DB_Public_lm_sop_type();
    $sop_type_obj->query("SELECT * FROM {$sop_type_obj->__table} WHERE lower(type) = lower('$type')");
    while ($sop_type_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sop_print_copy_type_exists($type)
{
    $sop_print_copy_type_obj = new DB_Public_lm_sop_print_copy();
    $sop_print_copy_type_obj->query("SELECT * FROM {$sop_print_copy_type_obj->__table} WHERE lower(copy_type) = lower('$type')");
    while ($sop_print_copy_type_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sop_name_exist($sop_name)
{
    $lm_sop_master = new DB_Public_lm_sop_master();
    $lm_sop_master->query("SELECT * FROM {$lm_sop_master->__table} WHERE lower(sop_name) = lower('$sop_name')");
    while ($lm_sop_master->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function sop_uname_exist($uname)
{
    $lm_sop_master = new DB_Public_lm_sop_master();
    $lm_sop_master->query("SELECT * FROM {$lm_sop_master->__table} WHERE lower(uname) = lower('$uname')");
    while ($lm_sop_master->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function add_sop_download_history($sop_object_id, $ref_id, $reason)
{
    if (!empty($sop_object_id)) {
        include_module("sop");
        $sop_process = new Sop_Processor();
        $published_status = $sop_process->get_published_status($sop_object_id);

        $usr_id = $_SESSION['user_id'];
        $usr_plant = getUserPlantId($usr_id);
        $dept_id = getDeptId($usr_id);

        $sequence_object = new Sequence;
        $id = "sop_down_hist:" . $sequence_object->get_next_sequence();

        $aobj = new DB_Public_lm_sop_download_history();
        $aobj->object_id = $id;
        $aobj->user_id = $usr_id;
        $aobj->sop_object_id = $sop_object_id;
        $aobj->ref_id = $ref_id;
        $aobj->download_date = date('Y-m-d G:i:s');
        $aobj->ip_address = getIp();
        $aobj->reason = $reason;
        $aobj->year = date('y');
        $aobj->month = date('m');
        $aobj->plant = $usr_plant;
        $aobj->dept = $dept_id;
        $aobj->stage = $published_status;
        if ($aobj->insert()) {
            return $id;
        }
    }
    return null;
}

function pre_loaded_template_name_exist($name)
{
    $pre_loaded_template_obj = new DB_Public_lm_pre_loaded_template();
    $pre_loaded_template_obj->query("SELECT * FROM {$pre_loaded_template_obj->__table} WHERE lower(name) = lower('$name')");
    while ($pre_loaded_template_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function format_name_exist($format_name, $sop_object_id)
{
    $format_master = new DB_Public_lm_sop_format_master();
    $format_master->query("SELECT * FROM {$format_master->__table} WHERE lower(format_name) = lower('$format_name') and lower(sop_object_id) = lower('$sop_object_id')");
    while ($format_master->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function annexure_name_exist($annexure_name, $sop_object_id)
{
    $annexure_master = new DB_Public_lm_sop_annexure_master();
    $annexure_master->query("SELECT * FROM {$annexure_master->__table} WHERE lower(annexure_name) = lower('$annexure_name') and lower(sop_object_id) = lower('$sop_object_id')");
    while ($annexure_master->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function lm_doc_name_exist($doc_name)
{
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->query("SELECT * FROM {$lm_doc_obj->__table} WHERE lower(doc_name) = lower('$doc_name')");
    while ($lm_doc_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function lm_doc_short_name_exist($short_name)
{
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->query("SELECT * FROM {$lm_doc_obj->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($lm_doc_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function lm_doc_code_exist($doc_code)
{
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->query("SELECT * FROM {$lm_doc_obj->__table} WHERE lower(doc_code) = lower('$doc_code')");
    while ($lm_doc_obj->fetch()) {
        $list = "true";
        return $list;
    }
    $list = "false";
    return $list;
}

function get_filtered_doc_mgmt_auth_users($doc_id, $action, $department_id)
{
    if (trim($department_id)) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        if (!empty($department_id)) {
            $user->whereAdd("department_id='$department_id'");
            $user->whereAdd("account_status='enable'");
            $user->find();
            while ($user->fetch()) {
                $user_auth = new DB_Public_lm_doc_management_auth();
                if (!empty($doc_id)) {
                    $user_auth->whereAdd("lm_doc_id='$doc_id'");
                }
                if (!empty($action)) {
                    $user_auth->whereAdd("action='$action'");
                }
                $user_auth->whereAdd("user_id='$user->user_id'");
                if (!$user_auth->find()) {
                    $user_auth->fetch();
                    $userlist[] = array('user_name' => $user->full_name, 'user_id' => $user->user_id, 'department_id' => $user->department_id);
                }
            }
        }
    }
    asort($userlist);
    return $userlist;
}

function get_doc_mgmt_auth_users($doc_id = NULL, $action = NULL, $department_id = NULL)
{
    $mgmnt_auth_obj = new DB_Public_lm_doc_management_auth();
    if (!empty($doc_id)) {
        $mgmnt_auth_obj->whereAdd("lm_doc_id='$doc_id'");
    }
    if (!empty($action)) {
        $mgmnt_auth_obj->whereAdd("action='$action'");
    }
    if (!empty($department_id)) {
        $mgmnt_auth_obj->whereAdd("user_dept='$department_id'");
    }
    $mgmnt_auth_obj->find();
    while ($mgmnt_auth_obj->fetch()) {
        $userlist[] = array(
            'user_name' => getFullName($mgmnt_auth_obj->user_id),
            'user_id' => $mgmnt_auth_obj->user_id,
            'department_id' => $department_id,
            'dept_name' => getDeptName($mgmnt_auth_obj->user_id),
            'plant_name' => getUserPlantName($mgmnt_auth_obj->user_id),
            'action' => $mgmnt_auth_obj->action,
            "drop_down_value" => $mgmnt_auth_obj->user_id,
            "drop_down_option" => getFullName($mgmnt_auth_obj->user_id)
        );
    }
    sort($userlist);
    return $userlist;
}

function get_filtered_rlevel_users($user_id, $level, $department_id)
{
    if (trim($department_id)) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        if (!empty($department_id)) {
            $user->whereAdd("department_id='$department_id'");
            $user->whereAdd("account_status='enable'");
            $user->find();
            while ($user->fetch()) {
                $ureporting = new DB_Public_user_reporting();
                $ureporting->whereAdd("level='$level'");
                $ureporting->whereAdd("user_id='$user_id'");
                $ureporting->whereAdd("reporting_to='$user->user_id'");
                if (!$ureporting->find()) {
                    $ureporting->fetch();
                    $userlist[] = array('user_name' => $user->full_name, 'user_id' => $user->user_id, 'department_id' => $user->department_id);
                }
            }
        }
    }
    asort($userlist);
    return $userlist;
}

function get_rlevel_users($user_id, $level)
{
    $reporting = new DB_Public_user_reporting();
    $reporting->whereAdd("user_id='$user_id'");
    $reporting->whereAdd("level='$level'");
    $reporting->find();
    while ($reporting->fetch()) {
        $userlist[] = array('reporting_to' => getFullName($reporting->reporting_to), 'reporting_to_id' => $reporting->reporting_to, 'reporting_to_dept_id' => $reporting->reporting_to_dept, 'reporting_to_dept' => getDeptName($reporting->reporting_to_dept));
    }
    sort($userlist);
    return $userlist;
}

function delete_sop_question($object_id)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $qns_master = new DB_Public_lm_sop_question_master();
    if ($qns_master->get("object_id", $object_id)) {
        if ($sop_process->can_delete_sop_question($qns_master->sop_object_id)) {
            $del_qns_opt_obj = new DB_Public_lm_sop_question_options();
            $del_qns_opt_obj->whereAdd("question_id='$object_id'");
            $del_qns_opt_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

            $del_qns_obj = new DB_Public_lm_sop_question_master();
            $del_qns_obj->whereAdd("object_id='$object_id'");
            $del_qns_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
            $result = "true";
            return $result;
        } else {
            $result = "false";
            return $result;
        }
    }
}

function search_training($training_start_date, $training_end_date)
{
    include_module("sop");
    $sop_process = new Sop_Processor();
    $training_list = $sop_process->training_list($training_start_date, $training_end_date);
    return $training_list;
}

function search_admin_audit_trial_type($audit_section, $year, $month, $department, $userid, $date_from, $date_to)
{
    if ($audit_section == "business_object") {
        $audit_obj = new DB_Public_lm_audit_business_object();
    }
    if ($audit_section == "sub_business_object") {
        $audit_obj = new DB_Public_lm_audit_sub_business_object();
    }
    if ($audit_section == "num_seq") {
        $audit_obj = new DB_Public_lm_audit_numbering_order();
    }
    if ($audit_section == "department") {
        $audit_obj = new DB_Public_lm_audit_department();
    }
    if ($audit_section == "designation") {
        $audit_obj = new DB_Public_lm_audit_designation();
    }
    if ($audit_section == "org") {
        $audit_obj = new DB_Public_lm_audit_organization();
    }
    if ($audit_section == "plant") {
        $audit_obj = new DB_Public_lm_audit_plant();
    }
    if ($audit_section == "permision") {
        $audit_obj = new DB_Public_lm_audit_permission();
    }
    if ($audit_section == "reminder_mail") {
        $audit_obj = new DB_Public_lm_audit_reminder_mail_config();
    }
    if ($audit_section == "login_logout_info") {
        $audit_obj = new DB_Public_lm_audit_user_login_info();
    }
    if ($audit_section == "password_expiry") {
        $audit_obj = new DB_Public_lm_audit_password_expiry();
    }
    if ($audit_section == "signup_workflow") {
        $audit_obj = new DB_Public_lm_audit_signup();
    }
    if ($audit_section == "user_exit_workflow") {
        $audit_obj = new DB_Public_lm_audit_user_exit();
    }
    if ($audit_section == "user") {
        $audit_obj = new DB_Public_lm_audit_user();
    }
    $audit_obj->orderBy('created_date');
    if ($year != "NA") {
        $audit_obj->whereAdd("year='$year'");
    }
    if ($month != "NA") {
        $audit_obj->whereAdd("month='$month'");
    }
    if ($department != "NA") {
        $audit_obj->whereAdd("department='$department'");
    }
    if ($userid != "NA") {
        $audit_obj->whereAdd("user_id='$userid'");
    }
    if ($date_from != "NA") {
        list($year, $month, $day, $h, $i, $s) = sscanf($date_from, '%2s/%2s/%4s %2s:%2s:%2s');
        $modified_date_from = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
    }
    if ($date_to != "NA") {
        list($year, $month, $day, $h, $i, $s) = sscanf($date_to, '%2s/%2s/%4s %2s:%2s:%2s');
        $modified_date_to = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
    }
    if (($date_from != "NA") && ($date_to != "NA")) {
        $audit_obj->whereAdd("created_date >='$modified_date_from'");
        $audit_obj->whereAdd("created_date <='$modified_date_to'");
    }
    if (($date_from == "NA") && ($date_to != "NA")) {
        $audit_obj->whereAdd("created_date <='$modified_date_to'");
    }
    if (($date_from != "NA") && ($date_to == "NA")) {
        $audit_obj->whereAdd("created_date >='$modified_date_from'");
    }
    if ($audit_obj->find()) {
        while ($audit_obj->fetch()) {
            $audit_list[] = array('object_id' => $audit_obj->object_id, 'user' => getFullName($audit_obj->user_id), 'date' => get_modified_date_time_format($audit_obj->created_date), 'action' => $audit_obj->action, 'post_data' => $audit_obj->post_data, 'old_value' => $audit_obj->old_value, "status" => $audit_obj->status, "ip_address" => $audit_obj->ip_address);
        }
    } else {
        $audit_list = 0;
    }
    return $audit_list;
}


/* ................................................Start of Dashboard...................................................................................... */



function pieChart($yearFrom, $yearTo, $plantId, $departmentId,$docGroup ,$modules){
    
    $statuses = search_view('dash','group_status_view',strtolower($docGroup));
    $statuses = array_map(function($item) {
        return $item[0];
    }, $statuses);

    global $db; //Database connected
    
    $query = 'SELECT module, status, SUM(total)
                FROM "public"."'.strtolower($docGroup).'_dashboard_view"
                WHERE year BETWEEN LEAST('.$yearFrom.', '.$yearTo.') AND GREATEST('.$yearFrom.', '.$yearTo.')';

    $plantId ? $query.= " AND plant_id = '$plantId'" : null;
    $departmentId ? $query.= " AND dept_id = '$departmentId'" : null;
    
    if($modules == ''){
        $modules = [];
    } else {
        $modules = explode(',', $modules);
    }
    $rows = []; 
    foreach($modules as $module){

        $query1 = " AND module = '$module'";   
        $query1.= " GROUP BY module, status";
        $result = $db->query($query.$query1);
       
        while ($row = $result->fetchRow()) {
            $rows[] = $row;
        }         
    }

    return [$statuses, $modules, $rows];

}
// {
//     global $db; //Database connected  
    
//     $query = 'SELECT module, status, SUM(total)
//                 FROM "public"."dms_dashboard_view"
//                 WHERE year BETWEEN LEAST('.$yearFrom.', '.$yearTo.') AND GREATEST('.$yearFrom.', '.$yearTo.')';

//     $plantId ? $query.= " AND plant_id = '$plantId'" : null;
//     $departmentId ? $query.= " AND dept_id = '$departmentId'" : null;
    
//     $modules = getDmsModules();   
//     $statuses = getDmsStatuses();  

//     $rows = []; 
    
//     foreach($modules as $module){

//         $module = $module['module'];
//         $query1 = " AND module = '$module'";   
//         $query1.= " GROUP BY module, status";
//         $result = $db->query($query.$query1);
       
//         while ($row = $result->fetchRow()) {
//             $rows[] = $row;
//         }         
//     } 
        
//     return [$statuses, $modules, $rows];
// }

function trendingChart($entity, $businessModule, $year1, $year2, $plantId)
{
    $chartData[] = trendingDataFilter($entity, $businessModule, $year1, $plantId);
    $chartData[] = trendingDataFilter($entity, $businessModule, $year2, $plantId);
    return $chartData;
}

function trendingDataFilter($entity, $businessModule, $year, $plantId)
{
    $statuses = [];
    
    $statuses = search_view('dash','group_status_view',strtolower($entity));
    
    $statuses = array_map(function($item) {
        return $item[0];
    }, $statuses);

    $plantId = $plantId ?:  '%';
    $businessModule = $businessModule ?: '%';

    
    $arguments = strtolower($entity).','.$plantId.','.$businessModule.','.$year;

    $rows = search_view('dash','dashboard_trending_view',$arguments);

    $innitialStatus = [];
    
    foreach($statuses as $status){
        $innitialStatus[$status] = 0;        
    }
        
    if(count($rows) > 0){
        
        foreach ($rows as $row) {
        
            $status = $row[1]; 
            $count = $row[2];  
            
            if (array_key_exists($status, $innitialStatus)) {

                $innitialStatus[$status] += $count;
            }          
        }

        $results = $innitialStatus;

    }else{

        $results = $innitialStatus;
    }
        
    return $results;
}
function trendingChartDashboard($entity, $businessModule, $yearFrom, $yearTo, $plantId,$deptId)
{
    
    $chartData = [];
    if($yearFrom > $yearTo){
        $loopCount = ($yearFrom-$yearTo)+1;
        // return $loopCount;
        for($i=0; $i<$loopCount; $i++){
            array_push($chartData, [$yearFrom => trendingDataDashboard($entity, $businessModule, $yearFrom, $plantId,$deptId)]);
            $yearFrom--;
        }
        
    }elseif($yearFrom < $yearTo){
        $loopCount = ($yearTo-$yearFrom)+1;
        for($i=0; $i<$loopCount; $i++){
            array_push($chartData,  [$yearTo => trendingDataDashboard($entity, $businessModule, $yearTo, $plantId,$deptId)]);
            $yearTo--;
        }
    }else{
        
        array_push($chartData,  [$yearFrom => trendingDataDashboard($entity, $businessModule, $yearFrom, $plantId,$deptId)]);
          
    }
    
   
    return $chartData;
}

function trendingDataDashboard($entity, $businessModule, $year, $plantId, $deptId)
{
    
    global $db;
    $query = '';
    $statuses = [];
    $statuses = search_view('dash','group_status_view',strtolower($entity));
    
    $statuses = array_map(function($item) {
        return $item[0];
    }, $statuses);
     
    $businessModule = "'".str_replace(",", "','", $businessModule)."'";

    $query = 'SELECT module, status, SUM(total)
            FROM "public"."'.strtolower($entity).'_dashboard_view"
            WHERE year = '.$year.'';
    $businessModule ? $query.= " AND module IN ($businessModule)" : null;
    $plantId ? $query.= " AND plant_id = '$plantId'" : null;
    $deptId ? $query.= " AND dept_id = '$deptId'" : null;

    $query.= " GROUP BY module, status";
    $result = $db->query($query);
    $rows = [];
    while ($row = $result->fetchRow()) {
        $rows[] = $row;
    }


    $innitialStatus = [];

    foreach($statuses as $status){
        $innitialStatus[$status] = 0;
    }
    
    
    if(count($rows) > 0){
        
        foreach ($rows as $row) {
        
            $status = $row[1];
            $count = $row[2];
            
            if (array_key_exists($status, $innitialStatus)) {
                $innitialStatus[$status] += $count;
            }
        }

        $results = $innitialStatus;

    } else {
        $results = $innitialStatus;
    }
    
    return $results;
}


/* ................................................End of Dashboard...................................................................................... */




/* ................................................Start of DMS...................................................................................... */
function delete_lm_dm_doc_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');
        $lm_doc_file = new DB_Public_lm_dm_doc_file();
        $lm_doc_file->get("file_id", $file_id);
        $lm_doc_file->delete();
        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();
            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $at_data['File Name'] = array($file->name, $file->name, $file->name);
        $at_data['File Type'] = array($file->type, $file->type, $file->type);
        $at_data['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $at_data['Refrence Towards'] = array($lm_doc_file->type, $lm_doc_file->type, $lm_doc_file->type);
        $at_data['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($object_id, $file_id, $at_data, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function search_dms($params)
{
    $search_params = get_object_vars(json_decode($params));
    include_module("dms");
    $dms_process = new Dms_Processor();
    return $dms_process->get_dms_details($search_params);
}

function get_dms_unique_attendess_for_attendence($dm_object_id, $schedule_id)
{
    include_module("dms");
    $dms_process = new Dms_Processor();
    return $dms_process->get_dms_unique_attendess_details_for_attendence($dm_object_id, $schedule_id);
}
/* ................................................End of DMS...................................................................................... */



/* ................................................Start of VMS...................................................................................... */
function get_vms_plants($org_id, $plant_id = null, $is_active = null, $vendor_status = null, $audit_status = null, $audit_type = null)
{
    include_module("vms");
    $vms_process = new Vms_Processor();
    return $vms_process->get_vms_plants($org_id, $plant_id, $is_active, $vendor_status, $audit_status, $audit_type);
}

function delete_lm_vm_doc_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');
        $lm_doc_file = new DB_Public_lm_vm_doc_file();
        $lm_doc_file->get("file_id", $file_id);
        $lm_doc_file->delete();
        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();
            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $at_data['File Name'] = array($file->name, $file->name, $file->name);
        $at_data['File Type'] = array($file->type, $file->type, $file->type);
        $at_data['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $at_data['Refrence Towards'] = array($lm_doc_file->type, $lm_doc_file->type, $lm_doc_file->type);
        $at_data['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($object_id, $file_id, $at_data, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function search_vms($params)
{
    $search_params = get_object_vars(json_decode($params));
    include_module("vms");
    $dms_process = new Vms_Processor();
    return $dms_process->get_vms_details($search_params);
}
/* ................................................End of VMS...................................................................................... */
/* ................................................Start of AMS...................................................................................... */

function get_ams_sub_type($type_id)
{
    return getAuditSubTypeList(null, $type_id);
}

function delete_lm_audit_doc_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');
        $lm_doc_file = new DB_Public_lm_audit_doc_file();
        $lm_doc_file->get("file_id", $file_id);
        $lm_doc_file->delete();
        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();
            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $at_data['File Name'] = array($file->name, $file->name, $file->name);
        $at_data['File Type'] = array($file->type, $file->type, $file->type);
        $at_data['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $at_data['Refrence Towards'] = array($lm_doc_file->type, $lm_doc_file->type, $lm_doc_file->type);
        $at_data['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($object_id, $file_id, $at_data, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function get_ams_schedule_list($params)
{
    $search_params = get_object_vars(json_decode($params));
    include_module("ams");
    $ams_process = new Ams_Processor();
    return $ams_process->get_ams_schedule_deatils($search_params);
}

/* ................................................End of AMS...................................................................................... */

function search_capa($params)
{
    $search_params = get_object_vars(json_decode($params));
    include_module("capa");
    $capa_process = new Capa_Processor();
    return $capa_process->get_capa_details($search_params);
}

/* ................................................Start of Change Control...................................................................................... */

function delete_lm_cc_doc_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');
        $lm_doc_file = new DB_Public_lm_cc_doc_file();
        $lm_doc_file->get("file_id", $file_id);
        $lm_doc_file->delete();
        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();
            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $at_data['File Name'] = array('NA', $file->name, $file->name);
        $at_data['File Type'] = array('NA', $file->type, $file->type);
        $at_data['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $at_data['Refrence Towards'] = array('NA', $file->type, $file->type);
        $at_data['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($object_id, $file_id, $at_data, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function search_ccm($params)
{
    $search_params = get_object_vars(json_decode($params));
    include_module("ccm");
    $ccm_process = new Ccm_Processor();
    return $ccm_process->get_ccm_details($search_params);
}

function get_ccm_unique_attendess_for_attendence($cc_object_id, $schedule_id)
{
    include_module("ccm");
    $ccm_process = new Ccm_Processor();
    return $ccm_process->get_ccm_unique_attendess_details_for_attendence($cc_object_id, $schedule_id);
}

/* * ********************************************************End of Change Control************************************************* */

function delete_lm_capa_doc_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');
        $lm_capa_doc_file = new DB_Public_lm_capa_doc_file();
        $lm_capa_doc_file->get("file_id", $file_id);
        $lm_capa_doc_file->delete();
        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();
            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $at_data['File Name'] = array('NA', $file->name, $file->name);
        $at_data['File Type'] = array('NA', $file->type, $file->type);
        $at_data['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $at_data['Refrence Towards'] = array('NA', $file->type, $file->type);
        $at_data['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($object_id, $file_id, $at_data, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

/* * ********************************************************End of Change Control************************************************* */


/* ###########################################################Start of OOS ################################################################## */
function delete_doc_file($fileId, $objectId)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$fileId'");
    if ($file->find()) {
        $userId = $_SESSION['user_id'];
        $dateTime = date('Y-m-d G:i:s');
        $docFile = new DB_Public_lm_oos_doc_file();
        $docFile->get("file_id", $fileId);
        $docFile->delete();
        while ($file->fetch()) {
            $trashFileObj = new DB_Public_trash_file();
            $trashFileObj->file_id = $fileId;
            $trashFileObj->deleted_by_user = $userId;
            $trashFileObj->deleted_time = $dateTime;
            $trashFileObj->object_id = $objectId;
            $trashFileObj->name = $file->name;
            $trashFileObj->size = $file->size;
            $trashFileObj->hash = $file->hash;
            $trashFileObj->type = $file->type;
            $trashFileObj->insert();
            $fileHash = $file->hash;
            $fileName = _DOC_VAULT_ . $fileHash;
            unlink($fileName);
            $file->delete();
        }
        $result = "true";
        //audit trail
        $atData['File Name'] = array($file->name, $file->name, $file->name);
        $atData['File Type'] = array($file->type, $file->type, $file->type);
        $atData['File Size'] = array(GetFriendlySize($file->size), GetFriendlySize($file->size), GetFriendlySize($file->size));
        $atData['Refrence Towards'] = array($docFile->type, $docFile->type, $docFile->type);
        $atData['Deleted By'] = array('NA', getFullName($_SESSION['user_id']), $_SESSION['user_id'] . " - " . getFullName($_SESSION['user_id']));
        addAuditTrailLog($objectId, $fileId, $atData, "Delete File", 'File Deleted Successfully');
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function deleteChecklistPoint($object_id)
{
    if (!empty($object_id)) {
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->whereAdd("object_id='$object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return "true";
    } else {
        return "false";
    }
}

function deleteAnalyst($object_id)
{
    if (!empty($object_id)) {
        $obj = new DB_Public_lm_oos_invest_analyst_details();
        $obj->whereAdd("object_id='$object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return "true";
    } else {
        return "false";
    }
}

function searchOos($params)
{
    $searchParams = get_object_vars(json_decode($params));
    include_module("oos");
    $oosProcess = new Oos_Processor();
    return $oosProcess->getOosDetails($searchParams);
}
/* ###########################################################End of OOS ################################################################## */


function get_management_users($lm_doc_id, $action)
{
    $mgmt_auth = new DB_Public_lm_doc_management_auth();
    $mgmt_auth->whereAdd("lm_doc_id='$lm_doc_id'");
    $mgmt_auth->whereAdd("action='$action'");
    if ($mgmt_auth->find()) {
        while ($mgmt_auth->fetch()) {
            $userlist[] = array('user_name' => getFullName($mgmt_auth->user_id), 'user_id' => $mgmt_auth->user_id, 'department_id' => $mgmt_auth->dept_id, 'department' => getDepartment($mgmt_auth->user_dept));
        }
    }
    sort($userlist);
    return $userlist;
}

function delete_review_comments($object_id)
{
    if (!empty($object_id)) {
        $del_obj = new DB_Public_lm_doc_review_comments();
        $del_obj->whereAdd("object_id='$object_id'");
        $del_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

        $result = "true";
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

function delete_lm_doc_file_file($file_id, $object_id)
{
    $file = new DB_Public_file;
    $file->whereAdd("object_id='$file_id'");
    if ($file->find()) {
        $user_id = $_SESSION['user_id'];
        $date_time = date('Y-m-d G:i:s');

        $lm_doc_file = new DB_Public_lm_doc_file();
        $lm_doc_file->get("file_id", $file_id);
        $lm_doc_file->delete();

        while ($file->fetch()) {
            $trash_file_obj = new DB_Public_trash_file();
            $trash_file_obj->file_id = $file_id;
            $trash_file_obj->deleted_by_user = $user_id;
            $trash_file_obj->deleted_time = $date_time;
            $trash_file_obj->object_id = $object_id;
            $trash_file_obj->name = $file->name;
            $trash_file_obj->size = $file->size;
            $trash_file_obj->hash = $file->hash;
            $trash_file_obj->type = $file->type;
            $trash_file_obj->insert();

            $file_hash = $file->hash;
            $filename = _DOC_VAULT_ . $file_hash;
            unlink($filename);
            $file->delete();
        }
        $result = "true";
        return $result;
    } else {
        $result = "false";
        return $result;
    }
}

/** QM Stop */
/** Register the function */
if ($_SESSION['module'] == "admin") {
    sajax_export("sop_type_exists");
    sajax_export("username_exist");
    sajax_export("business_object_exist");
    sajax_export("sub_business_object_exist");
    sajax_export("operationname_exist");
    sajax_export("access_per_object_exist");
    sajax_export("organization_exist");
    sajax_export("organization_short_name_exist");
    sajax_export("plant_exist");
    sajax_export("plant_short_name_exist");
    sajax_export("designation_exist");
    sajax_export("department_exist");
    sajax_export("departmentcode_exist");
    sajax_export("loading");
    sajax_export("get_soplist_by_sop_type");
    sajax_export("sop_print_copy_type_exists");
    sajax_export("empid_exist");
    sajax_export("signup_empid_exist");
    sajax_export("empid_exist_one_time");
    sajax_export("emailid_exist");
    sajax_export("signup_emailid_exist");
    sajax_export("get_org_plant");
    sajax_export("lm_doc_name_exist");
    sajax_export("lm_doc_short_name_exist");
    sajax_export("lm_doc_code_exist");
    sajax_export("get_filtered_doc_mgmt_auth_users");
    sajax_export("get_doc_mgmt_auth_users");
    sajax_export("sop_creation_reason_exist");
    sajax_export("get_filtered_lm_doc_workflow_action_list");
    sajax_export("get_lm_doc_action_list");
    sajax_export("get_filtered_rlevel_users");
    sajax_export("get_rlevel_users");
    sajax_export("delete_lm_doc_file_file");
    sajax_export("getPlantDeptList");
    sajax_export("get_plant_users");
    sajax_export("get_all_dept_users");
    sajax_export("search_sop_monitoring_details");
    sajax_export("is_cc_sub_category_exist");

    /* Admin Module - Start of VMS */
    sajax_export("is_vendor_agenda_exists");
    sajax_export("is_vendor_sub_category_exists");
    sajax_export("is_vendor_type_exists");
    /* End of VMS */
    /* Admin Module - Start of AMS */
    sajax_export("is_audit_type_exists");
    sajax_export("is_audit_sub_type_exists");
    /* End of AMS */
    /* Admin Module - General Master Data */
    sajax_export("is_dev_related_to_exist");
    sajax_export("is_dev_sub_related_to_exist");
    sajax_export("is_dev_type_exist");
    sajax_export("is_product_name_exists");
    sajax_export("is_product_code_exists");
    sajax_export("is_process_stage_exist");
    sajax_export("is_market_name_exist");
    sajax_export("is_customer_name_exist");
    sajax_export("is_customer_short_name_exist");
    sajax_export("is_inst_equip_type_exist");
    sajax_export("is_inst_equip_id_exist");
    sajax_export("is_inst_equip_name_exist");
    sajax_export("is_material_type_exist");
    sajax_export("is_material_type_sub_category_exist");
    /* End of Admin Module  */

    /* Admin Module - Start of CC */
    sajax_export("is_change_related_to_exist");
    sajax_export("is_change_type_exist");
    sajax_export("is_cc_affected_doc_name_exist");
    /* End of CC */

    /* Admin Module - Start of OOS */
    sajax_export("isOosCheckListExist");
    sajax_export("isOosTestNameExist");
    /* End of OOS */
}
if ($_SESSION['module'] == "sop") {
    sajax_export("check_password");
    sajax_export("get_dept_users");
    sajax_export("search_sop");
    sajax_export("search_sop_by_content");
    sajax_export("search_sop_monitoring_details");
    sajax_export("search_sop_monitoring_details_count");
    sajax_export("compareSopMonitoringLimit");
    sajax_export("get_sop_formatlist");
    sajax_export("get_sop_annexurelist");
    sajax_export("sop_name_completion");
    sajax_export("get_all_dept_users");
    sajax_export("get_plant_users");
    sajax_export("sop_name_exist");
    sajax_export("add_sop_download_history");
    sajax_export("pre_loaded_template_name_exist");
    sajax_export("format_name_exist");
    sajax_export("annexure_name_exist");
    sajax_export("get_doc_mgmt_auth_users");
    sajax_export("delete_sop_question");
    sajax_export("delete_review_comments");
    sajax_export("delete_lm_doc_file_file");
    sajax_export("check_user_password");
    sajax_export("getPlantDeptList");
    sajax_export("getAllDeptList");
    sajax_export("search_training");
}
if ($_SESSION['module'] == "dms") {
    sajax_export("delete_lm_dm_doc_file");
    sajax_export("search_dms");
    sajax_export("get_dms_unique_attendess_for_attendence");
    sajax_export("get_qms_doc_no_list");
    sajax_export("get_qms_doc_no");
}
if ($_SESSION['module'] == "ccm") {
    sajax_export("get_ccm_unique_attendess_for_attendence");
    sajax_export("delete_lm_cc_doc_file");
    sajax_export("search_ccm");
    sajax_export("get_qms_doc_no_list");
}
if ($_SESSION['module'] == "capa") {
    sajax_export("get_qms_doc_no_list");
    sajax_export("get_qms_doc_no");
    sajax_export("delete_lm_doc_file_file");
    sajax_export("search_capa");
    sajax_export("get_all_dept_users");
    sajax_export("delete_lm_capa_doc_file");
    sajax_export("get_org_plant");
}
if ($_SESSION['module'] == "vms") {
    sajax_export("vms_organization_exist");
    sajax_export("vms_organization_short_name_exist");
    sajax_export("vms_plant_exist");
    sajax_export("vms_plant_short_name_exist");
    sajax_export("get_vms_plants");
    sajax_export("delete_lm_vm_doc_file");
    sajax_export("search_vms");
    sajax_export("get_qms_doc_no_list");
}
if ($_SESSION['module'] == "ams") {
    sajax_export("get_ams_sub_type");
    sajax_export("delete_lm_audit_doc_file");
    sajax_export("get_ams_schedule_list");
}
if ($_SESSION['module'] == "audit") {
    sajax_export("search_audit_trial_type1");
    sajax_export("get_all_dept_users");
    sajax_export("get_soplist_by_sop_type");
    sajax_export("search_admin_audit_trial_type");
    sajax_export("get_qms_doc_no_list");
}
if ($_SESSION['module'] == "file") {
    sajax_export("file_extension_exist");
}
if ($_SESSION['module'] == "oos") {

    sajax_export("deleteChecklistPoint");
    sajax_export("deleteAnalyst");
    sajax_export("searchOos");
    sajax_export("delete_doc_file");

    sajax_export("get_dms_unique_attendess_for_attendence");
    sajax_export("get_qms_doc_no_list");
    sajax_export("get_qms_doc_no");

}

if ($_SESSION['module'] == "dash") {
    sajax_export("dashboardFilterData");
    sajax_export("getDocListByDocGroupId");
    sajax_export("getLmDocGroupById");
    sajax_export("getStatusByDocId");
    sajax_export('pieChart');
    sajax_export('trendingChart');

    sajax_export('trendingChartDashboard');
}

sajax_export("search");
sajax_export("search_view");
sajax_export("check_user_password");
sajax_export("getDeptList");
sajax_export("get_dept_list");
sajax_export("getAccessRightsDeptList");
sajax_export("get_doc_mgmt_auth_users");
sajax_export("get_dept_users");


sajax_init();
//Uncomment to put Sajax in debug mode
//$sajax_debug_mode = 1; 
/** Serve client instances */
sajax_handle_client_request();
//End of For Sajax
