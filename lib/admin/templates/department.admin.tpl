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
            <li class="active">Department </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add Department </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Department Form</h2>
                                <form name="department" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_dept-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department_code"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 2" class="width-60 requred" name="code" id="code" maxlength="2" onkeyup="departmentcode_exist(); return false;"  required title="Enter Valid Department Code">
                                            </div>
                                            <div id="exist_error_code_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="dep" id="dep" maxlength="40" onkeyup="department_exist(); return false;"  required title="Enter Valid Department Short Name">
                                            </div>
                                            <div id="exist_error_dept_message"></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="full_name"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="full_name" id="full_name" maxlength="40" required title="Enter Valid Department Full Name">
                                            </div>
                                      </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add" onClick="return validation();">Add</button>
                                            </div>
                                        </div>
                                      <div class="col-md-12 mgbt-xs-5"> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Panel Widget -->
                    </div>
                </div>
            </div>   
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Department List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if !empty($departmentlist)}
                                            <table class="table table-bordered table-striped" id="dept_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="admin" attribute="department_code"}</th>
                                                        <th>{attribute_name module="admin" attribute="short_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="full_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="actions"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$departmentlist} 
                                                        <tr >
                                                            <td >{$item->department_code}</td>
                                                            <td >{$item->department}</td>
                                                            <td >{$item->full_name}</td>
                                                            <td ><button class="btn btn-primary" data-toggle="modal" onclick="set_udept('{$item->department_id}','{$item->department_code}','{$item->department}','{$item->full_name}');"  data-target="#edit-dept"><i class="fa fa-pencil"></i></button></td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        {else}
                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                            </div>
                                        {/if}
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
<div class="modal fade" id="edit-dept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            </div>
            <form name="edit_dept-form" id="edit_dept-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department_code"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 2 - Max 2" class="width-60 required" name="ucode" id="ucode" maxlength="2" onkeyup="udepartmentcode_exist(); return false;"  required title="Enter Valid Department Code">
                                <div id="uexist_error_code_message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="udep" id="udep" maxlength="40" onkeyup="udepartment_exist(); return false;"  required title="Enter Valid Department Short Name">
                                <div id="uexist_error_dept_message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="full_name"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="ufull_name" id="ufull_name" maxlength="40" required title="Enter Valid Department Full Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"></label>
                            <div id="exist_error_message" class="controls col-sm-10"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn vd_btn vd_bg-green" name="update" id="update" onClick="return uvalidation();">Save changes</button>
                </div>
                <input type="hidden" name="udept_id" id="udept_id">
            </form>
        </div>
    </div>
</div>                     
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dept_data-tables').dataTable( {
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
                        message: 'Department List',

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
                        message: 'Department List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        "use strict";
        var form_submit = $('#add_dept-form');
        var error_register = $('.alert-danger', form_submit);
        var success_register = $('.alert-success', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                code: {
                    minlength: 2,
                    required: true
                },
                dep: {
                    minlength: 2,					
                    required: true
                },
                full_name: {
                    minlength: 3,					
                    required: true
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
                $('#add').attr("disabled", true);
                form.submit();
            },

        });
    });
    $(document).ready(function() {
        $("#full_name").keyup(function(){
            $("#full_name").val($("#full_name").val().toUpperCase());
        });
        $("#ufull_name").keyup(function(){
            $("#ufull_name").val($("#ufull_name").val().toUpperCase());
        });
    });
    function validation() {
        if (document.getElementById('exist_error_code_message').innerHTML == "Department Code exists"){
            alert("Department Code Exist.Enter Different Department Code!");
            return false;
        }
        if (document.getElementById('exist_error_dept_message').innerHTML == "Department exists"){
            alert("Department Exist.Enter Different Department!");
            return false;
        }
    }
    function uvalidation() {
        if (document.getElementById('uexist_error_code_message').innerHTML == "Department Code exists"){
            alert("Department Code Exist.Enter Different Department Code!");
            return false;
        }
        if (document.getElementById('uexist_error_dept_message').innerHTML == "Department exists"){
            alert("Department Exist.Enter Different Department!");
            return false;
        }
    }
    function dept_code_check_handle(result) {
        if (result=="true") {
            document.getElementById('exist_error_code_message').innerHTML = "Department Code exists";
            document.getElementById('exist_error_code_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_code_message').innerHTML = "   ";
        }
    }
    function udept_code_check_handle(result) {
        if (result=="true") {
            document.getElementById('uexist_error_code_message').innerHTML = "Department Code exists";
            document.getElementById('uexist_error_code_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('uexist_error_code_message').innerHTML = "   ";
        }
    }
    
    function departmentcode_exist() {
        var dep_code = document.getElementById('code').value;
        x_departmentcode_exist(dep_code, dept_code_check_handle);
    }

    function udepartmentcode_exist() {
        var dep_code = document.getElementById('ucode').value;
        x_departmentcode_exist(dep_code, udept_code_check_handle);
    }
    function dept_check_handle(result) {
        if (result=="true") {
            document.getElementById('exist_error_dept_message').innerHTML = "Department exists";
            document.getElementById('exist_error_dept_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_dept_message').innerHTML = "   ";
        }
    }
    function udept_check_handle(result) {
        if (result=="true") {
            document.getElementById('uexist_error_dept_message').innerHTML = "Department exists";
            document.getElementById('uexist_error_dept_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('uexist_error_dept_message').innerHTML = "   ";
        }
    }
    function department_exist() {
        document.getElementById('dep').value=document.getElementById('dep').value.toUpperCase();
        var dep = document.getElementById('dep').value;
        x_department_exist(dep, dept_check_handle);
    }
    function udepartment_exist() {
        document.getElementById('udep').value=document.getElementById('udep').value.toUpperCase();
        var dep = document.getElementById('udep').value;
        x_department_exist(dep, udept_check_handle);
    }
    function set_udept(dept_id,code,short_name,full_name){
        $("#udept_id").val(dept_id);
        $("#ucode").val(code);
        $("#udep").val(short_name);
        $("#ufull_name").val(full_name);
    }

    $(document).ready(function() {
        "use strict";
        var form_submit = $('#edit_dept-form');
        var error_register = $('.alert-danger', form_submit);
        var success_register = $('.alert-success', form_submit);
        form_submit.validate({
            errorElement: 'div',    //default input error message container
            errorClass: 'vd_red',   // default input error message class
            focusInvalid: false,    // do not focus the last invalid input
            ignore: "",
            rules: {
                ucode: {
                    minlength: 2,
                    required: true
                },
                udep: {
                    minlength: 2,					
                    required: true
                },
                ufull_name: {
                    minlength: 3,					
                    required: true
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
                $('#update').attr("disabled", true);
                form.submit();
            },

        });
    });
</script>
{/literal}
