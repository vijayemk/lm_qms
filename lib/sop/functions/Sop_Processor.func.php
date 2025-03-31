<?php

class Sop_Processor {
    /** General Start */

    /** Insert the worklist */
    function add_worklist($work_user_id, $object_id) {
        $sequence = new Sequence;
        $work_assigned_date = date('Y-m-d G:i:s');
        $worklist = new DB_Public_lm_worklist();
        $worklist->whereAdd("work_user_id='$work_user_id'");
        $worklist->whereAdd("object_id='$object_id'");
        if (!$worklist->find()) {
            $worklist->work_user_id = $work_user_id;
            $worklist->object_id = $object_id;
            $worklist->work_assigned_date = $work_assigned_date;
            $worklist->insert();
        }
    }

    /** Delete the particular worklist */
    function delete_worklist($work_user_id, $object_id) {
        $worklist = new DB_Public_lm_worklist();
        $worklist->whereAdd("work_user_id='$work_user_id'");
        $worklist->whereAdd("object_id='$object_id'");
        $worklist->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    /** Delete all the worklist */
    function delete_all_worklist($object_id) {
        $worklist = new DB_Public_lm_worklist();
        $worklist->whereAdd("object_id='$object_id'");
        $worklist->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    /** Check the action is completed * */
    function is_action_finished($object_id, $action, $status) {
        $workflow_obj = new DB_Public_lm_workflow();
        $action_id = $this->get_workflow_action_id($action);
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        if ($workflow_obj->find()) {
            while ($workflow_obj->fetch()) {
                if ($workflow_obj->lm_workflow_status != $status)
                    return false;
            }
            return true;
        }
        return false;
    }

    function save_workflow($object_id, $user, $status, $action) {
        $workflow_obj = new DB_Public_lm_workflow();
        $action_id = $this->get_workflow_action_id($action);
        $actiontime = date('Y-m-d G:i:s');
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_user='$user'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        if (!$workflow_obj->find()) {
            $sequence_object = new Sequence;
            $workflow_obj_id = "workflow_id:" . $sequence_object->get_next_sequence();
            $workflow_obj->object_id = $object_id;
            $workflow_obj->lm_workflow_date = $actiontime;
            $workflow_obj->lm_workflow_user = $user;
            $workflow_obj->lm_workflow_status = $status;
            $workflow_obj->lm_workflow_actions = $action_id;
            $workflow_obj->workflow_object_id = $workflow_obj_id;
            $workflow_obj->assigned_date = $actiontime;
            $workflow_obj->assigned_by = trim($_SESSION['user_id']);
            $workflow_obj->insert();
        } else {
            $this->update_workflow($object_id, $user, $status, $action);
        }
    }

    function delete_workflow_action($object_id, $status, $action) {
        $action_id = $this->get_workflow_action_id($action);
        $workflow = new DB_Public_lm_workflow();
        $workflow->whereAdd("object_id='$object_id'");
        $workflow->whereAdd("lm_workflow_status='$status'");
        $workflow->whereAdd("lm_workflow_actions='$action_id'");
        $workflow->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function delete_user_workflow_action($object_id, $usr_id, $status, $action) {
        $action_id = $this->get_workflow_action_id($action);
        $workflow = new DB_Public_lm_workflow();
        $workflow->whereAdd("object_id='$object_id'");
        $workflow->whereAdd("lm_workflow_user='$usr_id'");
        $workflow->whereAdd("lm_workflow_status='$status'");
        $workflow->whereAdd("lm_workflow_actions='$action_id'");
        $workflow->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function update_workflow($object_id, $user, $status, $action) {
        $actiontime = date('Y-m-d G:i:s');
        $action_id = $this->get_workflow_action_id($action);
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_user='$user'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->lm_workflow_status = $status;
        $workflow_obj->lm_workflow_date = $actiontime;
        $workflow_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function get_all_workflow_actions($object_id) {
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->orderBy('lm_workflow_date');
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $user_name = getFullName($workflow_obj->lm_workflow_user);
            $department = getDeptName($workflow_obj->lm_workflow_user);
            $action = $this->get_workflow_action_name($workflow_obj->lm_workflow_actions);
            $workflow_status[] = array('user_name' => $user_name, 'department' => $department, 'date' => get_modified_date_time_format($workflow_obj->lm_workflow_date), 'action' => $action, 'status' => $workflow_obj->lm_workflow_status);
        }
        return ($workflow_status);
    }

    function get_all_workflow_users_list($object_id) {
        $users_list = array();
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $users_list[] = $workflow_obj->lm_workflow_user;
        }
        return ($users_list);
    }

    function get_workflow_userlist_by_objectid_action_status($object_id, $action, $status) {
        $action_id = $this->get_workflow_action_id($action);
        $users_list = array();
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='$status'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $users_list[] = array('user_id' => $workflow_obj->lm_workflow_user, 'user_name' => getFullName($workflow_obj->lm_workflow_user));
        }
        return ($users_list);
    }

    function get_dept_userlist($department_id) {
        $user = new DB_Public_users();
        $user->orderBy('full_name');
        $user->whereAdd("department_id='$department_id'");
        $user->whereAdd("account_status='enable'");
        $user->find();
        while ($user->fetch()) {
            $userlist[] = $user->user_id;
        }
        return $userlist;
    }

    function check_user_in_workflow($object_id, $user, $status, $action) {
        $action_id = $this->get_workflow_action_id($action);
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_user='$user'");
        if (!$status == "") {
            $workflow_obj->whereAdd("lm_workflow_status='$status'");
            $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
            if ($workflow_obj->find())
                return true;
        } else {
            return false;
        }
    }

    function check_user_in_worklist($object_id, $user) {
        $worklist_obj = new DB_Public_lm_worklist();
        $worklist_obj->whereAdd("object_id='$object_id'");
        $worklist_obj->whereAdd("work_user_id='$user'");
        if ($worklist_obj->find())
            return true;
        else
            return false;
    }

    function get_creater_id($object_id) {
        $action_id = $this->get_workflow_action_id('create');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $creater = $workflow_obj->lm_workflow_user;
        }
        return ($creater);
    }

    function get_creater_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('create');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Created'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $creater = $workflow_obj->lm_workflow_user;
        }
        if (!empty($creater)) {
            return ($creater);
        } else {
            return null;
        }
    }

    function get_created_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('create');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Created'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $created_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($created_time)) {
            return ($created_time);
        } else {
            return null;
        }
    }

    function get_reviewer_id($object_id) {
        $action_id = $this->get_workflow_action_id('review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $reviewer = $workflow_obj->lm_workflow_user;
        }
        if (!empty($reviewer)) {
            return ($reviewer);
        } else {
            return null;
        }
    }

    function get_reviewer_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $reviewer = $workflow_obj->lm_workflow_user;
        }
        if (!empty($reviewer)) {
            return ($reviewer);
        } else {
            return null;
        }
    }

    function get_reviewed_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $reviewed_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($reviewed_time)) {
            return ($reviewed_time);
        } else {
            return null;
        }
    }

    function get_approver_id($object_id) {
        $action_id = $this->get_workflow_action_id('approve');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $approver = $workflow_obj->lm_workflow_user;
        }
        if (!empty($approver)) {
            return ($approver);
        } else {
            return null;
        }
    }

    function get_approver_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('approve');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Approved'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $approver = $workflow_obj->lm_workflow_user;
        }
        if (!empty($approver)) {
            return ($approver);
        } else {
            return null;
        }
    }

    function get_approved_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('approve');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Approved'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $approved_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($approved_time)) {
            return ($approved_time);
        } else {
            return null;
        }
    }

    function get_authorizer_id($object_id) {
        $action_id = $this->get_workflow_action_id('authorize');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $authorizer = $workflow_obj->lm_workflow_user;
        }
        if (!empty($authorizer)) {
            return ($authorizer);
        } else {
            return null;
        }
    }

    function get_trainer_id($object_id) {
        $action_id = $this->get_workflow_action_id('train');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $trainer = $workflow_obj->lm_workflow_user;
        }
        if (!empty($trainer)) {
            return ($trainer);
        } else {
            return null;
        }
    }

    function get_authorizer_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('authorize');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Authorized'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $authorizer = $workflow_obj->lm_workflow_user;
        }
        if (!empty($authorizer)) {
            return ($authorizer);
        } else {
            return null;
        }
    }

    function get_authorized_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('authorize');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Authorized'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $authorized_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($authorized_time)) {
            return ($authorized_time);
        } else {
            return null;
        }
    }

    function get_signup_copy_user_id($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $copy_user = $workflow_obj->lm_workflow_user;
        }
        if (!empty($copy_user)) {
            return ($copy_user);
        } else {
            return null;
        }
    }

    function get_signup_copy_user_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Activated'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $copy_user = $workflow_obj->lm_workflow_user;
        }
        if (!empty($copy_user)) {
            return ($copy_user);
        } else {
            return null;
        }
    }

    function get_signup_copy_activated_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Activated'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $activated_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($activated_time)) {
            return ($activated_time);
        } else {
            return null;
        }
    }

    function get_exit_copy_user_id($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $copy_user = $workflow_obj->lm_workflow_user;
        }
        if (!empty($copy_user)) {
            return ($copy_user);
        } else {
            return null;
        }
    }

    function get_exit_copy_user_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='DeActivated'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $copy_user = $workflow_obj->lm_workflow_user;
        }
        if (!empty($copy_user)) {
            return ($copy_user);
        } else {
            return null;
        }
    }

    function get_exit_copy_deactivated_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('copy');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='DeActivated'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $activated_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($activated_time)) {
            return ($activated_time);
        } else {
            return null;
        }
    }

    function get_approver_list($object_id) {
        $action_id = $this->get_workflow_action_id('approve');
        $approver_list = array();
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $approver_list[] = $workflow_obj->lm_workflow_user;
        }
        return ($approver_list);
    }

    function get_reviewer_list($object_id) {
        $action_id = $this->get_workflow_action_id('review');
        $reviewer_list = array();
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $reviewer_list[] = $workflow_obj->lm_workflow_user;
        }
        return ($reviewer_list);
    }

    function get_workflow_action_id($action_name) {
        $actions_obj = new DB_Public_lm_workflow_actions();
        $actions_obj->get("lm_workflow_action_name", $action_name);
        return $actions_obj->lm_workflow_action_id;
    }

    function get_workflow_action_name($action_id) {
        $actions_obj = new DB_Public_lm_workflow_actions();
        $actions_obj->get("lm_workflow_action_id", $action_id);
        return $actions_obj->lm_workflow_action_name;
    }

    function count_worklist($user) {
        $worklist = new DB_Public_lm_worklist();
        $worklist->whereAdd("work_user_id='$user'");
        $list = $worklist->find();
        return $list;
    }

    function get_default_workflow_user($object_id, $workflow_status, $action_name) {
        $default_userlist = array();
        $action_id = $this->get_workflow_action_id($action_name);
        $defaultuser_workflow_user = new DB_Public_lm_workflow();
        $defaultuser_workflow_user->whereAdd("object_id='$object_id'");
        $defaultuser_workflow_user->whereAdd("lm_workflow_status='$workflow_status'");
        $defaultuser_workflow_user->whereAdd("lm_workflow_actions='$action_id'");
        $defaultuser_workflow_user->find();
        while ($defaultuser_workflow_user->fetch()) {
            $default_userlist[] = $defaultuser_workflow_user->lm_workflow_user;
        }
        return ($default_userlist);
    }

    function update_signup_status($signup_object_id, $status) {
        $signup = new DB_Public_user_signup();
        $signup->whereAdd("object_id ='$signup_object_id'");
        $signup->status = $status;
        $signup->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_user_exit_status($exit_object_id, $status) {
        $exit = new DB_Public_user_exit();
        $exit->whereAdd("object_id ='$exit_object_id'");
        $exit->status = $status;
        $exit->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_multi_temp_worklist_same_userid($work_user_id, $object_id, $status, $reference = null) {
        $temp_worklist = new DB_Public_lm_worklist_temp();
        $temp_worklist->work_user_id = $work_user_id;
        $temp_worklist->object_id = $object_id;
        $temp_worklist->work_assigned_date = date('Y-m-d G:i:s');
        $temp_worklist->status = $status;
        $temp_worklist->reference1 = $reference;
        $temp_worklist->insert();
    }

    /** Delete the worklist */
    function delete_temp_worklist($work_user_id = null, $object_id = null, $reference = null) {
        $temp_worklist = new DB_Public_lm_worklist_temp();
        if (!empty($work_user_id)) {
            $temp_worklist->whereAdd("work_user_id='$work_user_id'");
        }
        if (!empty($object_id)) {
            $temp_worklist->whereAdd("object_id='$object_id'");
        }
        if (!empty($reference)) {
            $temp_worklist->whereAdd("reference1='$reference'");
        }
        $temp_worklist->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function check_user_in_temp_worklist($object_id, $user) {
        $temp_worklist_obj = new DB_Public_lm_worklist_temp();
        $temp_worklist_obj->whereAdd("object_id='$object_id'");
        $temp_worklist_obj->whereAdd("work_user_id='$user'");
        if ($temp_worklist_obj->find())
            return true;
        else
            return false;
    }

    function check_status_in_temp_worklist($object_id, $user, $status, $reference = null) {
        $temp_worklist_obj = new DB_Public_lm_worklist_temp();
        $temp_worklist_obj->whereAdd("object_id='$object_id'");
        $temp_worklist_obj->whereAdd("work_user_id='$user'");
        $temp_worklist_obj->whereAdd("status='$status'");
        if (!empty($reference)) {
            $temp_worklist_obj->whereAdd("reference1='$reference'");
        }
        if ($temp_worklist_obj->find())
            return true;
        else
            return false;
    }

    function get_pending_count($object_id, $usr_id) {
        $worklist_obj = new DB_Public_lm_worklist();
        if ($usr_id != "") {
            $worklist_obj->whereAdd("work_user_id like '$usr_id'");
        }
        if ($object_id != "") {
            $worklist_obj->whereAdd("object_id like '$object_id'");
        }
        $worklist_obj->find();
        while ($worklist_obj->fetch()) {
            $countlist[] = array();
        }
        return count($countlist);
    }

    function recent_signup_workflow() {
        $user_obj = new DB_Public_users();
        $user_obj->whereAdd("account_status='enable'");
        $user_obj->find();
        while ($user_obj->fetch()) {
            list($year, $month, $day, $h, $i, $s) = sscanf(date('Y-m-d H:i:s'), '%4s-%2s-%2s %2s:%2s:%2s');
            $highlight = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $day - 30, $year));
            $user_image_file = get_user_image($user_obj->user_id);
            if ($highlight < $user_obj->create_time) {
                $userlist[] = array("full_name" => $user_obj->full_name, "dept" => getDepartment($user_obj->department_id), "activated_date" => $user_obj->create_time, "user_image_file" => $user_image_file);
            }
        }
        return $userlist;
    }

    /** General Stop */

    /** SOP Start */
    function sop_type_list_details($is_enabled = null) {
        $sop_type_details = new DB_Public_lm_sop_type();
        if (!empty($is_enabled)) {
            $sop_type_details->whereAdd("is_enabled='$is_enabled'");
        }
        $sop_type_details->orderBy('type');
        if ($sop_type_details->find()) {
            $count = 0;
            while ($sop_type_details->fetch()) {
                $soptypedetails[$count]['object_id'] = $sop_type_details->object_id;
                $soptypedetails[$count]['type'] = $sop_type_details->type;
                $soptypedetails[$count]['description'] = $sop_type_details->description;
                $soptypedetails[$count]['creator'] = getUserName($sop_type_details->creator);
                $soptypedetails[$count]['created_time'] = $sop_type_details->created_time;
                $soptypedetails[$count]['modifier'] = getUserName($sop_type_details->modifier);
                $soptypedetails[$count]['modified_time'] = $sop_type_details->modified_time;
                $soptypedetails[$count]['is_enabled'] = $sop_type_details->is_enabled;
                $count++;
            }
            return $soptypedetails;
        } else {
            return null;
        }
    }

    function get_sop_type($object_id) {
        $sop_type = new DB_Public_lm_sop_type();
        $sop_type->get("object_id", $object_id);
        return $sop_type->type;
    }

    function get_sop_type_desc($object_id) {
        $sop_type = new DB_Public_lm_sop_type();
        $sop_type->get("object_id", $object_id);
        return $sop_type->description;
    }

    function get_sop_no($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        if ($sop_master->sop_no == NULL) {
            $sop_no = $sop_master->sop_draft_no;
        } else {
            $sop_no = $sop_master->sop_no;
        }
        return $sop_no;
    }

    function get_sop_liveno_list_completion() {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->orderBy('sop_no');
        $sop_master->find();
        $livenolist = array();
        while ($sop_master->fetch()) {
            $livenolist[] = $sop_master->sop_no;
        }
        return $livenolist;
    }

    function get_sop_draftno_list_completion() {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->orderBy('sop_draft_no');
        $sop_master->find();
        $draftnolist = array();
        while ($sop_master->fetch()) {
            $draftnolist[] = $sop_master->sop_draft_no;
        }
        return $draftnolist;
    }

    function get_sop_no_list_completion() {
        $sop_liveno = $this->get_sop_liveno_list_completion();
        $sop_draftno = $this->get_sop_draftno_list_completion();
        $combined_list = array_unique(array_merge($sop_liveno, $sop_draftno));
        return $combined_list;
    }

    function update_sop_status($sop_object_id, $status) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_master->status = $status;
        $sop_master->update();
        return true;
    }

    function update_sop_training_status($object_id, $status) {
        $sop_obj = new DB_Public_lm_sop_meeting_schedule();
        $sop_obj->get('object_id', $object_id);
        $sop_obj->status = $status;
        $sop_obj->update();
        return true;
    }

    function update_sop_training_is_latest($object_id, $is_latest) {
        $sop_obj = new DB_Public_lm_sop_meeting_schedule();
        $sop_obj->get('object_id', $object_id);
        $sop_obj->is_latest = $is_latest;
        $sop_obj->update();
        return true;
    }

    function update_sop_no($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_no = $this->get_sop_no($sop_object_id);
        $sop_master->sop_no = $sop_no;
        $sop_master->update();
        return true;
    }

    function add_sop_draft_master($sop_type, $sop_name, $cc_no, $revision, $supersedes, $reason_for_revision, $sop_plant, $sop_lang, $create_year, $create_month, $usr_id, $createtime, $usr_org_id, $dept_id, $unique_name, $capa_no) {
        $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-3');
        $sequence_object = new Sequence;
        $id = "sop.details:" . $sequence_object->get_next_sequence();
        $sop_draft_number = $this->get_sop_draft_no($sop_type, 'update');
        /*         * get sop format_no* */
        $sop_format_id = $this->get_lastet_format_no_id("SOP", $sop_type);

        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->sop_object_id = $id;
        $sop_master->sop_desc = "SOP";
        $sop_master->sop_department = $dept_id;
        $sop_master->sop_type = $sop_type;
        $sop_master->sop_draft_no = $sop_draft_number;
        $sop_master->sop_no = NULL;
        $sop_master->sop_name = $sop_name;
        $sop_master->revision = $revision;
        $sop_master->supersedes = $supersedes;
        $sop_master->effective_date = NULL;
        $sop_master->expiry_date = NULL;
        $sop_master->created_year = $create_year;
        $sop_master->created_month = $create_month;
        $sop_master->status = "Draft Created";
        $sop_master->created_by = $usr_id;
        $sop_master->created_time = $createtime;
        $sop_master->modified_by = $usr_id;
        $sop_master->modified_time = $createtime;
        $sop_master->is_latest_revision = 'true';
        $sop_master->is_revised = 'no';
        $sop_master->sop_format_no = $sop_format_id;
        //$sop_master->sop_org = $usr_org_id;
        $sop_master->cc_no = $cc_no;
        $sop_master->sop_plant = $sop_plant;
        $sop_master->reason_for_revision = $reason_for_revision;
        $sop_master->lang = $sop_lang;
        $sop_master->lm_doc_id = $lm_doc_id;
        $sop_master->uname = $unique_name;
        $sop_master->capa_no = $capa_no;
        $sop_master->insert();
        return $id;
    }

    function update_sop_effective_date($sop_object_id, $sop_type, $current_sop_effective_date, $current_sop_revision, $usr_id) {
        $effective_date = str_replace('/', '-', $current_sop_effective_date);
        $effective_date = date('Y-m-d', strtotime($effective_date));
        $expiry_date = $this->get_sop_expiry_date($effective_date);

        // Check Previous SOP is Exist.If exist update prev sop expiry date , if the current sop effective date is less than the previous sop expiry date and get prev sop number
        if ($this->check_previous_sop($sop_object_id)) {
            $previous_sop_object_id = $this->get_previous_sop_object_id($sop_object_id);
            $expiry_type = $this->get_sop_revision_expiry_type($previous_sop_object_id, $current_sop_effective_date);
            if ($expiry_type == "before_expiry") {
                $previous_sop_expiry_date = $this->get_prev_sop_expiry_date($current_sop_effective_date);
                //Audit Trial for Previous Revision
                $prev_sop_obj = $this->get_sop_obj($previous_sop_object_id);
                $post_data = "SOP Name" . $prev_sop_obj->sop_name . "\nRevision : " . $prev_sop_obj->revision . "\nSupersedes : " . $prev_sop_obj->supersedes . "\nExpiry Date Changed from " . $prev_sop_obj->expiry_date . " To " . $previous_sop_expiry_date;
                add_sop_audit_trial($sop_object_id, $sop_type, 'update_effective_date', $post_data, 'Successfully Updated');
                $this->update_expiry_date($previous_sop_object_id, $previous_sop_expiry_date);
            }
            /** set is_latest_revision is no */
            $this->update_sop_is_latest_revision($previous_sop_object_id, 'false');
            $sop_number = $this->set_sop_no_for_revised_sop($previous_sop_object_id);
        }
        // get the sop live number of the generated sop
        if ($current_sop_revision == "00") {
            $sop_number = $this->get_sop_live_no($sop_type, 'update');
        }
        $usop_master_obj = new DB_Public_lm_sop_master();
        $usop_master_obj->whereAdd("sop_object_id ='$sop_object_id'");
        $usop_master_obj->sop_no = $sop_number;
        $usop_master_obj->effective_date = $effective_date;
        $usop_master_obj->expiry_date = $expiry_date;
        $usop_master_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

        //Audit Trial for SOP
        $sop_obj = $this->get_sop_obj($sop_object_id);
        $post_data = "SOP Name" . $sop_obj->sop_name . "\nRevision : " . $sop_obj->revision . "\nEffective Date : " . $current_sop_effective_date . "\nExpiry Date " . get_modified_date_format($expiry_date);
        add_sop_audit_trial($sop_object_id, $sop_type, 'update_effective_date', $post_data, 'Successfully Updated');
        return true;
    }

    function get_sop_draft_no($sop_type_id, $method) {
        $business_object = "sop";
        $sop_type = $this->get_sop_type($sop_type_id);
        $sub_business_object = $sop_type . "-D";

        $buss_object = new DB_Public_business_object();
        $buss_object->get("object_name", $business_object);
        $object_id = $buss_object->object_id;

        $sub = new DB_Public_sub_business_object();
        $sub->get('sub_object_name', $sub_business_object);
        $sub_id = $sub->sub_object_id;

        $sequence = new Sequence;
        $sop_draft_number = $sequence->sop_draft_number_sequence($object_id, $sub_id);
        if ($method == "update") {
            $sequence->update_number_sequence($object_id, $sub_id);
        }
        return $sop_draft_number;
    }

    function get_sop_live_no($sop_type, $method) {
        $business_object = "sop";
        $sop_type = $this->get_sop_type($sop_type);
        $sub_business_object = $sop_type;

        $buss_object = new DB_Public_business_object();
        $buss_object->get("object_name", $business_object);
        $object_id = $buss_object->object_id;

        $sub = new DB_Public_sub_business_object();
        $sub->get('sub_object_name', $sub_business_object);
        $sub_id = $sub->sub_object_id;

        $sequence = new Sequence;
        $sop_number = $sequence->sop_number_sequence($object_id, $sub_id);
        if ($method == "update") {
            $sequence->update_number_sequence($object_id, $sub_id);
        }
        return $sop_number;
    }

    function update_expiry_date($sop_object_id, $expiry_date) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_master->expiry_date = $expiry_date;
        $sop_master->update();
        return true;
    }

    function get_sop_expiry_date($date) {
        $sop_expiry_year = get_sop_expiry_year();
        $effective_date = str_replace('/', '-', $date);
        $effective_date = date('Y-m-d', strtotime($effective_date));
        list($year, $month, $day, $h, $i, $s) = split('[/.-]', $effective_date);
        $expiry_date = date('Y-m-d', mktime($h, $i, $s, $month, $day, $year + $sop_expiry_year));
        return $expiry_date;
    }

    function get_prev_sop_expiry_date($date) {
        $effective_date = str_replace('/', '-', $date);
        $effective_date = date('Y-m-d', strtotime($effective_date));
        list($year, $month, $day, $h, $i, $s) = split('[/.-]', $effective_date);
        $expiry_date = date('Y-m-d', mktime($h, $i, $s, $month, $day - 1, $year));
        return $expiry_date;
    }

    function get_published_status($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_expiry_date = $sop_master->expiry_date;
        $sop_effective_date = $sop_master->effective_date;
        $date_time = date('Y-m-d G:i:s');
        if ($sop_master->status == "Dropped") {
            return $status = "Dropped";
        } else if ($sop_master->status == "Cancelled") {
            return $status = "Cancelled";
        } else if ($sop_master->status == "Transferred") {
            return $status = "Transferred";
        } else if ($sop_expiry_date == NULL || $sop_expiry_date == "") {
            return $status = "Draft";
        } else if ($sop_expiry_date < $date_time) {
            return $status = "SOP Expired";
        } else if (($sop_effective_date > $date_time)) {
            return $status = "Published and Inactive";
        } else if (($sop_effective_date <= $sop_expiry_date)) {
            return $status = "Published and Active";
        }
    }

    function revise_sop_revision($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        if ($sop_master->get("sop_object_id", $sop_object_id) && $sop_master->is_latest_revision == 'true') {
            $zerofill = strlen($sop_master->revision);
            $value = intval($sop_master->revision);
            $revised_revision_val = $value + 1;
            $revised_revision = str_pad($revised_revision_val, $zerofill, "0", STR_PAD_LEFT);
        }
        return $revised_revision;
    }

    function revise_sop_format_revision($format_object_id) {
        $sop_format_master = new DB_Public_lm_sop_format_master();
        if ($sop_format_master->get("format_object_id", $format_object_id) && $sop_format_master->is_latest_revision == 'true') {
            $zerofill = strlen($sop_format_master->revision);
            $value = intval($sop_format_master->revision);
            $revised_revision_val = $value + 1;
            $revised_revision = str_pad($revised_revision_val, $zerofill, "0", STR_PAD_LEFT);
        }
        return $revised_revision;
    }

    function revise_sop_annexure_revision($annexure_object_id) {
        $sop_annexure_master = new DB_Public_lm_sop_annexure_master();
        if ($sop_annexure_master->get("annexure_object_id", $annexure_object_id) && $sop_annexure_master->is_latest_revision == 'true') {
            $zerofill = strlen($sop_annexure_master->revision);
            $value = intval($sop_annexure_master->revision);
            $revised_revision_val = $value + 1;
            $revised_revision = str_pad($revised_revision_val, $zerofill, "0", STR_PAD_LEFT);
        }
        return $revised_revision;
    }

    function get_revise_sop_format_supersedes($format_object_id) {
        $format_master = new DB_Public_lm_sop_format_master();
        if ($format_master->get("format_object_id", $format_object_id) && $format_master->is_latest_revision == 'true') {
            if ($format_master->supersedes == "Nil") {
                $revised_supersedes = "00";
            } else {
                $zerofill = strlen($format_master->supersedes);
                $value = intval($format_master->supersedes);
                if (!empty($value)) {
                    $revised_supersedes_val = $value + 1;
                    $revised_supersedes = str_pad($revised_supersedes_val, $zerofill, "0", STR_PAD_LEFT);
                } else {
                    $revised_supersedes = $format_master->supersedes;
                }
            }
        }
        return $revised_supersedes;
    }

    function get_revise_sop_annexure_supersedes($annexure_object_id) {
        $annexure_master = new DB_Public_lm_sop_annexure_master();
        if ($annexure_master->get("annexure_object_id", $annexure_object_id) && $annexure_master->is_latest_revision == 'true') {
            if ($annexure_master->supersedes == "Nil") {
                $revised_supersedes = "00";
            } else {
                $zerofill = strlen($annexure_master->supersedes);
                $value = intval($annexure_master->supersedes);
                if (!empty($value)) {
                    $revised_supersedes_val = $value + 1;
                    $revised_supersedes = str_pad($revised_supersedes_val, $zerofill, "0", STR_PAD_LEFT);
                } else {
                    $revised_supersedes = $annexure_master->supersedes;
                }
            }
        }
        return $revised_supersedes;
    }

    function update_sop_is_revised($sop_object_id, $is_revised) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_master->is_revised = $is_revised;
        $sop_master->update();
        return true;
    }

    function update_sop_is_latest_revision($sop_object_id, $is_latest_revision) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $sop_object_id);
        $sop_master->is_latest_revision = $is_latest_revision;
        $sop_master->update();
        return true;
    }

    function is_sop_eligible_for_revise($sop_object_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        if ($sop_no_obj->find()) {
            while ($sop_no_obj->fetch()) {
                if (!empty($sop_no_obj->sop_no)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    function get_sop_revise_list($sop_type_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_type='$sop_type_id'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        $sop_no_obj->orderBy('sop_no');
        if ($sop_no_obj->find()) {
            $sop_liveno_list = array();
            while ($sop_no_obj->fetch()) {
                if (($this->is_sop_eligible_for_revise($sop_no_obj->sop_object_id) == true) && (!empty($sop_no_obj->sop_no))) {
                    $sop_liveno_list[] = clone $sop_no_obj;
                }
            }
            return $sop_liveno_list;
        } else {
            return null;
        }
    }

    function is_sop_eligible_to_transfer($sop_object_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        if ($sop_no_obj->find()) {
            while ($sop_no_obj->fetch()) {
                if (!empty($sop_no_obj->sop_no)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    function get_sop_to_transfer_list($sop_type_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_type='$sop_type_id'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        $sop_no_obj->orderBy('sop_no');
        if ($sop_no_obj->find()) {
            $sop_liveno_list = array();
            while ($sop_no_obj->fetch()) {
                if (($this->is_sop_eligible_to_transfer($sop_no_obj->sop_object_id) == true) && (!empty($sop_no_obj->sop_no))) {
                    $sop_liveno_list[] = clone $sop_no_obj;
                }
            }
            return $sop_liveno_list;
        } else {
            return null;
        }
    }

    function is_sop_eligible_to_drop($sop_object_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        if ($sop_no_obj->find()) {
            while ($sop_no_obj->fetch()) {
                if (!empty($sop_no_obj->sop_no)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    function get_sop_to_drop_list($sop_type_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_type='$sop_type_id'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        $sop_no_obj->orderBy('sop_no');
        if ($sop_no_obj->find()) {
            $sop_liveno_list = array();
            while ($sop_no_obj->fetch()) {
                if (($this->is_sop_eligible_to_drop($sop_no_obj->sop_object_id) == true) && (!empty($sop_no_obj->sop_no))) {
                    $sop_liveno_list[] = clone $sop_no_obj;
                }
            }
            return $sop_liveno_list;
        } else {
            return null;
        }
    }

    function is_sop_eligible_for_extend($sop_object_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        $extend_days = get_sop_extend_days();
        if ($sop_no_obj->find()) {
            while ($sop_no_obj->fetch()) {
                $today = date('Y-m-d');
                $sop_expired_on = $sop_no_obj->expiry_date;
                $highlight_date = date("Y-m-d", strtotime("$sop_expired_on 0 years 0 months -$extend_days days"));
                if ($today >= $highlight_date) {
                    return TRUE;
                }
            }
        } else {
            return FALSE;
        }
    }

    function get_sop_extend_list($sop_type_id) {
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);

        $sop_no_obj = new DB_Public_lm_sop_master();
        $sop_no_obj->whereAdd("is_latest_revision='true'");
        $sop_no_obj->whereAdd("is_revised='no'");
        $sop_no_obj->whereAdd("status='Completed'");
        $sop_no_obj->whereAdd("sop_type='$sop_type_id'");
        $sop_no_obj->whereAdd("sop_plant='$usr_plant_id'");
        $sop_no_obj->orderBy('sop_no');
        if ($sop_no_obj->find()) {
            $sop_liveno_list = array();
            while ($sop_no_obj->fetch()) {
                if (($this->is_sop_eligible_for_extend($sop_no_obj->sop_object_id) == true) && (!empty($sop_no_obj->sop_no))) {
                    $sop_liveno_list[] = clone $sop_no_obj;
                }
            }
            return $sop_liveno_list;
        } else {
            return null;
        }
    }

    function check_previous_sop($revised_sop_object_id) {
        $sop_rev_master = new DB_Public_lm_sop_revision_master();
        $sop_rev_master->whereAdd("revised_sop_object_id='$revised_sop_object_id'");
        $sop_rev_master->find();
        while ($sop_rev_master->fetch()) {
            return TRUE;
        }
        return FALSE;
    }

    function get_sop_revision_expiry_type($prev_sop_object_id, $effective_date) {
        $sop_obj = new DB_Public_lm_sop_master();
        $sop_obj->get('sop_object_id', $prev_sop_object_id);
        $sop_effective_date = str_replace('/', '-', $effective_date);
        $sop_effective_date = date('Y-m-d', strtotime($sop_effective_date));
        list($year, $month, $day, $h, $i, $s) = split('[/.-]', $sop_effective_date);
        $current_sop_effective_date = date('Y-m-d', mktime($h, $i, $s, $month, $day, $year));
        if ($current_sop_effective_date <= $sop_obj->expiry_date) {
            $type = "before_expiry";
        } else {
            $type = "after_expiry";
        }
        return $type;
    }

    function get_previous_sop_object_id($revised_sop_object_id) {
        $sop_rev_master = new DB_Public_lm_sop_revision_master();
        $sop_rev_master->get('revised_sop_object_id', $revised_sop_object_id);
        $previous_sop_object_id = $sop_rev_master->prev_sop_object_id;
        return $previous_sop_object_id;
    }

    function get_sop_revision_history($unique_name) {
        $sop_history_obj = new DB_Public_lm_sop_master();
        $sop_history_obj->orderBy('revision');
        $sop_history_obj->whereAdd("uname='$unique_name'");
        $sop_history_obj->find();
        while ($sop_history_obj->fetch()) {
            $sop_type = $this->get_sop_type($sop_history_obj->sop_type);
            $sop_no = $this->get_sop_no($sop_history_obj->sop_object_id);
            $sop_name = $sop_history_obj->sop_name;
            $revision = $sop_history_obj->revision;
            $supersedes = $sop_history_obj->supersedes;
            if (!empty($sop_history_obj->effective_date)) {
                $effective_date = get_modified_date_format($sop_history_obj->effective_date);
                $expiry_date = get_modified_date_format($sop_history_obj->expiry_date);
            } else {
                $effective_date = "";
                $expiry_date = "";
            }
            $is_latest_revision = $sop_history_obj->is_latest_revision;
            $status = $this->get_published_status($sop_history_obj->sop_object_id);
            $sop_history_details[] = array('sop_object_id' => $sop_history_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'cc_no' => $sop_history_obj->cc_no, 'status' => $status);
        }
        return $sop_history_details;
    }

    function set_sop_no_for_revised_sop($prev_sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get('sop_object_id', $prev_sop_object_id);
        return $sop_master->sop_no;
    }

    function get_sop_format_no($format_object_id) {
        $format_master = new DB_Public_lm_sop_format_master();
        $format_master->get('format_object_id', $format_object_id);
        $sop_no = $this->get_sop_no($format_master->sop_object_id);
        //$format_no = $sop_no."/".$format_master->format_no.".".$format_master->revision_desc.$format_master->revision;
        $format_no = $sop_no . "-" . $format_master->format_no;
        return $format_no;
    }

    function get_sop_annexure_no($annexure_object_id) {
        $annexure_master = new DB_Public_lm_sop_annexure_master();
        $annexure_master->get('annexure_object_id', $annexure_object_id);
        $sop_no = $this->get_sop_no($annexure_master->sop_object_id);
        $annexure_no = $sop_no . "-" . $annexure_master->annexure_no;
        return $annexure_no;
    }

    function get_formatlist($sop_object_id) {
        $sop_formats_details = new DB_Public_lm_sop_format_master();
        $sop_formats_details->orderBy('format_no');
        $sop_formats_details->whereAdd("sop_object_id='$sop_object_id'");
        $count = 1;
        if ($sop_formats_details->find()) {
            while ($sop_formats_details->fetch()) {
                $format_revision = $sop_formats_details->revision_desc . $sop_formats_details->revision;
                $format_no = $this->get_sop_format_no($sop_formats_details->format_object_id);
                $format_details_obj = new DB_Public_lm_sop_format_details();
                $format_details_obj->get('format_object_id', $sop_formats_details->format_object_id);

                $formatlist[] = array('sop_object_id' => $sop_formats_details->sop_object_id, 'format_object_id' => $sop_formats_details->format_object_id, "format_name" => $sop_formats_details->format_name, "format_no" => $format_no, "format_desc" => $sop_formats_details->format_desc, "format_creator_dept" => getDepartment($sop_formats_details->format_department), "format_revision" => $format_revision, "revision" => $sop_formats_details->revision, "supersedes" => $sop_formats_details->supersedes, "created_by" => getFullName($sop_formats_details->created_by), "created_time" => $sop_formats_details->created_time, "is_latest_revision" => $sop_formats_details->is_latest_revision, "status" => $sop_formats_details->status, 'count' => $count, 'format_content_details' => $format_details_obj->format_content);
                $count++;
            }
            return $formatlist;
        } else {
            return null;
        }
    }

    function get_annexurelist($sop_object_id) {
        $sop_annexure_details = new DB_Public_lm_sop_annexure_master();
        $sop_annexure_details->orderBy('annexure_no');
        $sop_annexure_details->whereAdd("sop_object_id='$sop_object_id'");
        $count = 1;
        if ($sop_annexure_details->find()) {
            while ($sop_annexure_details->fetch()) {
                $annexure_no = $this->get_sop_annexure_no($sop_annexure_details->annexure_object_id);
                $annexure_details_obj = new DB_Public_lm_sop_annexure_details();
                $annexure_details_obj->get('annexure_object_id', $sop_annexure_details->annexure_object_id);
                $annexure_format_no = get_sop_annexure_format_no($sop_annexure_details->annexure_format_no);
                $annexurelist[] = array('sop_object_id' => $sop_annexure_details->sop_object_id, 'annexure_object_id' => $sop_annexure_details->annexure_object_id, "annexure_name" => $sop_annexure_details->annexure_name, "annexure_no" => $annexure_no, "annexure_desc" => $sop_annexure_details->annexure_desc, "annexure_creator_dept" => getDepartment($sop_annexure_details->annexure_department), "revision" => $sop_annexure_details->revision, "supersedes" => $sop_annexure_details->supersedes, "created_by" => getFullName($sop_annexure_details->created_by), "created_time" => $sop_annexure_details->created_time, "is_latest_revision" => $sop_annexure_details->is_latest_revision, "status" => $sop_annexure_details->status, 'count' => $count, 'annexure_content_details' => $annexure_details_obj->annexure_content, 'annexure_format_no' => $annexure_format_no);
                $count++;
            }
            return $annexurelist;
        } else {
            return null;
        }
    }

    function total_sop_count() {
        $lm_sop_master_obj = new DB_Public_lm_sop_master();
        $lm_sop_master_obj->find();
        while ($lm_sop_master_obj->fetch()) {
            $countlist[] = array();
        }
        return count($countlist);
    }

    function total_sop_count_plant_wise($plant_id) {
        $lm_sop_master_obj = new DB_Public_lm_sop_master();
        $lm_sop_master_obj->whereAdd("sop_plant='$plant_id'");
        $lm_sop_master_obj->find();
        while ($lm_sop_master_obj->fetch()) {
            $countlist[] = array();
        }
        return count($countlist);
    }

    function get_sop_status_count($sop_status) {
        $lm_sop_master_obj = new DB_Public_lm_sop_master();
        $lm_sop_master_obj->find();
        while ($lm_sop_master_obj->fetch()) {
            if ($sop_status == $this->get_published_status($lm_sop_master_obj->sop_object_id)) {
                $countlist[] = array();
            }
        }
        return count($countlist);
    }

    function get_sop_status_count_plantwise($sop_status, $plant_id) {
        $lm_sop_master_obj = new DB_Public_lm_sop_master();
        $lm_sop_master_obj->whereAdd("sop_plant='$plant_id'");
        $lm_sop_master_obj->find();
        while ($lm_sop_master_obj->fetch()) {
            if ($sop_status == $this->get_published_status($lm_sop_master_obj->sop_object_id)) {
                $countlist[] = array();
            }
        }
        return count($countlist);
    }

    function get_life_cycle_comments() {
        $sop_imp_obj = new DB_Public_lm_sop_improvement();
        $sop_imp_obj->find();
        while ($sop_imp_obj->fetch()) {
            $sop_obj = new DB_Public_lm_sop_master();
            $sop_obj->get("sop_object_id", $sop_imp_obj->sop_object_id);

            $commented_by = getFullName($sop_imp_obj->commented_by);
            $commented_by_dept = getDeptName($sop_imp_obj->commented_by);
            $comments = $sop_imp_obj->comments;
            $comments_date = $sop_imp_obj->commented_date;
            $sop_name = $sop_obj->sop_name;
            $sop_no = $this->get_sop_no($sop_imp_obj->sop_object_id);
            $sop_revision = $sop_obj->revision;
            $user_image_file = get_user_image($sop_imp_obj->commented_by);
            list($year, $month, $day, $h, $i, $s) = sscanf(date('Y-m-d H:i:s'), '%4s-%2s-%2s %2s:%2s:%2s');
            $highlight = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $day - 60, $year));
            if ($highlight < $sop_imp_obj->commented_date) {
                $commentlist[] = array("commented_by" => $commented_by, "commented_by_dept" => $commented_by_dept, "comments" => $comments, "comments_date" => $comments_date, "sop_name" => $sop_name, "sop_no" => $sop_no, "revision" => $sop_revision, "sop_object_id" => $sop_imp_obj->sop_object_id, "user_image_file" => $user_image_file);
            }
        }
        return $commentlist;
    }

    function sop_expiry_notification() {
        $sop_obj = new DB_Public_lm_sop_master();
        $sop_obj->find();
        while ($sop_obj->fetch()) {
            if ($sop_obj->expiry_date != "" && $sop_obj->is_revised == "no") {
                list($year, $month, $day, $h, $i, $s) = sscanf(date('Y-m-d'), '%4s-%2s-%2s');
                $highlight = date('Y-m-d', mktime($h, $i, $s, $month, $day + 30, $year));
                $sop_name = $sop_obj->sop_name;
                $sop_no = $this->get_sop_no($sop_obj->sop_object_id);
                $sop_revision = $sop_obj->revision;
                if ($highlight > $sop_obj->expiry_date) {
                    $expiry_details[] = array("sop_name" => $sop_name, "sop_no" => $sop_no, "revision" => $sop_revision, "effective_date" => $sop_obj->effective_date, "expiry_date" => $sop_obj->expiry_date, "is_revised" => $sop_obj->is_revised, "sop_object_id" => $sop_obj->sop_object_id);
                }
            }
        }
        return $expiry_details;
    }

    function get_carry_off_sop() {
        $sop_obj = new DB_Public_lm_sop_master();
        $sop_obj->find();
        while ($sop_obj->fetch()) {
            if ($sop_obj->effective_date != "") {
                $sop_name = $sop_obj->sop_name;
                $sop_no = $this->get_sop_no($sop_obj->sop_object_id);
                $sop_revision = $sop_obj->revision;
                $sop_published_status = $this->get_published_status($sop_obj->sop_object_id);
                //if($sop_published_status=="Published and InActive"){
                list($year, $month, $day, $h, $i, $s) = sscanf(date('Y-m-d'), '%4s-%2s-%2s');
                $highlight = date('Y-m-d', mktime($h, $i, $s, $month, $day, $year));
                if ($highlight < $sop_obj->effective_date) {
                    $carry_off_sop_details[] = array("sop_name" => $highlight, "sop_no" => $sop_no, "revision" => $sop_revision, "effective_date" => $sop_obj->effective_date, "expiry_date" => $sop_obj->expiry_date, "is_revised" => $sop_obj->is_revised, "sop_object_id" => $sop_obj->sop_object_id);
                }
                // }
            }
        }
        return $carry_off_sop_details;
    }

    function get_recent_authorized_sop() {
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id like 'sop.details:%'");
        $workflow_obj->whereAdd("lm_workflow_status like 'Authorized'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $sop_obj = new DB_Public_lm_sop_master();
            $sop_obj->get("sop_object_id", $workflow_obj->object_id);

            list($year, $month, $day, $h, $i, $s) = sscanf(date('Y-m-d H:i:s'), '%4s-%2s-%2s %2s:%2s:%2s');
            $highlight = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $day - 30, $year));
            if ($highlight < $workflow_obj->lm_workflow_date) {
                $sop_name = $sop_obj->sop_name;
                $sop_no = $this->get_sop_no($workflow_obj->object_id);
                $sop_revision = $sop_obj->revision;
                $authorized_details[] = array("sop_name" => $sop_name, "sop_no" => $sop_no, "revision" => $sop_revision, "authorized_date" => $workflow_obj->lm_workflow_date, "sop_object_id" => $workflow_obj->object_id);
            }
        }
        return $authorized_details;
    }

    function get_sop_remarks($sop_object_id, $usr_id) {
        $sop_remarks = new DB_Public_lm_sop_remarks();
        $sop_remarks->whereAdd("sop_object_id='$sop_object_id'");
        $sop_remarks->whereAdd("remarks_user='$usr_id'");
        $sop_remarks->find();
        while ($sop_remarks->fetch()) {
            $user_name = getFullName($sop_remarks->remarks_user);
            $department = getDeptName($sop_remarks->remarks_user);
            $sop_remarks_array[] = ['username' => $user_name, 'department_name' => $department, 'remarks' => trim($sop_remarks->remarks), 'date_time' => get_modified_date_time_format($sop_remarks->remarks_date)];
        }
        return $sop_remarks_array;
    }

    function is_sop_eligible_to_complete_training($sop_object_id) {
        $sop_meeting_obj = new DB_Public_lm_sop_meeting_attendance();
        $sop_meeting_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_meeting_obj->find();
        while ($sop_meeting_obj->fetch()) {
            return true;
        }
        return false;
    }

    function check_trainee_exist($sop_object_id, $meeting_object_id, $trainee) {
        $sop_trainee_obj = new DB_Public_lm_sop_meeting_attendance();
        $sop_trainee_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_trainee_obj->whereAdd("meeting_object_id='$meeting_object_id'");
        $sop_trainee_obj->find();
        while ($sop_trainee_obj->fetch()) {
            if ($sop_trainee_obj->attended_user == $trainee)
                return true;
        }
        return false;
    }

    function check_sop_trainee_nah_exist($sop_object_id, $meeting_object_id, $trainee) {
        $sop_trainee_obj = new DB_Public_lm_sop_meeting_attendance_nah();
        $sop_trainee_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_trainee_obj->whereAdd("meeting_object_id='$meeting_object_id'");
        $sop_trainee_obj->find();
        while ($sop_trainee_obj->fetch()) {
            if ($sop_trainee_obj->attended_user == $trainee)
                return true;
        }
        return false;
    }

    function get_sop_trainees_list($sop_object_id) {
        $trainee_obj = new DB_Public_lm_sop_meeting_attendance();
        $trainee_obj->whereAdd("sop_object_id='$sop_object_id'");
        $count = 1;
        if ($trainee_obj->find()) {
            while ($trainee_obj->fetch()) {
                $trainee_name = getFullName($trainee_obj->attended_user);
                $trainee_dpt = getDeptName($trainee_obj->attended_user);
                $sop_training_date_time = $this->get_sop_training_date($trainee_obj->meeting_object_id) . " " . $this->get_sop_training_time($trainee_obj->meeting_object_id);
                $trainees_array[] = array('trainee_name' => $trainee_name, 'trainee_dept' => $trainee_dpt, 'training_date' => $sop_training_date_time, 'trainee_id' => $trainee_obj->attended_user, 'count' => $count);
                $count++;
            }
            return $trainees_array;
        } else {
            return null;
        }
    }

    function get_sop_nah_trainees_list($sop_object_id) {
        $trainee_obj = new DB_Public_lm_sop_meeting_attendance_nah();
        $trainee_obj->whereAdd("sop_object_id='$sop_object_id'");
        $count = 1;
        if ($trainee_obj->find()) {
            while ($trainee_obj->fetch()) {
                $trainee_name = $trainee_obj->attended_user;
                $trainee_dpt = getDepartment($trainee_obj->dept);
                $sop_training_date_time = $this->get_sop_training_date($trainee_obj->meeting_object_id) . " " . $this->get_sop_training_time($trainee_obj->meeting_object_id);
                $trainees_array[] = array('trainee_name' => $trainee_name, 'trainee_dept' => $trainee_dpt, 'training_date' => $sop_training_date_time, 'trainee_id' => $trainee_obj->attended_user, 'count' => $count);
                $count++;
            }
            return $trainees_array;
        } else {
            return null;
        }
    }

    function add_sop_training_details($sop_object_id, $is_training_req, $trainer, $training_date, $training_time, $venu, $status, $usr_id, $date_time, $meeting_link) {
        $sequence_object = new Sequence;
        $id = "meet_schedule:" . $sequence_object->get_next_sequence();

        $ameeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $ameeting_schedule_obj->sop_object_id = $sop_object_id;
        $ameeting_schedule_obj->is_training_required = $is_training_req;
        $ameeting_schedule_obj->trainer = $trainer;
        $ameeting_schedule_obj->training_date = $training_date;
        $ameeting_schedule_obj->training_time = $training_time;
        $ameeting_schedule_obj->venue = $venu;
        $ameeting_schedule_obj->created_by = $usr_id;
        $ameeting_schedule_obj->created_time = $date_time;
        $ameeting_schedule_obj->modified_by = $usr_id;
        $ameeting_schedule_obj->modified_time = $date_time;
        $ameeting_schedule_obj->status = $status;
        $ameeting_schedule_obj->object_id = $id;
        $ameeting_schedule_obj->is_latest = "yes";
        $ameeting_schedule_obj->meeting_link = $meeting_link;
        $ameeting_schedule_obj->insert();
        return true;
    }

    function update_sop_training_details($object_id, $sop_object_id, $trainer, $training_date, $training_time, $venu, $status, $usr_id, $date_time, $meeting_link) {
        $umeeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $umeeting_schedule_obj->whereAdd("object_id='$object_id'");
        $umeeting_schedule_obj->whereAdd("sop_object_id='$sop_object_id'");
        $umeeting_schedule_obj->trainer = $trainer;
        $umeeting_schedule_obj->training_date = $training_date;
        $umeeting_schedule_obj->training_time = $training_time;
        $umeeting_schedule_obj->venue = $venu;
        $umeeting_schedule_obj->modified_by = $usr_id;
        $umeeting_schedule_obj->modified_time = $date_time;
        $umeeting_schedule_obj->status = $status;
        $umeeting_schedule_obj->meeting_link = $meeting_link;
        $umeeting_schedule_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_sop_training_date($object_id) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->get("object_id", $object_id);
        $scheduled_training_date = $meeting_schedule_obj->training_date;
        $scheduled_training_date = str_replace('/', '-', $scheduled_training_date);
        $scheduled_training_date = date('Y-m-d', strtotime($scheduled_training_date));
        return $scheduled_training_date;
    }

    function get_sop_training_time($object_id) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->get("object_id", $object_id);
        return $meeting_schedule_obj->training_time;
    }

    function delete_sop_training_details($sop_object_id) {
        $dmeeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $dmeeting_schedule_obj->whereAdd("sop_object_id='$sop_object_id'");
        $dmeeting_schedule_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_sop_training_details($sop_object_id, $is_training_required = null, $is_latest = null) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->orderBy('created_time');
        $meeting_schedule_obj->whereAdd("sop_object_id='$sop_object_id'");
        if (!empty($is_training_required)) {
            $meeting_schedule_obj->whereAdd("is_training_required='$is_training_required'");
        }
        if (!empty($is_latest)) {
            $meeting_schedule_obj->whereAdd("is_latest='$is_latest'");
        }
        $meeting_schedule_obj->find();
        $count = 1;
        while ($meeting_schedule_obj->fetch()) {
            $sop_training_trainer = getFullName($meeting_schedule_obj->trainer);
            $sop_training_trainer_dept = getDeptName($meeting_schedule_obj->trainer);
            if (!empty($meeting_schedule_obj->training_date)) {
                $sop_training_date_time = $meeting_schedule_obj->training_date . " " . $meeting_schedule_obj->training_time;
                $sop_training_date_time = get_modified_date_format($this->get_sop_training_date($meeting_schedule_obj->object_id)) . " " . $this->get_sop_training_time($meeting_schedule_obj->object_id);
            }
            $sop_training_venue = $meeting_schedule_obj->venue;
            $sop_training_details[] = array('object_id' => $meeting_schedule_obj->object_id, "trainer" => $sop_training_trainer, 'trainer_id' => $meeting_schedule_obj->trainer, 'trainer_dept' => $sop_training_trainer_dept, 'training_date' => $sop_training_date_time, 'training_venue' => $sop_training_venue, 'status' => $meeting_schedule_obj->status, 'count' => $count);
            $count++;
        }
        return $sop_training_details;
    }

    function get_sop_training_is_required($sop_object_id) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->get("sop_object_id", $sop_object_id);
        return $meeting_schedule_obj->is_training_required;
    }

    function is_sop_training_exist($sop_object_id) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        if ($meeting_schedule_obj->get("sop_object_id", $sop_object_id)) {
            return true;
        } else {
            return false;
        }
    }

    function get_sop_training_object_id($sop_object_id, $is_training_required, $is_latest) {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->whereAdd("sop_object_id='$sop_object_id'");
        $meeting_schedule_obj->whereAdd("is_training_required='$is_training_required'");
        $meeting_schedule_obj->whereAdd("is_latest='$is_latest'");
        $meeting_schedule_obj->find();
        while ($meeting_schedule_obj->fetch()) {
            return $meeting_schedule_obj->object_id;
        }
    }

    function sop_name_exist($sop_name) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->find();
        while ($sop_master->fetch()) {
            if ($sop_name == $sop_master->sop_name) {
                return true;
            }
        }
        return FALSE;
    }

    function format_name_exist($format_name, $sop_object_id) {
        $format_master = new DB_Public_lm_sop_format_master();
        $format_master->whereAdd("sop_object_id='$sop_object_id'");
        $format_master->find();
        while ($format_master->fetch()) {
            if ($format_name == $format_master->format_name) {
                return true;
            }
        }
        return FALSE;
    }

    function annexure_name_exist($annexure_name, $sop_object_id) {
        $annexure_master = new DB_Public_lm_sop_annexure_master();
        $annexure_master->whereAdd("sop_object_id='$sop_object_id'");
        $annexure_master->find();
        while ($annexure_master->fetch()) {
            if ($annexure_name == $annexure_master->annexure_name) {
                return true;
            }
        }
        return FALSE;
    }

    function check_prev_formatno($object, $sop_type) {
        $prev_format_obj = new DB_Public_lm_formatno_list();
        $prev_format_obj->whereAdd("object='$object'");
        $prev_format_obj->whereAdd("sop_type='$sop_type'");
        $prev_format_obj->find();
        while ($prev_format_obj->fetch()) {
            if ($prev_format_obj->is_latest_revision == "yes") {
                return TRUE;
            }
        }
        return FALSE;
    }

    function update_format_no_validto_revision($object, $sop_type, $valid_to, $revision) {
        $format_obj = new DB_Public_lm_formatno_list();
        $format_obj->whereAdd("object='$object'");
        $format_obj->whereAdd("sop_type='$sop_type'");
        $format_obj->whereAdd("is_latest_revision='yes'");
        $format_obj->valid_to = $valid_to;
        $format_obj->is_latest_revision = $revision;
        $format_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function upcoming_training_details() {
        $meeting_schedule_obj = new DB_Public_lm_sop_meeting_schedule();
        $meeting_schedule_obj->whereAdd("is_latest='yes'");
        $meeting_schedule_obj->whereAdd("status='Training Scheduled'");
        $meeting_schedule_obj->whereAdd("is_training_required='yes'");
        if ($meeting_schedule_obj->find()) {
            while ($meeting_schedule_obj->fetch()) {
                $trainer_name = getFullName($meeting_schedule_obj->trainer);
                $trainer_dept = getDeptName($meeting_schedule_obj->trainer);
                $user_image_file = get_user_image($meeting_schedule_obj->trainer);
                $venue = $meeting_schedule_obj->venue;
                $training_date = $meeting_schedule_obj->training_date . " " . $meeting_schedule_obj->training_time;

                $sop_master = new DB_Public_lm_sop_master();
                $sop_master->get("sop_object_id", $meeting_schedule_obj->sop_object_id);
                $sop_no = $this->get_sop_no($sop_master->sop_object_id);
                $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_master->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
                $sop_name = $sop_master->sop_name;
                $sop_revision = $sop_master->revision;

                $scheduled_training_date = str_replace('/', '-', $meeting_schedule_obj->training_date);
                $scheduled_training_date = date('Y-m-d', strtotime($scheduled_training_date));

                $today_date = date('Y-m-d');
                //var_dump($today_date<=$scheduled_training_date);
                if ($today_date <= $scheduled_training_date) {
                    $sop_training_array[] = ['trainer_name' => $trainer_name, 'trainer_dept' => $trainer_dept, 'venue' => $venue, 'training_date' => $training_date, "sop_name" => $sop_name, "sop_revision" => $sop_revision, "sop_no" => $sop_no, 'user_image_file' => $user_image_file, 'sop_object_id' => $meeting_schedule_obj->sop_object_id];
                }
            }
            return $sop_training_array;
        } else {
            return null;
        }
    }

    function get_lastet_format_no_id($object, $sop_type) {
        $format_obj = new DB_Public_lm_formatno_list();
        $format_obj->whereAdd("object='$object'");
        $format_obj->whereAdd("sop_type='$sop_type'");
        $format_obj->whereAdd("is_latest_revision='yes'");
        $format_obj->find();
        $format_obj->fetch();
        return $format_obj->object_id;
    }

    function get_interlinked_sop_master_obj($sop_object_id) {
        $interlink_sop_master_obj = new DB_Public_lm_interlinked_sop_master();
        $interlink_sop_master_obj->get("sop_object_id", $sop_object_id);
        return $interlink_sop_master_obj;
    }

    function get_interlinked_sop_list($sop_object_id) {
        $interlink_sop_obj = new DB_Public_lm_interlinked_sop_list();
        $interlink_sop_master_obj = $this->get_interlinked_sop_master_obj($sop_object_id);
        $interlink_sop_obj->whereAdd("interlink_sop_master_id='$interlink_sop_master_obj->object_id'");
        $interlink_sop_obj->find();
        $count = 1;
        while ($interlink_sop_obj->fetch()) {
            $sop_master = new DB_Public_lm_sop_master();
            $sop_master->get("sop_object_id", $interlink_sop_obj->interlinked_sop_id);
            if (!empty($sop_master->sop_no)) {
                $sop_no = $sop_master->sop_no;
            } else {
                $sop_no = $sop_master->sop_draft_no;
            }
            $insterlinked_sop_array[] = array("sop_no" => $sop_no, 'sop_name' => $sop_master->sop_name, 'count' => $count);
            $count++;
        }
        return $insterlinked_sop_array;
    }

    function get_interlinked_sop_users_list($sop_object_id) {
        $interlink_sop_users_obj = new DB_Public_lm_interlinked_sop_mail_users_list();
        $interlink_sop_master_obj = $this->get_interlinked_sop_master_obj($sop_object_id);
        $interlink_sop_users_obj->whereAdd("interlink_sop_master_id='$interlink_sop_master_obj->object_id'");
        $interlink_sop_users_obj->find();
        $count = 1;
        while ($interlink_sop_users_obj->fetch()) {
            $full_name = getFullName($interlink_sop_users_obj->mail_send_to);
            $dept = getDeptName($interlink_sop_users_obj->mail_send_to);
            $insterlinked_sop_users_array[] = array("user_name" => $full_name, 'dept' => $dept, 'count' => $count);
            $count++;
        }
        return $insterlinked_sop_users_array;
    }

    function is_interlinked_sop_exist($sop_object_id) {
        $interlink_sop_master_obj = new DB_Public_lm_interlinked_sop_master();
        if ($interlink_sop_master_obj->get("sop_object_id", $sop_object_id)) {
            return true;
        } else {
            return false;
        }
    }

    function pre_loaded_template_list($object_id = null, $is_moved = null) {
        $pre_loaded_template_obj = new DB_Public_lm_pre_loaded_template();
        if (!empty($object_id)) {
            $pre_loaded_template_obj->whereAdd("object_id='$object_id'");
        }
        if (!empty($is_moved)) {
            $pre_loaded_template_obj->whereAdd("is_moved='$is_moved'");
        }
        $pre_loaded_template_obj->find();
        $count = 1;
        while ($pre_loaded_template_obj->fetch()) {
            if (!empty($pre_loaded_template_obj->sop_object_id)) {
                $sop_no = $this->get_sop_no($pre_loaded_template_obj->sop_object_id);
                if (preg_match("/sop.details:/", $pre_loaded_template_obj->sop_reference)) {
                    $sop_ref = $this->get_sop_no($pre_loaded_template_obj->sop_reference);
                } elseif (preg_match("/sop.format:/", $pre_loaded_template_obj->sop_reference)) {
                    $sop_ref = $this->get_sop_format_no($pre_loaded_template_obj->sop_reference);
                } elseif (preg_match("/sop.format:/", $pre_loaded_template_obj->sop_reference)) {
                    $sop_ref = $this->get_sop_annexure_no($pre_loaded_template_obj->sop_reference);
                } else {
                    $sop_ref = null;
                }
                $moved_time = get_modified_date_time_format($pre_loaded_template_obj->moved_date);
            } else {
                $sop_no = null;
                $moved_time = null;
            }
            $pre_loaded_template_list[] = array(
                'name' => $pre_loaded_template_obj->name, 'object_id' => $pre_loaded_template_obj->object_id, 'is_moved' => $pre_loaded_template_obj->is_moved,
                'moved_sop_object_id' => $pre_loaded_template_obj->sop_object_id, 'sop_no' => $sop_no, 'sop_ref' => $sop_ref, 'created_by_id' => $pre_loaded_template_obj->created_by, 'created_by' => getFullName($pre_loaded_template_obj->created_by),
                'created_time' => get_modified_date_time_format($pre_loaded_template_obj->created_time), 'modified_by_id' => $pre_loaded_template_obj->modified_by,
                'modified_by' => getFullName($pre_loaded_template_obj->modified_by), 'modified_time' => get_modified_date_time_format($pre_loaded_template_obj->modified_time),
                'moved_by_id' => $pre_loaded_template_obj->moved_by, 'moved_by' => getFullName($pre_loaded_template_obj->moved_by), 'moved_time' => $moved_time
            );
            $count++;
        }
        return $pre_loaded_template_list;
    }

    function get_pre_loaded_template_obj($object_id) {
        $pre_loaded_template_obj = new DB_Public_lm_pre_loaded_template();
        $pre_loaded_template_obj->get("object_id", $object_id);
        return $pre_loaded_template_obj;
    }

    function sop_list($sop_type = null, $sop_name = null, $sop_no = null, $revision = null, $year = null, $month = null, $is_latest_revision = null, $published_status = null, $sop_effective_date_from = null, $sop_effective_date_to = null, $sop_expiry_date_from = null, $sop_expiry_date_to = null, $department = null, $userid = null, $user_plant = null, $status = null) {
        $sop_obj = new DB_Public_lm_sop_master();
        $sop_obj->orderBy('created_time');
        if ($sop_type == "All" || $sop_type == "NA") {
            
        } else {
            $sop_obj->whereAdd("sop_type='$sop_type'");
        }
        if ($sop_name != "NA") {
            $sop_name1 = str_replace("*", "%", $sop_name);
            $sop_obj->whereAdd("sop_name like '$sop_name1'");
        }
        if ($revision != "NA") {
            $sop_obj->whereAdd("revision='$revision'");
        }
        if ($year != "NA") {
            $sop_obj->whereAdd("created_year='$year'");
        }
        if ($month != "NA") {
            $sop_obj->whereAdd("created_month='$month'");
        }
        if ($is_latest_revision != "NA") {
            $sop_obj->whereAdd("is_latest_revision='$is_latest_revision'");
        }
        if ($sop_no != "NA") {
            $sop_obj->whereAdd("sop_draft_no='$sop_no'");
            $sop_obj->whereAdd("sop_no='$sop_no'", "OR");
        }
        if ($sop_effective_date_from != "NA") {
            list($year, $month, $day, $h, $i, $s) = sscanf($sop_effective_date_from, '%2s/%2s/%4s %2s:%2s:%2s');
            $modified_effective_date_from = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
        }
        if ($sop_effective_date_to != "NA") {
            list($year, $month, $day, $h, $i, $s) = sscanf($sop_effective_date_to, '%2s/%2s/%4s %2s:%2s:%2s');
            $modified_effective_date_to = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
        }
        if (($sop_effective_date_from != "NA") && ($sop_effective_date_to != "NA")) {
            $sop_obj->whereAdd("effective_date >='$modified_effective_date_from'");
            $sop_obj->whereAdd("effective_date <='$modified_effective_date_to'");
        }
        if (($sop_effective_date_from == "NA") && ($sop_effective_date_to != "NA")) {
            $sop_obj->whereAdd("effective_date <='$modified_effective_date_to'");
        }
        if (($sop_effective_date_from != "NA") && ($sop_effective_date_to == "NA")) {
            $sop_obj->whereAdd("effective_date >='$modified_effective_date_from'");
        }
        if (($sop_effective_date_from == "NA") && ($sop_effective_date_to == "NA")) {
            
        }
        if ($sop_expiry_date_from != "NA") {
            list($year, $month, $day, $h, $i, $s) = sscanf($sop_expiry_date_from, '%2s/%2s/%4s %2s:%2s:%2s');
            $modified_expiry_date_from = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
        }
        if ($sop_expiry_date_to != "NA") {
            list($year, $month, $day, $h, $i, $s) = sscanf($sop_expiry_date_to, '%2s/%2s/%4s %2s:%2s:%2s');
            $modified_expiry_date_to = date('Y-m-d H:i:s', mktime($h, $i, $s, $month, $year, $day));
        }
        if (($sop_expiry_date_from != "NA") && ($sop_expiry_date_to != "NA")) {
            $sop_obj->whereAdd("expiry_date >='$modified_expiry_date_from'");
            $sop_obj->whereAdd("expiry_date <='$modified_expiry_date_to'");
        }
        if (($sop_expiry_date_from == "NA") && ($sop_expiry_date_to != "NA")) {
            $sop_obj->whereAdd("expiry_date <='$modified_expiry_date_to'");
        }
        if (($sop_expiry_date_from != "NA") && ($sop_expiry_date_to == "NA")) {
            $sop_obj->whereAdd("expiry_date >='$modified_expiry_date_from'");
        }
        if (($sop_expiry_date_from == "NA") && ($modified_expiry_date_to == "NA")) {
            
        }
        if ($department != "NA") {
            $sop_obj->whereAdd("sop_department='$department'");
        }
        if ($userid != "NA") {
            $sop_obj->whereAdd("created_by='$userid'");
        }
        if ($user_plant != "NA") {
            $sop_obj->whereAdd("sop_plant='$user_plant'");
        }
        if ($status != "NA") {
            $sop_obj->whereAdd("status='$status'");
        }
        if ($sop_obj->find()) {
            while ($sop_obj->fetch()) {
                $sop_type = $this->get_sop_type($sop_obj->sop_type);
                $sop_no = $this->get_sop_no($sop_obj->sop_object_id);
                $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_obj->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
                $sop_name = $sop_obj->sop_name;
                $revision = $sop_obj->revision;
                $supersedes = $sop_obj->supersedes;
                $created_by_org = getOrganization(getUserOrganizationId($sop_obj->created_by));
                if (!empty($sop_obj->effective_date)) {
                    $effective_date = get_modified_date_format($sop_obj->effective_date);
                } else {
                    $effective_date = "";
                }
                $expiry_date = $sop_obj->expiry_date;
                $is_latest_revision = $sop_obj->is_latest_revision;
                $pub_status = $this->get_published_status($sop_obj->sop_object_id);
                if ($published_status != "NA") {
                    if ($published_status == $this->get_published_status($sop_obj->sop_object_id)) {
                        $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $pub_status);
                    }
                } else {
                    $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $pub_status);
                }
            }
        } else {
            $sop_list = null;
        }
        return $sop_list;
    }

    function search_sop_by_content($content) {
        $sop_details_obj = new DB_Public_lm_sop_details();
        $content1 = str_replace("*", "%", $content);
        $sop_details_obj->whereAdd("sop_content ilike '%$content1%'");
        if ($sop_details_obj->find()) {
            while ($sop_details_obj->fetch()) {
                $sop_obj = $this->get_sop_obj($sop_details_obj->sop_object_id);
                $sop_type = $this->get_sop_type($sop_obj->sop_type);
                $sop_no = $this->get_sop_no($sop_obj->sop_object_id);
                $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_obj->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
                $sop_name = $sop_obj->sop_name;
                $revision = $sop_obj->revision;
                $supersedes = $sop_obj->supersedes;
                //$created_by_org = getOrganization(getUserOrganizationId($sop_obj->created_by));
                if (!empty($sop_obj->effective_date)) {
                    $effective_date = get_modified_date_format($sop_obj->effective_date);
                } else {
                    $effective_date = "";
                }
                $expiry_date = $sop_obj->expiry_date;
                $is_latest_revision = $sop_obj->is_latest_revision;
                $pub_status = $this->get_published_status($sop_obj->sop_object_id);
                $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $pub_status);
            }
            return $sop_list;
        }
        return null;
    }

    function get_sop_obj($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get("sop_object_id", $sop_object_id);
        return $sop_master;
    }

    function get_sop_workflow_remarks($sop_object_id) {
        $sop_remarks = new DB_Public_lm_sop_remarks();
        $sop_remarks->whereAdd("sop_object_id='$sop_object_id'");
        $sop_remarks->find();
        while ($sop_remarks->fetch()) {
            $sop_remarks_array[] = array('username' => getFullName($sop_remarks->remarks_user), 'department_name' => getDeptName($sop_remarks->remarks_user), 'remarks' => trim($sop_remarks->remarks), 'date_time' => get_modified_date_time_format($sop_remarks->remarks_date));
        }
        return $sop_remarks_array;
    }

    function add_sop_workflow_remarks($sop_object_id, $comments, $usr_id, $date_time) {
        $lm_sop_remarks_obj = new DB_Public_lm_sop_remarks();
        $lm_sop_remarks_obj->sop_object_id = $sop_object_id;
        $lm_sop_remarks_obj->remarks_date = $date_time;
        $lm_sop_remarks_obj->remarks_user = $usr_id;
        $lm_sop_remarks_obj->remarks = $comments;
        $lm_sop_remarks_obj->insert();
        return true;
    }

    function get_sop_suggestion_details($sop_object_id) {
        $view_sop_imp_obj = new DB_Public_lm_sop_improvement();
        $view_sop_imp_obj->whereAdd("sop_object_id='$sop_object_id'");
        $view_sop_imp_obj->find();
        while ($view_sop_imp_obj->fetch()) {
            $sop_received_suggestion_array[] = array("object_id" => $view_sop_imp_obj->object_id, 'username' => getFullName($view_sop_imp_obj->commented_by), 'department_name' => getDeptName($view_sop_imp_obj->commented_by), 'comments' => trim($view_sop_imp_obj->comments), 'date_time' => get_modified_date_time_format($view_sop_imp_obj->commented_date), "comment_reviewed_by" => getFullName($view_sop_imp_obj->comment_reviewed_by), "imp_status" => $view_sop_imp_obj->comment_implementation_status, "reviewer_comments" => $view_sop_imp_obj->reviewer_comments, "reviewer_date" => $view_sop_imp_obj->reviewed_date);
        }
        return $sop_received_suggestion_array;
    }

    function add_sop_online_exam($sop_object_id, $is_exam_required, $status, $usr_id, $date_time) {
        $sequence_object = new Sequence;
        $id = "sop_exam:" . $sequence_object->get_next_sequence();

        $aexam_obj = new DB_Public_lm_sop_online_exam_details();
        $aexam_obj->object_id = $id;
        $aexam_obj->sop_object_id = $sop_object_id;
        $aexam_obj->is_exam_required = $is_exam_required;
        $aexam_obj->status = $status;
        $aexam_obj->created_by = $usr_id;
        $aexam_obj->created_time = $date_time;
        $aexam_obj->modified_by = $usr_id;
        $aexam_obj->modified_time = $date_time;
        $aexam_obj->insert();
        return true;
    }

    function get_sop_online_exam_is_required($sop_object_id) {
        $exam_obj = new DB_Public_lm_sop_online_exam_details();
        $exam_obj->get("sop_object_id", $sop_object_id);
        return $exam_obj->is_exam_required;
    }

    function get_sop_online_exam_status($sop_object_id) {
        $exam_obj = new DB_Public_lm_sop_online_exam_details();
        $exam_obj->get("sop_object_id", $sop_object_id);
        return $exam_obj->status;
    }

    function update_sop_online_exam_status($sop_object_id, $status) {
        $online_exam_obj = new DB_Public_lm_sop_online_exam_details();
        $online_exam_obj->get('sop_object_id', $sop_object_id);
        $online_exam_obj->status = $status;
        $online_exam_obj->update();
        return true;
    }

    function add_sop_tf_question($sop_object_id, $type, $question_array, $qns_options_array, $ans_array, $order_array, $usr_id, $date_time) {
        if (!empty($question_array)) {
            for ($i = 0; $i < count($question_array); $i++) {
                $sequence_object = new Sequence;
                $qid = "sop_qns:" . $sequence_object->get_next_sequence();
                $aqns_obj = new DB_Public_lm_sop_question_master();
                $aqns_obj->object_id = $qid;
                $aqns_obj->sop_object_id = $sop_object_id;
                $aqns_obj->type = $type;
                $aqns_obj->question = $question_array[$i];
                $aqns_obj->answer_no = $ans_array[$i];
                $aqns_obj->order1 = $order_array[$i];
                $aqns_obj->created_by = $usr_id;
                $aqns_obj->created_time = $date_time;
                $aqns_obj->modified_by = $usr_id;
                $aqns_obj->modified_time = $date_time;
                if ($aqns_obj->insert()) {
                    $ans_order = 1;
                    for ($j = 1; $j <= count($qns_options_array); $j++) {
                        $sequence_object = new Sequence;
                        $aid = "sop_qns_option:" . $sequence_object->get_next_sequence();
                        $aqns_opt_obj = new DB_Public_lm_sop_question_options();
                        $aqns_opt_obj->object_id = $aid;
                        $aqns_opt_obj->question_id = $qid;
                        $aqns_opt_obj->option = $qns_options_array[$j];
                        $aqns_opt_obj->option_no = $j;
                        $aqns_opt_obj->order1 = $ans_order;
                        $aqns_opt_obj->created_by = $usr_id;
                        $aqns_opt_obj->created_time = $date_time;
                        $aqns_opt_obj->modified_by = $usr_id;
                        $aqns_opt_obj->modified_time = $date_time;
                        $aqns_opt_obj->insert();
                        $ans_order++;
                    }
                }
            }
        }
        return true;
    }

    function add_sop_mc_question($sop_object_id, $type, $question_array, $qns_options_array, $ans_array, $order_array, $usr_id, $date_time) {
        if (!empty($question_array)) {
            for ($i = 0; $i < count($question_array); $i++) {
                $sequence_object = new Sequence;
                $qid = "sop_qns:" . $sequence_object->get_next_sequence();
                $aqns_obj = new DB_Public_lm_sop_question_master();
                $aqns_obj->object_id = $qid;
                $aqns_obj->sop_object_id = $sop_object_id;
                $aqns_obj->type = $type;
                $aqns_obj->question = $question_array[$i];
                $aqns_obj->answer_no = $ans_array[$i];
                $aqns_obj->order1 = $order_array[$i];
                $aqns_obj->created_by = $usr_id;
                $aqns_obj->created_time = $date_time;
                $aqns_obj->modified_by = $usr_id;
                $aqns_obj->modified_time = $date_time;
                if ($aqns_obj->insert()) {
                    $ans_order = 1;
                    for ($j = 1; $j <= count($qns_options_array[$i]); $j++) {
                        $sequence_object = new Sequence;
                        $aid = "sop_qns_option:" . $sequence_object->get_next_sequence();
                        $aqns_opt_obj = new DB_Public_lm_sop_question_options();
                        $aqns_opt_obj->object_id = $aid;
                        $aqns_opt_obj->question_id = $qid;
                        $aqns_opt_obj->option = $qns_options_array[$i][$j];
                        $aqns_opt_obj->option_no = $ans_order;
                        $aqns_opt_obj->order1 = $ans_order;
                        $aqns_opt_obj->created_by = $usr_id;
                        $aqns_opt_obj->created_time = $date_time;
                        $aqns_opt_obj->modified_by = $usr_id;
                        $aqns_opt_obj->modified_time = $date_time;
                        $aqns_opt_obj->insert();
                        $ans_order++;
                    }
                }
            }
        }
        return true;
    }

    function update_sop_question_ans($question_id, $ans_id) {
        $aqns_ans_obj = new DB_Public_lm_sop_question_master();
        $aqns_ans_obj->whereAdd("object_id='$question_id'");
        $aqns_ans_obj->answer = $ans_id;
        $aqns_ans_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_sop_question_master_obj($object_id) {
        $qns_master_obj = new DB_Public_lm_sop_question_master();
        $qns_master_obj->get("object_id", $object_id);
        return $qns_master_obj;
    }

    function get_sop_question_ans_list($sop_object_id) {
        $sop_qns_obj = new DB_Public_lm_sop_question_master();
        $sop_qns_obj->whereAdd("sop_object_id='$sop_object_id'");
        $sop_qns_obj->orderBy('order1');
        if ($sop_qns_obj->find()) {
            $count = 1;
            while ($sop_qns_obj->fetch()) {
                $qns_options_list = $this->get_sop_qns_options($sop_qns_obj->object_id);
                $qns_list[] = array(
                    "object_id" => $sop_qns_obj->object_id, 'sop_object_id' => $sop_qns_obj->sop_object_id, 'type' => $sop_qns_obj->type, 'question' => $sop_qns_obj->question,
                    'answer_no' => $sop_qns_obj->answer_no, 'created_by_id' => $sop_qns_obj->created_by, 'created_by_name' => getFullName($sop_qns_obj->created_by),
                    'modified_by_id' => $sop_qns_obj->modified_by, 'modified_by_name' => $sop_qns_obj->modified_by, 'created_time' => $sop_qns_obj->created_time, 'modified_time' => $sop_qns_obj->modified_time,
                    'order' => $sop_qns_obj->order1, 'qns_options' => $qns_options_list, 'count' => $count
                );
                $count++;
            }
            return $qns_list;
        }
        return null;
    }

    function get_sop_qns_options($qns_id) {
        $sop_qns_opt_obj = new DB_Public_lm_sop_question_options();
        $sop_qns_opt_obj->whereAdd("question_id='$qns_id'");
        $sop_qns_opt_obj->orderBy('order1');
        if ($sop_qns_opt_obj->find()) {
            while ($sop_qns_opt_obj->fetch()) {
                $qns_options_list[] = array(
                    "object_id" => $sop_qns_opt_obj->object_id, 'option' => $sop_qns_opt_obj->option, 'question_id' => $sop_qns_opt_obj->question_id, 'option_no' => $sop_qns_opt_obj->option_no,
                    'created_by_id' => $sop_qns_opt_obj->created_by, 'created_by_name' => getFullName($sop_qns_opt_obj->created_by),
                    'modified_by_id' => $sop_qns_opt_obj->modified_by, 'modified_by_name' => $sop_qns_opt_obj->modified_by, 'created_time' => $sop_qns_opt_obj->created_time, 'modified_time' => $sop_qns_opt_obj->modified_time,
                    'order' => $sop_qns_opt_obj->order1
                );
            }
            return $qns_options_list;
        }
        return null;
    }

    function assign_sop_exam($sop_object_id, $assigned_by, $assigned_to, $assigned_date, $target_date, $default_pass_mark, $default_attempt_limit, $attempt, $status, $attempt_status, $is_latest, $capa_no, $ran_qns_limit) {
        $target_date = str_replace('/', '-', $target_date);
        $mtarget_date = date('Y-m-d', strtotime($target_date));
        $sequence_object = new Sequence;
        $eid = "online_exam:" . $sequence_object->get_next_sequence();

        $questions_limit = count($this->get_sop_question_ans_list($sop_object_id));
        if ($ran_qns_limit <= $questions_limit) {
            $rqns_limit = $ran_qns_limit;
        } else {
            $rqns_limit = $questions_limit;
        }
        $aexam_obj = new DB_Public_lm_sop_online_exam_user_details();
        $aexam_obj->object_id = $eid;
        $aexam_obj->sop_object_id = $sop_object_id;
        $aexam_obj->assigned_by = $assigned_by;
        $aexam_obj->assigned_to = $assigned_to;
        $aexam_obj->assigned_date = $assigned_date;
        $aexam_obj->target_date = $mtarget_date;
        $aexam_obj->pass_mark = $default_pass_mark;
        $aexam_obj->attempt = $attempt;
        $aexam_obj->status = $status;
        $aexam_obj->is_latest = $is_latest;
        $aexam_obj->capa_no = $capa_no;
        $aexam_obj->question_limit = $rqns_limit;
        $aexam_obj->attempt_limit = $default_attempt_limit;
        $aexam_obj->attempt_status = $attempt_status;
        if ($aexam_obj->insert()) {
            $sop_qns_array = $this->get_sop_question_ans_list($sop_object_id);
            shuffle($sop_qns_array);
            $sop_qns_array_final = array_slice($sop_qns_array, 0, $rqns_limit);
            for ($i = 0; $i < count($sop_qns_array_final); $i++) {
                $sequence_object = new Sequence;
                $eqid = "online_exam_qns:" . $sequence_object->get_next_sequence();
                $aexam_qns_ans_obj = new DB_Public_lm_sop_online_exam_user_question_ans_details();
                $aexam_qns_ans_obj->object_id = $eqid;
                $aexam_qns_ans_obj->exam_id = $eid;
                $aexam_qns_ans_obj->question_id = $sop_qns_array_final[$i]['object_id'];
                $aexam_qns_ans_obj->ans = null;
                $aexam_qns_ans_obj->ans_date = null;
                $aexam_qns_ans_obj->insert();
            }
            return true;
        }
    }

    function get_sop_online_exam_userlist($sop_object_id = null, $exam_user = null, $status = null, $is_latest = null, $attempt_status = null) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        if (!empty($sop_object_id)) {
            $exam_user_obj->whereAdd("sop_object_id='$sop_object_id'");
        }
        if (!empty($exam_user)) {
            $exam_user_obj->whereAdd("assigned_to='$exam_user'");
        }
        if (!empty($status)) {
            $exam_user_obj->whereAdd("status='$status'");
        }
        if (!empty($is_latest)) {
            $exam_user_obj->whereAdd("is_latest='$is_latest'");
        }
        if (!empty($attempt_status)) {
            $exam_user_obj->whereAdd("attempt_status='$attempt_status'");
        }
        $exam_user_obj->orderBy('assigned_date');
        if ($exam_user_obj->find()) {
            $count = 1;
            while ($exam_user_obj->fetch()) {
                if ($exam_user_obj->attempt_status == "Not Completed") {
                    $recall_option = true;
                }
                if (!empty($exam_user_obj->exam_completed_date)) {
                    $completed_date = get_modified_date_time_format($exam_user_obj->exam_completed_date);
                } else {
                    $completed_date = null;
                }
                if (!empty($exam_user_obj->marks_scored)) {
                    $download_pdf = true;
                    $exam_result = $exam_user_obj->exam_result;
                } else {
                    $exam_result = $exam_user_obj->status;
                    $download_pdf = false;
                }
                $online_exam_user_list[] = array(
                    "object_id" => $exam_user_obj->object_id, 'sop_object_id' => $exam_user_obj->sop_object_id, 'sop_no' => $this->get_sop_no($exam_user_obj->sop_object_id), 'assigned_by_id' => $exam_user_obj->assigned_by,
                    'assigned_by' => getFullName($exam_user_obj->assigned_by), 'assigned_to_id' => $exam_user_obj->assigned_to, 'assigned_to' => getfullname($exam_user_obj->assigned_to),
                    'assigned_date' => get_modified_date_time_format($exam_user_obj->assigned_date), 'target_date' => get_modified_date_format($exam_user_obj->target_date), 'pass_mark' => $exam_user_obj->pass_mark,
                    'attempt' => $exam_user_obj->attempt, 'status' => $exam_user_obj->status, 'is_latest' => $exam_user_obj->is_latest, 'capa_no' => $exam_user_obj->capa_no, 'question_limit' => $exam_user_obj->question_limit,
                    'attempt_status' => $exam_user_obj->attempt_status, 'marks_scored' => $exam_user_obj->marks_scored, 'exam_result' => $exam_result, 'recall_option' => $recall_option,
                    'completed_date' => $completed_date, 'download_pdf' => $download_pdf, 'count' => $count
                );
                $count++;
            }
            return $online_exam_user_list;
        }
        return null;
    }

    function update_sop_online_exam_user_status($object_id, $status) {
        $uexam_status_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_status_obj->whereAdd("object_id='$object_id'");
        $uexam_status_obj->status = $status;
        if ($uexam_status_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_attempt_status($object_id, $attempt_status) {
        $uexam_status_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_status_obj->whereAdd("object_id='$object_id'");
        $uexam_status_obj->attempt_status = $attempt_status;
        if ($uexam_status_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_is_latest($object_id, $is_latest) {
        $uexam_status_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_status_obj->whereAdd("object_id='$object_id'");
        $uexam_status_obj->is_latest = $is_latest;
        if ($uexam_status_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_capa_no($object_id, $capa_no) {
        $uexam_capa_no_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_capa_no_obj->whereAdd("object_id='$object_id'");
        $uexam_capa_no_obj->capa_no = $capa_no;
        if ($uexam_capa_no_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_marks_scored($object_id, $marks) {
        $uexam_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_obj->whereAdd("object_id='$object_id'");
        $uexam_obj->marks_scored = $marks;
        if ($uexam_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_exam_result($object_id, $result) {
        $uexam_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_obj->whereAdd("object_id='$object_id'");
        $uexam_obj->exam_result = $result;
        if ($uexam_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function update_sop_online_exam_user_exam_completed_date($object_id, $completed_date) {
        $uexam_obj = new DB_Public_lm_sop_online_exam_user_details();
        $uexam_obj->whereAdd("object_id='$object_id'");
        $uexam_obj->exam_completed_date = $completed_date;
        if ($uexam_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return null;
    }

    function get_sop_online_exam_user_details($object_id) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        $exam_user_obj->whereAdd("object_id='$object_id'");
        if ($exam_user_obj->find()) {
            $count = 1;
            while ($exam_user_obj->fetch()) {
                $qns_list[] = array(
                    'exam_object_id' => $exam_user_obj->object_id, 'sop_object_id' => $exam_user_obj->sop_object_id, 'assigned_date' => get_modified_date_time_format($exam_user_obj->assigned_date),
                    'assigned_by' => getFullName($exam_user_obj->assigned_by), 'assigned_to_id' => $exam_user_obj->assigned_to, 'assigned_to' => getfullname($exam_user_obj->assigned_to),
                    'target_date' => get_modified_date_format($exam_user_obj->target_date), 'completed_date' => get_modified_date_format($exam_user_obj->exam_completed_date), 'pass_mark' => $exam_user_obj->pass_mark,
                    'attempt' => $exam_user_obj->attempt, 'marks_scored' => $exam_user_obj->marks_scored, 'result' => $exam_user_obj->exam_result, 'status' => $exam_user_obj->status, 'capa_no' => $exam_user_obj->capa_no,
                    'is_latest' => $exam_user_obj->is_latest
                );
            }
            return $qns_list;
        }
        return null;
    }

    function get_sop_online_exam_user_question_ans_details($object_id) {
        $user_qns_ans_obj = new DB_Public_lm_sop_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$object_id'");
        if ($user_qns_ans_obj->find()) {
            $count = 1;
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_sop_question_master_obj($user_qns_ans_obj->question_id);
                $qns_option_array = $this->get_sop_qns_options($user_qns_ans_obj->question_id);
                $qns_option_list[] = array(
                    'question' => $qns_master_obj->question, 'question_id' => $user_qns_ans_obj->question_id, 'exam_object_id' => $user_qns_ans_obj->exam_id,
                    'object_id' => $user_qns_ans_obj->object_id, 'exam_ans' => $user_qns_ans_obj->ans, 'exam_ans_date' => $user_qns_ans_obj->ans_date, 'qns_option_array' => $qns_option_array,
                    'correct_ans' => $qns_master_obj->answer_no, 'count' => $count
                );
                $count++;
            }
            asort($qns_option_list);
            return $qns_option_list;
        }
        return null;
    }

    function update_sop_online_exam_ans($aoe_object_id_array, $aoe_ans_array, $ans_date) {
        if (!empty($aoe_ans_array)) {
            for ($i = 0; $i < count($aoe_ans_array); $i++) {
                if (!empty($aoe_ans_array[$i])) {
                    $uans_obj_obj = new DB_Public_lm_sop_online_exam_user_question_ans_details();
                    $uans_obj_obj->whereAdd("object_id='$aoe_object_id_array[$i]'");
                    $uans_obj_obj->ans = $aoe_ans_array[$i];
                    $uans_obj_obj->ans_date = $ans_date;
                    $uans_obj_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                }
            }
        }
        return true;
    }

    function Is_not_answerd_all_sop_online_exam_questions($sop_object_id, $exam_user, $is_latest) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        $exam_user_obj->whereAdd("sop_object_id='$sop_object_id'");
        $exam_user_obj->whereAdd("assigned_to='$exam_user'");
        $exam_user_obj->whereAdd("is_latest='$is_latest'");
        if ($exam_user_obj->find()) {
            while ($exam_user_obj->fetch()) {
                $user_qns_ans_obj = new DB_Public_lm_sop_online_exam_user_question_ans_details();
                $user_qns_ans_obj->whereAdd("exam_id='$exam_user_obj->object_id'");
                $user_qns_ans_obj->find();
                while ($user_qns_ans_obj->fetch()) {
                    if ($user_qns_ans_obj->ans == "") {
                        return true;
                    }
                }
            }
        }
        return null;
    }

    function get_sop_online_exam_result($marks_scored, $pass_mark) {
        if ($marks_scored < $pass_mark) {
            return 'Failed';
        } elseif ($marks_scored >= $pass_mark) {
            return 'Pass';
        } else {
            return null;
        }
    }

    function get_sop_online_exam_mark($object_id) {
        $correct_ans = 0;
        $exam_user_obj = $this->get_sop_online_exam_user_obj($object_id);
        $question_limit = $exam_user_obj->question_limit;
        $user_qns_ans_obj = new DB_Public_lm_sop_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$object_id'");
        if ($user_qns_ans_obj->find()) {
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_sop_question_master_obj($user_qns_ans_obj->question_id);
                if ($user_qns_ans_obj->ans == $qns_master_obj->answer_no) {
                    $correct_ans++;
                }
            }
            $exam_mark = round(($correct_ans / $question_limit) * 100);
            return $exam_mark;
        }
        return null;
    }

    function can_delete_sop_question($sop_object_id) {
        $sop_master = new DB_Public_lm_sop_master();
        if ($sop_master->get("sop_object_id", $sop_object_id)) {
            if ($sop_master->status == "Waiting for Question Preparation" && $this->get_sop_online_exam_is_required($sop_object_id) == "yes" && $this->get_sop_online_exam_status($sop_object_id) == "Not Completed") {
                return true;
            }
        }
        return false;
    }

    function get_sop_online_exam_latest_user_obj($sop_object_id, $exam_user) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        $exam_user_obj->whereAdd("sop_object_id='$sop_object_id'");
        $exam_user_obj->whereAdd("assigned_to='$exam_user'");
        $exam_user_obj->whereAdd("is_latest='yes'");
        $exam_user_obj->find();
        if ($exam_user_obj->fetch()) {
            return $exam_user_obj;
        }
    }

    function get_sop_online_exam_user_obj($object_id) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        $exam_user_obj->get("object_id", $object_id);
        return $exam_user_obj;
    }

    function is_sop_online_exam_user_attempt_status_completed($sop_object_id, $status) {
        $exam_user_obj = new DB_Public_lm_sop_online_exam_user_details();
        $exam_user_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($exam_user_obj->find()) {
            while ($exam_user_obj->fetch()) {
                if ($exam_user_obj->attempt_status != $status)
                    return false;
            }
            return true;
        }
        return false;
    }

    function get_sop_meeting_schedule_mail_deptlist($sop_object_id) {
        $mail_dept_obj = new DB_Public_lm_sop_meeting_schedule_mail();
        $mail_dept_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($mail_dept_obj->find()) {
            while ($mail_dept_obj->fetch()) {
                $deptlist[] = $mail_dept_obj->mail_send_to_dept;
            }
            return $deptlist;
        } else {
            return null;
        }
    }

    function get_self_support_sop_pendinglist($usr_id) {
        $user_worklist = new DB_Public_lm_worklist();
        $user_worklist->whereAdd("work_user_id='$usr_id'");
        $user_worklist->orderBy('work_assigned_date');
        $user_worklist->find();
        $count = 1;
        while ($user_worklist->fetch()) {
            $user = new DB_Public_users();
            $user->get("user_id", $usr_id);
            $full_name = getFullName($usr_id);
            if (preg_match("/sop.details:/", $user_worklist->object_id)) {
                $sop_master = new DB_Public_lm_sop_master();
                $sop_master->get("sop_object_id", $user_worklist->object_id);
                if (!empty($sop_master->sop_no)) {
                    $sop_no = $sop_master->sop_no;
                } else {
                    $sop_no = $sop_master->sop_draft_no;
                }
                $formatlist = $this->get_formatlist($user_worklist->object_id);
                $annexurelist = $this->get_annexurelist($user_worklist->object_id);
                $user_worklist_array[] = array('user_name' => $full_name, 'type' => "SOP", 'no' => $sop_no, 'desc' => $sop_master->sop_name, 'assigned_date' => get_modified_date_time_format($user_worklist->work_assigned_date), 'status' => $sop_master->status, 'sop_object_id' => $user_worklist->object_id, 'formatlist' => $formatlist, 'annexurelist' => $annexurelist, 'count' => $count);
                $count++;
            }
        }
        return $user_worklist_array;
    }

    function add_sop_comparison($sop_object_id, $usr_id, $date_time, $action) {
        /** SOP */
        $sop_obj = new DB_Public_lm_sop_master();
        if ($sop_obj->get('sop_object_id', $sop_object_id)) {
            $sop_details_obj = new DB_Public_lm_sop_details();
            if ($sop_details_obj->get('sop_object_id', $sop_obj->sop_object_id)) {
                $gcomp_obj = new DB_Public_lm_sop_comparison();
                $gcomp_obj->whereAdd("sop_object_id='$sop_object_id'");
                $gcomp_obj->whereAdd("doc_ref_id='$sop_details_obj->sop_object_id'");
                $gcomp_obj->whereAdd("is_latest='yes'");
                if ($gcomp_obj->find()) {
                    while ($gcomp_obj->fetch()) {
                        $iteration = $gcomp_obj->iteration + 1;
                    }
                } else {
                    $iteration = 1;
                }
                $this->add_sop_comparison_content($sop_object_id, $sop_details_obj->sop_object_id, $sop_details_obj->sop_content, $usr_id, $date_time, $iteration, $action);
            }
        }

        /* Format */
        $format_obj = new DB_Public_lm_sop_format_master();
        $format_obj->whereAdd("sop_object_id='$sop_object_id'");
        $format_obj->find();
        while ($format_obj->fetch()) {
            $format_details_obj = new DB_Public_lm_sop_format_details();
            if ($format_details_obj->get('format_object_id', $format_obj->format_object_id)) {
                $gcomp_obj = new DB_Public_lm_sop_comparison();
                $gcomp_obj->whereAdd("sop_object_id='$sop_object_id'");
                $gcomp_obj->whereAdd("doc_ref_id='$format_details_obj->format_object_id'");
                $gcomp_obj->whereAdd("is_latest='yes'");
                if ($gcomp_obj->find()) {
                    while ($gcomp_obj->fetch()) {
                        $iteration = $gcomp_obj->iteration + 1;
                    }
                } else {
                    $iteration = 1;
                }
                $this->add_sop_comparison_content($sop_object_id, $format_details_obj->format_object_id, $format_details_obj->format_content, $usr_id, $date_time, $iteration, $action);
            }
        }
        /* Annexure */
        $annexure_obj = new DB_Public_lm_sop_annexure_master();
        $annexure_obj->whereAdd("sop_object_id='$sop_object_id'");
        $annexure_obj->find();
        while ($annexure_obj->fetch()) {
            $annexure_details_obj = new DB_Public_lm_sop_annexure_details();
            if ($annexure_details_obj->get('annexure_object_id', $annexure_obj->annexure_object_id)) {
                $gcomp_obj = new DB_Public_lm_sop_comparison();
                $gcomp_obj->whereAdd("sop_object_id='$sop_object_id'");
                $gcomp_obj->whereAdd("doc_ref_id='$annexure_details_obj->annexure_object_id'");
                $gcomp_obj->whereAdd("is_latest='yes'");
                if ($gcomp_obj->find()) {
                    while ($gcomp_obj->fetch()) {
                        $iteration = $gcomp_obj->iteration + 1;
                    }
                } else {
                    $iteration = 1;
                }
                $this->add_sop_comparison_content($sop_object_id, $annexure_details_obj->annexure_object_id, $annexure_details_obj->annexure_content, $usr_id, $date_time, $iteration, $action);
            }
        }
    }

    function add_sop_comparison_content($sop_object_id, $doc_ref_id, $content, $usr_id, $date_time, $iteration, $action) {
        /* Add Comparison */
        $sequence_object = new Sequence;
        $id = "sop_compare:" . $sequence_object->get_next_sequence();

        $ucomp_obj = new DB_Public_lm_sop_comparison();
        $ucomp_obj->whereAdd("sop_object_id='$sop_object_id'");
        $ucomp_obj->whereAdd("doc_ref_id='$doc_ref_id'");
        $ucomp_obj->is_latest = 'no';
        $ucomp_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

        $acomp_obj = new DB_Public_lm_sop_comparison();
        $acomp_obj->object_id = $id;
        $acomp_obj->sop_object_id = $sop_object_id;
        $acomp_obj->doc_ref_id = $doc_ref_id;
        $acomp_obj->content = $content;
        $acomp_obj->created_by = $usr_id;
        $acomp_obj->created_time = $date_time;
        $acomp_obj->is_latest = 'yes';
        $acomp_obj->iteration = $iteration;
        $acomp_obj->action = $action;
        $acomp_obj->insert();
        return true;
    }

    function get_sop_workflow_comparison($sop_object_id, $is_latest = null) {
        /** SOP */
        $sop_obj = new DB_Public_lm_sop_master();
        if ($sop_obj->get('sop_object_id', $sop_object_id)) {
            $sop_comp_obj = new DB_Public_lm_sop_comparison();
            $sop_comp_obj->whereAdd("sop_object_id='$sop_object_id'");
            $sop_comp_obj->whereAdd("doc_ref_id='$sop_object_id'");
            if (!empty($is_latest)) {
                $sop_comp_obj->whereAdd("is_latest='$is_latest'");
            }
            $sop_comp_obj->orderBy('created_time');
            $sop_comp_obj->find();
            while ($sop_comp_obj->fetch()) {
                $comp_list[] = array(
                    'object_id' => $sop_comp_obj->object_id, 'sop_object_id' => $sop_comp_obj->sop_object_id, 'doc_ref_id' => $sop_comp_obj->doc_ref_id, 'content' => $sop_comp_obj->content,
                    'created_by_id' => $sop_comp_obj->created_by, 'created_by' => getfullname($sop_comp_obj->created_by), 'is_latest' => $sop_comp_obj->is_latest,
                    'created_time' => get_modified_date_time_format($sop_comp_obj->created_time), 'iteration' => $sop_comp_obj->iteration, 'action' => $sop_comp_obj->action, 'no' => $this->get_sop_no($sop_comp_obj->doc_ref_id)
                );
            }
        }
        /* Format */
        $format_obj = new DB_Public_lm_sop_format_master();
        $format_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($format_obj->find()) {
            while ($format_obj->fetch()) {
                $sop_format_comp_obj = new DB_Public_lm_sop_comparison();
                $sop_format_comp_obj->whereAdd("sop_object_id='$sop_object_id'");
                $sop_format_comp_obj->whereAdd("doc_ref_id='$format_obj->format_object_id'");
                if (!empty($is_latest)) {
                    $sop_format_comp_obj->whereAdd("is_latest='$is_latest'");
                }
                $sop_format_comp_obj->orderBy('created_time');
                $sop_format_comp_obj->find();
                while ($sop_format_comp_obj->fetch()) {
                    $comp_list[] = array(
                        'object_id' => $sop_format_comp_obj->object_id, 'sop_object_id' => $sop_format_comp_obj->sop_object_id, 'doc_ref_id' => $sop_format_comp_obj->doc_ref_id, 'content' => $sop_format_comp_obj->content,
                        'created_by_id' => $sop_format_comp_obj->created_by, 'created_by' => getfullname($sop_format_comp_obj->created_by), 'is_latest' => $sop_format_comp_obj->is_latest,
                        'created_time' => get_modified_date_time_format($sop_format_comp_obj->created_time), 'iteration' => $sop_format_comp_obj->iteration, 'action' => $sop_format_comp_obj->action, 'no' => $this->get_sop_format_no($sop_format_comp_obj->doc_ref_id)
                    );
                }
            }
        }
        /* Annexure */
        $annexure_obj = new DB_Public_lm_sop_annexure_master();
        $annexure_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($annexure_obj->find()) {
            while ($annexure_obj->fetch()) {
                $sop_annexure_comp_obj = new DB_Public_lm_sop_comparison();
                $sop_annexure_comp_obj->whereAdd("sop_object_id='$sop_object_id'");
                $sop_annexure_comp_obj->whereAdd("doc_ref_id='$annexure_obj->annexure_object_id'");
                if (!empty($is_latest)) {
                    $sop_annexure_comp_obj->whereAdd("is_latest='$is_latest'");
                }
                $sop_annexure_comp_obj->orderBy('created_time');
                $sop_annexure_comp_obj->find();
                while ($sop_annexure_comp_obj->fetch()) {
                    $comp_list[] = array(
                        'object_id' => $sop_annexure_comp_obj->object_id, 'sop_object_id' => $sop_annexure_comp_obj->sop_object_id, 'doc_ref_id' => $sop_annexure_comp_obj->doc_ref_id, 'content' => $sop_annexure_comp_obj->content,
                        'created_by_id' => $sop_annexure_comp_obj->created_by, 'created_by' => getfullname($sop_annexure_comp_obj->created_by), 'is_latest' => $sop_annexure_comp_obj->is_latest,
                        'created_time' => get_modified_date_time_format($sop_annexure_comp_obj->created_time), 'iteration' => $sop_annexure_comp_obj->iteration, 'action' => $sop_annexure_comp_obj->action, 'no' => $this->get_sop_annexure_no($sop_annexure_comp_obj->doc_ref_id)
                    );
                }
            }
        }
        return $comp_list;
    }

    function get_sop_version_comparison($sop_object_id, $is_latest_revision = null) {
        $gsop_obj = new DB_Public_lm_sop_master();
        $gsop_obj->get("sop_object_id", $sop_object_id);
        $uname = $gsop_obj->uname;

        $sop_obj = new DB_Public_lm_sop_master();
        $sop_obj->whereAdd("uname='$gsop_obj->uname'");
        if (!empty($is_latest_revision)) {
            $sop_obj->whereAdd("is_latest_revision='$is_latest_revision'");
        }
        if ($sop_obj->find()) {
            while ($sop_obj->fetch()) {
                /* SOP */
                $sop_comp_obj = new DB_Public_lm_sop_details();
                $sop_comp_obj->get("sop_object_id", $sop_obj->sop_object_id);
                $comp_list[] = array(
                    'object_id' => $sop_obj->sop_object_id, 'sop_object_id' => $sop_obj->sop_object_id, 'content' => $sop_comp_obj->sop_content,
                    'is_latest_revision' => $sop_obj->is_latest_revision, 'created_time' => get_modified_date_time_format($sop_obj->created_time),
                    'revision' => $sop_obj->revision, 'no' => $this->get_sop_no($sop_obj->sop_object_id)
                );
                /* Format */
                $sop_format_obj = new DB_Public_lm_sop_format_master();
                $sop_format_obj->whereAdd("sop_object_id='$sop_obj->sop_object_id'");
                if (!empty($is_latest_revision)) {
                    $sop_format_obj->whereAdd("is_latest_revision='$is_latest_revision'");
                }
                if ($sop_format_obj->find()) {
                    while ($sop_format_obj->fetch()) {
                        $sop_format_comp_obj = new DB_Public_lm_sop_format_details();
                        $sop_format_comp_obj->get("format_object_id", $sop_format_obj->format_object_id);
                        $comp_list[] = array(
                            'object_id' => $sop_format_obj->format_object_id, 'sop_object_id' => $sop_format_obj->sop_object_id, 'content' => $sop_format_comp_obj->format_content,
                            'is_latest_revision' => $sop_format_obj->is_latest_revision, 'created_time' => get_modified_date_time_format($sop_format_obj->created_time),
                            'revision' => $sop_format_obj->revision, 'no' => $this->get_sop_format_no($sop_format_obj->format_object_id)
                        );
                    }
                }
                /* Annexure */
                $sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
                $sop_annexure_obj->whereAdd("sop_object_id='$sop_obj->sop_object_id'");
                if (!empty($is_latest_revision)) {
                    $sop_annexure_obj->whereAdd("is_latest_revision='$is_latest_revision'");
                }
                if ($sop_annexure_obj->find()) {
                    while ($sop_annexure_obj->fetch()) {
                        $sop_annexure_comp_obj = new DB_Public_lm_sop_annexure_details();
                        $sop_annexure_comp_obj->get("annexure_object_id", $sop_annexure_obj->annexure_object_id);
                        $comp_list[] = array(
                            'object_id' => $sop_annexure_obj->annexure_object_id, 'sop_object_id' => $sop_annexure_obj->sop_object_id, 'content' => $sop_annexure_comp_obj->annexure_content,
                            'is_latest_revision' => $sop_annexure_obj->is_latest_revision, 'created_time' => get_modified_date_time_format($sop_annexure_obj->created_time),
                            'revision' => $sop_annexure_obj->revision, 'no' => $this->get_sop_annexure_no($sop_annexure_obj->annexure_object_id)
                        );
                    }
                }
            }
        } else {
            $comp_list = null;
        }
        return $comp_list;
    }

    function is_sop_elegible_to_edit($sop_object_id, $usr_id) {
        $sop_master = new DB_Public_lm_sop_master();
        if ($sop_master->get("sop_object_id", $sop_object_id)) {
            $creator = $this->get_creater_id($sop_object_id);

            /** Edit option for Creator */
            if (($sop_master->status == "Draft Created" || $sop_master->status == "Waiting for Sending Reviewal" || $sop_master->status == "Review Need Correction" || $sop_master->status == "Approve Need Correction" || $sop_master->status == "Authorization Need Correction") && ($creator == $usr_id)) {
                if (($this->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create') && ($this->check_user_in_worklist($sop_object_id, $usr_id)))) {
                    return true;
                }
            }
        }
        return null;
    }

    function get_sop_extend_details($sop_object_id) {
        $sop_extend_obj = new DB_Public_lm_sop_extend_details();
        $sop_extend_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($sop_extend_obj->find()) {
            while ($sop_extend_obj->fetch()) {
                $mail_send_to_array = $this->get_sop_extend_mail_details($sop_extend_obj->object_id);
                $extend_details[] = array(
                    'sop_object_id' => $sop_extend_obj->sop_object_id, 'object_id' => $sop_extend_obj->object_id,
                    'extend_from' => get_modified_date_format($sop_extend_obj->extend_from), 'extend_to' => get_modified_date_format($sop_extend_obj->extend_to), 'reason' => $sop_extend_obj->reason,
                    'extended_by' => getFullName($sop_extend_obj->created_by), 'extended_time' => get_modified_date_time_format($sop_extend_obj->created_time), 'capa_no' => $sop_extend_obj->capa_no, 'mail_send_to' => $mail_send_to_array
                );
            }
            return $extend_details;
        }
        return null;
    }

    function get_sop_extend_mail_details($sop_extend_id) {
        $sop_extend_mail_obj = new DB_Public_lm_sop_extend_mail_details();
        $sop_extend_mail_obj->whereAdd("sop_extend_id='$sop_extend_id'");
        if ($sop_extend_mail_obj->find()) {
            while ($sop_extend_mail_obj->fetch()) {
                $extend_details[] = array('object_id' => $sop_extend_mail_obj->object_id, 'sop_extend_id' => $sop_extend_mail_obj->sop_extend_id, 'mail_to' => getFullName($sop_extend_mail_obj->mail_send_to));
            }
            return $extend_details;
        }
        return null;
    }

    function get_sop_dropped_details($sop_object_id) {
        $sop_drop_obj = new DB_Public_lm_sop_drop_details();
        $sop_drop_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($sop_drop_obj->find()) {
            while ($sop_drop_obj->fetch()) {
                $mail_send_to_array = $this->get_sop_dropped_mail_details($sop_drop_obj->object_id);
                $dropped_details[] = array(
                    'sop_object_id' => $sop_drop_obj->sop_object_id, 'object_id' => $sop_drop_obj->object_id,
                    'reason' => $sop_drop_obj->reason, 'dropped_by' => getFullName($sop_drop_obj->created_by), 'dropped_time' => get_modified_date_time_format($sop_drop_obj->created_time), 'cc_no' => $sop_drop_obj->cc_no, 'mail_send_to' => $mail_send_to_array
                );
            }
            return $dropped_details;
        }
        return null;
    }

    function get_sop_dropped_mail_details($sop_drop_id) {
        $sop_drop_mail_obj = new DB_Public_lm_sop_drop_mail_details();
        $sop_drop_mail_obj->whereAdd("sop_drop_id='$sop_drop_id'");
        if ($sop_drop_mail_obj->find()) {
            while ($sop_drop_mail_obj->fetch()) {
                $drop_details[] = array('object_id' => $sop_drop_mail_obj->object_id, 'sop_drop_id' => $sop_drop_mail_obj->sop_drop_id, 'mail_to' => getFullName($sop_drop_mail_obj->mail_send_to));
            }
            return $drop_details;
        }
        return null;
    }

    function get_sop_cancelled_details($sop_object_id) {
        $sop_cancel_obj = new DB_Public_lm_sop_cancel_details();
        $sop_cancel_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($sop_cancel_obj->find()) {
            while ($sop_cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'sop_object_id' => $sop_cancel_obj->sop_object_id, 'object_id' => $sop_cancel_obj->object_id,
                    'reason' => $sop_cancel_obj->reason, 'cancelled_by' => getFullName($sop_cancel_obj->created_by), 'cancelled_time' => get_modified_date_time_format($sop_cancel_obj->created_time)
                );
            }
            return $cancel_details;
        }
        return null;
    }

    function get_sop_transferred_details($sop_object_id) {
        $sop_transfer_obj = new DB_Public_lm_sop_transfer_details();
        $sop_transfer_obj->whereAdd("sop_object_id='$sop_object_id'");
        if ($sop_transfer_obj->find()) {
            while ($sop_transfer_obj->fetch()) {
                $mail_send_to_array = $this->get_sop_transferred_mail_details($sop_transfer_obj->object_id);
                $transferred_details[] = array(
                    'sop_object_id' => $sop_transfer_obj->sop_object_id, 'object_id' => $sop_transfer_obj->object_id,
                    'reason' => $sop_transfer_obj->reason, 'transferred_by' => getFullName($sop_transfer_obj->created_by), 'transferred_time' => get_modified_date_time_format($sop_transfer_obj->created_time), 'cc_no' => $sop_transfer_obj->cc_no, 'mail_send_to' => $mail_send_to_array
                );
            }
            return $transferred_details;
        }
        return null;
    }

    function get_sop_transferred_mail_details($sop_transferred_id) {
        $sop_transfer_mail_obj = new DB_Public_lm_sop_transfer_mail_details();
        $sop_transfer_mail_obj->whereAdd("sop_transfer_id='$sop_transferred_id'");
        if ($sop_transfer_mail_obj->find()) {
            while ($sop_transfer_mail_obj->fetch()) {
                $transfer_details[] = array('object_id' => $sop_transfer_mail_obj->object_id, 'sop_transfer_id' => $sop_transfer_mail_obj->sop_object_id, 'mail_to' => getFullName($sop_transfer_mail_obj->mail_send_to));
            }
            return $transfer_details;
        }
        return null;
    }

    function get_sop_download_history_details($sop_object_id) {
        $sop_obj = new DB_Public_lm_sop_master();
        if ($sop_obj->get('sop_object_id', $sop_object_id)) {
            /** SOP */
            $download_history[] = array('no' => $this->get_sop_no($sop_object_id), 'name' => $sop_obj->sop_name, 'download_history' => $this->get_sop_download_history($sop_object_id, $sop_object_id));

            /* Format */
            $format_obj = new DB_Public_lm_sop_format_master();
            $format_obj->whereAdd("sop_object_id='$sop_object_id'");
            if ($format_obj->find()) {
                while ($format_obj->fetch()) {

                    $download_history[] = array('no' => $this->get_sop_format_no($format_obj->format_object_id), 'name' => $format_obj->format_name, 'download_history' => $this->get_sop_download_history($sop_object_id, $format_obj->format_object_id));
                }
            }
            /* Annexure */
            $annexure_obj = new DB_Public_lm_sop_annexure_master();
            $annexure_obj->whereAdd("sop_object_id='$sop_object_id'");
            if ($annexure_obj->find()) {
                while ($annexure_obj->fetch()) {
                    $download_history[] = array('no' => $this->get_sop_annexure_no($annexure_obj->annexure_object_id), 'name' => $annexure_obj->annexure_name, 'download_history' => $this->get_sop_download_history($sop_object_id, $annexure_obj->annexure_object_id));
                }
            }
        }
        return $download_history;
    }

    function get_sop_download_history($sop_object_id, $ref_id) {
        $dsop_obj = new DB_Public_lm_sop_download_history();
        $dsop_obj->whereAdd("sop_object_id='$sop_object_id'");
        $dsop_obj->whereAdd("ref_id='$ref_id'");
        $count = 1;
        if ($dsop_obj->find()) {
            while ($dsop_obj->fetch()) {
                $download_history[] = array(
                    'no' => $this->get_sop_no($dsop_obj->sop_object_id), 'access_by' => getFullName($dsop_obj->user_id), 'reason' => $dsop_obj->reason, 'ip_address' => $dsop_obj->ip_address,
                    'date' => get_modified_date_time_format($dsop_obj->download_date), 'year' => $dsop_obj->year, 'month' => $dsop_obj->month, 'plant_id' => $dsop_obj->plant,
                    'plant_name' => getPlantName($dsop_obj->plant), 'dept_id' => $dsop_obj->department, 'dept' => getDepartment($dsop_obj->department), 'stage' => $dsop_obj->stage, 'count' => $count
                );
                $count++;
            }
            return $download_history;
        }
        return null;
    }

    function is_sop_pdf_page_expired($sop_object_id, $ref_id, $access_id) {
        $down_hist = new DB_Public_lm_sop_download_history();
        if ($down_hist->get("object_id", $access_id) && $down_hist->sop_object_id == $sop_object_id && $down_hist->ref_id == $ref_id) {
            $sop_access_time = $down_hist->download_date;
            $max_time_to_allow = date('Y-m-d H:i:s', strtotime('+1 minutes', strtotime($sop_access_time)));
            if ($max_time_to_allow <= date("Y-m-d H:i:s")) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    function add_sop_montioring_details($sop_object_id, $resp_per, $level, $is_active, $usr_id, $date_time) {
        if (!empty($resp_per)) {
            $sequence_object = new Sequence;
            $id = "sop_monitoring_details:" . $sequence_object->get_next_sequence();

            $aobj = new DB_Public_lm_sop_monitoring_details();
            $aobj->object_id = $id;
            $aobj->sop_object_id = $sop_object_id;
            $aobj->resp = $resp_per;
            $aobj->level = $level;
            $aobj->plant_id = getUserPlantId($resp_per);
            $aobj->dept_id = getDeptId($resp_per);
            $aobj->is_active = $is_active;
            $aobj->created_by = $usr_id;
            $aobj->created_time = $date_time;
            $aobj->modified_by = $usr_id;
            $aobj->modified_time = $date_time;
            if ($aobj->insert()) {
                return true;
            }
        }
    }

    function update_sop_monitoring_details($sop_object_id, $resp_per, $level, $usr_id, $date_time) {
        if (!empty($sop_object_id)) {
            $uobj = new DB_Public_lm_sop_monitoring_details();
            $uobj->whereAdd("sop_object_id='$sop_object_id'");
            $uobj->whereAdd("level='$level'");
            $uobj->is_active = 'no';
            $uobj->modified_by = $usr_id;
            $uobj->modified_time = $date_time;
            $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);

            if ($this->is_sop_monitoring_resp_per_exist($sop_object_id, $resp_per, $level) == true) {
                $uobj = new DB_Public_lm_sop_monitoring_details();
                $uobj->whereAdd("sop_object_id='$sop_object_id'");
                $uobj->whereAdd("level='$level'");
                $uobj->whereAdd("resp='$resp_per'");
                $uobj->plant_id = getUserPlantId($resp_per);
                $uobj->dept_id = getDeptId($resp_per);
                $uobj->is_active = 'yes';
                $uobj->modified_by = $usr_id;
                $uobj->modified_time = $date_time;
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            } else {
                if (!empty($resp_per)) {
                    $this->add_sop_montioring_details($sop_object_id, $resp_per, $level, 'yes', $usr_id, $date_time);
                }
            }
        }
        return true;
    }

    function replace_sop_monitoring_details($monitoring_object_id_array, $repl_per, $usr_id, $date_time) {
        if (!empty($repl_per)) {
            foreach ($monitoring_object_id_array as $monitoring_object_id) {
                $uobj = new DB_Public_lm_sop_monitoring_details();
                $uobj->whereAdd("object_id='$monitoring_object_id'");
                $uobj->is_active = 'no';
                $uobj->modified_by = $usr_id;
                $uobj->modified_time = $date_time;
                if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                    $gobj = new DB_Public_lm_sop_monitoring_details();
                    $gobj->get("object_id", $monitoring_object_id);
                    $this->add_sop_montioring_details($gobj->sop_object_id, $repl_per, $gobj->level, 'yes', $usr_id, $date_time);
                }
            }
        }
        return true;
    }

    function is_sop_monitoring_resp_per_exist($sop_object_id, $resp_per, $level) {
        $obj = new DB_Public_lm_sop_monitoring_details();
        $obj->whereAdd("sop_object_id='$sop_object_id'");
        $obj->whereAdd("resp='$resp_per'");
        $obj->whereAdd("level='$level'");
        if ($obj->find()) {
            return true;
        }
        return false;
    }

    function get_sop_monitoring_details($sop_object_id = null, $plant = null, $dept = null, $resp_per = null, $level = null, $is_active = null) {
        $gsopm_obj = new DB_Public_lm_sop_monitoring_details();
        if (!empty($sop_object_id)) {
            $gsopm_obj->whereAdd("sop_object_id='$sop_object_id'");
        }
        if (!empty($plant)) {
            $gsopm_obj->whereAdd("plant_id='$plant'");
        }
        if (!empty($dept)) {
            $gsopm_obj->whereAdd("dept_id='$dept'");
        }
        if (!empty($resp_per)) {
            $gsopm_obj->whereAdd("resp='$resp_per'");
        }
        if (!empty($level)) {
            $gsopm_obj->whereAdd("level='$level'");
        }
        if (!empty($is_active)) {
            $gsopm_obj->whereAdd("is_active='$is_active'");
        }
        $gsopm_obj->orderBy('level');
        $count = 1;
        if ($gsopm_obj->find()) {
            while ($gsopm_obj->fetch()) {
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $gsopm_obj->sop_object_id);

                $sop_type = $this->get_sop_type($sop_obj->sop_type);
                $sop_no = $this->get_sop_no($sop_obj->sop_object_id);
                $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_obj->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
                $sop_name = $sop_obj->sop_name;
                $revision = $sop_obj->revision;
                $supersedes = $sop_obj->supersedes;
                if (!empty($sop_obj->effective_date)) {
                    $effective_date = get_modified_date_format($sop_obj->effective_date);
                } else {
                    $effective_date = "";
                }
                $expiry_date = $sop_obj->expiry_date;
                $is_latest_revision = $sop_obj->is_latest_revision;
                $pub_status = $this->get_published_status($sop_obj->sop_object_id);

                $monitoring_details[] = array(
                    'object_id' => $gsopm_obj->object_id, 'sop_object_id' => $gsopm_obj->sop_object_id, 'resp_per_id' => $gsopm_obj->resp, 'resp_per' => getFullName($gsopm_obj->resp),
                    'resp_per_plant_id' => $gsopm_obj->plant_id, 'resp_per_plant' => getUserPlantShortName($gsopm_obj->resp), 'resp_per_dept_id' => $gsopm_obj->dept_id,
                    'resp_per_dept' => getDeptName($gsopm_obj->resp), 'level' => $gsopm_obj->level, 'is_active' => $gsopm_obj->is_active, 'sop_type' => $sop_type, 'sop_no' => $sop_no,
                    'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date,
                    'is_latest_revision' => $is_latest_revision, 'pub_status' => $pub_status, 'count' => $count
                );
                $count++;
            }
            return $monitoring_details;
        }
        return null;
    }

    function get_sop_doc_dept_permission_list($sop_object_id = null, $dept_id = null, $is_enabled = null) {
        $sop_obj = new DB_Public_lm_sop_master();
        if (!empty($sop_object_id)) {
            $sop_obj->whereAdd("sop_object_id='$sop_object_id'");
        }
        if ($sop_obj->find()) {
            while ($sop_obj->fetch()) {
                $sop_type = $this->get_sop_type($sop_obj->sop_type);
                if (!empty($sop_obj->effective_date)) {
                    $effective_date = get_modified_date_format($sop_obj->effective_date);
                } else {
                    $effective_date = "";
                }
                if (!empty($sop_obj->expiry_date)) {
                    $expiry_date = get_modified_date_format($sop_obj->expiry_date);
                } else {
                    $expiry_date = "";
                }
                if (!empty($dept_id)) {
                    $dept_per_list = get_doc_dept_permission($sop_obj->sop_object_id, $dept_id, $is_enabled);
                    if (!empty($dept_per_list)) {
                        $sop_list[] = array('name' => $sop_obj->sop_name, 'doc_no' => $this->get_sop_no($sop_obj->sop_object_id), 'revision' => $sop_obj->revision, 'supersedes' => $sop_obj->supersedes, 'sop_type' => $sop_type, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'pub_status' => $this->get_published_status($sop_obj->sop_object_id), 'dept_per_list' => $dept_per_list);
                    }
                } else {
                    $dept_per_list = get_doc_dept_permission($sop_obj->sop_object_id, null, $is_enabled);
                    $sop_list[] = array('name' => $sop_obj->sop_name, 'doc_no' => $this->get_sop_no($sop_obj->sop_object_id), 'revision' => $sop_obj->revision, 'supersedes' => $sop_obj->supersedes, 'sop_type' => $sop_type, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'pub_status' => $this->get_published_status($sop_obj->sop_object_id), 'dept_per_list' => $dept_per_list);
                }
            }
            return $sop_list;
        }
        return null;
    }

    /** SOP Stop */

    /** Doc Review Comments Start */
    function add_doc_review_comments($doc_object_id, $action, $comments_array, $comments_id_array, $commented_by, $commented_date) {
        if (!empty($doc_object_id)) {
            $action_id = $this->get_workflow_action_id($action);
            for ($i = 0; $i < count($comments_array); $i++) {
                if (!empty($comments_id_array[$i])) {
                    $udoc_review_obj = new DB_Public_lm_doc_review_comments();
                    $udoc_review_obj->whereAdd("object_id='$comments_id_array[$i]'");
                    $udoc_review_obj->comments = $comments_array[$i];
                    $udoc_review_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                } else {
                    $sequence_object = new Sequence;
                    $id = "doc_review_comments:" . $sequence_object->get_next_sequence();

                    $adoc_review_obj = new DB_Public_lm_doc_review_comments();
                    $adoc_review_obj->object_id = $id;
                    $adoc_review_obj->doc_object_id = $doc_object_id;
                    $adoc_review_obj->action = $action_id;
                    $adoc_review_obj->comments = $comments_array[$i];
                    $adoc_review_obj->commented_by = $commented_by;
                    $adoc_review_obj->commented_date = $commented_date;
                    $adoc_review_obj->accept_status = "Pending";
                    $adoc_review_obj->status = "opened";
                    $adoc_review_obj->reviewed_by = null;
                    $adoc_review_obj->reviewed_date = null;
                    $adoc_review_obj->review_comments = null;
                    $adoc_review_obj->insert();
                }
            }
            return true;
        }
    }

    function update_doc_reviewer_comments($object_id_array, $accept_status_array, $status, $reviewed_by, $reviewed_date, $review_comments) {
        if (!empty($object_id_array)) {
            for ($i = 0; $i < count($object_id_array); $i++) {
                $udoc_review_obj = new DB_Public_lm_doc_review_comments();
                $udoc_review_obj->whereAdd("object_id ='$object_id_array[$i]'");
                $udoc_review_obj->accept_status = $accept_status_array[$i];
                if (!empty($status)) {
                    $udoc_review_obj->status = $status;
                }
                $udoc_review_obj->reviewed_by = $reviewed_by;
                $udoc_review_obj->reviewed_date = $reviewed_date;
                $udoc_review_obj->reviewer_comments = $review_comments[$i];
                $udoc_review_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            }
        }
        return true;
    }

    function get_doc_review_comments($doc_object_id, $commented_by, $status) {
        $greview_obj = new DB_Public_lm_doc_review_comments();
        $greview_obj->whereAdd("doc_object_id='$doc_object_id'");
        if (!empty($commented_by)) {
            $greview_obj->whereAdd("commented_by='$commented_by'");
        }
        if (!empty($status)) {
            $greview_obj->whereAdd("status='$status'");
        }
        $greview_obj->find();
        $count = 1;
        while ($greview_obj->fetch()) {
            $action = $this->get_workflow_action_name($greview_obj->action);
            if (!empty($greview_obj->reviewed_date)) {
                $reviewed_date = get_modified_date_time_format($greview_obj->reviewed_date);
            } else {
                $reviewed_date = null;
            }
            $doc_review_comments_array[] = array(
                'object_id' => $greview_obj->object_id, 'doc_object_id' => $greview_obj->doc_object_id, 'action_id' => $greview_obj->action,
                'action' => $action, 'comments' => $greview_obj->comments, 'commented_by' => getfullname($greview_obj->commented_by), 'commented_by_id' => $greview_obj->commented_by,
                'commented_date' => get_modified_date_time_format($greview_obj->commented_date), 'accept_status' => $greview_obj->accept_status, 'status' => $greview_obj->status,
                'reviewed_by' => getfullname($greview_obj->reviewed_by), 'reviewed_by_id' => $greview_obj->reviewed_by, 'reviewed_date' => $reviewed_date,
                'reviewer_comments' => $greview_obj->reviewer_comments, 'count' => $count
            );
            $count++;
        }
        return $doc_review_comments_array;
    }

    /** Doc Review Comments Stop */
    /* Draft SOP Implementation Start */

    function get_sop_print_copy_list_details_by_userid($user_id, $operation, $label_type) {
        $pdf_operation = new DB_Public_pdf_operation();
        $pdf_operation->get("operation_name", $operation);

        $sop_pdf_obj = new DB_Public_pdf_permission();
        $sop_pdf_obj->whereAdd("user_id='$user_id'");
        $sop_pdf_obj->whereAdd("operation='$pdf_operation->operation_id'");
        $sop_pdf_obj->find();
        $count = 0;
        while ($sop_pdf_obj->fetch()) {
            $sop_print_copy_details = new DB_Public_lm_sop_print_copy();
            $sop_print_copy_details->get("object_id", $sop_pdf_obj->object);
            if ($sop_print_copy_details->is_enabled == 'yes' && $sop_print_copy_details->label_type == $label_type) {
                $sop_pdf_print_copy_details[] = array(
                    'object_id' => $sop_print_copy_details->object_id, 'copy_type' => $sop_print_copy_details->copy_type,
                    'description' => $sop_print_copy_details->description, 'copy_type_color' => $sop_print_copy_details->copy_type_color, 'count' => $count
                );
            }
        }
        if (!empty($sop_pdf_print_copy_details)) {
            return $sop_pdf_print_copy_details;
        }
        return null;
    }

    function get_sop_print_copy_list($usr_id, $sop_object_id) {
        $published_status = $this->get_published_status($sop_object_id);
        if ($published_status == "Draft" || $published_status == "Published and Inactive") {
            $print_copy_list = $this->get_sop_print_copy_list_details_by_userid($usr_id, 'download', 'draft');
        } elseif ($published_status == "Published and Active") {
            $print_copy_list = $this->get_sop_print_copy_list_details_by_userid($usr_id, 'download', 'user_defined');
        } elseif ($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") {
            $print_copy_list = $this->get_sop_print_copy_list_details_by_userid($usr_id, 'download', 'obsolete');
        } else {
            return null;
        }
        return $print_copy_list;
    }

    function is_user_can_download_sop_print_label($sop_object_id, $label_type, $is_enabled) {
        $published_status = $this->get_published_status($sop_object_id);
        if (($published_status == "Draft" || $published_status == "Published and Inactive") && ($label_type == "draft") && ($is_enabled == 'yes')) {
            return true;
        } elseif ($published_status == "Published and Active" && $label_type == "user_defined" && ($is_enabled == 'yes')) {
            return true;
        } elseif (($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") && ($label_type == "obsolete") && ($is_enabled == 'yes')) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    /* Draft SOP Implementation Stop */

    function get_cft_reviewed_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('cft_review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $cft_reviewed_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($cft_reviewed_time)) {
            return ($cft_reviewed_time);
        } else {
            return "";
        }
    }

    function get_pre_reviewed_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('pre_review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Pre Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $pre_reviewed_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($pre_reviewed_time)) {
            return ($pre_reviewed_time);
        } else {
            return "";
        }
    }

    function training_list($training_start_date = null, $training_end_date = null) {
        $trainee_obj = new DB_Public_lm_sop_meeting_schedule();
        $trainee_obj->whereAdd("is_latest ='yes'");
        $trainee_obj->orderBy('created_time');

        if ($training_start_date != "NA") {
            $modified_training_start_date = get_modified_ymd_format($training_start_date);
        }
        if ($training_end_date != "NA") {
            $modified_training_end_date = get_modified_ymd_format($training_end_date);
        }

        if (($training_start_date != "NA") && ($training_end_date != "NA")) {
            $trainee_obj->whereAdd("training_date >='$modified_training_start_date'");
            $trainee_obj->whereAdd("training_date <='$modified_training_end_date'");
        }
        if (($training_start_date == "NA") && ($training_end_date != "NA")) {
            $trainee_obj->whereAdd("training_date <='$modified_training_end_date'");
        }
        if (($training_start_date != "NA") && ($training_end_date == "NA")) {
            $trainee_obj->whereAdd("training_date >='$modified_training_start_date'");
        }
        if (($training_start_date == "NA") && ($training_end_date == "NA")) {
            
        }

        if ($trainee_obj->find()) {
            while ($trainee_obj->fetch()) {
                $online_exam_obj = new DB_Public_lm_sop_online_exam_user_details();
                $online_exam_details = $online_exam_obj->get_online_exam_details($trainee_obj->sop_object_id);
                $trainees_array[] = array(
                    'sop_object_id' => $trainee_obj->sop_object_id, 'sop_no' => $this->get_sop_no($trainee_obj->sop_object_id),
                    'sop_name' => $this->get_sop_name($trainee_obj->sop_object_id), 'training_date' => $trainee_obj->training_date,
                    'status' => $trainee_obj->status, 'trainer' => getFullname($trainee_obj->trainer), 'online_exam_details' => $online_exam_details
                );
            }
            return $trainees_array;
        } else {
            return "";
        }
    }

    function get_dept_approver_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('dept_approve');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Approved'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $approver = $workflow_obj->lm_workflow_user;
        }
        if (!empty($approver)) {
            return ($approver);
        } else {
            return "";
        }
    }

    function get_dept_approved_time_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('dept_approve');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Approved'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $dept_approved_time = get_modified_date_time_format($workflow_obj->lm_workflow_date);
        }
        if (!empty($dept_approved_time)) {
            return ($dept_approved_time);
        } else {
            return "";
        }
    }

    function get_ccm_cft_reviewer_array_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('cft_review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $ccm_process = new Ccm_Processor();
            $reviewer_remarks = $ccm_process->get_ccm_review_comments($object_id, $workflow_obj->lm_workflow_user);
            $reviwer_name = getFullName($workflow_obj->lm_workflow_user);
            $reviwer_dept = getDeptName($workflow_obj->lm_workflow_user);
            $reviewed_date_time = $this->get_reviewed_time_digital_sign($object_id);
            list($review_year, $review_month, $review_day, $review_h, $review_i, $review_s) = sscanf($reviewed_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $reviewed_year = date('Y', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_month = date('M', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_date = date('d', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_month_date = $reviewed_date . " " . $reviewed_month;
            $reviewer_image = get_user_image($workflow_obj->lm_workflow_user);

            $reviewer_array[] = array(
                'reviewer_id' => $workflow_obj->lm_workflow_user, 'reviewer' => getFullName($workflow_obj->lm_workflow_user),
                'reviewer_remarks' => $reviewer_remarks, 'reviwer_name' => $reviwer_name, '$reviwer_name' => $reviwer_name, 'reviwer_dept' => $reviwer_dept,
                'reviewed_year' => $reviewed_year, 'reviewed_month_date' => $reviewed_month_date, 'reviewed_date_time' => $reviewed_date_time, 'reviewer_image' => $reviewer_image
            );
        }
        return $reviewer_array;
    }

    function getDmsAnalyticsData($userPlantId = null, $year){        
        $obj = new DB_Public_lm_sop_master();
        $whereCondition = null;
        $whereCondition .= "WHERE DATE_PART('YEAR', created_time)=$year";
        $whereCondition .= ($userPlantId) ? "AND sop_plant='$userPlantId'" : null;
        $obj->query("SELECT count(*), status FROM {$obj->__table} $whereCondition GROUP BY status");
        
        while($obj->fetch()){
            $list[] = ['count' => $obj->count, 'status' => $obj->status];
        }
        return $list;
    }

    /*     * ***********************************************************End of DMS************************************************************* */

    function get_capa_pre_reviewer_array_id_digital_sign($object_id) {
        $action_id = $this->get_workflow_action_id('pre_review');
        $workflow_obj = new DB_Public_lm_workflow();
        $workflow_obj->whereAdd("object_id='$object_id'");
        $workflow_obj->whereAdd("lm_workflow_actions='$action_id'");
        $workflow_obj->whereAdd("lm_workflow_status='Pre Reviewed'");
        $workflow_obj->find();
        while ($workflow_obj->fetch()) {
            $capa_process = new Capa_Processor();
            $reviewer_remarks = $capa_process->get_capa_review_comments($object_id, $workflow_obj->lm_workflow_user);
            $reviwer_name = getFullName($workflow_obj->lm_workflow_user);
            $reviwer_dept = getDeptName($workflow_obj->lm_workflow_user);
            $reviewed_date_time = $this->get_pre_reviewed_time_digital_sign($object_id);
            list($review_year, $review_month, $review_day, $review_h, $review_i, $review_s) = sscanf($reviewed_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $reviewed_year = date('Y', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_month = date('M', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_date = date('d', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
            $reviewed_month_date = $reviewed_date . " " . $reviewed_month;
            $reviewer_image = get_user_image($workflow_obj->lm_workflow_user);

            $reviewer_array[] = array(
                'reviewer_id' => $workflow_obj->lm_workflow_user, 'reviewer' => getFullName($workflow_obj->lm_workflow_user),
                'reviewer_remarks' => $reviewer_remarks, 'reviwer_name' => $reviwer_name, '$reviwer_name' => $reviwer_name, 'reviwer_dept' => $reviwer_dept,
                'reviewed_year' => $reviewed_year, 'reviewed_month_date' => $reviewed_month_date, 'reviewer_image' => $reviewer_image, 'reviewed_date_time' => $reviewed_date_time,
            );
        }
        return $reviewer_array;
    }

    /*     * *********************************************************End of CCM***************************************************************** */
    /* Random Meeting Link Start */

    function get_random_meeting_link($date_time) {
        $str = rand();
        $randon_result = md5(md5($str) . md5($date_time));
        $meeting_link = "https://meet.jit.si/$randon_result";
        return $meeting_link;
    }

    /* Random Meeting Link Stop */
}
