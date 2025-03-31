<?php

/**
 * Project:     Logicmind
 * File:        view_format.file.php

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
$format_object_id = (isset($_REQUEST['format_id'])) ? $_REQUEST['format_id'] : null;
$access_id = (isset($_REQUEST['access_id'])) ? $_REQUEST['access_id'] : null;

$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $format_master = new DB_Public_lm_sop_format_master();
    if ($format_master->get("format_object_id", $format_object_id)) {
        if ($format_master->orientation == "L") {
            $format_orientation = "l";
        }
        if ($format_master->orientation == "P") {
            $format_orientation = "p";
        }
        Redirect("?module=file&action=view_format_file_{$format_orientation}&sop_object_id={$sop_object_id}&type={$sop_copy_type}&format_id={$format_object_id}&access_id={$access_id}", false);
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
