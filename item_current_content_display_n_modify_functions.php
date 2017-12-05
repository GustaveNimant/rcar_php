<?php
require_once "language_translate_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function item_current_content_display_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_tit = 'item current content';
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    $la_bub_Tit = '<b>' . $la_bub_Tit . '</b>';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function item_current_content_display_content_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $con_ite_cur_lin = irp_provide ('item_current_content_linked', $here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<i>';
    $html_str .= $con_ite_cur_lin;
    $html_str .= '</i>';
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function item_current_content_modify_form_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_fat = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($irp_fat, "BUTTON_$irp_fat");

  $script_action = 'item_current_modify_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('item_current_content_display_title', $here);
  $html_str .= inputtypesubmit_of_en_action_name ('modify');
  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function item_current_content_display_n_modify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('item_current_content_modify_form', $here);
  $html_str .= irp_provide ('item_current_content_display_content', $here);
  $html_str .= "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>