<?php

/**
 * Project:     Logicmind
 * File:      random_id_generation.admin.php
 *
 * @author Ananthakumar V
 * @since 24/02/2017
 * @package admin
 * @version 1.0
 * @see random_id_generation.admin.tpl
 */
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

error_reporting(E_ALL & ~E_NOTICE);
$buss_object_id = $_REQUEST['object_id'];
$buss_obj = new BusinessObject();
if ($buss_obj->get_business_object($buss_object_id)) {
    $usr_id = $_SESSION['user_id'];
    $dept_id = getDeptId($usr_id);

    /*     * Sub business object list */
    $sub_buss_obj = new SubBusinessObject;
    $sub_buss_obj->orderBy('sub_object_name');
    $sub_buss_obj->whereAdd("buss_object_id = '$buss_object_id'");
    $sub_buss_obj->find();
    $sub_businesslist = array();
    $cnt = 0;
    while ($sub_buss_obj->fetch()) {
        $number_order = new NumberingOrder();
        $number_order->get("sub_business_object", $sub_buss_obj->sub_object_id);

        $sub_businesslist[$cnt]['sub_object_name'] = $sub_buss_obj->sub_object_name;
        $sub_businesslist[$cnt]['sub_object_id'] = $sub_buss_obj->sub_object_id;
        $sub_businesslist[$cnt]['prefix'] = $number_order->prefix;
        $sub_businesslist[$cnt]['body'] = $number_order->body;
        $sub_businesslist[$cnt]['suffix'] = $number_order->suffix;
        $cnt++;
    }

    /** Add sub business object and numbering order * */
    if (isset($_POST['add'])) {
        $aprefix = $_POST['aprefix'] ?: NULL;
        $abody = $_POST['abody'] ?: NULL;

        $sequence_object = new Sequence;
        $id = "admin.sub_business_object:" . $sequence_object->get_next_sequence();

        $object = new SubBusinessObject();
        $object->sub_object_id = $id;
        $object->sub_object_name = trim($_POST['objectname']);
        $object->buss_object_id = $buss_object_id;
        $object->description = trim($_POST['description']);
        ;
        $object->insert();

        $at_old_obj = new DB_Public_numbering_order();
        $at_old_obj->whereAdd("business_object='$buss_object_id'");
        $at_old_obj->whereAdd("sub_business_object='$id'");
        $at_old_obj->find();
        $at_old_obj->fetch();

        $num_order_obj = new DB_Public_numbering_order();
        $num_order_obj->business_object = $buss_object_id;
        $num_order_obj->sub_business_object = $id;
        $num_order_obj->prefix = $aprefix;
        $num_order_obj->initial_number = $abody;
        $num_order_obj->body = $abody;
        $num_order_obj->suffix = NULL;
        $num_order_obj->insert();

        // Audit Trail for sub business object
        $new_val = "Sub Business Object : " . trim($_POST['objectname']) . "\nDescription : " . trim($_POST['description']);
        $old_val = null;
        $sequence_object = new Sequence;
        $audit_id = "audit.sub_buss:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_sub_business_object(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");

        // Audit Trail for numbering order
        $new_val = "Business Object : " . getBussObjectName($buss_object_id) . "\nSub Business Object : " . getSubBusinessObjName($id) . "\nPrefix : " . $aprefix . "\nBody : " . $abody;
        $old_val = "";
        $sequence_object = new Sequence;
        $audit_id = "audit.num_seq:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_numbering_order(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Aded");

        header("Location:$_SERVER[REQUEST_URI]");
    }
    /*     * Edit Number sequence */
    if (isset($_POST['edit_number_seq'])) {
        $sub_bus_obj_id = $_POST['sub_bus_obj_id'] ?: NULL;
        $uprefix = $_POST['uprefix'] ?: NULL;
        $ubody = $_POST['ubody'] ?: NULL;

        $at_old_obj = new DB_Public_numbering_order();
        $at_old_obj->whereAdd("business_object='$buss_object_id'");
        $at_old_obj->whereAdd("sub_business_object='$sub_bus_obj_id'");
        $at_old_obj->find();
        $at_old_obj->fetch();

        $num_order_obj = new DB_Public_numbering_order();
        $num_order_obj->whereAdd("business_object='$buss_object_id'");
        $num_order_obj->whereAdd("sub_business_object='$sub_bus_obj_id'");
        $num_order_obj->prefix = $uprefix;
        $num_order_obj->initial_number = $ubody;
        $num_order_obj->body = $ubody;
        $num_order_obj->suffix = NULL;
        if ($num_order_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //print_r($_POST);
        } else {
            //print_r("nothing updated");
        }

        // Audit Trail
        $usr_id = $_SESSION['user_id'];
        $dept_id = getDeptId($usr_id);
        $new_val = "Business Object : " . getBussObjectName($buss_object_id) . "\nSub Business Object : " . getSubBusinessObjName($sub_bus_obj_id) . "\nPrefix : " . $uprefix . "\nBody : " . $ubody;
        $old_val = "Business Object : " . getBussObjectName($at_old_obj->business_object) . "\nSub Business Object : " . getSubBusinessObjName($at_old_obj->sub_business_object) . "\nPrefix : " . $at_old_obj->prefix . "\nBody : " . $at_old_obj->body;
        $sequence_object = new Sequence;
        $audit_id = "audit.num_seq:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_numbering_order(), $audit_id, $usr_id, $dept_id, 'Update', $new_val, $old_val, "Successfully Updated");
        header("Location:$_SERVER[REQUEST_URI]");
    }
    $smarty->assign('objectname', $buss_obj->object_name);
    $smarty->assign('buss_object_id', $buss_object_id);
    $smarty->assign('sub_businesslist', $sub_businesslist);
    $smarty->assign('main', _TEMPLATE_PATH_ . "random_id_generation.admin.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
