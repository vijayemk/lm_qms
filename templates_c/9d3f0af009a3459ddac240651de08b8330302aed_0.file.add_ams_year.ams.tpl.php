<?php
/* Smarty version 3.1.30, created on 2024-10-01 13:27:01
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/ams/templates/add_ams_year.ams.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbf8a58c00c0_35491157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d3f0af009a3459ddac240651de08b8330302aed' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/ams/templates/add_ams_year.ams.tpl',
      1 => 1725078201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fbf8a58c00c0_35491157 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Add </li>
            <li class="active">AMS </li>
            <li class="active">Add Audit </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_add_ams_year">Add Audit Year</a> </h4>
                </div>
                <div id="collapse_add_ams_year" class="panel-collapse collapse in">
                    <div class="panel-body">  
                        <div class="vd_content-section clearfix">
                            <div class="panel-heading bordered vd_bg-blue">
                                <h3 class="panel-title vd_white font-semibold">INPUT FORM</h3>
                            </div>
                            <div class="panel-body panel-bd-left">
                                <!-- Add Audit Year Form -->
                                <form name="add_ams_year-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_ams_year-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"start_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="generate_datepicker date_changed" name="adev_date_of_occ" title="Select Valid Date" data-datepicker_min=0 >
                                            </div>
                                        </div>
                                        <div class="col-md-3"2>
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"end_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="generate_datepicker" name="adev_date_of_occ" title="Select Valid Date" data-datepicker_min=0>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls">
                                                <textarea name="wf_remarks" rows="3" title="Enter Valid Remarks" placeholder="Hint : MY-2019 or FY-2019"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"doc_access_rights_to"),$_smarty_tpl);?>
</label>
                                            <div id="first-name-input-wrapper" class="controls">
                                                <select title="Select Valid Company" name="access_plant" onchange="get_dept_list(this.options[this.selectedIndex].value, '#from_dept', 'multiselect');">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
]</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                            <div class="controls row">
                                                <div class="col-md-5">
                                                    <select id="from_dept" class="form-control generate_multiselect" size="10" multiple="multiple"></select>
                                                </div>
                                                <div class="col-md-1">
                                                    <br><br><br>
                                                    <button type="button" id="from_dept_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                    <button type="button" id="from_dept_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                    <button type="button" id="from_dept_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                    <button type="button" id="from_dept_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="access_dept[]" id="from_dept_to" class="form-control" size="10" multiple="multiple" title="Select valid Department">
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['usr_dept_id']->value;?>
" data-drop_down_value="<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['usr_dept_id']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['usr_plant_name']->value;?>
 - [<?php echo $_smarty_tpl->tpl_vars['usr_dept_name']->value;?>
]</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="usr_dept_id" value="<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['usr_dept_id']->value;?>
">
                                    <div class="form-actions-condensed row mgbt-xs-0 text-right" >
                                        <div class="col-sm-12">
                                            <input type="hidden" name="audit_trail_action" value="Add DMS">
                                            <input type="hidden" name="add_dms">
                                            <button class="btn vd_bg-green vd_white" type="submit"  id="add_dms" data-intro="<strong>DMS</strong><br/>Click On Add." data-step=7  data-position="left"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_list_of_ams_year">List Of Audit Year</a> </h4>
                </div>
                <div id="collapse_list_of_ams_year" class="panel-collapse collapse">
                    <div class="panel-body">  

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            "use strict";
            //Add Vendor Organization form validation
            $('#initiate_vendor-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    org: {
                        required: true
                    },
                    plant: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#initiate_vendor-form')).fadeIn(500);
                    scrollTo($('#initiate_vendor-form'), -100);
                },
                submitHandler: function (form) {
                    if (lm_validate.array_of_input([".agenda_sub_cat@", ".score@"])) {
                        $('#initiate_vendor').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                }
            });
        });
    <?php echo '</script'; ?>
>






<?php }
}
