<?php

require_once "language_translate_library.php";
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function section_entry_new_create_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for confirming the creation of a new entry';

  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function section_entry_new_create_save_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_new = irp_provide ('entry_new_surname', $here);  
  $nam_ent = word_name_capitalized_of_string_surname ($sur_ent_new);

  string_check_entry_name_of_string ($nam_ent);

  $en_tit  = 'do you want to save the new entry';
  
  $la_tit  = language_translate_of_en_string ($en_tit);
  $la_tit .= ' ' . $sur_ent_new . ' ?';
  $la_Tit  = string_html_capitalized_of_string ($la_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_Tit);

/* set this instead  bubble_bubbled_la_text_of_en_text ($en_tit) */

  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function section_entry_new_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="entry_new_create_save_script.php" method="get"> ' . "\n";

  $html_str .= irp_provide ('section_entry_new_create_save_title', $here);

  $html_str .= inputtypesubmit_of_en_action_name ('yes');

  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  return $html_str;
};

function section_entry_new_create_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve clean paths */
/* when returned to entry_list_display_script.php need to remove paths */

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= link_to_return_of_return_module_nameoffile ('entry_list_display_script.php');
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'entry_new_surname'; 
  $sur_ent_new = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $nam_ent_new = irp_provide ('entry_new_name_from_entry_new_surname', $here);

  if (entry_is_subdirectory_of_entry_name ($nam_ent_new) ) {
      $en_mes_1 = "the entry";
      $en_mes_2 = "already exists";
      $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
      $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
      $la_mes =  $la_mes_1 . ' ' . $sur_ent_new . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);

      warning ($here, $la_Mes);
      exiting_from_function ($here);
      include 'entry_list_display_script.php';
      exit;
  }

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('section_entry_new_create_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('section_entry_new_create_save', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('section_entry_new_create_link_to_return', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>