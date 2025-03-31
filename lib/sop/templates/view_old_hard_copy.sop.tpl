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
            <li class="active">Upload Hard Copy </li>
            <li class="active">View </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> View</a> </h4>
                    <div class="vd_panel-menu">
                        {if $edit_button}
                            <div data-original-title="Edit" data-toggle="modal" data-target="#edit_info_modal" class=" menu entypo-icon"> <i class="fa fa-edit"></i> </div>
                            <div data-original-title="Edit" data-toggle="modal" data-target="#upload_file_modal" class=" menu entypo-icon"> <i class="fa fa-upload"></i> </div>
                        {/if}
                    </div>
                </div>

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="panel-body table-responsive">
                            <h2><span class="font-semibold">Basic Details</span></h2>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-label">{attribute_name module=sop attribute=type}</div>
                                    <input type="text" readonly value="{$doc_type}" class="mgbt-xs-20 mgbt-sm-0">
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-label">{attribute_name module=sop attribute=doc_no}</div>
                                    <input type="text" readonly value="{$regobj->doc_no}" class="mgbt-xs-20 mgbt-sm-0">
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-label">{attribute_name module=sop attribute=name}</div>
                                    <input type="text" readonly value="{$regobj->name}" class="mgbt-xs-20 mgbt-sm-0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-label">{attribute_name module=sop attribute=created_by}</div>
                                    <input type="text" readonly value="{$created_by}" class="mgbt-xs-20 mgbt-sm-0">
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-label">{attribute_name module=sop attribute=create_time}</div>
                                    <input type="text" readonly value="{$created_time}" class="mgbt-xs-20 mgbt-sm-0">
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-label">{attribute_name module=sop attribute=remarks}</div>
                                    <textarea class="mgbt-xs-20  mgbt-sm-0" name="reason_for_revision" id="reason_for_revision" style="resize: none" readonly="">{$regobj->remarks}</textarea>
                                </div>
                            </div>
                            <h2><span class="font-semibold">Attachments</span></h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    {if !empty($fileobjectarray)}
                                        <table class="table table-bordered table-striped" id="data-tables-attachments">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module=sop attribute=s_no}</th>
                                                    <th>{attribute_name module="file" attribute="name"}</th>
                                                    <th>{attribute_name module="file" attribute="size"}</th>
                                                    <th>{attribute_name module="file" attribute="attached_by"}</th>
                                                    <th>{attribute_name module="file" attribute="date"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$fileobjectarray}
                                                    <tr >
                                                        <td >{$item.count}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal Update -->
<div class="modal fade" id="edit_info_modal" tabindex="-1" role="dialog" aria-labelledby="edit_info_modal" aria-hidden="true">
    <div class="modal-wide-width">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Document Information</h4>
            </div>
            <form name="edit_info_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_info_form" autocomplete="off" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="type"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <select name="udoc_type" id="udoc_type" class="width-60" title="Select Valid Type">
                                    <option value="">Select</option>
                                    {foreach item=item key=key from=$doc_list}
                                        <option value="{$item.object_id}" {if $regobj->type eq $item.object_id} selected {/if}>{$item.short_name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="doc_no"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <input type="text" name="udoc_no" id="udoc_no" class="width-60" title="Enter Valid Document No" value="{$regobj->doc_no}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="name"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <input type="text" name="udoc_name" id="udoc_name" class="width-60" title="Enter Valid Name" value="{$regobj->name}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="remarks"} </label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                <textarea placeholder="Max 500" rows="2" class="width-60" name="udoc_remarks" maxlength="500" title="Enter Valid Remarks" >{$regobj->remarks}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="submit" class="btn vd_btn vd_bg-green" name="update" id="update">Update</button>
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal Update Attachments -->
<div class="modal fade" id="upload_file_modal" tabindex="-1" role="dialog" aria-labelledby="upload_file_modal" aria-hidden="true">
    <div class="modal-wide-width">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Upload Document Information</h4>
            </div>
            <div class="modal-body">
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
                <hr>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
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
                                                {if !empty($item.can_delete) && $edit_button}
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
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_info_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    udoc_no: {
                        required: true,
                        maxlength: 100
                    },
                    udoc_name: {
                        required: true,
                        maxlength: 200
                    },
                    udoc_remarks: {
                        maxlength: 500
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
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
{/literal}
