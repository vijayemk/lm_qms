<?php

/**
 * Project:     Logicmind
 * File:        sop_search_content.sop.php
 *
 * @author Ananthakumar.v 
 * @since 10/03/2020
 * @package sop
 * @version 1.0
 * @see sop_search_content.sop.php
 */
if (!check_access($username, 'sop_search', 'yes')) {
    $error_handler->raiseError("sop_search");
}
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_search_content.sop.tpl");
?>
