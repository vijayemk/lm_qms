<?php
/**
 * Table Definition for public.user_session
 */
require_once 'DB/DataObject.php';

class DB_Public_user_session extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_session';    // table name
    public $object_id;                      // varchar(-1)
    public $ascii_session_id;               // varchar(-1)
    public $logged_in;                      // bool(1)
    public $user_id;                        // varchar(-1)
    public $last_impression;                // timestamp(8)
    public $created;                        // timestamp(8)
    public $user_agent;                     // varchar(-1)
    public $no_of_hits;                     // int4(4) not_null default_
    public $ip_address;                     // varchar(-1)
    public $last_visited_url;               // varchar(-1)
    public $last_visited_time;              // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
