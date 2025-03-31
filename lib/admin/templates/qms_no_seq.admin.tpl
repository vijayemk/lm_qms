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
            <li class="active">QMS Master Data </li>
            <li class="active">Number Sequence</li>
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Number Sequence</a> </h4>
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
                                        <form name="add_no_seq-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_no_seq-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="admin" attribute="organization"} </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <select class="org check_num_seq" name="org_id" id="org_id" required title="Select Organization">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$org_list}
                                                                <option value="{$key}">{$item}</option>
                                                            {/foreach}
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label> <span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <select class="plant_list check_num_seq" name="plant_id" id="plant_id"  required title="Select Valid Plant"></select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">{attribute_name module="admin" attribute="doc_name"}</label> <span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <select class="lm_doc check_num_seq" name="lm_doc_id" id="lm_doc_id"  required title="Select Valid Document Name">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$lm_doc_list}
                                                                <option value="{$item.object_id}">{$item.short_name} - [{$item.doc_name}]</option>
                                                            {/foreach}
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">{attribute_name module="admin" attribute="prefix"} </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Max 20" class="show_num_seq prefix" name="prefix" title="Enter Valid Prefix">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">{attribute_name module="admin" attribute="number"} </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="number" placeholder="Max 10" class="show_num_seq number" name="number" title="Enter Valid Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mgbt-md-5">
                                                <div class="col-md-6 pull-right">
                                                    <div class="col-md-5 pd-0">
                                                        <label class="controls mgbt-md-0">{attribute_name module="admin" attribute="num_seq"}</label>
                                                        <div class="controls">
                                                            <input type="text" class="show_prefix num_seq vd_red font-semibold" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 pd-0">
                                                        <label class="controls"></label>
                                                        <div class="controls vd_red font-semibold">
                                                            <input type="text" value="/ {$year}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5  pd-0">
                                                        <label class="controls"></label>
                                                        <div class="controls  vd_red font-semibold">
                                                            <input type="text" class="show_no num_seq" readonly>
                                                            <span class="num_seq_exist font-semibold vd_red error_exists"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="year" value="{$year}">
                                            <div class="number_exist vd_red font-semibold text-right" style="display:none;">Number Sequence Exist</div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="submit_add">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add_no_seq" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
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
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Number Sequence List</a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="vd_content-section clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget">
                                <div class="panel-body table-responsive">
                                    {if !empty($num_seq_list)}
                                        <table class="table table-bordered table-striped generate_datatable" title="Nunber Sequence List">
                                            <thead>
                                                <tr>
                                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                                    <th>{attribute_name module="admin" attribute="organization"}</th>
                                                    <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                                    <th>{attribute_name module="admin" attribute="doc_name"}</th>
                                                    <th>{attribute_name module="admin" attribute="prefix"}</th>
                                                    <th>{attribute_name module="admin" attribute="number"}</th>
                                                    <th>{attribute_name module="admin" attribute="num_seq"}</th>
                                                    <th>{attribute_name module="admin" attribute="action"}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$num_seq_list} 
                                                    <tr>
                                                        <td></td>
                                                        <td>{$item.org_name}</td>
                                                        <td>{$item.plant_short_name} - [{$item.plant_name}]</td>
                                                        <td>{$item.doc_short_name} - [{$item.doc_name}]</td>
                                                        <td>{$item.prefix}</td>
                                                        <td>{$item.number}</td>
                                                        <td>{$item.prefix}/{$year}/{$item.number}</td>
                                                        <td>
                                                            <button class="btn btn-primary" data-toggle="modal" onclick="update_product_det({htmlspecialchars(json_encode($item))});" data-target="#edit-product"><i class="fa fa-pencil"></i></button>
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
<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Number Sequence</h4>
            </div>
            <div class="modal-body">
                <form name="edit_no_seq-form" id="edit_no_seq-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="organization"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="uorg" readonly>
                                <input type="hidden" class="uorg_id" name="uorg_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="plant_name"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="uplant" readonly>
                                <input type="hidden" class="uplant_id" name="uplant_id">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="admin" attribute="doc_name"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="udoc" readonly>
                                <input type="hidden" class="ulm_doc_id" name="ulm_doc_id">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="prefix"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="uprefix" placeholder="Max 20" name="uprefix" title="Enter Valid Prefix">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="number"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" class="unumber" placeholder="Max 10"  name="unumber" title="Enter Valid Number">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="submit_update">
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
            // Add Product 
            var form_submit = $('#add_no_seq-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    org_id: {
                        required: true
                    },
                    plant_id: {
                        required: true
                    },
                    lm_doc_id: {
                        required: true
                    },
                    prefix: {
                        maxlength: 20,
                        required: true
                    },
                    number: {
                        maxlength: 10,
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
                    loading.show();
                    $('#add').attr("disabled", true);
                    form.submit();
                }
            });
            // EditProduct Code
            "use strict";
            var form_submit = $('#edit_no_seq-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    uprefix: {
                        maxlength: 20,
                        required: true
                    },
                    unumber: {
                        maxlength: 10,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    loading.show();
                    $('#update').attr("disabled", true);
                    form.submit();
                }
            });
            $(document).on('change', '.org', function () {
                x_get_org_plant($(this).val(), function (result) {
                    let options = '<option value="">Select</option>';
                    for (let i = 0; i < Object.keys(result).length; i++) {
                        options += `<option value="${result[i].plant_id}">${result[i].short_name} - [${result[i].plant_name}]</option>`;
                    }
                    $(".plant_list").append(options);
                });
            });
            $(document).on('input', '.show_num_seq', function () {
                $(".num_seq").val("");
                $(".show_prefix").val($(".prefix").val());
                $(".show_no").val(` / ${$(".number").val()}`);
            });
        });
        function update_product_det(data) {
            $(".uorg_id").val(data.org_id);
            $(".uorg").val(data.org_name);
            $(".uplant").val(data.plant_name);
            $(".udoc").val(data.doc_name);
            $(".uplant_id").val(data.plant_id);
            $(".ulm_doc_id").val(data.lm_doc_id);
            $(".uprefix").val(data.prefix);
            $(".unumber").val(data.number);
        }
        $(document).on('change', '.check_num_seq', function () {
            x_is_qms_num_seq_exists($(".org").val(), $(".plant_list").val(), $(".lm_doc").val(), function (result) {
                if (result) {
                    $(".number_exist").show();
                    $("#add_no_seq").attr("disabled", true);
                } else {
                    $(".number_exist").hide();
                    $("#add_no_seq").removeAttr("disabled");
                }
            });
        });

    </script>
{/literal}
