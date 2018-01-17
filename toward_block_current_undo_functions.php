<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "display the possible actions to be done on a block"; 
$Documentation[$module]['what for'] = "to undo, show history, rename"; 

entering_in_module ($module);

function toward_block_current_undo_previous_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $module = module_name_of_module_fullnameoffile (__FILE__);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_current_name', $here);

    $entity_fat = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "BUTTON_$entity_fat");

    $script_action = 'block_current_undo_script.php';
    $entity_son = entity_name_of_script_nameoffile ($script_action);
    father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $entity_son);

    debug_n_check ($here , '$script_action',  $script_action);
    $la_act_blo = language_translate_of_en_string ('undo');

    $en_tit = 'leave current version. Return to previous one';
    $la_tit = language_translate_of_en_string ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_tit);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<a href="' . $script_action;
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

function toward_block_current_undo_skip_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $en_str = 'no undo';
    $html_str = '(' . language_translate_of_en_string ($en_str) . ')';

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;
}

function toward_block_current_undo_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $pre_ite_con = irp_provide ('item_previous_content_display_content', $here);
    debug_n_check ($here , '$pre_ite_con',  $pre_ite_con);
    
    if (trim ($pre_ite_con) == 'no previous content' ) {
        $html_str = irp_provide ('toward_block_current_undo_skip', $here);
    }
    else {
        $html_str = irp_provide ('toward_block_current_undo_previous', $here);
    }
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>