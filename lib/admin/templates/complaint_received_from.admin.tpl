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
            <li class="active">CMS Data </li>
            <li class="active">Complaint Received From </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmtype"> Add Complaint Received From </a> </h4>
                </div>
                <div id="collapsedmtype" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Complaint Received From Form</h2>
                                <form name="add_cm_received_from-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_cm_received_from-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-3">{attribute_name module="admin" attribute="complaint_received_from"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="received_from" id="received_from"    required title="Enter Valid Type">
                                            </div>
                                            <div id="exist_complaint_received_from_message"></div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-3"></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="add_received_from" id="add_received_from" >Add</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsetypelist"> Complaint Received From List</a> </h4>
                </div>
                <div id="collapsetypelist" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if !empty($complaint_received_from_list)}
                                            <table class="table table-bordered table-striped" id="cm_received_from_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="admin" attribute="complaint_received_from"}</th>
                                                        <th >{attribute_name module="admin" attribute="action"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$complaint_received_from_list} 
                                                        <tr>
                                                            <td>{$item.received_from}</td>
                                                            <td>
                                                                <button class="btn btn-primary" data-toggle="modal" onClick="update_complaint_received_from('{$item.object_id}', '{$item.received_from}');"  data-target="#edit_cm_received_from"><i class="fa fa-pencil"></i></button>
                                                            </td>
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
<div class="modal fade" id="edit_cm_received_from" tabindex="-1" role="dialog" aria-labelledby="edit_cm_received_from" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Complaint Received From Form</h4>
            </div>
            <form name="edit_cm_received_from-form" id="edit_cm_received_from-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-3">{attribute_name module="admin" attribute="complaint_received_from"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <input type="text" placeholder="Min 3 - Max 40" class="width-60" name="ureceived_from" id="ureceived_from"  required title="Enter Valid Type">
                            </div>
                            <div id="exist_complaint_ureceived_from_message"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button class="btn vd_bg-green vd_white" type="submit"  name="update_received_from" id="update_received_from" >Save Changes</button>
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
        $(document).ready(function () {
            $('#cm_received_from_data-tables').dataTable({
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
                        message: 'Complaint Received From List',
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
                        message: 'Complaint Received From List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }
                ],
            });
        });

        // Add Complaint Type Validation
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_cm_received_from-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    received_from: {
                        minlength: 2,
                        required: true
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
                    if (document.getElementById('exist_complaint_received_from_message').innerHTML == "Complaint Received From exists") {
                        alert("Complaint Received From exists.Enter Different Type!");
                        return false;
                    }
                    $('#add_received_from').attr("disabled", true);
                    form.submit();
                },
            });
        });
        
        // Update Complaint Type Form Validation
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_cm_received_from-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    ureceived_from: {
                        minlength: 2,
                        required: true,
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
                    if (document.getElementById('exist_complaint_ureceived_from_message').innerHTML == "Complaint Received From exists") {
                        alert("Complaint Received From exists.Enter Different Type!");
                        return false;
                    }
                    $('#update_received_from').attr("disabled", true);
                    form.submit();
                },
            });
        });

        function update_complaint_received_from(object_id, received_from) {
            $("#uobject_id").val(object_id);
            $("#ureceived_from").val(received_from);
        }
        
        function complaint_received_from_check_handle(result) {
            if (result == "true") {
                document.getElementById('exist_complaint_received_from_message').innerHTML = "Complaint Received From exists";
                document.getElementById('exist_complaint_received_from_message').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('exist_complaint_received_from_message').innerHTML = "   ";
            }
        }
        function ucomplaint_received_from_check_handle(result) {
            if (result == "true") {
                document.getElementById('exist_complaint_ureceived_from_message').innerHTML = "Complaint Received From exists";
                document.getElementById('exist_complaint_ureceived_from_message').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('exist_complaint_ureceived_from_message').innerHTML = "   ";
            }
        }

        $(document).ready(function () {
            $("#received_from").keyup(function () {
                $('#received_from').val($(this).val().toUpperCase());
                var received_from = $('#received_from').val();
                x_complaint_received_from_exists(received_from, complaint_received_from_check_handle);
            });
        });
        $(document).ready(function () {
            $("#ureceived_from").keyup(function () {
                $('#ureceived_from').val($(this).val().toUpperCase());
                var received_from = $('#ureceived_from').val();
                x_complaint_received_from_exists(received_from, ucomplaint_received_from_check_handle);
            });
        });

    </script>
{/literal}

