<?php

/**
 * Defines the attributes for sop_type 
 * Project:     Logicmind
 * File:        SopType.class.php
 *
 * @author Ananthakumar V
 * @since 10/02/2017
 * @package admin
 * @version 1.0
 */
class SopType extends DB_Public_lm_sop_type {
    /** Attributes */

    /**
     * represents the id of the SopType
     * @var character varying(50)
     */
    var $object_id;

    /**
     * represents the types of the SopType
     * @var character varying(20)
     */
    var $type;

    /**
     * represents the description of the SopType
     * @var character varying(50)
     */
    var $description;

    /**
     * represents the creator of the SopType
     * @var character varying(50)
     */
    var $creator;

    /**
     * represents the modifier of the SopType
     * @var character varying(50)
     */
    var $modifier;

    /**
     * represents the Created Time of the SopType
     * @var character varying(50)
     */
    var $created_time;

    /**
     * represents the Modified Time of the SopType
     * @var character varying(50)
     */
    var $modified_time;

    /**
     * represents the Is Enabled Time of the SopType
     * @var character varying(50)
     */
    var $is_enabled;

    /** Functions */

    /**
     * Get the name of the SopType
     * @param string $object_id is the id of SopType.
     */
    function get_sop_type($oid) {
        $this->get("object_id", $oid);
        return $this->type;
    }

    /**
     *  Get the SopType list
     */
    function sop_type_list($is_enabled = null) {
        $soplist = array();
        if (!empty($is_enabled)) {
            $this->whereAdd("is_enabled='$is_enabled'");
        }
        $this->orderBy('type');
        $this->find();
        while ($this->fetch()) {
            $soplist[] = clone $this;
        }
        return $soplist;
    }

    function sop_type_list_details($is_enabled = null) {
        $sop_type_details = new DB_Public_lm_sop_type();
        if (!empty($is_enabled)) {
            $sop_type_details->whereAdd("is_enabled='$is_enabled'");
        }
        $sop_type_details->orderBy('type');
        $sop_type_details->find();
        $count = 0;
        while ($sop_type_details->fetch()) {
            $soptypedetails[$count]['object_id'] = $sop_type_details->object_id;
            $soptypedetails[$count]['type'] = $sop_type_details->type;
            $soptypedetails[$count]['description'] = $sop_type_details->description;
            $soptypedetails[$count]['creator'] = getUserName($sop_type_details->creator);
            $soptypedetails[$count]['created_time'] = $sop_type_details->created_time;
            $soptypedetails[$count]['modifier'] = getUserName($sop_type_details->modifier);
            $soptypedetails[$count]['modified_time'] = $sop_type_details->modified_time;
            $soptypedetails[$count]['is_enabled'] = $sop_type_details->is_enabled;
            $count++;
        }
        return $soptypedetails;
    }

}

?>