<?php
/* Smarty version 3.1.30, created on 2024-10-01 13:09:02
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/audit/templates/ams_audit_trail.audit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbf46ee05007_15196453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be7043174c05bb37de395eb642f50d116172cbbc' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/audit/templates/ams_audit_trail.audit.tpl',
      1 => 1727788140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fbf46ee05007_15196453 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">Audit Trail</li>
            <li class="active">Audit Management System (AMS)</li>
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
                        <i class="append-icon fa fa-shopping-cart"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Audit Management System (AMS) - Audit Trail </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in widget attach_loading">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"audit_section"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div class="controls">
                                    <select class="search_audit_trail query" >
                                        <option value="">Select</option>
                                        <optgroup label="Master Data">  
                                            <option value="ams_master_sub_type_audit_trail">Audit Sub Type</option>
                                        </optgroup>
                                        <optgroup label="Work Flow">
                                            <option value="ams_wf_audit_trail">AMS Workflow</option>
                                        </optgroup>
                                    </select>
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </div>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"year"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="search_audit_trail year" >
                                        <option value="">All</option>
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
                            <div class="col-md-1">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"month"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="search_audit_trail month" >
                                        <option value="">All</option>
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
                            <div class="col-md-1 pd-0">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="plant search_audit_trail show_ams_no">
                                        <option value="">All</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plantlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
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
                                <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="dept search_audit_trail show_ams_no">
                                        <option value="">All</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['dropdwon_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
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
                                <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="user search_audit_trail">All</select>
                                </div>
                            </div>
                            <div class="col-md-2 pd-0">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"am_no"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <select class="search_audit_trail refrence_object_id am_no" disabled></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
 From</label>
                                <div class="controls">
                                    <input type="text" class="generate_datepicker search_audit_trail from_date" placeholder="YYYY/MM/DD" data-datepicker_min=-365 data-datepicker_max=0 value="<?php echo $_smarty_tpl->tpl_vars['def_start_date']->value;?>
">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
 To</label>
                                <div class="controls">
                                    <input type="text" name='to_date' class="generate_datepicker to_date search_audit_trail" placeholder="YYYY/MM/DD" data-datepicker_min=-365 data-datepicker_max=0 value="<?php echo $_smarty_tpl->tpl_vars['def_end_date']->value;?>
">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body audit_trail_result found_records" style="display: none;"> 
                        <table   class="table table-bordered table-striped audit_trail_result_table generate_datatable" title="Audit trail" data-whitespace="pre-wrap" data-sort_column=1>
                            <thead>
                                <tr>
                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
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
                                </tr>
                            </thead>
                            <tbody ></tbody>
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
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $(document).on("change", ".plant", (e) => get_dept_list($(e.target).val(), '.dept', '', '', 'All'));
            $(document).on("change", ".dept", (e) => get_dept_users($(e.target).val().split("-")[1], '.user', '', '', 'All'));
            $(document).on("change", ".query,.show_ams_no", function () {
                // loading.show();
                if ($(".query").val() !== "ams_wf_audit_trail") {
                    $(".am_no").val("").attr("disabled", true);
                } else {
                    $(".am_no").val("").removeAttr("disabled");

                    let plant = ($(".plant").val()) ?? '';
                    let dept = ($(".dept").val().split("-")[1]) ?? '';

                    x_get_qms_doc_no_list("ams", plant, dept, function (result) {
                        $(".am_no").empty();
                        let writter = '<option value="">All</option>';
                        $.each(result, function (key, val) {
                            writter += `<option value=${val.drop_down_value}>${val.drop_down_option}</option>`;
                        });
                        // $(".am_no").focus();
                        $(".am_no").append(writter);
                    });
                }
                // loading.hide();
            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
