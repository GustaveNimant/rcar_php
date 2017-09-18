<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "surname_functions.php";
require_once "string_functions.php";
require_once "entry_name_array_functions.php";

$module = "entry_rename_save_functions";
# entering_in_module ($module);

/* Improve entry_surname are surname */

function entry_rename_subdirectory ($old_nam_ent, $new_nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($old_nam_ent, $new_nam_ent)");
  debug_n_check ($here , '$old_nam_ent', $old_nam_ent);
  debug_n_check ($here , '$new_nam_ent', $new_nam_ent);
 
  $dir = basic_directory_of_name ('hd_php_server');

  $old_nod = $dir . $old_nam_ent; 
  $new_nod = $dir . $new_nam_ent; 

  file_rename ($old_nod, $new_nod);

  debug_n_check ($here , "old entry file name", $old_nod);
  debug_n_check ($here , "new entry file name", $new_nod);

  exiting_from_function ($here);

  return; 
}

function entry_rename_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve */
  $lan = $_SESSION['parameters']['language'];

  $old_nam_ent = irp_provide ('entry_name', $here);
  $new_sur_ent = irp_provide ('entry_newsurname', $here);
  $new_nam_ent = word_name_capitalized_of_string_surname ($new_sur_ent);

  debug_n_check ($here , '$old_nam_ent', $old_nam_ent);
  debug_n_check ($here , '$new_sur_ent', $new_sur_ent);
  debug_n_check ($here , '$new_nam_ent', $new_nam_ent);

  $old_nam_ent_a = irp_provide ('entry_name_array', $here);
  check_is_array_unique_of_nameofarray_of_array ('entry_oldname_array', $old_nam_ent_a);

  $new_nam_ent_a = entry_name_array_update_n_sort ($old_nam_ent, $new_nam_ent, $old_nam_ent_a);
  irp_store_force ('entry_name_array', $new_nam_ent_a, 'entry_rename_save');

  check_is_array_unique_of_nameofarray_of_array ('new_entry_name_array', $new_nam_ent_a);
  # debug_n_check ($here , '$old_nam_ent_a', $old_nam_ent_a);
  # debug_n_check ($here , '$new_nam_ent_a', $new_nam_ent_a);

  /* Justification (not yet used)  */

  $jus_ent  = irp_provide ('entry_newname_justification', $here);
  $jus_ent .= "\n" . irp_provide ('user_information', $here);
  debug_n_check ($here , '$jus_ent', $jus_ent);

  /* Rename Subdirectory */

  entry_rename_subdirectory ($old_nam_ent, $new_nam_ent);

  /* File server/SURNAMES/Surname_catalog.cat : add "$new_nam_ent : $new_sur_ent" */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  if (array_key_exists ($new_nam_ent, $sur_by_nam_a)) {
      $old_sur = $sur_by_nam_a[$new_nam_ent];
      surname_by_name_array_replace_n_write_of_name_of_newsurname_of_current_array ($new_nam_ent, $new_sur_ent, $sur_by_nam_a);
  }
  else {
      surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($new_nam_ent, $new_sur_ent, $sur_by_nam_a);
  }

  /* Git */

  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($new_nam_ent, $new_sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

# exiting_from_module ($module);

?>