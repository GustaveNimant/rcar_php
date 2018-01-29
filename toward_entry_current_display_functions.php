<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it displays a entry"; 
$Documentation[$module]['what for'] = "";

entering_in_module ($module);

function toward_entry_current_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_ent_cur = irp_provide ('entry_current_name', $here);

    $script_action = 'entry_current_display_script.php';
    $entity = entity_name_of_script_nameoffile ($script_action);
    $_SESSION['get_key_by_script_name'][$entity] = 'entry_current_name' ;

#    $la_act_ent = language_translate_of_en_string ('display');

    $html_str  = comment_entering_of_function_name ($here);    
    $html_str .= '<a href="'. $script_action ;
    $html_str .= '?entry_current_name=' . $nam_ent_cur; 
    $html_str .= '">';
#    $html_str .= $la_act_ent;
    $html_str .= '</a>';

    $html_str .= comment_exiting_of_function_name ($here); 

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>