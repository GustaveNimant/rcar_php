<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "surname_functions.php";
require_once "string_functions.php";
require_once "item_name_array_functions.php";

$module = "item_rename_save_functions";
# entering_in_module ($module);

/* Improve item_surname are surname */

function item_file_rename ($nam_ent, $old_nam_ite, $new_nam_ite, $ext_fil) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $old_nam_ite, $new_nam_ite, $ext_fil)");
  debug_n_check ($here , "input entry_name", $nam_ent);
  debug_n_check ($here , "input old item name", $old_nam_ite);
  debug_n_check ($here , "input new item name", $new_nam_ite);
  debug_n_check ($here , "input file name extension", $ext_fil);
 
  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $old_nof = $dir . $old_nam_ite . '.' . $ext_fil;  
  $new_nof = $dir . $new_nam_ite . '.' . $ext_fil;

  file_rename ($old_nof, $new_nof);

  debug_n_check ($here , "old item file name", $old_nof);
  debug_n_check ($here , "new item file name", $new_nof);
  exiting_from_function ($here);
}

function item_rename_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  /* irp_path_clean_register_of_top_key_of_bottom_key ('item_newsurname', 'item_rename_save'); */

  $new_sur_ite = irp_provide ('item_newsurname', $here);
  $new_nam_ite = word_name_capitalized_of_string_surname ($new_sur_ite);

  $nam_ent = irp_provide ('entry_name', $here);
  $old_nam_ite = irp_provide ('item_name', $here);

  /* File new_item.ite */

  global $item_text_filename_extension;
  $ext_ite = $item_text_filename_extension;
  debug_n_check ($here , '$new_sur_ite', $new_sur_ite);
  debug_n_check ($here , '$old_nam_ite', $old_nam_ite);
  debug_n_check ($here , '$new_nam_ite', $new_nam_ite);
  debug_n_check ($here , '$ext_ite', $ext_ite);

  $old_nam_ite_a = irp_provide ('item_name_array', $here);
  check_is_array_unique_of_nameofarray_of_array ('item_oldname_array', $old_nam_ite_a);
  $new_nam_ite_a = item_name_array_update_after_item_rename ($nam_ent, $old_nam_ite, $new_nam_ite, $old_nam_ite_a);
  check_is_array_unique_of_nameofarray_of_array ('item_newname_array', $new_nam_ite_a);
  # debug_n_check ($here , '$old_nam_ite_a', $old_nam_ite_a);
  # debug_n_check ($here , '$new_nam_ite_a', $new_nam_ite_a);

  /* File new catalog */

  item_file_rename ($nam_ent, $old_nam_ite, $new_nam_ite, $ext_ite);
  $new_cat_ite = item_name_catalog_of_item_name_array ($new_nam_ite_a);
  debug_n_check ($here , '$new_cat_ite', $new_cat_ite);
  item_name_catalog_write_of_entry_name_of_item_name_catalog ($nam_ent, $new_cat_ite);

  /* File new_item.jus */

  $jus_ite  = irp_provide ('item_newname_justification', $here);
  $jus_ite .= "\n" . irp_provide ('user_information', $here);

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;
  debug_n_check ($here , '$ext_jus', $ext_jus);

  item_file_rename ($nam_ent, $old_nam_ite, $new_nam_ite, $ext_jus);
  item_any_text_write ('new item justify',$nam_ent, $new_nam_ite, $jus_ite, $ext_jus);

  /* File server/SURNAMES/Surname_catalog.cat : add "$new_nam_ite : $new_sur_ite" */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  if (array_key_exists ($new_nam_ite, $sur_by_nam_a)) {
      $old_sur = $sur_by_nam_a[$new_nam_ite];
      surname_by_name_array_replace_n_write_of_name_of_newsurname_of_current_array ($new_nam_ite, $new_sur_ite, $sur_by_nam_a);
  }
  else {
  surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($new_nam_ite, $new_sur_ite, $sur_by_nam_a);
  }

  /* Git */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Verify */
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

# exiting_from_module ($module);

?>