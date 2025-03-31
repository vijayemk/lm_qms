<?php

/** ==========Product Details Start================ * */
function addProductMasterDetails($data) {
    $product_code = trim($data['product_code']);
    $product_name = trim($data['product_name']);
    $generic_name = trim($data['generic_name']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_product_code_exists($product_code) == false && is_product_name_exists($product_name) == false) {

        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->product->object_id");

        $product_obj = new DB_Public_lm_product_details_master();
        $product_obj->object_id = $object_id;
        $product_obj->product_code = $product_code;
        $product_obj->product_name = $product_name;
        $product_obj->generic_name = $generic_name;
        $product_obj->created_by = $usr_id;
        $product_obj->created_time = $date_time;
        $product_obj->modified_by = $usr_id;
        $product_obj->modified_time = $date_time;
        $product_obj->is_enabled = "yes";
        if ($product_obj->insert()) {
            //Audit Trail
            $at_data['Product Code'] = array("NA", $product_code, $product_code);
            $at_data['Product Name'] = array("NA", $product_name, $product_name);
            $at_data['Genric Name'] = array("NA", $generic_name, $generic_name);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Product Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateProductMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $product_code = trim($data['product_code']);
    $product_name = trim($data['product_name']);
    $generic_name = trim($data['generic_name']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    /** Getting old val for audit trail * */
    $atproduct_obj_old = new DB_Public_lm_product_details_master();
    $atproduct_obj_old->get("object_id", $object_id);

    // Update new value
    $uproduct_obj = new DB_Public_lm_product_details_master();
    $uproduct_obj->whereAdd("object_id='$object_id'");
    $uproduct_obj->product_code = $product_code;
    $uproduct_obj->product_name = $product_name;
    $uproduct_obj->generic_name = $generic_name;
    $uproduct_obj->modified_by = $usr_id;
    $uproduct_obj->modified_time = $date_time;
    $uproduct_obj->is_enabled = $is_enabled;
    if ($uproduct_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Product Code'] = array($atproduct_obj_old->product_code, $product_code, $product_code);
        $at_data['Product Name'] = array($atproduct_obj_old->product_name, $product_name, $product_name);
        $at_data['Genric Name'] = array($atproduct_obj_old->generic_name, $generic_name, $generic_name);
        $at_data['Is Enabled'] = array($atproduct_obj_old->is_enabled, "yes", "yes");
        addAuditTrailLog($object_id, null, $at_data, "Update Product Master", "Successfuly Updated");
        return true;
    }

    return false;
}

function getProductMasterDetails($prod_id = null, $prod_code = null, $prod_name = null, $is_enabled = null) {
    $product_obj = new DB_Public_lm_product_details_master();
    if ($prod_id) {
        $product_obj->whereAdd("object_id = '$prod_id'");
    }
    if ($prod_code) {
        $product_obj->whereAdd("product_code = '$prod_code'");
    }
    if ($prod_name) {
        $product_obj->whereAdd("product_name = '$prod_name'");
    }
    if ($is_enabled) {
        $product_obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $product_obj->orderBy('product_name');
    if ($product_obj->find()) {
        $count = 1;
        while ($product_obj->fetch()) {
            $productlist[] = array(
                'object_id' => $product_obj->object_id,
                'product_code' => $product_obj->product_code,
                'product_name' => $product_obj->product_name,
                'generic_name' => $product_obj->generic_name,
                'is_enabled' => $product_obj->is_enabled,
                'created_by' => getFullName($product_obj->created_by),
                'created_by_id' => $product_obj->created_by,
                'created_time' => $product_obj->created_time,
                'modified_by' => getFullName($product_obj->modified_by),
                'modified_by_id' => $product_obj->modified_by,
                'modified_time' => $product_obj->modified_time,
            );
            $count++;
        }
        return $productlist;
    }
    return null;
}

function is_product_code_exists($product_code) {
    $product = new DB_Public_lm_product_details_master();
    $product->whereAdd("product_code = '$product_code'");
    $product->query("SELECT * FROM {$product->__table} WHERE lower(product_code) = lower('$product_code')");
    while ($product->fetch()) {
        return true;
    }
    return false;
}

function is_product_name_exists($product_name) {
    $product = new DB_Public_lm_product_details_master();
    $product->query("SELECT * FROM {$product->__table} WHERE lower(product_name) = lower('$product_name')");
    while ($product->fetch()) {
        return true;
    }
    return false;
}

function getProductName($product_id) {
    $product_obj = new DB_Public_lm_product_details_master();
    $product_obj->get("object_id", $product_id);
    return $product_obj->product_name;
}

function getGenericName($product_id) {
    $product_obj = new DB_Public_lm_product_details_master();
    $product_obj->get("object_id", $product_id);
    return $product_obj->generic_name;
}

function getProductDetailsObject($product_id) {
    $product_obj = new DB_Public_lm_product_details_master();
    $product_obj->get("object_id", $product_id);
    return $product_obj;
}

/** ==========Product Details Stop================ * */

/** ==========Material Type Details Start================ * ** */
function addMaterialTypeMasterDetails($data) {
    $material_type = trim($data['material_type']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_material_type_exist($material_type) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->material_type->object_id");

        $material_type_obj = new DB_Public_lm_material_type_master();
        $material_type_obj->object_id = $object_id;
        $material_type_obj->type = $material_type;
        $material_type_obj->is_enabled = $is_enabled;
        $material_type_obj->created_by = $usr_id;
        $material_type_obj->created_time = $date_time;
        $material_type_obj->modified_by = $usr_id;
        $material_type_obj->modified_time = $date_time;
        if ($material_type_obj->insert()) {
            //Audit Trail
            $at_data['Material Type'] = array("NA", $material_type, $material_type);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Material type Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateMaterialTypeMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $material_type = trim($data['material_type']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    /** Getting old val for audit trail * */
    $atmaterial_type_obj_old = new DB_Public_lm_material_type_master();
    $atmaterial_type_obj_old->get("object_id", $object_id);

    // Update new value
    $umaterial_type_obj = new DB_Public_lm_material_type_master();
    $umaterial_type_obj->whereAdd("object_id = '$object_id'");
    $umaterial_type_obj->type = $material_type;
    $umaterial_type_obj->is_enabled = $is_enabled;
    $umaterial_type_obj->modified_by = $usr_id;
    $umaterial_type_obj->modified_time = $date_time;
    if ($umaterial_type_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Material Type'] = array($atmaterial_type_obj_old->type, $material_type, $material_type);
        $at_data['Is Enabled'] = array($atmaterial_type_obj_old->type, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Material type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getMaterialTypeMasterDetails($material_obj_id = null, $type = null, $is_enabled = null) {
    $material_type_obj = new DB_Public_lm_material_type_master();
    if ($material_obj_id) {
        $material_type_obj->whereAdd("object_id = '$material_obj_id'");
    }
    if ($type) {
        $material_type_obj->whereAdd("type = '$type'");
    }
    if ($is_enabled) {
        $material_type_obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $material_type_obj->orderBy('type');
    if ($material_type_obj->find()) {
        $count = 1;
        while ($material_type_obj->fetch()) {
            $material_type_list[] = array(
                'object_id' => $material_type_obj->object_id,
                'material_type' => $material_type_obj->type,
                'is_enabled' => $material_type_obj->is_enabled,
                'created_by' => getFullName($material_type_obj->created_by),
                'created_by_id' => $material_type_obj->created_by,
                'created_time' => $material_type_obj->created_time,
                'modified_by' => getFullName($material_type_obj->modified_by),
                'modified_by_id' => $material_type_obj->modified_by,
                'modified_time' => $material_type_obj->modified_time
            );
            $count++;
        }
        return $material_type_list;
    }
    return null;
}

function is_material_type_exist($material_type) {
    $obj = new DB_Public_lm_material_type_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(type) = lower('$material_type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getMaterialType($type_id) {
    $material_obj = new DB_Public_lm_material_type_master();
    $material_obj->get("object_id", $type_id);
    return $material_obj->type;
}

function getInstrumentName($instrumentId) {
    $obj = new DB_Public_lm_instrument_equipment_details();
    $obj->get("object_id", $instrumentId);
    return $obj->inst_equip_name;
}

/** ==========Material Type Details Stop================ * */

/** ==========Material Type Sub Category Details Start================ * ** */
function addMaterialTypeSubCateoryMasterDetails($data) {
    $material_type = trim($data['material_type']);
    $sub_category = $data['sub_category'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($sub_category); $i++) {
        if (is_material_type_sub_category_exist($material_type, $sub_category) == false) {
            $object_id = get_object_id("definitions->object_id->qms->admin_master_data->material_sub_type->object_id");

            $material_sub_category_obj = new DB_Public_lm_material_type_sub_category_master();
            $material_sub_category_obj->object_id = $object_id;
            $material_sub_category_obj->material_type_id = $material_type;
            $material_sub_category_obj->sub_category = trim($sub_category[$i]);
            $material_sub_category_obj->is_enabled = "yes";
            $material_sub_category_obj->created_by = $usr_id;
            $material_sub_category_obj->created_time = $date_time;
            $material_sub_category_obj->modified_by = $usr_id;
            $material_sub_category_obj->modified_time = $date_time;
            if ($material_sub_category_obj->insert()) {
                //Audit Trail
                $at_at_new .= "\n\t\t\t" . getMaterialType($material_type) . " - " . $sub_category[$i];
                $at_p .= "\n\t\t\t" . getMaterialType($material_type) . " : " . $material_type . " - " . $sub_category[$i];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //Audit Trail
    $at_data['Material Sub Type'] = array("NA", $at_at_new, $at_p);
    addAuditTrailLog($object_id, null, $at_data, "Add Material Sub type Master", "Successfuly Added");
    return true;
}

function updateMaterialTypeSubCateoryMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $material_type = trim($data['material_type']);
    $sub_category = trim($data['sub_category']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    /** Getting old val for audit trail * */
    $obj_old = new DB_Public_lm_material_type_sub_category_master();
    $obj_old->get("object_id", $object_id);

    $obj = new DB_Public_lm_material_type_sub_category_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->material_type_id = $material_type;
    $obj->sub_category = $sub_category;
    $obj->is_enabled = $is_enabled;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        $at_p = '';
        //Audit Trail
        $at_p .= getMaterialType($obj_old->material_type_id) . " : " . $material_type . " - " . $sub_category[0];
        $at_data['Material Sub Type'] = array($obj_old->sub_category, $sub_category, $at_p);
        $at_data['Is Enabled'] = array($obj_old->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Material Sub type Master", "Successfuly Updated");
        return true;
    }

    return false;
}

function getMaterialTypeSubCategoryMasterList($object_id = null, $material_type_id = null, $sub_type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_material_type_sub_category_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($material_type_id) {
        $obj->whereAdd("material_type_id = '$material_type_id'");
    }
    if ($sub_type) {
        $obj->whereAdd("sub_category = '$sub_type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->orderBy('sub_category');
    if ($obj->find()) {
        while ($obj->fetch()) {
            $return_list[] = array(
                'object_id' => $obj->object_id,
                'sub_category' => $obj->sub_category,
                'material_type_id' => $obj->material_type_id,
                'material_type' => getMaterialType($obj->material_type_id),
                'is_enabled' => $obj->is_enabled,
                'created_by' => getFullName($obj->created_by),
                'created_by_id' => $obj->created_by,
                'created_time' => $obj->created_time,
                'modified_by' => getFullName($obj->modified_by),
                'modified_by_id' => $obj->modified_by,
                'modified_time' => $obj->modified_time
            );
        }
        return $return_list;
    }
    return null;
}

function is_material_type_sub_category_exist($material_type_id, $sub_category) {
    $obj = new DB_Public_lm_material_type_sub_category_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(sub_category) = lower('$sub_category') and lower(material_type_id) = lower('$material_type_id')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getMaterialSubType($object_id) {
    $obj = new DB_Public_lm_material_type_sub_category_master();
    $obj->get("object_id", $object_id);
    return $obj->sub_category;
}

/** ==========Material Type Sub Category Details Stop================ * ** */

/** ==========Instrument / Equipment type Details Start================ * ** */
function addInstrumentEuipmentMasterDetails($data) {
    $inst_quip = trim($data['inst_equip']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    if (is_inst_equip_type_exist($inst_quip) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->instrument_equipment_type->object_id");

        $obj = new DB_Public_lm_instrument_equipment_master();
        $obj->object_id = $object_id;
        $obj->type = $inst_quip;
        $obj->is_enabled = "yes";
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Instrument/Equipemnt  Master'] = array("NA", $inst_quip, $inst_quip);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Instrument/Equipemnt Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateInstrumentEuipmentMasterDetails($data) {
    $inst_quip = trim($data['inst_equip']);
    $object_id = trim($data['object_id']);
    $usr_id = $data['usr_id'];
    $is_enabled = trim($data['is_enabled']);
    $date_time = $data['date_time'];

    $old_obj = new DB_Public_lm_instrument_equipment_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_instrument_equipment_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->type = $inst_quip;
    $obj->is_enabled = $is_enabled;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Instrument/Equipemnt Master'] = array("NA", $inst_quip, $inst_quip);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "update Instrument/Equipemnt Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getInstEquipTypeMasterList($object_id = null, $type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_instrument_equipment_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($type) {
        $obj->whereAdd("type='$type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->orderBy('object_id');
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            $return_list[] = array('object_id' => $obj->object_id, 'inst_equip_type' => $obj->type, 'is_enabled' => $obj->is_enabled);
            $count++;
        }
        return $return_list;
    }
    return null;
}

function getInstrumentEquipmentType($type_id) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_master();
    $ins_equip_obj->get("object_id", $type_id);
    return $ins_equip_obj->type;
}

function is_inst_equip_type_exist($type) {
    $type_obj = new DB_Public_lm_instrument_equipment_master();
    $type_obj->query("SELECT * FROM {$type_obj->__table} WHERE lower(type) = lower('$type')");
    while ($type_obj->fetch()) {
        return true;
    }
    return false;
}

/** ==========Instrument / Equipment Type Details Details stop================ * ** */

/** ==========Instrument / Equipment  Details Start================ * ** */
function addInstEuipMasterDetails($data) {
    $inst_equip_type = $data['inst_equip_type'];
    $inst_equip_id = $data['inst_equip_id'];
    $inst_equip_name = $data['inst_equip_name'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($inst_equip_id); $i++) {
        if (is_inst_equip_id_exist($inst_equip_type, $inst_equip_id) == false && is_inst_equip_name_exist($inst_equip_type, $inst_equip_name) == false) {
            $object_id = $object_id = get_object_id("definitions->object_id->qms->admin_master_data->instrument_equipment_details->object_id");

            $obj = new DB_Public_lm_instrument_equipment_details();
            $obj->object_id = $object_id;
            $obj->type_id = $inst_equip_type;
            $obj->inst_equip_id = trim($inst_equip_id[$i]);
            $obj->inst_equip_name = trim($inst_equip_name[$i]);
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->is_enabled = 'yes';
            if ($obj->insert()) {
                //Audit Trail
                $at_at_new .= "\n\t\t\t" . getInstrumentEquipmentType($inst_equip_type) . " - " . $inst_equip_name[$i];
                $dev_related_to_at_p .= "\n\t\t\t" . getInstrumentEquipmentType($inst_equip_type) . " : " . $inst_equip_type - $inst_equip_name[$i];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    $at_data['Instrument Equipment Details'] = array("NA", $at_at_new, $dev_related_to_at_p);
    addAuditTrailLog($object_id, null, $at_data, "Add Instrument Equipment Details Master", "Successfuly Added");
    return true;
}

function updateInstEuipMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $inst_equip_type = trim($data['inst_equip_type']);
    $inst_equip_id = trim($data['inst_equip_id']);
    $inst_equip_name = trim($data['inst_equip_name']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    /** Getting old val for audit trail * */
    $obj_old = new DB_Public_lm_instrument_equipment_details();
    $obj_old->get("object_id", $object_id);

    $obj = new DB_Public_lm_instrument_equipment_details();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->type_id = $inst_equip_type;
    $obj->inst_equip_id = $inst_equip_id;
    $obj->inst_equip_name = $inst_equip_name;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        $inst_equip_full_name_new = getInstrumentEquipmentType($inst_equip_type);
        //Audit Trail
        $at_data['Instrument/Equipemnt Type'] = array(getInstrumentEquipmentType($obj_old->type_id), $inst_equip_full_name_new, $inst_equip_type . " - " . $inst_equip_full_name_new);
        $at_data['Instrument/Equipemnt Id'] = array($obj_old->inst_equip_id, $inst_equip_id, $inst_equip_id);
        $at_data['Instrument/Equipemnt Name'] = array($obj_old->inst_equip_name, $inst_equip_name, $inst_equip_name);
        $at_data['Is Enabled'] = array($obj_old->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Instrument/Equipemnt Details Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getInstrumentEquipmentMasterDetailsList($object_id = null, $type_id = null, $inst_equip_id = null, $inst_equip_name = null, $is_enabled = null) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    if ($object_id) {
        $ins_equip_obj->whereAdd("object_id = '$object_id'");
    }
    if ($type_id) {
        $ins_equip_obj->whereAdd("type_id = '$type_id'");
    }
    if ($inst_equip_id) {
        $ins_equip_obj->whereAdd("inst_equip_id = '$inst_equip_id'");
    }
    if ($inst_equip_name) {
        $ins_equip_obj->whereAdd("instequip_name = '$inst_equip_name'");
    }
    if ($is_enabled) {
        $ins_equip_obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $ins_equip_obj->orderBy('inst_equip_name');
    if ($ins_equip_obj->find()) {
        $count = 1;
        while ($ins_equip_obj->fetch()) {
            $ins_equip_list[] = array(
                'object_id' => $ins_equip_obj->object_id,
                'inst_equip_type' => getInstrumentEquipmentType($ins_equip_obj->type_id),
                'inst_equip_name' => $ins_equip_obj->inst_equip_name,
                'type_id' => $ins_equip_obj->type_id,
                'inst_equip_id' => $ins_equip_obj->inst_equip_id,
                'created_by' => getFullName($ins_equip_obj->created_by),
                'created_by_id' => $ins_equip_obj->created_by,
                'created_time' => $ins_equip_obj->created_time,
                'modified_by' => getFullName($ins_equip_obj->modified_by),
                'modified_by_id' => $ins_equip_obj->modified_by,
                'modified_time' => $ins_equip_obj->modified_time,
                'is_enabled' => $ins_equip_obj->is_enabled
            );
            $count++;
        }
        return $ins_equip_list;
    }
    return null;
}

function getInstEquipName($inst_equip_id) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    $ins_equip_obj->get("object_id", $inst_equip_id);
    return $ins_equip_obj->inst_equip_name;
}

function getInsEquipId($inst_equip_id) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    $ins_equip_obj->get("object_id", $inst_equip_id);
    return $ins_equip_obj->inst_equip_id;
}

function is_inst_equip_id_exist($inst_equip_type, $id) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    $ins_equip_obj->query("SELECT * FROM {$ins_equip_obj->__table} WHERE lower(inst_equip_id) = lower('$id')and lower(type_id) = lower('$inst_equip_type')");
    while ($ins_equip_obj->fetch()) {
        return true;
    }
    return false;
}

function is_inst_equip_name_exist($inst_equip_type, $name) {
    $ins_equip_obj = new DB_Public_lm_instrument_equipment_details();
    $ins_equip_obj->query("SELECT * FROM {$ins_equip_obj->__table} WHERE lower(inst_equip_name) = lower('$name')and lower(type_id) = lower('$inst_equip_type')");
    while ($ins_equip_obj->fetch()) {
        return true;
    }
    return false;
}

/** ==========Instrument / Equipment  Details Details Stop================ * ** */

/** ==========Customer Details Start================ * ** */
function addCustomerMasterDetails($data) {
    $cust_name = trim($data['cust_name']);
    $cust_short_name = trim($data['cust_short_name']);
    $cust_addr = trim($data['cust_addr']);
    $cust_city = trim($data['cust_city']);
    $cust_state = trim($data['cust_state']);
    $cust_country = trim($data['cust_country']);
    $cust_pincode = trim($data['cust_pincode']);
    $cust_contact_person = trim($data['cust_contact_person_name']);
    $cust_email = trim($data['cust_email']);
    $cust_contact_no = trim($data['cust_contact_no']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    if (is_customer_name_exist($cust_name) == false && is_customer_short_name_exist($cust_short_name) == false) {
        $object_id = $object_id = get_object_id("definitions->object_id->qms->admin_master_data->customer->object_id");

        $obj = new DB_Public_lm_customer_details_master();
        $obj->object_id = $object_id;
        $obj->customer_name = $cust_name;
        $obj->short_name = $cust_short_name;
        $obj->address = $cust_addr;
        $obj->city = $cust_city;
        $obj->state = $cust_state;
        $obj->country = $cust_country;
        $obj->pincode = $cust_pincode;
        $obj->contact_person_name = $cust_contact_person;
        $obj->contact_email = $cust_email;
        $obj->contact_no = $cust_contact_no;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = 'yes';
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Customer Name'] = array("NA", $cust_name, $cust_name);
            $at_data['Short Name'] = array("NA", $cust_short_name, $cust_short_name);
            $at_data['Address'] = array("NA", $cust_addr, $cust_addr);
            $at_data['City'] = array("NA", $cust_city, $cust_city);
            $at_data['Country'] = array("NA", $cust_country, $cust_country);
            $at_data['Pincode'] = array("NA", $cust_pincode, $cust_pincode);
            $at_data['Contact person'] = array("NA", $cust_contact_person, $cust_contact_person);
            $at_data['email'] = array("NA", $cust_email, $cust_email);
            $at_data['Contact Number'] = array("NA", $cust_contact_no, $cust_contact_no);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Customer Details Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateCustomerMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $cust_name = trim($data['cust_name']);
    $cust_short_name = trim($data['cust_short_name']);
    $cust_addr = trim($data['cust_addr']);
    $cust_city = trim($data['cust_city']);
    $cust_state = trim($data['cust_state']);
    $cust_country = trim($data['cust_country']);
    $cust_pincode = trim($data['cust_pincode']);
    $cust_contact_person = trim($data['cust_contact_person_name']);
    $cust_email = trim($data['cust_email']);
    $cust_contact_no = trim($data['cust_contact_no']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = $data['is_enabled'];

    $old_obj = new DB_Public_lm_customer_details_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_customer_details_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->customer_name = $cust_name;
    $obj->short_name = $cust_short_name;
    $obj->address = $cust_addr;
    $obj->city = $cust_city;
    $obj->state = $cust_state;
    $obj->country = $cust_country;
    $obj->pincode = $cust_pincode;
    $obj->contact_person_name = $cust_contact_person;
    $obj->contact_email = $cust_email;
    $obj->contact_no = $cust_contact_no;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Customer Name'] = array($old_obj->customer_name, $cust_name, $cust_name);
        $at_data['Short Name'] = array($old_obj->short_name, $cust_short_name, $cust_short_name);
        $at_data['Address'] = array($old_obj->address, $cust_addr, $cust_addr);
        $at_data['City'] = array($old_obj->city, $cust_city, $cust_city);
        $at_data['Country'] = array($old_obj->country, $cust_country, $cust_country);
        $at_data['Pincode'] = array($old_obj->pincode, $cust_pincode, $cust_pincode);
        $at_data['Contact person'] = array($old_obj->contact_person_name, $cust_contact_person, $cust_contact_person);
        $at_data['email'] = array($old_obj->contact_email, $cust_email, $cust_email);
        $at_data['Contact Number'] = array($old_obj->contact_no, $cust_contact_no, $cust_contact_no);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Customer Details Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getCustomerMasterList($object_id = null, $customer_name = null, $short_name = null, $is_enabled = null) {
    $obj = new DB_Public_lm_customer_details_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($customer_name) {
        $obj->whereAdd("customer_name = '$customer_name'");
    }
    if ($short_name) {
        $obj->whereAdd("short_name = '$short_name'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->orderBy('short_name');
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            $customerlist[] = array(
                'object_id' => $obj->object_id,
                'customer_name' => $obj->customer_name,
                'short_name' => $obj->short_name,
                'contact_person_name' => $obj->contact_person_name,
                'address' => $obj->address,
                'city' => $obj->city,
                'state' => $obj->state,
                'pincode' => $obj->pincode,
                'contact_no' => $obj->contact_no,
                'contact_email' => $obj->contact_email,
                'country' => $obj->country,
                'is_enabled' => $obj->is_enabled,
                // 'created_by' => $obj->created_by,
                'created_by' => getFullName($obj->created_by),
                'created_by_id' => $obj->created_by,
                'created_time' => $obj->created_time,
                // 'modified_by' => $obj->modified_by,
                'modified_by' => getFullName($obj->modified_by),
                'modified_by_id' => $obj->modified_by,
                'modified_time' => $obj->modified_time
            );
            $count++;
        }
        return $customerlist;
    }
    return null;
}

function is_customer_name_exist($customer_name) {
    $customer = new DB_Public_lm_customer_details_master();
    $customer->query("SELECT * FROM {$customer->__table} WHERE lower(customer_name) = lower('$customer_name')");
    while ($customer->fetch()) {
        return true;
    }
    return false;
}

function is_customer_short_name_exist($short_name) {
    $customer = new DB_Public_lm_customer_details_master();
    $customer->query("SELECT * FROM {$customer->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($customer->fetch()) {
        return true;
    }
    return false;
}

function getCustomerName($customer_id) {
    $customer_obj = new DB_Public_lm_customer_details_master();
    $customer_obj->get("object_id", $customer_id);
    return $customer_obj->customer_name;
}

function getCustomerDetailsObject($customer_id) {
    $customer_obj = new DB_Public_lm_customer_details_master();
    $customer_obj->get("object_id", $customer_id);
    return $customer_obj;
}

/** ==========Customer Details Stop================ * ** */

/** ==========Market Details Start================ * ** */
function addMarketMasterDetails($data) {
    $market_name = trim($data['market_name']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_market_name_exist($market_name) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->market->object_id");

        $obj = new DB_Public_lm_market_details_master();
        $obj->object_id = $object_id;
        $obj->market_name = $market_name;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = 'yes';
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Market Name'] = array("NA", $market_name, $market_name);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Market Details Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateMarketMasterDetails($data) {
    $object_id = trim($data['object_id']);
    $market_name = trim($data['market_name']);
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    $old_obj = new DB_Public_lm_market_details_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_market_details_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->market_name = $market_name;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Market Name'] = array($old_obj->market_name, $market_name, $market_name);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Market Details Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getMarketMasterList($object_id = null, $is_enabled = null) {
    $obj = new DB_Public_lm_market_details_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->orderBy('object_id');
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $marketlist[] = array(
            'object_id' => $obj->object_id,
            'market_name' => $obj->market_name,
            'is_enabled' => $obj->is_enabled,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time
        );
        $count++;
    }
    return $marketlist;
}

function is_market_name_exist($market_name) {
    $market = new DB_Public_lm_market_details_master();
    $market->query("SELECT * FROM {$market->__table} WHERE lower(market_name) = lower('$market_name')");
    while ($market->fetch()) {
        return true;
    }
    return false;
}

function getMarketName($market_id) {
    $market_obj = new DB_Public_lm_market_details_master();
    $market_obj->get("object_id", $market_id);
    return $market_obj->market_name;
}

/** ==========Market Details Stop================ * ** */

/** ==========Process Stage Details Start================ * ** */
function addProcessStageMaster($data) {
    $process_stage = trim($data['process_stage']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_process_stage_exist($process_stage) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->process_stage->object_id");

        $obj = new DB_Public_lm_process_stage_master();
        $obj->object_id = $object_id;
        $obj->process_stage = $process_stage;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Process Stage'] = array("NA", $process_stage, $process_stage);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Process Stage Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateProcessStageMaster($data) {
    $object_id = trim($data['object_id']);
    $process_stage = trim($data['process_stage']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    $old_obj = new DB_Public_lm_process_stage_master();
    $old_obj->get("object_id", $object_id);
    $is_enabled = trim($data['is_enabled']);

    $obj = new DB_Public_lm_process_stage_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->process_stage = $process_stage;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Process Stage'] = array($old_obj->process_stage, $process_stage, $process_stage);
        $at_data['Is Enabled'] = array($old_obj->$is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Process Stage Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getProcessStageMasterList($object_id = null, $process_stage = null, $is_enabled = null) {
    $obj = new DB_Public_lm_process_stage_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($process_stage) {
        $obj->whereAdd("process_stage = '$process_stage'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->orderBy('object_id');
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $process_stage_list[] = array(
            'object_id' => $obj->object_id,
            'process_stage' => $obj->process_stage,
            'is_enabled' => $obj->is_enabled,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time
        );
        $count++;
    }
    return $process_stage_list;
}

function is_process_stage_exist($process_stage) {
    $process = new DB_Public_lm_process_stage_master();
    $process->query("SELECT * FROM {$process->__table} WHERE lower(process_stage) = lower('$process_stage')");
    while ($process->fetch()) {
        return true;
    }
    return false;
}

function getProcessStage($process_stage_id) {
    $process_obj = new DB_Public_lm_process_stage_master();
    $process_obj->get("object_id", $process_stage_id);
    return $process_obj->process_stage;
}

/** ==========Process Stage Details Stop================ * ** */

/** ==========Classification Details Start================ * ** */
function addClassificationMaster($data) {
    $classification = trim($data['classification']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_classification_name_exist($classification) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->classification->object_id");

        $obj = new DB_Public_lm_classification_master();
        $obj->object_id = $object_id;
        $obj->short_name = $classification;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";

        if ($obj->insert()) {
            //Audit Trail
            $at_data['Classification'] = array("NA", $classification, $classification);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Classification Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateClassificationMaster($data) {
    $object_id = trim($data['object_id']);
    $classification = trim($data['classification']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_classification_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_classification_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->short_name = $classification;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Classification'] = array("NA", $classification, $classification);
        $at_data['Is Enabled'] = array("NA", $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Classification Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getClassificationMasterList($object_id = null, $classification = null, $is_enabled = null) {
    $obj = new DB_Public_lm_classification_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($classification) {
        $obj->whereAdd("short_name = '$classification'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->orderBy('object_id');
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $class_list[] = array(
            'object_id' => $obj->object_id,
            'short_name' => $obj->short_name,
            'is_enabled' => $obj->is_enabled,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time
        );
        $count++;
    }
    return $class_list;
}

function is_classification_name_exist($short_name) {
    $short_name_obj = new DB_Public_lm_classification_master();
    $short_name_obj->query("SELECT * FROM {$short_name_obj->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($short_name_obj->fetch()) {
        return true;
    }
    return false;
}

function getClassificationName($object_id) {
    $class_obj = new DB_Public_lm_classification_master();
    $class_obj->get("object_id", $object_id);
    return $class_obj->short_name;
}

/** ==========Classification Details Stop================ * ** */

/** ==========Unit Of Measurements Details Start================ * ** */
function addUnitOfMeasurementMaster($data) {
    $unit = trim($data['unit']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_unit_type_exist($unit) == false) {
        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->unit_of_measurement->object_id");

        $obj = new DB_Public_lm_unit_master();
        $obj->object_id = $object_id;
        $obj->type = $unit;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Unit Of Measurement'] = array("NA", $unit, $unit);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Unit Of Measurement Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateUnitOfMeasurementMaster($data) {
    $object_id = trim($data['object_id']);
    $unit = trim($data['unit']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_unit_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_unit_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->type = $unit;
    $obj->description = $desc;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Unit Of Measurement'] = array($old_obj->type, $unit, $unit);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Unit Of Measurement Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getUnitOfMeasuremenMasterDetails($object_id = null, $type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_unit_master();
    if ($object_id) {
        $obj->whereAdd("object_id = '$object_id'");
    }
    if ($type) {
        $obj->whereAdd("type = '$type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled = '$is_enabled'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $unit_list[] = array(
            'object_id' => $obj->object_id,
            'type' => $obj->type,
            'is_enabled' => $obj->is_enabled,
            'description' => $obj->description,
            'created_by' => getUserName($obj->created_by),
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time,
            'count' => $count
        );
        $count++;
    }
    return $unit_list;
}

function is_unit_type_exist($type) {
    $type_obj = new DB_Public_lm_unit_master();
    $type_obj->query("SELECT * FROM {$type_obj->__table} WHERE lower(type) = lower('$type')");
    while ($type_obj->fetch()) {
        return true;
    }
    return false;
}

function getUnitName($object_id) {
    $unit_obj = new DB_Public_lm_unit_master();
    $unit_obj->get("object_id", $object_id);
    return $unit_obj->type;
}

/** ==========Unit Of Measurements Details Stop================ * ** */

/** ==========Common Fucntion Start================ * ** */
function is_online_exam_capa_required($attempt_limit, $attempt) {
    $max_attempt_limit = 100;
    $tmp_array = array();
    for ($i = 1; $i < $max_attempt_limit; $i++) {
        $attempt_val = ($i * $attempt_limit) + 1;
        array_push($tmp_array, $attempt_val);
    }
    if (in_array($attempt, $tmp_array)) {
        return true;
    } else {
        return null;
    }
}

function get_qms_doc_no_list($module, $plant = null, $dept_id = null, $approval_status = null, $wf_status = null, $status = null) {
    if ($module == "dms") {
        $obj = new DB_Public_lm_dm_master();
        ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
        ($dept_id) ? $obj->whereAdd("dm_department='$dept_id'") : null;
        ($approval_status) ? $obj->whereAdd("approval_status='$approval_status'") : null;
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
        ($status) ? $obj->whereAdd("status='$status'") : null;
        $doc_object_id_col = "dm_object_id";
    } else if ($module == "ccm") {
        $obj = new DB_Public_lm_cc_master();
        $doc_object_id_col = "cc_object_id";
        ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
        ($dept_id) ? $obj->whereAdd("cc_department='$dept_id'") : null;
        ($approval_status) ? $obj->whereAdd("approval_status='$approval_status'") : null;
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
        ($status) ? $obj->whereAdd("status='$status'") : null;
    } else if ($module == "capa") {
        $obj = new DB_Public_lm_capa_master();
        $doc_object_id_col = "capa_object_id";
        ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
        ($dept_id) ? $obj->whereAdd("capa_department='$dept_id'") : null;
        ($approval_status) ? $obj->whereAdd("approval_status='$approval_status'") : null;
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
        ($status) ? $obj->whereAdd("status='$status'") : null;
    } else if ($module == "ams") {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $doc_object_id_col = "object_id";
    } else if ($module == "vms") {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $doc_object_id_col = "vm_object_id";
        ($approval_status) ? $obj->whereAdd("approval_status='$approval_status'") : null;
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
        ($status) ? $obj->whereAdd("status='$status'") : null;
    } else if ($module == "oos") {
        $obj = new DB_Public_lm_oos_details();
        $doc_object_id_col = "object_id";        
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
        ($status) ? $obj->whereAdd("status='$status'") : null;
    } else {
        return null;
    }
    $obj->find();
    while ($obj->fetch()) {
        $doc_no_list[] = array("drop_down_option" => get_qms_doc_no($module, $obj->$doc_object_id_col)['doc_no'], "drop_down_value" => $obj->$doc_object_id_col);
    }
    asort($doc_no_list);
    return $doc_no_list;
}

function get_qms_doc_no($module, $object_id) {
    if ($module == "dms" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->dms->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_dm_master();
        $obj->get('dm_object_id', $object_id);
        $doc_no = $obj->dm_no;
        $url = "index.php?module=dms&action=view_dms&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } elseif ($module == "ccm" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->ccm->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get('cc_object_id', $object_id);
        $doc_no = $obj->cc_no;
        $url = "index.php?module=ccm&action=view_ccm&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } elseif ($module == "capa" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->capa->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_capa_master();
        $obj->get('capa_object_id', $object_id);
        $doc_no = $obj->capa_no;
        $url = "index.php?module=capa&action=view_capa&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } else if ($module == "ams" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->ams->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get('object_id', $object_id);
        $doc_no = $obj->audit_no;
        $url = "index.php?module=ams&action=view_ams&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } else if ($module == "vms" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->vms->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get('vm_object_id', $object_id);
        $doc_no = $obj->vm_no;
        $url = "index.php?module=vms&action=view_vms&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } else if ($module == "oos" || (preg_match("/" . get_lm_json_value_by_key("definitions->object_id->workflow->oos->object_id") . "/", $object_id))) {
        $obj = new DB_Public_lm_oos_details();
        $obj->get('object_id', $object_id);
        $doc_no = $obj->oos_no;
        $url = "index.php?module=oos&action=view_oos&object_id={$object_id}";
        $doc_array = array('doc_no' => $doc_no, 'doc_link' => "<a href={$url} target=_blank>{$doc_no}</a>", 'doc_url' => $url, 'lm_doc_id' => $obj->lm_doc_id, 'wf_status' => $obj->wf_status, 'status' => $obj->status);
    } else {
        $doc_array = null;
    }
    return $doc_array;
}

/** ==========Common Fucntion Stop================ * ** */

/** ==========QMS Number Sequence Start================ * ** */
function add_qms_num_seq($org_id, $plant_id, $lm_doc_id, $prefix, $number, $created_by, $created_time) {

    if (is_qms_num_seq_exists($org_id, $plant_id, $lm_doc_id) === false) {
        $aobj = new DB_Public_lm_qms_numbering_master();

        $object_id = get_object_id("definitions->object_id->qms->admin_master_data->number_seq->object_id");

        $aobj->object_id = $object_id;
        $aobj->org_id = $org_id;
        $aobj->plant_id = $plant_id;
        $aobj->lm_doc_id = $lm_doc_id;
        $aobj->prefix = $prefix;
        $aobj->number = $number;
        $aobj->doc_short_name = getLmDocShortName($lm_doc_id);
        $aobj->created_by = $created_by;
        $aobj->created_time = $created_time;
        $aobj->modified_by = $created_by;
        $aobj->modified_time = $created_time;
        if ($aobj->insert()) {
            $org_name = getOrganization($org_id);
            $plant_name = getPlantName($plant_id);
            $lm_doc_name = getLmDocName($lm_doc_id);

            $user_id = $created_by;
            $user_name = getFullName($user_id);
            $user_plant_id = getUserPlantId($created_by);
            $user_plant_name = getPlantName($user_plant_id);
            $user_dept_id = getDeptId($user_plant_id);
            $user_dept_name = getDeptName($user_dept_id);

            $at_data['Organization'] = array("NA", $org_name, "$org_id - $org_name \n User : $user_id - $user_name \n Plant : $user_plant_id - $user_plant_name \n Department : $user_dept_id - $user_dept_name");
            $at_data['Plant'] = array("NA", $plant_name, "$plant_id - $plant_name");
            $at_data['Doc Name'] = array("NA", $lm_doc_name, "$lm_doc_id - $lm_doc_name");
            $at_data['Prefix'] = array("NA", $prefix, $prefix);
            $at_data['Number'] = array("NA", $number, $number);

            addAuditTrailLog($object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfuly Updated');

            return true;
        }
    }
    return false;
}

function update_qms_num_seq($org_id, $plant_id, $lm_doc_id, $prefix, $number, $created_by, $created_time) {

    $old_obj = (object) get_qms_num_seq_list($org_id, $plant_id, $lm_doc_id)[0];

    $uobj = new DB_Public_lm_qms_numbering_master();
    $uobj->whereAdd("org_id='$org_id'");
    $uobj->whereAdd("plant_id='$plant_id'");
    $uobj->whereAdd("lm_doc_id='$lm_doc_id'");
    $uobj->prefix = $prefix;
    $uobj->number = $number;
    $uobj->modified_by = $created_by;
    $uobj->modified_time = $created_time;
    if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

        $org_name = getOrganization($org_id);
        $plant_name = getPlantName($plant_id);
        $lm_doc_name = getLmDocName($lm_doc_id);

        $user_id = $created_by;
        $user_name = getFullName($user_id);
        $user_plant_id = getUserPlantId($created_by);
        $user_plant_name = getPlantName($user_plant_id);
        $user_dept_id = getDeptId($user_plant_id);
        $user_dept_name = getDeptName($user_dept_id);

        $at_data['Organization'] = array($old_obj->org_name, $org_name, "$org_id - $org_name \n User : $user_id - $user_name \n Plant : $user_plant_id - $user_plant_name \n Department : $user_dept_id - $user_dept_name");
        $at_data['Plant'] = array($old_obj->plant_name, $plant_name, "$plant_id - $plant_name");
        $at_data['Doc Name'] = array($old_obj->doc_name, $lm_doc_name, "$lm_doc_id - $lm_doc_name");
        $at_data['Prefix'] = array($old_obj->prefix, $prefix, $prefix);
        $at_data['Number'] = array($old_obj->number, $number, $number);

        addAuditTrailLog($old_obj->object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfuly Updated');
        return true;
    }
    return false;
}

function is_qms_num_seq_exists($org_id, $plant_id, $lm_doc_id) {
    $obj = new DB_Public_lm_qms_numbering_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(org_id) = lower('$org_id') and lower(plant_id) = lower('$plant_id') and lower(lm_doc_id) = lower('$lm_doc_id')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function get_qms_num_seq_list($org_id = null, $plant_id = null, $lm_doc_id = null) {
    $obj = new DB_Public_lm_qms_numbering_master();
    ($org_id) ? $obj->whereAdd("org_id='$org_id'") : null;
    ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
    ($lm_doc_id) ? $obj->whereAdd("lm_doc_id='$lm_doc_id'") : null;
    if ($obj->find()) {        
        while ($obj->fetch()) {
            $cyear = date('Y');
            $num_seq = "$obj->prefix/$cyear/$obj->number";
            $num_seq_array[] = array(
                'object_id' => $obj->object_id,
                'org_id' => $obj->org_id,
                'org_name' => getOrganization($obj->org_id),
                'plant_id' => $obj->plant_id,
                'plant_name' => getPlantName($obj->plant_id),
                'plant_short_name' => getPlantShortName($obj->plant_id),
                'prefix' => $obj->prefix,
                'lm_doc_id' => $obj->lm_doc_id,
                'doc_name' => getLmDocName($obj->lm_doc_id),
                'doc_short_name' => getLmDocShortName($obj->lm_doc_id),
                'number' => $obj->number,
                'num_seq' => $num_seq,
                'created_by' => $obj->created_by,
                'created_by_name' => getFullName($obj->created_by),
                'created_time' => display_datetime_format($obj->created_time)
            );
        }
        return $num_seq_array;
    }
    return null;
}

function get_qms_no_seq($plant_id, $lm_doc_id) {   
    if ($plant_id && $lm_doc_id) { 
        $number_array = get_qms_num_seq_list(null, $plant_id, $lm_doc_id)[0];   
        if ($number_array['number']) {
            return $number_array['num_seq'];
        }
    }
    return null;
}

function update_qms_no_seq($plant_id, $lm_doc_id) {
    $obj = new DB_Public_lm_qms_numbering_master();
    $obj->whereAdd("plant_id='$plant_id'");
    $obj->whereAdd("lm_doc_id='$lm_doc_id'");
    $obj->find();
    if ($obj->fetch()) {
        $number = $obj->number;
        $zerofill = strlen($number);
        $body_value = intval($number);
        $val = $body_value + 1;
        $next_number = str_pad($val, $zerofill, "0", STR_PAD_LEFT);

        $sequence = new DB_Public_lm_qms_numbering_master();
        $sequence->whereAdd("plant_id = '$plant_id'");
        $sequence->whereAdd("lm_doc_id = '$lm_doc_id'");
        $sequence->number = $next_number;
        $sequence->update(DB_DATAOBJECT_WHEREADD_ONLY);
    }
}

/** ==========QMS Number Sequence Stop================ * ** */
