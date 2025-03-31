<?php

class Sequence {

    function get_next_sequence() {
        $sequence_object = new DB_Public_sequence();
        $sequence_object->limit(1);
        $sequence_object->find();
        if ($sequence_object->fetch()) {
            $count = $sequence_object->id;
            $count1 = $sequence_object->id + 1;
            $sequence_object->delete();
            $insert_object = new DB_Public_sequence();
            $insert_object->id = $count1;
            $insert_object->insert();
            return $count;
        }
    }

    function get_next_session_sequence() {
        $sequence_object = new DB_Public_session_sequence();
        $sequence_object->limit(1);
        $sequence_object->find();
        if ($sequence_object->fetch()) {
            $count = $sequence_object->seq_number + 1;
            $sequence_object->delete();
            $insert_object = new DB_Public_session_sequence();
            $insert_object->seq_number = $count;
            $insert_object->insert();
            return $count;
        } else {
            $count = 300000;
            $object = new DB_Public_session_sequence();
            $object->seq_number = $count;
            $object->insert();
            return $count;
        }
    }

    function get_objectid_sequence() {
        $objectid_sequence = new DB_Public_usersession_objectid_sequence();
        $objectid_sequence->limit(1);
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $count = $objectid_sequence->object_id + 1;
            $objectid_sequence->delete();
            $insert_object = new DB_Public_usersession_objectid_sequence();
            $insert_object->object_id = $count;
            $insert_object->insert();
            $object_id = sprintf("%03d", $count);
            $object_id = "usersession:" . $object_id;
            return $object_id;
        } else {
            $count = 1;
            $insert_object = new DB_Public_usersession_objectid_sequence();
            $insert_object->object_id = $count;
            $insert_object->insert();
            return "usersession:001";
        }
    }

    function sop_draft_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            $number_sequence = $prefix . "/" . $body_object;
            return $number_sequence;
        } else {
            return "invalid_type";
        }
    }

    function get_ticket_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            //$number_sequence =$prefix." ".$body_object." ".$suffix;
            $number_sequence = $prefix . "-" . $body_object;
            return $number_sequence;
        }
    }

    function sop_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            //$number_sequence =$prefix." ".$body_object." ".$suffix;
            $number_sequence = $prefix . "/" . $body_object;
            return $number_sequence;
        } else {
            return "invalid_type";
        }
    }

    function request_id_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            //$number_sequence =$prefix." ".$body_object." ".$suffix;
            $number_sequence = $body_object;
            return $number_sequence;
        }
    }

    function update_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $zerofill = strlen($body_object);
            $body_value = intval($body_object);
            $val = $body_value + 1;
            $body = str_pad($val, $zerofill, "0", STR_PAD_LEFT);

            $sequence = new DB_Public_numbering_order();
            $sequence->whereAdd("business_object = '$business_obj' ");
            $sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
            $sequence->body = $body;
            $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
    }

    function get_annexure_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_annexure_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $number_sequence_no = "A" . $body_object;
            return $number_sequence_no;
        } else {
            $sequence = new DB_Public_lm_sop_annexure_no_seq();
            $sequence->sop_object_id = $sop_object_id;
            $sequence->body = "01";
            $sequence->insert();

            $num_sequence = new DB_Public_lm_sop_annexure_no_seq();
            $num_sequence->whereAdd("sop_object_id = '$sop_object_id'");
            $num_sequence->find();
            if ($num_sequence->fetch()) {
                $body_object = $num_sequence->body;
                $number_sequence_no = "A" . $body_object;
                return $number_sequence_no;
            }
        }
    }

    function get_annexure_desc_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_annexure_desc_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $number_desc_sequence_no = "ANNEXURE-" . $body_object;
            return $number_desc_sequence_no;
        } else {
            $sequence = new DB_Public_lm_sop_annexure_desc_no_seq();
            $sequence->sop_object_id = $sop_object_id;
            $sequence->body = "1";
            $sequence->insert();

            $num_sequence = new DB_Public_lm_sop_annexure_desc_no_seq();
            $num_sequence->whereAdd("sop_object_id = '$sop_object_id'");
            $num_sequence->find();
            if ($num_sequence->fetch()) {
                $body_object = $num_sequence->body;
                $number_desc_sequence_no = "ANNEXURE-" . $body_object;
                return $number_desc_sequence_no;
            }
        }
    }

    function get_format_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_format_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $number_sequence_no = "F" . $body_object;
            return $number_sequence_no;
        } else {
            $sequence = new DB_Public_lm_sop_format_no_seq();
            $sequence->sop_object_id = $sop_object_id;
            $sequence->body = "01";
            $sequence->insert();

            $num_sequence = new DB_Public_lm_sop_format_no_seq();
            $num_sequence->whereAdd("sop_object_id = '$sop_object_id'");
            $num_sequence->find();
            if ($num_sequence->fetch()) {
                $body_object = $num_sequence->body;
                $number_sequence_no = "F" . $body_object;
                return $number_sequence_no;
            }
        }
    }

    function get_format_desc_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_format_desc_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $number_desc_sequence_no = "FORMAT-" . $body_object;
            return $number_desc_sequence_no;
        } else {
            $sequence = new DB_Public_lm_sop_format_desc_no_seq();
            $sequence->sop_object_id = $sop_object_id;
            $sequence->body = "1";
            $sequence->insert();

            $num_sequence = new DB_Public_lm_sop_format_desc_no_seq();
            $num_sequence->whereAdd("sop_object_id = '$sop_object_id'");
            $num_sequence->find();
            if ($num_sequence->fetch()) {
                $body_object = $num_sequence->body;
                $number_desc_sequence_no = "FORMAT-" . $body_object;
                return $number_desc_sequence_no;
            }
        }
    }

    function update_annexure_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_annexure_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $zerofill = strlen($body_object);
            $body_value = intval($body_object);
            $val = $body_value + 1;
            $body = str_pad($val, $zerofill, "0", STR_PAD_LEFT);

            $sequence = new DB_Public_lm_sop_annexure_no_seq();
            $sequence->whereAdd("sop_object_id = '$sop_object_id' ");
            $sequence->body = $body;
            $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
    }

    function update_annexure_desc_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_annexure_desc_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $body_value = intval($body_object);
            $val = $body_value + 1;

            $sequence = new DB_Public_lm_sop_annexure_desc_no_seq();
            $sequence->whereAdd("sop_object_id = '$sop_object_id' ");
            $sequence->body = $val;
            $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
    }

    function update_format_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_format_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $zerofill = strlen($body_object);
            $body_value = intval($body_object);
            $val = $body_value + 1;
            $body = str_pad($val, $zerofill, "0", STR_PAD_LEFT);

            $sequence = new DB_Public_lm_sop_format_no_seq();
            $sequence->whereAdd("sop_object_id = '$sop_object_id' ");
            $sequence->body = $body;
            $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
    }

    function update_format_desc_number_sequence($sop_object_id) {
        $objectid_sequence = new DB_Public_lm_sop_format_desc_no_seq();
        $objectid_sequence->whereAdd("sop_object_id = '$sop_object_id'");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $body_object = $objectid_sequence->body;
            $body_value = intval($body_object);
            $val = $body_value + 1;

            $sequence = new DB_Public_lm_sop_format_desc_no_seq();
            $sequence->whereAdd("sop_object_id = '$sop_object_id' ");
            $sequence->body = $val;
            $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
    }

    /** STP,GTP,Policy,QM,Protocol start */
    function draft_number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            $number_sequence = $prefix . "/" . $body_object;
            return $number_sequence;
        } else {
            return "invalid_type";
        }
    }

    function number_sequence($business_obj, $sub_business_obj) {
        $objectid_sequence = new DB_Public_numbering_order();
        $objectid_sequence->whereAdd("business_object = '$business_obj' ");
        $objectid_sequence->whereAdd("sub_business_object = '$sub_business_obj' ");
        $objectid_sequence->find();
        if ($objectid_sequence->fetch()) {
            $prefix = $objectid_sequence->prefix;
            $suffix = $objectid_sequence->suffix;
            $body_object = $objectid_sequence->body;
            $number_sequence = $prefix . "/" . $body_object;
            return $number_sequence;
        } else {
            return "invalid_type";
        }
    }

    /** STP End */
}

?>
