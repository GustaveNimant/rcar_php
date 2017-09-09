<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "block_list_neworder_save_functions";
# entering_in_module ($module);

function block_list_neworder_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , '$_GET', $_GET);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  
  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here, '$entry_name', $nam_ent);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $new_cat_ite = irp_provide ('block_sequence_string', $here); /* GET */

  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $new_cat_ite);
  
  $usr_inf = irp_provide ('user_information', $here);
  block_name_array_justification_write_of_entry_name_of_user_information_of_language ($nam_ent, $usr_inf, $lan);
  
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $nof_mod = 'entry_display.php';
 
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , "output html code", $html_str);

  exiting_from_function ($here);
  
  return $html_str;
}
  
# exiting_from_module ($module);

?>