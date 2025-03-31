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
            <li class="active">VMS Master Data </li>
            <li class="active">Agenda Sub Category Master</li>
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Agenda Sub Category Master</a> </h4>
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
                                        <form name="add_sub_category_to-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sub_category_to-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label">{attribute_name module="admin" attribute="vm_category"} </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <select class="required vendor_category" name="avendor_category" id="avendor_category"  required title="Select Valid Vendor Category ">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$categorylist}
                                                                <option value="{$item.object_id}">{$item.category}</option>
                                                            {/foreach}
                                                        </select>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions row mgbt-xs-0 text-left">
                                                <div class="col-sm-12">
                                                    <button class="btn vd_bg-green vd_white add_more_sub_cat" type="button" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                </div>
                                            </div>
                                            <div class="form-group" id="sub_category_parent_div">
                                                <div class="child_ele form-group" >
                                                    <div class="col-md-4 mgtp-10 ">
                                                        <label class="control-label">{attribute_name module="admin" attribute="vm_sub_category"} </label><span class="vd_red">*</span>
                                                        <div class="controls">
                                                            <textarea rows="1" type="text" placeholder="Min 2 " class="required clear dupliate_field_val_req agenda_subcategory" name="asub_category[]"  required title="Enter Valid Sub Category" data-dupliate_field="sub_category"></textarea>
                                                            <span class="font-semibold vd_red error_exists"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mgtp-10 ">
                                                        <label class="control-label">{attribute_name module="admin" attribute="description"} <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <textarea rows="1" type="text" placeholder="Min 2 " class="required clear empty_check " name="adescription[]"  required title="Enter Valid Description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mgtp-10 ">
                                                        <label class="control-label">{attribute_name module="admin" attribute="vm_risk_category"} <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <select class="required clear empty_check" name="arisk_category[]" required title="Select Valid Risk Category">
                                                                <option value="">Select</option>
                                                                {foreach name=list item=item key=key from=$classificationlist}
                                                                    <option value="{$item.object_id}">{$item.short_name}</option>
                                                                {/foreach}
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="control-label"></label>
                                                        <div class="controls">
                                                            <button class="btn vd_bg-red vd_white mgtp-15 delete_ele" type="button" ><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                                <div class="col-sm-12">
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Agenda Sub Category Master List</a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="vd_content-section clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget">
                                <div class="panel-body table-responsive">
                                    {if !empty($subcategorylist)}
                                        <table class="table table-bordered table-striped generate_datatable" title="Agenda sub category list">
                                            <thead>
                                                <tr>
                                                    <td>{attribute_name module="admin" attribute="sl_no"}</td>
                                                    <th>{attribute_name module="admin" attribute="vm_category"}</th>
                                                    <th>{attribute_name module="admin" attribute="vm_sub_category"}</th>
                                                    <th>{attribute_name module="admin" attribute="vm_points"}</th>
                                                    <th>{attribute_name module="admin" attribute="vm_risk_category"}</th>
                                                    <th>{attribute_name module="admin" attribute="creator"}</th>
                                                    <th>{attribute_name module="admin" attribute="create_time"}</th>
                                                    <th>{attribute_name module="admin" attribute="is_enabled"}</th>
                                                    <th>{attribute_name module="admin" attribute="action"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$subcategorylist} 
                                                    <tr>
                                                        <td></td>
                                                        <td>{$item.category}</td>
                                                        <td>{$item.sub_category}</td>
                                                        <td>{$item.description}</td>
                                                        <td>{$item.risk_category_name}</td>
                                                        <td>{$item.created_by}</td>
                                                        <td>{$item.created_time}</td>
                                                        <td ><span class="label label-{if $item.is_enabled eq yes}success{else}danger{/if}">{$item.is_enabled}</span></td>
                                                        <td>
                                                            <button class="btn vd_bg-blue vd_white" data-toggle="modal" onclick="update_subcategory({htmlspecialchars(json_encode($item))});"  data-target="#edit_sub_category"><i class="fa fa-pencil"></i></button>
                                                        </td>                                                        
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
<div class="modal fade" id="edit_sub_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Agenda Sub Category Master</h4>
            </div>
            <div class="modal-body">
                <form name="edit_sub_category_to-form" id="edit_sub_category_to-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="vm_category"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <select class="required vendor_category" name="uvendor_category" id="uvendor_category"  required title="Select Valid Vendor Category" disabled>
                                    <option value="">Select</option>
                                    {foreach name=list item=item key=key from=$categorylist}
                                        <option value="{$item.object_id}">{$item.category}</option>
                                    {/foreach}
                                </select>                                                  
                            </div>
                        </div>
                        <div class="col-md-6 mgtp">
                            <label class="control-label">{attribute_name module="admin" attribute="vm_sub_category"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <textarea rows="1" type="text" placeholder="Min 2 " class="required clear duplicate_check_group empty_check agenda_subcategory" name="usub_category" id="uagenda_subcategory" required title="Enter Valid Sub Category" data-duplicate_group="sub_category"></textarea>
                                <span class="font-semibold vd_red error_exists"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 mgtp">
                            <label class="control-label">{attribute_name module="admin" attribute="vm_risk_category"} <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="required clear empty_check clear" name="urisk_category" id="urisk_category" required title="Select Valid Risk Category">
                                    <option value="">Select</option>
                                    {foreach name=list item=item key=key from=$classificationlist}
                                        <option value="{$item.object_id}">{$item.short_name}</option>
                                    {/foreach}
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="is_enabled"} <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="required clear" name="uis_enabled" id="uis_enabled"  required title="Select Valid Type">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 mgtp">
                            <label class="control-label">{attribute_name module="admin" attribute="description"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <textarea rows="1" type="text" placeholder="Min 2 " class="required clear empty_check " name="udescription" id="udescription" required title="Enter Valid Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-right">
                        <div class="col-sm-12">
                            <input type="hidden" name="uobject_id" id="uobject_id">
                            <input type="hidden" name="uvendor_category_id" id="uvendor_category_id">
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
    <script type="text/javascript" src="custom/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Add agenda sub category
            var form_submit = $('#add_sub_category_to-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    avendor_category: {
                        required: true
                    },
                    'asub_category[]': {
                        required: true,
                        minlength: 2,
                    },
                    'adescription[]': {
                        required: true,
                        minlength: 2,
                    },
                    'arisk_category[]': {
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
                }
            });
            // Edit agenda sub category
            var form_submit = $('#edit_sub_category_to-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    uvendor_category: {
                        required: true
                    },
                    uagenda_subcategory: {
                        minlength: 2,
                        required: true
                    },
                    udescription: {
                        minlength: 2,
                        required: true
                    },
                    uis_enabled: {
                        required: true
                    },
                    urisk_category: {
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
                }
            });
            $(document).on('keyup', '.agenda_subcategory', function () {
                let ele = $(this);
                if (ele.closest('form').find('.vendor_category').val() == "") {
                    show_notification("e", "topright", "Select Agenda");
                    $(this).val("");
                } else {
                    ele.val(ele.val().toUpperCase());
                    var agenda_category = ele.closest('form').find(".vendor_category").val();
                    x_is_vendor_sub_category_exists(agenda_category, ele.val(), function (result) {
                        ajax_respone_handler_value_exist(result, ele);
                    });
                }
            });
        });
        function update_subcategory(data) {
            $("#uobject_id").val(data.object_id);
            $("#uvendor_category").val(data.category_id);
            $("#uagenda_subcategory").val(data.sub_category);
            $("#uis_enabled").val(data.is_enabled);
            $("#urisk_category").val(data.risk_category_id);
            $("#udescription").val(data.description);
            $("#uis_enabled").val(data.is_enabled);
            $("#uvendor_category_id").val(data.category_id);
        }
        $(".add_more_sub_cat").click(function () {
            add_element(".child_ele", "#sub_category_parent_div");
        });
        $(document).on('change', '.vendor_category', function () {
            var a = $(this).closest('form').find(".clear").val("");
        });
    </script>
{/literal}

