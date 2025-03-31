<?php

/**
 * Project:     Logicmind
 * File:        search_ams.ams.php
 *
 * @author Sivaranjani S
 * @since0 10/04/2021
 * @package ams
 * @version 1.0
 * @see search_ams.ams.tpl
 */
include_module("admin");
////$view_am_type_details = new AmType();
////$amtypelist = $view_am_type_details->am_type_list_details();
//
//$deptlist = get_All_DeptList();
//
//$ams_process = new Ams_Processor();
//$ams_no_list_completion = $ams_process->get_am_liveno_list_completion();
//if (!empty($ams_no_list_completion)) {
//    $smarty->assign("ams_no_list_completion", $ams_no_list_completion);
//}
//
//$org_obj = new Organization();
//$orglist = $org_obj->organizationlist();
//
//if (!empty($deptlist)) {
//    $smarty->assign("deptlist", $deptlist);
//}
//$smarty->assign('orglist', $orglist);
//$smarty->assign('plantlist', getPlantList(null, null));
//$smarty->assign("amtypelist", $amtypelist);
$smarty->assign('main', _TEMPLATE_PATH_ . "search.ams.tpl");
?>
