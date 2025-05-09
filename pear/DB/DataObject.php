<?php
/**
 * Object Based Database Query Builder and data store
 *
 * For PHP versions 4,5 and 6
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Database
 * @package    DB_DataObject
 * @author     Alan Knowles <alan@akbkhome.com>
 * @copyright  1997-2006 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    CVS: $Id: DataObject.php 336751 2015-05-12 04:39:50Z alan_k $
 * @link       http://pear.php.net/package/DB_DataObject
 */
  

/* =========================================================================== 
 *
 *    !!!!!!!!!!!!!               W A R N I N G                !!!!!!!!!!!
 *
 *  THIS MAY SEGFAULT PHP IF YOU ARE USING THE ZEND OPTIMIZER (to fix it, 
 *  just add "define('DB_DATAOBJECT_NO_OVERLOAD',true);" before you include 
 *  this file. reducing the optimization level may also solve the segfault.
 *  ===========================================================================
 */

/**
 * The main "DB_DataObject" class is really a base class for your own tables classes
 *
 * // Set up the class by creating an ini file (refer to the manual for more details
 * [DB_DataObject]
 * database         = mysql:/username:password@host/database
 * schema_location = /home/myapplication/database
 * class_location  = /home/myapplication/DBTables/
 * clase_prefix    = DBTables_
 *
 *
 * //Start and initialize...................... - dont forget the &
 * $config = parse_ini_file('example.ini',true);
 * $options = &PEAR::getStaticProperty('DB_DataObject','options');
 * $options = $config['DB_DataObject'];
 *
 * // example of a class (that does not use the 'auto generated tables data')
 * class mytable extends DB_DataObject {
 *     // mandatory - set the table
 *     var $_database_dsn = "mysql://username:password@localhost/database";
 *     var $__table = "mytable";
 *     function table() {
 *         return array(
 *             'id' => 1, // integer or number
 *             'name' => 2, // string
 *        );
 *     }
 *     function keys() {
 *         return array('id');
 *     }
 * }
 *
 * // use in the application
 *
 *
 * Simple get one row
 *
 * $instance = new mytable;
 * $instance->get("id",12);
 * echo $instance->somedata;
 *
 *
 * Get multiple rows
 *
 * $instance = new mytable;
 * $instance->whereAdd("ID > 12");
 * $instance->whereAdd("ID < 14");
 * $instance->find();
 * while ($instance->fetch()) {
 *     echo $instance->somedata;
 * }
**/

/**
 * Needed classes
 * - we use getStaticProperty from PEAR pretty extensively (cant remove it ATM)
 */

require_once 'PEAR.php';

/**
 * We are duping fetchmode constants to be compatible with
 * both DB and MDB2
 */
define('DB_DATAOBJECT_FETCHMODE_ORDERED',1); 
define('DB_DATAOBJECT_FETCHMODE_ASSOC',2);





/**
 * these are constants for the get_table array
 * user to determine what type of escaping is required around the object vars.
 */
define('DB_DATAOBJECT_INT',  1);  // does not require ''
define('DB_DATAOBJECT_STR',  2);  // requires ''

define('DB_DATAOBJECT_DATE', 4);  // is date #TODO
define('DB_DATAOBJECT_TIME', 8);  // is time #TODO
define('DB_DATAOBJECT_BOOL', 16); // is boolean #TODO
define('DB_DATAOBJECT_TXT',  32); // is long text #TODO
define('DB_DATAOBJECT_BLOB', 64); // is blob type


define('DB_DATAOBJECT_NOTNULL', 128);           // not null col.
define('DB_DATAOBJECT_MYSQLTIMESTAMP'   , 256);           // mysql timestamps (ignored by update/insert)
/*
 * Define this before you include DataObjects.php to  disable overload - if it segfaults due to Zend optimizer..
 */
//define('DB_DATAOBJECT_NO_OVERLOAD',true)  


/**
 * Theses are the standard error codes, most methods will fail silently - and return false
 * to access the error message either use $table->_lastError
 * or $last_error = PEAR::getStaticProperty('DB_DataObject','lastError');
 * the code is $last_error->code, and the message is $last_error->message (a standard PEAR error)
 */

define('DB_DATAOBJECT_ERROR_INVALIDARGS',   -1);  // wrong args to function
define('DB_DATAOBJECT_ERROR_NODATA',        -2);  // no data available
define('DB_DATAOBJECT_ERROR_INVALIDCONFIG', -3);  // something wrong with the config
define('DB_DATAOBJECT_ERROR_NOCLASS',       -4);  // no class exists
define('DB_DATAOBJECT_ERROR_INVALID_CALL'  ,-7);  // overlad getter/setter failure

/**
 * Used in methods like delete() and count() to specify that the method should
 * build the condition only out of the whereAdd's and not the object parameters.
 */
define('DB_DATAOBJECT_WHEREADD_ONLY', true);

/**
 *
 * storage for connection and result objects,
 * it is done this way so that print_r()'ing the is smaller, and
 * it reduces the memory size of the object.
 * -- future versions may use $this->_connection = & PEAR object..
 *   although will need speed tests to see how this affects it.
 * - includes sub arrays
 *   - connections = md5 sum mapp to pear db object
 *   - results     = [id] => map to pear db object
 *   - resultseq   = sequence id for results & results field
 *   - resultfields = [id] => list of fields return from query (for use with toArray())
 *   - ini         = mapping of database to ini file results
 *   - links       = mapping of database to links file
 *   - lasterror   = pear error objects for last error event.
 *   - config      = aliased view of PEAR::getStaticPropery('DB_DataObject','options') * done for performance.
 *   - array of loaded classes by autoload method - to stop it doing file access request over and over again!
 */
$GLOBALS['_DB_DATAOBJECT']['RESULTS']   = array();
$GLOBALS['_DB_DATAOBJECT']['RESULTSEQ'] = 1;
$GLOBALS['_DB_DATAOBJECT']['RESULTFIELDS'] = array();
$GLOBALS['_DB_DATAOBJECT']['CONNECTIONS'] = array();
$GLOBALS['_DB_DATAOBJECT']['INI'] = array();
$GLOBALS['_DB_DATAOBJECT']['LINKS'] = array();
$GLOBALS['_DB_DATAOBJECT']['SEQUENCE'] = array();
$GLOBALS['_DB_DATAOBJECT']['LASTERROR'] = null;
$GLOBALS['_DB_DATAOBJECT']['CONFIG'] = array();
$GLOBALS['_DB_DATAOBJECT']['CACHE'] = array();
$GLOBALS['_DB_DATAOBJECT']['OVERLOADED'] = false;
$GLOBALS['_DB_DATAOBJECT']['QUERYENDTIME'] = 0;


 
// this will be horrifically slow!!!!
// these two are BC/FC handlers for call in PHP4/5

 
if (!defined('DB_DATAOBJECT_NO_OVERLOAD')) {
    
    class DB_DataObject_Overload 
    {
        function __call($method,$args) 
        {
            $return = null;
            $this->_call($method,$args,$return);
            return $return;
        }
        function __sleep() 
        {
            return array_keys(get_object_vars($this)) ; 
        }
    }
} else {
    class DB_DataObject_Overload {}
}


    


 

 /*
 *
 * @package  DB_DataObject
 * @author   Alan Knowles <alan@akbkhome.com>
 * @since    PHP 4.0
 */
 
class DB_DataObject extends DB_DataObject_Overload
{
   /**
    * The Version - use this to check feature changes
    *
    * @access   private
    * @var      string
    */
    var $_DB_DataObject_version = "1.11.3";

    /**
     * The Database table (used by table extends)
     *
     * @access  private
     * @var     string
     */
    var $__table = '';  // database table

    /**
     * The Number of rows returned from a query
     *
     * @access  public
     * @var     int
     */
    var $N = 0;  // Number of rows returned from a query

    /* ============================================================= */
    /*                      Major Public Methods                     */
    /* (designed to be optionally then called with parent::method()) */
    /* ============================================================= */


    /**
     * Get a result using key, value.
     *
     * for example
     * $object->get("ID",1234);
     * Returns Number of rows located (usually 1) for success,
     * and puts all the table columns into this classes variables
     *
     * see the fetch example on how to extend this.
     *
     * if no value is entered, it is assumed that $key is a value
     * and get will then use the first key in keys()
     * to obtain the key.
     *
     * @param   string  $k column
     * @param   string  $v value
     * @access  public
     * @return  int     No. of rows
     */
    function get($k = null, $v = null)
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        $keys = array();
        
        if ($v === null) {
            $v = $k;
            $keys = $this->keys();
            if (!$keys) {
                $this->raiseError("No Keys available for {$this->tableName()}", DB_DATAOBJECT_ERROR_INVALIDCONFIG);
                return false;
            }
            $k = $keys[0];
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("$k $v " .print_r($keys,true), "GET");
        }
        
        if ($v === null) {
            $this->raiseError("No Value specified for get", DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        $this->$k = $v;
        return $this->find(1);
    }
    
    /**
     * Get the value of the primary id
     *
     * While I normally use 'id' as the PRIMARY KEY value, some database use
     * {table}_id as the column name.
     *
     * To save a bit of typing,
     *
     * $id = $do->pid();
     *
     * @return the id 
     */
    function pid()
    {
        $keys = $this->keys();
        if (!$keys) {
            $this->raiseError("No Keys available for {$this->tableName()}",
                            DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return false;
        }
        $k = $keys[0];
        if (empty($this->$k)) { // we do not 
            $this->raiseError("pid() called on Object where primary key value not available",
                            DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        return $this->$k;
    }
    


    /**
     * build the basic select query.
     * 
     * @access private
     */
    
    function _build_select()
    {
        global $_DB_DATAOBJECT;
        $quoteIdentifiers = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        if ($quoteIdentifiers) {
            $this->_connect();
            $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
        }
        $tn = ($quoteIdentifiers ? $DB->quoteIdentifier($this->tableName()) : $this->tableName()) ;
        if (!empty($this->_query['derive_table']) && !empty($this->_query['derive_select']) ) {
            
            // this is a derived select..
            // not much support in the api yet..
            
             $sql = 'SELECT ' .
               $this->_query['derive_select']
               .' FROM ( SELECT'.
                    $this->_query['data_select'] . " \n" .
                    " FROM   $tn  " . $this->_query['useindex'] . " \n" .
                    $this->_join . " \n" .
                    $this->_query['condition'] . " \n" .
                    $this->_query['group_by'] . " \n" .
                    $this->_query['having'] . " \n" .
                ') ' . $this->_query['derive_table'];
                     
            return $sql;
            
            
        }
        
       
        
        $sql = 'SELECT ' .
            $this->_query['data_select'] . " \n" .
            " FROM   $tn  " . $this->_query['useindex'] . " \n" .
            $this->_join . " \n" .
            $this->_query['condition'] . " \n" .
            $this->_query['group_by'] . " \n" .
            $this->_query['having'] . " \n";
                 
        return $sql;
    }

     
    /**
     * find results, either normal or crosstable
     *
     * for example
     *
     * $object = new mytable();
     * $object->ID = 1;
     * $object->find();
     *
     *
     * will set $object->N to number of rows, and expects next command to fetch rows
     * will return $object->N
     *
     * if an error occurs $object->N will be set to false and return value will also be false;
     * if numRows is not supported it will 
     * 
     *
     * @param   boolean $n Fetch first result
     * @access  public
     * @return  mixed (number of rows returned, or true if numRows fetching is not supported)
     */
    function find($n = false)
    {
        global $_DB_DATAOBJECT;
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }

        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug($n, "find",1);
        }
        if (!strlen($this->tableName())) {
            // xdebug can backtrace this!
            trigger_error("NO \$__table SPECIFIED in class definition",E_USER_ERROR);
        }
        $this->N = 0;
        $query_before = $this->_query;
        $this->_build_condition($this->table()) ;
        
       
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
       
        
        $sql = $this->_build_select();
        
        foreach ($this->_query['unions'] as $union_ar) {  
            $sql .=   $union_ar[1] .   $union_ar[0]->_build_select() . " \n";
        }
        
        $sql .=  $this->_query['order_by']  . " \n";
        
        
        /* We are checking for method modifyLimitQuery as it is PEAR DB specific */
        if ((!isset($_DB_DATAOBJECT['CONFIG']['db_driver'])) || 
            ($_DB_DATAOBJECT['CONFIG']['db_driver'] == 'DB')) {
            /* PEAR DB specific */
        
            if (isset($this->_query['limit_start']) && strlen($this->_query['limit_start'] . $this->_query['limit_count'])) {
                $sql = $DB->modifyLimitQuery($sql,$this->_query['limit_start'], $this->_query['limit_count']);
            }
        } else {
            /* theoretically MDB2! */
            if (isset($this->_query['limit_start']) && strlen($this->_query['limit_start'] . $this->_query['limit_count'])) {
	            $DB->setLimit($this->_query['limit_count'],$this->_query['limit_start']);
	        }
        }
        
        
        $err = $this->_query($sql);
        if (is_a($err,'PEAR_Error')) {
            return false;
        }
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("CHECK autofetchd $n", "find", 1);
        }
        
        // find(true)
        
        $ret = $this->N;
        if (!$ret && !empty($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid])) {     
            // clear up memory if nothing found!?
            unset($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid]);
        }
        
        if ($n && $this->N > 0 ) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("ABOUT TO AUTOFETCH", "find", 1);
            }
            $fs = $this->fetch();
            // if fetch returns false (eg. failed), then the backend doesnt support numRows (eg. ret=true)
            // - hence find() also returns false..
            $ret = ($ret === true) ? $fs : $ret;
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("DONE", "find", 1);
        }
        $this->_query = $query_before;
        return $ret;
    }

    /**
     * fetches next row into this objects var's
     *
     * returns 1 on success 0 on failure
     *
     *
     *
     * Example
     * $object = new mytable();
     * $object->name = "fred";
     * $object->find();
     * $store = array();
     * while ($object->fetch()) {
     *   echo $this->ID;
     *   $store[] = $object; // builds an array of object lines.
     * }
     *
     * to add features to a fetch
     * function fetch () {
     *    $ret = parent::fetch();
     *    $this->date_formated = date('dmY',$this->date);
     *    return $ret;
     * }
     *
     * @access  public
     * @return  boolean on success
     */
    function fetch()
    {

        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        if (empty($this->N)) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("No data returned from FIND (eg. N is 0)","FETCH", 3);
            }
            return false;
        }
        
        if (empty($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid]) || 
            !is_object($result = $_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid])) 
        {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug('fetched on object after fetch completed (no results found)');
            }
            return false;
        }
        
        
        $array = $result->fetchRow(DB_DATAOBJECT_FETCHMODE_ASSOC);
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug(serialize($array),"FETCH");
        }
        
        // fetched after last row..
        if ($array === null) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $t= explode(' ',microtime());
            
                $this->debug("Last Data Fetch'ed after " . 
                        ($t[0]+$t[1]- $_DB_DATAOBJECT['QUERYENDTIME']  ) . 
                        " seconds",
                    "FETCH", 1);
            }
            // reduce the memory usage a bit... (but leave the id in, so count() works ok on it)
            unset($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid]);
            
            // we need to keep a copy of resultfields locally so toArray() still works
            // however we dont want to keep it in the global cache..
            
            if (!empty($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid])) {
                $this->_resultFields = $_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid];
                unset($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid]);
            }
            // this is probably end of data!!
            //DB_DataObject::raiseError("fetch: no data returned", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        // make sure resultFields is always empty..
        $this->_resultFields = false;
        
        if (!isset($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid])) {
            // note: we dont declare this to keep the print_r size down.
            $_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid]= array_flip(array_keys($array));
        }
        $replace = array('.', ' ');
        foreach($array as $k=>$v) {
            // use strpos as str_replace is slow.
            $kk =  (strpos($k, '.') === false && strpos($k, ' ') === false) ?
                $k : str_replace($replace, '_', $k);
                
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("$kk = ". $array[$k], "fetchrow LINE", 3);
            }
            $this->$kk = $array[$k];
        }
        
        // set link flag
        $this->_link_loaded=false;
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("{$this->tableName()} DONE", "fetchrow",2);
        }
        if (($this->_query !== false) &&  empty($_DB_DATAOBJECT['CONFIG']['keep_query_after_fetch'])) {
            $this->_query = false;
        }
        return true;
    }

    
     /**
     * fetches all results as an array,
     *
     * return format is dependant on args.
     * if selectAdd() has not been called on the object, then it will add the correct columns to the query.
     * 
     * A) Array of values (eg. a list of 'id')
     *
     * $x = DB_DataObject::factory('mytable');
     * $x->whereAdd('something = 1')
     * $ar = $x->fetchAll('id');
     * -- returns array(1,2,3,4,5)
     *
     * B) Array of values (not from table)
     *
     * $x = DB_DataObject::factory('mytable');
     * $x->whereAdd('something = 1');
     * $x->selectAdd();
     * $x->selectAdd('distinct(group_id) as group_id');
     * $ar = $x->fetchAll('group_id');
     * -- returns array(1,2,3,4,5)
     *     *
     * C) A key=>value associative array
     *
     * $x = DB_DataObject::factory('mytable');
     * $x->whereAdd('something = 1')
     * $ar = $x->fetchAll('id','name');
     * -- returns array(1=>'fred',2=>'blogs',3=> .......
     *
     * D) array of objects
     * $x = DB_DataObject::factory('mytable');
     * $x->whereAdd('something = 1');
     * $ar = $x->fetchAll();
     *
     * E) array of arrays (for example)
     * $x = DB_DataObject::factory('mytable');
     * $x->whereAdd('something = 1');
     * $ar = $x->fetchAll(false,false,'toArray');
     *
     *
     * @param    string|false  $k key
     * @param    string|false  $v value
     * @param    string|false  $method method to call on each result to get array value (eg. 'toArray')
     * @access  public
     * @return  array  format dependant on arguments, may be empty
     */
    function fetchAll($k= false, $v = false, $method = false)  
    {
        // should it even do this!!!?!?
        if ($k !== false && 
                (   // only do this is we have not been explicit..
                    empty($this->_query['data_select']) || 
                    ($this->_query['data_select'] == '*')
                )
            ) {
            $this->selectAdd();
            $this->selectAdd($k);
            if ($v !== false) {
                $this->selectAdd($v);
            }
        }
        
        $this->find();
        $ret = array();
        while ($this->fetch()) {
            if ($v !== false) {
                $ret[$this->$k] = $this->$v;
                continue;
            }
            $ret[] = $k === false ? 
                ($method == false ? clone($this)  : $this->$method())
                : $this->$k;
        }
        return $ret;
         
    }
    
    
    /**
     * Adds a condition to the WHERE statement, defaults to AND
     *
     * $object->whereAdd(); //reset or cleaer ewhwer
     * $object->whereAdd("ID > 20");
     * $object->whereAdd("age > 20","OR");
     *
     * @param    string  $cond  condition
     * @param    string  $logic optional logic "OR" (defaults to "AND")
     * @access   public
     * @return   string|PEAR::Error - previous condition or Error when invalid args found
     */
    function whereAdd($cond = false, $logic = 'AND')
    {
        // for PHP5.2.3 - there is a bug with setting array properties of an object.
        $_query = $this->_query;
         
        if (!isset($this->_query) || ($_query === false)) {
            return $this->raiseError(
                "You cannot do two queries on the same object (clone it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        
        if ($cond === false) {
            $r = $this->_query['condition'];
            $_query['condition'] = '';
            $this->_query = $_query;
            return preg_replace('/^\s+WHERE\s+/','',$r);
        }
        // check input...= 0 or '   ' == error!
        if (!trim($cond)) {
            return $this->raiseError("WhereAdd: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        $r = $_query['condition'];
        if ($_query['condition']) {
            $_query['condition'] .= " {$logic} ( {$cond} )";
            $this->_query = $_query;
            return $r;
        }
        $_query['condition'] = " WHERE ( {$cond} ) ";
        $this->_query = $_query;
        return $r;
    }

    /**
    * Adds a 'IN' condition to the WHERE statement
    *
    * $object->whereAddIn('id', $array, 'int'); //minimal usage
    * $object->whereAddIn('price', $array, 'float', 'OR');  // cast to float, and call whereAdd with 'OR'
    * $object->whereAddIn('name', $array, 'string');  // quote strings
    *
    * @param    string  $key  key column to match
    * @param    array  $list  list of values to match
    * @param    string  $type  string|int|integer|float|bool  cast to type. 
    * @param    string  $logic optional logic to call whereAdd with eg. "OR" (defaults to "AND")
    * @access   public
    * @return   string|PEAR::Error - previous condition or Error when invalid args found
    */
    function whereAddIn($key, $list, $type, $logic = 'AND') 
    {
        $not = '';
        if ($key[0] == '!') {
            $not = 'NOT ';
            $key = substr($key, 1);
        }
        // fix type for short entry. 
        $type = $type == 'int' ? 'integer' : $type; 

        if ($type == 'string') {
            $this->_connect();
        }

        $ar = array();
        foreach($list as $k) {
            settype($k, $type);
            $ar[] = $type == 'string' ? $this->_quote($k) : $k;
        }
      
        if (!$ar) {
            return $not ? $this->_query['condition'] : $this->whereAdd("1=0");
        }
        return $this->whereAdd("$key $not IN (". implode(',', $ar). ')', $logic );    
    }

    
    
    /**
     * Adds a order by condition
     *
     * $object->orderBy(); //clears order by
     * $object->orderBy("ID");
     * $object->orderBy("ID,age");
     *
     * @param  string $order  Order
     * @access public
     * @return none|PEAR::Error - invalid args only
     */
    function orderBy($order = false)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if ($order === false) {
            $this->_query['order_by'] = '';
            return;
        }
        // check input...= 0 or '    ' == error!
        if (!trim($order)) {
            return $this->raiseError("orderBy: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        
        if (!$this->_query['order_by']) {
            $this->_query['order_by'] = " ORDER BY {$order} ";
            return;
        }
        $this->_query['order_by'] .= " , {$order}";
    }

    /**
     * Adds a group by condition
     *
     * $object->groupBy(); //reset the grouping
     * $object->groupBy("ID DESC");
     * $object->groupBy("ID,age");
     *
     * @param  string  $group  Grouping
     * @access public
     * @return none|PEAR::Error - invalid args only
     */
    function groupBy($group = false)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if ($group === false) {
            $this->_query['group_by'] = '';
            return;
        }
        // check input...= 0 or '    ' == error!
        if (!trim($group)) {
            return $this->raiseError("groupBy: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        
        
        if (!$this->_query['group_by']) {
            $this->_query['group_by'] = " GROUP BY {$group} ";
            return;
        }
        $this->_query['group_by'] .= " , {$group}";
    }

    /**
     * Adds a having clause
     *
     * $object->having(); //reset the grouping
     * $object->having("sum(value) > 0 ");
     *
     * @param  string  $having  condition
     * @access public
     * @return none|PEAR::Error - invalid args only
     */
    function having($having = false)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if ($having === false) {
            $this->_query['having'] = '';
            return;
        }
        // check input...= 0 or '    ' == error!
        if (!trim($having)) {
            return $this->raiseError("Having: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        
        
        if (!$this->_query['having']) {
            $this->_query['having'] = " HAVING {$having} ";
            return;
        }
        $this->_query['having'] .= " AND {$having}";
    }

    /**
     * Adds a using Index
     *
     * $object->useIndex(); //reset the use Index 
     * $object->useIndex("some_index");
     *
     * Note do not put unfiltered user input into theis method.
     * This is mysql specific at present? - might need altering to support other databases.
     * 
     * @param  string|array  $index  index or indexes to use.
     * @access public
     * @return none|PEAR::Error - invalid args only
     */
    function useIndex($index = false)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if ($index=== false) {
            $this->_query['useindex'] = '';
            return;
        }
        // check input...= 0 or '    ' == error!
        if ((is_string($index) && !trim($index)) || (is_array($index) && !count($index)) ) {
            return $this->raiseError("Having: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        $index = is_array($index) ? implode(', ', $index) : $index;
        
        if (!$this->_query['useindex']) {
            $this->_query['useindex'] = " USE INDEX ({$index}) ";
            return;
        }
        $this->_query['useindex'] =  substr($this->_query['useindex'],0, -2) . ", {$index}) ";
    }
    /**
     * Sets the Limit
     *
     * $boject->limit(); // clear limit
     * $object->limit(12);
     * $object->limit(12,10);
     *
     * Note this will emit an error on databases other than mysql/postgress
     * as there is no 'clean way' to implement it. - you should consider refering to
     * your database manual to decide how you want to implement it.
     *
     * @param  string $a  limit start (or number), or blank to reset
     * @param  string $b  number
     * @access public
     * @return none|PEAR::Error - invalid args only
     */
    function limit($a = null, $b = null)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        
        if ($a === null) {
           $this->_query['limit_start'] = '';
           $this->_query['limit_count'] = '';
           return;
        }
        // check input...= 0 or '    ' == error!
        if ((!is_int($a) && ((string)((int)$a) !== (string)$a)) 
            || (($b !== null) && (!is_int($b) && ((string)((int)$b) !== (string)$b)))) {
            return $this->raiseError("limit: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        global $_DB_DATAOBJECT;
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
        
        $this->_query['limit_start'] = ($b == null) ? 0 : (int)$a;
        $this->_query['limit_count'] = ($b == null) ? (int)$a : (int)$b;
        
    }

    /**
     * Adds a select columns
     *
     * $object->selectAdd(); // resets select to nothing!
     * $object->selectAdd("*"); // default select
     * $object->selectAdd("unixtime(DATE) as udate");
     * $object->selectAdd("DATE");
     *
     * to prepend distict:
     * $object->selectAdd('distinct ' . $object->selectAdd());
     *
     * @param  string  $k
     * @access public
     * @return mixed null or old string if you reset it.
     */
    function selectAdd($k = null)
    {
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if ($k === null) {
            $old = $this->_query['data_select'];
            $this->_query['data_select'] = '';
            return $old;
        }
        
        // check input...= 0 or '    ' == error!
        if (!trim($k)) {
            return $this->raiseError("selectAdd: No Valid Arguments", DB_DATAOBJECT_ERROR_INVALIDARGS);
        }
        
        if ($this->_query['data_select']) {
            $this->_query['data_select'] .= ', ';
        }
        $this->_query['data_select'] .= " $k ";
    }
    /**
     * Adds multiple Columns or objects to select with formating.
     *
     * $object->selectAs(null); // adds "table.colnameA as colnameA,table.colnameB as colnameB,......"
     *                      // note with null it will also clear the '*' default select
     * $object->selectAs(array('a','b'),'%s_x'); // adds "a as a_x, b as b_x"
     * $object->selectAs(array('a','b'),'ddd_%s','ccc'); // adds "ccc.a as ddd_a, ccc.b as ddd_b"
     * $object->selectAdd($object,'prefix_%s'); // calls $object->get_table and adds it all as
     *                  objectTableName.colnameA as prefix_colnameA
     *
     * @param  array|object|null the array or object to take column names from.
     * @param  string           format in sprintf format (use %s for the colname)
     * @param  string           table name eg. if you have joinAdd'd or send $from as an array.
     * @access public
     * @return void
     */
    function selectAs($from = null,$format = '%s',$tableName=false)
    {
        global $_DB_DATAOBJECT;
        
        if ($this->_query === false) {
            $this->raiseError(
                "You cannot do two queries on the same object (copy it before finding)", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        
        if ($from === null) {
            // blank the '*' 
            $this->selectAdd();
            $from = $this;
        }
        
        
        $table = $this->tableName();
        if (is_object($from)) {
            $table = $from->tableName();
            $from = array_keys($from->table());
        }
        
        if ($tableName !== false) {
            $table = $tableName;
        }
        $s = '%s';
        if (!empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers'])) {
            $this->_connect();
            $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
            $s      = $DB->quoteIdentifier($s);
            $format = $DB->quoteIdentifier($format); 
        }
        foreach ($from as $k) {
            $this->selectAdd(sprintf("{$s}.{$s} as {$format}",$table,$k,$k));
        }
        $this->_query['data_select'] .= "\n";
    }
    /**
     * Insert the current objects variables into the database
     *
     * Returns the ID of the inserted element (if auto increment or sequences are used.)
     *
     * for example
     *
     * Designed to be extended
     *
     * $object = new mytable();
     * $object->name = "fred";
     * echo $object->insert();
     *
     * @access public
     * @return mixed false on failure, int when auto increment or sequence used, otherwise true on success
     */
    function insert()
    {
        global $_DB_DATAOBJECT;
        
        // we need to write to the connection (For nextid) - so us the real
        // one not, a copyied on (as ret-by-ref fails with overload!)
        
        if (!isset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $this->_connect();
        }
        
        $quoteIdentifiers  = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
         
        $items = $this->table();
            
        if (!$items) {
            $this->raiseError("insert:No table definition for {$this->tableName()}",
                DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return false;
        }
        $options = $_DB_DATAOBJECT['CONFIG'];


        $datasaved = 1;
        $leftq     = '';
        $rightq    = '';
     
        $seqKeys   = isset($_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()]) ?
                        $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] : 
                        $this->sequenceKey();
        
        $key       = isset($seqKeys[0]) ? $seqKeys[0] : false;
        $useNative = isset($seqKeys[1]) ? $seqKeys[1] : false;
        $seq       = isset($seqKeys[2]) ? $seqKeys[2] : false;
        
        $dbtype    = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn["phptype"];
        
         
        // nativeSequences or Sequences..     

        // big check for using sequences
        
        if (($key !== false) && !$useNative) { 
        
            if (!$seq) {
                $keyvalue =  $DB->nextId($this->tableName());
            } else {
                $f = $DB->getOption('seqname_format');
                $DB->setOption('seqname_format','%s');
                $keyvalue =  $DB->nextId($seq);
                $DB->setOption('seqname_format',$f);
            }
            if (PEAR::isError($keyvalue)) {
                $this->raiseError($keyvalue->toString(), DB_DATAOBJECT_ERROR_INVALIDCONFIG);
                return false;
            }
            $this->$key = $keyvalue;
        }
        
        // if we haven't set disable_null_strings to "full"
        $ignore_null = !isset($options['disable_null_strings'])
                    || !is_string($options['disable_null_strings'])
                    || strtolower($options['disable_null_strings']) !== 'full' ;
                    
             
        foreach($items as $k => $v) {
            
            // if we are using autoincrement - skip the column...
            if ($key && ($k == $key) && $useNative) {
                continue;
            }
        
             
            // Ignore INTEGERS which aren't set to a value - or empty string..
            if ( (!isset($this->$k) || ($v == 1 && $this->$k === ''))
                    && $ignore_null
            ) {
                continue;
            }
            // dont insert data into mysql timestamps 
            // use query() if you really want to do this!!!!
            if ($v & DB_DATAOBJECT_MYSQLTIMESTAMP) {
                continue;
            }
            
            if ($leftq) {
                $leftq  .= ', ';
                $rightq .= ', ';
            }
            
            $leftq .= ($quoteIdentifiers ? ($DB->quoteIdentifier($k) . ' ')  : "$k ");
            
            if (is_object($this->$k) && is_a($this->$k,'DB_DataObject_Cast')) {
                $value = $this->$k->toString($v,$DB);
                if (PEAR::isError($value)) {
                    $this->raiseError($value->toString() ,DB_DATAOBJECT_ERROR_INVALIDARGS);
                    return false;
                }
                $rightq .=  $value;
                continue;
            }
            
            
            if (!($v & DB_DATAOBJECT_NOTNULL) && DB_DataObject::_is_null($this,$k)) {
                $rightq .= " NULL ";
                continue;
            }
            // DATE is empty... on a col. that can be null.. 
            // note: this may be usefull for time as well..
            if (!$this->$k && 
                    (($v & DB_DATAOBJECT_DATE) || ($v & DB_DATAOBJECT_TIME)) && 
                    !($v & DB_DATAOBJECT_NOTNULL)) {
                    
                $rightq .= " NULL ";
                continue;
            }
              
            
            if ($v & DB_DATAOBJECT_STR) {
                $rightq .= $this->_quote((string) (
                        ($v & DB_DATAOBJECT_BOOL) ? 
                            // this is thanks to the braindead idea of postgres to 
                            // use t/f for boolean.
                            (($this->$k === 'f') ? 0 : (int)(bool) $this->$k) :  
                            $this->$k
                    )) . " ";
                continue;
            }
            if (is_numeric($this->$k)) {
                $rightq .=" {$this->$k} ";
                continue;
            }
            /* flag up string values - only at debug level... !!!??? */
            if (is_object($this->$k) || is_array($this->$k)) {
                $this->debug('ODD DATA: ' .$k . ' ' .  print_r($this->$k,true),'ERROR');
            }
            
            // at present we only cast to integers
            // - V2 may store additional data about float/int
            $rightq .= ' ' . intval($this->$k) . ' ';

        }
        
        // not sure why we let empty insert here.. - I guess to generate a blank row..
        
        
        if ($leftq || $useNative) {
            $table = ($quoteIdentifiers ? $DB->quoteIdentifier($this->tableName())    : $this->tableName());
            
            
            if (($dbtype == 'pgsql') && empty($leftq)) {
                $r = $this->_query("INSERT INTO {$table} DEFAULT VALUES");
            } else {
               $r = $this->_query("INSERT INTO {$table} ($leftq) VALUES ($rightq) ");
            }
            
 
            
            
            if (PEAR::isError($r)) {
                $this->raiseError($r);
                return false;
            }
            
            if ($r < 1) {
                return 0;
            }
            
            
            // now do we have an integer key!
            
            if ($key && $useNative) {
                switch ($dbtype) {
                    case 'mysql':
                    case 'mysqli':
                        $method = "{$dbtype}_insert_id";
                        $this->$key = $method(
                            $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->connection
                        );
                        break;
                    
                    case 'mssql':
                        // note this is not really thread safe - you should wrapp it with 
                        // transactions = eg.
                        // $db->query('BEGIN');
                        // $db->insert();
                        // $db->query('COMMIT');
                        $db_driver = empty($options['db_driver']) ? 'DB' : $options['db_driver'];
                        $method = ($db_driver  == 'DB') ? 'getOne' : 'queryOne';
                        $mssql_key = $DB->$method("SELECT @@IDENTITY");
                        if (PEAR::isError($mssql_key)) {
                            $this->raiseError($mssql_key);
                            return false;
                        }
                        $this->$key = $mssql_key;
                        break; 
                        
                    case 'pgsql':
                        if (!$seq) {
                            $seq = $DB->getSequenceName(strtolower($this->tableName()));
                        }
                        $db_driver = empty($options['db_driver']) ? 'DB' : $options['db_driver'];
                        $method = ($db_driver  == 'DB') ? 'getOne' : 'queryOne';
                        $pgsql_key = $DB->$method("SELECT currval('".$seq . "')"); 


                        if (PEAR::isError($pgsql_key)) {
                            $this->raiseError($pgsql_key);
                            return false;
                        }
                        $this->$key = $pgsql_key;
                        break;
                    
                    case 'ifx':
                        $this->$key = array_shift (
                            ifx_fetch_row (
                                ifx_query(
                                    "select DBINFO('sqlca.sqlerrd1') FROM systables where tabid=1",
                                    $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->connection,
                                    IFX_SCROLL
                                ), 
                                "FIRST"
                            )
                        ); 
                        break;
                    
                }
                        
            }

            if (isset($_DB_DATAOBJECT['CACHE'][strtolower(get_class($this))])) {
                $this->_clear_cache();
            }
            if ($key) {
                return $this->$key;
            }
            return true;
        }
        $this->raiseError("insert: No Data specifed for query", DB_DATAOBJECT_ERROR_NODATA);
        return false;
    }

    /**
     * Updates  current objects variables into the database
     * uses the keys() to decide how to update
     * Returns the  true on success
     *
     * for example
     *
     * $object = DB_DataObject::factory('mytable');
     * $object->get("ID",234);
     * $object->email="testing@test.com";
     * if(!$object->update())
     *   echo "UPDATE FAILED";
     *
     * to only update changed items :
     * $dataobject->get(132);
     * $original = $dataobject; // clone/copy it..
     * $dataobject->setFrom($_POST);
     * if ($dataobject->validate()) {
     *    $dataobject->update($original);
     * } // otherwise an error...
     *
     * performing global updates:
     * $object = DB_DataObject::factory('mytable');
     * $object->status = "dead";
     * $object->whereAdd('age > 150');
     * $object->update(DB_DATAOBJECT_WHEREADD_ONLY);
     *
     * @param object dataobject (optional) | DB_DATAOBJECT_WHEREADD_ONLY - used to only update changed items.
     * @access public
     * @return  int rows affected or false on failure
     */
    function update($dataObject = false)
    {
        global $_DB_DATAOBJECT;
        // connect will load the config!
        $this->_connect();
        
        
        $original_query =  $this->_query;
        
        $items = $this->table();
        
        // only apply update against sequence key if it is set?????
        
        $seq    = $this->sequenceKey();
        if ($seq[0] !== false) {
            $keys = array($seq[0]);
            if (!isset($this->{$keys[0]}) && $dataObject !== true) {
                $this->raiseError("update: trying to perform an update without 
                        the key set, and argument to update is not 
                        DB_DATAOBJECT_WHEREADD_ONLY
                    ". print_r(array('seq' => $seq , 'keys'=>$keys), true), DB_DATAOBJECT_ERROR_INVALIDARGS);
                return false;  
            }
        } else {
            $keys = $this->keys();
        }
        
         
        if (!$items) {
            $this->raiseError("update:No table definition for {$this->tableName()}", DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return false;
        }
        $datasaved = 1;
        $settings  = '';
        $this->_connect();
        
        $DB            = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
        $dbtype        = $DB->dsn["phptype"];
        $quoteIdentifiers = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        $options = $_DB_DATAOBJECT['CONFIG'];
        
        
        $ignore_null = !isset($options['disable_null_strings'])
                    || !is_string($options['disable_null_strings'])
                    || strtolower($options['disable_null_strings']) !== 'full' ;
                    
      
        foreach($items as $k => $v) {
            
            // I think this is ignoring empty vlalues
            if ((!isset($this->$k) || ($v == 1 && $this->$k === ''))
                    && $ignore_null
            ) {
                 continue;
            }
            // ignore stuff thats 
          
            // dont write things that havent changed..
            if (($dataObject !== false) && isset($dataObject->$k) && ($dataObject->$k === $this->$k)) {
                continue;
            }
            
            // - dont write keys to left.!!!
            if (in_array($k,$keys)) {
                continue;
            }
            
             // dont insert data into mysql timestamps 
            // use query() if you really want to do this!!!!
            if ($v & DB_DATAOBJECT_MYSQLTIMESTAMP) {
                continue;
            }
            
            
            if ($settings)  {
                $settings .= ', ';
            }
            
            $kSql = ($quoteIdentifiers ? $DB->quoteIdentifier($k) : $k);
            
            if (is_object($this->$k) && is_a($this->$k,'DB_DataObject_Cast')) {
                $value = $this->$k->toString($v,$DB);
                if (PEAR::isError($value)) {
                    $this->raiseError($value->getMessage() ,DB_DATAOBJECT_ERROR_INVALIDARG);
                    return false;
                }
                $settings .= "$kSql = $value ";
                continue;
            }
            
            // special values ... at least null is handled...
            if (!($v & DB_DATAOBJECT_NOTNULL) && DB_DataObject::_is_null($this,$k)) {
                $settings .= "$kSql = NULL ";
                continue;
            }
            // DATE is empty... on a col. that can be null.. 
            // note: this may be usefull for time as well..
            if (!$this->$k && 
                    (($v & DB_DATAOBJECT_DATE) || ($v & DB_DATAOBJECT_TIME)) && 
                    !($v & DB_DATAOBJECT_NOTNULL)) {
                    
                $settings .= "$kSql = NULL ";
                continue;
            }
            

            if ($v & DB_DATAOBJECT_STR) {
                $settings .= "$kSql = ". $this->_quote((string) (
                        ($v & DB_DATAOBJECT_BOOL) ? 
                            // this is thanks to the braindead idea of postgres to 
                            // use t/f for boolean.
                            (($this->$k === 'f') ? 0 : (int)(bool) $this->$k) :  
                            $this->$k
                    )) . ' ';
                continue;
            }
            if (is_numeric($this->$k)) {
                $settings .= "$kSql = {$this->$k} ";
                continue;
            }
            // at present we only cast to integers
            // - V2 may store additional data about float/int
            $settings .= "$kSql = " . intval($this->$k) . ' ';
        }
         
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("got keys as ".serialize($keys),3);
        }
        if ($dataObject !== true) {
            $this->_build_condition($items,$keys);
        } else {
            // prevent wiping out of data!
            if (empty($this->_query['condition'])) {
                 $this->raiseError("update: global table update not available
                        do \$do->whereAdd('1=1'); if you really want to do that.
                    ", DB_DATAOBJECT_ERROR_INVALIDARGS);
                return false;
            }
        }
        
        
        
        //  echo " $settings, $this->condition ";
        if ($settings && isset($this->_query) && $this->_query['condition']) {
            
            $table = ($quoteIdentifiers ? $DB->quoteIdentifier($this->tableName()) : $this->tableName());
        
            $r = $this->_query("UPDATE  {$table}  SET {$settings} {$this->_query['condition']} ");
            
            // restore original query conditions.
            $this->_query = $original_query;
            
            if (PEAR::isError($r)) {
                $this->raiseError($r);
                return false;
            }
            if ($r < 1) {
                return 0;
            }

            $this->_clear_cache();
            return $r;
        }
        // restore original query conditions.
        $this->_query = $original_query;
        
        // if you manually specified a dataobject, and there where no changes - then it's ok..
        if ($dataObject !== false) {
            return true;
        }
        
        $this->raiseError(
            "update: No Data specifed for query $settings , {$this->_query['condition']}", 
            DB_DATAOBJECT_ERROR_NODATA);
        return false;
    }

    /**
     * Deletes items from table which match current objects variables
     *
     * Returns the true on success
     *
     * for example
     *
     * Designed to be extended
     *
     * $object = new mytable();
     * $object->ID=123;
     * echo $object->delete(); // builds a conditon
     *
     * $object = new mytable();
     * $object->whereAdd('age > 12');
     * $object->limit(1);
     * $object->orderBy('age DESC');
     * $object->delete(true); // dont use object vars, use the conditions, limit and order.
     *
     * @param bool $useWhere (optional) If DB_DATAOBJECT_WHEREADD_ONLY is passed in then
     *             we will build the condition only using the whereAdd's.  Default is to
     *             build the condition only using the object parameters.
     *
     * @access public
     * @return mixed Int (No. of rows affected) on success, false on failure, 0 on no data affected
     */
    function delete($useWhere = false)
    {
        global $_DB_DATAOBJECT;
        // connect will load the config!
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
        $quoteIdentifiers  = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        
        $extra_cond = ' ' . (isset($this->_query['order_by']) ? $this->_query['order_by'] : ''); 
        
        if (!$useWhere) {

            $keys = $this->keys();
            $this->_query = array(); // as it's probably unset!
            $this->_query['condition'] = ''; // default behaviour not to use where condition
            $this->_build_condition($this->table(),$keys);
            // if primary keys are not set then use data from rest of object.
            if (!$this->_query['condition']) {
                $this->_build_condition($this->table(),array(),$keys);
            }
            $extra_cond = '';
        } 
            

        // don't delete without a condition
        if (($this->_query !== false) && $this->_query['condition']) {
        
            $table = ($quoteIdentifiers ? $DB->quoteIdentifier($this->tableName()) : $this->tableName());
            $sql = "DELETE ";
            // using a joined delete. - with useWhere..
            $sql .= (!empty($this->_join) && $useWhere) ? 
                "{$table} FROM {$table} {$this->_join} " : 
                "FROM {$table} ";
                
            $sql .= $this->_query['condition']. $extra_cond;
            
            // add limit..
            
            if (isset($this->_query['limit_start']) && strlen($this->_query['limit_start'] . $this->_query['limit_count'])) {
                
                if (!isset($_DB_DATAOBJECT['CONFIG']['db_driver']) ||  
                    ($_DB_DATAOBJECT['CONFIG']['db_driver'] == 'DB')) {
                    // pear DB 
                    $sql = $DB->modifyLimitQuery($sql,$this->_query['limit_start'], $this->_query['limit_count']);
                    
                } else {
                    // MDB2
                    $DB->setLimit( $this->_query['limit_count'],$this->_query['limit_start']);
                }
                    
            }
            
            
            $r = $this->_query($sql);
            
            
            if (PEAR::isError($r)) {
                $this->raiseError($r);
                return false;
            }
            if ($r < 1) {
                return 0;
            }
            $this->_clear_cache();
            return $r;
        } else {
            $this->raiseError("delete: No condition specifed for query", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
    }

    /**
     * fetches a specific row into this object variables
     *
     * Not recommended - better to use fetch()
     *
     * Returens true on success
     *
     * @param  int   $row  row
     * @access public
     * @return boolean true on success
     */
    function fetchRow($row = null)
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            $this->_loadConfig();
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("{$this->tableName()} $row of {$this->N}", "fetchrow",3);
        }
        if (!$this->tableName()) {
            $this->raiseError("fetchrow: No table", DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return false;
        }
        if ($row === null) {
            $this->raiseError("fetchrow: No row specified", DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        if (!$this->N) {
            $this->raiseError("fetchrow: No results avaiable", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("{$this->tableName()} $row of {$this->N}", "fetchrow",3);
        }


        $result = $_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid];
        $array  = $result->fetchrow(DB_DATAOBJECT_FETCHMODE_ASSOC,$row);
        if (!is_array($array)) {
            $this->raiseError("fetchrow: No results available", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        $replace = array('.', ' ');
        foreach($array as $k => $v) {
            // use strpos as str_replace is slow.
            $kk =  (strpos($k, '.') === false && strpos($k, ' ') === false) ?
                $k : str_replace($replace, '_', $k);
            
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("$kk = ". $array[$k], "fetchrow LINE", 3);
            }
            $this->$kk = $array[$k];
        }

        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("{$this->tableName()} DONE", "fetchrow", 3);
        }
        return true;
    }

    /**
     * Find the number of results from a simple query
     *
     * for example
     *
     * $object = new mytable();
     * $object->name = "fred";
     * echo $object->count();
     * echo $object->count(true);  // dont use object vars.
     * echo $object->count('distinct mycol');   count distinct mycol.
     * echo $object->count('distinct mycol',true); // dont use object vars.
     * echo $object->count('distinct');      // count distinct id (eg. the primary key)
     *
     *
     * @param bool|string  (optional)
     *                  (true|false => see below not on whereAddonly)
     *                  (string)
     *                      "DISTINCT" => does a distinct count on the tables 'key' column
     *                      otherwise  => normally it counts primary keys - you can use 
     *                                    this to do things like $do->count('distinct mycol');
     *                  
     * @param bool      $whereAddOnly (optional) If DB_DATAOBJECT_WHEREADD_ONLY is passed in then
     *                  we will build the condition only using the whereAdd's.  Default is to
     *                  build the condition using the object parameters as well.
     *                  
     * @access public
     * @return int
     */
    function count($countWhat = false,$whereAddOnly = false)
    {
        global $_DB_DATAOBJECT;
        
        if (is_bool($countWhat)) {
            $whereAddOnly = $countWhat;
        }
        
        $t = clone($this);
        $items   = $t->table();
        
        $quoteIdentifiers = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        
        
        if (!isset($t->_query)) {
            $this->raiseError(
                "You cannot do run count after you have run fetch()", 
                DB_DATAOBJECT_ERROR_INVALIDARGS);
            return false;
        }
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
       

        if (!$whereAddOnly && $items)  {
            $t->_build_condition($items);
        }
        $keys = $this->keys();

        if (empty($keys[0]) && (!is_string($countWhat) || (strtoupper($countWhat) == 'DISTINCT'))) {
            $this->raiseError(
                "You cannot do run count without keys - use \$do->count('id'), or use \$do->count('distinct id')';", 
                DB_DATAOBJECT_ERROR_INVALIDARGS,PEAR_ERROR_DIE);
            return false;
            
        }
        $table   = ($quoteIdentifiers ? $DB->quoteIdentifier($this->tableName()) : $this->tableName());
        $key_col = empty($keys[0]) ? '' : (($quoteIdentifiers ? $DB->quoteIdentifier($keys[0]) : $keys[0]));
        $as      = ($quoteIdentifiers ? $DB->quoteIdentifier('DATAOBJECT_NUM') : 'DATAOBJECT_NUM');
        
        // support distinct on default keys.
        $countWhat = (strtoupper($countWhat) == 'DISTINCT') ? 
            "DISTINCT {$table}.{$key_col}" : $countWhat;
        
        $countWhat = is_string($countWhat) ? $countWhat : "{$table}.{$key_col}";
        
        $r = $t->_query(
            "SELECT count({$countWhat}) as $as
                FROM $table {$t->_join} {$t->_query['condition']}");
        if (PEAR::isError($r)) {
            return false;
        }
         
        $result  = $_DB_DATAOBJECT['RESULTS'][$t->_DB_resultid];
        $l = $result->fetchRow(DB_DATAOBJECT_FETCHMODE_ORDERED);
        // free the results - essential on oracle.
        $t->free();
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug('Count returned '. $l[0] ,1);
        }
        return (int) $l[0];
    }

    /**
     * sends raw query to database
     *
     * Since _query has to be a private 'non overwriteable method', this is a relay
     *
     * @param  string  $string  SQL Query
     * @access public
     * @return void or DB_Error
     */
    function query($string)
    {
        return $this->_query($string);
    }


    /**
     * an escape wrapper around DB->escapeSimple()
     * can be used when adding manual queries or clauses
     * eg.
     * $object->query("select * from xyz where abc like '". $object->escape($_GET['name']) . "'");
     *
     * @param  string  $string  value to be escaped 
     * @param  bool $likeEscape  escapes % and _ as well. - so like queries can be protected.
     * @access public
     * @return string
     */
    function escape($string, $likeEscape=false)
    {
        global $_DB_DATAOBJECT;
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
        // mdb2 uses escape...
        $dd = empty($_DB_DATAOBJECT['CONFIG']['db_driver']) ? 'DB' : $_DB_DATAOBJECT['CONFIG']['db_driver'];
        $ret = ($dd == 'DB') ? $DB->escapeSimple($string) : $DB->escape($string);
        if ($likeEscape) {
            $ret = str_replace(array('_','%'), array('\_','\%'), $ret);
        }
        return $ret;
        
    }

    /* ==================================================== */
    /*        Major Private Vars                            */
    /* ==================================================== */

    /**
     * The Database connection dsn (as described in the PEAR DB)
     * only used really if you are writing a very simple application/test..
     * try not to use this - it is better stored in configuration files..
     *
     * @access  private
     * @var     string
     */
    var $_database_dsn = '';

    /**
     * The Database connection id (md5 sum of databasedsn)
     *
     * @access  private
     * @var     string
     */
    var $_database_dsn_md5 = '';

    /**
     * The Database name
     * created in __connection
     *
     * @access  private
     * @var  string
     */
    var $_database = '';

    
    
    /**
     * The QUERY rules
     * This replaces alot of the private variables 
     * used to build a query, it is unset after find() is run.
     * 
     *
     *
     * @access  private
     * @var     array
     */
    var $_query = array(
        'condition'   => '', // the WHERE condition
        'group_by'    => '', // the GROUP BY condition
        'order_by'    => '', // the ORDER BY condition
        'having'      => '', // the HAVING condition
        'useindex'   => '', // the USE INDEX condition
        'limit_start' => '', // the LIMIT condition
        'limit_count' => '', // the LIMIT condition
        'data_select' => '*', // the columns to be SELECTed
        'unions'      => array(), // the added unions,
        'derive_table' => '', // derived table name (BETA)
        'derive_select' => '', // derived table select (BETA)
    );
        
    
  

    /**
     * Database result id (references global $_DB_DataObject[results]
     *
     * @access  private
     * @var     integer
     */
    var $_DB_resultid;
     
     /**
     * ResultFields - on the last call to fetch(), resultfields is sent here,
     * so we can clean up the memory.
     *
     * @access  public
     * @var     array
     */
    var $_resultFields = false; 


    /* ============================================================== */
    /*  Table definition layer (started of very private but 'came out'*/
    /* ============================================================== */

    /**
     * Autoload or manually load the table definitions
     *
     *
     * usage :
     * DB_DataObject::databaseStructure(  'databasename',
     *                                    parse_ini_file('mydb.ini',true), 
     *                                    parse_ini_file('mydb.link.ini',true)); 
     *
     * obviously you dont have to use ini files.. (just return array similar to ini files..)
     *  
     * It should append to the table structure array 
     *
     *     
     * @param optional string  name of database to assign / read
     * @param optional array   structure of database, and keys
     * @param optional array  table links
     *
     * @access public
     * @return true or PEAR:error on wrong paramenters.. or false if no file exists..
     *              or the array(tablename => array(column_name=>type)) if called with 1 argument.. (databasename)
     */
    function databaseStructure()
    {

        global $_DB_DATAOBJECT;
        
        // Assignment code 
        
        if ($args = func_get_args()) {
        
            if (count($args) == 1) {
                
                // this returns all the tables and their structure..
                if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                    $this->debug("Loading Generator as databaseStructure called with args",1);
                }
                
                $x = new DB_DataObject;
                $x->_database = $args[0];
                $this->_connect();
                $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
       
                $tables = $DB->getListOf('tables');
                class_exists('DB_DataObject_Generator') ? '' : 
                    require_once 'DB/DataObject/Generator.php';
                    
                foreach($tables as $table) {
                    $y = new DB_DataObject_Generator;
                    $y->fillTableSchema($x->_database,$table);
                }
                return $_DB_DATAOBJECT['INI'][$x->_database];            
            } else {
        
                $_DB_DATAOBJECT['INI'][$args[0]] = isset($_DB_DATAOBJECT['INI'][$args[0]]) ?
                    $_DB_DATAOBJECT['INI'][$args[0]] + $args[1] : $args[1];
                
                if (isset($args[1])) {
                    $_DB_DATAOBJECT['LINKS'][$args[0]] = isset($_DB_DATAOBJECT['LINKS'][$args[0]]) ?
                        $_DB_DATAOBJECT['LINKS'][$args[0]] + $args[2] : $args[2];
                }
                return true;
            }
          
        }
        
        
        
        if (!$this->_database) {
            $this->_connect();
        }
        
        
        // if this table is already loaded this table..
        if (!empty($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()])) {
            return true;
        }
        
        // initialize the ini data.. if empt..
        if (empty($_DB_DATAOBJECT['INI'][$this->_database])) {
            $_DB_DATAOBJECT['INI'][$this->_database] = array();
        }
         
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        
        // we do not have the data for this table yet...
        
        // if we are configured to use the proxy..
        
        if ( !empty($_DB_DATAOBJECT['CONFIG']['proxy']) ) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("Loading Generator to fetch Schema",1);
            }
            class_exists('DB_DataObject_Generator') ? '' : 
                require_once 'DB/DataObject/Generator.php';
                
            
            $x = new DB_DataObject_Generator;
            $x->fillTableSchema($this->_database,$this->tableName());
            return true;
        }
            
             
       
        
        // if you supply this with arguments, then it will take those
        // as the database and links array...
         
        $schemas = isset($_DB_DATAOBJECT['CONFIG']['schema_location']) ?
            array("{$_DB_DATAOBJECT['CONFIG']['schema_location']}/{$this->_database}.ini") :
            array() ;
                 
        if (isset($_DB_DATAOBJECT['CONFIG']["ini_{$this->_database}"])) {
            $schemas = is_array($_DB_DATAOBJECT['CONFIG']["ini_{$this->_database}"]) ?
                $_DB_DATAOBJECT['CONFIG']["ini_{$this->_database}"] :
                explode(PATH_SEPARATOR,$_DB_DATAOBJECT['CONFIG']["ini_{$this->_database}"]);
        }
                    
         
        $_DB_DATAOBJECT['INI'][$this->_database] = array();
        foreach ($schemas as $ini) {
             if (file_exists($ini) && is_file($ini)) {
                
                $_DB_DATAOBJECT['INI'][$this->_database] = array_merge(
                    $_DB_DATAOBJECT['INI'][$this->_database],
                    parse_ini_file($ini, true)
                );
                    
                if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) { 
                    if (!is_readable ($ini)) {
                        $this->debug("ini file is not readable: $ini","databaseStructure",1);
                    } else {
                        $this->debug("Loaded ini file: $ini","databaseStructure",1);
                    }
                }
            } else {
                if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                    $this->debug("Missing ini file: $ini","databaseStructure",1);
                }
            }
             
        }
        // are table name lowecased..
        if (!empty($_DB_DATAOBJECT['CONFIG']['portability']) && $_DB_DATAOBJECT['CONFIG']['portability'] & 1) {
            foreach($_DB_DATAOBJECT['INI'][$this->_database] as $k=>$v) {
                // results in duplicate cols.. but not a big issue..
                $_DB_DATAOBJECT['INI'][$this->_database][strtolower($k)] = $v;
            }
        }
        
        
        // now have we loaded the structure.. 
        
        if (!empty($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()])) {
            return true;
        }
        // - if not try building it..
        if (!empty($_DB_DATAOBJECT['CONFIG']['proxy'])) {
            class_exists('DB_DataObject_Generator') ? '' : 
                require_once 'DB/DataObject/Generator.php';
                
            $x = new DB_DataObject_Generator;
            $x->fillTableSchema($this->_database,$this->tableName());
            // should this fail!!!???
            return true;
        }
        $this->debug("Cant find database schema: {$this->_database}/{$this->tableName()} \n".
                    "in links file data: " . print_r($_DB_DATAOBJECT['INI'],true),"databaseStructure",5);
        // we have to die here!! - it causes chaos if we dont (including looping forever!)
        $this->raiseError( "Unable to load schema for database and table (turn debugging up to 5 for full error message)", DB_DATAOBJECT_ERROR_INVALIDARGS, PEAR_ERROR_DIE);
        return false;
        
         
    }




    /**
     * Return or assign the name of the current table
     *
     *
     * @param   string optinal table name to set
     * @access public
     * @return string The name of the current table
     */
    function tableName()
    {
        global $_DB_DATAOBJECT;
        $args = func_get_args();
        if (count($args)) {
            $this->__table = $args[0];
        }
        if (empty($this->__table)) {
            return '';
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['portability']) && $_DB_DATAOBJECT['CONFIG']['portability'] & 1) {
            return strtolower($this->__table);
        }
        return $this->__table;
    }
    
    /**
     * Return or assign the name of the current database
     *
     * @param   string optional database name to set
     * @access public
     * @return string The name of the current database
     */
    function database()
    {
        $args = func_get_args();
        if (count($args)) {
            $this->_database = $args[0];
        } else {
            $this->_connect();
        }
        
        return $this->_database;
    }
  
    /**
     * get/set an associative array of table columns
     *
     * @access public
     * @param  array key=>type array
     * @return array (associative)
     */
    function table()
    {
        
        // for temporary storage of database fields..
        // note this is not declared as we dont want to bloat the print_r output
        $args = func_get_args();
        if (count($args)) {
            $this->_database_fields = $args[0];
        }
        if (isset($this->_database_fields)) {
            return $this->_database_fields;
        }
        
        
        global $_DB_DATAOBJECT;
        if (!isset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $this->_connect();
        }
          
        if (isset($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()])) {
            return $_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()];
        }
        
        $this->databaseStructure();
 
        
        $ret = array();
        if (isset($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()])) {
            $ret =  $_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()];
        }
        
        return $ret;
    }

    /**
     * get/set an  array of table primary keys
     *
     * set usage: $do->keys('id','code');
     *
     * This is defined in the table definition if it gets it wrong,
     * or you do not want to use ini tables, you can override this.
     * @param  string optional set the key
     * @param  *   optional  set more keys
     * @access public
     * @return array
     */
    function keys()
    {
        // for temporary storage of database fields..
        // note this is not declared as we dont want to bloat the print_r output
        $args = func_get_args();
        if (count($args)) {
            $this->_database_keys = $args;
        }
        if (isset($this->_database_keys)) {
            return $this->_database_keys;
        }
        
        global $_DB_DATAOBJECT;
        if (!isset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $this->_connect();
        }
        if (isset($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()."__keys"])) {
            return array_keys($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()."__keys"]);
        }
        $this->databaseStructure();
        
        if (isset($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()."__keys"])) {
            return array_keys($_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()."__keys"]);
        }
        return array();
    }
    /**
     * get/set an  sequence key
     *
     * by default it returns the first key from keys()
     * set usage: $do->sequenceKey('id',true);
     *
     * override this to return array(false,false) if table has no real sequence key.
     *
     * @param  string  optional the key sequence/autoinc. key
     * @param  boolean optional use native increment. default false 
     * @param  false|string optional native sequence name
     * @access public
     * @return array (column,use_native,sequence_name)
     */
    function sequenceKey()
    {
        global $_DB_DATAOBJECT;
          
        // call setting
        if (!$this->_database) {
            $this->_connect();
        }
        
        if (!isset($_DB_DATAOBJECT['SEQUENCE'][$this->_database])) {
            $_DB_DATAOBJECT['SEQUENCE'][$this->_database] = array();
        }

        
        $args = func_get_args();
        if (count($args)) {
            $args[1] = isset($args[1]) ? $args[1] : false;
            $args[2] = isset($args[2]) ? $args[2] : false;
            $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = $args;
        }
        if (isset($_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()])) {
            return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()];
        }
        // end call setting (eg. $do->sequenceKeys(a,b,c); )
        
       
        
        
        $keys = $this->keys();
        if (!$keys) {
            return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] 
                = array(false,false,false);
        }
 

        $table =  $this->table();
       
        $dbtype    = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['phptype'];
        
        $usekey = $keys[0];
        
        
        
        $seqname = false;
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['sequence_'.$this->tableName()])) {
            $seqname = $_DB_DATAOBJECT['CONFIG']['sequence_'.$this->tableName()];
            if (strpos($seqname,':') !== false) {
                list($usekey,$seqname) = explode(':',$seqname);
            }
        }  
        
        
        // if the key is not an integer - then it's not a sequence or native
        if (empty($table[$usekey]) || !($table[$usekey] & DB_DATAOBJECT_INT)) {
                return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array(false,false,false);
        }
        
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['ignore_sequence_keys'])) {
            $ignore =  $_DB_DATAOBJECT['CONFIG']['ignore_sequence_keys'];
            if (is_string($ignore) && (strtoupper($ignore) == 'ALL')) {
                return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array(false,false,$seqname);
            }
            if (is_string($ignore)) {
                $ignore = $_DB_DATAOBJECT['CONFIG']['ignore_sequence_keys'] = explode(',',$ignore);
            }
            if (in_array($this->tableName(),$ignore)) {
                return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array(false,false,$seqname);
            }
        }
        
        
        $realkeys = $_DB_DATAOBJECT['INI'][$this->_database][$this->tableName()."__keys"];
        
        // if you are using an old ini file - go back to old behaviour...
        if (is_numeric($realkeys[$usekey])) {
            $realkeys[$usekey] = 'N';
        }
        
        // multiple unique primary keys without a native sequence...
        if (($realkeys[$usekey] == 'K') && (count($keys) > 1)) {
            return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array(false,false,$seqname);
        }
        // use native sequence keys...
        // technically postgres native here...
        // we need to get the new improved tabledata sorted out first.
        
        // support named sequence keys.. - currently postgres only..
        
        if (    in_array($dbtype , array('pgsql')) &&
                ($table[$usekey] & DB_DATAOBJECT_INT) && 
                isset($realkeys[$usekey]) && strlen($realkeys[$usekey]) > 1) {
            return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array($usekey,true, $realkeys[$usekey]);
        }
        
        if (    in_array($dbtype , array('pgsql', 'mysql', 'mysqli', 'mssql', 'ifx')) && 
                ($table[$usekey] & DB_DATAOBJECT_INT) && 
                isset($realkeys[$usekey]) && ($realkeys[$usekey] == 'N')
                ) {
            return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array($usekey,true,$seqname);
        }
        
        
        // if not a native autoinc, and we have not assumed all primary keys are sequence
        if (($realkeys[$usekey] != 'N') && 
            !empty($_DB_DATAOBJECT['CONFIG']['dont_use_pear_sequences'])) {
            return array(false,false,false);
        }
        
        
        
        // I assume it's going to try and be a nextval DB sequence.. (not native)
        return $_DB_DATAOBJECT['SEQUENCE'][$this->_database][$this->tableName()] = array($usekey,false,$seqname);
    }
    
    
    
    /* =========================================================== */
    /*  Major Private Methods - the core part!              */
    /* =========================================================== */

 
    
    /**
     * clear the cache values for this class  - normally done on insert/update etc.
     *
     * @access private
     * @return void
     */
    function _clear_cache()
    {
        global $_DB_DATAOBJECT;
        
        $class = strtolower(get_class($this));
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("Clearing Cache for ".$class,1);
        }
        
        if (!empty($_DB_DATAOBJECT['CACHE'][$class])) {
            unset($_DB_DATAOBJECT['CACHE'][$class]);
        }
    }

    
    /**
     * backend wrapper for quoting, as MDB2 and DB do it differently...
     *
     * @access private
     * @return string quoted
     */
    
    function _quote($str) 
    {
        global $_DB_DATAOBJECT;
        return (empty($_DB_DATAOBJECT['CONFIG']['db_driver']) || 
                ($_DB_DATAOBJECT['CONFIG']['db_driver'] == 'DB'))
            ? $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->quoteSmart($str)
            : $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->quote($str);
    }
    
    
    /**
     * connects to the database
     *
     *
     * TODO: tidy this up - This has grown to support a number of connection options like
     *  a) dynamic changing of ini file to change which database to connect to
     *  b) multi data via the table_{$table} = dsn ini option
     *  c) session based storage.
     *
     * @access private
     * @return true | PEAR::error
     */
    function _connect()
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            $this->_loadConfig();
        }
        // Set database driver for reference 
        $db_driver = empty($_DB_DATAOBJECT['CONFIG']['db_driver']) ? 
                'DB' : $_DB_DATAOBJECT['CONFIG']['db_driver'];
        
        // is it already connected ?    
        if ($this->_database_dsn_md5 && !empty($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            
            // connection is an error...
            if (PEAR::isError($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
                return $this->raiseError(
                        $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->message,
                        $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->code, PEAR_ERROR_DIE
                );
                 
            }

            if (empty($this->_database)) {
                $this->_database = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['database'];
                $hasGetDatabase = method_exists($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5], 'getDatabase');
                
                $this->_database = ($db_driver != 'DB' && $hasGetDatabase)  
                        ? $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->getDatabase() 
                        : $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['database'];

                
                
                if (($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['phptype'] == 'sqlite') 
                    && is_file($this->_database))  {
                    $this->_database = basename($this->_database);
                }
                if ($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['phptype'] == 'ibase')  {
                    $this->_database = substr(basename($this->_database), 0, -4);
                }
                
            }
            // theoretically we have a md5, it's listed in connections and it's not an error.
            // so everything is ok!
            return true;
            
        }

        // it's not currently connected!
        // try and work out what to use for the dsn !

        $options= $_DB_DATAOBJECT['CONFIG'];
        // if the databse dsn dis defined in the object..
        $dsn = isset($this->_database_dsn) ? $this->_database_dsn : null;
        
        if (!$dsn) {
            if (!$this->_database && !strlen($this->tableName())) {
                $this->_database = isset($options["table_{$this->tableName()}"]) ? $options["table_{$this->tableName()}"] : null;
            }
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("Checking for database specific ini ('{$this->_database}') : database_{$this->_database} in options","CONNECT");
            }
            
            if ($this->_database && !empty($options["database_{$this->_database}"]))  {
                $dsn = $options["database_{$this->_database}"];
            } else if (!empty($options['database'])) {
                $dsn = $options['database'];
                  
            }
        }
        
        // if still no database...
        if (!$dsn) {
            return $this->raiseError(
                "No database name / dsn found anywhere",
                DB_DATAOBJECT_ERROR_INVALIDCONFIG, PEAR_ERROR_DIE
            );
                 
        }
        
        
        if (is_string($dsn)) {
            $this->_database_dsn_md5 = md5($dsn);
        } else {
            /// support array based dsn's
            $this->_database_dsn_md5 = md5(serialize($dsn));
        }

        if (!empty($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
                $this->debug("USING CACHED CONNECTION", "CONNECT",3);
            }
            
            
            
            if (!$this->_database) {

                $hasGetDatabase = method_exists($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5], 'getDatabase');
                $this->_database = ($db_driver != 'DB' && $hasGetDatabase)  
                        ? $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->getDatabase() 
                        : $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['database'];
                
                if (($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['phptype'] == 'sqlite') 
                    && is_file($this->_database)) 
                {
                    $this->_database = basename($this->_database);
                }
            }
            return true;
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug("NEW CONNECTION TP DATABASE :" .$this->_database , "CONNECT",3);
            /* actualy make a connection */
            $this->debug(print_r($dsn,true) ." {$this->_database_dsn_md5}", "CONNECT",3);
        }
        
        // Note this is verbose deliberatly! 
        
        if ($db_driver == 'DB') {
            
            /* PEAR DB connect */
            
            // this allows the setings of compatibility on DB 
            $db_options = PEAR::getStaticProperty('DB','options');
            require_once 'DB.php';
            if ($db_options) {
                $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5] = DB::connect($dsn,$db_options);
            } else {
                $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5] = DB::connect($dsn);
            }
             
        } else {
            /* assumption is MDB2 */
            require_once 'MDB2.php';
            // this allows the setings of compatibility on MDB2 
            $db_options = PEAR::getStaticProperty('MDB2','options');
            $db_options = is_array($db_options) ? $db_options : array();
            $db_options['portability'] = isset($db_options['portability'] )
                ? $db_options['portability']  : MDB2_PORTABILITY_ALL ^ MDB2_PORTABILITY_FIX_CASE;
            $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5] = MDB2::connect($dsn,$db_options);
            
        }
        
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug(print_r($_DB_DATAOBJECT['CONNECTIONS'],true), "CONNECT",5);
        }
        if (PEAR::isError($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $this->debug($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->toString(), "CONNECT FAILED",5);
            return $this->raiseError(
                    "Connect failed, turn on debugging to 5 see why",
                        $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->code, PEAR_ERROR_DIE
            );

        }
         
        if (empty($this->_database)) {
            $hasGetDatabase = method_exists($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5], 'getDatabase');
            
            $this->_database = ($db_driver != 'DB' && $hasGetDatabase)  
                    ? $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->getDatabase() 
                    : $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['database'];


            if (($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->dsn['phptype'] == 'sqlite') 
                && is_file($this->_database)) 
            {
                $this->_database = basename($this->_database);
            }
        }
        
        // Oracle need to optimize for portibility - not sure exactly what this does though :)
         
        return true;
    }

    /**
     * sends query to database - this is the private one that must work 
     *   - internal functions use this rather than $this->query()
     *
     * @param  string  $string
     * @access private
     * @return mixed none or PEAR_Error
     */
    function _query($string)
    {
        global $_DB_DATAOBJECT;
        $this->_connect();
        

        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];

        $options = $_DB_DATAOBJECT['CONFIG'];
        
        $_DB_driver = empty($_DB_DATAOBJECT['CONFIG']['db_driver']) ? 
                    'DB':  $_DB_DATAOBJECT['CONFIG']['db_driver'];
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug($string,$log="QUERY");
            
        }
        
        if (
            strtoupper($string) == 'BEGIN' ||
            strtoupper($string) == 'START TRANSACTION'
        ) {
            if ($_DB_driver == 'DB') {
                $DB->autoCommit(false);
                $DB->simpleQuery('BEGIN');
            } else {
                $DB->beginTransaction();
            }
            return true;
        }
        
        if (strtoupper($string) == 'COMMIT') {
            $res = $DB->commit();
            if ($_DB_driver == 'DB') {
                $DB->autoCommit(true);
            }
            return $res;
        }
        
        if (strtoupper($string) == 'ROLLBACK') {
            $DB->rollback();
            if ($_DB_driver == 'DB') {
                $DB->autoCommit(true);
            }
            return true;
        }
        

        if (!empty($options['debug_ignore_updates']) &&
            (strtolower(substr(trim($string), 0, 6)) != 'select') &&
            (strtolower(substr(trim($string), 0, 4)) != 'show') &&
            (strtolower(substr(trim($string), 0, 8)) != 'describe')) {

            $this->debug('Disabling Update as you are in debug mode');
            return $this->raiseError("Disabling Update as you are in debug mode", null) ;

        }
        //if (@$_DB_DATAOBJECT['CONFIG']['debug'] > 1) {
            // this will only work when PEAR:DB supports it.
            //$this->debug($DB->getAll('explain ' .$string,DB_DATAOBJECT_FETCHMODE_ASSOC), $log="sql",2);
        //}
        
        // some sim
        $t= explode(' ',microtime());
        $_DB_DATAOBJECT['QUERYENDTIME'] = $time = $t[0]+$t[1];
         
        
        for ($tries = 0;$tries < 3;$tries++) {
            
            if ($_DB_driver == 'DB') {
                
                $result = $DB->query($string);
            } else {
                switch (strtolower(substr(trim($string),0,6))) {
                
                    case 'insert':
                    case 'update':
                    case 'delete':
                        $result = $DB->exec($string);
                        break;
                        
                    default:
                        $result = $DB->query($string);
                        break;
                }
            }
            
            // see if we got a failure.. - try again a few times..
            if (!is_object($result) || !is_a($result,'PEAR_Error')) {
                break;
            }
            if ($result->getCode() != -14) {  // *DB_ERROR_NODBSELECTED
                break; // not a connection error..
            }
            sleep(1); // wait before retyring..
            $DB->connect($DB->dsn);
        }
       

        if (is_object($result) && is_a($result,'PEAR_Error')) {
            if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) { 
                $this->debug($result->toString(), "Query Error",1 );
            }
            $this->N = false;
            return $this->raiseError($result);
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $t= explode(' ',microtime());
            $_DB_DATAOBJECT['QUERYENDTIME'] = $t[0]+$t[1];
            $this->debug('QUERY DONE IN  '.($t[0]+$t[1]-$time)." seconds", 'query',1);
        }
        switch (strtolower(substr(trim($string),0,6))) {
            case 'insert':
            case 'update':
            case 'delete':
                if ($_DB_driver == 'DB') {
                    // pear DB specific
                    return $DB->affectedRows(); 
                }
                return $result;
        }
        if (is_object($result)) {
            // lets hope that copying the result object is OK!
            
            $_DB_resultid  = $GLOBALS['_DB_DATAOBJECT']['RESULTSEQ']++;
            $_DB_DATAOBJECT['RESULTS'][$_DB_resultid] = $result; 
            $this->_DB_resultid = $_DB_resultid;
        }
        $this->N = 0;
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            $this->debug(serialize($result), 'RESULT',5);
        }
        if (method_exists($result, 'numRows')) {
            if ($_DB_driver == 'DB') {
                $DB->expectError(DB_ERROR_UNSUPPORTED);
            } else {
                $DB->expectError(MDB2_ERROR_UNSUPPORTED);
            }
            
            $this->N = $result->numRows();
            //var_dump($this->N);
            
            if (is_object($this->N) && is_a($this->N,'PEAR_Error')) {
                $this->N = true;
            }
            $DB->popExpect();
        }
    }

    /**
     * Builds the WHERE based on the values of of this object
     *
     * @param   mixed   $keys
     * @param   array   $filter (used by update to only uses keys in this filter list).
     * @param   array   $negative_filter (used by delete to prevent deleting using the keys mentioned..)
     * @access  private
     * @return  string
     */
    function _build_condition($keys, $filter = array(),$negative_filter=array())
    {
        global $_DB_DATAOBJECT;
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
       
        $quoteIdentifiers  = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        $options = $_DB_DATAOBJECT['CONFIG'];
        
        // if we dont have query vars.. - reset them.
        if ($this->_query === false) {
            $x = new DB_DataObject;
            $this->_query= $x->_query;
        }
       
                    
        foreach($keys as $k => $v) {
            // index keys is an indexed array
            /* these filter checks are a bit suspicious..
                - need to check that update really wants to work this way */

            if ($filter) {
                if (!in_array($k, $filter)) {
                    continue;
                }
            }
            if ($negative_filter) {
                if (in_array($k, $negative_filter)) {
                    continue;
                }
            }
            if (!isset($this->$k)) {
                continue;
            }
            
            $kSql = $quoteIdentifiers 
                ? ( $DB->quoteIdentifier($this->tableName()) . '.' . $DB->quoteIdentifier($k) )  
                : "{$this->tableName()}.{$k}";
             
             
            
            if (is_object($this->$k) && is_a($this->$k,'DB_DataObject_Cast')) {
                $dbtype = $DB->dsn["phptype"];
                $value = $this->$k->toString($v,$DB);
                if (PEAR::isError($value)) {
                    $this->raiseError($value->getMessage() ,DB_DATAOBJECT_ERROR_INVALIDARG);
                    return false;
                }
                if ((strtolower($value) === 'null') && !($v & DB_DATAOBJECT_NOTNULL)) {
                    $this->whereAdd(" $kSql IS NULL");
                    continue;
                }
                $this->whereAdd(" $kSql = $value");
                continue;
            }
            
            if (!($v & DB_DATAOBJECT_NOTNULL) && DB_DataObject::_is_null($this,$k)) {
                $this->whereAdd(" $kSql  IS NULL");
                continue;
            }
            

            if ($v & DB_DATAOBJECT_STR) {
                $this->whereAdd(" $kSql  = " . $this->_quote((string) (
                        ($v & DB_DATAOBJECT_BOOL) ? 
                            // this is thanks to the braindead idea of postgres to 
                            // use t/f for boolean.
                            (($this->$k === 'f') ? 0 : (int)(bool) $this->$k) :  
                            $this->$k
                    )) );
                continue;
            }
            if (is_numeric($this->$k)) {
                $this->whereAdd(" $kSql = {$this->$k}");
                continue;
            }
            /* this is probably an error condition! */
            $this->whereAdd(" $kSql = ".intval($this->$k));
        }
    }

    
    
     /**
     * classic factory method for loading a table class
     * usage: $do = DB_DataObject::factory('person')
     * WARNING - this may emit a include error if the file does not exist..
     * use @ to silence it (if you are sure it is acceptable)
     * eg. $do = @DB_DataObject::factory('person')
     *
     * table name can bedatabasename/table
     * - and allow modular dataobjects to be written..
     * (this also helps proxy creation)
     *
     * Experimental Support for Multi-Database factory eg. mydatabase.mytable
     * 
     * 
     * @param  string  $table  tablename (use blank to create a new instance of the same class.)
     * @access private
     * @return DataObject|PEAR_Error 
     */
    
    

    static function factory($table = '')
    {
        global $_DB_DATAOBJECT;
        
        
        // multi-database support.. - experimental.
        $database = '';
       
        if (strpos( $table,'/') !== false ) {
            list($database,$table) = explode('.',$table, 2);
          
        }
         
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        // no configuration available for database
        if (!empty($database) && empty($_DB_DATAOBJECT['CONFIG']['database_'.$database])) {
                $do = new DB_DataObject();
                $do->raiseError(
                    "unable to find database_{$database} in Configuration, It is required for factory with database"
                    , 0, PEAR_ERROR_DIE );   
       }
        
       
        /*
        if ($table === '') {
            if (is_a($this,'DB_DataObject') && strlen($this->tableName())) {
                $table = $this->tableName();
            } else {
                return DB_DataObject::raiseError(
                    "factory did not recieve a table name",
                    DB_DATAOBJECT_ERROR_INVALIDARGS);
            }
        }
        
        */
        // does this need multi db support??
        $cp = isset($_DB_DATAOBJECT['CONFIG']['class_prefix']) ?
            explode(PATH_SEPARATOR, $_DB_DATAOBJECT['CONFIG']['class_prefix']) : '';
        
        //print_r($cp);
        
        // multiprefix support.
        $tbl = preg_replace('/[^A-Z0-9]/i','_',ucfirst($table));
        if (is_array($cp)) {
            $class = array();
            foreach($cp as $cpr) {
                $ce = substr(phpversion(),0,1) > 4 ? class_exists($cpr . $tbl,false) : class_exists($cpr . $tbl);
                if ($ce) {
                    $class = $cpr . $tbl;
                    break;
                }
                $class[] = $cpr . $tbl;
            }
        } else {
            $class = $tbl;
            $ce = substr(phpversion(),0,1) > 4 ? class_exists($class,false) : class_exists($class);
        }
        
        
        $rclass = $ce ? $class  : DB_DataObject::_autoloadClass($class, $table);
        // proxy = full|light
        if (!$rclass && isset($_DB_DATAOBJECT['CONFIG']['proxy'])) { 
        
            DB_DataObject::debug("FAILED TO Autoload  $database.$table - using proxy.","FACTORY",1);
        
        
            $proxyMethod = 'getProxy'.$_DB_DATAOBJECT['CONFIG']['proxy'];
            // if you have loaded (some other way) - dont try and load it again..
            class_exists('DB_DataObject_Generator') ? '' : 
                    require_once 'DB/DataObject/Generator.php';
            
            $d = new DB_DataObject;
           
            $d->__table = $table;
            
            $ret = $d->_connect();
            if (is_object($ret) && is_a($ret, 'PEAR_Error')) {
                return $ret;
            }
            
            $x = new DB_DataObject_Generator;
            return $x->$proxyMethod( $d->_database, $table);
        }
        
        if (!$rclass || !class_exists($rclass)) {
            $dor = new DB_DataObject();
            return $dor->raiseError(
                "factory could not find class " . 
                (is_array($class) ? implode(PATH_SEPARATOR, $class)  : $class  ). 
                "from $table",
                DB_DATAOBJECT_ERROR_INVALIDCONFIG);
        }
 
        $ret = new $rclass();
 
        if (!empty($database)) {
            DB_DataObject::debug("Setting database to $database","FACTORY",1);
            $ret->database($database);
        }
        return $ret;
    }
    /**
     * autoload Class
     *
     * @param  string|array  $class  Class
     * @param  string  $table  Table trying to load.
     * @access private
     * @return string classname on Success
     */
    function _autoloadClass($class, $table=false)
    {
        global $_DB_DATAOBJECT;
        
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        $class_prefix = empty($_DB_DATAOBJECT['CONFIG']['class_prefix']) ? 
                '' : $_DB_DATAOBJECT['CONFIG']['class_prefix'];
                
        $table   = $table ? $table : substr($class,strlen($class_prefix));

        // only include the file if it exists - and barf badly if it has parse errors :)
        if (!empty($_DB_DATAOBJECT['CONFIG']['proxy']) || empty($_DB_DATAOBJECT['CONFIG']['class_location'])) {
            return false;
        }
        // support for:
        // class_location = mydir/ => maps to mydir/Tablename.php
        // class_location = mydir/myfile_%s.php => maps to mydir/myfile_Tablename
        // with directory sepr
        // class_location = mydir/:mydir2/: => tries all of thes locations.
        $cl = $_DB_DATAOBJECT['CONFIG']['class_location'];
        
        
        switch (true) {
            case (strpos($cl ,'%s') !== false):
                $file = sprintf($cl , preg_replace('/[^A-Z0-9]/i','_',ucfirst($table)));
                break;
                
            case (strpos($cl , PATH_SEPARATOR) !== false):
                $file = array();
                foreach(explode(PATH_SEPARATOR, $cl ) as $p) {
                    $file[] =  $p .'/'.preg_replace('/[^A-Z0-9]/i','_',ucfirst($table)).".php";
                }
                break;
            default:
                $file = $cl .'/'.preg_replace('/[^A-Z0-9]/i','_',ucfirst($table)).".php";
                break;
        }
        
        $cls = is_array($class) ? $class : array($class);
        
        if (is_array($file) || !file_exists($file)) {
            $found = false;
            
            $file = is_array($file) ? $file : array($file);
            $search = implode(PATH_SEPARATOR, $file);
            foreach($file as $f) {
                foreach(explode(PATH_SEPARATOR, '' . PATH_SEPARATOR . ini_get('include_path')) as $p) {
                    $ff = empty($p) ? $f : "$p/$f";

                    if (file_exists($ff)) {
                        $file = $ff;
                        $found = true;
                        break;
                    }
                }
                if ($found) {
                    break;
                }
            }
            if (!$found) {
                $dor = new DB_DataObject();
                $dor->raiseError(
                    "autoload:Could not find class " . implode(',', $cls) .
                    " using class_location value :" . $search .
                    " using include_path value :" . ini_get('include_path'), 
                    DB_DATAOBJECT_ERROR_INVALIDCONFIG);
                return false;
            }
        }
        
        include_once $file;
        
       
        $ce = false;
        foreach($cls as $c) {
            $ce = substr(phpversion(),0,1) > 4 ? class_exists($c,false) : class_exists($c);
            if ($ce) {
                $class = $c;
                break;
            }
        }
        if (!$ce) {
            $dor = new DB_DataObject();
            $dor->raiseError(
                "autoload:Could not autoload " . implode(',', $cls) , 
                DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return false;
        }
        return $class;
    }
    
    
    
    /**
     * Have the links been loaded?
     * if they have it contains a array of those variables.
     *
     * @access  private
     * @var     boolean | array
     */
    var $_link_loaded = false;
    
    /**
    * Get the links associate array  as defined by the links.ini file.
    * 
    *
    * Experimental... - 
    * Should look a bit like
    *       [local_col_name] => "related_tablename:related_col_name"
    * 
    * @param    array $new_links optional - force update of the links for this table
    *               You probably want to restore it to it's original state after,
    *               as modifying here does it for the whole PHP request.
    * 
    * @return   array|null    
    *           array       = if there are links defined for this table.
    *           empty array - if there is a links.ini file, but no links on this table
    *           false       - if no links.ini exists for this database (hence try auto_links).
    * @access   public
    * @see      DB_DataObject::getLinks(), DB_DataObject::getLink()
    */
    
    function links()
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            $this->_loadConfig();
        }
        // have to connect.. -> otherwise things break later.
        $this->_connect();
        
        // alias for shorter code..
        $lcfg  = &$_DB_DATAOBJECT['LINKS'];
        $cfg   =  $_DB_DATAOBJECT['CONFIG'];

        if ($args = func_get_args()) {
            // an associative array was specified, that updates the current
            // schema... - be careful doing this
            if (empty( $lcfg[$this->_database])) {
                $lcfg[$this->_database] = array();
            }
            $lcfg[$this->_database][$this->tableName()] = $args[0];
            
        }
        // loaded and available.
        if (isset($lcfg[$this->_database][$this->tableName()])) {
            return $lcfg[$this->_database][$this->tableName()];
        }

        // loaded 
        if (isset($lcfg[$this->_database])) {
            // either no file, or empty..
            return $lcfg[$this->_database] === false ? null : array();
        }
        
        // links are same place as schema by default.
        $schemas = isset($cfg['schema_location']) ?
            array("{$cfg['schema_location']}/{$this->_database}.ini") :
            array() ;

        // if ini_* is set look there instead.
        // and support multiple locations.                 
        if (isset($cfg["ini_{$this->_database}"])) {
            $schemas = is_array($cfg["ini_{$this->_database}"]) ?
                $cfg["ini_{$this->_database}"] :
                explode(PATH_SEPARATOR,$cfg["ini_{$this->_database}"]);
        }
                        
        // default to not available.
        $lcfg[$this->_database] = false;

        foreach ($schemas as $ini) {
                
            $links = isset($cfg["links_{$this->_database}"]) ?
                    $cfg["links_{$this->_database}"] :
                    str_replace('.ini','.links.ini',$ini);
            
            // file really exists..
            if (!file_exists($links) || !is_file($links)) {
                if (!empty($cfg['debug'])) {
                    $this->debug("Missing links.ini file: $links","links",1);
                }
                continue;
            }

            // set to empty array - as we have at least one file now..
            $lcfg[$this->_database] = empty($lcfg[$this->_database]) ? array() : $lcfg[$this->_database];

            // merge schema file into lcfg..
            $lcfg[$this->_database] = array_merge(
                $lcfg[$this->_database],
                parse_ini_file($links, true)
            );

                        
            if (!empty($cfg['debug'])) {
                $this->debug("Loaded links.ini file: $links","links",1);
            }
             
        }
        
        if (!empty($_DB_DATAOBJECT['CONFIG']['portability']) && $_DB_DATAOBJECT['CONFIG']['portability'] & 1) {
            foreach($lcfg[$this->_database] as $k=>$v) {
                
                $nk = strtolower($k);
                // results in duplicate cols.. but not a big issue..
                $lcfg[$this->_database][$nk] = isset($lcfg[$this->_database][$nk])
                    ? $lcfg[$this->_database][$nk]  : array();
                
                foreach($v as $kk =>$vv) {
                    //var_Dump($vv);exit;
                    $vv =explode(':', $vv);
                    $vv[0] = strtolower($vv[0]);
                    $lcfg[$this->_database][$nk][$kk] = implode(':', $vv);
                }
                
                
            }
        }
        //echo '<PRE>';print_r($lcfg);exit;
        
        // if there is no link data at all on the file!
        // we return null.
        if ($lcfg[$this->_database] === false) {
            return null;
        }
        
        if (isset($lcfg[$this->_database][$this->tableName()])) {
            return $lcfg[$this->_database][$this->tableName()];
        }
        
        return array();
    }
    
    
    /**
     * generic getter/setter for links
     *
     * This is the new 'recommended' way to get get/set linked objects.
     * must be used with links.ini
     *
     * usage:
     *  get:
     *  $obj = $do->link('company_id');
     *  $obj = $do->link(array('local_col', 'linktable:linked_col'));
     *  
     *  set:
     *  $do->link('company_id',0);
     *  $do->link('company_id',$obj);
     *  $do->link('company_id', array($obj));
     *
     *  example function
     *
     *  function company() {
     *     $this->link(array('company_id','company:id'), func_get_args());
     *   }
     *
     * 
     *
     * @param  mixed $link_spec              link specification (normally a string)
     *                                       uses similar rules to  joinAdd() array argument.
     * @param  mixed $set_value (optional)   int, DataObject, or array('set')
     * @author Alan Knowles
     * @access public
     * @return mixed true or false on setting, object on getting
     */
    function link($field, $set_args = array())
    {
        require_once 'DB/DataObject/Links.php';
        $l = new DB_DataObject_Links($this);
        return  $l->link($field,$set_args) ;
        
    }
    
      /**
     * load related objects
     *
     * Generally not recommended to use this.
     * The generator should support creating getter_setter methods which are better suited.
     *
     * Relies on  <dbname>.links.ini
     *
     * Sets properties on the calling dataobject  you can change what
     * object vars the links are stored in by  changeing the format parameter
     *
     *
     * @param  string format (default _%s) where %s is the table name.
     * @author Tim White <tim@cyface.com>
     * @access public
     * @return boolean , true on success
     */
    function getLinks($format = '_%s')
    {
        require_once 'DB/DataObject/Links.php';
         $l = new DB_DataObject_Links($this);
        return $l->applyLinks($format);
           
    }

    /**
     * deprecited : @use link() 
     */
    function getLink($row, $table = null, $link = false)
    {
        require_once 'DB/DataObject/Links.php';
        $l = new DB_DataObject_Links($this);
        return $l->getLink($row, $table === null ? false: $table, $link);
         
        
    }

    /**
     * getLinkArray
     * Fetch an array of related objects. This should be used in conjunction with a <dbname>.links.ini file configuration (see the introduction on linking for details on this).
     * You may also use this with all parameters to specify, the column and related table.
     * This is highly dependant on naming columns 'correctly' :)
     * using colname = xxxxx_yyyyyy
     * xxxxxx = related table; (yyyyy = user defined..)
     * looks up table xxxxx, for value id=$this->xxxxx
     * stores it in $this->_xxxxx_yyyyy
     *
     * @access public
     * @param string $column - either column or column.xxxxx
     * @param string $table - name of table to look up value in
     * @return array - array of results (empty array on failure)
     * 
     * Example - Getting the related objects
     * 
     * $person = new DataObjects_Person;
     * $person->get(12);
     * $children = $person->getLinkArray('children');
     * 
     * echo 'There are ', count($children), ' descendant(s):<br />';
     * foreach ($children as $child) {
     *     echo $child->name, '<br />';
     * }
     * 
     */
    function getLinkArray($row, $table = null)
    {
        require_once 'DB/DataObject/Links.php';
        $l = new DB_DataObject_Links($this);
        return $l->getLinkArray($row, $table === null ? false: $table);
     
    }

     /**
     * unionAdd - adds another dataobject to this, building a unioned query.
     *
     * usage:  
     * $doTable1 = DB_DataObject::factory("table1");
     * $doTable2 = DB_DataObject::factory("table2");
     * 
     * $doTable1->selectAdd();
     * $doTable1->selectAdd("col1,col2");
     * $doTable1->whereAdd("col1 > 100");
     * $doTable1->orderBy("col1");
     *
     * $doTable2->selectAdd();
     * $doTable2->selectAdd("col1, col2");
     * $doTable2->whereAdd("col2 = 'v'");
     * 
     * $doTable1->unionAdd($doTable2);
     * $doTable1->find();
      * 
     * Note: this model may be a better way to implement joinAdd?, eg. do the building in find?
     * 
     * 
     * @param             $obj       object|false the union object or false to reset
     * @param    optional $is_all    string 'ALL' to do all.
     * @returns           $obj       object|array the added object, or old list if reset.
     */
    
    function unionAdd($obj,$is_all= '')
    {
        if ($obj === false) {
            $ret = $this->_query['unions'];
            $this->_query['unions'] = array();
            return $ret;
        }
        $this->_query['unions'][] = array($obj, 'UNION ' . $is_all . ' ') ;
        return $obj;
    }

    
    
    /**
     * The JOIN condition
     *
     * @access  private
     * @var     string
     */
    var $_join = '';

    /**
     * joinAdd - adds another dataobject to this, building a joined query.
     *
     * example (requires links.ini to be set up correctly)
     * // get all the images for product 24
     * $i = new DataObject_Image();
     * $pi = new DataObjects_Product_image();
     * $pi->product_id = 24; // set the product id to 24
     * $i->joinAdd($pi); // add the product_image connectoin
     * $i->find();
     * while ($i->fetch()) {
     *     // do stuff
     * }
     * // an example with 2 joins
     * // get all the images linked with products or productgroups
     * $i = new DataObject_Image();
     * $pi = new DataObject_Product_image();
     * $pgi = new DataObject_Productgroup_image();
     * $i->joinAdd($pi);
     * $i->joinAdd($pgi);
     * $i->find();
     * while ($i->fetch()) {
     *     // do stuff
     * }
     *
     *
     * @param    optional $obj       object |array    the joining object (no value resets the join)
     *                                          If you use an array here it should be in the format:
     *                                          array('local_column','remotetable:remote_column');
     *                                             if remotetable does not have a definition, you should
     *                                             use @ to hide the include error message..
     *                                          array('local_column',  $dataobject , 'remote_column');
     *                                             if array has 3 args, then second is assumed to be the linked dataobject.
     *
     * @param    optional $joinType  string | array
     *                                          'LEFT'|'INNER'|'RIGHT'|'' Inner is default, '' indicates 
     *                                          just select ... from a,b,c with no join and 
     *                                          links are added as where items.
     *                                          
     *                                          If second Argument is array, it is assumed to be an associative
     *                                          array with arguments matching below = eg.
     *                                          'joinType' => 'INNER',
     *                                          'joinAs' => '...'
     *                                          'joinCol' => ....
     *                                          'useWhereAsOn' => false,
     *
     * @param    optional $joinAs    string     if you want to select the table as anther name
     *                                          useful when you want to select multiple columsn
     *                                          from a secondary table.
     
     * @param    optional $joinCol   string     The column on This objects table to match (needed
     *                                          if this table links to the child object in 
     *                                          multiple places eg.
     *                                          user->friend (is a link to another user)
     *                                          user->mother (is a link to another user..)
     *
     *           optional 'useWhereAsOn' bool   default false;
     *                                          convert the where argments from the object being added
     *                                          into ON arguments.
     * 
     * 
     * @return   none
     * @access   public
     * @author   Stijn de Reede      <sjr@gmx.co.uk>
     */
    function joinAdd($obj = false, $joinType='INNER', $joinAs=false, $joinCol=false)
    {
        global $_DB_DATAOBJECT;
        if ($obj === false) {
            $this->_join = '';
            return;
        }
         
        //echo '<PRE>'; print_r(func_get_args());
        $useWhereAsOn = false;
        // support for 2nd argument as an array of options
        if (is_array($joinType)) {
            // new options can now go in here... (dont forget to document them)
            $useWhereAsOn = !empty($joinType['useWhereAsOn']);
            $joinCol      = isset($joinType['joinCol'])  ? $joinType['joinCol']  : $joinCol;
            $joinAs       = isset($joinType['joinAs'])   ? $joinType['joinAs']   : $joinAs;
            $joinType     = isset($joinType['joinType']) ? $joinType['joinType'] : 'INNER';
        }
        // support for array as first argument 
        // this assumes that you dont have a links.ini for the specified table.
        // and it doesnt exist as am extended dataobject!! - experimental.
        
        $ofield = false; // object field
        $tfield = false; // this field
        $toTable = false;
        if (is_array($obj)) {
            $tfield = $obj[0];
            
            if (count($obj) == 3) {
                $ofield = $obj[2];
                $obj = $obj[1];
            } else {
                list($toTable,$ofield) = explode(':',$obj[1]);
            
                $obj = is_string($toTable) ? DB_DataObject::factory($toTable) : $toTable;
            
                if (!$obj || !is_object($obj) || is_a($obj,'PEAR_Error')) {
                    $obj = new DB_DataObject;
                    $obj->__table = $toTable;
                }
                $obj->_connect();
            }
            // set the table items to nothing.. - eg. do not try and match
            // things in the child table...???
            $items = array();
        }
        
        if (!is_object($obj) || !is_a($obj,'DB_DataObject')) {
            return $this->raiseError("joinAdd: called without an object", DB_DATAOBJECT_ERROR_NODATA,PEAR_ERROR_DIE);
        }
        /*  make sure $this->_database is set.  */
        $this->_connect();
        $DB = $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
       

        /// CHANGED 26 JUN 2009 - we prefer links from our local table over the remote one.
        
        /* otherwise see if there are any links from this table to the obj. */
        //print_r($this->links());
        if (($ofield === false) && ($links = $this->links())) {
            // this enables for support for arrays of links in ini file.
            // link contains this_column[] =  linked_table:linked_column
            // or standard way.
            // link contains this_column =  linked_table:linked_column
            foreach ($links as $k => $linkVar) {
            
                if (!is_array($linkVar)) {
                    $linkVar  = array($linkVar);
                }
                foreach($linkVar as $v) {

                    
                    
                    /* link contains {this column} = {linked table}:{linked column} */
                    $ar = explode(':', $v);
                    // Feature Request #4266 - Allow joins with multiple keys
                    if (strpos($k, ',') !== false) {
                        $k = explode(',', $k);
                    }
                    if (strpos($ar[1], ',') !== false) {
                        $ar[1] = explode(',', $ar[1]);
                    }

                    if ($ar[0] != $obj->tableName()) {
                        continue;
                    }
                    if ($joinCol !== false) {
                        if ($k == $joinCol) {
                            // got it!?
                            $tfield = $k;
                            $ofield = $ar[1];
                            break;
                        } 
                        continue;
                        
                    } 
                    $tfield = $k;
                    $ofield = $ar[1];
                    break;
                        
                }
            }
        }
         /* look up the links for obj table */
        //print_r($obj->links());
        if (!$ofield && ($olinks = $obj->links())) {
            
            foreach ($olinks as $k => $linkVar) {
                /* link contains {this column} = array ( {linked table}:{linked column} )*/
                if (!is_array($linkVar)) {
                    $linkVar  = array($linkVar);
                }
                foreach($linkVar as $v) {
                    
                    /* link contains {this column} = {linked table}:{linked column} */
                    $ar = explode(':', $v);
                    
                    // Feature Request #4266 - Allow joins with multiple keys
                    $links_key_array = strpos($k,',');
                    if ($links_key_array !== false) {
                        $k = explode(',', $k);
                    }
                    
                    $ar_array = strpos($ar[1],',');
                    if ($ar_array !== false) {
                        $ar[1] = explode(',', $ar[1]);
                    }
                 
                    if ($ar[0] != $this->tableName()) {
                        continue;
                    }
                    
                    // you have explictly specified the column
                    // and the col is listed here..
                    // not sure if 1:1 table could cause probs here..
                    
                    if ($joinCol !== false) {
                        $this->raiseError( 
                            "joinAdd: You cannot target a join column in the " .
                            "'link from' table ({$obj->tableName()}). " . 
                            "Either remove the fourth argument to joinAdd() ".
                            "({$joinCol}), or alter your links.ini file.",
                            DB_DATAOBJECT_ERROR_NODATA);
                        return false;
                    }
                
                    $ofield = $k;
                    $tfield = $ar[1];
                    break;
                    
                }
            }
        }

        // finally if these two table have column names that match do a join by default on them

        if (($ofield === false) && $joinCol) {
            $ofield = $joinCol;
            $tfield = $joinCol;

        }
        /* did I find a conneciton between them? */

        if ($ofield === false) {
            $this->raiseError(
                "joinAdd: {$obj->tableName()} has no link with {$this->tableName()}",
                DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        $joinType = strtoupper($joinType);
        
        // we default to joining as the same name (this is remvoed later..)
        
        if ($joinAs === false) {
            $joinAs = $obj->tableName();
        }
        
        $quoteIdentifiers = !empty($_DB_DATAOBJECT['CONFIG']['quote_identifiers']);
        $options = $_DB_DATAOBJECT['CONFIG'];
        
        // not sure  how portable adding database prefixes is..
        $objTable = $quoteIdentifiers ? 
                $DB->quoteIdentifier($obj->tableName()) : 
                 $obj->tableName() ;
                
        $dbPrefix  = '';
        if (strlen($obj->_database) && in_array($DB->dsn['phptype'],array('mysql','mysqli'))) {
            $dbPrefix = ($quoteIdentifiers
                         ? $DB->quoteIdentifier($obj->_database)
                         : $obj->_database) . '.';    
        }
        
        // if they are the same, then dont add a prefix...                
        if ($obj->_database == $this->_database) {
           $dbPrefix = '';
        }
        // as far as we know only mysql supports database prefixes..
        // prefixing the database name is now the default behaviour,
        // as it enables joining mutiple columns from multiple databases...
         
            // prefix database (quoted if neccessary..)
        $objTable = $dbPrefix . $objTable;
       
        $cond = '';

        // if obj only a dataobject - eg. no extended class has been defined..
        // it obvioulsy cant work out what child elements might exist...
        // until we get on the fly querying of tables..
        // note: we have already checked that it is_a(db_dataobject earlier)
        if ( strtolower(get_class($obj)) != 'db_dataobject') {
                 
            // now add where conditions for anything that is set in the object 
        
        
        
            $items = $obj->table();
            // will return an array if no items..
            
            // only fail if we where expecting it to work (eg. not joined on a array)
             
            if (!$items) {
                $this->raiseError(
                    "joinAdd: No table definition for {$obj->tableName()}", 
                    DB_DATAOBJECT_ERROR_INVALIDCONFIG);
                return false;
            }
            
            $ignore_null = !isset($options['disable_null_strings'])
                    || !is_string($options['disable_null_strings'])
                    || strtolower($options['disable_null_strings']) !== 'full' ;
            

            foreach($items as $k => $v) {
                if (!isset($obj->$k) && $ignore_null) {
                    continue;
                }
                
                $kSql = ($quoteIdentifiers ? $DB->quoteIdentifier($k) : $k);
                
                if (DB_DataObject::_is_null($obj,$k)) {
                	$obj->whereAdd("{$joinAs}.{$kSql} IS NULL");
                	continue;
                }
                
                if ($v & DB_DATAOBJECT_STR) {
                    $obj->whereAdd("{$joinAs}.{$kSql} = " . $this->_quote((string) (
                            ($v & DB_DATAOBJECT_BOOL) ? 
                                // this is thanks to the braindead idea of postgres to 
                                // use t/f for boolean.
                                (($obj->$k === 'f') ? 0 : (int)(bool) $obj->$k) :  
                                $obj->$k
                        )));
                    continue;
                }
                if (is_numeric($obj->$k)) {
                    $obj->whereAdd("{$joinAs}.{$kSql} = {$obj->$k}");
                    continue;
                }
                            
                if (is_object($obj->$k) && is_a($obj->$k,'DB_DataObject_Cast')) {
                    $value = $obj->$k->toString($v,$DB);
                    if (PEAR::isError($value)) {
                        $this->raiseError($value->getMessage() ,DB_DATAOBJECT_ERROR_INVALIDARG);
                        return false;
                    } 
                    $obj->whereAdd("{$joinAs}.{$kSql} = $value");
                    continue;
                }
                
                
                /* this is probably an error condition! */
                $obj->whereAdd("{$joinAs}.{$kSql} = 0");
            }
            if ($this->_query === false) {
                $this->raiseError(
                    "joinAdd can not be run from a object that has had a query run on it,
                    clone the object or create a new one and use setFrom()", 
                    DB_DATAOBJECT_ERROR_INVALIDARGS);
                return false;
            }
        }

        // and finally merge the whereAdd from the child..
        if ($obj->_query['condition']) {
            $cond = preg_replace('/^\sWHERE/i','',$obj->_query['condition']);

            if (!$useWhereAsOn) {
                $this->whereAdd($cond);
            }
        }
    
        
        
        
        // nested (join of joined objects..)
        $appendJoin = '';
        if ($obj->_join) {
            // postgres allows nested queries, with ()'s
            // not sure what the results are with other databases..
            // may be unpredictable..
            if (in_array($DB->dsn["phptype"],array('pgsql'))) {
                $objTable = "($objTable {$obj->_join})";
            } else {
                $appendJoin = $obj->_join;
            }
        }
        
  
        // fix for #2216
        // add the joinee object's conditions to the ON clause instead of the WHERE clause
        if ($useWhereAsOn && strlen($cond)) {
            $appendJoin = ' AND ' . $cond . ' ' . $appendJoin;
        }
               
        
        
        $table = $this->tableName();
        
        if ($quoteIdentifiers) {
            $joinAs   = $DB->quoteIdentifier($joinAs);
            $table    = $DB->quoteIdentifier($table);     
            $ofield   = (is_array($ofield)) ? array_map(array($DB, 'quoteIdentifier'), $ofield) : $DB->quoteIdentifier($ofield);
            $tfield   = (is_array($tfield)) ? array_map(array($DB, 'quoteIdentifier'), $tfield) : $DB->quoteIdentifier($tfield); 
        }
        // add database prefix if they are different databases
       
        
        $fullJoinAs = '';
        $addJoinAs  = ($quoteIdentifiers ? $DB->quoteIdentifier($obj->tableName()) : $obj->tableName()) != $joinAs;
        if ($addJoinAs) {
            // join table a AS b - is only supported by a few databases and is probably not needed
            // , however since it makes the whole Statement alot clearer we are leaving it in
            // for those databases.
            $fullJoinAs = in_array($DB->dsn["phptype"],array('mysql','mysqli','pgsql')) ? "AS {$joinAs}" :  $joinAs;
        } else {
            // if 
            $joinAs = $dbPrefix . $joinAs;
        }
        
        
        switch ($joinType) {
            case 'INNER':
            case 'LEFT': 
            case 'RIGHT': // others??? .. cross, left outer, right outer, natural..?
                
                // Feature Request #4266 - Allow joins with multiple keys
                $jadd = "\n {$joinType} JOIN {$objTable} {$fullJoinAs}";
                //$this->_join .= "\n {$joinType} JOIN {$objTable} {$fullJoinAs}";
                if (is_array($ofield)) {
                	$key_count = count($ofield);
                    for($i = 0; $i < $key_count; $i++) {
                    	if ($i == 0) {
                    		$jadd .= " ON ({$joinAs}.{$ofield[$i]}={$table}.{$tfield[$i]}) ";
                    	}
                    	else {
                    		$jadd .= " AND {$joinAs}.{$ofield[$i]}={$table}.{$tfield[$i]} ";
                    	}
                    }
                    $jadd .= ' ' . $appendJoin . ' ';
                } else {
	                $jadd .= " ON ({$joinAs}.{$ofield}={$table}.{$tfield}) {$appendJoin} ";
                }
                // jadd avaliable for debugging join build.
                //echo $jadd ."\n";
                $this->_join .= $jadd;
                break;
                
            case '': // this is just a standard multitable select..
                $this->_join .= "\n , {$objTable} {$fullJoinAs} {$appendJoin}";
                $this->whereAdd("{$joinAs}.{$ofield}={$table}.{$tfield}");
        }
         
         
        return true;

    }

    /**
     * autoJoin - using the links.ini file, it builds a query with all the joins 
     * usage: 
     * $x = DB_DataObject::factory('mytable');
     * $x->autoJoin();
     * $x->get(123); 
     *   will result in all of the joined data being added to the fetched object..
     * 
     * $x = DB_DataObject::factory('mytable');
     * $x->autoJoin();
     * $ar = $x->fetchAll();
     *   will result in an array containing all the data from the table, and any joined tables..
     * 
     * $x = DB_DataObject::factory('mytable');
     * $jdata = $x->autoJoin();
     * $x->selectAdd(); //reset..
     * foreach($_REQUEST['requested_cols'] as $c) {
     *    if (!isset($jdata[$c])) continue; // ignore columns not available..
     *    $x->selectAdd( $jdata[$c] . ' as ' . $c);
     * }
     * $ar = $x->fetchAll(); 
     *   will result in only the columns requested being fetched...
     *
     *
     *
     * @param     array     Configuration
     *          exclude  Array of columns to exclude from results (eg. modified_by_id)
     *          links    The equivilant links.ini data for this table eg.
     *                    array( 'person_id' => 'person:id', .... )
     *          include  Array of columns to include
     *          distinct Array of distinct columns.
     *          
     * @return   array      info about joins
     *                      cols => map of resulting {joined_tablename}.{joined_table_column_name}
     *                      join_names => map of resulting {join_name_as}.{joined_table_column_name}
     *                      count => the column to count on.
     * @access   public
     */
    function autoJoin($cfg = array())
    {
        global $_DB_DATAOBJECT;
        //var_Dump($cfg);exit;
        $pre_links = $this->links();
        if (!empty($cfg['links'])) {
            $this->links(array_merge( $pre_links , $cfg['links']));
        }
        $map = $this->links( );
        
        $this->databaseStructure();
        $dbstructure = $_DB_DATAOBJECT['INI'][$this->_database];
        //print_r($map);
        $tabdef = $this->table();
         
        // we need this as normally it's only cleared by an empty selectAs call.
       
        
        $keys = array_keys($tabdef);
        if (!empty($cfg['exclude'])) {
            $keys = array_intersect($keys, array_diff($keys, $cfg['exclude'])); 
        }
        if (!empty($cfg['include'])) {
            
            $keys =  array_intersect($keys,  $cfg['include']); 
        }
        
        $selectAs = array();
        
        if (!empty($keys)) {
            $selectAs = array(array( $keys , '%s', false));
        }
        
        $ret = array(
            'cols' => array(),
            'join_names' => array(),
            'count' => false,
        );
        
        
        
        $has_distinct = false;
        if (!empty($cfg['distinct']) && $keys) {
            
            // reset the columsn?
            $cols = array();
            
             //echo '<PRE>' ;print_r($xx);exit;
            foreach($keys as $c) {
                //var_dump($c);
                
                if (  $cfg['distinct'] == $c) {
                    $has_distinct = 'DISTINCT( ' . $this->tableName() .'.'. $c .') as ' . $c;
                    $ret['count'] =  'DISTINCT  ' . $this->tableName() .'.'. $c .'';
                    continue;
                }
                // cols is in our filtered keys...
                $cols = $c;
                
            }
            // apply our filtered version, which excludes the distinct column.
            
            $selectAs = empty($cols) ?  array() : array(array(array(  $cols) , '%s', false)) ;
            
            
            
        } 
                
        foreach($keys as $k) {
            $ret['cols'][$k] = $this->tableName(). '.' . $k;
        }
        
         
        
        foreach($map as $ocl=>$info) {
            
            list($tab,$col) = explode(':', $info);
            // what about multiple joins on the same table!!!
            
            // if links point to a table that does not exist - ignore.
            if (!isset($dbstructure[$tab])) {
                continue;
            }
            
            $xx = DB_DataObject::factory($tab);
            if (!is_object($xx) || !is_a($xx, 'DB_DataObject')) {
                continue;
            }
            // skip columns that are excluded.
            
            // we ignore include here... - as
             
            // this is borked ... for multiple jions..
            $this->joinAdd($xx, 'LEFT', 'join_'.$ocl.'_'. $col, $ocl);
            
            if (!empty($cfg['exclude']) && in_array($ocl, $cfg['exclude'])) {
                continue;
            }
            
            $tabdef = $xx->table();
            $table = $xx->tableName();
            
            $keys = array_keys($tabdef);
            
            
            if (!empty($cfg['exclude'])) {
                $keys = array_intersect($keys, array_diff($keys, $cfg['exclude']));
                
                foreach($keys as $k) {
                    if (in_array($ocl.'_'.$k, $cfg['exclude'])) {
                        $keys = array_diff($keys, $k); // removes the k..
                    }
                }
                
            }
            
            if (!empty($cfg['include'])) {
                // include will basically be BASECOLNAME_joinedcolname
                $nkeys = array();
                foreach($keys as $k) {
                    if (in_array( sprintf($ocl.'_%s', $k), $cfg['include'])) {
                        $nkeys[] = $k;
                    }
                }
                $keys = $nkeys;
            }
            
            if (empty($keys)) {
                continue;
            }
            // got distinct, and not yet found it..
            if (!$has_distinct && !empty($cfg['distinct']))  {
                $cols = array();
                foreach($keys as $c) {
                    $tn = sprintf($ocl.'_%s', $c);
                      
                    if ( $tn == $cfg['distinct']) {
                        
                        $has_distinct = 'DISTINCT( ' . 'join_'.$ocl.'_'.$col.'.'.$c .')  as ' . $tn ;
                        $ret['count'] =  'DISTINCT  join_'.$ocl.'_'.$col.'.'.$c;
                       // var_dump($this->countWhat );
                        continue;
                    }
                    $cols[] = $c;
                     
                }
                
                if (!empty($cols)) {
                    $selectAs[] = array($cols, $ocl.'_%s', 'join_'.$ocl.'_'. $col);
                }
                
            } else {
                $selectAs[] = array($keys, $ocl.'_%s', 'join_'.$ocl.'_'. $col);
            }
              
            foreach($keys as $k) {
                $ret['cols'][sprintf('%s_%s', $ocl, $k)] = $tab.'.'.$k;
                $ret['join_names'][sprintf('%s_%s', $ocl, $k)] = sprintf('join_%s_%s.%s',$ocl, $col, $k);
            }
             
        }
        
        // fill in the select details..
        $this->selectAdd(); 
        
        if ($has_distinct) {
            $this->selectAdd($has_distinct);
        }
       
        foreach($selectAs as $ar) {            
            $this->selectAs($ar[0], $ar[1], $ar[2]);
        }
        // restore links..
        $this->links( $pre_links );
        
        return $ret;
        
    }
    
    /**
     * Factory method for calling DB_DataObject_Cast
     *
     * if used with 1 argument DB_DataObject_Cast::sql($value) is called
     * 
     * if used with 2 arguments DB_DataObject_Cast::$value($callvalue) is called
     * valid first arguments are: blob, string, date, sql
     * 
     * eg. $member->updated = $member->sqlValue('NOW()');
     * 
     * 
     * might handle more arguments for escaping later...
     * 
     *
     * @param string $value (or type if used with 2 arguments)
     * @param string $callvalue (optional) used with date/null etc..
     */
    
    function sqlValue($value)
    {
        $method = 'sql';
        if (func_num_args() == 2) {
            $method = $value;
            $value = func_get_arg(1);
        }
        require_once 'DB/DataObject/Cast.php';
        return call_user_func(array('DB_DataObject_Cast', $method), $value);
        
    }
    
    
    /**
     * Copies items that are in the table definitions from an
     * array or object into the current object
     * will not override key values.
     *
     *
     * @param    array | object  $from
     * @param    string  $format eg. map xxxx_name to $object->name using 'xxxx_%s' (defaults to %s - eg. name -> $object->name
     * @param    boolean  $skipEmpty (dont assign empty values if a column is empty (eg. '' / 0 etc...)
     * @access   public
     * @return   true on success or array of key=>setValue error message
     */
    function setFrom($from, $format = '%s', $skipEmpty=false)
    {
        global $_DB_DATAOBJECT;
        $keys  = $this->keys();
        $items = $this->table();
        
        if (!$items) {
            $this->raiseError(
                "setFrom:Could not find table definition for {$this->tableName()}", 
                DB_DATAOBJECT_ERROR_INVALIDCONFIG);
            return;
        }
        $overload_return = array();
        foreach (array_keys($items) as $k) {
            if (in_array($k,$keys)) {
                continue; // dont overwrite keys
            }
            if (!$k) {
                continue; // ignore empty keys!!! what
            }
            
            $chk = is_object($from) &&  
                (version_compare(phpversion(), "5.1.0" , ">=") ? 
                    property_exists($from, sprintf($format,$k)) :  // php5.1
                    array_key_exists( sprintf($format,$k), get_class_vars($from)) //older
                );
            // if from has property ($format($k)      
            if ($chk) {
                $kk = (strtolower($k) == 'from') ? '_from' : $k;
                if (method_exists($this,'set'.$kk)) {
                    $ret = $this->{'set'.$kk}($from->{sprintf($format,$k)});
                    if (is_string($ret)) {
                        $overload_return[$k] = $ret;
                    }
                    continue;
                }
                $this->$k = $from->{sprintf($format,$k)};
                continue;
            }
            
            if (is_object($from)) {
                continue;
            }
            
            if (empty($from[sprintf($format,$k)]) && $skipEmpty) {
                continue;
            }
            
            if (!isset($from[sprintf($format,$k)]) && !DB_DataObject::_is_null($from, sprintf($format,$k))) {
                continue;
            }
           
            $kk = (strtolower($k) == 'from') ? '_from' : $k;
            if (method_exists($this,'set'. $kk)) {
                $ret =  $this->{'set'.$kk}($from[sprintf($format,$k)]);
                if (is_string($ret)) {
                    $overload_return[$k] = $ret;
                }
                continue;
            }
            $val = $from[sprintf($format,$k)];
            if (is_a($val, 'DB_DataObject_Cast')) {
                $this->$k = $val;
                continue;
            }
            if (is_object($val) || is_array($val)) {
                continue;
            }
            $ret = $this->fromValue($k,$val);
            if ($ret !== true)  {
                $overload_return[$k] = 'Not A Valid Value';
            }
            //$this->$k = $from[sprintf($format,$k)];
        }
        if ($overload_return) {
            return $overload_return;
        }
        return true;
    }

    /**
     * Returns an associative array from the current data
     * (kind of oblivates the idea behind DataObjects, but
     * is usefull if you use it with things like QuickForms.
     *
     * you can use the format to return things like user[key]
     * by sending it $object->toArray('user[%s]')
     *
     * will also return links converted to arrays.
     *
     * @param   string  sprintf format for array
     * @param   bool||number    [true = elemnts that have a value set],
     *                          [false = table + returned colums] ,
     *                          [0 = returned columsn only]
     *
     * @access   public
     * @return   array of key => value for row
     */

    function toArray($format = '%s', $hideEmpty = false) 
    {
        global $_DB_DATAOBJECT;
        
        // we use false to ignore sprintf.. (speed up..)
        $format = $format == '%s' ? false : $format;
        
        $ret = array();
        $rf = ($this->_resultFields !== false) ? $this->_resultFields : 
                (isset($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid]) ?
                 $_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid] : false);
        
        $ar = ($rf !== false) ?
            (($hideEmpty === 0) ? $rf : array_merge($rf, $this->table())) :
            $this->table();

        foreach($ar as $k=>$v) {
             
            if (!isset($this->$k)) {
                if (!$hideEmpty) {
                    $ret[$format === false ? $k : sprintf($format,$k)] = '';
                }
                continue;
            }
            // call the overloaded getXXXX() method. - except getLink and getLinks
            if (method_exists($this,'get'.$k) && !in_array(strtolower($k),array('links','link'))) {
                $ret[$format === false ? $k : sprintf($format,$k)] = $this->{'get'.$k}();
                continue;
            }
            // should this call toValue() ???
            $ret[$format === false ? $k : sprintf($format,$k)] = $this->$k;
        }
        if (!$this->_link_loaded) {
            return $ret;
        }
        foreach($this->_link_loaded as $k) {
            $ret[$format === false ? $k : sprintf($format,$k)] = $this->$k->toArray();
        
        }
        
        return $ret;
    }

    /**
     * validate the values of the object (usually prior to inserting/updating..)
     *
     * Note: This was always intended as a simple validation routine.
     * It lacks understanding of field length, whether you are inserting or updating (and hence null key values)
     *
     * This should be moved to another class: DB_DataObject_Validate 
     *      FEEL FREE TO SEND ME YOUR VERSION FOR CONSIDERATION!!!
     *
     * Usage:
     * if (is_array($ret = $obj->validate())) { ... there are problems with the data ... }
     *
     * Logic:
     *   - defaults to only testing strings/numbers if numbers or strings are the correct type and null values are correct
     *   - validate Column methods : "validate{ROWNAME}()"  are called if they are defined.
     *            These methods should return 
     *                  true = everything ok
     *                  false|object = something is wrong!
     * 
     *   - This method loads and uses the PEAR Validate Class.
     *
     *
     * @access  public
     * @return  array of validation results (where key=>value, value=false|object if it failed) or true (if they all succeeded)
     */
    function validate()
    {
        global $_DB_DATAOBJECT;
        require_once 'Validate.php';
        $table = $this->table();
        $ret   = array();
        $seq   = $this->sequenceKey();
        $options = $_DB_DATAOBJECT['CONFIG'];
        foreach($table as $key => $val) {
            
            
            // call user defined validation always...
            $method = "Validate" . ucfirst($key);
            if (method_exists($this, $method)) {
                $ret[$key] = $this->$method();
                continue;
            }
            
            // if not null - and it's not set.......
            
            if ($val & DB_DATAOBJECT_NOTNULL && DB_DataObject::_is_null($this, $key)) {
                // dont check empty sequence key values..
                if (($key == $seq[0]) && ($seq[1] == true)) {
                    continue;
                }
                $ret[$key] = false;
                continue;
            }
            
            
             if (DB_DataObject::_is_null($this, $key)) {
                if ($val & DB_DATAOBJECT_NOTNULL) {
                    $this->debug("'null' field used for '$key', but it is defined as NOT NULL", 'VALIDATION', 4);
                    $ret[$key] = false;
                    continue;
                }
                continue;
            }

            // ignore things that are not set. ?
           
            if (!isset($this->$key)) {
                continue;
            }
            
            // if the string is empty.. assume it is ok..
            if (!is_object($this->$key) && !is_array($this->$key) && !strlen((string) $this->$key)) {
                continue;
            }
            
            // dont try and validate cast objects - assume they are problably ok..
            if (is_object($this->$key) && is_a($this->$key,'DB_DataObject_Cast')) {
                continue;
            }
            // at this point if you have set something to an object, and it's not expected
            // the Validate will probably break!!... - rightly so! (your design is broken, 
            // so issuing a runtime error like PEAR_Error is probably not appropriate..
            
            switch (true) {
                // todo: date time.....
                case  ($val & DB_DATAOBJECT_STR):
                    $ret[$key] = Validate::string($this->$key, VALIDATE_PUNCTUATION . VALIDATE_NAME);
                    continue;
                case  ($val & DB_DATAOBJECT_INT):
                    $ret[$key] = Validate::number($this->$key, array('decimal'=>'.'));
                    continue;
            }
        }
        // if any of the results are false or an object (eg. PEAR_Error).. then return the array..
        foreach ($ret as $key => $val) {
            if ($val !== true) {
                return $ret;
            }
        }
        return true; // everything is OK.
    }

    /**
     * Gets the DB object related to an object - so you can use funky peardb stuf with it :)
     *
     * @access public
     * @return object The DB connection
     */
    function getDatabaseConnection()
    {
        global $_DB_DATAOBJECT;

        if (($e = $this->_connect()) !== true) {
            return $e;
        }
        if (!isset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $r = false;
            return $r;
        }
        return $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5];
    }
 
 
    /**
     * Gets the DB result object related to the objects active query
     *  - so you can use funky pear stuff with it - like pager for example.. :)
     *
     * @access public
     * @return object The DB result object
     */
     
    function getDatabaseResult()
    {
        global $_DB_DATAOBJECT;
        $this->_connect();
        if (!isset($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid])) {
            $r = false;
            return $r;
        }
        return $_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid];
    }

    /**
     * Overload Extension support
     *  - enables setCOLNAME/getCOLNAME
     *  if you define a set/get method for the item it will be called.
     * otherwise it will just return/set the value.
     * NOTE this currently means that a few Names are NO-NO's 
     * eg. links,link,linksarray, from, Databaseconnection,databaseresult
     *
     * note 
     *  - set is automatically called by setFrom.
     *   - get is automatically called by toArray()
     *  
     * setters return true on success. = strings on failure
     * getters return the value!
     *
     * this fires off trigger_error - if any problems.. pear_error, 
     * has problems with 4.3.2RC2 here
     *
     * @access public
     * @return true?
     * @see overload
     */

    
    function _call($method,$params,&$return) {
        
        //$this->debug("ATTEMPTING OVERLOAD? $method");
        // ignore constructors : - mm
        if (strtolower($method) == strtolower(get_class($this))) {
            return true;
        }
        $type = strtolower(substr($method,0,3));
        $class = get_class($this);
        if (($type != 'set') && ($type != 'get')) {
            return false;
        }
         
        
        
        // deal with naming conflick of setFrom = this is messy ATM!
        
        if (strtolower($method) == 'set_from') {
            $return = $this->toValue('from',isset($params[0]) ? $params[0] : null);
            return  true;
        }
        
        $element = substr($method,3);
        
        // dont you just love php's case insensitivity!!!!
        
        $array =  array_keys(get_class_vars($class));
        /* php5 version which segfaults on 5.0.3 */
        if (class_exists('ReflectionClass')) {
            $reflection = new ReflectionClass($class);
            $array = array_keys($reflection->getdefaultProperties());
        }
        
        if (!in_array($element,$array)) {
            // munge case
            foreach($array as $k) {
                $case[strtolower($k)] = $k;
            }
            if ((substr(phpversion(),0,1) == 5) && isset($case[strtolower($element)])) {
                trigger_error("PHP5 set/get calls should match the case of the variable",E_USER_WARNING);
                $element = strtolower($element);
            }
            
            // does it really exist?
            if (!isset($case[$element])) {
                return false;            
            }
            // use the mundged case
            $element = $case[$element]; // real case !
        }
        
        
        if ($type == 'get') {
            $return = $this->toValue($element,isset($params[0]) ? $params[0] : null);
            return true;
        }
        
        
        $return = $this->fromValue($element, $params[0]);
         
        return true;
            
          
    }
        
    
    /**
    * standard set* implementation.
    *
    * takes data and uses it to set dates/strings etc.
    * normally called from __call..  
    *
    * Current supports
    *   date      = using (standard time format, or unixtimestamp).... so you could create a method :
    *               function setLastread($string) { $this->fromValue('lastread',strtotime($string)); }
    *
    *   time      = using strtotime 
    *   datetime  = using  same as date - accepts iso standard or unixtimestamp.
    *   string    = typecast only..
    * 
    * TODO: add formater:: eg. d/m/Y for date! ???
    *
    * @param   string       column of database
    * @param   mixed        value to assign
    *
    * @return   true| false     (False on error)
    * @access   public 
    * @see      DB_DataObject::_call
    */
  
    
    function fromValue($col,$value) 
    {
        global $_DB_DATAOBJECT;
        $options = $_DB_DATAOBJECT['CONFIG'];
        $cols = $this->table();
        // dont know anything about this col..
        if (!isset($cols[$col]) || is_a($value, 'DB_DataObject_Cast')) {
            $this->$col = $value;
            return true;
        }
        //echo "FROM VALUE $col, {$cols[$col]}, $value\n";
        switch (true) {
            // set to null and column is can be null...
            case ((!($cols[$col] & DB_DATAOBJECT_NOTNULL)) && DB_DataObject::_is_null($value, false)):
            case (is_object($value) && is_a($value,'DB_DataObject_Cast')): 
                $this->$col = $value;
                return true;
                
            // fail on setting null on a not null field..
            case (($cols[$col] & DB_DATAOBJECT_NOTNULL) && DB_DataObject::_is_null($value,false)):

                return false;
        
            case (($cols[$col] & DB_DATAOBJECT_DATE) &&  ($cols[$col] & DB_DATAOBJECT_TIME)):
                // empty values get set to '' (which is inserted/updated as NULl
                if (!$value) {
                    $this->$col = '';
                }
            
                if (is_numeric($value)) {
                    $this->$col = date('Y-m-d H:i:s', $value);
                    return true;
                }
              
                // eak... - no way to validate date time otherwise...
                $this->$col = (string) $value;
                return true;
            
            case ($cols[$col] & DB_DATAOBJECT_DATE):
                // empty values get set to '' (which is inserted/updated as NULl
                 
                if (!$value) {
                    $this->$col = '';
                    return true; 
                }
            
                if (is_numeric($value)) {
                    $this->$col = date('Y-m-d',$value);
                    return true;
                }
                 
                // try date!!!!
                require_once 'Date.php';
                $x = new Date($value);
                $this->$col = $x->format("%Y-%m-%d");
                return true;
            
            case ($cols[$col] & DB_DATAOBJECT_TIME):
                // empty values get set to '' (which is inserted/updated as NULl
                if (!$value) {
                    $this->$col = '';
                }
            
                $guess = strtotime($value);
                if ($guess != -1) {
                     $this->$col = date('H:i:s', $guess);
                    return $return = true;
                }
                // otherwise an error in type...
                return false;
            
            case ($cols[$col] & DB_DATAOBJECT_STR):
                
                $this->$col = (string) $value;
                return true;
                
            // todo : floats numerics and ints...
            default:
                $this->$col = $value;
                return true;
        }
    
    
    
    }
     /**
    * standard get* implementation.
    *
    *  with formaters..
    * supported formaters:  
    *   date/time : %d/%m/%Y (eg. php strftime) or pear::Date 
    *   numbers   : %02d (eg. sprintf)
    *  NOTE you will get unexpected results with times like 0000-00-00 !!!
    *
    *
    * 
    * @param   string       column of database
    * @param   format       foramt
    *
    * @return   true     Description
    * @access   public 
    * @see      DB_DataObject::_call(),strftime(),Date::format()
    */
    function toValue($col,$format = null) 
    {
        if (is_null($format)) {
            return $this->$col;
        }
        $cols = $this->table();
        switch (true) {
            case (($cols[$col] & DB_DATAOBJECT_DATE) &&  ($cols[$col] & DB_DATAOBJECT_TIME)):
                if (!$this->$col) {
                    return '';
                }
                $guess = strtotime($this->$col);
                if ($guess != -1) {
                    return strftime($format, $guess);
                }
                // eak... - no way to validate date time otherwise...
                return $this->$col;
            case ($cols[$col] & DB_DATAOBJECT_DATE):
                if (!$this->$col) {
                    return '';
                } 
                $guess = strtotime($this->$col);
                if ($guess != -1) {
                    return strftime($format,$guess);
                }
                // try date!!!!
                require_once 'Date.php';
                $x = new Date($this->$col);
                return $x->format($format);
                
            case ($cols[$col] & DB_DATAOBJECT_TIME):
                if (!$this->$col) {
                    return '';
                }
                $guess = strtotime($this->$col);
                if ($guess > -1) {
                    return strftime($format, $guess);
                }
                // otherwise an error in type...
                return $this->$col;
                
            case ($cols[$col] &  DB_DATAOBJECT_MYSQLTIMESTAMP):
                if (!$this->$col) {
                    return '';
                }
                require_once 'Date.php';
                
                $x = new Date($this->$col);
                
                return $x->format($format);
            
             
            case ($cols[$col] &  DB_DATAOBJECT_BOOL):
                
                if ($cols[$col] &  DB_DATAOBJECT_STR) {
                    // it's a 't'/'f' !
                    return ($this->$col === 't');
                }
                return (bool) $this->$col;
            
               
            default:
                return sprintf($format,$this->col);
        }
            

    }
    
    
    /* ----------------------- Debugger ------------------ */

    /**
     * Debugger. - use this in your extended classes to output debugging information.
     *
     * Uses DB_DataObject::DebugLevel(x) to turn it on
     *
     * @param    string $message - message to output
     * @param    string $logtype - bold at start
     * @param    string $level   - output level
     * @access   public
     * @return   none
     */
    function debug($message, $logtype = 0, $level = 1)
    {
        global $_DB_DATAOBJECT;

        if (empty($_DB_DATAOBJECT['CONFIG']['debug'])  || 
            (is_numeric($_DB_DATAOBJECT['CONFIG']['debug']) &&  $_DB_DATAOBJECT['CONFIG']['debug'] < $level)) {
            return;
        }
        // this is a bit flaky due to php's wonderfull class passing around crap..
        // but it's about as good as it gets..
        $class = (isset($this) && is_a($this,'DB_DataObject')) ? get_class($this) : 'DB_DataObject';
        
        if (!is_string($message)) {
            $message = print_r($message,true);
        }
        if (!is_numeric( $_DB_DATAOBJECT['CONFIG']['debug']) && is_callable( $_DB_DATAOBJECT['CONFIG']['debug'])) {
            return call_user_func($_DB_DATAOBJECT['CONFIG']['debug'], $class, $message, $logtype, $level);
        }
        
        if (!ini_get('html_errors')) {
            echo "$class   : $logtype       : $message\n";
            flush();
            return;
        }
        if (!is_string($message)) {
            $message = print_r($message,true);
        }
        $colorize = ($logtype == 'ERROR') ? '<font color="red">' : '<font>';
        echo "<code>{$colorize}<B>$class: $logtype:</B> ". nl2br(htmlspecialchars($message)) . "</font></code><BR>\n";
    }

    /**
     * sets and returns debug level
     * eg. DB_DataObject::debugLevel(4);
     *
     * @param   int     $v  level
     * @access  public
     * @return  none
     */
    static function debugLevel($v = null)
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        if ($v !== null) {
            $r = isset($_DB_DATAOBJECT['CONFIG']['debug']) ? $_DB_DATAOBJECT['CONFIG']['debug'] : 0;
            $_DB_DATAOBJECT['CONFIG']['debug']  = $v;
            return $r;
        }
        return isset($_DB_DATAOBJECT['CONFIG']['debug']) ? $_DB_DATAOBJECT['CONFIG']['debug'] : 0;
    }

    /**
     * Last Error that has occured
     * - use $this->_lastError or
     * $last_error = PEAR::getStaticProperty('DB_DataObject','lastError');
     *
     * @access  public
     * @var     object PEAR_Error (or false)
     */
    var $_lastError = false;

    /**
     * Default error handling is to create a pear error, but never return it.
     * if you need to handle errors you should look at setting the PEAR_Error callback
     * this is due to the fact it would wreck havoc on the internal methods!
     *
     * @param  int $message    message
     * @param  int $type       type
     * @param  int $behaviour  behaviour (die or continue!);
     * @access public
     * @return error object
     */
    function raiseError($message, $type = null, $behaviour = null)
    {
        global $_DB_DATAOBJECT;
        
        if ($behaviour == PEAR_ERROR_DIE && !empty($_DB_DATAOBJECT['CONFIG']['dont_die'])) {
            $behaviour = null;
        }
        
        $error = &PEAR::getStaticProperty('DB_DataObject','lastError');
        
      
        // no checks for production here?....... - we log  errors before we throw them.
        DB_DataObject::debug($message,'ERROR',1);
        
        
        if (PEAR::isError($message)) {
            $error = $message;
        } else {
            require_once 'DB/DataObject/Error.php';
            $dor = new PEAR();
            $error = $dor->raiseError($message, $type, $behaviour,
                            $opts=null, $userinfo=null, 'DB_DataObject_Error'
                        );
        }
        // this will never work totally with PHP's object model.
        // as this is passed on static calls (like staticGet in our case)
 
        $_DB_DATAOBJECT['LASTERROR'] = $error;
        
        if (isset($this) && is_object($this) && is_subclass_of($this,'db_dataobject')) {
            $this->_lastError = $error;
        }
   
        return $error;
    }

    /**
     * Define the global $_DB_DATAOBJECT['CONFIG'] as an alias to  PEAR::getStaticProperty('DB_DataObject','options');
     *
     * After Profiling DB_DataObject, I discoved that the debug calls where taking
     * considerable time (well 0.1 ms), so this should stop those calls happening. as
     * all calls to debug are wrapped with direct variable queries rather than actually calling the funciton
     * THIS STILL NEEDS FURTHER INVESTIGATION
     *
     * @access   public
     * @return   object an error object
     */
    function _loadConfig()
    {
        global $_DB_DATAOBJECT;

        $_DB_DATAOBJECT['CONFIG'] = &PEAR::getStaticProperty('DB_DataObject','options');


    }
     /**
     * Free global arrays associated with this object.
     *
     *
     * @access   public
     * @return   none
     */
    function free() 
    {
        global $_DB_DATAOBJECT;
          
        if (isset($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid])) {
            unset($_DB_DATAOBJECT['RESULTFIELDS'][$this->_DB_resultid]);
        }
        if (isset($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid])) {     
            unset($_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid]);
        }
        // clear the staticGet cache as well.
        $this->_clear_cache();
        // this is a huge bug in DB!
        if (isset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5])) {
            $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->num_rows = array();
        }

        if (is_array($this->_link_loaded)) {
            foreach ($this->_link_loaded as $do) {
                if (
                        !empty($this->{$do}) &&
                        is_object($this->{$do}) &&
                        method_exists($this->{$do}, 'free')
                    ) {
                    $this->{$do}->free();
                }
            }
        }

        
    }
    /**
    * Evaluate whether or not a value is set to null, taking the 'disable_null_strings' option into account.
    * If the value is a string set to "null" and the "disable_null_strings" option is not set to 
    * true, then the value is considered to be null.
    * If the value is actually a PHP NULL value, and "disable_null_strings" has been set to 
    * the value "full", then it will also be considered null. - this can not differenticate between not set
    * 
    * 
    * @param  object|array $obj_or_ar 
    * @param  string|false $prop prperty
    
    * @access private
    * @return bool  object
    */
    function _is_null($obj_or_ar , $prop) 
    {
    	global $_DB_DATAOBJECT;
    	
        
        $isset = $prop === false ? isset($obj_or_ar) : 
            (is_array($obj_or_ar) ? isset($obj_or_ar[$prop]) : isset($obj_or_ar->$prop));
        
        $value = $isset ? 
            ($prop === false ? $obj_or_ar : 
                (is_array($obj_or_ar) ? $obj_or_ar[$prop] : $obj_or_ar->$prop))
            : null;
        
        
        
    	$options = $_DB_DATAOBJECT['CONFIG'];
    	
        $null_strings = !isset($options['disable_null_strings'])
                    || $options['disable_null_strings'] === false;
                    
        $crazy_null = isset($options['disable_null_strings'])
                && is_string($options['disable_null_strings'])
                && strtolower($options['disable_null_strings'] === 'full');
        
        if ( $null_strings && $isset  && is_string($value)  && (strtolower($value) === 'null') ) {
            return true;
        }
        
        if ( $crazy_null && !$isset )  {
        	return true;
        }
        
        return false;
        
    	
    }
    
    /**
     * (deprecated - use ::get / and your own caching method)
     */
    static function staticGet($class, $k, $v = null)
    {
        $lclass = strtolower($class);
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }

        

        $key = "$k:$v";
        if ($v === null) {
            $key = $k;
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            DB_DataObject::debug("$class $key","STATIC GET - TRY CACHE");
        }
        if (!empty($_DB_DATAOBJECT['CACHE'][$lclass][$key])) {
            return $_DB_DATAOBJECT['CACHE'][$lclass][$key];
        }
        if (!empty($_DB_DATAOBJECT['CONFIG']['debug'])) {
            DB_DataObject::debug("$class $key","STATIC GET - NOT IN CACHE");
        }

        $obj = DB_DataObject::factory(substr($class,strlen($_DB_DATAOBJECT['CONFIG']['class_prefix'])));
        if (PEAR::isError($obj)) {
            $dor = new DB_DataObject();
            $dor->raiseError("could not autoload $class", DB_DATAOBJECT_ERROR_NOCLASS);
            $r = false;
            return $r;
        }
        
        if (!isset($_DB_DATAOBJECT['CACHE'][$lclass])) {
            $_DB_DATAOBJECT['CACHE'][$lclass] = array();
        }
        if (!$obj->get($k,$v)) {
            $dor = new DB_DataObject();
            $dor->raiseError("No Data return from get $k $v", DB_DATAOBJECT_ERROR_NODATA);
            
            $r = false;
            return $r;
        }
        $_DB_DATAOBJECT['CACHE'][$lclass][$key] = $obj;
        return $_DB_DATAOBJECT['CACHE'][$lclass][$key];
    }
    
    /**
     * autoload Class relating to a table
     * (deprecited - use ::factory)
     *
     * @param  string  $table  table
     * @access private
     * @return string classname on Success
     */
    function staticAutoloadTable($table)
    {
        global $_DB_DATAOBJECT;
        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        $p = isset($_DB_DATAOBJECT['CONFIG']['class_prefix']) ?
            $_DB_DATAOBJECT['CONFIG']['class_prefix'] : '';
        $class = $p . preg_replace('/[^A-Z0-9]/i','_',ucfirst($table));
        
        $ce = substr(phpversion(),0,1) > 4 ? class_exists($class,false) : class_exists($class);
        $class = $ce ? $class  : DB_DataObject::_autoloadClass($class);
        return $class;
    }
    
    /* ---- LEGACY BC METHODS - NOT DOCUMENTED - See Documentation on New Methods. ---*/
    
    function _get_table() { return $this->table(); }
    function _get_keys()  { return $this->keys();  }
    
    
    
    
}
// technially 4.3.2RC1 was broken!!
// looks like 4.3.3 may have problems too....
if (!defined('DB_DATAOBJECT_NO_OVERLOAD')) {

    if ((phpversion() != '4.3.2-RC1') && (version_compare( phpversion(), "4.3.1") > 0)) {
        if (version_compare( phpversion(), "5") < 0) {
           overload('DB_DataObject');
        } 
        $GLOBALS['_DB_DATAOBJECT']['OVERLOADED'] = true;
    }
}


