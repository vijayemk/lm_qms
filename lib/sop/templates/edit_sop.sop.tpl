<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!--script src="vendors/ckeditor4.6.2/ckeditor.js"></script-->
<script src="vendors/ckeditor4.10/ckeditor.js"></script>
<script>
    function win(){
        window.opener.location.reload();
        self.close();
    }
    function validation(){
        if (document.getElementById('exist_error_message').innerHTML == "SOP Name exists"){
            alert("SOP Name Exist.Pls Enter Different Unique SOP Name...!");
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
                    <li><a href='#' data-toggle="modal" data-target="#pdf_download_modal" onclick="add_sop_download_history('{$regobj->sop_object_id}','{$regobj->sop_object_id}','index.php?module=file&action=view_sop_file&sop_object_id={$regobj->sop_object_id}&type={$item.object_id}')">{$item.copy_type}</a></li>
                {/foreach}
            </ul>
            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal"> Edit Name </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#edit_supersedes"> Edit Supersedes </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#edit_lang"> Edit Language </button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#sop_copy"> Clone </button><br>
            <span class="font-semibold"> {$regobj->sop_name} </span><span class="vd_soft-grey"> - Editing Mode </span>
        </h4>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header vd_bg-blue vd_white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Sop Name</h4>
                    </div>
                    <form name="edit_sop_name_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_form-form" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_name"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 120" class="width-100 required" name="sop_name" id="sop_name" value="{$regobj->sop_name}" maxlength="120" onkeyup="sop_name_exist(); return false;"  required title="Enter Valid SOP Name">
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
                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_sop_name" onClick="return validation();">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Supersedes Modal -->
        <div class="modal fade" id="edit_supersedes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header vd_bg-blue vd_white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Supersedes</h4>
                    </div>
                    <form name="edit_supersedes_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_supersedes_form" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_supersedes"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 100" class="width-100 required" name="usupersedes" id="usupersedes" value="{$regobj->supersedes}" maxlength="100" required title="Enter Valid Supersedes">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                        <input type="text" placeholder="Min 3 - Max 200" class="width-100 required" name="change_reason_usupersedes" id="change_reason_usupersedes" maxlength="200" required title="Enter Valid Reason">
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
                            <button type="submit" class="btn vd_btn vd_bg-green" name="edit_usupersedes">Save changes</button>
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
        <!-- Copy Modal -->
        <div class="modal fade" id="sop_copy" tabindex="-1" role="dialog" aria-labelledby="sop_copy_Label" aria-hidden="true">
            <div class="modal-wide-width">
                <div class="modal-content">
                    <div class="modal-header vd_bg-blue vd_white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h4 class="modal-title" id="sop_copy_Label">Copy</h4>
                    </div>
                    <form name="sop_copy_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_copy_form" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="select_option"} <span class="vd_red">*</span></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-11">
                                        <select class="width-100" name="sop_copy_id" id="sop_copy_id" required title="Select">
                                            {foreach name=list item=item key=key from=$sop_list}
                                                <option value="{$item.sop_object_id}">{$item.sop_no} - [{$item.sop_name}] - [{$item.revision}]</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label  col-sm-1"></label>
                                    <div id="first-name-input-wrapper"  class="controls col-sm-11">
                                        <span class="vd_red">Note : Editor content of this SOP will be overwritten. Please take backup before proceeding if it is required</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer background-login">
                            <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn vd_btn vd_bg-green" name="copy_sop_content">Copy</button>
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
                            <form name="edit_sop" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_sop-form" autocomplete="off" >
                                <div class="row">
                                    <div class="container">
                                        <textarea name="editor_details" id="editor_details" style="resize: none" >{$sop_editor_details}</textarea>
                                    </div>
                                    <input  type="hidden" name="sop_object_id" id="sop_object_id" value="{$sop_object_id}">
                                </div>
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
        CKEDITOR.replace( 'editor_details', {
            contentsCss :'vendors/ckeditor4.10/samples/mystyles.css',
            bodyClass :'document-editor',
        });
    </script>
    <script>
        function sop_name_exist(){
            document.getElementById('sop_name').value=document.getElementById('sop_name').value.toUpperCase();
            var sop_name = document.getElementById('sop_name').value;
            //x_sop_name_exist(sop_name,check_handle); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
        }
        function check_handle(result) {
            if (result=="true") {
                document.getElementById('exist_error_message').innerHTML = "SOP Name exists";
                document.getElementById('exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('exist_error_message').innerHTML = "   ";
            }
        }
    </script>
{/literal}
{include file =$_TEMPLATE_PATH_|cat:"sop_download_modal.sop.tpl"}
