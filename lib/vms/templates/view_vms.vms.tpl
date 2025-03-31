<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> View Vendor Management System</li>
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
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_vendor_details">Vendor Details </a> </h4>
                </div>
                <div id="collapse_vendor_details" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-wizard generate_wizard">
                            <ul>
                                <li><a href="#tab_pri_dtls" data-toggle="tab"><div class="menu-icon"> 1 </div> Primary Details </a></li>
                                <li><a href="#tab_audit_schedule" data-toggle="tab"><div class="menu-icon"> 2 </div> Audit Schedule</a></li>                                
                                <li><a href="#tab_audit_observation" data-toggle="tab"><div class="menu-icon"> 3 </div> Audit Finding </a></li>
                                <li><a href="#tab_attachments" data-toggle="tab"><div class="menu-icon"> 4 </div> Attachments </a></li>
                                <li><a href="#tab_reports" data-toggle="tab"><div class="menu-icon"> 5 </div> Reports </a></li>
                                <li><a href="#tab_insight" data-toggle="tab"><div class="menu-icon"> 6 </div> Insight </a></li>
                            </ul>
                            <div class="progress progress-striped">
                                <div class="progress-bar vd_bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only"></span> </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab_pri_dtls">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><span class="append-icon icon-vcard"></span>Basic Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="vm_no"}</div>
                                                        <input type="text" readonly value="{$vm_no}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="initiator"}</div>
                                                        <input type="text" readonly value="{$initiator}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module=admin attribute="plant_name"}</div>
                                                        <input type="text" readonly value="{$vm_plant}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="department"}</div>
                                                        <input type="text" readonly value="{$vm_department}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module=dms attribute=initiation_date}</div>
                                                        <input type="text" readonly value="{display_datetime var=$vm_master_obj->created_time}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="audit_lead"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$audit_lead_name}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="audit_lead_plant"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$audit_lead_plant}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="audit_lead_dept"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$audit_lead_dept}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="qa_approval_status"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_master_obj->approval_status}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="status"}</div>
                                                        <input type="text" readonly value="{$vm_master_obj->status}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="vendor_status"}</div>
                                                        <div class="input-border pd-5"><span class="font-semibold label {if $vm_master_obj->vendor_status eq 'Qualified'}vd_bg-green{elseif $vm_master_obj->vendor_status eq 'Dis Qualified'}vd_bg-red{else}vd_bg-grey{/if}">{$vm_master_obj->vendor_status}</span></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="final_score"}</div>
                                                        <div class="input-border pd-5"><span class="font-semibold badge vd_bg-blue">{display_if_null var=$vm_master_obj->final_score}</span></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="target_date"}</div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$vm_master_obj->target_date}}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="effective_from"}</div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$vm_master_obj->effective_from}}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="effective_to"}</div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$vm_master_obj->effective_to}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-shopping-cart"></i>Vendor Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="organization"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->org_name}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="plant_name"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->plant_name}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="plant_short_name"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->plant_short_name}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="type"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->type}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="landline_number"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_plant_obj->landline_number}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="email"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->email}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="address"}</div>
                                                        <textarea  rows="2" >{display_if_null var=$vm_plant_obj->address}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="city"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->city}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="state"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->state}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="country"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->country}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="pincode"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->pincode}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="primary_contact"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->primary_contact}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="primary_contact_number"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_plant_obj->primary_contact_number}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="secondary_contact"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_plant_obj->secondary_contact}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="secondary_contact"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_plant_obj->secondary_contact_number}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="established_year"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->established_year}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="website"}</div>
                                                        <input type="text" readonly value="{display_if_null var=$vm_plant_obj->website}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="no_of_employees"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->no_of_employees}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="annual_turnover"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->annual_turn_over}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="certifications"}</div>
                                                        <textarea  rows="3" >{display_if_null var=$vm_plant_obj->certifications}</textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="vm_object_id" value="{$vm_master_obj->vm_object_id}" />
                                                <input type="hidden" id="wf_status" value="{$vm_master_obj->wf_status}" />
                                                <input type="hidden" id="status" value="{$vm_master_obj->status}" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-list"></i>Agenda Details</span><span class="font-semibold font-10 badge vd_bg-red mgl-10">{$vm_agenda_list|@count}</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div  class="controls">
                                                    <div class="vd_pricing-table">
                                                        {foreach name=list item=item key=key from=$vm_agenda_list}
                                                            <div class="col-md-12 col-lg-4">
                                                                <div class="plan  mgr-10">
                                                                    <div class="plan-header vd_bg-green vd_white text-center vd_info-parent">
                                                                        <div class="vd_bg-black-30 pd-5">{$item.category_name}<span class="font-semibold font-10 badge vd_bg-yellow mgl-10">{$item.sub_category|@count}</span></div>
                                                                    </div>
                                                                    <div data-rel="scroll" data-scrollheight="150" class="input-border content-list">
                                                                        <ul class="list-wrapper pd-5">
                                                                            {foreach name=list2 item=item2 key=key from=$item.sub_category}
                                                                                <li class="vd_hover" data-original-title="{$item2.description}" data-placement="bottom" data-toggle="tooltip" data-container="body"><span class="menu-rating vd_yellow col-md-1 pd-0"><i class="icon-star mgr-10"></i></span><span class="col-md-11 pd-0">{$item2.sub_category_name}</span></li>
                                                                                    {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {/foreach}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>QA Approval Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($qa_approve_comments)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                <th>{attribute_name module="vms" attribute="date"}</th>
                                                                <th>{attribute_name module="vms" attribute="review_comments"}</th>
                                                                <th>{attribute_name module="vms" attribute="user_name"}</th>
                                                                <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                                <th>{attribute_name module="vms" attribute="department"}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach name=list item=item key=key from=$qa_approve_comments}
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{$item.date_time}</td>
                                                                    <td>{$item.remarks}</td>
                                                                    <td>{$item.user_name}</td>
                                                                    <td>{$item.plant}</td>
                                                                    <td>{$item.department}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Audit Findings Review1 Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($audit_findings_review1_comments)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="vms" attribute="s_no"}</th>
                                                                <th>{attribute_name module="vms" attribute="date"}</th>
                                                                <th>{attribute_name module="vms" attribute="review_comments"}</th>
                                                                <th>{attribute_name module="vms" attribute="user_name"}</th>
                                                                <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                                <th>{attribute_name module="vms" attribute="department"}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach name=list item=item key=key from=$audit_findings_review1_comments}
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{$item.date_time}</td>
                                                                    <td>{$item.remarks}</td>
                                                                    <td>{$item.user_name}</td>
                                                                    <td>{$item.plant}</td>
                                                                    <td>{$item.department}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Audit Findings Review2 Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($audit_findings_review2_comments)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="vms" attribute="s_no"}</th>
                                                                <th>{attribute_name module="vms" attribute="date"}</th>
                                                                <th>{attribute_name module="vms" attribute="review_comments"}</th>
                                                                <th>{attribute_name module="vms" attribute="user_name"}</th>
                                                                <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                                <th>{attribute_name module="vms" attribute="department"}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach name=list item=item key=key from=$audit_findings_review2_comments}
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{$item.date_time}</td>
                                                                    <td>{$item.remarks}</td>
                                                                    <td>{$item.user_name}</td>
                                                                    <td>{$item.plant}</td>
                                                                    <td>{$item.department}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_audit_schedule">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>Audit Schedule</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="vendor_name"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->org_name}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="plant_name"}</div>
                                                        <input type="text" readonly value="{$vm_plant_obj->plant_name}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="audit_date_from"}</div>
                                                        <input type="text" readonly value="{display_date var={$vm_master_obj->audit_from_date}}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="audit_date_to"}</div>
                                                        <input type="text" readonly value="{display_date var={$vm_master_obj->audit_to_date}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="scope"}</div>
                                                        <textarea type="text" rows="3" readonly >{$vm_master_obj->scope}</textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">{attribute_name module="vms" attribute="objectives"}</div>
                                                        <textarea type="text" rows="3" readonly >{$vm_master_obj->objectives}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span class="font-semibold text-uppercase vd_grey h4"><i class="append-icon fa fa-clock-o"></i>AUDIT PlAN</span>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vms_aduit_plan_list)}
                                                    <div class="audit_plan_table_div audit_plan_toggle">
                                                        <table class="table table-bordered table-hover input-border mgbt-md-20 generate_datatable" title="Audit Plan" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                    <th class="col-md-2">{attribute_name module="vms" attribute="date"}</th>
                                                                    <th class="col-md-2">{attribute_name module="vms" attribute="from_time"}</th>
                                                                    <th class="col-md-2">{attribute_name module="vms" attribute="to_time"}</th>
                                                                    <th class="col-md-6">{attribute_name module="vms" attribute="plan"}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach item=item key=key from=$vms_aduit_plan_list}
                                                                    <tr>
                                                                        <td>{$key+1}</span></td>
                                                                        <td>{display_date var=$item.date}</td>
                                                                        <td>{$item.from_time}</td>
                                                                        <td>{$item.to_time}</td>
                                                                        <td>{$item.plan}</td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="audit_plan_calender_div audit_plan_toggle" style="display:none;">
                                                        <div class="audit_plan_calender">

                                                        </div>
                                                    </div>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-list"></i>AUDIT AGENDA</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vm_agenda_list)}
                                                    {foreach item=item key=key from=$vm_agenda_list}
                                                        <table class="table table-bordered table-hover input-border mgbt-md-20">
                                                            <tbody>
                                                                <tr class="lm_grey">
                                                                    <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                    <td class="font-semibold" colspan="5">{$item.category_name} 
                                                                        <span class="mgl-10"><span class="vd_hover" data-original-title="Agenda score weightage" data-toggle="tooltip" data-placement="bottom">[{$item.category_score}]</span>
                                                                            {if !empty($item.auditor_id)}<span class="vd_hover" data-original-title="Auditor" data-toggle="tooltip" data-placement="bottom">[ <i class="fa fa-fw fa-user"></i> {$item.auditor_name} ]{/if}</span></span></td>
                                                                </tr>
                                                                <tr class="font-semibold">
                                                                    <td colspan="2" class="text-center">{attribute_name module="vms" attribute="sub_category"}</td>
                                                                    <td class="col-md-3" class="text-center">{attribute_name module="vms" attribute="classification"}</td>
                                                                    <td class="col-md-2" class="text-center">{attribute_name module="vms" attribute="score_weightage"}</td>
                                                                </tr>
                                                                {foreach item=item1 key=key1 from=$item.sub_category}
                                                                    <tr>
                                                                        <td>{$key1+1}</td>
                                                                        <td class="col-md-7">{$item1.sub_category_name}</td>
                                                                        <td class="col-md-3">{display_if_null var=$item1.classification_name}</td>
                                                                        <td class="col-md-2">{display_if_null var=$item1.score}</td>
                                                                    </tr>
                                                                {/foreach}
                                                                <tr>
                                                                    <td colspan="3" class="text-right font-semibold">Total</td>
                                                                    <td class="font-semibold">{$item.category_score}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    {/foreach}
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Audit Lead</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vm_master_obj->audit_lead)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                <th>{attribute_name module="vms" attribute="audit_lead"}</th>
                                                                <th>{attribute_name module="vms" attribute="audit_lead_plant"}</th>
                                                                <th>{attribute_name module="vms" attribute="audit_lead_dept"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>{$audit_lead_name}</td>
                                                                <td>{$audit_lead_plant}</td>
                                                                <td>{$audit_lead_dept}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Auditors</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vm_auditors)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                <th>{attribute_name module="admin" attribute="user_name"}</th>
                                                                <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                                <th>{attribute_name module="admin" attribute="department"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach item=item key=key from=$vm_auditors}
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{$item.auditor_name}</td>
                                                                    <td>{$item.auditor_plant}</td>
                                                                    <td>{$item.auditor_dept}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div> 
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Auditees</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vm_auditees)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                <th>{attribute_name module="vms" attribute="auditee_name"}</th>
                                                                <th>{attribute_name module="vms" attribute="email"}</th>
                                                                <th>{attribute_name module="vms" attribute="contact_number"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach item=item key=key from=$vm_auditees}
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{$item.auditee_name}</td>
                                                                    <td>{$item.auditee_email}</td>
                                                                    <td>{$item.auditee_contact}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane" id="tab_audit_observation">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-eye-open"></i>Audit Findings</span></h4>
                                    <div class="vd_content-section clearfix ">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($vm_agenda_list)}
                                                    {foreach item=item key=key from=$vm_agenda_list}
                                                        <table class="table table-bordered input-border mgbt-md-20">
                                                            <tbody>
                                                                <tr class="lm_grey">
                                                                    <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                    <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}]</td>
                                                                </tr>
                                                                <tr class="font-semibold">
                                                                    <td colspan="2">{attribute_name module="vms" attribute="sub_category"}<span class="pull-right"><i class="append-icon fa fa-star"></i><b> Audit Score </b>: {$item.sub_category_score1_total}/{$item.category_score}</span></td>
                                                                </tr>
                                                                {foreach item=item1 key=key1 from=$item.sub_category}
                                                                    <tr>
                                                                        <td>{$key1+1}</td>
                                                                        <td class="lm_grey">
                                                                            <div class="col-md-12 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white unset_min_height">
                                                                                    <span class="pull-right"><b><i class="append-icon fa fa-star"></i> Score Weightage : </b>{$item1.score}</span>
                                                                                    <b><i class="append-icon fa fa-fw fa-sitemap"></i></b> {$item1.sub_category_name}  
                                                                                    <br><br><i class="append-icon fa fa-fw fa-flickr text-center"></i>Classificaton : </b>{$item1.classification_name}
                                                                                </div>
                                                                            </div>
                                                                            <!-- NC 1 -->
                                                                            <div class="col-md-3 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                    <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 1</div>
                                                                                    <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                    <div class="mgtp-20">
                                                                                        <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                        <br><br>
                                                                                        <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}/{$item1.score}
                                                                                        <br><br><br>
                                                                                        <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                            <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                        </button>
                                                                                    </div>                                                                       
                                                                                </div>                                                                       
                                                                            </div>
                                                                            <!-- NC 2 -->
                                                                            {if $item1.conformity1 eq 'Conformance'}
                                                                                <div class="col-md-3 pd-0">
                                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                                        <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                        <div class="mgtp-20">
                                                                                            <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                            <br><br>
                                                                                            <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                            <br><br>
                                                                                            <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}/{$item1.score}
                                                                                            <br><br><br>
                                                                                            <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                                <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                            </button>
                                                                                        </div>                                                                       
                                                                                    </div>                                                                       
                                                                                </div>
                                                                            {else}
                                                                                <div class="col-md-3 pd-0">
                                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <div class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                                        <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                        <div class="mgtp-20">
                                                                                            <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity2}  {if $item1.conformity2 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                            <br><br>
                                                                                            <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level2}
                                                                                            <br><br>
                                                                                            <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score2}/{$item1.score}
                                                                                            <br><br><br>
                                                                                            <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                                <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                            </button>
                                                                                        </div>                                                                       
                                                                                    </div>                                                                       
                                                                                </div>
                                                                            {/if}
                                                                            <div class="col-md-6 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                    <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation </b>:
                                                                                    <br>{display_if_null var=$item1.observation}  
                                                                                    <br><br>
                                                                                    <b>
                                                                                        {if $item1.conformity1 eq 'Conformance'}
                                                                                            <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                        {else}
                                                                                            <i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                        {/if}: 
                                                                                    </b>
                                                                                    <br>{display_if_null var=$item1.just_action_to_be_taken}
                                                                                    <br><br>
                                                                                    {if $item1.conformity1 eq 'Non Conformance'}
                                                                                        <b><i class="append-icon fa fa-shopping-cart"></i>Vendor Comments</b>:
                                                                                        <br>{display_if_null var=$item1.vendor_comments}  
                                                                                    {/if}
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {/foreach}
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_attachments">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>General - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if $general_file_objectarray}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attachments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="dms" attribute="s_no"}</th>
                                                                <th>{attribute_name module="file" attribute="name"}</th>
                                                                <th>{attribute_name module="file" attribute="size"}</th>
                                                                <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                <th>{attribute_name module="file" attribute="date"}</th>
                                                                <th>{attribute_name module="admin" attribute="action"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach item=item from=$general_file_objectarray}
                                                                <tr>
                                                                    <td></td>
                                                                    <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}">{$item.name}</a></td>
                                                                    <td>{GetFriendlySize file_size=$item.size}</td>
                                                                    <td>{$item.attached_by}</td>
                                                                    <td>{$item.attached_date}</td>
                                                                    <td class="menu-action text-nowrap">
                                                                        <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}"><i class="fa fa-download"></i></a>
                                                                    </td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Audit Observation - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($audit_observation_file_objectarray)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attachments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="dms" attribute="s_no"}</th>
                                                                <th>{attribute_name module="file" attribute="name"}</th>
                                                                <th>{attribute_name module="file" attribute="size"}</th>
                                                                <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                <th>{attribute_name module="file" attribute="date"}</th>
                                                                <th>{attribute_name module="admin" attribute="action"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach item=item from=$audit_observation_file_objectarray}
                                                                <tr>
                                                                    <td></td>
                                                                    <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}">{$item.name}</a></td>
                                                                    <td>{GetFriendlySize file_size=$item.size}</td>
                                                                    <td>{$item.attached_by}</td>
                                                                    <td>{$item.attached_date}</td>
                                                                    <td class="menu-action text-nowrap">
                                                                        <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}"><i class="fa fa-download"></i></a>
                                                                    </td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Audit Feedback - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($audit_feedback_file_objectarray)}
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attachments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="dms" attribute="s_no"}</th>
                                                                <th>{attribute_name module="file" attribute="name"}</th>
                                                                <th>{attribute_name module="file" attribute="size"}</th>
                                                                <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                <th>{attribute_name module="file" attribute="date"}</th>
                                                                <th>{attribute_name module="admin" attribute="action"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {foreach item=item from=$audit_feedback_file_objectarray}
                                                                <tr>
                                                                    <td></td>
                                                                    <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}">{$item.name}</a></td>
                                                                    <td>{GetFriendlySize file_size=$item.size}</td>
                                                                    <td>{$item.attached_by}</td>
                                                                    <td>{$item.attached_date}</td>
                                                                    <td class="menu-action text-nowrap">
                                                                        <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}"><i class="fa fa-download"></i></a>
                                                                    </td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_reports">
                                    <span class="font-semibold text-uppercase vd_grey h4"><i class="append-icon fa fa-fw fa-file-pdf-o"></i>Reports </span> <span class="vd_grey mgl-10">(<i class="fa fa-fw fa-info-circle"></i>Best view in A3-P)</span>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body pdlr-10"> 
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-blue" style="box-shadow:none;">
                                                            <label class="vd_white">Full Report</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a2&rtype=full_report">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a2&rtype=full_report">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a3&rtype=full_report">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a3&rtype=full_report">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a4&rtype=full_report">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a4&rtype=full_report">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group" style="box-shadow:none;">
                                                            <label class="vd_white">Agenda</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a2&rtype=agenda">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a2&rtype=agenda">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a3&rtype=agenda">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a3&rtype=agenda">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a4&rtype=agenda">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a4&rtype=agenda">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-dark-yellow" style="box-shadow:none;">
                                                            <label class="vd_white">Audit Findings</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a2&rtype=observation">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a2&rtype=observation">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a3&rtype=observation">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a3&rtype=observation">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a4&rtype=observation">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a4&rtype=observation">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-black" style="box-shadow:none;">
                                                            <label class="vd_white">Audit Findings Completion</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a2&rtype=feedback">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a2&rtype=feedback">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a3&rtype=feedback">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a3&rtype=feedback">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a4&rtype=feedback">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a4&rtype=feedback">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-red" style="box-shadow:none;">
                                                            <label class="vd_white">Manual Entry Sheet - Findings</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a2&rtype=manual_entry">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a2&rtype=manual_entry">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a3&rtype=manual_entry">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a3&rtype=manual_entry">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=p&paper_size=a4&rtype=manual_entry">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_vms_details_file&object_id={$vm_master_obj->vm_object_id}&ori=l&paper_size=a4&rtype=manual_entry">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                {if $show_vendor_certificate}
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group vd_bg-dark-green" style="box-shadow:none;">
                                                                <label class="vd_white">Certificate</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=vendor_certificate_file&object_id={$vm_master_obj->vm_object_id}&op_type=d">Certificate</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                {/if}
                                                {if $show_vendor_report}
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group vd_bg-blue" style="box-shadow:none;">
                                                                <label class="vd_white">Vendor Report - Findings</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select</option>
                                                                <option value="index.php?module=file&action=vendor_audit_report_file&object_id={$vm_master_obj->vm_object_id}&op_type=d">Audit Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_insight">
                                    <div id="insight_wizard" class="form-wizard condensed input-border generate_wizard">
                                        <ul class="nav nav-tabs nav-justified font-semibold">
                                            <li class="input-border"><a class="pd-10" href="#insight_vendor_certificate" data-toggle="tab"><div class="menu-icon"><i class="icon-newspaper vd_red"></i></div>Certificate</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_vendor_report" data-toggle="tab"><div class="menu-icon"><i class="icon-newspaper vd_red"></i></div>Vendor Report</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_access_rights" data-toggle="tab"><div class="menu-icon"><i class="icon-key vd_red"></i></div>Access Rights</a></li>
                                            {if $cancelled_details}<li class="input-border"><a class="pd-10" href="#insight_cancel_details" data-toggle="tab"><div class="menu-icon"><i class="icon-blocked vd_red"></i></div>Cancellation Details</a></li>{/if}
                                            <li class="input-border"><a class="pd-10" href="#insight_extension" data-toggle="tab"><div class="menu-icon"><i class="fa  fa-external-link vd_red"></i></div>Interim Extension</a></li>
                                            <li class="input-border search_audit_trail"><a class="pd-10" href="#insight_audit_trail" data-toggle="tab"><div class="menu-icon"><i class="fa fa-fw fa-road vd_red"></i></div>Audit Trail</a></li>
                                        </ul>
                                        <div class="panel-body pd-15">
                                            <div class="tab-content pd-0 mgtp-0 no-bd">
                                                <div class="tab-pane" id="insight_vendor_certificate">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-newspaper"></i>Certificate</span></h4>
                                                    {if !empty($show_vendor_certificate)}
                                                        <iframe width="100%" height="1000px" src="index.php?module=file&action=vendor_certificate_file&object_id={$vm_master_obj->vm_object_id}&op_type=d"></iframe>
                                                        {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    {/if}
                                                </div>
                                                <div class="tab-pane" id="insight_vendor_report">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-newspaper"></i>Vendor Report</span></h4>
                                                    {if !empty($show_vendor_report)}
                                                        <iframe width="100%" height="1000px" src="index.php?module=file&action=vendor_audit_report_file&object_id={$vm_master_obj->vm_object_id}&op_type=d"></iframe>
                                                        {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    {/if}
                                                </div>
                                                <div class="tab-pane" id="insight_access_rights">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>ACCESS RIGHTS </span></h4>
                                                    {if !empty($current_access_rights)}
                                                        <table   class="table table-bordered table-striped generate_datatable" title="Access Rights" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1">{attribute_name module="vms" attribute="s_no"}</th>
                                                                    <th class="col-md-1">{attribute_name module="admin" attribute="plant_name"}</th>
                                                                    <th class="col-md-1">{attribute_name module="admin" attribute="department"}</th>
                                                                    <th class="col-md-1">{attribute_name module="vms" attribute="last_modified_by"}</th>
                                                                    <th class="col-md-1">{attribute_name module="vms" attribute="last_modified_date"}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$current_access_rights}
                                                                    <tr >
                                                                        <td></td>
                                                                        <td >{$item.plant_name}</td>
                                                                        <td >{$item.dept_name}</td>
                                                                        <td >{$item.modified_by}</td>
                                                                        <td >{$item.modified_time}</td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    {/if}
                                                </div>
                                                <div class="tab-pane" id="insight_cancel_details">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-blocked"></i>Cancellation Details</span></h4>
                                                    {if !empty($cancelled_details)}
                                                        <table   class="table table-bordered table-striped generate_datatable" title="Cancelled Details" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                    <th class="col-md-6">{attribute_name module="vms" attribute="reason"}</th>
                                                                    <th class="col-md-3">{attribute_name module="vms" attribute="cancelled_by"}</th>
                                                                    <th class="col-md-3">{attribute_name module="vms" attribute="cancelled_date"}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$cancelled_details}
                                                                    <tr >
                                                                        <td></td>
                                                                        <td >{$item.reason}</td>
                                                                        <td >{$item.cancelled_by}</td>
                                                                        <td >{$item.cancelled_time}</td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    {/if}
                                                </div>
                                                <div class="tab-pane" id="insight_extension">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-external-link"></i>INTERIM EXTENSION</span></h4>
                                                    {if !empty($extension_details)}
                                                        <table class="table table-bordered table-striped generate_datatable" title="Interim Extension" data-ori="landscape" data-pagesize="B4" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="s_no"}</th>
                                                                    <th>{attribute_name module="vms" attribute="requested_date"}</th>
                                                                    <th>{attribute_name module="vms" attribute="requested_by"}</th>
                                                                    <th>{attribute_name module="vms" attribute="exisiting_target_date"}</th>
                                                                    <th>{attribute_name module="vms" attribute="proposed_target_date"}</th>
                                                                    <th>{attribute_name module="vms" attribute="reason"}</th>
                                                                    <th>{attribute_name module="vms" attribute="approved_by"}</th>
                                                                    <th>{attribute_name module="vms" attribute="approved_date"}</th>
                                                                    <th>{attribute_name module="vms" attribute="extension_for"}</th>
                                                                    <th>{attribute_name module="vms" attribute="approval_status"}</th>
                                                                    <th>{attribute_name module="vms" attribute="status"}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$extension_details}
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>{$item.created_time}</td>
                                                                        <td>{$item.created_by_name}</td>
                                                                        <td>{$item.existing_target_date}</td>
                                                                        <td>{$item.proposed_target_date}</td>
                                                                        <td>{$item.reason}</td>
                                                                        <td>{display_if_null var=$item.approved_by}</td>
                                                                        <td>{display_if_null var=$item.approved_date}</td>
                                                                        <td>{$item.extension_for}</td>
                                                                        <td>{$item.approval_status}</td>
                                                                        <td>{$item.status}</td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    {/if}
                                                </div>
                                                <div class="tab-pane" id="insight_audit_trail">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-road"></i>Audit Trail</span></h4>
                                                    <table class="table table-bordered table-striped generate_datatable audit_trail_result_table" title="Audit trail" data-whitespace="nowrap" data-ori="landscape" data-pagesize="A3" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                                <th>{attribute_name module="audit" attribute="date"}</th>
                                                                <th>{attribute_name module="audit" attribute="user_name"}</th>
                                                                <th>{attribute_name module="audit" attribute="ip_address"}</th>
                                                                <th>{attribute_name module="audit" attribute="action"} </th>
                                                                <th>{attribute_name module="audit" attribute="new_value"}</th>
                                                                <th>{attribute_name module="audit" attribute="old_value"}</th>
                                                                <th>{attribute_name module="audit" attribute="status"}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" class="query" type="hidden" value="vms_wf_audit_trail">
                                                    <input type="hidden" class="refrence_object_id" type="hidden" value="{$vm_master_obj->vm_object_id}">
                                                    <input type="hidden" class="from_date"  data-datepicker_min="{$at_start_date}" data-datepicker_max="{$at_end_date}">
                                                    <input type="hidden" class="to_date"  data-datepicker_min="{$at_start_date}" data-datepicker_max="{$at_end_date}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions-condensed wizard">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-sm-9 col-sm-offset-0"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" href="javascript:void(0);">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a>                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsestatus"> Status </a> </h4>
                </div>
                <div id="collapsestatus" class="panel-collapse collapse">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="col-md-8 h4 mgtp-0 mgbt-md-0 pd-0 row"><span class="vd_blue"><strong>{$vm_master_obj->wf_status}</strong></span>
                                {if !empty($worklist_pending_details)} <span data-original-title="Pending Details" data-toggle="tooltip" data-placement="bottom"> <i style="cursor: pointer;" data-target="#modal-worklist" data-toggle="modal" class="btn menu-icon vd_bd-red vd_red fa fa-tasks"></i> </span>{/if}
                            </div>
                            <div class="progress progress-striped active mgtp-5 mgbt-md-0 vd_hover" data-original-title="<div class='mgtp-5 font-semibold'><span><i class='fa fa-circle fa-fw vd_green fa-beat-animation'></i>Completion : </span><span> {$progress_bar_status_per}</span></div><div class='mgtp-5 font-semibold'><span>{$vm_master_obj->status} </span><span> - [{$vm_master_obj->wf_status}]</span></div>" data-toggle="tooltip" data-placement="bottom" data-html="true">
                                <div class="progress-bar font-semibold" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{$progress_bar_status_per}"> <span>{$progress_bar_status_per}</span> </div>
                            </div>
                            <div class="row mgtp-10">
                                <table class="table table-bordered table-hover table-striped mgtp-5">
                                    <thead>
                                        <tr>
                                            <th>{attribute_name module=admin attribute="date"}</th>
                                            <th>{attribute_name module=admin attribute="user_name"}</th>
                                            <th>{attribute_name module=admin attribute="designation"}</th>
                                            <th>{attribute_name module=admin attribute="plant_name"}</th>
                                            <th>{attribute_name module=admin attribute="department"}</th>
                                            <th>{attribute_name module=admin attribute="action"}</th>
                                            <th>{attribute_name module=admin attribute="status"}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach name=list item=item key=key from=$status_details}
                                            <tr>
                                                <td>{$item.date}</td>
                                                <td>{$item.user_name}</td>
                                                <td>{$item.desi}</td>
                                                <td>{$item.plant}</td>
                                                <td>{$item.department}</td>
                                                <td>{$item.action}</td>
                                                <td>{$item.status}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="mgtp-0 mgbt-md-0">
                        <div class="panel-body">
                            <h4 class="mgbt-xs-20 row font-semibold text-uppercase vd_grey">Comments</h4>
                            <form name="vms_comments_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal row" role="form" id="vms_comments_form" autocomplete="off">
                                <table class="table table-bordered table-striped generate_datatable" title="Comments" data-sort_column=1>
                                    <thead>
                                        <tr>
                                            <th>{attribute_name module=admin attribute="sl_no"}</th>
                                            <th>{attribute_name module="vms" attribute="date"}</th>
                                            <th>{attribute_name module="vms" attribute="username"}</th>
                                            <th>{attribute_name module=admin attribute="plant_name"}</th>
                                            <th>{attribute_name module="vms" attribute="department"}</th>
                                            <th>{attribute_name module="vms" attribute="remarks"}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach key=key item=cmt from=$wf_remarks_array}
                                            <tr>
                                                <td></td>
                                                <td>{$cmt.created_time}</td>
                                                <td>{$cmt.created_by}</td>
                                                <td>{$cmt.plant}</td>
                                                <td>{$cmt.department}</td>
                                                <td>{$cmt.remarks}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {if !empty($edit_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_Edit"> Edit <i class="fa  fa-exclamation-triangle vd_white"></i> {if $show_edit_error_msg}<span class="badge vd_bg-red fa-beat-animation" data-toggle="tooltip" data-placement="bottom" data-original-title="Kindly upadte the Mandatory Fields to proceed to the next stage"><i class="fa fa-exclamation"></i></span>{/if}</a> </h4>
                    </div>
                    <div id="collapse_Edit" class="panel-collapse collapse">
                        <div class="panel widget light-widget">
                            <div class="panel widget">
                                <div class="panel-body">
                                    <div class="form-wizard condensed">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_basic_details" class="btn vd_green font-semibold"><div class="menu-icon"><span class="icon-vcard vd_red"></span></div>Schedule details</a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_plan" class="btn vd_green font-semibold"><div class="menu-icon"><span class="fa fa-clock-o vd_red"></span></div>Audit Plan </a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_score_risk_category" class="btn vd_green font-semibold"><div class="menu-icon"><span class="fa fa-fw fa-shield vd_red"></span></div>Risk Category & Score </a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_auditors" class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa-fw  fa-user vd_red"></i> </div>Audit Lead & Auditors </a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_auditees" class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa fa-fw fa-user vd_red" aria-hidden="true"></i></div>Auditees</a></li>
                                        </ul>
                                    </div>
                                    <!-- Start Of Edit Basic Details Modal -->
                                    <div class="modal fade" id="edit_basic_details" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-90">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Schedule details</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="update_audit_schedule-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_audit_schedule-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="vms" attribute="vendor_name"}</label><span class="vd_red">*</span>
                                                                <div class="controls">
                                                                    <input type="text" readonly value="{$vm_plant_obj->org_name}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="vms" attribute="plant_name"}</label> <span class="vd_red">*</span>
                                                                <div class="controls">
                                                                    <select class="uvms_plant" name="uvms_plant_id" title="Select Plant">
                                                                        {foreach name=list item=item key=key from=$edit_plant_list}
                                                                            <option value="{$item.plant_id}" {if $vm_master_obj->plant_name eq $item.plant_id}selected{/if}>{$item.plant_name}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="vms" attribute="audit_date_from"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker date_changed" name="uvms_audit_from_date" title="Select Valid Date" data-datepicker_min=0 data-date_changed="uvms_audit_to_date" value="{$vm_master_obj->audit_from_date}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="vms" attribute="audit_date_to"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker" name="uvms_audit_to_date" title="Select Valid Date" data-datepicker_min="{if $vm_sch_obj->audit_from_date}{$vm_sch_obj->audit_from_date}"{else}0" disabled{/if} value="{$vm_master_obj->audit_to_date}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="vms" attribute="scope"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea rows="4" name="uvms_scope" title="Enter Valid Scope" placeholder="The audit will assess adherence to quality management systems and GMP standards, inspect facility conditions, equipment, and personnel training, verify compliance with regulatory requirements, review risk management processes and corrective actions, and evaluate supply chain management and product quality control procedures.">{$vm_master_obj->scope}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="vms" attribute="objectives"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea rows="4" name="uvms_objectives" title="Enter Valid Objectives" placeholder="The audit aims to evaluate compliance with quality management systems and GMP standards, verify the effectiveness of regulatory adherence, assess risk management and corrective action processes, and ensure robust supply chain and product quality controls. The goal is to identify areas for improvement and confirm that all practices meet required standards.">{$vm_master_obj->objectives}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mgbt-md-0">
                                                            <div class="col-md-12  mgtp-10">
                                                                <table class="table table-bordered table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <div class="vd_checkbox checkbox-danger">
                                                                                    <input type="checkbox" class="select_agenda_all"  id="all_agenda">
                                                                                    <label for="all_agenda"></label>
                                                                                </div>
                                                                            </th>
                                                                            <th class="col-md-5">{attribute_name module="vms" attribute="agenda_category"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-6">{attribute_name module="vms" attribute="agenda_sub_category"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-1">{attribute_name module="vms" attribute="score"} <span class="vd_red">*</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {foreach name=list item=item key=key from=$edit_agenda_list}
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="vd_checkbox checkbox-danger">
                                                                                        <input type="checkbox" class="select_agenda" name="uvms_agenda_cat[]" value="{$item.object_id}" id="agenda_{$key}" {if $item.is_agenda_exist}checked{/if}>
                                                                                        <label for="agenda_{$key}"></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{$item.category}</td>
                                                                                <td>
                                                                                    <select class="generate_select2 cmn_ed agenda_sub_cat" name="uvms_agenda_sub_cat[]" multiple="multiple" style="width:100%" title="Select Agenda Sub Category" {if !$item.is_agenda_exist}disabled{/if}>
                                                                                        <option value="">Select</option>
                                                                                        {foreach item=item2 key=key2 from=$item.subcategorylist}
                                                                                            <option value="{$item.object_id}-{$item2.object_id}" {if $item2.is_sub_agenda_list_exist}selected{/if}>{$item2.sub_category}</option>
                                                                                        {/foreach}
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="cmn_ed score" name="score[]" min="1" max="100" title="Enter Score" {if !$item.is_agenda_exist}disabled placeholder="{$item.category_score}" {else} value="{$item.category_score}"{/if}>
                                                                                </td>
                                                                            </tr>
                                                                        {/foreach}
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="3" class="text-right">
                                                                                <span class="font-semibold">{attribute_name module=vms attribute="total"}</span>
                                                                            </td>
                                                                            <td class="text-center total_score">100</td>
                                                                        </tr>
                                                                    </tfoot>

                                                                </table>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="alert alert-info mgbt-md-0">
                                                                    <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong> Note : </strong> If the audit date changes, please update the audit plan accordingly.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <input type="hidden" name="audit_trail_action" value="Update Audit Schedule">
                                                                <input type="hidden" name="update_audit_schedule" value="update_audit_schedule">
                                                                <button class="btn vd_bg-green vd_white" type="submit"  id="update_audit_schedule"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Of Edit Basic Details Modal -->
                                    <!-- Start Of Edit Plan -->
                                    <div class="modal fade" id="edit_plan" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-80">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Audit Plan</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="update_audit_plan-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_audit_plan-form" autocomplete="off">
                                                        <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                            <div class="row mgbt-md-0">
                                                                <div class="col-md-12 font-semibold">
                                                                    <button class="btn vd_bg-green vd_white add_more_plan" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mgbt-md-0">
                                                            <div class="col-sm-12">
                                                                <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="col-md-2">{attribute_name module="vms" attribute="date"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-2">{attribute_name module="vms" attribute="from_time"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-2">{attribute_name module="vms" attribute="to_time"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-8">{attribute_name module="vms" attribute="plan"} <span class="vd_red">*</span></th>
                                                                            <th>{attribute_name module="vms" attribute="action"}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="add_audit_plan_parent_ele">
                                                                        {if $vms_aduit_plan_list}
                                                                            {foreach name=list item=item key=key from=$vms_aduit_plan_list}
                                                                                <tr class="add_audit_plan_child_ele">
                                                                                    <td><input type="text" class="generate_datepicker audit_plan_date reset_ele" name="uvms_plan_date[]" title="Select Valid Date" data-datepicker_min={$vm_master_obj->audit_from_date} data-datepicker_max={$vm_master_obj->audit_to_date} value="{$item.date}"></td>
                                                                                    <td><input type="text" class="generate_timepicker audit_plan_from_time" name="uvms_plan_from_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false" value="{$item.from_time}"></td>
                                                                                    <td><input type="text" class="generate_timepicker audit_plan_to_time" name="uvms_plan_to_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false" value="{$item.to_time}"></td>
                                                                                    <td><input type="text" class="reset_ele audit_plan" name="uvms_plan[] reset_ele" placeholder="Enter Plan" title="Enter Plan" value="{$item.plan}"></td>
                                                                                    <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_audit_plan_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        {else}
                                                                            <tr class="add_audit_plan_child_ele">
                                                                                <td><input type="text" class="generate_datepicker audit_plan_date" name="uvms_plan_date[]" title="Select Valid Date" data-datepicker_min={$vm_master_obj->audit_from_date} data-datepicker_max={$vm_master_obj->audit_to_date}></td>
                                                                                <td><input type="text" class="generate_timepicker audit_plan_from_time" name="uvms_plan_from_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false"></td>
                                                                                <td><input type="text" class="generate_timepicker audit_plan_to_time" name="uvms_plan_to_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false"></td>
                                                                                <td><input type="text" class="reset_ele audit_plan" name="uvms_plan[]" placeholder="Enter Plan" title="Enter Plan"></td>
                                                                                <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_audit_plan_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                            </tr>
                                                                        {/if}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer pd-10">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-20" >
                                                                <input type="hidden" name="audit_trail_action" value="Update Audit Plan">
                                                                <input type="hidden" name="update_audit_plan" >
                                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_audit_plan"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Of Edit Plan -->
                                    <!-- Start Of Edit Score & Risk Modal -->
                                    <div class="modal fade" id="edit_score_risk_category" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Risk Category & Score</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="update_sub_cat_score_risk-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_sub_cat_score_risk-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12  mgtp-10">
                                                                {foreach item=item key=key from=$vm_agenda_list}
                                                                    <table class="table table-bordered table-hover">
                                                                        <tbody>

                                                                            <tr class="lm_grey">
                                                                                <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                                <td class="font-semibold" colspan="3">{$item.category_name}<input type="hidden" class="max_score" value="{$item.category_score}"></td>
                                                                            </tr>
                                                                            <tr class="font-semibold">
                                                                                <td class="col-md-8" colspan="2"></td>
                                                                                <td class="col-md-2">{attribute_name module="vms" attribute="classification"} <span class="vd_red">*</span></td>
                                                                                <td class="col-md-2">{attribute_name module="vms" attribute="score_weightage"} <span class="vd_red">*</span></td>
                                                                            </tr>
                                                                            {foreach item=item1 key=key1 from=$item.sub_category}
                                                                                <tr>
                                                                                    <td>{$key1+1}</td>
                                                                                    <td class="col-md-8">{$item1.sub_category_name}</td>
                                                                                    <td class="col-md-2">
                                                                                        <select name="uvms_risk_category[]" class="risk_category" id="edit_risk_category_{$key}_{$key1}" title="Select Valid Risk Category">
                                                                                            <option value="">Select</option>
                                                                                            {foreach item=item2 key=key2 from=$classification_list}
                                                                                                <option value="{$item2.object_id}" {if $item1.classification_id eq $item2.object_id}selected{/if}>{$item2.type}{$item2.short_name}</option>
                                                                                            {/foreach}
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="col-md-2">
                                                                                        <input type="number" class="update_sub_cat_score" name="uvms_default_score[]" min="1" max="100" placeholder="0" title="Enter Score" value="{$item1.score}">
                                                                                    </td>
                                                                                </tr>
                                                                            <input type="hidden" name="sub_category_object_id[]" value="{$item1.object_id}">
                                                                        {/foreach}
                                                                        <tr>
                                                                            <td colspan="3" class="text-right font-semibold">Total (Max : {$item.category_score})</td>
                                                                            <td class="text-left total_score">{if $item.sub_category[0].score}{$item.category_score}{else}0{/if}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <input type="hidden" name="category_object_id[]" value="{$item.object_id}">
                                                                {/foreach}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <input type="hidden" name="audit_trail_action" value="Update Risk Category & Score">
                                                                <input type="hidden" name="update_sub_cat_score_risk" value="update_sub_cat_score_risk">
                                                                <button class="btn vd_bg-green vd_white update_btn" type="submit"  id="update_rsik_score"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Of Edit Score & Risk Modal -->
                                    <!-- Start Of Edit Auditor Modal -->
                                    <div class="modal fade" id="edit_auditors" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog width-80">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Audit Lead & Auditors </h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="update_auditors-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_auditors-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <span class="vd_facebook h3 mgbt-md-0"><i class="append-icon fa fa-fw fa-user"></i>{attribute_name module="vms" attribute="audit_lead"}</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                                                <div class="controls">
                                                                    <select onchange="get_access_rights_dept_list('{$vm_master_obj->vm_object_id}', this.options[this.selectedIndex].value, '', 'yes', '#audit_lead_department');" title="Select Valid Plant">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$ar_plant_list}
                                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">{attribute_name module="vms" attribute="department"}</label>
                                                                <div class="controls">
                                                                    <select name="department" id="audit_lead_department" onchange="get_dept_users(this.options[this.selectedIndex].value, '#audit_lead_user', '');" title="Select Valid Department"></select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">{attribute_name module="vms" attribute="audit_lead"}</label>
                                                                <div class="controls">
                                                                    <select name="uvms_audit_lead" id="audit_lead_user" title="Select Valid User">
                                                                        {if $vm_master_obj->audit_lead}
                                                                            <option value="{$vm_master_obj->audit_lead}" selected>{$audit_lead_name}</option>
                                                                        {/if}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <span class="vd_facebook h3 mgbt-md-0"><i class="append-icon fa fa-fw fa-user"></i>{attribute_name module="vms" attribute="auditors"}</span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-6 pd-0">
                                                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                                                    <div class="controls">
                                                                        <select onchange="get_access_rights_dept_list('{$vm_master_obj->vm_object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department');" title="Select Valid Plant">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$ar_plant_list}
                                                                                <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">{attribute_name module="vms" attribute="department"}</label>
                                                                    <div class="controls">
                                                                        <select name="department" id="department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#uvms_auditors_users', 'multiselect');" title="Select Valid Department">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="vms" attribute="auditor_name"}<span class="vd_red">*</span> </label>
                                                                <div class="controls">
                                                                    <div class="col-md-5 pd-0">
                                                                        <select class="generate_multiselect form-control" id="uvms_auditors_users" size="7" multiple="multiple"></select>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <br>
                                                                        <button type="button" id="uvms_auditors_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                        <button type="button" id="uvms_auditors_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                        <button type="button" id="uvms_auditors_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                                        <button type="button" id="uvms_auditors_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                    </div>
                                                                    <div class="col-md-5 pd-0">
                                                                        <select name="uvms_auditors[]" id="uvms_auditors_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name">
                                                                            {foreach name=list item=item key=key from=$vm_auditors}
                                                                                <option value="{$item.auditor_id}" data-drop_down_value="{$item.auditor_id}">{$item.auditor_name}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <input type="hidden" name="audit_trail_action" value="Update Auditors & Audit Lead">
                                                                <input type="hidden" name="update_auditors" value="update_auditors">
                                                                <button class="btn vd_bg-green vd_white update_btn" type="submit" id="update_auditors"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Of Edit Auditor Modal-->
                                    <!-- Start Of Edit Auditees Modal -->
                                    <div class="modal fade" id="edit_auditees" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog width-70">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Auditees</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="update_auditees-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_auditees-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="panel-body mgbt-md-0">
                                                            <div class="form-group mgbt-md-0">
                                                                <div class="form-group">
                                                                    <div class="col-md-1">                                                           
                                                                        <button class="btn vd_bg-green vd_white add_more" type="button" onclick="add_element('.add_auditees_child_ele', '.add_auditees_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                    </div>
                                                                </div>
                                                                <table class="table table-bordered table-hover mgbt-md-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="col-md-4">{attribute_name module="vms" attribute="auditee_name"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-4">{attribute_name module="vms" attribute="email"} <span class="vd_red">*</span></th>
                                                                            <th class="col-md-4">{attribute_name module="vms" attribute="contact_number"} <span class="vd_red">*</span></th>
                                                                            <th>{attribute_name module="admin" attribute="action"}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="add_auditees_parent_ele">
                                                                        {if $vm_auditees}
                                                                            {foreach name=list item=item key=key from=$vm_auditees}
                                                                                <tr class="add_auditees_child_ele">
                                                                                    <td class="col-md-5"><input type="text" class="auditee_name" name="uvms_auditee_name[]"  placeholder="Auditee Name" title="Enter Auditee Name" value="{$item.auditee_name}"></td>
                                                                                    <td class="col-md-4"><input type="email" class="auditee_email" name="uvms_auditee_email[]"  placeholder="Auditee Email" title="Enter Valid Email" value="{$item.auditee_email}"></td>
                                                                                    <td class="col-md-2"><input type="number" class="auditee_contact" name="uvms_auditee_contact[]" minlength="10"  maxlength="20" placeholder="Auditee Conatct Number" title="Enter number" value="{$item.auditee_contact}"></td>
                                                                                    <td><button type="button"  class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_auditees_child_ele"><i class="fa fa-trash-o"></i></button></td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        {else}
                                                                            <tr class="add_auditees_child_ele">
                                                                                <td class="col-md-5"><input type="text" class="auditee_name" name="uvms_auditee_name[]"  placeholder="Auditee Name" title="Enter Auditee Name"></td>
                                                                                <td class="col-md-4"><input type="email" class="auditee_email" name="uvms_auditee_email[]"  placeholder="Auditee Email" title="Enter Valid Email"></td>
                                                                                <td class="col-md-2"><input type="number" class="auditee_contact" name="uvms_auditee_contact[]" minlength="10"  maxlength="20" placeholder="Auditee Conatct Number" title="Enter number"></td>
                                                                                <td><button type="button"  class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_auditees_child_ele"><i class="fa fa-trash-o"></i></button></td>
                                                                            </tr>
                                                                        {/if}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="alert alert-info">
                                                            <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>Note !</strong> Please ensure that the provided email address is valid and active, as the vendor audit findings report will be sent to it. Additionally, verify that the email and report are received by the vendor, as they may end up in spam or junk folders.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <input type="hidden" name="audit_trail_action" value="Update Auditees">
                                                                <input type="hidden" name="update_auditees" value="update_auditees">
                                                                <button class="btn vd_bg-green vd_white update_btn" type="submit" id="update_auditees"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Of Edit Auditees Modal-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if $edit_attachment}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_vms_attachments">Edit Attachments <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
                    </div>
                    <div id="collapse_vms_attachments" class="panel-collapse collapse">
                        <div class="panel-body pdlr-10">
                            <div class="col-md-12">
                                <form name="upload-doc-form" id="upload-doc-form" method="POST" autocomplete="off" class="form-separated">
                                    <!--Dont delete. Dropzone Custom File Upload Script See vendors/custom_inel/file_upload/all_file_upload.js-->
                                    <input type="hidden" name="upload_file_url" id="upload_file_url" value="{$smarty.server.REQUEST_URI}" />
                                    <input type="hidden" id="file_attachment_towards" value="{$file_attachment_towards}" />
                                    <input type="hidden" name="upload_file_max_size" id="upload_file_max_size" value="{$smarty.session.max_upload_file_size}" />
                                    <div id="mydropzone" class="dropzone"></div>
                                </form>
                            </div>
                            <div class="col-md-12 mgtp-15">
                                <div class="table-responsive">
                                    {if !empty($fileobjectarray)}
                                        <table class="table table-bordered table-striped text-nowrap" title="Attachments">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                    <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                    <th>{attribute_name module="file" attribute="actions"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$fileobjectarray}
                                                    <tr>
                                                        <td>{$key+1}</td>
                                                        <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}"><i class="fa fa-download"></i> {$item.name}</a></td>
                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                        <td>{$item.attached_by}</td>
                                                        <td>{$item.attached_date}</td>
                                                        <td class="menu-action text-nowrap">
                                                            <a class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id={$item.object_id}"><i class="fa fa-download"></i></a>
                                                                {if !empty($item.can_delete) && ($file_attachment_towards eq $item.attachment_towards)}
                                                                <button type="button"  class="btn menu-icon vd_bd-red vd_red delete_file" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom" data-file_id="{$item.object_id}"><i class="fa fa-trash-o"></i></button>
                                                                {/if}
                                                        </td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>    
                                    {else}
                                        <div class="dropzone panel-body input-border">
                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                            </div>
                                        </div>  
                                    {/if}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-20">
                                    <button class="btn vd_bg-red vd_white page_reload" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                                    <button class="btn menu-icon vd_bg-green vd_white" id="submit-all"><span class="menu-icon"><i class="fa fa-fw fa-upload"></i></span> Upload</button>
                                </div>
                            </div>

                        </div>
                    </div>  
                </div>
            {/if}
            {if $edit_access_rights}
                {include file="templates/common/edit_access_rights.tpl"}
            {/if}
            {if !empty($request_qa_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequest_invest"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequest_invest" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            <div class="vd_content-section clearfix">

                                <!-- Investigation Not Required Send To QA Approver -->
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">SEND TO QA APPROVER</h3>
                                </div>
                                <form name="request_qa_approval-form" method="post" action="{$smarty.server.REQUEST_URI}"  class="form-horizontal panel-body panel-bd-left" role="form" id="request_qa_approval-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                            <div class="controls">
                                                <select name="plant" onchange="get_access_rights_dept_list('{$vm_master_obj->vm_object_id}', this.options[this.selectedIndex].value, '', 'yes', '#qa_approve_drop');" title="Select Valid Plant">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$ar_plant_list}
                                                        <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label ">{attribute_name module="vms"  attribute="department"} <span class="vd_red">*</span></label>
                                            <div class="control">
                                                <select name="department" id="qa_approve_drop" onchange="get_action_users('{$lm_doc_id}', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">{attribute_name module="vms" attribute="user_name"} <span class="vd_red">*</span></label>
                                            <div class="controls ">
                                                <select name="qa_approver_user" id="userid" required title="Select Valid User Name">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="control-label">{attribute_name module="vms" attribute="remarks"} <span class="vd_red">*</span></label>
                                            <div class="controls">
                                                <textarea placeholder="(e.g.) Kindly verify the deviation and approve" rows="3" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                        <input type="hidden" name="audit_trail_action" value="Send To QA Approval">
                                        <input type="hidden" name="request_qa_approval">
                                        <button class="btn vd_bg-green vd_white" type="submit" id="request_qa_approval"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($recall_qa_approver_btn)}
                {include file="templates/common/recall.tpl"}
            {/if}
            {if !empty($show_qa_approve_button)}
                <div class="panel panel-default btn_ck">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowApprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseShowApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QA APPROVAL FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="col-md-12 row mgbt-md-0">
                                            <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-list"></i>AUDIT AGENDA</span>
                                            {foreach item=item key=key from=$vm_agenda_list}
                                                <table class="table table-bordered table-hover input-border mgbt-md-20">
                                                    <tbody>
                                                        <tr class="lm_grey">
                                                            <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                            <td class="font-semibold" colspan="5">{$item.category_name} [{$item.category_score}]</td>
                                                        </tr>
                                                        <tr class="font-semibold">
                                                            <td colspan="2" class="text-center">{attribute_name module="vms" attribute="sub_category"}</td>
                                                            <td class="col-md-3" class="text-center">{attribute_name module="vms" attribute="classification"}</td>
                                                            <td class="col-md-2" class="text-center">{attribute_name module="vms" attribute="score_weightage"}</td>
                                                        </tr>
                                                        {foreach item=item1 key=key1 from=$item.sub_category}
                                                            <tr>
                                                                <td>{$key1+1}</td>
                                                                <td class="col-md-7" class="text-center">{$item1.sub_category_name}</td>
                                                                <td class="col-md-3">{display_if_null var=$item1.classification_name}</td>
                                                                <td class="col-md-2">{display_if_null var=$item1.score}</td>
                                                            </tr>
                                                        {/foreach}
                                                        <tr>
                                                            <td colspan="3" class="text-right font-semibold">Total</td>
                                                            <td class="font-semibold">{$item.category_score}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            {/foreach}
                                        </div>
                                        <div class="form-group row qa_approval_drop mgtp-10">
                                            <div class="col-md-2">
                                                <label class="control-label">{attribute_name module="vms" attribute="approve_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="qa_approve_type">
                                                        <option value="">Select</option>
                                                        <option value="qa_approval_need_correction_div">Needs Correction</option>
                                                        <option value="qa_accepted_div">Approve</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qa_approve_type" style="display:none" id="qa_approval_need_correction_div">
                                    <form name="qa_approval_need_correction-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qa_approval_need_correction-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="col-md-12 row mgbt-md-0">
                                                    <label class="control-label">{attribute_name module="vms" attribute="remarks"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Verified and Approved / Rejected" rows="3" class="" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            {include file ="pass_auth.tpl"}
                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                    <input type="hidden" name="qa_approval_need_correction">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="qa_approval_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Needs Correction</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="qa_approve_type" style="display:none" id="qa_accepted_div">
                                    <form name="qa_accepted-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qa_accepted-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="col-md-12 row mgbt-md-0">
                                                    <label class="control-label">{attribute_name module="vms" attribute="qa_approval_comments"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Approved" rows="4" class="required" name="qa_approve_comments" required title="Enter Valid Comments"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            {include file ="pass_auth.tpl"}
                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                    <input type="hidden" name="qa_accepted">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="qa_accepeted"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Approve</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_assign_auditor_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_assign_auditors_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_assign_auditors_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget"><div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">ASSIGN AUDITORS FORM</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <!--Cancel Form -->
                                        <form name="assign_auditors-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign_auditors-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12  mgtp-10">
                                                    {foreach item=item key=key from=$vm_agenda_list}
                                                        <table class="table table-bordered table-hover">
                                                            <tbody>
                                                                <tr class="lm_grey">
                                                                    <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                    <td class="font-semibold">{$item.category_name}</td>
                                                                    <td>
                                                                        <select class="uvms_assign_auditors" name="uvms_assign_auditors[]" title="Select Auditor"">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$vm_auditors}
                                                                                <option value="{$item.auditor_id}">{$item.auditor_name}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="font-semibold mgl-10"><span class="vd_checkbox checkbox-danger"><input type="checkbox" name="uvms_assign_auditors[]" value="{$vm_master_obj->audit_lead}" id="audit_myself_{$key}" class="audit_myself"><label for="audit_myself_{$key}" ></label></span> Myself</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="font-semibold">
                                                                    <td class="col-md-7 text-center" colspan="2">{attribute_name module="vms" attribute="sub_category"}</td>
                                                                    <td class="col-md-3 text-center">{attribute_name module="vms" attribute="classification"}</td>
                                                                    <td class="col-md-2 text-center">{attribute_name module="vms" attribute="score"}</td>
                                                                </tr>
                                                                {foreach item=item1 key=key1 from=$item.sub_category}
                                                                    <tr>
                                                                        <td>{$key1+1}</td>
                                                                        <td class="col-md-7">{$item1.sub_category_name}</td>
                                                                        <td class="col-md-3" class="text-center">{$item1.classification_name}</td>
                                                                        <td class="col-md-2">{$item1.score}</td>
                                                                    </tr>
                                                                {/foreach}
                                                                <tr>
                                                                    <td colspan="3" class="text-right font-semibold">Total</td>
                                                                    <td class="text-left total_score">{$item.category_score}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" name="category_object_id[]" value="{$item.object_id}">
                                                    {/foreach}
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Assign Auditors">
                                                <input type="hidden" name="assign_auditors">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="assign_auditors"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_update_observation_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_observation_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_observation_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget"> 
                                    <div class="panel-heading bordered vd_bg-blue"><span class="panel-title vd_white font-semibold">AUDIT FINDINGS</span><span class="vd_white mgl-10">( To be filled by audit lead )</span></div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="update_audit_observation-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_audit_observation-form" autocomplete="off" enctype="multipart/form-data">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12  mgtp-10">
                                                    {foreach item=item key=key from=$vm_agenda_list}
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr class="lm_grey">
                                                                    <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                    <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}] <span class="vd_hover" data-original-title="Auditor" data-toggle="tooltip" data-placement="bottom">[ <i class="fa fa-fw fa-user"></i> {$item.auditor_name} ]</span></td>
                                                                </tr>
                                                                <tr class="font-semibold">
                                                                    <td colspan="2">{attribute_name module="vms" attribute="sub_category"}</td>
                                                                    <td>{attribute_name module="vms" attribute="classification"}</td>
                                                                    <td class="pd-5">{attribute_name module="vms" attribute="score_weightage"}</td>
                                                                </tr>
                                                                {foreach item=item1 key=key1 from=$item.sub_category}
                                                                    <tr class="bg-info">
                                                                        <td>{$key1+1}</td>
                                                                        <td class="col-md-9"><i class="append-icon fa fa-fw fa-sitemap"></i>{$item1.sub_category_name}</td>
                                                                        <td class="col-md-2"><i class="append-icon fa fa-fw fa-flickr"></i>{$item1.classification_name}</td>
                                                                        <td class="col-md-1 text-center">{$item1.score}<input type="hidden" class="default_score" value="{$item1.score}"></td>
                                                                    </tr>
                                                                    <tr>    
                                                                        <td></td>
                                                                        <td colspan="5">
                                                                            <!-- Observation -->
                                                                            <textarea rows="3" class="audit_observation" name="uvms_audit_observation[]" title="Enter Audit Observation" placeholder="Audit Observation">{$item1.observation}</textarea>
                                                                            <!-- attachment -->
                                                                            <div class="col-md-5 pd-0" style="margin-top:-5px;">
                                                                                <input type="file" name="file[{$item1.object_id}][]" multiple class="pd-5">
                                                                            </div>
                                                                            <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span></button>
                                                                            </div>
                                                                            <!--NC -->
                                                                            <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                <select class="audit_conformity vd_bg-white" name="uvms_conformity1[]" title="Select Conformity" style="padding-bottom:7px !important;">
                                                                                    <option value="">Select Conformity</option>
                                                                                    <option value="Conformance" {if $item1.conformity1 eq 'Conformance'}selected{/if}>Conformance</option>
                                                                                    <option value="Non Conformance" {if $item1.conformity1 eq 'Non Conformance'}selected{/if}>Non Conformance</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--NC Category -->
                                                                            <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                <select class="severity_level vd_bg-white" name="uvms_severity_level1[]" title="Select Severity Level" style="padding-bottom:7px !important;">
                                                                                    <option value="">Select Severity Level</option>
                                                                                    <option class="conformance_opt" {if $item1.conformity1 eq 'Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Good Observation-100" {if $item1.severity_level1 eq 'Good Observation'}selected{/if}>Good Observation [100%]</option>
                                                                                    <option class="conformance_opt" {if $item1.conformity1 eq 'Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Expected Standard-100" {if $item1.severity_level1 eq 'Expected Standard'}selected{/if}>Expected Standard [100%]</option>
                                                                                    <option class="non_conformance_opt" {if $item1.conformity1 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Major NC-0" {if $item1.severity_level1 eq 'Major NC'}selected{/if}>Major NC [0%]</option>
                                                                                    <option class="non_conformance_opt" {if $item1.conformity1 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Minor NC-50" {if $item1.severity_level1 eq 'Minor NC'}selected{/if} >Minor NC [50%]</option>
                                                                                    <option class="non_conformance_opt" {if $item1.conformity1 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="OFI-90" {if $item1.severity_level1 eq 'OFI'}selected{/if}>OFI [90%]</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-1 btn-group pd-0"  style="margin-top:-5px;">
                                                                                <input type="number" class="observation_score text-center" id="observation_score_{$key}_{$key1}" name="uvms_observation_score1[]" max="{$item1.score}" placeholder="0" title="Enter Valid Score" value="{$item1.score1}" readonly>
                                                                            </div>
                                                                            <!--Action To Be Taken Category -->
                                                                            <textarea rows="3" class="nc_action" name="uvms_nc_action1[]" title="Enter Action To Be Taken" placeholder="Action To Be Taken" {if !$item1.conformity1}style="display:none;"{/if}>{$item1.just_action_to_be_taken}</textarea>
                                                                        </td>
                                                                <input type="hidden" class="sub_category_score" value="{$item1.score}">
                                                                </tr>
                                                                <input type="hidden" name="sub_category_object_id[]" value="{$item1.object_id}">
                                                            {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {/foreach}
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Update Audit Obervation">
                                                <input type="hidden" id="observation_submit_type">
                                                <button class="btn vd_bg-blue vd_white" type="submit" id="save_observation" name="save"><span class="menu-icon"><i class="fa fa-fw fa-save"></i></span> Save</button>
                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_observation" name="complete"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Complete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {if !empty($recall_audit_findings_review1_btn)}
                {include file="templates/common/recall.tpl"}
            {/if}
            {if !empty($show_audit_findings_review1_btn)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">AUDIT FINDINGS REVIEW1 FORM</h3>
                                </div>
                                <div class="panel widget light-widget">
                                    <div class="panel-body panel widget panel-bd-left light-widget">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <span class="font-semibold text-uppercase vd_grey h5"><i class="append-icon glyphicon glyphicon-eye-open"></i>Audit Findings</span>
                                            {foreach item=item key=key from=$vm_agenda_list}
                                                <table class="table table-bordered input-border mgbt-md-20">
                                                    <tbody>
                                                        <tr class="lm_grey">
                                                            <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                            <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}]</td>
                                                        </tr>
                                                        <tr class="font-semibold">
                                                            <td colspan="2">{attribute_name module="vms" attribute="sub_category"}<span class="pull-right"><i class="append-icon fa fa-star"></i><b> Audit Score </b>: {$item.sub_category_score1_total}/{$item.category_score}</span></td></td>
                                                        </tr>
                                                        {foreach item=item1 key=key1 from=$item.sub_category}
                                                            <tr>
                                                                <td>{$key1+1}</td>
                                                                <td class="lm_grey">
                                                                    <div class="col-md-12 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white unset_min_height">
                                                                            <span class="pull-right"><b><i class="append-icon fa fa-star"></i>Score Weightage : </b>{$item1.score}</span>
                                                                            <b><i class="append-icon fa fa-fw fa-sitemap"></i></b> 
                                                                            {$item1.sub_category_name} | <i class="append-icon fa fa-fw fa-flickr text-center"></i>Classificaton : </b>{$item1.classification_name}
                                                                        </div>
                                                                    </div>
                                                                    <!-- NC 1 -->
                                                                    <div class="col-md-3 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 1</div>
                                                                            <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                            <div class="mgtp-20">
                                                                                <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                <br><br>
                                                                                <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                <br><br>
                                                                                <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}/{$item1.score}
                                                                                <br><br><br>
                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                    <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                </button>
                                                                            </div>                                                                       
                                                                        </div>                                                                       
                                                                    </div>
                                                                    <div class="col-md-9 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>:
                                                                            <br>{display_if_null var=$item1.observation}  
                                                                            <br><br>
                                                                            <b>
                                                                                {if $item1.conformity1 eq 'Conformance'}
                                                                                    <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                {else}
                                                                                    <i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                {/if}: 
                                                                            </b>
                                                                            <br>{display_if_null var=$item1.just_action_to_be_taken}
                                                                            <br><br>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        {/foreach}
                                                    </tbody>
                                                </table>
                                            {/foreach}
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 row">
                                                <label class="control-label">{attribute_name module="vms" attribute="review_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" name="select_audit_findings_review1" required title="Select Valid Review Type" data-hide_forms="audit_findings_review1_div">
                                                        <option value="">Select</option>
                                                        <option value="audit_findings_review1_div">Review</option>
                                                        <option value="audit_findings_review1_need_correction_div">Needs Correction</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel widget light-widget audit_findings_review1_div" id="audit_findings_review1_div" style="display:none;">
                                        <form name="audit_findings_review1-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="audit_findings_review1-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label">{attribute_name module="vms" attribute="review_comments"} <span class="vd_red">*</span></label>
                                                            <div  class="controls  ">
                                                                <textarea placeholder="(e.g.) Reviewed" rows="4" class="required" name="audit_findings_review1_comments" id="audit_findings_review1_comments" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                {include file ="pass_auth.tpl"}
                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="audit_findings_reviewed1">
                                                        <input type="hidden" name="audit_trail_action" value="Audit Findings Review1">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_reviewed1"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="panel widget light-widget audit_findings_review1_div" id="audit_findings_review1_need_correction_div" style="display:none;">
                                        <form name="audit_findings_review1_need_correction-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="audit_findings_review1_need_correction-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label">{attribute_name module="vms" attribute="remarks"} <span class="vd_red">*</span></label>
                                                            <div  class="controls  ">
                                                                <textarea placeholder="(e.g.) Kindly provide your comments" rows="4" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                {include file ="pass_auth.tpl"}
                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="audit_findings_review1_need_correction">
                                                        <input type="hidden" name="audit_trail_action" value="Audit Findings Review1">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_review1_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span>Needs Correction</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($recall_audit_findings_review2_btn)}
                {include file="templates/common/recall.tpl"}
            {/if}
            {if !empty($show_audit_findings_review2_btn)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">AUDIT FINDINGS REVIEW2 FORM</h3>
                                </div>
                                <div class="panel widget light-widget">
                                    <div class="panel-body panel widget panel-bd-left light-widget">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <span class="font-semibold text-uppercase vd_grey h5"><i class="append-icon glyphicon glyphicon-eye-open"></i>Audit Findings</span>
                                            {foreach item=item key=key from=$vm_agenda_list}
                                                <table class="table table-bordered input-border mgbt-md-20">
                                                    <tbody>
                                                        <tr class="lm_grey">
                                                            <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                            <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}] [{$item.sub_category_score1_total}]</td>
                                                        </tr>
                                                        <tr class="font-semibold">
                                                            <td colspan="2">{attribute_name module="vms" attribute="sub_category"}</td>
                                                        </tr>
                                                        {foreach item=item1 key=key1 from=$item.sub_category}
                                                            <tr>
                                                                <td>{$key1+1}</td>
                                                                <td class="lm_grey">
                                                                    <div class="col-md-12 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white unset_min_height">
                                                                            <span class="pull-right"><b>Score Weightage : </b>[{$item1.score}]</span>
                                                                            <b><i class="append-icon fa fa-fw fa-sitemap"></i></b> 
                                                                            {$item1.sub_category_name} | <i class="append-icon fa fa-fw fa-flickr text-center"></i>Classificaton : </b>{$item1.classification_name}
                                                                        </div>
                                                                    </div>
                                                                    <!-- NC 1 -->
                                                                    <div class="col-md-3 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 1</div>
                                                                            <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                            <div class="mgtp-20">
                                                                                <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                <br><br>
                                                                                <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                <br><br>
                                                                                <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}
                                                                                <br><br><br>
                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                    <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                </button>
                                                                            </div>                                                                       
                                                                        </div>                                                                       
                                                                    </div>
                                                                    <!-- NC 2 -->
                                                                    {if $item1.conformity1 eq 'Conformance'}
                                                                        <div class="col-md-3 pd-0">
                                                                            <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                                <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                <div class="mgtp-20">
                                                                                    <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                    <br><br>
                                                                                    <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                    <br><br>
                                                                                    <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}
                                                                                    <br><br><br>
                                                                                    <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                        <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                    </button>
                                                                                </div>                                                                       
                                                                            </div>                                                                       
                                                                        </div>
                                                                    {else}
                                                                        <div class="col-md-3 pd-0">
                                                                            <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                <div class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                                <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                <div class="mgtp-20">
                                                                                    <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity2}  {if $item1.conformity2 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                    <br><br>
                                                                                    <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level2}
                                                                                    <br><br>
                                                                                    <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score2}
                                                                                    <br><br><br>
                                                                                    <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_feedback)}' data-can_delete=false>
                                                                                        <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_feedback|@count}</span> Attachemnts
                                                                                    </button>
                                                                                </div>                                                                       
                                                                            </div>                                                                       
                                                                        </div>
                                                                    {/if}
                                                                    <div class="col-md-6 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>:
                                                                            <br>{display_if_null var=$item1.observation}  
                                                                            <br><br>
                                                                            <b>
                                                                                {if $item1.conformity1 eq 'Conformance'}
                                                                                    <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                {else}
                                                                                    <i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                {/if}: 
                                                                            </b>
                                                                            <br>{display_if_null var=$item1.just_action_to_be_taken}
                                                                            <br><br>
                                                                            {if $item1.conformity1 eq 'Non Conformance'}
                                                                                <b><i class="append-icon fa fa-shopping-cart"></i>Vendor Comments</b>:
                                                                                <br>{display_if_null var=$item1.vendor_comments}  
                                                                            {/if}
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        {/foreach}
                                                    </tbody>
                                                </table>
                                            {/foreach}
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 row">
                                                <label class="control-label">{attribute_name module="vms" attribute="review_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" name="select_audit_findings_review1" required title="Select Valid Review Type" data-hide_forms="audit_findings_review1_div">
                                                        <option value="">Select</option>
                                                        <option value="audit_findings_review1_div">Review</option>
                                                        <option value="audit_findings_review1_need_correction_div">Needs Correction</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel widget light-widget audit_findings_review1_div" id="audit_findings_review1_div" style="display:none;">
                                        <form name="audit_findings_review2-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="audit_findings_review2-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label">{attribute_name module="vms" attribute="review_comments"} <span class="vd_red">*</span></label>
                                                            <div  class="controls  ">
                                                                <textarea placeholder="(e.g.) Reviewed" rows="4" class="required" name="audit_findings_review2_comments" id="audit_findings_review2_comments" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                {include file ="pass_auth.tpl"}
                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="audit_findings_reviewed2">
                                                        <input type="hidden" name="audit_trail_action" value="Audit Findings Review2">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_reviewed2"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="panel widget light-widget audit_findings_review1_div" id="audit_findings_review1_need_correction_div" style="display:none;">
                                        <form name="audit_findings_review2_need_correction-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="audit_findings_review2_need_correction-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label">{attribute_name module="vms" attribute="remarks"} <span class="vd_red">*</span></label>
                                                            <div  class="controls  ">
                                                                <textarea placeholder="(e.g.) Kindly provide your comments" rows="4" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                {include file ="pass_auth.tpl"}
                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="audit_findings_review2_need_correction">
                                                        <input type="hidden" name="audit_trail_action" value="Audit Findings Review2">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_review2_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span>Needs Correction</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_send_report_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_send_report_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_send_report_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">SEND AUDIT REPORT FORM</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="send_audit_report-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="send_audit_report-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                {if $vm_master_obj->vendor_status neq "Qualified"}
                                                    <div class="col-md-3">
                                                        <label class="control-label">{attribute_name module="vms" attribute="target_date"} <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="generate_datepicker" name="uvms_target_date" title="Select Valid Date" data-datepicker_min=0>
                                                        </div>
                                                    </div>
                                                {/if}
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="vms" attribute="audit_findings"}</label>
                                                    <div class="controls">
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">View Report</option>
                                                            <option value="index.php?module=file&action=vendor_audit_report_file&object_id={$vm_master_obj->vm_object_id}&op_type=d">Audit Report [A4-L]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {if $vm_master_obj->vendor_status eq "Qualified"}
                                                    <div class="col-md-3">
                                                        <label class="control-label">{attribute_name module="vms" attribute="certificate"}</label>
                                                        <div class="controls">
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">View Certificate</option>
                                                                <option value="index.php?module=file&action=vendor_certificate_file&object_id={$vm_master_obj->vm_object_id}&op_type=d">Certificate</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                {/if}
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label">{attribute_name module="vms" attribute="message"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="Message" rows="4" name="uvms_message" title="Enter Valid Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-info">
                                                <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>Note !</strong> Audit Report will be sent to Auditors and Auditees.
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Send Audit Report">
                                                <input type="hidden" name="send_audit_report">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="send_audit_report"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_update_observation_feedback_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_observation_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_observation_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget"> <div class="panel-heading bordered vd_bg-blue"> <h3 class="panel-title vd_white font-semibold">AUDIT FINDINGS COMPLETION DETAILS</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="update_audit_observation_feedback-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_audit_observation_feedback-form" autocomplete="off" enctype="multipart/form-data">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12  mgtp-10">
                                                    {foreach item=item key=key from=$vm_agenda_list}
                                                        <table class="table table-bordered input-border mgbt-md-20">
                                                            <tbody>
                                                                <tr class="lm_grey">
                                                                    <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                                    <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}] [{$item.sub_category_score1_total}]</td>
                                                                </tr>
                                                                <tr class="font-semibold">
                                                                    <td colspan="2">{attribute_name module="vms" attribute="sub_category"}<span class="pull-right"><i class="append-icon fa fa-star"></i><b> Audit Score </b>: {$item.sub_category_score1_total}/{$item.category_score}</span></td></td>
                                                                </tr>
                                                                {foreach item=item1 key=key1 from=$item.sub_category}
                                                                    <tr>
                                                                        <td>{$key1+1}</td>
                                                                        <td {if $item1.conformity1 eq 'Non Conformance'}class="bg-info"{/if}>
                                                                            <div class="col-md-12 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white unset_min_height">
                                                                                    <span class="pull-right"><b>Score Weightage : </b>{$item1.score}</span>
                                                                                    <b><i class="append-icon fa fa-fw fa-sitemap"></i></b> {$item1.sub_category_name} 
                                                                                    <br><br><i class="append-icon fa fa-fw fa-flickr text-center"></i>Classificaton : </b>{$item1.classification_name}
                                                                                </div>
                                                                            </div>
                                                                            <!-- NC 1 -->
                                                                            <div class="col-md-3 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                    <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 1</div>
                                                                                    <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                                    <div class="mgtp-20">
                                                                                        <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                        <br><br>
                                                                                        <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}/{$item1.score}
                                                                                        <br><br><br>
                                                                                        <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                            <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                        </button>
                                                                                    </div>                                                                       
                                                                                </div>                                                                       
                                                                            </div>
                                                                            <div class="col-md-9 pd-0">
                                                                                <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                    <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>:
                                                                                    <br>{display_if_null var=$item1.observation}  
                                                                                    <br><br>
                                                                                    <b>
                                                                                        {if $item1.conformity1 eq 'Conformance'}
                                                                                            <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                        {else}
                                                                                            <i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                        {/if}: 
                                                                                    </b>
                                                                                    <br>{display_if_null var=$item1.just_action_to_be_taken}
                                                                                    <br><br>
                                                                                </div>
                                                                            </div>
                                                                            {if $item1.conformity1 eq 'Non Conformance'}
                                                                                <!-- Observation -->
                                                                                <textarea rows="3" class="audit_observation" name="uvms_vendor_comments[]" title="Enter Vendor Comments" placeholder="Vendor Comments Comments">{$item1.vendor_comments}</textarea>
                                                                                <!-- attachment -->
                                                                                <div class="col-md-5 pd-0" style="margin-top:-5px;">
                                                                                    <input class="vd_bg-white" type="file" name="file[{$item1.object_id}][]" multiple class="pd-5">
                                                                                </div>
                                                                                <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                    <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_feedback)}' data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_feedback|@count}</span></button>
                                                                                </div>
                                                                                <!--NC -->
                                                                                <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                    <select class="audit_conformity vd_bg-white" name="uvms_conformity2[]" title="Select Conformity" style="padding-bottom:7px !important;">
                                                                                        <option value="">Select Conformity</option>
                                                                                        <option value="Conformance" {if $item1.conformity2 eq 'Conformance'}selected{/if}>Conformance</option>
                                                                                        <option value="Non Conformance" {if $item1.conformity2 eq 'Non Conformance'}selected{/if}>Non Conformance</option>
                                                                                    </select>
                                                                                </div>
                                                                                <!--NC Category -->
                                                                                <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                    <select class="severity_level vd_bg-white" name="uvms_severity_level2[]" title="Select Severity Level" style="padding-bottom:7px !important;">
                                                                                        <option value="">Select Severity Level</option>
                                                                                        <option class="conformance_opt" {if $item1.conformity2 eq 'Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Good Observation-100" {if $item1.severity_level2 eq 'Good Observation'}selected{/if}>Good Observation [100%]</option>
                                                                                        <option class="conformance_opt" {if $item1.conformity2 eq 'Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Expected Standard-100" {if $item1.severity_level2 eq 'Expected Standard'}selected{/if}>Expected Standard [100%]</option>
                                                                                        <option class="non_conformance_opt" {if $item1.conformity2 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Major NC-0" {if $item1.severity_level2 eq 'Major NC'}selected{/if}>Major NC [0%]</option>
                                                                                        <option class="non_conformance_opt" {if $item1.conformity2 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="Minor NC-50" {if $item1.severity_level2 eq 'Minor NC'}selected{/if} >Minor NC [50%]</option>
                                                                                        <option class="non_conformance_opt" {if $item1.conformity2 eq 'Non Conformance'}style="display:block;"{else}style="display:none;"{/if} value="OFI-90" {if $item1.severity_level2 eq 'OFI'}selected{/if}>OFI [90%]</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-1 btn-group pd-0"  style="margin-top:-5px;">
                                                                                    <input type="number" class="observation_score text-center" id="observation_score_{$key}_{$key1}" name="uvms_observation_score2[]" max="{$item1.score2}" placeholder="0" title="Enter Valid Score" value="{$item1.score2}" readonly>
                                                                                </div>
                                                                            {else}
                                                                                <input type="text" name="uvms_vendor_comments[]" value="">
                                                                                <input type="hidden" name="uvms_conformity2[]" value="{$item1.conformity1}">
                                                                                <input type="hidden" name="uvms_severity_level2[]" value="{$item1.severity_level1}-100">
                                                                                <input type="hidden" name="uvms_observation_score2[]" value="{$item1.score1}">
                                                                            {/if}
                                                                            <input type="hidden" name="sub_category_object_id[]" value="{$item1.object_id}">
                                                                        </td>
                                                                <input type="hidden" class="sub_category_score" value="{$item1.score}">
                                                                </tr>
                                                            {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {/foreach}
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Update Audit Finding Completion">
                                                <input type="hidden" id="observation_feedback_submit_type">
                                                <button class="btn vd_bg-blue vd_white" type="submit" id="save_observation_feedback" name="save"><span class="menu-icon"><i class="fa fa-fw fa-save"></i></span> Save</button>
                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_observation_feedback" name="complete"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Complete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_send_ack_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_send_ack_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_send_ack_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">SEND TO ACKNOWLEDGEMENT FORM</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="request_acknowledgement-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_acknowledgement-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                                    <div class="controls">
                                                        <select name="plant" onchange="get_access_rights_dept_list('{$vm_master_obj->vm_object_id}', this.options[this.selectedIndex].value, '', 'yes', '#ack_dept');" title="Select Valid Plant">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$ar_plant_list}
                                                                <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mgl-10">
                                                    <label class="control-label">{attribute_name module="dms" attribute="department"}</label>
                                                    <div class="controls">
                                                        <select name="department" id="ack_dept"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#ack_users', 'multiselect');" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label">{attribute_name module="dms" attribute="user_name"}<span class="vd_red">*</span> </label>
                                                    <div class="controls">
                                                        <div class="col-md-3 pd-0">
                                                            <select id="ack_users" class="generate_multiselect form-control" size="7" multiple="multiple"></select>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br>
                                                            <button type="button" id="ack_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                            <button type="button" id="ack_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                            <button type="button" id="ack_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                            <button type="button" id="ack_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                        </div>
                                                        <div class="col-md-3 pd-0">
                                                            <select name="ack_users[]" id="ack_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-7">
                                                    <label class="control-label">{attribute_name module="dms" attribute="remarks"} <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Kindly provide your comments" rows="2" class="required" name="wf_remarks" id="wf_remarks" required  title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="request_acknowledegment">
                                                <input type="hidden" name="audit_trail_action" value="Send To Acknowledgement">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="request_acknowledgement"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_ack_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_send_ack_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_send_ack_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">ACKNOWLEDGEMENT FORM</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <h5><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-eye-open"></i>Audit Findings</span></h5>
                                        {foreach item=item key=key from=$vm_agenda_list}
                                            <table class="table table-bordered input-border mgbt-md-20">
                                                <tbody>
                                                    <tr class="lm_grey">
                                                        <td><span class="badge vd_bg-green">{$key+1}</span></td>
                                                        <td class="font-semibold" colspan="8">{$item.category_name} [{$item.category_score}] [{$item.sub_category_score1_total}]</td>
                                                    </tr>
                                                    <tr class="font-semibold">
                                                        <td colspan="2">{attribute_name module="vms" attribute="sub_category"}</td>
                                                    </tr>
                                                    {foreach item=item1 key=key1 from=$item.sub_category}
                                                        <tr>
                                                            <td>{$key1+1}</td>
                                                            <td class="lm_grey">
                                                                <div class="col-md-12 pd-0">
                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white unset_min_height">
                                                                        <span class="pull-right"><b>Score Weightage : </b>[{$item1.score}]</span>
                                                                        <b><i class="append-icon fa fa-fw fa-sitemap"></i></b> 
                                                                        {$item1.sub_category_name} | <i class="append-icon fa fa-fw fa-flickr text-center"></i>Classificaton : </b>{$item1.classification_name}
                                                                    </div>
                                                                </div>
                                                                <!-- NC 1 -->
                                                                <div class="col-md-3 pd-0">
                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                        <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 1</div>
                                                                        <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                        <div class="mgtp-20">
                                                                            <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                            <br><br>
                                                                            <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                            <br><br>
                                                                            <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}
                                                                            <br><br><br>
                                                                            <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                            </button>
                                                                        </div>                                                                       
                                                                    </div>                                                                       
                                                                </div>
                                                                <!-- NC 2 -->
                                                                {if $item1.conformity1 eq 'Conformance'}
                                                                    <div class="col-md-3 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <div  class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                            <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                            <div class="mgtp-20">
                                                                                <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity1}  {if $item1.conformity1 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                <br><br>
                                                                                <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level1}
                                                                                <br><br>
                                                                                <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score1}
                                                                                <br><br><br>
                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                    <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                </button>
                                                                            </div>                                                                       
                                                                        </div>                                                                       
                                                                    </div>
                                                                {else}
                                                                    <div class="col-md-3 pd-0">
                                                                        <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                            <div class="font-semibold"><i class="append-icon fa fa-search"></i> Audit finding review 2</div>
                                                                            <hr class="mgtp-10 mgbt-md-10" style="border-top:solid black 1px;">
                                                                            <div class="mgtp-20">
                                                                                <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: {$item1.conformity2}  {if $item1.conformity2 eq 'Conformance'}<i class="append-icon fa fa-fw fa-check-circle vd_green"></i>{else}<i class="append-icon append-icon icon-cross2 vd_red"></i>{/if}
                                                                                <br><br>
                                                                                <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: {$item1.severity_level2}
                                                                                <br><br>
                                                                                <i class="append-icon fa fa-star"></i><b>Scored </b>: {$item1.score2}
                                                                                <br><br><br>
                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='{json_encode($item1.attachments_observe)}' data-can_delete=false>
                                                                                    <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue">{$item1.attachments_observe|@count}</span> Attachemnts
                                                                                </button>
                                                                            </div>                                                                       
                                                                        </div>                                                                       
                                                                    </div>
                                                                {/if}
                                                                <div class="col-md-6 pd-0">
                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                        <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>:
                                                                        <br>{display_if_null var=$item1.observation}  
                                                                        <br><br>
                                                                        <b>
                                                                            {if $item1.conformity1 eq 'Conformance'}
                                                                                <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                            {else}
                                                                                <i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                            {/if}: 
                                                                        </b>
                                                                        <br>{display_if_null var=$item1.just_action_to_be_taken}
                                                                        <br><br>
                                                                        {if $item1.conformity1 eq 'Conformance'}
                                                                            <b><i class="append-icon fa fa-shopping-cart"></i>Vendor Comments</b>:
                                                                            <br>{display_if_null var=$item1.vendor_comments}  
                                                                        {/if}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        {/foreach}
                                        <form name="acknowledgement-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="acknowledgement-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="alert alert-info"> 
                                                        <div class="vd_checkbox checkbox-danger">
                                                            <input type="checkbox" value="1" id="ack_checkbox">
                                                            <label for="ack_checkbox">
                                                                {if $vm_master_obj->vendor_status eq 'Qualified'}
                                                                    I acknowledge that this vendor has been reviewed and accepted/qualified. We will continue to engage with and utilize their services, if required, in accordance with our established agreements and standards.
                                                                {else}
                                                                    I acknowledge that this vendor has been reviewed and subsequently rejected / disqualified. As a result, we will not proceed with purchasing from or utilizing their services any further.
                                                                {/if}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="acknowledged">
                                                <input type="hidden" name="audit_trail_action" value="Acknowledgement">
                                                <button class="btn vd_bg-green vd_white ack_btn" type="submit" id="acknowledeged" disabled><span class="menu-icon"><i class="append-icon fa fa-fw fa-thumbs-o-up"></i></span>Acknowledge</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($recall_ack_button)}
                {include file="templates/common/recall.tpl"}
            {/if}
            {if !empty($cancel_button)}
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_cancel_button"> Cancel <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_cancel_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">CANCEL FORM</h3></div>
                                    <div class="panel-body panel-bd-left">
                                        <!--Cancel Form -->
                                        <form name="request_cancel-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_cancel-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label">{attribute_name module="admin" attribute="reason"}<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Min 3 - Max 500" rows="3" class="width-100 required" name="wf_remarks" id="wf_remarks"  required title="Enter Valid Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Cancel">
                                                <input type="hidden" name="submit_request_cancel">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="request_cancel"><span class="menu-icon"><i class="fa fa-fw fa-times"></i></span> Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_info_tab_info)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#acc_info_tab"> Information Tab <i class="fa fa-exclamation-circle vd_red vd_white"></i></a> </h4>
                    </div>
                    <div id="acc_info_tab" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="alert alert-warning alert-dismissable alert-condensed">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                <i class="fa fa-exclamation-triangle append-icon"></i><strong>Information: </strong> {$show_info_tab_info}
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </div>
</div>
<!-- Start Of Audit Attachments Modal -->
<div class="modal fade" id="modal_audit_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Audit Attachments <span class="show_audit_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped table-hover show_audit_attachments_table">
                    <thead>
                        <tr>
                            <th>{attribute_name module="file" attribute="name"}</th>
                            <th>{attribute_name module="file" attribute="size"}</th>
                            <th>{attribute_name module="file" attribute="attached_by"}</th>
                            <th>{attribute_name module="file" attribute="date"}</th>
                            <th class="show_audit_attachments_action">{attribute_name module="admin" attribute="action"}</th>
                        </tr>
                    </thead>
                    <tbody class="show_audit_attachments_tbody"></tbody>
                </table>
                <div class="alert alert-danger alert-dismissable alert-condensed no_attachments mgbt-md-0" style="display:none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                    <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                </div>
            </div>
            <div class="modal-footer background-login"></div>
        </div>
    </div>
</div>
<!-- End Of Task Attachments Modal -->
{include file="templates/worklist_pending_details.tpl"}
{literal}
    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="vendors/dropzone/js/dropzone.js"></script>
    <script src="vendors/custom_lm/file_upload/all_file_upload.js"></script>
    <script>
                                                            $(document).ready(function () {
                                                                notification("topright", "success", "fa fa-info-circle vd_blue", "Status", `${$("#status").val()} - [${$("#wf_status").val()}]`);
                                                                "use strict";
                                                                //Update Audit Schedule
                                                                $('#update_audit_schedule-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        uvms_plant_id: {
                                                                            required: true
                                                                        },
                                                                        uvms_audit_from_date: {
                                                                            required: true
                                                                        },
                                                                        uvms_audit_to_date: {
                                                                            required: true
                                                                        },
                                                                        uvms_scope: {
                                                                            required: true
                                                                        },
                                                                        uvms_objectives: {
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#update_audit_schedule-form')).fadeIn(500);
                                                                        scrollTo($('#update_audit_schedule-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (lm_validate.array_of_input([".agenda_sub_cat@", ".score@"])) {
                                                                            $('#update_audit_schedule').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                });
                                                                //Category Score
                                                                $(document).on('input', '.score', () => update_total_cat_score());
                                                                $(document).on("click", ".select_agenda,.select_agenda_all", function () {
                                                                    update_total_cat_score();
                                                                    if ($(this).is(':checked')) {
                                                                        lm_dom.find_in_parent(this, 'tr', '.cmn_ed').removeAttr("disabled");
                                                                        if ($(this).hasClass("select_agenda_all")) {
                                                                            lm_dom.find_in_parent(this, 'form', '.cmn_ed').removeAttr("disabled").val("").val(null).trigger('change');
                                                                            lm_dom.find_in_parent(this, 'form', '.select_agenda').prop("checked", true);
                                                                        }
                                                                    } else {
                                                                        lm_dom.find_in_parent(this, 'tr', '.cmn_ed').prop("disabled", true).val("").trigger('change');
                                                                        if ($(this).hasClass("select_agenda_all")) {
                                                                            lm_dom.find_in_parent(this, 'form', '.cmn_ed').attr("disabled", true).val("").trigger('change');
                                                                            lm_dom.find_in_parent(this, 'form', '.select_agenda').prop("checked", false);
                                                                        }
                                                                    }
                                                                });
                                                                function update_total_cat_score() {
                                                                    let total_score = 0;
                                                                    $(lm_dom.find_in_parent(".select_agenda:checked", 'tr', ".score")).each((i, val) => total_score += Number($(val).val()));
                                                                    $(".total_score").html(total_score);
                                                                    if (total_score !== 100) {
                                                                        $(".total_score").closest("td").css('background-color', '#f85d2c');
                                                                        $("#update_audit_schedule").prop("disabled", true);
                                                                    } else {
                                                                        $(".total_score").closest("td").css('background-color', '#ffffff');
                                                                        $("#update_audit_schedule").removeAttr("disabled");
                                                                    }
                                                                }
                                                                //Add More Plan
                                                                $(document).on("click", ".add_more_plan", function () {
                                                                    add_element('.add_audit_plan_child_ele', '.add_audit_plan_parent_ele');
                                                                    $.each([".audit_plan_date", ".audit_plan_from_time", ".audit_plan_to_time", ".audit_plan"], (_, ele) => lm_dom.assign_unique_attr_val(ele, "id"));
                                                                    lm_dom.re_initialize();
                                                                });
                                                                //$(document).on("change", ".audit_plan_to_time", function () {
                                                                //   alert($(this).val());
                                                                // alert(lm_dom.find_in_parent(this, 'tr', '.audit_plan_from_time').val());
                                                                // if ($(this).val() < lm_dom.find_in_parent(this, 'tr', '.audit_plan_from_time').val()) {
                                                                //     show_notification("i", 'topright', "Time (To)  cannot be less than Time (From) ");
                                                                //$(this).val("");
                                                                // }
                                                                //  });
                                                                //Edit Audit Plan Form Validation
                                                                $('#update_audit_plan-form').validate({
                                                                    submitHandler: function (form) {
                                                                        if (lm_validate.array_of_input([".audit_plan_date@", ".audit_plan_from_time@", ".audit_plan_to_time@", ".audit_plan@"])) {
                                                                            $('#update_audit_plan').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                });
                                                                //Update Score & Risk Form Validation
                                                                $('#update_sub_cat_score_risk-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#update_sub_cat_score_risk-form')).fadeIn(500);
                                                                        scrollTo($('#update_sub_cat_score_risk-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (lm_validate.array_of_input([".risk_category@", ".update_sub_cat_score@"]) && !$(form).find(".Invalid_total").length) {
                                                                            $('#update_sub_cat_score_risk').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                });
                                                                //Sub Category Score
                                                                $(document).on('input', '.update_sub_cat_score', function () {
                                                                    let total_score = 0;
                                                                    $(lm_dom.find_in_parent(this, 'table', ".update_sub_cat_score")).each((i, val) => total_score += Number($(val).val()));
                                                                    $(lm_dom.find_in_parent(this, 'table', ".total_score")).html(total_score);
                                                                    if (total_score !== Number($(lm_dom.find_in_parent(this, 'table', ".max_score")).val())) {
                                                                        $(lm_dom.find_in_parent(this, 'table', ".total_score")).closest("td").css('background-color', '#f85d2c').addClass("Invalid_total");
                                                                        $(lm_dom.find_in_parent(this, 'form', ".update_btn")).prop("disabled", true)
                                                                    } else {
                                                                        $(lm_dom.find_in_parent(this, 'table', ".total_score")).css('background-color', '#ffffff').removeClass("Invalid_total");
                                                                        $(lm_dom.find_in_parent(this, 'form', ".update_btn")).removeAttr("disabled");
                                                                    }
                                                                });
                                                                //Update Auditors
                                                                $('#update_auditors-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        'uvms_auditors[]': {
                                                                            required: true
                                                                        },
                                                                        uvms_audit_lead: {
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#update_auditors-form')).fadeIn(500);
                                                                        scrollTo($('#update_auditors-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (!lm_validate.is_duplicate_value_exists_in_array($("#uvms_auditors_users_to").val(), $("#uvms_auditors_users_to"))) {
                                                                            return false;
                                                                        }
                                                                        $('#update_auditors').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                //Update Auditees
                                                                $('#update_auditees-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#update_auditees-form')).fadeIn(500);
                                                                        scrollTo($('#update_auditees-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (lm_validate.array_of_input([".auditee_name@", ".auditee_email@", ".auditee_contact@"])) {
                                                                            $('#update_auditees').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                });
                                                                // Request QA Approver Form Validation
                                                                $('#request_qa_approval-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        plant: {
                                                                            required: true
                                                                        },
                                                                        department: {
                                                                            required: true
                                                                        },
                                                                        qa_approver_user: {
                                                                            required: true
                                                                        },
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#request_qa_approval-form')).fadeIn(500);
                                                                        scrollTo($('#request_qa_approval-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#request_qa_approval').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    },
                                                                });
                                                                //QA Approval Need Correction Form
                                                                $('#qa_approval_need_correction-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    rules: {
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true,
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#qa_approval_need_correction-form')).fadeIn(500);
                                                                        scrollTo($('#qa_approval_need_correction-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#qa_approval_need_correction').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                //QA Accepted form
                                                                $('#qa_accepted-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: ":hidden", // Ensures hidden fields are ignored
                                                                    rules: {
                                                                        qa_approve_comments: {
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#qa_accepted-form')).fadeIn(500);
                                                                        scrollTo($('#qa_accepted-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#qa_accepeted').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                //Assigm Myself Audit
                                                                $(document).on("click", ".audit_myself", (e) => ($(e.target).is(':checked')) ? lm_dom.find_in_parent(e.target, 'tr', '.uvms_assign_auditors').prop("disabled", true).val("") : lm_dom.find_in_parent(e.target, 'tr', '.uvms_assign_auditors').removeAttr("disabled"));
                                                                //Assign Auditors Form
                                                                $('#assign_auditors-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#assign_auditors-form')).fadeIn(500);
                                                                        scrollTo($('#assign_auditors-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (lm_validate.array_of_input([".uvms_assign_auditors@", ".update_sub_cat_score@"])) {
                                                                            $('#assign_auditors').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                });
                                                                //Update Audit Observation Form
                                                                $('#update_audit_observation-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#update_audit_observation-form')).fadeIn(500);
                                                                        scrollTo($('#update_audit_observation-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        if (!$(form).find(".invalid_score").length) {
                                                                            var type = event.submitter.name;
                                                                            //Save Observation
                                                                            if (type === "save") {
                                                                                $('#save_observation,#update_observation').attr("disabled", true);
                                                                                $("#observation_submit_type").attr("name", "save_observation");
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                            //Observation Complete
                                                                            else if (type === "complete") {
                                                                                if (lm_validate.array_of_input([".audit_observation@", ".audit_conformity@", ".severity_level@", ".observation_score@", ".action_required@"])) {
                                                                                    $('#save_observation,#update_observation').attr("disabled", true);
                                                                                    $("#observation_submit_type").attr("name", "complete_observation");
                                                                                    loading.show();
                                                                                    form.submit();
                                                                                }
                                                                            }
                                                                        } else {
                                                                            show_notification("e", 'topright', "Enter Valid Score");
                                                                        }
                                                                    }
                                                                });
                                                                $(document).on('input', '.observation_score', function () {
                                                                    if (Number($(this).val()) > Number(lm_dom.find_in_parent(this, 'tr', ".default_score").val()) || Number($(this).val()) < 0) {
                                                                        $(this).addClass("invalid_score");
                                                                    } else {
                                                                        $(this).removeClass("invalid_score");
                                                                    }
                                                                });
                                                                $(document).on('change', '.severity_level', function () {
                                                                    if ($(this).val()) {
                                                                        let conformnace_type = $(this).val().split("-")[0];
                                                                        lm_dom.find_in_parent(this, 'tr', '.nc_action').show().removeAttr("disabled").val("");
                                                                        (conformnace_type === "Good Observation" || conformnace_type === "Expected Standard") ? lm_dom.find_in_parent(this, 'tr', '.nc_action').attr('placeholder', 'Justification').removeClass("action") : lm_dom.find_in_parent(this, 'tr', '.nc_action').attr('placeholder', 'Action To Be Taken *').addClass("action_required");

                                                                        lm_dom.find_in_parent(this, 'td', '.observation_score').val("");
                                                                        let cat_score = Number(lm_dom.find_in_parent(this, 'tr', '.sub_category_score').val());
                                                                        (conformnace_type === "Good Observation" || conformnace_type === "Expected Standard") ? lm_dom.find_in_parent(this, 'td', '.observation_score').val(cat_score * 100 / 100) : null;
                                                                        (conformnace_type === "Major NC") ? lm_dom.find_in_parent(this, 'td', '.observation_score').val(cat_score * 0 / 100) : null;
                                                                        (conformnace_type === "Minor NC") ? lm_dom.find_in_parent(this, 'td', '.observation_score').val(cat_score * 50 / 100) : null;
                                                                        (conformnace_type === "OFI") ? lm_dom.find_in_parent(this, 'td', '.observation_score').val(cat_score * 90 / 100) : null;
                                                                    } else {
                                                                        lm_dom.find_in_parent(this, 'tr', '.nc_action').hide().attr("disabled", true);
                                                                    }
                                                                });
                                                                $(document).on("change", ".audit_conformity", function () {
                                                                    lm_dom.find_in_parent(this, 'td', '.conformance_opt,non_conformance_opt').hide();
                                                                    lm_dom.find_in_parent(this, 'td', '.observation_score,.severity_level').val("");
                                                                    if ($(this).val() === "Conformance") {
                                                                        lm_dom.find_in_parent(this, 'tr', '.conformance_opt').show();
                                                                        lm_dom.find_in_parent(this, 'tr', '.non_conformance_opt').hide();
                                                                        lm_dom.find_in_parent(this, 'tr', '.severity_level').focus();
                                                                    }
                                                                    if ($(this).val() === "Non Conformance") {
                                                                        lm_dom.find_in_parent(this, 'td', '.conformance_opt').hide();
                                                                        lm_dom.find_in_parent(this, 'td', '.non_conformance_opt').show();
                                                                        lm_dom.find_in_parent(this, 'tr', '.severity_level').focus();
                                                                    }
                                                                });
                                                                // Audit Findings Review Form Validation
                                                                $('#audit_findings_review1-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        audit_findings_review1_comments: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#audit_findings_review1-form')).fadeIn(500);
                                                                        scrollTo($('#audit_findings_review1-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#audit_findings_reviewed1').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                // Audit Findings Review Need Correction Form Validation
                                                                $('#audit_findings_review1_need_correction-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#audit_findings_review1_need_correction-form')).fadeIn(500);
                                                                        scrollTo($('#audit_findings_review1_need_correction-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#audit_findings_review1_need_correction').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                //Send Audit Report For Validation
                                                                $('#send_audit_report-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#send_audit_report-form')).fadeIn(500);
                                                                        scrollTo($('#send_audit_report-form'), -100);
                                                                    },
                                                                    rules: {
                                                                        uvms_target_date: {
                                                                            required: true
                                                                        },
                                                                        uvms_message: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#send_audit_report').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                //Update Audit Observation Feedback Form
                                                                $('#update_audit_observation_feedback-form').validate({
                                                                    submitHandler: function (form) {
                                                                        if (!$(form).find(".invalid_score").length) {
                                                                            var type = event.submitter.name;
                                                                            //Save Observation
                                                                            if (type === "save") {
                                                                                $('#save_observation_feedback,#update_observation_feedback').attr("disabled", true);
                                                                                $("#observation_feedback_submit_type").attr("name", "save_observation_feedback");
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                            //Observation Complete
                                                                            else if (type === "complete") {
                                                                                if (lm_validate.array_of_input([".audit_observation@", ".audit_conformity@", ".severity_level@", ".observation_score@"])) {
                                                                                    $('#save_observation,#update_observation').attr("disabled", true);
                                                                                    $("#observation_feedback_submit_type").attr("name", "complete_observation_feedback");
                                                                                    loading.show();
                                                                                    form.submit();
                                                                                }
                                                                            }
                                                                        } else {
                                                                            show_notification("e", 'topright', "Enter Valid Score");
                                                                        }
                                                                    }
                                                                });
                                                                // Audit Findings Review Form Validation
                                                                $('#audit_findings_review2-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        audit_findings_review2_comments: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#audit_findings_review2-form')).fadeIn(500);
                                                                        scrollTo($('#audit_findings_review1-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#audit_findings_reviewed2').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                // Audit Findings Review Need Correction Form Validation
                                                                $('#audit_findings_review2_need_correction-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#audit_findings_review2_need_correction-form')).fadeIn(500);
                                                                        scrollTo($('#audit_findings_review2_need_correction-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#audit_findings_review2_need_correction').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                // Request Acknowledegement Form Validation
                                                                $('#request_acknowledgement-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        plant: {
                                                                            required: true
                                                                        },
                                                                        department: {
                                                                            required: true
                                                                        },
                                                                        "ack_users[]": {
                                                                            required: true
                                                                        },
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#request_acknowledgement-form')).fadeIn(500);
                                                                        scrollTo($('#request_acknowledgement-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#request_cft_assessment').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                // Acknowledegement Form Validation
                                                                $('#acknowledgement-form').validate({
                                                                    submitHandler: function (form) {
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                                // Cancel Form 
                                                                $('#request_cancel-form').validate({
                                                                    errorElement: 'div', //default input error message container
                                                                    errorClass: 'vd_red', // default input error message class
                                                                    focusInvalid: false, // do not focus the last invalid input
                                                                    ignore: "",
                                                                    rules: {
                                                                        wf_remarks: {
                                                                            minlength: 3,
                                                                            required: true
                                                                        }
                                                                    },
                                                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                        $('.alert-danger', $('#request_cancel-form')).fadeIn(500);
                                                                        scrollTo($('#request_cancel-form'), -100);
                                                                    },
                                                                    submitHandler: function (form) {
                                                                        $('#request_cancel').attr("disabled", true);
                                                                        loading.show();
                                                                        form.submit();
                                                                    }
                                                                });
                                                            });
                                                            //--------End of Form valiadtion --------------------------------------------------------------------/ /
                                                            //Delete Attacments
                                                            $(document).on("click", ".delete_file", function () {
                                                                var c_this = this;
                                                                x_delete_lm_vm_doc_file($(this).data('file_id'), $("#vm_object_id").val(), function (result) {
                                                                    if (result == "true") {
                                                                        show_notification("s", 'topright', "File Deleted Successfully");
                                                                        $(c_this).closest('tr').remove();
                                                                    } else {
                                                                        show_notification("e", 'topright', " File Not Deleted.Invalid Request Called");
                                                                    }
                                                                });
                                                            });
                                                            //Show Reports
                                                            $(document).on("change", ".show_report", (e) => {
                                                                window.open($(e.target).val(), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=500,width=800,height=600");
                                                                $(e.target).val('');
                                                            });
                                                            $('#ack_checkbox').on('click', (e) => ($(e.target).is(':checked')) ? lm_dom.find_in_parent(e.target, 'form', '.ack_btn').removeAttr("disabled") : lm_dom.find_in_parent(e.target, 'form', '.ack_btn').attr("disabled", true));
                                                            //Show Taks Attachment
                                                            $(document).on("click", ".show_audit_attachments", function () {
                                                                loading.show();
                                                                let result = $(this).data('attachments'), writter = "";
                                                                let can_delete = $(this).data('can_delete');
                                                                if (result) {
                                                                    for (var i = 0; i < Object.keys(result).length; i++) {
                                                                        writter += `<tr>
                                                                                    <td><a href="?module=file&action=view_request_file&file_id=${result[i].object_id}" >${result[i].name}</a></td>
                                                                                    <td>${result[i].friendly_size}</td>
                                                                                    <td>${result[i].attached_by}</td>
                                                                                    <td>${result[i].attached_date}</td>`;
                                                                        if (result[i].can_delete && can_delete) {
                                                                            $(".show_audit_attachments_action").show();
                                                                            writter += `<td><i class="append-icon icon-trash vd_red vd_hover delete_file" data-file_id="${result[i].object_id}" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i></td>`;
                                                                        } else {
                                                                            $(".show_audit_attachments_action").hide();
                                                                        }
                                                                        writter += `</tr>`;
                                                                    }
                                                                    $(".show_audit_attachments_tbody").empty().append(writter);
                                                                    $(".show_audit_attachments_table").show();
                                                                    $(".no_attachments").hide();
                                                                } else {
                                                                    $(".show_audit_attachments_table").hide();
                                                                    $(".no_attachments").show();
                                                                }
                                                                loading.hide();
                                                            });
                                                            $(document).on("click", ".insight_certificate,.insight_vendor_report", function () {
                                                                loading.show();
                                                                setTimeout(() => loading.hide(), 2000);
                                                            });
    </script>
{/literal}