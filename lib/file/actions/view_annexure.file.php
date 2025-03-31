<?php

/**
 * Project:     Logicmind
 * File:        view_annexure.file.php

 * @author Ananthakumar .V
 * @since 03/01/2019
 * @package sop
 * @version 1.0
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_copy_type = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$annexure_object_id = (isset($_REQUEST['annexure_id'])) ? $_REQUEST['annexure_id'] : null;
$access_id = (isset($_REQUEST['access_id'])) ? $_REQUEST['access_id'] : null;

$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $annexure_master = new DB_Public_lm_sop_annexure_master();
    if ($annexure_master->get("annexure_object_id", $annexure_object_id)) {
        if ($annexure_master->orientation == "L") {
            $annexure_orientation = "l";
        }
        if ($annexure_master->orientation == "P") {
            $annexure_orientation = "p";
        }
        Redirect("?module=file&action=view_annexure_file_{$annexure_orientation}&sop_object_id={$sop_object_id}&type={$sop_copy_type}&annexure_id={$annexure_object_id}&access_id={$access_id}", false);
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
} else {
    $error_handler->raiseError("INVALID REQUEST");
}

function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

?>
