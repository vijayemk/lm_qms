
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Timeline </li>
            <li class="active">CAPA Timeline</li>
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
                                <h2 class="mgbt-xs-20">{$capa_no}</h2>
                                <form name="capa_timeline-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="capa_timeline-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="capa" attribute="capa_no"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                <select class="width-60" name="capa_no" id="capa_no" onchange = addList('object_id',this.options[this.selectedIndex].value); required title="Select Valid CAPA Number">
                                                    <option value="">Select</option>
                                                    {foreach name=list item=item key=key from=$capa_list}
                                                        <option value="{$item.capa_object_id}" {if $capa_obj_id eq $item.capa_object_id} selected {/if}>{$item.capa_no}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="vd_content-section clearfix">
                                    {if !empty($creator_name)}
                                        <div class="row">
                                            <div class="col-lg-10 col-md-9">
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
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i>Initiator Comment</a> </div>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Initiated</span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($reviwer)}
                                                        {if $reviewed_year neq $created_year}
                                                            <li class="tl-item tl-item-year" >
                                                                <div class="tl-year">{$reviewed_year}</div>
                                                            </li>
                                                        {/if}
                                                        <li class="tl-item tl-item-date">
                                                            <div class="tl-date"> {$reviewed_month_date} </div>
                                                        </li>
                                                        {foreach name=list item=item key=key from=$reviwer} 
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$item.reviewer_image}">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> {$item.reviewer} <em class="vd_soft-grey font-sm">{$item.reviwer_dept}</em> </h3>
                                                                        <span class="vd_soft-grey">{$item.reviewed_date_time} </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i>Reviewer Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item1 key=key1 from=$item.reviewer_remarks} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item1.review_comments}
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        {/foreach}
                                                    {else}
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> 
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Reviewed </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($dept_approver_name)}
                                                        {if $dept_approved_year neq $created_year}
                                                            <li class="tl-item tl-item-year" >
                                                                <div class="tl-year">{$dept_approved_year}</div>
                                                            </li>
                                                        {/if}
                                                        <li class="tl-item tl-item-date">
                                                            <div class="tl-date"> {$dept_approved_month_date} </div>
                                                        </li>
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$dept_approver_image}">
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> {$dept_approver_name} <em class="vd_soft-grey font-sm">{$dept_approver_dept}</em> </h3>
                                                                    <span class="vd_soft-grey">{$approved_date_time} </span>
                                                                    <div class="clearfix mgbt-xs-10"></div>
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Dept. Approver Comment</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="comments">
                                                                        <div class="content-list content-image">
                                                                            <ul class="list-wrapper no-bd-btm">
                                                                                {foreach name=list item=item key=key from=$dept_approver_remarks} 
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Approved By Department Head </span></h3>
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
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i>Approver Comment</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="comments"><div class="mgtp-10 text-right"><span class="vd_green mgtp-10 text-right"> </span></div>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Approved </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}

                                                    {if !empty($meeting_date_time)}
                                                        {if $meeting_year neq $approved_year}
                                                            <li class="tl-item tl-item-year" >
                                                                <div class="tl-year">{$meeting_year}</div>
                                                            </li>
                                                        {/if}
                                                        <li class="tl-item tl-item-date">
                                                            <div class="tl-date"> {$meeting_month_date} </div>              
                                                        </li>
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$creator_image}">
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> {$creator_name} <em class="vd_soft-grey font-sm">{$creator_dept}</em> </h3>
                                                                    <span class="vd_soft-grey">{$created_date_time} </span>
                                                                    <div class="clearfix mgbt-xs-10"></div>
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-info-circle fa-fw"></i>Meeting Information</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="panel-body">
                                                                        <h4 class="mgtp-10 mgbt-xs-5"> {$meeting_date_time}</h4>
                                                                        <span class="vd_soft-black">{$meeting_venue} </span><div class="mgtp-10 text-left"><span class="vd_green mgtp-10 text-left">{$meeting_status} </span></div>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-users fa-fw"></i>Participants Details</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$attendee_details} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.attendees} - [{$item.department}]
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Meeting Details Not Available </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($mom_details)}
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> 
                                                                    <div class="clearfix mgbt-xs-10"></div>
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-info-circle"></i> MOM Details</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="comments">
                                                                        <div class="content-list content-image">
                                                                            <table class="table table-bordered table-striped" id="data-tables-mom_details">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>{attribute_name module="capa" attribute="identified_activity"}</th>
                                                                                        <th>{attribute_name module="capa" attribute="responsible_person"}</th>
                                                                                        <th>{attribute_name module="capa" attribute="target_date"}</th>
                                                                                        <th>{attribute_name module="capa" attribute="completion_date"}</th>
                                                                                        <th>{attribute_name module="capa" attribute="status"}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    {foreach name=list item=item key=key from=$mom_details}
                                                                                        <tr>
                                                                                            <td><a href="index.php?module=capa&action=update_capa_details&object_id={$item.object_id}" target='_blank'><font color=blue>{$item.identified_activity}</font></a></td>
                                                                                            <td >{$item.sec_resp_person}</td>
                                                                                            <td >{$item.target_date}</td>
                                                                                            <td >{$item.completion_date}</td>
                                                                                            <td >{$item.task_status}</td>
                                                                                        </tr>
                                                                                    {/foreach}
                                                                                </tbody>
                                                                            </table>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">MOM Details Not Available </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($trainer_name)}
                                                        {if $trained_year neq $approved_year}
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
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-info-circle fa-fw"></i>Training Information</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="panel-body">
                                                                        <h4 class="mgtp-10 mgbt-xs-5"> {$training_date_time}</h4>
                                                                        <span class="vd_soft-black">{$training_venue} </span><div class="mgtp-10 text-left"><span class="vd_green mgtp-10 text-left">{$meeting_status} </span></div>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-users fa-fw"></i> Trainee Details</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    {foreach name=list item=item key=key from=$trainee_details} 
                                                                                        <li>
                                                                                            <div class="menu-text">{$item.trainee_name} - [{$item.trainee_dept}]
                                                                                            </div>
                                                                                        </li>
                                                                                    {/foreach}
                                                                                </ul>
                                                                            </div>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Training Details Not Available </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($capa_master->implementation)}
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="{$approver_image}">
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> {$approver_name} <em class="vd_soft-grey font-sm">{$approver_dept}</em> </h3>
                                                                    <span class="vd_soft-grey">{$close_out_date} </span>
                                                                    <div class="clearfix mgbt-xs-10"></div>
                                                                    <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i>Close-out : Approver Comment</a> </div>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="comments">
                                                                        <div class="content-list content-image">
                                                                            <ul class="list-wrapper no-bd-btm">
                                                                                <li>
                                                                                    <div class="menu-text"><b>Implementation : </b>{$capa_master->implementation}</div><br>
                                                                                    <div class="menu-text"><b>Target Date : </b>{$target_date}</div><br>
                                                                                    <div class="menu-text"><b>Close-out Date : </b>{$close_out_date}</div><br>
                                                                                </li>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Close-out Details Not Available </span></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    {/if}
                                                    {if !empty($capa_extension_details)}
                                                        <li class="tl-item">
                                                            <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                            <div class="tl-label panel widget light-widget panel-bd-left">
                                                                <div class="panel-body"> 
                                                                    <div class="clearfix mgbt-xs-10"></div>
                                                                    <h3 class="mgtp-10 mgbt-xs-5">Extension Details </h3>
                                                                    <hr class="mgtp-0"/>
                                                                    <div class="comments">
                                                                        <div class="content-list content-image">
                                                                            <table class="table table-bordered table-striped" id="data-tables-extension_details">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="5%">{attribute_name module="capa" attribute="s_no"}</th>
                                                                                        <th width="5%">{attribute_name module="capa" attribute="existing_target_date"}</th>
                                                                                        <th width="5%">{attribute_name module="capa" attribute="proposed_target_date"}</th>
                                                                                        <th width="5%">{attribute_name module="capa" attribute="reason"}</th>
                                                                                        <th width="5%">{attribute_name module="capa" attribute="status"}</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        {foreach name=list item=item key=key from=$capa_extension_details}
                                                                                            <td>
                                                                                                {$item.count}
                                                                                            </td>
                                                                                            <td>
                                                                                                {$item.existing_target_date}
                                                                                            </td>
                                                                                            <td>
                                                                                                {$item.proposed_target_date}
                                                                                            </td>
                                                                                            <td>
                                                                                                {$item.reason}
                                                                                            </td>
                                                                                            <td>
                                                                                                {$item.status}
                                                                                            </td>
                                                                                        {/foreach}
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
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
                                                                    <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Interim Extension Details Not Available</span></h3>
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
                                        <div class="col-md-12">
                                            <div class="panel widget light-widget">
                                                <div class="panel-body">
                                                    <h2 class="mgbt-xs-20 mgtp-10"><strong>Select Valid CAPA Number</strong></h2>
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
        
       
    </script>
{/literal}
                                                      