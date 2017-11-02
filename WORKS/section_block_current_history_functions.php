<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "display the possible actions to be done on a block"; 
$Documentation[$module]['what for'] = "to history, show history, rename"; 

entering_in_module ($module);

function section_block_current_history_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $module = module_name_of_module_fullnameoffile (__FILE__);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_current_name', $here);

    $nof_mod = 'block_current_history_script.php';
    debug_n_check ($here , '$nof_mod',  $nof_mod);
    $la_act_blo = language_translate_of_en_string ('history');

    $html_str  = comment_entering_of_function_name ($here);    
    $html_str .= '<a href="'. $nof_mod ;
    $html_str .= '?entry_current_name=' . $nam_ent;
    $html_str .= '&block_current_name=' . $nam_blo_cur; 
    $html_str .= '&from_module_name=' . $module; 
    $html_str .= '">';
    $html_str .= $la_act_blo;
    $html_str .= '</a>';
    $html_str .= comment_exiting_of_function_name ($here); 

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>