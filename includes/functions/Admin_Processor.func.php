<?php

/**
 * Admin Processor Functions
 * @author Ananthakumar V
 * @since 24/02/2017
 * @package admin
 * @version 1.0
 */

/**
 * This function returns User Name
 * @param string $user_id 
 * @return string, user_name
 */
function getUserName($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    return $usr->user_name;
}

/**
 * This function returns  Full Name
 * @param string $user_id 
 * @return string, full_name
 */
function getFullName($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    return $usr->full_name;
}

function getEmpId($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    return $usr->emp_id;
}

/**
 * This function returns  email
 * @param string $user_name 
 * @return string, email ID
 */
function getEmailbyUserName($user_name) {
    $usr = new DB_Public_users;
    $usr->get("user_name", $user_name);
    return $usr->email;
}

/**
 * This function returns  email
 * @param string $user_id
 * @return string, email ID
 */
function getEmailbyUserId($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    return $usr->email;
}

/**
 * This function returns  Department Id
 * @param string $user_id 
 * @return string, department_id
 */
function getDeptId($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    return $usr->department_id;
}

/**
 * This function returns Department Name
 * @param string $user_id 
 * @return string, department
 */
function getDeptName($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    $dept_obj = new DB_Public_department();
    $dept_obj->get("department_id", $usr->department_id);
    return $dept_obj->department;
}

function getUserList($user_id = null, $user_name = null, $desi_id = null, $org_id = null, $email_id = null, $dept_id = null, $emp_id = null, $account_status = null, $password_expired_on = null) {
    $users_obj = new DB_Public_users();
    $users_obj->orderBy('full_name');
    if (!empty($user_id)) {
        $users_obj->whereAdd("user_id='$user_id'");
    }
    if (!empty($user_name)) {
        $users_obj->whereAdd("user_name='$user_name'");
    }
    if (!empty($desi_id)) {
        $users_obj->whereAdd("designation_id='$desi_id'");
    }
    if (!empty($org_id)) {
        $users_obj->whereAdd("org_id='$org_id'");
    }
    if (!empty($email_id)) {
        $users_obj->whereAdd("email='$email_id'");
    }
    if (!empty($dept_id)) {
        $users_obj->whereAdd("department_id='$dept_id'");
    }
    if (!empty($emp_id)) {
        $users_obj->whereAdd("emp_id='$emp_id'");
    }
    if (!empty($account_status)) {
        $users_obj->whereAdd("account_status='$account_status'");
    }
    if (!empty($password_expired_on)) {
        $users_obj->whereAdd("password_expired_on='$password_expired_on'");
    }
    $users_obj->find();
    $count = 1;
    while ($users_obj->fetch()) {
        $signup_obj = getUserSignupObj($users_obj->user_id);
        $exit_obj = getUserExitObj($users_obj->user_id);
        if (!empty($signup_obj)) {
            $signup_object_id = $signup_obj->object_id;
        } else {
            $signup_object_id = null;
        }
        if (!empty($exit_obj)) {
            $exit_object_id = $exit_obj->object_id;
        } else {
            $exit_object_id = null;
        }
        $user_list[] = array(
            "user_id" => $users_obj->user_id,
            'user_name' => $users_obj->user_name,
            'full_name' => $users_obj->full_name,
            'emp_id' => $users_obj->emp_id,
            'emp_dept_id' => $users_obj->department_id,
            "department" => getDepartment($users_obj->department_id),
            'emp_desi_id' => $users_obj->designation_id,
            'designation' => getDesignation($users_obj->designation_id),
            "emp_org_id" => $users_obj->org_id,
            'organization' => getOrganization($users_obj->org_id),
            'plant_short_name' => getPlantShortName($users_obj->plant_id),
            'email' => $users_obj->email,
            'signup_object_id' => $signup_obj->object_id,
            'exit_object_id' => $exit_object_id,
        );
        $count++;
    }
    return $user_list;
}

function getPlantList($plant_id = null, $org_id = null) {
    $plant_obj = new DB_Public_org_plants();
    if (!empty($plant_id)) {
        $plant_obj->whereAdd("plant_id='$plant_id'");
    }
    if (!empty($org_id)) {
        $plant_obj->whereAdd("org_id='$org_id'");
    }
    $plant_obj->find();
    $count = 1;
    while ($plant_obj->fetch()) {
        $plantlist[] = array(
            'plant_name' => $plant_obj->plant_name,
            'plant_id' => $plant_obj->plant_id,
            'org_id' => $plant_obj->org_id,
            'org' => getOrganization($plant_obj->org_id),
            'short_name' => $plant_obj->short_name,
            'address' => $plant_obj->address,
            'city' => $plant_obj->city,
            'state' => $plant_obj->state,
            'country' => $plant_obj->country,
            'pincode' => $plant_obj->pincode,
            'contact_number' => $plant_obj->contact_number,
            'email' => $plant_obj->email,
            'website' => $plant_obj->website,
            'created_by_id' => $plant_obj->created_by,
            'created_by' => getFullName($plant_obj->created_by),
            'created_time' => $plant_obj->created_time,
            'modified_by_id' => $plant_obj->modified_by,
            'modified_by' => getFullName($plant_obj->modified_by),
            'modified_time' => $plant_obj->modified_time,
        );
        $count++;
    }
    return $plantlist;
}

function getPlantName($plant_id) {
    $org_plants_obj = new DB_Public_org_plants();
    $org_plants_obj->get("plant_id", $plant_id);
    return $org_plants_obj->plant_name;
}

function getPlantShortName($plant_id) {
    $org_plants_obj = new DB_Public_org_plants();
    $org_plants_obj->get("plant_id", $plant_id);
    return $org_plants_obj->short_name;
}

function getPlantOrgId($plant_id) {
    $org_plants_obj = new DB_Public_org_plants();
    $org_plants_obj->get("plant_id", $plant_id);
    return $org_plants_obj->org_id;
}

function getUserPlantId($user_id) {
    $usr_obj = new DB_Public_users();
    $usr_obj->get("user_id", $user_id);
    return $usr_obj->plant_id;
}

function getUserPlantName($user_id) {
    $usr_obj = new DB_Public_users();
    $usr_obj->get("user_id", $user_id);
    return getPlantName($usr_obj->plant_id);
}

function getUserPlantShortName($user_id) {
    $usr_obj = new DB_Public_users();
    $usr_obj->get("user_id", $user_id);
    return getPlantShortName($usr_obj->plant_id);
}

function getPlantLogo($plant_id) {
    $doc_file_obj = new DB_Public_lm_doc_file();
    if ($doc_file_obj->get("object_id", $plant_id)) {
        $file_obj = new DB_Public_file();
        $file_obj->get("object_id", $doc_file_obj->file_id);
        $logo = _DOC_VAULT_ . $file_obj->hash;
        return $logo;
    }
    return null;
}

function getPlantDeptList($plant_id) {
    $dept_obj = new DB_Public_department();
    $dept_obj->whereAdd("plant_id='$plant_id'");
    if ($dept_obj->find()) {
        while ($dept_obj->fetch()) {
            $plant_dept_list[] = array(
                'department_id' => $dept_obj->department_id,
                'plant_name' => getPlantName($dept_obj->plant_id),
                'plant_id' => $dept_obj->plant_id,
                'department' => $dept_obj->department,
                'department_code' => $dept_obj->department_code,
                'full_name' => $dept_obj->full_name,
                'created_by_id' => $dept_obj->creator,
                'created_by' => getFullName($dept_obj->creator),
                'created_time' => $dept_obj->created_time
            );
        }
        return $plant_dept_list;
    }
    return null;
}

function getAllDeptList() {
    $dept_obj = new DB_Public_department();
    if ($dept_obj->find()) {
        while ($dept_obj->fetch()) {
            $plant_dept_list[] = array(
                'department_id' => $dept_obj->department_id,
                'plant_name' => getPlantName($dept_obj->plant_id),
                'plant_id' => $dept_obj->plant_id,
                'department' => $dept_obj->department,
                'department_code' => $dept_obj->department_code,
                'full_name' => $dept_obj->full_name,
                'created_by_id' => $dept_obj->creator,
                'created_by' => getFullName($dept_obj->creator),
                'created_time' => $dept_obj->created_time
            );
        }
        return $plant_dept_list;
    }
    return null;
}

function getUserSignupObj($user_id) {
    $signup_obj = new DB_Public_user_signup();
    $signup_obj->get("user_id", $user_id);
    return $signup_obj;
}

function getUserExitObj($user_id) {
    $exit_obj = new DB_Public_user_exit();
    $exit_obj->get("user_id", $user_id);
    return $exit_obj;
}

/**
 * This function returns  Department Name
 * @param string $department_id 
 * @return string, department
 */
function getDepartment($department_id) {
    $dept_obj = new DB_Public_department();
    $dept_obj->get("department_id", $department_id);
    return $dept_obj->department;
}

function getDepartmentIdByName($department_name) {
    $dept_obj = new DB_Public_department();
    $dept_obj->get("department", $department_name);
    return $dept_obj->department_id;
}

/**
 * This function returns Department List
 * @return array
 */
function getDeptListById($department_id) {
    $deptlist = [];
    $dept_object = new DB_Public_department();
    $dept_object->get("department_id", "$department_id");
    $dept_object->orderBy('department');
    $dept_object->find();
    while ($dept_object->fetch()) {
        $deptlist[$dept_object->department_id] = $dept_object->department;
    }
    return $deptlist;
}

function getDeptListByName($department_name) {
    $department_id = getDepartmentIdByName($department_name);
    $deptlist = [];
    $dept_object = new DB_Public_department();
    $dept_object->get("department_id", "$department_id");
    $dept_object->orderBy('department');
    $dept_object->find();
    while ($dept_object->fetch()) {
        $deptlist[$dept_object->department_id] = $dept_object->department;
    }
    return $deptlist;
}

function get_All_DeptList() {
    $deptlist = [];
    $dept_object = new DB_Public_department();
    $dept_object->orderBy('department');
    $dept_object->find();
    while ($dept_object->fetch()) {
        $deptlist[$dept_object->department_id] = $dept_object->department;
    }
    return $deptlist;
}

function getDeptList($plant_id) {
    $obj = new DB_Public_department();
    if (!empty($plant_id)) {
        $obj->whereAdd("plant_id='$plant_id'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $dept_list[] = array(
            'department_id' => $obj->department_id,
            'plant_name' => getPlantName($obj->plant_id),
            'plant_id' => $obj->plant_id,
            'department' => $obj->department,
            'department_code' => $obj->department_code,
            'full_name' => $obj->full_name,
            'created_by_id' => $obj->creator,
            'created_by' => getFullName($obj->creator),
            'created_time' => $obj->created_time,
            "drop_down_value" => "$obj->plant_id-$obj->department_id",
            "drop_down_option" => getPlantShortName($obj->plant_id) . " - [" . $obj->department . "]"
        );
        $count++;
    }
    return $dept_list;
}

function get_dept_list($plant_id) {
    $obj = new DB_Public_department();
    if (!empty($plant_id)) {
        $obj->whereAdd("plant_id='$plant_id'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $dept_list[] = array(
            'department_id' => $obj->department_id,
            'plant_name' => getPlantName($obj->plant_id),
            'plant_id' => $obj->plant_id,
            'department' => $obj->department,
            'department_code' => $obj->department_code,
            'full_name' => $obj->full_name,
            'created_by_id' => $obj->creator,
            'created_by' => getFullName($obj->creator),
            'created_time' => $obj->created_time,
            "drop_down_value" => $obj->department_id,
            "drop_down_option" => getPlantShortName($obj->plant_id) . " - [" . $obj->department . "]"
        );
        $count++;
    }
    return $dept_list;
}

function get_All_OrgList() {
    $orglist = [];
    $org_object = new DB_Public_organization();
    $org_object->orderBy('org_name');
    $org_object->find();
    while ($org_object->fetch()) {
        $orglist[$org_object->org_id] = $org_object->org_name;
    }
    return $orglist;
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

/**
 * This function returns Designation name
 * @param string $designation_id 
 * @return string, designation_name
 */
function getDesignation($designation_id) {
    $usr = new DB_Public_designation;
    $usr->get("designation_id", $designation_id);
    return $usr->designation_name;
}

function getDesignationByUserId($user_id) {
    $usr = new DB_Public_users();
    $usr->get("user_id", $user_id);
    $user_designation = getDesignation($usr->designation_id);
    return $user_designation;
}

function getDesignationIdByUserId($user_id) {
    $usr = new DB_Public_users();
    $usr->get("user_id", $user_id);
    return $usr->designation_id;
}

/**
 * This function returns Organization Name
 * @param string $org_id 
 * @return string, org_name
 */
function getActiveOrganizationName() {
    $org = new DB_Public_organization;
    $org->get("is_active", 'yes');
    return $org->org_name;
}

function getOrganization($org_id) {
    $org = new DB_Public_organization;
    $org->get("org_id", $org_id);
    return $org->org_name;
}

function getUserOrganizationId($user_id) {
    $usr = new DB_Public_users();
    $usr->get("user_id", $user_id);
    return $usr->org_id;
}

function getActiveOrganizationObj() {
    $org_obj = new DB_Public_organization();
    $org_obj->find();
    if ($org_obj->fetch()) {
        return $org_obj;
    }
}

function getWorkflowActionList() {
    $workflow_action_obj = new DB_Public_lm_workflow_actions();
    $workflow_action_obj->orderBy('lm_workflow_action_name');
    $workflow_action_obj->find();
    while ($workflow_action_obj->fetch()) {
        $action_list[] = array("action" => $workflow_action_obj->lm_workflow_action_name, 'action_id' => $workflow_action_obj->lm_workflow_action_id);
    }
    return $action_list;
}

function getManagementActionList() {
    $action_obj = new DB_Public_lm_doc_management_actions();
    //$action_obj->orderBy('workflow_action_id');
    $action_obj->find();
    while ($action_obj->fetch()) {
        $action_list[] = array("action" => getWorkflowAction($action_obj->workflow_action_id), 'lm_doc_id' => $action_obj->lm_doc_id);
    }
    asort($action_list);
    return $action_list;
}

function getManagementActionByLmDocId($lm_doc_id) {
    $action_obj = new DB_Public_lm_doc_management_actions();
    $action_obj->whereAdd("lm_doc_id='$lm_doc_id'");
    if ($action_obj->find()) {
        while ($action_obj->fetch()) {
            $action_user_list = get_management_users($lm_doc_id, getWorkflowAction($action_obj->workflow_action_id));
            $action_list[] = array("action" => getWorkflowAction($action_obj->workflow_action_id), 'action_id' => $action_obj->workflow_action_id, 'lm_doc_id' => $action_obj->lm_doc_id, 'action_user_list' => $action_user_list);
        }
        asort($action_list);
        return $action_list;
    }
    return NULL;
}

function getLmDocWorkflowActionUserList() {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->find();
    $count = 1;
    while ($lm_doc_obj->fetch()) {
        $workflow_user_array = $workflow_user_array[] = getManagementActionByLmDocId($lm_doc_obj->object_id);
        $action_user_list[] = array('lm_doc_id' => $lm_doc_obj->object_id, 'doc_name' => $lm_doc_obj->doc_name, 'short_name' => $lm_doc_obj->short_name, 'workflow_user_array' => $workflow_user_array, 'count' => $count);
        $count++;
    }
    return $action_user_list;
}

function getWorkflowAction($action_id) {
    $workflow_action_obj = new DB_Public_lm_workflow_actions();
    $workflow_action_obj->get("lm_workflow_action_id", $action_id);
    return $workflow_action_obj->lm_workflow_action_name;
}

function getLmDocName($object_id) {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->get("object_id", $object_id);
    return $lm_doc_obj->doc_name;
}

function getLmDocShortName($object_id) {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->get("object_id", $object_id);
    return $lm_doc_obj->short_name;
}

function getLmDocCode($object_id) {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->get("object_id", $object_id);
    return $lm_doc_obj->doc_code;
}

function getLmDocObjectIdByDocCode($doc_code) {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->get("doc_code", $doc_code);
    return $lm_doc_obj->object_id;
}

function getLmDocIdByShortName($short_name) {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->get("short_name", $short_name);
    return $lm_doc_obj->object_id;
}

function getLmDocList() {
    $obj = new DB_Public_lm_doc_list();
    $obj->orderBy('short_name');
    $obj->find();
    while ($obj->fetch()) {
        $list[] = array(
            'object_id' => $obj->object_id,
            'ukey' => $obj->u_key,
            'short_name' => $obj->short_name,
            'doc_name' => $obj->doc_name,
            'doc_code' => $obj->doc_code,
            'is_enabled' => $obj->is_enabled,
            'order' => $obj->order1
        );
    }
    return $list;
}

function getLmDocListByGroup($docGroup) {
    $obj = new DB_Public_lm_doc_list();
    $obj->whereAdd("doc_group='$docGroup'");
    $obj->whereAdd("is_enabled='yes'");
    $obj->orderBy('short_name');
    $obj->find();
    while ($obj->fetch()) {
        $list[] = array(
            'objectId' => $obj->object_id,
            'ukey' => $obj->u_key,
            'shortName' => $obj->short_name,
            'docName' => $obj->doc_name,
            'docCode' => $obj->doc_code,
            'docGroup' => $obj->doc_group,
            'isEnabled' => $obj->is_enabled,
            'order' => $obj->order1
        );
    }
    return $list;
}


/* **************** Start of Dashboard  ***************** */

function getQmsModules(){
    global $db; //Database connected    
    $query = "SELECT lm_doc_id, module FROM qms_dashboard_view GROUP BY module,lm_doc_id ORDER BY module ASC";
    $result = $db->query($query);
        
    $temp = [];
    while ($row = $result->fetchRow()) {
        $temp[] = $row;
    }    
    $modules = [];
    foreach($temp as $module){
        $modules[] = ['lm_doc_id' => $module[0], 'module' => $module[1]];
      }
    return ($modules);
}

function getDmsModules(){
    global $db; //Database connected    
    $query = "SELECT lm_doc_id, module FROM dms_dashboard_view GROUP BY module,lm_doc_id ORDER BY module ASC";
    $result = $db->query($query);
        
    $temp = [];
    while ($row = $result->fetchRow()) {
        $temp[] = $row;
    }    
    $modules = [];
    foreach($temp as $module){
        $modules[] = ['lm_doc_id' => $module[0], 'module' => $module[1]];
      }
    return ($modules);
}
function getLmDocGroupById($docGroupIds) {
    foreach ($docGroupIds as $docGroupId) {
        $obj = new DB_Public_lm_doc_group();
        $obj->get("id", $docGroupId);
        $groups[] = [
            'id' => $obj->id,
            'group' => $obj->group
        ];
    }
    return $groups; 
}

function getDocListByDocGroupId($docGroupId = null) {
    $list = [];
    $obj = new DB_Public_lm_doc_list();
    $obj->whereAdd("is_enabled='yes'");
    if (isset($docGroupId)) {
        $obj->whereAdd("doc_group='$docGroupId'");
    }
    $obj->find();
    while ($obj->fetch()) {
        $list[] = array(
            'drop_down_value' => $obj->short_name,
            'drop_down_option' => $obj->short_name,
        );
    }
    return $list;
}


/**
 * Summary of getStatusByDocId
 * @param mixed $doc_short_name
 * @param mixed $status_type
 * @return array{drop_down_option: mixed, drop_down_value: mixed[]}
 */
function getStatusByDocId($docGroup,$docName ,$status_type) {
    global $db;

    $viewName = strtolower($docGroup) .'_'. strtolower($docName) . '_details_view';
    $query = 'SELECT DISTINCT "' . $status_type . '" FROM "public"."' . $viewName . '"';
    $result = $db->query($query);

    $unique_statuses = [];
    while ($row = $result->fetchRow()) {
        $unique_statuses[] = [
            'drop_down_value' => $row[0],
            'drop_down_option' => $row[0],
        ];
    } 
    return $unique_statuses;
}

/**
 * Summary of dashboardFilterData
 * @param mixed $json_data
 * @param mixed $doc_short_name
 */
function dashboardFilterData($json_data,$docGroup,$docName){
    
    extract(get_object_vars(json_decode($json_data)));

    $plant_id = $plant_id ?:  '%';
    $dept_id = $dept_id ?:  '%';
    $user_id = $user_id ?:  '%';
    $start_date = $start_date ?: date('Y', strtotime('-30 years'));
    $end_date = $end_date ?:  date('Y');
    $wf_status = $wf_status ?:  '%';
    $status = $status ?:  '%';
    $published_status = $published_status ?:  '%';
    $module = "dash";
    $minYear = min($start_date,$end_date);
    $maxYear = max($start_date,$end_date);
    $queryName = strtolower($docGroup) .'_'. strtolower($docName) . '_details_view';
    
    if($docName == 'SOP' ){
        $arguments = [$plant_id,$dept_id,$user_id,$minYear,$maxYear,$published_status];
    } else {
        $arguments = [$plant_id,$dept_id,$user_id,$minYear,$maxYear,$status,$wf_status];
    }
    $functionName = 'get' . ucfirst($docGroup) . ucfirst($docName) . 'FilterData';

    if (function_exists($functionName)) {
        return call_user_func_array($functionName, array($module,$queryName,$arguments));
    } else {
        echo "Function $functionName does not exist.";
        return null;
    }

}


/** ************** SOP MODULE START ***************** */

function getDmsSopFilterData($module, $query_name, $arguments){
    global $db;
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query); 
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $sop_list[] = array(
                'S._No.' => $count,
                'SOP_No' => "<a href=" . "index.php?module=sop&action=view_sop&object_id=$row[0] target='_blank'" . "><font color=blue>" . $row[2] . "</font></a>",
                'SOP_Type' => $row[1],
                'SOP_Name' => $row[3],
                'Revision' => $row[4],
                'Supersedes' => $row[5],
                'Effective_Date' => $row[6],
                'Expiry_Date' => $row[7],
                'Is_Latest_Revision' => $row[8],
                'Published_Status' => $row[9]
            );
        }
        return $sop_list;
    }
}

/** ********** SOP MODULE END **************************** */

/** ********** DEVIATION MODULE START ******************** */

/**
 * Summary of getDmsFilterData
 * @param mixed $module
 * @param mixed $query_name
 * @param mixed $arguments
 * @return array{approval_status: mixed, classification_name: mixed, close_out_date: mixed, completed_date: mixed, created_by_name: mixed, date_of_discovery: int|string|null, date_of_occurrence: int|string|null, dm_department_name: mixed, doc_link: string, plant_name: mixed, reporting_date: int|string|null, status: mixed, target_date: mixed, wf_status: mixed[]|null}
 */
function getQmsDmsFilterData($module,$query_name,$arguments){

    global $db;
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $dms_list[] = array(
                'S_NO.' => $count,
                'Deviation_No' => get_qms_doc_no("dms", $row[13])["doc_link"],
                'Company_Name' => $row[11],
                'Department' => $row[0],
                'Initiator' => $row[7],
                'Classification' => $row[3],
                'Date_Of_Occurrence' => display_date_format($row[1]),
                'Date_Of_Discovery' => display_date_format($row[2]),
                'Reporting_Date' => display_date_format($row[9]),
                'Close-out_Date' => display_hypen_if_null(display_datetime_format($row[12])),
                'Approval_Status' => $row[4],
                'Workflow_Status' => $row[6],
                'Status' => $row[5],
            );
        }
        return $dms_list;
    }
    return [];
}

/* ****************** DEVIATION MODULE END ***************************************** */
/* ****************** VENDOR MANAGEMENT SYSTEM(VMS) MODULE START ******************* */

/**
 * Summary of getVmsFilterData
 * @param mixed $data
 */
function getQmsVmsFilterData($module,$query_name,$arguments){
    global $db;

    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $vms_list[] = array(
                'S.No' => $count,
                'Audit_Tracking_No.' => get_qms_doc_no("vms", $row[10])["doc_link"],
                'Organization_Name' => $row[0],
                'Plant_Name' => $row[1],
                'Vendor_Approval_Status' => $row[8],
                'Score' => display_hypen_if_null($row[9]),
                'Initiator' => $row[7],
                'Company_Name' => $row[6],
                'Department' => $row[7],
                'Approval_Status' => display_hypen_if_null($row[2]),
                'Workflow_Status' => $row[4],
                'Status' => $row[3],
            );
        }
        return $vms_list;
    }
    return null;
}



/** ************** VENDOR MANAGEMENT SYSTEM(VMS) MODULE END ****************** */
/** ************** CHANGE CONTROL MODULE STAR ********************************* */

/**
 * Summary of getCcmFilterData
 * @param mixed $data
 */
function getQmsCcmFilterData($module,$query_name,$arguments){
    global $db;
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $ccm_list[] = array(
                'S._No' => $count,
                'CC_No' => get_qms_doc_no("ccm",$row[10] )["doc_link"],
                'Company_Name' => $row[6],
                'Department' => $row[0],
                'Initiator' => $row[4],
                'Classification' => $row[1],
                'Target_Date' => display_hypen_if_null(display_date_format($row[5])),
                'Closed-out_Date' => display_hypen_if_null(display_date_format($row[7])),
                'Approval_Status' => $row[2],
                'Workflow_Status' => $row[8],
                'Status' => $row[3],
            ); 
        }
        return $ccm_list;
    }
    return null;
}

/* ********************** CHANGE CONTROL MODULE START ********************** */

/* ********************** AUDIT MANAGEMENT SYSTEM(AMS) MODULE START ******** */

/**
 * Summary of getAmsFilterData
 * @param mixed $data
 */
function getQmsAmsFilterData($module, $query_name, $arguments){
    global $db;
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $ams_sch_list[] = array(
                'S._No' => $count,
                'Audit_No.' => get_qms_doc_no("ams", $row[10])["doc_link"],
                'Plant_Name' => $row[4],
                'Department' => $row[3],
                'Initiator' => $row[2],
                'Type' => $row[0],
                'Sub_Type' =>$row[1],
                'Audit_Date_(From)' => display_date_format($row[6]),
                'Audit_Date_(To)' => display_date_format($row[7]),
                'Audit_Lead' => display_hypen_if_null($row[9]),
                'Status' => $row[5],
                'Workflow_Status' => $row[8],
            );
        }
        return $ams_sch_list;
    }
    return null;
}

/* ********************* AUDIT MANAGEMENT SYSTEM(AMS) MODULE END ******************** */

/* ********************* CAPA MODULE START ****************************************** */


/**
 * Summary of getCapaFilterData
 * @param mixed $data
 */
function getQmsCapaFilterData($module, $query_name, $arguments){
    global $db;
    $query = get_query($module, $query_name, $arguments);
    $query = str_replace("*", "%", $query);
    $query = str_replace("\\", "", $query);
    $result = $db->query($query);
    $total_records = $result->numRows();
    if($total_records > 0){
        $count = 0;
        while ($row = $result->fetchRow()) {
            $count = $count+1;
            $capa_list[] = array(
                'S._No' => $count,
                'CAPA_No' => get_qms_doc_no("capa", $row[9])["doc_link"],
                'Company_Name' => $row[6],
                'Department' => $row[0],
                'Created_By' => $row[4],
                'Target_Date' => display_hypen_if_null(display_date_format($row[5])),
                'Close-out_Date' => display_hypen_if_null(display_date_format($row[7])),
                'Completed_Date' => display_hypen_if_null($row[8]),
                'Approval_Status' => $row[1],
                'Status' => $row[2],
            );
        }
        return $capa_list;
    }
    return null;
}

/** ********** CAPA MODULE END ********************* */
/** **************** End of Dashboard  ***************** */

function getLmManagementAuthUserList($lm_doc_id = null) {
    $lm_mgmt_auth_obj = new DB_Public_lm_doc_management_auth();
    if (!empty($lm_doc_id)) {
        $lm_mgmt_auth_obj->whereAdd("lm_doc_id='$lm_doc_id'");
    }
    $lm_mgmt_auth_obj->find();
    while ($lm_mgmt_auth_obj->fetch()) {
        $mgmt_auth_user_list[] = array(
            'lm_doc_id' => $lm_mgmt_auth_obj->lm_doc_id,
            'doc_name' => getLmDocName($lm_mgmt_auth_obj->lm_doc_id),
            'doc_short_name' => getLmDocShortName($lm_mgmt_auth_obj->lm_doc_id),
            'user_id' => $lm_mgmt_auth_obj->user_id,
            'user_name' => getFullName($lm_mgmt_auth_obj->user_id),
            'action' => $lm_mgmt_auth_obj->action
        );
    }
    return $mgmt_auth_user_list;
}

function getLmDocManagementAuthUserList() {
    $lm_doc_obj = new DB_Public_lm_doc_list();
    $lm_doc_obj->find();
    while ($lm_doc_obj->fetch()) {
        $lm_doc_mgmt_action_obj = new DB_Public_lm_doc_management_actions();
        $lm_doc_mgmt_action_obj->whereAdd("lm_doc_id='$lm_doc_obj->object_id'");
        $lm_doc_mgmt_action_obj->find();
        while ($lm_doc_mgmt_action_obj->fetch()) {
            $mgmt_auth_user_list[] = array(
                'lm_doc_id' => $lm_doc_obj->object_id,
                'doc_name' => $lm_doc_obj->doc_name,
                'action_id' => $lm_doc_mgmt_action_obj->workflow_action_id,
                'action' => getWorkflowAction($lm_doc_mgmt_action_obj->workflow_action_id),
            );
        }
    }
    return $mgmt_auth_user_list;
}

function get_online_users() {
    $user_online_obj = new DB_Public_user_session();
    $user_online_obj->whereAdd("logged_in='TRUE'");
    if ($user_online_obj->find()) {
        while ($user_online_obj->fetch()) {
            $usrer_session_obj = new UserSession();
            $now = time();
            $idle_time = $now - strtotime($user_online_obj->last_visited_time);
            $full_name = getFullName($user_online_obj->user_id);
            $dept_name = getDeptName($user_online_obj->user_id);
            $usr_image = get_user_image($user_online_obj->user_id);
            if ($idle_time < $usrer_session_obj->get_session_max_lifetime()) {
                $onlinelist[] = array('full_name' => $full_name, 'dept' => $dept_name, "user_image" => $usr_image);
            }
        }
        return $onlinelist;
    } else {
        return "";
    }
}

function get_user_image($user_id) {
    $user_image_obj = new DB_Public_user_profile_file();
    $user_image_obj->get('user_id', $user_id);
    if (isset($user_image_obj->name)) {
        $user_image = IMAGE_MEDIUM_DIR . $user_image_obj->name;
        return $user_image;
    } else {
        $user_image = DEFAULT_USER_IMAGE;
        return $user_image;
    }
}

/**
 * This function returns Object FullName
 * @param string $object_id
 * @return string, full_name
 */
function getObjectName($object_id) {
    $obj = new DB_Public_business_object;
    $obj->get("object_id", $object_id);
    return $obj->full_name;
}

function getPdfObjectName($object_id) {
    $obj = new DB_Public_lm_sop_print_copy();
    $obj->get("object_id", $object_id);
    return $obj->copy_type;
}

/**
 * This function returns Object FullName
 * @param string $object_id
 * @return string, full_name
 */
function getBussObjectName($object_id) {
    $obj = new DB_Public_business_object;
    $obj->get("object_id", $object_id);
    return $obj->object_name;
}

/**
 * This function returns Operation Name
 * @param string $operation_id
 * @return string, operation_name
 */
function getOperationName($operation_id) {
    $obj = new DB_Public_operation;
    $obj->get("operation_id", $operation_id);
    return $obj->operation_name;
}

function getPdfOperationName($operation_id) {
    $obj = new DB_Public_pdf_operation;
    $obj->get("operation_id", $operation_id);
    return $obj->operation_name;
}

function getAccessPermissionName($object_id) {
    $obj = new DB_Public_access_permission_object_list();
    $obj->get("object_id", $object_id);
    return $obj->name;
}

function getAdminUserList() {
    $users_obj = new DB_Public_users();
    $users_obj->find();
    $count = 1;
    while ($users_obj->fetch()) {
        if (check_access($users_obj->user_name, 'admin_module', 'yes')) {
            $user_list[] = array(
                "user_id" => $users_obj->user_id,
                'user_name' => $users_obj->user_name,
                'full_name' => $users_obj->full_name,
                'emp_id' => $users_obj->emp_id,
                'emp_dept_id' => $users_obj->department_id,
                "department" => getDepartment($users_obj->department_id),
                'emp_desi_id' => $users_obj->designation_id,
                'designation' => getDesignation($users_obj->designation_id),
                "emp_org_id" => $users_obj->org_id,
                'organization' => getOrganization($users_obj->org_id),
                'plant_short_name' => getPlantShortName($users_obj->plant_id),
                'email' => $users_obj->email
            );
        }
    }
    return $user_list;
}

function is_account_active($user_id) {
    $usr = new DB_Public_users;
    $usr->get("user_id", $user_id);
    if ($usr->is_active == "yes") {
        return TRUE;
    }
    return FALSE;
}

/**
 * This function returns Business Object Id
 * @param string $business_object
 * @return string,object_id
 */
function getBusinessObjId($business_object) {
    $buss_object = new DB_Public_business_object();
    $buss_object->get("object_name", $business_object);
    return $buss_object->object_id;
}

/**
 * This function returns  Sub Business Object Id
 * @param string $sub_business
 * @return string,sub_object_id
 */
function getSubBusinessObjId($sub_business) {
    $sub = new DB_Public_sub_business_object();
    $sub->get('sub_object_name', $sub_business);
    return $sub->sub_object_id;
}

function getBusinessObjectList() {
    $bus_obj = new DB_Public_business_object();
    $bus_obj->orderBy('object_name');
    $bus_obj->find();
    while ($bus_obj->fetch()) {
        $buss_object_list[] = array("object_id" => $bus_obj->object_id, 'object_name' => $bus_obj->object_name, 'full_name' => $bus_obj->full_name);
    }
    return $buss_object_list;
}

function getSubBusinessObjName($sub_object_id) {
    $sub = new DB_Public_sub_business_object();
    $sub->get('sub_object_id', $sub_object_id);
    return $sub->sub_object_name;
}

function getSopType($sop_type_object_id) {
    $sop_type_obj = new DB_Public_lm_sop_type();
    $sop_type_obj->get('object_id', $sop_type_object_id);
    return $sop_type_obj->type;
}

function get_sop_annexure_format_no($object_id) {
    $format_obj = new DB_Public_lm_formatno_list();
    $format_obj->get('object_id', $object_id);
    return $format_obj->format_no;
}

function get_sop_creation_reason($object_id) {
    $reason_obj = new DB_Public_lm_sop_creation_reason_list();
    $reason_obj->get('object_id', $object_id);
    return $reason_obj->reason;
}

function get_sop_expiry_year() {
    $expiry_obj = new DB_Public_lm_sop_expiry_year();
    $expiry_obj->find();
    if ($expiry_obj->fetch()) {
        return $expiry_obj->no_of_year;
    }
}

function get_sop_extend_days() {
    $extend_obj = new DB_Public_lm_sop_extend_days();
    $extend_obj->find();
    if ($extend_obj->fetch()) {
        return $extend_obj->no_of_days;
    }
}

function get_reminder_mail_days($reminder_mail_for) {
    $reminder_mail_obj = new DB_Public_reminder_mail_config();
    $reminder_mail_obj->get('reminder_mail_for', $reminder_mail_for);
    return $reminder_mail_obj->no_of_days;
}

function get_modified_date_time_format($date) {
    list($year, $month, $day, $h, $i, $s) = sscanf($date, '%4s-%2s-%2s %2s:%2s:%2s');
    $modified_format = date('d/m/Y H:i:s', mktime($h, $i, $s, $month, $day, $year));
    return $modified_format;
}

function get_modified_rdate_rtime_rformat($date) {
    list($year, $month, $day, $h, $i, $s) = sscanf($date, '%4s-%2s-%2s %2s:%2s:%2s');
    $modified_format = date('Y/m/d H:i:s', mktime($h, $i, $s, $month, $year, $day));
    return $modified_format;
}

function get_modified_date_format($date) {
    $modified_format = str_replace('-', '/', $date);
    $modified_format = date('d/m/Y', strtotime($modified_format));
    return $modified_format;
}

/** Date Format Conversion. $input_format : 'Y-m-d','d-m-Y','Y/m/d','d/m/Y' */
function getModifiedDateTimeFormat($input_date, $date_format) {
    if (!empty($input_date)) {
        $change_format = str_replace('/', '-', $input_date);
        switch ($date_format) {
            case ('f1'):
                $modified_date_format = date("Y-m-d", strtotime($change_format));               //  2019-02-09
                break;
            case ('f2'):
                $modified_date_format = date("Y-m-d G:i:s", strtotime($change_format));         //  2019-02-09 1:45:23
                break;
            case ('f3'):
                $modified_date_format = date("Y-m-d G:i:s A", strtotime($change_format));       //  2019-02-09 1:45:23 AM
                break;
            case ('f4'):
                $modified_date_format = date("Y-m-d H:i:s", strtotime($change_format));         //  2019-02-09 01:45:23 AM
                break;
            case ('f5'):
                $modified_date_format = date("Y-m-d H:i:s A", strtotime($change_format));       //  2019-02-09 01:45:23 AM 
                break;
            case ('f6'):
                $modified_date_format = date("d-m-Y", strtotime($change_format));               // 09-02-2019
                break;
            case ('f7'):
                $modified_date_format = date("d-m-Y G:i:s", strtotime($change_format));         // 09-02-2019 8:12:12
                break;
            case ('f8'):
                $modified_date_format = date("d-m-Y G:i:s A", strtotime($change_format));       // 09-02-2019 8:12:12 AM
                break;
            case ('f9'):
                $modified_date_format = date("d-m-Y H:i:s", strtotime($change_format));         // 09-02-2019 08:12:12
                break;
            case ('f10'):
                $modified_date_format = date("d-m-Y H:i:s A", strtotime($change_format));       // 09-02-2019 08:12:12 AM
                break;
            case ('f11'):
                $modified_date_format = date("Y/m/d", strtotime($change_format));               // 2019/02/09
                break;
            case ('f12'):
                $modified_date_format = date("Y/m/d G:i:s", strtotime($change_format));         // 2019/02/09 8:12:12
                break;
            case ('f13'):
                $modified_date_format = date("Y/m/d G:i:s A", strtotime($change_format));       // 2019/02/09 8:12:12 AM
                break;
            case ('f14'):
                $modified_date_format = date("Y/m/d H:i:s", strtotime($change_format));         // 2019/02/09 08:12:12    
                break;
            case ('f15'):
                $modified_date_format = date("Y/m/d H:i:s A", strtotime($change_format));       // 2019/02/09 08:12:12 AM
                break;
            case ('f16'):
                $modified_date_format = date("d/m/Y", strtotime($change_format));               // 09/02/2019                     
                break;
            case ('f17'):
                $modified_date_format = date("d/m/Y G:i:s", strtotime($change_format));         // 09/02/2019 8:12:12      
                break;
            case ('f18'):
                $modified_date_format = date("d/m/Y G:i:s A", strtotime($change_format));       // 09/02/2019 8:12:12 AM   
                break;
            case ('f19'):
                $modified_date_format = date("d/m/Y H:i:s A", strtotime($change_format));       // 09/02/2019 08:12:12 AM   
                break;
            case ('f20'):
                $modified_date_format = date("Y m d", strtotime($change_format));               // 2019 02 09
                break;
            case ('f21'):
                $modified_date_format = date("Y m d G:i:s", strtotime($change_format));         // 2019/02/09 8:12:12
                break;
            case ('f22'):
                $modified_date_format = date("Y m d G:i:s A", strtotime($change_format));       // 2019 02 09 8:12:12 AM
                break;
            case ('f23'):
                $modified_date_format = date("Y m d H:i:s", strtotime($change_format));         // 2019 02 09 08:12:12    
                break;
            case ('f24'):
                $modified_date_format = date("Y m d H:i:s A", strtotime($change_format));       // 2019 02 09 08:12:12 AM
                break;
            case ('f25'):
                $modified_date_format = date("d m Y", strtotime($change_format));               // 09 02 2019                     
                break;
            case ('f26'):
                $modified_date_format = date("d m Y G:i:s", strtotime($change_format));         // 09 02 2019 8:12:12      
                break;
            case ('f27'):
                $modified_date_format = date("d m Y G:i:s A", strtotime($change_format));       // 09 02 2019 8:12:12 AM   
                break;
            case ('f28'):
                $modified_date_format = date("d m Y H:i:s", strtotime($change_format));         // 09 02 2019 08:12:12      
                break;
            case ('f29'):
                $modified_date_format = date("d m Y H:i:s A", strtotime($change_format));       // 09 02 2019 08:12:12 AM   
                break;
            case ('f30'):
                $modified_date_format = date("Y-F-d", strtotime($change_format));               // 2019-Feburary-09       
                break;
            case ('f31'):
                $modified_date_format = date("Y-M-d", strtotime($change_format));               // 2019-Feb-09
                break;
            case ('f32'):
                $modified_date_format = date("Y-F-d G:i:s", strtotime($change_format));         // 2019-Feburary-09 1:45:23
                break;
            case ('f33'):
                $modified_date_format = date("Y-M-d G:i:s", strtotime($change_format));         // 2019-Feb-09 1:45:23       
                break;
            case ('f34'):
                $modified_date_format = date("Y-F-d G:i:s A", strtotime($change_format));       //  2019-Feburary-09 1:45:23 AM 
                break;
            case ('f35'):
                $modified_date_format = date("Y-M-d G:i:s A", strtotime($change_format));       //  2019-Feb-09 1:45:23 AM
                break;
            case ('f36'):
                $modified_date_format = date("Y-F-d H:i:s", strtotime($change_format));         //  2019-Feburary-09 01:45:23
                break;
            case ('f37'):
                $modified_date_format = date("Y-M-d H:i:s", strtotime($change_format));         //  2019-Feb-09 01:45:23
                break;
            case ('f38'):
                $modified_date_format = date("Y-F-d H:i:s A", strtotime($change_format));       //  2019-Feburary-09 01:45:23 AM   
                break;
            case ('f39'):
                $modified_date_format = date("Y-M-d H:i:s A", strtotime($change_format));       //  2019-Feb-09 01:45:23 AM 
                break;
            case ('f40'):
                $modified_date_format = date("Y-F-d h:i:s A", strtotime($change_format));       //  2019-Feburary-09 01:45:23 PM  12 hours
                break;
            case ('f41'):
                $modified_date_format = date("Y-M-d h:i:s A", strtotime($change_format));       //  2019-Feb-09 01:45:23 PM  12 hours
                break;
            case ('f42'):
                $modified_date_format = date("Y-m-d h:i:s A", strtotime($change_format));       //  2019-02-09 01:45:23 PM  12 hours
                break;
            case ('f43'):
                $modified_date_format = date("d-F-Y", strtotime($change_format));               // 09-February-2019
                break;
            case ('f44'):
                $modified_date_format = date("d-M-Y", strtotime($change_format));               // 09-Feb-2019
                break;
            case ('f45'):
                $modified_date_format = date("dS-F-Y", strtotime($change_format));              // 09th-February-2019
                break;
            case ('f46'):
                $modified_date_format = date("dS-M-Y", strtotime($change_format));              // 09th-Feb-2019
                break;
            case ('f47'):
                $modified_date_format = date("l dS-F-Y", strtotime($change_format));            // Saturday 09th-February-2019
                break;
            case ('f48'):
                $modified_date_format = date("l dS-M-Y", strtotime($change_format));            // Saturday 09th-Feb-2019
                break;
            case ('f49'):
                $modified_date_format = date("d-F-Y G:i:s", strtotime($change_format));         // 09-February-2019 8:12:12
                break;
            case ('f50'):
                $modified_date_format = date("d-M-Y G:i:s", strtotime($change_format));         // 09-Feb-2019 8:12:12
                break;
            case ('f51'):
                $modified_date_format = date("d-F-Y G:i:s A", strtotime($change_format));       // 09-February-2019 8:12:12 AM 
                break;
            case ('f52'):
                $modified_date_format = date("d-M-Y G:i:s A", strtotime($change_format));       // 09-Feb-2019 8:12:12 AM
                break;
            case ('f53'):
                $modified_date_format = date("dS-F-Y G:i:s", strtotime($change_format));        // 09th-February-2019 8:12:12
                break;
            case ('f54'):
                $modified_date_format = date("dS-M-Y G:i:s", strtotime($change_format));        // 09th-Feb-2019 8:12:12
                break;
            case ('f55'):
                $modified_date_format = date("dS-F-Y G:i:s A", strtotime($change_format));      // 09th-February-2019 8:12:12 AM        
                break;
            case ('f56'):
                $modified_date_format = date("dS-M-Y G:i:s A", strtotime($change_format));      // 09th-Feb-2019 8:12:12 AM 
                break;
            case ('f57'):
                $modified_date_format = date("l dS-F-Y G:i:s", strtotime($change_format));      // Saturday 09th-February-2019 8:12:12
                break;
            case ('f58'):
                $modified_date_format = date("l dS-M-Y G:i:s", strtotime($change_format));      // Saturday 09th-Feb-2019 8:12:12    
                break;
            case ('f59'):
                $modified_date_format = date("l dS-m-Y G:i:s", strtotime($change_format));      // Saturday 09th-02-2019 8:12:12
                break;
            case ('f60'):
                $modified_date_format = date("l dS-F-Y G:i:s A", strtotime($change_format));    // Saturday 09th-February-2019 8:12:12 AM   
                break;
            case ('f61'):
                $modified_date_format = date("l dS-M-Y G:i:s A", strtotime($change_format));    // Saturday 09th-Feb-2019 8:12:12 AM    
                break;
            case ('f62'):
                $modified_date_format = date("d-F-Y H:i:s", strtotime($change_format));         // 09-February-2019 08:12:12
                break;
            case ('f63'):
                $modified_date_format = date("d-M-Y H:i:s", strtotime($change_format));         // 09-Feb-2019 08:12:12
                break;
            case ('f64'):
                $modified_date_format = date("d-F-Y H:i:s A", strtotime($change_format));       // 09-February-2019 08:12:12 AM 
                break;
            case ('f65'):
                $modified_date_format = date("d-M-Y H:i:s A", strtotime($change_format));       // 09-Feb-2019 08:12:12 AM
                break;
            case ('f66'):
                $modified_date_format = date("dS-F-Y H:i:s", strtotime($change_format));        // 09th-February-2019 08:12:12
                break;
            case ('f67'):
                $modified_date_format = date("dS-M-Y H:i:s", strtotime($change_format));        // 09th-Feb-2019 08:12:12
                break;
            case ('f68'):
                $modified_date_format = date("dS-F-Y H:i:s A", strtotime($change_format));      // 09th-February-2019 08:12:12 AM
                break;
            case ('f69'):
                $modified_date_format = date("dS-M-Y H:i:s A", strtotime($change_format));      // 09th-Feb-2019 08:12:12 AM
                break;
            case ('f70'):
                $modified_date_format = date("l dS-F-Y H:i:s", strtotime($change_format));      // Saturday 09th-February-2019 08:12:12
                break;
            case ('f71'):
                $modified_date_format = date("l dS-M-Y H:i:s", strtotime($change_format));      // Saturday 09th-Feb-2019 08:12:12     
                break;
            case ('f72'):
                $modified_date_format = date("l dS-F-Y H:i:s A", strtotime($change_format));    // Saturday 09th-February-2019 08:12:12 AM    
                break;
            case ('f73'):
                $modified_date_format = date("l dS-M-Y H:i:s A", strtotime($change_format));    // Saturday 09th-Feb-2019 08:12:12 AM    
                break;
            case ('f74'):
                $modified_date_format = date("d-F-Y h:i:s A", strtotime($change_format));       // 09-February-2019 08:12:12 AM  12 hours
                break;
            case ('f75'):
                $modified_date_format = date("d-M-Y h:i:s A", strtotime($change_format));       // 09-Feb-2019 08:12:12 AM   12 hours
                break;
            case ('f76'):
                $modified_date_format = date("d-m-Y h:i:s A", strtotime($change_format));       // 09-02-2019 08:12:12 AM    12 hours
                break;
            case ('f77'):
                $modified_date_format = date("dS-F-Y h:i:s A", strtotime($change_format));      // 09th-February-2019 08:12:12 AM   12 hours
                break;
            case ('f78'):
                $modified_date_format = date("dS-M-Y h:i:s A", strtotime($change_format));      // 09th-Feb-2019 08:12:12 AM     12 hours
                break;
            case ('f79'):
                $modified_date_format = date("l dS-F-Y h:i:s A", strtotime($change_format));    // Saturday 09th-February-2019 08:12:12 AM   12 hours
                break;
            case ('f80'):
                $modified_date_format = date("l dS-M-Y h:i:s A", strtotime($change_format));    // Saturday 09th-Feb-2019 08:12:12 AM    12 hours
                break;
            case ('f81'):
                $modified_date_format = date("Y/F/d", strtotime($change_format));               // 2019/February/09
                break;
            case ('f82'):
                $modified_date_format = date("Y/M/d", strtotime($change_format));               // 2019/Feb/09
                break;
            case ('f83'):
                $modified_date_format = date("Y/F/d G:i:s", strtotime($change_format));         // 2019/February/09 8:12:12
                break;
            case ('f84'):
                $modified_date_format = date("Y/M/d G:i:s", strtotime($change_format));         // 2019/Feb/09 8:12:12
                break;
            case ('f85'):
                $modified_date_format = date("Y/F/d G:i:s A", strtotime($change_format));       // 2019/February/09 8:12:12 AM
                break;
            case ('f86'):
                $modified_date_format = date("Y/M/d G:i:s A", strtotime($change_format));       // 2019/Feb/09 8:12:12 AM     
                break;
            case ('f87'):
                $modified_date_format = date("Y/F/d H:i:s", strtotime($change_format));         // 2019/February/09 08:12:12
                break;
            case ('f88'):
                $modified_date_format = date("Y/M/d H:i:s", strtotime($change_format));         // 2019/Feb/09 08:12:12      
                break;
            case ('f89'):
                $modified_date_format = date("Y/F/d H:i:s A", strtotime($change_format));       // 2019/February/09 08:12:12 AM
                break;
            case ('f90'):
                $modified_date_format = date("Y/M/d H:i:s A", strtotime($change_format));       // 2019/Feb/09 08:12:12 AM 
                break;
            case ('f91'):
                $modified_date_format = date("Y/F/d h:i:s A", strtotime($change_format));       // 2019/February/09 08:12:12 AM  12 hours    
                break;
            case ('f92'):
                $modified_date_format = date("Y/M/d h:i:s A", strtotime($change_format));       // 2019/Feb/09 08:12:12 AM   12 hours
                break;
            case ('f93'):
                $modified_date_format = date("Y/m/d h:i:s A", strtotime($change_format));       // 2019/02/09 08:12:12 AM    12 hours    
                break;
            case ('f94'):
                $modified_date_format = date("d/F/Y", strtotime($change_format));               // 09/February/2019            
                break;
            case ('f95'):
                $modified_date_format = date("d/M/Y", strtotime($change_format));               // 09/Feb/2019       
                break;
            case ('f96'):
                $modified_date_format = date("dS/F/Y", strtotime($change_format));              // 09th/February/2019   
                break;
            case ('f97'):
                $modified_date_format = date("dS/M/Y", strtotime($change_format));              // 09th/Feb/2019          
                break;
            case ('f98'):
                $modified_date_format = date("l dS/F/Y", strtotime($change_format));            // Saturday 09th/February/2019      
                break;
            case ('f99'):
                $modified_date_format = date("l dS/M/Y", strtotime($change_format));            // Saturday 09th/Feb/2019       
                break;
            case ('f100'):
                $modified_date_format = date("d/F/Y G:i:s", strtotime($change_format));         // 09/February/2019 8:12:12     
                break;
            case ('f101'):
                $modified_date_format = date("d/M/Y G:i:s", strtotime($change_format));         // 09/Feb/2019 8:12:12    
                break;
            case ('f102'):
                $modified_date_format = date("d/F/Y G:i:s A", strtotime($change_format));       // 09/February/2019 8:12:12 AM       
                break;
            case ('f103'):
                $modified_date_format = date("d/M/Y G:i:s A", strtotime($change_format));       // 09/Feb/2019 8:12:12 AM    
                break;
            case ('f104'):
                $modified_date_format = date("dS/F/Y G:i:s", strtotime($change_format));        // 09th/February/2019 8:12:12    
                break;
            case ('f105'):
                $modified_date_format = date("dS/M/Y G:i:s", strtotime($change_format));        // 09th/Feb/2019 8:12:12  
                break;
            case ('f106'):
                $modified_date_format = date("dS/F/Y G:i:s A", strtotime($change_format));      // 09th/February/2019 8:12:12 AM             
                break;
            case ('f107'):
                $modified_date_format = date("dS/M/Y G:i:s A", strtotime($change_format));      // 09th/Feb/2019 8:12:12 AM       
                break;
            case ('f108'):
                $modified_date_format = date("l dS/F/Y G:i:s", strtotime($change_format));      // Saturday 09th/February/2019 8:12:12    
                break;
            case ('f109'):
                $modified_date_format = date("l dS/M/Y G:i:s", strtotime($change_format));      // Saturday 09th/Feb/2019 8:12:12          
                break;
            case ('f110'):
                $modified_date_format = date("l dS/m/Y G:i:s", strtotime($change_format));      // Saturday 09th/02/2019 8:12:12     
                break;
            case ('f111'):
                $modified_date_format = date("l dS/F/Y G:i:s A", strtotime($change_format));    // Saturday 09th/February/2019 8:12:12 AM      
                break;
            case ('f112'):
                $modified_date_format = date("l dS/M/Y G:i:s A", strtotime($change_format));    // Saturday 09th/Feb/2019 8:12:12 AM       
                break;
            case ('f113'):
                $modified_date_format = date("d/F/Y H:i:s", strtotime($change_format));         // 09/February/2019 08:12:12     
                break;
            case ('f114'):
                $modified_date_format = date("d/M/Y H:i:s", strtotime($change_format));         // 09/Feb/2019 08:12:12     
                break;
            case ('f115'):
                $modified_date_format = date("d/F/Y H:i:s A", strtotime($change_format));       // 09/February/2019 08:12:12 AM       
                break;
            case ('f116'):
                $modified_date_format = date("d/M/Y H:i:s A", strtotime($change_format));       // 09/Feb/2019 08:12:12 AM    
                break;
            case ('f117'):
                $modified_date_format = date("dS/F/Y H:i:s", strtotime($change_format));        // 09th/February/2019 08:12:12    
                break;
            case ('f118'):
                $modified_date_format = date("dS/M/Y H:i:s", strtotime($change_format));        // 09th/Feb/2019 08:12:12  
                break;
            case ('f119'):
                $modified_date_format = date("dS/F/Y H:i:s A", strtotime($change_format));      // 09th/February/2019 08:12:12 AM    
                break;
            case ('f120'):
                $modified_date_format = date("dS/M/Y H:i:s A", strtotime($change_format));      // 09th/Feb/2019 08:12:12 AM  
                break;
            case ('f121'):
                $modified_date_format = date("l dS/F/Y H:i:s", strtotime($change_format));      // Saturday 09th/February/2019 08:12:12    
                break;
            case ('f122'):
                $modified_date_format = date("l dS/M/Y H:i:s", strtotime($change_format));      // Saturday 09th/Feb/2019 08:12:12          
                break;
            case ('f123'):
                $modified_date_format = date("l dS/F/Y H:i:s A", strtotime($change_format));    // Saturday 09th/February/2019 08:12:12 AM
                break;
            case ('f124'):
                $modified_date_format = date("l dS/M/Y H:i:s A", strtotime($change_format));    // Saturday 09th/Feb/2019 08:12:12 AM       
                break;
            case ('f125'):
                $modified_date_format = date("d/F/Y h:i:s A", strtotime($change_format));       // 09/February/2019 08:12:12 AM  12 hours
                break;
            case ('f126'):
                $modified_date_format = date("d/M/Y h:i:s A", strtotime($change_format));       // 09/Feb/2019 08:12:12 AM    12 hours
                break;
            case ('f127'):
                $modified_date_format = date("d/m/Y h:i:s A", strtotime($change_format));       // 09/02/2019 08:12:12 AM   12 hours
                break;
            case ('f128'):
                $modified_date_format = date("dS/F/Y h:i:s A", strtotime($change_format));      // 09th/February/2019 08:12:12 AM    12 hours
                break;
            case ('f129'):
                $modified_date_format = date("dS/M/Y h:i:s A", strtotime($change_format));      // 09th/Feb/2019 08:12:12 AM  12 hours
                break;
            case ('f130'):
                $modified_date_format = date("l dS/F/Y h:i:s A", strtotime($change_format));    // Saturday 09th/February/2019 08:12:12 AM   12 hours
                break;
            case ('f131'):
                $modified_date_format = date("l dS/M/Y h:i:s A", strtotime($change_format));    // Saturday 09th/Feb/2019 08:12:12 AM    12 hours
                break;
            case ('f132'):
                $modified_date_format = date("Y F d", strtotime($change_format));               // 2019 February 09
                break;
            case ('f133'):
                $modified_date_format = date("Y M d", strtotime($change_format));               // 2019 Feb 09
                break;
            case ('f134'):
                $modified_date_format = date("Y F d G:i:s", strtotime($change_format));         // 2019 February 09 8:12:12
                break;
            case ('f135'):
                $modified_date_format = date("Y M d G:i:s", strtotime($change_format));         // 2019 Feb 09 8:12:12
                break;
            case ('f136'):
                $modified_date_format = date("Y F d G:i:s A", strtotime($change_format));       // 2019 February 09 8:12:12 AM
                break;
            case ('f137'):
                $modified_date_format = date("Y M d G:i:s A", strtotime($change_format));       // 2019 Feb 09 8:12:12 AM     
                break;
            case ('f138'):
                $modified_date_format = date("Y F d H:i:s", strtotime($change_format));         // 2019 February 09 08:12:12
                break;
            case ('f139'):
                $modified_date_format = date("Y M d H:i:s", strtotime($change_format));         // 2019 Feb 09 08:12:12      
                break;
            case ('f140'):
                $modified_date_format = date("Y F d H:i:s A", strtotime($change_format));       // 2019 February 09 08:12:12 AM
                break;
            case ('f141'):
                $modified_date_format = date("Y M d H:i:s A", strtotime($change_format));       // 2019 Feb 09 08:12:12 AM 
                break;
            case ('f142'):
                $modified_date_format = date("Y F d h:i:s A", strtotime($change_format));       // 2019 February 09 08:12:12 AM  12 hours    
                break;
            case ('f143'):
                $modified_date_format = date("Y M d h:i:s A", strtotime($change_format));       // 2019 Feb 09 08:12:12 AM   12 hours
                break;
            case ('f144'):
                $modified_date_format = date("Y m d h:i:s A", strtotime($change_format));       // 2019 02 09 08:12:12 AM    12 hours    
                break;
            case ('f145'):
                $modified_date_format = date("d F Y", strtotime($change_format));               // 09 February 2019            
                break;
            case ('f146'):
                $modified_date_format = date("d M Y", strtotime($change_format));               // 09 Feb 2019       
                break;
            case ('f147'):
                $modified_date_format = date("dS F Y", strtotime($change_format));              // 09th February 2019   
                break;
            case ('f148'):
                $modified_date_format = date("dS M Y", strtotime($change_format));              // 09th Feb 2019          
                break;
            case ('f149'):
                $modified_date_format = date("l dS F Y", strtotime($change_format));            // Saturday 09th February 2019      
                break;
            case ('f150'):
                $modified_date_format = date("l dS M Y", strtotime($change_format));            // Saturday 09th Feb 2019       
                break;
            case ('f151'):
                $modified_date_format = date("d F Y G:i:s", strtotime($change_format));         // 09 February 2019 8:12:12     
                break;
            case ('f152'):
                $modified_date_format = date("d M Y G:i:s", strtotime($change_format));         // 09 Feb 2019 8:12:12    
                break;
            case ('f153'):
                $modified_date_format = date("d F Y G:i:s A", strtotime($change_format));       // 09 February 2019 8:12:12 AM       
                break;
            case ('f154'):
                $modified_date_format = date("d M Y G:i:s A", strtotime($change_format));       // 09 Feb 2019 8:12:12 AM    
                break;
            case ('f155'):
                $modified_date_format = date("dS F Y G:i:s", strtotime($change_format));        // 09th February 2019 8:12:12    
                break;
            case ('f156'):
                $modified_date_format = date("dS M Y G:i:s", strtotime($change_format));        // 09th Feb 2019 8:12:12  
                break;
            case ('f157'):
                $modified_date_format = date("dS F Y G:i:s A", strtotime($change_format));      // 09th February 2019 8:12:12 AM             
                break;
            case ('f158'):
                $modified_date_format = date("dS M Y G:i:s A", strtotime($change_format));      // 09th Feb 2019 8:12:12 AM       
                break;
            case ('f159'):
                $modified_date_format = date("l dS F Y G:i:s", strtotime($change_format));      // Saturday 09th February 2019 8:12:12    
                break;
            case ('f160'):
                $modified_date_format = date("l dS M Y G:i:s", strtotime($change_format));      // Saturday 09th Feb 2019 8:12:12          
                break;
            case ('f161'):
                $modified_date_format = date("l dS m Y G:i:s", strtotime($change_format));      // Saturday 09th 02 2019 8:12:12     
                break;
            case ('f162'):
                $modified_date_format = date("l dS F Y G:i:s A", strtotime($change_format));    // Saturday 09th February 2019 8:12:12 AM      
                break;
            case ('f163'):
                $modified_date_format = date("l dS M Y G:i:s A", strtotime($change_format));    // Saturday 09th Feb 2019 8:12:12 AM       
                break;
            case ('f164'):
                $modified_date_format = date("d F Y H:i:s", strtotime($change_format));         // 09 February 2019 08:12:12     
                break;
            case ('f165'):
                $modified_date_format = date("d M Y H:i:s", strtotime($change_format));         // 09 Feb 2019 08:12:12     
                break;
            case ('f166'):
                $modified_date_format = date("d F Y H:i:s A", strtotime($change_format));       // 09 February 2019 08:12:12 AM       
                break;
            case ('f167'):
                $modified_date_format = date("d M Y H:i:s A", strtotime($change_format));       // 09 Feb 2019 08:12:12 AM    
                break;
            case ('f168'):
                $modified_date_format = date("dS F Y H:i:s", strtotime($change_format));        // 09th February 2019 08:12:12    
                break;
            case ('f169'):
                $modified_date_format = date("dS M Y H:i:s", strtotime($change_format));        // 09th Feb 2019 08:12:12  
                break;
            case ('f170'):
                $modified_date_format = date("dS F Y H:i:s A", strtotime($change_format));      // 09th February 2019 08:12:12 AM    
                break;
            case ('f171'):
                $modified_date_format = date("dS M Y H:i:s A", strtotime($change_format));      // 09th Feb 2019 08:12:12 AM  
                break;
            case ('f172'):
                $modified_date_format = date("l dS F Y H:i:s", strtotime($change_format));      // Saturday 09th February 2019 08:12:12    
                break;
            case ('f173'):
                $modified_date_format = date("l dS M Y H:i:s", strtotime($change_format));      // Saturday 09th Feb 2019 08:12:12          
                break;
            case ('f174'):
                $modified_date_format = date("l dS F Y H:i:s A", strtotime($change_format));    // Saturday 09th February 2019 08:12:12 AM
                break;
            case ('f175'):
                $modified_date_format = date("l dS M Y H:i:s A", strtotime($change_format));    // Saturday 09th Feb 2019 08:12:12 AM       
                break;
            case ('f176'):
                $modified_date_format = date("d F Y h:i:s A", strtotime($change_format));       // 09 February 2019 08:12:12 AM  12 hours
                break;
            case ('f177'):
                $modified_date_format = date("d M Y h:i:s A", strtotime($change_format));       // 09 Feb 2019 08:12:12 AM    12 hours
                break;
            case ('f178'):
                $modified_date_format = date("d m Y h:i:s A", strtotime($change_format));       // 09 02 2019 08:12:12 AM   12 hours
                break;
            case ('f179'):
                $modified_date_format = date("dS F Y h:i:s A", strtotime($change_format));      // 09th February 2019 08:12:12 AM    12 hours
                break;
            case ('f180'):
                $modified_date_format = date("dS M Y h:i:s A", strtotime($change_format));      // 09th Feb 2019 08:12:12 AM  12 hours
                break;
            case ('f181'):
                $modified_date_format = date("l dS F Y h:i:s A", strtotime($change_format));    // Saturday 09th February 2019 08:12:12 AM   12 hours
                break;
            case ('f182'):
                $modified_date_format = date("l dS M Y h:i:s A", strtotime($change_format));    // Saturday 09th Feb 2019 08:12:12 AM    12 hours
                break;
            case ('f183'):
                $modified_date_format = date("Y", strtotime($change_format));                   // 2018
                break;
            case ('f184'):
                $modified_date_format = date("y", strtotime($change_format));                   // 99 or 03
                break;
            case ('f185'):
                $modified_date_format = date("F", strtotime($change_format));                   // January
                break;
            case ('f186'):
                $modified_date_format = date("M", strtotime($change_format));                   // Jan
                break;
            case ('f187'):
                $modified_date_format = date("m", strtotime($change_format));                   // 01 to 12
                break;
            case ('f188'):
                $modified_date_format = date("d", strtotime($change_format));                   // 01 to 31
                break;
            case ('f189'):
                $modified_date_format = date("D", strtotime($change_format));                   // Mon to Sun
                break;
            case ('f190'):
                $modified_date_format = date("l", strtotime($change_format));                   // Sunday through Saturday
                break;
            case ('f191'):
                $modified_date_format = date("G A", strtotime($change_format));                 // 0 to 23 AM or PM
                break;
            case ('f192'):
                $modified_date_format = date("H A", strtotime($change_format));                 // 00 to 23 AM or PM
                break;
            case ('f193'):
                $modified_date_format = date("h A", strtotime($change_format));                 // 01 to 12  AM or PM
                break;
            case ('f194'):
                $modified_date_format = date("G:i:s", strtotime($change_format));               // 1:12:12   24 hours
                break;
            case ('f195'):
                $modified_date_format = date("H:i:s", strtotime($change_format));               // 01:12:12  24 hours
                break;
            case ('f196'):
                $modified_date_format = date("h:i:s", strtotime($change_format));               // 03:12:12  12 hours
                break;
            case ('f197'):
                $modified_date_format = date("G:i:s A", strtotime($change_format));             // 1:12:12 AM  24 hours 
                break;
            case ('f198'):
                $modified_date_format = date("H:i:s A", strtotime($change_format));             // 01:12:12 AM  24 hours   
                break;
            case ('f199'):
                $modified_date_format = date("h:i:s A", strtotime($change_format));             // 01:12:12 PM  12 hours  
                break;
            case ('f200'):
                $modified_date_format = date("M d, Y", strtotime($change_format));               // May 03, 2021
                break;
            case ('f201'):
                $modified_date_format = date("M - Y", strtotime($change_format));               //Jan - 2024
                break;
            default:
                $modified_date_format = date("d/m/Y H:i:s", strtotime($change_format));   // 09/02/2019 08:12:12
        }
        return $modified_date_format;
    }
    return null;
}

function get_current_password_expiry_days() {
    $expiry_obj = new DB_Public_password_expiry();
    $expiry_obj->find();
    if ($expiry_obj->fetch()) {
        return $expiry_obj->days;
    } else {
        $default_expiry_days = 0;
        return $default_expiry_days;
    }
}

function dateDiffInDays($date1, $date2) {
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);
    /*     * 1 day = 24 hours. 24 * 60 * 60 = 86400 Seconds */
    return abs(round($diff / 86400));
}

function get_user_password_expiry_date($usr_id) {
    $usr = new DB_Public_users();
    $usr->get("user_id", $usr_id);
    return $usr->password_expired_on;
}

function calculate_next_user_password_expiry_date() {
    $current_password_expiry_days = get_current_password_expiry_days();
    if ($current_password_expiry_days == 0) {
        $next_password_expiry_days = 0;
    } else {
        $next_password_expiry_days = date('Y-m-d', strtotime(date('Y-m-d') . $current_password_expiry_days . ' days'));
    }
    return $next_password_expiry_days;
}

function is_user_password_expired($usr_id) {
    $usr_obj = new DB_Public_users();
    $usr_obj->get("user_id", $usr_id);
    if ($usr_obj->password_expired_on == 0 || $usr_obj->password_expired_on == "" || $usr_obj->password_expired_on == null) {
        return false;
    } elseif ($usr_obj->password_expired_on <= date('Y-m-d')) {
        return true;
    } else {
        return false;
    }
}

function check_user_password($password) {
    $usr_id = trim($_SESSION['user_id']);
    $usr_obj = new DB_Public_users();
    $usr_obj->get("user_id", $usr_id);
    if (md5($password) == $usr_obj->password) {
        return TRUE;
    }
    return FALSE;
}

// Generates a strong password of N length containing at least one lower case letter,
// one uppercase letter, one digit, and one special character. The remaining characters
// in the password are chosen at random from those four sets.
//
// The available characters in each set are user friendly - there are no ambiguous
// characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
// makes it much easier for users to manually type or speak their passwords.
//
// Note: the $add_dashes option will increase the length of the password by
// floor(sqrt(N)) characters.
function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
    $sets = array();
    if (strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if (strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';
    $all = '';
    $password = '';
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }
    $all = str_split($all);
    for (
            $i = 0;
            $i < $length - count($sets);
            $i++
    )
        $password .= $all[array_rand($all)];
    $password = str_shuffle($password);
    if (!$add_dashes)
        return $password;
    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}

function convertToBytes($from) {
    $number = substr($from, 0, -2);
    switch (strtoupper(substr($from, -2))) {
        case "KB":
            return $number * 1024;
        case "MB":
            return $number * pow(1024, 2);
        case "GB":
            return $number * pow(1024, 3);
        case "TB":
            return $number * pow(1024, 4);
        case "PB":
            return $number * pow(1024, 5);
        default:
            return $from;
    }
}

function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = array($r, $g, $b);
    //return implode(",", $rgb); // returns the rgb values separated by commas
    return $rgb; // returns an array with the rgb values
}

function get_lm_contact_obj() {
    $lm_contact_obj = new DB_Public_lm_contact();
    $lm_contact_obj->find();
    if ($lm_contact_obj->fetch()) {
        return $lm_contact_obj;
    }
}

function getSignupUserWorkflowPermission($user_id) {
    $access_per_obj = new DB_Public_access_permission_object_list();
    $access_per_obj->orderBy('name');
    $access_per_obj->find();
    while ($access_per_obj->fetch()) {
        $user_signup_per_obj = new DB_Public_user_signup_workflow_permission();
        $user_signup_per_obj->whereAdd("user_id = '$user_id'");
        $user_signup_per_obj->whereAdd("access_per_id = '$access_per_obj->object_id'");
        $user_signup_per_obj->find();
        if ($user_signup_per_obj->fetch()) {
            $is_enabled = 1;
        } else {
            $is_enabled = 0;
        }
        $user_per_list[] = array('access_per_id' => $access_per_obj->object_id, 'access_per_name' => getAccessPermissionName($access_per_obj->object_id), 'is_enabled' => $is_enabled, 'access_per_desc' => $access_per_obj->description);
    }
    return $user_per_list;
}

function getUserWorkflowPermission($user_id) {
    $access_per_obj = new DB_Public_access_permission_object_list();
    $access_per_obj->orderBy('name');
    $access_per_obj->find();
    while ($access_per_obj->fetch()) {
        $user_per_obj = new DB_Public_users_permission();
        $user_per_obj->whereAdd("user_id = '$user_id'");
        $user_per_obj->whereAdd("access_per_id = '$access_per_obj->object_id'");
        $user_per_obj->whereAdd("is_enabled = 'yes'");
        $user_per_obj->find();
        if ($user_per_obj->fetch()) {
            $is_enabled = 1;
        } else {
            $is_enabled = 0;
        }
        $user_per_list[] = array('access_per_id' => $access_per_obj->object_id, 'access_per_name' => getAccessPermissionName($access_per_obj->object_id), 'is_enabled' => $is_enabled);
    }
    return $user_per_list;
}

function getSopPdfOperationList() {
    $pdf_op_obj = new DB_Public_pdf_operation();
    $pdf_op_obj->orderBy('operation_name');
    $pdf_op_obj->find();
    $operationlist = array();
    while ($pdf_op_obj->fetch()) {
        $operationlist[] = array('operation_id' => $pdf_op_obj->operation_id, 'operation_name' => $pdf_op_obj->operation_name);
    }
    return $operationlist;
}

function getUserSopPdfPermission($user_id) {
    $pdf_operation_list = getSopPdfOperationList();
    $sop_print_copy_obj = new DB_Public_lm_sop_print_copy();
    $sop_print_copy_obj->orderBy('copy_type');
    $sop_print_copy_obj->find();
    $sop_pdf_print_copy_objectlist = array();
    while ($sop_print_copy_obj->fetch()) {
        $operation = new DB_Public_pdf_operation();
        $operation->orderBy('operation_name');
        $operation->find();
        while ($operation->fetch()) {
            $pdf_per_obj = new DB_Public_pdf_permission();
            $pdf_per_obj->whereAdd("user_id = '$user_id'");
            $pdf_per_obj->whereAdd("object = '$sop_print_copy_obj->object_id'");
            $pdf_per_obj->whereAdd("operation = '$operation->operation_id'");
            $pdf_per_obj->find();
            if ($pdf_per_obj->fetch()) {
                $val = 1;
            } else {
                $val = 0;
            }
            $sop_pdf_print_copy_objectlist[$sop_print_copy_obj->object_id][$operation->operation_id] = $val;
        }
    }
    return $sop_pdf_print_copy_objectlist;
}

function getSopExamPassMark() {
    $pass_mark_obj = new DB_Public_lm_sop_online_exam_pass_mark();
    $pass_mark_obj->find();
    if ($pass_mark_obj->fetch()) {
        return $pass_mark_obj->pass_mark;
    }
}

function getSopExamAttemptLimit() {
    $attempt_limit_obj = new DB_Public_lm_sop_online_exam_attempt_limit();
    $attempt_limit_obj->find();
    if ($attempt_limit_obj->fetch()) {
        return $attempt_limit_obj->attempt_limit;
    }
}

function getSopMonitoringLimit() {
    $obj = new DB_Public_lm_sop_monitoring_limit();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->max_limit;
    }
}

function getPdfSupportLang() {
    $pdf_lan_obj = new DB_Public_pdf_language();
    $pdf_lan_obj->orderBy('code');
    $pdf_lan_obj->find();
    while ($pdf_lan_obj->fetch()) {
        $langlist[] = array('language' => $pdf_lan_obj->language, 'code' => $pdf_lan_obj->code, 'is_default' => $pdf_lan_obj->is_default);
    }
    return $langlist;
}

function add_dept_doc_view_details($doc_id, $default_dept_id, $dept_view_array, $usr_id, $date_time) {
    if (!empty($doc_id)) {
        $dept_view_array1 = array();
        if (empty($dept_view_array)) {
            array_push($dept_view_array1, $default_dept_id);
            update_doc_dept_permission($doc_id, $dept_view_array1, 'yes', $usr_id, $date_time);
        } else {
            array_push($dept_view_array, $default_dept_id);
            update_doc_dept_permission($doc_id, $dept_view_array, 'yes', $usr_id, $date_time);
        }
    }
    return true;
}

function get_doc_view_dept_details($object_id, $plant_id) {
    //$dept_list = get_All_DeptList();
    $dept_list = getPlantDeptList($plant_id);
    foreach ($dept_list as $key => $val) {
        $is_dept_can_view = check_doc_dept_access($object_id, $val['department_id'], 'yes');
        $can_view_dept_list[] = array("dept_id" => $val['department_id'], "dept" => $val['department'], "is_dept_can_view" => $is_dept_can_view);
    }
    if (!empty($can_view_dept_list)) {
        return $can_view_dept_list;
    } else {
        return $can_view_dept_list;
    }
}

function get_doc_dept_permission($doc_ref_id = null, $dept_id = null, $is_enabled = null) {
    $dept_per_obj = new DB_Public_lm_doc_dept_permission();
    if (!empty($doc_ref_id)) {
        $dept_per_obj->whereAdd("doc_id='$doc_ref_id'");
    }
    if (!empty($dept_id)) {
        $dept_per_obj->whereAdd("department_id='$dept_id'");
    }
    if (!empty($is_enabled)) {
        $dept_per_obj->whereAdd("is_enabled='$is_enabled'");
    }
    if ($dept_per_obj->find()) {
        while ($dept_per_obj->fetch()) {
            $dept_per_list[] = array('doc_ref_id' => $dept_per_obj->doc_id, 'dept_id' => $dept_per_obj->department_id, 'dept_name' => getDepartment($dept_per_obj->department_id), 'is_enabled' => $dept_per_obj->is_enabled);
        }
        return $dept_per_list;
    } else {
        return null;
    }
}

function get_password($user_name) {
    $user_obj = new DB_Public_users();
    $user_obj->get("user_name", $user_name);
    return $user_obj->password;
}

function get_modified_ymd_format($date) {
    $str_modified_format = str_replace('/', '-', $date);
    $modified_format = date('Y-m-d', strtotime($str_modified_format));
    return $modified_format;
}

function clean_filename($name, $start, $end) {
    $rstring = str_replace('', '-', $name);                       // Replace all spaces with hyphen
    $prstring = preg_replace('/[^A-Za-z0-9\_.]/', '', $rstring);
    $final_name = substr($prstring, $start, $end);                // Removes Special Char except underscore and dot
    return $final_name;
}

function get_modified_month_format($date) {
    $in_date = str_replace('-', '/', $date);
    $in_date1 = date('m', strtotime($in_date));
    $dateObj = DateTime::createFromFormat('!m', $in_date1);
    $monthName = $dateObj->format('F');
    return $monthName;
}

function get_date_after_five_days($date) {
    $date = date_create($date);
    date_add($date, date_interval_create_from_date_string("5 days"));
    return date_format($date, 'Y-m-d');
}

function get_date_after_ten_days($date) {
    $date = date_create($date);
    date_add($date, date_interval_create_from_date_string("10 days"));
    return date_format($date, 'Y-m-d');
}

function getUserArray($dept_id) {
    $user_obj = new DB_Public_users();
    $user_obj->whereAdd("department_id= '$dept_id'");
    $user_obj->find();
    while ($user_obj->fetch()) {
        $user_array[] = array(
            'user_id' => $user_obj->user_id,
            'user_name' => $user_obj->user_name,
            'full_name' => $user_obj->full_name,
            'department_id' => $user_obj->department_id,
            'department_name' => getDepartment($user_obj->department_id)
        );
    }
    return $user_array;
}

function get_date_before_four_days($date) {
    $date = date_create($date);
    date_sub($date, date_interval_create_from_date_string("4 days"));
    return date_format($date, "Y-m-d");
}

function dateDiff($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

/**
 * smarty functions used in template pages
 */
function template_getUserName($params, &$smarty) {
    extract($params);
    return getUserName($user_id);
}

function template_getObjectName($params, &$smarty) {
    extract($params);
    return getObjectName($object_id);
}

function template_getPdfObjectName($params, &$smarty) {
    extract($params);
    return getPdfObjectName($object_id);
}

function template_getOperationName($params, &$smarty) {
    extract($params);
    return getOperationName($operation_id);
}

function template_getPdfOperationName($params, &$smarty) {
    extract($params);
    return getPdfOperationName($operation_id);
}

function get_lm_json_value_by_key($required_field) {
    $obj_def = '{
    "definitions": {
        "object_id": {
            "qms": {
                "admin_master_data": {
                    "product": {
                        "object_id": "product_master:",
                        "audit_trail": "at_product_master:"
                    },
                    "material_type": {
                        "object_id": "material_type_master:",
                        "audit_trail": "at_mat_type_master:"
                    },
                    "material_sub_type": {
                        "object_id": "mat_sub_type_master:",
                        "audit_trail": "at_mat_sub_type_master:"
                    },
                    "instrument_equipment_type": {
                        "object_id": "inst_equip_type_master:",
                        "audit_trail": "at_inst_equip_type_master:"
                    },
                    "instrument_equipment_details": {
                        "object_id": "inst_equip_details_master:",
                        "audit_trail": "at_inst_equip_details_master:"
                    },
                    "customer": {
                        "object_id": "customer_master:",
                        "audit_trail": "at_customer_master:"
                    },
                    "market": {
                        "object_id": "market_master:",
                        "audit_trail": "at_market_master:"
                    },
                    "process_stage": {
                        "object_id": "process_stage_master:",
                        "audit_trail": "at_process_stage_master:"
                    },
                    "classification": {
                        "object_id": "classification_master:",
                        "audit_trail": "at_classification_master:"
                    },
                    "unit_of_measurement": {
                        "object_id": "unit_meas_master:",
                        "audit_trail": "at_unit_meas_master:"
                    },
                    "number_seq": {
                        "object_id": "qms_number_seq:"
                    }
                },
                "ccm_master_data": {
                    "ccm_type": {
                        "object_id": "ccm_type_master:",
                        "audit_trail": "at_ccm_type_master:"
                    },
                    "ccm_realted_to": {
                        "object_id": "ccm_rel_to_master:",
                        "audit_trail": "at_ccm_rel_to_master:"
                    },
                    "ccm_sub_related_to": {
                        "object_id": "ccm_sub_rel_to_master:",
                        "audit_trail": "at_ccm_sub_rel_to_master:"
                    },
                    "affected_documents": {
                        "object_id": "ccm_aff_docs_master:",
                        "audit_trail": "at_ccm_aff_docs_master:"
                    },
                    "exam_pass_marks": {
                        "audit_trail": "at_ccm_exam_pass_mark_master:"
                    },
                    "exam_attempt_limit": {
                        "audit_trail": "at_ccm_exam_attempt_limit_master:"
                    },
                    "monitoring_limit": {
                        "audit_trail": "at_ccm_mon_limit_master:"
                    }
                },
                "dms_master_data": {
                    "type": {
                        "object_id": "dms_type_master:"
                    },
                    "related_to": {
                        "object_id": "dms_rel_to_master:",
                        "audit_trail": "at_dms_rel_to_master:"
                    },
                    "sub_related_to": {
                        "object_id": "dms_sub_rel_to_master:",
                        "audit_trail": "at_dms_sub_rel_to_master:"
                    },
                    "target_date_expiry": {
                        "audit_trail": "at_dms_target_date_expiry_master:"
                    },
                    "exam_pass_marks": {
                        "audit_trail": "at_dms_exam_pass_mark_master:"
                    },
                    "exam_attempt_limit": {
                        "audit_trail": "at_dms_exam_attempt_limit_master:"
                    },
                    "monitoring_limit": {
                        "audit_trail": "at_dms_mon_limit_master:"
                    }
                },
                "capa_master_data": {
                    "target_date_expiry": {
                        "audit_trail": "at_capa_target_date_expiry_master:"
                    },
                    "exam_pass_marks": {
                        "audit_trail": "at_capa_exam_pass_mark_master:"
                    },
                    "exam_attempt_limit": {
                        "audit_trail": "at_capa_exam_attempt_limit_master:"
                    },
                    "monitoring_limit": {
                        "audit_trail": "at_capa_mon_limit_master:"
                    }
                },
                "ams_master_data": {
                    "audit_type": {
                        "object_id": "ams_audit_type_master:",
                        "audit_trail": "at_ams_audit_type_master:"
                    },
                    "audit_sub_type": {
                        "object_id": "ams_audit_sub_type_master:",
                        "audit_trail": "at_ams_audit_sub_type_master:"
                    }
                },
                "vms_master_data": {
                    "vendor_type": {
                        "object_id": "vms_vendor_type_master:",
                        "audit_trail": "at_vms_vendor_type_master:"
                    },
                    "agenda_category": {
                        "object_id": "vms_agenda_cat_master:",
                        "audit_trail": "at_vms_agenda_cat_master:"
                    },
                    "agenda_sub_category": {
                        "object_id": "vms_agenda_sub_cat_master:",
                        "audit_trail": "at_vms_agenda_sub_cat_master:"
                    },
                    "vendor_score": {
                        "audit_trail": "at_vms_score_master:"
                    },
                    "aprroval_validity": {
                        "audit_trail": "at_vms_approval_validity_master:"
                    },
                    "reminder_mail": {
                        "audit_trail": "at_vms_reminder_mail_master:"
                    }
                },
                "oos_master_data": {
                    "check_list": {
                        "object_id": "oos_check_list_master:",
                        "audit_trail": "at_oos_check_list_master:"
                    },
                    "test_details": {
                        "object_id": "oos_test_details_master:",
                        "audit_trail": "at_oos_test_details_master:"
                    }                      
                }
            },
            "workflow": {
                "ccm": {
                    "object_id": "ccm_wf_details:",
                    "audit_trail": "at_ccm_wf_details:",
                    "ccm_related_to_details": "ccm_wf_related_to_details:",
                    "review_comments": "ccm_wf_review_comments:",
                    "file_upload": "lm_ccm_doc_file:",
                    "cancel": "ccm_wf_cancel:",
                    "affected_doc": "ccm_affc_doc:",
                    "monitoring": "ccm_wf_monitoring_details:",
                    "monitoring_feedback": "ccm_wf_monitoring_feedback:"
                },
                "dms": {
                    "object_id": "dms_wf_details:",
                    "audit_trail": "at_dms_wf_details:",
                    "dms_related_to_details": "dms_wf_related_to_details:",
                    "repetitive_dms_details": "repetitive_dms_details:",
                    "review_comments": "dms_wf_review_comments:",
                    "file_upload": "lm_dms_doc_file:",
                    "cancel": "dms_wf_cancel:",
                    "investigation": "dms_wf_invest_details:",
                    "monitoring": "dms_wf_monitoring_details:",
                    "monitoring_feedback": "dms_wf_monitoring_feedback:"
                },
                "capa": {
                    "object_id": "capa_wf_details:",
                    "audit_trail": "at_capa_wf_details:",
                    "file_upload": "lm_capa_doc_file:",
                    "cancel": "capa_wf_cancel:",
                    "preventive_action": "capa_preventive_action:",
                    "corrective_action": "capa_corrective_action:",
                    "correction": "capa_correction:",
                    "review_comments": "capa_wf_review_comments:",
                    "monitoring": "capa_wf_monitoring_details:",
                    "monitoring_feedback": "capa_wf_monitoring_feedback:"
                },
                "ams": {
                    "object_id": "ams_wf_details:",
                    "agenda": "ams_wf_agenda:",
                    "file_upload": "lm_ams_doc_file:",
                    "audit_plan": "ams_audit_plan:",
                    "auditees": "ams_auditees:",
                    "int_auditor": "ams_int_auditor:",
                    "ext_auditor": "ams_ext_auditor:",
                    "cancel": "ams_wf_cancel:",
                    "review_comments": "ams_wf_review_comments:",
                    "observation":"ams_wf_observation:",
                    "obseravtion_file_upload":"lm_ams_obr_doc_file:"
                },
                "vms": {
                    "org" : "vms_org_id:",
                    "plant" : "vms_plant_id:",
                    "object_id": "vms_wf_details:",
                    "agenda_category":"vms_wf_agenda:",
                    "agenda_sub_category":"vms_wf_sub_agenda:",
                    "auditors": "vms_wf_auditors:",
                    "auditees": "vms_wf_auditees:",
                    "file_upload": "lm_vms_doc_file:",
                    "review_comments": "vms_wf_review_comments:",
                    "cancel": "vms_wf_cancel:",
                    "audit_file_upload": "lm_audit_doc_file:",
                    "audit_plan": "vms_wf_audit_plan:"
                },
                "oos": {
                    "org" : "oos_org_id:",
                    "plant" : "oos_plant_id:",
                    "object_id": "oos_wf_details:",
                    "checklist_details" : "checklist_details:",
                    "ip_invest_details" : "ip_invest_details:",                    
                    "spec_details" : "spec_details:",
                    "spec_result_details" : "spec_result_details:",
                    "analyst_details" : "analyst_details:",
                    "manufacturing_investigation_details" : "mfg_invest_details:",
                    "1phase_investigation_details" : "1phase_invest_details:",
                    "agenda_category":"oos_wf_agenda:",
                    "agenda_sub_category":"oos_wf_sub_agenda:",
                    "auditors": "oos_wf_auditors:",
                    "auditees": "oos_wf_auditees:",
                    "file_upload": "lm_oos_doc_file:",
                    "review_comments": "oos_wf_review_comments:",
                    "cancel": "oos_wf_cancel:",
                    "audit_file_upload": "lm_audit_doc_file:",
                    "audit_plan": "oos_wf_audit_plan:",
                    "phase2_retest_investigation_details": "phase2_retest_investigation_details:",
                    "phase2_resample_investigation_details": "phase2_resample_investigation_details:",
                    "phase3_investigation_details": "phase3_investigation_details:",
                    "cft_review_comments": "cft_review_comments:",
                    "oos_extension_details": "oos_extension_details:"
                },
                "workflow_remarks": {
                    "object_id": "workflow_remarks:"
                }
            },
            "meeting": {
                "ccm": {
                    "meeting_schedule": "ccm_meeting_sch:",
                    "meeting_agenda": "ccm_meeting_agenda:",
                    "meeting_participant": "ccm_meeting_details:",
                    "meeting_attendee": "ccm_meeting_attendees:"
                },
                "dms": {
                    "meeting_schedule": "dms_meeting_sch:",
                    "meeting_agenda": "dms_meeting_agenda:",
                    "meeting_participant": "dms_meeting_participant",
                    "meeting_attendee": "dms_meeting_attendees:"
                },
                "capa": {
                    "meeting_schedule": "capa_meeting_sch:",
                    "meeting_agenda": "capa_meeting_agenda:",
                    "meeting_participant": "capa_meeting_participant",
                    "meeting_attendee": "capa_meeting_attendees:"
                },
                "ams": {
                    "meeting_schedule": "dms_meeting_sch:",
                    "meeting_participant": "dms_meeting_participant",
                    "meeting_attendee": "dms_meeting_attendees:"
                }
            },
            "training": {
                "ccm": {
                    "trainer": "ccm_trainer:",
                    "training_schedule": "ccm_training_sch:",
                    "training_participant": "ccm_training_participant:",
                    "training_attendee": "ccm_training_attendees:"
                },
                "dms": {
                    "trainer": "dms_trainer:",
                    "training_schedule": "dms_training_sch:",
                    "training_participant": "dms_training_participant:",
                    "training_attendee": "dms_training_attendees:"
                },
                "capa": {
                    "object_id": "capa_meeting_details:",
                    "audit_trail": "at_capa_meeting_details:"
                },
                "ams": {
                    "object_id": "ams_meeting_details:",
                    "audit_trail": "at_ams_meeting_details:"
                },
                "vms": {
                    "object_id": "vms_meeting_details:",
                    "audit_trail": "at_vms_meeting_details:"
                }
            },
            "exam": {
                "ccm": {
                    "exam_details": "ccm_exam_details:",
                    "online_exam": "ccm_online_exam:",
                    "exam_qns_master": "ccm_exam_qns_master:",
                    "exam_qns_opt_master": "ccm_exam_qns_opt_master:",
                    "oe_user_qns_ans": "ccm_online_exam_qns_ans:"
                },
                "dms": {
                    "exam_details": "dms_exam_details:",
                    "online_exam": "dms_online_exam:",
                    "exam_qns_master": "dms_exam_qns_master:",
                    "exam_qns_opt_master": "dms_exam_qns_opt_master:",
                    "oe_user_qns_ans": "dms_online_exam_qns_ans:"
                }
            },
            "task": {
                "ccm": {
                    "task": "ccm_wf_task_details:",
                    "task_review_comments": "ccm_task_review_comments:",
                    "task_file_upload": "lm_ccm_task_doc_file:"
                },
                "dms": {
                    "task": "dms_wf_task_details:",
                    "task_review_comments": "dms_task_review_comments:",
                    "task_file_upload": "lm_dms_task_doc_file:"
                },
                "capa": {
                    "task": "capa_wf_task_details:",
                    "task_review_comments": "capa_task_review_comments:",
                    "task_file_upload": "lm_capa_task_doc_file:"
                },
                "ams": {
                    "object_id": "ams_task_details:",
                    "audit_trail": "at_ams_task_details:"
                },
                "vms": {
                    "object_id": "vms_task_details:",
                    "audit_trail": "at_mat_sub_type_master:"
                }
            },
            "common": {
                "extension_request": "extension_request:"
            },
            "integration": {
                "object_id": "e_trigger:"
            }
        },
        "url": {
            "ccm": {
                "add_ccm": "index.php?module=ccm&action=add_ccm",
                "view_ccm": "index.php?module=ccm&action=view_ccm&object_id=",
                "header_redirect": "Location:?module=ccm&action=view_ccm&object_id="
            },
            "dms": {
                "add_dms": "index.php?module=dms&action=add_dms",
                "view_dms": "index.php?module=dms&action=view_dms&object_id=",
                "header_redirect": "Location:?module=dms&action=view_dms&object_id="
            },
            "capa": {
                "add_capa": "index.php?module=capa&action=add_capa",
                "view_capa": "index.php?module=capa&action=view_capa&object_id=",
                "header_redirect": "Location:?module=capa&action=view_capa&object_id="
            },
            "vms": {
                "header_redirect": "Location:?module=vms&action=view_vms&object_id=",
                "view_vms": "index.php?module=vms&action=view_vms&object_id="
            },
            "ams": {
                 "add_ams": "index.php?module=ams&action=add_ams",
                 "header_redirect": "Location:?module=ams&action=view_ams&object_id="
            },
            "oos": {
                 "add_oos": "index.php?module=oos&action=add_oos",
                 "view_oos": "index.php?module=oos&action=view_oos&object_id=",
                 "header_redirect": "Location:?module=oos&action=view_oos&object_id="
            },
            "integration": {
                "view": "index.php?module=integration&action=view_integration&object_id="
            }
        },
        "e_sign": {
            "full_form": {
                "create" : "Created By",
                "dept_approve" : "Dept. Approved By",
                "qa_review" : "QA Reviewd By",
                "pre_approve" : "Pre Approved By",
                "qa_approve" : "QA Approved By"
            }
        }
    }
}';
    global $error_handler;
    (json_decode($obj_def) == false) ? $error_handler->raiseError("INVALID_JSON_FORMAT") : null;

    if ($required_field) {
        $json_decode_def_obj = json_decode($obj_def, true);

        $params = explode("->", $required_field);
        $param_count = count($params);
        for ($i = 0; $i < $param_count; $i++) {
            $tmp = $params[$i];
            $json_decode_def_obj = $json_decode_def_obj[$tmp];
        }
        //$required_field_val = $json_decode_def_obj['definitions']['object_id']['qms']['admin_master_data']['product'];
        (empty($json_decode_def_obj)) ? $error_handler->raiseError("INVALID_JSON_VALUE_REQUESTED", $required_field) : null;
        $required_field_val = $json_decode_def_obj;
    } else {
        $required_field_val = null;
    }
    return $json_decode_def_obj;
}

function get_object_id($reqired_field) {
    $reqired_field_val = get_lm_json_value_by_key($reqired_field);
    if ($reqired_field_val == '' || $reqired_field_val == null) {
        global $error_handler;
        $error_handler->raiseError("INVALID_OBJECT_ID_REQUESTED", $reqired_field);
    }
    $seq_obj = new Sequence();
    $object_id = $reqired_field_val . $seq_obj->get_next_sequence();
    if ($object_id) {
        return $object_id;
    }
    return null;
}

function data_null_validator($data) {
    foreach ($data as $key => $val) {
        if (!is_null($val)) {
            $output[$key] = $val;
        } else {
            $output[$key] = NULL;
        }
    }
    $output["date_time"] = date('Y-m-d G:i:s');
    $output["usr_id"] = trim($_SESSION['user_id']);
    return $output;
}

function get_random_meeting_link($date_time) {
    $str = rand();
    $randon_result = md5(md5($str) . md5($date_time));
    $meeting_link = "https://meet.jit.si/$randon_result";
    return $meeting_link;
}

function display_hypen_if_null($params) {
    if (is_array($params)) {
        // Check if the array is not empty and get the first element
        $value = array_values($params);
        if (empty($value[0])) {
            $data = "-";
        } else {
            $data = $value[0];
        }
    } else {
        // Check if $params is truthy
        if ($params) {
            $data = $params;
        } else {
            $data = "-";
        }
    }
    return $data;
}

function get_audit_min_max_date_details($ref_object_id = null) {
    $obj = new DB_Public_lm_audit_trail_log();
    $where_cond = ($ref_object_id) ? "where ref_object_id='$ref_object_id'" : null;
    $obj->query("SELECT min(created_date) as min_date,max(created_date) as max_date FROM {$obj->__table} $where_cond");
    $obj->fetch();
    $min_date = explode(" ", $obj->min_date);
    $max_date = explode(" ", $obj->max_date);
    $date_details = array('min_date' => "$min_date[0] 00:00:00", 'max_date' => "$max_date[0] 23:59:59");
    return $date_details;
}

function time_taken($dt1, $dt2) {
    $date1 = new DateTime($dt1);
    $date2 = new DateTime($dt2);
    $interval = $date1->diff($date2);
    $time_taken = $interval->format('%d days, %h hours, %i minutes,  %s seconds');
    return $time_taken;
}

function is_target_date_exceeded($target_date, $date_time) {
    if (getModifiedDateTimeFormat($date_time, 'f1') > getModifiedDateTimeFormat($target_date, 'f1')) {
        return true;
    }
    return false;
}

function display_date_format($params) {
    $date = is_array($params) ? getModifiedDateTimeFormat(array_values($params)[0], 'f16') : getModifiedDateTimeFormat($params, 'f16');
    return $date;
}

function display_datetime_format($params) {
    $date = is_array($params) ? getModifiedDateTimeFormat(array_values($params)[0], '') : getModifiedDateTimeFormat($params, '');
    return $date;
}

function getModifiedDateFormat($format, $date, $year, $month, $days) {
    return (date($format, strtotime("$date $year years $month months $days days")));
}

function getInstrumentEquipmentName($instrumentEquipmentId) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    $ins_equip_obj->get("object_id", $instrumentEquipmentId);
    return $ins_equip_obj->inst_equip_name;
}



function d($array){
    echo '<pre>';
    print_r($array);
    echo '<pre>';
    exit;
}

$smarty->registerPlugin("function", "user_name", "template_getUserName");
$smarty->registerPlugin("function", "object_name", "template_getObjectName");
$smarty->registerPlugin("function", "pdf_object_name", "template_getPdfObjectName");
$smarty->registerPlugin("function", "operation_name", "template_getOperationName");
$smarty->registerPlugin("function", "pdf_operation_name", "template_getPdfOperationName");
$smarty->registerPlugin("function", "display_if_null", "display_hypen_if_null");
$smarty->registerPlugin("function", "display_date", "display_date_format");
$smarty->registerPlugin("function", "display_datetime", "display_datetime_format");
