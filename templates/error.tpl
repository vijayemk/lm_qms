<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li><a href="javascript:history.back()">Back</a> </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel widget">
            <div class="panel-heading vd_bg-red">
                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-sign-out"></i> </span> A FATAL ERROR OCCURED </h3>
            </div>
            <div class="panel-body-list  table-responsive">
                <table class="table table-striped table-hover no-head-border">
                    <thead class="vd_bg-green vd_white">
                      <tr>
                        <th >ERROR CODE</th>
                        <th colspan="2">ERROR / SUGGESTIONS</th>
                        <th></th>
                        <th>ADDITIONAL INFO.	</th>
                        <th>ADMIN MESSAGE</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">{$error}</td>
                            <td colspan="2"></td>
                            <td class="center">{$addInfo}</td>
                            <td class="center"><span class="label label-danger">{$adminMsg}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- col-md-12 --> 
</div>