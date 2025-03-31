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
            <li class="active">Settings </li>
            <li class="active">MRM Data </li>
            <li class="active">Calender Month </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseAddMonth"> Add Month </a> </h4>
                </div>
                <div id="collapseAddMonth" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Month - Form</h2>
                                <form name="add_month-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_month-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Ex: Jan" class="width-60 required" name="short_name" id="short_name"  onkeyup="short_name_exist(); return false;"  required title="Enter Valid Short Name">
                                            </div>
                                            <div id="exist_error_sname_message"></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="calendar_month"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Ex: January" class="width-60 required" name="month" id="month"  onkeyup="calendar_month_exist(); return false;"  required title="Enter Valid Month">
                                            </div>
                                            <div id="exist_error_month_message"></div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="order1"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="order" class="width-60 required" name="order1" id="order1"   required title="Enter Valid Order">
                                            </div>
                                            <div id="exist_error_order1_message"></div>
                                        </div>
                                    </div>        
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add" >Add</button>
                                            </div>
                                        </div>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseMonthlist"> Month List</a> </h4>
                </div>
                <div id="collapseMonthlist" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if !empty($month)}
                                            <table class="table table-bordered table-striped" id="month_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="admin" attribute="order1"}</th>
                                                        <th>{attribute_name module="admin" attribute="short_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="calendar_month"}</th>
                                                        <th>{attribute_name module="admin" attribute="actions"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$month} 
                                                        <tr>
                                                            <td >{$item->order1}</td>
                                                            <td >{$item->short_name}</td>
                                                            <td >{$item->month}</td>
                                                            <td ><button class="btn btn-primary" data-toggle="modal" onclick="set_umonth('{$item->object_id}','{$item->short_name}','{$item->month}');"  data-target="#edit-month"><i class="fa fa-pencil"></i></button></td>
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
<div class="modal fade" id="edit-month" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Month</h4>
            </div>
            <form name="edit_month-form" id="edit_month-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <input type="text" placeholder="Ex: Jan" class="width-60 required" name="ushort" id="ushort"  onkeyup="ushort_name_exist(); return false;"  required title="Enter Valid Short Name">
                            </div>
                            <div id="uexist_error_sname_message"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="calendar_month"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <input type="text" placeholder="Ex: January" class="width-60 required" name="umonth" id="umonth"  onkeyup="ucalendar_month_exist(); return false;"  required title="Enter Valid Month">
                            </div>
                            <div id="uexist_error_month_message"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn vd_btn vd_bg-green" name="update" id="update">Save changes</button>
                </div>
                <input type="hidden" name="uobject_id" id="uobject_id">
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
            $('#month_data-tables').dataTable( {
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
                        message: 'Month List',

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
                        message: 'Month List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                ],
            } );
        } );

    $(document).ready(function() {
        "use strict";
        var form_submit = $('#add_month-form');
        var error_register = $('.alert-danger', form_submit);
        var success_register = $('.alert-success', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                month: {
                    minlength: 2,
                    required: true
                },
                short_name: {
                    minlength: 2,					
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
                if (document.getElementById('exist_error_sname_message').innerHTML == "Short Name exists"){
                    alert("Short Name Exist.Enter Short Name!");
                return false;
                }
                if (document.getElementById('exist_error_month_message').innerHTML == "Calendar Month exists"){
                    alert("Calendar Month Exist.Enter Different Month!");
                    return false;
                }
                $('#add').attr("disabled", true);
                form.submit();
            },

        });
    });

    function short_name_check_handle(result) {
        if (result=="true") {
            document.getElementById('exist_error_sname_message').innerHTML = "Short Name exists";
            document.getElementById('exist_error_sname_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_sname_message').innerHTML = "   ";
        }
    }
    function ushort_name_check_handle(result) {
        if (result=="true") {
            document.getElementById('uexist_error_sname_message').innerHTML = "Short Name exists";
            document.getElementById('uexist_error_sname_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('uexist_error_sname_message').innerHTML = "   ";
        }
    }
    
    function short_name_exist() {
        document.getElementById('short_name').value=document.getElementById('short_name').value.toUpperCase();
        var short = document.getElementById('short_name').value;
        x_short_name_exist(short, short_name_check_handle);
    }

    function ushort_name_exist() {
        document.getElementById('ushort').value=document.getElementById('ushort').value.toUpperCase();
        var short = document.getElementById('ushort').value;
        x_short_name_exist(short, ushort_name_check_handle);
    }
    function month_check_handle(result) {
        if (result=="true") {
            document.getElementById('exist_error_month_message').innerHTML = "Calendar Month exists";
            document.getElementById('exist_error_month_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_month_message').innerHTML = "   ";
        }
    }
    function umonth_check_handle(result) {
        if (result=="true") {
            document.getElementById('uexist_error_month_message').innerHTML = "Calendar Month exists";
            document.getElementById('uexist_error_month_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('uexist_error_month_message').innerHTML = "   ";
        }
    }
    function calendar_month_exist() {
        document.getElementById('month').value=document.getElementById('month').value.toUpperCase();
        var month = document.getElementById('month').value;
        x_calendar_month_exist(month, month_check_handle);
    }
    function ucalendar_month_exist() {
        document.getElementById('umonth').value=document.getElementById('umonth').value.toUpperCase();
        var month = document.getElementById('umonth').value;
        x_calendar_month_exist(month, umonth_check_handle);
    }
    function set_umonth(object_id,short_name,month){
        $("#uobject_id").val(object_id);
        $("#ushort").val(short_name);
        $("#umonth").val(month);
    }

    $(document).ready(function() {
        "use strict";
        var form_submit = $('#edit_month-form');
        var error_register = $('.alert-danger', form_submit);
        var success_register = $('.alert-success', form_submit);
        form_submit.validate({
            errorElement: 'div',    //default input error message container
            errorClass: 'vd_red',   // default input error message class
            focusInvalid: false,    // do not focus the last invalid input
            ignore: "",
            rules: {
                umonth: {
                    minlength: 2,
                    required: true
                },
                ushort: {
                    minlength: 2,					
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
                if (document.getElementById('uexist_error_sname_message').innerHTML == "Short Name exists"){
                    alert("Short Name Exist.Enter Short Name!");
                    return false;
                }
                if (document.getElementById('uexist_error_month_message').innerHTML == "Calendar Month exists"){
                    alert("Calendar Month Exist.Enter Different Month!");
                    return false;
                }
                $('#update').attr("disabled", true);
                form.submit();
            },

        });
    });
</script>
{/literal}