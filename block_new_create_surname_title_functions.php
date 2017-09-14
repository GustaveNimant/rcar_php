<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_new_create_surname_title_text_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $en_tit = 'enter the name of the ' . $kin_ite;

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

function block_new_create_surname_title_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_item_kind', $here);

  $key_hel = 'block_new_create_name';
  $la_Hel = help_text_of_help_key_of_language ($key_hel, $lan);

  debug_n_check ($here , '$la_Hel',  $la_Hel);
  exiting_from_function ($here);

  return $la_Hel;
}

function block_new_create_surname_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_Tit  = '';
  $la_Tit .= irp_provide ('block_new_create_surname_title_text', $here);
  $la_Tit .= ' : ';
  $la_Tit .= irp_provide ('block_new_create_surname_title_help', $here);

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>