<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<script src="vendors/ckeditor4.10/ckeditor.js"></script>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">SOP </li>
            <li class="active">Pre Loaded Template </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Add / Edit Pre Loaded Template </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <h4>
                            {if !empty($template_id)}
                                <a href='index.php?module=file&action=view_pre_loaded_template&object_id={$regobj->object_id}' class="btn btn-primary vd_bg-green" onclick="window.open(this.href, 'mytemplatewin','resizable=0'); return false;" >Template Preview</a>
                            {/if}
                            <select class="width-10 btn btn-primary vd_bg-green" name="pre_loaded_template" id="pre_loaded_template" onchange = addList('template_id',this.options[this.selectedIndex].value); required title="Select Valid Template">
                                <option value="">Select Pre Loaded Template</option>
                                {foreach name=list item=item key=key from=$not_moved_pre_loaded_template_list}
                                    <option value="{$item.object_id}" {if $template_id eq $item.object_id} selected {/if}>{$item.name}</option>
                                {/foreach}
                            </select>
                            <button class="btn btn-primary " data-toggle="modal" data-target="#add_pre_loaded_template"> Add</button>
                            {if !empty($template_id)}
                                {if $can_edit_tempalte}
                                    <button class="btn btn-primary " data-toggle="modal" data-target="#move_pre_loaded_template"> Move</button>
                                    <button class="btn btn-primary " data-toggle="modal" data-target="#orientation_Modal"> Orientation [ {$layout_orientation} ] </button>
                                    <button class="btn btn-primary " data-toggle="modal" data-target="#edit_lang"> Edit Language </button>
                                {/if}
                                <span class="font-semibold"> {$regobj->name} </span><span class="vd_soft-grey"> - {if $can_edit_tempalte}Editing Mode{else}Reading Mode{/if} </span>
                            {/if}
                        </h4>
                        {if !empty($template_id)}
                            <div class="vd_content-section clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel light-widget widget">
                                            <div class="panel-heading no-title"> </div>
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    {if $a4p}
                                                        <form name="edit_pre_loaded_template_p-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_pre_loaded_template_p-form" autocomplete="off" >
                                                            <div class="row" style="display: {$a4p}">
                                                                <div class="container">
                                                                    <textarea name="editor_details_p" id="editor_details_p" style="resize: none" {if !$can_edit_tempalte} readonly {/if}>{$regobj->content}</textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    {/if}
                                                    {if $a4l}
                                                        <form name="edit_pre_loaded_template_l-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_pre_loaded_template_l-form" autocomplete="off" >
                                                            <div class="row" style="display: {$a4l}">
                                                                <div class="container">
                                                                    <textarea name="editor_details_l" id="editor_details_l" style="resize: none" {if !$can_edit_tempalte} readonly {/if}>{$regobj->content}</textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {else}
                            <div class="vd_content-section clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel light-widget widget">
                                            <div class="panel-heading no-title"> </div>
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Please select valid Template
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        {/if}
                        <!-- Add Template Modal -->
                        <div class="modal fade" id="add_pre_loaded_template" tabindex="-1" role="dialog" aria-labelledby="add_pre_loaded_template_Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title" id="add_pre_loaded_template_Label">Add Pre Loaded Template</h4>
                                    </div>
                                    <form name="add_pre_loaded_template-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_pre_loaded_template-form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="name"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <input type="text" placeholder="Min 3 - Max 80" class="width-100 required" name="pre_loaded_template_name" id="pre_loaded_template_name" maxlength="80" onkeyup="pre_loaded_template_name_exist(this.options[this.selectedIndex].value); return false;"  required title="Enter Valid Template Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="orientation"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-60" name="pre_loaded_template_ori" id="pre_loaded_template_ori" required title="Select Valid Orientation">
                                                            <option value="">Select</option>
                                                            <option value="L">Landscape</option>
                                                            <option value="P">Portrait</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="language"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <select class="width-100" name="sop_lang" id="sop_lang" required title="Select Valid Language">
                                                            {foreach name=list item=item key=key from=$sop_pdf_sup_lang_list}
                                                                <option value="{$item.code}" {if $item.is_default eq 'yes'} selected {/if}>{$item.language}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2"></label>
                                                    <div id="exist_error_message" class="controls col-sm-10"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer background-login">
                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn vd_btn vd_bg-green" name="add_template" id="add_template">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Move Template Modal -->
                        <div class="modal fade" id="move_pre_loaded_template" tabindex="-1" role="dialog" aria-labelledby="move_pre_loaded_template_Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title" id="move_pre_loaded_template_Label">Move Pre Loaded Template</h4>
                                    </div>
                                    <form name="move_pre_loaded_template-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="move_pre_loaded_template-form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="move_to"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-100" name="move_pre_loaded_template_to" id="move_pre_loaded_template_to" required title="Select Valid Template">
                                                            <option value="">Select</option>
                                                            <option value="sop">SOP</option>
                                                            <option value="annexure">Annexure</option>
                                                            <option value="format">Format</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="move_to_sop">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_no"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-100" name="move_pre_loaded_template_sop" id="move_pre_loaded_template_sop"  onchange = get_format_annexure(this.options[this.selectedIndex].value); required title="Select Valid SOP">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$sop_list}
                                                                <option value="{$item.sop_object_id}">{$item.sop_no} [{$item.sop_name}] [{$item.revision}]</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="move_to_format">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_format_no"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-100" name="move_pre_loaded_template_format" id="move_pre_loaded_template_format" title="Select Valid Format">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="move_to_annexure">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_annexure_no"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-100" name="move_pre_loaded_template_annexure" id="move_pre_loaded_template_annexure" title="Select Valid Annexure">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer background-login">
                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn vd_btn vd_bg-green" name="move_template" id="move_template">Move</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Update Orientation Modal -->
                        <div class="modal fade" id="orientation_Modal" tabindex="-1" role="dialog" aria-labelledby="orientation_Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title" id="orientation_Label">Orientation Selection</h4>
                                    </div>
                                    <form name="orientation_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="orientation_form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-3">{attribute_name module="sop" attribute="select_option"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                                        <select class="width-60" name="upre_loaded_template_ori" id="upre_loaded_template_ori" required title="Select Valid Orientation">
                                                            <option value="L" {if $layout_orientation eq "L"} selected {/if}>Landscape</option>
                                                            <option value="P" {if $layout_orientation eq "P"} selected {/if}>Portrait</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer background-login">
                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_pre_loaded_template_ori">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Moved Template List Modal -->
                        <div class="modal fade" id="moved_pre_loaded_template" tabindex="-1" role="dialog" aria-labelledby="add_pre_loaded_template_Label" aria-hidden="true">
                            <div class="modal-dialog modal-full-width">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title" id="add_pre_loaded_template_Label">Add Pre Loaded Template</h4>
                                    </div>
                                    <form name="add_pre_loaded_template-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_pre_loaded_template-form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="name"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <input type="text" placeholder="Min 3 - Max 80" class="width-100 required" name="pre_loaded_template_name" id="pre_loaded_template_name" maxlength="80" onkeyup="pre_loaded_template_name_exist(this.options[this.selectedIndex].value); return false;"  required title="Enter Valid Template Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2"></label>
                                                    <div id="exist_error_message" class="controls col-sm-10"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer background-login">
                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn vd_btn vd_bg-green" name="add_template" id="add_template">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Language Modal -->
                        <div class="modal fade" id="edit_lang" tabindex="-1" role="dialog" aria-labelledby="lang_Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header vd_bg-blue vd_white">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <h4 class="modal-title" id="lang_Label">Edit Language</h4>
                                    </div>
                                    <form name="edit_lang_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_lang_form" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-3">{attribute_name module="sop" attribute="select_option"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                                        <select class="width-100" name="usop_lang" id="usop_lang" required title="Select Valid Language">
                                                            {foreach name=list item=item key=key from=$sop_pdf_sup_lang_list}
                                                                <option value="{$item.code}" {if $regobj->lang eq $item.code} selected {/if}>{$item.language}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer background-login">
                                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_lang">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Pre Loaded Template List </a> </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                {if !empty($pre_loaded_template_list)}
                                    <table class="table table-bordered table-striped" id="pre_loaded_data-tables">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module="sop" attribute="template_name"}</th>
                                                <th>{attribute_name module="sop" attribute="creator"}</th>
                                                <th>{attribute_name module="sop" attribute="create_time"}</th>
                                                <th>{attribute_name module="sop" attribute="sop_no"}</th>
                                                <th>{attribute_name module="sop" attribute="moved_to"}</th>
                                                <th>{attribute_name module="sop" attribute="moved_by"}</th>
                                                <th>{attribute_name module="sop" attribute="moved_date"}</th>
                                                <th>{attribute_name module="sop" attribute="is_moved"}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach name=list item=item key=key from=$pre_loaded_template_list} 
                                                <tr >
                                                    <td >{$item.name}</td>
                                                    <td >{$item.created_by}</td>
                                                    <td >{$item.created_time}</td>
                                                    <td >{$item.sop_no}</td>
                                                    <td >{$item.sop_ref}</td>
                                                    <td >{$item.moved_by}</td>
                                                    <td >{$item.moved_time}</td>
                                                    {if $item.is_moved eq "no"}
                                                        <td class="vd_green">{$item.is_moved}</td>
                                                    {else}
                                                        <td class="vd_red">{$item.is_moved}</td>
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
</div>
{literal}
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        CKEDITOR.replace( 'editor_details_p', {
            contentsCss :'vendors/ckeditor4.10/samples/mystyles.css',
            bodyClass :'document-editor',
        });
        CKEDITOR.replace( 'editor_details_l', {
            contentsCss :'vendors/ckeditor4.10/samples/mystyles.css',
            bodyClass :'document-editor-a4l',
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#add_pre_loaded_template-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    pre_loaded_template_name: {
                        minlength: 3,					
                        required: true
                    },
                    pre_loaded_template_ori: {
                        required: true
                    }
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
                    if($('#exist_error_message').html()=="Template Name exists"){
                        return false;
                    }
                    $('#add_template').attr("disabled", true);
                    form.submit();
                },
                
            });
        });
    </script>
    <script>
        function check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_error_message').innerHTML = "Template Name exists";
                document.getElementById('exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_error_message').innerHTML = "   ";
            }
        }
        $(document).ready(function() {
            $("#pre_loaded_template_name").keyup(function(){
                $("#pre_loaded_template_name").val($("#pre_loaded_template_name").val().toUpperCase());
                x_pre_loaded_template_name_exist($("#pre_loaded_template_name").val(), check_handle);
            });
        });
        function addList(text,value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text); 
                mainurl = location.href.substring(0,match_position-1);
                location.href = mainurl
            } else {
                if (ind != -1) {	
                    match_position = loc.search(text); 
                    mainurl=location.href.substring(0,match_position);
                    location.href = mainurl +   text + "="+value ;
                } else {
                    location.href = loc + "&" +  text + "="+value ;
                }
            }	
        }
        $(document).ready(function() {
            $("#move_pre_loaded_template_to").change(function(){
                $("#move_pre_loaded_template_sop").val("");
                $("#move_pre_loaded_template_format").val("");
                $("#move_pre_loaded_template_annexure").val("");
                if(this.value=="sop"){
                    $('#move_to_sop').css('display','block');
                    $('#move_to_format').css('display','none');
                    $('#move_to_annexure').css('display','none');
                }else if(this.value=="format"){
                    $('#move_to_sop').css('display','block');
                    $('#move_to_format').css('display','block');
                    $('#move_to_annexure').css('display','none');
                }else if(this.value=="annexure"){
                    $('#move_to_sop').css('display','block');
                    $('#move_to_format').css('display','none');
                    $('#move_to_annexure').css('display','block');
                }else{
                    $('#move_to_sop').css('display','block');
                    $('#move_to_format').css('display','none');
                    $('#move_to_annexure').css('display','none');
                }
            });
            $("#move_template").click(function() {
                if($("#move_pre_loaded_template_sop").val()==""){
                    alert("Please select valid SOP No");
                    $("#move_pre_loaded_template_sop").focus();
                    $("#move_pre_loaded_template_sop").css("border-color", "red");
                    return false;
                }
                if($("#move_pre_loaded_template_to").val()=="format" && $('#move_pre_loaded_template_format').val()==""){
                    alert("Please select valid Format No");
                    $("#move_pre_loaded_template_format").focus();
                    $("#move_pre_loaded_template_format").css("border-color", "red");
                    return false;
                }
                if($("#move_pre_loaded_template_to").val()=="annexure" && $('#move_pre_loaded_template_annexure').val()==""){
                    alert("Please select valid Annexure No");
                    $("#move_pre_loaded_template_annexure").focus();
                    $("#move_pre_loaded_template_annexure").css("border-color", "red");
                    return false;
                }
                
                if (confirm('Existing content will be overwritten.Are you sure you want to move this template?')) {
                    // Save it!sa
                    return true
                } else {
                    return false;
                    // Do nothing!
                }
            });
        });
        function get_format_annexure() {
            if($("#move_pre_loaded_template_to").val()=="format"){
                x_get_sop_formatlist($("#move_pre_loaded_template_sop").val(),list_format);
            }
            if($("#move_pre_loaded_template_to").val()=="annexure"){
                x_get_sop_annexurelist($("#move_pre_loaded_template_sop").val(),list_annexure);
            }
        }
        function list_format(result){
            var format_obj=document.getElementById("move_pre_loaded_template_format");
            for (i=format_obj.length;format_obj.length>0;i--) {
                format_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                format_obj.add(addy,null);
            }
            catch(ex) {
                format_obj.add(addy);
            }
            for (var y in result) {
                var result_array = result[y]  
                var addy=document.createElement('option');
                addy.id=result_array.format_object_id
                addy.text=result_array.format_no + " ["+result_array.format_name+"]"
                addy.value=result_array.format_object_id
                try {
                    format_obj.add(addy,null);
                }
                catch(ex) {
                    format_obj.add(addy);
                }
            }
        }
        function list_annexure(result) {
            var annexure_obj=document.getElementById("move_pre_loaded_template_annexure");
            for (i=annexure_obj.length;annexure_obj.length>0;i--) {
                annexure_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                annexure_obj.add(addy,null);
            }
            catch(ex) {
                annexure_obj.add(addy);
            }
            for (var y in result) {
                var result_array = result[y]  
                var addy=document.createElement('option');
                addy.id=result_array.annexure_object_id
                addy.text=result_array.annexure_no + " ["+result_array.annexure_name+"]"
                addy.value=result_array.annexure_object_id
                try {
                    annexure_obj.add(addy,null);
                }
                catch(ex) {
                    annexure_obj.add(addy);
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pre_loaded_data-tables').dataTable( {
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
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Pre Loaded Template List',

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
                        message: 'Pre Loaded Template List',
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
