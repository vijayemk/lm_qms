<?php
/* Smarty version 3.1.30, created on 2024-10-26 10:41:35
  from "/var/www/html/lm_qms/lib/admin/templates/list_inst_equip_details_master.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671c7a077a63a1_64945297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01025cc3b5d33a17136bed14e98057244226647c' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/list_inst_equip_details_master.admin.tpl',
      1 => 1723887588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_671c7a077a63a1_64945297 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">Administration </li>
            <li class="active">Settings </li>
            <li class="active">QMS Master Data </li>
            <li class="active">Instrument/Equipment Details Master</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading vd_bg-dark-green">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Instrument/Equipment Details Master</a> </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="vd_content-section clearfix">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="modal-wide-width">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <h4 class="modal-title" id="myModalLabel">Input - Form </h4>
                                    </div >
                                    <div class="panel-body">    
                                        <form name="add_inst_equip_dtls-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_inst_equip_dtls-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-5">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <select class="inst_equip_type" name="ainst_equip_type" id="ainst_equip_type"  title="Select Valid  Type">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inst_equip_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['inst_equip_type'];?>
</option>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </select>                                                  
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row mgbt-xs-0 text-left">
                                                    <div class="col-sm-12">
                                                        <button class="btn vd_bg-green vd_white add_more_sub_cat" type="button" data-parent_element="#sub_category_parent_div" data-child_element=".child_ele" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="sub_category_parent_div">
                                                <div class="child_ele form-group" >
                                                    <div class="col-md-5 mgtp-10 ">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_id"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                                        <div class="controls">
                                                            <input type="text" placeholder="Min 2 - Max 50" class="required inst_equip_id dupliate_field_val_req " name="ainst_equip_id[]" required title="Enter Valid ID" data-dupliate_field="inst_quip_id">
                                                            <span class="ainst_equip_id_exist font-semibold vd_red error_exists"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mgtp-10 ">
                                                        <label class="control-label title"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_name"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                                        <div class="controls">
                                                            <input type="text" placeholder="Min 2 - Max 50" class="required inst_equip_name dupliate_field_val_req " name="ainst_equip_name[]" required title="Enter Valid Name" data-dupliate_field="inst_quip_name">
                                                            <span class="font-semibold vd_red error_exists" ></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="control-label"></label>
                                                        <div class="controls">
                                                            <button class="btn vd_bg-red vd_white mgtp-15 delete_ele" title="Atleast One " type="button" ><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="submit_add">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading vd_bg-dark-green">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Instrument/Equipment Details Master List</a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="vd_content-section clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget">
                                <div class="panel-body table-responsive">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['inst_equip_details_list']->value)) {?>
                                        <table class="table table-bordered table-striped generate_datatable" title="Instrument/Equipment Master Data">
                                            <thead>
                                                <tr>
                                                    <td><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</td>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"type"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_id"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_name"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inst_equip_details_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['inst_equip_type'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['inst_equip_id'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['inst_equip_name'];?>
</td>
                                                        <td ><span class="label label-<?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled'] == 'yes') {?>success<?php } else { ?>danger<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value['is_enabled'];?>
</span></td>
                                                        <td><button class="btn vd_bg-blue vd_white" data-toggle="modal" onclick="update_inst_equip_details(<?php echo htmlspecialchars(json_encode($_smarty_tpl->tpl_vars['item']->value));?>
);"  data-target="#edit_inst_equip_dtls"><i class="fa fa-pencil"></i></button></td>
                                                    </tr>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                            <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit_inst_equip_dtls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Instrument/Equipment Details Master</h4>
            </div>
            <div class="modal-body">
                <form name="edit_inst_equip_dtls-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="edit_inst_equip_dtls-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="required inst_equip_type" name="uinst_equip_type" id="uinst_equip_type" disabled  required title="Select Valid  Type">
                                    <option value="">Select</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inst_equip_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['inst_equip_type'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>                                                  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_active"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="required" name="uis_enabled" id="uis_enabled"  title="Select Valid Option">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="col-md-6 mgtp-10 ">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_id"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" placeholder="Min 2 - Max 50" class="required inst_equip_id " name="uinst_equip_id"  id="uinst_equip_id" required title="Enter Valid ID" >
                                    <span class="ainst_equip_id_exist font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mgtp-10 ">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"inst_equip_name"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" placeholder="Min 2 - Max 50" class="required inst_equip_name " name="uinst_equip_name" id="uinst_equip_name" required title="Enter Valid Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-right">
                        <div class="col-sm-12">
                            <input type="hidden" name="uobject_id" id="uobject_id">
                            <input type="hidden" name="uinst_equip_type_id" id="uinst_equip_type_id">
                            <input type="hidden" name="submit_update">
                            <button class="btn vd_bg-red vd_white page_reload" type="button" ><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Close</button>
                            <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update" ><span class="menu-icon"><i class="fa fa-fw fa-pencil"></i></span> Update</button>
                        </div>
                    </div>
                </form>
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
 type="text/javascript" src="custom/custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        // Add Instrument/Equipment
        $(document).ready(function () {
            var form_submit = $('#add_inst_equip_dtls-form');
            var error_register = $('.alert-danger', form_submit);
            //Add Instrument/Equipment Details
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    ainst_equip_type: {
                        required: true
                    },
                    'ainst_equip_id[]': {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    'ainst_equip_name[]': {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#add').attr("disabled", true);
                    form.submit();
                }
            });
            // Update Instrument/Equipment Details
            var form_submit = $('#edit_inst_equip_dtls-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    uinst_equip_type: {
                        required: true
                    },
                    uinst_equip_id: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    uinst_equip_name: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    uis_enabled: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    // if (submit_handler_error_exists(form)) {
                    //    return false;
                    //}
                    $('#update').attr("disabled", true);
                    form.submit();
                }
            });
        });
        $(document).on('keyup', '.inst_equip_id', function () {
            let ele = $(this);
            ele.val(ele.val().toUpperCase());
            if (ele.closest('form').find('.inst_equip_type').val() == "") {
                show_notification("e", "topright", "Select Material type");
                ele.val("");
            } else {
                var inst_equip_type = ele.closest('form').find(".inst_equip_type").val();
                x_is_inst_equip_id_exist(inst_equip_type, ele.val(), function (result) {
                    ajax_respone_handler_value_exist(result, ele);
                });
            }
        });
        $(document).on('keyup', '.inst_equip_name', function () {
            let ele = $(this);
            ele.val(ele.val().toUpperCase());
            if (ele.closest('form').find('.inst_equip_type').val() == "") {
                show_notification("e", "topright", "Select Material type");
                ele.val("");
            } else {
                var inst_equip_type = ele.closest('form').find(".inst_equip_type").val();
                x_is_inst_equip_name_exist(inst_equip_type, ele.val(), function (result) {
                    ajax_respone_handler_value_exist(result, ele);
                });
            }
        });
        $(document).on('change', '.inst_equip_type', function () {
            $(this).closest('form').find(".inst_equip_id ,.inst_equip_name").val("");
        });
        function update_inst_equip_details(data) {
            $("#uobject_id").val(data.object_id);
            $("#uinst_equip_type").val(data.type_id);
            $("#uinst_equip_type_id").val(data.type_id);
            $("#uinst_equip_id").val(data.inst_equip_id);
            $("#uinst_equip_name").val(data.inst_equip_name);
            $("#uis_enabled").val(data.is_enabled);
        }
        $(".add_more_sub_cat").click(function () {
            add_element(".child_ele", "#sub_category_parent_div");
        });

    <?php echo '</script'; ?>
>

<?php }
}
