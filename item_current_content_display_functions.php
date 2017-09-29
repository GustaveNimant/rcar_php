<?php

require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function item_current_content_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'item current content';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit = '<b>' . $la_Tit . '</b>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_content_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ite_cur_con = irp_provide ('item_current_content', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= $ite_cur_con . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_content_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<br><br>' . "\n";
  $html_str .= irp_provide ('item_current_content_display_title', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_current_content_display_content', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>