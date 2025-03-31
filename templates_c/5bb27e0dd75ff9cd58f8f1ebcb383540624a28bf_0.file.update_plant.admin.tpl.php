<?php
/* Smarty version 3.1.30, created on 2024-12-30 15:46:53
  from "/var/www/html/lm_qms/lib/admin/templates/update_plant.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67727315e99423_46245290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bb27e0dd75ff9cd58f8f1ebcb383540624a28bf' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/update_plant.admin.tpl',
      1 => 1633499771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_67727315e99423_46245290 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li><a href="index.php?module=admin&action=list_organization">Organization</a> </li>
            <li class="active">Update Company </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Update Company </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Update Company Form</h2>
                                <form name="uplant-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="uplant-form" autocomplete="off" enctype="multipart/form-data">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls col-sm-6">
                                                <select class="width-60 required" name="porg_name" id="porg_name" title="Select Valid Company Name">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orglist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->org_id;?>
" <?php if ($_smarty_tpl->tpl_vars['regobj']->value->org_id == $_smarty_tpl->tpl_vars['item']->value->org_id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->org_name;?>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 100" class="width-60 required" name="plant_name" id="plant_name" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->plant_name;?>
" maxlength="100" required title="Enter Valid Company Name">
                                            </div>
                                            <div id="plant_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_short_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 20" class="width-60 required" name="pshort_name" id="pshort_name" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->short_name;?>
" maxlength="20" required title="Enter Valid Company Short Name">
                                            </div>
                                            <div id="plant_short_name_exist_error_message"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"address"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="paddress" id="paddress" maxlength="500" required title="Enter Valid Address" ><?php echo $_smarty_tpl->tpl_vars['regobj']->value->address;?>
</textarea>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"city"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pcity" id="pcity" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->city;?>
" maxlength="40" required title="Enter Valid City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"state"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pstate" id="pstate" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->state;?>
" maxlength="40" required title="Enter Valid State">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"country"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pcountry" id="pcountry" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->country;?>
" maxlength="40" required title="Enter Valid Country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"pincode"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 6 - Max 15" class="width-60 required" name="ppincode" id="ppincode" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->pincode;?>
" maxlength="15" required title="Enter Valid Pincode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"contact_number"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 10 - Max 11" class="width-60 required" name="pcontact_number" id="pcontact_number" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->contact_number;?>
" maxlength="11" required title="Enter Valid Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="pemail" id="pemail" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->email;?>
" maxlength="60" title="Enter Valid Email ID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"website"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pwebsite" id="pwebsite" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->website;?>
" maxlength="40" title="Enter Valid Website Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"logo"),$_smarty_tpl);?>
</label>
                                            <div id="company-input-wrapper" class="controls col-sm-3">
                                                <input class="form-control" type="file" name="ufile" id="logo_file" accept="image/*" title="Select a valid logo">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"> <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fileobjectarray']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <a href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><span class="text-blue"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span></a>
                                                    <button type="button" onclick="delete_file_row('<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['regobj']->value->plant_id;?>
')" class="removebutton btn btn-danger btn-sm" title="Remove this file">X</button>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update">Update</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mgbt-xs-5"> </div>
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


    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#uplant-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    porg_name: {
                        required: true,
                    },
                    plant_name: {
                        minlength: 3,
                        required: true,
                    },
                    pshort_name: {
                        minlength: 2,
                        required: true,
                    },
                    paddress: {
                        minlength: 5,
                        required: true
                    },
                    pcity: {
                        minlength: 3,
                        required: true
                    },
                    pstate: {
                        minlength: 3,
                        required: true
                    },
                    pcountry: {
                        minlength: 3,
                        required: true
                    },
                    ppincode: {
                        minlength: 6,
                        required: true
                    },
                    pcontact_number: {
                        minlength: 10,
                        digits: true,
                        required: true
                    },
                    pemail: {
                        minlength: 5,
                        required: false,
                        email: true
                    },
                    pwebsite: {
                        minlength: 3,
                        required: false,
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")) {
                        element.parent().append(error);
                    } else if (element.parent().hasClass("vd_input-wrapper")) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);

                },

                highlight: function (element) { // hightlight error inputs
                    $(element).addClass('vd_bd-red');
                    $(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                            .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label, element) {
                    label
                            .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                            .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                    $(element).removeClass('vd_bd-red');
                },
                submitHandler: function (form) {
                    if ($("#plant_exist_error_message").html() == "Plant Exists") {
                        alert("Plant Name Exists");
                        return false
                    }
                    if ($("#plant_short_name_exist_error_message").html() == "Short Name Exists") {
                        alert("Short Name Exists");
                        return false
                    }
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function check_plant_handle(result) {
            if (result == "true") {
                $("#plant_exist_error_message").html("Plant Exists");
                $("#plant_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#plant_exist_error_message").html(" ");
            }
        }
        function check_plant_short_name_handle(result) {
            if (result == "true") {
                $("#plant_short_name_exist_error_message").html("Short Name Exists");
                $("#plant_short_name_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#plant_short_name_exist_error_message").html(" ");
            }
        }
        $(document).ready(function () {
            $("#plant_name").keyup(function () {
                $("#plant_name").val($("#plant_name").val().toUpperCase());
                x_plant_exist($("#plant_name").val(), check_plant_handle);
            });
            $("#pshort_name").keyup(function () {
                $("#pshort_name").val($("#pshort_name").val().toUpperCase());
                x_plant_short_name_exist($("#pshort_name").val(), check_plant_short_name_handle);
            });
        });
        function delete_file_row(file_id, plant_id) {
            x_delete_lm_doc_file_file(file_id, plant_id, check_file);
        }
        function check_file(result) {
            if (result == "true") {
                var msg = '<p class="fa fa-check-circle-o" style="font-size: 30px; float:left;margin-top: 5px;margin-right: 5px;"></p> File Deleted Successfully';
                $.notific8(msg, {theme: 'teal'});
                location.reload();
            }
            if (result == "false") {
                var msg = '<p class="fa fa-times-circle-o" style="font-size: 30px; float:left;margin-top: 5px;margin-right: 5px;"></p> File Not Deleted.Invalid Request Called';
                $.notific8(msg, {theme: 'ruby'});
            }
        }
    <?php echo '</script'; ?>
>

<?php }
}
