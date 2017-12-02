<?php
require_once "irp_library.php";

# "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";

$module = "block_current_history_functions";
entering_in_module ($module);

/* First Section Page Title */

function block_current_history_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the history of the ' . $kin_blo;  
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit .= $la_bub_tit;
  $la_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 
  
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Block History Justify */

/* Second Section Block History Justify Title */

function block_current_history_section_justify_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Block History Justify Textarea */

function block_current_history_section_justify_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="block_current_history_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Block History Justify */

function block_current_history_section_justify_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_current_history_section_justify_title', $here);
  $html_str .= irp_provide ('block_current_history_section_justify_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Block History Save */

function block_current_history_section_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '   <input type="submit" value="';
  $html_str .= ucfirst (language_translate_of_en_string ('history'));
  $html_str .= '" name="submitme"> ' . "\n";
  $html_str .= '</center> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

/* Page Block History */

function block_current_history_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);
  $nof_mod = 'entry_current_display_script.php';

  $script_action = 'block_current_history_save.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('block_current_history_section_page_title', $here);
  $html_str .= '<br><br> ';
  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= '<input type="hidden" name="block_current_name" value="';
  $html_str .= $nam_ite;
  $html_str .= '">';
  $html_str .= irp_provide ('block_current_history_section_justify', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_current_history_section_save', $here);
  $html_str .= '    </form> ' . "\n";

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent, $sur_ent_cur, $nof_mod); 

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}


exiting_from_module ($module);

?>