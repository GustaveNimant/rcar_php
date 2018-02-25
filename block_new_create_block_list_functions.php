<?php

require_once "irp_library.php";
require_once "entry_information_functions.php";
require_once "entry_current_display_functions.php";
require_once "block_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_new_create_block_list_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'the ' . $kin_blo_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_span_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_opentags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $css_sty = irp_provide ('common_html_css_style', $here);

  $html_str  = '';
  $html_str .= $css_sty;

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}
 
function block_new_create_block_list_mouseover_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'a mouseover to show';
  $la_tit = language_translate_of_en_string ($en_tit);
  $html_str = common_html_css_survol_of_la_title ($la_tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);

  if (!empty ($_SESSION['irp_register']['block_content_by_block_name_hash'])) {
      $con_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
      debug_n_check ($here, '$con_by_nam_blo_h', $con_by_nam_blo_h);

      $html_str  = comment_entering_of_function_name ($here);
      foreach ($con_by_nam_blo_h as $nam_blo => $con_blo) {
          $con_ite = item_current_content_of_block_current_content ($con_blo); 
          
          $html_str .= '<li>' . "\n";
          $html_str .= '<b>' . $nam_blo . '</b>';
          $html_str .= ' :<br>';
          $html_str .= '<i>' . $con_ite . '</i>';
          $html_str .= '</li>' . "\n";
      };
      $html_str .= comment_exiting_of_function_name ($here);    
  } else {
      $html_str  = comment_entering_of_function_name ($here);
      $html_str = language_translate_of_en_string ('first block');
      $html_str .= comment_exiting_of_function_name ($here);
  }
    
  debug_n_check ($here , '$html_str', $html_str); 
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_closetags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '</ul></li></ul>' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_opentags', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_title', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_content', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_closetags', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('block_new_create_block_list_title', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>