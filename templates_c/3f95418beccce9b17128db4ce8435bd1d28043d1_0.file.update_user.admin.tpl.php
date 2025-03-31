<?php
/* Smarty version 3.1.30, created on 2024-10-01 12:51:45
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/update_user.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbf061c22ef0_58740532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f95418beccce9b17128db4ce8435bd1d28043d1' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/update_user.admin.tpl',
      1 => 1633500091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fbf061c22ef0_58740532 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li><a href="index.php?module=admin&action=list_user">Userlist</a> </li>
            <li class="active">Update User </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Update User </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Update User Form</h2>
                                <form name="update_user" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_user-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 30" class="width-60 required" name="user_name" id="user_name" maxlength="30" onkeyup="username_exist(); return false;" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->user_name;?>
"  disabled required title="Enter Valid User Name">
                                            </div>
                                            <div id="username_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="organization" id="organization" onchange="get_org_plant(this.options[this.selectedIndex].value)" required title="Select Valid Organization Name">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['organizationlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->org_id;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value->org_id == $_smarty_tpl->tpl_vars['regobj']->value->org_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->org_name;?>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'plant_name'),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="plant_name" id="plant_name" onchange="get_org_plant_dept_list(this.options[this.selectedIndex].value)" required title="Select Valid Company Name">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['regobj']->value->plant_id == $_smarty_tpl->tpl_vars['item']->value['plant_id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="department" id="department"  required title="Select Valid Department Name">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departmentlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['department_id'] == $_smarty_tpl->tpl_vars['regobj']->value->department_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"full_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="full_name" id="full_name" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->full_name;?>
" required title="Enter Valid Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"emp_id"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 20" class="width-60 required" name="emp_id" id="emp_id" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->emp_id;?>
" onkeyup="empid_exist(); return false;" required title="Enter Valid Employee Id">
                                            </div>
                                            <div id="empid_exist_error_message"></div>
                                            <div id="signup_empid_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"designation"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="designation" id="designation" required title="Select Valid Designation">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['designationlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->designation_id;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value->designation_id == $_smarty_tpl->tpl_vars['regobj']->value->designation_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->designation_name;?>

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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="email" id="email" maxlength="60" value="<?php echo $_smarty_tpl->tpl_vars['regobj']->value->email;?>
" onkeyup="email_exist(); return false;" required title="Enter Valid Email Id">
                                            </div>
                                            <div id="email_exist_error_message"></div>
                                            <div id="signup_email_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"account_status"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="account_status" id="account_status"  required title="Select Valid Account Status">
                                                    <option value="">Select</option>
                                                    <option value="enable" <?php if ($_smarty_tpl->tpl_vars['regobj']->value->account_status == 'enable') {?> selected<?php }?>>Enabled</option>
                                                    <option value="disable"<?php if ($_smarty_tpl->tpl_vars['regobj']->value->account_status == 'disable') {?> selected<?php }?>>Disabled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason_for_change"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="update_reason" id="update_reason" maxlength="500" required title="Enter Valid Reason for Change" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2"><span class="vd_red"></span></label>
                                        <div class="controls col-sm-6" ><p style="color:green">Note : For the security reason <span> <b>"New Password"</b></span> will be sent to <?php echo $_smarty_tpl->tpl_vars['regobj']->value->email;?>
</p></div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                      <div class="col-sm-2"></div>
                                      <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                        <div class="mgtp-10">
                                          <button class="btn vd_bg-green vd_white" type="submit"  name="updateuser" id="updateuser" onClick="return validation();">Update</button>
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
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> History </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (isset($_smarty_tpl->tpl_vars['user_update_histoy_remarks_array']->value)) {?>
                                            <table class="table table-bordered table-striped" id="update_history_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'update_by'),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'department'),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'date'),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'update_reason'),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_update_histoy_remarks_array']->value, 'cnt', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cnt']->value) {
?> 
                                                        <tr >
                                                            <td><?php echo $_smarty_tpl->tpl_vars['cnt']->value['updated_by'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['cnt']->value['department_name'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['cnt']->value['date_time'];?>
</td>
                                                            <td style="white-space:pre"><?php echo $_smarty_tpl->tpl_vars['cnt']->value['remarks'];?>
</td>
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
                       

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            $('#update_history_data-tables').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Designation List',

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
                        message: 'Designation List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
            var table = $('#update_history_data-tables').dataTable();
            table.on( 'draw', function () {
                var body = $( table.table().body() );
                body.unhighlight();
                body.highlight( table.search() );  
            } );
            // Setup - add a text input to each footer cell
            $('#update_history_data-tables tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );
        } );
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#update_user-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    organization: {
                        required: true
                    },
                    plant_name:{
                        required: true
                    },
                    department: {
                        required: true
                    },
                    emp_id: {
                        minlength: 3,					
                        required: true
                    },
                    full_name: {
                        minlength: 3,
                        required: true
                    },
                    designation: {
                        required: true
                    },
                    email: {
                        minlength: 3,					
                        required: true,
                        email: true
                    },
                    account_status: {
                        required: true
                    },
                    update_reason: {
                        minlength: 5,
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
                        element.parent().append(error);
                    } else if (element.parent().hasClass("vd_input-wrapper")){
                        error.insertAfter(element.parent());
                    }else {
                        error.insertAfter(element);
                    }
                }, 

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit,-100);

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
                submitHandler: function(form) {
                    var email_exisit_msg = $('#email_exist_error_message').html();
                    var signup_email_exisit_msg = $('#signup_email_exist_error_message').html();
                    var emp_id_exisit_msg = $('#empid_exist_error_message').html();
                    var signup_emp_id_exisit_msg = $('#signup_empid_exist_error_message').html();
                    if(email_exisit_msg =="Email Id exists" || signup_email_exisit_msg=="Email Id exists") {
                        return false;
                    }
                    if(emp_id_exisit_msg =="Employee Id exists" || signup_emp_id_exisit_msg=="Employee Id exists") {
                        return false;
                    }
                    $('#updateuser').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function get_org_plant(value){
            x_get_org_plant(value,list_plant);
        }
        function list_plant(result){
            var plant_obj=document.getElementById("plant_name")
            for (i=plant_obj.length;plant_obj.length>0;i--) {
                plant_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                plant_obj.add(addy,null);
            }
            catch(ex) {
                plant_obj.add(addy);
            }
            for (var y in result) {
                var plant_array = result[y]
                var addy=document.createElement('option');
                addy.id=plant_array.plant_id
                addy.text=plant_array.short_name+" - ["+plant_array.plant_name+"]";
                addy.value=plant_array.plant_id
                try {
                    plant_obj.add(addy,null);
                }
                catch(ex) {
                    plant_obj.add(addy);
                }
            }
        }
        function email_exist(){
            var email = document.getElementById('email').value.toLowerCase();
            x_emailid_exist(email, email_check_handle);
            x_signup_emailid_exist(email, signup_email_check_handle);
        }
        function email_check_handle(result) {
            if (result=="true") {
                document.getElementById('email_exist_error_message').innerHTML = "Email Id exists";
                document.getElementById('email_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('email_exist_error_message').innerHTML = "   ";
            }
        }
        function signup_email_check_handle(result) {
            if (result=="true") {
                document.getElementById('signup_email_exist_error_message').innerHTML = "Email Id exists";
                document.getElementById('signup_email_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('signup_email_exist_error_message').innerHTML = "   ";
            }
        }
        function empid_exist(){
            var emp_id = document.getElementById('emp_id').value;
            x_empid_exist(emp_id, empid_check_handle);
            x_signup_empid_exist(emp_id, signup_empid_check_handle);
        }
        function empid_check_handle(result) {
            if (result=="true") {
                document.getElementById('empid_exist_error_message').innerHTML = "Employee Id exists";
                document.getElementById('empid_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('empid_exist_error_message').innerHTML = "   ";
            }
        }
        function signup_empid_check_handle(result) {
            if (result=="true") {
                document.getElementById('signup_empid_exist_error_message').innerHTML = "Employee Id exists";
                document.getElementById('signup_empid_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('signup_empid_exist_error_message').innerHTML = "   ";
            }
        }
        function get_org_plant_dept_list(value){
            x_getPlantDeptList(value,list_dept);
        }
        function list_dept(result){
            var dept_obj=document.getElementById("department")
            for (i=dept_obj.length;dept_obj.length>0;i--) {
                dept_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                dept_obj.add(addy,null);
            }
            catch(ex) {
                dept_obj.add(addy);
            }
            for (var y in result) {
                var dept_array = result[y]
                var addy=document.createElement('option');
                addy.id=dept_array.department_id;
                addy.text=dept_array.department+" - ["+dept_array.full_name+"]";
                addy.value=dept_array.department_id
                try {
                    dept_obj.add(addy,null);
                }
                catch(ex) {
                    dept_obj.add(addy);
                }
            }
        }
    <?php echo '</script'; ?>
>

<?php }
}
