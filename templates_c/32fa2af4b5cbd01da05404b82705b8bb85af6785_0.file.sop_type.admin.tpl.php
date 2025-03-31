<?php
/* Smarty version 3.1.30, created on 2024-10-26 17:32:32
  from "/var/www/html/lm_qms/lib/admin/templates/sop_type.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671cda58d42922_04052735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32fa2af4b5cbd01da05404b82705b8bb85af6785' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/sop_type.admin.tpl',
      1 => 1618050541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_671cda58d42922_04052735 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">Setings </li>
            <li class="active">SOP Data </li>
            <li class="active">Type </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add SOP Type </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">SOP Type Form</h2>
                                <form name="soptypes" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="sop_type-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="sop_type" id="sop_type" maxlength="40" required title="Enter Valid SOP Type">
                                            </div>
                                            <div id="exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_desc"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="sop_desc" id="sop_desc" maxlength="40" required title="Enter Valid Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="add">Add</button>
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
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> SOP Type List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['soptypelistdetails']->value)) {?>
                                            <table class="table table-bordered table-striped" id="sop_type_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_type"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_desc"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"creator"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"create_time"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soptypelistdetails']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                        <tr >
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['is_enabled'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['creator'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_time'];?>
</td>
                                                            <td ><button class="btn btn-primary" data-toggle="modal" onclick="set_usop_type('<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
')"  data-target="#edit-sop_type"><i class="fa fa-pencil"></i></button></td>
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
</div>
<!-- Modal -->
<div class="modal fade" id="edit-sop_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            </div>
            <form name="edit_sop_type-form" id="edit_sop_type-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="usop_type" id="usop_type" maxlength="40" required title="Enter Valid SOP Type">
                                <div id="uexist_error_message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sop_desc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="usop_desc" id="usop_desc" maxlength="40" required title="Enter Valid Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <select class="width-60" name="uis_enabled" id="uis_enabled"  required title="Select Valid Option">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <input type="hidden" name="usop_type_id" id="usop_type_id">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn vd_btn vd_bg-green" name="update" id="update">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#sop_type_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'SOP Type List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'SOP Type List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],

            });
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#sop_type-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sop_type: {
                        minlength: 3,
                        required: true,
                    },
                    sop_desc: {
                        minlength: 3,
                        required: false,
                    },

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var msg_code = $('#exist_error_message').html();
                    if (msg_code == "SOP Type Exists") {
                        return false;
                    }
                    $('#add').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            $("#sop_type").keyup(function () {
                $("#sop_type").val($("#sop_type").val().toUpperCase());
                x_sop_type_exists($("#sop_type").val(), check_handle);
            });
            $("#usop_type").keyup(function () {
                $("#usop_type").val($("#usop_type").val().toUpperCase());
                x_sop_type_exists($("#usop_type").val(), check_uhandle);
            });
        });
        function check_handle(result) {
            if (result == "true") {
                document.getElementById('exist_error_message').innerHTML = "SOP Type Exists";
                document.getElementById('exist_error_message').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('exist_error_message').innerHTML = "   ";
            }
        }
        function check_uhandle(result) {
            if (result == "true") {
                document.getElementById('uexist_error_message').innerHTML = "SOP Type Exists";
                document.getElementById('uexist_error_message').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('uexist_error_message').innerHTML = "   ";
            }
        }
        function set_usop_type(object_id, type, desc) {
            $("#usop_type_id").val(object_id);
            $("#usop_type").val(type);
            $("#usop_desc").val(desc);
        }
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_sop_type-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    usop_type: {
                        minlength: 3,
                        required: true,
                    },
                    usop_desc: {
                        minlength: 3,
                        required: false,
                    },
                    uis_enabled: {
                        required: false,
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var msg_code = $('#uexist_error_message').html();
                    if (msg_code == "SOP Type Exists") {
                        return false;
                    }
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
