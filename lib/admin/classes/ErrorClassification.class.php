<?php
class ErrorClassification extends DB_Public_lm_error_classification_master
{

    /** Attributes */
    var $object_id;
    var $type;
    var $created_by;
    var $created_time;
    var $modified_by;
    var $modified_time;


    function ErrorClassificationList()
    {
        $obj = new DB_Public_lm_error_classification_master();
        $obj->orderBy('object_id');
        $obj->find();
        while ($obj->fetch()) {
            $errorClassifications[] = [
                'objectId' => $obj->object_id,
                'type' => $obj->type,
                'createdBy' => $obj->created_by,
                'createdTime' => $obj->created_time,
                'modifiedBy' => $obj->modified_by,
                'modifiedTime' => $obj->modified_time
            ];
        }
        return $errorClassifications;
    }

}

?>