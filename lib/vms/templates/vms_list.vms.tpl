<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">List of Document </li>
            <li class="active">Vendor Audit List</li>
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
                    <span class="panel-title h4"> 
                        <i class="append-icon fa fa-shopping-cart"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;"> Vendor Audit List </a>
                    </span> 
                    <span class="label label-danger mgl-10">{$vm_list|@count}</span>
                </div>
                <div id="collapsedmslist" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="panel widget light-widget">
                            <form name="dms_list-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="dms_list-form" autocomplete="off" data-show_rows="15">
                                {if !empty($vm_list)}
                                    <table class="table table-bordered table-striped generate_datatable" title="Vendor Audit List" data-sort_column=1 data-whitespace="nowrap" data-show_rows="15">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                <th>{attribute_name module="vms" attribute="vm_no"}</th>
                                                <th>{attribute_name module="vms" attribute="initiator"}</th>
                                                <th>{attribute_name module="admin" attribute="organization"}</th>
                                                <th>{attribute_name module="vms" attribute="plant_name"}</th>
                                                <th>{attribute_name module="vms" attribute="target_date"}</th>
                                                <th>{attribute_name module="vms" attribute="vendor_status"}</th>
                                                <th>{attribute_name module="vms" attribute="approval_status"}</th>
                                                <th>{attribute_name module="vms" attribute="wf_status"}</th>
                                                <th>{attribute_name module="vms" attribute="status"}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach name=list item=item key=key from=$vm_list} 
                                                <tr>
                                                    <td></td>
                                                    <td>{$item.doc_link}</td>
                                                    <td>{$item.created_by_name}</td>
                                                    <td>{$item.vendor_org_name}</td>
                                                    <td>{$item.vendor_plant_name}</td>
                                                    <td>{display_if_null var=$item.target_date}</td>
                                                    <td>{$item.vendor_status}</td>
                                                    <td>{display_if_null var=$item.approval_status}</td>
                                                    <td>{$item.wf_status}</td>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
