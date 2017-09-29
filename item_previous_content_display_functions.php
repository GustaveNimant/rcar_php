<?php

require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";

$module = "item_previous_content_display_functions";
entering_in_module ($module);



function item_previous_content_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'item previous content';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit = '<b>' . $la_Tit . '</b>';

  $html_str = common_html_background_color_of_html ($la_Tit);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_previous_content_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ite_cur_con = irp_provide ('item_previous_content', $here);

  $html_str  = '';
  $html_str .= $ite_cur_con;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_previous_content_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_previous_content_display_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('item_previous_content_display_content', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>