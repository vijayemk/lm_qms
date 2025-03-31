<?php

/**
 * Project: Logicmind
 * File: search.oos.php
 *
 * @author Jithin 
 * @since 24/01/2025
 * @package oos
 * @version 1.0
 * @see search.oos.php
 **/

$smarty->assign('plantLists', getPlantList(null, null));
$smarty->assign("departmentLists", getDeptList(null));
$smarty->assign("oosLists", get_qms_doc_no_list("oos"));
$smarty->assign("devTypeList", getDevTypeMasterDetailsList());
$smarty->assign("classificationLists", getClassificationMasterList());
$smarty->assign("workFlowStatus", getOOSProgressBarStatus());
$smarty->assign('materialTypeLists', getMaterialTypeMasterDetails());
$smarty->assign('processStageLists', getProcessStageMasterList());
$smarty->assign('productLists', getProductMasterDetails());


$smarty->assign('main', _TEMPLATE_PATH_ . "search.oos.tpl");

