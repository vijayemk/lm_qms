<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {insert_sajax_javascript} function plugin
 * Type:     function<br>
 * Name:     insert_sajax_javascript<br>
 * Purpose:  To insert the JavaScript code for making Ajax calls to the backend server
 *
 * @author Ananthakumar V
 * @param None
 *
 * @return null
 * 
 * This Smarty plugin function is called from the template file (*.tpl file).
 * e.g.: If a new plugin function is defined as: function smarty_function_abcxyz() { ... },
 *       then it is called as: {abcxyz} in the template file for calling PHP code.
 */
function smarty_function_insert_sajax_javascript()
{
    // Here, call directly the SAjax function that inserts the JavaScript code in 
    // the .tpl file processed by Smarty for making Ajax calls to backend server.
     echo sajax_get_javascript();
}

?>
