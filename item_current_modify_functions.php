<?php
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

entering_in_module ($module);

function item_current_modify_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $en_kin_blo = irp_provide ('entry_block_kind', $here);
  $la_kin_blo = bubble_bubbled_la_text_of_en_text ($en_kin_blo);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_blo_cur = surname_of_name_of_surname_by_name_hash ($nam_blo_cur, $sur_by_nam_h);

  $en_tit = 'page for modifying the content of the current ' . $en_kin_blo; 

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= '<i><b> ' . $sur_blo_cur . '</b></i> ';

  $en_tit =  'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= lcfirst ($la_bub_tit);
  $la_bub_Tit .= '<i><b> ' . $sur_ent . '</b></i>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_modify_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

#  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, 'block_current_display');

  $get_key = 'entry_current_name';
  $get_val = irp_provide ($get_key, $here);
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $nof_mod = 'block_current_display_script.php';
  $nam_mod = str_replace ('.php', '', $nof_mod);

  $en_txt = 'back to the entry';
  $la_txt  = language_translate_of_en_string ($en_txt);
  $la_Txt  = string_html_capitalized_of_string ($la_txt);
  $la_Txt .= ' ' . $sur_ent;

  debug_n_check ("$here", '$la_Txt', $la_Txt);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= link_to_return_of_string_of_get_key_of_get_val_of_module_nameoffile ($la_Txt, $get_key, $get_val, $nof_mod) . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_modify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= '<center>' . "\n";
  $html_str .= irp_provide ('item_current_modify_page_title', $here);
  $html_str .= '</center>' . "\n";
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('item_current_content_display', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_item_next_create_form', $here);
  $html_str .= '<br>' . "\n"; 

  $html_str .= irp_provide ('item_current_modify_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

