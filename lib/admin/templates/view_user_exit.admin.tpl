<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

{literal}
    <script>
{/literal}
{include file="templates/insert_sajax.tpl"}
{literal}
        function select_review(val){
            if(val=="review"){
                document.getElementById('reviewed').style.display="block";
                document.getElementById('review_need_correction').style.display="none";
            }
            if(val=="review_need_correction"){
                document.getElementById('review_need_correction').style.display="block";
                document.getElementById('reviewed').style.display="none";
            }if(val==""){
                document.getElementById('review_need_correction').style.display="none";
                document.getElementById('reviewed').style.display="none";
            }
        }
        function select_approve(val){
            if(val=="approve"){
                document.getElementById('approved').style.display="block";
                document.getElementById('approve_need_correction').style.display="none";
            }
            if(val=="approve_need_correction"){
                document.getElementById('approve_need_correction').style.display="block";
                document.getElementById('approved').style.display="none";
            }if(val==""){
                document.getElementById('approve_need_correction').style.display="none";
                document.getElementById('approved').style.display="none";
            }
        }
    </script>
{/literal}
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">View User Exit Request </li>
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
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> View User Exit Request </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" role="form">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="organization"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="organization" id="organization" readonly value="{$org}">
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="plant_name"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="plant_name" id="plant_name" readonly value="{$plant_name}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="emp_id"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="emp_id" id="emp_id" readonly value="{$emp_id}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="department"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text" class="required" required name="department" id="department" readonly value="{$dep}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="full_name"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text" class="required" required name="full_name" id="full_name" readonly value="{$full_name}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="designation"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="designation" id="designation" readonly value="{$desi}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="email"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="email" id="email" readonly value="{$email}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="requested_by"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="requested_by" id="requested_by" readonly value="{$requested_by}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="request_no"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text"  class="required" required name="request_no" id="request_no" readonly value="{$request_no}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="date"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" > 
                                        <input type="text" class="required" required name="date" id="date" readonly value="{$requested_date}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="label-wrapper">
                                        <label class="control-label">{attribute_name module="admin" attribute="reason"} </label>
                                    </div>
                                    <div class="vd_input-wrapper" >
                                        <textarea  rows="1" class="width-100 required" name="reason" id="reason" style="resize: none" disabled>{$reason}</textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus"> Status </a> </h4>
                </div>
                <div id="collapseStatus" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">{$status}</h2>
                                <form name="exit_status_details" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="exit_status_details-form" autocomplete="off">
                                    <table class="table table-bordered table-striped" id="data-tables-status">
                                        <thead>
                                            <tr>
                                                <th>{attribute_name module=sop attribute=date}</th>
                                                <th>{attribute_name module=sop attribute=username}</th>
                                                <th>{attribute_name module=sop attribute=department}</th>
                                                <th>{attribute_name module=sop attribute=action}</th>
                                                <th>{attribute_name module=sop attribute=status}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach name=list item=item key=key from=$status_details} 
                                                <tr >
                                                    <td >{$item.date}</td>
                                                    <td >{$item.user_name}</td>
                                                    <td >{$item.department}</td>
                                                    <td >{$item.action}</td>
                                                    <td >{$item.status}</td>
                                                </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <hr>
                            {if isset($exit_remarks_array)}
                                <div class="panel-body">
                                    <h2 class="mgbt-xs-20">Comments</h2>
                                    <form name="signup_status_details_remarks" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="signup_status_details_remarks-form" autocomplete="off">
                                        <table class="table table-bordered table-striped" id="data-tables-status-remarks">
                                                <thead>
                                                    <tr>
                                                        <th>{attribute_name module=sop attribute=date}</th>
                                                        <th>{attribute_name module=sop attribute=username}</th>
                                                        <th>{attribute_name module=sop attribute=department}</th>
                                                        <th>{attribute_name module=sop attribute=remarks}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach key=key item=cnt from=$exit_remarks_array}
                                                        <tr >
                                                            <td>{$cnt.remarks_date}</td>
                                                            <td>{$cnt.remarks_user}</td>
                                                            <td>{$cnt.department_name}</td>
                                                            <td>{$cnt.remarks}</td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                {/if}
                            </div>
                            <!-- Panel Widget -->
                        </div>
                    </div>
                </div>
                {if isset($request_review_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreview"> Action </a> </h4>
                        </div>
                        <div id="collapserequestreview" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel widget">
                                                    <div class="panel-body">
                                                        <h2 class="mgbt-xs-20">Request Review Form</h2>
                                                        <form name="request_review" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_review-form" autocomplete="off">
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
                                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-60" name="department" id="department" onchange = get_action_users('{$lm_doc_id}','review',this.options[this.selectedIndex].value); required title="Select Valid Department">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$deptlist}
                                                                                <option value="{$key}">{$item} </option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-60" name="review_user" id="userid" required title="Select Valid User Name">
                                                                            <option value="">Select</option>
                                                                        </select>                                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                                  <div class="mgtp-10">
                                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="request_reviewal" id="request_reviewal" >Send Review</button>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-12 mgbt-xs-5"> </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                        </div>
                                        <!-- row -->
                                    </div>
                                </div>
                                <!-- Panel Widget -->
                            </div>
                        </div>
                    </div>
                {/if}
                {if isset($show_review_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action </a> </h4>
                        </div>
                        <div id="collapseshowreview" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                              <div class="panel widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20">Review Form</h2>
                                                    <form name="review" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="review-form" autocomplete="off">
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
                                                                <label class="control-label  col-sm-2">Review Type <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <select class="width-60" name="review_type" id="review_type" onchange="select_review(this.options[this.selectedIndex].value);" required title="Select Valid Review Type">
                                                                        <option value="">Select</option>
                                                                        <option value="review">Review</option>
                                                                        <option value="review_need_correction">Review Need Correction</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                        <div class="form-group">
                                                          <div class="col-sm-2"></div>
                                                          <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                            <div class="mgtp-10">
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="reviewed" id="reviewed" style="display:none">Review</button>
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="review_need_correction" id="review_need_correction" style="display:none">Send Query</button>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-12 mgbt-xs-5"> </div>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                              <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                          </div>
                                          <!-- row -->
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if isset($request_approve_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestapprove"> Action </a> </h4>
                        </div>
                        <div id="collapserequestapprove" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                              <div class="panel widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20">Request Approve Form</h2>
                                                    <form name="request_approve" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="request_approve-form" autocomplete="off">
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
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <select class="width-60" name="department" id="department" onchange = get_action_users('{$lm_doc_id}','approve',this.options[this.selectedIndex].value); required title="Select Valid Department">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$deptlist}
                                                                            <option value="{$key}">{$item} </option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <select class="width-60" name="approve_user" id="userid" required title="Select Valid User Name">
                                                                        <option value="">Select</option>
                                                                    </select>                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                        <div class="form-group">
                                                          <div class="col-sm-2"></div>
                                                          <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                            <div class="mgtp-10">
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="request_approval" id="request_approval" >Send Approve</button>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-12 mgbt-xs-5"> </div>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                              <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                          </div>
                                          <!-- row -->
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if isset($show_approve_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestshowapprove"> Action </a> </h4>
                        </div>
                        <div id="collapserequestshowapprove" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                              <div class="panel widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20">Approve Form</h2>
                                                    <form name="approve" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="approve-form" autocomplete="off">
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
                                                                <label class="control-label  col-sm-2">Approve Type <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <select class="width-60" name="review_type" id="review_type" onchange="select_approve(this.options[this.selectedIndex].value);" required title="Select Valid Approve Type">
                                                                        <option value="">Select</option>
                                                                        <option value="approve">Approve</option>
                                                                        <option value="approve_need_correction">Approve Need Correction</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                        <div class="form-group">
                                                          <div class="col-sm-2"></div>
                                                          <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                            <div class="mgtp-10">
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="approved" id="approved" style="display:none">Approve</button>
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="approve_need_correction" id="approve_need_correction" style="display:none">Send Query</button>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-12 mgbt-xs-5"> </div>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                              <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                          </div>
                                          <!-- row -->
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if isset($send_copy_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestshowapprove"> Action </a> </h4>
                        </div>
                        <div id="collapserequestshowapprove" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                              <div class="panel widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20">Send Copy Form</h2>
                                                    <form name="send_copy_details" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="send_copy_details-form" autocomplete="off">
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
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="user_name"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <select class="width-60" name="copy_user" id="copy_user"  required title="Select Valid User Name">
                                                                        <option value="">Select</option>
                                                                        {foreach name=list item=item key=key from=$itadmin_array}
                                                                            <option value="{$item.user_id}">{$item.full_name} </option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                        <div class="form-group">
                                                          <div class="col-sm-2"></div>
                                                          <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                            <div class="mgtp-10">
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="send_copy" id="send_copy" >Send Copy</button>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-12 mgbt-xs-5"> </div>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                              <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                          </div>
                                          <!-- row -->
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
                                </div>
                            </div>
                        </div>
                    {/if}
                    {if isset($show_activate_button)}
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestshowapprove"> Action </a> </h4>
                        </div>
                        <div id="collapserequestshowapprove" class="panel-collapse collapse">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                              <div class="panel widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20">Account De Activation Form</h2>
                                                    <form name="deactivate" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="deactivate-form" autocomplete="off">
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
                                                                <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="remarks"} <span class="vd_red">*</span></label>
                                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                    <textarea placeholder="Min 3 - Max 500" rows="2" class="width-60 required" name="comments" id="comments" maxlength="500" required title="Enter Valid Remarks" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                        <div class="form-group">
                                                          <div class="col-sm-2"></div>
                                                          <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                            <div class="mgtp-10">
                                                              <button class="btn vd_bg-green vd_white" type="submit"  name="deactivated" id="deactivated" >DeActivate</button>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-12 mgbt-xs-5"> </div>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                              <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 --> 
                                          </div>
                                          <!-- row -->
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
                                </div>
                            </div>
                        </div>
                    {/if}
            </div>
        </div>
</div>
{literal}
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-tables-status-remarks').dataTable({ordering:false});
        } );
        function get_action_users(lm_doc_id,action,dept_id) {
            x_get_doc_mgmt_auth_users(lm_doc_id,action,dept_id,list_users);
        }
        function list_users(users){
            var dept_users_obj=document.getElementById("userid");
            for (i=dept_users_obj.length;dept_users_obj.length>0;i--) { // Remove Existing Options
                dept_users_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                dept_users_obj.add(addy,null);
            }
            catch(ex) {
                dept_users_obj.add(addy);
            }
            for (var y in users) {
                var users_array = users[y]           //Taking each value from array
                var addy=document.createElement('option'); //Insert the values in to select box
                addy.id=users_array.user_id
                addy.text=users_array.user_name
                addy.value=users_array.user_id
                try {
                    dept_users_obj.add(addy,null); // standards compliant
                }
                catch(ex) {
                    dept_users_obj.add(addy); // IE only
                }
            }	
        }
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#request_review-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    review_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
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
                    $('#request_reviewal').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#review-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
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
                    $('#reviewed').attr("disabled", true);
                    $('#review_need_correction').attr("disabled", true);
                    form.submit();
                },
                
            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#request_approve-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    department: {
                        required: true
                    },
                    approve_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
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
                
            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#approve-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
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
                    $('#approved').attr("disabled", true);
                    $('#approve_need_correction').attr("disabled", true);
                    form.submit();
                },
                
            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#send_copy_details-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    copy_user: {
                        required: true
                    },
                    comments: {
                        minlength: 3,
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
                    $('#send_copy').attr("disabled", true);
                    form.submit();
                },
                
            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#deactivate-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    comments: {
                        minlength: 3,
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
                    $('#deactivated').attr("disabled", true);
                    form.submit();
                },
                 
            });
        });
    </script>
{/literal}
