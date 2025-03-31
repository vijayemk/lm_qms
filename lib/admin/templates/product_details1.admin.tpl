<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/src/parsley.min.css" >
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Settings </li>
            <li class="active">QMS Master Data </li>
            <li class="active">Product Details</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="vd_content-section clearfix">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add Product Details </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <div class="modal-wide-width">
                                    <div class="panel-body">    
                                        <form name="add_product-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_product-form" autocomplete="off" data-parsley-validate="">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label">{attribute_name module="admin" attribute="product_code"} </label><span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50" class="product_code ajax_for_is_exist" data-ajax_func="is_product_code_exists"  name="aproduct_code" id="aproduct_code" title="Enter Valid Product Code" required="" data-parsley-required-message="Enter Valid Product Code" minlength="2" maxlength="50">
                                                        <span class="font-semibold vd_red error_exists"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">{attribute_name module="admin" attribute="product_name"}</label> <span class="vd_red">*</span>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50" class="required product_name ajax_for_is_exist" name="aproduct_name"  data-ajax_func="is_product_name_exists"  data-ajax_mandorty_feilds="" id="aproduct_name" required title="Enter Valid Product Name" data-parsley-required-message="Enter Valid Product Name" minlength="2" maxlength="50" >
                                                        <span class="font-semibold vd_red error_exists"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">{attribute_name module="admin" attribute="generic_name"}</label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Min 2 - Max 50"  name="ageneric_name" id="ageneric_name"   title="Enter Valid Generic Name" minlength="2" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                                <div class="col-sm-12">
                                                    <button class="btn menu-icon vd_bd-red vd_red" type="button"><span class="menu-icon"><i class="fa fa-refresh"></i></span> Reset</button>
                                                    <button class="btn menu-icon vd_bd-green vd_green" type="submit"  name="add" id="add" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
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
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Product List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if !empty($product_list)}
                                            <table class="table table-bordered table-striped generate_datatable" id="product_data-tables" title="Product List">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="admin" attribute="product_code"}</th>
                                                        <th>{attribute_name module="admin" attribute="product_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="generic_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="is_enabled"}</th> 
                                                        <th>{attribute_name module="admin" attribute="action"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$product_list} 
                                                        <tr >
                                                            <td >{$item.product_code}</td>
                                                            <td >{$item.product_name}</td>
                                                            <td >{$item.generic_name}</td>
                                                            <td ><span class="label label-{if $item.is_enabled eq yes}success{else}danger{/if}">{$item.is_enabled}</span></td>  
                                                            <td class="menu-action"> 
                                                                <a data-toggle="modal" class="btn menu-icon vd_bd-green vd_green" onclick="set_input_feilds_for_update({htmlspecialchars(json_encode($item))}, '#edit_product-form');" data-target="#edit-product" title="Edit"><i class="fa fa-pencil"></i></a>
                                                                <a  class="btn menu-icon vd_bd-yellow vd_yellow" title="Disable"><i class="fa fa fa-ban"></i></a>
                                                                <a  class="btn menu-icon vd_bd-blue vd_blue" title="Enable"><i class="fa fa fa-check"></i></a>
                                                                <a  class="btn menu-icon vd_bd-red vd_red" title="Delete"><i class="fa fa-trash-o"></i></a>
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
</div>
<!-- Modal -->
<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Product Details</h4>
            </div>
            <div class="modal-body">
                <form name="edit_product-form" id="edit_product-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal lm_validate_form" role="form" autocomplete="off" data-parsley-validate="">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="product_code"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" placeholder="Min 2 - Max 50" class="product_code update_product_code ajax_for_is_exist" name="uproduct_code" id="uproduct_code" data-ajax_func="is_product_code_exists" title="Enter Valid Product Code" required="" data-parsley-required-message="Enter Valid Product Code" minlength="2" maxlength="50">
                                <span class="font-semibold vd_red error_exists"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">{attribute_name module="admin" attribute="product_name"} </label><span class="vd_red">*</span>
                            <div class="controls">
                                <input type="text" placeholder="Min 2 - Max 50" class="product_name update_product_name ajax_for_is_exist" name="uproduct_name" id="uproduct_name"  data-ajax_func="is_product_name_exists"  data-ajax_mandorty_feilds="" title="Enter Valid Product Name" required="" data-parsley-required-message="Enter Valid Product Code" minlength="2" maxlength="50">
                                <span class="font-semibold vd_red error_exists"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="admin" attribute="generic_name"}</label>
                            <div class="controls">
                                <input type="text" placeholder="Min 3 - Max 100"  name="ugeneric_name" id="ugeneric_name" class="update_generic_name" title="Enter Valid Generic Name" minlength="2" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-right">
                        <div class="col-sm-12">
                            <input type="hidden" name="uobject_id" id="uobject_id" class="update_object_id">
                            <button class="btn menu-icon vd_bd-red vd_red page_reload" type="button" ><i class="fa fa-refresh"></i> Close</button>
                            <button class="btn menu-icon vd_bd-green vd_green " type="submit"  name="update" id="update" ><span class="menu-icon"><i class="fa fa-fw fa-pencil"></i></span> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

