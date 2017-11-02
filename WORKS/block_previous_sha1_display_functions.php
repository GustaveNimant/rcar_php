<?php

require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "irp_functions.php";

$module = "block_previous_sha1_display_functions";
entering_in_module ($module);

function block_previous_sha1_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'block previous sha1';

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

function block_previous_sha1_display_value_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $blo_pre_sha = irp_provide ('block_previous_sha1_from_block_current_content', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= $blo_pre_sha . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_previous_sha1_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('block_previous_sha1_display_title', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('block_previous_sha1_display_value', $here);
  $html_str .= "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>