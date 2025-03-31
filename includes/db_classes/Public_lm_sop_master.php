<?php
/**
 * Table Definition for public.lm_sop_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_master';    // table name
    public $sop_object_id;                  // varchar(-1) not_null primary_key
    public $sop_desc;                       // varchar(-1)
    public $sop_department;                 // varchar(-1)
    public $sop_type;                       // varchar(-1)
    public $sop_draft_no;                   // varchar(-1)
    public $sop_no;                         // varchar(-1)
    public $sop_name;                       // varchar(-1)
    public $revision;                       // varchar(-1)
    public $supersedes;                     // varchar(-1)
    public $effective_date;                 // date(4)
    public $expiry_date;                    // date(4)
    public $created_year;                   // varchar(-1)
    public $created_month;                  // varchar(-1)
    public $status;                         // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_latest_revision;             // varchar(-1) not_null
    public $is_revised;                     // varchar(-1)
    public $sop_format_no;                  // varchar(-1)
    public $sop_plant;                      // varchar(-1)
    public $cc_no;                          // varchar(-1)
    public $reason_for_revision;            // text(-1)
    public $lm_doc_id;                      // varchar(-1)
    public $lang;                           // varchar(-1)
    public $uname;                          // varchar(-1)
    public $capa_no;                        // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
