<?php
/**
 * Defines the attributes for operation
 * Project:     LogicMind
 * File:  LmDocList.class.php
 *
 * @author Ananthakumar V
 * @since 12/12/2018
 * @package admin
 * @version 1.0
*/
class LmDocList extends DB_Public_lm_doc_list {
    /**
    * represents the object_id of the lm_Doc
    * @var string
    */
    var $object_id;
    
    /**
    * represents the u_key of the lm_Doc
    * @var string
    */
    var $u_key;
    
    
    /** Attributes 
     * represents the doc_name of the lm_Doc
     * @var string 
    */
    var $short_name;
    
    /**
    * represents the description of the lm_Doc
    * @var string
    */
    var $doc_name;

    /**
    * represents the created_time of the lm_Doc
    * @var string
    */
    var $doc_code;
    
    /**
    * represents the creator of the lm_Doc
    * @var string
    */
    var $is_enabled;
       
    /**
    * represents the order1 of the lm_Doc
    * @var string
    */
    var $order1;
    

    /** Functions
    * Get the name of the lm_Doc
    * @param string $uid is the id of lm_Doc.
    */
    function get_doc_name($uid) {
        $this->get("object_id",$uid);
        return $this->doc_name;
    }
    
    /**
    *  Get the lm Doc list
    */
    function get_lm_doc_list() {
        $lmdoclist= array();
        $this->orderBy('doc_name');
        $this->find();
        while($this->fetch()){
            $lmdoclist[] = clone $this;
        }
        return $lmdoclist;
    }
    function get_lm_doc_detaillist(){
        $this->orderBy('doc_code');
        $this->find();
        $count = 1;
        while($this->fetch()){
            $doclist[]=array(
                'short_name'=>$this->short_name,'object_id'=>$this->object_id,'u_key'=>$this->u_key,'doc_name'=>$this->doc_name,'doc_code'=>$this->doc_code,
                'is_enabled'=>$this->is_enabled,'order'=>$this->order1,'count'=>$count);
            $count++;
        }
        asort($doclist);
        return $doclist;
    }
}

?>
