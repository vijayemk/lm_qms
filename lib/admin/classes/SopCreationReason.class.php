
<?php

/**
 * Defines the attributes for SopCreationReason
 * Project:     LogicMind
 * File:      SopCreationReason.class.php
 *
 * @author Ananthakumar V
 * @since 03/04/2019
 * @package admin
 * @version 1.0
 */
class SopCreationReason extends DB_Public_lm_sop_creation_reason_list {
    /** Attributes */

    /**
     * represents the id of the lm_sop_creation_reason_list
     * @var string
     */
    var $object_id;

    /**
     * represents the reason
     * @var string
     */
    var $reason;

    /**
     * represents the created_by
     * @var string
     */
    var $created_by;

    /**
     * represents the created_time
     * @var string
     */
    var $created_time;

    /** Functions */
    function sop_reason_list() {
        $reasonlist = array();
        $this->orderBy('reason');
        $this->find();
        while ($this->fetch()) {

            $reasonlist[] = array('object_id' => $this->object_id, 'reason' => $this->reason, 'created_by' => getFullName($this->created_by), 'created_time' => $this->created_time);
        }
        return $reasonlist;
    }

}

?>
