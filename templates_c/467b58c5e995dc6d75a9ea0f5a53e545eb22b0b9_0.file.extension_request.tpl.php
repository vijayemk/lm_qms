<?php
/* Smarty version 3.1.30, created on 2025-02-17 09:06:41
  from "/var/www/html/lm_qms/templates/common/extension_request.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67b2aec9530c30_28403834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '467b58c5e995dc6d75a9ea0f5a53e545eb22b0b9' => 
    array (
      0 => '/var/www/html/lm_qms/templates/common/extension_request.tpl',
      1 => 1718455256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b2aec9530c30_28403834 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel panel-default">
    <div class="panel-heading vd_bg-dark-green">
        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshow_ext_request"> Extension Request <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
    </div>
    <div id="collapseshow_ext_request" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="vd_content-section clearfix">     
                <div class="panel-heading bordered vd_bg-blue">
                    <h3 class="panel-title vd_white font-semibold"><?php echo $_smarty_tpl->tpl_vars['extension_for']->value;?>
 -  EXTENSION TARGET DATE FORM</h3>
                </div>
                <div class="panel-body panel widget panel-bd-left light-widget">
                    <form name="extension_request-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="extension_request-form" autocomplete="off">
                        <div class="alert alert-danger vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="exisiting_target_date" value="<?php echo $_smarty_tpl->tpl_vars['existing_target_date']->value;?>
" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"proposed_target_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" class="generate_datepicker" name="proposed_target_date" data-datepicker_min="0" title="Select Valid Proposed Target Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="extension_reason" required title="Enter Valid Reason"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                            <input type="hidden" name="extension_requested">
                            <input type="hidden" name="audit_trail_action" value="Extension Request">
                            <input type="hidden" id="extension_for" value="<?php echo $_smarty_tpl->tpl_vars['extension_for']->value;?>
">
                            <input type="hidden" id="show_overdue_msg_notifi" value="<?php echo $_smarty_tpl->tpl_vars['show_overdue_msg_notifi']->value;?>
">
                            <button class="btn vd_bg-green vd_white" type="submit" id="extension_requested"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Extension</button>
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
            $(document).ready(function () {
                if ($('#show_overdue_msg_notifi').val()) {
                    notification("topright", "error", "fa fa-exclamation-triangle vd_blue", "Attention", capFirst($("#extension_for").val()) + " Overdue");
                }
                // Extension Request Form Validation
                "use strict";
                $('#extension_request-form').validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        exisiting_target_date: {
                            required: true
                        },
                        proposed_target_date: {
                            required: true
                        },
                        extension_reason: {
                            required: true
                        }
                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit              
                        $('.alert-danger', $('#extension_request-form')).fadeIn(500);
                        scrollTo($('#extension_request-form'), -100);
                    },
                    submitHandler: function (form) {
                        $('#extension_requested').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                });
            });
        <?php echo '</script'; ?>
>
    
</div><?php }
}
