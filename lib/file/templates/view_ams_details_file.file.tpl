<!--Section -1 Inititaion -->
{assign var="section" value=0}
{if $rtype eq 'full_report'}
    {assign var="sub_section" value=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  {assign var="section" value=$section+1} {$section} : INITIATION OF AUDIT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$am_master_obj->audit_no}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$initiator}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$audit_lead_name}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$am_plant}</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Dept.</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$audit_lead_dept}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$am_department}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Company</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$audit_lead_plant}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Initiation</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$am_master_obj->created_time}</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Type</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$audit_type}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Sub Type</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$audit_sub_type}</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit From Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_date var=$am_master_obj->audit_date_from}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{display_date var=$am_master_obj->audit_date_to}</td>
            </tr>
            {if $audit_dept}
                <tr>
                    <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Plant</b></td>
                    <td align="left" width="20%" style="border:1px solid #000000;">{$audit_plant}</td>
                    <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Dept.</b></td>
                    <td align="left" width="40%" style="border:1px solid #000000;">{$audit_dept}</td>
                </tr>
            {/if}
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$am_master_obj->approval_status}</td>      
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$am_master_obj->status} - [{$am_master_obj->wf_status}]</td>          
            </tr>
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'agenda'}
    {assign var="sub_section" value=0}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  {assign var="section" value=$section+1} {$section} : AUDIT</b></th>
            </tr>
        </thead>
    </table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'agenda'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Agenda</b></td>
            </tr>
        </thead>
    </table>
    {if $audit_type eq 'INTERNAL'}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="70%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($ams_agenda_list)}
                    {foreach item=item key=key from=$ams_agenda_list}
                        <tr>
                            <td width="10%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="70%" align="justify" style="border:1px solid #000000;">{$item.agenda}</td>
                            <td width="20%" align="justify" style="border:1px solid #000000;">{display_if_null var=$item.auditor_name}</td>
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
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="90%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($ams_agenda_list)}
                    {foreach item=item key=key from=$ams_agenda_list}
                        <tr>
                            <td width="10%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="90%" align="justify" style="border:1px solid #000000;">{$item.agenda}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {/if}
{/if}
{if $rtype eq 'full_report'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Schedule</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit From Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;">{display_date var=$am_master_obj->audit_date_to}</td>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;">{display_date var=$am_master_obj->audit_date_to}</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;">{display_if_null var=$am_master_obj->scope}</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;">{display_if_null var=$am_master_obj->objectives}</td>
            </tr>
        </thead>
    </table>
{/if}
{if $rtype eq 'full_report'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Plan</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time (From)</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time (To)</b></td>
                <td width="45%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plan</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($ams_audit_plan)}
                {foreach item=item key=key from=$ams_audit_plan}
                    <tr>
                        <td width="10%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;">{display_date var=$item.date}</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;">{$item.from_time}</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;">{$item.to_time}</td>
                        <td width="45%" align="justify" style="border:1px solid #000000;">{$item.plan}</td>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Auditors</b></td>
            </tr>
        </thead>
    </table>
    {if $audit_type eq 'INTERNAL'}
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="40%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                    <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                    <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($ams_auditors)}
                    {foreach item=item key=key from=$ams_auditors}
                        <tr>
                            <td width="10%" align="center" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="40%" align="justify" style="border:1px solid #000000;">{$item.auditor_name}</td>
                            <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditor_dept_name}</td>
                            <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditor_plant_name}</td>
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
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="30%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                    <td width="30%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agency</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact</b></td>
                </tr>
            </thead>
            <tbody>
                {if !empty($ams_auditors)}
                    {foreach item=item key=key from=$ams_auditors}
                        <tr>
                            <td width="10%" align="center" style="border:1px solid #000000;">{$key+1}</td>
                            <td width="30%" align="justify" style="border:1px solid #000000;">{$item.auditor_name}</td>
                            <td width="30%" align="justify" style="border:1px solid #000000;">{$item.ext_agency}</td>
                            <td width="15%" align="justify" style="border:1px solid #000000;">{$item.email}</td>
                            <td width="15%" align="justify" style="border:1px solid #000000;">{$item.contact_number}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                {/if}
            </tbody>
        </table>
    {/if}
{/if}
{if $rtype eq 'full_report'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Auditees</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="40%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditee</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($ams_auditees)}
                {foreach item=item key=key from=$ams_auditees}
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;">{$item.auditee_name}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditee_dept_name}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditee_plant_name}</td>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report'}
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} QA Approval Comments</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($qa_approve_array)}
                {foreach item=item key=key from=$qa_approve_array}
                    <tr>
                        <td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Is Meeting Required </b></td>
                        <td width="70%" style="border:1px solid #000000;">{$am_master_obj->is_meeting_required}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="border:1px solid #000000;text-align:justify">{$item.remarks}</td>
                    </tr>
                    <tr>
                        <td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b>{$item.user_name}</td>
                        <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b>{$item.department}</td>
                        <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b>{$item.date_time}</td>
                    </tr>
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'observation'}
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Findings</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="90%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($ams_agenda_list)}
                {foreach item=item key=key from=$ams_agenda_list}
                    <tr>
                        <td rowspan="{$item.observation|@count+1}" width="10%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="90%" align="justify" style="border:1px solid #000000;">{$item.agenda}</td>
                    </tr>
                    {foreach item=item1 key=key1 from=$item.observation}
                        <tr style="background-color:#E59866;">
                            <td width="90%" align="justify" style="border:1px solid #000000;"><b>Observation : </b> {$key1+1}
                                <br><br><b>NC Type : </b> {$item1.conformity}
                                <br><br><b>Severity Level : </b> {$item1.severity_level}
                                <br><br><b>Is CAPA Required : </b> {$item1.is_capa_required}
                                <br><br><b>Observation Comments : </b><br>{$item1.observation}
                                <br><br><b>{if $item1.severity_level neq 'Good Observation'}Action To Be Taken {else}Justification{/if}: </b><br>{$item1.action_to_be_taken}
                            </td>
                        </tr>
                    {/foreach}
                {/foreach}
            {else}
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            {/if}
        </tbody>
    </table>
{/if}
{if $rtype eq 'full_report'}
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Findings Review Comments</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($audit_findings_review_comments)}
                {foreach item=item key=key from=$audit_findings_review_comments}
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
{/if}
{if $rtype eq 'full_report'}
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
{if $rtype eq 'manual_entry'}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" align="center" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>AUDIT OBSERVATION</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="73%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            {foreach item=item key=key from=$ams_agenda_list}
                <tr>
                    <td rowspan="{$item.sub_category|@count*2+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                    <td width="73%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                    <td width="20%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                </tr>
                <tr>
                    <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                    <td width="66%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                </tr>
                {foreach item=item1 key=key1 from=$item.sub_category}
                    <tr>
                        <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                        <td width="66%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.default_score}</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="2" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>Conformance | Non Conformance
                            <br><br><b>Severity Level : </b>Good Observation (Go) | Major NC (Mn) | Minor NC (mn) | OFI (ofi)
                            <br><br><b>Observation : </b>
                            <br><br><br><br><br><br><br><br><b>Justification | Action To Be Taken : </b><br><br><br><br><br><br><br></td>
                        <td width="20%" align="justify" style="border:1px solid #000000;"><b>Score : </b><br>
                            <br>Go : {$item1.default_score*100/100}
                            <br>Mn : {$item1.default_score*0/100}
                            <br>mn : {$item1.default_score*50/100}
                            <br>ofi : {$item1.default_score*80/100}
                            <br></td>
                    </tr>
                {/foreach}
            {/foreach}
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>Severity Level</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="20%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="10%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score</b></td>
                <td width="60%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Descirption</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">1</td>
                <td width="20%" align="left" style="border:1px solid #000000;">Good Observation (Go)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">100%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Positive findings that highlight areas where processes or controls are effective and working well.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">2</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">Major NC (Mn)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">0%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Significant issues that have a serious impact on compliance or effectiveness and require immediate corrective action.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">2</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">Minor NC (mn)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">50%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Less severe issues that still need attention but do not pose an immediate threat. These may require corrective action but are not as urgent.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">4</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">OFI (ofi)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">80%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Areas where there is potential for enhancing processes or controls that are currently working but could be optimized.</td>
            </tr>
        </tbody>
    </table>
{/if}

