<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Upload Hard Copy </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Document</h2>
                                <form name="add_doc_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_doc_form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="type"} <span class="vd_red">*</span></label>
                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                            <select name="adoc_type" id="adoc_type" class="width-60" title="Select Valid Type">
                                                <option value="">Select</option>
                                                {foreach item=item key=key from=$doc_list}
                                                    <option value="{$item.object_id}">{$item.short_name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="doc_no"} <span class="vd_red">*</span></label>
                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                            <input type="text" name="adoc_no" id="adoc_no" class="width-60" title="Enter Valid Document No">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="name"} <span class="vd_red">*</span></label>
                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                            <input type="text" name="adoc_name" id="adoc_name" class="width-60" title="Enter Valid Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="remarks"} </label>
                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                            <textarea placeholder="Max 500" rows="2" class="width-60" name="adoc_remarks" maxlength="500" title="Enter Valid Remarks" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2"></label>
                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="add_doc" id="add_doc" >Add</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- Panel Widget -->
                    </div>
                </div>
            </div>   
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Document List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if !empty($hc_list)}
                                            <table class="table table-bordered table-striped" id="doc_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="sop" attribute="s_no"}</th>
                                                        <th>{attribute_name module="sop" attribute="type"}</th>
                                                        <th>{attribute_name module="sop" attribute="doc_no"}</th>
                                                        <th>{attribute_name module="sop" attribute="name"}</th>
                                                        <th>{attribute_name module="sop" attribute="view_edit"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$hc_list} 
                                                        <tr >
                                                            <td >{$item.count}</td>
                                                            <td >{$item.type}</td>
                                                            <td >{$item.doc_no}</td>
                                                            <td >{$item.name}</td>
                                                            <td >
                                                                <a data-original-title="View/Edit Document" data-toggle="tooltip" data-placement="top" class="btn btn-primary" href="?module=sop&action=view_old_hard_copy&object_id={$item.object_id}"><i class="fa fa-eye-slash" ></i></a>
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

{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
    <!-- Multiselect left to right -->
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <!--script src="vendors/multiselect-master/dist/js/bootstrap.min.js"></script-->
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>
    <script>
    $(document).ready(function () {
        "use strict";
        var form_submit = $('#add_doc_form');
        var error_register = $('.alert-danger', form_submit);
        form_submit.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                adoc_no: {
                    required: true,
                    maxlength: 100
                },
                adoc_name: {
                    required: true,
                    maxlength: 200
                },
                adoc_remarks: {
                    maxlength: 500
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register.fadeIn(500);
                scrollTo(form_submit, -100);
            },
            submitHandler: function (form) {
                $('#add_doc').attr("disabled", true);
                form.submit();
            },
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#doc_data-tables').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Document List',

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        message: 'Document List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
    </script>
{/literal}
