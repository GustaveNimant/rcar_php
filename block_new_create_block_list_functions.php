<?php

require_once "irp_functions.php";
require_once "entry_information_functions.php";
require_once "entry_display_functions.php";
require_once "block_kind_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_new_create_block_list_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $kin_ite_plu = block_kind_plural_of_block_kind ($kin_ite);

  $en_tit = 'the ' . $kin_ite_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_opentags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $css_sty = irp_provide ('common_html_css_style', $here);

  $html_str = '';
  $html_str .= $css_sty;

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}
 
function block_new_create_block_list_mouseover_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'a mouseover to show';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $html_str = common_html_css_survol_of_la_title ($la_tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);

  if (!empty ($_SESSION['irp_register']['block_content_by_block_name_array'])) {
      $con_by_nam_ite_a = irp_provide ('block_content_by_block_name_array', $here);
      
      $html_str = '';
      foreach ($con_by_nam_ite_a as $nam_ite => $con_ite) {
          $html_str .= '<li> ' . "\n";
          $html_str .= '<b> ' . $nam_ite . '</b> ';
          $html_str .= " : ";
          $html_str .= $con_ite;
          $html_str .= '</li> ' . "\n";
      };
      
  } else {
      
      $html_str = language_translate_of_en_string_of_language ('first block', $lan);
  }
  
  /* debug_n_check ($here , '$html_str', $html_str); */

  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_closetags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= '</ul></li></ul> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_mouseover_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_opentags', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_title', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_content', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover_closetags', $here);
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_block_list_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $html_str = '';
  $html_str .= irp_provide ('block_new_create_block_list_title', $here);
  $html_str .= irp_provide ('block_new_create_block_list_mouseover', $here);
 
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>