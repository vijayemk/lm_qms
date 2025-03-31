<?php

/**
 * Project:     Logicmind
 * File:        sop_list.sop.php
 *
 * @author Ananthakumar V
 * @since 19/05/2017
 * @package sop
 * @version 1.0
 * @see sop_list.sop.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
include_module("admin");
$view_sop_type = new SopType();
$usr_id = $_SESSION['user_id'];
$usr_plant_id = getUserPlantId($usr_id);

//create object for the sop function Module
$sop_process = new Sop_Processor();
$sop_type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$pub_status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : null;

$sop_count = 0;
$sop_obj = new DB_Public_lm_sop_master();
$sop_obj->orderBy('created_time');
if (!empty($sop_type_id)) {
    $sop_obj->whereAdd("sop_type='$sop_type_id'");
}
$sop_obj->whereAdd("sop_plant='$usr_plant_id'");
if ($sop_obj->find()) {
    while ($sop_obj->fetch()) {
        $sop_type = $sop_process->get_sop_type($sop_obj->sop_type);
        $sop_no = $sop_process->get_sop_no($sop_obj->sop_object_id);
        $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_obj->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
        $sop_name = $sop_obj->sop_name;
        $revision = $sop_obj->revision;
        $supersedes = $sop_obj->supersedes;
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
        $is_latest_revision = $sop_obj->is_latest_revision;
        $status = $sop_process->get_published_status($sop_obj->sop_object_id);
        if (!empty($pub_status)) {
            if ($pub_status == $sop_process->get_published_status($sop_obj->sop_object_id)) {
                $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $status);
            }
        } else {
            $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $status);
        }
    }
}

$sop_count = count($sop_list);
if (!empty($sop_process->get_sop_type($sop_type_id))) {
    $smarty->assign("sop_type", $sop_process->get_sop_type($sop_type_id));
}
$smarty->assign("soptypelist", $view_sop_type->sop_type_list(null));
$smarty->assign("sop_list", $sop_list);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign("sop_count", $sop_count);
$smarty->assign("usr_plant_id", $usr_plant_id);
$smarty->assign("plant_list", getPlantList(null, null));
$smarty->assign("published_status", array("Cancelled" => "Cancelled", "Draft" => "Draft", "Dropped" => "Dropped", "Published and Active" => "Published and Active", "Published and Inactive" => "Published and Inactive", "SOP Expired" => "SOP Expired", "Transferred" => "Transferred"));
$smarty->assign("pub_status", $pub_status);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_list.sop.tpl");
?>
