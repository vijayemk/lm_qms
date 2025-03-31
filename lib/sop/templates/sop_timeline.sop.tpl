
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">SOP Timeline </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Timeline </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">{$sop_name}</h2>
                                <form name="sop_timeline" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_timeline-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_type"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-3">
                                                <select class="width-60" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$soptypelist}
                                                        <option value="{$item->object_id}" {if $sop_type_id eq $item->object_id} selected {/if}>{$item->type}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_name"} -{attribute_name module="sop" attribute="revision"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                <select class="width-60" name="sop_name" id="sop_name" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP Name">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$sop_list}
                                                        <option value="{$item.sop_object_id}" {if $sop_object_id eq $item.sop_object_id} selected {/if}>{$item.sop_name} - {$item.revision}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vd_content-section clearfix">
                                        {if !empty($creator_name)}
                                            <div class="row">
                                                <div class="col-lg-8 col-md-9">
                                                    <ul class="vd_timeline">
                                                        {if !empty($creator_name)}
                                                            <li class="tl-item tl-item-year" >
                                                                <div class="tl-year">{$created_year}</div>
                                                            </li>
                                                            <li class="tl-item tl-item-date">
                                                                <div class="tl-date"> {$created_month_date} </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$creator_image}">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> {$creator_name} <em class="vd_soft-grey font-sm">{$creator_dept}</em> </h3>
                                                                        <span class="vd_soft-grey">{$created_date_time} </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$creator_remarks} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.remarks}
                                                                                                <div class="menu-info"> <span class="menu-date">{$item.date_time} </span> </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
                                                                          </div>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {else}
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Created. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {/if}
                                                        {if !empty($reviwer_name)}
                                                            {if $reviewed_year neq $created_year}
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year">{$reviewed_year}</div>
                                                                </li>
                                                            {/if}
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> {$reviewed_month_date} </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$reviewer_image}">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> {$reviwer_name} <em class="vd_soft-grey font-sm">{$reviwer_dept}</em> </h3>
                                                                        <span class="vd_soft-grey">{$reviewed_date_time} </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$reviewer_remarks} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.remarks}
                                                                                                <div class="menu-info"> <span class="menu-date">{$item.date_time} </span> </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
                                                                          </div>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {else}
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Reviewed. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {/if}
                                                        {if !empty($approver_name)}
                                                            {if $approved_year neq $reviewed_year}
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year">{$approved_year}</div>
                                                                </li>
                                                            {/if}
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> {$approved_month_date} </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$approver_image}">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> {$approver_name} <em class="vd_soft-grey font-sm">{$approver_dept}</em> </h3>
                                                                        <span class="vd_soft-grey">{$approved_date_time} </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$approver_remarks} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.remarks}
                                                                                                <div class="menu-info"> <span class="menu-date">{$item.date_time} </span> </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
                                                                          </div>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {else}
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Approved. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {/if}
                                                        {if !empty($authorizer_name)}
                                                            {if $authorized_year neq $approved_year}
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year">{$authorized_year}</div>
                                                                </li>
                                                            {/if}
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> {$authorized_month_date} </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$authorizer_image}">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> {$authorizer_name} <em class="vd_soft-grey font-sm">{$authorizer_dept}</em> </h3>
                                                                        <span class="vd_soft-grey">{$authorized_date_time} </span>
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_grey">Effective Date <em class="vd_blue font-sm">{$sop_effective_date}</em> </span> &nbsp;&nbsp;&nbsp;<span class="vd_grey">Expiry Date <em class="vd_blue font-sm">{$sop_expiry_date}</em> </span></h3>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$authorizer_remarks}
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.remarks}
                                                                                                <div class="menu-info"> <span class="menu-date">{$item.date_time} </span> </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
                                                                          </div>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {else}
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Authorized. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {/if}
                                                        {if !empty($trainer_name)}
                                                                {if $trained_year neq $authorized_year}
                                                                    <li class="tl-item tl-item-year" >
                                                                      <div class="tl-year">{$trained_year}</div>
                                                                    </li>
                                                                {/if}
                                                                <li class="tl-item tl-item-date">
                                                                  <div class="tl-date"> {$trained_month_date} </div>
                                                                </li>
                                                                <li class="tl-item">
                                                                    <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                    <div class="tl-label panel widget light-widget panel-bd-left">
                                                                        <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$trainer_image}">
                                                                            <h3 class="mgtp-10 mgbt-xs-5"> {$trainer_name} <em class="vd_soft-grey font-sm">{$trainer_dept}</em> </h3>
                                                                            <span class="vd_soft-grey">{$training_date_time} </span>
                                                                            <div class="clearfix mgbt-xs-10"></div>
                                                                            <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-users fa-fw"></i> Participants Details</a> </div>
                                                                            <hr class="mgtp-0"/>
                                                                            <div class="comments">
                                                                                <div class="content-list content-image">
                                                                                    <ul class="list-wrapper no-bd-btm">
                                                                                        {foreach name=list item=item key=key from=$sop_trainees_details} 
                                                                                            <li>
                                                                                                <div class="menu-text">{$item.trainee_name}
                                                                                                    <div class="menu-info"> <span class="menu-date">{$item.trainee_dept} </span> </div>
                                                                                                </div>
                                                                                            </li>
                                                                                        {/foreach}
                                                                                    </ul>
                                                                                </div>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                </li>
                                                        {else}
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Training Details Not Available. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        {/if}
                                                    </ul>
                                                    <br/><br/>
                                                </div>
                                                <!-- col-md-x -->
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="panel widget light-widget">
                                                        <div class="panel-body">
                                                            <h2 class="mgbt-xs-20 mgtp-10"><strong>View</strong> <span class="font-light">Control</span></h2>
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-sm-12">
                                                                    <div class="vd_checkbox checkbox-success">
                                                                        <input type="checkbox" id="checkbox-year" value="1">
                                                                        <label for="checkbox-year"> Hide Year </label>
                                                                    </div>
                                                                    <div class="vd_checkbox checkbox-success">
                                                                        <input type="checkbox" id="checkbox-date" value="1">
                                                                        <label for="checkbox-date"> Hide Date </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {else}
                                            <div class="col-lg-7 col-md-6">
                                                    <div class="panel widget light-widget">
                                                        <div class="panel-body">
                                                            <h2 class="mgbt-xs-20 mgtp-10"><strong>Select valid SOP Type and Revision</strong></h2>
                                                        </div>
                                                    </div>
                                            </div>
                                        {/if}
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
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript">
        $(window).load(function() {
            "use strict";
            function checkView(){
                if ($("#checkbox-year").is(':checked')){
                    $(".tl-item-year").addClass('hidden');
                } else{
                    $(".tl-item-year").removeClass('hidden');
                }
                if ($("#checkbox-date").is(':checked')){
                    $(".tl-item-date").addClass('hidden');
                } else{
                    $(".tl-item-date").removeClass('hidden');
                }		
            }
            $('#checkbox-year, #checkbox-date').prop('checked', false)
            $( "#checkbox-year, #checkbox-date" ).click(function(e) {
            checkView();
            
            });
        })
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
        
        function validation(){
            if (document.getElementById('exist_error_message').innerHTML == "SOP Name exists"){
                alert("SOP Name Exist.Pls Enter Different Unique SOP Name...!");
                return false;
            }
        }
    </script>
{/literal}
                                                      
