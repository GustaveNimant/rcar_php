<?php
require_once "irp_library.php";
require_once "justification_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_new_create_justification_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justification content';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' : ';

  $key_hel = 'create justify item';
  $la_Tit .= help_text_of_help_key ($key_hel);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_new_create_justification_select_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'select a justification';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

function item_new_create_justification_textarea_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

function item_new_create_justification_select_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_jus_any_a = $_SESSION['item_any_justification_array'];
  $nam_jus_new_a = $_SESSION['item_new_justification_array']; 

  $nam_jus_a = array_merge ($nam_jus_any_a, $nam_jus_new_a);
  debug_n_check ($here , '$nam_jus_a',  $nam_jus_a);  
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= justification_select_of_justification_name_array ($nam_jus_a);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_new_create_justification_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $entity_fat = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "TEXTAREA_$entity_fat");

  $en_txt = 'undefined';
  $la_txt = language_translate_of_en_string ($en_txt);
  debug_n_check ($here , '$la_txt',  $la_txt);  

  $entity_textarea = 'item_new_justification';
  
  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="' . $entity_textarea;
  $html_str .= '" rows="' . $row_hta . '" cols="' . $col_hta;
  $html_str .= '"/>';
  $html_str .= $la_txt;
  $html_str .= '</textarea>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_new_create_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('item_new_create_justification_title_n_help', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_new_create_justification_select_title', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_new_create_justification_select', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_new_create_justification_textarea_title', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_new_create_justification_textarea', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>