<?php

/**
 * Project:     Logicmind
 * File:        download_sop_word.file.php
 * @author Ananthakumar .V
 * @since 19/06/2021
 * @package file
 * @version 1.0
 */
error_reporting(E_ALL & ~E_NOTICE);
$sop_object_id = $_REQUEST['sop_object_id'];
$access_id = (isset($_REQUEST['access_id'])) ? $_REQUEST['access_id'] : null;

require_once ('lib/sop/functions/Sop_Processor.func.php');
$sop_process = new Sop_Processor();

$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);

if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}

if ($sop_process->is_sop_pdf_page_expired($sop_object_id, $sop_object_id, $access_id) == true) {
    $error_handler->raiseError("PAGE EXPIRED");
}

if (!check_doc_dept_access($sop_object_id, $dept_id, 'yes')) {
    $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
}

$published_status = $sop_process->get_published_status($sop_object_id);
if (($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") && !check_access($username, 'expired_sop', 'yes')) {
    $error_handler->raiseError("expired_sop");
}

open_save($sop_object_id);

function open_save($sop_object_id) {
    ini_set('zlib.output_compression', 'Off');

    $sop_details = new DB_Public_lm_sop_details();
    $sop_details->get("sop_object_id", $sop_object_id);
    $sop_content = str_replace("&nbsp;", " ", $sop_details->sop_content);

    // header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=" . rand() . ".doc");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $sop_content;
    exit;
}

exit;
?>

