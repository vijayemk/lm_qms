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
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">View SOP </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Primary Details</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" role="form">
                            <div id="wizard-1" class="form-wizard">
                                <ul>
                                    <li><a href="#tab1" data-toggle="tab"><div class="menu-icon"> 1 </div>Basic Details </a></li>
                                    <li><a href="#tab2" data-toggle="tab"><div class="menu-icon"> 2 </div>Training & Exam</a></li>
                                    <li><a href="#tab3" data-toggle="tab"><div class="menu-icon"> 3 </div>View/Download </a></li>
                                    <li><a href="#tab4" data-toggle="tab"><div class="menu-icon"> 4 </div>Track Changes </a></li>
                                    <li><a href="#tab5" data-toggle="tab"><div class="menu-icon"> 5 </div>Comparison</a></li>
                                    <li><a href="#tab6" data-toggle="tab"><div class="menu-icon"> 6 </div>Insight</a></li>
                                </ul>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" > </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        <h2><span class="font-semibold">Basic Details</span></h2>

                                        <div class="vd_content-section clearfix">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel widget">
                                                        <div class="panel-body table-responsive">
                                                            <div class="row">
                                                                <div class="col-sm-2">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_type}</div>
                                                                    <input type="text" readonly value="{$sop_type}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_no}</div>
                                                                    <input type="text" readonly value="{$sop_no}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_name}</div>
                                                                    <input type="text" readonly value="{$sop_name}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-2">
                                                                    <div class="form-label">{attribute_name module=sop attribute=revision}</div>
                                                                    <input type="text" readonly value="{$sop_revision}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_supersedes}</div>
                                                                    <input type="text" readonly value="{$sop_supersedes}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <div class="form-label">{attribute_name module=sop attribute=reason_for_creation_revision}</div>
                                                                    <textarea class="mgbt-xs-20  mgbt-sm-0" name="reason_for_revision" id="reason_for_revision" style="resize: none" readonly="">{$reason_for_revision}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-2">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_effective_date}</div>
                                                                    <input type="text" readonly value="{$sop_effective_date}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_expiry_date}</div>
                                                                    <input type="text" readonly value="{$sop_expiry_date}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-label">{attribute_name module=sop attribute=cc_no}</div>
                                                                    <input type="text" readonly value="{$sop_cc_no}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_belongs_to}</div>
                                                                    <input type="text" readonly value="{$sop_plant}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-label">{attribute_name module=sop attribute=sop_published_status}</div>
                                                                    <input type="text" readonly value="{$published_status}" class="mgbt-xs-20 mgbt-sm-0">
                                                                </div>
                                                            </div>
                                                            {if !empty($sop_capa_no)}
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="form-label">{attribute_name module=sop attribute=capa_no}</div>
                                                                        <input type="text" readonly value="{$sop_capa_no}" class="mgbt-xs-20 mgbt-sm-0">
                                                                    </div>
                                                                </div>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h2><span class="font-semibold">Scheduled Details</span></h2>
                                        {if $is_sop_training_required eq "yes"}
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="row">
                                                                    <table class="table table-bordered table-striped" id="data-tables-training">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module=sop attribute=s_no}</th>
                                                                                <th>{attribute_name module=sop attribute=training_date}</th>
                                                                                <th>{attribute_name module=sop attribute=trainer}</th>
                                                                                <th>{attribute_name module=sop attribute=department}</th>
                                                                                <th>{attribute_name module=sop attribute=venue}</th>
                                                                                <th>{attribute_name module=sop attribute=status}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach item=item key=key from=$sop_training_details}
                                                                                <tr >
                                                                                    <td >{$item.count}</td>
                                                                                    <td >{$item.training_date}</td>
                                                                                    <td >{$item.trainer}</td>
                                                                                    <td >{$item.trainer_dept}</td>
                                                                                    <td >{$item.training_venue}</td>
                                                                                    <td >{$item.status}</td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                            <hr>
                                            <h2><span class="font-semibold">Participants Details
                                                    <div class="btn-group">
                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Download <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                        <ul class="dropdown-menu" role="menu">  
                                                            <li><a href='index.php?module=file&action=view_sop_training_file&sop_object_id={$regobj->sop_object_id}' onclick="window.open(this.href, 'mysoptraining', 'resizable=0');
                                                                    return false;" >Training Details</a></li>
                                                        </ul>
                                                    </div>
                                                </span></h2>
                                                {if !empty($sop_trainees_details)}
                                                    <div class="vd_content-section clearfix">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel widget">
                                                                    <div class="panel-body table-responsive">
                                                                        <h2><span class="font-semibold">Account Holders List</span></h2>
                                                                        <table class="table table-bordered table-striped" id="data-tables-trainees">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>{attribute_name module="sop" attribute="participants_name"}</th>
                                                                                    <th>{attribute_name module="sop" attribute="department"}</th>
                                                                                    <th>{attribute_name module="sop" attribute="training_date"}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach item=item key=key from=$sop_trainees_details}
                                                                                    <tr >
                                                                                        <td >{$item.trainee_name}</td>
                                                                                        <td >{$item.trainee_dept}</td>
                                                                                        <td >{$item.training_date}</td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {if !empty($sop_trainees_details)}
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel widget">
                                                                        <div class="panel-body table-responsive">
                                                                            <h2><span class="font-semibold">Non Account Holders List</span></h2>
                                                                            <table class="table table-bordered table-striped" id="data-tables-trainees_nah">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>{attribute_name module="sop" attribute="participants_name"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="department"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="training_date"}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach item=item key=key from=$sop_nah_trainees_details}
                                                                                        <tr >
                                                                                            <td >{$item.trainee_name}</td>
                                                                                            <td >{$item.trainee_dept}</td>
                                                                                            <td >{$item.training_date}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {else}
                                                            <div class="vd_content-section clearfix">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="panel widget">
                                                                            <div class="panel-body table-responsive">
                                                                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                    <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Non Account Participants Details Not Available
                                                                                </div>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {/if}
                                                    </div>
                                            {else}
                                                <div class="vd_content-section clearfix">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel widget">
                                                                <div class="panel-body table-responsive">
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Participants Details Not Available
                                                                    </div>
                                                                </div>                                                           
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {/if}
                                            <hr>
                                            <h2><span class="font-semibold">Online Exam Details</span></h2>
                                            {if !empty($online_exam_user_list)}
                                                <div class="vd_content-section clearfix">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel widget">
                                                                <div class="panel-body table-responsive">
                                                                    <table class="table table-bordered table-striped" id="data-tables-exam">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{attribute_name module="sop" attribute="s_no"}</th>
                                                                                <th>{attribute_name module="sop" attribute="assigned_by"}</th>
                                                                                <th>{attribute_name module="sop" attribute="assigned_to"}</th>
                                                                                <th>{attribute_name module="sop" attribute="assigned_date"}</th>
                                                                                <th>{attribute_name module="sop" attribute="target_date"}</th>
                                                                                <th>{attribute_name module="sop" attribute="completed_date"}</th>
                                                                                <th>{attribute_name module="sop" attribute="pass_mark"}</th>
                                                                                <th>{attribute_name module="sop" attribute="attempt"}</th>
                                                                                <th>{attribute_name module="sop" attribute="capa_no"}</th>
                                                                                <th>{attribute_name module="sop" attribute="marks_scored"}</th>
                                                                                <th>{attribute_name module="sop" attribute="result"}</th>
                                                                                <th>{attribute_name module="sop" attribute="download"}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach item=item key=key from=$online_exam_user_list}
                                                                                <tr >
                                                                                    <td >{$item.count}</td>
                                                                                    <td >{$item.assigned_by}</td>
                                                                                    <td >{$item.assigned_to}</td>
                                                                                    <td >{$item.assigned_date}</td>
                                                                                    <td >{$item.target_date}</td>
                                                                                    <td >{$item.completed_date}</td>
                                                                                    <td >{$item.pass_mark}</td>
                                                                                    <td >{$item.attempt}</td>
                                                                                    <td >{$item.capa_no}</td>
                                                                                    <td >{$item.marks_scored}</td>
                                                                                    <td >{$item.exam_result}</td>
                                                                                    <td class="menu-action">
                                                                                        {if $item.download_pdf}
                                                                                            <a data-original-title="Download PDF" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_red" href="index.php?module=file&action=view_online_exam_result&object_id={$item.object_id}" onclick="window.open(this.href, 'mysignupwin', 'left=200,top=150,width=500,height=500,toolbar=1,resizable=0');
                                                                                                    return false;"><i class="fa fa-file-pdf-o"></i></a>
                                                                                            {/if}
                                                                                    </td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {else}
                                                <div class="vd_content-section clearfix">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel widget">
                                                                <div class="panel-body table-responsive">
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Online Exam Details Not Available
                                                                    </div>
                                                                </div>                                                           
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {/if}

                                        {else}
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                    <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Training Details Not Available
                                                                </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        {if !empty($view_sop_file)}
                                            <h2><span class="font-semibold">Web View</span></h2>
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> SOP<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <li><a href='index.php?module=sop&action=view_sop_web&sop_object_id={$regobj->sop_object_id}&object_id1={$regobj->sop_object_id}' onclick="window.open(this.href, 'mysopwin', 'resizable=0'); return false;">{$sop_name}</a></li>
                                                                    </ul>
                                                                </div>
                                                                {if !empty($formatlist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list1 item=item1 key=key1 from=$formatlist}
                                                                                <li><a href='index.php?module=sop&action=view_sop_web&sop_object_id={$regobj->sop_object_id}&object_id1={$item1.format_object_id}' onclick="window.open(this.href, 'mysopformatwin', 'resizable=0'); return false;">{$item1.format_name}</a></li>
                                                                            {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                                {if !empty($annexurelist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list1 item=item1 key=key1 from=$annexurelist}
                                                                                <li><a href='index.php?module=sop&action=view_sop_web&sop_object_id={$regobj->sop_object_id}&object_id1={$item1.annexure_object_id}' onclick="window.open(this.href, 'mysopannexurewin', 'resizable=0'); return false;">{$item1.annexure_name}</a></li>
                                                                            {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><span class="font-semibold">Download PDF</span></h2>
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> SOP<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        {foreach name=list item=item key=key from=$print_copy_list}
                                                                            <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$regobj->sop_object_id}','index.php?module=file&action=view_sop_file&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}')">{$item.copy_type}</a></li>
                                                                            {/foreach}
                                                                    </ul>
                                                                </div>
                                                                {if !empty($formatlist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list item=item key=key from=$print_copy_list}
                                                                                <li><span class="vd_bg-green">{$item.copy_type}</span></li>
                                                                                    {foreach name=list1 item=item1 key=key1 from=$formatlist}
                                                                                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$item1.format_object_id}','index.php?module=file&action=view_format&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}&format_id={$item1.format_object_id}')">{$item1.format_name}</a></li>
                                                                                    {/foreach}
                                                                                {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                                {if !empty($annexurelist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list item=item key=key from=$print_copy_list}
                                                                                <li><span class="vd_bg-green">{$item.copy_type}</span></li>
                                                                                    {foreach name=list1 item=item1 key=key1 from=$annexurelist}
                                                                                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$item1.annexure_object_id}','index.php?module=file&action=view_annexure&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}&annexure_id={$item1.annexure_object_id}')">{$item1.annexure_name}</a></li>
                                                                                    {/foreach}
                                                                                {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><span class="font-semibold">Export</span></h2>
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> SOP<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <!--li><a href="?module=file&action=download_sop_word&sop_object_id={$regobj->sop_object_id}">Export to Word</a></li-->
                                                                        <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$regobj->sop_object_id}','index.php?module=file&action=download_sop_word&sop_object_id={$regobj->sop_object_id}')">Export to Word</a></li>
                                                                    </ul>
                                                                </div>
                                                                <!--
                                                                {if !empty($formatlist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list item=item key=key from=$print_copy_list}
                                                                                <li><span class="vd_bg-green">{$item.copy_type}</span></li>
                                                                                    {foreach name=list1 item=item1 key=key1 from=$formatlist}
                                                                                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$item1.format_object_id}','index.php?module=file&action=view_format&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}&format_id={$item1.format_object_id}')">{$item1.format_name}</a></li>
                                                                                    {/foreach}
                                                                                {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Format not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                                {if !empty($annexurelist)}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach name=list item=item key=key from=$print_copy_list}
                                                                                <li><span class="vd_bg-green">{$item.copy_type}</span></li>
                                                                                    {foreach name=list1 item=item1 key=key1 from=$annexurelist}
                                                                                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$item1.annexure_object_id}','index.php?module=file&action=view_annexure&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}&annexure_id={$item1.annexure_object_id}')">{$item1.annexure_name}</a></li>
                                                                                    {/foreach}
                                                                                {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                {else}
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Annexure not found<i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                    </div>
                                                                {/if}
                                                                -->
                                                                
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <h2><span class="font-semibold">Download History</span></h2>
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="panel-body table-responsive">
                                                        {if !empty($sop_download_history)}
                                                            <table class="table table-bordered table-striped" id="data-tables-sop_download_history">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{attribute_name module="sop" attribute="download"}</th>
                                                                        <th>{attribute_name module="sop" attribute="download_hist"}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {foreach name=list item=item key=key from=$sop_download_history}
                                                                        <tr >
                                                                            <td >{$item.no}<br>{$item.name}</td>
                                                                            <td >
                                                                                {foreach name=list1 item=item1 key=key1 from=$item.download_history}
                                                                                    <span class="text-bold">{$item1.count}. {$item1.access_by} [{$item1.date}]</span><br>
                                                                                    {$item1.plant_name} [{$item1.dept}]<br>
                                                                                    IP Address : {$item1.ip_address}<br>
                                                                                    Reason : {$item1.reason}<br>
                                                                                    stage : {$item1.stage}<br><br>

                                                                                {/foreach}
                                                                            </td>
                                                                        </tr>
                                                                    {/foreach}
                                                                </tbody>
                                                            </table>
                                                        {else}
                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                            </div>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                        {else}
                                            <div class="vd_content-section clearfix">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <h2> <font color="red">{$published_status}</font></h2>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <h2><span class="font-semibold">Track Changes</span></h2>
                                        <div class="vd_content-section clearfix">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                {if !empty($review_comments_array)}
                                                                    <table class="table table-bordered table-striped" id="review_comments_output_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                <th width="30%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=action}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            {foreach item=item key=key from=$review_comments_array}
                                                                                <tr >
                                                                                    <td >{$item.count}</td>
                                                                                    <td >{$item.commented_date}</td>
                                                                                    <td >{$item.commented_by}</td>
                                                                                    <td >{$item.comments}</td>
                                                                                    <td >{$item.accept_status}</td>
                                                                                    <td >{$item.status}</td>
                                                                                    <td >{$item.action}</td>
                                                                                    <td >{$item.reviewed_by}</td>
                                                                                    <td >{$item.reviewed_date}</td>
                                                                                    <td >{$item.reviewer_comments}</td>
                                                                                </tr>
                                                                            {/foreach}
                                                                        </tbody>
                                                                    </table>
                                                                {else}
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                    </div>
                                                                {/if}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <h2><span class="font-semibold">Version Comparision</span></h2>
                                        <div class="vd_content-section clearfix">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel widget">
                                                            <div class="panel-body table-responsive">
                                                                <a class="btn btn-info"  href="{$version_comparison_link}" onclick="window.open(this.href, 'compare_window', 'left=200,top=150,width=500,height=500,toolbar=1,resizable=0');
                                                                        return false;"><i class="fa fa-copy"></i> Click to Compare</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                        <div class="vd_content-section clearfix">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel widget">
                                                        <div class="panel-heading vd_bg-blue">
                                                            <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-indent"></i> </span> Insight</h3>
                                                        </div>
                                                        <div class="panel-body-list">
                                                            <div id="wizard-6" class="form-wizard condensed">
                                                                <div class="row mgbt-xs-0">
                                                                    <div class="col-sm-2">
                                                                        <ul>
                                                                            <li><a href="#tab61" data-toggle="tab"> <div class="menu-icon"> 1 </div> Revision History </a></li>
                                                                            <li><a href="#tab62" data-toggle="tab"> <div class="menu-icon"> 2 </div> Life Cycle Comments </a></li>
                                                                            <li><a href="#tab63" data-toggle="tab"> <div class="menu-icon"> 3 </div> Interlinked SOPs </a></li>
                                                                            <li><a href="#tab64" data-toggle="tab"> <div class="menu-icon"> 4 </div> Attachments </a></li>
                                                                            <li><a href="#tab65" data-toggle="tab"> <div class="menu-icon"> 5 </div> Extend </a></li>
                                                                            <li><a href="#tab66" data-toggle="tab"> <div class="menu-icon"> 6 </div> Drop </a></li>
                                                                            <li><a href="#tab67" data-toggle="tab"> <div class="menu-icon"> 7 </div> Cancel </a></li>
                                                                            <li><a href="#tab68" data-toggle="tab"> <div class="menu-icon"> 8 </div> Transfer </a></li>
                                                                            <li><a href="#tab69" data-toggle="tab"> <div class="menu-icon"> 9 </div> Department View </a></li>
                                                                            <li><a href="#tab70" data-toggle="tab"> <div class="menu-icon"> 10 </div> Responsible Persons </a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-10">
                                                                        <div class="tab-content no-bd pd-15">
                                                                            <div class="tab-pane" id="tab61">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($sop_history)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-history">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_type"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_name"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="cc_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="revision"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_supersedes"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_effective_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_expiry_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_published_status"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$sop_history} 
                                                                                                        <tr >
                                                                                                            <td >{$item.sop_type}</td>
                                                                                                            <td ><a href="index.php?module=sop&action=view_sop&object_id={$item.sop_object_id}" target="_blank"><font color="blue">{$item.sop_no}</font></a></td>
                                                                                                            <td >{$item.sop_name}</td>
                                                                                                            <td >{$item.cc_no}</td>
                                                                                                            <td >{$item.revision}</td>
                                                                                                            <td >{$item.supersedes}</td>
                                                                                                            <td >{$item.effective_date}</td>
                                                                                                            <td >{$item.expiry_date}</td>
                                                                                                            <td >{$item.status}</td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab62">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($sop_received_suggestion_array)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-suggestion">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_improvement"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_improvement_suggested_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="department"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_reviewed_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_reviewed_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_review_status"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_review_comments"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$sop_received_suggestion_array}
                                                                                                        <tr >
                                                                                                            <td >{$item.comments}</td>
                                                                                                            <td >{$item.username}</td>
                                                                                                            <td >{$item.department_name}</td>
                                                                                                            <td >{$item.date_time}</td>
                                                                                                            <td >{$item.comment_reviewed_by}</td>
                                                                                                            <td >{$item.reviewer_date}</td>
                                                                                                            <td >{$item.imp_status}</td>
                                                                                                            <td >{$item.reviewer_comments}</td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab63">
                                                                                <div class="form-group">
                                                                                    <h2><span class="font-semibold">SOP List</span></h2>
                                                                                    {if !empty($interlinked_sop_list)}
                                                                                        <div class="panel-body table-responsive">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-label">{attribute_name module=sop attribute=initiated_by}</div>
                                                                                                    <input type="text" readonly value="{$interlinked_sop_created_by}" class="mgbt-xs-20 mgbt-sm-0">
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-label">{attribute_name module=sop attribute=department}</div>
                                                                                                    <input type="text" readonly value="{$interlinked_sop_created_by_dept}" class="mgbt-xs-20 mgbt-sm-0">
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-label">{attribute_name module=sop attribute=create_time}</div>
                                                                                                    <input type="text" readonly value="{$interlinked_sop_created_time}" class="mgbt-xs-20 mgbt-sm-0">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <div class="form-label">{attribute_name module=sop attribute=remarks}</div>
                                                                                                    <textarea disabled>{$interlinked_sop_remarks}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="panel-body table-responsive">
                                                                                            <table class="table table-bordered table-striped" id="data-tables-interlinked_sop_users">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="s_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="sop_name"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$interlinked_sop_list}
                                                                                                        <tr >
                                                                                                            <td >{$item.count}</td>
                                                                                                            <td >{$item.sop_name}</td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <h2><span class="font-semibold">Mail Sent To</span></h2>
                                                                                        <div class="panel-body table-responsive">
                                                                                            <table class="table table-bordered table-striped" id="data-tables-interlinked_sop">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="s_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="username"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="department"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$interlinked_sop_users_list}
                                                                                                        <tr >
                                                                                                            <td >{$item.count}</td>
                                                                                                            <td >{$item.user_name}</td>
                                                                                                            <td >{$item.dept}</td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    {else}
                                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                            <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                        </div>
                                                                                    {/if}
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab64">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($fileobjectarray)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-attachments">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="file" attribute="name"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="size"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="date"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$fileobjectarray}
                                                                                                        <tr >
                                                                                                            <td ><a href="?module=file&action=view_request_file&file_id={$item.object_id}"><font color="blue">{$item.name}</font></a></td>
                                                                                                            <td >{GetFriendlySize file_size=$item.size}</td>
                                                                                                            <td >{$item.attached_by}</td>
                                                                                                            <td >{$item.attached_date}</td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab65">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($extend_details)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-extend_details">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="effective_date_ext_from"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="effective_date_ext_to"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="reason"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="extended_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="extended_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="capa_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="mail_send_to"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$extend_details}
                                                                                                        <tr >
                                                                                                            <td >{$item.extend_from}</td>
                                                                                                            <td >{$item.extend_to}</td>
                                                                                                            <td >{$item.reason}</td>
                                                                                                            <td >{$item.extended_by}</td>
                                                                                                            <td >{$item.extended_time}</td>
                                                                                                            <td >{$item.capa_no}</td>
                                                                                                            <td >
                                                                                                                {foreach name=list1 item=item1 key=key1 from=$item.mail_send_to}
                                                                                                                    {$item1.mail_to}<br>
                                                                                                                {/foreach}

                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab66">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($dropped_details)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-drop_details">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="reason"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="dropped_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="dropped_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="cc_no"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="mail_send_to"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$dropped_details}
                                                                                                        <tr >
                                                                                                            <td >{$item.reason}</td>
                                                                                                            <td >{$item.dropped_by}</td>
                                                                                                            <td >{$item.dropped_time}</td>
                                                                                                            <td >{$item.cc_no}</td>
                                                                                                            <td >
                                                                                                                {foreach name=list1 item=item1 key=key1 from=$item.mail_send_to}
                                                                                                                    {$item1.mail_to}<br>
                                                                                                                {/foreach}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab67">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($cancelled_details)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-cancel_details">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="reason"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="cancelled_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="cancelled_date"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$cancelled_details}
                                                                                                        <tr >
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
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab68">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($transferred_details)}
                                                                                            <table class="table table-bordered table-striped" id="data-tables-transferred_details">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="sop" attribute="reason"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="transferred_by"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="transferred_date"}</th>
                                                                                                        <th>{attribute_name module="sop" attribute="mail_send_to"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$transferred_details}
                                                                                                        <tr >
                                                                                                            <td >{$item.reason}</td>
                                                                                                            <td >{$item.transferred_by}</td>
                                                                                                            <td >{$item.transferred_time}</td>
                                                                                                            <td >
                                                                                                                {foreach name=list1 item=item1 key=key1 from=$item.mail_send_to}
                                                                                                                    {$item1.mail_to}<br>
                                                                                                                {/foreach}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab69">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        <div class="col-md-12"><h4>{attribute_name module="sop" attribute="dept_view"}</h4>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-11">
                                                                                                <div class="vd_checkbox checkbox-danger">
                                                                                                    {foreach name=list item=item key=key from=$dept_doc_view_details}
                                                                                                        <input type="checkbox" id="view{$item.dept_id}" {if $item.is_dept_can_view} checked="true"{/if} disabled>
                                                                                                        <label for="view{$item.dept_id}"> {$item.dept} </label><br>
                                                                                                    {/foreach}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab70">
                                                                                <div class="form-group">
                                                                                    <div class="panel-body table-responsive">
                                                                                        <table class="table table-bordered table-striped" id="data-tables-cancel_details">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>{attribute_name module="admin" attribute="level"}</th>
                                                                                                    <th>{attribute_name module="admin" attribute="resp_per"}</th>
                                                                                                    <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                                                                    <th>{attribute_name module="admin" attribute="department"}</th>
                                                                                                    <th>{attribute_name module="admin" attribute="is_active"}</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                {foreach name=list item=item key=key from=$monitroing_resp_per1_all}
                                                                                                    <tr >
                                                                                                        <td >{$item.level}</td>
                                                                                                        <td >{$item.resp_per}</td>
                                                                                                        <td >{$item.resp_per_plant}</td>
                                                                                                        <td >{$item.resp_per_dept}</td>
                                                                                                        <td >{$item.is_active}</td>
                                                                                                    </tr>
                                                                                                {/foreach}
                                                                                                {foreach name=list item=item key=key from=$monitroing_resp_per2_all}
                                                                                                    <tr >
                                                                                                        <td >{$item.level}</td>
                                                                                                        <td >{$item.resp_per}</td>
                                                                                                        <td >{$item.resp_per_plant}</td>
                                                                                                        <td >{$item.resp_per_dept}</td>
                                                                                                        <td >{$item.is_active}</td>
                                                                                                    </tr>
                                                                                                {/foreach}
                                                                                                {foreach name=list item=item key=key from=$monitroing_resp_per3_all}
                                                                                                    <tr >
                                                                                                        <td >{$item.level}</td>
                                                                                                        <td >{$item.resp_per}</td>
                                                                                                        <td >{$item.resp_per_plant}</td>
                                                                                                        <td >{$item.resp_per_dept}</td>
                                                                                                        <td >{$item.is_active}</td>
                                                                                                    </tr>
                                                                                                {/foreach}
                                                                                            </tbody>
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
                                                    <!-- Panel Widget --> 
                                                </div>
                                                <!-- col-md-12 --> 
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
                        </form>
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
                                                            <li><a href="#tab21" data-toggle="tab"><div class="menu-icon"> 1 </div>Add Format / Annexure </a></li>
                                                            <li><a href="#tab22" data-toggle="tab"><div class="menu-icon"> 2 </div>SOP </a></li>
                                                            <li><a href="#tab23" data-toggle="tab"><div class="menu-icon"> 3 </div>Format(s) </a></li>
                                                            <li><a href="#tab24" data-toggle="tab"><div class="menu-icon"> 4 </div>Annexure(s)</a></li>
                                                            <li><a href="#tab25" data-toggle="tab"><div class="menu-icon"> 5 </div>Attachments </a></li>
                                                            <li><a href="#tab26" data-toggle="tab"><div class="menu-icon"> 6 </div>Department View </a></li>
                                                            <li><a href="#tab27" data-toggle="tab"><div class="menu-icon"> 7 </div>Responsible Person </a></li>
                                                            {if !empty($prev_sop_received_suggestion_array)}
                                                                <li><a href="#tab28" data-toggle="tab"><div class="menu-icon"> 8 </div>Review Life Cycle Comments</a></li>
                                                            {/if}
                                                        </ul>
                                                        <div class="progress progress-striped active">
                                                            <div class="progress-bar progress-bar-info" > </div>
                                                        </div>
                                                        <div class="tab-content no-bd pd-25">
                                                            <div class="tab-pane" id="tab21">
                                                                <div class="panel-body">
                                                                    <div class="modal-wide-width">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                                <h4 class="modal-title" id="myModalLabel">Add Format/Annexure Form</h4>
                                                                            </div>
                                                                            <form name="add_formats_annexure-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_formats_annexure-form" autocomplete="off">
                                                                                <div class="modal-body">
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
                                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="select_type"} <span class="vd_red">*</span></label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                                <select class="width-60" name="format_annexure_type" id="format_annexure_type" required title="Select Valid Type" onchange = format_annexure_exists('{$regobj->sop_object_id}');>
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Format">Format</option>
                                                                                                    <option value="Annexure">Annexure</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="name"} <span class="vd_red">*</span></label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                                <input type="text" placeholder="Min 3 - Max 80" class="width-60 required" name="format_annexure_name" id="format_annexure_name" maxlength="80" required title="Enter Valid Name" onkeyup="format_annexure_exists('{$regobj->sop_object_id}')">
                                                                                            </div>
                                                                                            <div id="message_format_annexure"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="orientation"} <span class="vd_red">*</span></label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                                <select class="width-60" name="format_annexure_ori" id="format_annexure_ori" required title="Select Valid Orientation">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="L">Landscape</option>
                                                                                                    <option value="P">Portrait</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="language"} <span class="vd_red">*</span></label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                                <select class="width-60" name="format_annexure_lang" id="format_annexure_lang" required title="Select Valid Language">
                                                                                                    {foreach name=list item=item key=key from=$sop_pdf_sup_lang_list}
                                                                                                        <option value="{$item.code}" {if $item.is_default eq 'yes'} selected {/if}>{$item.language}</option>
                                                                                                    {/foreach}
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer background-login">
                                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="add_format_annexure" id="add_format_annexure" onclick="return format_annexure_validation()">Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab22">
                                                                <div class="form-group">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Select SOP <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li><a href='index.php?module=sop&action=edit_sop&object_id={$regobj->sop_object_id}' onclick="window.open(this.href, 'myeditsopwin', 'resizable=0');
                                                                                    return false;" >{$sop_name}</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab23">
                                                                <div class="form-group">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Select Format <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach key=key item=item from=$formatlist}
                                                                                {if $item.status eq "Enabled"}
                                                                                    <li><a href='index.php?module=sop&action=edit_format&object_id={$item.format_object_id}' onclick="window.open(this.href, 'myeditformatwin', 'resizable=0');
                                                                                            return false;" >{$item.format_name} <font color="blue">[Enabled]</font></a></li>
                                                                                        {else}
                                                                                    <li><a href='index.php?module=sop&action=edit_format&object_id={$item.format_object_id}' onclick="window.open(this.href, 'myeditformatwin', 'resizable=0');
                                                                                            return false;">{$item.format_name} <font color="red">[Removed/Disabled]</font></a></li>
                                                                                        {/if}
                                                                                    {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab24">
                                                                <div class="form-group">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> Select Annexure <i class="fa fa-caret-down prepend-icon"></i> </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            {foreach key=key item=item from=$annexurelist}
                                                                                {if $item.status eq "Enabled"}
                                                                                    <li><a href='index.php?module=sop&action=edit_annexure&object_id={$item.annexure_object_id}' onclick="window.open(this.href, 'myeditannexurewin', 'resizable=0');
                                                                                            return false;" >{$item.annexure_name} <font color="blue">[Enabled]</font></a></li>
                                                                                        {else}
                                                                                    <li><a href='index.php?module=sop&action=edit_annexure&object_id={$item.annexure_object_id}' onclick="window.open(this.href, 'myeditannexurewin', 'resizable=0');
                                                                                            return false;" >{$item.annexure_name} <font color="red">[Removed/Disabled]</font></a></li>
                                                                                        {/if}
                                                                                    {/foreach}
                                                                        </ul>
                                                                    </div>
                                                                </div>     
                                                            </div>
                                                            <div class="tab-pane" id="tab25">
                                                                <div class="vd_content-section clearfix">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="panel-body table-responsive">
                                                                                    <form name="upload-doc-form" id="upload-doc-form"  method="POST" autocomplete="off" class="form-separated">
                                                                                        <!--Dont delete. Dropzone Custom File Upload Script See vendors/custom_inel/file_upload/all_file_upload.js-->
                                                                                        <input type="hidden" name="upload_file_url" id="upload_file_url" value="{$smarty.server.REQUEST_URI}"/>
                                                                                        <input type="hidden" name="upload_file_max_size" id="upload_file_max_size" value="{$smarty.session.max_upload_file_size}"/>
                                                                                        <div id="mydropzone" class="dropzone"></div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12 mgbt-xs-10 mgtp-20">
                                                                                        <div class="mgtp-10 text-right">
                                                                                            <button  class="btn btn-primary" id="submit-all"><i class="fa fa-upload"></i> Upload</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="panel widget">
                                                                                    <div class="panel-body table-responsive">
                                                                                        {if !empty($fileobjectarray)}
                                                                                            <div class="form-group">
                                                                                                <div class="col-md-12 mgbt-xs-10 mgtp-20">
                                                                                                    <div class="mgtp-10 text-right">
                                                                                                        <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <table class="table table-bordered table-striped" id="data-tables-edit_attachments">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>{attribute_name module="file" attribute="name"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="size"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="date"}</th>
                                                                                                        <th>{attribute_name module="file" attribute="actions"}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {foreach name=list item=item key=key from=$fileobjectarray}
                                                                                                        <tr >
                                                                                                            <td ><a href="?module=file&action=view_request_file&file_id={$item.object_id}"><font color="blue">{$item.name}</font></a></td>
                                                                                                            <td >{GetFriendlySize file_size=$item.size}</td>
                                                                                                            <td >{$item.attached_by}</td>
                                                                                                            <td >{$item.attached_date}</td>
                                                                                                            {if !empty($item.can_delete)}
                                                                                                                <td><button type="button" onclick="delete_file_row('{$item.object_id}', '{$regobj->sop_object_id}')" class="removebutton btn btn-danger" title="Remove this file">X</button></td>
                                                                                                            {/if}
                                                                                                        </tr>
                                                                                                    {/foreach}
                                                                                                </tbody>
                                                                                            </table>
                                                                                        {else}
                                                                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                                                                            </div>
                                                                                        {/if}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab26">
                                                                <div class="panel-body">
                                                                    <div class="modal-wide-width">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                                <h4 class="modal-title" id="myModalLabel">Edit Department View Form</h4>
                                                                            </div>
                                                                            <form name="edit_dept_view-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_dept_view-form" autocomplete="off">
                                                                                <div class="modal-body">
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
                                                                                            <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="dept_view"}</label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-11">
                                                                                                <div class="vd_checkbox checkbox-danger">
                                                                                                    {foreach name=list item=item key=key from=$dept_doc_view_details}
                                                                                                        <input type="checkbox" name="dept_view[]" value="{$item.dept_id}" id="{$item.dept_id}" {if $item.is_dept_can_view} checked="true"{/if} {if $item.dept_id eq $usr_dept_id} checked="false" disabled {/if}>
                                                                                                        <label for="{$item.dept_id}"> {$item.dept} </label>
                                                                                                    {/foreach}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer background-login">
                                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="edit_dept_view" id="edit_dept_view">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab27">
                                                                <div class="panel-body">
                                                                    <div class="modal-wide-width">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                                <h4 class="modal-title" id="myModalLabel">Edit Responsible Person Form</h4>
                                                                            </div>
                                                                            <form name="edit_resp_per-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_resp_per-form" autocomplete="off">
                                                                                <div class="modal-body">
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
                                                                                            <label class="control-label col-sm-2">{attribute_name module="admin" attribute="resp_per"} <span class="vd_red">*</span></label>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                                                                                <select class="width-100" name="urdept1" id="urdept1" required title="First Responsible Person Department">
                                                                                                    <option value="">First Responsible Person Department</option>
                                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                                        {if $item.is_dept_can_view}
                                                                                                            <option value="{$item.dept_id}" {if $monitroing_resp_per1_active['0']['resp_per_dept_id'] eq $item.dept_id}selected{/if} >{$item.dept}</option>
                                                                                                        {/if}
                                                                                                    {/foreach}
                                                                                                </select><br><br>
                                                                                                <select class="width-100" name="urdept2" id="urdept2" title="Second Responsible Person Department">
                                                                                                    <option value="">Second Responsible Person Department</option>
                                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                                        {if $item.is_dept_can_view}
                                                                                                            <option value="{$item.dept_id}" {if $monitroing_resp_per2_active['0']['resp_per_dept_id'] eq $item.dept_id}selected{/if}>{$item.dept}</option>
                                                                                                        {/if}
                                                                                                    {/foreach}
                                                                                                </select><br><br>
                                                                                                <select class="width-100" name="urdept3" id="urdept3" title="Third Responsible Person Department">
                                                                                                    <option value="">Third Responsible Person Department</option>
                                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                                        {if $item.is_dept_can_view}
                                                                                                            <option value="{$item.dept_id}" {if $monitroing_resp_per3_active['0']['resp_per_dept_id'] eq $item.dept_id}selected{/if}>{$item.dept}</option>
                                                                                                        {/if}
                                                                                                    {/foreach}
                                                                                                </select><br><br>
                                                                                            </div>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                                                                                <select class="width-100" name="urdept1_resp" id="urdept1_resp" required title="First Responsible Person">
                                                                                                    <option value="">First Responsible Person</option>
                                                                                                    {foreach name=list item=item key=key from=$monitroing_resp1_dept_users}
                                                                                                        <option value="{$item.user_id}" {if $monitroing_resp_per1_active['0']['resp_per_id'] eq $item.user_id}selected{/if} >{$item.user_name}</option>
                                                                                                    {/foreach}
                                                                                                </select><br><br>
                                                                                                <select class="width-100" name="urdept2_resp" id="urdept2_resp" title="Second Responsible Person">
                                                                                                    <option value="">Second Responsible Person</option>
                                                                                                    {foreach name=list item=item key=key from=$monitroing_resp2_dept_users}
                                                                                                        <option value="{$item.user_id}" {if $monitroing_resp_per2_active['0']['resp_per_id'] eq $item.user_id}selected{/if} >{$item.user_name}</option>
                                                                                                    {/foreach}
                                                                                                </select><br><br>
                                                                                                <select class="width-100" name="urdept3_resp" id="urdept3_resp" title="Third Responsible Person">
                                                                                                    <option value="">Third Responsible Person</option>
                                                                                                    {foreach name=list item=item key=key from=$monitroing_resp3_dept_users}
                                                                                                        <option value="{$item.user_id}" {if $monitroing_resp_per3_active['0']['resp_per_id'] eq $item.user_id}selected{/if} >{$item.user_name}</option>
                                                                                                    {/foreach}
                                                                                                </select>
                                                                                                <input type="hidden" id="uresp_per_type">
                                                                                                <input type="hidden" id="urdept_resp_count">
                                                                                                <input type="hidden" id="def_sop_moni_limit" value="{$def_sop_moni_limit}">
                                                                                            </div>
                                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-2">
                                                                                                <div id="urdept1_resp_count_msg"></div><br>
                                                                                                <div id="urdept2_resp_count_msg"></div><br><br>
                                                                                                <div id="urdept3_resp_count_msg"></div><br>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer background-login">
                                                                                        <button type="submit" class="btn vd_btn vd_bg-green" name="edit_resp_per" id="edit_resp_per">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {if !empty($prev_sop_received_suggestion_array)}
                                                                <div class="tab-pane" id="tab28">
                                                                    <div class="form-group">
                                                                        <form name="prev_received_suggestion" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="prev_received_suggestion-form" autocomplete="off">
                                                                            <table class="table table-bordered table-striped" id="data-tables-suggestion-review">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>{attribute_name module="sop" attribute="sop_improvement"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_improvement_suggested_by"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="department"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="date"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_reviewed_by"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_reviewed_date"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_review_status"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_suggestion_review_comments"}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach name=list item=item key=key from=$prev_sop_received_suggestion_array}
                                                                                        <tr >
                                                                                            <td >{$item.comments}</td>
                                                                                            <td >{$item.username}</td>
                                                                                            <td >{$item.department_name}</td>
                                                                                            <td >{$item.date_time}</td>
                                                                                            <td >{$item.comment_reviewed_by}</td>
                                                                                            <td >{$item.reviewer_date}</td>
                                                                                            <td class="smallfieldcell">
                                                                                                <select name="review_status[]"  title="Select Review Status">
                                                                                                    <option value="">Select</option>
                                                                                                    <option value="Implemented" {if $item.imp_status eq "Implemented"} selected {/if}>Implemented</option>
                                                                                                    <option value="Not Implemented" {if $item.imp_status eq "Not Implemented"} selected {/if}>Not Implemented</option>
                                                                                                    <option value="NA" {if $item.imp_status eq "NA"} selected {/if}>NA</option>
                                                                                                    <option value="Not Required" {if $item.imp_status eq "Not Required"} selected {/if}>Not Required</option>
                                                                                                </select>
                                                                                            </td>
                                                                                    <input type="hidden" name="suggestion_id[]" value="{$item.object_id}">
                                                                                    <td><textarea rows="1" cols="20" name="review_comments[]" title="Enter Review Comments">{if $item.reviewer_comments neq ""}{$item.reviewer_comments}{else}{/if}</textarea></td>
                                                                                    </tr>

                                                                                {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                            <hr>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-1"></div>
                                                                                <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                                                    <div class="mgtp-10">
                                                                                        <button class="btn vd_bg-green vd_white" type="submit"  name="review_suggestion">Review</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 mgbt-xs-5"> </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            {/if}
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
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus"> Status </a> </h4>
                </div>
                <div id="collapseStatus" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">{$regobj->status}</h2>
                                <form name="sop_status_details" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_status_details-form" autocomplete="off">
                                    <table class="table table-bordered table-striped" id="data-tables-status">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module=sop attribute=date}</th>
                                                <th>{attribute_name module=sop attribute=username}</th>
                                                <th>{attribute_name module=sop attribute=department}</th>
                                                <th>{attribute_name module=sop attribute=action}</th>
                                                <th>{attribute_name module=sop attribute=status}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach name=list item=item key=key from=$status_details} 
                                                <tr >
                                                    <td >{$item.date}</td>
                                                    <td >{$item.user_name}</td>
                                                    <td >{$item.department}</td>
                                                    <td >{$item.action}</td>
                                                    <td >{$item.status}</td>
                                                </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <hr>
                            {if !empty($sop_remarks_array)}
                                <div class="panel-body">
                                    <h2 class="mgbt-xs-20">Comments</h2>
                                    <form name="sop_status_details_remarks" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_status_details_remarks-form" autocomplete="off">
                                        <table class="table table-bordered table-striped" id="data-tables-status-remarks">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module=sop attribute=date}</th>
                                                    <th>{attribute_name module=sop attribute=username}</th>
                                                    <th>{attribute_name module=sop attribute=department}</th>
                                                    <th>{attribute_name module=sop attribute=remarks}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach key=key item=cnt from=$sop_remarks_array}
                                                    <tr >
                                                        <td>{$cnt.date_time}</td>
                                                        <td>{$cnt.username}</td>
                                                        <td>{$cnt.department_name}</td>
                                                        <td>{$cnt.remarks}</td>
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
            {if !empty($cancel_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_cancel_button"> Cancel </a> </h4>
                    </div>
                    <div id="collapse_show_cancel_button" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Cancel Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Cancel Form -->
                                                            <form name="request_cancel-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_cancel-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="reason"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="cancel_reason" id="cancel_reason" maxlength="500" required title="Enter Valid Reason" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="request_cancel" id="request_cancel" >Cancel</button>
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
            {if !empty($request_review_pre_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_request_review_pre_rereview"> Action </a> </h4>
                    </div>
                    <div id="collapse_request_review_pre_rereview" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        {if !empty($open_review_comments_array)}
                                            <div class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Review Comments Acceptance Form</h4>
                                                            </div>
                                                            <form name="update_review_comments-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_review_comments-form" autocomplete="off">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper">
                                                                                <table class="table table-bordered table-striped" id="review_comments_input_table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                            <th width="25%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                            <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                            <th width="10%">{attribute_name module=sop attribute=action}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {foreach item=item key=key from=$open_review_comments_array}
                                                                                            <tr >
                                                                                                <td >{$item.count}</td>
                                                                                                <td >{$item.commented_date}</td>
                                                                                                <td >{$item.commented_by}</td>
                                                                                                <td >{$item.comments}</td>
                                                                                                <td >{$item.accept_status}</td>
                                                                                                <td >{$item.status}</td>
                                                                                                <td >{$item.reviewed_by}</td>
                                                                                                <td >{$item.reviewed_date}</td>
                                                                                                <td >
                                                                                                    <textarea rows="2" cols="20" name="ureview_comments[]" title="Enter Valid Reviewer Comments">{$item.reviewer_comments}</textarea>
                                                                                                    <input type="hidden" name="ureview_comments_id[]" value="{$item.object_id}" class="form-control">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <select class="width-100" title="Seelct Valid Action" name="ureview_comments_action[]">
                                                                                                        <option value="">Select</option>
                                                                                                        <option value="Accepted" {if $item.accept_status eq 'Accepted'}selected{/if}>Accepted</option>
                                                                                                        <option value="Rejected" {if $item.accept_status eq 'Rejected'}selected{/if}>Rejected</option>
                                                                                                    </select>
                                                                                                </td>
                                                                                            </tr>
                                                                                        {/foreach}
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_save" id="ureview_comments_save">Save</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_completed" id="ureview_comments_completed">Completed</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        {if $request_review_pre_review_selection_option}
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Request Pre Review/Review Form</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="select_review_type"} <span class="vd_red">*</span></label>
                                                                        <select class="width-40" title="Select Review Type" name="is_pre_review_required" id="is_pre_review_required">
                                                                            <option value="">Select Valid Review Type</option>
                                                                            <option value="send_pre_review">Send To Pre Review</option>
                                                                            <option value="send_review">Send To Review</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        {/if}
                                                        <!--Request Pre Review Form -->
                                                        <div class="panel-body" id="pre_review_show_hide" style="display:none">
                                                            <h2 class="mgbt-xs-20">Request Pre Review Form</h2>
                                                            <form name="request_pre_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_pre_review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="department"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="department" id="department" onchange = get_dept_pre_review_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select Department</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                        <div class="col-xs-5">
                                                                            <select name="pre_review_from[]" id="pre_review_from_users" class="search_users form-control" size="7" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-xs-1"><br>
                                                                            <button type="button" id="pre_review_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="pre_review_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="pre_review_from_users_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="pre_review_from_users_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-xs-5">
                                                                            <select name="pre_review_to[]" id="pre_review_from_users_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="request_pre_review" id="request_pre_review" >Send Pre Review</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <hr>
                                                        </div>
                                                        <!--Request Review Form -->
                                                        <div class="panel-body" id="review_show_hide" style="display:none">
                                                            <h2 class="mgbt-xs-20">Request Review Form</h2>
                                                            <form name="request_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="department" id="department" onchange = "get_action_users('{$lm_doc_id}','review',this.options[this.selectedIndex].value);" required title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="review_user" id="userid" required title="Select Valid User Name">
                                                                                <option value="">Select</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="request_reviewal" id="request_reviewal" >Send Review</button>
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
            {if !empty($show_pre_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_pre_review"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_pre_review" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Add Review Comments Form</h4>
                                                        </div>
                                                        <!--Add Review Comments-->
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_review_comments_modal"><i class="fa fa-plus"></i> Review Comments</button>
                                                                        <a class="btn btn-info"  href="{$workflow_comparison_link}" onclick="window.open(this.href, 'compare_window','left=200,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-copy"></i> Track Changes</a>
                                                                        <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                            <hr>
                                                            {if !empty($review_comments_user_array)}
                                                                <h2 class="mgbt-xs-20">Review Comments Status</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div id="first-name-input-wrapper">
                                                                            <table class="table table-bordered table-striped" id="view_review_comments_user_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach item=item key=key from=$review_comments_user_array}
                                                                                        <tr >
                                                                                            <td >{$item.count}</td>
                                                                                            <td >{$item.comments}</td>
                                                                                            <td >{$item.commented_by}</td>
                                                                                            <td >{$item.commented_date}</td>
                                                                                            <td >{$item.accept_status}</td>
                                                                                            <td >{$item.status}</td>
                                                                                            <td >{$item.reviewed_by}</td>
                                                                                            <td >{$item.reviewed_date}</td>
                                                                                            <td >{$item.review_comments}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                            <input type="hidden" id="delete_review_comments_id"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Pre Review Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Pre Review Form -->
                                                            <form name="pre_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="pre_review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="pre_review_type"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="pre_review_type" id="pre_review_type" onchange="select_pre_review(this.options[this.selectedIndex].value);" required title="Select Valid Pre Review Type">
                                                                                <option value="">Select</option>
                                                                                <option value="pre_review">Pre Review</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="pre_reviewed" id="pre_reviewed" style="display:none">Pre Review</button>
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
            {if !empty($show_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_review"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_review" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Add Review Comments Form</h4>
                                                        </div>
                                                        <!--Add Review Comments-->
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_review_comments_modal"><i class="fa fa-plus"></i> Review Comments</button>
                                                                        <a class="btn btn-info"  href="{$workflow_comparison_link}" onclick="window.open(this.href, 'compare_window','left=200,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-copy"></i> Track Changes</a>
                                                                        <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div><br><hr>
                                                            {if !empty($review_comments_user_array)}
                                                                <h2 class="mgbt-xs-20">Review Comments Status</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div id="first-name-input-wrapper">
                                                                            <table class="table table-bordered table-striped" id="view_review_comments_user_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach item=item key=key from=$review_comments_user_array}
                                                                                        <tr >
                                                                                            <td >{$item.count}</td>
                                                                                            <td >{$item.comments}</td>
                                                                                            <td >{$item.commented_by}</td>
                                                                                            <td >{$item.commented_date}</td>
                                                                                            <td >{$item.accept_status}</td>
                                                                                            <td >{$item.status}</td>
                                                                                            <td >{$item.reviewed_by}</td>
                                                                                            <td >{$item.reviewed_date}</td>
                                                                                            <td >{$item.review_comments}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                            <input type="hidden" id="delete_review_comments_id"/>
                                                                        </div>
                                                                    </div>
                                                                </div><hr>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Review Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Review Form -->
                                                            <form name="review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="review_type"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="review_type" id="review_type" onchange="select_review(this.options[this.selectedIndex].value);" required title="Select Valid Pre Review Type">
                                                                                <option value="">Select</option>
                                                                                <option value="review" {if $disable_review_option}disabled{/if}>Review - [Send to Approver]</option>
                                                                                <option value="review_need_correction">Review Need Correction - [Send to Creator]</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><hr>
                                                                {include file =$_TEMPLATE_PATH_|cat:"pass_auth.sop.tpl"}
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="reviewed" disabled id="reviewed" style="display:none">e-Review</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="review_need_correction" id="review_need_correction" disabled style="display:none">Send Query</button>
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
            {if !empty($request_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_request_approve"> Action </a> </h4>
                    </div>
                    <div id="collapse_request_approve" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        {if !empty($open_review_comments_array)}
                                            <div class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Review Comments Acceptance Form</h4>
                                                            </div>
                                                            <form name="update_review_comments-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_review_comments-form" autocomplete="off">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper">
                                                                                <table class="table table-bordered table-striped" id="review_comments_input_table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                            <th width="25%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                            <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                            <th width="10%">{attribute_name module=sop attribute=action}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {foreach item=item key=key from=$open_review_comments_array}
                                                                                            <tr >
                                                                                                <td >{$item.count}</td>
                                                                                                <td >{$item.commented_date}</td>
                                                                                                <td >{$item.commented_by}</td>
                                                                                                <td >{$item.comments}</td>
                                                                                                <td >{$item.accept_status}</td>
                                                                                                <td >{$item.status}</td>
                                                                                                <td >{$item.reviewed_by}</td>
                                                                                                <td >{$item.reviewed_date}</td>
                                                                                                <td >
                                                                                                    <textarea rows="2" cols="20" name="ureview_comments[]" title="Enter Valid Reviewer Comments">{$item.reviewer_comments}</textarea>
                                                                                                    <input type="hidden" name="ureview_comments_id[]" value="{$item.object_id}" class="form-control">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <select class="width-100" title="Seelct Valid Action" name="ureview_comments_action[]">
                                                                                                        <option value="">Select</option>
                                                                                                        <option value="Accepted" {if $item.accept_status eq 'Accepted'}selected{/if}>Accepted</option>
                                                                                                        <option value="Rejected" {if $item.accept_status eq 'Rejected'}selected{/if}>Rejected</option>
                                                                                                    </select>
                                                                                                </td>
                                                                                            </tr>
                                                                                        {/foreach}
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_save" id="ureview_comments_save">Save</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_completed" id="ureview_comments_completed">Completed</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                        {if $request_approver_selection_option}
                                            <div class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Request Approve Form</h4>
                                                            </div>
                                                            <!--Request Approve Form -->
                                                            <div class="panel-body">
                                                                <form name="request_approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_approve-form" autocomplete="off">
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
                                                                            <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="department" id="department" onchange = "get_action_users('{$lm_doc_id}','approve',this.options[this.selectedIndex].value);" required title="Select Valid Department">
                                                                                    <option value="">Select</option>
                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                        {if $item.is_dept_can_view}
                                                                                            <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                        {/if}
                                                                                    {/foreach}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="approve_user" id="userid" required title="Select Valid User Name">
                                                                                    <option value="">Select</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-1"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="request_approval" id="request_approval" >Send Approve</button>
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
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_approve"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_approve" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Add Review Comments Form</h4>
                                                        </div>
                                                        <!--Add Review Comments-->
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_review_comments_modal"><i class="fa fa-plus"></i> Review Comments</button>
                                                                        <a class="btn btn-info"  href="{$workflow_comparison_link}" onclick="window.open(this.href, 'compare_window','left=200,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-copy"></i> Track Changes</a>
                                                                        <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                            <hr>
                                                            {if !empty($review_comments_user_array)}
                                                                <h2 class="mgbt-xs-20">Review Comments Status</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div id="first-name-input-wrapper">
                                                                            <table class="table table-bordered table-striped" id="view_review_comments_user_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach item=item key=key from=$review_comments_user_array}
                                                                                        <tr >
                                                                                            <td >{$item.count}</td>
                                                                                            <td >{$item.comments}</td>
                                                                                            <td >{$item.commented_by}</td>
                                                                                            <td >{$item.commented_date}</td>
                                                                                            <td >{$item.accept_status}</td>
                                                                                            <td >{$item.status}</td>
                                                                                            <td >{$item.reviewed_by}</td>
                                                                                            <td >{$item.reviewed_date}</td>
                                                                                            <td >{$item.review_comments}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                            <input type="hidden" id="delete_review_comments_id"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Approve Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Approve Form -->
                                                            <form name="approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="approve-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="approve_type"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="review_type" id="review_type" onchange="select_approve(this.options[this.selectedIndex].value);" required title="Select Valid Approve Type">
                                                                                <option value="">Select</option>
                                                                                <option value="approve" {if $disable_approve_option}disabled{/if}>Approve - [Send To Authorizer]</option>
                                                                                <option value="approve_need_correction">Approve Need Correction - [Send to Creator]</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><hr>
                                                                {include file =$_TEMPLATE_PATH_|cat:"pass_auth.sop.tpl"}
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="approved" id="approved" disabled style="display:none">e-Approve</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="approve_need_correction" id="approve_need_correction" disabled style="display:none">Send Query</button>
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
            {if !empty($request_authorize_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_request_authorize"> Action </a> </h4>
                    </div>
                    <div id="collapse_request_authorize" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        {if !empty($open_review_comments_array)}
                                            <div class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Review Comments Acceptance Form</h4>
                                                            </div>
                                                            <form name="update_review_comments-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="update_review_comments-form" autocomplete="off">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper">
                                                                                <table class="table table-bordered table-striped" id="review_comments_input_table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                            <th width="25%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                            <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                            <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                            <th width="10%">{attribute_name module=sop attribute=action}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {foreach item=item key=key from=$open_review_comments_array}
                                                                                            <tr >
                                                                                                <td >{$item.count}</td>
                                                                                                <td >{$item.commented_date}</td>
                                                                                                <td >{$item.commented_by}</td>
                                                                                                <td >{$item.comments}</td>
                                                                                                <td >{$item.accept_status}</td>
                                                                                                <td >{$item.status}</td>
                                                                                                <td >{$item.reviewed_by}</td>
                                                                                                <td >{$item.reviewed_date}</td>
                                                                                                <td >
                                                                                                    <textarea rows="2" cols="20" name="ureview_comments[]" title="Enter Valid Reviewer Comments">{$item.reviewer_comments}</textarea>
                                                                                                    <input type="hidden" name="ureview_comments_id[]" value="{$item.object_id}" class="form-control">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <select class="width-100" title="Seelct Valid Action" name="ureview_comments_action[]">
                                                                                                        <option value="">Select</option>
                                                                                                        <option value="Accepted" {if $item.accept_status eq 'Accepted'}selected{/if}>Accepted</option>
                                                                                                        <option value="Rejected" {if $item.accept_status eq 'Rejected'}selected{/if}>Rejected</option>
                                                                                                    </select>
                                                                                                </td>
                                                                                            </tr>
                                                                                        {/foreach}
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_save" id="ureview_comments_save">Save</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="ureview_comments_completed" id="ureview_comments_completed">Completed</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                        {if $request_authorizer_selection_option}
                                            <div class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <h4 class="modal-title" id="myModalLabel">Request Authorization Form</h4>
                                                            </div>
                                                            <!--Request Authorization Form -->
                                                            <div class="panel-body">
                                                                <form name="request_auth-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_auth-form" autocomplete="off">
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
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="is_training_required"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="is_training_required" id="is_training_required" {if $is_trainng_required_disable_option} disabled {/if} title="Select Valid Is Training Required ">
                                                                                    <option value="">Select</option>
                                                                                    <option value="yes" {if $is_sop_training_required eq 'yes'}selected{/if}>Yes</option>
                                                                                    <option value="no" {if $is_sop_training_required eq 'no'}selected{/if}>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="department" id="department" onchange = "get_action_users('{$lm_doc_id}','authorize',this.options[this.selectedIndex].value);" required title="Select Valid Department">
                                                                                    <option value="">Select</option>
                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                        {if $item.is_dept_can_view}
                                                                                            <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                        {/if}
                                                                                    {/foreach}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="authorize_user" id="userid" required title="Select Valid User Name">
                                                                                    <option value="">Select</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="request_authorize" id="request_authorize" >Send Authorize</button>
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
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if !empty($show_authorize_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_authorize"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_authorize" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Add Review Comments Form</h4>
                                                        </div>
                                                        <!--Add Review Comments-->
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_review_comments_modal"><i class="fa fa-plus"></i> Review Comments</button>
                                                                        <a class="btn btn-info"  href="{$workflow_comparison_link}" onclick="window.open(this.href, 'compare_window', 'left=200,top=150,width=500,height=500,toolbar=1,resizable=0');
                                                                                return false;"><i class="fa fa-copy"></i> Track Changes</a>
                                                                        <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                            <hr>
                                                            {if !empty($review_comments_user_array)}
                                                                <h2 class="mgbt-xs-20">Review Comments Status</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div id="first-name-input-wrapper">
                                                                            <table class="table table-bordered table-striped" id="view_review_comments_user_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=review_comments}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=commented_date}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=accept_status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_by}</th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=reviewed_date}</th>
                                                                                        <th width="30%">{attribute_name module=sop attribute=reviewer_comments}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach item=item key=key from=$review_comments_user_array}
                                                                                        <tr >
                                                                                            <td >{$item.count}</td>
                                                                                            <td >{$item.comments}</td>
                                                                                            <td >{$item.commented_by}</td>
                                                                                            <td >{$item.commented_date}</td>
                                                                                            <td >{$item.accept_status}</td>
                                                                                            <td >{$item.status}</td>
                                                                                            <td >{$item.reviewed_by}</td>
                                                                                            <td >{$item.reviewed_date}</td>
                                                                                            <td >{$item.review_comments}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
                                                                            <input type="hidden" id="delete_review_comments_id"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Authorization Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Authorization Form -->
                                                            <form name="authorize-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="authorize-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="is_training_required"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" name="auth_is_sop_training_required" id="auth_is_sop_training_required" readonly value="{$is_sop_training_required}" class="width-60">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="authorize_type"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="authorize_type" id="authorize_type" onchange="select_authorize(this.options[this.selectedIndex].value);" required title="Select Valid Authorize Type">
                                                                                <option value="">Select</option>
                                                                                <option value="authorize" {if $disable_authorize_option}disabled{/if}>Authorize - [Send to Approver/Send to Creator]</option>
                                                                                <option value="authorize_need_correction">Authorize Need Correction - [Send to Creator]</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" style="display:none" id="auth_set_effective_date">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="effective_date"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type=text class="width-60" name="effective_date" id="effective_date" readonly maxlength="10" placeholder="DD/MM/YYYY">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><hr>
                                                                {include file =$_TEMPLATE_PATH_|cat:"pass_auth.sop.tpl"}
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="authorized" id="authorized" disabled style="display:none">e-Authorize</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="authorize_need_correction" id="authorize_need_correction" disabled style="display:none">Send Query</button>
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
            {if !empty($show_trainer_assign_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_assign_trainer"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_assign_trainer" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Assign Trainer Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Assign Trainer Form -->
                                                            <form name="assign_trainer-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign_trainer-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="department"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="department" id="department" onchange = get_dept_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="trainer"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="trainer" id="userid" title="Select Valid Trainer Name">
                                                                                <option value="">Select</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="assign_to_trainer" id="assign_to_trainer">Assign</button>
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
            {if !empty($show_training_schedule_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_train_schedule"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_train_schedule" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Training Schedule Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Training Schedule Form -->
                                                            <form name="train_schedule-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="train_schedule-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="training_date"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type=text class="width-60" name="training_date" id="training_date" readonly maxlength="10" placeholder="DD/MM/YYYY" title="Select Valid Training Date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="training_time"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type=text class="width-60" name="training_date_time" id="training_date_time" readonly maxlength="8" placeholder="HH:MM AM/PM" title="Select Valid Training Time">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="venue"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type=text class="width-60" name="venue" id="venue"  maxlength="40" placeholder="Venue" title="Enter Valid Venue">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="send_mail_to"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <input type="checkbox" name="training_info_mail_to_dept[]" value="{$item.dept_id}" id="{$item.dept_id}" checked="true" title="Select Atleast One Department" class="training_info_mail_to_dept_checked">
                                                                                        <label for="{$item.dept_id}"> {$item.dept} </label>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="online_training_link"} </label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                <input type="checkbox" name="training_link" value="yes" id="training_link" checked="true">
                                                                                <label for="training_link"> Yes </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="training_scheduled" id="training_scheduled">Send</button>
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
            {if !empty($rescheduled_training_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_train_reschedule"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_train_reschedule" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Training Reschedule Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Training Reschedule Form -->
                                                            <form name="train_reschedule-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="train_reschedule-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. 
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="alert"} </label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <h3><span class="vd_red"><i class="fa fa-info-circle vd_red"></i> {$scheduled_training_date_alert_msg}</span></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="want_to_reschedule"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <select class="width-60" name="reschedule_training" id="reschedule_training"  required title="Select Valid Reschedule Option">
                                                                                    <option value="">Select</option>
                                                                                    <option value="reschedule">Reschedule</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="view_show_reschdule" style="display:none">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="training_date"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type=text class="width-60 required" name="rtraining_date" id="rtraining_date" readonly maxlength="10" placeholder="DD/MM/YYYY" title="Select Valid Training Date">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="training_time"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type=text class="width-60 required" name="rtraining_date_time" id="rtraining_date_time" readonly maxlength="8" placeholder="HH:MM AM/PM" title="Select Valid Training Time">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="venue"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type=text class="width-60 required" name="rvenue" id="rvenue"  maxlength="40" placeholder="Venue"  title="Enter Valid Venue">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="send_mail_to"}</label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <div class="vd_checkbox checkbox-danger">
                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                        {if $item.is_dept_can_view}
                                                                                            <input type="checkbox" name="rtraining_info_mail_to_dept[]" value="{$item.dept_id}" id="{$item.dept_id}" checked="true" class="rtraining_info_mail_to_dept_checked">
                                                                                            <label for="{$item.dept_id}"> {$item.dept} </label>
                                                                                        {/if}
                                                                                    {/foreach}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="online_training_link"} </label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <div class="vd_checkbox checkbox-danger">
                                                                                    <input type="checkbox" name="rtraining_link" value="yes" id="rtraining_link" checked="true">
                                                                                    <label for="rtraining_link"> Yes </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="training_rescheduled" id="training_rescheduled">Reschedule</button>
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
            {if !empty($update_trainees_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_update_trainees"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_update_trainees" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Training Update Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Training Update Form -->
                                                            <form name="training-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="training-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="alert"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <h3><span class="vd_red"><i class="fa fa-info-circle vd_red"></i> Note:First update the Attendee/Trainees details using 'Update Trainees' option</span></h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="update_training_status"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="training_type" id="training_type"  required title="Select Valid Option">
                                                                                <option value="">Select</option>
                                                                                <option value="update_trainees">Update Trainees</option>
                                                                                <option value="training_completed" {if $disable_training_comleted_option} disabled{/if}>Training Completed</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="online_exam_req_show_hide" style="display:none">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="online_exam_assessment"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="online_exam_req" id="online_exam_req"  title="Select Valid Otion">
                                                                                <option value="">Select</option>
                                                                                <option value="exam_required">Exam Required</option>
                                                                                <option value="exam_not_required">Exam Not Required</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="update_trainee_date_label" style="display:none">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="training_date"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="trainee_training_date" id="trainee_training_date" title="Select Valid Date">
                                                                                <option value="">Select</option>
                                                                                {foreach item=item key=key from=$latest_sop_training_details}
                                                                                    <option value="{$item.object_id}">{$item.training_date} [{$item.status}]</option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="update_trainee_dept_label" style="display:none"><hr>
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="department"} </label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-60" name="trainee_department" id="trainee_department" onchange = get_dept_trainees_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="update_trainee_dept_user_label" style="display:none">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="account_holder"} <span class="vd_red">*</span></label>
                                                                        <div class="col-xs-4">
                                                                            <select name="trainees_from[]" id="utrainees" class="search_users form-control" size="7" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-xs-1"><br>
                                                                            <button type="button" id="utrainees_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="utrainees_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="utrainees_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="utrainees_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <select name="trainees_to[]" id="utrainees_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group" id="update_trainee_nah_add_row_label" style="display:none"><hr>
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button type="button" class="btn btn-info add_new_nah_trainee_input_table"><i class="fa fa-plus"></i> Add Row</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="update_trainee_nah_user_label" style="display:none">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="non_account_holder"} </label>
                                                                        <div class="col-xs-9">
                                                                            <table class="table table-bordered table-striped" id="nah_trainee_input_table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="50%">{attribute_name module=sop attribute=username}<span class="vd_red">*</span></th>
                                                                                        <th width="45%">{attribute_name module=sop attribute=department}<span class="vd_red">*</span></th>
                                                                                        <th width="5%">{attribute_name module=sop attribute=actions}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="update_trainees" id="update_trainees" style="display:none">Update Trainees</button>
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="training_completed" id="training_completed" style="display:none">Training Completed</button>
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
            {if !empty($question_preparation_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_quest_preparation"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_quest_preparation" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Question Preparation Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tf_modal"><i class="fa fa-plus"></i> True/False</button>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mc_modal"><i class="fa fa-plus"></i> Multi Choice</button>
                                                                    <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i></button>
                                                                </div>
                                                            </div>
                                                            <!--Modal True False -->
                                                            <div class="modal fade" id="tf_modal" tabindex="-1" role="dialog" aria-labelledby="tf_modal" aria-hidden="true">
                                                                <div class="modal-wide-width">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header vd_bg-blue vd_white">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Add True/False Question</h4>
                                                                        </div>
                                                                        <form name="add_sop_tf_qns-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_tf_qns-form" autocomplete="off">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <button type="button" class="btn btn-info add_new_tf_qns_input_table"><i class="fa fa-plus"></i> Add Row</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div id="first-name-input-wrapper">
                                                                                            <table class="table table-bordered table-striped" id="tf_qns_input_table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th width="65%">{attribute_name module=sop attribute=question}<span class="vd_red">*</span></th>
                                                                                                        <th width="10%">{attribute_name module=sop attribute=options}<span class="vd_red">*</span></th>
                                                                                                        <th width="10%">{attribute_name module=sop attribute=answer}<span class="vd_red">*</span></th>
                                                                                                        <th width="10%">{attribute_name module=sop attribute=order}</th>
                                                                                                        <th width="5%">{attribute_name module=sop attribute=action}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="atf_question" id="atf_question">Add</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Modal Multi Choice -->
                                                            <div class="modal fade" id="mc_modal" tabindex="-1" role="dialog" aria-labelledby="mc_modal" aria-hidden="true">
                                                                <div class="modal-wide-width">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header vd_bg-blue vd_white">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Add Multi Choice Question</h4>
                                                                        </div>
                                                                        <form name="add_sop_mc_qns-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_mc_qns-form" autocomplete="off">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <button type="button" class="btn btn-info add_new_mc_qns_input_table"><i class="fa fa-plus"></i> Add Row</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div id="first-name-input-wrapper">
                                                                                            <table class="table table-bordered table-striped" id="mc_qns_input_table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th width="40%">{attribute_name module=sop attribute=question}<span class="vd_red">*</span></th>
                                                                                                        <th width="35%">{attribute_name module=sop attribute=options}<span class="vd_red">*</span></th>
                                                                                                        <th width="10%">{attribute_name module=sop attribute=answer}<span class="vd_red">*</span></th>
                                                                                                        <th width="10%">{attribute_name module=sop attribute=order}</th>
                                                                                                        <th width="5%">{attribute_name module=sop attribute=action}</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="amc_question" id="amc_question">Add</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Modal Question Preparation Over -->
                                                            <div class="modal fade" id="assign_exam_modal" tabindex="-1" role="dialog" aria-labelledby="assign_exam_modal" aria-hidden="true">
                                                                <div class="modal-wide-width">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header vd_bg-blue vd_white">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Assign for Exam</h4>
                                                                        </div>
                                                                        <form name="assign_exam-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="assign_exam-form" autocomplete="off">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label  col-sm-2">Questions Limit <span class="vd_red">*</span></label>
                                                                                        <select class="width-10" name="assign_exam_qns_limit" id="assign_exam_qns_limit" title="Select Valid Question Limit">
                                                                                            <option value="">Select Question Limit</option>
                                                                                            {foreach name=list item=item key=key from=$sop_question_ans_list}
                                                                                                <option value="{$item.count}" {if $sop_question_ans_count eq $item.count} selected{/if}>{$item.count}</option>
                                                                                            {/foreach}
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label  col-sm-2">Target Date <span class="vd_red">*</span></label>
                                                                                        <input type=text class="width-10" name="assign_exam_target_date" id="assign_exam_target_date" readonly maxlength="10" placeholder="DD/MM/YYYY" title="Select Target Date">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12" >
                                                                                        <label class="col-sm-2 control-label">Select<span class="vd_red">*</span></label>
                                                                                        <div class="vd_checkbox checkbox-success col-sm-10">
                                                                                            {foreach name=list item=item key=key from=$sop_trainees_details}
                                                                                                <input type="checkbox" name="assign_exam_users[]" value="{$item.trainee_id}" id="{$item.trainee_id}" checked><label for="{$item.trainee_id}"> {$item.trainee_name} [{$item.trainee_dept}]</label><br>
                                                                                            {/foreach}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                                        <textarea placeholder="Min 3 - Max 500" rows="2" class="width-20" name="comments" id="comments" maxlength="500" title="Enter Valid Remarks" ></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer background-login">
                                                                                <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="sub_assign_exam" id="sub_assign_exam">Send</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><br><br>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div id="first-name-input-wrapper">
                                                                        <table class="table table-bordered table-striped" id="qns_input_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                    <th width="45%">{attribute_name module=sop attribute=question}</th>
                                                                                    <th width="35%">{attribute_name module=sop attribute=options}</th>
                                                                                    <th width="5%">{attribute_name module=sop attribute=answer}</th>
                                                                                    <th width="5%">{attribute_name module=sop attribute=order}</th>
                                                                                    <th width="5%">{attribute_name module=sop attribute=action}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {foreach item=item key=key from=$sop_question_ans_list}
                                                                                    <tr >
                                                                                        <td >{$item.count}</td>
                                                                                        <td >{$item.question}</td>
                                                                                        <td >
                                                                                            {foreach item=item key=key from=$item.qns_options}
                                                                                                {$item.option_no}. {$item.option}<br>
                                                                                            {/foreach}
                                                                                        </td>
                                                                                        <td >{$item.answer_no}</td>
                                                                                        <td >{$item.order}</td>
                                                                                        <td>
                                                                                            <button type="button" class="delete_aqns btn btn-danger" onclick="delete_aqns('{$item.object_id}')"><i class="fa fa-times"></i></button><br><br>
                                                                                        </td>
                                                                                    </tr>
                                                                                {/foreach}
                                                                            </tbody>
                                                                        </table>
                                                                        <input type="hidden" id="delete_aqns_id">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {if !empty($sop_question_ans_count)}
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <button type="button" class="btn vd_bg-green vd_white" data-toggle="modal" data-target="#assign_exam_modal" onclick="set_qns_limit()"><i class="fa fa-send"></i> Assign</button>
                                                                </div>
                                                            {/if}
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
            {if !empty($attend_online_exam_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_attend_online_exam"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_attend_online_exam" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Online Exam Form</h4>
                                                        </div>
                                                        {if $update_capa_no}
                                                            <div class="panel-body">
                                                                <!--Update CAPA No Form -->
                                                                <form name="attend_online_exam_capa-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="attend_online_exam_capa-form" autocomplete="off">
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
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="attempt"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type=text class="width-60" value="{$update_capa_attempt}" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="capa_no"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type=text class="width-60" name="aoe_capa_no" id="aoe_capa_no" maxlength="100" placeholder="Enter Valid CAPA No" title="Enter Valid CAPA No">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="save_aoe_capa_no" id="save_aoe_capa_no"> Add CAPA No</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <hr>
                                                            </div>
                                                        {/if}
                                                        {if !empty($attend_online_exam_user_details) && !empty($attend_online_exam_user_ans_details)}
                                                            <div class="panel-body">
                                                                <!--Update Exam Answer Form -->
                                                                <form name="attend_online_exam-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="attend_online_exam-form" autocomplete="off">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <h3 class="mgbt-xs-20">Exam Details</h3>
                                                                                <table class="table table-bordered table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th >{attribute_name module=sop attribute=assigned_date}</th>
                                                                                            <th >{attribute_name module=sop attribute=target_date}</th>
                                                                                            <th >{attribute_name module=sop attribute=pass_mark}</th>
                                                                                            <th >{attribute_name module=sop attribute=attempt}</th>
                                                                                            <th >{attribute_name module=sop attribute=status}</th>
                                                                                            <th >{attribute_name module=sop attribute=capa_no}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {foreach item=item key=key from=$attend_online_exam_user_details}
                                                                                            <tr >
                                                                                                <td >{$item.assigned_date}</td>
                                                                                                <td >{$item.target_date}</td>
                                                                                                <td >{$item.pass_mark}</td>
                                                                                                <td >{$item.attempt}</td>
                                                                                                <td >{$item.status}</td>
                                                                                                <td >{$item.capa_no}</td>
                                                                                            </tr>
                                                                                        {/foreach}
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <h3 class="mgbt-xs-20">Question Details</h3>
                                                                                <table class="table table-bordered table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                                            <th width="45%">{attribute_name module=sop attribute=question}</th>
                                                                                            <th width="35%">{attribute_name module=sop attribute=options}</th>
                                                                                            <th width="10%">{attribute_name module=sop attribute=answer}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {foreach item=item key=key from=$attend_online_exam_user_ans_details}
                                                                                            <tr >
                                                                                                <td >{counter}</td>
                                                                                                <td >{$item.question}<input type="hidden" name="aoe_object_id[]" value="{$item.object_id}"></td>
                                                                                                <td >
                                                                                                    {foreach item=item1 key=key1 from=$item.qns_option_array}
                                                                                                        {$item1.option_no}. {$item1.option}<br>
                                                                                                    {/foreach}
                                                                                                </td>
                                                                                                <td >
                                                                                                    <select name="aoe_ans[]" id="aoe_ans" title="Select Valid Answer">
                                                                                                        <option value="">Select</option>
                                                                                                        {foreach item=item2 key=key2 from=$item.qns_option_array}
                                                                                                            <option value="{$item2.option_no}" {if $item.exam_ans eq $item2.option_no} selected{/if}>{$item2.option_no}</option>
                                                                                                        {/foreach}
                                                                                                    </select>
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
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <h3><span class="vd_red"><i class="fa fa-info-circle vd_red"></i> Note : Whenever change the answer click on '<i class="fa fa-save"></i> Save' before clicking on Completed button</span></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-1"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                                <button type="submit" class="btn vd_btn vd_bg-green" name="save_aoe_ans" id="save_aoe_ans"><i class="fa fa-save"></i> Save</button>
                                                                                {if !empty($submit_online_exam_button)}
                                                                                    <button type="button" class="btn vd_bg-green vd_white" data-toggle="modal" data-target="#sub_aoe_ans_completed_modal"><i class="fa fa-send"></i> Completed</button>
                                                                                {/if}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <!--Modal Submit Online Exam Answer -->
                                                                <div class="modal fade" id="sub_aoe_ans_completed_modal" tabindex="-1" role="dialog" aria-labelledby="sub_aoe_ans_completed_modal" aria-hidden="true">
                                                                    <div class="modal-wide-width">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                                <h4 class="modal-title" id="myModalLabel">Submit Online Exam Form</h4>
                                                                            </div>
                                                                            <form name="sub_aoe_ans_completed-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sub_aoe_ans_completed-form" autocomplete="off">
                                                                                <div class="modal-footer background-login">
                                                                                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn vd_btn vd_bg-green" name="sub_aoe_ans_completed" id="sub_aoe_ans_completed">Submit</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        {/if}
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
            {if !empty($set_effective_date_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_set_effective_date"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_set_effective_date" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Set Effective Date Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Set Effective Date Form -->
                                                            <form name="set_effective_date-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="set_effective_date-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="effective_date"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type=text class="width-60" name="set_effective_date" id="set_effective_date" readonly maxlength="10" placeholder="DD/MM/YYYY" title="Select Valid Effective Date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="sub_set_effective_date" id="sub_set_effective_date">Submit</button>
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
            {if !empty($distribution_copy_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_dist_copy"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_dist_copy" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Upload Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="panel-body table-responsive">
                                                                            <form name="upload-doc-form" id="upload-doc-form"  method="POST" autocomplete="off" class="form-separated">
                                                                                <!--Dont delete. Dropzone Custom File Upload Script See vendors/custom_inel/file_upload/all_file_upload.js-->
                                                                                <input type="hidden" name="upload_file_url" id="upload_file_url" value="{$smarty.server.REQUEST_URI}"/>
                                                                                <input type="hidden" name="upload_file_max_size" id="upload_file_max_size" value="{$smarty.session.max_upload_file_size}"/>
                                                                                <div id="mydropzone" class="dropzone"></div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12 mgbt-xs-10 mgtp-20">
                                                                                <div class="mgtp-10 text-right">
                                                                                    <button  class="btn btn-primary" id="submit-all"><i class="fa fa-upload"></i> Upload</button>
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
                                    <hr>
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Distribution Copy Form</h4>
                                                        </div>
                                                        <div class="panel-body">               
                                                            <!--Distribution Copy Form -->
                                                            <form name="dist_copy-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="dist_copy-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="department"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-80" name="department" id="department" onchange = get_dept_dist_copy_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    {if $item.is_dept_can_view}
                                                                                        <option  value="{$item.dept_id}">{$item.dept} </option>
                                                                                    {/if}
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                        <div class="col-xs-5">
                                                                            <select name="dist_copy_from[]" id="dist_copy" class="dist_copy form-control" size="7" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-xs-1"><br>
                                                                            <button type="button" id="dist_copy_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="dist_copy_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="dist_copy_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="dist_copy_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-xs-5">
                                                                            <select name="dist_copy_to[]" id="dist_copy_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="send_dist_copy" id="send_dist_copy">Send Copy</button>
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
            {if !empty($dist_copy_alert_msg)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_dist_copy_alert_msg"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_dist_copy_alert_msg" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Distribution Copy Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Distribution Copy Form -->
                                                            <form name="dist_copy_alert_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="dist_copy_alert-form" autocomplete="off">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="alert"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <h3><span class="vd_red"><i class="fa fa-info-circle vd_red"></i> {$dist_copy_alert_msg}</span></h3>
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
            {if !empty($ack_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_ack_button"> Action </a> </h4>
                    </div>
                    <div id="collapse_show_ack_button" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Distribution Copy Acknowledgement Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Distribution Copy Acknowledgement Form -->
                                                            <form name="copy_ack-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="copy_ack-form" autocomplete="off">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="copy_ack" id="copy_ack">Acknowledge</button>
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
            
            {if !empty($add_suggestion_for_improvement)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_add_suggestion"> Add Suggestion </a> </h4>
                    </div>
                    <div id="collapse_show_add_suggestion" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Add Suggestion Form</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--Add Suggestion Form -->
                                                            <form name="sub_suggestion-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sub_suggestion-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="suggestion"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="sugg_comments" id="sugg_comments" maxlength="1000" required title="Enter Valid Suggestion" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_suggestion" id="add_suggestion" >Add</button>
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
            {if !empty($recall_pre_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_pre_rereview"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_pre_rereview" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Pre Review Form</h4>
                                                        </div>
                                                        <!--Recall Pre Review Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_pre_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_pre_review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="pre_review_pending_users"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-success">
                                                                                {foreach name=list item=item key=key from=$pre_review_pending_userlist}
                                                                                    <input type="checkbox" name="pending_pre_review_user[]" value="{$item.user_id}" id="{$item.user_id}"><label for="{$item.user_id}"> {$item.user_name} </label>
                                                                                {/foreach}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_pre_review" id="recall_pre_review" >Recall</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                                        
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
            {/if}
            {if !empty($recall_review_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_rereview"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_rereview" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Review Form</h4>
                                                        </div>
                                                        <!--Recall Review Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_review-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_review-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_review" id="recall_review" >Recall</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                                        
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
            {/if}
            {if !empty($recall_approve_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_approve"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_approve" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Approve Form</h4>
                                                        </div>
                                                        <!--Recall Approve Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_approve-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_approve-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_approve" id="recall_approve" >Recall</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                                        
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
            {/if}
            {if !empty($recall_authorize_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_authorize"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_authorize" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Authorization Form</h4>
                                                        </div>
                                                        <!--Recall Authorization Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_authorize-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_authorize-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_authorize" id="recall_authorize" >Recall</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                                        
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
            {/if}
            {if !empty($recall_trainer_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_trainer"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_trainer" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Trainer Form</h4>
                                                        </div>
                                                        <!--Recall Trainer Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_trainer-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_trainer-form" autocomplete="off">
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
                                                                        <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <textarea placeholder="Min 3 - Max 500" rows="2" class="width-80 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-1"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <button class="btn vd_bg-green vd_white" type="submit"  name="recall_trainer" id="recall_trainer" >Recall</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                                        
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
            {/if}
            {if !empty($recall_online_exam_button)}
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_recall_online_exam"> Recall </a> </h4>
                    </div>
                    <div id="collapse_recall_online_exam" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="tab-pane">
                                            <div class="panel-body">
                                                <div class="modal-wide-width">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-blue vd_white">
                                                            <h4 class="modal-title" id="myModalLabel">Recall Online Exam Form</h4>
                                                        </div>
                                                        <!--Recall Online Exam Form -->
                                                        <div class="panel-body">
                                                            <form name="recall_online_exam_user-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_online_exam_user-form" autocomplete="off">
                                                                <table class="table table-bordered table-striped" id="qns_input_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="5%">{attribute_name module=sop attribute=s_no}</th>
                                                                            <th width="45%">{attribute_name module=sop attribute=assigned_by}</th>
                                                                            <th width="35%">{attribute_name module=sop attribute=assigned_date}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=assigned_to}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=target_date}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=pass_mark}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=attempt}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=status}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=capa_no}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=qns_limit}</th>
                                                                            <th width="5%">{attribute_name module=sop attribute=actions}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {foreach item=item key=key from=$online_exam_userslist}
                                                                            <tr >
                                                                                <td >{$item.count}</td>
                                                                                <td >{$item.assigned_by}</td>
                                                                                <td >{$item.assigned_date}</td>
                                                                                <td >{$item.assigned_to}</td>
                                                                                <td >{$item.target_date}</td>
                                                                                <td >{$item.pass_mark}</td>
                                                                                <td >{$item.attempt}</td>
                                                                                <td >{$item.status}</td>
                                                                                <td >{$item.capa_no}</td>
                                                                                <td >{$item.question_limit}</td>
                                                                                <td>
                                                                                    {if $item.recall_option}
                                                                                        <button type="button" class="btn vd_bg-green vd_white" data-toggle="modal" data-target="#recall_exam_modal" onclick="recall_online_exam_user('{$item.assigned_to_id}', '{$item.assigned_to}')"><i class="fa fa-times"></i> Recall</button>
                                                                                    {/if}
                                                                                </td>
                                                                            </tr>
                                                                        {/foreach}
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                        </div>
                                                        <!--Modal Recall Exam User-->
                                                        <div class="modal fade" id="recall_exam_modal" tabindex="-1" role="dialog" aria-labelledby="recall_exam_modal" aria-hidden="true">
                                                            <div class="modal-wide-width">
                                                                <div class="modal-content">
                                                                    <div class="modal-header vd_bg-blue vd_white">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                        <h4 class="modal-title" id="myModalLabel">Recall Assigned Exam</h4>
                                                                    </div>
                                                                    <form name="recall_exam-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="recall_exam-form" autocomplete="off">
                                                                        <div class="modal-body">
                                                                            <div class="alert alert-danger vd_hidden">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="recall_user"} <span class="vd_red">*</span></label>
                                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                        <input type="text" name="recall_assigned_user" id="recall_assigned_user" readonly class="width-60">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <label class="control-label  col-sm-1">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                        <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60" name="comments" id="comments" maxlength="500" title="Enter Valid Remarks" ></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="recall_exam_user_id" id="recall_exam_user_id" class="width-10">
                                                                        <div class="modal-footer background-login">
                                                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn vd_btn vd_bg-green" name="sub_recall_assign_exam" id="sub_recall_assign_exam">Recall</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
            {/if}
        </div>
    </div>
</div>
<!--Modal Add Review Comments -->
<div class="modal fade" id="add_review_comments_modal" tabindex="-1" role="dialog" aria-labelledby="add_review_comments_modal" aria-hidden="true">
    <div class="modal-wide-width">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Add Review Comments</h4>
            </div>
            <form name="add_review_comments-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_review_comments-form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info add_review_comments_input_table"><i class="fa fa-plus"></i> Add Row</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div id="first-name-input-wrapper">
                                <table class="table table-bordered table-striped" id="review_comments_input_table">
                                    <thead>
                                        <tr>
                                            <th width="50%">{attribute_name module=sop attribute=review_comments}<span class="vd_red">*</span></th>
                                            <th width="10%">{attribute_name module=sop attribute=action}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach item=item key=key from=$review_comments_user_array}
                                            <tr >
                                                <td ><textarea rows="2" cols="20" name="areview_comments[]" title="Enter Review Comments">{$item.comments}</textarea><input type="hidden" name="areview_comments_id[]" value="{$item.object_id}" class="form-control"></td>
                                                <td>
                                                    <button type="button" class="delete_review_comments btn btn-danger" onclick="delete_review_comments('{$item.object_id}')"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                                <input type="hidden" id="delete_review_comments_id"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="submit" class="btn vd_btn vd_bg-green" name="add_review_comments" id="add_review_comments">Add</button>
                    <button type="button" class="btn btn-info" onclick="page_reload();"><i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
    <!-- Multiselect left to right -->
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <!--script src="vendors/multiselect-master/dist/js/bootstrap.min.js"></script-->
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>
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
        $(document).on('click', 'button.removebutton', function () {
            $(this).closest('tr').remove();
            return false;
        });
        function delete_file_row(file_id, sop_object_id) {
            x_delete_lm_doc_file_file(file_id, sop_object_id, check_file);
        }
        function check_file(result) {
            if (result == "true") {
                var msg = '<p class="fa fa-check-circle-o" style="font-size: 30px; float:left;margin-top: 5px;margin-right: 5px;"></p> File Deleted Successfully';
                $.notific8(msg, {theme: 'teal'});
            }
            if (result == "false") {
                var msg = '<p class="fa fa-times-circle-o" style="font-size: 30px; float:left;margin-top: 5px;margin-right: 5px;"></p> File Not Deleted.Invalid Request Called';
                $.notific8(msg, {theme: 'ruby'});
            }
        }
    </script>
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#data-tables-history').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Revision History List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Revision History List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });

            $('#data-tables-suggestion').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Life Cycle Comments Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Life Cycle Comments Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            
            $('#data-tables-extend_details').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Extended Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Extended Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            
            $('#data-tables-attachments').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [50, 100, -1],
                    ['50 rows', '100 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Attachments List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Attachments List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#review_comments_output_table').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [50, 100, -1],
                    ['50 rows', '100 rows', 'Show all']
                ],
                "order": [[1, "asc"]],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Track Changes Review Comments List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Track Changes Review Comments List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-drop_details').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Dropped Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Dropped Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-cancel_details').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Cancelled Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Cancelled Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-transferred_details').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Transfer Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Transfer Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-sop_download_history').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Download History',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Download History',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-monitoring_details').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Transfer Detail List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Transfer Detail List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
            });
            $('#data-tables-training').dataTable();
            $('#data-tables-trainees').dataTable();
            $('#data-tables-trainees_nah').dataTable();
            $('#data-tables-exam').dataTable();
            $('#data-tables-status').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
            $('#data-tables-status-remarks').dataTable({ordering: false, pageLength: '50'});
            $('#data-tables-suggestion-review').dataTable();
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
            $('#wizard-6').bootstrapWizard({
                'tabClass': 'nav nav-tabs nav-stacked',
                'nextSelector': '.wizard .next',
                'previousSelector': '.wizard .prev',
            });
        });
    </script>
    <script>
        function get_dept_users(value) {
            x_get_dept_users(value, list_users);
        }
        function select_pre_review(val) {
            if (val == "pre_review") {
                document.getElementById('pre_reviewed').style.display = "block";
                document.getElementById('pre_review_need_correction').style.display = "none";
            }
            if (val == "pre_review_need_correction") {
                document.getElementById('pre_review_need_correction').style.display = "block";
                document.getElementById('pre_reviewed').style.display = "none";
            }
            if (val == "") {
                document.getElementById('pre_review_need_correction').style.display = "none";
                document.getElementById('pre_reviewed').style.display = "none";
            }
        }
        function select_review(val) {
            if (val == "review") {
                document.getElementById('reviewed').style.display = "block";
                document.getElementById('review_need_correction').style.display = "none";
                document.getElementById('review_need_correction').disabled = true;
                document.getElementById('reviewed').disabled = false;
            }
            if (val == "review_need_correction") {
                document.getElementById('review_need_correction').style.display = "block";
                document.getElementById('reviewed').style.display = "none";
                document.getElementById('review_need_correction').disabled = false;
                document.getElementById('reviewed').disabled = true;
            }
            if (val == "") {
                document.getElementById('review_need_correction').style.display = "none";
                document.getElementById('reviewed').style.display = "none";
                document.getElementById('review_need_correction').disabled = true;
                document.getElementById('reviewed').disabled = true;
            }
        }
        function select_approve(val) {
            if (val == "approve") {
                document.getElementById('approved').style.display = "block";
                document.getElementById('approve_need_correction').style.display = "none";
                document.getElementById('approved').disabled = false;
                document.getElementById('approve_need_correction').disabled = true;
            }
            if (val == "approve_need_correction") {
                document.getElementById('approve_need_correction').style.display = "block";
                document.getElementById('approved').style.display = "none";
                document.getElementById('approved').disabled = true;
                document.getElementById('approve_need_correction').disabled = false;
            }
            if (val == "") {
                document.getElementById('approve_need_correction').style.display = "none";
                document.getElementById('approved').style.display = "none";
                document.getElementById('approved').disabled = true;
                document.getElementById('approve_need_correction').disabled = true;
            }
        }
        function select_authorize(val) {
            if (val == "authorize" && document.getElementById('auth_is_sop_training_required').value == "no") {
                document.getElementById('authorized').style.display = "block";
                document.getElementById('auth_set_effective_date').style.display = "block";
                document.getElementById('authorize_need_correction').style.display = "none";
                
                document.getElementById('authorized').disabled = false;
                document.getElementById('auth_set_effective_date').disabled = false;
                document.getElementById('authorize_need_correction').disabled = true;
            }
            if (val == "authorize" && document.getElementById('auth_is_sop_training_required').value == "yes") {
                document.getElementById('authorized').style.display = "block";
                document.getElementById('authorize_need_correction').style.display = "none";
                document.getElementById('auth_set_effective_date').style.display = "none";
                
                document.getElementById('authorized').disabled = false;
                document.getElementById('auth_set_effective_date').disabled = true;
                document.getElementById('authorize_need_correction').disabled = true;
            }
            if (val == "authorize_need_correction") {
                document.getElementById('authorize_need_correction').style.display = "block";
                document.getElementById('auth_set_effective_date').style.display = "none";
                document.getElementById('authorized').style.display = "none";
                
                document.getElementById('authorized').disabled = true;
                document.getElementById('auth_set_effective_date').disabled = true;
                document.getElementById('authorize_need_correction').disabled = false;
            }
            if (val == "") {
                document.getElementById('authorize_need_correction').style.display = "none";
                document.getElementById('auth_set_effective_date').style.display = "none";
                document.getElementById('authorized').style.display = "none";
                
                document.getElementById('authorized').disabled = true;
                document.getElementById('auth_set_effective_date').disabled = true;
                document.getElementById('authorize_need_correction').disabled = true;
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_formats_annexure-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    format_annexure_type: {
                        required: true
                    },
                    format_annexure_name: {
                        minlength: 3,
                        required: true
                    },
                    format_annexure_ori: {
                        required: true
                    },
                    format_annexure_lang: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#add_format_annexure').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_dept_view-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#edit_dept_view').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_resp_per-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    urdept1_resp: {
                        required: true,
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#edit_dept_view').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            $('#urdept1,#urdept2,#urdept3').on('change', function (e) {
                $('#uresp_per_type').val('');
                $('#uresp_per_type').val(this.id);
                x_get_dept_users(this.value, list_resp_users);
            });
            $('#urdept1,#urdept2,#urdept3').on('change', function (e) {
                $('#uresp_per_type').val('');
                $('#uresp_per_type').val(this.id);
                $('#uresp_per_count').val('');
                $('#uresp_per_count').val(this.id);
                x_get_dept_users(this.value, list_resp_users);
            });
            $('#urdept1_resp').on('change', function (e) {
                if ($('#urdept1_resp').val() != '') {
                    $('#urdept2').prop('disabled', false);
                    $('#urdept2_resp').prop('disabled', false);
                    $('#urdept3').prop('disabled', true);
                    $('#urdept3_resp').prop('disabled', true);
                } else {
                    $('#urdept2').val('');
                    $('#urdept2_resp').val('');
                    $('#urdept3').val('');
                    $('#urdept3_resp').val('');
                    $('#urdept2').prop('disabled', true);
                    $('#urdept2_resp').prop('disabled', true);
                    $('#urdept3').prop('disabled', true);
                    $('#urdept3_resp').prop('disabled', true);
                }
            });
            $('#urdept2_resp').on('change', function (e) {
                if ($('#urdept2_resp').val() != '') {
                    $('#urdept3').prop('disabled', false);
                    $('#urdept3_resp').prop('disabled', false);
                } else {
                    $('#urdept3').val('');
                    $('#urdept3_resp').val('');
                    $('#urdept3').prop('disabled', true);
                    $('#urdept3_resp').prop('disabled', true);
                }
            });
            $('#urdept1_resp,#urdept2_resp,#urdept3_resp').on('change', function (e) {
                $('#urdept_resp_count').val('');
                $('#urdept_resp_count').val(this.id);
                if(this.value!=''){
                    var resp_per = this.value;
                }else{
                    var resp_per = 'NA';
                }
                x_search_sop_monitoring_details_count('','','',resp_per,'','yes', list_users_monitoring_count);
            });
        });
        function list_resp_users(users) {
            var dept_users_obj = document.getElementById($('#uresp_per_type').val() + "_resp");
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
        
        function list_users_monitoring_count(result){
            var count_msg = $('#urdept_resp_count').val()+"_count_msg";
            var urdept_resp= $('#urdept_resp_count').val();
            var def_sop_moni_limit = $('#def_sop_moni_limit').val();
            
            if(result >= def_sop_moni_limit){
                alert("Limit exceeds. Allowed limit is " + def_sop_moni_limit);
                $('#'+urdept_resp).val('');
                $('#'+count_msg).text('');
            }else{
                $('#'+count_msg).text(result);
                $('#'+count_msg).css({ 'color': 'red' });
            }
        }
        
        $("#is_pre_review_required").change(function () {
            if (this.value == "send_pre_review") {
                $('#pre_review_show_hide').show();
                $('#review_show_hide').hide();
            } else if (this.value == "send_review") {
                $('#pre_review_show_hide').hide();
                $('#review_show_hide').show();
            }else {
                $('#pre_review_show_hide').hide();
                $('#review_show_hide').hide();
            }
        });
        $(document).ready(function ($) {
            $('.search_users').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#request_cancel-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    cancel_reason: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#request_cancel').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#request_pre_review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);

                },
                submitHandler: function (form) {
                    if (document.getElementById('pre_review_from_users_to').length == 0) {
                        alert("Pls select valid User");
                        document.getElementById('pre_review_from_users_to').focus();
                        document.getElementById('pre_review_from_users_to').style.borderColor = 'red';
                        return false;
                    }
                    $('#request_pre_review').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_pre_review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);

                },
                submitHandler: function (form) {
                    var n = $('[name="pending_pre_review_user[]"]:checked').length
                    if (n == 0) {
                        alert("Select at least one pending user");
                        return false;
                    }
                    $('#recall_review').attr("disabled", true);
                    form.submit();
                },

            });
        });
        // Add Review Comments
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_review_comments-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var input_value = ["areview_comments[]"];
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
                    var review_comments_input_table_rowcount = $('#review_comments_input_table tr').length;
                    if (review_comments_input_table_rowcount <= 1) {
                        var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Invalid Input...';
                        $.notific8(msg, {theme: 'ruby', life: 1000});
                        return false;
                    }
                    $('#add_review_comments').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Completed Reviewer Comments
        $('#ureview_comments_completed').on('click', function () {
            "use strict";
            var form_submit = $('#update_review_comments-form');
            var error_register = $('.alert-danger', form_submit);
            $('#update_review_comments-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var input_value = ["ureview_comments[]", "ureview_comments_action[]"];
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
                    $('#ureview_comments_save').attr("disabled", true);
                    $('#ureview_comments_completed').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#request_review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    review_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#request_reviewal').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#recall_review').attr("disabled", true);
                    form.submit();
                },
            });
        });
        
        // Add Review Comments
        $(document).ready(function () {
            // Append table with add row form on add new button click
            $(".add_review_comments_input_table").click(function () {
                var index = $("#review_comments_input_table tbody tr:last-child").index();
                var row = '<tr>' +
                        '<td ><textarea rows="2" cols="20" name="areview_comments[]" title="Enter Review Comments"></textarea>' +
                        '<td><button type="button" class="delete btn btn-danger"><i class="fa fa-times"></i></button></td>' +
                        '</tr>';
                $("#review_comments_input_table").append(row);
                $("#review_comments_input_table tbody tr").eq(index + 1).find("").toggle();
            });
        });
        $(document).ready(function () {
            $("#review_comments_input_table").on('click', '.delete_review_comments', function () {
                var delete_review_comments_id = $('#delete_review_comments_id').val();
                x_delete_review_comments(delete_review_comments_id, delete_msg);
                $(this).closest('tr').remove();
            });
        });
        function delete_review_comments(object_id) {
            $('#delete_review_comments_id').val(object_id);
        }
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#pre_review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#pre_reviewed').attr("disabled", true);
                    $('#pre_review_need_correction').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#review-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    },
                    usr_username: {
                        required: true
                    },
                    usr_password: {
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);

                },
                submitHandler: function (form) {
                    var is_valid_pass = $('#is_valid_pass').html();
                    if(is_valid_pass=="InValid"){
                        alert("Pls enter valid password");
                        return false;
                    }
                    $('#reviewed').attr("disabled", true);
                    $('#review_need_correction').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#request_approve-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    approve_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);

                },
                submitHandler: function (form) {
                    $('#request_approval').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_approve-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#recall_approve').attr("disabled", true);
                    form.submit();
                },
            });
        });

        $(document).ready(function () {
            "use strict";
            var form_submit = $('#approve-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    },
                    usr_username: {
                        required: true
                    },
                    usr_password: {
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var is_valid_pass = $('#is_valid_pass').html();
                    if(is_valid_pass=="InValid"){
                        alert("Pls enter valid password");
                        return false;
                    }
                    $('#approved').attr("disabled", true);
                    $('#approve_need_correction').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#request_auth-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    is_training_required: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    authorize_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#request_authorize').attr("disabled", true);
                    form.submit();
                },
            });
        });

        $(document).ready(function () {
            $(function () {
                $.validator.addMethod("check_effective_date", function (value, element) {
                    if ($('#auth_is_sop_training_required').val() == "no" && $('#authorize_type').val() == "authorize" && $('#effective_date').val() == "") {
                        return false;
                    } else {
                        return true;
                    }
                }, "Invalid Effective Date");
            });
            "use strict";
            var form_submit = $('#authorize-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    effective_date: {
                        check_effective_date: true,
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    },
                    usr_username: {
                        required: true
                    },
                    usr_password: {
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var is_valid_pass = $('#is_valid_pass').html();
                    if(is_valid_pass=="InValid"){
                        alert("Pls enter valid password");
                        return false;
                    }
                    $('#authorized').attr("disabled", true);
                    $('#authorize_need_correction').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_authorize-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#recall_authorize').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Assign Trainer 
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#assign_trainer-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    trainer: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#assign_to_trainer').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Recall trainer
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_trainer-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#recall_trainer').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Training Schedule
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#train_schedule-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    training_date: {
                        minlength: 10,
                        required: true
                    },
                    training_date_time: {
                        minlength: 4,
                        required: true
                    },
                    venue: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if ($('.training_info_mail_to_dept_checked:checkbox:checked').length == 0) {
                        alert("Pls select valid Department to Send Mail");
                        return false;
                    }
                    $('#training_scheduled').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Training Schedule
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#train_reschedule-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    rtraining_date: {
                        minlength: 10,
                        required: true
                    },
                    rtraining_date_time: {
                        minlength: 4,
                        required: true
                    },
                    rvenue: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if ($('.rtraining_info_mail_to_dept_checked:checkbox:checked').length == 0) {
                        alert("Pls select valid Department to Send Mail");
                        return false;
                    }
                    $('#training_rescheduled').attr("disabled", true);
                    form.submit();
                },
            });
        });

        $(document).ready(function () {
            $('#reschedule_training').change(function () {
                if ($(this).val() == "reschedule") {
                    $('#view_show_reschdule').show();
                } else {
                    $('#view_show_reschdule').hide();
                }
            });
            $('#training_type').change(function () {
                if ($(this).val() == "update_trainees") {
                    $('#update_trainees').show();
                    $('#update_trainee_dept_label').show();
                    $('#update_trainee_date_label').show();
                    $('#update_trainee_dept_user_label').show();
                    //$('#userid').show();
                    //$('#department').hide();
                    $('#training_completed').hide();
                    $('#online_exam_req_show_hide').hide();
                    $('#update_trainee_nah_add_row_label').show();
                    $('#update_trainee_nah_user_label').show();
                } else if ($(this).val() == "training_completed") {
                    $('#update_trainees').hide();
                    $('#update_trainee_dept_label').hide();
                    $('#update_trainee_date_label').hide();
                    $('#update_trainee_dept_user_label').hide();
                    //$('#userid').hide();
                    //$('#department').hide();
                    $('#training_completed').show();
                    $('#online_exam_req_show_hide').show();
                    $('#update_trainee_nah_add_row_label').hide();
                    $('#update_trainee_nah_user_label').hide();
                } else {
                    $('#update_trainees').hide();
                    $('#update_trainee_dept_label').hide();
                    $('#update_trainee_date_label').hide();
                    $('#update_trainee_dept_user_label').hide();
                    //$('#userid').hide();
                    //$('#department').hide();
                    $('#training_completed').hide();
                    $('#online_exam_req_show_hide').hide();
                    $('#update_trainee_nah_add_row_label').hide();
                    $('#update_trainee_nah_user_label').hide();
                }

            });
            $(".add_new_nah_trainee_input_table").click(function () {
                var index = $("#nah_trainee_input_table tbody tr:last-child").index();
                var row = '<tr>' +
                        '<td><input type="text" placeholder="User Name" name="trainees_from_nah[]" title="Enter Valid User name" class="form-control"></td>' +
                        '<td><select name="trainee_department_nah[]" title="Select Valid Department" class="form-control"><option value="">Select</option>{/literal}{foreach item=item key=key from=$plant_dept_list}{if $item.is_dept_can_view}<option value="{$item.dept_id}">{$item.dept}</option>{/if}{/foreach}{literal}</select></td>' +
                        '<td><button type="button" class="delete btn btn-danger">Delete</button></td>' +
                        '</tr>';
                $("#nah_trainee_input_table").append(row);
                $("#nah_trainee_input_table tbody tr").eq(index + 1).find("").toggle();
            });
        });

        $(document).ready(function () {
            $(function () {
                $.validator.addMethod("check_trainee_training_date", function (value, element) {
                    if ($('#training_type').val() == "update_trainees" && $('#trainee_training_date').val() == "") {
                        return false;
                    } else {
                        return true;
                    }
                }, "Select Valid Training Date");
                
            });
            "use strict";
            var form_submit = $('#training-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    trainee_training_date: {
                        check_trainee_training_date: true,
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var training_type = $('#training_type').val();
                    if (training_type == "training_completed") {
                        if ($('#online_exam_req').val() == "") {
                            document.getElementById('online_exam_req').focus();
                            document.getElementById('online_exam_req').style.borderColor = 'red';
                            alert("Pls select valid Online Exam Assessment Requirement")
                            return false;
                        }
                    }
                    if (training_type == "update_trainees") {
                        var nah_trainee_input_table_rowcount = $('#nah_trainee_input_table tr').length;
                        if (document.getElementById('utrainees_to').length == 0 && nah_trainee_input_table_rowcount==1) {
                            alert("Pls add valid account or non account holder");
                            //document.getElementById('utrainees_to').focus();
                            //document.getElementById('utrainees_to').style.borderColor = 'red';
                            return false;
                        }
                        if (nah_trainee_input_table_rowcount >= 2) {
                            var input_value = ["trainees_from_nah[]","trainee_department_nah[]"];
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
                        }
                    }
                    $('#update_trainees').attr("disabled", true);
                    $('#training_completed').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Question Preparation : Tue/False 
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_sop_tf_qns-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                submitHandler: function (form) {
                    var input_value = ["atf_qns[]", "atf_qns_ans[]"];
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
                    var tf_qns_input_table_rowcount = $('#tf_qns_input_table tr').length;
                    if (tf_qns_input_table_rowcount <= 1) {
                        var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Invalid Input...';
                        $.notific8(msg, {theme: 'ruby', life: 1000});
                        return false;
                    }
                    $('#atf_question').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Question Preparation : Multiple Choice 
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_sop_mc_qns-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                submitHandler: function (form) {
                    var input_value = ["amc_qns[]", "amc_qns_opt1[]", "amc_qns_opt2[]", "amc_qns_opt3[]", "amc_qns_opt4[]", "amc_qns_ans[]"];
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
                    var mc_qns_input_table_rowcount = $('#mc_qns_input_table tr').length;
                    if (mc_qns_input_table_rowcount <= 1) {
                        var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Invalid Input...';
                        $.notific8(msg, {theme: 'ruby', life: 1000});
                        return false;
                    }
                    $('#amc_question').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Assign Exam 
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#assign_exam-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                submitHandler: function (form) {
                    var input_value = ["assign_exam_qns_limit", "assign_exam_target_date", "comments"];
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
                    if ($('input:checkbox:checked').length == 0) {
                        alert("Pls select valid User to Assign Exam");
                        return false;
                    }
                    var qns_input_table_rowcount = $('#qns_input_table tr').length;
                    if (qns_input_table_rowcount <= 1) {
                        var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Invalid Question...';
                        $.notific8(msg, {theme: 'ruby', life: 1000});
                        return false;
                    }
                    
                    if (confirm("It can not be edited once it is assigned.Are you sure all the question are correct?") == true) {
                        $('#sub_assign_exam').attr("disabled", true);
                        form.submit();
                    } else {
                        return false;
                    }
                },
            });
        });
        function set_qns_limit(){
            var qns_input_table_rowcount = $('#qns_input_table tr').length;
            var qns_limit_obj = document.getElementById("assign_exam_qns_limit")
            for (i=qns_limit_obj.length;qns_limit_obj.length>0;i--) {
                qns_limit_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                qns_limit_obj.add(addy,null);
            }
            catch(ex) {
                qns_limit_obj.add(addy);
            }
            for (i = 1; i < qns_input_table_rowcount; i++) {
                var addy = document.createElement('option');
                addy.id=i;
                addy.text=i;
                addy.value=i;
                try {
                    qns_limit_obj.add(addy,null);
                }
                catch(ex) {
                    qns_limit_obj.add(addy);
                }
            }
        }
        //Question Preparation - True / False
        $(document).ready(function () {
            // Append table with add row form on add new button click
            $(".add_new_tf_qns_input_table").click(function () {
                var index = $("#tf_qns_input_table tbody tr:last-child").index();
                var row = '<tr>' +
                        '<td><input type="text" placeholder="question" name="atf_qns[]" title="Enter Valid Question" class="form-control"></td>' +
                        '<td>{/literal}{foreach item=item key=key from=$true_false_qns_opt}{$key}. {$item}<br>{/foreach}{literal}</td>' +
                        '<td><select name="atf_qns_ans[]" title="Select Valid Answer" class="form-control"><option value="">Select</option>{/literal}{foreach item=item key=key from=$true_false_qns_opt}<option value="{$key}">{$key}</option>{/foreach}{literal}</select></td>' +
                        '<td ><input type="number" name="atf_qns_order[]" id="atf_qns_order" placeholder="Order" class="form-control"/></td>' +
                        '<td><button type="button" class="delete btn btn-danger">Delete</button></td>' +
                        '</tr>';
                $("#tf_qns_input_table").append(row);
                $("#tf_qns_input_table tbody tr").eq(index + 1).find("").toggle();
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
            });
            $(".add_new_mc_qns_input_table").click(function () {
                var index = $("#mc_qns_input_table tbody tr:last-child").index();
                var row = '<tr>' +
                        '<td><input type="text" placeholder="question" name="amc_qns[]" title="Enter Valid Question" class="form-control"></td>' +
                        '<td>1.<input type="text" placeholder="Enter Valid Option" name="amc_qns_opt1[]" title="Enter Valid Option" class="form-control">2.<input type="text" placeholder="Enter Valid Option" name="amc_qns_opt2[]" title="Enter Valid Option" class="form-control">3.<input type="text" placeholder="Enter Valid Option" name="amc_qns_opt3[]" title="Enter Valid Option" class="form-control">4.<input type="text" placeholder="Enter Valid Option" name="amc_qns_opt4[]" title="Enter Valid Option" class="form-control"></td>' +
                        '<td><select name="amc_qns_ans[]" title="Select Valid Answer" class="form-control"><option value="">Select</option>{/literal}{foreach item=item key=key from=$mc_qns_opt}<option value="{$key}">{$key}</option>{/foreach}{literal}</select></td>' +
                        '<td ><input type="number" name="amc_qns_order[]" id="amc_qns_order" placeholder="Order" class="form-control"/></td>' +
                        '<td><button type="button" class="delete btn btn-danger">Delete</button></td>' +
                        '</tr>';
                $("#mc_qns_input_table").append(row);
                $("#mc_qns_input_table tbody tr").eq(index + 1).find("").toggle();
            });
        });
        $(document).ready(function () {
            $("#qns_input_table").on('click', '.delete_aqns', function () {
                var delete_aqns_id = $('#delete_aqns_id').val();
                x_delete_sop_question(delete_aqns_id, delete_msg);
                $(this).closest('tr').remove();
            });
        });
        function delete_aqns(object_id) {
            $('#delete_aqns_id').val(object_id);
        }
        function delete_msg(result) {
            if (result == "true") {
                var msg = '<p class="fa fa-check-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Deleted Successfully';
                $.notific8(msg, {theme: 'teal', life: 2000});
            }
            if (result == "false") {
                var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Failed...';
                $.notific8(msg, {theme: 'ruby', life: 2000});
            }
        }
        // Recall Online Exam User
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#recall_exam-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#sub_recall_assign_exam').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Save Online Exam
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#attend_online_exam-form');
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                submitHandler: function (form) {
                    $('#save_aoe_ans').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Submit Online Exam
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#sub_aoe_ans_completed-form');
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                submitHandler: function (form) {
                    var input_value = ["aoe_ans[]"];
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
                    if (confirm("Are you sure to submit?") == true) {
                        $('#sub_aoe_ans_completed').attr("disabled", true);
                        form.submit();
                    } else {
                        return false;
                    }
                },
            });
        });
        // Update CAPA no for attend the exam
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#attend_online_exam_capa-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    aoe_capa_no: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if (confirm("It can not be edited once it is submitted.Are you sure to submit?") == true) {
                        $('#save_aoe_capa_no').attr("disabled", true);
                        form.submit();
                    } else {
                        return false;
                    }
                },
            });
        });
        // Set efective date
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#set_effective_date-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    set_effective_date: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#sub_set_effective_date').attr("disabled", true);
                    form.submit();
                },
            });
        });
        // Copy Acknowledge form
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#copy_ack_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#copy_ack').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(window).load(function () {
            "use strict";
            $("#effective_date").datepicker({minDate: +0, maxDate: "+1M +0D", dateFormat: 'dd/mm/yy'});
            $("#training_date").datepicker({minDate: +0, maxDate: "+1M +0D", dateFormat: 'dd/mm/yy'});
            $("#set_effective_date").datepicker({minDate: +0, maxDate: "+1M +0D", dateFormat: 'dd/mm/yy'});
            $("#assign_exam_target_date").datepicker({minDate: +0, maxDate: "+1M +0D", dateFormat: 'dd/mm/yy'});
            $("#training_date_time").timepicker();
            $("#rtraining_date").datepicker({minDate: +0, maxDate: "+1M +0D", dateFormat: 'dd/mm/yy'});
            $("#rtraining_date_time").timepicker();
        });
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#sub_suggestion-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sugg_comments: {
                        minlength: 5,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#suggestion').attr("disabled", true);
                    form.submit();
                },
            });
        });

        function format_annexure_exists(sop_object_id) {
            document.getElementById('format_annexure_name').value = document.getElementById('format_annexure_name').value.toUpperCase();
            var format_annexure_type = document.getElementById('format_annexure_type').value;
            var format_annexure_name = document.getElementById('format_annexure_name').value;
            if (format_annexure_type == "Format") {
                x_format_name_exist(format_annexure_name,sop_object_id, check_format_annexure_handle); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
            }
            if (format_annexure_type == "Annexure") {
                x_annexure_name_exist(format_annexure_name,sop_object_id, check_format_annexure_handle); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
            }
        }
        function check_format_annexure_handle(result) {
            if (result == "true") {
                document.getElementById('message_format_annexure').innerHTML = "Name exists";
                document.getElementById('message_format_annexure').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('message_format_annexure').innerHTML = "   ";
            }
        }
        function format_annexure_validation() {
            if (document.getElementById('message_format_annexure').innerHTML == "Name exists") {
                alert("Name Exist.Pls Enter Different Unique Name...!");
                return false;
            }
        }

        $(document).ready(function ($) {
            $('.dist_copy').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });
        function get_dept_pre_review_users(value) {
            x_get_dept_users(value, list_pre_review_from_users);
        }
        function list_pre_review_from_users(users) {
            console.log(users);
            var dept_users_obj = document.getElementById("pre_review_from_users");
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
        function get_dept_dist_copy_users(value) {
            x_get_dept_users(value, list_from_users);
        }
        function list_from_users(users) {
            var dept_users_obj = document.getElementById("dist_copy");
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
        function get_dept_trainees_users(value) {
            x_get_dept_users(value, list_trainees_from_users);
        }
        function list_trainees_from_users(users) {
            var dept_users_obj = document.getElementById("utrainees");
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
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#dist_copy-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if (document.getElementById('dist_copy_to').length == 0) {
                        alert("Pls select valid User");
                        document.getElementById('dist_copy_to').focus();
                        document.getElementById('dist_copy_to').style.borderColor = 'red';
                        return false;
                    }
                    $('#send_dist_copy').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function recall_online_exam_user(exam_user_id, assigned_to) {
            $('#recall_assigned_user').val("");
            $('#recall_exam_user_id').val(exam_user_id);
            $('#recall_assigned_user').val(assigned_to);
        }
    </script>
{/literal}
{include file =$_TEMPLATE_PATH_|cat:"sop_download_modal.sop.tpl"}
