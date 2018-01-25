<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "display the possible actions to be done on a block"; 
$Documentation[$module]['what for'] = "to history, show history, rename"; 

entering_in_module ($module);

function toward_block_current_history_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $script_action = 'block_current_history_display_script.php';
    $la_act_blo = language_translate_of_en_string ('history');

    $html_str  = comment_entering_of_function_name ($here);    
    $html_str .= '<a href="'. $script_action ;
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