<?php
/* Smarty version 3.1.30, created on 2024-11-11 15:03:39
  from "/var/www/html/lm_qms/templates/common/edit_access_rights.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6731cf732ea4f0_51632122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79a4e3b4f3da175f6bc40c3ab623803f74b5669f' => 
    array (
      0 => '/var/www/html/lm_qms/templates/common/edit_access_rights.tpl',
      1 => 1731317559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6731cf732ea4f0_51632122 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel panel-default">
    <div class="panel-heading vd_bg-dark-green">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_edit_access">Edit Access Rights <i
                    class="fa  fa-exclamation-triangle vd_white"></i></a>
        </h4>
    </div>
    <div id="collapse_edit_access" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="vd_content-section clearfix">
                <div class="panel-heading bordered vd_bg-blue">
                    <h3 class="panel-title vd_white font-semibold">ACCESS RIGHTS</h3>
                </div>
                <div class="panel-body panel-bd-left">
                    <form name="edit_access_rights-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"
                        class="form-horizontal" role="form" id="edit_access_rights-form" autocomplete="off">
                        <div class="alert alert-danger vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i
                                    class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a
                            few things up and try submitting again.
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label
                                    class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"doc_access_rights_to"),$_smarty_tpl);?>
</label>
                                <div id="first-name-input-wrapper" class="controls">
                                    <select title="Select Valid Company"
                                        onchange="get_dept_list(this.options[this.selectedIndex].value, '#from_dept', 'multiselect');">
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
">[<?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
] - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
]
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
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
<span
                                        class="vd_red">*</span></label>
                                <div class="controls row">
                                    <div class="col-md-5">
                                        <select name="dept[]" id="from_dept" class="form-control generate_multiselect"
                                            size="10" multiple="multiple"></select>
                                    </div>
                                    <div class="col-md-1">
                                        <br><br><br>
                                        <button type="button" id="from_dept_rightAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-forward"></i></button>
                                        <button type="button" id="from_dept_rightSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-right"></i></button>
                                        <button type="button" id="from_dept_leftSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-left"></i></button>
                                        <button type="button" id="from_dept_leftAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-backward"></i></button>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="doc_access_dept[]" id="from_dept_to" class="form-control"
                                            size="10" multiple="multiple" title="Select valid Department">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['current_access_rights']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['item']->value['dept_id'];?>
"
                                                    data-drop_down_value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['item']->value['dept_id'];?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['dept_name'];?>
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
                        </div>
                        <input type="hidden" id="usr_dept_id" value="<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['usr_dept_id']->value;?>
">
                        <div class="form-actions-condensed row mgbt-xs-0 text-right">
                            <div class="col-sm-12">
                                <input type="hidden" name="audit_trail_action" value="Edit Access Rights">
                                <input type="hidden" name="edit_access_rights">
                                <button class="btn vd_bg-green vd_white" type="submit" id="edit_access_rights">
                                    <span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
        <!-- Javascript =============================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--script type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
-->

        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function() {
                // Add DMS Form Validation
                "use strict";
                var form_submit = $('#edit_access_rights-form');
                var error_register = $('.alert-danger', form_submit);
                form_submit.validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error messsage class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        "doc_access_dept[]": {
                            required: true
                        }
                    },
                    invalidHandler: function(event,
                        validator) { //display error alert on form submit              
                        $('.alert-danger', $('#edit_access_rights-form')).fadeIn(500);
                        scrollTo($('#edit_access_rights-form'), -100);
                    },
                    submitHandler: function(form) {
                        if (lm_validate.is_value_exist_in_array($("#from_dept_to").val(), $(
                                "#usr_dept_id").val(), 'Select Current User Department') && lm_validate
                            .is_duplicate_value_exists_in_array($("#from_dept_to").val(), $(
                                "#from_dept_to"))) {
                            $('#edit_access_rights').attr("disabled", true);
                            loading.show();
                            form.submit();
                        }
                    }
                });
            });
        <?php echo '</script'; ?>
>
    
</div><?php }
}
