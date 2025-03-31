<?php
/* Smarty version 3.1.30, created on 2024-11-16 15:33:47
  from "/var/www/html/lm_qms/templates/common/recall.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67386e037e3de5_94538020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04838fe60bd81982c26dd6067e26d8c7935bc94b' => 
    array (
      0 => '/var/www/html/lm_qms/templates/common/recall.tpl',
      1 => 1731751402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67386e037e3de5_94538020 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['recall_pending_users_list']->value) {?>
    <div class="panel panel-default">
        <div class="panel-heading vd_bg-dark-green">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecallPendingUser"> Add | Recall | Replace <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
        </div>
        <div id="collapseRecallPendingUser" class="panel-collapse collapse ">
            <div class="panel-body">
                <div class="vd_content-section clearfix">
                    <div class="panel-heading bordered vd_bg-blue">
                        <h3 class="panel-title vd_white font-semibold text-uppercase"><?php echo $_smarty_tpl->tpl_vars['recall_from']->value;?>
</h3>
                    </div>
                    <div class="panel widget panel-bd-left light-widget">
                        <div class="panel-body">
                            <div class="alert alert-danger vd_hidden">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                            </div>
                            <div class="form-group">
                                <div class="col-md-2 pd-0">
                                    <div class="controls">
                                        <select class="show_hide_ele" data-hide_forms="recall_type">
                                            <option value="">Select</option>
                                            <?php if ($_smarty_tpl->tpl_vars['recall_add_option']->value) {?><option value="recall_add" >Add</option><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['recall_remove_option']->value) {?><option value="recall_remove">Recall</option><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['recall_replace_option']->value) {?><option value="recall_replace">Replace</option><?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel widget panel-bd-left light-widget recall_type" id="recall_add" style="display: none">
                        <div class="panel-heading bordered vd_bg-blue">
                            <h3 class="panel-title vd_white font-semibold">ADD FORM</h3>
                        </div>
                        <div class="panel-body">
                            <form name="recall_add-from" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="recall_add-from" autocomplete="off">
                                <div class="alert alert-danger vd_hidden">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                </div>
                                <?php if (empty($_smarty_tpl->tpl_vars['recall_default_add_user_list']->value)) {?>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-3 pd-0">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <select onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['recall_object_id']->value;?>
', this.options[this.selectedIndex].value, '', 'yes', '#department');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                            <div class="col-md-4 mgl-10">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <?php if ($_smarty_tpl->tpl_vars['recall_dept_users']->value) {?>
                                                        <select  name="department" id="department" onchange="get_dept_users(this.options[this.selectedIndex].value, '#recall_from_users', 'multiselect', $('.recall_add_remove_user_list').val());" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                        </select>
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['recall_action_user']->value) {?>
                                                        <select name="department" id="department" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['recall_action']->value;?>
', this.options[this.selectedIndex].value, '#recall_from_users', 'multiselect', $('.recall_add_remove_user_list').val());" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                        </select>
                                                    <?php }?>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>  
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                        <div class="controls">
                                            <div class="col-md-3 pd-0">
                                                <select name="recall_from[]" id="recall_from_users" class="generate_multiselect form-control" size="7" multiple="multiple">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['recall_default_add_user_list']->value)) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recall_default_add_user_list']->value, 'item_add_user', false, 'key_add_user', 'list_add_user', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key_add_user']->value => $_smarty_tpl->tpl_vars['item_add_user']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item_add_user']->value['drop_down_value'];?>
" data-drop_down_value="<?php echo $_smarty_tpl->tpl_vars['item_add_user']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_add_user']->value['drop_down_option'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <button type="button" id="recall_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                <button type="button" id="recall_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                <button type="button" id="recall_from_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                <button type="button" id="recall_from_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                            </div>
                                            <div class="col-md-3 pd-0">
                                                <select name="recall_add_users_to[]" id="recall_from_users_to"  class="form-control" size="7" multiple="multiple" title="Select Valid User Name"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-7">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                        <div  class="controls">
                                            <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="recall_reason" id="recall_reason" required title="Enter Valid Reason"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                    <input type="hidden" name="audit_trail_action" value="Recall - <?php echo $_smarty_tpl->tpl_vars['recall_from']->value;?>
 - Add More User">
                                    <input type="hidden" name="recall_add">
                                    <input type="hidden" class="recall_add_remove_user_list">
                                    <button class="btn vd_bg-green vd_white" type="submit" id="recall_add"> <span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel widget panel-bd-left light-widget recall_type" id="recall_remove" style="display: none">
                        <div class="panel-heading bordered vd_bg-blue">
                            <h3 class="panel-title vd_white font-semibold">RECALL FORM</h3>
                        </div>
                        <div class="panel-body">
                            <form name="recall_remove-from" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="recall_remove-from" autocomplete="off">
                                <div class="alert alert-danger vd_hidden">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">
                                                <div class="vd_checkbox checkbox-danger">
                                                    <input type="checkbox" class="select_all" value="1" id="remove_select_all">
                                                    <label class="width-100" for="remove_select_all"></label>
                                                </div>
                                            </th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"recall_user"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recall_pending_users_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <tr>
                                                <td> 
                                                    <div class="vd_checkbox checkbox-danger">
                                                        <input type="checkbox" name="recall_remove_user[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" class="recall_checbox" id="recall_remove_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="Select Atleast One User">
                                                        <label class="width-100" for="recall_remove_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                        <div  class="controls">
                                            <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="recall_reason" id="recall_reason" required title="Enter Valid Reason"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                    <input type="hidden" name="recall_remove">
                                    <input type="hidden" name="audit_trail_action" value="Recall - <?php echo $_smarty_tpl->tpl_vars['recall_from']->value;?>
 - Recall User">
                                    <button class="btn vd_bg-green vd_white" type="submit" id="recall_remove"> <span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Recall</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel widget panel-bd-left light-widget recall_type" id="recall_replace" style="display: none">
                        <div class="panel-heading bordered vd_bg-blue">
                            <h3 class="panel-title vd_white font-semibold">REPLACEMENT FORM</h3>
                        </div>
                        <div class="panel-body">
                            <form name="recall_replace-from" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="recall_replace-from" autocomplete="off">
                                <div class="alert alert-danger vd_hidden">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan='2'>
                                                <div class="vd_checkbox checkbox-danger">
                                                    <input type="checkbox" class="select_all" value="1" id="replacemnt_select_all">
                                                    <label class="width-100" for="replacemnt_select_all"></label>
                                                </div>
                                            </th>
                                            <th class="text-center" colspan="3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"recall_user"),$_smarty_tpl);?>
</th>
                                            <th class="text-center" colspan="3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"replaced_by"),$_smarty_tpl);?>
</th>
                                        </tr>
                                        <tr>
                                            <th class="col-md-1 pd-5"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"recall_user"),$_smarty_tpl);?>
</th>
                                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"replaced_by"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recall_pending_users_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <tr>
                                                <td> 
                                                    <div class="vd_checkbox checkbox-danger">
                                                        <input type="checkbox" name="replacement_pending_user[]" class="recall_checbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" id="replacemnt_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="Select Atleast One User">
                                                        <label class="width-100" for="replacemnt_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                <td> 
                                                    <select name="plant[]" class="recall_ed" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['recall_object_id']->value;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'tr', '.department'));" title="Select Valid Plant" disabled>
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </select>
                                                </td>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['recall_dept_users']->value) {?>
                                                        <select  name="department[]" class="department recall_ed" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, 'tr', '.replacement_user'), null, $('.recall_replace_remove_user_list').val());" title="Select Valid Department" disabled>
                                                            <option value="">Select</option>
                                                        </select>
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['recall_action_user']->value) {?>
                                                        <select name="department[]" class="department recall_ed"  onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['recall_action']->value;?>
', this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, 'tr', '.replacement_user'), null, $('.recall_replace_remove_user_list').val());" title="Select Valid Department" disabled>
                                                            <option value="">Select</option>
                                                        </select>
                                                    <?php }?>  
                                                </td>
                                                <td>
                                                    <select  name="replacement_user[]" class="replacement_user recall_ed user <?php if (empty($_smarty_tpl->tpl_vars['disable_duplicate_validation']->value)) {?>dupliate_field_val_req<?php }?>" id="new_user[]" title="Select Valid User" data-dupliate_field="replacement_user" data-duplicate_msg="Cannot Assign Same Person" disabled><option value="" >Select</option> </select>
                                                </td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                        <div  class="controls">
                                            <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="recall_reason" id="recall_reason" required title="Enter Valid Reason"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                    <input type="hidden" name="recall_replace">
                                    <input type="hidden" name="audit_trail_action" value="Recall - <?php echo $_smarty_tpl->tpl_vars['recall_from']->value;?>
 - Replace User">
                                    <input type="hidden" class="recall_replace_remove_user_list">
                                    <button class="btn vd_bg-green vd_white" type="submit"  id="recall_replace"> <span class="menu-icon"><i class="fa fa-fw fa-exchange"></i></span> Replace</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
            <?php echo '<script'; ?>
>
                $(document).ready(function () {
                    //Recall Add Form Validation
                    $('#recall_add-from').validate({
                        errorElement: 'div', //default input error message container
                        errorClass: 'vd_red', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        ignore: "",
                        rules: {
                            'recall_add_users_to[]': {
                                required: true
                            },
                            'recall_reason': {
                                minlength: 3,
                                required: true
                            }
                        },
                        invalidHandler: function (event, validator) { //display error alert on form submit              
                            $('.alert-danger', $('#recall_add-from')).fadeIn(500);
                            scrollTo($('#recall_add-from'), -100);
                        },
                        submitHandler: function (form) {
                            $('#recall_add').attr("disabled", true);
                            loading.show();
                            form.submit();
                        }
                    });
                    //Recall Remove Form Validation
                    $('#recall_remove-from').validate({
                        errorElement: 'div', //default input error message container
                        errorClass: 'vd_red', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        ignore: "",
                        rules: {
                            'recall_reason': {
                                minlength: 3,
                                required: true
                            }
                        },
                        invalidHandler: function (event, validator) { //display error alert on form submit              
                            $('.alert-danger', $('#recall_remove-from')).fadeIn(500);
                            scrollTo($('#recall_remove-from'), -100);
                        },
                        submitHandler: function (form) {
                            if (lm_validate.check_box(["recall_remove_user[]"])) {
                                $('#recall_remove').attr("disabled", true);
                                loading.show();
                                form.submit();
                            }
                        }
                    });
                    // Recall Replace Form Validation
                    $('#recall_replace-from').validate({
                        errorElement: 'div', //default input error message container
                        errorClass: 'vd_red', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        ignore: "",
                        rules: {
                            'new_user[]': {
                                required: true
                            },
                            'recall_reason': {
                                minlength: 3,
                                required: true
                            }
                        },
                        invalidHandler: function (event, validator) { //display error alert on form submit              
                            $('.alert-danger', $('#recall_replace-from')).fadeIn(500);
                            scrollTo($('#recall_replace-from'), -100);
                        },
                        submitHandler: function (form) {
                            let users = $('[name="replacement_user[]"]').filter(function () {
                                return $(this).val() !== "";
                            });
                            let replacement_checkbox = $('[name="replacement_pending_user[]"]:checked');
                            if (lm_validate.check_box(["replacement_pending_user[]"])) {
                                if (replacement_checkbox.length === users.length) {
                                    $('#recall_replaced').attr("disabled", true);
                                    loading.show();
                                    form.submit();
                                } else {
                                    show_notification("e", 'topright', "Select Valid User");
                                }
                            }
                        }
                    });
                    //If recall checkbox checked enable dropdowns
                    $('.recall_checbox').on('click', function () {
                        if ($(this).is(':checked')) {
                            lm_dom.find_in_parent(this, 'tr', '.recall_ed').removeAttr("disabled");
                        } else {
                            lm_dom.find_in_parent(this, 'tr', '.recall_ed').prop("disabled", true).val("");
                        }
                    });
                    //If Select all checkbox checked enable all dropdowns
                    $('.select_all').on('click', function () {
                        if ($(this).is(':checked')) {
                            lm_dom.find_in_parent(this, 'form', '.recall_ed').removeAttr("disabled").val("");
                            lm_dom.find_in_parent(this, 'form', '.recall_checbox').prop("checked", true);
                        } else {
                            lm_dom.find_in_parent(this, 'form', '.recall_ed').attr("disabled", true).val("");
                            lm_dom.find_in_parent(this, 'form', '.recall_checbox').prop("checked", false);
                        }
                    });

                    //User List
                    var user_list = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['recall_workflow_users']->value);?>
');
                    (user_list) ? $(".recall_add_remove_user_list,.recall_replace_remove_user_list").val(user_list.join(',')) : null;
                });
            <?php echo '</script'; ?>
>
        
    </div>
<?php }
}
}
