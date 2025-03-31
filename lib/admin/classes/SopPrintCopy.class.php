<?php

/**
 * Defines the attributes for sop_type 
 * Project:     Logicmind
 * File:        SopPrintCopy.class.php
 *
 * @author Ananthakumar V
 * @since 13/03/2017
 * @package admin
 * @version 1.0
 */
class SopPrintCopy extends DB_Public_lm_sop_print_copy {
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
    var $copy_type;

    /**
     * represents the description of the SopType
     * @var character varying(50)
     */
    var $description;

    /** Functions */
    /**
     * Get the name of the SopType
     * @param string $object_id is the id of SopType.
     */

    /**
     * represents the created By of the SopType
     * @var character varying(50)
     */
    var $created_by;

    /**
     * represents the Modified By of the SopType
     * @var character varying(50)
     */
    var $modified_by;

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
     * represents the Copy Type Color Time of the SopType
     * @var character varying(50)
     */
    var $copy_type_color;

    function get_sop_print_copy_type($oid) {
        $this->get("object_id", $oid);
        return $this->copy_type;
    }

    /**
     *  Get the SopType list
     */
    function sop_print_copy_type_list() {
        $sopprintlist = array();
        $this->orderBy('copy_type');
        $this->find();
        while ($this->fetch()) {
            $sopprintlist[] = clone $this;
        }
        return $sopprintlist;
    }

    function sop_print_copy_list_details() {
        $sop_print_copy_details = new DB_Public_lm_sop_print_copy();
        $sop_print_copy_details->orderBy('copy_type');
        $sop_print_copy_details->find();
        $count = 0;
        while ($sop_print_copy_details->fetch()) {
            $soptypedetails[] = array('object_id' => $sop_print_copy_details->object_id, 'copy_type' => $sop_print_copy_details->copy_type, 'description' => $sop_print_copy_details->description,
                'creator' => getUserName($sop_print_copy_details->created_by), 'created_time' => $sop_print_copy_details->created_time, 'modifier' => getUserName($sop_print_copy_details->modified_by),
                'modified_time' => $sop_print_copy_details->modified_time, 'copy_type_color' => $sop_print_copy_details->copy_type_color, 'count' => $count);
            $count++;
        }
        return $soptypedetails;
    }

    function sop_print_copy_list_details_by_userid($user_id, $operation) {
        $pdf_operation = new DB_Public_pdf_operation();
        $pdf_operation->get("operation_name", $operation);

        $sop_pdf_obj = new DB_Public_pdf_permission();
        $sop_pdf_obj->whereAdd("user_id='$user_id'");
        $sop_pdf_obj->whereAdd("operation='$pdf_operation->operation_id'");
        $sop_pdf_obj->find();
        $count = 0;
        while ($sop_pdf_obj->fetch()) {
            $sop_print_copy_details = new DB_Public_lm_sop_print_copy();
            $sop_print_copy_details->get("object_id", $sop_pdf_obj->object);
            //$sop_print_copy_details->whereAdd("object_id='$sop_pdf_obj->object'");
            //$sop_print_copy_details->whereAdd("is_enabled='yes'");
            //if ($sop_print_copy_details->find()) {
            if ($sop_print_copy_details->is_enabled == 'yes') {
                $soptypedetails[$count]['object_id'] = $sop_print_copy_details->object_id;
                $soptypedetails[$count]['copy_type'] = $sop_print_copy_details->copy_type;
                $soptypedetails[$count]['description'] = $sop_print_copy_details->description;
                $soptypedetails[$count]['copy_type_color'] = $sop_print_copy_details->copy_type_color;
                $count++;
            }
            //}
        }
        return $soptypedetails;
    }

}

?>
