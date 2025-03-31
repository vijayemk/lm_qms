<?php

// fetch only pending users details
$pending_details = getCurrentWorklistDetails();

$total_pending_count = 0;
$total_3m_count = 0;
$total_6m_count = 0;
$total_1y_count = 0;
$total_2y_count = 0;
foreach ($pending_details as $key => $val) {
    $count_3m = getWorklistViewDetails($val['user_id'], 0, 91);
    $count_6m = getWorklistViewDetails($val['user_id'], 92, 182);
    $count_1y = getWorklistViewDetails($val['user_id'], 183, 365);
    $count_2y = getWorklistViewDetails($val['user_id'], 366, 10000);
    $total = $count_3m + $count_6m + $count_1y + $count_2y;

    $pending_days_userwise_count[] = array('work_user_name' => $val['full_name'], 'work_user_id' => $val['user_id'], 'emp_id' => $val['emp_id'], 'dept_id' => $val['dept_id'],
        'dept' => $val['dept'], 'plant_id' => $val['plant_id'], 'plant' => $val['plant'], 'is_active' => $val['is_active'],
        'count_3m' => $count_3m,
        'count_6m' => $count_6m,
        'count_1y' => $count_1y,
        'count_2y' => $count_2y,
        'total' => $total,
    );
    $total_3m_count += $count_3m;
    $total_6m_count += $count_6m;
    $total_1y_count += $count_1y;
    $total_2y_count += $count_2y;
    $total_pending_count += $total;
}

$smarty->assign('total_3m_count', $total_3m_count);
$smarty->assign('total_6m_count', $total_6m_count);
$smarty->assign('total_1y_count', $total_1y_count);
$smarty->assign('total_2y_count', $total_2y_count);
$smarty->assign('pending_days_userwise_count', $pending_days_userwise_count);
$smarty->assign('total_pending_count', $total_pending_count);
$smarty->assign('main', _TEMPLATE_PATH_ . "user_pending_analysis.admin.tpl");
?>