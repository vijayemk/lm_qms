<?php
/* Smarty version 3.1.30, created on 2024-10-01 13:09:50
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/audit/templates/admin_audit_trail_qms.audit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbf49ec26ae1_41282487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a62d5c12ceda7cb045b7b9c63dfdf690abef75e6' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/audit/templates/admin_audit_trail_qms.audit.tpl',
      1 => 1726295943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fbf49ec26ae1_41282487 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link href="vendors/custom_lm/htmldiff/htmldiff_custom.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Audit Trial</li>
            <li class="active">QMS Master Data</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <span class="panel-title h4"> 
                        <i class="fa fa-th-list"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">QMS Master Data - Audit Trail </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in attach_loading">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"audit_section"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div class="controls">
                                    <select class="search_audit_trail query" >
                                        <option value="">Select</option>
                                        <option value="qms_product_master_audit_trail">Product Master</option>
                                        <option value="qms_material_type_master_audit_trail">Material Type Master</option>
                                        <option value="qms_material_sub_type_master_audit_trail">Material Sub Type Master</option>
                                        <option value="qms_instrument_equipment_type_master_audit_trail">Instrument/Equipment Type Master</option>
                                        <option value="qms_instrument_equipment_details_master_audit_trail">Instrument/Equipment Details Master</option>
                                        <option value="qms_customer_master_audit_trail">Customer Master</option>
                                        <option value="qms_market_master_audit_trail">Market Details Master</option>
                                        <option value="qms_process_stage_master_audit_trail">Process/Stage Master</option>
                                        <option value="qms_classification_master_audit_trail">Classification Master</option>
                                        <option value="qms_measurement_master_audit_trail">Unit of Measurements</option>
                                    </select>
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </div>              
                            <div class="col-md-1">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"year"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="search_audit_trail year" >
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['year_range']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"month"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="search_audit_trail month" >
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month_range']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select onchange="get_dept_users(this.options[this.selectedIndex].value, '#users');" class="search_audit_trail dept" >
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deptlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"user_name"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select id="users" class="search_audit_trail user" ></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
 From</label>
                                <div class="controls">
                                    <input type="text"  class="generate_datepicker search_audit_trail from_date date_changed" placeholder="YYYY/MM/DD" data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
" data-datepicker_max=<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
 data-date_changed="to_date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
 To</label>
                                <div class="controls">
                                    <input type="text" name='to_date' class="generate_datepicker search_audit_trail to_date" placeholder="YYYY/MM/DD" data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
" data-datepicker_max=<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
 disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body audit_trail_result found_records" style="display: none;"> 
                        <table  style='white-space: pre-wrap; word-wrap: break-word;' class="table table-bordered table-striped audit_trail_result_table generate_datatable" title="Audit trail" data-whitespace="pre-wrap">
                            <thead>
                                <tr>
                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"ip_address"),$_smarty_tpl);?>
</th>
                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"action"),$_smarty_tpl);?>
 </th>
                                    <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"new_value"),$_smarty_tpl);?>
</th>
                                    <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"old_value"),$_smarty_tpl);?>
</th>
                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="panel-body audit_trail_result no_records" style="display: none;"> 
                        <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php echo '<script'; ?>
 type="text/javascript" src="vendors/custom_lm/htmldiff/htmldiff_custom.js"><?php echo '</script'; ?>
>
<?php }
}
