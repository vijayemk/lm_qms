<?php

/**
 * File Processor Function
 *
 * class Doc_File_Processor contains functions to retrive the file details of the document.
 * 
 *
 * @author Ananthakumar V
 * @since 24/02/2017
 * @package doc
 * @version 1.0
 */
class Doc_File_Processor
{

    /**
     * This function returns file object for the given file id
     * @param string $file_id 
     * @return object , $file_object
     */
    function getDocFileObject($file_id)
    {
        $file_object = new DB_Public_file();
        $file_object->get("object_id", $file_id);
        $type = $file_object->type;
        $name = $file_object->name;
        $size = $file_object->size;
        $hash = $file_object->hash;
        return $file_object;
    }

    function getLmDocFileObjectArray($object_id)
    {
        $fileobjectarray = array();
        $cnt = 0;
        $count = 1;
        $lm_doc_file_obj = new DB_Public_lm_doc_file();
        $lm_doc_file_obj->whereAdd("object_id='$object_id'");
        $lm_doc_file_obj->find();
        while ($lm_doc_file_obj->fetch()) {
            $file_object = new DB_Public_file();
            $file_object->get("object_id", $lm_doc_file_obj->file_id);
            $type = strtolower(substr(strrchr($file_object->name, "."), 1));
            $fileobjectarray[$cnt]['object_id'] = $file_object->object_id;
            $fileobjectarray[$cnt]['type'] = $type;
            $fileobjectarray[$cnt]['name'] = $file_object->name;
            $fileobjectarray[$cnt]['hash'] = $file_object->hash;
            $fileobjectarray[$cnt]['size'] = $file_object->size;
            $fileobjectarray[$cnt]['attached_by'] = getFullName($lm_doc_file_obj->attached_by);
            $fileobjectarray[$cnt]['attached_date'] = get_modified_date_time_format($lm_doc_file_obj->attached_date);
            $fileobjectarray[$cnt]['count'] = $count++;
            if ($_SESSION['user_id'] == $lm_doc_file_obj->attached_by) {
                $fileobjectarray[$cnt]['can_delete'] = TRUE;
            }
            $cnt++;
        }
        return $fileobjectarray;
    }

    function getLmDmDocFileObjectArray($object_id, $type = null, $ref_object_id = null, $attached_by = null)
    {
        $doc_obj = new DB_Public_lm_dm_doc_file();
        $doc_obj->whereAdd("object_id='$object_id'");
        ($type) ? $doc_obj->whereAdd("type='$type'") : null;
        ($ref_object_id) ? $doc_obj->whereAdd("ref_object_id='$ref_object_id'") : null;
        ($attached_by) ? $doc_obj->whereAdd("attached_by='$attached_by'") : null;

        if ($doc_obj->find()) {
            while ($doc_obj->fetch()) {
                $file_object = new DB_Public_file();
                $file_object->get("object_id", $doc_obj->file_id);
                $type = strtolower(substr(strrchr($file_object->name, "."), 1));
                $can_delete = false;
                if ($_SESSION['user_id'] == $doc_obj->attached_by) {
                    $can_delete = true;
                }
                $fileobjectarray[] = array(
                    'object_id' => $file_object->object_id,
                    'type' => $type,
                    'towards' => $doc_obj->type,
                    'name' => $file_object->name,
                    'hash' => $file_object->hash,
                    'size' => $file_object->size,
                    'friendly_size' => GetFriendlySize($file_object->size),
                    'attached_by' => getFullName($doc_obj->attached_by),
                    'attached_date' => get_modified_date_time_format($doc_obj->attached_date),
                    'can_delete' => $can_delete,
                    'attachment_towards' => $doc_obj->type
                );
            }
            return $fileobjectarray;
        }
        return null;
    }

    function getLmCapaDocFileObjectArray($object_id, $type = null, $ref_object_id = null, $attached_by = null)
    {
        $doc_obj = new DB_Public_lm_capa_doc_file();
        $doc_obj->whereAdd("object_id='$object_id'");
        ($type) ? $doc_obj->whereAdd("type='$type'") : null;
        ($ref_object_id) ? $doc_obj->whereAdd("ref_object_id='$ref_object_id'") : null;
        ($attached_by) ? $doc_obj->whereAdd("attached_by='$attached_by'") : null;

        if ($doc_obj->find()) {
            while ($doc_obj->fetch()) {
                $file_object = new DB_Public_file();
                $file_object->get("object_id", $doc_obj->file_id);
                $type = strtolower(substr(strrchr($file_object->name, "."), 1));
                $can_delete = false;
                if ($_SESSION['user_id'] == $doc_obj->attached_by) {
                    $can_delete = true;
                }
                $fileobjectarray[] = array(
                    'object_id' => $file_object->object_id,
                    'type' => $type,
                    'towards' => $doc_obj->type,
                    'name' => $file_object->name,
                    'hash' => $file_object->hash,
                    'size' => $file_object->size,
                    'friendly_size' => GetFriendlySize($file_object->size),
                    'attached_by' => getFullName($doc_obj->attached_by),
                    'attached_date' => get_modified_date_time_format($doc_obj->attached_date),
                    'can_delete' => $can_delete,
                    'attachment_towards' => $doc_obj->type
                );
            }
            return $fileobjectarray;
        }
        return null;
    }

    function getLmCcmDocFileObjectArray($object_id, $type = null, $ref_object_id = null, $attached_by = null)
    {
        $doc_obj = new DB_Public_lm_cc_doc_file();
        $doc_obj->whereAdd("object_id='$object_id'");
        ($type) ? $doc_obj->whereAdd("type='$type'") : null;
        ($ref_object_id) ? $doc_obj->whereAdd("ref_object_id='$ref_object_id'") : null;
        ($attached_by) ? $doc_obj->whereAdd("attached_by='$attached_by'") : null;

        if ($doc_obj->find()) {
            while ($doc_obj->fetch()) {
                $file_object = new DB_Public_file();
                $file_object->get("object_id", $doc_obj->file_id);
                $type = strtolower(substr(strrchr($file_object->name, "."), 1));
                $can_delete = false;
                if ($_SESSION['user_id'] == $doc_obj->attached_by) {
                    $can_delete = true;
                }
                $fileobjectarray[] = array(
                    'object_id' => $file_object->object_id,
                    'type' => $type,
                    'towards' => $doc_obj->type,
                    'name' => $file_object->name,
                    'hash' => $file_object->hash,
                    'size' => $file_object->size,
                    'friendly_size' => GetFriendlySize($file_object->size),
                    'attached_by' => getFullName($doc_obj->attached_by),
                    'attached_date' => get_modified_date_time_format($doc_obj->attached_date),
                    'can_delete' => $can_delete,
                    'attachment_towards' => $doc_obj->type
                );
            }
            return $fileobjectarray;
        }
        return null;
    }

    function getLmVmDocFileObjectArray($object_id, $type = null, $ref_object_id = null, $attached_by = null)
    {
        $doc_obj = new DB_Public_lm_vm_doc_file();
        $doc_obj->whereAdd("object_id='$object_id'");
        ($type) ? $doc_obj->whereAdd("type='$type'") : null;
        ($ref_object_id) ? $doc_obj->whereAdd("ref_object_id='$ref_object_id'") : null;
        ($attached_by) ? $doc_obj->whereAdd("attached_by='$attached_by'") : null;

        if ($doc_obj->find()) {
            while ($doc_obj->fetch()) {
                $file_object = new DB_Public_file();
                $file_object->get("object_id", $doc_obj->file_id);
                $type = strtolower(substr(strrchr($file_object->name, "."), 1));
                $can_delete = false;
                if ($_SESSION['user_id'] == $doc_obj->attached_by) {
                    $can_delete = true;
                }
                $fileobjectarray[] = array(
                    'object_id' => $file_object->object_id,
                    'type' => $type,
                    'towards' => $doc_obj->type,
                    'name' => $file_object->name,
                    'hash' => $file_object->hash,
                    'size' => $file_object->size,
                    'friendly_size' => GetFriendlySize($file_object->size),
                    'attached_by' => getFullName($doc_obj->attached_by),
                    'attached_date' => get_modified_date_time_format($doc_obj->attached_date),
                    'can_delete' => $can_delete,
                    'attachment_towards' => $doc_obj->type
                );
            }
            return $fileobjectarray;
        }
        return null;
    }
    
    function getLmAmDocFileObjectArray($object_id, $type = null, $ref_object_id = null, $attached_by = null)
    {
        $doc_obj = new DB_Public_lm_audit_doc_file();
        $doc_obj->whereAdd("object_id='$object_id'");
        ($type) ? $doc_obj->whereAdd("type='$type'") : null;
        ($ref_object_id) ? $doc_obj->whereAdd("ref_object_id='$ref_object_id'") : null;
        ($attached_by) ? $doc_obj->whereAdd("attached_by='$attached_by'") : null;

        if ($doc_obj->find()) {
            while ($doc_obj->fetch()) {
                $file_object = new DB_Public_file();
                $file_object->get("object_id", $doc_obj->file_id);
                $type = strtolower(substr(strrchr($file_object->name, "."), 1));
                $can_delete = false;
                if ($_SESSION['user_id'] == $doc_obj->attached_by) {
                    $can_delete = true;
                }
                $fileobjectarray[] = array(
                    'object_id' => $file_object->object_id,
                    'type' => $type,
                    'towards' => $doc_obj->type,
                    'name' => $file_object->name,
                    'hash' => $file_object->hash,
                    'size' => $file_object->size,
                    'friendly_size' => GetFriendlySize($file_object->size),
                    'attached_by' => getFullName($doc_obj->attached_by),
                    'attached_date' => get_modified_date_time_format($doc_obj->attached_date),
                    'can_delete' => $can_delete,
                    'attachment_towards' => $doc_obj->type
                );
            }
            return $fileobjectarray;
        }
        return null;
    }

    function getAllLmOosDocFileObjectArray($object_id, $type = null) {
        $fileobjectarray = array();
        $cnt = 0;
        $lm_oos_doc_file_obj = new DB_Public_lm_oos_doc_file();
        $lm_oos_doc_file_obj->whereAdd("object_id='$object_id'");
        if(isset($type)){
            $lm_oos_doc_file_obj->whereAdd("type='$type'");
        }        
        $lm_oos_doc_file_obj->find();
        while ($lm_oos_doc_file_obj->fetch()) {
            $file_object = new DB_Public_file();
            $file_object->get("object_id", $lm_oos_doc_file_obj->file_id);
            $type = strtolower(substr(strrchr($file_object->name, "."), 1));
            $fileobjectarray[$cnt]['object_id'] = $file_object->object_id;
            $fileobjectarray[$cnt]['type'] = $type;
            $fileobjectarray[$cnt]['file_type'] = $lm_oos_doc_file_obj->type;
            $fileobjectarray[$cnt]['name'] = $file_object->name;
            $fileobjectarray[$cnt]['hash'] = $file_object->hash;
            $fileobjectarray[$cnt]['size'] = $file_object->size;
            $fileobjectarray[$cnt]['attached_by'] = getFullName($lm_oos_doc_file_obj->attached_by);
            $fileobjectarray[$cnt]['attached_date'] = get_modified_date_time_format($lm_oos_doc_file_obj->attached_date);
            if ($_SESSION['user_id'] == $lm_oos_doc_file_obj->attached_by) {
                $fileobjectarray[$cnt]['can_delete'] = TRUE;
            }
            $cnt++;
        }
        return $fileobjectarray;
    }

    function getLmoostestDocFileObjectArray($objectId, $type, $userId) {
        $fileobjectarray = array();
        $cnt = 0;
        $lm_oos_doc_file_obj = new DB_Public_lm_oos_doc_file();
        $lm_oos_doc_file_obj->whereAdd("object_id='$objectId'");
        $lm_oos_doc_file_obj->whereAdd("type='$type'");
        $lm_oos_doc_file_obj->whereAdd("attached_by='$userId'");
        $lm_oos_doc_file_obj->find();
        while ($lm_oos_doc_file_obj->fetch()) {
            $file_object = new DB_Public_file();
            $file_object->get("object_id", $lm_oos_doc_file_obj->file_id);
            $type = strtolower(substr(strrchr($file_object->name, "."), 1));
            $fileobjectarray[$cnt]['object_id'] = $file_object->object_id;
            $fileobjectarray[$cnt]['type'] = $type;
            $fileobjectarray[$cnt]['name'] = $file_object->name;
            $fileobjectarray[$cnt]['hash'] = $file_object->hash;
            $fileobjectarray[$cnt]['size'] = $file_object->size;
            $fileobjectarray[$cnt]['attached_by'] = getFullName($lm_oos_doc_file_obj->attached_by);
            $fileobjectarray[$cnt]['attached_date'] = get_modified_date_time_format($lm_oos_doc_file_obj->attached_date);
            if ($_SESSION['user_id'] == $lm_oos_doc_file_obj->attached_by) {
                $fileobjectarray[$cnt]['can_delete'] = TRUE;
            }
            $cnt++;
        }
        return $fileobjectarray;
    }
}
