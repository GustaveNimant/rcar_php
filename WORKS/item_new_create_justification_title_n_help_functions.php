<?php

require_once "irp_functions.php";
require_once "entry_information_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_new_create_justification_title_text_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

function item_new_create_justification_title_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('entry_block_kind', $here);

  $key_hel = 'create justify item';
  $la_Hel = help_text_of_help_key ($key_hel);

  debug_n_check ($here , '$la_Hel',  $la_Hel);
  exiting_from_function ($here);

  return $la_Hel;
}

function item_new_create_justification_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_Tit  = '';
  $la_Tit .= irp_provide ('item_new_create_justification_title_text', $here);
  $la_Tit .= ' : ';
  $la_Tit .= irp_provide ('item_new_create_justification_title_help', $here);

  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


exiting_from_module ($module);

?>