<?php
/**
 * Table Definition for public.lm_audit_observation
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_observation extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_observation';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $agenda_object_id;               // varchar(-1) not_null
    public $audit_object_id;                // varchar(-1) not_null
    public $observation;                    // text(-1)
    public $conformity;                     // varchar(-1)
    public $severity_level;                 // varchar(-1)
    public $action_to_be_taken;             // text(-1)
    public $is_capa_required;               // varchar(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
