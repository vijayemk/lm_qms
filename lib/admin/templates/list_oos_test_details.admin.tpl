
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
            <li class="active">Administration </li>
            <li class="active">Settings </li>
            <li class="active">OOS Master Data </li>
            <li class="active">Test Details Master</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading vd_bg-dark-green">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Test Details Master</a> </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="vd_content-section clearfix">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="modal-wide-width">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <h4 class="modal-title" id="myModalLabel">Input - Form </h4>
                                    </div >
                                    <div class="panel-body">    
                                        <form name="add-test-details-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add-test-details-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label">{attribute_name module="admin" attribute="test_name"}</label> <span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" class="required test-name" placeholder="Min 3" name="test_name" id="test_name" required title="Enter Valid Test Name" />
                                                        <span class="test-name-exist font-semibold vd_red error_exists"></span>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="submit_add">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
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
        <div class="panel panel-default">
            <div class="panel-heading vd_bg-dark-green">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Test Details Master List</a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="vd_content-section clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget">
                                <div class="panel-body table-responsive">
                                    {if !empty($testDetailsList)}
                                        <table class="table table-bordered table-striped generate_datatable" title="Checklist list">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                    <th>{attribute_name module="admin" attribute="test_name"}</th>
                                                    <th>{attribute_name module="admin" attribute="action"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$testDetailsList} 
                                                    <tr>
                                                        <td></td>
                                                        <td>{$item.testName}</td>    
                                                        <td>
                                                            <button class="btn vd_bg-blue vd_white" data-toggle="modal" onclick="updateTestDetails({htmlspecialchars(json_encode($item))});"  data-target="#editTestDetails"><i class="fa fa-pencil"></i></button>
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
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editTestDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Test Details Master</h4>
            </div>
            <div class="modal-body">
                <form name="edit-test-details-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit-test-details-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="admin" attribute="test_name"} </label><span class="vd_red">*</span>
                            <div class="controls">                                
                                <input type="text" class="required test-name" placeholder="Min 3" name="utest_name" id="utest_name" required title="Enter Valid Test Name" />
                                <span class="test-name-exist font-semibold vd_red error_exists"></span>
                            </div>
                        </div> 
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-right">
                        <div class="col-sm-12">
                            <input type="hidden" name="uobject_id" id="uobject_id">
                            <input type="hidden" name="submit_update">
                            <button class="btn vd_bg-red vd_white page_reload" type="button" ><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Close</button>
                            <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update" ><span class="menu-icon"><i class="fa fa-fw fa-pencil"></i></span> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            // Add Check Points
            var form_submit = $('#add-test-details-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    test_name: {
                        minlength: 3,
                        maxlength: 500,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -300);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#add').attr("disabled", true);
                    form.submit();
                },
            });


            // Edit Vendor Type
            var form_submit = $('#edit-test-details-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    utest_name: {
                        minlength: 3,
                        maxlength: 500,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });   
        });

        $(document).on('keyup', '.test-name', function () {
            let ele = $(this);  
            let id = $('#uobject_id').val();          
            x_isOosTestNameExist(ele.val(), id, function (result) {
                ajax_respone_handler_value_exist(result, ele);
            });
        });
        
        function updateTestDetails(data) {            
            $("#uobject_id").val(data.objectId);
            $("#utest_name").val(data.testName);  
        }
    </script>
{/literal}