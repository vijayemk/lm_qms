<?php

/**
 * Project:     Logicmind
 * File:        calendar_month.admin.php
 *
 * @author Sivaranjani S
 * @since0 03/09/2019
 * @package mrm
 * @version 1.0
 * @see calendar_month.admin.tpl
 * */

error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$mon_obj = new CalendarMonth();
$monthlist = $mon_obj->get_month_list();
if(isset($_POST['add'])) {
    $sequence_object = new Sequence;
    $id="admin.month:".$sequence_object->get_next_sequence();
    
    $mon_obj = new CalendarMonth();
    $mon_obj->object_id = $id;
    $mon_obj->month = trim($_POST['month']);
    $mon_obj->short_name = trim($_POST['short_name']);
    $mon_obj->order1 = trim($_POST['order1']);
    $mon_obj->insert();
    header("Location:?module=admin&action=calendar_month");
}
if(isset($_POST['update'])) {
    $uobject_id = $_REQUEST['uobject_id'] ?: NULL;
    $ucal_month = $_REQUEST['umonth'] ?: NULL;
    $ushort_name = $_REQUEST['ushort'] ?: NULL;
    
    $umon_obj=new CalendarMonth();
    $umon_obj->whereAdd("object_id='$uobject_id'");
    $umon_obj->month = $ucal_month;
    $umon_obj->short_name = $ushort_name;
    $umon_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    header("Location:?module=admin&action=calendar_month");
}
$smarty->assign('month',$monthlist);
$smarty->assign('main',_TEMPLATE_PATH_."calendar_month.admin.tpl");
?>
