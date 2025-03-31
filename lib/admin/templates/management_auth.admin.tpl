<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Management Authorization </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Management Authorization </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <input type="hidden" id='lm_doc_list_count'  value="{$lm_doc_list_count}">
                        {foreach name=list item=item key=key from=$user_workflow_auth_array}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <h3><a class="btn vd_btn vd_bg-green btn-sm" href="index.php?module=admin&action=update_management_auth&object_id={$item.lm_doc_id}">Update {$item.short_name}</a></h3>
                                        <div class="panel-body table-responsive">
                                            <table class="table table-bordered table-striped" id="doc_data-tables{$item.count}">
                                                <thead>
                                                    <tr>
                                                        {foreach name=list1 item=item1 key=key1 from=$item.workflow_user_array}
                                                            <td>{$item1.action}</td>
                                                        {/foreach}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        {foreach name=list1 item=item1 key=key1 from=$item.workflow_user_array}
                                                            <td>
                                                                {foreach name=list2 item=item2 key=key2 from=$item1.action_user_list}
                                                                    {$item2.user_name} - [{$item2.department}]<br>
                                                                {/foreach}
                                                            </td>
                                                        {/foreach}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
