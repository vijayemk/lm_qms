<div class="panel panel-default">
    <div class="panel-heading vd_bg-dark-green">
        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshow_ext_request"> Extension Request <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
    </div>
    <div id="collapseshow_ext_request" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="vd_content-section clearfix">     
                <div class="panel-heading bordered vd_bg-blue">
                    <h3 class="panel-title vd_white font-semibold">{$extension_for} -  EXTENSION TARGET DATE FORM</h3>
                </div>
                <div class="panel-body panel widget panel-bd-left light-widget">
                    <form name="extension_request-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="extension_request-form" autocomplete="off">
                        <div class="alert alert-danger vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label">{attribute_name module="dms" attribute="target_date"} <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" name="exisiting_target_date" value="{$existing_target_date}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">{attribute_name module="dms" attribute="proposed_target_date"} <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <input type="text" class="generate_datepicker" name="proposed_target_date" data-datepicker_min="0" title="Select Valid Proposed Target Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label">{attribute_name module="dms" attribute="reason"} <span class="vd_red">*</span></label>
                                <div  class="controls">
                                    <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="extension_reason" required title="Enter Valid Reason"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                            <input type="hidden" name="extension_requested">
                            <input type="hidden" name="audit_trail_action" value="Extension Request">
                            <input type="hidden" id="extension_for" value="{$extension_for}">
                            <input type="hidden" id="show_overdue_msg_notifi" value="{$show_overdue_msg_notifi}">
                            <button class="btn vd_bg-green vd_white" type="submit" id="extension_requested"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Extension</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {literal}
        <!-- Javascript =============================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <!--script type="text/javascript" src="js/jquery.js"></script-->

        <script type="text/javascript">
            $(document).ready(function () {
                if ($('#show_overdue_msg_notifi').val()) {
                    notification("topright", "error", "fa fa-exclamation-triangle vd_blue", "Attention", capFirst($("#extension_for").val()) + " Overdue");
                }
                // Extension Request Form Validation
                "use strict";
                $('#extension_request-form').validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        exisiting_target_date: {
                            required: true
                        },
                        proposed_target_date: {
                            required: true
                        },
                        extension_reason: {
                            required: true
                        }
                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit              
                        $('.alert-danger', $('#extension_request-form')).fadeIn(500);
                        scrollTo($('#extension_request-form'), -100);
                    },
                    submitHandler: function (form) {
                        $('#extension_requested').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                });
            });
        </script>
    {/literal}
</div>