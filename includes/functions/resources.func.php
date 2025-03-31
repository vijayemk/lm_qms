<?php
function get_message($code,$module='') {
    global $MESSAGE;
    //print_r($MESSAGE);
    if(!empty($module)){
        if (isset($MESSAGE[$module][$code]))
            return $MESSAGE[$module][$code];
    }elseif(isset($MESSAGE['global'][$code])){
        return $MESSAGE['global'][$code];
    }else
   return '';
}
function get_attribute_name($module,$attribute) {
    global $ATTRIBUTE_NAME;
    if (isset($ATTRIBUTE_NAME[$module][$attribute]))
       return $ATTRIBUTE_NAME[$module][$attribute];
    else
        return '';
}

function get_query($module,$query_name,$array_values) {
    global $ATTRIBUTE_NAME;
    $query=$ATTRIBUTE_NAME[$module][$query_name];
    $arg=$array_values;
    eval("\$query = \"$query\";");
    return $query;
}

function get_options($params,&$smarty) {
    extract($params);
    $include_file_path=_MODULES_.$module."/resources/".$name.".options.php";
    if(file_exists($include_file_path)) {
        require_once $smarty->_get_plugin_filepath('function','html_options');
        // Open file
        $fp = fopen ( $include_file_path, "r" );
        // Loop through file content and extract options
        $assoc_arr = "array(";
        while ( !feof ( $fp ) ) {
            $lineCnt++;
            $line = trim(fgets ( $fp ));
            if(!empty($line)){
                $x = split ( ";", $line );
                $assoc_arr .= "'$x[1]'=>'$x[0]',";
            }
        }
        $final_assoc_arr =  substr($assoc_arr, 0, -1);
        $final_assoc_arr .= ");";
        $final_assoc_arr = "\$options = " .$final_assoc_arr;
        eval($final_assoc_arr);
        // Close file
        fclose ( $fp );
        $result= "<select name='". $name ."'>";
        $result.="<option value=''>select</option>";
        $result .= smarty_function_html_options(array ('options'=>$options, 'selected' =>$selected, 'print_result'=>false),$smarty);
        $result .= '</select>';
    }
    return $result;
}
function get_dynamic_options($params,&$smarty) {
    extract($params);
    $include_file_path=_MODULES_.$module."/resources/".$name.".options.php";
    if(file_exists($include_file_path)) {
        require_once $smarty->_get_plugin_filepath('function','html_options');
        // Open file
        $fp = fopen ( $include_file_path, "r" );
        // Loop through file content and extract options
        $assoc_arr = "array(";
        while ( !feof ( $fp ) ) {
            $lineCnt++;
            $line = trim(fgets ( $fp ));
            if(!empty($line)){
                $x = split ( ";", $line );
                $assoc_arr .= "'$x[1]'=>'$x[0]',";
            }
        }
        $final_assoc_arr =  substr($assoc_arr, 0, -1);
        $final_assoc_arr .= ");";
        $final_assoc_arr = "\$options = " .$final_assoc_arr;
        eval($final_assoc_arr);
        // Close file
        fclose ( $fp );	
        $result ="<option value=''>select</option>";
        $result .= smarty_function_html_options(array ('options'=>$options, 'selected' =>$selected, 'print_result'=>false),$smarty);
    }
    return $result;
}
function template_get_message($params,&$smarty) {
    extract($params);
    return get_message($code,$module);
}
function template_get_attribute_name($params,&$smarty) {
    extract($params);
    return get_attribute_name($module,$attribute);
}
$smarty->registerPlugin("function", "lm_options","get_options");
$smarty->registerPlugin("function", "lm_dynamic_options","get_dynamic_options"); 
$smarty->registerPlugin("function", "message","template_get_message");
$smarty->registerPlugin("function", "attribute_name","template_get_attribute_name");
?>
