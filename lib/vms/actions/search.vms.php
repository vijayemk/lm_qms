<?php

/**
 * Project:Logicmind
 * File:search_vms.vms.php
 *
 * @author Sivaranjani S,Puneet
 * @since 09/03/2020
 * @package vms
 * @version 1.0
 * @see search_vms.vms.tpl
 */

$vms_processor = new Vms_Processor();
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign("dept_list", getDeptList(null));
$smarty->assign("vms_list", get_qms_doc_no_list("vms"));
$smarty->assign("classification_list", getClassificationMasterList());
$smarty->assign('organization_list', $vms_processor->get_vms_org());
$smarty->assign('plant_list', $vms_processor->get_vms_plants());
$smarty->assign("wf_status", get_vms_progress_bar_status());
$smarty->assign('main', _TEMPLATE_PATH_ . "search.vms.tpl");
