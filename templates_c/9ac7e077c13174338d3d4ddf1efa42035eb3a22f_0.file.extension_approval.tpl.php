<?php
/* Smarty version 3.1.30, created on 2025-02-28 09:59:19
  from "/var/www/html/lm_qms/templates/common/extension_approval.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67c13b9f3e6807_14902129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ac7e077c13174338d3d4ddf1efa42035eb3a22f' => 
    array (
      0 => '/var/www/html/lm_qms/templates/common/extension_approval.tpl',
      1 => 1719917872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67c13b9f3e6807_14902129 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel panel-default">
    <div class="panel-heading vd_bg-dark-green">
        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_extension_approval"> Extension Approval <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
    </div>
    <div id="collapse_extension_approval" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="vd_content-section clearfix">     
                <div class="panel-heading bordered vd_bg-blue">
                    <h3 class="panel-title vd_white font-semibold">EXTENSION APPROVAL FORM</h3>
                </div>
                <form name="extension_approval-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="extension_approval-form" autocomplete="off">
                    <div class="panel-body panel widget panel-bd-left light-widget">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"existing_target_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="exisiting_target_date" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value['0']['existing_target_date'];?>
" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"proposed_target_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="proposed_target_date" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value['0']['proposed_target_date'];?>
" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"requested_by"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="requested_by" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value[0]['created_by_name'];?>
" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"extension_for"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="extension_for" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value[0]['extension_for'];?>
" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <textarea rows="3" name="extension_reason" readonly><?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value['0']['reason'];?>
</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body panel widget panel-bd-left light-widget">
                        <div class="alert alert-danger vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approve_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                <div class="controls">
                                    <select id="extension_approval_type" name="extension_approval_type" title="Select Approval Type" class="show_hide_ele" data-hide_forms="extension_approval_type">
                                        <option value="">Select</option>
                                        <option value="Accepted">Accept</option>
                                        <option value="Rejected">Reject</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['show_extended_dates']->value) {?>
                            <div class="extension_approval_type" id="Accepted" style="display: none;">
                                <div class="alert alert-info mgbt-md-0"> 
                                    <span class="vd_alert-icon"><i class="fa fa-info-circle vd_red"></i></span><strong>Note!</strong>
                                    When you accept the extension, the target dates for subsequent activitties will also be extended accordingly
                                </div>
                                <table class="table table-bordered table-striped mgtp-20">
                                    <thead>
                                        <tr>
                                            <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"type"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"old_target_date"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"new_target_date"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['show_extended_dates']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['from'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['to'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                            </div>
                        <?php }?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <textarea placeholder="(e.g.) Kindly provide your comments" rows="3" class="required" name="extension_approval_comments" id="extension_approval_comments" required  title="Enter Valid Comments"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                            <input type="hidden" name="extension_approval">
                            <input type="hidden" name="audit_trail_action" value="Extension Approval">
                            <input type="hidden" name="extension_object_id" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value['0']['object_id'];?>
">
                            <input type="hidden" name="ref_object_id1" value="<?php echo $_smarty_tpl->tpl_vars['pending_extension_details']->value['0']['ref_object_id1'];?>
">
                            <button class="btn vd_bg-green vd_white" type="submit" id="extension_approval"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
        <!-- Javascript =============================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <!--script type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
-->

        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function () {
                // Extension Request Form Validation
                "use strict";
                $('#extension_approval-form').validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error messsage class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        exisiting_target_date: {
                            required: true
                        },
                        proposed_target_date: {
                            required: true
                        },
                        requested_by: {
                            required: true
                        },
                        extension_for: {
                            required: true
                        },
                        extension_reason: {
                            required: true
                        },
                        extension_approval_type: {
                            required: true
                        },
                        extension_approval_comments: {
                            minlength: 3,
                            required: true
                        }
                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit              
                        $('.alert-danger', $('#extension_approval-form')).fadeIn(500);
                        scrollTo($('#extension_approval-form'), -100);
                    },
                    submitHandler: function (form) {
                        $('#extension_approval').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                });
            });

        <?php echo '</script'; ?>
>
    
</div><?php }
}
