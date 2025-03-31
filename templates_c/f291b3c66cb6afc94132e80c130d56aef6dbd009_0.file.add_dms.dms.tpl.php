<?php
/* Smarty version 3.1.30, created on 2024-10-28 16:37:55
  from "/var/www/html/lm_qms/lib/dms/templates/add_dms.dms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671f708b079693_92158167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f291b3c66cb6afc94132e80c130d56aef6dbd009' => 
    array (
      0 => '/var/www/html/lm_qms/lib/dms/templates/add_dms.dms.tpl',
      1 => 1723893828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_671f708b079693_92158167 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> Add </li>
            <li class="active"> QMS </li>
            <li class="active"> Deviation Management (DMS)</li>
            <li class="active"> Add </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" >
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
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Deviation Management </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INPUT FORM</h3>
                                </div>
                                <div class="panel-body  panel-bd-left">
                                    <!-- Add DMS Form -->
                                    <form name="add_dms-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_dms-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3" data-intro="<strong>DMS</strong><br/>System Generated Temporary Deviaton Number, Format Cannot Be Changed.<div>Format: DMS / Year / Sl no.</div>" data-step=1  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dev_no"),$_smarty_tpl);?>
 <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"temporary_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Temporary No" class="required" name="adev_no" id="adev_no" value="<?php echo $_smarty_tpl->tpl_vars['temp_dev_no']->value;?>
" required title="Invalid DMS No" readonly="true">
                                                </div>
                                            </div>
                                            <div class="col-md-3" data-intro="<strong>DMS</strong><br/> Select Deviation Type." data-step=2  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select  class="required" name="adev_type" id="adev_type" required title="Select Valid Deviation Type">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-3" data-intro="<strong>DMS</strong><br/> Select Deviation Classification." data-step=3  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"classification"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="required" name="adev_classification" id="adev_classification" required title="Select Valid Claasfication">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classification_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
</option>
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
                                            <div class="col-md-3" data-intro="<strong>DMS</strong><br/> Enter Date Of Occurrence." data-step=4  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date_of_occurrence"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_datepicker date_changed" placeholder="YY-MM-DD" name="adev_date_of_occ" title="Select Valid Date Of Occurance1" data-datepicker_max=0 data-date_changed="adev_date_of_discover" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3" data-intro="<strong>DMS</strong><br/> Enter Time Occurrence." data-step=5  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"time_of_occurrence"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_timepicker" placeholder="HH:MM:SS" name="adev_time_of_occ" title="Select Valid Time Of Occurance" data-time_show_secondas="true" data-time_show_input="false" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date_of_discovery"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_datepicker" name="adev_date_of_discover" title="Select Valid Date Of Discovery" data-datepicker_max=0 required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"time_of_discovery"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_timepicker" name="adev_time_of_discover" title="Select Valid Time Of Discovery" data-time_show_secondas="true" data-time_show_input="false" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12" data-intro="<strong>DMS</strong><br/>Select Deviaition Related To." data-step=6  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_related_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="required generate_select2" name="adev_related_to[]" id="adev_related_to" required title="Select Valid Deviation Related To Item" multiple="multiple">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_realted_to_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['related_to'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
]">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sub_realted_details'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['item1']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_type'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item1']->value['desc'];?>
]</option>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </optgroup>
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
                                            <div class="col-md-6 row">
                                                <div class="col-md-3">
                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                    <div class="controls">
                                                        <input type="checkbox" class="switch_unchecked" data-rel="switch" data-size="mini" data-wrapper-class="green" name="adev_meeting"  data-on-text="Yes" data-off-text="No"  title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'training_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                    <div class="controls ">
                                                        <input type="checkbox" id="toggle_training" class="is_traing_required switch_unchecked" data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_training" id="toggle_training" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="display:none" data-toggle_to="toggle_training">
                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'exam_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                    <div class="controls">
                                                        <input type="checkbox" class="switch_unchecked" data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_exam" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'task_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                    <div class="controls">
                                                        <input type="checkbox" class="switch_unchecked" data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_task" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12" data-intro="<strong>DMS</strong><br/>Select Repetitive DMS No." data-step=6  data-position="left">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"repetitive_dms_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="required generate_select2" name="adev_repetitive_dms_no[]" id="adev_repetitive_dms_no" required title="Repetitive DMS No" multiple="multiple">
                                                    </select> 
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
                                        <?php if ($_smarty_tpl->tpl_vars['master_data_creation_alert']->value) {?>
                                            <div class="alert alert-danger">
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Some of the master data entries are still not created in the admin section under QMS Master Data such as "Deviation Type, Classification, Deviation Related To & Sub Releted To". Before proceeding further, please ensure these entries are created.
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right" >
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="audit_trail_action" value="Add DMS">
                                                    <input type="hidden" name="add_dms">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="add_dms" data-intro="<strong>DMS</strong><br/>Click On Add." data-step=7  data-position="left"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            x_get_qms_doc_no_list("dms", function (result) {
                ajax_respone_handler_set_dropdown(result, "#adev_repetitive_dms_no", 'multiselect');
                $("#adev_repetitive_dms_no").append(`<option value='NA' data-drop_down_value='NA'>NA</option>`);
            });

            // Add DMS Form Validation
            "use strict";
            $('#add_dms-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    adev_no: {
                        required: true
                    },
                    adev_type: {
                        required: true
                    },
                    adev_classification: {
                        required: true
                    },
                    adev_date_of_occ: {
                        required: true
                    },
                    adev_time_of_occ: {
                        required: true
                    },
                    adev_date_of_discover: {
                        required: true
                    },
                    adev_time_of_discover: {
                        required: true
                    },
                    'adev_related_to[]': {
                        required: true
                    },
                    'adev_repetitive_dms_no[]': {
                        required: true
                    },
                    "access_dept[]": {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) {
                    $('.alert-danger', $('#add_dms-form')).fadeIn(500);
                    scrollTo($('#add_dms-form'), -100);
                },
                submitHandler: function (form) {
                    if (
                            //If Current User Dept Not Selected In Access Rights
                            lm_validate.is_value_exist_in_array($("#from_dept_to").val(), $("#usr_dept_id").val(), 'Select Current User Department')
                            //If Duplicate Deprtments Found In Access Rights
                            && lm_validate.is_duplicate_value_exists_in_array($("#from_dept_to").val(), $("#from_dept_to"))
                            //If NA And Dms No Both Present In Repetetive List
                            && ($("#adev_repetitive_dms_no").val().length > 1 ? !lm_validate.is_value_exist_in_array($("#adev_repetitive_dms_no").val(), "NA", 'Remove "NA" Option From Repetitive DMS List', 'found') : true)
                            )
                    {
                        $('#add_dms').attr("disabled", true);
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
