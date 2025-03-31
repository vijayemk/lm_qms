<!--Section -1 Inititaion -->
{assign var="section" value=0}
{if $rtype eq 'full_report'}
    {assign var="sub_section" value=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  {assign var="section" value=$section+1} {$section} : INITIATION OF DEVIATION</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Deviation No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->dm_no}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->created_by_name}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Deviation Type </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->dm_type_name}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->plant_name}</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Classification</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->classification_name}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->dm_department_name}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Occurrence</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->date_of_occurrence} {$dm_master_obj->time_of_occurrence} </td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reporting Time</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->created_time}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Discovery</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->date_of_discovery} {$dm_master_obj->time_of_discovery}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->approval_status}</td>             
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->target_date}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Date</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->close_out_date}</td>             
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$dm_master_obj->completed_date}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$dm_master_obj->status} - [{$dm_master_obj->wf_status}]</td>          
            </tr>
        </tbody>
    </table>
    <!--Section -1.1 Devaition Realted To -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Deviation Related To</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($dev_related_to_list)}
                {foreach item=item key=key from=$dev_related_to_list}
                    <tr>
                        <td width="100%" style="border:1px solid #000000;"><b>{$key+1} {$item.dev_related_to}</b>
                            <ul>
                                {foreach item=item2 key=key2 from=$item.dev_sub_related_to}<li>{$item2.sub_type}</li>{/foreach}
                            </ul>
                        </td>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>

</table>
<!--Section -1.2 Devaition Details -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Deviation Details</b></td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Description</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$dm_master_obj->description}</td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Risk Impact Asssessment</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$dm_master_obj->risk_impact_assessment}</td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Immediate Action taken</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$dm_master_obj->immed_action_taken}</td>
    </tr>
</table>
<!--Section -1.3 Repeteive DMS -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Repetetive DMS</b></td>
    </tr>
    <tr>
        <td align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>{attribute_name module="admin" attribute="sl_no"}</b></td>
        <td align="center" width="80%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>{attribute_name module="dms" attribute="dm_no"}</b></td>
    </tr>
    {if !empty($dev_related_to_list)}
        {foreach item=item key=key from=$rep_dms}
            <tr>
                <td width="20%" style="border:1px solid #000000;">{$key+1}</td>
                <td width="80%" style="border:1px solid #000000;">{$item.dm_no}</td>
            </tr>
        {/foreach}
    {else}
        <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
    {/if}
</table>
<!--Section -1.4 Product Details -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Product Details</b></td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Material Type</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->material_type_name}</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Material Name</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->material_name}</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Product Name</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->product_name}</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope / Market</b></td>
        <td  align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->market_name}</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Customer</b></td>
        <td  align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->customer_name}</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Batch No.</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->batch_no}</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Batch Size</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->batch_size}</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Lot No.</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->lot_no}</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Stage </b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->process_stage_name}</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Manufacturing Date</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;">{$dm_master_obj->manu_date}</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Expiry Date</b></td>
        <td colspan="3" align="justify" style="border:1px solid #000000;">{$dm_master_obj->manu_expiry_date}</td>
    </tr>
</table>
<!--Section - 2 REVIEW AND CFT ASSESSMENT -->
<div style="height:10%;"></div>
{assign var="sub_section" value=0}
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : REVIEW AND CFT ASSESSMENT</b></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!--Section - 2.1 Pre Review Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Pre Review Comments</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($pre_review_array)}
            {foreach item=item key=key from=$pre_review_array}
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </tbody>
</table>
<!--Section - 2.2 Department Head Approval Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Department Head Approval Comments</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($dept_appr_array)}
            {foreach item=item key=key from=$dept_appr_array}
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </tbody>
</table>
<!--Section -2.3 QA Review Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} QA Review Comments</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($qa_review_array)}
            {foreach item=item key=key from=$qa_review_array}
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </tbody>
</table>
<!--Section - 2.4 CFT Assesment -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} CFT Assesment</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($cft_array)}
            {foreach item=item key=key from=$cft_array}
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </tbody>
</table>
<!--Section - 2.5 Pre Approval Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Pre Approval Comments</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($pre_appr_array)}
            {foreach item=item key=key from=$pre_appr_array}
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </tbody>
</table>
<!--Section -  3 : INVESTIGATION -->
<div style="height:10%;"></div>
{$sub_section=0}
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr> 
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : INVESTIGATION</b></th>
        </tr>
    </thead>
</table>
<!--Section -  3.1 Investigation Details-->
{if $dm_master_obj->is_investigation_required eq 'yes'}
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Investigation Details</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Investigation Required</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_investigation_required}</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigtor</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$latest_invest_details->investigated_by}</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Iteration</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$latest_invest_details->iteration}</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_date var=$latest_invest_details->target_date}</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$latest_invest_details->status}</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$latest_invest_details->completion_date}</td>
            </tr>
        </tbody>
    </table>
    <!--Section -  3.2 Investigation-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Investigation</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigation Details</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$latest_invest_details->investigation_details}</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigation Feed Back</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$latest_invest_details->investigator_feedback}</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Probable Root Cause</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$latest_invest_details->root_cause}</td>
            </tr>
        </tbody>
    </table>
    <!--3.3 Investigation - Department Head Review-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Investigation - Department Head Review</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100%" style ="border:1px solid #000000;text-align:justify">{display_if_null var=$latest_invest_details->dept_head_review}</td>
            </tr>
            <tr>
                <td width="34%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{display_if_null var=$latest_invest_details->dept_head_name}</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{display_if_null var=$latest_invest_details->dept_head_dept}</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{display_datetime var=$latest_invest_details->dept_head_review_date}</td>
            </tr>
        </tbody>
    </table>
    <!--3.4 Investigation Verification-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Investigation Verification</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100%" style ="border:1px solid #000000;text-align:justify">{display_if_null var=$latest_invest_details->qa_reviewer_review}</td>
            </tr>
            <tr>
                <td width="34%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{display_if_null var=$latest_invest_details->qa_reviewer}</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{display_if_null var=$latest_invest_details->qa_reviewer_dept}</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{display_datetime var=$latest_invest_details->qa_reviewer_review_date}</td>
            </tr>
        </tbody>
    </table>
{else}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        </thead>
    </table>
{/if}
<!--SECTION - 4 : QA APPROVAL-->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : QA APPROVAL</b></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<table cellspacing=" 0" cellpadding="8" border="0">
    <tbody>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Meeting Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_meeting_required}</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Meeting Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->meeting_target_date}</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Training Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_training_required}</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Training Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->training_target_date}</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Exam Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_online_exam_required}</td> 
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Exam Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->exam_target_date}</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Task Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_task_required}</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Task Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->task_target_date}</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Target Date</b></td>
            <td align="left" width="75%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->target_date}</td>
        </tr>
        <tr>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{$qa_appr->user_name}</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{$qa_appr->department}</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{$qa_appr->date}</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status: </b>{$dm_master_obj->approval_status}</td>
        </tr>
    </tbody>
</table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'meeting'}
    <!--SECTION - 5 : MEETING-->
    <div style="height:10%;"></div>
    {$sub_section=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : MEETING</b></th>
            </tr>
        </thead>
    </table>
    {if $dm_master_obj->is_meeting_required eq 'yes'}
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Schedule information</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></td>
                    <td width="25%" style="border:1px solid #000000;">{$meeting_schedule->meeting_date1}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time: </b></td>
                    <td width="25%" style="border:1px solid #000000;">{$meeting_schedule->meeting_time}</td>
                </tr>
                <tr>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Venue: </b></td>
                    <td width="25%" style="border:1px solid #000000;">{$meeting_schedule->venue}</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status: </b></td>
                    <td width="25%" style="border:1px solid #000000;">{$dm_master_obj->meeting_status}</td>
                </tr>
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Agenda And Conclusion</b></td>
                </tr>
                <tr>
                    <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                    <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Conclusion</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($meeting_agenda_details)}
                    {foreach item=item key=key from=$meeting_agenda_details}
                        <tr>
                            <td width="50%" style="border:1px solid #000000;text-align:justify">{$item.agenda}</td>
                            <td width="50%" style="border:1px solid #000000;text-align:justify">{$item.conclusion}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} List Of Invitees</b></td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User</b></td>
                    <td align="center" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                    <td align="center" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($meeting_participant_details)}
                    {foreach item=item key=key from=$meeting_participant_details}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="40%" style="border:1px solid #000000;">{$item.participant}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.plant}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.department}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} List Of Attendess</b></td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User</b></td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($meeting_attendees_details)}
                    {foreach item=item key=key from=$meeting_attendees_details}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="40%" style="border:1px solid #000000;">{$item.attendee}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.plant}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.department}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td></tr>
            </thead>
        </table>
    {/if}
{/if}
{if $rtype eq 'full_report' || $rtype eq 'training'}
    <div style="height: 10%;"></div>
    {$sub_section=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : TRAINING</b></th>
            </tr>
        </thead>
    </table>
    {if $dm_master_obj->is_training_required eq 'yes'}
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Training Schedule Deatils</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($training_details)}
                    <tr>
                        <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Title : {$training_details->title}</b></td>
                        <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Trainer Name: {$training_details->trainer_name} - {$training_details->trainer_dept}</b></td>
                        <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date : {display_if_null var=$dm_master_obj->training_target_date}</b></td>
                    </tr>
                    {if !empty($training_details->schedule_details)}
                        {foreach item=item1 key=key1 from=$training_details->schedule_details}
                            <tr>
                                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Session : {$item1.session}</b></td>
                                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date : {display_date var=$item1.training_date} {$item1.training_time}</b></td>
                                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Venue : {$item1.venue}</b></td>
                            </tr>
                            <tr>
                                <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Invitees</b></td>
                                <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Attendess</b></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #000000;">
                                    {if !empty($item1.participants)}
                                        {foreach item=item2 key=key2 from=$item1.participants}
                                            {$item2.trainee_name} - [{$item2.trainee_dept}]<br>
                                        {/foreach}
                                    {else}Records Not Found
                                    {/if}
                                </td>
                                <td width="50%" style="border:1px solid #000000;">
                                    {if $item1.attendees}
                                        {foreach item=$item3 from=$item1.attendees}
                                            {$item3.trainee_name} - [{$item3.trainee_dept}]<br>
                                        {/foreach}
                                    {else}Records Not Found
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td align="center" width="100%" style="border:1px solid #000000;"><b>Training Not Yet Scheduled</b></td>
                        </tr>
                    {/if}

                </tbody>
            </table>
        {/if}
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    {/if}
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : EXAM</b></th>
            </tr>
        </thead>
    </table>
    {if $dm_master_obj->is_online_exam_required eq 'yes'}
        <table cellspacing="0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="25%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>User</b></td>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Attempt</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Pass Mark</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Marks Scored</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Status</b></td>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Result</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($exam_details)}
                    {foreach item=item1 key=key1 from=$exam_details}
                        {foreach item=item2 key=key2 from=$item1.user_details}
                            <tr>
                                <td width="10%" style="border:1px solid #000000;text-align:center;">{$key2+1}</td>
                                <td width="25%" style="border:1px solid #000000;">{$item2.assigned_to}</td>
                                <td width="10%" style="border:1px solid #000000;text-align:center;">{$item2.attempt}</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;">{$item2.pass_mark}</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;">{display_if_null var=$item2.marks_scored}</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;">{$item2.status}</td>
                                <td width="10%" style="border:1px solid #000000;text-align:center;">{display_if_null var=$item2.result}</td>
                            </tr>
                        {/foreach}
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="7" align="center" style="border:1px solid #000000;"><b>Records Not Found</b></td>
                    </tr>
                {/if}
            </tbody>
        </table>
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    {/if}
{/if}

{if $rtype eq 'full_report' || $rtype eq 'task'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : TASK</b></th>
            </tr>
        </thead>
    </table>
    {if $dm_master_obj->is_task_required eq 'yes'}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;" align="center"><b>Task Id</b></td>
                    <td width="35%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;" align="center"><b>Task</b></td>
                    <td width="55%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;text-align:justify;" align="center"><b>Task Comments</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($task_details)}
                    {foreach item=item key=key from=$task_details}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{$item.task_id}</td>
                            <td width="35%" style="border:1px solid #000000;text-align:justify">{$item.task}</td>
                            <td width="55%" style="border:1px solid #000000;text-align:justify;"><p><b>Secondary Person Comments :</b><br><b>{$item.latest_sec_review_comments.created_by_name} [{$item.latest_sec_review_comments.created_date}]</b><br>{$item.latest_sec_review_comments.review_comments}</p>
                                <p><b>Primary Person Comments :</b><br><b>{$item.latest_pri_review_comments.created_by_name} [{$item.latest_pri_review_comments.created_date}]</b><br>{$item.latest_pri_review_comments.review_comments}</p>
                                <p><b>Task Verification Comments :</b><br><b>{$item.latest_creator_review_comments.created_by_name} [{$item.latest_creator_review_comments.created_date}]</b><br>{$item.latest_creator_review_comments.review_comments}</p>
                            </td>
                        </tr>
                    {/foreach}
                    <tr>
                        <td  width="100%" style="border:1px solid #000000;"><b>Task QA Review :</b><br><b>{$qa_appr->user_name} [{display_datetime var=$dm_master_obj->close_out_date}]</b><br>{display_if_null var=$dm_master_obj->task_qa_review}</td>
                    </tr>
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    {/if} 
{/if}
{if $rtype eq 'full_report'}
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : CLOSE OUT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Comments</b></td>
                <td width="80%" style="border:1px solid #000000;text-align:justify">{$dm_master_obj->close_out_comments}</td>
            </tr>  
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is CAPA Required</b></td>
                <td width="20%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_capa_required} {if $dm_master_obj->is_capa_required eq 'yes'}[{$capa_no}]{/if}</td>
                <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
                <td width="50%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$capa_ref->reason}</td>
            </tr>
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is CC Required</b></td>
                <td width="20%" style="border:1px solid #000000;">{display_if_null var=$dm_master_obj->is_cc_required} {if $dm_master_obj->is_cc_required eq 'yes'}[{$cc_no}]{/if}</td>
                <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
                <td width="50%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$cc_ref->reason}</td>
            </tr>
            <tr>
                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{$close_out->user_name}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{$close_out->department}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{$close_out->date}</td>
            </tr>
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : ACCESS RIGHTS</b></th>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                <th align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></th>
                <th align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></th>
            </tr>
        </thead>
        {if !empty($access_rights)}
            {foreach item=item key=key from=$access_rights}
                <tr>
                    <th width="10%" style="border:1px solid #000000;">{$key+1}</th>
                    <th width="40%" style="border:1px solid #000000;">{$item.plant_name}</th>
                    <th width="50%" style="border:1px solid #000000;">{$item.dept_name}</th>
                </tr>
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : INTERIM EXTENSION</b></th>
            </tr>
        </thead>
    </table>
    {if $extension_details}   
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Extension For</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Requested By</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Exisiting Date</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Proposed Date</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($extension_details)}
                    {foreach item=item key=key from=$extension_details}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="15%" style="border:1px solid #000000;">{$item.extension_for}</td>
                            <td width="20%" style="border:1px solid #000000;">{$item.created_by_name}</td>
                            <td width="20%" style="border:1px solid #000000;">{display_date var=$item.existing_target_date}</td>
                            <td width="20%" style="border:1px solid #000000;">{display_date var=$item.proposed_target_date}</td>
                            <td width="15%" style="border:1px solid #000000;">{$item.approval_status}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    {/if}
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : INTEGRATION </b></th>
            </tr>
        </thead>
    </table>
    {if $integration_details}   
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <th align="center" width="5%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                    <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Destination Document</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tiggered By</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tiggered To</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Assingned To</b></th>
                    <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></th>
                    <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tracking No</b></th>
                    <th align="center" width="8%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></th>
                </tr>
            </thead>
            <tbody>
                {if !empty($integration_details)}
                    {foreach item=item key=key from=$integration_details}
                        <tr>
                            <td width="5%" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="10%" style="border:1px solid #000000;">{$item.dest_doc_no}<br>{$item.dest_doc_name}</td>
                            <td width="15%" style="border:1px solid #000000;">{$item.triggered_by_name}<br>{$item.triggered_date}</td>
                            <td width="15%" style="border:1px solid #000000;">{$item.triggered_to_name}<br>{$item.triggered_date}</td>
                            <td width="15%" style="border:1px solid #000000;">{display_if_null var=$item.assigned_to_name}<br>{$item.assigned_date}</td>
                            <td width="20%" style="border:1px solid #000000;text-align:justify">{$item.reason}</td>
                            <td width="12%" style="border:1px solid #000000;">{$item.tracking_no}</td>
                            <td width="8%" style="border:1px solid #000000;">{$item.status}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {else}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    {/if}
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : ATTACHMENTS </b></th>
            </tr>
            <tr>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                <th align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>File Name</b></th>
                <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Attached By</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Size</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Type</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Towards</b></th>
            </tr>
        </thead>
        <tbody>
            {if !empty($fileobjectarray)}
                {foreach item=item key=key from=$fileobjectarray}
                    <tr>
                        <th width="10%" style="border:1px solid #000000;">{$key+1}</th>
                        <th width="40%" style="border:1px solid #000000;">{$item.name}</th>
                        <th width="20%" style="border:1px solid #000000;">{$item.attached_by}</th>
                        <th width="10%" style="border:1px solid #000000;">{$item.friendly_size}</th>
                        <th width="10%" style="border:1px solid #000000;">{$item.type}</th>
                        <th width="10%" style="border:1px solid #000000;">{$item.towards}</th>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#17A589;color:white;"><b>Workflow Status</b></th>
            </tr>
            <tr>
                <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></th>
                <th align="center" width="17%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User Name</b></th>
                <th align="center" width="13%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Designation</b></th>
                <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></th>
                <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></th>
                <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Action</b></th>
                <th align="center" width="11%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>status</b></th>
            </tr>
        </thead>
        <tbody>
            {if !empty($workflow_users_array)}
                {foreach item=item key=key from=$workflow_users_array}
                    <tr>
                        <th width="15%" style="border:1px solid #000000;">{$item.date}</th>
                        <th width="17%" style="border:1px solid #000000;">{$item.user_name}</th>
                        <th width="13%" style="border:1px solid #000000;">{$item.desi}</th>
                        <th width="12%" style="border:1px solid #000000;">{$item.plant}</th>
                        <th width="12%" style="border:1px solid #000000;">{$item.department}</th>
                        <th width="20%" style="border:1px solid #000000;">{$item.action}</th>
                        <th width="11%" style="border:1px solid #000000;">{$item.status}</th>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
{/if}
