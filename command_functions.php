<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function command_page_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, 'CONSTANT_' . $entity);
    
    $en_tit = 'page for executing a command'; 
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>' . "\n";
    $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
    $html_str .= '</center>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function command_selection_action_n_argument_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, 'CONSTANT_' . $entity);
    
    $en_tit = 'select an action and enter its argument in the window below';
    
    $la_bub_Tit = bubble_bubbled_capitalized_la_text_of_en_text ($en_tit);
    
    debug_n_check ($here , '$la_bub_Tit',  $la_bub_Tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function command_action_en_array_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_act_a = array ('debug', 'display', 'load', 'read', 'remove', 'set', 'unset', 'write');

    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, 'CONSTANT_' . $entity);

    debug_n_check ($here , '$en_act_a',  $en_act_a);
    exiting_from_function ($here);
    
    return $en_act_a;
}

function command_action_en_by_action_la_hash_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_act_a = irp_provide ('command_action_en_array', $here);

    $en_act_by_la_act_h = array ();
    foreach ($en_act_a as $en_act) {
        $la_act = language_translate_of_en_string ($en_act);
        $en_act_by_la_act_h[$la_act] = $en_act; 
    }

    debug_n_check ($here , '$en_act_by_la_act_h', $en_act_by_la_act_h);
    exiting_from_function ($here);
    
    return $en_act_by_la_act_h;
}

function command_action_la_array_sorted_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_act_by_la_act_h = irp_provide ('command_action_en_by_action_la_hash', $here);
    $la_act_sor_a = array_keys ($en_act_by_la_act_h);
    sort ($la_act_sor_a);
    
    debug_n_check ($here , '$la_act_sor_a',  $la_act_sor_a);
    exiting_from_function ($here);
    
    return $la_act_sor_a;
}

function command_selection_action_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $key = str_replace('_build', '', $here);
    father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");
    
/* Actions Button */
    $get_key_sel = 'command_action';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="' . $get_key_sel . '">' . "\n";
    $html_str .= '<option value="display">';
    $html_str .= string_html_capitalized_of_string (language_translate_of_en_string ('actions'));
    $html_str .= '</option>' . "\n";
    
    $la_act_sor_a = irp_provide ('command_action_la_array_sorted', $here);
    $en_act_by_la_act_h = irp_provide ('command_action_en_by_action_la_hash', $here);
    
/* Action list */
    foreach ($la_act_sor_a as $la_act) {
        $en_act = $en_act_by_la_act_h[$la_act];
        
        $html_str .= '<option value="' . $en_act . '"> ' . "\n";
        $html_str .= string_html_capitalized_of_string (ucfirst ($la_act));
        $html_str .= '</option> ' . "\n";
    }
    
    $html_str .= '</select> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
    return $html_str;
}

function command_selection_argument_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $key = str_replace('_build', '', $here);
    father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");
 
    $siz_hit = $_SESSION['parameters']['html_input_text_size'];
    $get_key_sel = 'command_argument';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<input type="text" name="' . $get_key_sel;
    $html_str .= '" size="' . $siz_hit;
    $html_str .= '">' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
    return $html_str;
}

function command_button_form_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $script_action = 'command_result_script.php';
    $entity = entity_name_of_script_nameoffile ($script_action);
    
    $get_key_sel = 'command_action:command_argument';
    $_SESSION['get_key_by_script_name'][$entity] = $get_key_sel;
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
    $html_str .= irp_provide ('command_selection_action', $here);
    $html_str .= irp_provide ('command_selection_argument', $here);
    $html_str .= inputtypesubmit_of_en_action_name ('go');
    $html_str .= '</form> ' .  "\n";
    $html_str .= comment_exiting_of_function_name ($here); 
    
    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
    return $html_str;
}

function command_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= irp_provide ('pervasive_page_header', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('command_page_title', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('command_selection_action_n_argument_title', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('command_button_form', $here);
    $html_str .= '<br><br>' . "\n";

    $html_str .= irp_provide ('pervasive_page_footer', $here);
    $html_str .= comment_exiting_of_function_name ($here); 
    
    exiting_from_function ($here);
    return $html_str;
}

exiting_from_module ($module);

?>
