<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "surname_functions.php";
require_once "string_functions.php";
require_once "block_name_array_functions.php";

$module = "block_rename_save_functions";
# entering_in_module ($module);

/* Improve block_surname are surname */

function block_file_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $ext_fil) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $old_nam_blo, $new_nam_blo, $ext_fil)");
  debug_n_check ($here , "input entry_name", $nam_ent);
  debug_n_check ($here , "input old block name", $old_nam_blo);
  debug_n_check ($here , "input new block name", $new_nam_blo);
  debug_n_check ($here , "input file name extension", $ext_fil);
 
  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $old_nof = $dir . $old_nam_blo . '.' . $ext_fil;  
  $new_nof = $dir . $new_nam_blo . '.' . $ext_fil;

  file_rename ($old_nof, $new_nof);

  debug_n_check ($here , "old block file name", $old_nof);
  debug_n_check ($here , "new block file name", $new_nof);
  exiting_from_function ($here);
}

function block_rename_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  /* irp_path_clean_register_of_top_key_of_bottom_key ('block_newsurname', 'block_rename_save'); */

  $new_sur_blo = irp_provide ('block_newsurname', $here);
  $new_nam_blo = word_name_capitalized_of_string_surname ($new_sur_blo);

  $nam_ent = irp_provide ('entry_name', $here);
  $old_nam_blo = irp_provide ('block_current_name', $here);

  /* File new_block.ite */

  $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];
  debug_n_check ($here , '$new_sur_blo', $new_sur_blo);
  debug_n_check ($here , '$old_nam_blo', $old_nam_blo);
  debug_n_check ($here , '$new_nam_blo', $new_nam_blo);
  debug_n_check ($here , '$ext_blo', $ext_blo);

  $old_nam_blo_a = irp_provide ('block_name_array', $here);
  check_is_array_unique_of_nameofarray_of_array ('block_oldname_array', $old_nam_blo_a);
  $new_nam_blo_a = block_name_array_update_after_block_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $old_nam_blo_a);
  check_is_array_unique_of_nameofarray_of_array ('block_newname_array', $new_nam_blo_a);
  # debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);
  # debug_n_check ($here , '$new_nam_blo_a', $new_nam_blo_a);

  /* File new catalog */

  block_file_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $ext_blo);
  $new_cat_blo = block_name_catalog_of_block_name_array ($new_nam_blo_a);
  debug_n_check ($here , '$new_cat_blo', $new_cat_blo);
  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $new_cat_blo);

  /* File server/SURNAMES/Surname_catalog.cat : add "$new_nam_blo : $new_sur_blo" */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  if (array_key_exists ($new_nam_blo, $sur_by_nam_a)) {
      $old_sur = $sur_by_nam_a[$new_nam_blo];
      surname_by_name_array_replace_n_write_of_name_of_newsurname_of_current_array ($new_nam_blo, $new_sur_blo, $sur_by_nam_a);
  }
  else {
  surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($new_nam_blo, $new_sur_blo, $sur_by_nam_a);
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