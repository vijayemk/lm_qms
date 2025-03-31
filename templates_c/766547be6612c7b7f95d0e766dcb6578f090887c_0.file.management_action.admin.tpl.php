<?php
/* Smarty version 3.1.30, created on 2024-11-09 12:13:00
  from "/var/www/html/lm_qms/lib/admin/templates/management_action.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_672f0474d29705_10241112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '766547be6612c7b7f95d0e766dcb6578f090887c' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/management_action.admin.tpl',
      1 => 1582796146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_672f0474d29705_10241112 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<!-- Specific CSS -->
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Management Action </li>
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
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Management Action Settings</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Management Action Settings Form</h2>
                                <form name="mgmt_action_settings-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="mgmt_action_settings-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"doc_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="lm_doc" id="lm_doc" title="Select Valid Document">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['doc_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['doc_name'];?>
] </option>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</label>
                                            <div class="col-xs-4">
                                                <select name="mgmt_action_from[]" id="mgmt_action" class="mgmt_action form-control" size="7" multiple="multiple"></select>
                                            </div>
                                            <div class="col-xs-2"><br>
                                                <button type="button" id="mgmt_action_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                <button type="button" id="mgmt_action_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                <button type="button" id="mgmt_action_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                <button type="button" id="mgmt_action_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                            </div>
                                            <div class="col-xs-4">
                                                <select name="mgmt_action_to[]" id="mgmt_action_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
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
    <!-- Multiselect left to right -->
    <?php echo '<script'; ?>
 src="vendors/multiselect-master/dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="vendors/multiselect-master/dist/js/multiselect.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#mgmt_action-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function (event, validator) {
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function ($) {
            $('.mgmt_action').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });
        $("#lm_doc").change(function () {
            x_get_filtered_lm_doc_workflow_action_list($("#lm_doc").val(), list_action);
            x_get_lm_doc_action_list($("#lm_doc").val(), list_doc_action);
        });
        function list_action(actions) {
            var mgmt_action_obj = document.getElementById("mgmt_action");
            for (i = mgmt_action_obj.length; mgmt_action_obj.length > 0; i--) {
                mgmt_action_obj.remove(i)
            }
            for (var y in actions) {
                var action_array = actions[y];
                var addy = document.createElement('option');
                addy.id = action_array.action_id;
                addy.text = action_array.action;
                addy.value = action_array.action_id;
                try {
                    mgmt_action_obj.add(addy, null);
                } catch (ex) {
                    mgmt_action_obj.add(addy);
                }
            }
        }
        function list_doc_action(actions) {
            var mgmt_action_obj = document.getElementById("mgmt_action_to");
            for (i = mgmt_action_obj.length; mgmt_action_obj.length > 0; i--) {
                mgmt_action_obj.remove(i)
            }
            for (var y in actions) {
                var action_array = actions[y];
                var addy = document.createElement('option');
                addy.id = action_array.action_id;
                addy.text = action_array.action;
                addy.value = action_array.action_id;
                try {
                    mgmt_action_obj.add(addy, null);
                } catch (ex) {
                    mgmt_action_obj.add(addy);
                }
            }
        }
    <?php echo '</script'; ?>
>

<?php }
}
