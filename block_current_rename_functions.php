<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function section_block_current_rename_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'rename the ' . $kin_blo;  
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= $la_bub_tit;
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit) . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function section_block_current_rename_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $en_txt = 'back to the entry';
  $la_txt  = language_translate_of_en_string ($en_txt);
  $la_Txt  = string_html_capitalized_of_string ($la_txt);
  $la_Txt .= ' ' . $sur_ent_cur;

  debug_n_check ("$here", '$la_Txt', $la_Txt);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= link_to_return_of_string_of_get_key_of_get_val_of_module_nameoffile ($la_Txt,'entry_name_array', $nam_ent_cur, 'entry_current_display_script.php') . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_rename_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_block_current_rename_page_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_block_current_rename_form', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_block_current_rename_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>