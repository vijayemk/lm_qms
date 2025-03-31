<?php
/**
 * Table Definition for public.lm_oos_ip_invest_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_ip_invest_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_ip_invest_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $oos_object_id;                  // varchar(-1) not_null
    public $initial_investigation;          // text(-1)
    public $initial_investigation_conclusion;   // text(-1)
    public $is_assign_cause_identified;     // varchar(-1)
    public $is_further_invest_required;     // varchar(-1)
    public $is_oos_valid;                   // varchar(-1)
    public $assign_cause_details;           // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
