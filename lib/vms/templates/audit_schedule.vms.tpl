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
            <li class="active">Add </li>
            <li class="active">QMS </li>
            <li class="active">Vendor Manangement (VMS)</li>
            <li class="active">Initiate Audit</li>
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
            <div class="row">
                <div class="col-md-12 ">
                    <div class="tabs widget">
                        <ul class="nav nav-tabs widget">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_vendor_list"> 
                                    <span class="menu-icon"><i class="fa fa-database"></i></span> Audit Schedule List<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="initiate_audit" data-target="#modal_initiate_vendor" data-toggle="modal" class="vd_hover">
                                    <span class="menu-icon"><i class="fa fa-plus"></i></span> Initiate Audit<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                            <li class="initaite_reaudit">
                                <a data-toggle="tab" href="#tab_reaudit_vendor_list">
                                    <span class="menu-icon"><i class="fa fa-refresh"></i></span> Re Audit<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab_vendor_list" class="tab-pane active">    
                                <div class="panel-body input-border">   
                                    {if !empty($vm_list)}
                                        <table class="table table-bordered table-striped generate_datatable" title="Vendor Audit List" data-ori="landscape" data-pagesize="A3" data-sort_column=1>
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                    <th>{attribute_name module="vms" attribute="vm_no"}</th>
                                                    <th>{attribute_name module="vms" attribute="initiator"}</th>
                                                    <th>{attribute_name module="vms" attribute="vendor_name"}</th>
                                                    <th>{attribute_name module="vms" attribute="plant_name"}</th>
                                                    <th>{attribute_name module="vms" attribute="audit_date_from"}</th>
                                                    <th>{attribute_name module="vms" attribute="audit_date_to"}</th>
                                                    <th>{attribute_name module="vms" attribute="auditor_details"}</th>
                                                    <th>{attribute_name module="vms" attribute="auditee_details"}</th>
                                                    <th>{attribute_name module="vms" attribute="approval_status"}</th>
                                                    <th>{attribute_name module="vms" attribute="wf_status"}</th>
                                                    <th>{attribute_name module="vms" attribute="status"}</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach item=item key=key from=$vm_list} 
                                                    <tr>
                                                        <td></td>
                                                        <td>{$item.doc_link}</td>
                                                        <td>{$item.created_by_name}</td>
                                                        <td>{$item.vendor_org_name}</td>
                                                        <td>{$item.vendor_plant_name}</td>
                                                        <td>{display_if_null var={display_date var=$item.schedule_details->audit_from_date}}</td>
                                                        <td>{display_if_null var={display_date var=$item.schedule_details->audit_to_date}}</td>
                                                        <td class="text-nowrap">
                                                            {attribute_name module="vms" attribute="audit_lead"} : {display_if_null var=$item.audit_lead_name}
                                                            <br> 
                                                            {attribute_name module="vms" attribute="auditor_details"} : 
                                                            <br>
                                                            {foreach item=item1 key=key1 from=$item.auditors} 
                                                                {$key1+1}.{$item1.auditor_name} [{$item1.auditor_plant}] [{$item1.auditor_dept}]
                                                                <br>
                                                            {/foreach}
                                                        </td>
                                                        <td>
                                                            {foreach item=item1 key=key1 from=$item.auditees} 
                                                                {$key1+1}.{$item1.auditee_name} {$item1.auditee_email}
                                                                <br>
                                                            {/foreach}
                                                        </td>
                                                        <td>{display_if_null var=$item.approval_status}</td>
                                                        <td>{$item.wf_status}</td>
                                                        <td>{$item.status}</td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {else}
                                        <div class="alert alert-danger alert-dismissable alert-condensed mgbt-md-0">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                            <i class="fa fa-exclamation-circle append-icon"></i> No Vendor Audit Initiated
                                        </div>
                                    {/if}
                                </div>
                            </div>
                            <div id="tab_reaudit_vendor_list" class="tab-pane">    
                                <div class="panel-body input-border">   
                                    <table id="reaudit_pant_list_tbl" class="table table-bordered table-striped generate_datatable" title="Re Audit Vendor Audit List" data-ori="landscape" data-pagesize="A3" data-sort_column=1 data-whitespace="nowrap">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                <th>{attribute_name module="vms" attribute="vendor_name"}</th>
                                                <th>{attribute_name module="vms" attribute="plant_name"}</th>
                                                <th>{attribute_name module="vms" attribute="vendor_type"}</th>
                                                <th>{attribute_name module="vms" attribute="address"}</th>
                                                <th>{attribute_name module="vms" attribute="city"}</th>
                                                <th>{attribute_name module="vms" attribute="state"}</th>
                                                <th>{attribute_name module="vms" attribute="contact_number"}</th>
                                                <th>{attribute_name module="vms" attribute="email"}</th>
                                                <th>{attribute_name module="vms" attribute="primary_contact"}</th>
                                                <th>{attribute_name module="vms" attribute="is_active"}</th>
                                                <th>{attribute_name module="vms" attribute="vendor_status"}</th>
                                                <th>{attribute_name module="vms" attribute="audit_status"}</th>
                                                <th>{attribute_name module="vms" attribute="effective_from"}</th>
                                                <th>{attribute_name module="vms" attribute="effective_to"}</th>
                                                <th>{attribute_name module="admin" attribute="action"}</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Start Of Initaite Vendor Audit Modal -->
<div class="modal fade" id="modal_initiate_vendor" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
    <div class="modal-dialog width-90">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="edit_basic_details_ModalLabel">Initiate Vendor Audit</h4>
            </div>
            <div class="modal-body pd-15">
                <form name="initiate_vendor-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="initiate_vendor-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">{attribute_name module="vms" attribute="vm_no"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" name="vm_no" value="{$vm_no}" readonly  required title="Invalid VMS No">                                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">{attribute_name module="vms" attribute="vendor_name"}</label><span class="vd_red">*</span>
                            <div class="controls">
                                <select class="org" name="org" title="Select Valid Vendor">
                                    <option value="">Select</option>
                                    {foreach name=list item=item key=key from=$organization_list}
                                        <option value="{$item.org_id}">{$item.org_name}</option>
                                    {/foreach}
                                </select>
                                <input type="text" class="reaudit_org_name" readonly>
                                <input type="hidden" class="reaudit_org_id" name="reaudit_org_id" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">{attribute_name module="vms" attribute="plant_name"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <select class="plant" name="plant" title="Select Valid Plant"></select>
                            </div>
                            <input type="text" class="reaudit_plant_name" readonly>
                            <input type="hidden" class="reaudit_plant_id" name="reaudit_plant_id" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">{attribute_name module="vms" attribute="audit_date_from"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="generate_datepicker date_changed" name="audit_from_date" title="Select Valid From Date" data-datepicker_min="0" data-date_changed="audit_to_date">

                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">{attribute_name module="vms" attribute="audit_date_to"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="generate_datepicker" name="audit_to_date" title="Select Valid To Date" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="vms" attribute="scope"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <textarea rows="4" name="avms_scope" title="Enter Valid Scope" placeholder="The audit will assess adherence to quality management systems and GMP standards, inspect facility conditions, equipment, and personnel training, verify compliance with regulatory requirements, review risk management processes and corrective actions, and evaluate supply chain management and product quality control procedures."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="vms" attribute="objectives"}</label> <span class="vd_red">*</span>
                            <div class="controls">
                                <textarea rows="4" name="avms_objectives" title="Enter Valid Objectives" placeholder="The audit aims to evaluate compliance with quality management systems and GMP standards, verify the effectiveness of regulatory adherence, assess risk management and corrective action processes, and ensure robust supply chain and product quality controls. The goal is to identify areas for improvement and confirm that all practices meet required standards."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info mgbt-md-0"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>Note!</strong> The total score weightage should equal 100. Please divide and apply accordingly, ensuring it does not exceed 100.</div>
                    <div class="form-group">
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
                                        <th class="col-md-5">{attribute_name module=vms attribute="agenda_category"} <span class="vd_red">*</span></th>
                                        <th class="col-md-6">{attribute_name module=vms attribute="agenda_sub_category"} <span class="vd_red">*</span></th>
                                        <th class="col-md-1 pd-10">{attribute_name module=vms attribute="score_weightage"} <span class="vd_red">*</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach name=list item=item key=key from=$agenda}
                                        <tr>
                                            <td>
                                                <div class="vd_checkbox checkbox-danger">
                                                    <input type="checkbox" class="select_agenda" name="agenda_cat[]" value="{$item.object_id}" id="agenda_{$key}">
                                                    <label for="agenda_{$key}"></label>
                                                </div>
                                            </td>
                                            <td>{$item.category}</td>
                                            <td>
                                                <select class="generate_select2 cmn_ed agenda_sub_cat" name="agenda_sub_cat[]" multiple="multiple" style="width:100%" title="Select Agenda Sub Category" disabled>
                                                    {foreach item=item2 key=key2 from=$item.subcategorylist}
                                                        <option value="{$item.object_id}-{$item2.object_id}">{$item2.sub_category}</option>
                                                    {/foreach}
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="cmn_ed score" name="score[]" min="1" max="100" value="{$item.category_score}" title="Enter Score" disabled>
                                            </td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right">
                                            <span class="font-semibold">{attribute_name module=vms attribute="total"}</span>
                                        </td>
                                        <td class="text-center total_score">0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    {if $master_data_creation_alert}
                        <div class="alert alert-danger">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Some of the master data entries are still not created in the admin section under QMS Master Data such as "Agenda Category, Agenda Sub Category". Before proceeding further, please ensure these entries are created.
                        </div>
                    {else}
                        <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                            <input type="hidden" name="audit_trail_action" value="Add Vendor Audit">
                            <input type="hidden" id="audit_type" name="initiate_vendor">
                            <button class="btn vd_bg-green vd_white" type="submit"  id="initiate_vendor" disabled><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Initiate</button>
                        </div>
                    {/if}
                </form>
            </div>
        </div>
    </div>
</div>
{literal}
    <script>
        $(document).ready(function () {
            "use strict";
            //Add Vendor Organization form validation
            $('#initiate_vendor-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    org2: {
                        required: true
                    },
                    plant2: {
                        required: true
                    },
                    audit_from_date: {
                        required: true
                    },
                    audit_to_date: {
                        required: true
                    },
                    avms_scope: {
                        minlength: 3,
                        required: true
                    },
                    avms_objectives: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#initiate_vendor-form')).fadeIn(500);
                    scrollTo($('#initiate_vendor-form'), -100);
                },
                submitHandler: function (form) {
                    if (lm_validate.array_of_input([".agenda_sub_cat@", ".score@"])) {
                        $('#initiate_vendor').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                }
            });

            $(document).on('change', '.org', (e) => x_get_vms_plants($(e.target).val(), '', 'yes', 'Audit Pending', 'Audit Pending', 'First Time', (result) => ajax_respone_handler_set_dropdown(result, '.plant')));
            $(document).on('input', '.score', () => update_total_score());

            $(document).on("click", ".select_agenda,.select_agenda_all", function () {
                update_total_score();
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

            function update_total_score() {
                let total_score = 0;
                $(lm_dom.find_in_parent(".select_agenda:checked", 'tr', ".score")).each((i, val) => total_score += Number($(val).val()));
                $(".total_score").html(total_score);
                if (total_score !== 100) {
                    $(".total_score").closest("td").css('background-color', '#f85d2c');
                    $("#initiate_vendor").prop("disabled", true);
                } else {
                    $(".total_score").closest("td").css('background-color', '#ffffff');
                    $("#initiate_vendor").removeAttr("disabled");
                }
            }

            //Re audit
            $(document).on("click", ".initaite_reaudit", function () {
                loading.show();
                x_get_vms_plants('', '', 'yes', 'Qualified', 'Completed', 'Re Audit', function (result) {
                    let table = ($.fn.dataTable.isDataTable('#reaudit_pant_list_tbl')) ? $('#reaudit_pant_list_tbl').DataTable() : null;
                    if (typeof result === 'object') {
                        table.clear().draw();
                        let btn = `<span class="btn menu-icon vd_bd-green vd_green reaudit" data-target="#modal_initiate_vendor" data-toggle="modal"><a data-original-title="Re Audit" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-fw fa-plus"></i></a></span>`;
                        $.each(result, function (key, val) {
                            let tr = table.row.add([key + 1, val['org_name'], val['plant_name'], val['type'], val['address'], val['city'], val['state'], val['landline_number'], val['email'], val['primary_contact'], val['is_active'], val['vendor_status'], val['audit_status'], val['effective_from'], val['effective_to'], btn]).draw(true).node();
                            $(tr).attr('data-audit_details', JSON.stringify(val));
                        });
                    }
                    loading.hide();
                });
            });

            $(document).on('click', '.reaudit', function () {
                let audit_details = $(this).closest("tr").data("audit_details");
                $("#initiate_vendor-form").find(".reaudit_org_name,.reaudit_plant_name").show().removeAttr("disabled");
                $("#initiate_vendor-form").find(".org,.plant").hide();
                $.each(audit_details, (key, value) => $('#initiate_vendor-form').find(`.reaudit_${key}`).val(value));
                $("#audit_type").attr('name', 'reaudit');
            });
            $(document).on('click', '.initiate_audit', function () {
                $("#initiate_vendor-form").find(".reaudit_org_name,.reaudit_plant_name").attr("disabled", true).hide();
                $("#initiate_vendor-form").find(".org,.plant").show();
                $("#audit_type").attr('name', 'initiate_vendor');
            });
        });
    </script>
{/literal}




