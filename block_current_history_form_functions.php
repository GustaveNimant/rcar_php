<?php
require_once "language_translate_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_history_form_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_tit = 'display the history of the current block';
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_bub_Tit); /* span */
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_history_form_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_fat = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($irp_fat, "BUTTON_$irp_fat");

  $script_action = 'block_current_history_setting_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);

  $la_Nam_act = ucfirst (language_translate_of_en_string ('display'));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('block_current_history_form_title', $here);
  $html_str .= '<input type="submit" value="' . $la_Nam_act . '">' . "\n";
  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>