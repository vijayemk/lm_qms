<?php
/* Smarty version 3.1.30, created on 2024-10-26 10:34:41
  from "/var/www/html/lm_qms/lib/admin/templates/list_product_master.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671c78691c0b03_03901962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '075ff9e8ea6b8d6c03822ca379d15bfe4528b293' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/list_product_master.admin.tpl',
      1 => 1723887470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_671c78691c0b03_03901962 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">Product Master</li>
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Product Master</a> </h4>
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
                                        <form name="add_product-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_product-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_code"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50" class="required product_code" name="aproduct_code" id="aproduct_code" required title="Enter Valid Product Code">
                                                        <span class="font-semibold vd_red error_exists"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_name"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50" class="required product_name" name="aproduct_name" id="aproduct_name" required title="Enter Valid Product Name">
                                                        <span class="font-semibold vd_red error_exists"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"generic_name"),$_smarty_tpl);?>
</label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50"  name="ageneric_name" id="ageneric_name"   title="Enter Valid Generic Name">
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Product Master List</a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="vd_content-section clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget">
                                <div class="panel-body table-responsive">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['product_list']->value)) {?>
                                        <table class="table table-bordered table-striped generate_datatable" id="product_data-tables" title="Product List">
                                            <thead>
                                                <tr>
                                                    <td><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</td>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_code"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_name"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"generic_name"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
</th> 
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                    <tr >
                                                        <td></td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['product_code'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['generic_name'];?>
</td>
                                                        <td ><span class="label label-<?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled'] == 'yes') {?>success<?php } else { ?>danger<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value['is_enabled'];?>
</span></td>
                                                        <td ><button class="btn btn-primary" data-toggle="modal" onclick="update_product_det(<?php echo htmlspecialchars(json_encode($_smarty_tpl->tpl_vars['item']->value));?>
);" data-target="#edit-product"><i class="fa fa-pencil"></i></button></td>
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
<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Product Master</h4>
            </div>
            <div class="modal-body">
                <form name="edit_product-form" id="edit_product-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_code"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" placeholder="Min 2 - Max 50" class="required product_code" name="uproduct_code" id="uproduct_code" required title="Enter Valid Product Code">
                                <span class="font-semibold vd_red error_exists"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"product_name"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" placeholder="Min 2 - Max 50" class="required product_name" name="uproduct_name" id="uproduct_name" required title="Enter Valid Product Name">
                                <span class="font-semibold vd_red error_exists"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"generic_name"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" placeholder="Min 3 - Max 100"  name="ugeneric_name" id="ugeneric_name"   title="Enter Valid Generic Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="required" name="uis_enabled" id="uis_enabled"  required title="Select Valid Type">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-right">
                        <div class="col-sm-12">
                            <input type="hidden" name="uobject_id" id="uobject_id">
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
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            // Add Product 
            var form_submit = $('#add_product-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    aproduct_code: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    aproduct_name: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
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
                },
            });
             // EditProduct Code
            "use strict";
            var form_submit = $('#edit_product-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    uproduct_code: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    uproduct_name: {
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
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#update').attr("disabled", true);
                    form.submit();
                }
            });
            $(document).on('keyup', '.product_code', function () {
                let ele = $(this);
                ele.val(ele.val().toUpperCase());
                x_is_product_code_exists(ele.val(), function (result) {
                    ajax_respone_handler_value_exist(result, ele);
                });
            });
            $(document).on('keyup', '.product_name', function () {
                let ele = $(this);
                ele.val(ele.val().toUpperCase());
                x_is_product_name_exists(ele.val(), function (result) {
                    ajax_respone_handler_value_exist(result, ele);
                });
            });
        });
        function update_product_det(data) {
            $("#uobject_id").val(data.object_id);
            $("#uproduct_code").val(data.product_code);
            $("#uproduct_name").val(data.product_name);
            $("#ugeneric_name").val(data.generic_name);
            $("#uis_enabled").val(data.is_enabled);
        }
    <?php echo '</script'; ?>
>
<?php }
}
