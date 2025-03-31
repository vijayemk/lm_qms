<?php

class Vms_Processor {

    function add_vms_org($data) {
        $org_name = trim($data['organization']);
        $short_name = trim($data['short_name']);
        $address = trim($data['address']);
        $city = trim($data['city']);
        $state = trim($data['state']);
        $country = trim($data['country']);
        $pincode = trim($data['pincode']);
        $landline_number = trim($data['landline_number']);
        $primary_contact = trim($data['primary_contact']);
        $primary_contact_number = trim($data['primary_contact_number']);
        $secondary_contact = trim($data['secondary_contact']);
        $secondary_contact_number = trim($data['secondary_contact_number']);
        $email = trim($data['email']);
        $website = trim($data['website']);
        $no_employees = trim($data['no_of_employees']);
        $turn_over = trim($data['annual_turnover']);
        $certifications = trim($data['certifications']);
        $established_year = trim($data['established_year']);
        $usr_id = $data['usr_id'];
        $date_time = $data['date_time'];

        if (vms_organization_exist($org_name) == false && vms_organization_short_name_exist($short_name) == false) {
            $object_id = get_object_id("definitions->object_id->workflow->vms->org");

            $obj = new DB_Public_lm_vm_vendor_org();
            $obj->org_id = $object_id;
            $obj->org_name = $org_name;
            $obj->short_name = $short_name;
            $obj->address = $address;
            $obj->city = $city;
            $obj->state = $state;
            $obj->country = $country;
            $obj->pincode = $pincode;
            $obj->landline_number = $landline_number;
            $obj->email = $email;
            $obj->website = $website;
            $obj->established_year = $established_year;
            $obj->no_of_employees = $no_employees;
            $obj->annual_turn_over = $turn_over;
            $obj->certifications = $certifications;
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->primary_contact = $primary_contact;
            $obj->primary_contact_number = $primary_contact_number;
            $obj->secondary_contact = $secondary_contact;
            $obj->secondary_contact_number = $secondary_contact_number;
            $obj->is_active = 'yes';
            if ($obj->insert()) {
                //Audit Trail
                $at_data['Organization Name'] = array("NA", $org_name, $org_name);
                $at_data['Short Name'] = array("NA", $short_name, $short_name);
                $at_data['Address'] = array("NA", $address, $address);
                $at_data['City'] = array("NA", $city, $city);
                $at_data['State'] = array("NA", $state, $state);
                $at_data['Country'] = array("NA", $country, $country);
                $at_data['Pincode'] = array("NA", $pincode, $pincode);
                $at_data['Landline Number'] = array("NA", $landline_number, $landline_number);
                $at_data['Email'] = array("NA", $email, $email);
                $at_data['website'] = array("NA", $website, $website);
                $at_data['Established Year'] = array("NA", $established_year, $established_year);
                $at_data['Number Of Employees'] = array("NA", $no_employees, $no_employees);
                $at_data['Annual Turn Over'] = array("NA", $turn_over, $turn_over);
                $at_data['Certification'] = array("NA", $certifications, $certifications);
                $at_data['Primary Contact'] = array("NA", $primary_contact, $primary_contact);
                $at_data['Primary Contact Number'] = array("NA", $primary_contact_number, $primary_contact_number);
                $at_data['Secondary Contact'] = array("NA", $secondary_contact, $secondary_contact);
                $at_data['Secondary Contact Number'] = array("NA", $secondary_contact_number, $secondary_contact_number);
                addAuditTrailLog($object_id, null, $at_data, "Add Vendor Organization", "Successfuly Added");
                return true;
            }
        }
        return false;
    }

    function get_vms_org($org_id = null, $is_active = null) {
        $obj = new DB_Public_lm_vm_vendor_org();
        ($org_id) ? $obj->whereAdd("org_id='$org_id'") : null;
        ($is_active) ? $obj->whereAdd("is_active='$is_active'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $vendor_org_list[] = array(
                    'org_id' => $obj->org_id,
                    'org_name' => $obj->org_name,
                    'short_name' => $obj->short_name,
                    'address' => $obj->address,
                    'city' => $obj->city,
                    'state' => $obj->state,
                    'country' => $obj->country,
                    'pincode' => $obj->pincode,
                    'landline_number' => $obj->landline_number,
                    'email' => $obj->email,
                    'website' => $obj->website,
                    'established_year' => $obj->established_year,
                    'no_of_employees' => $obj->no_of_employees,
                    'created_time' => display_date_format($obj->created_time),
                    'primary_contact' => $obj->primary_contact,
                    'primary_contact_number' => $obj->primary_contact_number,
                    'secondary_contact' => $obj->secondary_contact,
                    'secondary_contact_number' => $obj->secondary_contact_number,
                    'annual_turn_over' => $obj->annual_turn_over,
                    'certifications' => $obj->certifications,
                    'is_active' => $obj->is_active,
                );
                $count++;
            }
            return $vendor_org_list;
        }
        return null;
    }

    function add_vms_plant($data) {
        $object_id = get_object_id("definitions->object_id->workflow->vms->plant");

        $org_id = $data['organization'];
        $plant_name = $data['plant_name'];
        $plant_short_name = $data['plant_short_name'];
        $plant_type = $data['plant_type'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $pincode = $data['pincode'];
        $landline_number = $data['landline_number'];
        $primary_contact = $data['primary_contact'];
        $primary_contact_number = $data['primary_contact_number'];
        $secondary_contact = $data['secondary_contact'];
        $secondary_contact_number = $data['secondary_contact_number'];
        $email = $data['email'];
        $website = $data['website'];
        $no_employees = $data['no_of_employees'];
        $turn_over = $data['annual_turnover'];
        $certifications = $data['certifications'];
        $established_year = $data['established_year'];
        $usr_id = $data['usr_id'];
        $date_time = $data['date_time'];

        if (vms_plant_exist($org_id, $plant_name) == false && vms_plant_short_name_exist($org_id, $plant_short_name) == false) {
            $obj = new DB_Public_lm_vm_vendor_org_plants();
            $obj->plant_id = $object_id;
            $obj->org_id = $org_id;
            $obj->plant_name = $plant_name;
            $obj->short_name = $plant_short_name;
            $obj->address = $address;
            $obj->city = $city;
            $obj->state = $state;
            $obj->country = $country;
            $obj->pincode = $pincode;
            $obj->landline_number = $landline_number;
            $obj->email = $email;
            $obj->website = $website;
            $obj->established_year = $established_year;
            $obj->no_of_employees = $no_employees;
            $obj->annual_turn_over = $turn_over;
            $obj->certifications = $certifications;
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->primary_contact = $primary_contact;
            $obj->primary_contact_number = $primary_contact_number;
            $obj->secondary_contact = $secondary_contact;
            $obj->secondary_contact_number = $secondary_contact_number;
            $obj->vendor_type_id = $plant_type;
            $obj->is_active = 'yes';
            $obj->vendor_status = 'Audit Pending';
            $obj->audit_status = 'Audit Pending';
            $obj->audit_type = 'First Time';
            if ($obj->insert()) {
                //Audit Trail
                $at_data['Plant Name'] = array("NA", $plant_name, $plant_name);
                $at_data['Short Name'] = array("NA", $plant_short_name, $plant_short_name);
                $at_data['Vendor Type'] = array("NA", getVendorType($plant_type), "$plant_type - " . getVendorType($plant_type));
                $at_data['Organization'] = array("NA", array_shift($this->get_vms_org($org_id))['org_name'], "$org_id - " . array_shift($this->get_vms_org($org_id))['org_name']);
                $at_data['Address'] = array("NA", $address, $address);
                $at_data['City'] = array("NA", $city, $city);
                $at_data['State'] = array("NA", $state, $state);
                $at_data['Country'] = array("NA", $country, $country);
                $at_data['Pincode'] = array("NA", $pincode, $pincode);
                $at_data['Landline Number'] = array("NA", $landline_number, $landline_number);
                $at_data['Email'] = array("NA", $email, $email);
                $at_data['website'] = array("NA", $website, $website);
                $at_data['Established Year'] = array("NA", $established_year, $established_year);
                $at_data['Number Of Employees'] = array("NA", $no_employees, $no_employees);
                $at_data['Annual Turn Over'] = array("NA", $turn_over, $turn_over);
                $at_data['Certification'] = array("NA", $certifications, $certifications);
                $at_data['Primary Contact'] = array("NA", $primary_contact, $primary_contact);
                $at_data['Primary Contact Number'] = array("NA", $primary_contact_number, $primary_contact_number);
                $at_data['Secondary Contact'] = array("NA", $secondary_contact, $secondary_contact);
                $at_data['Secondary Contact Number'] = array("NA", $secondary_contact_number, $secondary_contact_number);
                $at_data['Is Active'] = array("NA", 'yes', 'yes');
                $at_data['Vendor Status'] = array("NA", 'Audit Pending', 'Audit Pending');
                $at_data['Audit Status'] = array("NA", 'Audit Pending', 'Audit Pending');
                addAuditTrailLog($object_id, null, $at_data, "Add Vendor Plant", "Successfuly Added");
                return true;
            }
        }
        return false;
    }

    function update_vms_org($data) {
        $org_id = $data['org_id'];
        $org_name = $data['organization'];
        $short_name = $data['short_name'];
        $vendor_Type_id = $data['org_type'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $pincode = $data['pincode'];
        $landline_number = $data['landline_number'];
        $primary_contact = $data['primary_contact'];
        $primary_contact_number = $data['primary_contact_number'];
        $secondary_contact = $data['secondary_contact'];
        $secondary_contact_number = $data['secondary_contact_number'];
        $email = $data['email'];
        $website = $data['website'];
        $no_employees = $data['no_of_employees'];
        $turn_over = $data['annual_turnover'];
        $certifications = $data['certifications'];
        $established_year = $data['established_year'];
        $is_active = $data['is_active'];
        $usr_id = $data['usr_id'];
        $date_time = $data['date_time'];

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_vm_vendor_org();
        $old_obj->get("org_id", $org_id);

        //Object to insert new values
        $obj = new DB_Public_lm_vm_vendor_org();
        $obj->whereAdd("org_id='$org_id'");

        $obj->org_name = $org_name;
        $obj->short_name = $short_name;
        $obj->address = $address;
        $obj->city = $city;
        $obj->state = $state;
        $obj->country = $country;
        $obj->pincode = $pincode;
        $obj->landline_number = $landline_number;
        $obj->email = $email;
        $obj->website = $website;
        $obj->established_year = $established_year;
        $obj->no_of_employees = $no_employees;
        $obj->annual_turn_over = $turn_over;
        $obj->certifications = $certifications;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->primary_contact = $primary_contact;
        $obj->primary_contact_number = $primary_contact_number;
        $obj->secondary_contact = $secondary_contact;
        $obj->secondary_contact_number = $secondary_contact_number;
        $obj->is_active = $is_active;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //Audit Trail
            $at_data['Organization Name'] = array($old_obj->org_name, $org_name, $org_name);
            $at_data['Short Name'] = array($old_obj->short_name, $short_name, $short_name);
            $at_data['Address'] = array($old_obj->address, $address, $address);
            $at_data['City'] = array($old_obj->city, $city, $city);
            $at_data['State'] = array($old_obj->state, $state, $state);
            $at_data['Country'] = array($old_obj->country, $country, $country);
            $at_data['Pincode'] = array($old_obj->pincode, $pincode, $pincode);
            $at_data['Landline Number'] = array($old_obj->landline_number, $landline_number, $landline_number);
            $at_data['Email'] = array($old_obj->email, $email, $email);
            $at_data['website'] = array($old_obj->website, $website, $website);
            $at_data['Established Year'] = array($old_obj->established_year, $established_year, $established_year);
            $at_data['Number Of Employees'] = array($old_obj->no_of_employees, $no_employees, $no_employees);
            $at_data['Annual Turn Over'] = array($old_obj->annual_turn_over, $turn_over, $turn_over);
            $at_data['Certification'] = array($old_obj->certifications, $certifications, $certifications);
            $at_data['Primary Contact'] = array($old_obj->primary_contact, $primary_contact, $primary_contact);
            $at_data['Primary Contact Number'] = array($old_obj->primary_contact_number, $primary_contact_number, $primary_contact_number);
            $at_data['Secondary Contact'] = array($old_obj->secondary_contact, $secondary_contact, $secondary_contact);
            $at_data['Secondary Contact Number'] = array($old_obj->secondary_contact_number, $secondary_contact_number, $secondary_contact_number);
            addAuditTrailLog($org_id, null, $at_data, "Update Vendor Organization", "Successfuly Updated");
            return true;
        }
        return null;
    }

    function update_vms_plant($data) {
        $plant_id = $data['plant_id'];
        $org_id = $data['organization'];
        $plant_name = $data['plant_name'];
        $plant_short_name = $data['plant_short_name'];
        $plant_type = $data['plant_type'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $pincode = $data['pincode'];
        $landline_number = $data['landline_number'];
        $primary_contact = $data['primary_contact'];
        $primary_contact_number = $data['primary_contact_number'];
        $secondary_contact = $data['secondary_contact'];
        $secondary_contact_number = $data['secondary_contact_number'];
        $email = $data['email'];
        $website = $data['website'];
        $no_employees = $data['no_of_employees'];
        $turn_over = $data['annual_turnover'];
        $certifications = $data['certifications'];
        $established_year = $data['established_year'];
        $is_active = $data['is_active'];
        $usr_id = $data['usr_id'];
        $date_time = $data['date_time'];

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_vm_vendor_org_plants();
        $old_obj->get("plant_id", $plant_id);

        //Object to insert new values
        $obj = new DB_Public_lm_vm_vendor_org_plants();
        $obj->whereAdd("plant_id='$plant_id'");

        $obj->org_id = $org_id;
        $obj->plant_name = $plant_name;
        $obj->short_name = $plant_short_name;
        $obj->address = $address;
        $obj->city = $city;
        $obj->state = $state;
        $obj->country = $country;
        $obj->pincode = $pincode;
        $obj->landline_number = $landline_number;
        $obj->email = $email;
        $obj->website = $website;
        $obj->established_year = $established_year;
        $obj->no_of_employees = $no_employees;
        $obj->annual_turn_over = $turn_over;
        $obj->certifications = $certifications;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->primary_contact = $primary_contact;
        $obj->primary_contact_number = $primary_contact_number;
        $obj->secondary_contact = $secondary_contact;
        $obj->secondary_contact_number = $secondary_contact_number;
        $obj->vendor_type_id = $plant_type;
        $obj->is_active = $is_active;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //Audit Trail
            $at_data['Plant Name'] = array($old_obj->plant_name, $plant_name, $plant_name);
            $at_data['Short Name'] = array($old_obj->short_name, $plant_short_name, $plant_short_name);
            $at_data['Organization'] = array(array_shift($this->get_vms_org($old_obj->org_id))['org_name'], array_shift($this->get_vms_org($org_id))['org_name'], "$org_id - " . array_shift($this->get_vms_org($org_id))['org_name']);
            $at_data['Vendor Type'] = array(getVendorType($old_obj->vendor_type_id), getVendorType($plant_type), "$plant_type - " . getVendorType($plant_type));
            $at_data['Address'] = array($old_obj->address, $address, $address);
            $at_data['City'] = array($old_obj->city, $city, $city);
            $at_data['State'] = array($old_obj->state, $state, $state);
            $at_data['Country'] = array($old_obj->country, $country, $country);
            $at_data['Pincode'] = array($old_obj->pincode, $pincode, $pincode);
            $at_data['Landline Number'] = array($old_obj->landline_number, $landline_number, $landline_number);
            $at_data['Email'] = array($old_obj->email, $email, $email);
            $at_data['website'] = array($old_obj->website, $website, $website);
            $at_data['Established Year'] = array($old_obj->established_year, $established_year, $established_year);
            $at_data['Number Of Employees'] = array($old_obj->no_of_employees, $no_employees, $no_employees);
            $at_data['Annual Turn Over'] = array($old_obj->annual_turn_over, $turn_over, $turn_over);
            $at_data['Certification'] = array($old_obj->certifications, $certifications, $certifications);
            $at_data['Primary Contact'] = array($old_obj->primary_contact, $primary_contact, $primary_contact);
            $at_data['Primary Contact Number'] = array($old_obj->primary_contact_number, $primary_contact_number, $primary_contact_number);
            $at_data['Secondary Contact'] = array($old_obj->secondary_contact, $secondary_contact, $secondary_contact);
            $at_data['Secondary Contact Number'] = array($old_obj->secondary_contact_number, $secondary_contact_number, $secondary_contact_number);
            addAuditTrailLog($plant_id, null, $at_data, "Update Vendor Plant", "Successfuly Updated");
            return true;
        }
        return null;
    }

    function get_vms_plants($org_id = null, $plant_id = null, $is_active = null, $vendor_status = null, $audit_status = null, $audit_type = null) {
        $obj = new DB_Public_lm_vm_vendor_org_plants();
        ($org_id) ? $obj->whereAdd("org_id='$org_id'") : null;
        ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
        ($is_active) ? $obj->whereAdd("is_active='$is_active'") : null;
        ($vendor_status) ? $obj->whereAdd("vendor_status='$vendor_status'") : null;
        ($audit_status) ? $obj->whereAdd("audit_status='$audit_status'") : null;
        ($audit_type) ? $obj->whereAdd("audit_type='$audit_type'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $vendor_org_list[] = array(
                    'plant_id' => $obj->plant_id,
                    'org_id' => $obj->org_id,
                    'org_name' => array_shift($this->get_vms_org($obj->org_id))['org_name'],
                    'plant_name' => $obj->plant_name,
                    'plant_short_name' => $obj->short_name,
                    'address' => $obj->address,
                    'city' => $obj->city,
                    'type_id' => $obj->vendor_type_id,
                    'type' => getVendorType($obj->vendor_type_id),
                    'state' => $obj->state,
                    'country' => $obj->country,
                    'pincode' => $obj->pincode,
                    'landline_number' => $obj->landline_number,
                    'email' => $obj->email,
                    'website' => $obj->website,
                    'established_year' => $obj->established_year,
                    'no_of_employees' => $obj->no_of_employees,
                    'created_time' => display_date_format($obj->created_time),
                    'primary_contact' => $obj->primary_contact,
                    'primary_contact_number' => $obj->primary_contact_number,
                    'secondary_contact' => $obj->secondary_contact,
                    'secondary_contact_number' => $obj->secondary_contact_number,
                    'annual_turn_over' => $obj->annual_turn_over,
                    'certifications' => $obj->certifications,
                    'is_active' => $obj->is_active,
                    'vendor_status' => $obj->vendor_status,
                    'audit_status' => $obj->audit_status,
                    'effective_from' => $obj->effective_from,
                    'effective_to' => $obj->effective_to,
                    'drop_down_option' => $obj->plant_name,
                    'drop_down_value' => $obj->plant_id
                );
                $count++;
            }
            return $vendor_org_list;
        }
    }

    function add_vms_audit_schedule($data) {
        $object_id = get_object_id("definitions->object_id->workflow->vms->object_id");
        $vm_no = get_qms_no_seq($data['usr_plant'], $data['lm_doc_id']);
        if ($vm_no) {
            $org_id = $data['org'];
            $lm_doc_id = $data['lm_doc_id'];
            $plant_id = $data['plant'];
            $is_latest = $data['is_latest'];
            $agenda_cat = $data['agenda_cat'];
            $score = $data['score'];
            $agenda_sub_cat = $data['agenda_sub_cat'];
            $audit_from_date = $data['audit_from_date'];
            $audit_to_date = $data['audit_to_date'];
            $scope = $data['scope'];
            $objectives = $data['objectives'];
            $usr_id = $data['usr_id'];
            $usr_plant = $data['usr_plant'];
            $date_time = $data['date_time'];
            $usr_dept = $data['usr_dept'];
            $current_access_dept = getUserPlantId($usr_id) . "-" . $usr_dept;
            $audit_trail_action = $data['audit_trail_action'];
            $audit_type = $data['audit_type'];
            $iteration = $this->get_vms_next_iteration($org_id, $plant_id);

            if ($this->is_vms_vendor_plant_elegible_audit_schedule($plant_id, $audit_type)) {
                $obj = new DB_Public_lm_vm_vendor_details_master();
                $obj->vm_object_id = $object_id;
                $obj->vendor_name = $org_id;
                $obj->plant_name = $plant_id;
                $obj->vendor_type_id = array_shift($this->get_vms_plants($plant_id))['type_id'];
                $obj->lm_doc_id = $lm_doc_id;
                $obj->vm_no = $vm_no;
                $obj->audit_from_date = $audit_from_date;
                $obj->audit_to_date = $audit_to_date;
                $obj->scope = $scope;
                $obj->objectives = $objectives;
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $obj->status = "Open";
                $obj->wf_status = "Created";
                $obj->vendor_status = "Pending";
                $obj->approval_status = "Pending";
                $obj->vendor_type_id = getVendorTypeIdByVendor($plant_id);
                $obj->audit_type = $audit_type;
                $obj->iteration = $iteration;
                $obj->plant_id = $usr_plant;
                $obj->dept_id = $usr_dept;
                $obj->is_latest = $is_latest;
                if ($obj->insert()) {
                    //Update Plant Audit Status
                    $this->update_vms_plant_audit_status(array('plant_id' => $plant_id, 'audit_status' => "Audit Scheduled", 'vendor_status' => "Audit Pending", "audit_type" => $audit_type));

                    //Agenda Category
                    $cat_at_n = $cat_at_p = '';
                    for ($i = 0; $i < count($agenda_cat); $i++) {
                        $cat_object_id = get_object_id("definitions->object_id->workflow->vms->agenda_category");

                        $cat_obj = new DB_Public_lm_vm_audit_category_details();
                        $cat_obj->object_id = $cat_object_id;
                        $cat_obj->vm_object_id = $object_id;
                        $cat_obj->category_id = $agenda_cat[$i];
                        $cat_obj->category_score = $score[$i];
                        $cat_obj->created_by = $usr_id;
                        $cat_obj->created_time = $date_time;
                        if ($cat_obj->insert()) {

                            //Agenda Sub Category
                            for ($k = 0; $k < count($agenda_sub_cat); $k++) {
                                $id_arr = explode('-', $agenda_sub_cat[$k]);
                                if ($agenda_cat[$i] === $id_arr[0]) {
                                    $cat_sub_object_id = get_object_id("definitions->object_id->workflow->vms->agenda_sub_category");
                                    $cat_sub_obj = new DB_Public_lm_vm_audit_sub_category_details();
                                    $cat_sub_obj->object_id = $cat_sub_object_id;
                                    $cat_sub_obj->vm_object_id = $object_id;
                                    $cat_sub_obj->audit_category_object_id = $cat_object_id;
                                    $cat_sub_obj->sub_category = $id_arr[1];
                                    $cat_sub_obj->created_by = $usr_id;
                                    $cat_sub_obj->created_time = $date_time;
                                    $cat_sub_obj->modified_by = $usr_id;
                                    $cat_sub_obj->modified_time = $date_time;
                                    $cat_sub_obj->insert();
                                }
                            }
                        }
                    }

                    add_worklist($usr_id, $object_id);
                    save_workflow($object_id, $usr_id, 'Created', 'create');
                    update_qms_no_seq($data['usr_plant'], $data['lm_doc_id']);

                    $org_name = $this->get_vms_org_name($org_id);
                    $plant_name = $this->get_vms_org_plant_name($plant_id);

                    $at_data['Vendor Organization'] = array("NA", $org_name, "LM DOC ID : $lm_doc_id\n Iteration :  $iteration -\n $org_id - $org_name");
                    $at_data['Vendor Plant'] = array("NA", $plant_name, "$plant_id - $plant_name");
                    $at_data['Audit From Date'] = array("NA", $audit_from_date, $audit_from_date);
                    $at_data['Audit To Date'] = array("NA", $audit_to_date, $audit_to_date);
                    addAuditTrailLog($object_id, null, $at_data, $audit_trail_action, "Audit Scheduled");

                    addDeptAccessRights($object_id, $current_access_dept, null, $usr_id, $date_time, $vm_no, $audit_trail_action);
                    return $object_id;
                }
            }
        }
        return false;
    }

    function get_vms_next_iteration($org_id, $plant_id) {
        $count = 1;
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vendor_name = '$org_id' ");
        $obj->whereAdd("plant_name = '$plant_id' ");
        $row_count = $obj->find();
        $total_count = $count + $row_count;
        return $total_count;
    }

    function get_vms_agenda_details($vm_object_id, $category_id = null) {
        $obj = new DB_Public_lm_vm_audit_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        ($category_id) ? $obj->whereAdd("category_id='$category_id'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $sub_aganda_details = $this->get_vms_sub_agenda_details($vm_object_id, $obj->object_id);
                $sub_cat_score1_total = (float) array_sum(array_column($sub_aganda_details, 'score1'));
                $sub_cat_score2_total = (float) array_sum(array_column($sub_aganda_details, 'score2'));

                $agenda_list[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'category_id' => $obj->category_id,
                    'category_name' => get_vendor_agenda_category($obj->category_id),
                    'description' => get_vendor_agenda_category_desc($obj->category_id),
                    'category_score' => $obj->category_score,
                    'sub_category' => $sub_aganda_details,
                    'sub_category_score1_total' => $sub_cat_score1_total,
                    'sub_category_score2_total' => $sub_cat_score2_total,
                    'auditor_id' => $obj->auditor_id,
                    'auditor_name' => getFullName($obj->auditor_id),
                    'created_by' => $obj->created_by,
                    'created_name' => getFullName($obj->created_by),
                    'created_dept' => getDeptName($obj->created_by),
                    'created_plant' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_time' => display_date_format($obj->created_time),
                );
                $count++;
            }
            return $agenda_list;
        }
    }

    function get_vms_sub_agenda_details($vm_object_id, $audit_category_object_id = null, $sub_category_id = null) {
        $obj = new DB_Public_lm_vm_audit_sub_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        ($audit_category_object_id) ? $obj->whereAdd("audit_category_object_id='$audit_category_object_id'") : null;
        ($sub_category_id) ? $obj->whereAdd("sub_category_id='$sub_category_id'") : null;
        if ($obj->find()) {
            $doc_file_processor_object = new Doc_File_Processor();
            $count = 1;
            while ($obj->fetch()) {
                $sub_agenda_list[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'category_id' => $obj->audit_category_object_id,
                    'category_name' => getVendorType($obj->audit_category_object_id),
                    'sub_category_id' => $obj->sub_category,
                    'sub_category_name' => get_vendor_agenda_sub_category($obj->sub_category),
                    'sub_cat_desc' => get_vendor_agenda_sub_category_desc($obj->sub_category),
                    'classification_id' => $obj->classification,
                    'classification_name' => getClassificationName($obj->classification),
                    'score' => $obj->score,
                    'observation' => $obj->observation,
                    'conformity1' => $obj->conformity1,
                    'severity_level1' => $obj->severity_level1,
                    'score1' => $obj->score1,
                    'just_action_to_be_taken' => $obj->just_action_to_be_taken,
                    'severity_per1' => $obj->severity_per1,
                    'vendor_comments' => $obj->vendor_comments,
                    'conformity2' => $obj->conformity2,
                    'severity_level2' => $obj->severity_level2,
                    'score2' => $obj->score2,
                    'severity_per2' => $obj->severity_per2,
                    'created_by' => $obj->created_by,
                    'created_name' => getFullName($obj->created_by),
                    'created_dept' => getDeptName($obj->created_by),
                    'created_plant' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_time' => display_date_format($obj->created_time),
                    'attachments_observe' => $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id, "observation", $obj->object_id),
                    'attachments_feedback' => $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id, "feedback", $obj->object_id)
                );
                $count++;
            }
            return $sub_agenda_list;
        }
    }

    function get_vms_details($data = null) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        if ($data) {
            extract($data);
            ($vm_object_id) ? $obj->whereAdd("vm_object_id='$vm_object_id'") : null;
            ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
            ($dept) ? $obj->whereAdd("dm_department='$dept'") : null;
            ($created_by) ? $obj->whereAdd("created_time='$created_by'") : null;
            ($start_date) ? $obj->whereAdd("created_time>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("created_time<='$end_date'") : null;
            ($vendor_org) ? $obj->whereAdd("vendor_name='$vendor_org'") : null;
            ($vendor_plant) ? $obj->whereAdd("plant_name='$vendor_plant'") : null;
            ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
            ($vm_no) ? $obj->whereAdd("vm_no like '%$vm_no%'") : null;
            ($vendor_status) ? $obj->whereAdd("vendor_status='$vendor_status'") : null;
            ($appr_status) ? $obj->whereAdd("approval_status='$appr_status'") : null;
            ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
            ($status) ? $obj->whereAdd("status='$status'") : null;
            ($vendor_type_id) ? $obj->whereAdd("vendor_type_id='$vendor_type_id'") : null;
        }
        $count = 1;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $vms_list[] = array(
                    'vm_object_id' => $obj->vm_object_id,
                    'lm_doc_id' => $obj->lm_doc_id,
                    'lm_doc_name' => getLmDocName($obj->lm_doc_id),
                    'vm_no' => $obj->vm_no,
                    'vendor_org_id' => $obj->vendor_name,
                    'vendor_org_name' => $this->get_vms_org_name($obj->vendor_name),
                    'vendor_plant_id' => $obj->plant_name,
                    'vendor_plant_name' => $this->get_vms_org_plant_name($obj->plant_name),
                    'approval_status' => display_hypen_if_null($obj->approval_status),
                    'status' => $obj->status,
                    'wf_status' => $obj->wf_status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_plant_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_dept_name' => getDeptName($obj->created_by),
                    'created_by_plant_id' => getUserPlantId($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_time' => $obj->modified_time,
                    'rejected_reason' => $obj->rejected_reason,
                    'target_date' => display_date_format($obj->target_date),
                    'target_date1' => $obj->target_date,
                    'final_score' => display_hypen_if_null($obj->final_score),
                    'vendor_status' => $obj->vendor_status,
                    'message' => $obj->message,
                    'vendor_type_id' => $obj->vendor_type_id,
                    'vendor_type_name' => getVendorType($obj->vendor_type_id),
                    'audit_lead_id' => $obj->audit_lead,
                    'audit_lead_name' => getFullName($obj->audit_lead),
                    'audit_lead_dept' => getDeptName($obj->audit_lead),
                    'audit_lead_plant' => getPlantName(getUserPlantId($obj->audit_lead)),
                    'agenda_details' => $this->get_vms_agenda_details($obj->vm_object_id),
                    'auditors' => $this->get_vms_auditors($obj->vm_object_id),
                    'auditees' => $this->get_vms_auditees($obj->vm_object_id),
                    'audit_from_date' => display_date_format($obj->audit_from_date),
                    'audit_to_date' => display_date_format($obj->audit_to_date),
                    'objectives' => $obj->objectives,
                    'scope' => $obj->scope,
                    'effective_from' => $obj->effective_from,
                    'effective_to' => $obj->effective_to,
                    'vendor_status' => $obj->vendor_status,
                    //'vendor_approval_score' => (int) getVendorApprovalScore(),
                    //'final_observation_score' => (int) array_sum(array_column($this->get_vms_sub_agenda_details($obj->vm_object_id), 'observation_score')),
                    //'final_observation_feednback_score' => (int) array_sum(array_column($this->get_vms_sub_agenda_details($obj->vm_object_id), 'feedback_score')),
                    'doc_link' => get_qms_doc_no("vms", $obj->vm_object_id)["doc_link"],
                    'count' => $count,
                );
                $count++;
            }
            return $vms_list;
        }
        return null;
    }

    function get_vms_org_name($org_id) {
        $obj = new DB_Public_lm_vm_vendor_org();
        $obj->get("org_id", $org_id);
        return $obj->org_name;
    }

    function get_vms_org_plant_name($plant_id) {
        $obj = new DB_Public_lm_vm_vendor_org_plants();
        $obj->get("plant_id", $plant_id);
        return $obj->plant_name;
    }

    function get_vms_agenda_for_edit($vm_object_id) {
        $agenda_master_list = getVendorAgendaCatList(null, null, 'yes');
        for ($i = 0; $i < count($agenda_master_list); $i++) {
            $sub_agenda = [];
            $sub_agenda_list = $agenda_master_list[$i]['subcategorylist'];
            $is_agenda_exist = $this->is_vms_agenda_exist($vm_object_id, $agenda_master_list[$i]['object_id']);
            $category_score = ($is_agenda_exist) ? array_shift($this->get_vms_agenda_details($vm_object_id, $agenda_master_list[$i]['object_id']))['category_score'] : $agenda_master_list[$i]['category_score'];
            for ($j = 0; $j < count($sub_agenda_list); $j++) {
                $is_exist = $this->is_vms_sub_agenda_exist($vm_object_id, $sub_agenda_list[$j]['object_id']);
                $sub_agenda[] = array('object_id' => $sub_agenda_list[$j]['object_id'], 'sub_category' => $sub_agenda_list[$j]['sub_category'], 'is_sub_agenda_list_exist' => $is_exist);
            }
            $agenda_list_detais[] = array(
                'object_id' => $agenda_master_list[$i]['object_id'],
                'category' => $agenda_master_list[$i]['category'],
                'category_score' => $category_score,
                'is_agenda_exist' => $is_agenda_exist,
                'subcategorylist' => $sub_agenda
            );
        }
        return $agenda_list_detais;
    }

    function is_vms_agenda_exist($vm_object_id, $agenda_id) {
        $obj = new DB_Public_lm_vm_audit_category_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(vm_object_id) = lower('$vm_object_id') and lower(category_id) = lower('$agenda_id')");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function is_vms_sub_agenda_exist($vm_object_id, $sub_agenda_id) {
        $obj = new DB_Public_lm_vm_audit_sub_category_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(vm_object_id) = lower('$vm_object_id')  and lower(sub_category) = lower('$sub_agenda_id')");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function update_vms_schedule_details($vm_object_id, $data) {
        extract($data);

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_vm_vendor_details_master();
        $old_obj->get("vm_object_id", $vm_object_id);

        //Vendor organization and plant
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->plant_name = $uvms_plant_id;
        $obj->audit_from_date = $uvms_audit_from_date;
        $obj->audit_to_date = $uvms_audit_to_date;
        $obj->objectives = $uvms_objectives;
        $obj->scope = $uvms_scope;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            if ($this->delete_vms_agenda($vm_object_id)) {

                //delete audit plan if from to or to date chnaged
                if ($uvms_audit_from_date !== $old_obj->audit_from_date || $uvms_audit_to_date !== $old_obj->audit_to_date) {
                    $this->delete_vms_audit_plan($vm_object_id);
                }

                //Agenda Category
                for ($i = 0; $i < count($uvms_agenda_cat); $i++) {
                    $cat_object_id = get_object_id("definitions->object_id->workflow->vms->agenda_category");

                    $cat_obj = new DB_Public_lm_vm_audit_category_details();
                    $cat_obj->object_id = $cat_object_id;
                    $cat_obj->vm_object_id = $vm_object_id;
                    $cat_obj->category_id = $uvms_agenda_cat[$i];
                    $cat_obj->category_score = $score[$i];
                    $cat_obj->created_by = $usr_id;
                    $cat_obj->created_time = $date_time;
                    if ($cat_obj->insert()) {
                        //Agenda Sub Category
                        for ($k = 0; $k < count($uvms_agenda_sub_cat); $k++) {
                            $id_arr = explode('-', $uvms_agenda_sub_cat[$k]);
                            if ($uvms_agenda_cat[$i] === $id_arr[0]) {
                                $cat_sub_object_id = get_object_id("definitions->object_id->workflow->vms->agenda_sub_category");
                                $cat_sub_obj = new DB_Public_lm_vm_audit_sub_category_details();
                                $cat_sub_obj->object_id = $cat_sub_object_id;
                                $cat_sub_obj->audit_category_object_id = $cat_object_id;
                                $cat_sub_obj->sub_category = $id_arr[1];
                                $cat_sub_obj->vm_object_id = $vm_object_id;
                                $cat_sub_obj->created_by = $usr_id;
                                $cat_sub_obj->created_time = $date_time;
                                $cat_sub_obj->modified_by = $usr_id;
                                $cat_sub_obj->modified_time = $date_time;
                                $cat_sub_obj->insert();
                            }
                        }
                    }
                }

                $org_name = array_shift($this->get_vms_org($uvms_org_id))['org_name'];
                $plant_name = array_shift($this->get_vms_plants($this->get_vms_org($uvms_plant_id)))['plant_name'];
                $at_data['Vendor Organization'] = array("NA", $org_name, "$org_id - $org_name");
                $at_data['Vendor Plant'] = array("NA", $plant_name, "$plant_id - $plant_name");
                $at_data['Vendor Plant'] = array("NA", $plant_name, "$plant_id - $plant_name");
                addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
                return true;
            }
        }
        return false;
    }

    function delete_vms_agenda($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_vms_sub_agenda_details($vm_object_id, $data) {
        extract($data);
        for ($i = 0; $i < count($sub_category_object_id); $i++) {
            //Object to get old vlaues
            $old_obj = new DB_Public_lm_vm_audit_sub_category_details();
            $old_obj->get("object_id", $sub_category_object_id[$i]);

            //Object to insert new values
            $obj = new DB_Public_lm_vm_audit_sub_category_details();
            $obj->whereAdd("object_id='$sub_category_object_id[$i]'");
            $obj->whereAdd("vm_object_id='$vm_object_id'");

            //Risk Category
            ($uvms_risk_category[$i]) ? ($obj->classification = $uvms_risk_category[$i]) : false;

            //Default Score
            ($uvms_default_score[$i]) ? ($obj->score = $uvms_default_score[$i]) : false;

            //Audit Observation.First Time
            ($uvms_audit_observation[$i]) ? ($obj->observation = $uvms_audit_observation[$i]) : false;

            //Conformity1
            ($uvms_conformity1[$i]) ? ($obj->conformity1 = $uvms_conformity1[$i]) : false;   //Conformity1
            //severity level1
            if ($uvms_severity_level1[$i]) {
                $obj->severity_level1 = explode("-", $uvms_severity_level1[$i])[0];
                $obj->severity_per1 = explode("-", $uvms_severity_level1[$i])[1];
            };

            //observation Score1
            ($uvms_observation_score1) ? ($obj->score1 = $uvms_observation_score1[$i]) : 0;

            //Action To be Taken
            ($uvms_nc_action1[$i]) ? ($obj->just_action_to_be_taken = $uvms_nc_action1[$i]) : false;

            //Vendor Comments.. Sencond Time
            ($uvms_vendor_comments) ? ($obj->vendor_comments = $uvms_vendor_comments[$i]) : false;
            //Conformity2
            ($uvms_conformity2[$i]) ? ($obj->conformity2 = $uvms_conformity2[$i]) : false;   //Conformity1
            //Score2
            ($uvms_observation_score2) ? ($obj->score2 = $uvms_observation_score2[$i]) : 0;
            //severity level1
            if ($uvms_severity_level2[$i]) {
                $obj->severity_level2 = explode("-", $uvms_severity_level2[$i])[0];
                $obj->severity_per2 = explode("-", $uvms_severity_level2[$i])[1];
            };

            if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                
            } else {
                return false;
            }
        }
        $at_data['Subcategory score and risk category'] = array("Updated", 'Updated', 'Updated');
        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, "Updated");
        return true;
    }

    function update_vms_plant_audit_status($data) {
        $plant_id = $data['plant_id'];
        $vendor_status = $data['vendor_status'];
        $audit_status = $data['audit_status'];
        $effective_from = $data['effective_from'];
        $effective_to = $data['effective_to'];
        $audit_type = $data['audit_type'];
        $re_audit_date = $data['re_audit_date'];

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_vm_vendor_org_plants();
        $old_obj->get("plant_id", $plant_id);

        //Object to insert new values
        $obj = new DB_Public_lm_vm_vendor_org_plants();
        $obj->whereAdd("plant_id='$plant_id'");
        ($vendor_status) ? $obj->vendor_status = $vendor_status and $at_data['Vendor Status'] = array($old_obj->vendor_status, $vendor_status, $vendor_status) : null;
        ($audit_status) ? $obj->audit_status = $audit_status and $at_data['Audit Status'] = array($old_obj->audit_status, $audit_status, $audit_status) : null;
        ($effective_from) ? $obj->effective_from = $effective_from and $at_data['Effective from Date'] = array($old_obj->effective_from, $effective_from, $effective_from) : null;
        ($effective_to) ? $obj->effective_to = $effective_to and $at_data['Effective To Date'] = array($old_obj->effective_to, $effective_to, $effective_to) : null;
        ($re_audit_date) ? $obj->re_audit_date = $re_audit_date and $at_data['Re Audit Date'] = array($old_obj->re_audit_date, $re_audit_date, $re_audit_date) : null;
        ($audit_type) ? $obj->audit_type = $audit_type : null;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($plant_id, null, $at_data, $_POST['audit_trail_action'], "Successfuly Updated");
            return true;
        }
        return null;
    }

    function is_vms_vendor_plant_elegible_audit_schedule($plant_id, $audit_type) {
        $obj = new DB_Public_lm_vm_vendor_org_plants();
        $obj->get("plant_id", $plant_id);
        if ($audit_type === "First Time") {
            if ($obj->audit_type === "First Time" && $obj->is_active === "yes" && $obj->audit_status === "Audit Pending" && $obj->vendor_status === "Audit Pending" && empty($obj->effective_from) && empty($obj->effective_to && empty($obj->re_audit_date))) {
                return true;
            }
        }
        if ($audit_type === "Re Audit") {
            if ($obj->audit_type === "Re Audit" && $obj->is_active === "yes" && $obj->audit_status === "Completed" && $obj->vendor_status === "Qualified" && !empty($obj->effective_from) && !empty($obj->effective_to && !empty($obj->re_audit_date))) {
                $eleigible_date = getModifiedDateFormat("Y-m-d", $obj->effective_to, 0, 0, get_reminder_mail_days("vendor_approval_expiry"));
                //   if ($eleigible_date <= date('Y-m-d')) {
                return true;
                //   }
            }
        }
        return false;
    }

    function is_vms_nc_present($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_sub_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if ($obj->conformity1 === "Non Conformance") {
                    return true;
                }
            }
        }
        return false;
    }

    function update_vms_audit_plan($vm_object_id, $data) {
        extract($data);
        if (!$this->delete_vms_audit_plan($vm_object_id)) {
            return false;
        }
        for ($i = 0; $i < count($uvms_plan); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->vms->audit_plan");

            $obj = new DB_Public_lm_vm_audit_plan();
            $obj->object_id = $object_id;
            $obj->vm_object_id = $vm_object_id;
            $obj->date = $uvms_plan_date[$i];
            $obj->from_time = $uvms_plan_from_time[$i];
            $obj->to_time = $uvms_plan_to_time[$i];
            $obj->plan = $uvms_plan[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->insert(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $at_data['Audit Plan'] = array("Updated", 'Updated', 'Updated');
        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, "Audit Plan Updated");
        return true;
    }

    function delete_vms_audit_plan($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_plan();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_vms_audit_plan($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_plan();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $plan_list[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'date' => $obj->date,
                    'from_time' => $obj->from_time,
                    'to_time' => $obj->to_time,
                    'plan' => $obj->plan,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $plan_list;
        }
        return null;
    }

    function add_vms_auditors($vm_object_id, $data) {
        extract($data);
        $auditors_at_o = $auditors_at_n = $auditors_at_p = '';

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_vm_vendor_details_master();
        $old_obj->get("vm_object_id", $vm_object_id);

        if ($this->update_audit_lead($vm_object_id, $uvms_audit_lead)) {
            if ($old_aduitors = $this->get_vms_auditors($vm_object_id)) {
                if ($this->delete_vms_auditors($vm_object_id)) {
                    $auditors_at_o .= ($old_aduitors) ? "\n\t\t\t" . implode("\n\t\t\t", array_map(function ($ele) {
                                        return $ele['auditor_name'];
                                    }, $old_aduitors)) : "NA";

                    //$auditors_at_o .= ($old_aduitors) ? "\n\t\t\t" . implode("\n\t\t\t", array_map(fn($ele) => $ele['auditor_name'], $old_aduitors)) : "NA";
                }
            }
            for ($i = 0; $i < count($uvms_auditors); $i++) {
                $object_id = get_object_id("definitions->object_id->workflow->vms->auditors");
                $obj = new DB_Public_lm_vm_auditor_details();
                $obj->object_id = $object_id;
                $obj->vm_object_id = $vm_object_id;
                $obj->auditor_id = $uvms_auditors[$i];
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                if ($obj->insert()) {
                    $auditors_at_n .= "\n\t\t\t" . getFullName($uvms_auditors[$i]);
                    $auditors_at_p .= "\n\t\t\t" . $uvms_auditors[$i] . " - " . getFullName($uvms_auditors[$i]);
                } else {
                    return false;
                }
            }

            $audit_lead = getFullName($uvms_audit_lead);
            $at_data['Auditors'] = array($auditors_at_o, $auditors_at_n, $auditors_at_p);
            $at_data['Audit Lead'] = array("\n\t\t\t" . getFullName($old_obj->audit_lead), "\n\t\t\t" . $audit_lead, "\n\t\t\t $uvms_audit_lead - $audit_lead");
            addAuditTrailLog($vm_object_id, $object_id, $at_data, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function update_audit_lead($vm_object_id, $audit_lead) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->audit_lead = $audit_lead;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function get_vms_auditors($vm_object_id) {
        $obj = new DB_Public_lm_vm_auditor_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $agenda_list[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'auditor_id' => $obj->auditor_id,
                    'auditor_name' => getFullName($obj->auditor_id),
                    'auditor_dept' => getDeptName($obj->auditor_id),
                    'auditor_plant' => getPlantName(getUserPlantId($obj->auditor_id)),
                    'created_by' => $obj->created_by,
                    'created_name' => getFullName($obj->created_by),
                    'created_dept' => getDeptName($obj->created_by),
                    'created_plant' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_time' => display_date_format($obj->created_time)
                );

                $count++;
            }
            return $agenda_list;
        }
    }

    function delete_vms_auditors($vm_object_id) {
        $obj = new DB_Public_lm_vm_auditor_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_vms_auditees($vm_object_id, $data) {
        extract($data);
        $auditees_at_o = $auditees_at_n = $auditees_at_p = '';

        if ($old_aduitors = $this->get_vms_auditees($vm_object_id)) {
            if ($this->delete_vms_auditees($vm_object_id)) {
                //$auditees_at_o .= ($old_aduitors) ? "\n\t\t\t" . implode("\n\t\t\t", array_map(fn($ele) => $ele['auditee_name'], $old_aduitors)) : "NA";
                $auditees_at_o .= ($old_auditors) ? "\n\t\t\t" . implode("\n\t\t\t", array_map(function ($ele) {
                                    return $ele['auditee_name'];
                                }, $old_auditors)) : "NA";
            } else {
                $auditees_at_o = null;
                return false;
            }
        }
        for ($i = 0; $i < count($uvms_auditee_name); $i++) {
            $object_id = get_object_id("definitions->object_id->workflow->vms->auditees");
            $obj = new DB_Public_lm_vm_auditee_details();
            $obj->object_id = $object_id;
            $obj->vm_object_id = $vm_object_id;
            $obj->auditee_name = $uvms_auditee_name[$i];
            $obj->email = $uvms_auditee_email[$i];
            $obj->contact_number = $uvms_auditee_contact[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert()) {
                $auditees_at_n .= "\n\t\t\t" . $uvms_auditee_name[$i];
                $auditees_at_p .= "\n\t\t\t" . $uvms_auditee_name[$i];
            } else {
                return false;
            }
        }
        $at_data['Auditees'] = array($auditees_at_o, $auditees_at_n, $auditees_at_p);
        addAuditTrailLog($vm_object_id, $object_id, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }

    function get_vms_auditees($vm_object_id) {
        $obj = new DB_Public_lm_vm_auditee_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $auditee_list[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'auditee_name' => $obj->auditee_name,
                    'auditee_email' => $obj->email,
                    'auditee_contact' => $obj->contact_number,
                    'created_by' => $obj->created_by,
                    'created_name' => getFullName($obj->created_by),
                    'created_dept' => getDeptName($obj->created_by),
                    'created_plant' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_time' => display_date_format($obj->created_time)
                );

                $count++;
            }
            return $auditee_list;
        }
    }

    function delete_vms_auditees($vm_object_id) {
        $obj = new DB_Public_lm_vm_auditee_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function is_all_fields_in_edit_tab_completed($vm_object_id) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);

        if (empty($obj->audit_lead) || empty($obj->audit_from_date) || empty($this->get_vms_audit_plan($vm_object_id)) || empty($this->get_vms_auditors($vm_object_id)) || empty($this->get_vms_auditees($vm_object_id)) || !$this->is_vms_risk_score_present($vm_object_id)) {
            return false;
        }
        return true;
    }

    function is_vms_risk_score_present($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_sub_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if (empty($obj->score) || empty($obj->classification)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    function update_vms_wf_status($vm_object_id, $status) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);
        $obj->wf_status = $status;
        $obj->update();
        return true;
    }

    function update_vms_status($vm_object_id, $status) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);
        $obj->status = $status;
        $obj->update();
        return true;
    }

    function update_vms_approval_status($vm_object_id, $status) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);
        $obj->approval_status = $status;
        $obj->update();
        return true;
    }

    function get_vms_wf_status($vm_object_id) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);
        return $obj->wf_status;
    }

    function update_vms_closeout($vm_object_id, $wf_status, $status, $approval_status, $rejected_reason) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->wf_status = $wf_status;
        $obj->status = $status;
        $obj->approval_status = $approval_status;
        $obj->rejected_reason = $rejected_reason;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_vms_vendor_status($vm_object_id, $status) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->get("vm_object_id", $vm_object_id);
        $obj->vendor_status = $status;
        $obj->update();
        return true;
    }

    function get_vms_cancelled_details($vm_object_id) {
        $cancel_obj = new DB_Public_lm_vm_cancel_details();
        $cancel_obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($cancel_obj->find()) {
            while ($cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'vm_object_id' => $cancel_obj->vm_object_id,
                    'object_id' => $cancel_obj->object_id,
                    'reason' => $cancel_obj->reason,
                    'cancelled_by' => getFullName($cancel_obj->created_by),
                    'cancelled_time' => display_datetime_format($cancel_obj->created_time)
                );
            }
            return $cancel_details;
        }
        return null;
    }

    function add_vms_review_comments($vm_object_id, $review_comments, $usr_id, $date_time, $audit_trail_action, $review_stage) {
        $id = get_object_id("definitions->object_id->workflow->vms->review_comments");

        $dm_rev_comments_obj = new DB_Public_lm_vm_review_comments();
        $dm_rev_comments_obj->object_id = $id;
        $dm_rev_comments_obj->vm_object_id = $vm_object_id;
        $dm_rev_comments_obj->remarks = $review_comments;
        $dm_rev_comments_obj->review_stage = $review_stage;
        $dm_rev_comments_obj->created_by = $usr_id;
        $dm_rev_comments_obj->created_time = $date_time;
        if ($dm_rev_comments_obj->insert()) {
            //Audit Trail
            $commented_by = getFullName($usr_id);
            $at_data['Comments'] = array('NA', $review_comments, $review_comments);
            $at_data['Given By'] = array('NA', $commented_by, "$usr_id - $commented_by");
            addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Successfully Updated');
            return true;
        }
        return false;
    }

    function get_vms_mgmt_review_comments($vm_object_id, $created_by = null, $review_stage = null) {
        $obj = new DB_Public_lm_vm_review_comments();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        (!empty($created_by)) ? $obj->whereAdd("created_by='$created_by'") : null;
        (!empty($review_stage)) ? $obj->whereAdd("review_stage='$review_stage'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $review_array[] = array(
                    'object_id' => $obj->object_id,
                    'vm_object_id' => $obj->vm_object_id,
                    'user_name' => getFullName($obj->created_by),
                    'department' => getDeptName($obj->created_by),
                    "plant" => getPlantShortName(getUserPlantId($obj->created_by)),
                    'remarks' => trim($obj->remarks),
                    'review_stage' => $obj->review_stage,
                    'date_time' => display_datetime_format($obj->created_time),
                    'date' => get_modified_date_format($obj->created_time),
                    'count' => $count
                );
                $count++;
            }
            return $review_array;
        }
        return false;
    }

    function assign_vms_auditors($vm_object_id, $category_object_id_array, $auditors_array) {
        for ($i = 0; $i < count($category_object_id_array); $i++) {
            $obj = new DB_Public_lm_vm_audit_category_details();
            $obj->whereAdd("object_id='$category_object_id_array[$i]'");
            $obj->auditor_id = $auditors_array[$i];
            $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $at_data['Assign Auditors'] = array("Updated", 'Updated', 'Updated');
        addAuditTrailLog($vm_object_id, null, $at_data, $_POST['audit_trail_action'], "Updated");
        return true;
    }

    function update_vms_target_date_message($vm_object_id, $target_date, $msg) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        ($target_date) ? $obj->target_date = $target_date : null;
        $obj->message = $msg;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            $at_data['Target Date'] = array('NA', $target_date, "$target_date");
            ($target_date) ? $at_data['Message'] = array('NA', $msg, "$msg") : null;
            addAuditTrailLog($vm_object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfully Assigned');
            return true;
        }
        return false;
    }

    function update_vms_score_status($vm_object_id, $score, $status = null, $effective_from = null, $effective_to = null, $is_latest = null) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        $obj->final_score = $score;
        ($status) ? $obj->vendor_status = $status : null;
        ($effective_from) ? $obj->effective_from = $effective_from : null;
        ($effective_to) ? $obj->effective_to = $effective_to : null;
        ($is_latest) ? $obj->is_latest = $is_latest : null;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($vm_object_id, null, "Vendor Score", $_POST['audit_trail_action'], 'Successfully Updated');
            return true;
        }
        return false;
    }

    function update_vms_is_latest($vendor_id, $plant_id, $is_latest) {
        $obj = new DB_Public_lm_vm_vendor_details_master();
        $obj->whereAdd("vendor_name='$vendor_id'");
        $obj->whereAdd("plant_name='$plant_id'");
        $obj->is_latest = $is_latest;
        $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_attachments_vms($vm_object_id, $type, $usr_id, $date_time, $refrence_object_id = null) {
        /* Dropzone File Upload */
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_name = $_FILES['file']['name'];
            $file_name = clean_filename($file_name, 0, 80);

            $fhash = md5($tempFile);
            $hash = uniqid($fhash);

            $file_info = new SplFileInfo($_FILES['file']['name']);
            $extension = $file_info->getExtension();

            $file_id = get_object_id("definitions->object_id->workflow->vms->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $file_id;
            $file->type = $file_type;
            $file->name = $file_name;
            $file->size = $file_size;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_vm_doc_file();
            $doc_file->file_id = $file_id;
            $doc_file->object_id = $vm_object_id;
            $doc_file->type = $type;
            $doc_file->attached_by = $usr_id;
            $doc_file->attached_date = $date_time;
            $doc_file->ref_object_id = $refrence_object_id;
            if ($doc_file->insert()) {
                //audit trail
                $at_data['File Name'] = array('NA', $file_name, $file_name);
                $at_data['File Type'] = array('NA', $file_type, $file_type);
                $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                $at_data['Refrence Towards'] = array('NA', $type, $type);
                $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                addAuditTrailLog($vm_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function add_vms_audit_attachment($vm_object_id, $type, $usr_id, $date_time) {
        /* Dropzone File Upload */
        if (!empty($_FILES)) {
            foreach ($_FILES['file']['name'] as $ref_obj_id => $audit_files) {
                for ($i = 0; $i < count($_FILES['file']['name'][$ref_obj_id]); $i++) {
                    if ($_FILES['file']['name'][$ref_obj_id][$i]) {
                        $tempFile = $_FILES['file']['tmp_name'][$ref_obj_id][$i];
                        $file_type = $_FILES['file']['type'][$ref_obj_id][$i];
                        $file_size = $_FILES['file']['size'][$ref_obj_id][$i];
                        $file_name = $_FILES['file']['name'][$ref_obj_id][$i];
                        $file_name = clean_filename($file_name, 0, 80);

                        if ($file_name) {
                            $fhash = md5($tempFile);
                            $hash = uniqid($fhash);

                            $file_info = new SplFileInfo($_FILES['file']['name'][$ref_obj_id][$i]);
                            $extension = $file_info->getExtension();

                            $file_id = get_object_id("definitions->object_id->workflow->vms->audit_file_upload");

                            $file = new DB_Public_file();
                            $file->object_id = $file_id;
                            $file->type = $file_type;
                            $file->name = $file_name;
                            $file->size = $file_size;
                            $file->hash = $hash . "." . $extension;
                            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
                            $file->insert();

                            $doc_file = new DB_Public_lm_vm_doc_file();
                            $doc_file->file_id = $file_id;
                            $doc_file->object_id = $vm_object_id;
                            $doc_file->type = $type;
                            $doc_file->attached_by = $usr_id;
                            $doc_file->attached_date = $date_time;
                            $doc_file->ref_object_id = $ref_obj_id;
                            if ($doc_file->insert()) {
                                //audit trail
                                $at_data['File Name'] = array('NA', $file_name, $file_name);
                                $at_data['File Type'] = array('NA', $file_type, $file_type);
                                $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                                $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                                addAuditTrailLog($vm_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                            } else {
                                return false;
                            }
                        }
                    }
                }
            }
        }
    }

    function calculate_vms_vendor_score($vm_object_id) {
        $obj = new DB_Public_lm_vm_audit_sub_category_details();
        $obj->whereAdd("vm_object_id='$vm_object_id'");
        if ($obj->find()) {
            $total_score = 0;
            while ($obj->fetch()) {
                $total_score += ($obj->score2);
            }
            return $total_score;
        }
        return null;
    }
}
