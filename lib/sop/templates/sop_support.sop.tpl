<!-- Specific CSS -->

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">SOP </li>
            <li class="active">Self Support </li>
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
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Self Support SOPs </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body"> 
                        <div class="panel-body table-responsive">
                            {if !empty($sop_worklist_pending)}
                                <table class="table table-bordered table-striped" id="user_pending_data-tables">
                                    <thead>
                                        <tr>
                                            <th >Type</th>
                                            <th >Number</th>
                                            <th >Formats</th>	
                                            <th >Annexures</th>	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach name=list item=item key=key from=$sop_worklist_pending} 
                                            <tr >
                                               <td>{$item.type}</td>
                                                <td ><a href='index.php?module=sop&action=edit_sop&object_id={$item.sop_object_id}' onclick="window.open(this.href, 'myeditsopwin','resizable=0'); return false;" class="vd_blue">{$item.no}</a></td>
                                                <td>
                                                    {foreach item=item1 key=key1 from=$item.formatlist}
                                                        {if $item1.status eq "Enabled"}
                                                            <span><a href='index.php?module=sop&action=edit_format&object_id={$item1.format_object_id}' onclick="window.open(this.href, 'myeditformatwin','resizable=0'); return false;" class="vd_blue">{$item1.format_no}</a></span><br>
                                                        {/if}
                                                    {/foreach}
                                                </td>
                                                <td>
                                                    {foreach item=item1 key=key1 from=$item.annexurelist}
                                                        {if $item1.status eq "Enabled"}
                                                            <span><a href='index.php?module=sop&action=edit_annexure&object_id={$item1.annexure_object_id}' onclick="window.open(this.href, 'myeditannexurewin','resizable=0'); return false;" class="vd_blue">{$item1.annexure_no}</a></span><br>
                                                        {/if}
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
            </div>
        </div>
    </div>
</div>
