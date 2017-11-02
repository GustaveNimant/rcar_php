<?php

require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "irp_functions.php";

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
    
    $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);
    
/* getting DATA $get_val */
    $get_key = 'block_current_name'; 
    $nam_blo_cur = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

    $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
    $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_by_nam_blo_h);
    $ite_cur_con = item_current_content_of_block_current_content ($con_blo_cur);
    
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
  $html_str .= irp_provide ('item_current_content_display_title', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('item_current_content_display_content', $here);
  $html_str .= "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>