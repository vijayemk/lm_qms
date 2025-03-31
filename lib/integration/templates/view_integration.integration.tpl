<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> Integration Details</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5 data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="vd_content-section clearfix">
            <div class="row mgbt-md-0">
                <div class="col-sm-12">
                    <div class="tabs widget">
                        <ul class="nav nav-tabs widget">
                            <li class="active"> <a data-toggle="tab" href="#profile-tab"> <i class="append-icon glyphicon glyphicon-compressed"></i>Integration Details <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile-tab" class="tab-pane active">
                                <div class="pd-20">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="row mgbt-xs-0">
                                                <label class="col-xs-5 control-label"><i class="append-icon glyphicon glyphicon-link vd_red"></i>{attribute_name module=integration attribute=tracking_no}</label>
                                                <div class="col-xs-7 controls"> : {$int_master_obj->tracking_no}</div>
                                                <!-- col-sm-10 --> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="row mgbt-xs-0">
                                                <label class="col-xs-5 control-label"><span class="append-icon icon-text vd_red"></span>{attribute_name module=integration attribute=status}</label>
                                                <div class="col-xs-7 controls"> : {$int_master_obj->wf_status}</div>
                                                <!-- col-sm-10 --> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="row mgbt-xs-0">
                                                <label class="col-xs-5 control-label"><span class="append-icon icon-ellipsis vd_red"></span>{attribute_name module=integration attribute=reason}</label>
                                                <div class="col-xs-7 controls"> : {$int_master_obj->reason}</div>
                                                <!-- col-sm-10 --> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="row mgbt-xs-0">
                                                <label class="col-xs-5 control-label"><span class="append-icon icon-docs vd_red"></span>{attribute_name module=integration attribute=src_doc}</label>
                                                <div class="col-xs-7 controls"> : {$int_master_obj->source_doc_name} - {$int_master_obj->source_doc_no_link}</div>
                                                <!-- col-sm-10 --> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="row mgbt-xs-0">
                                                <label class="col-xs-5 control-label"><span class="append-icon icon-text2 vd_red"></span>{attribute_name module=integration attribute=dest_doc}</label>
                                                <div class="col-xs-7 controls"> : {$int_master_obj->dest_doc_name} - {$int_master_obj->dest_doc_no_link}</div>
                                                <!-- col-sm-10 --> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-striped progress-xs">
                                        <div class="progress-bar vd_bg-green active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only"></span> </div>
                                    </div>                                   
                                    <div class="row mgbt-md-0">
                                        <div class="col-sm-3 dropzone unset_min_height input-border" style="margin-left: 50px;">
                                            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-user mgr-10 profile-icon vd_blue"></i>{attribute_name module=integration attribute=triggered_by}</h3>
                                            <div class="content-list content-menu">
                                                <ul class="list-wrapper">
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=user}</span> : {display_if_null var=$int_master_obj->triggered_by_name}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=date}</span> : {display_datetime var=$int_master_obj->triggered_date}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=admin attribute=plant_name}</span> : {display_if_null var=$int_master_obj->triggered_by_plant}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=dept}</span> : {display_if_null var=$int_master_obj->triggered_by_dept}</span></li>
                                                </ul>
                                            </div>
                                        </div> 
                                        <div class="col-sm-1"><br><br><br><br><h1 class="mgbt-xs-15 font-semibold text-center mgl-20 vd_blue fa-beat-animation" style="font-size: 50px;"><i class="glyphicon glyphicon-arrow-right"></i></h1></div>
                                        <div class="col-sm-3 dropzone unset_min_height mgl-20 input-border">
                                            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-user mgr-10 profile-icon vd_yellow"></i>{attribute_name module=integration attribute=triggered_to}</h3>
                                            <div class="content-list content-menu">
                                                <ul class="list-wrapper">
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=user}</span> : {display_if_null var=$int_master_obj->triggered_to_name}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=date}</span> : {display_datetime var=$int_master_obj->triggered_date}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=admin attribute=plant_name}</span> : {display_if_null var=$int_master_obj->triggered_to_plant}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=dept}</span> : {display_if_null var=$int_master_obj->triggered_to_plant}</span></li>
                                                </ul>
                                            </div>            
                                        </div>
                                        <div class="col-sm-1"><br><br><br><br><h1 class="mgbt-xs-15 font-semibold text-center mgl-20 vd_blue fa-beat-animation" style="font-size: 50px;"><i class="glyphicon glyphicon-arrow-right"></i></h1></div>
                                        <div class="col-sm-3 dropzone unset_min_height mgl-20 input-border">
                                            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-user mgr-10 profile-icon vd_red"></i>{attribute_name module=integration attribute=assigned_to}</h3>
                                            <div class="content-list content-menu">
                                                <ul class="list-wrapper">
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=user}</span> : {display_if_null var=$int_master_obj->assigned_to_name}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=date}</span> : {display_datetime var=$int_master_obj->assigned_date}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=admin attribute=plant_name}</span> : {display_if_null var=$int_master_obj->assigned_to_plant}</span></li>
                                                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"><span class="font-semibold">{attribute_name module=integration attribute=dept}</span> : {display_if_null var=$int_master_obj->assigned_to_dept}</span></li>
                                                </ul>
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
        {if !empty($show_assign_btn)}
            <div class="panel-group mgtp-20" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green vd_bd-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_assign_integration">Action</a> </h4>
                    </div>
                    <div id="collapse_assign_integration" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN RESPONSIBLE PERSON FORM</h3>
                                </div>
                                <div class="panel widget light-widget panel-bd-left">
                                    <div class="panel-body">
                                        <form name="assign_integration-form" method="post" action="{$smarty.server.REQUEST_URI}"  class="form-horizontal" role="form" id="assign_integration-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select name="plant" onchange="get_access_rights_dept_list('{$int_master_obj->source_doc_id}', this.options[this.selectedIndex].value, '', 'yes', '#department');" title="Select Valid Plant">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$ar_plant_list}
                                                                <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label ">{attribute_name module="dms"  attribute="department"} <span class="vd_red">*</span></label>
                                                    <div class="control">
                                                        <select name="department" id="department" onchange="get_dept_users(this.options[this.selectedIndex].value, '#assigned_to', null);"  required title="Select Valid Department">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="dms" attribute="user_name"} <span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <select name="assigned_to" id="assigned_to" required title="Select Valid User Name">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9">
                                                    <label class="control-label">{attribute_name module="dms" attribute="remarks"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Kindly verify the deviation and approve" rows="3" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="assign_integration">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="assign_integration"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    </div>
</div>
{literal}
    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
        $(document).ready(function () {
            "use strict";
            $('#assign_integration-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    assigned_to: {
                        required: true
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign_integration-form')).fadeIn(500);
                    scrollTo($('#assign_integration-form'), -100);
                },
                submitHandler: function (form) {
                    $('#assign_integration').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });
    </script>
{/literal}

