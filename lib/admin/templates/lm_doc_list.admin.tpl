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
            <li class="active">LM Doc List </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add Document </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Document Form</h2>
                                <form name="alm_doc-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="alm_doc-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="doc_name"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 100" class="width-60 required" name="adoc_name" id="adoc_name" maxlength="100" required title="Enter Valid Document Name">
                                            </div>
                                            <div id="exist_adoc_name_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="adoc_short_name" id="adoc_short_name" maxlength="40" required title="Enter Valid Document Short Name">
                                            </div>
                                            <div id="exist_adoc_short_name_message"></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="doc_code"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 20" class="width-60 required" name="adoc_code" id="adoc_code" maxlength="40" required title="Enter Valid Document Code">
                                            </div>
                                            <div id="exist_adoc_code_message"></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="order"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="number" placeholder="Min 2 - Max 20" class="width-60 required" name="adoc_order" id="adoc_order" maxlength="40" required title="Enter Valid Document Order">
                                            </div>
                                      </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add">Add</button>
                                            </div>
                                      </div>
                                      <div class="col-md-12 mgbt-xs-5"> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                        {if !empty($lm_doc_list)}
                                            <table class="table table-bordered table-striped" id="doc_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module="admin" attribute="doc_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="short_name"}</th>
                                                        <th>{attribute_name module="admin" attribute="doc_code"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$lm_doc_list} 
                                                        <tr >
                                                            <td >{$item.doc_name}</td>
                                                            <td >{$item.short_name}</td>
                                                            <td >{$item.doc_code}</td>
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

    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#alm_doc-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    adoc_name: {
                        minlength: 2,
                        required: true
                    },
                    adoc_short_name: {
                        minlength: 2,					
                        required: true
                    },
                    adoc_code: {
                        minlength: 2,					
                        required: true
                    },
                    adoc_order: {
                        minlength: 1,					
                        required: true
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
                        element.parent().append(error);
                    } else if (element.parent().hasClass("vd_input-wrapper")){
                        error.insertAfter(element.parent());
                    }else {
                        error.insertAfter(element);
                    }
                }, 

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit,-100);

                },

                highlight: function (element) { // hightlight error inputs
                    $(element).addClass('vd_bd-red');
                    $(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                            .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label, element) {
                    label
                        .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                            .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                                $(element).removeClass('vd_bd-red');
                },
                submitHandler: function(form) {
                    if($("#exist_adoc_name_message").html()=="Document Name exists"){
                        return false;
                    }
                    if($("#exist_adoc_short_name_message").html()=="Short Name exists"){
                        return false;
                    }
                    if($("#exist_adoc_code_message").html()=="Document Code exists"){
                        return false;
                    }
                    $('#add').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function() {
            $("#adoc_name").keyup(function(){
                $("#adoc_name").val($("#adoc_name").val().toUpperCase());
                x_lm_doc_name_exist($("#adoc_name").val(), doc_name_check_handle);
            });
            $("#adoc_short_name").keyup(function(){
                $("#adoc_short_name").val($("#adoc_short_name").val().toUpperCase());
                x_lm_doc_short_name_exist($("#adoc_short_name").val(), doc_short_name_check_handle);
            });
            $("#adoc_code").keyup(function(){
                $("#adoc_code").val($("#adoc_code").val().toUpperCase());
                x_lm_doc_code_exist($("#adoc_code").val(), doc_code_check_handle);
            });
        });
        function doc_name_check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_adoc_name_message').innerHTML = "Document Name exists";
                document.getElementById('exist_adoc_name_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_adoc_name_message').innerHTML = "   ";
            }
        }
        function doc_short_name_check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_adoc_short_name_message').innerHTML = "Short Name exists";
                document.getElementById('exist_adoc_short_name_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_adoc_short_name_message').innerHTML = "   ";
            }
        }
        function doc_code_check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_adoc_code_message').innerHTML = "Document Code exists";
                document.getElementById('exist_adoc_code_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_adoc_code_message').innerHTML = "   ";
            }
        }
    </script>
{/literal}
