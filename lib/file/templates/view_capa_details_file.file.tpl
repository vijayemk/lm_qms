<!--Section -1 Inititaion -->
{assign var="section" value=0}
{if $rtype eq '7'}
    {assign var="sub_section" value=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  {assign var="section" value=$section+1} {$section} : INITIATION OF CAPA</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>CAPA No. </b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{$capa_master_obj->capa_no}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{$capa_master_obj->created_by_name}</td>
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Trigger Type </b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{$capa_master_obj->trigger_type}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{$capa_master_obj->plant_name}</td></tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiaton Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_datetime var=$capa_master_obj->created_time}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{$capa_master_obj->capa_department_name}</td>
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Source Document No.</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{$source_doc_no['source_doc_no']}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{$capa_master_obj->approval_status}</td>             
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var=$capa_master_obj->target_date} </td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Date</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{display_if_null var=$capa_master_obj->close_out_date}</td> 
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var={display_date var=$capa_master_obj->completed_date}}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;">{$capa_master_obj->status} - [{$capa_master_obj->wf_status}]</td>          
            </tr>
        </tbody>
    </table>

    <!--Section -1.2 Devaition Details -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8" border="0">
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} CAPA Details</b></td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$capa_master_obj->reason}</td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Present System | Discrepancy | Non-Conformity
                </b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$capa_master_obj->present_system}</td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Corrections | Immediate Action Taken</b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;"><b>{$capa_master_obj->immed_action_taken_by} [{display_date var=$capa_master_obj->immed_action_by_date}]</b> <br>{display_if_null var=$capa_master_obj->immed_action_taken}</td>
        </tr>
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
    {if $capa_master_obj->is_meeting_required eq 'yes'}
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
                    <td width="25%" style="border:1px solid #000000;">{$capa_master_obj->meeting_status}</td>
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
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} List Of Participnats</b></td>
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
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        </table>
    {/if}
{/if}
{if $rtype eq 'full_report' || $rtype eq 'ca_pa'}
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : CORRECTIVE ACTION</b></th>
            </tr>
        </thead>
        {if !empty($task_details)}
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>SL No</b></td>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Task ID</b></td>
                    <td width="80%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Corrective Action</b></td>
                </tr>
            </thead>
            <thead>
                {assign var="sl_no" value=0}
                {foreach item=item key=key from=$task_details}
                    {if $item.type eq 'ca'}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{assign var="sl_no" value=$sl_no+1} {$sl_no}</td>
                            <td width="10%" style="border:1px solid #000000;">{$item.task_id}</td>
                            <td width="80%" style="border:1px solid #000000;">{$item.task}</td>
                        </tr>
                    {/if}
                {/foreach}
            </thead>
        {else}
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        {/if}
    </table>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : PREVENTIVE ACTION</b></th>
            </tr>
        </thead>
        {if !empty($task_details)}
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>SL No</b></td>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Task ID</b></td>
                    <td width="80%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Preventive Action</b></td>
                </tr>
            </thead>
            <thead>
                {assign var="sl_no" value=0}
                {foreach item=item key=key from=$task_details}
                    {if $item.type eq 'pa'}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{assign var="sl_no" value=$sl_no+1} {$sl_no}</td>
                            <td width="10%" style="border:1px solid #000000;">{$item.task_id}</td>
                            <td width="80%" style="border:1px solid #000000;">{$item.task}</td>
                        </tr>
                    {/if}
                {/foreach}
            </thead>
        {else}
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        {/if}
    </table>
{/if}
{if $rtype eq 'full_report'}
    <div style="height:10%;"></div>
    {assign var="sub_section" value=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : REVIEW</b></th>
            </tr>
        </thead>
        <tbody>
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
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Implementation Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var={display_date var=$capa_master_obj->task_target_date}}</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;">{display_if_null var={display_date var=$capa_master_obj->target_date}}</td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{$qa_appr->user_name}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{$qa_appr->department}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{$qa_appr->date}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status: </b>{$capa_master_obj->approval_status}</td>
            </tr>
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'task'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : IMPLEMENTATION</b></th>
            </tr>
        </thead>
    </table>
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
                            <p><b>Dept. Head Review Comments :</b><br><b>{$item.latest_dept_head_review_comments.created_by_name} [{$item.latest_dept_head_review_comments.created_date}]</b><br>{$item.latest_dept_head_review_comments.review_comments}</p>
                        </td>
                    </tr>
                {/foreach}
                <tr>
                    <td  width="100%" style="border:1px solid #000000;"><b>Task QA Review :</b><br><b>{$qa_appr->user_name} [{display_datetime var=$capa_master_obj->close_out_date}]</b><br>{display_if_null var=$capa_master_obj->task_qa_review}</td>
                </tr>
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
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
                <td width="80%" style="border:1px solid #000000;text-align:justify">{display_if_null var=$capa_master_obj->close_out_comments}</td>
            </tr>  
            <tr>
                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b>{display_if_null var=$close_out->user_name}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b>{display_if_null var=$close_out->department}</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b>{display_if_null var=$close_out->date}</td>
            </tr>
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - {assign var="section" value=$section+1} {$section} : EFFECTIVENESS MONITORING</b></th>
            </tr>
        </thead>
    </table>
    {if $capa_master_obj->is_monitoring_required eq 'yes'}
        {$sub_section=0}
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Responsible Persons</b></td>
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
                {if !empty($moni_resp_per_array)}
                    {foreach item=item key=key from=$moni_resp_per_array}
                        <tr>
                            <td width="10%" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="40%" style="border:1px solid #000000;">{$item.resp_per}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.plant}</td>
                            <td width="25%" style="border:1px solid #000000;">{$item.dept}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
        <div style="height:10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Interim Feedback</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($moni_interim_feedback_comments_array)}
                    {foreach item=item key=key from=$moni_interim_feedback_comments_array}
                        <tr>
                            <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Feed Back</b></td>
                            <td width="50%" style="border:1px solid #000000;">{$item.feedback}</td>
                        </tr>
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Effectiveness</b></td>
                            <td width="80%" style="border:1px solid #000000;">{$item.effectiveness}</td>
                        </tr>
                        <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.updated_by}</td>
                            <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.updated_by_dept}</td>
                            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{display_datetime var=$item.date}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
        <div style="height:10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Final Feedback</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($moni_final_feedback_comments_array)}
                    {foreach item=item key=key from=$moni_final_feedback_comments_array}
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Feed Back</b></td>
                            <td width="80%" style="border:1px solid #000000;">{$item.feedback}</td>
                        </tr>
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Effectiveness</b></td>
                            <td width="80%" style="border:1px solid #000000;">{$item.effectiveness}</td>
                        </tr>
                        <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.updated_by}</td>
                            <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.updated_by_dept}</td>
                            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{display_datetime var=$item.date}</td>
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
                            <td width="15%" style="border:1px solid #000000;">{$item.triggered_by_name}<br>{display_datetime var=$item.triggered_date}</td>
                            <td width="15%" style="border:1px solid #000000;">{$item.triggered_to_name}<br>{display_datetime var=$item.triggered_date}</td>
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
