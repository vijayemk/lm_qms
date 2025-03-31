<div class="panel panel-default">
    <div class="panel-heading vd_bg-dark-green">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_edit_access">Edit Access Rights <i
                    class="fa  fa-exclamation-triangle vd_white"></i></a>
        </h4>
    </div>
    <div id="collapse_edit_access" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="vd_content-section clearfix">
                <div class="panel-heading bordered vd_bg-blue">
                    <h3 class="panel-title vd_white font-semibold">ACCESS RIGHTS</h3>
                </div>
                <div class="panel-body panel-bd-left">
                    <form name="edit_access_rights-form" method="post" action="{$smarty.server.REQUEST_URI}"
                        class="form-horizontal" role="form" id="edit_access_rights-form" autocomplete="off">
                        <div class="alert alert-danger vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i
                                    class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a
                            few things up and try submitting again.
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label
                                    class="control-label">{attribute_name module="admin" attribute="doc_access_rights_to"}</label>
                                <div id="first-name-input-wrapper" class="controls">
                                    <select title="Select Valid Company"
                                        onchange="get_dept_list(this.options[this.selectedIndex].value, '#from_dept', 'multiselect');">
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$plant_list}
                                            <option value="{$item.plant_id}">[{$item.short_name}] - [{$item.plant_name}]
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">{attribute_name module="admin" attribute="department"}<span
                                        class="vd_red">*</span></label>
                                <div class="controls row">
                                    <div class="col-md-5">
                                        <select name="dept[]" id="from_dept" class="form-control generate_multiselect"
                                            size="10" multiple="multiple"></select>
                                    </div>
                                    <div class="col-md-1">
                                        <br><br><br>
                                        <button type="button" id="from_dept_rightAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-forward"></i></button>
                                        <button type="button" id="from_dept_rightSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-right"></i></button>
                                        <button type="button" id="from_dept_leftSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-left"></i></button>
                                        <button type="button" id="from_dept_leftAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-backward"></i></button>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="doc_access_dept[]" id="from_dept_to" class="form-control"
                                            size="10" multiple="multiple" title="Select valid Department">
                                            {foreach name=list item=item key=key from=$current_access_rights}
                                                <option value="{$item.plant_id}-{$item.dept_id}"
                                                    data-drop_down_value="{$item.plant_id}-{$item.dept_id}">
                                                    {$item.plant_name} - [{$item.dept_name}]</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="usr_dept_id" value="{$usr_plant_id}-{$usr_dept_id}">
                        <div class="form-actions-condensed row mgbt-xs-0 text-right">
                            <div class="col-sm-12">
                                <input type="hidden" name="audit_trail_action" value="Edit Access Rights">
                                <input type="hidden" name="edit_access_rights">
                                <button class="btn vd_bg-green vd_white" type="submit" id="edit_access_rights">
                                    <span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
                            </div>
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
            $(document).ready(function() {
                // Add DMS Form Validation
                "use strict";
                var form_submit = $('#edit_access_rights-form');
                var error_register = $('.alert-danger', form_submit);
                form_submit.validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error messsage class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        "doc_access_dept[]": {
                            required: true
                        }
                    },
                    invalidHandler: function(event,
                        validator) { //display error alert on form submit              
                        $('.alert-danger', $('#edit_access_rights-form')).fadeIn(500);
                        scrollTo($('#edit_access_rights-form'), -100);
                    },
                    submitHandler: function(form) {
                        if (lm_validate.is_value_exist_in_array($("#from_dept_to").val(), $(
                                "#usr_dept_id").val(), 'Select Current User Department') && lm_validate
                            .is_duplicate_value_exists_in_array($("#from_dept_to").val(), $(
                                "#from_dept_to"))) {
                            $('#edit_access_rights').attr("disabled", true);
                            loading.show();
                            form.submit();
                        }
                    }
                });
            });
        </script>
    {/literal}
</div>