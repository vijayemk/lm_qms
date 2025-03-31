<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Pending Task(s) </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> My Pending Task ({$user_worklist_array|@count})</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            {if !empty($user_worklist_array)}
                                <table class="table table-bordered table-striped generate_datatable" title="My Pending Task" data-ori="landscape" data-pagesize="B4" data-sort_column=3>
                                    <thead>
                                        <tr>
                                            <th >{attribute_name module="admin" attribute="sl_no"}</th>
                                            <th >{attribute_name module="admin" attribute="module"}</th>
                                            <th >{attribute_name module="admin" attribute="number"}</th>
                                            <th >{attribute_name module="admin" attribute="date"}</th>	
                                            <th >{attribute_name module="admin" attribute="status"}</th>	
                                            <th >{attribute_name module="admin" attribute="user_name"}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach name=list item=item key=key from=$user_worklist_array} 
                                            <tr >
                                                <td></td>
                                                <td>{$item.type}</td>
                                                <td>{$item.link}</td>
                                                <td>{$item.assigned_date}</td>
                                                <td>{$item.status}</td>
                                                <td>{$item.user_name}</td>
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
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Total Pending Task ({$total_pendinglist_array|@count})</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            {if !empty($total_pendinglist_array)}
                                <table class="table table-bordered table-striped generate_datatable" title="Total Pending Task" data-ori="landscape" data-pagesize="B4" data-sort_column=3>
                                    <thead>
                                        <tr>
                                            <th >{attribute_name module="admin" attribute="sl_no"}</th>
                                            <th >{attribute_name module="admin" attribute="module"}</th>
                                            <th >{attribute_name module="admin" attribute="number"}</th>
                                            <th >{attribute_name module="admin" attribute="date"}</th>	
                                            <th >{attribute_name module="admin" attribute="status"}</th>	
                                            <th >{attribute_name module="admin" attribute="user_name"}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach name=list item=item key=key from=$total_pendinglist_array} 
                                            <tr >
                                                <td></td>
                                                <td>{$item.type}</td>
                                                <td>{$item.link}</td>
                                                <td>{$item.assigned_date}</td>
                                                <td>{$item.status}</td>
                                                <td>{$item.user_name}</td>
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


