<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link href="vendors/custom_lm/htmldiff/htmldiff_custom.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Audit Trail</li>
            <li class="active">CAPA</li>
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
                    <span class="panel-title h4"> 
                        <i class="fa fa-fw fa-delicious"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">CAPA - Audit Trail </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in attach_loading">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="audit_section"} <span class="vd_red">*</span></label>
                                <div class="controls">
                                    <select class="search_audit_trail query" >
                                        <option value="">Select</option>
                                        <optgroup label="Master Data">    
                                            <option value="capa_master_exam_pass_mark_audit_trail">Exam Pass Mark</option>
                                            <option value="capa_master_exam_attempt_limit_audit_trail">Exam Attempt Limit</option>
                                            <option value="capa_target_date_expiry_audit_trail">Target date expiry</option>
                                        </optgroup>
                                        <optgroup label="Work Flow">
                                            <option value="capa_wf_audit_trail">CAPA Workflow</option>
                                        </optgroup>
                                    </select>
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="capa_no"}</label>
                                <div class="controls">
                                    <select  class="search_audit_trail refrence_object_id" >
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$capa_list}
                                            <option value="{$item.capa_object_id}">{$item.capa_no}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>    
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="year"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail year" >
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$year_range}
                                            <option value="{$item}">{$item}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="month"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail month" >
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$month_range}
                                            <option value="{$key}">{$item}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail plant">
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$plant_list}
                                            <option value="{$item.plant_id}">{$item.plant_name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="department"}</label>
                                <div class="controls">
                                    <select onchange="get_dept_users(this.options[this.selectedIndex].value, '#users');" class="search_audit_trail dept" >
                                        <option value="">Select</option>
                                        {foreach name=list item=item key=key from=$deptlist}
                                            <option value="{$key}">{$item}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="user_name"}</label>
                                <div class="controls">
                                    <select id="users" class="search_audit_trail user" ></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="date"} From</label>
                                <div class="controls">
                                    <input type="text"  class="generate_datepicker search_audit_trail from_date date_changed" placeholder="YYYY/MM/DD" data-datepicker_min="{$start_date}" data-datepicker_max={$end_date} data-date_changed="to_date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="date"} To</label>
                                <div class="controls">
                                    <input type="text" name='to_date' class="generate_datepicker search_audit_trail to_date" placeholder="YYYY/MM/DD" data-datepicker_min="{$start_date}" data-datepicker_max={$end_date} disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body audit_trail_result found_records" style="display: none;"> 
                        <table  style='white-space: pre-wrap; word-wrap: break-word;' class="table table-bordered table-striped audit_trail_result_table generate_datatable" title="Audit trail" data-whitespace="pre-wrap">
                            <thead>
                                <tr>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="date"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="user_name"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="ip_address"}</th>
                                    <th class="col-md-2">{attribute_name module="audit" attribute="action"} </th>
                                    <th class="col-md-3">{attribute_name module="audit" attribute="new_value"}</th>
                                    <th class="col-md-3">{attribute_name module="audit" attribute="old_value"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="status"}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="panel-body audit_trail_result no_records" style="display: none;"> 
                        <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <script type="text/javascript" src="vendors/custom_lm/htmldiff/htmldiff_custom.js"></script>
{/literal}