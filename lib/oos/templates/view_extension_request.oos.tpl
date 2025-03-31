<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<style>
    .embed-responsive-16by9 {
        padding-bottom: 0%;
    }
</style>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> View Extension Request  </li>
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
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseAgendaDetails">Extension Details</a> </h4>
                </div>
                <div id="collapseAgendaDetails" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" role="form">
                            <div id="wizard-1" class="form-wizard">
                                <ul>
                                    <li><a href="#tab1" data-toggle="tab"><div class="menu-icon"> 1 </div> Primary Details </a></li>
                                </ul>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" > </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        <h3><span class="font-semibold"> Basic Details </span></h3>
                                        <div class="vd_content-section clearfix">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel widget">
                                                        <div class="panel-body table-responsive">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-label">{attribute_name module=oos attribute=oos_no}</div>
                                                                    <input type="text" readonly value="{$oos_master_obj->oos_no}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-label">{attribute_name module=oos attribute=existing_target_date}</div>
                                                                    <input type="text" readonly value="{$existing_target_date}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-label">{attribute_name module=oos attribute=proposed_target_date}</div>
                                                                    <input type="text" readonly value="{$proposed_target_date}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-label">{attribute_name module=oos attribute=action_status}</div>
                                                                    <input type="text" readonly value="{$action_status}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-label">{attribute_name module=oos attribute=status}</div>
                                                                    <input type="text" readonly   value="{$status}"  class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-label">{attribute_name module=oos attribute=reason}</div>
                                                                    <textarea class="mgbt-xs-20  mgbt-sm-0" rows="5" style="resize: none" readonly="">{$ext_master_obj->reason}</textarea>
                                                                </div>
                                                            </div>
                                                             <input type="hidden" id="ext_object_id" value="{$ext_object_id}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </form>
                    </div>                                 
                </div>      
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsestatus"> Status </a> </h4>
                </div>
                <div id="collapsestatus" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">{$action_status}</h2>
                                <form name="oos_status_details-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="oos_status_details-form" autocomplete="off">
                                    <table class="table table-bordered table-striped" id="data-tables-status">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module=oos attribute="date"}</th>
                                                <th>{attribute_name module=oos attribute="username"}</th>
                                                <th>{attribute_name module=oos attribute="department"}</th>
                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                <th>{attribute_name module=oos attribute="status"}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {foreach name=list item=item key=key from=$extension_status_details} 
                                         <tr>   
                                            <td>{$item.date}</td>
                                            <td>{$item.user_name}</td>
                                            <td>{$item.department}</td>
                                            <td>{$item.action}</td>
                                            <td>{$item.status}</td>
                                        </tr>
                                        {/foreach}
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <hr>
                            {if !empty($extension_remarks_array)}
                                <div class="panel-body">
                                    <h4 class="mgbt-xs-20">Comments</h4>
                                    <form name="oos_comments-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="oos_comments-form" autocomplete="off">
                                        <table class="table table-bordered table-striped" id="data-tables-status-remarks">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module=oos attribute="date"}</th>
                                                    <th>{attribute_name module=oos attribute="username"}</th>
                                                    <th>{attribute_name module=oos attribute="department"}</th>
                                                    <th>{attribute_name module=oos attribute="remarks"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach key=key item=cmt from=$extension_remarks_array}
                                                    <tr>
                                                        <td>{$cmt.date_time}</td>
                                                        <td>{$cmt.username}</td>
                                                        <td>{$cmt.department_name}</td>
                                                        <td>{$cmt.remarks}</td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>                                            
            {if !empty($edit_content)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit"> Edit </a> </h4>
                    </div>
                    <div id="collapseEdit" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel widget">
                                                <div class="panel-body">
                                                    <div id="wizard-2" class="form-wizard">
                                                        <ul>
                                                            <li><a href="#tab11" data-toggle="tab"><div class="menu-icon"> 1 </div> Edit </a></li>
                                                        </ul>
                                                        <div class="progress progress-striped active">
                                                            <div class="progress-bar progress-bar-info" > </div>
                                                        </div>
                                                        <div class="tab-content no-bd pd-24">
                                                            <div class="tab-pane" id="tab11">
                                                                <div class="vd_title-section clearfix">
                                                                    <div class="vd_panel-header">
                                                                        <h4> 
                                                                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal12">Extension Details  </button>
                                                                        </h4>
                                                                        <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog width-60">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header vd_bg-blue vd_white">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                                        <h4 class="modal-title" id="edit_ModalLabel">Edit Extension Request Details</h4>
                                                                                    </div>
                                                                                    <form name="edit_ext_det-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_ext_det-form" autocomplete="off">
                                                                                         <div class="modal-body">
                                                                                            <div class="form-group">
                                                                                                <div class="col-md-12">
                                                                                                    <label class="control-label  col-sm-3">{attribute_name module="oos" attribute="proposed_target_date"} <span class="vd_red">*</span></label>
                                                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                                                                                        <input type="text"  class="width-80" placeholder="DD/MM/YY" name="proposed_target_date" id="proposed_target_date"  title="Select Valid Date" >
                                                                                                    </div>
                                                                                                    <div id="ext_detail_update_success_msg"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer background-login">
                                                                                            <button type="button" class="btn vd_btn vd_bg-grey" onclick="page_reload();" data-dismiss="modal">Add</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions-condensed wizard">
                                                                <div class="row mgbt-xs-0">
                                                                    <div class="col-sm-9 col-sm-offset-0"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" href="javascript:void(0);">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> </div>
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
            {/if}
            {if !empty($request_qc_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRequestqcreview"> Action </a> </h4>
                    </div>
                    <div id="collapseRequestqcreview" class="panel-collapse collapse ">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Request QC Reviewal - Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- Request QC Review Form -->
                                                            <form name="request_qc_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_qc_review-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="department" id="department" onchange = get_action_users('{$lm_doc_id}','qc_review',this.options[this.selectedIndex].value); required title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$deptlist}
                                                                                    <option value="{$key}">{$item} </option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="username"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="qc_reviewer" id="userid" required title="Select Valid User Name">
                                                                                <option value="">Select</option>
                                                                            </select>                                                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="oos_ext_comments" id="oos_ext_comments"  required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="request_qc_review" id="request_qc_review" >Send Review</button>
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
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_qc_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowqcreview"> Action </a> </h4>
                    </div>
                    <div id="collapseShowqcreview" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab_pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel"> QC Reviewal - Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- QC Review Form -->
                                                            <form name="qc_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qc_review-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3">{attribute_name module="oos" attribute="action"}<span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="qc_review_type" id="qc_review_type"  required title="Select Valid Review Type">
                                                                                <option value="">Select</option>
                                                                                <option value="qc_review">Review </option>
                                                                                <option value="qc_review_need_correction">Review Need Correction</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 " name="oos_ext_comments" id="oos_ext_comments" required  title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="qc_reviewed" id="qc_reviewed" style="display:none">Review</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="qc_review_correction" id="qc_review_correction" style="display:none">Send Query</button>
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
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($recall_qc_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecallqcreview"> Recall </a> </h4>
                    </div>
                    <div id="collapseRecallqcreview" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab_pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel"> Recall from QC Reviewer - Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- Recall QC Review Form -->
                                                            <form name="recall_qc_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_qc_review-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="oos_ext_comments" id="oos_ext_comments"  required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_qc_review" id="recall_qc_review" >Recall</button>
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
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($request_qa_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRequestqaapprove"> Action </a> </h4>
                    </div>
                    <div id="collapseRequestqaapprove" class="panel-collapse collapse ">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Request QA Approval - Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- Request QA Approve Form -->
                                                            <form name="request_qa_approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_qa_approve-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="department" id="department" onchange = get_action_users('{$lm_doc_id}','qa_approve',this.options[this.selectedIndex].value); required title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$deptlist}
                                                                                    <option value="{$key}">{$item} </option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="username"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="qa_approver" id="userid" required title="Select Valid User Name">
                                                                                <option value="">Select</option>
                                                                            </select>                                                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="oos_ext_comments" id="oos_ext_comments"  required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="request_qa_approve" id="request_qa_approve" >Send to Approval</button>
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
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_qa_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowqaapprove"> Action </a> </h4>
                    </div>
                    <div id="collapseShowqaapprove" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab_pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel"> QA Approval - Form </h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- QA Approve Form -->
                                                            <form name="qa_approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qa_approve-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3">{attribute_name module="oos" attribute="action"}<span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="qa_approve_type" id="qa_approve_type"  required title="Select Valid Approval Type">
                                                                                <option value="">Select</option>
                                                                                <option value="qa_approve">Approve </option>
                                                                                <option value="qa_approve_need_correction">Approval Need Correction</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 " name="oos_ext_comments" id="oos_ext_comments"  required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-3"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="qa_approved" id="qa_approved" style="display:none">Approve</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="qa_approve_need_correction" id="qa_approve_need_correction" style="display:none">Send Query</button>
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
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($recall_qa_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecallqaapprove"> Recall </a> </h4>
                    </div>
                    <div id="collapseRecallqaapprove" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab_pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel"> Recall from QA Approver - Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!-- Recall QA Approve Form -->
                                                            <form name="recall_qa_approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_qa_approve-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="oos_ext_comments" id="oos_ext_comments"  required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_qa_approve" id="recall_qa_approve" >Recall</button>
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
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </div>
</div>    
    <!-- ------------------------------------------------------------------------------------------------------------------------ --> 
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Dropzone File Upload -->
    <script src="vendors/dropzone/js/dropzone.js"></script>
    <script src="vendors/custom_lm/file_upload/all_file_upload.js"></script>
    <script>
        
    function page_reload() {
        location.reload();
    }

    function get_action_users(lm_doc_id, action, dept_id) {
        x_get_doc_mgmt_auth_users(lm_doc_id, action, dept_id, list_users);
    }

    function list_users(users) {
        var dept_users_obj = document.getElementById("userid");
        for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
            dept_users_obj.remove(i)
        }
        var addy = document.createElement('option');
        addy.text = "Select";
        addy.value = "";
        try {
            dept_users_obj.add(addy, null);
        } catch (ex) {
            dept_users_obj.add(addy);
        }
        for (var y in users) {
            var users_array = users[y]
            var addy = document.createElement('option');
            addy.id = users_array.user_id
            addy.text = users_array.user_name
            addy.value = users_array.user_id
            try {
                dept_users_obj.add(addy, null);
            } catch (ex) {
                dept_users_obj.add(addy);
            }
        }
    }

    $(document).ready(function () {
        $('#data-tables-edit_attachment').dataTable({bFilter: false, bPaginate: false, bInfo: false, ordering: false});
    });  

     $(document).ready(function () {
        "use strict";
        $('#wizard-1').bootstrapWizard({
            'tabClass': 'nav nav-pills nav-justified',
            'nextSelector': '.wizard .next',
            'previousSelector': '.wizard .prev',
        });
        $('#wizard-2').bootstrapWizard({
            'tabClass': 'nav nav-pills nav-justified',
            'nextSelector': '.wizard .next',
            'previousSelector': '.wizard .prev',
        });
    });

    // Edit Content- Task Review Comments Form Validation
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#edit_ext_det-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                proposed_target_date: {
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
            submitHandler: function (form) {
                $('#task_updated').attr("disabled", true);
                form.submit();
            },
        });
    });


    // Request QC Review Form Validation
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#request_qc_review-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {              
                oos_ext_comments: {
                    minlength: 3,
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },  
            submitHandler: function (form) {
                $('#request_qc_review').attr("disabled", true);
                form.submit();
            },
        });
    });

    // QC Review Form Validation
    $(document).ready(function () {
       "use strict";
       var form_submit = $('#qc_review-form');
       var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                qc_review_type: {
                    required: true,
                },
                oos_ext_comments: {
                    minlength: 3,
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
            submitHandler: function (form) {
               $('#qc_reviewed').attr("disabled", true);
               $('#qc_review_correction').attr("disabled", true);
               form.submit();
            },
        });
    });

    // Recall QC Review Form Validation
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#recall_qc_review-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                oos_ext_comments: {
                    minlength: 3,
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },  
            submitHandler: function (form) {
                $('#recall_qc_review').attr("disabled", true);
                form.submit();
            },
        });
    });

     // Request QA Approve Form Validation
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#request_qa_approve-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                oos_ext_comments: {
                     minlength: 3,
                     required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
            submitHandler: function (form) {
                $('#request_qa_approve').attr("disabled", true);
                form.submit();
            },
        });
    });

    // QA Approve Form Validation
    $(document).ready(function () {
       "use strict";
       var form_submit = $('#qa_approve-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                qa_approve_type: {
                    required: true,
                },
                oos_ext_comments: {
                    minlength: 3,
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
           submitHandler: function (form) {
               $('#qa_approved').attr("disabled", true);
               $('#qa_approve_need_correction').attr("disabled", true);
               $('#qa_rejected').attr("disabled", true);
               form.submit();
           },
        });
    });

     // Recall QA Approve Form Validation
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#recall_qa_approve-form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                oos_ext_comments: {
                    minlength: 3,
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
            submitHandler: function (form) {
                $('#recall_qa_approve').attr("disabled", true);
                form.submit();
            },
        });
    });

    $("#qc_review_type").change(function () {
        if (this.value == "qc_review") {
            $('#qc_reviewed').show();
            $('#qc_review_correction').hide();
        }
        if (this.value == "qc_review_need_correction") {
            $('#qc_reviewed').hide();
            $('#qc_review_correction').show();
        }
        if (this.value == "") {
            $('#qc_reviewed').hide();
            $('#qc_review_correction').hide();
        }
    });

    $("#qa_approve_type").change(function () {
      if (this.value == "qa_approve") {
          $('#qa_approved').show();
          $('#qa_approve_need_correction').hide();
      }
      if (this.value == "qa_approve_need_correction") {
          $('#qa_approved').hide();
          $('#qa_approve_need_correction').show();
      }
      if (this.value == "") {
          $('#qa_approved').hide();
          $('#qa_approve_need_correction').hide();
      }
    });

    // Add Date Picker and Time Picker
    $(window).load(function () {
        "use strict";
        $("#proposed_target_date").datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy', minDate: +0});
    }); 

    function update_extension_details_msg(result) {
           if (result == "true") {
               document.getElementById('ext_detail_update_success_msg').innerHTML = "Saves automatically";
               document.getElementById('ext_detail_update_success_msg').style.color = "green";
           }
           if (result == "false") {
               document.getElementById('ext_detail_update_success_msg').innerHTML = "   ";
           }
    }

    $(document).ready(function () {
        $("#proposed_target_date").change(function () {
            x_update_extension_details($("#ext_object_id").val(), $("#proposed_target_date").val(), update_extension_details_msg);
        });
    });
        
</script>
{/literal}


