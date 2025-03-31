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
            <li class="active"> View Out Of Specification Management System</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5 data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"><i class="fa fa-arrows-h"></i></div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"><i class="fa fa-arrows-v"></i></div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"><i class="glyphicon glyphicon-fullscreen"></i></div>
        </div>
    </div>
</div>

<div class="panel widget">
    <div class="panel-body">
        <div class="panel-group" id="accordion">

            {* OOS Details Accordion *}
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseagendadetails">OOS Details</a>
                    </h4>
                </div>
                <div id="collapseagendadetails" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-wizard generate_wizard">
                            <ul>
                                <li>
                                    <a href="#tab_primary_details" data-toggle="tab">
                                        <div class="menu-icon"> 1 </div> Primary Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_preliminary_investigation" data-toggle="tab">
                                        <div class="menu-icon"> 2 </div>Preliminary Investigation
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_qc_review" data-toggle="tab">
                                        <div class="menu-icon"> 3 </div> QC Review
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_qa_review" data-toggle="tab">
                                        <div class="menu-icon"> 4 </div> QA Review
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_qc_approval" data-toggle="tab">
                                        <div class="menu-icon"> 5 </div> QC Approval
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_qa_approval" data-toggle="tab">
                                        <div class="menu-icon"> 6 </div> QA Approval
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_insight" data-toggle="tab">
                                        <div class="menu-icon"> 7 </div> Insight
                                    </a>
                                </li>
                            </ul>

                            <div class="progress progress-striped">
                                <div class="progress-bar vd_bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"></span>
                                </div>
                            </div>

                            <div class="tab-content">

                                {* tab 1 *}
                                <div class="tab-pane" id="tab_primary_details">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey">
                                        <i class="append-icon fa fa-fw fa-info"></i>Basic Details</span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=oos_no}
                                                        </div>
                                                        <input type="text" readonly value="{$oosNo}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=initiator}
                                                        </div>
                                                        <input type="text" readonly value="{$initiator}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=admin attribute=plant_name}
                                                        </div>
                                                        <input type="text" readonly value="{$company}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=department}
                                                        </div>
                                                        <input type="text" readonly value="{$department}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-life-ring"></i>OOS Details</span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=date_of_occurrence}
                                                        </div>
                                                        <input type="text" readonly value="{$oosDetailsObj->date_of_occurrence}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=time_of_occurrence}
                                                        </div>
                                                        <input type="text" readonly value="{$oosDetailsObj->time_of_occurrence}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=date_of_reporting}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var={display_datetime var=$oosDetailsObj->reporting_date}}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=specification_no}
                                                        </div>
                                                        <input type="text" readonly value="{$oosDetailsObj->specification_no}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=test_procedure_no}
                                                        </div>
                                                        <input type="text" readonly value="{$oosDetailsObj->test_procedure_no}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=ar_no}
                                                        </div>
                                                        <input type="text" readonly value="{$oosDetailsObj->ar_no}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=target_date}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$oosDetailsObj->target_date}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=description}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->description}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=impact_assesment}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->impact_assesment}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=risk_assesment}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->risk_assesment}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=final_closure_conclusion}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->final_closure_conclusion}</textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="oos_object_id" value="{$oosDetailsObj->object_id}" />
                                                <input type="hidden" id="status" value="{$oosDetailsObj->status}" />
                                                <input type="hidden" id="wf_status" value="{$oosDetailsObj->wf_status}" />
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw  fa-cubes"></i>Product Details</span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=product_name}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$productName}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=processing_stage}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$processStage}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=manufacturing_date}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$oosDetailsObj->manufacturing_date}}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=expiry_date}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var={display_date var=$oosDetailsObj->expiry_date}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=sample_quantity}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->quantity}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=batch_no}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->batch_no}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=lot_no}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->lot_no}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=batch_size}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->batch_size}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=material_type}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$materialType}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=material_name}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->material_name}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=instrument_name}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$instrumentName}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=calibrated_on}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->calibrated_on}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=next_calibration_date}
                                                        </div>
                                                        <input type="text" readonly
                                                            value="{display_if_null var=$oosDetailsObj->next_calibration_date}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=final_closure_date}
                                                        </div>
                                                        <input type="text" readonly value="{display_if_null var=$oosDetailsObj->final_closure_date}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=ref_test_protocol}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->ref_test_protocol}</textarea>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=time_point}</div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->time_point}</textarea>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=storage_condition}
                                                        </div>
                                                        <textarea rows="4" readonly="">{display_if_null var=$oosDetailsObj->storage_condition}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey">
                                        <i class="append-icon fa fa-fw fa-share-alt"></i> Results Obtained During Initial Analysis</span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row mgtp-10">
                                                    {if !empty($preliminaryTestResultsArray)}
                                                        <table
                                                            class="table table-bordered table-hover table-striped mgtp-5">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module=oos attribute="test_name"}
                                                                    </th>
                                                                    <th>{attribute_name module=oos attribute="specification_limit"}
                                                                    </th>
                                                                    <th>{attribute_name module=oos attribute="obtained_result"}
                                                                    </th>
                                                                    <th>{attribute_name module=oos attribute="remarks"}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$preliminaryTestResultsArray}
                                                                    <tr>
                                                                        <td>{$item.testName}</td>
                                                                        <td>{$item.specificationLimit} </td>
                                                                        <td>{$item.obtainedResult} </td>
                                                                        <td>{$item.obtainedResultRemarks} </td>
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
                                </div>

                                {* tab 2 *}
                                <div class="tab-pane" id="tab_preliminary_investigation">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon glyphicon glyphicon-screenshot"></i> Preliminary
                                            Investigation Checklist </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    {if !empty($preliminaryChecklistDetails)}
                                                        <table
                                                            class="table table-bordered table-hover table-striped mgtp-5">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="oos" attribute="check_points"}
                                                                    </th>
                                                                    <th>{attribute_name module="oos" attribute="yes_no_na"}
                                                                    </th>
                                                                    <th>{attribute_name module="oos" attribute="observation"}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$preliminaryCheckListDetails}
                                                                    <tr>
                                                                        <td>{$item.checkPoint}</td>
                                                                        <td>{display_if_null var=$item.yesNoNa}</td>
                                                                        <td>{display_if_null var=$item.observation}</td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close"
                                                                type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                            Found
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon glyphicon glyphicon-paperclip"></i> Preliminary
                                            Investigation Conclusion </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                {if !empty($preliminaryInvestigatioinObject->initial_investigation)}
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold">
                                                                {attribute_name module=oos attribute=preliminary_investigation}
                                                            </div>
                                                            <textarea class="mgbt-xs-20  mgbt-sm-0" rows="5"
                                                                style="resize: none"
                                                                readonly="">{$preliminaryInvestigatioinObject->initial_investigation}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold">
                                                                {attribute_name module=oos attribute=preliminary_investigation_conclusion}
                                                            </div>
                                                            <textarea class="mgbt-xs-20  mgbt-sm-0" rows="5"
                                                                style="resize: none"
                                                                readonly="">{$preliminaryInvestigatioinObject->initial_investigation_conclusion}</textarea>
                                                        </div>
                                                    </div>
                                                    {if !empty($preliminaryInvestigatioinObject->assign_cause_details)}
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-label font-semibold">
                                                                    {attribute_name module=oos attribute=assign_cause_details}
                                                                </div>
                                                                <textarea class="mgbt-xs-20  mgbt-sm-0" rows="5"
                                                                    style="resize: none"
                                                                    readonly="">{$preliminaryInvestigatioinObject->assign_cause_details}</textarea>
                                                            </div>
                                                        </div>
                                                    {/if}
                                                {else}
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close"
                                                            type="button"><i class="icon-cross"></i></button><i
                                                            class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                        Found
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {* tab 3 *}
                                <div class="tab-pane" id="tab_qc_review">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon append-icon fa fa-fw fa-user"></i> QC Review Details
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            {if $preliminaryInvestigatioinObject->is_assign_cause_identified}
                                                <div class="panel-body table-responsive">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-label font-semibold">
                                                                {attribute_name module=oos attribute=is_assign_cause_identified}
                                                            </div>
                                                            <input type="text" readonly
                                                                value="{$preliminaryInvestigatioinObject->is_assign_cause_identified}">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-label font-semibold">
                                                                {attribute_name module=oos attribute=is_further_invest_required}
                                                            </div>
                                                            <input type="text" readonly
                                                                value="{$preliminaryInvestigatioinObject->is_further_invest_required}">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-label font-semibold">
                                                                {attribute_name module=oos attribute=is_oos_valid}</div>
                                                            <input type="text" readonly
                                                                value="{$preliminaryInvestigatioinObject->is_oos_valid}">
                                                        </div>
                                                    </div>
                                                </div>
                                            {else}
                                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                                        type="button"><i class="icon-cross"></i></button>
                                                    <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                </div>
                                            {/if}
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon fa fa-fw fa-tasks"></i> QC Review - Supporting
                                            Documents </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row mgtp-10">
                                                    {if !empty($qcFileObjectArray)}
                                                        <table class="table table-bordered table-striped text-nowrap"
                                                            title="Attachments">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                                    <th>{attribute_name module="file" attribute="attached_by"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                                    <th>{attribute_name module="file" attribute="actions"}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$qcFileObjectArray}
                                                                    <tr>
                                                                        <td>{$key+1}</td>
                                                                        <td style='white-space: pre-wrap;'><a
                                                                                class="menu-icon vd_bd-green vd_blue font-semibold"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i> {$item.name}</a>
                                                                        </td>
                                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                                        <td>{$item.attachedBy}</td>
                                                                        <td>{$item.attachedDate}</td>
                                                                        <td class="menu-action text-nowrap">
                                                                            <a class="btn menu-icon vd_bd-green vd_green"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i></a>
                                                                            {if !empty($item.canDelete) && ($fileAttachmentTowards eq $item.attachmentTowards)}
                                                                                <button type="button"
                                                                                    class="btn menu-icon vd_bd-red vd_red delete_file"
                                                                                    data-original-title="Delete"
                                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                                    data-file_id="{$item.objectId}"><i
                                                                                        class="fa fa-trash-o"></i></button>
                                                                            {/if}
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close"
                                                                type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                            Found
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {* tab 4 *}
                                <div class="tab-pane" id="tab_qa_review">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon glyphicon glyphicon-paperclip"></i>
                                            QA Review - Supporting Documents
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row mgtp-10">
                                                    {if !empty($qaFileObjectArray)}
                                                        <table class="table table-bordered table-striped text-nowrap"
                                                            title="Attachments">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                                    <th>{attribute_name module="file" attribute="attached_by"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                                    <th>{attribute_name module="file" attribute="actions"}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$qaFileObjectArray}
                                                                    <tr>
                                                                        <td>{$key+1}</td>
                                                                        <td style='white-space: pre-wrap;'><a
                                                                                class="menu-icon vd_bd-green vd_blue font-semibold"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i> {$item.name}</a>
                                                                        </td>
                                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                                        <td>{$item.attachedBy}</td>
                                                                        <td>{$item.attachedDate}</td>
                                                                        <td class="menu-action text-nowrap">
                                                                            <a class="btn menu-icon vd_bd-green vd_green"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i></a>
                                                                            {if !empty($item.canDelete) && ($fileAttachmentTowards eq $item.attachmentTowards)}
                                                                                <button type="button"
                                                                                    class="btn menu-icon vd_bd-red vd_red delete_file"
                                                                                    data-original-title="Delete"
                                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                                    data-file_id="{$item.objectId}"><i
                                                                                        class="fa fa-trash-o"></i></button>
                                                                            {/if}
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close"
                                                                type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                            Found
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {* tab 5 *}
                                <div class="tab-pane" id="tab_qc_approval">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon fa fa-fw fa-file-pdf-o"></i>
                                            QC Approval Details
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=reason_for_rejection}
                                                        </div>
                                                        <textarea rows="4"
                                                            readonly="">{display_if_null var=$oosDetailsObj->qc_reason_for_rejection}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon fa fa-fw fa-file-pdf-o"></i>
                                            QC Approval - Supporting Documents
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row mgtp-10">
                                                    {if !empty($qcApproveFileObjectArray)}
                                                        <table class="table table-bordered table-striped text-nowrap"
                                                            title="Attachments">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                                    <th>{attribute_name module="file" attribute="attached_by"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                                    <th>{attribute_name module="file" attribute="actions"}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$qcApproveFileObjectArray}
                                                                    <tr>
                                                                        <td>{$key+1}</td>
                                                                        <td style='white-space: pre-wrap;'><a
                                                                                class="menu-icon vd_bd-green vd_blue font-semibold"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i> {$item.name}</a>
                                                                        </td>
                                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                                        <td>{$item.attachedBy}</td>
                                                                        <td>{$item.attachedDate}</td>
                                                                        <td class="menu-action text-nowrap">
                                                                            <a class="btn menu-icon vd_bd-green vd_green"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i></a>
                                                                            {if !empty($item.canDelete) && ($fileAttachmentTowards eq $item.attachmentTowards)}
                                                                                <button type="button"
                                                                                    class="btn menu-icon vd_bd-red vd_red delete_file"
                                                                                    data-original-title="Delete"
                                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                                    data-file_id="{$item.objectId}"><i
                                                                                        class="fa fa-trash-o"></i></button>
                                                                            {/if}
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close"
                                                                type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                            Found
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {* tab 6 *}
                                <div class="tab-pane" id="tab_qa_approval">
                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon append-icon fa fa-fw fa-user"></i>QA Approval
                                            Details</span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=is_manufacturing_investigation_required}
                                                        </div>
                                                        <input type="text" readonly
                                                            value="{display_if_null var=$oosDetailsObj->is_1phase_mfg_invest_required}">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=is_capa_required}</div>
                                                        <input type="text" readonly
                                                            value="{display_if_null var=$oosDetailsObj->is_capa_required}">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=qms_capa_no}</div>
                                                        <input type="text" readonly
                                                            value="{display_if_null var=$oosDetailsObj->qms_capa_no}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold">
                                                            {attribute_name module=oos attribute=reason_for_rejection}
                                                        </div>
                                                        <textarea rows="4"
                                                            readonly="">{display_if_null var=$oosDetailsObj->qa_reason_for_rejection}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon fa fa-fw fa-file-pdf-o"></i>
                                            QA Approval - Supporting Documents
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row mgtp-10">
                                                    {if !empty($qaApproveFileObjectArray)}
                                                        <table class="table table-bordered table-striped text-nowrap"
                                                            title="Attachments">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module="admin" attribute="sl_no"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                                    <th>{attribute_name module="file" attribute="attached_by"}
                                                                    </th>
                                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                                    <th>{attribute_name module="file" attribute="actions"}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$qaApproveFileObjectArray}
                                                                    <tr>
                                                                        <td>{$key+1}</td>
                                                                        <td style='white-space: pre-wrap;'><a
                                                                                class="menu-icon vd_bd-green vd_blue font-semibold"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i> {$item.name}</a>
                                                                        </td>
                                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                                        <td>{$item.attachedBy}</td>
                                                                        <td>{$item.attachedDate}</td>
                                                                        <td class="menu-action text-nowrap">
                                                                            <a class="btn menu-icon vd_bd-green vd_green"
                                                                                data-original-title="Download"
                                                                                data-toggle="tooltip" data-placement="bottom"
                                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                                    class="fa fa-download"></i></a>
                                                                            {if !empty($item.canDelete) && ($fileAttachmentTowards eq $item.attachmentTowards)}
                                                                                <button type="button"
                                                                                    class="btn menu-icon vd_bd-red vd_red delete_file"
                                                                                    data-original-title="Delete"
                                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                                    data-file_id="{$item.objectId}"><i
                                                                                        class="fa fa-trash-o"></i></button>
                                                                            {/if}
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    {else}
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close"
                                                                type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                            Found
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4>
                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                class="append-icon fa fa-fw fa-file-pdf-o"></i>
                                            Close-out - Supporting Documents
                                        </span>
                                    </h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body pdlr-10">

                                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                                        type="button"><i class="icon-cross"></i></button>
                                                    <i class="fa fa-exclamation-circle append-icon"></i> Records Not
                                                    Found
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {* tab 7 *}
                                <div class="tab-pane" id="tab_insight">
                                    <div id="insight_wizard" class="form-wizard condensed input-border generate_wizard">
                                        <ul class="nav nav-tabs nav-justified font-semibold">
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_1" data-toggle="tab">
                                                    <div class="menu-icon"> <i class="icon-users vd_red"></i></div>
                                                    Phase-1 (Re-testing) Investigation
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_2" data-toggle="tab">
                                                    <div class="menu-icon"><i class="glyphicon glyphicon-th vd_red"></i>
                                                    </div>
                                                    Phase-1 Manufacturing Investigation
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_3" data-toggle="tab">
                                                    <div class="menu-icon"><i class="icon-key vd_red"></i></div>
                                                    Phase-2 (Re-testing) Investigation
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_4" data-toggle="tab">
                                                    <div class="menu-icon"><i class="icon-blocked vd_red"></i></div>
                                                    Phase-2 (Re-sampling) Investigation
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_5" data-toggle="tab">
                                                    <div class="menu-icon"><i class="fa fa-fw fa-retweet vd_red"></i>
                                                    </div>
                                                    Phase-3 Details
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_6" data-toggle="tab">
                                                    <div class="menu-icon"><i class="fa  fa-external-link vd_red"></i>
                                                    </div>
                                                    CFT Comments
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a class="pd-10" href="#insight_7" data-toggle="tab">
                                                    <div class="menu-icon"><i class="icon-sound vd_red"></i></div>
                                                    Interim Extension
                                                </a>
                                            </li>
                                            <li class="input-border search_audit_trail">
                                                <a class="pd-10" href="#insight_8" data-toggle="tab">
                                                    <div class="menu-icon"><i class="fa fa-fw fa-road vd_red"></i></div>
                                                    Reports
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="panel-body pd-15">
                                            <div class="tab-content pd-0 mgtp-0 no-bd">
                                                <div class="tab-pane active" id="insight_1">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                                class="append-icon fa fa-fw fa-calendar"></i>
                                                            Checklist
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase1CheckListDetails)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="check_points"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="yes_no_na"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="observation"}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase1CheckListDetails}
                                                                                    <tr>
                                                                                        <td>{$item.count}</td>
                                                                                        <td>
                                                                                            {$item.checkPoint}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.yesNoNa}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.observation}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div
                                                                            class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert"
                                                                                class="close" type="button"><i
                                                                                    class="icon-cross"></i></button>
                                                                            <i
                                                                                class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                                class="append-icon fa fa-fw fa-bullseye"></i>
                                                            Phase-1 Test Results
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase1AnalystDetails)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="analyst"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="specification_limit"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="obtained_result"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="remarks"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="attachment"}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$oosSpecificationDetailsArray}
                                                                                    <tr>
                                                                                        <td colspan="6"
                                                                                            style="font-weight:bold">
                                                                                            {$item.testName}
                                                                                        </td>
                                                                                    </tr>
                                                                                    {foreach name=list item=item1 key=key1 from=$phase1AnalystDetails}

                                                                                        {foreach name=spec_results item=item2 key=key2 from=$item1.analystSpecResultDetails}

                                                                                            {if $item.objectId eq $item2.spec_details_id}
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {$item1.count}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item1.analystName}
                                                                                                        [{$item1.analystDepartment}]
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.spec_limit}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.obtained_result}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.obtained_result_remarks}
                                                                                                    </td>
                                                                                                    {if !empty($item2.p1_fileobjectarray)}
                                                                                                        <td>
                                                                                                            {foreach name=file_array item=item3 key=key3 from=$item2.p1_fileobjectarray}
                                                                                                                <a
                                                                                                                    href="?module=file&action=view_request_file&file_id={$item3.object_id}"><span
                                                                                                                        class="glyphicon glyphicon-download-alt"
                                                                                                                        style="color:blue"></span>
                                                                                                                    <font color="blue">{$item3.name}
                                                                                                                    </font>
                                                                                                                </a><br>
                                                                                                            {/foreach}
                                                                                                        </td>
                                                                                                    {else}
                                                                                                        <td>-</td>
                                                                                                    {/if}
                                                                                                </tr>
                                                                                            {/if}
                                                                                        {/foreach}
                                                                                    {/foreach}
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div
                                                                            class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert"
                                                                                class="close" type="button"><i
                                                                                    class="icon-cross"></i></button>
                                                                            <i
                                                                                class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                                class="append-icon fa fa-fw fa-user"></i>
                                                            Standard Deviation
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase1StandardDeviation)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="test_name"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="mean_result"}
                                                                                        (μ)</th>
                                                                                    <th>{attribute_name module=oos attribute="std_dev"}
                                                                                        (σ)</th>
                                                                                    <th>{attribute_name module=oos attribute="rsd"}
                                                                                        (%)</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase1StandardDeviation}
                                                                                    <tr>
                                                                                        <td>
                                                                                            {$item['count']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testName']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['mean']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['stdDeviation']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['rsdPercentage']}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div
                                                                            class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert"
                                                                                class="close" type="button"><i
                                                                                    class="icon-cross"></i></button>
                                                                            <i
                                                                                class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}

                                                                    {if !empty($phase1InvestigationDetailsObject->assign_cause_details)}
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-label">
                                                                                    {attribute_name module=oos attribute=assign_cause_details}
                                                                                </div>
                                                                                <textarea class="mgbt-xs-20  mgbt-sm-0" rows="5" style="resize: none" readonly="">{$phase1InvestigationDetailsObject->assign_cause_details}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="insight_2">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>
                                                            Checklist
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase1ManufacturingCheckListDetails)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="check_points"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="yes_no_na"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="observation"}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase1ManufacturingCheckListDetails}
                                                                                    <tr>
                                                                                        <td>{$item.count}</td>
                                                                                        <td>
                                                                                            {$item.checkPoint}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.yesNoNa}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.observation}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div
                                                                            class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert"
                                                                                class="close" type="button"><i
                                                                                    class="icon-cross"></i></button>
                                                                            <i
                                                                                class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12" style="padding-left: 0; padding-right: 0;">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=manufacturing_investigation_details}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase1ManufacturingInvestigationDetailsObject->details}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="insight_3">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>
                                                            Checklist
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2RetestCheckListDetails)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="check_points"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="yes_no_na"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="observation"}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase2RetestCheckListDetails}
                                                                                    <tr>
                                                                                        <td>{$item.count}</td>
                                                                                        <td>
                                                                                            {$item.checkPoint}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.yesNoNa}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.observation}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                            <i class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12" style="padding-left: 0; padding-right: 0;">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=retesting_description}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase2RetestInvestigationDetailsObject->retesting_description}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>
                                                            Phase-2 (Re-testing) Test Results
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2RetestAnalystDetails)}
                                                                        <table class="table table-bordered table-striped" id="data-tables-suggestion">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oot attribute="s_no"}</th>
                                                                                <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}</th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result"}</th>
                                                                                <th>{attribute_name module=oos attribute="remarks"}</th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>        
                                                                                {foreach name=list item=item key=key from=$oosSpecificationDetailsArray} 
                                                                                    <tr>
                                                                                        <td colspan ="6" style="font-weight:bold">
                                                                                            {$item.testName}
                                                                                        </td>
                                                                                    </tr>
                                                                                    {foreach name=list item=item1 key=key1 from=$phase2RetestAnalystDetails} 
                                                                                        {foreach name=spec_results item=item2 key=key2 from=$item1.analystSpecResultDetails} 
                                                                                            {if $item.objectId eq $item2.spec_details_id}     
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {$item1.count}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item1.analystName} [{$item1.analystDepartment}]
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.spec_limit}
                                                                                                    <td>
                                                                                                        {$item2.obtained_result}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.obtained_result_remarks}
                                                                                                    </td>
                                                                                                    {if !empty($item2.p2_rt_fileobjectarray)}
                                                                                                    <td>
                                                                                                        {foreach name=file_array item=item3 key=key3 from=$item2.p2_rt_fileobjectarray}
                                                                                                            <a href="?module=file&action=view_request_file&file_id={$item3.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span><font color="blue">{$item3.name}</font></a><br>
                                                                                                        {/foreach}
                                                                                                    </td>
                                                                                                    {else}
                                                                                                    <td>-</td>   
                                                                                                    {/if}
                                                                                                </tr>
                                                                                            {/if}
                                                                                        {/foreach}
                                                                                    {/foreach}
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
                                                        
                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i
                                                                class="append-icon icon-key"></i>
                                                            Standard Deviation
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2RetestStandardDeviation)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="test_name"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="mean_result"}
                                                                                        (μ)</th>
                                                                                    <th>{attribute_name module=oos attribute="std_dev"}
                                                                                        (σ)</th>
                                                                                    <th>{attribute_name module=oos attribute="rsd"}
                                                                                        (%)</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase2RetestStandardDeviation}
                                                                                    <tr>
                                                                                        <td>
                                                                                            {$item['count']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testName']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['mean']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['stdDeviation']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['rsdPercentage']}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                            <i class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="insight_4">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>
                                                            Checklist
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2ResampleCheckListDetails)}
                                                                        <table
                                                                            class="table table-bordered table-striped mgtp-5"
                                                                            id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="check_points"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="yes_no_na"}
                                                                                    </th>
                                                                                    <th>{attribute_name module=oos attribute="observation"}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase2ResampleCheckListDetails}
                                                                                    <tr>
                                                                                        <td>{$item.count}</td>
                                                                                        <td>
                                                                                            {$item.checkPoint}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.yesNoNa}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.observation}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                            <i class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>
                                                            Phase-2 (Re-sampling) Test Results
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2ResampleAnalystDetails)}
                                                                        <table class="table table-bordered table-striped" id="data-tables-suggestion">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oot attribute="s_no"}</th>
                                                                                <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}</th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result"}</th>
                                                                                <th>{attribute_name module=oos attribute="remarks"}</th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>        
                                                                                {foreach name=list item=item key=key from=$oosSpecificationDetailsArray} 
                                                                                    <tr>
                                                                                        <td colspan ="6" style="font-weight:bold">
                                                                                            {$item.testName}
                                                                                        </td>
                                                                                    </tr>
                                                                                    {foreach name=list item=item1 key=key1 from=$phase2ResampleAnalystDetails} 
                                                                                        {foreach name=spec_results item=item2 key=key2 from=$item1.analystSpecResultDetails} 
                                                                                            {if $item.objectId eq $item2.spec_details_id}     
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {$item1.count}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item1.analystName} [{$item1.analystDepartment}]
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.spec_limit}
                                                                                                    <td>
                                                                                                        {$item2.obtained_result}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {$item2.obtained_result_remarks}
                                                                                                    </td>
                                                                                                    {if !empty($item2.p2_rt_fileobjectarray)}
                                                                                                    <td>
                                                                                                        {foreach name=file_array item=item3 key=key3 from=$item2.p2_rt_fileobjectarray}
                                                                                                            <a href="?module=file&action=view_request_file&file_id={$item3.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span><font color="blue">{$item3.name}</font></a><br>
                                                                                                        {/foreach}
                                                                                                    </td>
                                                                                                    {else}
                                                                                                    <td>-</td>   
                                                                                                    {/if}
                                                                                                </tr>
                                                                                            {/if}
                                                                                        {/foreach}
                                                                                    {/foreach}
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
                                                    
                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>
                                                            Standard Deviation
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($phase2ResampleStandardDeviation)}
                                                                        <table class="table table-bordered table-striped mgtp-5" id="data-tables-history">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}</th>
                                                                                    <th>{attribute_name module=oos attribute="test_name"}</th>
                                                                                    <th>{attribute_name module=oos attribute="mean_result"}(μ)</th>
                                                                                    <th>{attribute_name module=oos attribute="std_dev"}(σ)</th>
                                                                                    <th>{attribute_name module=oos attribute="rsd"}(%)</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$phase2ResampleStandardDeviation}
                                                                                    <tr>
                                                                                        <td>
                                                                                            {$item['count']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testName']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['mean']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['stdDeviation']}
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item['testResult']['rsdPercentage']}
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    {else}
                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                            <i class="fa fa-exclamation-circle append-icon"></i>
                                                                            Records Not Found
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=resampling_description}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase2ResampleDetailsObject->resampling_description}</textarea>
                                                                    </div> 
                                                                </div>

                                                                <div class="row mgtp-10">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=processing_stage}</div>
                                                                        <input type="text" readonly value="{$phase2ResampleProcessingStage}">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=batch_no}</div>
                                                                        <input type="text" readonly value="{$phase2ResampleDetailsObject->batch_no}">
                                                                    </div>
                                                                </div>

                                                                <div class="row mgtp-10">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=ar_no}</div>
                                                                        <input type="text" readonly value="{$phase2ResampleDetailsObject->ar_no}">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module=oos attribute=sample_quantity}</div>
                                                                        <input type="text" readonly value="{$phase2ResampleDetailsObject->quantity}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="insight_5">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-retweet"></i>
                                                            Phase 3
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module='oos' attribute='review_of_manufacturing_investigation'}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase3InvestigationDetailsObject->mfg_investigation_review}</textarea>
                                                                    </div> 
                                                                </div>
                                                                <div class="row mgtp-10">                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module='oos' attribute='review_of_lab_investigation'}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase3InvestigationDetailsObject->lab_investigation_review}</textarea>
                                                                    </div> 
                                                                </div>
                                                                <div class="row mgtp-10">                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module='oos' attribute='assign_cause_details'}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase3InvestigationDetailsObject->assign_cause_details}</textarea>
                                                                    </div> 
                                                                </div>
                                                                <div class="row mgtp-10">                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-label font-semibold">
                                                                            {attribute_name module='oos' attribute='closure_comments'}
                                                                        </div>
                                                                        <textarea rows="4" readonly="">{display_if_null var=$phase3InvestigationDetailsObject->final_closure_comments}</textarea>
                                                                    </div> 
                                                                </div>                                                                

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="insight_6">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-external-link"></i>
                                                            CFT Comments
                                                        </span>
                                                    </h4>
                                                    
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($cftReviews)}
                                                                        <table class="table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="s_no"}</th> 
                                                                                <th>{attribute_name module=oos attribute="comment"}</th> 
                                                                                <th>{attribute_name module=oos attribute="user_name"}</th> 
                                                                                <th>{attribute_name module=oos attribute="department"}</th> 
                                                                                <th>{attribute_name module=oos attribute="date"}</th> 
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            {foreach name=list item=item key=key from=$cftReviews} 
                                                                                <tr>
                                                                                    <td>{$item.count}</td> 
                                                                                    <td>{$item.comment}</td> 
                                                                                    <td>{$item.reviewedBy}</td> 
                                                                                    <td>{$item.department}</td> 
                                                                                    <td>{$item.dateTime}</td> 
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

                                                    <br>

                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-external-link"></i>
                                                            CFT - Attachments
                                                        </span>
                                                    </h4>

                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($cftFileObjectArray)}
                                                                        <table class="table table-bordered table-striped" id="data-tables-cft_review_file_attachment">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                                                    <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach name=list item=item key=key from=$cftFileObjectArray}
                                                                                    <tr>
                                                                                        <td>
                                                                                            <a href="?module=file&action=view_request_file&file_id={$item.objectId}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span><font color="blue">{$item.name}</font></a><br>
                                                                                        </td>
                                                                                        <td>
                                                                                            {GetFriendlySize file_size=$item.size} <br>
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.attachedBy} <br>
                                                                                        </td>
                                                                                        <td>
                                                                                            {$item.attachedDate} <br>
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

                                                </div>

                                                <div class="tab-pane" id="insight_7">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-sound"></i>
                                                            Interim extension
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    {if !empty($extension_details)}
                                                                        <table class="table table-bordered table-striped" id="data-tables-ext-details">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module=oos attribute="s_no"}</th> 
                                                                                    <th>{attribute_name module=oos attribute="existing_target_date"}</th>
                                                                                    <th>{attribute_name module=oos attribute="proposed_target_date"}</th>
                                                                                    <th>{attribute_name module=oos attribute="status"}
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody> 
                                                                                {foreach name=list item=item key=key from=$extension_details} 
                                                                                <tr>
                                                                                    <td>{$item.count}</td>
                                                                                    <td>{$item.existing_target_date}</td>
                                                                                    <td>{$item.proposed_target_date}</td>
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="insight_8">
                                                    <h4>
                                                        <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-road"></i>
                                                            Reports
                                                        </span>
                                                    </h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row mgtp-10">
                                                                    <table class="table table-bordered table-striped" id="data-tables-report-details">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="oos_details"}</th> 
                                                                                <th>{attribute_name module=oos attribute="test_details"}</th>
                                                                                <th>{attribute_name module=oos attribute="interim_extension"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody> 
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="btn-group">
                                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Download <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                                        <ul class="dropdown-menu" role="menu">  
                                                                                            <li><a href='index.php?module=file&action=oos_final_report&object_id={$oosDetailsObj->object_id}' onclick="window.open(this.href, 'oosdetails', 'resizable=0');return false;"> OOS DETAILS </a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="btn-group">
                                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Download <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                                        <ul class="dropdown-menu" role="menu">  
                                                                                            <li><a href='index.php?module=file&action=oos_test_details_report&object_id={$oosDetailsObj->object_id}' onclick="window.open(this.href, 'actionplan', 'resizable=0');return false;"> TEST DETAILS </a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="btn-group">
                                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Download <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                                        <ul class="dropdown-menu" role="menu">  
                                                                                            <li><a href='index.php?module=file&action=oos_extension_details_report&object_id={$oosDetailsObj->object_id}' onclick="window.open(this.href, 'extensiondetails', 'resizable=0');return false;"> EXTENSION DETAILS </a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <input type="hidden" class="query" type="hidden" value="dms_wf_audit_trail">
                                                    <input type="hidden" class="refrence_object_id" type="hidden" value="{$dm_master_obj->dm_object_id}">
                                                    <input type="hidden" class="from_date" data-datepicker_min="{$at_start_date}" data-datepicker_max="{$at_end_date}">
                                                    <input type="hidden" class="to_date" data-datepicker_min="{$at_start_date}" data-datepicker_max="{$at_end_date}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions-condensed wizard">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-sm-9 col-sm-offset-0">
                                            <a class="btn vd_btn prev" href="javascript:void(0);">
                                                <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span>
                                                Previous
                                            </a>
                                            <a class="btn vd_btn next" href="javascript:void(0);">
                                                Next
                                                <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {* Status Accordion *}
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsestatus">Status </a>
                    </h4>
                </div>
                <div id="collapsestatus" class="panel-collapse collapse">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="col-md-8 h4 mgtp-0 mgbt-md-0 pd-0 row">
                                <span class="vd_blue"><strong>{$oosDetailsObj->wf_status}</strong></span>
                                {if !empty($worklist_pending_details)}
                                    <span data-original-title="Pending Details" data-toggle="tooltip" data-placement="bottom">
                                        <i style="cursor: pointer;" data-target="#modal-worklist" data-toggle="modal" class="btn menu-icon vd_bd-red vd_red fa fa-tasks"></i>
                                    </span>
                                {/if}
                            </div>

                            <div class="progress progress-striped active mgtp-5 mgbt-md-0 vd_hover" data-original-title="<div class='mgtp-5 font-semibold'><span><i class='fa fa-circle fa-fw vd_green fa-beat-animation'></i>Completion : </span><span> {$progressBarStatusPercentage}</span></div><div class='mgtp-5 font-semibold'><span>{$oosDetailsObj->status} </span><span> - [{$oosDetailsObj->status}]</span></div>" data-toggle="tooltip" data-placement="bottom" data-html="true">
                                <div class="progress-bar font-semibold" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{$progressBarStatusPercentage}">
                                    <span>{$progressBarStatusPercentage}</span>
                                </div>
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
                                        {foreach name=list item=item key=key from=$statusDetails}
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
                            <form name="dms_comments_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal row" role="form" id="dms_comments_form" autocomplete="off">
                                <table class="table table-bordered table-striped generate_datatable" title="Comments" data-sort_column=1>
                                    <thead>
                                        <tr>
                                            <th>{attribute_name module=admin attribute="sl_no"}</th>
                                            <th>{attribute_name module=dms attribute="date"}</th>
                                            <th>{attribute_name module=dms attribute="username"}</th>
                                            <th>{attribute_name module=admin attribute="plant_name"}</th>
                                            <th>{attribute_name module=dms attribute="department"}</th>
                                            <th>{attribute_name module=dms attribute="remarks"}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach key=key item=remark from=$workFlowRemarks}
                                            <tr>
                                                <td></td>
                                                <td>{$remark.created_time}</td>
                                                <td>{$remark.created_by}</td>
                                                <td>{$remark.plant}</td>
                                                <td>{$remark.department}</td>
                                                <td>{$remark.remarks}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {* Edit Accordion *}
            {if $editButton}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit">Edit <i class="fa  fa-exclamation-triangle vd_white"></i>
                                {if $show_edit_error_msg}
                                    <span class="badge vd_bg-red fa-beat-animation" data-toggle="tooltip" data-placement="bottom" data-original-title="Kindly upadte the Mandatory Fields to proceed to the next stage">
                                        <i class="fa fa-exclamation"></i>
                                    </span>
                                {/if}
                            </a>
                        </h4>
                    </div>
                    <div id="collapseEdit" class="panel-collapse collapse">
                        <div class="panel widget light-widget">
                            <div class="panel widget">
                                <div class="panel-body">
                                    <div class="form-wizard condensed">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="input-border">
                                                <a data-toggle="modal" href="#" data-target="#edit_basic_details" class="btn vd_green font-semibold">
                                                    <div class="menu-icon"><span class="icon-vcard vd_red"></span> </div>
                                                    Basic Details
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a data-toggle="modal" href="#" data-target="#edit_product_info" class="btn vd_green font-semibold">
                                                    <div class="menu-icon"><i class="fa fa-fw  fa-cubes vd_red"></i> </div>
                                                    Product Information
                                                </a>
                                            </li>
                                            <li class="input-border">
                                                <a data-toggle="modal" href="#" data-target="#edit_test_results" class="btn vd_green font-semibold">
                                                    <div class="menu-icon"><i class="fa fa fa-fw fa-shield vd_red"></i> </div>
                                                    Change Initial Test Results
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal fade" id="edit_basic_details" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Basic Details</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="edit_basic_details_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit-basic-details-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="date_of_occurrence"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_datepicker" placeholder="YYYY-MM-DD" name="date_of_occurrence" id="date_of_occurrence" required title="Select Valid Date of Occurance" value="{$oosDetailsObj->date_of_occurrence}" data-datepicker_max="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="time_of_occurrence"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_timepicker" placeholder="HH:MM AM/PM" name="time_of_occurrence" id="time_of_occurrence" required title="Select Valid Time of Occurance" value="{$oosDetailsObj->time_of_occurrence}" data-time_show_secondas=true data-time_show_input=false>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="specification_no"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required" name="specification_no" id="specification_no" title="Enter Valid Specification No" value="{$oosDetailsObj->specification_no}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="test_procedure_no"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required" name="test_procedure_no" id="test_procedure_no" title="Enter Valid Test Procedure No" value="{$oosDetailsObj->specification_no}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="ar_no"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required" name="ar_no" id="ar_no" title="Enter Valid AR No" value="{$oosDetailsObj->ar_no}" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="oos" attribute="description"} <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter description" rows="3" class="width-100" name="description" id="description" required title="Enter Valid Description">{$oosDetailsObj->description}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Basic Information">
                                                                    <input type="hidden" name="update_basic_info">
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update-basic-info"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="edit_product_info" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_ModalLabel">Edit Product Information - (To be filled only for Products)</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="edit_prod_info-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_prod_info-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module=oos attribute=material_type}</label>
                                                                <div class="controls"> 
                                                                    <select name="material_type_id" id="material_type_id" title="Select Valid Material Type">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$materialTypeList}
                                                                            <option value="{$item.object_id}" {if $item.object_id eq $oosDetailsObj->material_type_id} selected{/if}>{$item.material_type}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="material_name"}</label>
                                                                <div class="controls ">
                                                                    <input type="text" class="" placeholder="Enter material name" name="material_name" id="material_name" value="{$oosDetailsObj->material_name}" title="Enter Material Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module=oos attribute=customer_name}</label>
                                                                <div class="controls">
                                                                    <select name="customer_id" id="customer_id" title="Select Valid Customer Name">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$customerList}
                                                                            <option value="{$item.object_id}" {if $item.object_id eq $oosDetailsObj->customer_id} selected{/if}>{$item.customer_name}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module=oos attribute=product_name}</label>
                                                                <div class="controls">
                                                                    <select name="product_id" id="product_id" title="Select Valid Product Name">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$productList}
                                                                            <option value="{$item.object_id}" {if $item.object_id eq $oosDetailsObj->product_id} selected{/if}>{$item.product_name}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="processing_stage"}</label>
                                                                <div class="controls">
                                                                    <select name="process_stage_id" id="process_stage_id" title="Select Valid Process Stage">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$processStageList}
                                                                            <option value="{$item.object_id}" {if $item.object_id eq $oosDetailsObj->process_stage_id} selected{/if}>{$item.process_stage}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label  class="control-label">{attribute_name module="oos" attribute="manufacturing_date"}</label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker date_changed" placeholder="YYYY-MM-DD" name="manufacturing_date" id="manufacturing_date" value="{$oosDetailsObj->manufacturing_date}" title="Select Valid Manufacturing Date" data-datepicker_max=0 data-date_changed="expiry_date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="expiry_date"}</label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker" placeholder="YYYY-MM-DD" name="expiry_date" value="{$oosDetailsObj->expiry_date}" title="Select Valid Expiry Date" data-datepicker_min="{$oosDetailsObj->manufacturing_date}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="batch_no"} </label>
                                                                <div class="controls">
                                                                    <input type="text" placeholder="Enter Batch No" name="batch_no" id="batch_no" value="{$oosDetailsObj->batch_no}" title="Enter Batch No">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="batch_size"}</label>
                                                                <div class="controls">
                                                                    <input type="text" placeholder="Enter Batch Size" name="batch_size" id="batch_size" value="{$oosDetailsObj->batch_size}" title="Enter Batch Size">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="lot_no"}</label>
                                                                <div class="controls">
                                                                    <input type="text" placeholder="Enter Lot No" name="lot_no" id="lot_no" value="{$oosDetailsObj->lot_no}" title="Enter Lot No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="sample_quantity"} </label>
                                                                <div class="controls ">
                                                                    <input type="text" class="" placeholder="Enter Sample Quantity" name="quantity" id="quantity" value="{$oosDetailsObj->quantity}" title="Enter Sample Quantity">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="instrument_name"}</label>
                                                                <div class="controls">
                                                                    <select name="instrument_id" id="instrument_id" title="Select Valid Process Stage">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$instrumentList}
                                                                            <option value="{$item.object_id}" {if $item.object_id eq $oosDetailsObj->instrument_id} selected{/if}>{$item.inst_equip_name}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="calibrated_on"}</label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker date_changed" placeholder="YYYY-MM-DD" name="calibrated_on" id="calibrated_on" value="{$oosDetailsObj->calibrated_on}" title="Select Valid Calibrated Date" data-datepicker_max=0 data-date_changed="next_calibration_date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label">{attribute_name module="oos" attribute="next_calibration_date"}</label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker" placeholder="YYYY-MM-DD" name="next_calibration_date" value="{$oosDetailsObj->next_calibration_date}" title="Select Valid Next Calibration Date" data-datepicker_min="{$oosDetailsObj->next_calibration_date}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="oos" attribute="ref_test_protocol"}</label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter Reference Test Protocol" rows="3" class="width-100" name="ref_test_protocol" id="ref_test_protocol" title="Enter Valid Reference Test Protocol">{$oosDetailsObj->ref_test_protocol}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="oos" attribute="time_point"}</label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter Time Point" rows="3" class="width-100" name="time_point" id="time_point" title="Enter Valid Time Point">{$oosDetailsObj->time_point}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="oos" attribute="storage_condition"}</label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter Storage Condition" rows="3" class="width-100" name="storage_condition" id="storage_condition" title="Enter Valid Storage Condition">{$oosDetailsObj->storage_condition}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Product Details">
                                                                    <input type="hidden" name="update_product_details">
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update_prod_details"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span>Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="edit_test_results" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_ModalLabel">Edit Initial Test Result Details</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="edit-test-result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit-test-result-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <table class="table table-bordered table-striped" id="edit_prelim_test_result_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{attribute_name module=oos attribute="test_name"} <span class="vd_red">*</span></th>
                                                                            <th>{attribute_name module=oos attribute="specification_limit"} <span class="vd_red">*</span></th>
                                                                            <th>{attribute_name module=oos attribute="obtained_result_remarks"} <span class="vd_red">*</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {foreach name=list item=item key=key from=$preliminaryTestResultsArray}
                                                                            <tr>
                                                                                <input type="hidden" name="spec_result_obj_array[]" value="{$item.objectId}">
                                                                                <td>{$item.testName}</td>
                                                                                <td>{$item.specificationLimit}</td>
                                                                                <td>
                                                                                    <input type="number" min="0" placeholder="Enter the obtained result" class="width-80 required" name="obtained_result[]" id="obtained_result" value="{$item.obtainedResult}" required title="Enter Valid Result">
                                                                                    <hr>
                                                                                    <textarea placeholder="Enter the obtained result's remarks" rows="2" class="width-80 required" name="obtained_result_remarks[]" required title="Enter Valid Remarks">{$item.obtainedResultRemarks}</textarea>
                                                                                </td>
                                                                            </tr>
                                                                        {/foreach}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Test Results & Remarks">
                                                                    <input type="hidden" name="update_test_result_and_remarks">
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update_test_result_and_remarks"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span>Update</button>
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
                        </div>
                    </div>
                </div>
            {/if}

            {* Edit Attachments Accordion *}
            {if $editAttachment}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_dms_attachments">Edit Attachments <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapse_dms_attachments" class="panel-collapse collapse">
                        <div class="panel-body pdlr-10">
                            <div class="col-md-12">
                                <form name="upload-doc-form" id="upload-doc-form" method="POST" autocomplete="off" class="form-separated">
                                    <!--Dont delete. Dropzone Custom File Upload Script See vendors/custom_inel/file_upload/all_file_upload.js-->
                                    <input type="hidden" name="upload_file_url" id="upload_file_url" value="{$smarty.server.REQUEST_URI}" />
                                    <input type="hidden" id="file_attachment_towards" value="{$fileAttachmentTowards}" />
                                    <input type="hidden" name="upload_file_max_size" id="upload_file_max_size" value="{$smarty.session.max_upload_file_size}" />
                                    <div id="mydropzone" class="dropzone"></div>
                                </form>
                            </div>
                            <div class="col-md-12 mgtp-15">
                                <div class="table-responsive">
                                    {if !empty($fileObjectArray)}
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
                                                {foreach name=list item=item key=key from=$fileObjectArray}
                                                    <tr>
                                                        <td>{$key+1}</td>
                                                        <td style='white-space: pre-wrap;'><a class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom" href="?module=file&action=view_request_file&file_id={$item.objectId}"><i class="fa fa-download"></i> {$item.name}</a></td>
                                                        <td>{GetFriendlySize file_size=$item.size}</td>
                                                        <td>{$item.attachedBy}</td>
                                                        <td>{$item.attachedDate}</td>
                                                        <td class="menu-action text-nowrap">
                                                            <a class="btn menu-icon vd_bd-green vd_green"
                                                                data-original-title="Download" data-toggle="tooltip"
                                                                data-placement="bottom"
                                                                href="?module=file&action=view_request_file&file_id={$item.objectId}"><i
                                                                    class="fa fa-download"></i></a>
                                                            {if !empty($item.canDelete) && ($fileAttachmentTowards eq $item.attachmentTowards)}
                                                                <button type="button" class="btn menu-icon vd_bd-red vd_red delete_file" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom" data-file_id="{$item.objectId}"><i class="fa fa-trash-o"></i></button>
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

            {* Edit Access Rights Accordion *}
            {if $editAccessRights}
                {include file="templates/common/edit_access_rights.tpl"}
            {/if}

            {* Assign For Priliminary Investigation Accordion *}
            {if $enablePreliminaryInvestigationAssignForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreviewdeptapprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapserequestreviewdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN TO PRILIMINARY INVESTIGATION</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-preliminary-investigation-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-preliminary-investigation-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="plant_id" onchange="get_access_rights_dept_list('{$oosDetailsObj->object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department_id');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$authorisedPlantList}
                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department_id" id="department_id" onchange="get_action_users('{$lmDocumentId}', 'ip_invest', this.options[this.selectedIndex].value, '#user_id');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="user_name"} <span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="user_id" id="user_id" title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly start the priliminary investigation." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Assign to preliminary investigation">
                                            <input type="hidden" name="assign_to_preliminary_investigation">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign-to-preliminary-investigation"><span class="menu-icon"> <i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Add Preliminary Checklist Accordion *}
            {if $enablePreliminaryCheckListAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PRELIMINARY INVESTIGATION CHECKLIST FORM </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_checklist_modal"><i class="fa fa-plus"></i> &nbsp;Add </button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add_checklist_modal" tabindex="-1" role="dialog" aria-labelledby="add_checklist_modal" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Add Checklist</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="add-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add-checklist-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped" id="add_preliminary_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$oosCheckList}
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden" name="preliminary_check_points[]" value="{$item.objectId}" id="{$item.checkPoints}"><label for="{$item.checkPoints}">{$item.checkPoints}</label>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="audit_trail_action" value="Preliminary Investigation Check Points Created">
                                                                        <input type="hidden" name="add_preliminary_checklist">
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_preliminary_checklist" id="add_preliminary_checklist">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Preliminary Checklist Form -->
                                                    <form name="preliminary-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="preliminary-investigation-checklist-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="preliminary-investigation-checklist-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$preliminaryCheckListDetails}
                                                                                <tr>
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger" onclick="deleteChecklistPoint(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {if !empty($preliminaryCheckListDetails)}
                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="submit_preliminary_checklist" id="submit_preliminary_checklist"><i class="fa fa-send"></i>&nbsp; Submit </button>
                                                        {/if}
                                                    </form>
                                                    <hr>mfg_investigation_review
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

            {* Add Preliminary Observation Accordion *}
            {if $enablePreliminaryObservationAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">UPDATE PRELIMINARY INVESTIGATION'S OBSERVATION FORM</h3>
                                </div>
                            <div class="panel widget panel-bd-left light-widget">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update_observation_modal"><i class="fa fa-plus"></i>&nbsp; Update Investigation Observation</button>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="update_observation_modal" tabindex="-1" role="dialog" aria-labelledby="update_observation_modal" aria-hidden="true">
                                        <div class="modal-dialog width-80">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="update_ModalLabel">Update Preliminary Investigation's Observation</h4>
                                                </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update-preliminary-checklist-observation-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update-preliminary-checklist-observation-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div id="first-name-input-wrapper">
                                                                            <table class="table table-bordered table-striped" id="update_preliminary_observation_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="45%">{attribute_name module=oos attribute="check_points"}</th>
                                                                                        <th width="10%">{attribute_name module=oos attribute="yes_no_na"} <span class="vd_red">*</span></th>
                                                                                        <th width="45%">{attribute_name module=oos attribute="observation"} <span class="vd_red">*</span></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach name=list item=item key=key from=$preliminaryCheckListDetails}
                                                                                        <tr>
                                                                                            <input type="hidden" name="preliminary_checklist_object[]" value="{$item.objectId}">
                                                                                            <td>{$item.checkPoint}</td>
                                                                                            <td>
                                                                                                <select name="preliminary_yes_no_na[]" id="preliminary_yes_no_na{$item.count}" class="form-control" onchange="getPreliminaryObservation('{$item.count}', this.options[this.selectedIndex].value);" title="Select Valid Option">
                                                                                                    <option value="">Select </option>
                                                                                                    <option value="yes" {if $item.yesNoNa eq 'yes'} selected {/if}>Yes</option>
                                                                                                    <option value="no" {if $item.yesNoNa eq 'no'}selected {/if}>No</option>
                                                                                                    <option value="na" {if $item.yesNoNa eq 'na'}selected {/if}>NA</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>
                                                                                                <textarea placeholder="Enter the observation" disabled rows="4" class="width-100 required" name="preliminary_observation[]" id="preliminary_observation{$item.count}" title="Enter Valid Observation">{$item.observation}</textarea>
                                                                                            </td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="audit_trail_action" value="Preliminary Investigation Checklist Observation Updated">
                                                                        <input type="hidden" name="add_preliminary_observation">
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_preliminary_observation" id="add_preliminary_observation">Save</button>
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
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Add Preliminary Conclusion Accordion *}
            {if $enablePreliminaryInvestigationConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreviewdeptapprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapserequestreviewdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ADD PRILIMINARY INVESTIGATION CONCLUSION FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="add-preliminary-investigation-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add-preliminary-investigation-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="preliminary_investigation"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter the preliminary investigation details." rows="3" class="required" name="preliminary_investigation" id="preliminary_investigation" title="Enter Valid Investigation Details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="preliminary_investigation_conclusion"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter the conclusion." rows="3" class="required" name="preliminary_investigation_conclusion" id="preliminary_investigation_conclusion" title="Enter Valid Conclusion"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="target_date"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="generate_datepicker" placeholder="YYYY-MM-DD" name="target_date" title="Select Valid Target Date" data-datepicker_min="{date('Y-m-d')}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The preliminary investigation has been completed successfully." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Preliminary Investigation Concluded">
                                            <input type="hidden" name="add_preliminary_investigation_conclusion">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="add_preliminary_investigation_conclusion"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Target Date Extension Request Accordion *}
            {if $enableTargetDateExtensionRequest}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowextend">Target Date Extension Request <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseShowextend" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">TARGET DATE EXTENSION REQUEST FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="target-date-extension-request-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="target-date-extension-request-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="existing_target_date"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="width-80" placeholder="DD/MM/YY" name="existing_target_date" id="existing_target_date" value="{$existingTargetDate}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="proposed_target_date"} <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <input type="text" class="width-80 required generate_datepicker" data-datepicker_min="{$existingTargetDate}" placeholder="DD/MM/YY" name="proposed_target_date" id="proposed_target_date" title="Select Valid Date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="extension_reason"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Min 3 - Max 500" rows="3" class="required" name="reason" id="reason" title="Enter Valid Reason"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Min 3 - Max 500" rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Target Date Extension Request">
                                            <input type="hidden" name="add_extension_details">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="add_extension_details"><span class="menu-icon"> <i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Assign For QC Review  Accordion *}
            {if $enableQcReviewAssignForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreviewdeptapprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapserequestreviewdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN FOR QC REVIEW FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-qc-review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-qc-review-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red"> * </span></label>
                                                <div class="controls">
                                                    <select name="plant_id" onchange="get_access_rights_dept_list('{$oosDetailsObj->object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department_id');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$authorisedPlantList}
                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="department"} <span class="vd_red"> * </span></label>
                                                <div class="control">
                                                    <select name="department_id" id="department_id" onchange="get_action_users('{$lmDocumentId}', 'ip_invest', this.options[this.selectedIndex].value, '#user_id');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="user_name"} <span class="vd_red"> * </span></label>
                                                <div class="controls ">
                                                    <select name="user_id" id="user_id" title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly review the OOS." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Assigned For QC Review">
                                            <input type="hidden" name="assign_for_qc_review">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign-for-qc-review"><span class="menu-icon"> <i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QC Review Recall Accordion *}
            {if $enableRecallQcReview}
                {include file="templates/common/recall.tpl"}
            {/if}

            {* Enable QC Review Add Form Accordion *}
            {if $enableQcReviewAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseqcreview">Action
                                <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseqcreview" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QC REVIEW FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="qc-review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qc-review-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="action"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="qc_review_type" id="qc_review_type" title="Select Valid Review Type">
                                                        <option value="">Select</option>
                                                        <option value="qc_review">Review </option>
                                                        <option value="qc_review_need_correction">Review Need Correction</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4" id="update_is_assign_cause_identified_label" style="display:none">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_assign_cause_identified"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="is_assign_cause_identified" id="is_assign_cause_identified" title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4" id="update_is_further_invest_required_label" style="display:none">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_further_invest_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="is_further_invest_required" id="is_further_invest_required" title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_assign_cause_details_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="assign_cause_details"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter assign cause details" rows="2" name="assign_cause_details" id="assign_cause_details" title="Enter Valid Assignable Cause"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_comments_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Reviewed the OOS" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="QC Review">
                                            <input type="hidden" name="qc_reviewed">
                                            <input type="hidden" name="qc_review_correction">
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qc_reviewed" id="qc_reviewed" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Review</button>
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qc_review_correction" id="qc_review_correction" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Need Correction</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QA Review Assign Form Accordion *}
            {if $enableQaReviewAssignForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQareviewAssign">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQareviewAssign" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN FOR QA REVIEW FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-qa-review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-qa-review-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label  class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="plant_id" onchange="get_access_rights_dept_list('{$oosDetailsObj->object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department_id');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$authorisedPlantList}
                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option} </option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department_id" id="department_id" onchange="get_action_users('{$lmDocumentId}', 'qa_review', this.options[this.selectedIndex].value, '#user_id');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="user_name"} <span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="user_id" id="user_id" title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"}
                                                    <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly review the OOS." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Assigned For QA Review">
                                            <input type="hidden" name="assign_for_qa_review">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign-for-qa-review"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QA Review Recall Accordion *}
            {if $enableRecallQaReview}
                {include file="templates/common/recall.tpl"}
            {/if}

            {* Enable QA Review Add Form Accordion *}
            {if $enableQaReviewAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseqareview">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseqareview" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QA REVIEW FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="qa-review-form" method="post" action="{$smarty.server.REQUEST_URI}"
                                        class="form-horizontal" role="form" id="qa-review-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="action"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="qa_review_type" id="qa_review_type" title="Select Valid Review Type">
                                                        <option value="">Select</option>
                                                        <option value="qa_review">Review </option>
                                                        <option value="qa_review_need_correction">Review Need Correction </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_comments_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Reviewed the OOS" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="QA Review">
                                            <input type="hidden" name="qa_reviewed">
                                            <input type="hidden" name="qa_review_correction">
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qa_reviewed" id="qa_reviewed" style="display:none"><i  class="fa fa-fw fa-arrow-right"></i></span> Review</button>
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qa_review_correction" id="qa_review_correction" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Need Correction</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QC Approve Assigin Form *}
            {if $enableQcApproveAssiginForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQcApproveAssign">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQcApproveAssign" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN FOR QC APPROVE FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-qc-approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-qc-approve-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="plant_id" onchange="get_access_rights_dept_list('{$oosDetailsObj->object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department_id');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$authorisedPlantList}
                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department_id" id="department_id" onchange="get_action_users('{$lmDocumentId}', 'qc_approve', this.options[this.selectedIndex].value, '#user_id');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="user_name"} <span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="user_id" id="user_id" title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly approve the OOS." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Assigned For QC Approve">
                                            <input type="hidden" name="assign_for_qc_approve">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign-for-qc-approve"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QC Approve Recall Accordion *}
            {if $enableRecallQcApprove}
                {include file="templates/common/recall.tpl"}
            {/if}

            {* Enable QC Approve Add Form Accordion *}
            {if $enableQcApproveAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQcApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQcApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QC APPROVE FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="qc-approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qc-approve-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="action"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="qc_approve_type" id="qc_approve_type" title="Select Valid Review Type">
                                                        <option value="">Select</option>
                                                        <option value="qc_approve">Approve </option>
                                                        <option value="qc_approve_need_correction">Approve Need Correction</option>
                                                        <option value="qc_reject">Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_reason_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="reason_for_rejection"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter Reason for Rejection" rows="2" name="reason_for_rejection" id="reason_for_rejection" title="Enter Reason for Rejection"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_remarks_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Reviewed and Approved / Reviewed and suggested for corrections / Reviewed and Rejected due to unforeseen reasons" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="QC Approve">
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qc_approved" id="qc_approved" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Review</button>
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qc_approve_need_correction" id="qc_approve_need_correction" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Need Correction</button>
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qc_rejected" id="qc_rejected" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Reject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QA Approve Assigin Form Accordion *}
            {if $enableQaApproveAssiginForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQaApproveAssign">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQaApproveAssign" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN FOR QA APPROVE FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-qa-approve-form" method="post" action="{$smarty.server.REQUEST_URI}"
                                        class="form-horizontal" role="form" id="assign-qa-approve-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="plant_id" onchange="get_access_rights_dept_list('{$oosDetailsObj->object_id}', this.options[this.selectedIndex].value, '', 'yes', '#department_id');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$authorisedPlantList}
                                                            <option value="{$item.drop_down_value}">{$item.drop_down_option}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">{attribute_name module="oos" attribute="department"} <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department_id" id="department_id" onchange="get_action_users('{$lmDocumentId}', 'qa_approve', this.options[this.selectedIndex].value, '#user_id');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="user_name"}<span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="user_id" id="user_id" title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly approve the OOS." rows="3" class="required" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Assigned For QA Approve">
                                            <input type="hidden" name="assign_for_qa_approve">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign-for-qa-approve"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable QA Approve Add Form Accordion *}
            {if $enableQaApproveAddForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QA APPROVE FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="qa-approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="qa-approve-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="action"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="qa_approve_type" id="qa_approve_type" title="Select Valid Review Type">
                                                        <option value="">Select</option>
                                                        <option value="qa_approve">Approve </option>
                                                        <option value="qa_approve_need_correction">Approve Need Correction </option>
                                                        <option value="qa_reject">Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="update_oos_is_phase1_manufacturing_investigation_required_label" style="display: none;">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_manufacturing_investigation_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="is_phase1_mfg_invest_required" id="is_phase1_mfg_invest_required" title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes </option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="update_oos_is_capa_required_label" style="display: none;">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_capa_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="is_capa_required" id="is_capa_required" title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes </option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_qms_capa_no_label" style="display: none;">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="qms_capa_no"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="qms_capa_no" id="qms_capa_no" title="Enter QMS CAPA No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="manual_capa_no"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="manual_capa_no" id="manual_capa_no" title="Enter CAPA No">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_reason_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="reason_for_rejection"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter Reason for Rejection" rows="2" name="reason_for_rejection" id="reason_for_rejection" title="Enter Reason for Rejection"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="update_oos_remarks_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">announcy
                                                    <textarea placeholder="(e.g.) Reviewed and Approved / Reviewed and suggested for corrections / Reviewed and Rejected due to unforeseen reasons" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="QA Approve">
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qa_approved" id="qa_approved" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Approve</button>
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="qa_approve_need_correction" id="qa_approve_need_correction" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Need Correction</button>
                                            <button class="btn vd_bg-green vd_white" type="submit" name="qa_rejected" id="qa_rejected" style="display:none"><i class="fa fa-fw fa-arrow-right"></i></span> Reject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-1 Investigation Assign Form Accordion *}
            {if $enablePhase1InvestigationAssignForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1Investigation"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1Investigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        ADD CHECKLIST & ASSIGN ANALYST FOR PHASE-1 (RE-TESTING) INVESTIGATION FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_checklist_modal"><i class="fa fa-plus"></i> &nbsp;Add</button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add_checklist_modal" tabindex="-1" role="dialog" aria-labelledby="add_checklist_modal" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Add Checklist & Assign Analyst for Re-testing</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="add-phase1-checklist-analyst-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add-phase1-checklist-analyst-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped" id="add_phase1_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$oosCheckList}
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden" name="phase1_check_points[]" value="{$item.objectId}" id="{$item.checkPoints}"><label for="{$item.checkPoints}">{$item.checkPoints}</label>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <h4>
                                                                <span class="font-semibold"> Assign Analyst </span>
                                                                <button type="button" name="add_row" id="add_row" class="btn btn-info pull-right add_new_phase1_analyst"><i class="fa fa-plus"></i>&nbsp; Add Analyst</button>
                                                            </h4>
                                                            <br>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped"
                                                                        id="add_phase1_analyst_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="20%">{attribute_name module=oos attribute="department"}<span class="vd_red">*</span></th>
                                                                                <th width="20%">{attribute_name module=oos attribute="responsible_person"}<span lass="vd_red">*</span></th>
                                                                                <th width="10%">{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                    <input type="hidden" id="assign_p1_analyst_row_value">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="add_checklist_analyst">
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_checklist_analyst" id="add_checklist_analyst">Save Checklist & Analyst</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Preliminary Checklist Form -->
                                                    <form name="phase1-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal"  role="form" id="phase1-investigation-checklist-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="preliminary-investigation-checklist-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1CheckListDetails}
                                                                                <tr>
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger" onclick="deleteChecklistPoint(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="phase1-analyst-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="s_no"}</th>
                                                                                <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                                <th>{attribute_name module=oos attribute="department"}</th>
                                                                                <th width="5%">{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1AnalystDetails}
                                                                                <tr>
                                                                                    <input type="hidden" name="phase1_analyst_array[]" value="{$item.analystId}">
                                                                                    <input type="hidden" name="phase1_analyst_obj_array[]" value="{$item.objectId}">
                                                                                    <td>{$item.count}</td>
                                                                                    <td>{$item.analystName} </td>
                                                                                    <td>{$item.analystDepartment}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger" onclick="deleteAnalyst(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {if !empty($phase1AnalystDetails)}
                                                            <input type="hidden" name="audit_trail_action" value="Assigned to analyst for Phase-1 Re-testing">
                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="assign_phase1_analyst" id="assign_phase1_analyst"><i class="fa fa-send"></i>&nbsp; Submit </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-1 Investigation is in Progress Form *}
            {if $enablePhase1InvestigationIsInProgressForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1InvestigationTestResult"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1InvestigationTestResult" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        UPDATE PHASE-1 INVESTIGATION RESULT - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#test_modal"><i class="fa fa-plus"></i> &nbsp; Add</button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Phase-1 (Re-testing) Result</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update-phase1-retest-result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update-phase1-retest-result-form" autocomplete="off" enctype="multipart/form-data">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped" id="update_phase1_retest_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}</th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}</th>
                                                                                <th>{attribute_name module=oos attribute="upload"}</th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result_remarks"}<span class="vd_red"> * </span></th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1RetestAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="phase1_spec_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td><input type="file" name="phase1[][]" multiple></td>
                                                                                        <td>
                                                                                            <input type="number" min="0" placeholder="Enter the obtained result" class="width-80 required" name="phase1_obtained_result[]" value="{$item1.obtained_result}" title="Enter Valid Result">
                                                                                            <hr>
                                                                                            <textarea placeholder="Enter the obtained result's remarks" rows="2" class="width-80 required" name="phase1_obtained_result_remarks[]" title="Enter Valid Remarks">{$item1.obtained_result_remarks}</textarea>
                                                                                        </td>
                                                                                        {if !empty($item1.p1_fileobjectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a
                                                                                                        href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="update_phase1_test_result_and_remarks">
                                                                        <button class="btn vd_bg-green vd_white" type="submit" id="update_phase1_test_result_and_remarks"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span>Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Phase-1 Retest Result Form -->
                                                    <form name="display_phase1_retest_result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="display_phase1_retest_result-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase1_retest_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="remarks"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1RetestAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="p1_spec_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td>{$item1.obtained_result}</td>
                                                                                        <td>{$item1.obtained_result_remarks}</td>
                                                                                        {if !empty($item1.p1_fileobjectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {if !empty($submitPhase1ResultButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Update Test Results & Remarks">
                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="submit_phase1_retest_result" id="submit_phase1_retest_result"><i class="fa fa-send"></i>&nbsp; Submit </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-1 Checklist Updation Form Accordion *}
            {if $enablePhase1ChecklistUpdationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsep1checklistupdation"> Action </a> 
                        </h4>
                    </div>
                    <div id="collapsep1checklistupdation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        PHASE-1 CHECKLIST UPDATION - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Preliminary Checklist Form -->
                                                    <form name="phase1-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase1-checklist-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase1_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="45%">{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th width="10%">{attribute_name module=oos attribute="yes_no_na"}<span class="vd_red">*</span></th>
                                                                                <th width="45%">{attribute_name module=oos attribute="observation"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1CheckListDetails}
                                                                                <tr>
                                                                                    <input type="hidden" name="p1_check_points_obj[]" value="{$item.objectId}">
                                                                                    <td>
                                                                                        {$item.checkPoint}
                                                                                    </td>
                                                                                    <td>
                                                                                        <select name="p1_yes_no_na[]" id="p1_yes_no_na{$item.count}" class="form-control" onchange="getPhase1CheckPointObservation('{$item.count}', this.options[this.selectedIndex].value);" title="Select Valid Option">
                                                                                            <option value="">Select</option>
                                                                                            <option value="yes" {if $item.yesNoNa eq 'yes'} selected {/if}>Yes</option>
                                                                                            <option value="no" {if $item.yesNoNa eq 'no'} selected {/if}>No</option>
                                                                                            <option value="na" {if $item.yesNoNa eq 'na'} selected {/if}>NA</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea placeholder="Enter the observation" {if $item.yesNoNa eq 'yes'} {else} readonly {/if} rows="4" class="width-80 required" name="p1_observation[]" id="p1_observation{$item.count}" required title="Enter Valid Observation">{$item.observation}</textarea>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="phase1_checklist_save" id="phase1_checklist_save"><i class="fa fa-send"></i>&nbsp; Save </button>
                                                        {if !empty($submitChecklistCompletedButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Phase-1 Checklist completed.">
                                                            <button type="submit" class="btn vd_bg-green vd_white" name="phase1_checklist_completed" id="phase1_checklist_completed"><i class="fa fa-send"></i>&nbsp; Complete </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-1 Manufacturing Investigation Add checklist and Assign Analyst Form Accordion *}
            {if $enablePhase1ManufacturingInvestAddChecklistAndAssignAnalystForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseManufacturingInvestigation">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseManufacturingInvestigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ADD CHECKLIST & ASSIGN ANALYST FOR
                                        MANUFACTURING INVESTIGATION - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_checklist_modal"><i class="fa fa-plus"></i> &nbsp;Add </button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add_checklist_modal" tabindex="-1" role="dialog" aria-labelledby="add_checklist_modal" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Add Checklist & Assign Analyst for Manufacturing Investigation</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="assign-mfg-investigation-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-mfg-investigation-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <h4><span class="font-semibold"> Checklist </span></h4>
                                                                    <table class="table table-bordered table-striped" id="add_preliminary_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"} <span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$oosCheckList}
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden" name="p1_mfg_check_points[]" value="{$item.objectId}" id="{$item.checkPoints}">
                                                                                        <label for="{$item.checkPoints}">{$item.checkPoints}</label>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                            <h4><span class="font-semibold"> Assign Analyst </span></h4>

                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <div class="form-label font-semibold">{attribute_name module="oos" attribute="department"}</div>
                                                                    <select class="width-80" name="department" id="department" onchange="get_action_users('{$lmDocumentId}', '1p_mfg_invest', this.options[this.selectedIndex].value, '#p1_mfg_responsible_person')" title="Select Valid Department">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$allDepartmentList}
                                                                            <option value="{$key}">{$item} </option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-label font-semibold">{attribute_name module="oos" attribute="user_name"}</div>
                                                                    <select class="width-80" name="p1_mfg_responsible_person" id="p1_mfg_responsible_person" title="Select Valid Responsible Person">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_p1_mfg_analyst" id="add_p1_mfg_analyst">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Display Checklist Form -->
                                        <form name="manufacturing-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="manufacturing-investigation-checklist-form" autocomplete="off">
                                            <div class="form-group">
                                                <div class="col-md-12 mgtp-20">
                                                    <div class="mgtp-1">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="preliminary-investigation-checklist-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1ManufacturingCheckListDetails}
                                                                                <tr>
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger"  onclick="deleteChecklistPoint(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div id="first-name-input-wrapper">
                                                        <table class="table table-bordered table-striped" id="phase1-manufacturing-investigation-analyst-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module=oos attribute="s_no"}</th>
                                                                    <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                    <th>{attribute_name module=oos attribute="department"}</th>
                                                                    <th width="5%">{attribute_name module=oos attribute=action}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$phase1ManufacturingAnalystDetails}
                                                                    <tr>
                                                                        <input type="hidden" name="p1_mfg_analyst" value="{$item.analystId}">
                                                                        <td>{$item.count}</td>
                                                                        <td>{$item.analystName}</td>
                                                                        <td>{$item.analystDepartment}</td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-danger" onclick="deleteManufacturingInvestigationAnalyst(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {if !empty($phase1ManufacturingAnalystDetails)}
                                                <input type="hidden" name="audit_trail_action" value="Manufacturing Investigation, Added Check Points & Assigned analyst">
                                                <button type="submit" class="btn vd_btn vd_bg-green" name="assign_p1_mfg_investigation" id="assign_p1_mfg_investigation"><i class="fa fa-send"></i> &nbsp; Assign </button>
                                            {/if}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-1 Manufacturing Investigation Check List Update Form Accordion *}
            {if $enablePhase1ManufacturingInvestigationCheckListUpdateForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsep1checklistupdation"> Action </a> 
                        </h4>
                    </div>
                    <div id="collapsep1checklistupdation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        UPDATE MANUFACTURING INVESTIGATION OBSERVATION - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Manufacturing Investigation Checklist Form -->
                                                    <form name="phase1-manufacturing-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase1-manufacturing-investigation-checklist-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label">{attribute_name module="oos" attribute="manufacturing_investigation_details"}<span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper">
                                                                    <textarea placeholder="Enter the manufacturing investigation details" rows="5" name="manufacturing_investigation_details" id="manufacturing_investigation_details" required title="Enter Valid Details">{$phase1ManufacturingInvestigationDetailsObject->details}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase1_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="45%">{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th width="10%">{attribute_name module=oos attribute="yes_no_na"}<span class="vd_red">*</span></th>
                                                                                <th width="45%">{attribute_name module=oos attribute="observation"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase1ManufacturingCheckListDetails}
                                                                                <tr>
                                                                                    <input type="hidden" name="p1_mfg_check_points_obj[]" value="{$item.objectId}">
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <select name="p1_mfg_yes_no_na[]" id="p1_mfg_yes_no_na{$item.count}" class="form-control" onchange="getPhase1ManufacturingInvestigationCheckPointObservation('{$item.count}', this.options[this.selectedIndex].value);" title="Select Valid Option">
                                                                                            <option value="">Select</option>
                                                                                            <option value="yes"{if $item.yesNoNa eq 'yes'}selected {/if}>Yes</option>
                                                                                            <option value="no"{if $item.yesNoNa eq 'no'}selected {/if}>No</option>
                                                                                            <option value="na"{if $item.yesNoNa eq 'na'}selected {/if}>NA</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea placeholder="Enter the observation" {if $item.yesNoNa eq 'yes'} {else}readonly {/if} rows="4" class="width-80 required" name="p1_mfg_observation[]" id="p1_mfg_observation{$item.count}" required title="Enter Valid Observation">{$item.observation}</textarea>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="phase1_mfg_checklist_save" id="phase1_mfg_checklist_save"><i class="fa fa-send"></i>&nbsp; Save </button>
                                                        {if !empty($submitPhase1ManufacturingInvestigationCheckListCompletedButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Phase-1 Manufacturing Investigation Checklist completed.">
                                                            <button type="submit" class="btn vd_bg-green vd_white" name="phase1_mfg_checklist_completed" id="phase1_mfg_checklist_completed"><i class="fa fa-send"></i>&nbsp; Complete </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-1 Conclusion Form Accordion *}
            {if $enablePhase1ConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-1 CONCLUSION - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase1-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase1-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase1_error_type" id="phase1_error_type" title="Select Valid Error Type">
                                                        <option value="">Select</option> 
                                                        {foreach name=list item=item key=key from=$errorTypes}
                                                            <option value="{$item.objectId}">{$item.errorType}</option>
                                                        {/foreach}                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_class"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase1_error_classification" id="phase1_error_classification" title="Select Valid Error Classification">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$errorClassifications}
                                                            <option value="{$item.objectId}">{$item.type}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_reviewer_comments"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter Review Comments" rows="2" name="phase1_qc_reviewer_comments" id="phase1_qc_reviewer_comments" title="Enter Review Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Phase-1 investigation has been completed and concluded" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-1 Conclusion">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase1_conclusion_button" id="add_phase1_conclusion_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-1 Qc Verification Form Accordion *}
            {if $enablePhase1QcVerificationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1QcApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1QcApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-1 VERIFICATION (QC APPROVAL) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase1-qc-verification-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase1-qc-verification-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                                                                
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-1 investigation has been verified" rows="2" name="phase1_qc_approver_comments" id="phase1_qc_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly approve the Phase-1 investigation" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-1 Conclusion">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase1_qc_verification_button" id="add_phase1_qc_verification_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-1 Final Verification Form Accordion *}
            {if $enablePhase1FinalConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1QaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1QaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-1 VERIFICATION (QA APPROVER) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase1-final-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase1-final-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_assign_cause_identified"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p1_is_assign_cause_identified" id="p1_is_assign_cause_identified"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="update_p1_is_further_invest_required_label" style="display: none;">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_further_invest_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p1_is_further_invest_required" id="p1_is_further_invest_required"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>    
                                                        <option value="no">No</option>
                                                    </select>   
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="form-group" id="update_p1_assign_cause_details_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="assign_cause_details"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter assign cause details" rows="2" name="p1_assign_cause_details" id="p1_assign_cause_details" title="Enter Valid Assignable Cause"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qa_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Verified the Phase-1 investigation" rows="2" name="p1_qa_approver_comments" id="p1_qa_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-1 investigation has been verified and approved" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        {if $submitPhase1FinalConclusionButton }
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-1 Final Conclusion">   
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_phase1_final_conclusion_button" id="add_phase1_final_conclusion_button">Send</button>
                                        </div>
                                        {/if}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Retesting Investigation Add check list and Assign Analyst Form Accordion*}
            {if $phase2RetestingInvestigationAddCheckListAndAssignAnalystForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2RetestingInvestigation">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2RetestingInvestigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ADD CHECKLIST & ASSIGN ANALYST FOR PHASE-2 (RE-TESTING) - FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_phase2_checklist_modal"><i class="fa fa-plus"></i> &nbsp;Add </button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add_phase2_checklist_modal" tabindex="-1" role="dialog" aria-labelledby="add_phase2_checklist_modal" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Add Checklist & Assign Analyst for Manufacturing Investigation</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="phase2-retest-add-checklist-and-add-analyst-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-retest-add-checklist-and-add-analyst-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <h4><span class="font-semibold"> Checklist </span></h4>
                                                                    <table class="table table-bordered table-striped" id="add_phase2_retest_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$oosCheckList}
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden" name="phase2_retest_check_points[]" value="{$item.objectId}" id="{$item.checkPoints}">
                                                                                        <label for="{$item.checkPoints}">{$item.checkPoints}</label>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="form-label font-semibold">
                                                                        {attribute_name module=oos attribute=retesting_description}
                                                                    </div>
                                                                    <textarea placeholder="Enter Re-testing description" class="width-100" rows="5" name="retesting_description" id="retesting_description"   required title="Enter Valid Description">{$phase2RetestDescription}</textarea>
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <h4>
                                                                <span class="font-semibold"> Assign Analyst </span>
                                                                <button type="button" name="add_row" id="add_row" class="btn btn-info add_new_p2_rt_analyst" style="float: right; margin-bottom: 10px;"><i class="fa fa-plus"></i>&nbsp; Add</button>
                                                            </h4>

                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <table class="table table-bordered table-striped" id="add_phase2_retest_analyst_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="20%">{attribute_name module=oos attribute="department"}<span class="vd_red">*</span></th>
                                                                                    <th width="20%">{attribute_name module=oos attribute="responsible_person"}<span class="vd_red">*</span></th>
                                                                                    <th width="10%">{attribute_name module=oos attribute="action"}</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>                                                             
                                                            
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_phase2_retest_analyst" id="add_phase2_retest_analyst">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Display Checklist Form -->
                                        <form name="manufacturing-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="manufacturing-investigation-checklist-form" autocomplete="off">
                                            <div class="form-group">
                                                <div class="col-md-12 mgtp-20">
                                                    <div class="mgtp-1">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="phase2-retest-checklist-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2RetestCheckListDetails}
                                                                                <tr>
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger" onclick="deleteChecklistPoint(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div id="first-name-input-wrapper">
                                                        <table class="table table-bordered table-striped" id="phase2-retest-analyst-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module=oos attribute="s_no"}</th>
                                                                    <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                    <th>{attribute_name module=oos attribute="department"}</th>
                                                                    <th width="5%">{attribute_name module=oos attribute=action}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$phase2RetestAnalystDetails}
                                                                    <tr>                                                                        
                                                                        <input type="hidden" name="p2_rt_analyst_array[]" value="{$item.analystId}">
                                                                        <input type="hidden" name="p2_rt_analyst_obj_array[]" value="{$item.objectId}">
                                                                        <td>{$item.count}</td>
                                                                        <td>{$item.analystName}</td>
                                                                        <td>{$item.analystDepartment}</td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-danger" onclick="deletePhase2RetestAnalyst(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {if !empty($phase2RetestAnalystDetails)}
                                                <input type="hidden" name="audit_trail_action" value="Phase 2 Re-test, Added Check Points & Assigned analyst">
                                                <button type="submit" class="btn vd_btn vd_bg-green" name="assign_phase2_retest_analyst" id="assign_phase2_retest_analyst"><i class="fa fa-send"></i> &nbsp; Assign </button>
                                            {/if}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Retest Investigation is in Progress Form *}
            {if $enablePhase2RetesInvestigationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2InvestigationTestResult"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2InvestigationTestResult" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        UPDATE PHASE-2 INVESTIGATION RESULT - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#test_modal"><i class="fa fa-plus"></i> &nbsp; Add</button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Phase-2 (Re-testing) Result</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update-phase2-retest-result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update-phase2-retest-result-form" autocomplete="off" enctype="multipart/form-data">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped" id="update_phase2_retest_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}</th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}</th>
                                                                                <th>{attribute_name module=oos attribute="upload"}</th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result_remarks"}<span class="vd_red"> * </span></th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2RetestAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="phase2_retest_specification_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td><input type="file" name="phase1[][]" multiple></td>
                                                                                        <td>
                                                                                            <input type="number" min="0" placeholder="Enter the obtained result" class="width-80 required" name="phase2_retest_obtained_result[]" value="{$item1.obtained_result}" title="Enter Valid Result">
                                                                                            <hr>
                                                                                            <textarea placeholder="Enter the obtained result's remarks" rows="2" class="width-80 required" name="phase2_retest_obtained_result_remarks[]" title="Enter Valid Remarks">{$item1.obtained_result_remarks}</textarea>
                                                                                        </td>
                                                                                        {if !empty($item1.p1_fileobjectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a
                                                                                                        href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="update_phase2_retest_result_and_remarks">
                                                                        <button class="btn vd_bg-green vd_white" type="submit" id="update_phase2_retest_result_and_remarks"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span>Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Phase-1 Retest Result Form -->
                                                    <form name="display_phase1_retest_result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="display_phase1_retest_result-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase1_retest_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="remarks"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2RetestAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="p1_spec_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td>{$item1.obtained_result}</td>
                                                                                        <td>{$item1.obtained_result_remarks}</td>
                                                                                        {if !empty($item1.p1_fileobjectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {if !empty($submitPhase2ResultButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Update Phase 2 Resample Results & Remarks">
                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="submit_phase2_resample_result" id="submit_phase2_resample_result"><i class="fa fa-send"></i>&nbsp; Submit </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-2 Retest Checklist Updation Form Accordion *}
            {if $enablePhase2RetestChecklistUpdationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsep1checklistupdation"> Action </a> 
                        </h4>
                    </div>
                    <div id="collapsep1checklistupdation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        PHASE-2 (RE-TESTING) CHECKLIST UPDATION - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Preliminary Checklist Form -->
                                                    <form name="phase2-retest-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-retest-checklist-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase2_retest_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="45%">{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th width="10%">{attribute_name module=oos attribute="yes_no_na"}<span class="vd_red">*</span></th>
                                                                                <th width="45%">{attribute_name module=oos attribute="observation"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2RetestCheckListDetails}
                                                                                <tr>
                                                                                    <input type="hidden" name="phase2_retest_check_points_obj[]" value="{$item.objectId}">
                                                                                    <td>
                                                                                        {$item.checkPoint}
                                                                                    </td>
                                                                                    <td>
                                                                                        <select name="phase2_retest_yes_no_na[]" id="phase2_retest_yes_no_na{$item.count}" class="form-control" onchange="getPhase2RetestCheckPointObservation('{$item.count}', this.options[this.selectedIndex].value);" title="Select Valid Option">
                                                                                            <option value="">Select</option>
                                                                                            <option value="yes" {if $item.yesNoNa eq 'yes'} selected {/if}>Yes</option>
                                                                                            <option value="no" {if $item.yesNoNa eq 'no'} selected {/if}>No</option>
                                                                                            <option value="na" {if $item.yesNoNa eq 'na'} selected {/if}>NA</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea placeholder="Enter the observation" {if $item.yesNoNa eq 'yes'} {else} readonly {/if} rows="4" class="width-80 required" name="phase2_retest_observation[]" id="phase2_retest_observation{$item.count}" title="Enter Valid Observation">{$item.observation}</textarea>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="phase2_retest_checklist_save" id="phase2_retest_checklist_save"><i class="fa fa-send"></i>&nbsp; Save </button>
                                                        {if !empty($submitPhase2RetestChecklistCompletedButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Retest Checklist completed.">
                                                            <button type="submit" class="btn vd_bg-green vd_white" name="phase2_retest_checklist_completed" id="phase2_retest_checklist_completed"><i class="fa fa-send"></i>&nbsp; Complete </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-2 Retest Conclusion Form Accordion *}
            {if $enablePhase2RetestConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 (RE-TESTING) CONCLUSION - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-retest-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-retest-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase2_retest_error_type" id="phase2_retest_error_type" title="Select Valid Error Type">
                                                        <option value="">Select</option> 
                                                        {foreach name=list item=item key=key from=$errorTypes}
                                                            <option value="{$item.objectId}">{$item.errorType}</option>
                                                        {/foreach}                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_class"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase2_retest_error_classification" id="phase2_retest_error_classification" title="Select Valid Error Classification">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$errorClassifications}
                                                            <option value="{$item.objectId}">{$item.type}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_reviewer_comments"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter Review Comments" rows="2" name="phase2_retest_qc_reviewer_comments" id="phase2_retest_qc_reviewer_comments" title="Enter Review Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Phase-2 retest investigation has been completed and concluded" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Retest Conclusion">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase2_retest_conclusion_button" id="add_phase2_retest_conclusion_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Retest Qc Verification Form Accordion *}
            {if $enablePhase2RetestQcVerificationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1QcApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1QcApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 VERIFICATION (QC APPROVAL) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-qc-verification-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-qc-verification-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                                                                
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-2 (Re-testing) investigation has been verified" rows="2" name="phase2_qc_approver_comments" id="phase2_qc_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly approve the Phase-2 (Re-testing) investigation" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Qc Verification">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase2_qc_verification_button" id="add_phase2_qc_verification_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            
            {* Enable Phase-2 Retest Final Verification Form Accordion *}
            {if $enablePhase2RetestFinalConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase1QaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase1QaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 VERIFICATION (QA APPROVER) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-final-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-final-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_assign_cause_identified"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p2_is_assign_cause_identified" id="p2_is_assign_cause_identified"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="update_p2_is_further_invest_required_label" style="display: none;">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_further_invest_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p2_is_further_invest_required" id="p2_is_further_invest_required"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>    
                                                        <option value="no">No</option>
                                                    </select>   
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="form-group" id="update_p2_assign_cause_details_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="assign_cause_details"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter assign cause details" rows="2" name="p2_assign_cause_details" id="p2_assign_cause_details" title="Enter Valid Assignable Cause"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qa_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Verified the Phase-2 investigation" rows="2" name="p2_qa_approver_comments" id="p2_qa_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-2 investigation has been verified and approved" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Final Conclusion">   
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_phase2_final_conclusion_button" id="add_phase2_final_conclusion_button">Send</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Resample Investigation Add check list and Assign Analyst Form Accordion*}
            {if $phase2ResampleInvestigationAddChecklistAssignAnalystForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2RetestingInvestigation">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2RetestingInvestigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ADD CHECKLIST & ASSIGN ANALYST FOR PHASE-2 (RE-SAMPLING) - FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_phase2_re_sample_checklist_modal"><i class="fa fa-plus"></i> &nbsp;Add </button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add_phase2_re_sample_checklist_modal" tabindex="-1" role="dialog" aria-labelledby="add_phase2_re_sample_checklist_modal" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Add Checklist & Assign Analyst for Phase 2 (Re-sampling)</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="phase2-resample-add-checklist-and-add-analyst-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-resample-add-checklist-and-add-analyst-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <h4><span class="font-semibold"> Checklist </span></h4>
                                                                    <table class="table table-bordered table-striped" id="add_phase2_resample_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$oosCheckList}
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden" name="phase2_resample_check_points[]" value="{$item.objectId}" id="{$item.checkPoints}">
                                                                                        <label for="{$item.checkPoints}">{$item.checkPoints}</label>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="form-label font-semibold">{attribute_name module=oos attribute=resampling_description} <span class="vd_red">*</span></div>
                                                                    <textarea placeholder="Enter Re-sampling description" class="width-100" rows="5" name="resampling_description" id="resampling_description"   required title="Enter Valid Description">{$phase2ResampleDetailsObject->resampling_description}</textarea>
                                                                </div>
                                                            </div>                                                            

                                                            <div class="form-group">
                                                                <div class="col-sm-6">                                                                    
                                                                    <label class="control-label">{attribute_name module="oos" attribute="processing_stage"} <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <select name="process_stage_id" id="process_stage_id" title="Select Valid Process Stage">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$processStageList}
                                                                                <option value="{$item.object_id}" {if $item.object_id eq $phase2ResampleDetailsObject->process_stage_id} selected{/if} >{$item.process_stage}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">                                                                    
                                                                    <label class="control-label">{attribute_name module="oos" attribute="batch_no"} <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="required" value="{$phase2ResampleDetailsObject->batch_no}" placeholder="Min 3 - Max 40" name="batch_no" id="batch_no" required title="Enter Valid Batch No" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-6">
                                                                    <label class="control-label">{attribute_name module="oos" attribute="ar_no"} <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="required" value="{$phase2ResampleDetailsObject->ar_no}" placeholder="Min 3 - Max 40"  name="ar_no" id="ar_no" required title="Enter Valid AR No">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="control-label">{attribute_name module="oos" attribute="sample_quantity"} <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text"  class="required" value="{$phase2ResampleDetailsObject->quantity}" placeholder="Min 3 - Max 40" name="sample_quantity" id="sample_quantity" required title="Enter Valid Sample Quantity">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <h4>
                                                                <span class="font-semibold"> Assign Analyst </span>
                                                                <button type="button" name="add_row" id="add_row" class="btn btn-info add_new_phase2_resample_analyst" style="float: right; margin-bottom: 10px;"><i class="fa fa-plus"></i>&nbsp; Add</button>
                                                            </h4>

                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <table class="table table-bordered table-striped" id="add_phase2_resample_analyst_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="20%">{attribute_name module=oos attribute="department"}<span class="vd_red">*</span></th>
                                                                                    <th width="20%">{attribute_name module=oos attribute="responsible_person"}<span class="vd_red">*</span></th>
                                                                                    <th width="10%">{attribute_name module=oos attribute="action"}</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>                                                             
                                                            
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_phase2_resample_analyst" id="add_phase2_resample_analyst">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Display Checklist Form -->
                                        <form name="manufacturing-investigation-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="manufacturing-investigation-checklist-form" autocomplete="off">
                                            <div class="form-group">
                                                <div class="col-md-12 mgtp-20">
                                                    <div class="mgtp-1">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="phase2-retest-checklist-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th>{attribute_name module=oos attribute="action"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2ResampleCheckListDetails}
                                                                                <tr>
                                                                                    <td>{$item.checkPoint}</td>
                                                                                    <td>
                                                                                        <button type="button" class="btn btn-danger" onclick="deleteChecklistPoint(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div id="first-name-input-wrapper">
                                                        <table class="table table-bordered table-striped" id="phase2-retest-analyst-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{attribute_name module=oos attribute="s_no"}</th>
                                                                    <th>{attribute_name module=oos attribute="analyst"}</th>
                                                                    <th>{attribute_name module=oos attribute="department"}</th>
                                                                    <th width="5%">{attribute_name module=oos attribute=action}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {foreach name=list item=item key=key from=$phase2ResampleAnalystDetails}
                                                                    <tr>                                                                        
                                                                        <input type="hidden" name="p2_rs_analyst_array[]" value="{$item.analystId}">
                                                                        <input type="hidden" name="p2_rs_analyst_obj_array[]" value="{$item.objectId}">
                                                                        <td>{$item.count}</td>
                                                                        <td>{$item.analystName}</td>
                                                                        <td>{$item.analystDepartment}</td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-danger" onclick="deletePhase2RetestAnalyst(this, '{$item.objectId}')"><i class="fa fa-times"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                {/foreach}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {if !empty($phase2ResampleAnalystDetails)}
                                                <input type="hidden" name="audit_trail_action" value="Phase 2 Re-sample, Added Check Points & Assigned analyst">
                                                <button type="submit" class="btn vd_btn vd_bg-green" name="assign_phase2_retest_analyst" id="assign_phase2_retest_analyst"><i class="fa fa-send"></i> &nbsp; Assign </button>
                                            {/if}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Resample Investigation is in Progress Form Accordion*}
            {if $enablePhase2ResampleForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2InvestigationTestResult"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2InvestigationTestResult" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        UPDATE PHASE-2 (RE-SAMPLING) INVESTIGATION RESULT - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#test_modal"><i class="fa fa-plus"></i> &nbsp; Add</button>
                                                <button type="button" class="btn btn-info page_reload"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_ModalLabel">Phase-2 (Re-sampling) Result</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update-phase2-resample-result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update-phase2-resample-result-form" autocomplete="off" enctype="multipart/form-data">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                                Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-striped" id="update_phase2_resample_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}</th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}</th>
                                                                                <th>{attribute_name module=oos attribute="upload"}</th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result_remarks"}<span class="vd_red"> * </span></th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2ResampleAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="phase2_retest_specification_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td><input type="file" name="phase2[][]" multiple></td>
                                                                                        <td>
                                                                                            <input type="number" min="0" placeholder="Enter the obtained result" class="width-80 required" name="phase2_resample_obtained_result[]" value="{$item1.obtained_result}" title="Enter Valid Result">
                                                                                            <hr>
                                                                                            <textarea placeholder="Enter the obtained result's remarks" rows="2" class="width-80 required" name="phase2_resample_obtained_result_remarks[]" title="Enter Valid Remarks">{$item1.obtained_result_remarks}</textarea>
                                                                                        </td>
                                                                                        {if !empty($item1.p1_fileobjectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a
                                                                                                        href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="update_phase2_resample_result_and_remarks">
                                                                        <button class="btn vd_bg-green vd_white" type="submit" id="update_phase2_resample_result_and_remarks"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span>Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Phase-1 Retest Result Form -->
                                                    <form name="display-phase2-resample-result-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="display-phase2-resample-result-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase2_resample_result_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=oos attribute="test_name"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="specification_limit"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="obtained_result"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="remarks"}
                                                                                </th>
                                                                                <th>{attribute_name module=oos attribute="attachment"}
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2ResampleAnalystDetailsArray}
                                                                                {foreach name=spec_results item=item1 key=key1 from=$item.analyst_spec_result_details}
                                                                                    <tr>
                                                                                        <input type="hidden" name="p2_spec_result_obj_array[]" value="{$item1.object_id}">
                                                                                        <td>{$item1.test_name}</td>
                                                                                        <td>{$item1.spec_limit}</td>
                                                                                        <td>{$item1.obtained_result}</td>
                                                                                        <td>{$item1.obtained_result_remarks}</td>
                                                                                        {if !empty($item1.p1_fileobjsubmit_phase2_retest_resultectarray)}
                                                                                            <td>
                                                                                                {foreach name=file_array item=item2 key=key2 from=$item1.p1_fileobjectarray}
                                                                                                    <a href="?module=file&action=view_request_file&file_id={$item2.object_id}"><span class="glyphicon glyphicon-download-alt" style="color:blue"></span>
                                                                                                        <font color="blue">{$item2.name}</font>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                {/foreach}
                                                                                            </td>
                                                                                        {else}
                                                                                            <td>-</td>
                                                                                        {/if}
                                                                                    </tr>
                                                                                {/foreach}
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {if !empty($submitPhase2ResampleResultButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Update Phase 2 Resample Results & Remarks">
                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="submit_phase2_resample_result" id="submit_phase2_resample_result"><i class="fa fa-send"></i>&nbsp; Submit </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-2 Resample Checklist Update Form Accordion*}
            {if $enablePhase2ResampleChecklistUpdationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsep2checklistupdation"> Action </a> 
                        </h4>
                    </div>
                    <div id="collapsep2checklistupdation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">
                                        PHASE-2 (RE-SAMPLING) CHECKLIST UPDATION - FORM
                                    </h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12 mgtp-20">
                                                <div class="mgtp-1">
                                                    <!-- Display Preliminary Checklist Form -->
                                                    <form name="phase2-resample-checklist-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-resample-checklist-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                                            Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div id="first-name-input-wrapper">
                                                                    <table class="table table-bordered table-striped" id="display_phase2_resample_checklist_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="45%">{attribute_name module=oos attribute="check_points"}</th>
                                                                                <th width="10%">{attribute_name module=oos attribute="yes_no_na"}<span class="vd_red">*</span></th>
                                                                                <th width="45%">{attribute_name module=oos attribute="observation"}<span class="vd_red">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach name=list item=item key=key from=$phase2ResampleCheckListDetails}
                                                                                <tr>
                                                                                    <input type="hidden" name="phase2_resample_check_points_obj[]" value="{$item.objectId}">
                                                                                    <td>
                                                                                        {$item.checkPoint}
                                                                                    </td>
                                                                                    <td>
                                                                                        <select name="phase2_resample_yes_no_na[]" id="phase2_resample_yes_no_na{$item.count}" class="form-control" onchange="getPhase2ResampleCheckPointObservation('{$item.count}', this.options[this.selectedIndex].value);" title="Select Valid Option">
                                                                                            <option value="">Select</option>
                                                                                            <option value="yes" {if $item.yesNoNa eq 'yes'} selected {/if}>Yes</option>
                                                                                            <option value="no" {if $item.yesNoNa eq 'no'} selected {/if}>No</option>
                                                                                            <option value="na" {if $item.yesNoNa eq 'na'} selected {/if}>NA</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea placeholder="Enter the observation" {if $item.yesNoNa eq 'yes'} {else} readonly {/if} rows="4" class="width-80 required" name="phase2_resample_observation[]" id="phase2_resample_observation{$item.count}" title="Enter Valid Observation">{$item.observation}</textarea>
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="phase2_resample_checklist_save" id="phase2_resample_checklist_save"><i class="fa fa-send"></i>&nbsp; Save </button>
                                                        {if !empty($submitPhase2ResampleChecklistCompletedButton)}
                                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Resample Checklist completed.">
                                                            <button type="submit" class="btn vd_bg-green vd_white" name="phase2_resample_checklist_completed" id="phase2_resample_checklist_completed"><i class="fa fa-send"></i>&nbsp; Complete </button>
                                                        {/if}
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
            {/if}

            {* Enable Phase-2 Resample Conclusion Form Accordion *}
            {if $enablePhase2ResampleConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseQCApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseQCApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 (RE-SAMPLING) CONCLUSION - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-resample-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-resample-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_type"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase2_resample_error_type" id="phase2_resample_error_type" title="Select Valid Error Type">
                                                        <option value="">Select</option> 
                                                        {foreach name=list item=item key=key from=$errorTypes}
                                                            <option value="{$item.objectId}">{$item.errorType}</option>
                                                        {/foreach}                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">{attribute_name module="oos" attribute="error_class"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="phase2_resample_error_classification" id="phase2_resample_error_classification" title="Select Valid Error Classification">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$errorClassifications}
                                                            <option value="{$item.objectId}">{$item.type}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_reviewer_comments"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Enter Review Comments" rows="2" name="phase2_resample_qc_reviewer_comments" id="phase2_resample_qc_reviewer_comments" title="Enter Review Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Phase-2 resample investigation has been completed and concluded" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Resample Conclusion">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase2_resample_conclusion_button" id="add_phase2_resample_conclusion_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            
            {* Enable Phase-2 Resample Qc Verification Form Accordion *}
            {if $enablePhase2ResampleQcVerificationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2QcApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2QcApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 (RE-SAMPLING) VERIFICATION (QC APPROVAL) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-resample-qc-verification-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-resample-qc-verification-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                                                                
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qc_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-2 (Re-sampling) investigation has been verified" rows="2" name="phase2_resample_qc_approver_comments" id="phase2_resample_qc_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly approve the Phase-2 (Re-sampling) investigation" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Resample Qc Verification">                                            
                                            <button class="btn vd_bg-green vd_white" type="submit" name="add_phase2_resample_qc_verification_button" id="add_phase2_resample_qc_verification_button"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-2 Resample Final Verification Form Accordion *}
            {if $enablePhase2ResampleFinalConclusionForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase2QaApprove">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase2QaApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-2 (RE-SAMPLING) VERIFICATION (QA APPROVER) - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase2-resample-final-conclusion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase2-resample-final-conclusion-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_assign_cause_identified"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p2_is_assign_cause_identified" id="p2_is_assign_cause_identified"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="update_p2_is_further_invest_required_label" style="display: none;">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_further_invest_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="p2_is_further_invest_required" id="p2_is_further_invest_required"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>    
                                                        <option value="no">No</option>
                                                    </select>   
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="form-group" id="update_p2_assign_cause_details_label" style="display:none">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="assign_cause_details"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter assign cause details" rows="2" name="p2_assign_cause_details" id="p2_assign_cause_details" title="Enter Valid Assignable Cause"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="qa_approver_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Verified the Phase-2 resampling investigation" rows="2" name="p2_qa_approver_comments" id="p2_qa_approver_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-2 resampling investigation has been verified and approved" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Phase-2 Final Conclusion">   
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_phase2_resample_final_conclusion_button" id="add_phase2_resample_final_conclusion_button">Send</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable Phase-3 Investigation Form Accordion *}
            {if $enablePhase3InvestigationForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhase3Investigation">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapsePhase3Investigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PHASE-3 INVESTIGATION - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="phase3-investigation-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="phase3-investigation-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="oos" attribute="is_cft_review_required"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="width-80" name="cft_review_required" id="cft_review_required"  title="Select Valid Option">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                            </div>                                                                                       
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="review_of_lab_investigation"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter the review of lab investigation" rows="2" name="lab_investigation_review" id="lab_investigation_review" title="Enter Valid Assignable Cause"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="review_of_manufacturing_investigation"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter the review of manufacturing investigation" rows="2" name="manufacturing_investigation_review" id="manufacturing_investigation_review" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="assign_cause_details"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter the assign cause details" rows="2" name="assign_cause_details" id="assign_cause_details" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="closure_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Verified the Phase-3 investigation" rows="2" name="closure_comments" id="closure_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Phase- 3 investigation has been completed" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">                                             
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_phase3_investigation_button" id="add_phase3_investigation_button">Send</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable cft review assign Form Accordion *}
            {if $requestCftReviewForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestcftreview">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapserequestcftreview" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN FOR CFT COMMENTS - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="assign-cft-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign-cft-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="alert alert-success vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12" >
                                                <label class="control-label col-sm-2">{attribute_name module="oos" attribute="department"}</label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                    <select class="width-80" name="department" id="department" onchange = "get_dept_cft_review_users(this.options[this.selectedIndex].value);"  title="Select Valid Department">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$departmentList}
                                                            <option value="{$item['department_id']}">{$item['department']} </option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>    
                                        </div>  
                                        <div class="form-group">
                                            <div class="col-md-12" >
                                                <label class="control-label col-sm-2">{attribute_name module="oos" attribute="user_name"}<span class="vd_red">*</span> </label>
                                                <div class="col-xs-4">
                                                    <select name="cft_review_from[]" id="cft_review_from_users" class="cft_review_users form-control" size="7" multiple="multiple"></select>
                                                </div>
                                                <div class="col-xs-1"><br>
                                                    <button type="button" id="cft_review_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                    <button type="button" id="cft_review_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                    <button type="button" id="cft_review_from_users_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                    <button type="button" id="cft_review_from_users_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                </div>
                                                <div class="col-xs-4">
                                                    <select name="cft_review_to[]" id="cft_review_from_users_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-md-12" >
                                                <label class="control-label  col-sm-2">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                    <textarea placeholder="(e.g.) Kindly provide your comments" rows="2" class="width-80 required" name="oos_comments" id="oos_comments"  required title="Enter Valid Remarks" ></textarea>
                                                </div>
                                            </div>    
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                    <input type="hidden" name="audit_trail_action" value="CFT Review">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="assign_cft_review" id="assign_cft_review" >Send </button>
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

            {* Enable CFT Review Recall Accordion *}
            {if $enableRecallCftReview}
                {include file="templates/common/recall.tpl"}
            {/if}

            {* Enable cft review Form Accordion *}
            {if $enableCftReviewForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseCftComment">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseCftComment" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">CFT COMMENTS - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="cft-comment-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="cft-comment-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="review_comments"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter your comment" rows="2" name="review_comments" id="review_comments" title="Enter Valid Comments"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) The Phase-2 resampling investigation has been verified and approved" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="CFT Reviewed">   
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="cft_reviewed" id="cft_reviewed">Send</button>
                                        </div>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {* Enable close-out Form Accordion *}
            {if $enableCloseOutForm}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseClose">Action <i class="fa  fa-exclamation-triangle vd_white"></i></a>
                        </h4>
                    </div>
                    <div id="collapseClose" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">CLOSE-OUT - FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Request Pre Review Form -->
                                    <form name="close-out-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="close-out-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                                            Change a few things up and try submitting again.
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="impact_assesment"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter impact assesment" rows="2" name="impact_assessment" id="impact_assessment" title="Enter Valid Details"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="risk_assesment"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter risk assesment" rows="2" name="risk_assessment" id="risk_assessment" title="Enter Valid Details"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="final_closure_conclusion"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="Enter impact assesment" rows="2" name="final_closure_conclusion" id="final_closure_conclusion" title="Enter Valid Conclusion"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="remarks"} <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) OOS has been initiated and Preliminary investigation / Phase-1, Phase-2 (Re-testing) / Phase-2 (Re-sampling) / Phase-3 investigation has been done. All the result was verified and OOS was Accepted / Rejected" rows="2" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Close Out">   
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="submit_close_out" id="submit_close_out">Send</button>
                                        </div>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}










            

        </div>
    </div>
</div>





<!-- Start Of Task History Modal -->
<div class="modal fade" id="modal_task_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog width-90">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Task History</h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="show_task_history_thead"></thead>
                </table>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-4">{attribute_name module="dms" attribute="sec_resp_per"}</th>
                            <th class="col-md-4">{attribute_name module="dms" attribute="pri_resp_per"}</th>
                            <th class="col-md-4">{attribute_name module="dms" attribute="task_review"}</th>
                        </tr>
                    </thead>
                    <tbody class="show_task_history_tbody"></tbody>
                </table>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="show_task_history_thead_qa"></thead>
                </table>
            </div>
            <div class="modal-footer background-login">
            </div>
        </div>
    </div>
</div>
<!-- End Of Task History Modal -->



<!-- Start Of Task Attachments Modal -->
<div class="modal fade" id="modal_task_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Task Attachments <span
                        class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped table-hover show_task_attachments_table">
                    <thead>
                        <tr>
                            <th>{attribute_name module="file" attribute="name"}</th>
                            <th>{attribute_name module="file" attribute="size"}</th>
                            <th>{attribute_name module="file" attribute="attached_by"}</th>
                            <th>{attribute_name module="file" attribute="date"}</th>
                            <th class="show_task_attachments_action">{attribute_name module="admin" attribute="action"}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="show_task_attachments_tbody"></tbody>
                </table>
                <div class="alert alert-danger alert-dismissable alert-condensed no_attachments mgbt-md-0"
                    style="display:none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i
                            class="icon-cross"></i></button>
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
        // Notification 
        $(document).ready(function() {
            notification("topright", "success", "fa fa-info-circle vd_blue", "Status", `${$("#status").val()} - [${$("#wf_status").val()}]`);
        });

        // Edit Basic Details Form Validation
        $(document).ready(function() {
            "use strict";
            $('#edit-basic-details-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    date_of_occurrence: {
                        required: true
                    },
                    time_of_occurrence: {
                        required: true
                    },
                    specification_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    test_procedure_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ar_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    description: {
                        minlength: 3,
                        maxlength: 500,
                        required: true,
                    },
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#edit-basic-details-form')).fadeIn(500);
                    scrollTo($('#edit-basic-details-form'), -100);
                },
                submitHandler: function(form) {
                    $('#update-basic-info').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Edit Test Result & Remarks Form Validation
        $(document).ready(function() {
            "use strict";
            $('#edit-test-result-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#edit-test-result-form')).fadeIn(500);
                    scrollTo($('#edit-test-result-form'), -100);
                },
                submitHandler: function(form) {
                    var input_value = ["obtained_result[]", "obtained_result_remarks[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification('e', 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var tf_auditor_input_rowcounts = $('#edit_prelim_test_result_table tr').length;
                    if (tf_auditor_input_rowcounts <= 1) {
                        show_notification("e", 'topright', "File Deleted Successfully");
                        return false;
                    }

                    $('#update-basic-info').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Delete document file 
        $(document).on("click", ".delete_file", function() {
            var c_this = this;
            x_delete_doc_file($(this).data('file_id'), $("#oos_object_id").val(), function(result) {
                if (result == "true") {
                    show_notification("s", 'topright', "File Deleted Successfully");
                    $(c_this).closest('tr').remove();
                } else {
                    show_notification("e", 'topright', "File Not Deleted.Invalid Request Called");
                }
            });
        });

        // Assign For Preliminary Investigation Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-preliminary-investigation-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant_id: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    wf_remarks: {
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign-preliminary-investigation-form')).fadeIn(500);
                    scrollTo($('#assign-preliminary-investigation-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-to-preliminary-investigation').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // Checklist Point Delete Function
        function deleteChecklistPoint(param, objectId) {
            x_deleteChecklistPoint(objectId, delete_msg);
            $(param).closest('tr').remove();

            let table = document.getElementById("preliminary-investigation-checklist-table");
            let tbodyRowCount = table.tBodies[0].rows.length; // 3
            if (tbodyRowCount <= 0) {
                $('#submit_preliminary_checklist').remove();
            }
        }

        // Show Message After Delete Action 
        function delete_msg(result) {
            if (result == "true") {
                var msg =
                    '<p class="fa fa-check-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Deleted Successfully';
                $.notific8(msg, {theme: 'teal', life: 2000});
            }
            if (result == "false") {
                var msg =
                    '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Failed...';
                $.notific8(msg, {theme: 'ruby', life: 2000});
            }
        }

        // Preliminary Observation Conditions
        function getPreliminaryObservation(count, value) {
            let observation = "#preliminary_observation" + count;

            $(observation).val('');
            if (value == "yes") {
                $(observation).prop({'readonly':false, 'disabled': false});
            }
            if (value == "no") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("-");
            }
            if (value == "na") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("NA");
            }
        }

        // Add Preliminary Observation Form Validation
        $(document).ready(function() {
            "use strict";
            $('#update-preliminary-checklist-observation-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#update-preliminary-checklist-observation-form')).fadeIn(500);
                    scrollTo($('#update-preliminary-checklist-observation-form'), -100);
                },
                submitHandler: function(form) {

                    var yesNo = document.getElementsByName('preliminary_yes_no_na[]');
                    var observation = document.getElementsByName('preliminary_observation[]');

                    for (let j = 0; j < yesNo.length; j++) {
                        if (yesNo[j].value == "") {
                            show_notification('e', 'topright', yesNo[j].title);
                            yesNo[j].focus();
                            yesNo[j].style.borderColor = 'red';
                            return false;
                        } else {
                            yesNo[j].style.borderColor = '#ccc';
                        }

                        if (yesNo[j].value == "yes" && observation[j].value == "") {
                            show_notification('e', 'topright', observation[j].title);
                            observation[j].focus();
                            observation[j].style.borderColor = 'red';
                            return false;
                        }
                    }

                    $('#add_preliminary_observation').attr("disabled", true);
                    loading.show();
                    form.submit();

                }
            });
        });

        // Add Preliminary Investigation Conclusion Form Validation
        $(document).ready(function() {
            "use strict";
            $('#add-preliminary-investigation-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    preliminary_investigation: {
                        required: true,
                        minlength: 3,
                    },
                    preliminary_investigation_conclusion: {
                        required: true,
                        minlength: 3,
                    },
                    target_date: {
                        required: true
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3
                    },
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#add-preliminary-investigation-conclusion-form')).fadeIn(500);
                    scrollTo($('#add-preliminary-investigation-conclusion-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_preliminary_investigation_conclusion').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Assign For QC Review Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-qc-review-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant_id: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    wf_remarks: {
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign-qc-review-form')).fadeIn(500);
                    scrollTo($('#assign-qc-review-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-for-qc-review').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // Target Date Extension Request Form Validation
        $(document).ready(function() {
            "use strict";
            $('#target-date-extension-request-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    proposed_target_date: {
                        required: true
                    },
                    reason: {
                        minlength: 3,
                        required: true
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#target-date-extension-request-form')).fadeIn(500);
                    scrollTo($('#target-date-extension-request-form'), -100);
                },
                submitHandler: function(form) {
                    $('#target-date-extension-request-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // QC Review Form Validation
        $(document).ready(function() {
            "use strict";
            $('#qc-review-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    qc_review_type: {
                        required: true,
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event,
                    validator) { // display error alert on form submit             
                    $('.alert-danger', $('#qc-review-form')).fadeIn(500);
                    scrollTo($('#qc-review-form'), -100);
                },
                submitHandler: function(form) {
                    let reviewType = $('#qc_review_type').val();
                    let isAssignableCauseIdentified = $('#is_assign_cause_identified').val();
                    let isFurtherInvestigationRequired = $('#is_further_invest_required').val();
                    let assignableCauseDetails = $('#assign_cause_details').val();

                    if (reviewType == 'qc_review' && isAssignableCauseIdentified == '') {
                        show_notification("e", 'topright', "Select Valid Option");
                        return false;
                    }

                    if (reviewType == 'qc_review' && isAssignableCauseIdentified == 'yes' &&
                        assignableCauseDetails == '') {
                        show_notification("e", 'topright', "Enter Assign Cause Details");
                        return false;
                    }

                    if (reviewType == 'qc_review' && isAssignableCauseIdentified == 'no' &&
                        isFurtherInvestigationRequired == '') {
                        show_notification("e", 'topright', "Select Valid Option");
                        return false;
                    }

                    $('#qc-review-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });

            $("#qc_review_type").change(function() {
                if (this.value == "qc_review") {
                    $('#qc_reviewed').show();
                    $('#qc_review_correction').hide();
                    $('#update_is_assign_cause_identified_label').show();
                    $('#update_oos_comments_label').show();
                }
                if (this.value == "qc_review_need_correction") {
                    $('#qc_reviewed').hide();
                    $('#qc_review_correction').show();
                    $('#update_is_assign_cause_identified_label').hide();
                    $('#update_assign_cause_details_label').hide();
                    $('#update_is_further_invest_required_label').hide();
                    $('#update_oos_comments_label').show();
                }
                if (this.value == "") {
                    $('#qc_reviewed').hide();
                    $('#qc_review_correction').hide();
                    $('#update_is_assign_cause_identified_label').hide();
                    $('#update_assign_cause_details_label').hide();
                    $('#update_is_further_invest_required_label').hide();
                    $('#update_oos_comments_label').hide();
                }
            });

            $("#is_assign_cause_identified").change(function() {
                if (this.value == "no") {
                    $('#update_is_further_invest_required_label').show();
                    $('#update_assign_cause_details_label').hide();
                }
                if (this.value == "yes") {
                    $('#update_is_further_invest_required_label').hide();
                    $('#update_assign_cause_details_label').show();

                }
                if (this.value == "") {
                    $('#update_is_further_invest_required_label').hide();
                    $('#update_assign_cause_details_label').hide();
                }
            });
        });

        // Assign For QA Review Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-qa-review-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant_id: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    wf_remarks: {
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign-qa-review-form')).fadeIn(500);
                    scrollTo($('#assign-qa-review-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-for-qa-review').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // QA Review Form Validation
        $(document).ready(function() {
            "use strict";
            $('#qa-review-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    qa_review_type: {
                        required: true,
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event,
                    validator) { // display error alert on form submit             
                    $('.alert-danger', $('#qa-review-form')).fadeIn(500);
                    scrollTo($('#qa-review-form'), -100);
                },
                submitHandler: function(form) {
                    $('#qa-review-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });

            $("#qa_review_type").change(function() {
                if (this.value == "qa_review") {
                    $('#qa_reviewed').show();
                    $('#qa_review_correction').hide();
                    $('#update_oos_comments_label').show();
                }
                if (this.value == "qa_review_need_correction") {
                    $('#qa_reviewed').hide();
                    $('#qa_review_correction').show();
                    $('#update_oos_comments_label').show();
                }
                if (this.value == "") {
                    $('#qa_reviewed').hide();
                    $('#qa_review_correction').hide();
                    $('#update_oos_comments_label').hide();
                }
            });
        });

        // Assign For QC Approve Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-qc-approve-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant_id: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    wf_remarks: {
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign-qc-approve-form')).fadeIn(500);
                    scrollTo($('#assign-qc-approve-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-for-qc-approve').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // QC Approve Form Validation
        $(document).ready(function() {
            "use strict";
            $('#qc-approve-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    qc_approve_type: {
                        required: true,
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event,
                    validator) { // display error alert on form submit             
                    $('.alert-danger', $('#qc-approve-form')).fadeIn(500);
                    scrollTo($('#qc-approve-form'), -100);
                },
                submitHandler: function(form) {
                    let approveType = $('#qc_approve_type').val();
                    let reasonForRejection = $('#reason_for_rejection').val();

                    if (approveType == 'qc_reject' && reasonForRejection == '') {
                        show_notification("e", 'topright', "Enter Reason For Rejection");
                        return false;
                    }

                    $('#qc-approve-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });

            $("#qc_approve_type").change(function() {
                if (this.value == "qc_approve") {
                    $('#qc_approved').show();
                    $('#qc_approve_need_correction').hide();
                    $('#qc_rejected').hide();
                    $('#update_oos_remarks_label').show();
                    $('#update_oos_reason_label').hide();
                }
                if (this.value == "qc_approve_need_correction") {
                    $('#qc_approved').hide();
                    $('#qc_approve_need_correction').show();
                    $('#qc_rejected').hide();
                    $('#update_oos_remarks_label').show();
                    $('#update_oos_reason_label').hide();
                }
                if (this.value == "qc_reject") {
                    $('#qc_approved').hide();
                    $('#qc_approve_need_correction').hide();
                    $('#qc_rejected').show();
                    $('#update_oos_remarks_label').show();
                    $('#update_oos_reason_label').show();
                }
                if (this.value == "") {
                    $('#qc_approved').hide();
                    $('#qc_approve_need_correction').hide();
                    $('#qc_rejected').hide();
                    $('#update_oos_remarks_label').hide();
                    $('#update_oos_reason_label').hide();
                }
            });
        });

        // Assign For QA Approve Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-qa-approve-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    plant_id: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    user_id: {
                        required: true
                    },
                    wf_remarks: {
                        required: true
                    },
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#assign-qa-approve-form')).fadeIn(500);
                    scrollTo($('#assign-qa-approve-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-for-qa-approve').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // QA Approve Form Validationadd_new_phase2_resample_analyst
        $(document).ready(function() {
            "use strict";
            $('#qa-approve-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    qa_approve_type: {
                        required: true,
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event,
                    validator) { // display error alert on form submit             
                    $('.alert-danger', $('#qa-approve-form')).fadeIn(500);
                    scrollTo($('#qa-approve-form'), -100);
                },
                submitHandler: function(form) {
                    let approveType = $('#qa_approve_type').val();
                    let reasonForRejection = $('#reason_for_rejection').val();
                    let isManufacturingInvestigationrequired = $('#is_phase1_mfg_invest_required').val();
                    let isCapaRequired = $('#is_capa_required').val();
                    let qmsCapaNo = $('#qms_capa_no').val();
                    let manualCapaNo = $('#manual_capa_no').val();

                    if (approveType == 'qa_reject' && reasonForRejection == '') {
                        show_notification("e", 'topright', "Enter Reason For Rejection");
                        return false;
                    }

                    if (approveType == 'qa_approve' && isManufacturingInvestigationrequired == '') {
                        show_notification("e", 'topright',
                            "Select Manufacturing Investigation Required or Not");
                        return false;
                    }

                    if (approveType == 'qa_approve' && isCapaRequired == '') {
                        show_notification("e", 'topright', "Select CAPA Required or Not");
                        return false;
                    }

                    if (approveType == 'qa_approve' && isCapaRequired == 'yes' && qmsCapaNo == '') {
                        show_notification("e", 'topright', "Enter QMS CAPA No");
                        return false;
                    }

                    if (approveType == 'qa_approve' && isCapaRequired == 'yes' && manualCapaNo == '') {
                        show_notification("e", 'topright', "Enter Manual CAPA No");
                        return false;
                    }

                    $('#qa-approve-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });

            $("#qa_approve_type").change(function() {
                if (this.value == "qa_approve") {
                    $('#qa_approved').show();
                    $('#qa_approve_need_correction').hide();
                    $('#qa_rejected').hide();
                    $('#update_oos_is_phase1_manufacturing_investigation_required_label').show();
                    $('#update_oos_is_capa_required_label').show();
                    $('#update_oos_remarks_label').show();
                    $("#is_capa_required").val('');
                }
                if (this.value == "qa_approve_need_correction") {
                    $('#qa_approved').hide();
                    $('#qa_approve_need_correction').show();
                    $('#qa_rejected').hide();
                    $('#update_oos_remarks_label').show();
                    $('#update_oos_is_phase1_manufacturing_investigation_required_label').hide();
                    $('#update_oos_is_capa_required_label').hide();
                    $('#update_oos_qms_capa_no_label').hide();
                    $('#update_oos_reason_label').hide();
                }
                if (this.value == "qa_reject") {
                    $('#qa_approved').hide();
                    $('#qa_approve_need_correction').hide();
                    $('#qa_rejected').show();
                    $('#update_oos_reason_label').show();
                    $('#update_oos_remarks_label').show();
                    $('#update_oos_is_phase1_manufacturing_investigation_required_label').hide();
                    $('#update_oos_is_capa_required_label').hide();
                    $('#update_oos_qms_capa_no_label').hide();
                }
                if (this.value == "") {
                    $('#qa_approved').hide();
                    $('#qa_approve_need_correction').hide();
                    $('#qa_rejected').hide();
                    $('#update_oos_is_phase1_manufacturing_investigation_required_label').hide();
                    $('#update_oos_is_capa_required_label').hide();
                    $('#update_oos_qms_capa_no_label').hide();
                    $('#update_oos_reason_label').hide();
                    $('#update_oos_remarks_label').hide();
                }
            });

            $("#is_capa_required").change(function() {
                if (this.value == 'yes') {
                    $('#update_oos_qms_capa_no_label').show();
                } else {
                    $('#update_oos_qms_capa_no_label').hide();
                }
            });

        });

        // Assign For Phase-1 Retesting (Checklist & Analyst) Form Validation 
        $(document).ready(function() {
            "use strict";
            $('#add-phase1-checklist-analyst-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#add-phase1-checklist-analyst-form')).fadeIn(500);
                    scrollTo($('#add-phase1-checklist-analyst-form'), -100);
                },
                submitHandler: function(form) {
                    let checklistRowCount = $('#add_phase1_checklist_table tr').length;
                    if (checklistRowCount <= 1) {
                        show_notification('e', 'topright', "Please add checklist to continue!");
                        return false;
                    }

                    let analystRowCount = $('#add_phase1_analyst_table tr').length;
                    if (analystRowCount <= 1) {
                        show_notification('e', 'topright', "Please add analyst to continue!");
                        return false;
                    }

                    let inputValue = ["phase1_department[]", "phase1_analyst[]"];
                    for (let i = 0; i < inputValue.length; i++) {
                        let check = document.getElementsByName(inputValue[i]);
                        for (let j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification('e', 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }                   

                    $('#add_checklist_analyst').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Add Phase-1 Investigation Check list and Assign Analysts Form
        $(".add_new_phase1_analyst").click(function() {
            var index = $("#add_p1_analyst_table tbody tr:last-child").index();
            var random_val = Math.floor(Math.random() * 100000000);
            var row_index = index + random_val;
            var row =`<tr>
                        <td>
                            <select name="phase1_department[]" id="phase1_department` + row_index + `" required  title="Select Valid Department" class="form-control" onchange="get_action_users('{/literal}{$lmDocumentId}{literal}', '1p_retest_analyst', this.options[this.selectedIndex].value, '#phase1_analyst` + row_index + `');">
                                <option value="">Select</option>{/literal}                            
                                {foreach name=list item=item key=key from=$departmentList}
                                    <option value="{$item.department_id}">{$item.department} </option>
                                {/foreach}                            
                                {literal}
                            </select>
                        </td>
                        <td> 
                            <select name="phase1_analyst[]" id="phase1_analyst` + row_index + `" required title="Select Responsible Person" class="form-control"> 
                                <option value="">Select</option>
                            </select> 
                        </td> 
                        <td> 
                            <button type="button" class="delete-analyst btn btn-danger"> <i class="fa fa-times"> </i></button > 
                        </td> 
                    </tr>`;
            $("#add_phase1_analyst_table").append(row);
            $("#add_phase1_analyst_table tbody tr").eq(index + 1).find("").toggle();
        });

        //  Delete row on delete button click 
        $(document).on("click", ".delete-analyst", function() {
            $(this).parents("tr").remove();
        });

        // Analyst Delete Function
        function deleteAnalyst(param, objectId) {
            x_deleteAnalyst(objectId, delete_msg);
            $(param).closest('tr').remove();

            let table = document.getElementById("phase1-analyst-table");
            let tbodyRowCount = table.tBodies[0].rows.length; // 3
            if (tbodyRowCount <= 0) {
                $('#assign_phase1_analyst').remove();
            }
        }

        // Add Phase-1 Test Results Form Validation
        $(document).ready(function() {
            "use strict";
            $('#update-phase1-retest-result-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {},
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#update-phase1-retest-result-form')).fadeIn(500);
                    scrollTo($('#update-phase1-retest-result-form'), -100);
                },
                submitHandler: function(form) {
                    var input_value = ["phase1_obtained_result[]", "phase1_obtained_result_remarks[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification("e", 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var tf_oos_input_rowcounts = $('#update_phase1_retest_result_table tr').length;
                    if (tf_oos_input_rowcounts <= 1) {
                        show_notification("e", 'topright', "Minimum one test required to continue!");
                        return false;
                    }
                    $('#update_phase1_test_result_and_remarks').attr("disabled", true);
                    form.submit();
                }
            });
        });

        // Get Phase-1 Checklist Observation 
        function getPhase1CheckPointObservation(count, value) {
            var observation = "#p1_observation" + count;

            $(observation).val('');
            if (value == "yes") {
                $(observation).prop({'readonly':false, 'disabled': false});
            }
            if (value == "no") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("-");
            }
            if (value == "na") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("NA");
            }
        }

        // Add Phase-1 Observation Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase1-checklist-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase1-checklist-form')).fadeIn(500);
                    scrollTo($('#phase1-checklist-form'), -100);
                },
                submitHandler: function(form) {

                    var yesNo = document.getElementsByName('p1_yes_no_na[]');
                    var observation = document.getElementsByName('p1_observation[]');

                    for (let j = 0; j < yesNo.length; j++) {
                        if (yesNo[j].value == "") {
                            show_notification('e', 'topright', yesNo[j].title);
                            yesNo[j].focus();
                            yesNo[j].style.borderColor = 'red';
                            return false;
                        } else {
                            yesNo[j].style.borderColor = '#ccc';
                        }

                        if (yesNo[j].value == "yes" && observation[j].value == "") {
                            show_notification('e', 'topright', observation[j].title);
                            observation[j].focus();
                            observation[j].style.borderColor = 'red';
                            return false;
                        }
                    }

                    $('#phase1_checklist_save').attr("disabled", true);
                    loading.show();
                    form.submit();

                }
            });
        });

        // Phase-1 Manufacturing Investigation, Add Check list & Assign Analyst Form Validation
        $(document).ready(function() {
            "use strict";
            $('#assign-mfg-investigation-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    p1_mfg_responsible_person: {
                        required: true
                    }
                },
                invalidHandler: function(event, validator) { // display error alert on form submit             
                    $('.alert-danger', $('#assign-mfg-investigation-form')).fadeIn(500);
                    scrollTo($('#assign-mfg-investigation-form'), -100);
                },
                submitHandler: function(form) {
                    $('#assign-mfg-investigation-form').attr("disabled", true);
                    loading.show();
                    form.submit();
                },
            });
        });

        // Manufacturing Investigation Analyst Delete Function
        function deleteManufacturingInvestigationAnalyst(param, objectId) {
            x_deleteAnalyst(objectId, delete_msg);
            $(param).closest('tr').remove();

            let table = document.getElementById("phase1-manufacturing-investigation-analyst-table");
            let tbodyRowCount = table.tBodies[0].rows.length; // 3
            if (tbodyRowCount <= 0) {
                $('#assign_p1_mfg_investigation').remove();
            }
        }

        // Get Phase-1 Manufacturing Investigation Checklist Observation 
        function getPhase1ManufacturingInvestigationCheckPointObservation(count, value) {
            var observation = "#p1_mfg_observation" + count;

            $(observation).val('');
            if (value == "yes") {
                $(observation).prop({'readonly':false, 'disabled': false});
            }
            if (value == "no") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("-");
            }
            if (value == "na") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("NA");
            }
        }

        // Add Phase-1 Manufacturing Investigation Observation Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase1-manufacturing-investigation-checklist-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    manufacturing_investigation_details: {
                        required: true
                    },
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase1-manufacturing-investigation-checklist-form')).fadeIn(500);
                    scrollTo($('#phase1-manufacturing-investigation-checklist-form'), -100);
                },
                submitHandler: function(form) {

                    var yesNo = document.getElementsByName('p1_mfg_yes_no_na[]');
                    var observation = document.getElementsByName('p1_mfg_observation[]');

                    for (let j = 0; j < yesNo.length; j++) {
                        if (yesNo[j].value == "") {
                            show_notification('e', 'topright', yesNo[j].title);
                            yesNo[j].focus();
                            yesNo[j].style.borderColor = 'red';
                            return false;
                        } else {
                            yesNo[j].style.borderColor = '#ccc';
                        }

                        if (yesNo[j].value == "yes" && observation[j].value == "") {
                            show_notification('e', 'topright', observation[j].title);
                            observation[j].focus();
                            observation[j].style.borderColor = 'red';
                            return false;
                        }
                    }

                    $('#phase1_checklist_save').attr("disabled", true);
                    loading.show();
                    form.submit();

                }
            });
        });

        // Add Phase-1 Conclusion Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase1-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    phase1_error_type: {
                        required: true
                    },
                    phase1_error_classification: {
                        required: true
                    },
                    phase1_qc_reviewer_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase1-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase1-conclusion-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase1_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Add Phase-1 QC Verification Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase1-qc-verification-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    phase1_qc_approver_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase1-qc-verification-form')).fadeIn(500);
                    scrollTo($('#phase1-qc-verification-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase1_qc_verification_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });


        $("#p1_is_assign_cause_identified").change(function () {
            if (this.value == "no") {
                $('#update_p1_is_further_invest_required_label').show();
                $('#update_p1_assign_cause_details_label').hide();                
            }
            if (this.value == "yes") {
                $('#update_p1_is_further_invest_required_label').hide();
                $('#update_p1_assign_cause_details_label').show();                
            }
            if (this.value == "") {
                $('#update_p1_is_further_invest_required_label').hide();
                $('#update_p1_assign_cause_details_label').hide();                
            }
        });

        // Phase-1 Final Conclusion Form Validation
        $(document).ready(function () {
            "use strict";
            $('#phase1-final-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    p1_is_assign_cause_identified: {
                        required: true                                              
                    },
                    p1_qa_approver_comments: {
                        required: true,
                        minlength: 3
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase1-final-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase1-final-conclusion-form'), -100);
                },
                submitHandler: function(form) {

                    let assignCauseIdentified = $('#p1_is_assign_cause_identified').val();
                    let isFurtherInvestigationRequired = $('#p1_is_further_invest_required').val();
                    let assignCauseDetails = $('#p1_assign_cause_details').val();

                    if (assignCauseIdentified == 'no' && isFurtherInvestigationRequired == '') {
                        show_notification("e", 'topright', "Select Further Investigation Requirement");
                        return false;
                    }

                    if (assignCauseIdentified == 'yes' && assignCauseDetails == '') {
                        show_notification("e", 'topright', "Enter assignable cause details");
                        return false;
                    }
                                    
                    $('#add_phase1_final_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Phase-2 Retest Add Analist Button
        $(document).ready(function(){
            $(".add_new_p2_rt_analyst").click(function(){
                var index = $("#add_p2_rt_analyst_table tbody tr:last-child").index();
                var random_val = Math.floor(Math.random()*100000000);
                var row_index = index + random_val;
                var row = `<tr>
                            <td>
                                <select name="phase2_department[]" id="phase2_department` + row_index + `" required  title="Select Valid Department" class="form-control" onchange="get_action_users('{/literal}{$lmDocumentId}{literal}', '2p_retest_analyst', this.options[this.selectedIndex].value, '#phase2_analyst` + row_index + `');">
                                    <option value="">Select</option>{/literal}                            
                                    {foreach name=list item=item key=key from=$departmentList}
                                        <option value="{$item.department_id}">{$item.department} </option>
                                    {/foreach}                            
                                    {literal}
                                </select>
                            </td>
                            <td> 
                                <select name="phase2_analyst[]" id="phase2_analyst` + row_index + `" required title="Select Responsible Person" class="form-control"> 
                                    <option value="">Select</option>
                                </select> 
                            </td> 
                            <td> 
                                <button type="button" class="delete-analyst btn btn-danger"> <i class="fa fa-times"> </i></button > 
                            </td> 
                        </tr>`;
                $("#add_phase2_retest_analyst_table").append(row);
                $("#add_phase2_retest_analyst_table tbody tr").eq(index+1).find("").toggle();
            });            
        });
        
        // Phase-2 Retest Add Checklist and Assign Analyst Form Validation
        $(document).ready(function () {
            "use strict";
            $('#phase2-retest-add-checklist-and-add-analyst-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: { 
                    retesting_description: {
                        required: true,
                        minlength: 3
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-retest-add-checklist-and-add-analyst-form')).fadeIn(500);
                    scrollTo($('#phase2-retest-add-checklist-and-add-analyst-form'), -100);
                },
                submitHandler: function(form) {
                    
                    let checklistRowCount = $('#add_phase2_retest_checklist_table tr').length;
                    if (checklistRowCount <= 1) {
                        show_notification('e', 'topright', "Please add checklist to continue!");
                        return false;
                    }

                    let analystRowCount = $('#add_phase2_retest_analyst_table tr').length;
                    if (analystRowCount <= 1) {
                        show_notification('e', 'topright', "Please add analyst to continue!");
                        return false;
                    }

                    let inputValue = ["phase2_department[]", "phase2_analyst[]"];
                    for (let i = 0; i < inputValue.length; i++) {
                        let check = document.getElementsByName(inputValue[i]);
                        for (let j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification('e', 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    
                                    
                    $('#add_phase2_retest_analyst').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Phase-2 Retest Analyst Delete Function
        function deletePhase2RetestAnalyst(param, objectId) {
            x_deleteAnalyst(objectId, delete_msg);
            $(param).closest('tr').remove();

            let table = document.getElementById("phase2-retest-analyst-table");
            let tbodyRowCount = table.tBodies[0].rows.length; // 3
            
            if (tbodyRowCount <= 0) {
                $('#assign_phase2_retest_analyst').remove();
            }
        }

        // Add Phase-2 Test Results Form Validation
        $(document).ready(function() {
            "use strict";
            $('#update-phase2-retest-result-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {},
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#update-phase2-retest-result-form')).fadeIn(500);
                    scrollTo($('#update-phase2-retest-result-form'), -100);
                },
                submitHandler: function(form) {
                    var input_value = ["phase2_retest_obtained_result[]", "phase2_retest_obtained_result_remarks[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification("e", 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var tf_oos_input_rowcounts = $('#update_phase2_retest_result_table tr').length;
                    if (tf_oos_input_rowcounts <= 1) {
                        show_notification("e", 'topright', "Minimum one test required to continue!");
                        return false;
                    }
                    $('#update_phase2_retest_result_and_remarks').attr("disabled", true);
                    form.submit();
                }
            });
        });
            
        // Add Phase-2 Retest Observation Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase2-retest-checklist-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-retest-checklist-form')).fadeIn(500);
                    scrollTo($('#phase2-retest-checklist-form'), -100);
                },
                submitHandler: function(form) {

                    var yesNo = document.getElementsByName('phase2_retest_yes_no_na[]');
                    var observation = document.getElementsByName('phase2_retest_observation[]');
                    
                    for (let j = 0; j < yesNo.length; j++) {
                        if (yesNo[j].value == "") {
                            show_notification('e', 'topright', yesNo[j].title);
                            yesNo[j].focus();
                            yesNo[j].style.borderColor = 'red';
                            return false;
                        } else {
                            yesNo[j].style.borderColor = '#ccc';
                        }

                        if (yesNo[j].value == "yes" && observation[j].value == "") {
                            show_notification('e', 'topright', observation[j].title);
                            observation[j].focus();
                            observation[j].style.borderColor = 'red';
                            return false;
                        }
                    }

                    $('#phase2_retest_checklist_save').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Get Phase-1 Checklist Observation 
        function getPhase2RetestCheckPointObservation(count, value) {
            var observation = "#phase2_retest_observation" + count;

            $(observation).val('');
            if (value == "yes") {
                $(observation).prop({'readonly':false, 'disabled': false});
            }
            if (value == "no") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("-");
            }
            if (value == "na") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("NA");
            }
        }

        // Add Phase-2 Retest Conclusion Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase2-retest-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    phase2_retest_error_type: {
                        required: true
                    },
                    phase2_retest_error_classification: {
                        required: true
                    },
                    phase2_retest_qc_reviewer_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-retest-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase2-retest-conclusion-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase2_retest_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Add Phase-2 QC Verification Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase2-qc-verification-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    phase2_qc_approver_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-qc-verification-form')).fadeIn(500);
                    scrollTo($('#phase2-qc-verification-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase2_qc_verification_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        $("#p2_is_assign_cause_identified").change(function () {
            if (this.value == "no") {
                $('#update_p2_is_further_invest_required_label').show();
                $('#update_p2_assign_cause_details_label').hide();                
            }
            if (this.value == "yes") {
                $('#update_p2_is_further_invest_required_label').hide();
                $('#update_p2_assign_cause_details_label').show();                
            }
            if (this.value == "") {
                $('#update_p2_is_further_invest_required_label').hide();
                $('#update_p2_assign_cause_details_label').hide();                
            }
        });

        // Phase-2 Final Conclusion Form Validation
        $(document).ready(function () {
            "use strict";
            $('#phase2-final-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    p2_is_assign_cause_identified: {
                        required: true                                              
                    },
                    p2_qa_approver_comments: {
                        required: true,
                        minlength: 3
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-final-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase2-final-conclusion-form'), -100);
                },
                submitHandler: function(form) {

                    let assignCauseIdentified = $('#p2_is_assign_cause_identified').val();
                    let isFurtherInvestigationRequired = $('#p2_is_further_invest_required').val();
                    let assignCauseDetails = $('#p2_assign_cause_details').val();

                    if (assignCauseIdentified == 'no' && isFurtherInvestigationRequired == '') {
                        show_notification("e", 'topright', "Select Further Investigation Requirement");
                        return false;
                    }

                    if (assignCauseIdentified == 'yes' && assignCauseDetails == '') {
                        show_notification("e", 'topright', "Enter assignable cause details");
                        return false;
                    }
                                    
                    $('#add_phase2_final_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Assign For Phase-1 Retesting (Checklist & Analyst) Form Validation 
        $(document).ready(function() {
            "use strict";
            $('#phase2-resample-add-checklist-and-add-analyst-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    resampling_description: {
                        required: true,
                        minlength: 3,
                        maxlength: 500
                    },
                    process_stage_id: {
                        required: true
                    },
                    batch_no: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    ar_no: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    sample_quantity: {
                        required: true                        
                    }
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit              
                    $('.alert-danger', $('#phase2-resample-add-checklist-and-add-analyst-form')).fadeIn(500);
                    scrollTo($('#phase2-resample-add-checklist-and-add-analyst-form'), -100);
                },
                submitHandler: function(form) {
                    let checklistRowCount = $('#add_phase2_resample_checklist_table tr').length;
                    if (checklistRowCount <= 1) {
                        show_notification('e', 'topright', "Please add checklist to continue!");
                        return false;
                    }

                    let analystRowCount = $('#add_phase2_resample_analyst_table tr').length;
                    if (analystRowCount <= 1) {
                        show_notification('e', 'topright', "Please add analyst to continue!");
                        return false;
                    }

                    let inputValue = ["phase1_department[]", "phase1_analyst[]"];
                    for (let i = 0; i < inputValue.length; i++) {
                        let check = document.getElementsByName(inputValue[i]);
                        for (let j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification('e', 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }                   

                    $('#add_checklist_analyst').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Add Phase-1 Investigation Check list and Assign Analysts Form
        $(".add_new_phase2_resample_analyst").click(function() {
            var index = $("#add_phase2_resample_analyst_table tbody tr:last-child").index();
            var random_val = Math.floor(Math.random() * 100000000);
            var row_index = index + random_val;
            var row =`<tr>
                        <td>
                            <select name="phase2_department[]" id="phase2_department` + row_index + `" required  title="Select Valid Department" class="form-control" onchange="get_action_users('{/literal}{$lmDocumentId}{literal}', '2p_resample_analyst', this.options[this.selectedIndex].value, '#phase2_analyst` + row_index + `');">
                                <option value="">Select</option>{/literal}                            
                                {foreach name=list item=item key=key from=$departmentList}
                                    <option value="{$item.department_id}">{$item.department} </option>
                                {/foreach}                            
                                {literal}
                            </select>
                        </td>
                        <td> 
                            <select name="phase2_analyst[]" id="phase2_analyst` + row_index + `" required title="Select Responsible Person" class="form-control"> 
                                <option value="">Select</option>
                            </select> 
                        </td> 
                        <td> 
                            <button type="button" class="delete-analyst btn btn-danger"> <i class="fa fa-times"> </i></button > 
                        </td> 
                    </tr>`;
            $("#add_phase2_resample_analyst_table").append(row);
            $("#add_phase2_resample_analyst_table tbody tr").eq(index + 1).find("").toggle();
        });

        // Add Phase-2 Resample Test Results Form Validation
        $(document).ready(function() {
            "use strict";
            $('#update-phase2-resample-result-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {},
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#update-phase2-resample-result-form')).fadeIn(500);
                    scrollTo($('#update-phase2-resample-result-form'), -100);
                },
                submitHandler: function(form) {
                    var input_value = ["phase2_resample_obtained_result[]", "phase2_resample_obtained_result_remarks[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                show_notification("e", 'topright', check[j].title);
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var tf_oos_input_rowcounts = $('#update_phase2_resample_result_table tr').length;
                    if (tf_oos_input_rowcounts <= 1) {
                        show_notification("e", 'topright', "Minimum one test required to continue!");
                        return false;
                    }
                    $('#update_phase2_resample_result_and_remarks').attr("disabled", true);
                    form.submit();
                }
            });
        });

         // Add Phase-2 Retest Observation Form Validation
         $(document).ready(function() {
            "use strict";
            $('#phase2-resample-checklist-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-resample-checklist-form')).fadeIn(500);
                    scrollTo($('#phase2-resample-checklist-form'), -100);
                },
                submitHandler: function(form) {

                    var yesNo = document.getElementsByName('phase2_resample_yes_no_na[]');
                    var observation = document.getElementsByName('phase2_resample_observation[]');
                    
                    for (let j = 0; j < yesNo.length; j++) {
                        if (yesNo[j].value == "") {
                            show_notification('e', 'topright', yesNo[j].title);
                            yesNo[j].focus();
                            yesNo[j].style.borderColor = 'red';
                            return false;
                        } else {
                            yesNo[j].style.borderColor = '#ccc';
                        }

                        if (yesNo[j].value == "yes" && observation[j].value == "") {
                            show_notification('e', 'topright', observation[j].title);
                            observation[j].focus();
                            observation[j].style.borderColor = 'red';
                            return false;
                        }
                    }

                    $('#phase2_resample_checklist_save').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Get Phase-1 Checklist Observation 
        function getPhase2ResampleCheckPointObservation(count, value) {
            var observation = "#phase2_resample_observation" + count;

            $(observation).val('');
            if (value == "yes") {
                $(observation).prop({'readonly':false, 'disabled': false});
            }
            if (value == "no") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("-");
            }
            if (value == "na") {
                $(observation).prop({'readonly':true, 'disabled': false});
                $(observation).val("NA");
            }
        }

        // Add Phase-2 Resample Conclusion Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase2-resample-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    phase2_resample_error_type: {
                        required: true
                    },
                    phase2_resample_error_classification: {
                        required: true
                    },
                    phase2_resample_qc_reviewer_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-resample-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase2-resample-conclusion-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase2_resample_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Add Phase-2 Resample QC Verification Form Validation
        $(document).ready(function() {
            "use strict";
            $('#phase2-resample-qc-verification-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    phase2_resample_qc_approver_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-resample-qc-verification-form')).fadeIn(500);
                    scrollTo($('#phase2-resample-qc-verification-form'), -100);
                },
                submitHandler: function(form) {
                    $('#add_phase2_resample_qc_verification_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Phase-2 Resample Final Conclusion Form Validation
        $(document).ready(function () {
            "use strict";
            $('#phase2-resample-final-conclusion-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    p2_is_assign_cause_identified: {
                        required: true                                              
                    },
                    p2_qa_approver_comments: {
                        required: true,
                        minlength: 3
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase2-resample-final-conclusion-form')).fadeIn(500);
                    scrollTo($('#phase2-resample-final-conclusion-form'), -100);
                },
                submitHandler: function(form) {

                    let assignCauseIdentified = $('#p2_is_assign_cause_identified').val();
                    let isFurtherInvestigationRequired = $('#p2_is_further_invest_required').val();
                    let assignCauseDetails = $('#p2_assign_cause_details').val();

                    if (assignCauseIdentified == 'no' && isFurtherInvestigationRequired == '') {
                        show_notification("e", 'topright', "Select Further Investigation Requirement");
                        return false;
                    }

                    if (assignCauseIdentified == 'yes' && assignCauseDetails == '') {
                        show_notification("e", 'topright', "Enter assignable cause details");
                        return false;
                    }
                                    
                    $('#add_phase2_resample_final_conclusion_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Phase-3 Investigation Form Validation
        $(document).ready(function () {
            "use strict";
            $('#phase3-investigation-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {                    
                    cft_review_required: {
                        required: true                                              
                    },
                    lab_investigation_review: {
                        required: true,
                        minlength: 3
                    },
                    manufacturing_investigation_review: {
                        required: true,
                        minlength: 3
                    },
                    assign_cause_details: {
                        required: true,
                        minlength: 3
                    },
                    closure_comments: {
                        required: true,
                        minlength: 3
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#phase3-investigation-form')).fadeIn(500);
                    scrollTo($('#phase3-investigation-form'), -100);
                },
                submitHandler: function(form) {                                   
                    $('#add_phase3_investigation_button').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // CFT Review Users 
        function listCftReviewFromUsers(users) {
            var deptUsersObj = document.getElementById("cft_review_from_users");
            for (i = deptUsersObj.length; deptUsersObj.length > 0; i--) {
                deptUsersObj.remove(i)
            }
            for (var y in users) {
                var usersArray = users[y];
                var addy = document.createElement('option');
                addy.id = usersArray.user_id;
                addy.text = usersArray.user_name;
                addy.value = usersArray.user_id;
                try {
                    deptUsersObj.add(addy, null);
                } catch (ex) {
                    deptUsersObj.add(addy);
                }
            }
        }
    
        function get_dept_cft_review_users(value) {
            x_get_dept_users(value, listCftReviewFromUsers);
        }

        // Search CFT Users 
        $(document).ready(function ($) {
            $('.cft_review_users').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });

        // CFT Assign Form Validation
        $(document).ready(function () {
            "use strict";
            $('#assign-cft-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#assign-cft-form')).fadeIn(500);
                    scrollTo($('#assign-cft-form'), -100);
                },
                submitHandler: function(form) {     
                    
                    let usersTo = $("#cft_review_from_users_to :selected").length;
                    if(usersTo <= 0){
                        show_notification("e", 'topright', "Assign one user minimum!");
                        return false;
                    }                                   
                
                    $('#assign_cft_review').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // CFT Comments Form Validation
        $(document).ready(function () {
            "use strict";
            $('#cft-comment-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    review_comments: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#cft-comment-form')).fadeIn(500);
                    scrollTo($('#cft-comment-form'), -100);
                },
                submitHandler: function(form) {     
                    $('#cft_reviewed').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });

        // Close-out Form Validation
        $(document).ready(function () {
            "use strict";
            $('#close-out-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    impact_assessment: {
                        required: true,
                        minlength: 3                        
                    },
                    risk_assessment: {
                        required: true,
                        minlength: 3                        
                    },
                    final_closure_conclusion: {
                        required: true,
                        minlength: 3                        
                    },
                    wf_remarks: {
                        required: true,
                        minlength: 3                        
                    }
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#close-out-form')).fadeIn(500);
                    scrollTo($('#close-out-form'), -100);
                },
                submitHandler: function(form) {     
                    $('#submit_close_out').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });
        

    </script>
{/literal}