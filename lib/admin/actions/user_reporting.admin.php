<?php

/**
 * Project:     Logicmind
 * File:        user_reporting.sop.php
 *
 * @author Ananthakumar.v 
 * @since 11/03/2020
 * @package sop
 * @version 1.0
 * @see user_reporting.sop.php
 */
$deptlist = get_All_DeptList();
if (isset($_POST['update_user_reporting'])) {
    $usr_id = $_SESSION['user_id'];
    $date_time = date('Y-m-d G:i:s');
    
    $guser = (isset($_POST['guser'])) ? $_POST['guser'] : null;
    $rlevel1_to_array = (isset($_POST['rlevel1_to'])) ? $_POST['rlevel1_to'] : null;
    $rlevel2_to_array = (isset($_POST['rlevel2_to'])) ? $_POST['rlevel2_to'] : null;
    $rlevel3_to_array = (isset($_POST['rlevel3_to'])) ? $_POST['rlevel3_to'] : null;

    /** Delete previous action */
    $dobj = new DB_Public_user_reporting();
    $dobj->whereAdd("user_id='$guser'");
    $dobj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

    for ($i = 0; $i < count($rlevel1_to_array); $i++) {
        $aobj = new DB_Public_user_reporting();
        $aobj->user_id = $guser;
        $aobj->level = 'level1';
        $aobj->reporting_to = $rlevel1_to_array[$i];
        $aobj->reporting_to_dept = getdeptId($rlevel1_to_array[$i]);
        $aobj->created_by = $usr_id;
        $aobj->created_time = $date_time;
        $aobj->insert();
    }
    for ($i = 0; $i < count($rlevel2_to_array); $i++) {
        $aobj = new DB_Public_user_reporting();
        $aobj->user_id = $guser;
        $aobj->level = 'level2';
        $aobj->reporting_to = $rlevel2_to_array[$i];
        $aobj->reporting_to_dept = getdeptId($rlevel2_to_array[$i]);
        $aobj->created_by = $usr_id;
        $aobj->created_time = $date_time;
        $aobj->insert();
    }
    for ($i = 0; $i < count($rlevel3_to_array); $i++) {
        $aobj = new DB_Public_user_reporting();
        $aobj->user_id = $guser;
        $aobj->level = 'level3';
        $aobj->reporting_to = $rlevel3_to_array[$i];
        $aobj->reporting_to_dept = getdeptId($rlevel3_to_array[$i]);
        $aobj->created_by = $usr_id;
        $aobj->created_time = $date_time;
        $aobj->insert();
    }
    header("Location:$_SERVER[REQUEST_URI]");
}

$smarty->assign('deptlist', $deptlist);
$smarty->assign('main', _TEMPLATE_PATH_ . "user_reporting.admin.tpl");
?>
