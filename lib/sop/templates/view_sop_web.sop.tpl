<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<!--link href="vendors/custom_lm/htmldiff/htmldiff_custom.css" rel="stylesheet" type="text/css"-->

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">View </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>

<div class="vd_content-section clearfix">
    {if $view_sop_file}
        <div class="row">
            <div class="modal fade" id="open_compare_modal" tabindex="-1" role="dialog" aria-labelledby="open_compare_modal" data-backdrop="static" data-keyboard="false"  aria-hidden="false">
                <div class="modal-wide-width">
                    <div class="modal-content">
                        <div class="modal-header vd_bg-blue vd_white">
                            <h4 class="modal-title text-center" id="myModalLabel">{$dis_name} [{$dis_no}] [{$dis_rev}] [{$published_status}] <button class="btn vd_btn vd_bg-green dropdown-toggle" onClick="win();"> Close </button></h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="col-md-2">
                                    <div class="row">
                                    </div>
                                </div>
                                <div class="card col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            {$content_details}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="col-md-2">
                                    <div class="row">

                                    </div>
                                </div>
                                <div class="card col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Digitally Signed By</h4>
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr >
                                                        <td >Prepared By</td>
                                                        <td ><img src="{$valid_creator_digital_sign_path}" width="25" height="25" data-original-title="{$valid_creator_digital_sign_info}" data-toggle="tooltip" data-placement="top" data-html="true"> {$creator_name}</td>
                                                        <td >{$creator_dept}</td>
                                                        <td >{$creator_designation}</td>
                                                        <td >{$created_time}</td>
                                                    </tr>
                                                    <tr >
                                                        <td >Reviewed By</td>
                                                        <td ><img src="{$valid_reviewer_digital_sign_path}" width="25" height="25" data-original-title="{$valid_reviewer_digital_sign_info}" data-toggle="tooltip" data-placement="top" data-html="true"> {$reviewer_name}</td>
                                                        <td >{$reviewer_dept}</td>
                                                        <td >{$reviewer_designation}</td>
                                                        <td >{$reviewed_time}</td>
                                                    </tr>
                                                    <tr >
                                                        <td >Approved By</td>
                                                        <td ><img src="{$valid_approver_digital_sign_path}" width="25" height="25" data-original-title="{$valid_approver_digital_sign_info}" data-toggle="tooltip" data-placement="top" data-html="true"> {$approver_name}</td>
                                                        <td >{$approver_dept}</td>
                                                        <td >{$approver_designation}</td>
                                                        <td >{$approved_time}</td>
                                                    </tr>
                                                    <tr >
                                                        <td >Authorized By</td>
                                                        <td ><img src="{$valid_authorizer_digital_sign_path}" width="25" height="25" data-original-title="{$valid_authorizer_digital_sign_info}" data-toggle="tooltip" data-placement="top" data-html="true"> {$authorizer_name}</td>
                                                        <td >{$authorizer_dept}</td>
                                                        <td >{$authorizer_designation}</td>
                                                        <td >{$authorized_time}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
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

{literal}
    <script type="text/javascript" src="js/jquery.js"></script> 

    <script type="text/javascript">
        $(window).load(function () {
            $('#open_compare_modal').modal('show');
        });
        $(document).ready(function () {
            //Disable cut copy paste
            $('body').bind('cut copy paste', function (e) {
                alert("Not Allowed");
                e.preventDefault();
            });

            //Disable mouse right click
            $("body").on("contextmenu", function (e) {
                alert("Not Allowed");
                return false;
            });
            //Disable Print
            $(document).on('keydown', function (e) {
                if (e.ctrlKey && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80)) {
                    alert("Sorry, not allowed to take a Print");
                    e.cancelBubble = true;
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    location.reload();
                }
            });
            //Disable keyup and keydown
            $("body").bind("keyup keydown", function (e) {
                //alert("not allowed to key");
                e.preventDefault();
                location.reload();
                return false;
            });
        });
        function win() {
            self.close();
        }
    </script>
{/literal}
