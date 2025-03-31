<?php

/**
 * Project: Logicmind
 * File: search_ccm.ccm.php
 *
 * @author Sivaranjani S
 * @since 09/03/2020
 * @package ccm
 * @version 1.0
 * @see search_ccm.ccm.tpl
 */
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign("dept_list", getDeptList(null));
$smarty->assign("ccm_list", get_qms_doc_no_list("ccm"));
$smarty->assign("classification_list", getClassificationMasterList());
$smarty->assign("ccm_type_list", getChangeTypeDetails());
$smarty->assign('process_stage_list', getProcessStageMasterList());
$smarty->assign('productlist', getProductMasterDetails());
$smarty->assign('material_type_list', getMaterialTypeMasterDetails());
$smarty->assign("wf_status", get_ccm_progress_bar_status());
$smarty->assign('main', _TEMPLATE_PATH_ . "search.ccm.tpl");
