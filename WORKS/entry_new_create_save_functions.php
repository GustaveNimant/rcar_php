<?php
require_once "array_library.php";
require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "irp_functions.php";
require_once "file_library.php";

$module = "entry_new_create_functions";
entering_in_module ($module);

function entry_new_create_save_subdirectory_create_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  string_check_entry_name_of_string ($nam_ent);

  $eol = end_of_line ();

  $en_tit = 'the directory of entry';
  $la_tit = language_translate_of_en_string ($en_tit);
  
/* new entry */

  if (entry_is_subdirectory_of_entry_name ($nam_ent) ) {
      $la_cre = language_translate_of_en_string ('already exists');
  } else {
      entry_subdirectory_create_of_entry_name ($nam_ent);
      $la_cre = language_translate_of_en_string ('has been created');
  }

  $html_str = $la_tit . ' <b><i>' . $nam_ent . '</i></b> ' . $la_cre;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_save_update_of_surname_by_name_hash_of_entry_new_surname ($sur_by_nam_h, $new_sur_ent) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (\$sur_by_nam_h, $new_sur_ent)");
    
/* Verify */
/* new entry */

    $nam_ent = word_name_capitalized_of_string_surname ($new_sur_ent);
    string_check_entry_name_of_string ($nam_ent);
    surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam_ent, $new_sur_ent, $sur_by_nam_h) ;

    exiting_from_function ($here);
    return;
}

function entry_new_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_new = irp_provide ('entry_new_surname', $here); /* ??? */ 
  $nam_ent_new = irp_provide ('entry_new_name_from_entry_new_surname', $here); 

  debug_n_check ($here, '$nam_ent_new', $nam_ent_new);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= entry_new_create_save_subdirectory_create_of_entry_name ($nam_ent_new);
  $html_str .= entry_new_create_save_update_of_surname_by_name_hash_of_entry_new_surname ($sur_by_nam_h, $sur_ent_new);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); /* Improve need to be updated */

  $html_str .= '<br><br>';

  $html_str .= link_to_return_of_return_module_nameoffile ('entry_list_display_script.php');

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>