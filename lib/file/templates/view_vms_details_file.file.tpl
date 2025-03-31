<!--Section -1 Inititaion -->
{assign var="section" value=0}
{if $rtype eq 'full_report'}
    {assign var="sub_section" value=0}
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  {assign var="section" value=$section+1} {$section} : INITIATION OF VENDOR AUDIT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Audit No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$vm_master_obj->vm_no}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->created_by_name}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->audit_lead_name}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->created_by_plant_name}</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Dept.</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->audit_lead_dept}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->created_by_dept_name}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Company</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->audit_lead_plant}</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Initiation</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->created_time}</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;color:{if $vm_master_obj->vendor_status eq 'Qualified'}green{elseif $vm_master_obj->vendor_status eq 'Dis Qualified'}red{/if};"><b>{$vm_master_obj->vendor_status}</b></td>             
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Score</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->final_score}</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;">{$vm_master_obj->approval_status}</td>      
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->status} - [{$vm_master_obj->wf_status}]</td>          
            </tr>
        </tbody>
    </table>
    <!--Section -1.2 Devaition Details -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8" border="0">
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white">
                <b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Vendor Details</b>
            </td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Organization</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->org_name}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->plant_name}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Short Name</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->plant_short_name}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Type</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->type}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact No.</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->landline_number}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->email}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Address</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->address}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>City</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->city}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>State</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->state}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Country</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{$vm_plant_obj->country}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Pincode</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->pincode}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Primary Contact</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->primary_contact}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Primary Contact No.</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->primary_contact_number}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Secondary Contact</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->secondary_contact}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Secondary Contact No.</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->secondary_contact_number}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Established Year</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->established_year}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Website</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->website}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>No. Of Employees</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->no_of_employees}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Annual Turnover</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->annual_turn_over}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Certifications</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;">{display_if_null var=$vm_plant_obj->certifications}</td>
        </tr>
    </table>
{/if}
{if $rtype eq 'full_report' || $rtype eq 'agenda' || $rtype eq 'observation' || $rtype eq 'feedback'}
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
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="73%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($vm_agenda_list)}
                {foreach item=item key=key from=$vm_agenda_list}
                    <tr>
                        <td rowspan="{$item.sub_category|@count+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="73%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                    </tr>
                    <tr style="background-color:#E59866;">
                        <td width="7%" align="center" style="border:1px solid #000000;">Sl No</td>
                        <td width="46%" align="center" style="border:1px solid #000000;">Sub Category</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">Classification</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">Sub Score Weightage</td>
                    </tr>
                    {foreach item=item1 key=key1 from=$item.sub_category}
                        <tr>
                            <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                            <td width="46%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                            <td width="20%" align="justify" style="border:1px solid #000000;">{display_if_null var=$item1.classification_name}</td>
                            <td width="20%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.score}</td>
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
                <td width="25%" align="justify" style="border:1px solid #000000;">{display_if_null var={display_date var=$vm_master_obj->audit_from_date}}</td>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;">{display_if_null var={display_date var=$vm_master_obj->audit_to_date}}</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->scope}</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;">{display_if_null var=$vm_master_obj->objectives}</td>
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
            {if !empty($vm_audit_plan)}
                {foreach item=item key=key from=$vm_audit_plan}
                    <tr>
                        <td width="10%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;">{$item.date}</td>
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
            {if !empty($vm_auditors)}
                {foreach item=item key=key from=$vm_auditors}
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;">{$item.auditor_name}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditor_plant}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditor_dept}</td>
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
    {$sub_section=0}
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
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Conatct No.</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($vm_auditees)}
                {foreach item=item key=key from=$vm_auditees}
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;">{$item.auditee_name}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditee_email}</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;">{$item.auditee_contact}</td>
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
                <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="73%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($vm_agenda_list[0].sub_category[0].observation)}
                {foreach item=item key=key from=$vm_agenda_list}
                    <tr>
                        <td rowspan="{$item.sub_category|@count*2+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="73%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                    </tr>
                    <tr>
                        <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                        <td width="46%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sub Category</b></td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Classification</b></td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sub Score Weightage</b></td>
                    </tr>
                    {foreach item=item1 key=key1 from=$item.sub_category}
                        <tr>
                            <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                            <td width="46%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                            <td width="20%" align="center" style="border:1px solid #000000;">{$item1.classification_name}</td>
                            <td width="20%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.score}</td>
                        </tr>
                        <tr style="background-color:#F0B27A;">
                            <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>{$item1.nc}{$item1.conformity1}
                                <br><br><b>Severity Level : </b>{$item1.severity_level1}
                                <br><br><b>Observation : </b>{$item1.nc}<br>{$item1.observation}
                                <br><br><b>{if $item1.severity_level neq 'Good Observation'}Action To Be Taken {else}Justification{/if}: </b><br>{$item1.just_action_to_be_taken}
                            </td>
                            <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b>{$item1.score1}/{$item1.score}</td>
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
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Finding Review1 Comments</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($audit_findings_review1_comments)}
                {foreach item=item key=key from=$audit_findings_review1_comments}
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
{if $rtype eq 'full_report' || $rtype eq 'feedback'}
    {if !empty($vm_agenda_list[0].sub_category)}
        <div style="height: 10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Findings Completion</b></td>
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
                {foreach item=item key=key from=$vm_agenda_list}
                    <tr>
                        <td rowspan="{$item.sub_category|@count*3+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                        <td width="73%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                    </tr>
                    <tr>
                        <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                        <td width="46%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Classification</td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                    </tr>
                    {foreach item=item1 key=key1 from=$item.sub_category}
                        <tr>
                            <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                            <td width="46%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                            <td width="20%" align="justify" style="border:1px solid #000000;">{$item1.classification_name}</td>
                            <td width="20%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.score}</td>
                        </tr>
                        <tr style="background-color:#F0B27A;">
                            <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>{$item1.conformity1}
                                <br><br><b>Severity Level : </b>{$item1.severity_level1}
                                <br><br><b>Observation : </b><br>{$item1.observation}
                                <br><br><b>{if $item1.nc neq 'Good Observation'}Action To Be Taken {else}Justification{/if}: </b><br>{$item1.just_action_to_be_taken}
                            </td>
                            <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b>{$item1.score1}/{$item1.score}</td>
                        </tr>
                        {if $item1.conformity1 eq 'Conformance'}
                            <!-- No NC -->
                            <tr style="background-color:#C39BD3;">
                                <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>{$item1.conformity1}
                                    <br><br><b>Severity Level : </b>{$item1.severity_level1}
                                </td>
                                <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b>{$item1.score1}/{$item1.score}</td>
                            </tr>
                        {else}
                            <!-- With NC -->
                            <tr style="background-color:#C39BD3;">
                                <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>{$item1.conformity2}
                                    <br><br><b>Severity Level : </b>{$item1.severity_level2}
                                    <br><br><b>Vendor Comments : </b><br>{$item1.vendor_comments}</td>
                                <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b>{$item1.score2}/{$item1.score}</td>
                            </tr>
                        {/if}
                    {/foreach}
                {/foreach}
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
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>{$section}.{assign var="sub_section" value=$sub_section+1}{$sub_section} Audit Finding Review2 Comments</b></td>
            </tr>
        </thead>
        <tbody>
            {if !empty($audit_findings_review2_comments)}
                {foreach item=item key=key from=$audit_findings_review2_comments}
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
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="left" width="100%" style="border:1px solid #000000;background-color:#17A589;color:white;"><b>Digitally Signed By</b></th>
            </tr>
        </thead>
        <tbody>
            {if !empty($esign_user_dtls)}
                {foreach item=item key=key from=$esign_user_dtls}
                    <tr>
                        <th width="20%">{$item.esign_type}</th>
                        <th width="25%">
                            <img src="img/custom_logicmind_img/valid.jpg" width="15px" height="15px"/> {$item.user_name}
                        </th>
                        <th width="20%">{$item.plant}</th>
                        <th width="20%">{$item.dept}</th>
                        <th align="right" width="15%">fsdf</th>
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
                <td width="83%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            {foreach item=item key=key from=$vm_agenda_list}
                <tr>
                    <td rowspan="{$item.sub_category|@count*2+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                    <td width="83%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                    <td width="10%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                </tr>
                <tr>
                    <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                    <td width="76%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                </tr>
                {foreach item=item1 key=key1 from=$item.sub_category}
                    <tr>
                        <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                        <td width="76%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                        <td width="10%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.score}/{$item.category_score}</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="2" align="justify" style="border:1px solid #000000;">
                            <br><b>Findings / Observation : </b><br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                        <td width="10%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><br><br>
                        </td>
                    </tr>
                {/foreach}
            {/foreach}
        </tbody>
    </table>
{/if}