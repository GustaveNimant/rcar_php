<?php

require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "irp_library.php";

$module = "item_current_justification_display_functions";
entering_in_module ($module);

function item_current_justification_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $en_tit = "content of the current justification";
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit = '<b>' . $la_Tit . '</b>';

  $html_str = common_html_div_background_color_of_html ($la_Tit);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_justification_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $jus_ite_cur = irp_provide ('item_current_justification', $here);
  $jus_ite_cur = string_replace_if_exists ($here, "\n", '<br><br>', $jus_ite_cur);

  $html_str  = "";
  $html_str .= '<i>';
  $html_str .= $jus_ite_cur;
  $html_str .= '</i>';
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_justification_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_current_justification_display_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('item_current_justification_display_content', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>