<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<script src="vendors/ckeditor4.10/ckeditor.js"></script>
<script>
    function win(){
        window.opener.location.reload();
        self.close();
    }
    function validation(){
        if (document.getElementById('exist_error_message').innerHTML == "Annexure Name exists"){
            alert("Annexure Name Exist.Pls Enter Different Unique Annexure Name...!");
            return false;
        }
    }
</script>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>

    </div>
</div>
<div class="vd_title-section clearfix">
    <div class="vd_panel-header">
        <h4>
            <button type="button" class="btn vd_btn vd_bg-green dropdown-toggle" data-toggle="dropdown"> PDF Preview <i class="fa fa-caret-down prepend-icon"></i> </button>
            <ul class="dropdown-menu" role="menu">
                {foreach name=list item=item key=key from=$print_copy_list}
                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$regobj->annexure_object_id}','index.php?module=file&action=view_annexure&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}&annexure_id={$regobj->annexure_object_id}')">{$item.copy_type}</a></li>
              {/foreach}
            </ul>
            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal"> Edit Name </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#enable_disable_Modal"> Enable/Disable </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#orientation_Modal"> Orientation [ {$layout_orientation} ] </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#edit_lang"> Edit Language </button><br>
            <span class="font-semibold"> {$regobj->annexure_name} </span><span class="vd_soft-grey"> - Editing Mode </span>    
        </h4>
        
       <!--Edit Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header vd_bg-blue vd_white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4 class="modal-title" id="edit_ModalLabel">Edit Annexure Name</h4>
                    </div>
                    <form name="edit_annexure_name_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_form-form" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_annexure_name"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 80" class="width-100 required" name="annexure_name" id="annexure_name" value="{$regobj->annexure_name}" maxlength="80" required title="Enter Valid Annexure Name" onkeyup="annexure_exists('{$regobj->sop_object_id}')">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 200" class="width-100 required" name="change_reason" id="change_reason" maxlength="200" required title="Enter Valid Reason">
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
                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_annexure_name" onClick="return validation();">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!--Enable / Disable Modal -->
        <div class="modal fade" id="enable_disable_Modal" tabindex="-1" role="dialog" aria-labelledby="enable_disable_Modal_ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header vd_bg-blue vd_white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4 class="modal-title" id="enable_disable_ModalLabel">Enable / Disable Annexure Name</h4>
                    </div>
                    <form name="enable_disable_annexure_name_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_form-form" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="select_option"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <select class="width-60" name="enable_disable" id="enable_disable">
                                            <option value="">Select</option>
                                            <option value="Enabled" {if $sop_annexure_status eq "Enabled"}selected{/if}>Enable</option>
                                            <option value="Disabled" {if $sop_annexure_status eq "Disabled"}selected{/if}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 200" class="width-100 required" name="status_reason" id="status_reason" maxlength="200" required title="Enter Valid Reason">
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
                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_annexure_status" onClick="return status_validation();">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Orientation Modal -->
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
                                        <select class="width-60" name="annexure_ori" id="annexure_ori" required title="Select Valid Orientation">
                                            <option value="L" {if $layout_orientation eq "L"} selected {/if}>Landscape</option>
                                            <option value="P" {if $layout_orientation eq "P"} selected {/if}>Portrait</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer background-login">
                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_annexure_orientation">Save changes</button>
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
        <div class="vd_panel-menu hidden-sm hidden-xs">
            <div  ><input type=button onClick="win();" value="Close window"></div>
        </div>
    </div>
</div>
{if isset($edit_content)}
    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="panel light-widget widget">
                    <div class="panel-heading no-title"> </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <input  type="hidden" name="sop_object_id" id="sop_object_id" value="{$sop_object_id}">
                            {if $sop_annexure_status eq "Disabled"}
                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                    <i class="fa fa-exclamation-triangle append-icon"></i><strong>Oh snap!</strong> <a href="#" class="alert-link">Annexure Disbled.</a>
                                </div>
                            {/if}
                            <form name="edit_annexure_p" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_annexure_p-form" autocomplete="off" >
                                {if $sop_annexure_status neq "Disabled" and $a4p}
                                    <div class="row" style="display: {$a4p}">
                                        <div class="container">
                                            <textarea name="editor_details_p" id="editor_details_p" style="resize: none">{$sop_annexure_editor_details}</textarea>
                                        </div>
                                    </div>
                                {/if}
                            </form>
                            <form name="edit_annexure_l" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_annexure_l-form" autocomplete="off" >
                                {if $sop_annexure_status neq "Disabled" and $a4l}
                                    <div class="row" style="display: {$a4l}">
                                        <div class="container">
                                            <textarea name="editor_details_l" id="editor_details_l" style="resize: none">{$sop_annexure_editor_details}</textarea>
                                        </div>
                                    </div>
                                {/if}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{literal}
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
    <script>
        function annexure_exists(sop_object_id){
            document.getElementById('annexure_name').value=document.getElementById('annexure_name').value.toUpperCase();
            var annexure_name = document.getElementById('annexure_name').value;
            x_annexure_name_exist(annexure_name,sop_object_id,check_handle); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
        }
        function check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_error_message').innerHTML = "Annexure Name exists";
                document.getElementById('exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_error_message').innerHTML = "   ";
            }
        }
        function status_validation(){
            var status= document.getElementById('enable_disable').value;
            if(status=="Enabled"){
                if (confirm("Are you sure want to enable?") == true) {
                    return true;
                } else {
                    return false;
                }
            }else if(status=="Disabled"){
                if (confirm("Are you sure want to disable?") == true) {
                    return true;
                } else {
                    return false;
                }
            }else{
                alert("Pls select valid Option");
                return false;
            }
        }
    </script>
{/literal}
{include file =$_TEMPLATE_PATH_|cat:"sop_download_modal.sop.tpl"}