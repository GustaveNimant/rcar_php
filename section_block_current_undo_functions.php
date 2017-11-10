<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "display the possible actions to be done on a block"; 
$Documentation[$module]['what for'] = "to undo, show history, rename"; 

entering_in_module ($module);

function section_block_current_undo_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $module = module_name_of_module_fullnameoffile (__FILE__);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_current_name', $here);

    $nof_mod = 'block_current_undo_script.php';
    debug_n_check ($here , '$nof_mod',  $nof_mod);
    $la_act_blo = language_translate_of_en_string ('undo');

    $en_tit = 'leave current version. Return to previous one';
    $la_tit = language_translate_of_en_string ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_tit);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<a href="' . $nof_mod;
    $html_str .= '?entry_current_name=' . $nam_ent;
    $html_str .= '&block_current_name=' . $nam_blo_cur; 
    $html_str .= '&from_module_name=' . $module . '"';
    $html_str .= ' title="' . $la_Tit ; 
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