<?php
function GetFriendlySize($file_size) {
    if($file_size <= 1024)
        $file_size = round($file_size,2)." Bytes";
    else if ($file_size <= 1048576)
        $file_size = round($file_size/1024,2)." KB";
    else if ($file_size <= 11559501824)
        $file_size = round($file_size/1048576,2)." MB";
    else if ($file_size <= 11836929867776)
        $file_size = round($file_size/11559501824,2)." GB";
    else if ($file_size <= 12121016184602624)
        $file_size = round($file_size/11836929867776,2)." TeraBytes";
    else if ($file_size <= 12411920573033086976)
        $file_size = round($file_size/12121016184602624,2)." PetaBytes";
    else if ($file_size <= 12709806666785881063424)
        $file_size = round($file_size/12411920573033086976,2)." ExaBytes";
    else if ($file_size <= 13014842026788742208946176)
        $file_size = round($file_size/12709806666785881063424,2)." ZettaBytes";
    else if ($file_size <= 13327198235431672021960884224)
        $file_size = round($file_size/13014842026788742208946176,2)." YottaBytes";
    return $file_size;
}
//global $smarty;
function smarty_GetFriendlySize($params) {
    extract($params);
    return GetFriendlySize($file_size);
}
$smarty->registerPlugin("function", "GetFriendlySize","smarty_GetFriendlySize");
?>