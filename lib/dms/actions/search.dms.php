<?php

/**
 * Project:     Logicmind
 * File:        search_dms.dms.php
 *
 * @author Sivaranjani S
 * @since 09/03/2020
 * @package dms
 * @version 1.0
 * @see search_dms.dms.tpl
 */
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign("dept_list", getDeptList(null));
$smarty->assign("dms_list", get_qms_doc_no_list("dms"));
$smarty->assign("classification_list", getClassificationMasterList());
$smarty->assign("dev_type_list", getDevTypeMasterDetailsList());
$smarty->assign('process_stage_list', getProcessStageMasterList());
$smarty->assign('productlist', getProductMasterDetails());
$smarty->assign('material_type_list', getMaterialTypeMasterDetails());
$smarty->assign("wf_status", get_dms_progress_bar_status());
$smarty->assign('main', _TEMPLATE_PATH_ . "search.dms.tpl");
?>
