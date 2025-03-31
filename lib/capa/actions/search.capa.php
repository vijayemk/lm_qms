<?php

/**
 * Project: Logicmind
 * File: search_capa.capa.php
 *
 * @author Sivaranjani S
 * @since 09/03/2020
 * @package capa
 * @version 1.0
 * @see search_capa.capa.tpl
 */
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign("dept_list", getDeptList(null));
$smarty->assign("capa_list", get_qms_doc_no_list("capa"));
$smarty->assign("wf_status", get_capa_progress_bar_status());
$smarty->assign('main', _TEMPLATE_PATH_ . "search.capa.tpl");

