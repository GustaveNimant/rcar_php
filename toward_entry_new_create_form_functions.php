<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a section of entry_current_display page";
$Documentation[$module]['what for'] = "to jump to entry_new_create_script.php";
$Documentation[$module]['remark'] = "do not GET any DATA";

entering_in_module ($module);

function toward_entry_new_create_form_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'create a new entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit); /* span */
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function toward_entry_new_create_form_build () {  /* Generalize */
  $here = __FUNCTION__;
  entering_in_function ($here);

  $entity_fat = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "BUTTON_$entity_fat");

  $script_action = 'entry_new_create_script.php';
  $entity_son = entity_name_of_script_nameoffile ($script_action);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "$entity_son");

  /* $get_key = 'entry_new_surname'; */
  /* $_SESSION['get_key_by_script_name'][$entity_son] = $get_key; */

  $la_Nam_act = ucfirst (language_translate_of_en_string ('create'));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('toward_entry_new_create_form_title', $here);
  $html_str .= '<input type="submit" value="' . $la_Nam_act . '">' . "\n";
  $html_str .= '</form> ' .  "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>
