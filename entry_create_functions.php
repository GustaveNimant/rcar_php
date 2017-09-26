<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";
require_once "file_functions.php";
require_once "entry_functions.php";

$module = "entry_create_functions";
# entering_in_module ($module);

function entry_create_message_of_entry_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_newsurname', $here);  
  $nam_ent = word_name_capitalized_of_string_surname ($sur_ent);

  string_check_entry_name_of_string ($nam_ent);
  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'create a new entry';
  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_tit);

  $fnd_ent = entry_subdirectory_name_of_entry_name ($nam_ent);
  if (! file_exists ($fnd_ent)) {
/* new entry */
      $la_mes  = language_translate_of_en_string ('do you want to create the entry');
      $la_mes .= ' ' . $sur_ent . ' ?';
      $la_Mes = string_html_capitalized_of_string ($la_mes);
  } else {
      $la_mes  = language_translate_of_en_string ('the entry');
      $la_mes .= ' ' . $sur_ent . ' '; 
      $la_mes .= language_translate_of_en_string ('already exists');
      $la_Mes = string_html_capitalized_of_string ($la_mes);
  }

  $html_str = common_html_entitled_text_of_title_of_text ($la_Tit, $la_Mes);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_create_section_create_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $pre_mod = link_previous_module_name_make ();
  $son_mod = 'entry_create_save';

  $script_action = 'entry_create_save.php';

  debug_n_check ($here, '$script_action', $script_action);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= irp_provide ('entry_create_message_of_entry_name', $here);
  $html_str .= inputtypesubmit_of_en_action_name ('yes');
  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  return $html_str;
};


function entry_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];    
  $new_sur_ent = irp_provide ('entry_newsurname', $here);  /* GET */
  debug_n_check ($here, '$new_sur_ent', $new_sur_ent);

  $nam_ent = word_name_capitalized_of_string_surname ($new_sur_ent);
  debug_n_check ($here, '$nam_ent', $nam_ent);
  $nam_ent_a = irp_provide ('entry_name_array', $here);

  if (array_value_exists ($nam_ent, $nam_ent_a)) {
      $en_mes_1 = "the entry";
      $en_mes_2 = "already exists";
      $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
      $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
      $la_mes =  $la_mes_1 . ' ' . $new_sur_ent . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);
      warning ($here, $la_Mes);
      exiting_from_function ($here);
      include 'entry_list_display.php';
      exit;
  }

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $nof_mod   = 'entry_list_display.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('entry_create_section_create_entry', $here);
  $html_str .= link_to_return_of_return_module_nameoffile ($nof_mod);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>