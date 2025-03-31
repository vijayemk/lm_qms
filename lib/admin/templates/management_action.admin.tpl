<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Management Action </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Management Action Settings</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Management Action Settings Form</h2>
                                <form name="mgmt_action_settings-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="mgmt_action_settings-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="doc_name"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <select class="width-60" name="lm_doc" id="lm_doc" title="Select Valid Document">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$doc_list}
                                                        <option value="{$item.object_id}">{$item.short_name} - [{$item.doc_name}] </option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="action"}</label>
                                            <div class="col-xs-4">
                                                <select name="mgmt_action_from[]" id="mgmt_action" class="mgmt_action form-control" size="7" multiple="multiple"></select>
                                            </div>
                                            <div class="col-xs-2"><br>
                                                <button type="button" id="mgmt_action_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                <button type="button" id="mgmt_action_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                <button type="button" id="mgmt_action_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                <button type="button" id="mgmt_action_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                            </div>
                                            <div class="col-xs-4">
                                                <select name="mgmt_action_to[]" id="mgmt_action_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
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
    <!-- Multiselect left to right -->
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#mgmt_action-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function (event, validator) {
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function ($) {
            $('.mgmt_action').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });
        $("#lm_doc").change(function () {
            x_get_filtered_lm_doc_workflow_action_list($("#lm_doc").val(), list_action);
            x_get_lm_doc_action_list($("#lm_doc").val(), list_doc_action);
        });
        function list_action(actions) {
            var mgmt_action_obj = document.getElementById("mgmt_action");
            for (i = mgmt_action_obj.length; mgmt_action_obj.length > 0; i--) {
                mgmt_action_obj.remove(i)
            }
            for (var y in actions) {
                var action_array = actions[y];
                var addy = document.createElement('option');
                addy.id = action_array.action_id;
                addy.text = action_array.action;
                addy.value = action_array.action_id;
                try {
                    mgmt_action_obj.add(addy, null);
                } catch (ex) {
                    mgmt_action_obj.add(addy);
                }
            }
        }
        function list_doc_action(actions) {
            var mgmt_action_obj = document.getElementById("mgmt_action_to");
            for (i = mgmt_action_obj.length; mgmt_action_obj.length > 0; i--) {
                mgmt_action_obj.remove(i)
            }
            for (var y in actions) {
                var action_array = actions[y];
                var addy = document.createElement('option');
                addy.id = action_array.action_id;
                addy.text = action_array.action;
                addy.value = action_array.action_id;
                try {
                    mgmt_action_obj.add(addy, null);
                } catch (ex) {
                    mgmt_action_obj.add(addy);
                }
            }
        }
    </script>
{/literal}
