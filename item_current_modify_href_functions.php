<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function item_current_modify_href_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_ent = irp_provide ('entry_current_name', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);

    $en_act = 'modify';
    $la_act = language_translate_of_en_string ($en_act);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<a href="item_current_modify_script.php'; 
    $html_str .= '?entry_current_name=' . $nam_ent;
    $html_str .= '&block_current_name=' . $nam_blo_cur ; 
    $html_str .= '">';
    $html_str .= $la_act;
    $html_str .= '</a>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    
    return $html_str;
    
}

exiting_from_module ($module);

?>