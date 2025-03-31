<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!--Multiselect left to right -->
<!--link rel="stylesheet" href="vendors/multiselect-master/css/bootstrap.min.css" /-->
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">SOP </li>
            <li class="active">Revise </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Revise SOP </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="tab-pane">
                                        <div class="panel-body">
                                            <div class="modal-wide-width">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-blue vd_white">
                                                        <h4 class="modal-title" id="myModalLabel">Revise SOP Form</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!--Revise SOP Form -->
                                                        <form name="revise_sop-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="revise_sop-form" autocomplete="off">
                                                            <h2 class="mgbt-xs-20">Select SOP</h2>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_type"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$soptypelist}
                                                                                <option value="{$item->object_id}" {if $sop_type_id eq $item->object_id} selected {/if}>{$item->type}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_name"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        {if isset($sop_object_id)}
                                                                            <select class="width-100" name="sop_no" id="sop_no" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP No">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$sop_liveno_list}
                                                                                    <option value="{$item->sop_object_id}"{if $item->sop_object_id eq $sop_object_id}selected{/if}>{$item->sop_name}</option>
                                                                                {/foreach}
                                                                            </select>
                                                                        {else}
                                                                            <select class="width-100" name="sop_no" id="sop_no" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP No">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$sop_liveno_list}
                                                                                    <option value="{$item->sop_object_id}">{$item->sop_name}</option>
                                                                                {/foreach}
                                                                            </select>
                                                                        {/if}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            {if !empty($current_sop_name)}
                                                                <h2 class="mgbt-xs-20">SOP Revise</h2>
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="cc_no"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 1 - Max 100" class="width-100 required" name="acc_no" id="acc_no" maxlength="100" required title="Enter Valid Change Control Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {if $is_sop_capa_required}
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="capa_no"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type="text" placeholder="Min 1 - Max 100" class="width-100 required" name="acapa_no" id="acapa_no" maxlength="100" required title="Enter Valid CAPA Number">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                {/if}
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <table class="table table-bordered table-striped" id="data-tables-sop">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>{attribute_name module="sop" attribute="sop_type"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_no"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_name"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="current_revision"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="current_supersedes"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="to_be_revised"} <span class="vd_red">*</span></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td >{$sop_type}</td>
                                                                                        <td >{$sop_no}</td>
                                                                                        <td >{$current_sop_name}</td>
                                                                                        <td >{$current_sop_revison}</td>
                                                                                        <td >{$current_sop_supersedes}</td>
                                                                                        <td class="smallfieldcell">
                                                                                            <select name="revise_sop[]"  disabled title="Select Valid Revision">
                                                                                                <option value="">Select</option>
                                                                                                <option value="Yes" selected>Yes</option>
                                                                                                <option value="No">No</option>
                                                                                                <option value="Disabled">Disable</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                {if !empty($formatlist)}
                                                                    <h2 class="mgbt-xs-20">Format Revise</h2>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <h4><span class="vd_red pull-right"><i class="fa fa-info-circle vd_red"></i> Note : Select 'Yes' or 'No' or 'Disable' by using dropdown menu</span></h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                                <table class="table table-bordered table-striped" id="data-tables-format">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>{attribute_name module="sop" attribute="sop_type"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="sop_format_no"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="sop_format_name"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="current_revision"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="current_supersedes"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="to_be_revised"} <span class="vd_red">*</span></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    {foreach key=key item=item from=$formatlist}        
                                                                                        <tr >
                                                                                            <td >{$sop_type}</td>
                                                                                            <td >{$item.format_no}</td>
                                                                                            <td >{$item.format_name}</td>
                                                                                            <td >{$item.revision}</td>
                                                                                            <td >{$item.supersedes}</td>
                                                                                            <td class="smallfieldcell">
                                                                                                <select name="revise_format[]"  title="Select To Be Revise Option for Format">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Yes">Yes</option>
                                                                                                    <option value="No">No</option>
                                                                                                    <option value="Disabled" {if $item.status eq "Disabled"} selected{/if}>Disable</option>
                                                                                                </select>
                                                                                                <input type="hidden" name="format_object_id[]" value="{$item.format_object_id}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                {/if}
                                                                {if !empty($annexurelist)}
                                                                    <h2 class="mgbt-xs-20">Annexure Revise</h2>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <h4><span class="vd_red pull-right"><i class="fa fa-info-circle vd_red"></i> Note : Select 'Yes' or 'No' or 'Disable' by using dropdown menu</span></h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                                <table class="table table-bordered table-striped" id="data-tables-annexure">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>{attribute_name module="sop" attribute="sop_type"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="sop_annexure_no"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="sop_annexure_name"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="current_revision"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="current_supersedes"}</th>
                                                                                            <th>{attribute_name module="sop" attribute="to_be_revised"} <span class="vd_red">*</span></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    {foreach key=key item=item from=$annexurelist}        
                                                                                        <tr >
                                                                                            <td >{$sop_type}</td>
                                                                                            <td >{$item.annexure_no}</td>
                                                                                            <td >{$item.annexure_name}</td>
                                                                                            <td >{$item.revision}</td>
                                                                                            <td >{$item.supersedes}</td>
                                                                                            <td class="smallfieldcell">
                                                                                                <select name="revise_annexure[]"  title="Select To Be Revise Option for Annexure">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Yes">Yes</option>
                                                                                                    <option value="No">No</option>
                                                                                                    <option value="Disabled" {if $item.status eq "Disabled"} selected{/if}>Disable</option>
                                                                                                </select>
                                                                                                <input type="hidden" name="annexure_object_id[]" value="{$item.annexure_object_id}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                {/if}
                                                                <h2 class="mgbt-xs-20">Department View</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="dept_view"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    <input type="checkbox" name="dept_view[]" value="{$item.department_id}" id="{$item.department_id}" checked="true" {if $item.department_id eq $dept_id} disabled {/if}>
                                                                                    <label for="{$item.department_id}"> {$item.department} </label>
                                                                                {/foreach}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Reason for Revision</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason_for_revision"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-100" name="reason_for_revision" id="reason_for_revision" required title="Select Valid Reason">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$sop_reason_list}
                                                                                    <option value="{$item.object_id}">{$item.reason}</option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Mail To Interlinked SOPs</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="company-input-wrapper" class="controls col-sm-6">
                                                                            <select  name="mail_to_interlink_sop" id="mail_to_interlink_sop" required title="Mail To Interlinked SOPs">
                                                                                <option value="">Select</option>
                                                                                <option value="yes">Yes</option>
                                                                                <option value="no">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="view_hide_interlinked_sop" style="display:none">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                                                <label class="control-label  col-sm-2"></label>
                                                                                <div class="col-xs-4">
                                                                                    <select name="interlink_sop_from[]" id="interlink_sop" class="interlink_sop form-control" size="7" multiple="multiple">
                                                                                        {foreach name=list item=item key=key from=$sop_liveno_list}
                                                                                            <option value="{$item->sop_object_id}"{if $item->sop_object_id eq $sop_object_id}selected{/if}>{$item->sop_name}</option>
                                                                                        {/foreach}
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-xs-2"><br>
                                                                                    <button type="button" id="interlink_sop_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                                    <button type="button" id="interlink_sop_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                                    <button type="button" id="interlink_sop_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                                    <button type="button" id="interlink_sop_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                                </div>
                                                                                <div class="col-xs-4">
                                                                                    <select name="interlink_sop_to[]" id="interlink_sop_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="company-input-wrapper" class="controls col-sm-6">
                                                                            <select  name="department" id="department" onchange = get_dept_users(this.options[this.selectedIndex].value);>
                                                                                <option value="">Select Department</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    <option value="{$item.department_id}">{$item.department} </option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div class="col-xs-4">
                                                                            <select name="interlink_user_from[]" id="interlink_user" class="interlink_user form-control" size="7" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-xs-2"><br>
                                                                            <button type="button" id="interlink_user_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="interlink_user_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="interlink_user_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="interlink_user_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <select name="interlink_user_to[]" id="interlink_user_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                        </div>
                                                                    </div>  
                                                                    <div id="company-input-wrapper" class="controls col-sm-12"><br><br>
                                                                        <label class="col-sm-2 control-label">{attribute_name module=sop attribute=mail_comments} <span class="vd_red">*</span></label>
                                                                        <div class="col-sm-5 controls">
                                                                            <textarea placeholder="Min 5 - Max 1000" rows="5" class="mgbt-xs-20  mgbt-sm-0" name="mail_comments" id="mail_comments" maxlength="1000" title="Enter Valid Comments" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="revise" id="revise">Revise</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            {/if}
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
                </div>
            </div>   
        </div>
    </div>
</div>

{literal}
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- Multiselect left to right -->
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <!--script src="vendors/multiselect-master/dist/js/bootstrap.min.js"></script-->
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>
    <script type="text/javascript">
                                                                                $(document).ready(function ($) {
                                                                                    $('.interlink_user').multiselect({
                                                                                        search: {
                                                                                            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                        },
                                                                                        fireSearch: function (value) {
                                                                                            return value.length > 1;
                                                                                        }
                                                                                    });
                                                                                    $('.interlink_sop').multiselect({
                                                                                        search: {
                                                                                            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                        },
                                                                                        fireSearch: function (value) {
                                                                                            return value.length > 1;
                                                                                        }
                                                                                    });
                                                                                });
    </script>
    <script>
        $(document).ready(function () {
            "use strict";
            $('#data-tables-sop').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
            $('#data-tables-format').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
            $('#data-tables-annexure').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
        });

        $(document).ready(function () {
            "use strict";
            var form_submit = $('#revise_sop-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sop_no: {
                        required: true
                    },
                    reason_for_revision: {
                        required: true
                    },
                    acc_no: {
                        minlength: 1,
                        required: true
                    },
                    acapa_no: {
                        minlength: 1,
                        required: true
                    },
                    mail_to_interlink_sop: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var input_value = ["revise_sop[]", "revise_format[]", "revise_annexure[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                alert("Pls " + check[j].title)
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var mail_to_interlink_sop = document.getElementById("mail_to_interlink_sop").value;
                    if (mail_to_interlink_sop == "yes") {
                        if (document.getElementById('interlink_sop_to').length == 0) {
                            alert("Pls select valid Interlinked SOP Details");
                            document.getElementById('interlink_sop_to').focus();
                            document.getElementById('interlink_sop_to').style.borderColor = 'red';
                            return false;
                        }
                        if (document.getElementById('interlink_user_to').length == 0) {
                            alert("Pls select valid users");
                            document.getElementById('interlink_user_to').focus();
                            document.getElementById('interlink_user_to').style.borderColor = 'red';
                            return false;
                        }
                        if (document.getElementById('mail_comments').value.length <= 4) {
                            alert("Pls enter valid Mail Comments");
                            document.getElementById('mail_comments').focus();
                            document.getElementById('mail_comments').style.borderColor = 'red';
                            return false;
                        }
                    }
                    $('#revise').attr("disabled", true);
                    form.submit();
                }
            });
        });
        function addList(text, value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text);
                mainurl = location.href.substring(0, match_position - 1);
                location.href = mainurl
            } else {
                if (ind != -1) {
                    match_position = loc.search(text);
                    //Search funtion gives the position of the first occurance of a string.
                    mainurl = location.href.substring(0, match_position);
                    location.href = mainurl + text + "=" + value;
                } else {
                    location.href = loc + "&" + text + "=" + value;
                }
            }
        }
        function get_dept_users(value) {
            x_get_dept_users(value, list_from_users);
        }
        function list_from_users(users) {
            var dept_users_obj = document.getElementById("interlink_user");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            for (var y in users) {
                var users_array = users[y];
                var addy = document.createElement('option');
                addy.id = users_array.user_id;
                addy.text = users_array.user_name;
                addy.value = users_array.user_id;
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
        $('#mail_to_interlink_sop').on('change', function () {
            if (this.value == "yes") {
                $("#view_hide_interlinked_sop").css("display", "block");
            } else {
                $("#view_hide_interlinked_sop").css("display", "none");
            }
        });
    </script>
{/literal}
