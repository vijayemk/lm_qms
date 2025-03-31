<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Userlist </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Add User </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">User Creation Form</h2>
                                <form name="list_user" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="list_user-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 30" class="width-60 required" name="user_name" id="user_name" maxlength="30" onkeyup="username_exist(); return false;"  required title="Enter Valid User Name">
                                            </div>
                                            <div id="username_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="full_name"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="full_name" id="full_name" maxlength="40" required title="Enter Valid Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="password"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="password" placeholder="Min 8 - Max 15" class="width-60 required" required  name="password" id="password" maxlength="15" onkeyup="CheckPasswordStrength()" title="Enter Valid Password">
                                            </div>
                                            <div id="password_strength"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2"><span class="vd_red"></span></label>
                                        <div class="controls col-sm-6" id="password_contain"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="retypepassword"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="password" placeholder="Min 8 - Max 15" class="width-60 required" required  name="retypepassword" id="retypepassword" maxlength="15" title="Enter Valid Retype Password">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="organization"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="organization" id="organization" onchange="get_org_plant(this.options[this.selectedIndex].value)" required title="Select Valid Organization Name">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$organizationlist}
                                                        <option value="{$item->org_id}">{$item->org_name}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module=admin attribute=plant_name} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="plant_name" id="plant_name" onchange="get_org_plant_dept_list(this.options[this.selectedIndex].value)" required title="Select Valid Company Name">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="department" id="department"  required title="Select Valid Department Name">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="emp_id"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="emp_id" id="emp_id" maxlength="40" onkeyup="empid_exist(); return false;" required title="Enter Valid Employee Id">
                                            </div>
                                            <div id="empid_exist_error_message"></div>
                                            <div id="signup_empid_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="designation"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="designation" id="designation" required title="Select Valid Designation">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$designationlist}
                                                        <option value="{$item->designation_id}">{$item->designation_name}
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="email"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="email" id="email" maxlength="60" onkeyup="email_exist(); return false;" required title="Enter Valid Email Id">
                                            </div>
                                            <div id="email_exist_error_message"></div>
                                            <div id="signup_email_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="confirm_email"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="confirm_email" id="confirm_email" maxlength="60" onkeyup="confirm_email_exist(); return false;" required title="Enter Valid Confirm Email Id">
                                            </div>
                                            <div id="confirm_email_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="select_applicable_per"} </label>
                                            <div class="vd_checkbox checkbox-info col-sm-2">
                                                {foreach name=list item=item key=key from=$workflow_access_per_list}
                                                    <input type="checkbox" name="sworkflow_per[]" value="{$item.access_per_id}" id="{$key}">
                                                    <label for="{$key}"> {$item.description} </label><br>
                                                {/foreach}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                      <div class="col-sm-2"></div>
                                      <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                        <div class="mgtp-10">
                                          <button class="btn vd_bg-green vd_white" type="submit"  name="adduser" id="adduser" onClick="return validation();">Add</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Active ({$active_user_count}) </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped" id="active_data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th >{attribute_name module="admin" attribute="user_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="full_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="emp_id"}</th>
                                                    <th >{attribute_name module="admin" attribute="organization"}</th>
                                                    <th >{attribute_name module="admin" attribute="plant_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="department"}</th>
                                                    <th >{attribute_name module="admin" attribute="designation"}</th>
                                                    <th >{attribute_name module="admin" attribute="email"}</th>
                                                    <th >{attribute_name module="admin" attribute="actions"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$active_userlist} 
                                                    <tr >
                                                        <td >{$item.user_name}</td>
                                                        <td >{$item.full_name}</td>
                                                        <td >{$item.emp_id}</td>
                                                        <td >{$item.organization}</td>
                                                        <td >{$item.plant_short_name}</td>
                                                        <td >{$item.department}</td>
                                                        <td>{$item.designation}</td>
                                                        <td><a href="mailto:{$item.email}"><font  color="blue">{$item.email}</font> </a></td>
                                                        <td class="menu-action">
                                                            <a data-original-title="Edit User Account" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=update_user&update_user_id={$item.user_id}"><i class="fa fa-pencil-square-o"></i></a>
                                                            <a data-original-title="Set Privilege" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_green"  href="?module=admin&action=permission_assign&upuserid={$item.user_id}"><i class="fa fa-key"></i></a>
                                                            <a data-original-title="Download PDF" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_red"  href="index.php?module=file&action=view_user_signup_file&signup_user_id={$item.user_id}" onclick="window.open(this.href, 'mysignupwin','left=200,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-pencil-square-o"></i></a>
                                                            <a data-original-title="Reset Password" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_green" href="?module=admin&action=reset_password&user_id={$item.user_id}"><i class="fa fa-unlock-alt" ></i></a>
                                                            {if !empty($item.signup_object_id)}
                                                                <a data-original-title="View User Account" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=view_signup&object_id={$item.signup_object_id}"><i class="fa fa-folder-open-o"></i></a>
                                                            {else}
                                                                <a data-original-title="Account manually activated by Admin" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_green"  href="#">Admin</a>
                                                            {/if}
                                                        </td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Disabled ({$inactive_user_count}) </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped" id="inactive_data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th >{attribute_name module="admin" attribute="user_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="full_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="emp_id"}</th>
                                                    <th >{attribute_name module="admin" attribute="organization"}</th>
                                                    <th >{attribute_name module="admin" attribute="plant_name"}</th>
                                                    <th >{attribute_name module="admin" attribute="department"}</th>
                                                    <th >{attribute_name module="admin" attribute="designation"}</th>
                                                    <th >{attribute_name module="admin" attribute="email"}</th>
                                                    <th >{attribute_name module="admin" attribute="actions"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$inactive_userlist}
                                                    <tr >
                                                        <td >{$item.user_name}</td>
                                                        <td >{$item.full_name}</td>
                                                        <td >{$item.emp_id}</td>
                                                        <td >{$item.organization}</td>
                                                        <td >{$item.plant_short_name}</td>
                                                        <td >{$item.department}</td>
                                                        <td>{$item.designation}</td>
                                                        <td><a href="mailto:{$item.email}"><font  color="blue">{$item.email}</font> </a></td>
                                                        <td class="menu-action">
                                                            <a data-original-title="Edit User Account" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=update_user&update_user_id={$item.user_id}"><i class="fa fa-pencil-square-o"></i></a>
                                                            <a data-original-title="Download PDF" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_red"  href="index.php?module=file&action=view_user_exit_file&exit_user_id={$item.user_id}" onclick="window.open(this.href, 'mysignupwin','left=200,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-pencil-square-o"></i></a>
                                                            {if !empty($item.exit_object_id)}
                                                                <a data-original-title="View User Account" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=view_user_exit&object_id={$item.exit_object_id}"><i class="fa fa-folder-open-o"></i></a>
                                                            {else}
                                                                <a data-original-title="Account manually Deactivated by Admin" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_green"  href="#">Admin</a>
                                                            {/if}
                                                        </td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
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
                       
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#active_data-table').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                autoWidth: false,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Active User List',

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
                        message: 'Active User List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },
                ],
                columnDefs: [
                    {
                        "visible": false, "targets": [3]
                    }
                ],
                
            } );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#inactive_data-table').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                autoWidth: false,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Disabled User List',

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
                        message: 'Disabled User List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                columnDefs: [
                    {
                        "visible": false, "targets": [3]
                    }
                ],
            } );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#list_user-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    user_name: {
                        minlength: 3,
                        required: true
                    },
                    full_name: {
                        minlength: 3,					
                        required: true
                    },
                    password: {
                        minlength: 8,					
                        required: true
                    },
                    retypepassword: {
                        minlength: 8,					
                        required: true
                    },
                    organization: {
                        required: true
                    },
                    plant_name: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    emp_id: {
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
                    confirm_email: {
                        minlength: 3,					
                        required: true,
                        email: true
                    },
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
                    $('#adduser').attr("disabled", true);
                    form.submit();
                },
                
            });
        
        });
   
    
        function username_check_handle(result) {
            if (result=="true") {
                document.getElementById('username_exist_error_message').innerHTML = "User Name exists";
                document.getElementById('username_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('username_exist_error_message').innerHTML = "   ";
            }
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
        function confirm_email_check_handle(result) {
            if (result=="true") {
                document.getElementById('confirm_email_exist_error_message').innerHTML = "Email Id exists";
                document.getElementById('confirm_email_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('confirm_email_exist_error_message').innerHTML = "   ";
            }
        }
        function username_exist() {
            var user_name = document.getElementById('user_name').value.toLowerCase();
            x_username_exist(user_name, username_check_handle);
        }
        function empid_exist(){
            var emp_id = document.getElementById('emp_id').value;
            x_empid_exist(emp_id, empid_check_handle);
            x_signup_empid_exist(emp_id, signup_empid_check_handle);
        }
        function email_exist(){
            var email = document.getElementById('email').value.toLowerCase();
            x_emailid_exist(email, email_check_handle);
            x_signup_emailid_exist(email, signup_email_check_handle);
        }
        function confirm_email_exist(){
            var email = document.getElementById('confirm_email').value.toLowerCase();
            x_emailid_exist(email, confirm_email_check_handle);
        }
        function validation() {
            var password_strength= CheckPasswordStrength();
            if(password_strength=="false"){
                var password_contain = document.getElementById("password_contain");
                password_contain.innerHTML = "Password Must Contains Min 8 ,atleast One Lower Case,One Upper Case and One Special Character";           
                document.getElementById('password_contain').style.color="red";
                return false;
            }else{
                var password_contain = document.getElementById("password_contain");
                password_contain.innerHTML = "";
            }
            if (document.getElementById('username_exist_error_message').innerHTML == "User Name exists"){
                alert("User Name Exist.Pls Enter Different Unique User Name.!");
                return false;
            }
            if (document.getElementById('empid_exist_error_message').innerHTML == "Employee Id exists"){
                alert("Employee Id Exist.Pls Enter Different Unique Employee Id.!");
                return false;
            }
            if (document.getElementById('signup_empid_exist_error_message').innerHTML == "Employee Id exists"){
                alert("Employee Id Exist.Pls Enter Different Unique Employee Id.!");
                return false;
            }
            if (document.getElementById('email_exist_error_message').innerHTML == "Email Id exists"){
                alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                document.getElementById("email").style.borderColor='red';
                document.getElementById("email").focus();
                return false;
            }
            if (document.getElementById('signup_email_exist_error_message').innerHTML == "Email Id exists"){
                alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                document.getElementById("email").style.borderColor='red';
                document.getElementById("email").focus();
                return false;
            }
            if (document.getElementById('confirm_email_exist_error_message').innerHTML == "Email Id exists"){
                alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                document.getElementById("confirm_email").style.borderColor='red';
                document.getElementById("confirm_email").focus();
                return false;
            }

            if (document.getElementById("password").value !== document.getElementById("retypepassword").value) {
                alert ("You did not enter the same password twice. Please re-enter your password.")
                return false;
            }
            if (document.getElementById("email").value != document.getElementById("confirm_email").value) {
                alert ("You did not enter the same Email Id twice. Please re-enter Valid Email Id.")
                return false;
            }

        }
        function CheckPasswordStrength() {
            var password = document.getElementById("password").value;
            var password_strength = document.getElementById("password_strength");

            //TextBox left blank.
            if (password.length == 0) {
                password_strength.innerHTML = "";
                return;
            }

            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.

            var passed = 0;

            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                    passed++;
                }
            }

            //Validate for length of Password.
            if (passed > 2 && password.length > 8) {
                passed++;
            }

            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            password_strength.innerHTML = strength;
            password_strength.style.color = color;
            if(strength=="Very Strong"){
                return "true";
            }else{
                return "false";
            }
        }
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
    </script>
{/literal}
