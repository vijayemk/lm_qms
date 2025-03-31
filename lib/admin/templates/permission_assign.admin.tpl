<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
{literal}
    <script language="javascript">
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
                    //Search funtion gives the position of the first occurance of a string.
                    mainurl=location.href.substring(0,match_position);
                    location.href = mainurl +   text + "="+value ;
                } else {
                    location.href = loc + "&" +  text + "="+value ;
                }
            }	
        }
    </script>
{/literal}
    
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Setings </li>
            <li class="active">Privileges </li>
            <li class="active">Workflow Privileges </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Assigned Privileges  </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <select name="upuserid" id="upuserid" onchange = addList('upuserid',this.options[this.selectedIndex].value); title="Select Valid Department">
                                                    <option value="">Select User</option>
                                                    {foreach name=list item=item key=key from=$userlist}
                                                        <option value="{$item.user_id}" {if $item.user_id eq $upuserid} selected=true{/if}>{$item.full_name} </option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="{$upusername}" class="mgbt-xs-20 mgbt-sm-0" placeholder="User Name">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="{$upuserdept}" class="mgbt-xs-20 mgbt-sm-0" placeholder="Department">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="{$upfullname}" class="mgbt-xs-20 mgbt-sm-0" placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Workflow Privileges</h3>
                                            </div>
                                        </div>
                                        {if !empty($workflow_user_per_list)}
                                            <table class="table table-bordered table-striped" id="view_workflow_data-table">
                                                <thead>
                                                    <tr>
                                                        <th >{attribute_name module="admin" attribute="object_name"}</th>
                                                        <th >{attribute_name module="admin" attribute="is_enabled"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$workflow_user_per_list}
                                                        <tr >
                                                            <td>{$item.access_per_name}</td>
                                                            <td><input type="checkbox" align="center"  {if $item.is_enabled eq '1'} checked {/if} disabled></td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Pdf Privileges</h3>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped" id="view_pdf_workflow_data-table">
                                            <thead>
                                                <tr>
                                                    <th >Copy Type</th>
                                                    {foreach name=list item=item key=key from=$pdf_operation_list}
                                                        <th>{$item.operation_name}</th>
                                                    {/foreach}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach $sop_pdf_print_copy_objectlist as $objkey=>$operationList}
                                                    <tr >
                                                        {capture name="objid"}{$objkey}{/capture}
                                                        <td>{pdf_object_name object_id=$objkey}<!--Refer this smarty template_template_getObjectName in Admin_Processor.func.php--></td>
                                                        {foreach $operationList as $operation=>$opValue}
                                                            <td><input type="checkbox" align="center" name="object[]"  id="object[{$operation}]" value="{$smarty.capture.objid}-{$operation}" disabled {if $opValue eq 1} checked {/if}>
                                                        {/foreach}
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Edit Workflow Privileges </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Edit Workflow Privilege Form</h2>
                                <form name="workflow_per_assign" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="workflow_per_assign-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="table-responsive">
                                        {if !empty($workflow_user_per_list)}
                                            <table class="table table-bordered table-striped" id="edit_workflow_data-table">
                                                <thead>
                                                    <tr>
                                                        <th >{attribute_name module="admin" attribute="object_name"}</th>
                                                        <th >{attribute_name module="admin" attribute="is_enabled"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$workflow_user_per_list}
                                                        <tr >
                                                            <td>{$item.access_per_name}</td>
                                                            <td><input type="checkbox" align="center" name="add_workflow_access_per[]"  value="{$item.access_per_id}"  {if $item.is_enabled eq '1'} checked {/if}></td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        {/if}
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="save_workflow_per" id="save_workflow_per">Save</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Edit Pdf Privileges </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Edit Pdf Privilege Form</h2>
                                <form name="pdf_per_assign-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="pdf_per_assign-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="edit_pdf_workflow_data-table">
                                            <thead>
                                                <tr>
                                                    <th >Copy Type</th>
                                                    {foreach name=list item=item key=key from=$pdf_operation_list}
                                                        <th>{$item.operation_name}</th>
                                                    {/foreach}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach $sop_pdf_print_copy_objectlist as $objkey=>$operationList}
                                                    <tr >
                                                        {capture name="objid"}{$objkey}{/capture}
                                                        <td>{pdf_object_name object_id=$objkey}<!--Refer this smarty template_template_getObjectName in Admin_Processor.func.php--></td>
                                                        {foreach $operationList as $operation=>$opValue}
                                                            <td><input type="checkbox" align="center" name="add_pdf_access_per[]" value="{$smarty.capture.objid}-{$operation}" {if $opValue eq 1} checked {/if}>
                                                        {/foreach}
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="save_pdf_per" id="save_pdf_per">Save</button>
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
        </div>
    </div>
</div>
                       
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            $('#view_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#view_pdf_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#edit_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#edit_pdf_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            
        } );
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#workflow_per_assign-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
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
                    $('#save_workflow_per').attr("disabled", true);
                    form.submit();
                },
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#pdf_per_assign-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
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
                    $('#save_pdf_per').attr("disabled", true);
                    form.submit();
                },
            });
        });
    </script>
{/literal}
