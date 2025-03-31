<?php
/**
 * Table Definition for public.lm_audit_agenda_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_agenda_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_agenda_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $audit_object_id;                // varchar(-1)
    public $observation;                    // text(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $is_capa_required;               // varchar(-1)
    public $completion_date;                // timestamp(8)
    public $nc;                             // varchar(-1)
    public $action_to_be_taken;             // text(-1)
    public $agenda;                         // text(-1) not_null
    public $auditor_id;                     // varchar(-1)
    public $conformity;                     // varchar(-1)
    public $severity_per;                   // int4(4)
    public $severity_level;                 // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
