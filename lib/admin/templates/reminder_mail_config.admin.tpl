<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Setings </li>
            <li class="active">Mail Alert </li>
            <li class="active">Reminder Mail </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Password Expiry </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Reminder Mail Setting Form</h2>
                                <form name="pass_expiry_mail_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="pass_expiry_mail_form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">Current Setting <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" class="width-60 required" name="pass_expiry_mail_config" value="{$pass_expiry_reminder_mail_days}" readonly>
                                                <p style="color: red">Note: Alert Mail will get triggered before {$pass_expiry_reminder_mail_days} days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">Edit to change<span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="pass_expiry_alert_days" id="pass_expiry_alert_days" title="Select Days" required>
                                                    {foreach name=list item=item key=key from=$days_range}
                                                        <option value="{$item}"{if $item eq $pass_expiry_reminder_mail_days}selected{/if}>{$item}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="reason_for_change"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="pass_expiry_reason_for_change" id="pass_expiry_reason_for_change" maxlength="1000" required title="Enter Valid Reason for Change" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update_pass_expiry" id="update_pass_expiry" onClick="return validation();">Update</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Pending Task </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <div class="panel-body">
                                            <div class="panel-body table-responsive">
                                                <h2 class="mgbt-xs-20">Reminder Mail Setting Form</h2>
                                                <form name="pending_mail_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="pending_mail_form" autocomplete="off">
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
                                                            <label class="control-label  col-sm-2">Current Setting <span class="vd_red">*</span></label>
                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                <input type="text" class="width-60 required" name="pending_mail_config" value="{$pending_reminder_mail_days}" readonly>
                                                                <p style="color: red">Note: Alert Mail will get triggered after {$pending_reminder_mail_days} days</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label  col-sm-2">Edit to change<span class="vd_red">*</span></label>
                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                <select class="width-60" name="pendinglist_alert_days" id="pendinglist_alert_days" title="Select Days" required>
                                                                    {foreach name=list item=item key=key from=$days_range}
                                                                        <option value="{$item}"{if $item eq $pending_reminder_mail_days}selected{/if}>{$item}</option>
                                                                    {/foreach}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="reason_for_change"} <span class="vd_red">*</span></label>
                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="pendinglist_reason_for_change" id="pendinglist_reason_for_change" maxlength="1000" required title="Enter Valid Reason for Change" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label  col-sm-2"></label>
                                                            <div class="col-xs-9">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-2"></div>
                                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                            <div class="mgtp-10">
                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update_pending" id="update_pending" onClick="return validation();">Update</button>
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
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> SOP Expiry </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Reminder Mail Setting Form</h2>
                                <form name="sop_expiry_mail_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_expiry_mail_form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">Current Setting <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" class="width-60 required" name="sop_expiry_mail_config" value="{$sop_expiry_reminder_mail_days}" readonly>
                                                <p style="color: red">Note: Alert Mail will get triggered before {$sop_expiry_reminder_mail_days} days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">Edit to change<span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="sop_expiry_alert_days" id="sop_expiry_alert_days" title="Select Days" required>
                                                    {foreach name=list item=item key=key from=$days_range}
                                                        <option value="{$item}"{if $item eq $sop_expiry_reminder_mail_days}selected{/if}>{$item}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="reason_for_change"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="sop_expiry_reason_for_change" id="sop_expiry_reason_for_change" maxlength="1000" required title="Enter Valid Reason for Change" ></textarea>
                                            </div>
                                        </div>
                                    </div>               

                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update_sop_expiry" id="update_sop_expiry" onClick="return validation();">Update</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Online Exam </a> </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Reminder Mail Setting Form</h2>
                                <form name="sop_oe_mail_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_oe_mail_form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">Current Setting <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" class="width-60 required" name="sop_oe_mail_config" value="{$sop_online_exam_reminder_mail_days}" readonly>
                                                <p style="color: red">Note: Alert Mail will get triggered before {$sop_online_exam_reminder_mail_days} days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">Edit to change<span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="sop_oe_alert_days" id="sop_oe_alert_days" title="Select Days" required>
                                                    {foreach name=list item=item key=key from=$days_range}
                                                        <option value="{$item}"{if $item eq $sop_online_exam_reminder_mail_days}selected{/if}>{$item}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="reason_for_change"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="sop_oe_reason_for_change" id="sop_oe_reason_for_change" maxlength="1000" required title="Enter Valid Reason for Change" ></textarea>
                                            </div>
                                        </div>
                                    </div>               

                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update_sop_oe" id="update_sop_oe" onClick="return validation();">Update</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"> History </a> </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                {if !empty($remarks_array)}
                                    <table class="table table-bordered table-striped" id="mail_data-tables">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module="admin" attribute="reminder_mail_for"}</th>
                                                <th>{attribute_name module="admin" attribute="changed_from"}</th>
                                                <th>{attribute_name module="admin" attribute="changed_to"}</th>
                                                <th>{attribute_name module="admin" attribute="reason_for_change"}</th>
                                                <th>{attribute_name module="admin" attribute="effective_from"}</th>
                                                <th>{attribute_name module="admin" attribute="update_by"}</th>
                                                <th>{attribute_name module="admin" attribute="date"}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach name=list item=item key=key from=$remarks_array} 
                                                <tr >
                                                    <td >{$item.reminder_mail_for}</td>
                                                    <td >{$item.changed_from}</td>
                                                    <td >{$item.changed_to}</td>
                                                    <td >{$item.reason}</td>
                                                    <td >{$item.effective_from}</td>
                                                    <td >{$item.updated_by}</td>
                                                    <td >{$item.date}</td>
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

{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 

    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#mail_data-tables').dataTable({
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
                        message: 'Reminder Mail Setting List',

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
                        message: 'Reminder Mail Setting List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit_pending = $('#pending_mail_form');
            var error_register = $('.alert-danger', form_submit_pending);
            var success_register = $('.alert-success', form_submit_pending);
            form_submit_pending.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    pendinglist_reason_for_change: {
                        minlength: 5,
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
                    scrollTo(form_submit_pending, -100);

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
                    $('#update_pending').attr("disabled", true);
                    form.submit();
                },

            });
        });

        $(document).ready(function () {
            "use strict";
            var form_submit_sop_expiry = $('#sop_expiry_mail_form');
            var error_register = $('.alert-danger', form_submit_sop_expiry);
            var success_register = $('.alert-success', form_submit_sop_expiry);
            form_submit_sop_expiry.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sop_expiry_reason_for_change: {
                        minlength: 5,
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
                    scrollTo(form_submit_sop_expiry, -100);

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
                    $('#update_sop_expiry').attr("disabled", true);
                    form.submit();
                },

            });
        });

        $(document).ready(function () {
            "use strict";
            var form_submit_pass_expiry = $('#pass_expiry_mail_form');
            var error_register = $('.alert-danger', form_submit_pass_expiry);
            var success_register = $('.alert-success', form_submit_pass_expiry);
            form_submit_pass_expiry.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    pass_expiry_reason_for_change: {
                        minlength: 5,
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
                    scrollTo(form_submit_pass_expiry, -100);

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
                    $('#update_pass_expiry').attr("disabled", true);
                    form.submit();
                },

            });
        });

        $(document).ready(function () {
            "use strict";
            var form_submit_pass_expiry = $('#sop_oe_mail_form');
            var error_register = $('.alert-danger', form_submit_pass_expiry);
            var success_register = $('.alert-success', form_submit_pass_expiry);
            form_submit_pass_expiry.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sop_oe_reason_for_change: {
                        minlength: 5,
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
                    scrollTo(form_submit_pass_expiry, -100);

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
                    $('#update_sop_oe').attr("disabled", true);
                    form.submit();
                },

            });
        });

    </script>
{/literal}
