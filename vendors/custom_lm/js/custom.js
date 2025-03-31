//----------------------------------start of functions in (document).ready -------------------------//
$(document).ready(function () {
    // Delete Child Element from parent
    $(document).on('click', '.delete_ele', function () {
        let check_child_in = $(this).data('delete_from') ? $(this).data('delete_from') : 'form';
        let delete_ele = $(this).data('delete_ele') ? $(this).data('delete_ele') : '.child_ele';
        let child_ele_length = $(this).closest(check_child_in).find(delete_ele).length;
        if (child_ele_length > 1) {
            $(this).closest(delete_ele).remove();
        } else {
            show_notification("e", 'topright', 'Can not delete. Atleast one input required');
        }
    });
    // check the two objects properties with current object propertied are same or not. If it is same Error thrown.
    // Duplicate Entry Check based on Group function , ----- add class 'duplicate_check_group' for element to be checked, add data-duplicate_group= 'your_group_name'
    $(document).on("change", ".dupliate_field_val_req", function () {
        let dup_field = $(this).data("dupliate_field");
        let inputs = $(this).closest("form").find("[data-dupliate_field='" + dup_field + "']");
        let current_val = $(this).val();
        for (var i = 0; i <= inputs.length; i++) {
            if ($(inputs[i]).val() === current_val && inputs[i] != this) {
                var msg = $(this).data("duplicate_msg") ? $(this).data("duplicate_msg") : `${current_val} value already exist.\n Duplicate Value not allowed`;
                show_notification("e", 'topright', msg);
                $(this).val("").focus();
                return false;
            }
        }
    });
    // function call to generate datatable for element with class 'generate_datatable'
    let data_table_list = $('.generate_datatable');
    for (i = 0; i < data_table_list.length; i++) {
        let data_table = data_table_list[i];
        let title = $(data_table).attr('title'); //message for export options
        let ori = $(data_table).data('ori') ? $(data_table).data('ori') : 'portrait';
        let pagesize = $(data_table).data('pagesize') ? $(data_table).data('pagesize') : 'A4';
        let white_space = $(data_table).data('whitespace') ? $(data_table).data('whitespace') : 'wrap';
        let show_rows = $(data_table).data('show_rows') ? $(data_table).data('show_rows') : 10;
        let sort_column = [];
        if ($(data_table).data('sort_column') == 0) {
            sort_column = [[0, "asc"]]
        } else if ($(data_table).data('sort_column') > 0) {
            sort_column = [[$(data_table).data('sort_column'), "asc"]];
        }
        let hide_columns = $(data_table).data('hide_columns') ? $(data_table).data('hide_columns') : [];


        // Add tfoot
        $(data_table).append('<tfoot><tr></tr></tfoot>');
        let thead_name_array = $(data_table).find("thead > tr > th");
        let serach_input_th = '';
        for (j = 0; j < thead_name_array.length; j++) {
            let thead_name = $(thead_name_array[j]).html();
            if (thead_name != 'Action') {
                serach_input_th += '<th><input type="text" size="5" placeholder="' + thead_name + '"  data-toggle="tooltip" data-placement="bottom" data-original-title="Search ' + thead_name + '"/></th>';
            } else {
                serach_input_th += '<th></th>';
            }
        }
        $(data_table).find("tfoot > tr").append(serach_input_th);
        let t = $(data_table).dataTable({
            pagingType: "full_numbers",
            mark: true,
            dom: 'Bfrtip',
            order: sort_column,
            pageLength: show_rows,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                {
                    extend: 'pdfHtml5',
                    orientation: ori,
                    pageSize: pagesize,
                    exportOptions: {
                        columns: ':visible'
                    },
                    download: 'open',
                    title: '',
                    message: title,
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            fillColor: '#1fae66', // Background color for headers
                            color: 'white', // Text color for headers
                            alignment: 'left', // Alignment for headers
                            noWrap: true, // Prevent wrapping
                            padding: [10, 15] // Padding: [vertical, horizontal]
                        };
                        doc.footer = function (currentPage, pageCount, pageSize) {
                            return {
                                columns: [
                                    {
                                        text: 'Logicmind',
                                        bold: true,
                                        color: '#1fae66',
                                        alignment: 'left',
                                        margin: [40]
                                    },
                                    {
                                        text: 'Page ' + currentPage.toString() + ' of ' + pageCount,
                                        alignment: 'center'
                                    },
                                    {
                                        text: lm_dom.today_date(),
                                        alignment: 'right',
                                        margin: [0, 0, 40, 0]
                                    }
                                ],
                                margin: [0, 0, 0, 10],
                                fontSize: 10
                            };
                        };

                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible',
                        message: title
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible',
                    }
                },
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    message: title
                },
                {
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore']
                }
            ],
            //hide columns
            columnDefs: [
                {targets: hide_columns, visible: false} // Hides 3rd and 5th columns
            ],
            autoWidth: false
        });
        $(data_table).addClass("table table-hover").removeAttr("title").parent().css("overflow-x", "auto").find("tbody").addClass("").css("whiteSpace", white_space);
        $(data_table).find("thead").css("whiteSpace", "nowrap");
        let table = $(data_table).DataTable();
        table.on('draw', function () {
            var body = $(table.table().body());
        });
        //Apply S.No for a row
        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    }
});
//----------------------------------End of functions in (document).ready ---------------------------//

//----------------------------------start of named functions -------------------------------------//

// common notification function,-----pass notification type and msg as arugemnts,------e==error,s=success,n==notifiy,i==info
function show_notification(err_type, position, msg, title) {
    //let position = "topright";
    if (err_type == 'e') {
        var type = "error";
        var icon = "fa fa-exclamation-circle vd_red";
        var title = "ERROR";
    } else if (err_type == 's') {
        var type = "success";
        var icon = "fa fa-check-circle vd_green";
        var title = "SUCCESS";
    } else if (err_type == 'n') {
        var type = "notify";
        var icon = "fa-info-circle vd_blue";
        var title = "NOTIFY";
    } else if (err_type == 'i') {
        var type = "info";
        var icon = "fa fa-exclamation-triangle vd_yellow";
        var title = "INFO";
    } else if (err_type == 's1') {
        var type = "success";
        var icon = "fa fa-info-circle vd_blue";
        var title = (title) ? title : "INFO";
    }
    notification(position, type, icon, title, msg);
}

//common function to error exists of input array ----- add class 'error_exits' for element to be checked, pass form  id or class as argument
function submit_handler_error_exists(form) {
    var element_list = $(form).find(".error_exists");
    for (i = 0; i < element_list.length; i++) {
        if ($(element_list[i]).text() != "") {
            $(element_list[i]).focus();
            show_notification("e", 'topright', $(element_list[i]).text() + " try with diffrent value");
            return true;
        }
    }
    return false;
}

function ajax_respone_handler_value_exist(result, ele) {
    var title = ele.parents().siblings('label').text();
    if (result) {
        ele.siblings(".error_exists").text(title + " Exists");
    } else {
        ele.siblings(".error_exists").text("");
    }
}

// self invoking function to open menus default based on breadcrumb
(function set_left_nav_bar() {
    let bread_crumb_menus = $('body').find('.breadcrumb').children("li");
    var parent_ele = '';
    for (i = 1; i <= bread_crumb_menus.length - 1; i++) {
        let menu_name = $(bread_crumb_menus[i]).text().trim();
        if (i == 1) {
            var tmp = $(".vd_navbar-left > .navbar-menu > .vd_menu > ul > li > a").find('.menu-text:contains("' + menu_name + '")');
        } else {
            var tmp = $(parent_ele).parent('a').siblings(".child-menu").find('> ul > li > a').find('.menu-text:contains("' + menu_name + '")');
        }
        $(tmp).parent('a').addClass("open");
        if (i == bread_crumb_menus.length - 1) {
            $(tmp).closest("li").css("background", "rgba(255,255,255,0.15)");
        } else {
            $(tmp).parent('a').siblings(".child-menu").css("display", "block");
        }
        parent_ele = tmp;
    }
});
// refresh page
$(document).on("click", ".page_reload", function () {
    loading.show();
    location.reload();
});
//common bootstrap wizard initialzation
(function initialize_wizard() {
    let wizard_list = $('.generate_wizard');
    for (i = 0; i < wizard_list.length; i++) {
        let wizard_type = $(wizard_list[i]).data('wizard_type') ? $(wizard_list[i]).data('wizard_type') : 'nav nav-pills nav-justified';
        $(wizard_list[i]).bootstrapWizard({
            'tabClass': wizard_type,
            'nextSelector': '.wizard .next',
            'previousSelector': '.wizard .prev',
            'onTabShow': function (tab, navigation, index) {
                $(this).find('.next').show();
                if ($(this).find('.nav li:last-child').hasClass('active')) {
                    $(this).find('.next').hide();
                }
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $(navigation).closest('.generate_wizard').find('.progress-bar').css({width: $percent + '%'});
            },
        });
    }
}
)();
function initialize_timepicker() {
    let date_input = $('.generate_timepicker');
    for (i = 0; i < date_input.length; i++) {
        let show_seconds = $(date_input[i]).data('time_show_secondas') ? $(date_input[i]).data('time_show_secondas') : false;
        let show_inputs = $(date_input[i]).data('time_show_input') ? $(date_input[i]).data('time_show_input') : false;
        tets = $(date_input[i]).val();
        if ($(date_input[i]).val()) {
            $(date_input[i]).attr({placeholder: "HH:MM", "readonly": true}).timepicker('remove').data('timepicker', null).off().timepicker({showMeridian: false, showSeconds: false, showInputs: show_inputs, minuteStep: 1, secondStep: 1, defaultTime: $(date_input[i]).val()});
        } else {
            $(date_input[i]).attr({placeholder: "HH:MM", "readonly": true}).timepicker('remove').data('timepicker', null).off().timepicker({showMeridian: false, showSeconds: false, showInputs: show_inputs, minuteStep: 1, secondStep: 1});
        }
    }

}
initialize_timepicker();
function initialize_datepicker() {
    let date_input = $('.generate_datepicker');
    for (i = 0; i < date_input.length; i++) {
        let minimum_date = $(date_input[i]).data('datepicker_min');
        let maximum_date = $(date_input[i]).data('datepicker_max');
        let change_month = ($(date_input[i]).data('datepicker_change_month'))?? true;
        let change_year = ($(date_input[i]).data('datepicker_change_month'))?? true;
        let date_format = ($(date_input[i]).data('datepicker_date_format')) || 'yy-mm-dd';
        $(date_input[i]).removeClass("hasDatepicker").attr({placeholder: "YYYY-MM-DD", "readonly": true}).datepicker({showMonthAfterYear: true, changeMonth: change_month, changeYear: change_year, minDate: minimum_date, maxDate: maximum_date, dateFormat: date_format});
    }
}
initialize_datepicker();
$.validator.addMethod("dateFormat", function (value, element) {
    //console.log(value.match(/(d{4})-(d{2})-(d{2})/));
    return value.match(/(d{4})-(d{2})-(d{2})/);
}, "Please enter a date in the format dd-mm-yyyy.");
function initialize_boottarpswitch() {
    let bootstrap_switchs = $('.switch_unchecked');
    for (i = 0; i < bootstrap_switchs.length; i++) {
        $(bootstrap_switchs[i]).bootstrapSwitch("destroy");
        //on chanage
        $(bootstrap_switchs[i]).bootstrapSwitch({
            onSwitchChange: function (e, state) {
                let ele_id = $(this).attr('id');
                var checked_value = $(this).data("checkd_val");
                var unchecked_value = $(this).data("uncheckd_val");
                var checkbox_name = $(this).attr('name');
                var toggle_switch = $(this).closest("form").find("[data-toggle_to='" + ele_id + "']");
                if (state) {
                    $(this).val(checked_value).siblings('.unchecked_val').remove();
                    ($(toggle_switch).val()) ? $(toggle_switch).show() : null;
                    $(toggle_switch).show();

                } else {
                    var input_box = "<input class='unchecked_val' type='hidden' name='" + checkbox_name + "' value='" + unchecked_value + "'> ";
                    $(this).closest('form').find("[data-toggle_to='" + ele_id + "']").find('.bootstrap-switch-animate').removeClass('bootstrap-switch-on').addClass('bootstrap-switch-off').find(".switch_unchecked").val(unchecked_value);
                    $(this).parent().append(input_box);
                    ($(toggle_switch).val()) ? $(toggle_switch).hide() : null;
                    $(toggle_switch).hide();
                }
            }
        });
        //if not checked by deafult
        if ($(bootstrap_switchs[i]).is(":not(:checked)")) {
            var input_box = "<input class='unchecked_val' type='hidden' name='" + $(bootstrap_switchs[i]).attr('name') + "' value='" + $(bootstrap_switchs[i]).data("uncheckd_val") + "'> ";
            $(bootstrap_switchs[i]).parent().append(input_box);
        } else {
            $(bootstrap_switchs[i]).val($(bootstrap_switchs[i]).data("checkd_val"));
        }
    }
}
initialize_boottarpswitch();
function initialize_select2() {
    let selects = $('.generate_select2');
    for (i = 0; i < selects.length; i++) {
        $(selects[i]).select2({allowClear: false, placeholder: "Select"});
    }
}
initialize_select2();
function initialize_multiselect() {
    let multiselect_inputs = $(document).find('.generate_multiselect');
    for (i = 0; i < multiselect_inputs.length; i++) {
        $(multiselect_inputs[i]).multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function (value) {
                return value.length > 1;
            }
        });
    }
}
initialize_multiselect();

//form_valiadtion object
lm_validate = {
    array_of_input: function (ele_array) {
        for (var i = 0; i < ele_array.length; i++) {
            let selector = ele_array[i].split("@");
            //If Selector Contains @ select element else select its name
            var check = (selector.length > 1) ? $(selector[0]) : $('[name="' + ele_array[i] + '"]');
            for (var j = 0; j < check.length; j++) {
                if (($(check[j]).val() == "" || $(check[j]).val() === null) && ($(check[j]).is(":enabled"))) {
                    show_notification("e", 'topright', $(check[j]).attr("title"));
                    $(check[j]).focus();
                    return false;
                }
            }
        }
        return true;
    },
    check_box: function (ele_array) {
        for (var i = 0; i < ele_array.length; i++) {
            let selector = ele_array[i].split("@");
            //If Selector Contains @ select element else select its name
            var check = (selector.length > 1) ? $(selector[0] + ":checked").length : $('[name="' + ele_array[i] + '"]:checked').length;
            if (check === 0) {
                var ele = (selector.length > 1) ? $(selector[0])[0] : $('[name="' + ele_array[i] + '"]')[0];
                show_notification("e", 'topright', $(ele).attr("title"));
                $(check[i]).focus();
                return false;
            }
        }
        return true;
    },
    radio_button: function (ele_array) {
        var radio_group = [];
        for (var i = 0; i < ele_array.length; i++) {
            radio_group.push($(ele_array[i]).attr("name"));
        }
        var radio_group2 = lm_dom.array_unique(radio_group);
        for (var i = 0; i < radio_group2.length; i++) {
            let check = $('[name="' + radio_group2[i] + '"]:checked').length;
            if (check == 0) {
                show_notification("e", 'topright', $('[name="' + radio_group2[i] + '"]').attr("title"));
                $('[name="' + radio_group2[i] + '"').siblings("label").addClass("fa-beat-animation");
                setTimeout(() => $('[name="' + radio_group2[i] + '"').siblings("label").removeClass("fa-beat-animation"), 3000);
                return false;
            }
        }
        return true;
    },
    set_min_date: function (value_ele, ele_array) {
        let eles = ele_array.split(',');
        for (var i = 0; i < eles.length; i++) {
            let ele = $('[name="' + eles[i] + '"]');
            ele.val("").removeAttr("disabled").attr({placeholder: "YYYY-MM-DD", "readonly": true, "data-datepicker_min": $(value_ele).val()}).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $(value_ele).val(), maxDate: ele.data('datepicker_max'), dateFormat: 'yy-mm-dd'});
        }
    },
    set_max_date: function (value_ele, ele_array) {
        let eles = ele_array.split(',');
        for (var i = 0; i < eles.length; i++) {
            let ele = $('[name="' + eles[i] + '"]');
            ele.val("").removeAttr("disabled").attr({placeholder: "YYYY-MM-DD", "readonly": true, "data-datepicker_max": $(value_ele).val()}).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: ele.data('datepicker_min'), maxDate: $(value_ele).val(), dateFormat: 'yy-mm-dd'});
        }
    },
    is_value_exist_in_array: function (array_list, serach_ele, msg, msg_on) {
        msg_on = (!msg_on) ? "not_found" : msg_on;
        if (array_list.find((element) => element == serach_ele)) {
            (msg_on === "found") ? (msg) ? show_notification("e", 'topright', msg) : '' : null;
            return true;
        }
        (msg_on === "not_found") ? (msg) ? show_notification("e", 'topright', msg) : '' : null;
        return false;
    },
    is_duplicate_value_exists_in_array: function (array, ele) {
        $(".lm_duplicate_val").removeClass("vd_bg-red lm_duplicate_val");
        var duplicateValues = array.filter(function (element, index) {
            return array.indexOf(element) !== index;
        });
        $.each(duplicateValues, function (index, value) {
            $(ele).find('[data-drop_down_value="' + value + '"]').addClass('vd_bg-red lm_duplicate_val');
        });
        let return_val = (Object.keys(duplicateValues).length === 0) ? true : (show_notification("e", 'topright', "Remove Duplicate Values"), false);
        return return_val;
    },
    is_duplicate_value_exists_in_multi_array: function (ele) {
        let ele_array = $(ele);
        for (var i = 0; i < ele_array.length; i++) {
            let dupl_check = $(ele_array[i]).attr('data-dupliate_field');
            let dupl_check_array = $(ele_array[i]).closest("form").find('[data-dupliate_field="' + dupl_check + '"]').val();

            for (var j = 0; j < $(ele_array[i]).length; j++) {
                if (lm_validate.is_duplicate_value_exists_in_array(dupl_check_array, $(ele_array[i]))) {
                    return false;
                }
            }
        }
        return true;
    },
    checked_toggle: function () {
        let ele = $(event.target).data("toggle_ele");
        ($(event.target).is(':checked')) ? $(ele).show() : $(ele).hide();
    },
    array_of_input_select: function (ele_array) {
        for (var i = 0; i < ele_array.length; i++) {
            let selector = ele_array[i].split("@");
            //If Selector Contains @ select element else select its name
            var check = (selector.length > 1) ? $(selector[0]) : $('[name="' + ele_array[i] + '"]');
            for (var j = 0; j < check.length; j++) {
                if (($(check[j]).find("option").length === 0) && ($(check[j]).is(":enabled"))) {
                    show_notification("e", 'topright', $(check[j]).attr("title"));
                    $(check[j]).focus();
                    return false;
                }
            }
        }
        return true;
    }
};
$(document).on("change", ".date_changed", function () {
    lm_validate.set_min_date(this, $(this).data('date_changed'));
});
$(document).on("change", ".date_changed_max", function () {
    lm_validate.set_max_date(this, $(this).data('date_changed'));
});
function get_action_users(lm_doc_id, action, dept_id, ele, multiselect, remove_options) {
    $(ele).empty();
    remove_options = (typeof remove_options !== 'undefined' && remove_options !== null) ? remove_options.split(",") : [];
    if (dept_id) {
        x_get_doc_mgmt_auth_users(lm_doc_id, action, dept_id, function (result) {
            ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options);
        });
    }
}
function get_dept_users(value, ele, multiselect, remove_options, all_select) {
    remove_options = (typeof remove_options !== 'undefined') ? remove_options.split(",") : [];
    x_get_dept_users(value, function (result) {
        console.log(result);
        ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options, all_select);
    });
}

function get_dept_list(value, ele, multiselect, remove_options, all_select) {
    remove_options = (typeof remove_options !== 'undefined') ? remove_options.split(",") : [];
    x_getDeptList(value, function (result) {
        ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options, all_select);
    });
}
function get_plant_dept_list(value, ele, multiselect, remove_options, all_select) {
    remove_options = (typeof remove_options !== 'undefined') ? remove_options.split(",") : [];
    x_get_dept_list(value, function (result) {
        ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options, all_select);
    });
}
function get_access_rights_dept_list(doc_ref_id, plant_id, dept_id, is_enabled, ele, multiselect, remove_options) {
    remove_options = (typeof remove_options !== 'undefined') ? remove_options.split(",") : [];
    x_getAccessRightsDeptList(doc_ref_id, plant_id, dept_id, is_enabled, function (result) {
        ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options);
    });
}

function ajax_respone_handler_set_dropdown(result, ele, multiselect, remove_options, all_select, selected_val = null) { 
    remove_options = (typeof remove_options !== 'undefined') ? remove_options : [];
    let all_select_opt = (all_select) ? all_select : 'Select';
    $(ele).empty();
    let writter = multiselect ? "" : `<option value="">${all_select_opt}</option>`;
    $.each(result, function (key, val) {
        //if (!lm_validate.is_value_exist_in_array(remove_options, val.drop_down_value)) {
        if (lm_validate.is_value_exist_in_array(remove_options, val.drop_down_value) === false) {
            writter += `<option value="${val.drop_down_value}" data-drop_down_value="${val.drop_down_value}" ${selected_val === val.drop_down_value ? 'selected' : ''}>${val.drop_down_option}</option>`;
            // writter += `<option value="${val.drop_down_value}" data-drop_down_value="${val.drop_down_value}" ${selected_val === val.drop_down_value ? 'selected' : ''}>${val.drop_down_option}</option>`;
        }
    }); 
    $(ele).focus();
    $(ele).append(writter);
}

$(document).on("change", ".show_hide_ele", function () {
    $("." + $(this).data("hide_forms")).hide();
    $("#" + $(this).val()).show();
});
// $(document).on("click", ".search_audit_trail", function () {
//     loading.show();
//     search_audit_trail();
// });
$(document).on("change", ".search_audit_trail", function () {
    loading.show();
    search_audit_trail();
});

//Audit trail
function search_audit_trail() {
    if ($(".query").val()) {
        let refrence_object_id = ($(".refrence_object_id").val()) ? $(".refrence_object_id").val() : '%';
        let year = ($(".year").val()) ? $(".year").val() : '%';
        let month = ($(".month").val()) ? $(".month").val() : '%';
        let plant = ($(".plant").val()) ? $(".plant").val() : '%';
        let dept = ($(".dept").val()) ? $(".dept").val() : '%';
        let user = ($(".user").val()) ? $(".user").val() : '%';
        let from_date = ($(".from_date").val()) ? $(".from_date").val() + " 00:00:00" : $(".from_date").data("datepicker_min");
        let to_date = ($(".to_date").val()) ? $(".to_date").val() + " 23:59:59" : $(".to_date").data("datepicker_max");
        // loading.show();
        x_search_view("audit", $(".query").val(), [refrence_object_id, year, month, plant, dept, user, from_date, to_date], function (result) {
            let table = ($.fn.dataTable.isDataTable('.audit_trail_result_table')) ? $('.audit_trail_result_table').DataTable() : null;
            $(".audit_trail_result").hide();
            if (typeof result === 'object') {
                table.clear().draw();
                $.each(result, function (key, val) {
                    //  var diff_value = htmldiff(val[5], val[4]);
                    // var new_value = diff_value.replace(/<del[^>]*>([\s\S]*?)<\/del>/g, '');
                    // let old_value = diff_value.replace(/<ins[^>]*>([\s\S]*?)<\/ins>/g, '');
                    table.row.add(['', val[2], val[0], val[1], val[3], `<span class="lm_prewrap">${val[4]}</span>`, `<span class="lm_prewrap">${val[5]}</span>`, val[6]]).draw(true);
                });
                $(".found_records").show();
                loading.hide();
                return;
            }
            $(".no_records").show();
            loading.hide();
        });
    } else {
        show_notification("e", 'topright', "Please Select Audit Section");
        loading.hide();
    }
}

// show and hide loading object
loading = {
    show: function (show_on_ele) {
        $("body").block({
            message: '<h2><i class="fa fa-spinner fa-spin vd_green loading_show"></i></h2>',
            css: {border: 'none', padding: '15px', background: 'none', display: "block", 'z-index': 1052},
            overlayCSS: {backgroundColor: '#FFF', 'z-index': 1051}
        });
        $("body").css("opacity", 0.6);
    },
    hide: function (show_on_ele) {
        $("body").css("opacity", 1).find(".blockUI.blockOverlay,.blockUI.blockMsg.blockElement").hide();
    }
};
function capFirstLetterInSentence(sentence) {
    let words = sentence.split(" ").map(word => {
        return word[0].toUpperCase() + word.slice(1);
    })
    return words.join(" ");
}

function capFirst(str) {
    return str[0].toUpperCase() + str.slice(1).toLowerCase();
}

function add_element(child_element, parent_element) {
    let children = $(child_element).parent().children();
    let child_ele = $(children[0]).clone();
    lm_dom.reset_dynamic_ele(child_ele);
    lm_dom.reset_child(child_ele);
    $(parent_element).append($(child_ele).prop('outerHTML'));
    //If Node Contains 2d_array class Set 2d Array
    (lm_dom.check_2d_array($(children[0]))) ? lm_dom.set_2d_array($(children[0])) : null;

}

lm_dom = {
    find_in_parent: function (ele, parent, find_ele) {
        return $(ele).closest(parent).find(find_ele);
    },
    append_search_icon: function (ele) {
        $('body').find('.lm_search_selected').remove();
        let ele_list = $(ele);
        for (i = 0; i < ele_list.length; i++) {
            ($(ele_list[i]).val()) ? $(ele_list[i]).parent().siblings(".control-label").append('<span class="lm_search_selected mgl-10 badge vd_bg-blue"><i class="fa fa-search fa" aria-hidden="true"></i></span>') : null;
        }
    },
    re_initialize: function () {
        initialize_select2();
        initialize_datepicker();
        initialize_timepicker();
        // initialize_boottarpswitch();
        initialize_multiselect();
    },
    get_timestamp: function () {
        return Date.now();
    },
    reset_dynamic_ele: function (ele) {
        $(ele).find("[data-delete_ele]").toArray().forEach(function (element, index) {
            $(ele).find($(element).data("delete_ele")).not(":first").remove();
        });
        $(ele).find(".child_ele").not(":first").remove();
    },
    assign_unique_attr_val: function (eles, attr) {
        $.each($(eles), function (index, ele) {
            let unique_val = lm_dom.random_no();
            $(ele).attr(attr, unique_val + index);
        });
    },
    array_unique: function (array) {
        let uniqueArray = [];
        for (var i = 0; i < array.length; i++) {
            (uniqueArray.indexOf(array[i]) === -1) ? uniqueArray.push(array[i]) : null;
        }
        return uniqueArray;
    },
    reload_page: function () {
        loading.show();
        location.reload();
    },
    get_date_time_diff: function (date1, date2, type) {
        var date1 = new Date(date1);
        var date2 = new Date(date2);
        let timeDiff = Math.abs(date2.getTime() - date1.getTime());
        let dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
        let return_val = (type === "days") ? dayDiff : timeDiff;
        return return_val;
    },
    today_date: function () {
        var today = new Date();
        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
        var day = today.getDate().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;
        return formattedDate;
    },
    clear_ele: function (ele_list) {
        let eles = ele_list.split(',');
        for (var i = 0; i < eles.length; i++) {
            $(eles[i]).val("").html("");
        }
    },
    assign_id_to_multiselect: function (ele) {
        var ele_list = $(ele).closest('form').find(".generate_multiselect");
        $.each(ele_list, function (i, element) {
            let unique_val = lm_dom.random_no();
            $(element).attr("id", unique_val + i);
            $(element).closest('.dyn_ms').find('.ms_rightAll').attr("id", unique_val + i + "_rightAll");
            $(element).closest('.dyn_ms').find('.ms_rightSelected').attr("id", unique_val + i + "_rightSelected");
            $(element).closest('.dyn_ms').find('.ms_leftSelected').attr("id", unique_val + i + "_leftSelected");
            $(element).closest('.dyn_ms').find('.ms_leftAll').attr("id", unique_val + i + "_leftAll");
            $(element).closest('.dyn_ms').find('.ms_to').attr("id", unique_val + i + "_to");
            $(element).multiselect('destroy');
        });
    },
    check_2d_array: function (ele) {
        return ($(ele).find(".2d_array").length > 0) ? true : false;
    },
    set_2d_array: function (ele) {
        var ele_list = $(ele).closest('.2d_parent').find(".2d_array");
        let index = lm_dom.random_no();
        for (i = 0; i < ele_list.length; i++) {
            let new_index = $(ele_list[i]).data("2d_index") ?? index + i;
            let current_name = $(ele_list[i]).data("2dname");
            $(ele_list[i]).prop("name", current_name + '[' + new_index + '][]');
        }
    },
    reset_child: function (ele) {
        $(ele).find('input, textarea, select,.reset_ele').each(function () {
            (!$(this).hasClass('no_reset_ele')) ? $(this).val('') : null;
            ($(this).hasClass('reset_ele')) ? $(this).html('') : null;
            //for multiselect
            ($(this).is('select') && $(this).attr('size') && $(this).attr('multiple')) ? $(this).empty() : null;
            //for select element
            ($(this).hasClass('reset_select')) ? $(this).html('') : null;
        });
    },
    random_no: function () {
        return Math.floor(Math.random() * 10000000);
    },
    array_join: (input_array, separtor) => ((Array.isArray(input_array)) ? input_array.join(separtor) : null),
};

$(document).on("change", ".show_date_diff", function () {
    let from_date = ($(this).attr('data-datepicker_min')) ? $(this).attr('data-datepicker_min') : lm_dom.today_date();
    from_date = (from_date === "0") ? lm_dom.today_date() : $(this).attr('data-datepicker_min');
    let days_diff = lm_dom.get_date_time_diff(from_date, $(this).val(), "days");
    lm_dom.find_in_parent(this, '.date_diff', '.date_diff_days').html(days_diff + " days");
});

//----------------------------------End of named functions -------------------------------------//


//----------------------------------to be verified -------------------------------------//
let lm_text = {
    upper_case: (ele) => $(ele).val($(ele).val().toUpperCase()),
    lower_case: (ele) => $(ele).val($(ele).val().toLowerCase())
};

$(document).on("click", ".embed_file", function () {
    loading.show();
    let embed_ele = $(this).data("show_on");
    $(embed_ele).attr({
        'src': $(this).data("url"),
        'type': $(this).data("type") ?? "application/pdf"
    });
    // Wait for the PDF to load before hiding the loading indicator
    $(embed_ele).on('load', function () {
        loading.hide();
    });
});
