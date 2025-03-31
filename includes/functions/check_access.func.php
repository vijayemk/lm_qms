<?php

/**
 * check_access function
 *
 * @author Ananthakumar V
 * @since 16/02/2017
 * @package 
 * @version 1.0
 */
function check_access($username, $access_per_name, $is_enabled) {
    $user_obj = new DB_Public_users;
    $user_obj->user_name = $username;
    $user_obj->find();
    $user_obj->fetch(); 

    $access_per_obj = new DB_Public_access_permission_object_list();
    $access_per_obj->name = $access_per_name;
    $access_per_obj->find();
    $access_per_obj->fetch();

    $user_per_obj = new DB_Public_users_permission();
    $user_per_obj->whereAdd("user_id = '$user_obj->user_id'");
    $user_per_obj->whereAdd("access_per_id = '$access_per_obj->object_id'");
    $user_per_obj->whereAdd("is_enabled = '$is_enabled'");
    $user_per_obj->find();  
    
    if ($user_per_obj->fetch()) { 
        return true;
    } else {         
        return false;        
    }
}

function update_doc_dept_permission($doc_id, $dept_view_array, $is_enabled, $usr_id, $date_time) {
    //Delete old and insert new
    $del_obj = new DB_Public_lm_doc_dept_permission();
    $del_obj->whereAdd("doc_id='$doc_id'");
    $del_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

    foreach ($dept_view_array as $val) {
        $add_obj = new DB_Public_lm_doc_dept_permission();
        $add_obj->doc_id = $doc_id;
        $add_obj->department_id = $val;
        $add_obj->is_enabled = $is_enabled;
        $add_obj->created_by = $usr_id;
        $add_obj->created_time = $date_time;
        $add_obj->insert();
    }
    return true;
}

function check_doc_dept_access($doc_id, $dept_id, $is_enabled) {
    $obj = new DB_Public_lm_doc_dept_permission();
    $obj->whereAdd("doc_id = '$doc_id'");
    $obj->whereAdd("department_id = '$dept_id'");
    $obj->whereAdd("is_enabled = '$is_enabled'");
    $obj->find();
    if ($obj->fetch()) {
        return true;
    } else {
        return false;
    }
}

//**** Start of Plant Department Access Rights  ***//

function addDeptAccessRights($doc_id, $default_plant_dept_id, $dept_view_array, $usr_id, $date_time, $doc_no, $audit_trail_action) {
    (empty($dept_view_array)) ? ($dept_view_array = array()) . (array_push($dept_view_array, $default_plant_dept_id)) : array_push($dept_view_array, $default_plant_dept_id);

    $old_obj = new DB_Public_lm_doc_dept_permission();
    $old_obj->whereAdd("doc_id='$doc_id'");
    if ($old_obj->find()) {
        while ($old_obj->fetch()) {
            $plant_name_old = getPlantShortName($old_obj->plant_id);
            $dept_name_old = getDepartment($old_obj->department_id);
            $at_old .= "\n\t\t\t{$plant_name_old} : {$dept_name_old}";
        }
    }

    //Delete old and insert new
    $del_obj = new DB_Public_lm_doc_dept_permission();
    $del_obj->whereAdd("doc_id='$doc_id'");
    $del_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

    foreach (array_unique($dept_view_array) as $val) {
        $data = (explode("-", $val));
        $add_obj = new DB_Public_lm_doc_dept_permission();
        $add_obj->doc_id = $doc_id;
        $add_obj->plant_id = $data[0];
        $add_obj->department_id = $data[1];
        $add_obj->is_enabled = "yes";
        $add_obj->created_by = $usr_id;
        $add_obj->created_time = $date_time;
        if ($add_obj->insert()) {
            $plant_name = getPlantShortName($data[0]);
            $dept_name = getDepartment($data[1]);
            $at_new .= "\n\t\t\t{$plant_name} : {$dept_name}";
            $at_p .= "\n\t\t\t{$data[0]} - {$plant_name} : {$data[1]} - {$dept_name}";
        }
    }
    $at_data['Document Number'] = array($doc_no, $doc_no, $doc_no);
    $at_data['Access Rights To'] = array($at_old, $at_new, $at_p);
    addAuditTrailLog($doc_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
    return true;
}

function getAccessRightsDeptList($doc_ref_id = null, $plant_id = null, $dept_id = null, $is_enabled = null) {
    $obj = new DB_Public_lm_doc_dept_permission();
    (!empty($doc_ref_id)) ? $obj->whereAdd("doc_id='$doc_ref_id'") : null;
    (!empty($plant_id)) ? $obj->whereAdd("plant_id='$plant_id'") : null;
    (!empty($dept_id)) ? $obj->whereAdd("department_id='$dept_id'") : null;
    (!empty($is_enabled)) ? $obj->whereAdd("is_enabled='$is_enabled'") : null;
    if ($obj->find()) {
        while ($obj->fetch()) {
            $dept_per_list[] = array(
                'doc_ref_id' => $obj->doc_id, 'dept_id' => $obj->department_id, 'dept_name' => getDepartment($obj->department_id), 'is_enabled' => $obj->is_enabled,
                'plant_id' => $obj->plant_id, 'plant_name' => getPlantShortName($obj->plant_id), 'modified_by' => getFullName($obj->created_by), 'modified_time' => $obj->created_time,
                "drop_down_value" => $obj->department_id, "drop_down_option" => getDepartment($obj->department_id), "plant_dept_id" => "$obj->plant_id-$obj->department_id"
            );
        }
        return $dept_per_list;
    }
    return null;
}

function getAccessRightsPlantList($doc_ref_id = null) {
    $obj = new DB_Public_lm_doc_dept_permission();
    (!empty($doc_ref_id)) ? $obj->whereAdd("doc_id='$doc_ref_id'") : null;
    if ($obj->find()) {
        while ($obj->fetch()) {
            $plant_name = "[" . getPlantShortName($obj->plant_id) . "] - [" . getPlantName($obj->plant_id) . "]";
            $plant_per_list[] = array("drop_down_option" => $plant_name, "drop_down_value" => $obj->plant_id);
        }
        asort($plant_per_list);
        $unique_plant_list = array_map("unserialize", array_unique(array_map("serialize", $plant_per_list)));
        return $unique_plant_list;
    }
    return null;
}

function isDeptAccessRightsExist($doc_id, $plant_id, $dept_id, $is_enabled) {
    $obj = new DB_Public_lm_doc_dept_permission();
    $obj->whereAdd("doc_id = '$doc_id'");
    $obj->whereAdd("plant_id = '$plant_id'");
    $obj->whereAdd("department_id = '$dept_id'");
    $obj->whereAdd("is_enabled = '$is_enabled'");
    $obj->find();
    if ($obj->fetch()) {
        return true;
    } else {
        return false;
    }
}

//**** End of Plant Department Access Rights  ***//
