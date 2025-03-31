<?php

/**
 * Project:     Logicmind
 * File:        view_stp_file.sop.php
 * @author Ananthakumar .V
 * @since 01/08/2019
 * @package file
 * @version 1.0
 */
error_reporting(E_ALL & ~E_NOTICE);
$file_id = $_REQUEST['file_id'];

$file_object = new DB_Public_file();
$file_object->object_id = $file_id;
$file_object->find();
while ($file_object->fetch()) {
    $file_hash = $file_object->hash;
    $file_size = $file_object->size;
    $file_type = $file_object->type;
    $file_name_actual = $file_object->name;
}

function open_save($file_name_actual, $file_hash, $vault) {
    ini_set('zlib.output_compression', 'Off');
    header("Content-Type: application/force-download\n");
    header("Content-Disposition: attachment; filename=$file_name_actual");
    $contents = readfile($vault . $file_hash);
    echo $contents;
    exit;
}

if (eregi("lm_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $doc_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $doc_vault);
}
if (eregi("plant_logo:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $doc_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $doc_vault);
}
if (eregi("lm_dms_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_dms_task_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_ccm_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_ccm_task_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_capa_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_capa_task_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_audit_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_ams_obr_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
if (eregi("lm_vms_doc_file:", $file_id)) {
    copy(_DOC_VAULT_ . $file_hash, _PART_TMP_ . $file_hash);
    $apqp_vault = str_replace(_PATH_ . "/", "", _DOC_VAULT_);
    open_save($file_name_actual, $file_hash, $apqp_vault);
}
exit;
?>
