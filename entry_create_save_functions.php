<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";
require_once "file_functions.php";

$module = "entry_create_functions";
# entering_in_module ($module);

function entry_create_save_subdirectory_create_of_entry_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_newsurname', $here);  
  $nam_ent = word_name_capitalized_of_string_surname ($sur_ent);

  string_check_entry_name_of_string ($nam_ent);
  $lan = $_SESSION['parameters']['language'];

  $la_tit = language_translate_of_en_string ('message');
  $la_ent = language_translate_of_en_string ('the entry');

/* new entry */

  $fnd_ent = entry_subdirectory_name_of_entry_name ($nam_ent);
  if (! file_exists ($fnd_ent)) {
      entry_subdirectory_create_of_subdirectory_name ($fnd_ent);
      $la_cre = language_translate_of_en_string ('has been created');
  } else {
      $la_cre = language_translate_of_en_string ('already exists');
  }

  $html_str = common_html_entitled_text_of_title_of_text ($la_tit, $la_ent . ' ' . $sur_ent . ' ' . $la_cre);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_create_save_update_of_surname_by_name_array_of_entry_newsurname_of_language ($sur_by_nam_a, $new_sur_ent, $lan) {
    $here = __FUNCTION__;
    entering_in_function ($here . "(\$sur_by_nam_a, $new_sur_ent, $lan)");
    
/* Verify */
/* new entry */

    $nam_ent = word_name_capitalized_of_string_surname ($new_sur_ent);
    string_check_entry_name_of_string ($nam_ent);
    surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_ent, $new_sur_ent, $sur_by_nam_a) ;

    exiting_from_function ($here);

    return;
}

function entry_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

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

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('entry_create_save_subdirectory_create_of_entry_name', $here);
  $html_str .= entry_create_save_update_of_surname_by_name_array_of_entry_newsurname_of_language ($sur_by_nam_a, $new_sur_ent, $lan);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* need to be updated */

  $html_str .= link_to_return_of_return_module_nameoffile ('entry_list_display.php');
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>